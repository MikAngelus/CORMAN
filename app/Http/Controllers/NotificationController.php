<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificationController extends Controller
{
    /**
     * delete a specific notification
     *
     * @param $id
     * @return mixed
     */
    public function delete($id) {
        $user = \Auth::user();
        $notification = $user->notifications()->where('id',$id)->first();
        if ($notification)
        {
            $notification->delete();
            return redirect()->route('groups.show', $notification->data['group']['id']);;
        }
        else
            return back()->withErrors('we could not found the specified notification');
    }
}
