<!-- Notification Modal Content -->

<div>
    <div class="row align-items-center">
        <div class="col-lg-8">{{ $notification->data['auth_user']['first_name'] . ' ' . $notification->data['auth_user']['last_name']}} invite you to join the group <strong>{{ $notification->data['group']['name']}}</strong></div>
        <div class="col-lg-4">
            <a href="{{ url('notifications/'.$notification->id) }}" id="btn-newgroup" class="btn btn-success btn-sm" role="button">Accept</a>
            <a href="{{ url('notifications/'.'1') }}" id="btn-newgroup" class="btn btn-danger btn-sm" role="button">Refuse</a>
        </div>
    </div>
</div>