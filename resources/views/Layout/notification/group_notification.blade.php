<a href="{{url('notifications/'.$notification->id)}}">
    {{ $notification->data['auth_user']['first_name'] . ' ' . $notification->data['auth_user']['last_name']}} invite you to join the group <strong>{{ $notification->data['group']['name']}}</strong>
</a>
