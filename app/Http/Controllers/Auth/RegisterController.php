<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\InstructorStudents;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Mail\WelcomeUser;
use Illuminate\Support\Facades\Mail;
use App\Providers\RouteServiceProvider;
use App\Setting;
use Spatie\Activitylog\Contracts\Activity;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Http\Request;
use App\Affiliate;
use App\Wallet;
use Illuminate\Support\Str;
use Module;
use Illuminate\Support\Facades\Schema;
use DB;
class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        $setting = Setting::first();

        if($setting->captcha_enable == 1){
            return Validator::make($data, [
                'fname' => ['required', 'regex:/^[a-zA-Z]+$/u', 'max:15'],
                'lname' => ['required', 'regex:/^[a-zA-Z]+$/u', 'max:15'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:6', 'confirmed'],
                'g-recaptcha-response' => 'required|captcha',
                'mobile'=> ['regex:/^([0-9\s\-\+\(\)]*)$/', 'max:17'],
                
            ]);
        }
        else{
            return Validator::make($data, [
                'fname' => ['required', 'alpha', 'min:3', 'max:15'],
                'lname' => ['required', 'alpha', 'min:3', 'max:15'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:6', 'confirmed'],
                'mobile' => ['required','unique:users,mobile','starts_with:01','digits:11'],
                'image'    => 'nullable',
                'grade' => 'required',
                'country'=>'required',
                'govern'=> 'required',
                'city'  => 'nullable',
                'address'=>'nullable|min:3|max:255',
                'class_key'=>'nullable|min:5|max:5|exists:App\Classes,class_key' 
            ]);

        }
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {

        $setting = Setting::first();

        if($setting->mobile_enable == 1)
        {
            $mobile = $data['mobile'];
        }
        else
        {
            $mobile = NULL;
        }

        if($setting->verify_enable == 0)
        {
            $verified = \Carbon\Carbon::now()->toDateTimeString();
        }
        else
        {
            $verified = NULL;
        }

        if(Schema::hasTable('affiliate') && Schema::hasTable('wallet_settings'))
        {
            $affiliate = Affiliate::first();
        }
        else
        {
            $affiliate = NULL;
        }

        
        if(Schema::hasTable('affiliate') && Schema::hasTable('wallet_settings'))
        {
            if(isset($affiliate) && $affiliate->status == 1)
            {
                $refercode = User::createReferCode();
                if (Cookie::get('referral') !== null)
                {
                    $referred_by = Cookie::get('referral');

                }
                else
                {
                    $referred_by = NULL;
                }
                
            }
            else
            {
                $refercode = NULL;
                $referred_by = NULL;
            }
        }
        else
        {
            $refercode = NULL;
            $referred_by = NULL;
        }


        if(Schema::hasTable('affiliate') && Schema::hasTable('wallet_settings'))
        { 
            $user = User::create([

                'fname' => $data['fname'],
                'lname' => $data['lname'],
                'email' => $data['email'] ,
                'mobile' => $data['mobile'],
                'email_verified_at'  => $verified,
                'password' => Hash::make($data['password']),
                'referred_by' => $referred_by,
                'affiliate_id' => $refercode,
                'user_img' => $data['image'].".png",
                'grade'=>$data['grade'],
                'state_id'=>$data['govern'],
                'city_id'=>$data['city'],
                'address'=>$data['address'],
                'country_id'=>$data['country'],
            ]);
        }
        else{


            $user = User::create([
                'fname' => $data['fname'],
                'lname' => $data['lname'],
                'email' => $data['email'],
                'mobile' => $data['mobile'],
                'email_verified_at'  => $verified,
                'password' => Hash::make($data['password']),
                'user_img' => $data['image'].".png",
                'grade'=>$data['grade'],
                'state_id'=>$data['govern'],
                'city_id'=>$data['city'],
                'address'=>$data['address'],
                'country_id'=>$data['country'],
                'type'=>'center',
            ]);

        }

        
        
        
        


        if(Schema::hasTable('affiliate') && Schema::hasTable('wallet_settings'))
        {
            if(isset($affiliate) && $affiliate->status == 1)
            { 
                $affiliate_user = User::where('affiliate_id', $user->referred_by)->first();

                if(isset($affiliate_user) && $affiliate_user == !NULL)
                {
                    $user_wallet = Wallet::where('user_id', $affiliate_user->id)->first();

                    if(isset($user_wallet))
                    {

                        Wallet::where('user_id', $affiliate_user->id)
                        ->update(['balance' => $user_wallet->balance + $affiliate->point_per_referral ]);
                        

                    }else{
                        

                        Wallet::create([
                            'user_id' => $affiliate_user->id,
                            'balance' => $affiliate->point_per_referral, 
                        ]);

                    }
                }
            }
        }

        if(Cookie::get('referral') !== null)
        {
            Cookie::queue(Cookie::forget('referral'));
        }
        


        if(isset($setting->activity_enable))
        {
            if($setting->activity_enable == '1')
            {
                $project = new User();

                activity()
                   ->useLog('Register')
                   ->performedOn($project)
                   ->causedBy($user->id)
                   ->withProperties(['customProperty' => 'Register'])
                   ->log('User Register')
                   ->subject('Register');

            }
        }
        

        // if($setting->w_email_enable == 1){
        //     try{
               
        //         Mail::to($data['email'])->send(new WelcomeUser($user));
               
        //     }
        //     catch(\Swift_TransportException $e){

        //     }
        // }
        
          $code = generate_student_code($user->id,$user->fname,$user->lname);
          User::where('id',$user->id)->update(['code'=>$code]);

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
        
        return $user;
    }
}
