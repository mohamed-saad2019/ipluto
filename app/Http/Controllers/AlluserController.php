<?php

namespace App\Http\Controllers;

use App\User;
use App\Allstate;
use App\Allcity;
use App\Allcountry;
use Illuminate\Http\Request;
use Hash;
use Session;
use App\Role;
use App\HasRoles;
use Image;
use Auth;
use App\Wishlist;
use App\Cart;
use App\Order;
use App\ReviewRating;
use App\Question;
use App\Answer;
use App\State;
use App\City;
use App\Country;
use App\Course;
use App\Meeting;
use App\BundleCourse;
use App\BBL;
use App\Instructor;
use App\CourseProgress;
use Illuminate\Support\Facades\Validator;

class AlluserController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function viewAllUser()
    {
  
        $users = User::where('role', 'user')->orderBy('created_at','DESC')->get();
        return view('admin.alluser.index', compact('users'));
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
       
        $cities = Allcity::all();
        $states = Allstate::all();
        $countries = Country::all();
        return view('admin.alluser.adduser')->with(['cities' => $cities, 'states' => $states, 'countries' => $countries]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

 public function store(Request $request)
    {
        $data = $this->validate($request, [
            'fname' => 'required',
            'lname' => 'required',
            'mobile' => 'required|regex:/[0-9]{9}/',
            'email' => 'required|unique:users,email',
            'password' => 'required|min:6|max:20',
            'user_img' => 'mimes:jpg,jpeg,png,bmp,tiff',
            'state_id' => 'required',
            'class_key'=>'nullable|min:5|max:5|exists:App\Classes,class_key',

        ]);


        $input = $request->all();
        if ($file = $request->file('user_img')) 
        {            
            $optimizeImage = Image::make($file);
            $optimizePath = public_path().'/images/user_img/';
            $image = time().$file->getClientOriginalName();
            $optimizeImage->save($optimizePath.$image, 72);
            $input['user_img'] = $image;
            
        }

        $input['country_id'] = '64';
        $input['password'] = Hash::make($request->password);
        $input['detail'] = $request->detail;
        $input['email_verified_at'] = \Carbon\Carbon::now()->toDateTimeString();           
        $data = User::create($input);
        $data->save(); 


         $code = generate_student_code($data->id,$data->fname,$data->lname);

         User::where('id',$data->id)->update(['code'=>$code]);

         if(!empty($data['class_key']))
          {
            $class = getClassByKey($data['class_key']);
            
             if(!empty($class))
             {
                    $getTotalStudentInClass = getTotalStudentInClass($class->id);

                    if($getTotalStudentInClass < $class->num_of_student )
                    {
                      DB::insert("INSERT INTO `classes_student`(`id`, `class_id`, `teacher_id`, `student_id`, `status`, `created_at`) VALUES (NULL,'".$class->id."','".$class->instructor_id."','".$user->id."',0,NOW())") ;
                      User::where('id',$user->id)->update(['subject_id'=>$class->subject_id,'class_key'=>$data['class_key']]);
                                      \Session::put('typeLogin', '-1'); 
                    }
                  else
                  {
                      DB::insert("INSERT INTO `classes_student`(`id`, `class_id`, `teacher_id`, `student_id`, `status`, `created_at`) VALUES (NULL,'".$class->id."','".$class->instructor_id."','".$user->id."','-1',NOW())") ;
                      \Session::put('typeLogin', '-1');
     
                  }

                $input = InstructorStudents::create([
                        'instructor_id'=>$class->instructor_id,
                        'student_id'=>$user->id,
                        'type'=>'center',
                        'status'=> '1' ,
                        'created_at'=>now(),
                        'updated_at'=>now(),
                     ]);
             }
          }

        Session::flash('success', trans('flash.AddedSuccessfully'));
        return redirect('/alluser');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */

    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cities = City::all();
        $states = State::all();
        $countries = Country::all();
        $user = User::findorfail($id);
        if(Auth::User()->role == 'admin')
        {
          $user = User::findorfail($id);
        }
        else{
          $user = User::where('id', Auth::User()->id)->first();
        }
        
        return view('admin.alluser.edit',compact('cities','states','countries','user'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {



        if(Auth::User()->role == 'admin')
        {
          $user = User::findorfail($id);
        }
        else{
          $user = User::where('id', Auth::User()->id)->first();
        }

        $this->validate($request,[
            'user_img' => 'mimes:jpg,jpeg,png,bmp,tiff',
            'email' => 'required|email|unique:users,email,'.$user->id,
            'fname' => 'required',
            'lname' => 'required',
            'mobile' => 'required',
            'grade' =>  'required',
            'state_id' => 'required'
        ]);
        if(config('app.demolock') == 0){

          $input = $request->all();
          

          if($file = $request->file('user_img')) {

              if($user->user_img != null) {
                  $content = @file_get_contents(public_path().'/images/user_img/'.$user->user_img);
                  if ($content) {
                    unlink(public_path().'/images/user_img/'.$user->user_img);
                  }
              }

              $optimizeImage = Image::make($file);
              $optimizePath = public_path().'/images/user_img/';
              $image = time().$file->getClientOriginalName();
              $optimizeImage->save($optimizePath.$image, 72);
              $input['user_img'] = $image;
            
          }


          $verified = \Carbon\Carbon::now()->toDateTimeString();


          if(isset($request->verified)){
            
            $input['email_verified_at'] = $verified;
          }
          else{

            
            $input['email_verified_at'] = NULL;
          }


          if(isset($request->update_pass)){
            
              $input['password'] = Hash::make($request->password);
          }
          else{
              $input['password'] = $user->password;
          }

          if(isset($request->status))
          {
              $input['status'] = '1';
          }
          else
          {
              $input['status'] = '0';
          }

          $user->update($input);

          $data = User::find($id);
          
           if(!empty($data['class_key']))
          {
            $class = getClassByKey($data['class_key']);
            
             if(!empty($class))
             {
                    $getTotalStudentInClass = getTotalStudentInClass($class->id);

                    if($getTotalStudentInClass < $class->num_of_student )
                    {
                      DB::insert("INSERT INTO `classes_student`(`id`, `class_id`, `teacher_id`, `student_id`, `status`, `created_at`) VALUES (NULL,'".$class->id."','".$class->instructor_id."','".$user->id."',0,NOW())") ;
                      User::where('id',$user->id)->update(['subject_id'=>$class->subject_id,'class_key'=>$data['class_key']]);
                                      \Session::put('typeLogin', '-1'); 
                    }
                  else
                  {
                      DB::insert("INSERT INTO `classes_student`(`id`, `class_id`, `teacher_id`, `student_id`, `status`, `created_at`) VALUES (NULL,'".$class->id."','".$class->instructor_id."','".$user->id."','-1',NOW())") ;
                      \Session::put('typeLogin', '-1');
     
                  }

                $input = InstructorStudents::create([
                        'instructor_id'=>$class->instructor_id,
                        'student_id'=>$user->id,
                        'type'=>'center',
                        'status'=> '1' ,
                        'created_at'=>now(),
                        'updated_at'=>now(),
                     ]);
             }
          }


          Session::flash('success', trans('flash.UpdatedSuccessfully'));

        }
        else
        {

          return back()->with('delete', trans('flash.DemoCannotupdate'));
        }

          return redirect(url('/alluser'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       
        $user = User::find($id);
        
        if(config('app.demolock') == 0){

            if ($user->user_img != null)
            {
                    
                $image_file = @file_get_contents(public_path().'/images/user_img/'.$user->user_img);

                if($image_file)
                {
                    unlink(public_path().'/images/user_img/'.$user->user_img);
                }
            }

            $value = $user->delete();
            Course::where('user_id', $id)->delete();
            Wishlist::where('user_id', $id)->delete();
            Cart::where('user_id', $id)->delete();
            Order::where('user_id', $id)->delete();
            ReviewRating::where('user_id', $id)->delete();
            Question::where('user_id', $id)->delete();
            Answer::where('ans_user_id', $id)->delete();
            Meeting::where('user_id', $id)->delete();
            BundleCourse::where('user_id', $id)->delete();
            BBL::where('instructor_id', $id)->delete();
            Instructor::where('user_id', $id)->delete();
            CourseProgress::where('user_id', $id)->delete();

            if($value)
            {
                session()->flash('delete',trans('flash.DeletedSuccessfully'));
                return redirect('user');
            }
        }
        else
        {
            return back()->with('delete',trans('flash.DemoCannotupdate'));
        }
    }
    
    public function bulk_delete(Request $request)
    
    {
        $validator = Validator::make($request->all(), [
            'checked' => 'required',
        ]);
        if ($validator->fails()) {
            return back()->with('warning', 'Atleast one item is required to be checked');
           
        }
        else{
            User::whereIn('id',$request->checked)->delete();
            
            Session::flash('success',trans('Deleted Successfully'));
            return redirect()->back();
            
        }
    }
    
    public function status(Request $request)
    {

        $user = User::find($request->id);
        $user->status = $request->status;
        $user->save();
        return back()->with('success',trans('flash.UpdatedSuccessfully'));
        
        
    }
}
