<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Charts\OrderChart;
use App\Order;
use App\User;
use App\CompletedPayout;
use App\Charts\InstrctorPayoutChart;
use DB;
use Carbon\Carbon;
use App\Folders;
use App\Lessons;
use App\Library;
use App\LibraryFile;
use App\ChildCategory;
use App\SubCategory;
use App\File;
use App\InstructorStudents;
use App\Video;
use App\Excel\SimpleXLSX;
use App\ClassesStudent;
use App\ShareLessons;
use App\Classes;

class InstructorController extends Controller
{


    public function index()
    {   
        if(Auth::User()->role == "instructor")
        {
            

          
            $userenroll = array(
                Order::where('instructor_id', Auth::user()->id)->whereMonth('created_at', '01')->where('status', '1')
                    ->whereYear('created_at', date('Y'))
                    ->count(), //January
                Order::where('instructor_id', Auth::user()->id)->whereMonth('created_at', '02')->where('status', '1')
                    ->whereYear('created_at', date('Y'))
                    ->count(), //Feb
                Order::where('instructor_id', Auth::user()->id)->whereMonth('created_at', '03')->where('status', '1')
                    ->whereYear('created_at', date('Y'))
                    ->count(), //March
                Order::where('instructor_id', Auth::user()->id)->whereMonth('created_at', '04')->where('status', '1')
                    ->whereYear('created_at', date('Y'))
                    ->count(), //April
                Order::where('instructor_id', Auth::user()->id)->whereMonth('created_at', '05')->where('status', '1')
                    ->whereYear('created_at', date('Y'))
                    ->count(), //May
                Order::where('instructor_id', Auth::user()->id)->whereMonth('created_at', '06')->where('status', '1')
                    ->whereYear('created_at', date('Y'))
                    ->count(), //June
                Order::where('instructor_id', Auth::user()->id)->whereMonth('created_at', '07')->where('status', '1')
                    ->whereYear('created_at', date('Y'))
                    ->count(), //July
                Order::where('instructor_id', Auth::user()->id)->whereMonth('created_at', '08')->where('status', '1')
                    ->whereYear('created_at', date('Y'))
                    ->count(), //August
                Order::where('instructor_id', Auth::user()->id)->whereMonth('created_at', '09')->where('status', '1')
                    ->whereYear('created_at', date('Y'))
                    ->count(), //September
                Order::where('instructor_id', Auth::user()->id)->whereMonth('created_at', '10')->where('status', '1')
                    ->whereYear('created_at', date('Y'))
                    ->count(), //October
                Order::where('instructor_id', Auth::user()->id)->whereMonth('created_at', '11')->where('status', '1')
                    ->whereYear('created_at', date('Y'))
                    ->count(), //November
                Order::where('instructor_id', Auth::user()->id)->whereMonth('created_at', '12')->where('status', '1')
                    ->whereYear('created_at', date('Y'))
                    ->count(), //December
            );

            $userEnrolled = new OrderChart;
            $userEnrolled->labels(['January', 'Febuary', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December']);
            $userEnrolled->label('Enrolled Users')->title('Total Orders in ' . date('Y'))->dataset('Monthly Enrolled Users', 'area', $userenroll)->options([
                'fill' => 'true',
                'shadow' => true,
                'borderWidth' => '2',
                'color' => '#f9616d',
               
            ]);


            $completed = array(
                CompletedPayout::where('user_id', Auth::user()->id)->whereMonth('created_at', '01')->where('pay_status', '1')
                    ->whereYear('created_at', date('Y'))
                    ->count(), //January
                CompletedPayout::where('user_id', Auth::user()->id)->whereMonth('created_at', '02')->where('pay_status', '1')
                    ->whereYear('created_at', date('Y'))
                    ->count(), //Feb
                CompletedPayout::where('user_id', Auth::user()->id)->whereMonth('created_at', '03')->where('pay_status', '1')
                    ->whereYear('created_at', date('Y'))
                    ->count(), //March
                CompletedPayout::where('user_id', Auth::user()->id)->whereMonth('created_at', '04')->where('pay_status', '1')
                    ->whereYear('created_at', date('Y'))
                    ->count(), //April
                CompletedPayout::where('user_id', Auth::user()->id)->whereMonth('created_at', '05')->where('pay_status', '1')
                    ->whereYear('created_at', date('Y'))
                    ->count(), //May
                CompletedPayout::where('user_id', Auth::user()->id)->whereMonth('created_at', '06')->where('pay_status', '1')
                    ->whereYear('created_at', date('Y'))
                    ->count(), //June
                CompletedPayout::where('user_id', Auth::user()->id)->whereMonth('created_at', '07')->where('pay_status', '1')
                    ->whereYear('created_at', date('Y'))
                    ->count(), //July
                CompletedPayout::where('user_id', Auth::user()->id)->whereMonth('created_at', '08')->where('pay_status', '1')
                    ->whereYear('created_at', date('Y'))
                    ->count(), //August
                CompletedPayout::where('user_id', Auth::user()->id)->whereMonth('created_at', '09')->where('pay_status', '1')
                    ->whereYear('created_at', date('Y'))
                    ->count(), //September
                CompletedPayout::where('user_id', Auth::user()->id)->whereMonth('created_at', '10')->where('pay_status', '1')
                    ->whereYear('created_at', date('Y'))
                    ->count(), //October
                CompletedPayout::where('user_id', Auth::user()->id)->whereMonth('created_at', '11')->where('pay_status', '1')
                    ->whereYear('created_at', date('Y'))
                    ->count(), //November
                CompletedPayout::where('user_id', Auth::user()->id)->whereMonth('created_at', '12')->where('pay_status', '1')
                    ->whereYear('created_at', date('Y'))
                    ->count(), //December
            );


            $payout = new InstrctorPayoutChart;
            $payout->labels(['January', 'Febuary', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December']);
            // $payout->label('My Payout')->title('Total Payout in ' . date('Y'))->dataset('Monthly Payout', 'bar', $completed)

            $payout->title('Monthly Registered Users in ' . date('Y'))->dataset('Monthly Registered Users', 'bar', $completed)
            ->backgroundColor("rgba(80,111,228,0.4)")
            ->color("rgba(80,111,228,0.4)")
            ->dashed([0])
            ->fill(true)
            ->linetension(0.1);

           

            // User::select(DB::raw("COUNT(*) as count"))
            // ->where('created_at', '>', Carbon::today()->subDays(6))
            // ->groupBy(DB::raw("Date(created_at)"))
            // ->pluck('count');




            $users =   CompletedPayout::select(DB::raw("COUNT(*) as count"))
                ->whereYear('created_at',date('Y'))
                ->groupBy(DB::raw("Month(created_at)"))
                ->pluck('count');
                
            $months =  CompletedPayout::select(DB::raw("Month(created_at) as month"))
                    ->whereYear('created_at',date('Y'))
                    ->groupBy(DB::raw("Month(created_at)"))
                    ->pluck('month');

            $datas = [0,0,0,0,0,0,0,0,0,0,0,0];
            foreach($months as $index => $month)
            {
                $datas[$month-1] = $users[$index];
            }  



            $users =    Order::select(DB::raw("COUNT(*) as count"))
                ->whereYear('created_at',date('Y'))
                ->groupBy(DB::raw("Month(created_at)"))
                ->pluck('count');
                
            $months =   Order::select(DB::raw("Month(created_at) as month"))
                    ->whereYear('created_at',date('Y'))
                    ->groupBy(DB::raw("Month(created_at)"))
                    ->pluck('month');

            $datas1 = [0,0,0,0,0,0,0,0,0,0,0,0];
            foreach($months as $index => $month)
            {
                $datas1[$month-1] = $users[$index];
            }  

            return view('instructor.dashboard', compact('userEnrolled', 'payout','datas','datas1'));
        }
        else
        {
            return back()->with('success',trans('flash.NotFound'));
        }
    }

    public function library()
    {
     if(Auth::User()->role == "instructor")
        {

        $path ='';$d=''; $lessons=[];$orderBy ='updated_at';

        $sort  = request()->has('sort')?request('sort'):'Recent';

                if    ($sort == 'Size') {$orderBy = 'size';} 
                elseif($sort =='Title') {$orderBy = 'change_default_name';}
                else                    {$orderBy = 'updated_at';}

                 if(!request()->has('id'))
                 {
                    $folders = Folders::where('parent_id',Null)->where('instructor_id',\Auth::user()->id )->orderBy('id','ASC')->get();

                    $lessons = Lessons::where('instructor_id','=',\Auth::user()->id)
                              ->orderBy($orderBy,'DESC')->where('saved',1)->where('folder_id',0)->get();
                 }
                 else
                 {
                     
                      $d = explode(',', get_parent(request('id')));

                      $path = Folders::whereIn('id',$d)->where('instructor_id',\Auth::user()->id )->orderBy('id','ASC')->get();

                      $folders = Folders::where('parent_id',request('id'))->where('instructor_id',\Auth::user()->id )->orderBy('id','ASC')->get();

                     $lessons = Lessons::where('instructor_id','=',\Auth::user()->id)
                      ->orderBy($orderBy,'DESC')->where('saved',1)->where('folder_id',request('id'))->get();
                 }
    
                   $l =Lessons::where('saved','=',0)->orWhere('saved',null)->delete();
            
            return view('instructor.library',compact('folders','path','d','lessons','sort'));
        }

     else
     {
            return back()->with('success',trans('flash.NotFound'));
     }

    }

    public function add_lesson()
    {
     if(Auth::User()->role == "instructor")
       {
             $storage = \Auth::user()->storage==null?100:\Auth::user()->storage;
             $current_storage = str_replace("MB","",get_size_instructor());


                
                if($current_storage >= $storage)
                {
                        \Session::flash('success','You cannot add lessons because the storage space is enough (100MB), delete some lessons or do a space upgrade');

                         return back();
                }


        $full_name='';$id='';$des='';$subject='';$grade='';$files=[];$folder_id=0;
        $parent_id=0;$units='';$grade=0;$background='';



      if (!request()->has('id'))
      {

            $subject = get_subject_instructor(\Auth::user()->id);
          
            if(request()->has('folder_id') and !empty(request('folder_id')))
            {
                $folder_id = request('folder_id');
            }
            if(request()->has('parent_id') and !empty(request('parent_id')))
            {
                $parent_id = request('parent_id');
            }

           $lastInfo = DB::table('instructor_lessons')
            ->where('instructor_id',\Auth::user()->id)->orderBy('id', 'DESC')->first();

            $name = empty($lastInfo->last_lesson)?1:$lastInfo->last_lesson+1;

            $full_name = 'Untitled Lesson ( '.$name.' ) ';
            $input = Lessons::create(
                 ['name' => $full_name,
                'instructor_id'=>\Auth::user()->id,
                'last_lesson'=>$name,
                'saved'=>null,
                'folder_id'=>$folder_id]
                    );

            $id = $input->id;
      }

      else if(request()->has('id') and !empty(request('id')))
      {
          Lessons::where('id',request('id'))->update(['saved'=>1,]);

         $fetch = Lessons::where('id',request('id'))->first();
         $full_name = $fetch->name;
         $background = $fetch->background;
         $des = $fetch->des;
         $units = $fetch->unit;
         $grade = $fetch->grade;
         $subject= $fetch->subject;
         $id = request('id');
   
   $files = File::where('instructor_id',\Auth::user()->id)->where('lesson_id',request('id'))->get();

        $folder_id = Lessons::where('id',request('id'))->first()->folder_id;

        if(!empty(Folders::where('id',$folder_id)->first()))
        {
                    $parent_id = Folders::where('id',$folder_id)->first()->parent_id;            
        }

      }
       

        $subjects = ChildCategory::where('status', '1')->GroupBy('slug')->orderBy('id','ASC')->get();

        $grades   = SubCategory::where('status', '1')->orderBy('id','ASC')->get();

        // $all_units = Video::where('subject_id',$subject)->where('unit','!=','')
        //                     ->groupBy('unit')->pluck('unit')->toArray();
        $all_units = Video::where('unit','!=','')
                            ->groupBy('unit')->pluck('unit')->toArray();

          return view('instructor.add_lesson',compact('full_name','id','subjects','grades','des','subject','grade','files','folder_id','parent_id','units',
              'all_units','background'));
        }

    }


    public function transport_lesson()
    {

           if (request('l_id') and !empty(request('l_id'))
               and request('f_id') and !empty(request('f_id')) ) 
           {
            
            foreach (explode(',', request('l_id')) as $id)
             {
                $input = Lessons::where('id',$id)
                ->update(['folder_id' => request('f_id')]);
             }
         }

        return true;
          
    }

    public function update_lesson($id)
    {
        $validator = \Validator::make(request()->all(), [
            'name' => 'required|max:255|min:3', 
            'des' => 'nullable|string|max:500|min:3', 
            'img' =>  'nullable |image|mimes:jpeg,png,jpg',
            'grade' => 'required',
            'img' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'units'=>'required'
            ]); // create the validations
          
            if ($validator->fails())   
            {
                return \Response::json([
                    'response' => false,
                    'errors' => $validator->getMessageBag()->toArray()
                ], 422);
            }


           $count = Lessons::where('instructor_id',\Auth::user()->id)->where('name',request('name'))
                              ->where('id','!=',$id)->count();
            if($count != 0)
            {
               return -2;
            }

        $lastInfo = DB::table('instructor_lessons')->where('id',$id)->orderBy('id', 'DESC')->first();

        $name = empty($lastInfo->last_lesson)?1:$lastInfo->last_lesson+1;

        $units = '';
        if (request()->has('units') and !empty(request('units'))) {
           $units = implode(',', request('units'));
        }

        $full_name = request('name');

        
         if(request()->hasfile('img'))
         {
              
                $file = request()->file('img');
                $f_name = $file->getClientOriginalName();
                $hashName = $file->hashName();
                $file->store('public/'.\Auth::user()->id.'/'.$id);

         }

        $input = Lessons::where('id',$id)->update(
             ['name' => request('name'),
            'instructor_id'=>\Auth::user()->id,
            'last_lesson'=>$name,
            'saved'=>1,
            'des'=>request('des'),
            'subject'=>get_subject_instructor(\Auth::user()->id),
            'grade'=>request('grade'),
            'unit'=>$units,
            'background'=>\Auth::user()->id.'/'.$id.'/'.$hashName,
            'change_default_name'=>str_contains(request('name'), 'Untitled')?0:1
             ]);

          Lessons::where('instructor_id','=',\Auth::user()->id)->where('id','!=',$id)->where('saved',null)->delete();


        $id = request('id');
        $subject = request('subject');
        $grade = request('grade');
        $des = request('des');

        $subjects = ChildCategory::where('status', '1')->GroupBy('slug')->orderBy('id','ASC')->get();
        $grades   = SubCategory::where('status', '1')->orderBy('id','ASC')->get();

        
           return 1;



    }



    public function upload_files($id)
    {


       if (request()->hasFile('file'))
         {
               
                $file = request()->file('file');
                $size = $file->getSize();
                $mime_type = $file->getMimeType();
                $name = $file->getClientOriginalName();
                $hashName = $file->hashName();

            // if( check_file_size_allowed($size) == true)
            // {
               
                $add = File::create([
                    'file_name' =>  $name ,
                    'size'      =>  $size ,
                    'hash_name' =>  $hashName,
                    'path'      =>  \Auth::user()->id.'/'.$id,
                    'mime_type' =>  $mime_type ,
                    'file_type' =>  'Lessons',
                    'instructor_id'=> \Auth::user()->id,
                    'lesson_id'=>$id,
                ]);


                 $file->store('public/'.\Auth::user()->id.'/'.$id);
                 // return $add->id;

                 DB::table('instructor_lessons')->where('id',$id)
                    ->update([
                       'size'=>  get_size_lesson($id,'no_unit'),
                       'updated_at'=>now(),
                    ]);

                return response (['status' => true,'id'=>$add->id,'type'=>$add->mime_type,'size'=>$size,'name'=>$name] , 200 );
            // }
            // else
            // {
            //     return response (['status' => false,'size'=>$size,'name'=>$name] , 200 );
            // }
        }

        else if (request()->has('url') and !empty(request('url')))
         {
                   $add = File::create([
                    'file_name' =>  request('url') ,
                    'size'      =>  '' ,
                    'hash_name' =>  '',
                    'path'      =>  '',
                    'mime_type' =>  'url' ,
                    'file_type' =>  'Lessons',
                    'instructor_id'=> \Auth::user()->id,
                    'lesson_id'=>$id,
                ]);

              DB::table('instructor_lessons')->where('id',$id)
                    ->update([
                       'size'=>  get_size_lesson($id,'no_unit'),
                       'updated_at'=>now(),
                    ]);

            return redirect(url('instructor/add_lesson?id='.$id));
        }
    }


    public function attach_viedo()
    {
        
        $subject = get_subject_instructor(\Auth::user()->id);

        $grade   = request('grade');

        $grades = SubCategory::where('status', '1')->orderBy('id','ASC')->get();

        $all_units = Video::where('subject_id',$subject)->where('unit','!=','')
                            ->groupBy('unit')->pluck('unit')->toArray();

        

        if(request('unit') and is_array(request('unit')))
        {
            $units = request('unit');
        }
        else if (request('unit'))
        {
           $units = explode(',',request('unit'));
        }
        else
        {
            $units   = $all_units;
        }

        $videos = Video::where('status','1')->where('subject_id',$subject)->where('grade_id',$grade)
                        ->whereIn('unit',$units)->orderBy('id','DESC')->get() ;

        return view('instructor.videos' , compact('videos','grades','grade','units','all_units'));
    }

    public function add_viedo_to_lesson()
    {
      if (request()->has('videos') and !empty(request('videos')))
      {
        $total = 0; 

        foreach(request('videos') as $v)
        {
                  
          $count = File::where('file_name',$v)->where('instructor_id',\Auth::user()->id)->where('lesson_id',request('id'))->count();
          if($count==0)
                 {
                    File::create([
                    'file_name' =>  $v ,
                    'size'      =>  '' ,
                    'hash_name' =>  'Video From Dashboard',
                    'path' => $v ,
                    'mime_type' =>  'video/mp4' ,
                    'file_type' =>  'Lessons',
                    'instructor_id'=> \Auth::user()->id,
                    'lesson_id'=>request('id'),
                    ]);
                    $total++;
                }
        }
      
       \Session::flash('success',$total .' Videos added to lesson');

       return  redirect('instructor/add_lesson?id='.request('id'));
     }

     else
     {
        return back();
     }

    }


    public function del_lesson()
    {
    
        if (request('id') and !empty(request('id'))) {
            
             Lessons::where('id','=',request('id'))->delete();
             File::where('lesson_id',request('id'))->delete();
        }

        return back();
    }

     public function del_class()
    {
    
        if (request('id') and !empty(request('id'))) 
        {
           
            
             DB::table('classes')->where('id', request('id'))->delete();

             DB::table('class_days')->where('class_id', request('id'))->delete();

             DB::table('classes_student')->where('class_id', request('id'))->delete();

                         \Session::flash('success','Class has been deleted');
        }

        return back();
    }

     public function multiple_del_lesson()
    {
    
        if (request('id') and !empty(request('id'))) {
            
            foreach (explode(',', request('id')) as $id) {
                Lessons::where('id','=',$id)->delete();
                File::where('lesson_id',$id)->delete();
            }
        }

        return back();
    }

     public function del_sildes()
    {
    
        if (request('id') and !empty(request('id'))) {
            
            foreach (explode(',', request('id')) as $id) {

                             File::where('id',$id)->delete();
            }
        }

        return back();
    }


   public function duplicate_lesson()
    {
    
        if (request('id') and !empty(request('id'))) {

            $lastInfo = DB::table('instructor_lessons')
            ->where('instructor_id',\Auth::user()->id)->orderBy('id', 'DESC')->first();
            $name =$lastInfo->last_lesson+1;
            $full_name = 'Untitled Lesson ( '.$name.' ) ';


            $Lesson = Lessons::where('id','=',request('id'))->first();

            $input = Lessons::create(
                 [
                'name' => $full_name,
                'instructor_id'=>\Auth::user()->id,
                'last_lesson'=>$name,
                'saved'=>1,
                'subject'=>$Lesson->subject,
                'grade'=>$Lesson->grade,
                'folder_id'=>$Lesson->folder_id
                 ]
                    );

           $id = $input->id;

     $files = File::where('instructor_id',\Auth::user()->id)->where('lesson_id',request('id'))->get();

            // return request('id');
         foreach ($files as $file) {

                File::create([
                    'file_name' =>  $file->file_name ,
                    'size'      =>  $file->size ,
                    'hash_name' =>  $file->hashName,
                    'path'      =>  $file->path,
                    'mime_type' =>  $file->mime_type ,
                    'file_type' =>  'Lessons',
                    'instructor_id'=> \Auth::user()->id,
                    'lesson_id'=>$id,
                    ]);
         }

            \Session::flash('success',trans('Lesson duplicated'));

             return redirect(url('instructor/add_lesson?id='.$id));

           
        }

        return back();

    }

    public function saved_lesson()
    {

      if(request()->has('id') and !empty(request('id')))
      {
          Lessons::where('id',request('id'))->update(['saved'=>1,'ensure_save'=>1]);

          \Session::flash('success',trans('Lesson saved successfully'));

        if (request()->has('folder_id') and !empty(request('folder_id')) and request()->has('parent_id')) 
          {
            return redirect('/instructor/library?id='.request('folder_id').'&parent_id='.request('parent_id'));
          }

          return redirect('/instructor/library');
      }
    }

    public function add_class(Request $request)
    {
        $grades   = SubCategory::where('status', '1')->orderBy('id','ASC')->get();

        $student_instructor = InstructorStudents::where('instructor_id',\Auth::user()->id)->orderBy('id','DESC')->where('status','1')->pluck('student_id');
        
         $students = User::whereIn('id',$student_instructor)->where('role','user')->where('status','1')->get();
    

        return view('instructor.add_class' , compact('grades','students'));
    }



    public function store_class(Request $request)
    {
        $studentsAleardyExistsInOtherClass = [];

        if (!request()->has('students'))
        {
             $ch_file = 'required|file|mimes:xls,xlsx';
        }
        else
        {
             $ch_file = 'file|mimes:xls,xlsx';
        }

        $validator = \Validator::make($request->all(),[
            'name'=>'required|string',
            'file' => $ch_file,
         ],[],['name'=>'Class Name','file'=>'Class Students']);

         if ($validator->fails())   //check all validations are fine, if not then redirect and show error messages
            {
                return back()->withInput()->withErrors($validator);
            }

       $count = DB::select("SELECT count(*) as total FROM `classes` WHERE  `name` = '".request('name')."' AND `instructor_id` = '".auth()->user()->id."' ");

            if($count[0]->total != 0)
            {
                $validator = 'The Class Name has already been taken.';
                return back()->withInput()->withErrors($validator);
            }

 if ( $xlsx = SimpleXLSX::parse( request('file') ) )
                        {
                           $errors = [];$c=1;$total_adding=0;$total_not_adding=0;$st_ids=[];

                            foreach ( $xlsx->rows() as $r => $row )
                            {
                                if($r == 0)
                                {
                                    if(
                                        $row[0]  != 'First Name' and 
                                        $row[1]  != 'Last Name' and
                                        $row[2]  != 'E-mail' and
                                        $row[3]  != 'Phone Number' and
                                        $row[4]  != 'Password'
                                      )

                                    {
                                        $errors['namefile'] = '';
                                    }
                                }

                                if($r != 0)
                                {
                                    $students = [];
                                     $str = '';

                                    $students['fname']                     =   $row[0];
                                    $students['lname']                     =   $row[1];
                                    $students['email']                     =   $row[2];
                                    $students['mobile']                    =   $row[3];
                                    $students['password']                  =   $row[4];

                                     if ($students['fname'] =="" )
                                    {
                                        $str.='First name is blank ,';
                                    }

                                      if ($students['lname'] =="" )
                                    {
                                        $str.='Second name is blank ,';
                                    }
                                    if ($students['email'] == "" )
                                    {
                                        $str.='Email is blank ,';
                                    }else
                                    {
                                        if(checkMail($students['email']) == false )
                                        {
                                            $str.='Email is not valid ,';
                                        }
                                    }

                                   if ($students['mobile'] == "" )
                                    {
                                        $str.='Mobile is blank ,';
                                    }else
                                    {
                                        if(VerfiedPhoneNumber($students['mobile']) == false )
                                        {
                                            $str.='Mobile is not valid ,';
                                        }
                                    }

                                   $check  = checkDuplicated('mobile',$students['mobile']);
                                   $check1 = checkDuplicated('email',$students['email']);

                                            if($check==true or $check1)
                                            {

                                                $st_id =get_student($students['email'],$students['mobile']);

                                         if(check_student_in_instructor($st_id,\Auth::user()->id)==false)
                                                {
                                                         $input = InstructorStudents::create(
                                                     [
                                                    'instructor_id'=>\Auth::user()->id,
                                                    'student_id'=>$st_id,
                                                    'type'=>'center',
                                                    'status'=> '1' ,
                                                    'created_at'=>now(),
                                                    'updated_at'=>now(),
                                                     ]
                                                    );

                                                array_push($st_ids,$st_id);

                                                 $str.='This student is already registered on the system ... but is currently added to you in the list of students';

                                                }
                                               
                                         else
                                          {
                                                 $str.='This student is already registered on the system ... and added to you in the list of students';

                                                 array_push($st_ids,$st_id);

                                           }
                                              
                                         }

                             if(empty($str))
                            {
                                $students['password'] = \Hash::make($students['password']);
                                $students['email_verified_at'] = \Carbon\Carbon::now()->toDateTimeString(); 
                                $students['role'] = 'user';
                                $students['grade'] = $request->grade_id ;         
                               $data = User::create($students);
                               $data->save();

                                 $code = generate_student_code($data->id,$data->fname,$data->lname);
                                 User::where('id',$data->id)->update(['code'=>$code]);

                                $input = InstructorStudents::create(
                                 [
                                'instructor_id'=>\Auth::user()->id,
                                'student_id'=>$data->id,
                                'type'=>'center',
                                'status'=> '1' ,
                                'created_at'=>now(),
                                'updated_at'=>now(),
                                 ]
                                );
                               $total_adding++;
                              array_push($st_ids,$data->id);

                            }
                            else
                            {
                                $errors[$c] = $str;
                                $str='';
                                $total_not_adding++;    
                            }
                                    $c++;
                                    $i = $r;
                               }
                        }
                    }

    
        DB::insert("INSERT INTO `classes`(`id`, `name`, `instructor_id`, `grade_id`, `duration`, `status`, `created_at`) VALUES (NULL,'".$request->name."','".auth()->user()->id."','".$request->grade_id."','".$request->duration."','1',NOW())");
        $last_id = DB::getPdo()->lastInsertId();

         foreach($request->day as $k=>$_day)
         {
             DB::insert("INSERT INTO `class_days` (`id`,`class_id`,`day`,`time`,`created_at`) VALUE( NULL ,'".$last_id."' , '".$_day."' , '".$request->time[$k]."' ,NOW() ) ") ;
         }
        
         
      $arrs = [];
      if (request()->has('students') and !empty(request('students')) and !empty($st_ids))
      {
            $arrs = array_merge($request->students,$st_ids);
      }
      elseif (request()->has('students') and !empty(request('students')) and empty($st_ids)) {
            
            $arrs = $request->students;
      }

      elseif (!request()->has('students') and !empty($st_ids)) {
            
            $arrs = $st_ids;
      }

        foreach($arrs as $_s)
        {
            $checkStudentInClass = DB::select("SELECT * FROM `classes_student` WHERE  `student_id` = '".$_s."' AND `teacher_id` = '".auth()->user()->id."' LIMIT 1");

           if(empty($checkStudentInClass))
            {
                DB::insert("INSERT INTO `classes_student`(`id`, `class_id`, `teacher_id`, `student_id`, `status`, `created_at`) VALUES (NULL,'".$last_id."','".auth()->user()->id."','".$_s."',1,NOW())") ;
            }

              else
              {
                    array_push($studentsAleardyExistsInOtherClass, $_s);
              }

          if(check_student_in_instructor($_s,\Auth::user()->id)==false)
             {
                 $input = InstructorStudents::create(
                   [
                      'instructor_id'=>\Auth::user()->id,
                      'student_id'=>$_s,
                      'type'=>'center',
                      'status'=> '1' ,
                      'created_at'=>now(),
                      'updated_at'=>now(),
                    ]
                  );
            }
        }


        if(!empty($studentsAleardyExistsInOtherClass))
        {
        \Session::flash('info',count($studentsAleardyExistsInOtherClass).' No students were added because they are added to another class (delete them from the other class or move them to this class)'); 
        }

       \Session::flash('success','The Class has been successfully added'); 
       return redirect(route('list_classes'));

    }

    public function list_classes()
    {
        $classes = DB::select("SELECT * , (SELECT count(*) FROM `classes_student` WHERE class_id = `classes`.id ) AS count_students , (SELECT count(distinct lesson_id) FROM `share_lessons` sh WHERE sh.class_id = `classes`.id ) AS count_lessons FROM `classes` WHERE `instructor_id` = '".auth()->user()->id."' ORDER BY id DESC ");
        
        return view('instructor.list_classes' , compact('classes')) ;
 
    }

  public function edit_class()
    {
       if (request()->has('id') and !empty(request('id')))
        {
        
        $id = request('id');
        $grades   = SubCategory::where('status', '1')->orderBy('id','ASC')->get();

        $student_instructor = InstructorStudents::where('instructor_id',\Auth::user()->id)->orderBy('id','DESC')->where('status','1')->pluck('student_id');
        
         $students = User::whereIn('id',$student_instructor)->where('role','user')->where('status','1')->get();
    

        $class    =  DB::table('classes')->where('id', $id)->first();
        $days     =  DB::table('class_days')->where('class_id', $id)->get();
        $class_st = DB::table('classes_student')->where('class_id', $id)->pluck('student_id')->toArray();


        return view('instructor.edit_class' , compact('grades','students','class','days','class_st'));

       }
       return back;
    }



    public function update_class($id,Request $request)
    {
        $studentsAleardyExistsInOtherClass = [];
        $id = request('id');

        $validator = \Validator::make($request->all(),[
            'name'=>'required|string',
            'students' => 'required|array',
         ],[],['name'=>'Class Name','file'=>'Class Students']);

         if ($validator->fails())   //check all validations are fine, if not then redirect and show error messages
            {
                return back()->withInput()->withErrors($validator);
            }

       $count = DB::select("SELECT count(*) as total FROM `classes` WHERE  `name` = '".request('name')."' AND `instructor_id` = '".auth()->user()->id."' And `id` != '".request('id')."'");

            if($count[0]->total != 0)
            {
                $validator = 'The Class Name has already been taken.';
                return back()->withInput()->withErrors($validator);
            }

 
        DB::table('classes')
            ->where('id', $id)
            ->update(['name' =>request('name'),
                      'instructor_id'=>auth()->user()->id,
                      'grade_id'=>request('grade_id')]);

        DB::table('class_days')->where('class_id', request('id'))->delete();

        DB::table('classes_student')->where('class_id', request('id'))->delete();
        
         foreach(request('day') as $k=>$_day)
         {
             DB::insert("INSERT INTO `class_days` (`id`,`class_id`,`day`,`time`,`created_at`) VALUE( NULL ,'"
                .$id."' , '".$_day."' , '".request('time')[$k]."' ,NOW() ) ") ;
         }
        

        foreach(request('students') as $_s)
        {
            $checkStudentInClass = DB::select("SELECT * FROM `classes_student` WHERE  `student_id` = '".$_s."' AND `teacher_id` = '".auth()->user()->id."' LIMIT 1");

           if(empty($checkStudentInClass))
            {
                DB::insert("INSERT INTO `classes_student`(`id`, `class_id`, `teacher_id`, `student_id`, `status`, `created_at`) VALUES (NULL,'".$id."','".auth()->user()->id."','".$_s."',1,NOW())") ;
            }

              else
              {
                    array_push($studentsAleardyExistsInOtherClass, $_s);
              }

          if(check_student_in_instructor($_s,\Auth::user()->id)==false)
             {
                 $input = InstructorStudents::create(
                   [
                      'instructor_id'=>\Auth::user()->id,
                      'student_id'=>$_s,
                      'type'=>'center',
                      'status'=> '1' ,
                      'created_at'=>now(),
                      'updated_at'=>now(),
                    ]
                  );
            }
        }


        if(!empty($studentsAleardyExistsInOtherClass))
        {
         \Session::flash('info',count($studentsAleardyExistsInOtherClass).' No students were added because they are added to another class (delete them from the other class or move them to this class)'); 
        }

       \Session::flash('success','The Class has been successfully updated'); 
       return redirect(route('list_classes'));

    }


  public function change_class()
    {
       if(request()->has('student_id') and request()->has('new_class_id'))
        {
          $update =  DB::table('classes_student')
              ->where('student_id', request('student_id'))
              ->where('teacher_id',auth()->user()->id)
              ->update(['class_id' => request('new_class_id')]); 

          if ($update==0)
           {
             DB::insert("INSERT INTO `classes_student`(`id`, `class_id`, `teacher_id`, `student_id`, `status`, `created_at`) VALUES (NULL,'".request('new_class_id')."','".auth()->user()->id."','".request('student_id')."',1,NOW())") ;

                  \Session::flash('success','The Class has been successfully Added'); 

           }
         else
          {
                  \Session::flash('success','The Class has been successfully Updated'); 

          }
        }

      return back();

    }
    
    public function students_list()
    {
        if (request()->has('class_id')) 
        {
           $students = ClassesStudent::where('teacher_id',\Auth::user()->id)
           ->where('status','1')->where('class_id',request('class_id'))
           ->orderBy('id','DESC')->get();           
        }
        elseif (request()->has('type') and request('type')=='online') 
        {
           $students = InstructorStudents::where('instructor_id',\Auth::user()->id)->where('type','online')->orderBy('id','DESC')->get();
        }

        elseif (request()->has('type') and request('type')=='center') 
       {
            $students = InstructorStudents::where('instructor_id',\Auth::user()->id)->where('type','center')->orderBy('id','DESC')->get();
       }

       else
       {
            $students = InstructorStudents::where('instructor_id',\Auth::user()->id)->orderBy('id','DESC')->get();
       }
        $classes = DB::select("SELECT * , (SELECT count(*) FROM `classes_student` WHERE class_id = `classes`.id ) AS count_students FROM `classes` WHERE `instructor_id` = '".auth()->user()->id."' ORDER BY id DESC ");

         return view('instructor.add_students',compact('students','classes'));
    }

    public function add_students()
    {
     $students = InstructorStudents::where('instructor_id',\Auth::user()->id)->get();
     $grades   = SubCategory::where('status', '1')->orderBy('id','ASC')->get();
        return view('instructor.register_students',compact('students','grades'));
    }

    public function save_student()
    {

        if (request()->has('code') and !empty(request('code')))
         {
            $count = \App\User::where('code',request('code'))->count();

            if($count==0)
            {
             \Session::flash('success','This student is not on the system');
             
             redirect(url('instructor/add_students?code='.request('code')));
            }

            elseif ($count==1)
            {

             $data = \App\User::where('code',request('code'))->first();
           
             $check = InstructorStudents::where('instructor_id',\Auth::user()->id)->where('student_id',$data->id)->count();

              if($check==0)
              {

                 $input = InstructorStudents::create(
                 [
                'instructor_id'=>\Auth::user()->id,
                'student_id'=>$data->id,
                'type'=>'online',
                'status'=> '1' ,
                'created_at'=>now(),
                'updated_at'=>now(),
                 ]
                );

                $students = InstructorStudents::where('instructor_id',\Auth::user()->id)->get();

                \Session::flash('success','Student ( '.$data->fname.' '.$data->lname.' ) has been added successfully');
              }
              else
              {

                \Session::flash('success','This student was added ( '.$data->fname.' '.$data->lname.' ) from previously');
              }
    
             return back();

            }

            else
            {
               \Session::flash('success','Erorrs, please contact the supervisors'); 
             
               return back();
            }

         }
         return back();
    }


    public function del_student()
    {
         if (request('id') and !empty(request('id'))) {
    
             InstructorStudents::where('id',request('id'))->delete();
            
        }

         \Session::flash('success','Student has been successfully deleted'); 

        return back();
    }


 public function status_student()
    {
         if (request('id') and !empty(request('id'))) {
    
             $st = InstructorStudents::where('id',request('id'))->first();

             if ($st->status==0) {
                 
              InstructorStudents::where('id',request('id'))->update(['status'=>'1']);

             }

             else if ($st->status==1)
              {
                   InstructorStudents::where('id',request('id'))->update(['status'=>'0']);

                } 
        }

        return true;
    }

 public function register_student(Request $request)
 {
     $data = $this->validate($request, [
            'fname' => 'required|string|min:2',
            'lname' => 'required|string|min:2',
            'mobile' => 'required|max:11|min:11|starts_with:01|unique:users,mobile',
            'email' => 'required|unique:users,email',
            'password' => 'required|min:6|max:20|confirmed',
            'grade_id' => 'required',
        ]);
 
        $input = $request->all();
        $input['password'] = \Hash::make($request->password);
        $input['detail'] = $request->detail;
        $input['email_verified_at'] = \Carbon\Carbon::now()->toDateTimeString(); 
        $input['role'] = 'user';
        $input['grade']=  $request->grade_id;          
        $data = User::create($input);
        $data->save(); 


         $code = generate_student_code($data->id,$data->fname,$data->lname);
           User::where('id',$data->id)->update(['code'=>$code]);

            $input = InstructorStudents::create(
                 [
                'instructor_id'=>\Auth::user()->id,
                'student_id'=>$data->id,
                'type'=>'center',
                'status'=> '1' ,
                'created_at'=>now(),
                'updated_at'=>now(),
                 ]
                );

        \Session::flash('success', trans('Student Added Successfully'));
        return redirect('instructor/add_students?type=center');
 }

 public function upload_students()
 {
     $this->validate(request(), [
           'file' => 'required|file|mimes:xls,xlsx',
           'grade_id'=>'required'
       ]);

     if ( $xlsx = SimpleXLSX::parse( request('file') ) )
                        {
                           $errors = [];$c=1;$total_adding=0;$total_not_adding=0;

                            foreach ( $xlsx->rows() as $r => $row )
                            {
                                if($r == 0)
                                {
                                    if(
                                        $row[0]  != 'First Name' and 
                                        $row[1]  != 'Last Name' and
                                        $row[2]  != 'E-mail' and
                                        $row[3]  != 'Phone Number' and
                                        $row[4]  != 'Password' 
                                      )

                                    {
                                        $errors['namefile'] = '';
                                    }
                                }

                                if($r != 0)
                                {
                                    $students = [];
                                     $str = '';

                                    $students['fname']                     =   $row[0];
                                    $students['lname']                     =   $row[1];
                                    $students['email']                     =   $row[2];
                                    $students['mobile']                    =   $row[3];
                                    $students['password']                  =   $row[4];

                                     if ($students['fname'] =="" )
                                    {
                                        $str.='First name is blank ,';
                                    }

                                      if ($students['lname'] =="" )
                                    {
                                        $str.='Second name is blank ,';
                                    }
                                    if ($students['email'] == "" )
                                    {
                                        $str.='Email is blank ,';
                                    }else
                                    {
                                        if(checkMail($students['email']) == false )
                                        {
                                            $str.='Email is not valid ,';
                                        }
                                    }

                                   if ($students['mobile'] == "" )
                                    {
                                        $str.='Mobile is blank ,';
                                    }else
                                    {
                                        if(VerfiedPhoneNumber($students['mobile']) == false )
                                        {
                                            $str.='Mobile is not valid ,';
                                        }
                                    }

                                   $check  = checkDuplicated('mobile',$students['mobile']);
                                   $check1 = checkDuplicated('email',$students['email']);

                                            if($check==true or $check1)
                                            {

                                                $st_id =get_student($students['email'],$students['mobile']);

                                         if(check_student_in_instructor($st_id,\Auth::user()->id)==false)
                                                {
                                                         $input = InstructorStudents::create(
                                                     [
                                                    'instructor_id'=>\Auth::user()->id,
                                                    'student_id'=>$st_id,
                                                    'type'=>'center',
                                                    'status'=> '1' ,
                                                    'created_at'=>now(),
                                                    'updated_at'=>now(),
                                                     ]
                                                    );

                                                 $str.='This student is already registered on the system ... but is currently added to you in the list of students';

                                                }
                                               
                                         else
                                          {
                                                 $str.='This student is already registered on the system ... and added to you in the list of students';
                                           }
                                              
                                         }

                             if(empty($str))
                            {
                                $students['password'] = \Hash::make($students['password']);
                                $students['email_verified_at'] = \Carbon\Carbon::now()->toDateTimeString(); 
                                $students['role'] = 'user'; 
                                $students['role'] = request('grade_id');         
                               $data = User::create($students);
                               $data->save();

                                 $code = generate_student_code($data->id,$data->fname,$data->lname);
                                 User::where('id',$data->id)->update(['code'=>$code]);

                                $input = InstructorStudents::create(
                                 [
                                'instructor_id'=>\Auth::user()->id,
                                'student_id'=>$data->id,
                                'type'=>'center',
                                'status'=> '1' ,
                                'created_at'=>now(),
                                'updated_at'=>now(),
                                 ]
                                );
                               $total_adding++;
                            }
                            else
                            {
                                $errors[$c] = $str;
                                $str='';
                                $total_not_adding++;    
                            }
                                    $c++;
                                    $i = $r;
                               }
                        }
                    }
    
    \Session::flash('not_adding', $total_not_adding); 

    \Session::flash('adding', $total_adding); 

     \Session::flash('errorw', $errors); 


     return redirect('instructor/add_students?type=pluck');                      
    }


   public function whiteboard(Request $request)
    {
       
        return view('instructor.test');
    }


    public function view_lesson(Request $request)
    {
       
        return view('instructor.view_lesson');
    }


   public function upload_library(Request $request)
    {
       
       $classes   = Classes::where('instructor_id',Auth::user()->id)->where('status',1)
                    ->get();
       $grades    = SubCategory::where('status', '1')->orderBy('id','ASC')->get();

       $all_units = Video::where('unit','!=','')->groupBy('unit')->pluck('unit')
                    ->toArray();
     return view('instructor.upload_library',compact('classes','grades','all_units'));
    }

   public function save_library(Request $request)
    {
      if(request()->has('type') and request('type') == 'center')
      {
         $validator = \Validator::make($request->all(),[
            'class' =>'required',
            'lesson' =>'required',
            'url'    =>'nullable|url',
            'youtube'    =>'nullable|url',
            'files'  =>'required',
         ],[],[]);

         if ($validator->fails())   
            {
                return back()->withInput()->withErrors($validator);
            }

         $input = Library::create(
                 [
                'type' => request('type'),
                'instructor_id'=>Auth::user()->id,
                'class_id'=>request('classs'),
                'lesson_id'=>request('lesson'),
                 ]);

         if (request()->hasFile('files'))
         {
            foreach(request()->file('files') as $file)
            
            {
                 $size = $file->getSize();
                $mime_type = $file->getMimeType();
                $name = $file->getClientOriginalName();
                $hashName = $file->hashName();

                LibraryFile::create([
                    'file_name' =>  $name ,
                    'size'      =>  $size ,
                    'hash_name' =>  $hashName,
                    'path'      =>  'library/'.\Auth::user()->id.'/'.$input->id,
                    'mime_type' =>  $mime_type ,
                    'file_type' =>  'Library',
                    'instructor_id'=> \Auth::user()->id,
                    'library_id'=>$input->id,
                    
                ]);
            }

         }
         if(request()->has('url') or request()->has('youtube') )
         {
            if (!empty(request('url'))) 
            {
               
                    LibraryFile::create([
                    'file_name' =>  request('url') ,
                    'size'      =>  '' ,
                    'hash_name' =>  '',
                    'path'      =>  '',
                    'mime_type' =>  'url' ,
                    'file_type' =>  'Library',
                    'instructor_id'=> \Auth::user()->id,
                    'library_id'=>$input->id,
                ]);

            }

            if (!empty(request('youtube'))) 
            {
               
                    LibraryFile::create([
                    'file_name' =>  request('youtube') ,
                    'size'      =>  '' ,
                    'hash_name' =>  '',
                    'path'      =>  '',
                    'mime_type' =>  'youtube' ,
                    'file_type' =>  'Library',
                    'instructor_id'=> \Auth::user()->id,
                    'library_id'=>$input->id,
                ]);

            }
         }
         \Session::flash('success','Added successfully');
         return back();

      }

      elseif(request()->has('type') and request('type') == 'online')
      {
          $validator = \Validator::make($request->all(),[
            'grade' =>'required',
            'unit'  =>'required',
            'title' =>'required|string|min:3|max:255',
            'youtube'=>'nullable|url',
            'url'    =>'nullable|url',
            'files'  =>'required',
            'price'  =>'required|numeric|min:1|max:50',
            'info'   =>'nullable|string|max:500'
         ],[],[]);

         if ($validator->fails())   
            {
                return back()->withInput()->withErrors($validator);
            }

                $input = Library::create(
                 [
                'type' => request('type'),
                'instructor_id'=>Auth::user()->id,
                'grade_id'=>request('grade'),
                'unit'=>request('unit'),
                'title'=>request('title'),
                'price'=>request('price'),
                'info'=>request('info')
                 ]);

         if (request()->hasFile('files'))
         {
            foreach(request()->file('files') as $file)
            
            {
                 $size = $file->getSize();
                $mime_type = $file->getMimeType();
                $name = $file->getClientOriginalName();
                $hashName = $file->hashName();

                LibraryFile::create([
                    'file_name' =>  $name ,
                    'size'      =>  $size ,
                    'hash_name' =>  $hashName,
                    'path'      =>  'library/'.\Auth::user()->id.'/'.$input->id,
                    'mime_type' =>  $mime_type ,
                    'file_type' =>  'Library',
                    'instructor_id'=> \Auth::user()->id,
                    'library_id'=>$input->id,
                    
                ]);
            }

         }
         if(request()->has('url') or request()->has('youtube') )
         {
            if (!empty(request('url'))) 
            {
               
                    LibraryFile::create([
                    'file_name' =>  request('url') ,
                    'size'      =>  '' ,
                    'hash_name' =>  '',
                    'path'      =>  '',
                    'mime_type' =>  'url' ,
                    'file_type' =>  'Library',
                    'instructor_id'=> \Auth::user()->id,
                    'library_id'=>$input->id,
                ]);

            }

            if (!empty(request('youtube'))) 
            {
               
                    LibraryFile::create([
                    'file_name' =>  request('youtube') ,
                    'size'      =>  '' ,
                    'hash_name' =>  '',
                    'path'      =>  '',
                    'mime_type' =>  'youtube' ,
                    'file_type' =>  'Library',
                    'instructor_id'=> \Auth::user()->id,
                    'library_id'=>$input->id,
                ]);

            }
         }
         \Session::flash('success','Added successfully');
         return back();
      }
    }

   public function getLessonInClass(Request $request)
    {
       
       $lessons_count = ShareLessons::where('class_id',70)->with('lessons')->count();
       $lessons       = ShareLessons::where('class_id',70)->with('lessons')->get();

      // $lessons_count  = ShareLessons::where('class_id',request('class_id'))
      //                         ->where('instructor_id',Auth::user()->id)->with('lessons')->count();
      // $lessons        = ShareLessons::where('class_id',request('class_id'))
      //                        ->where('instructor_id',Auth::user()->id)->with('lessons')->get();  

       
       if($lessons_count > 0)
       {
          $options = '';

          foreach($lessons as $lesson)
           {
             $options.=' <option value="'.$lesson->lessons->id.'">'.$lesson->lessons->name.'</option>';
           }

           return $options;
       }
       else
       {
        return 500;
       }
      
    }

    
}