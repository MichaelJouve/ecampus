@foreach($users as $user)
    <a href="{{ route('conversation.show',['slug' => $user->slug ])}}" class="m-1 p-2 border bg-light list-group-item">
        {{ $user->name }} {{ $user->firstname }}
    </a>
@endforeach