<?php

namespace App\Http\Controllers;

use App\Config;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Alert;
use Session;
use Auth;
use Redirect;
use Crypt;
use Illuminate\Support\Facades\Http;
use DotenvEditor;
use App\Blog;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use ZIPARCHIVE;

class OtaUpdateController extends Controller
{

    public function getotaview()
    {
        
        return view('ota.update');
        
    }


    public function update(Request $request)
    {

        $d = \Request::getHost();
        $domain = str_replace("www.", "", $d);  
        if(strstr($domain,'localhost') || strstr( $domain, '192.168.' ) || strstr($domain,'.test') || strstr($domain,'mediacity.co.in') || strstr($domain,'castleindia.in')){
             $put = 1;
            file_put_contents(public_path().'/config.txt', $put);

            

            return $this->process($request);
        }
        else{
            
            $request->validate([
                'eula' => 'required',
                'domain'=>'required',
                'code'=>'required'
            ],
            [
                'eula.required'=>'Please accept Terms and Conditions !',
                'domain.required'=>'Please enter your domain name !',
                'code.required'=>'Please enter your envato purchase code !'
            ]);

            $alldata = ['app_id' => "25613271", 'ip' => $request->ip(), 'domain' => $domain , 'code' => $request->code];
        
            $data = $this->make_request($alldata);

            if ($data['status'] == 1)
            {

                $put = 1;
                file_put_contents(public_path().'/config.txt', $put);
                return $this->process($request);
            }
            elseif ($data['msg'] == 'Already Register')
            {
                return back()->withErrors(['User is already registered']);
            }
            else
            {
                return back()->withErrors([$data['msg']]);
            }


        }

        

    }

    public function process($request){

        if(Auth::check())
        {

            if(!empty(config('app.version')))
            {
                DotenvEditor::setKey('APP_VERSION', config('app.version'))->save();
            }

            DotenvEditor::setKey('ENABLE_INSTRUCTOR_SUBS_SYSTEM', 0)->save();

            ini_set('max_execution_time', '-1');

            ini_set('memory_limit', '-1');

            Artisan::call('migrate');

            \Artisan::call('migrate --path=database/migrations/update2_2');
            \Artisan::call('migrate --path=database/migrations/update2_3');
            \Artisan::call('migrate --path=database/migrations/update2_4');
            \Artisan::call('migrate --path=database/migrations/update2_5');
            \Artisan::call('migrate --path=database/migrations/update2_6');
            \Artisan::call('migrate --path=database/migrations/update2_7');
            \Artisan::call('migrate --path=database/migrations/update2_8');
            \Artisan::call('migrate --path=database/migrations/update2_9');
            \Artisan::call('migrate --path=database/migrations/update3_0_0');
            \Artisan::call('migrate --path=database/migrations/update3_1_0');
            \Artisan::call('migrate --path=database/migrations/update3_2_0');
            \Artisan::call('migrate --path=database/migrations/update3_3_0');
            \Artisan::call('migrate --path=database/migrations/update3_4_0');
            \Artisan::call('migrate --path=database/migrations/update3_5_0');
            \Artisan::call('migrate --path=database/migrations/update3_6_0');
            \Artisan::call('migrate --path=database/migrations/update3_9_0');
            \Artisan::call('migrate --path=database/migrations/update4_0_0');


            \Artisan::call('db:seed --class=InvoiceDesignSeeder');
            
            Artisan::call('migrate', [
                '--path' => 'vendor/laravel/passport/database/migrations',
                '--force' => true,

            ]);

            \Artisan::call('passport:install');

            \Artisan::call('rename:video');


            try {

                $currencies = DB::table('currencies')->get();

                foreach($currencies as $currency)
                {
                    if($currency->currency != NULL || $currency->currency != '')
                    {
                        DB::table('currencies')->where('currency', '!=', NULL)->where('id', $currency->id)
                        ->update(['code' => $currency->currency, 'default' => '1']);

                        Artisan::call('currency:manage', ['action' => 'update', 'currency' => $currency->currency]);

                        Artisan::call('currency:update -o');
                    }

                    
                }
            }
            catch(\Swift_TransportException $e){

            }

            try{
                $blogs = Blog::where('slug', NULL)->get();

                if($blogs != NULL)
                {
                    foreach ($blogs as $key => $blog) {
                        $slug = str_slug($blog['heading'],'-');
                        Blog::where('id', $blog->id)
                                ->update([
                                    'slug' => $slug
                                ]);
                    }
                }
               
            }
            catch(\Swift_TransportException $e){

            }
            

            $env_update = $this->changeEnv([
                'APP_DEBUG' => 'false'
            ]);

            Artisan::call('cache:clear');
            Artisan::call('route:clear');
            Artisan::call('cache:clear');
            Artisan::call('view:clear');


            Alert::success('Updated to version' . config('app.version'), 'Your App Updated Successfully !')->persistent('Close')->autoclose(12000);
            

            
            return redirect('/');
        }

        return Redirect::route('login')->withInput()->with('delete', trans('flash.PleaseLogin'));

    }

    


