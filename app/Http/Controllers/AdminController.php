<?php

namespace App\Http\Controllers;


use App\Category;
use App\Comment;
use App\ContactRequest;
use App\Publication;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;


class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = Auth::user();
        $users = User::all()->count();
        $tutoriels = Publication::where('type', 'tutorial')->get()->count();
        $posts = Publication::where('type', 'post')->get()->count();
        $comments = Comment::all()->count();
        $contactRequest = ContactRequest::all()->count();


        $user->authorizeRoles(['admin', 'superAdmin']);

        return view('admin.index',
            ['user' => $user,
                'users' => $users,
                'tutoriels' => $tutoriels,
                'posts' => $posts,
                'comments' => $comments,
                'contactRequest' => $contactRequest]);

    }

    public function gestionMembres()
    {
        $users = User::with('roles')->get();

        return view('admin.gestionMembre', ['user' => Auth::user(), 'users' => $users]);
    }

    public function gestionPosts()
    {
        $posts = Publication::where('type', '=', 'post')->get();

        return view('admin.gestionPost', ['user' => Auth::user(), 'posts' => $posts]);
    }

    public function gestionTutoriels()
    {
        $tutoriels = Publication::where('type', '=', 'tutorial')->get();

        return view('admin.gestionTutoriel', ['user' => Auth::user(), 'tutoriels' => $tutoriels]);
    }

    public function gestionComments()
    {
        $comments = Comment::all();

        return view('admin.gestionComment', ['user' => Auth::user(), 'comments' => $comments]);
    }

    public function gestionContactRequest()
    {
        $contactRequests = ContactRequest::all();

        return view('admin.gestionContactRequest', ['user' => Auth::user(), 'contactRequests' => $contactRequests]);
    }

    public function changeInfosMembre($slug)
    {
        $user = Auth::user();
        $user->load('roles');
        $otherUser = User::findBySlugOrFail($slug);
        $roles = Role::all();

        return view('admin.modifMembre', ['user' => $user, 'otherUser' => $otherUser, 'roles' => $roles]);
    }

    public function viewChangePost($slug)
    {
        $user = Auth::user();
        $user->load('roles');

        $categories = Category::all();
        $publication = Publication::where('slug', $slug)
            ->with('user')
            ->firstOrFail();
        $decodeContent = html_entity_decode($publication->content);

        return view('admin.changePost', [
            'user' => $user,
            'publication' => $publication,
            'categories' => $categories,
            'decodeContent' => $decodeContent
        ]);

    }

    public function viewChangeTuto($slug)
    {
        $user = Auth::user();
        $user->load('roles');

        $categories = Category::all();
        $publication = Publication::where('slug', $slug)
            ->with('user')
            ->firstOrFail();
        $decodeContent = html_entity_decode($publication->content);

        return view('admin.changeTuto', [
            'user' => $user,
            'publication' => $publication,
            'categories' => $categories,
            'decodeContent' => $decodeContent
        ]);

    }
    public function updatePost(Request $request, $slug)
    {
        $publication = Publication::findBySlugOrFail($slug);
        $inputs['imgpublication'] = $publication->imgpublication;
        $inputs = $request->all();

        if ($publication->type === 'post') {
            $validateData = $request->validate([
                'category_id' => 'integer',
                'title' => 'string|max:191',
                'content' => 'required'
            ]);

            $publication->update($validateData);
        } else {

            if ($request->hasFile('imgpublication')) {

                // open an image file
                $imgResize = Image::make($request->imgpublication->path());
                $imgOrigin = Image::make($request->imgpublication->path());
                $imgCrop = Image::make($request->imgpublication->path());

                // True colors

                $imgResize->limitColors(null);

                // Resize 300x300

                $imgResize->resize(680, 380, function ($constraint) {

                    $constraint->aspectRatio();

                });

                $imgCrop->crop(680, 380);

                // Blank background if canvas

                $imgResize->resizeCanvas(680, 380, 'center', false, '#fff');

                // je force la photo en jpg
                $imgResize->stream('jpg', 90);
                $imgOrigin->stream('jpg', 100);
                $imgCrop->stream('jpg', 100);


                //je lenregistre dans public / img-user de notre storage
                Storage::disk('public')->put('imgpublication-resize/' . $imgResize->filename . '.jpg', $imgResize);
                Storage::disk('public')->put('imgpublication-origin/' . $imgOrigin->filename . '.jpg', $imgOrigin);
                Storage::disk('public')->put('imgpublication-crop/' . $imgCrop->filename . '.jpg', $imgCrop);

                // MAJ request
                $inputs['imgpublication'] = $imgResize->filename . '.jpg';

                $publication->update($inputs);

            }

            $validateData = $request->validate([
                'category_id' => 'integer',
                'title' => 'string|max:191',
                'description' => 'max:255',
                'price' => 'integer',
                'required' => 'string|max:191|nullable',
                'goals' => 'string|max:191|nullable',
                'content' => 'required'
            ]);


            $publication->update($validateData);

        }

        return redirect()->route('administration')->with('message', 'Modification effectuée');
    }

    public function softDeletePost($slug)
    {
        $publication = Publication::findBySlugOrFail($slug);
        $publication->delete();

        return redirect()->route('administration')->with('message', 'Publication supprimée');
    }

    public function adminUpdate(Request $request, $slug)
    {
        $user = User::findBySlugOrFail($slug);
        $validateData = $request->validate([
            'name' => 'string|max:50',
            'firstname' => 'string|max:50',
            'email' => 'string|email|max:255',
            'paypal' => 'string|max:200|nullable',
            'birthday' => 'date|nullable',
        ]);

        $validateData['name'] = strtoupper($validateData['name']);
        $validateData['firstname'] = ucfirst($validateData['firstname']);

        $user->update($validateData);

        $role_superAdmin = Role::where('id', $request['role_id'])->first();
        $user->roles()->detach();
        $user->roles()->attach($role_superAdmin);


        return redirect()->route('admin-membres');
    }
}
