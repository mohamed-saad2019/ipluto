<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Lessons;
use App\Folders;
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



   public function add_lesson_to_folder()
   {
     if (request('lesson_id') and !empty(request('lesson_id'))
        and request('folder_id') and !empty(request('folder_id')) )      
      {
           
        $input = Lessons::where('id',request('lesson_id'))
              ->update(['folder_id' => request('folder_id')]);
             
    return redirect(url('instructor/library?id='.request('folder_id').'&parent_id='.request('parent_id')));
        
       }

     return back();

   }

   
}
