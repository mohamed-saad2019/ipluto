<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use Illuminate\Support\Facades\Redirect;

class CommentController extends Controller
{
    public function store(Request $request)
    {

        if($request->comment != "" && $request->video_id  && $request->student_id && $request->instructor_id && $request->lesson_id)
        {
            Comment::create([
                "video_id"      => $request->video_id ,
                "student_id"    => $request->student_id ,
                "instructor_id" => $request->instructor_id ,
                "lesson_id"     => $request->lesson_id ,
                "comment"       => $request->comment
            ]);

            return Redirect::back()->with('success','Comment added successfully ');
        }else{
            return Redirect::back()->with('error','It is not possible to add comments to this video');
        }
    }

}
