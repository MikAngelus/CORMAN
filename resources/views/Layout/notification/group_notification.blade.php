<a href="{{ route('groups.show', $notification->data['group']['id']) }}">
    {{ $notification->data['auth_user']['first_name'] . ' ' . $notification->data['auth_1user']['last_name']}} invite you to join the group <strong>{{ $notification->data['group']['name']}}</strong>
</a>
