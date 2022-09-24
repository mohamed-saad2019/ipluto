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
use App\ChildCategory;
use App\SubCategory;
use App\Categories;
use App\InstructorGrade;
class AllinstructorController extends Controller
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
  
        $users = User::where('role', 'instructor')->get();
        return view('admin.allinstructor.index', compact('users'));
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
// 
    public function create()
    {
       
        $cities = Allcity::all();
        $states = Allstate::all();
        $countries = Country::all();
        $category      = Categories::all();
        $childcategory = ChildCategory::all();
        $subcategory = SubCategory::all();

        return view('admin.allinstructor.adduser')->with(['cities' => $cities, 'states' => $states, 'countries' => $countries,'childcategory'=>$childcategory,'subcategory'=>$subcategory]);
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
            'role' => 'required',
            'user_img' => 'mimes:jpg,jpeg,png,bmp,tiff',
            'course'=>'required',
            'grade'=>'required|array',
        ]);


        $input = $request->except(['course','grade']);
        if ($file = $request->file('user_img')) 
        {            
            $optimizeImage = Image::make($file);
            $optimizePath = public_path().'/images/user_img/';
            $image = time().$file->getClientOriginalName();
            $optimizeImage->save($optimizePath.$image, 72);
            $input['user_img'] = $image;
            
        }

        $input['password'] = Hash::make($request->password);
        $input['detail'] = $request->detail;
        $input['email_verified_at'] = \Carbon\Carbon::now()->toDateTimeString();
        $input['storage']=100;           
        $data = User::create($input);
        $data->save(); 

        foreach(request('grade') as $g)
        {
           InstructorGrade::create([
            'instructor_id'=>$data->id,
            'subject_id'=>request('course'),
            'grade_id'=>$g,
            'status'=>1
            ]);
        }

        Session::flash('success', trans('flash.AddedSuccessfully'));
        return redirect('allinstructor');

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
        $category      = Categories::all();
        $childcategory = ChildCategory::all();
        $subcategory = SubCategory::all();
        $instructor_subject = InstructorGrade::where('instructor_id',$id)->pluck('subject_id')
                                                ->toArray();
        $instructor_grade   = InstructorGrade::where('instructor_id',$id)->pluck('grade_id')
                                                ->toArray();
        if(Auth::User()->role == 'admin')
        {
          $user = User::findorfail($id);
        }
        else{
          $user = User::where('id', Auth::User()->id)->first();
        }
        

        return view('admin.allinstructor.edit'
            ,compact('cities','states','countries','user','childcategory','subcategory','instructor_grade','instructor_subject'));

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
       

        $this->validate($request,[
            'user_img' => 'mimes:jpg,jpeg,png,bmp,tiff',
            'course'=>'required',
            'grade'=>'required|array',
        ]);

        if(Auth::User()->role == 'admin')
        {
          $user = User::findorfail($id);
        }
        else{
          $user = User::where('id', Auth::User()->id)->first();
        }

        $request->validate([
              'email' => 'required|email|unique:users,email,'.$user->id,
              'storage' => 'required',

          ]);


        if(config('app.demolock') == 0){

          $input = $request->except(['course','grade']);
          

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
          if(isset($request->status) )
          {
              $input['status'] = '1';
          }
          else
          {
              $input['status'] = '0';
          }

          $data = $user->update($input);

          InstructorGrade::where('instructor_id',$id)->delete();

      foreach(request('grade') as $g)
        {
           InstructorGrade::create([
            'instructor_id'=>$id,
            'subject_id'=>request('course'),
            'grade_id'=>$g,
            'status'=>1
            ]);
        }


          Session::flash('success', trans('flash.UpdatedSuccessfully'));


        }
        else
        {
          return back()->with('delete', trans('flash.DemoCannotupdate'));
        }

        return redirect()->route('allinstructor.index');

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
