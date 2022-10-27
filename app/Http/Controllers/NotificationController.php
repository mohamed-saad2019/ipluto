<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notification;

class NotificationController extends Controller
{
    public function markAsRead($id)
    {
    	$notification = Auth()->User()->unreadNotifications->where('id', $id)->markAsRead();
        return back();
    }

    public function delete()
    {
       if (request()->has('colum') and !empty(request('colum'))) {
        
         Notification::where(request('colum'),Auth()->User()->id)->delete();
       
       }

        return back();
    }
}
