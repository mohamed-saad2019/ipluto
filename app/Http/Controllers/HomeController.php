<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\User;
use App\Categories;
use App\InstructorGrade;
use App\Slider;
use App\SliderFacts;
use App\CategorySlider;
use App\Course;
use App\Meeting;
use App\BBL;
use App\BundleCourse;
use App\Testimonial;
use App\Trusted;
use App\Order;
use Auth;
use Session;
use App\Blog;
use App\Batch;
use Illuminate\Support\Facades\Schema;
use App\Setting;
use App\Advertisement;
use App\ChildCategory;
use App\SubCategory;
use App\Googlemeet;
use App\JitsiMeeting;
use Illuminate\Support\Facades\Cookie;
use Response;
use Config;
use DB;
use Module;
use Image;
use Modules\Googleclassroom\Models\Googleclassroom;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware(['auth','verified']);
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {

        return view('homepage' );
        $category = Categories::where('status', '1')->orderBy('position','ASC')->get();
        $sliders = Slider::where('status', '1')->orderBy('position', 'ASC')->get();
        $facts = SliderFacts::limit(3)->get();
        $categories = CategorySlider::first();
        $cors = Course::where('status', '1')->where('featured', '1')->get();
        $meetings = Meeting::where('link_by', NULL)->get();
        $bigblue = BBL::where('is_ended','!=',1)->where('link_by', NULL)->get();
        $testi = Testimonial::where('status', '1')->get();
        $trusted = Trusted::where('status', '1')->get();

        $blogs = Blog::where('status', '1')->orderBy('updated_at','DESC')->get();

        if(Schema::hasTable('googlemeets')){

            $allgooglemeet = Googlemeet::orderBy('id', 'DESC')->where('link_by', NULL)->get();
        }
        else{
            
            $allgooglemeet = NULL;
        }

        if(Schema::hasTable('jitsimeetings')){

            $jitsimeeting = JitsiMeeting::orderBy('id', 'DESC')->where('link_by', NULL)->get();

        }
        else{
            
            $jitsimeeting = NULL;
        }



        if (Schema::hasColumn('bundle_courses', 'is_subscription_enabled'))
        {
            $bundles = BundleCourse::where('is_subscription_enabled', 0)->get();
            $subscriptionBundles = BundleCourse::where('is_subscription_enabled', 1)->get();
        }
        else{

            $bundles = NULL;
            $subscriptionBundles = NULL;

        }
    

        if(Schema::hasTable('batch')){
            $batches = Batch::where('status', '1')->get();
        }
        else{
            $batches = NULL;
        }

        if(Schema::hasTable('advertisements')){
            $advs = Advertisement::where('status','=',1)->get();
        }
        else{
            $advs = NULL;
        }
        
        $viewed = session()->get('courses.recently_viewed');

        if(isset($viewed))
        {
            $recent_course_id = array_unique($viewed); 
        }
        else{

            $recent_course_id = NULL;

        }

        if(Schema::hasTable('googleclassrooms') && Module::has('Googleclassroom') && Module::find('Googleclassroom')->isEnabled())
        {
            $googleclassrooms = Googleclassroom::orderBy('id', 'DESC')->where('link_by', NULL)->where('status', '1')->get();
        }
        else{
            
            $googleclassrooms = NULL;
        }


        $counter = 0;
        $recent_course = NULL;

        if(Auth::check())
        {
            if( isset($recent_course_id) )
            {
                foreach ($recent_course_id as $item) {

                     $recent_course = Course::where('id', $item)->where('status', '1')->first();

                    if(isset($recent_course))
                    {
                        $counter++;
                    }
                }

            }
            

        }
        


        $total_count=$counter;


        // return view('home', compact('category', 'sliders', 'facts', 'categories', 'cors', 'bundles', 'meetings', 'bigblue', 'testi', 'trusted', 'recent_course_id', 'blogs', 'subscriptionBundles', 'batches', 'recent_course', 'total_count', 'advs', 'allgooglemeet','jitsimeeting', 'googleclassrooms'));
    }

    public function become_teacher()
    {
        $subjects = ChildCategory::where('status', '1')->GroupBy('slug')->orderBy('id','ASC')->get();
        $grades   = SubCategory::where('status', '1')->orderBy('id','ASC')->get();
        return view('become_teacher', compact('subjects','grades')) ;
    }

    public function saveTeacher(Request $request)
    {

        $data = $this->validate($request, [
            'fname'         => 'required',
            'lname'         => 'required',
            'mobile'        => 'required|regex:/[0-9]{9}/',
            'email'         => 'required|unique:users,email',
            'password'      => 'required|min:6',
            'governorate'   => 'required|string',
            'city'          => 'required|string',
            'subject'       => 'required',
            'grade'         => 'required',
            'image'         => 'required|mimes:jpg,jpeg,png,bmp,tiff'
        ]);

        if ($file = $request->file('image')) 
        {            
            $optimizeImage = Image::make($file);
            $optimizePath = public_path().'/images/user_img/';
            $image = time().$file->getClientOriginalName();
            $optimizeImage->save($optimizePath.$image, 72);
            $input['user_img'] = $image;
            
        }


        $user = User::create([
            'fname'     => $request->fname ,
            'lname'     => $request->lname,
            'email'     => $request->email,
            'mobile'    => $request->mobile,
            'role'      => 'instructor',
            'verified'  => 0,
            'password'  => Hash::make($request->password),
            'detail'    => $request->detail,
            'user_img'  => $input['user_img'] ?? '',
            'address'   => $request->governorate . " - " . $request->city ,
            'status'    => 0 ,
            'storage'   => 100
        ]);

        $request->grade = explode(',',$request->grade) ;

        foreach($request->grade as $_grade)
        {
            $_g = '{"en":"'.$_grade.'"}' ;
            $getGrade = SubCategory::where('title', $_g)->first();

            InstructorGrade::create([
                'instructor_id' =>  $user->id ,
                'subject_id'    =>  $request->subject ,
                'grade_id'      =>  $getGrade->id
            ]);
        }
        

        Session::flash('success', trans('flash.successfully_registered'));
        return redirect('become_teacher');

    }

    public function teachers($subject_id,$grade_id)
    {
        $subject  = ChildCategory::where('status', '1')->where('id',$subject_id)->first();
        $teachers = User::where('role','instructor')
                        ->where('status','1')
                        ->whereIN('id',InstructorGrade::where('grade_id',$grade_id)->where('subject_id',$subject_id)->pluck('instructor_id'))
                        ->where('status','1')
                        ->get();

        return view('teachers',compact('teachers','subject'));
    }

    public function showTeacher($teacher_id)
    {

        $teacher = User::with('grades','subject')->where('status',1)->findOrFail($teacher_id);
        return view('teacher_profile',compact('teacher'));
    }
}
