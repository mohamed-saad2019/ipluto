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

    public function notificationInterval()
    {

        $notifications = Notification::where(request('colum'),\Auth::user()->id)
                                ->with('user')->orderBy('created_at','DESC')->get();

         $html = '';

        foreach ($notifications as $notification)
         {
                $html.='<div class="notifications-item">';
                if($notification->notifiable_type == 'zoom')
                 {                       
                 $zoom = \App\zoom::where('id',$notification->notifiable_id)->first();
                   $html.=' <a href="'.$zoom->url.'"> ';
                 }
                else
                {
                    $html.='  <a href="#">';
                }
                if($notification->type == 'ipluto')
                {
                    $html.='<img src="../images/logo.png">';
                }

                elseif($notification->type == 'instructor')
                {
                    if($notification->user->user_img != null && $notification->user->user_img && @file_get_contents('images/user_img/'.$notification->user->user_img))
                     {
                        $html.= '<img src="'.url('images/user_img/'.$notification->user->user_img).'"alt="profilephoto" class="rounded-circle">';
                     }
                                                

                    elseif($notification->user->user_img != null && $notification->user->user_img !='' && @file_get_contents('images/avatar/'. $notification->user->user_img))
                    {
                      $html.= '<img src="'.url('images/avatar/'.$notification->user->user_img).'"alt="profilephoto" class="rounded-circle">';
                    }
                        
                    else
                    {
                      $html.= '<img src="{{ Avatar::create($notification->user->fname)->toBase64() }}"
                          alt="profilephoto" class="rounded-circle">';
                    }                       

                                                
                }

                $html.='<div class="text row" style="margin-right:0px;"><div class="col-md-8"><h4 class="text-capitalize">';

                if($notification->type == 'ipluto')
                {
                    $html.='Ipluto</h4></div> <div class="col-md-4"> <p>';
                }
                elseif($n->type == 'instructor')
                {
                    $html.= ucwords($n->user->fname) . ucwords($n->user->lname);
                }

                 $html.= \Carbon\Carbon::parse($notification->created_at)->shortRelativeDiffForHumans() .'</p></div><div class="col-md-12"><p>'.$notification->data.'</p></div></div></a>';                                              
         }

         return $html;

    } 

    public function notificationCount()
    {
        $count = Notification::where(request('colum'),\Auth::user()->id)->count();
        $html  = '';

        if ($count > 0)
         {
            $html.= '<i class="far fa-bell fa-lg"></i><span class="notification--num">'.$count.'</span>';
         }
        else
        {
          $html.= '<i class="far fa-bell fa-lg"></i>';  
        }

        return $html;
    }
}
