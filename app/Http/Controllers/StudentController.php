<?php

namespace App\Http\Controllers;

use App\Classes;
use App\ClassesStudent;
use App\InstructorsSubjects;
use App\Lessons;
use App\Folders;
use App\ShareLessons;
use App\ChildCategory;
use App\Comment;
use Illuminate\Http\Request;
use Auth;
use DB;
use App\InstructorGrade;
use App\LibraryFile;
use App\File;
use App\Notification;
use App\User;
class StudentController extends Controller
{
  
   public function profile()
    {
     $count =  Notification::where('notifiable_type','today_class')->where('student_id',auth()->user()->id)
             ->whereDate('notify_date',now())->count();
        if($count == 0 and !empty(get_student_subjects()))
        {
            $day = \Carbon\Carbon::parse(now())->locale('en')->dayName;

            foreach(get_student_subjects() as $class)
            {
              $class_day = DB::table('class_days')->where('class_id',$class->id)->where('day',$day)->first();

              if($class_day) 
                {
                    
                  Notification::create([
                        'type'            => 'ipluto',
                        'notifiable_type' => 'today_class',
                        'notifiable_id'   => $class->id,
                        'data'            => "Today class ("
                                              .ucwords($class->name).'  ) in '.$class_day->time.':00',
                        'student_id'      => auth()->user()->id,
                        'reading'         => 0,
                        'created_by'      =>'-1',
                        'notify_date'=> \Carbon\Carbon::parse(now())->format('Y-m-d').' '.$class_day->time.':00'
                       ]);
                    
                }
            }
        }
       
        return view('student.profile');
    }

    public function joinClass()
    {
        if(request()->has('class_key') and !empty(request('class_key')))
        {
          $class = getClassByKey(request('class_key'));
          $sub   = '';
          if(!empty($class))
            {
            $class_student = ClassesStudent::where('class_id',$class->id)->where('student_id',auth()->user()->id)->first(); 
             if(!empty($class_student))
              {
               \Session::flash('error','You are already a member of the class');
              }
             else
             {
                 DB::insert("INSERT INTO `classes_student`(`id`, `class_id`, `teacher_id`, `student_id`, `status`, `created_at`) VALUES (NULL,'".$class->id."','".$class->instructor_id."','".auth()->user()->id."','-1',NOW())") ;

                \Session::flash('info','A request has been made to join the class, pending approval from the administrators');
             }
            }
          else
           {
              \Session::flash('error','An error in the class code');
           }
                return redirect(url('/student/profile'));
        }
    }


    public function lessons()
    {

        if(request()->has('subject_id') and !empty(request('subject_id')))
        {

          $class_share    = ShareLessons::where('student_id',\Auth::user()->id)->where('status','1')
                            ->pluck('class_id');

          if(request()->has('class_id') and !empty(request('class_id')))
          {
            $class_share    = ShareLessons::where('student_id',\Auth::user()->id)->where('status','1')
                            ->where('class_id',request('class_id'))->pluck('class_id');
          }
         
          $class_active   =  \DB::table('classes_student')->whereIn('class_id',$class_share)->where('student_id',\Auth::user()->id)->where('status','1')->pluck('class_id');
 
          $instructor_sub = ShareLessons::where('student_id',\Auth::user()->id)
                            ->where('status','1')->whereIn('class_id',$class_active);
 
          $teacher_lesson = InstructorsSubjects::where('subject_id',request('subject_id'))
          ->whereIN('instructor_id',$instructor_sub->pluck('instructor_id')->toArray());

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
                          ->where('status',1)
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
              \Session::flash('info','The lesson is empty, it does not contain any materials.');

              return  redirect(url('/student/profile'));
          } 
            
        }

        else
        {
            return redirect(url('/student/profile'));
        }
           
    }
        

    public function videos(Request $request)
    {
      $lesson_id   =  $request->lesson_id ;
      $file_id     =  $request->file_id ;
      $subject_id  =  0 ;
      if(request()->has('subject_id') and !empty(request('subject_id')))
      {
        $subject_id = $request->subject_id ;
        $lessons    = Lessons::where('subject',$subject_id)->where('ensure_save',1)
                          ->where('status',1)->pluck('id')->toArray();
       
        $files = File::with("instructor:id,fname,lname,user_img")
            ->WhereIn("lesson_id",$lessons)
            // ->Where("hash_name",'!=','Video From Dashboard')
            ->Where('mime_type', 'like', '%video%')
            ->select("id","file_name","path","hash_name","lesson_id","instructor_id","likes","dislikes","created_at")
            ->orderBy('id','ASC')
            ->get();
      }
      else
     {
        $files = File::with("instructor:id,fname,lname,user_img")
            ->Where("lesson_id",$lesson_id)
            // ->Where("hash_name",'!=','Video From Dashboard')
            ->Where('mime_type', 'like', '%video%')
            ->select("id","file_name","path","hash_name","lesson_id","instructor_id","likes","dislikes","created_at")
            ->orderBy('id','ASC')
            ->get();
     }

      $mainVideo  = File::with("instructor:id,fname,lname,user_img")
            ->Where("lesson_id",$lesson_id)
            // ->Where("hash_name",'!=','Video From Dashboard')
            ->Where('mime_type', 'like', '%video%')
            ->select("id","file_name","path","hash_name","lesson_id","instructor_id","likes","dislikes","viewers","created_at")
            ->find($file_id);

      File::where('id',$mainVideo->id)->increment('viewers' , 1);
      
      $comments = Comment::with('student:id,user_img,fname,lname','instructor:id,user_img,fname,lname','replys.student:id,user_img,fname,lname','replys.instructor:id,user_img,fname,lname')
                          ->Where("lesson_id",$lesson_id)
                          ->Where("video_id",$file_id)
                          ->orderBy('id','DESC')
                          ->get();
      // return $comments ;
      return view("student.showlist" , compact("files","mainVideo","lesson_id","comments","subject_id"));

      
    }
    
    public function view_lesson()
    {
      if(request()->has('lesson_id') and !empty(request('lesson_id')))
      {
         $files = File::Where("lesson_id",request('lesson_id'))
                        ->orderBy('id','ASC')
                        ->get();
        return view('student.view_lesson',compact('files'));
      }
      return back();
    }

    public function subject_videos(Request $request)
    {
         $subject_id = $request->subject_id ;
      
         $lesson_share  = ShareLessons::where('student_id',\Auth::user()->id)->where('status','1')
                        ->where('class_id',request('class_id'))->pluck('lesson_id')->toArray();

         $lessons    = Lessons::whereIn('id',$lesson_share)->where('ensure_save',1)
                          ->where('status',1)->pluck('id')->toArray();
          
         $videos  = File::with("instructor:id,fname,lname,user_img")
                ->WhereIn("lesson_id",$lessons)
                // ->Where("hash_name",'!=','Video From Dashboard')
                ->Where('mime_type', 'like', '%video%')
                ->orderBy('created_at','DESC')->get();

          return view("student.show_library" , compact("videos"));      
    }
 }
