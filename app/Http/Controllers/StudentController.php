<?php

namespace App\Http\Controllers;

use App\Classes;
use App\ClassesStudent;
use App\Lessons;
use App\Folders;
use App\ShareLessons;
use App\ChildCategory;
use App\Comment;
use Illuminate\Http\Request;
use Auth;
use App\InstructorGrade;
use App\LibraryFile;
use App\File;
use App\User;
class StudentController extends Controller
{
  
   public function profile()
    {
        return view('student.profile');
    }


    public function lessons()
    {

        if(request()->has('subject_id') and !empty(request('subject_id')))
        {
         $instructor_sub  = ShareLessons::where('student_id',\Auth::user()->id);

         $teacher_lesson = InstructorGrade::where('subject_id',request('subject_id'))
         ->whereIN('instructor_id',$instructor_sub->pluck('instructor_id')->toArray())
         ->where('grade_id',\Auth::user()->grade);

         if($teacher_lesson->pluck('instructor_id')->count() != 0)

          {
            
            $folder_id  = 0 ; $path = 0;  

           $my_teachers  =  $teacher_lesson->with('instructor')->get();
           
           $my_teacher =  User::where('id',$teacher_lesson->pluck('instructor_id')[0])->first();
             

           
             if(request()->has('folder_id') and !empty(request('folder_id')))
             {
                $folder_id   = request('folder_id') ;
             }

            $myLessons  = Lessons::whereIn('id',$instructor_sub->pluck('lesson_id'))
                          ->where('instructor_id',$my_teacher->id)
                          ->where('ensure_save',1)
                          ->where('folder_id',$folder_id)->orderBy('updated_at','DESC')
                          ->get();


             $myFolders = Folders::where('instructor_id',$my_teacher->id)
                         ->where('parent_id',request('folder_id'))->orderBy('id','ASC')
                         ->get();

              $d = explode(',', get_parent(request('folder_id')));

              $path = Folders::whereIn('id',$d)->where('instructor_id',$my_teacher->id)
                             ->orderBy('id','ASC')->get();


            return view('student.lessons',compact('my_teacher','folder_id','myLessons','myFolders','path','my_teachers'));  
          }
          else
          {
              \Session::flash('info','There are no teachers for this subject');

              return  redirect('/student/profile?subject_id='.request('subject_id'));
          } 
            
        }

        else
        {
            return redirect(url('/student/profile'));
        }
           
    }
        

    public function videos(Request $request)
    {
      $lesson_id = $request->lesson_id ;
      $file_id   = $request->file_id ;

      $files = File::with("instructor:id,fname,lname,user_img")
            ->Where("lesson_id",$lesson_id)
            ->Where("hash_name",'!=','Video From Dashboard')
            ->Where('mime_type', 'like', '%video%')
            ->select("id","file_name","path","hash_name","lesson_id","instructor_id","created_at")
            ->orderBy('id','ASC')
            ->get();

      $mainVideo  = File::with("instructor:id,fname,lname,user_img")
            ->Where("lesson_id",$lesson_id)
            ->Where("hash_name",'!=','Video From Dashboard')
            ->Where('mime_type', 'like', '%video%')
            ->select("id","file_name","path","hash_name","lesson_id","instructor_id","created_at")
            ->find($file_id);

      $comments = Comment::with('student:id,user_img,fname,lname')
                          ->Where("lesson_id",$lesson_id)
                          ->Where("video_id",$file_id)
                          ->orderBy('id','DESC')
                          ->get();

      return view("student.showlist" , compact("files","mainVideo","lesson_id","comments"));

      
    }
 }
