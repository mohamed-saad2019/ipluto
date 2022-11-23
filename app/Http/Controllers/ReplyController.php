<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\Reply;
use Illuminate\Support\Facades\Redirect;

class ReplyController extends Controller
{
    public function store(Request $request)
    {
        if($request->comment_id != "" && $request->reply != "" && $request->video_id  && $request->student_id && $request->instructor_id && $request->lesson_id)
        {
            Reply::create([
                "comment_id"       => $request->comment_id ,
                "reply"       => $request->reply ,
                "video_id"      => $request->video_id ,
                "student_id"    => $request->student_id ,
                // "instructor_id" => $request->instructor_id ,
                "lesson_id"     => $request->lesson_id 
            ]);

            return Redirect::back()->with('success','replay added successfully ');
        }else{
            return Redirect::back()->with('error','It is not possible to add reply to this comment');
        }
    }

}