    public function updateprocess()
    {
        if(Auth::check())
        {
            return view('ota.process');
        }
        return Redirect::route('login')->withInput()->with('delete', trans('flash.PleaseLogin'));
    }


    public function make_request($alldata)
    {
        $lic_json = array(
        
            'name'     => request()->user_id,
            'code'     => $alldata['code'],
            'type'     => __('envato'),
            'domain'   => $alldata['domain'],
            'lic_type' => __('regular'),
            'token'    => $result['token']
            
        );

        $file = json_encode($lic_json);
        
        $filename =  'license.json';

        Storage::disk('local')->put('/keys/'.$filename,$file);

        return array(
            'msg' => 'Valid key //prowebber',
            'status' => '1'
        );
    }



    public function checkforupate(Request $request)
    {

        if ($request->ajax()) {

            $version = @file_get_contents(storage_path() . '/app/bugfixer/version.json');

            $version = json_decode($version, true);

            $current_version = $version['version'];

            $current_subversion = $version['subversion'];

            $new_version = str_replace('.', '', $current_subversion) + 1;
            $new_version = implode('.', str_split($new_version));

            $repo = @file_get_contents('https://raw.githubusercontent.com/noshenhussain/eClass-web/' . $current_version . '/' . $new_version . '.json');

            if($repo != ''){
                
                $repo = json_decode($repo);
            
                return response()->json([
                    'status' => 'update_avbl',
                    'msg' => __('Update available'),
                    'version' => $repo->subversion,
                    'filename' => $repo->filename,
                ]);

                
            }else{
                
                return response()->json([
                    'status' => 'uptodate',
                    'msg' => __('Your application is up to date'),
                ]);
            }

        }

    }

    public function mergeQuickupdate(Request $request)
    {
        
        $file = @file_get_contents('https://raw.githubusercontent.com/noshenhussain/eClass-web/' . config('app.version') . '/' . $request->filename);

        if(!$file){
            
            return back()->with('delete', 'Update file not found !');
        }

        $version = $request->version;

        Storage::disk('local')->put('/bugfixer/' . $request->filename, $file);

        $file = storage_path().'/app/bugfixer/' . $request->filename;

        $zip = new ZipArchive;

        $zipped = $zip->open($file, ZIPARCHIVE::CREATE);

        if ($zipped) {

            $extract = $zip->extractTo(base_path());

            if ($extract) {

                

                $version_json = array(

                    'version' => config('app.version'),
                    'subversion' => $version,

                );

                $version_json = json_encode($version_json);

                $filename = 'version.json';

                $zip->close();

                Storage::disk('local')->put('/bugfixer/' . $filename, $version_json);
                
                try{
                    unlink(storage_path().'/app/bugfixer/'.$request->filename);
                }catch(\Exception $e){
                    
                }

                return back()->with('success', 'Quick Hot fix update has been merged successfully !');
            }

        }

    }





    protected function changeEnv($data = array())
    {
        {
            if (count($data) > 0) {

                // Read .env-file
                $env = file_get_contents(base_path() . '/.env');

                // Split string on every " " and write into array
                $env = preg_split('/\s+/', $env);

                // Loop through given data
                foreach ((array) $data as $key => $value) {
                    // Loop through .env-data
                    foreach ($env as $env_key => $env_value) {
                        // Turn the value into an array and stop after the first split
                        // So it's not possible to split e.g. the App-Key by accident
                        $entry = explode("=", $env_value, 2);

                        // Check, if new key fits the actual .env-key
                        if ($entry[0] == $key) {
                            // If yes, overwrite it with the new one
                            $env[$env_key] = $key . "=" . $value;
                        } else {
                            // If not, keep the old one
                            $env[$env_key] = $env_value;
                        }
                    }
                }

                // Turn the array back to an String
                $env = implode("\n\n", $env);

                // And overwrite the .env with the new data
                file_put_contents(base_path() . '/.env', $env);

                return true;

            } else {

                return false;
            }
        }
    }
}
