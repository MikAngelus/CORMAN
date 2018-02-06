<a href="{{ route('groups.show', $notification->data['group']['id']) }}">
    {{ $notification->data['user']['first_name'] . ' ' . $notification->data['user']['last_name']}} invite you to join the group <strong>{{ $notification->data['group']['name']}}</strong>
</a>
