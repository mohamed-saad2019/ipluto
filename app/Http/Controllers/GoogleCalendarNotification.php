<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Setting;

class GoogleCalendarNotification extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $env_files = [
            'GOOGLE_CALENDAR_ID' => env('GOOGLE_CALENDAR_ID'),
          ];
          
          $setting = Setting::first();
          $env_update = $this->changeEnv([
            'notification_enable' => $request->notification_enable,
            
        ]);
          $setting->save();
          return view('admin.google_calendar_notification.index',compact('setting','env_files'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $setting = Setting::first();
        if(isset($request->notification_enable))
        {
            $setting->notification_enable = "1";
        }else
        {
            $setting->notification_enable = "0";
        }
       
        $env_update = $this->changeEnv([
          'GOOGLE_CALENDAR_ID' => $request->GOOGLE_CALENDAR_ID,
          
        ]);

        $setting->save();

        return back()->with('success',trans('flash.UpdatedSuccessfully'));
    }

    protected function changeEnv($data = array()){
        
            if ( count($data) > 0 ) {
    
                // Read .env-file
                $env = file_get_contents(base_path() . '/.env');
    
                // Split string on every " " and write into array
                $env = preg_split('/\s+/', $env);;
    
                // Loop through given data
                foreach((array)$data as $key => $value){
                  // Loop through .env-data
                  foreach($env as $env_key => $env_value){
                    // Turn the value into an array and stop after the first split
                    // So it's not possible to split e.g. the App-Key by accident
                    $entry = explode("=", $env_value, 2);
    
                    // Check, if new key fits the actual .env-key
                    if($entry[0] == $key){
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
