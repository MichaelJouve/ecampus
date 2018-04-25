@foreach($users as $user)
<ul>
    <li>
        <h3>
            {{$user ->name}}
        </h3>
    </li>
</ul>
@endforeach