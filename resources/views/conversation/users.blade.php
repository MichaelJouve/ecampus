@foreach($friends as $friend)
        <a href="{{ route('conversation.show',['slug' => $friend->slug ])}}"
           class="m-1 p-2 border bg-light list-group-item">
            {{ $friend->name }} {{ $friend->firstname }}
        </a>

        @if(count($friend->unreadMessageByUser) > 0)
            <span class="rounded-circle  m-2 p-2 text-danger font-weight-bold small ">
             {{ count($friend->unreadMessageByUser) }} message(s)..
        </span>
        @endif

@endforeach




