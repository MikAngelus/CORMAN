<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function index($id)
    {

        $user = \Auth::user();
        $notification = $user->notifications()->where('id', $id)->first();
        if ($notification) {
            $notification->delete();
            return view('Pages.notification');
        } else {
            return back()->withErrors('we could not found the specified notification');
        }
    }

    public function show()
    {
        return view('Pages.notification');

    }

}
