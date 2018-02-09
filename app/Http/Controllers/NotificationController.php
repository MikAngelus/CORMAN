<?php

namespace App\Http\Controllers;

class NotificationController extends Controller
{
    public function index($id)
    {

        $user = \Auth::user();
        $notification = $user->notifications()->where('id', $id)->first();
        if ($notification) {
            $notification->delete();
            return redirect()->route('groups.show', $notification->data['group']['id']);

        }elseif ($notification == '1'){
            return redirect()->route('groups');
        } else {
            return back()->withErrors('we could not found the specified notification');
        }
    }

    public function show()
    {
        return view('Pages.notification');

    }

}
