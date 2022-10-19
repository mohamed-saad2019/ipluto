<?php

namespace App\Http\Controllers;

use App\Classes;
use App\ClassesStudent;
use App\Lessons;
use App\Folders;
use App\ShareLessons;
use App\ChildCategory;
use Illuminate\Http\Request;
use Auth;
use App\InstructorGrade;
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
            
            $folder_id  = null ; $path = 0;  

             $my_teachers  =  $teacher_lesson->with('instructor')->get();
            
             if(request()->has('instructor_id') and !empty(request('instructor_id')))
             {
                $my_teacher =  User::where('id',request('instructor_id'))->first();

             }
             else
             {
               $my_teacher =  User::where('id',$teacher_lesson->pluck('instructor_id')[0])->first();
             }

           
             if(request()->has('folder_id') and !empty(request('folder_id')))
             {
                $folder_id   = request('folder_id') ;
             }

            $myLessons       =  Lessons::where('instructor_id',$my_teacher->id)->where('saved',1)
                             ->where('folder_id',$folder_id)->orderBy('updated_at','DESC')->get();


             $myFolders      = Folders::where('instructor_id',$my_teacher->id)
                            ->where('parent_id',request('folder_id'))->orderBy('id','ASC')->get();

              $d = explode(',', get_parent(request('folder_id')));

              $path = Folders::whereIn('id',$d)->where('instructor_id',$my_teacher->id)
                             ->orderBy('id','ASC')->get();


            return view('student.lessons',compact('my_teacher','folder_id','myLessons','myFolders'
                        ,'path','my_teachers'));  
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
        
 }
