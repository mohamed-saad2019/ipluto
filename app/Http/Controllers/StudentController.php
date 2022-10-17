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

             $my_teacher      =  $teacher_lesson->with('instructor')->get();

            $folder_id        = 0 ;
           
             if(request()->has('folder_id') and !empty(request('folder_id')))
             {
                $folder_id   = request('folder_id') ;
             }

             $myLesson       =  Lessons::whereIN('id',$instructor_sub->pluck('lesson_id')->toArray())
                                         ->where('folder_id',$folder_id)->get();

             $myFolder       = Folders::whereIN('instructor_id',$instructor_sub->pluck('instructor_id')
                            ->toArray())->where('parent_id',request('folder_id'))->get();

             return view('student.lessons',compact('my_teacher','folder_id','myLesson','myFolder'));   
            
        }

        else
        {
            return redirect(url('/student/profile'));
        }
           
    }
        
 }
