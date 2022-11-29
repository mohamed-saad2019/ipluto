<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\Reply;
use Illuminate\Support\Facades\Redirect;
use Auth ;

class ReplyController extends Controller
{
    public function store(Request $request)
    {
        if(Auth::User()['role'] == "user")
        {
            $columnName  = "student_id" ;
            $columnValue = $request->student_id ;
        }else{
            $columnName  = "instructor_id" ;
            $columnValue = $request->instructor_id ;
        }

        if($request->comment_id != "" && $request->reply != "" && $request->video_id  && $columnValue && $request->instructor_id && $request->lesson_id)
        {
            Reply::create([
                "comment_id"   => $request->comment_id ,
                "reply"        => $request->reply ,
                "video_id"     => $request->video_id ,
                $columnName    => $columnValue ,
                "lesson_id"     => $request->lesson_id 
            ]);

            return Redirect::back()->with('success','replay added successfully ');
        }else{
            return Redirect::back()->with('error','It is not possible to add reply to this comment');
        }
    }

}
