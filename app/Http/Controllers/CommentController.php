<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\Lessons;
use App\Like;
use App\File;
use App\Reply;
use Illuminate\Support\Facades\Redirect;
use Auth ;

class CommentController extends Controller
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

        if($request->comment != "" && $request->video_id  && $columnValue && $request->instructor_id && $request->lesson_id)
        {
            Comment::create([
                "video_id"      => $request->video_id ,
                $columnName     => $columnValue ,
                "lesson_id"     => $request->lesson_id ,
                "comment"       => $request->comment
            ]);

            return Redirect::back()->with('success','Comment added successfully ');
        }else{
            return Redirect::back()->with('error','It is not possible to add comments to this video');
        }
    }


    public function savelikeOrDislike(Request $request){
        $action     = $request->action ;
        $type       = $request->type ;
        $typeUser   = $request->typeUser ;
        $typeUserId = $request->typeUserId ;
        $type_id    = $request->type_id ;

        if($type == 'video')
        {
            $colum_name = 'video_id' ;
        }elseif($type == 'comment'){
            $colum_name = 'comment_id' ;
        }elseif($type == 'reply'){
            $colum_name = 'reply_id' ;
        }

        if($typeUser == 'student')
        {
            $colum_user_name = 'student_id' ;
        }elseif($typeUser == 'instructor'){
            $colum_user_name = 'instructor_id' ;
        }

        if($action == 'like' || $action == 'dislike' )
        {
            Like::create([
                'like'      =>  ($action == 'like') ? 1 : 0 ,
                $colum_name =>  $type_id ,
                $colum_user_name   =>  $typeUserId 
            ]);
        }else{
            Like::where($colum_name , $type_id)
                ->where($colum_user_name   ,  $typeUserId)
                ->where('like' ,($action == 'removelike') ? 1 : 0 )
                ->delete() ;
        }

        $data['likes']  =   Like::where($colum_name , $type_id)
                                    // ->where($colum_user_name   ,  $typeUserId)
                                    ->where('like' ,1)
                                    ->count();

        $data['dislikes'] =  Like::where($colum_name , $type_id)
                                    // ->where($colum_user_name   ,  $typeUserId)
                                    ->where('like' ,0)
                                    ->count();

        if($type == 'video')
        {
            File::where('id',$type_id)->update(['likes' => $data['likes'] , 'dislikes' => $data['dislikes']]);
        }elseif($type == 'comment'){
            $colum_name = 'comment_id' ;
            Comment::where('id',$type_id)->update(['likes' => $data['likes'] , 'dislikes' => $data['dislikes']]);
        }elseif($type == 'reply'){
            Reply::where('id',$type_id)->update(['likes' => $data['likes'] , 'dislikes' => $data['dislikes']]);
        }            

        return json_encode($data) ;

    }
}
