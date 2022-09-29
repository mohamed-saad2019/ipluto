<?php

namespace App\Http\Controllers;

use App\Classes;
use App\ClassesStudent;
use App\Lessons;
use App\ShareLessons;
use Illuminate\Http\Request;

class ClassController extends Controller
{

    public function share($lesson_id)
    {

        $lesson     = Lessons::findOrfail($lesson_id);
        $classes    = Classes::with('sharelesson.student')->where([['instructor_id' , $lesson->instructor_id] , ['grade_id' , $lesson->grade ]])->get() ;
        $share      = ShareLessons::where('lesson_id',$lesson_id)->get();

        // return $classes ;
        return view("instructor.classes.share" , compact('classes','lesson','share')) ;
    }

    public function getStudentInClass()
    {
        if(request()->ajax())
        {
            $class_id   = request()->class_id ;
            $teacher_id = auth()->user()->id ;
            $div_id   = request()->div_id ;

            $students = ClassesStudent::with('student')->where([['class_id',$class_id],['teacher_id' , $teacher_id ]])->get();

            $content = '<div class="form-group col-md-3 student_'.$div_id.'"><label>Students </label></div>' ;
            $content .= '<div class="form-group col-md-9 form1 student_'.$div_id.'" >' ;
            $content .= '<select class="form-control select2"  multiple name="class_students[]" required>' ;
            foreach($students as $item)
            {
                $content .= '<option value="'.$class_id.'_'.$item->student->id.'">'.$item->student->fname . ' ' .$item->student->lname.'</option>' ; 
            }
            $content .= '</select></div>' ;
            echo $content ;
            exit ;
        }
    }

    public function getClasses()
    {
        if(request()->ajax())
        {
            $lesson_id  = request()->lesson_id ;
            $lesson     = Lessons::findOrfail($lesson_id);
            $classes    = Classes::where([['instructor_id' , $lesson->instructor_id] , ['grade_id' , $lesson->grade ]])->get() ;
            $rand_id = rand('1111','9999') ;
            $content = '<div class="form-group col-md-3 form1"><label>Choose Class </label></div><div class="accordion col-md-9 form1" >' ;
            $content .= '<select class="choosedClass" id="'.$rand_id.'" name="class_id[]" required >' ;
            $content .= '<option value="">Choose Class</option>' ;
            foreach($classes as $item)
            {
                $content .= '<option value="'.$item->id.'">'.$item->name.'</option>' ; 
            }
            $content .= '</select></div>' ;
            echo $content;
            exit;  
        }
    }

    public function saveShare(Request $request)
    {

        ShareLessons::where('lesson_id',$request->lesson_id)->delete();
        foreach($request->class_students as $_item)
        {
            $explode_item   =   explode('_',$_item);
            $class_id       =   $explode_item[0] ;
            $student_id     =   $explode_item[1] ;

            ShareLessons::create([
                "lesson_id"         =>  $request->lesson_id ,
                "class_id"          =>  $class_id ,
                "instructor_id"     =>  auth()->user()->id ,
                "student_id"        =>  $student_id ,
                "type"              =>  'lesson' 
            ]);
        }

        \Session::flash('success','Updated successfully'); 
        return back();
        
    }

}
