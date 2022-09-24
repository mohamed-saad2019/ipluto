<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Twilio\Rest\Client;
use Auth;
use TwilioMsg;
use App\Notifications\AdminOrder;
use App\Notifications\UserEnroll;
use App\User;
use App\Course;
use Notification;


class TestController extends Controller
{
    
   	public function test()
   	{

   		$cor = Course::where('id', '1')->first();

        $course = [
          'title' => $cor->title,
          'image' => $cor->preview_image,
        ];

        

        $order_id = '1';
        $url = route('view.order', $order_id);


   		$user = User::where('id', $cor->user_id)->first();
        Notification::send($user,new AdminOrder($course, $order_id, $url));
   	}

   	
   

}
