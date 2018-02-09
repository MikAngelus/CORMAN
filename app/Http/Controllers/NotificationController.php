<?php

namespace App\Http\Controllers;

use App\Group;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    public function index($id)
    {
        $user = Auth::user();
        $acceptedNotification = $user->notifications()->where('id', $id)->first();
        $refusedNotification = $acceptedNotification . '1';
        if ($acceptedNotification) {
            Group::find($acceptedNotification->data['group']['id'])->users()->syncWithoutDetaching([$acceptedNotification->data['user']['id'] => ['state' => 'accepted']]);
            $acceptedNotification->delete();
            return redirect()->route('groups.show', $acceptedNotification->data['group']['id']);

        } else if ($refusedNotification) {

            $refusedid = substr($id, 0, strlen($id)-1);
            $refusedNotification = $user->notifications()->where('id', $refusedid)->first();
            $refusedNotification->delete();
            return redirect()->route('users.index');

        } else {
            return back()->withErrors('we could not found the specified notification');
        }


    }

    public function show()
    {


    }

}
