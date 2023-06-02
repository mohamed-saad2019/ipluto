<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Lessons;
use App\Folders;
use App\Classes;
use Auth;
use DB;
class LessonController extends Controller
{
    public function index(Request $request)
    {
        $lessons = Lessons::where('instructor_id','=',auth()->user()->id)
                            ->where('subject','=',auth()->user()->subject_id)
                            ->where( function($q)use($request){
                                if(isset($request->class_id) && $request->class_id != 0 )
                                {
                                    $q->whereHas('classes') ;
                                }
                            })->with('classes')
                            ->orderBy('id','DESC')->get();

        $class  = Classes::find($request->class_id); 

        return view ('instructor.lessons.index' , compact('lessons','class')) ;
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

 
  public function status_share_lesson()
    {
         if (request('class_id') and !empty(request('class_id')) 
            and request('lesson_id') and !empty(request('lesson_id'))) 
          {
    
           $st =  DB::table('share_lessons')->where('lesson_id',request('lesson_id'))
                     ->where('class_id',request('class_id'))->first();

             if ($st->status == '0') {
             DB::table('share_lessons')->where('lesson_id',request('lesson_id'))
                     ->where('class_id',request('class_id'))->update(['status'=>'1']);
             }

            else
            {
              DB::table('share_lessons')->where('lesson_id',request('lesson_id'))
                     ->where('class_id',request('class_id'))->update(['status'=>'0']);
            } 
        }

        return true;
    }


   
}
