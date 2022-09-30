<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Lessons;
use Auth;

class LessonController extends Controller
{
    public function index(Request $request)
    {
        $lessons = Lessons::where('instructor_id','=',auth()->user()->id)
                            ->where( function($q)use($request){
                                if(isset($request->class_id) && $request->class_id != 0 )
                                {
                                    $q->whereHas('classes') ;
                                }
                            })
                            ->orderBy('id','DESC')->get();
        return view ('instructor.lessons.index' , compact('lessons')) ;
    }
}
