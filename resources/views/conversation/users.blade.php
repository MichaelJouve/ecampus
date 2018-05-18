

@foreach($users as $userFriend)
    <a href="{{ route('conversation.show',['slug' => $userFriend->slug ])}}" class="m-1 p-2 border bg-light list-group-item">
        {{ $userFriend->name }} {{ $userFriend->firstname }}
        @if($userFriend->unread_message_count != 0)
        <span class="rounded-circle  m-2 p-2 text-danger font-weight-bold small ">
            {{ $userFriend->unread_message_count }} message(s)..
        </span>
        @endif
    </a>
@endforeach