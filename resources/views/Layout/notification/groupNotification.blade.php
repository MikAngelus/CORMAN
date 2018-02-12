<!-- Notification Modal Content -->

<div>
    <div class="row align-items-center">
        <div class="col-lg-12">{{ $notification->data['authUser']['first_name'] . ' ' . $notification->data['authUser']['last_name']}} invite you to join the group <strong>{{ $notification->data['group']['name']}}</strong></div>
        <div class="col-lg-12" align="center">
            <a href="{{ url('notifications/'.$notification->id) }}" id="btn-newgroup" class="btn btn-success btn-sm" role="button">Accept</a>
            <a href="{{ url('notifications/'. $notification->id . '1') }}" id="btn-newgroup" class="btn btn-danger btn-sm" role="button">Refuse</a>
        </div>
    </div>
</div>