<?php

namespace App\Http\Controllers;

use App\Appointment;
use Illuminate\Http\Request;
use Auth;
use App\Course;
use App\User;
use Mail;
use App\Mail\UserAppointment;
use Validator;
use DB;
use App\Folders;
use App\Lessons;

class FoldersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         
            $validator = \Validator::make($request->all(), [
            'name' => 'required|max:255',            
            ],[],['name'=>'Folder Name']); // create the validations
            if ($validator->fails())   //check all validations are fine, if not then redirect and show error messages
            {
                return back()->withInput()->withErrors($validator);
            }

        $count = Folders::where('instructor_id',\Auth::user()->id)->where('name',request('name'))->count();
            if($count != 0)
            {
                $validator = 'The Folder Name has already been taken.';
                return back()->withInput()->withErrors($validator);
            }

        $data =  Folders::create(
                array(
                    'name'=> $request->name,
                    'instructor_id' => $request->instructor_id,
                    'color'=>$request->color,
                    'parent_id'=>$request->parent_id,
                )
            );

         
     if(request()->has('lesson_id') and !empty(request('lesson_id')))
         {
            Lessons::where('id',request('lesson_id'))
              ->update(['folder_id' => $data->id]);
         }

       $parent_id = !empty($data->parent_id)?$data->parent_id:'NULL';
        return redirect('instructor/library?id='.$data->id.'&parent_id='.$parent_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function edit(Appointment $appointment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $validator = \Validator::make($request->all(), [
            'name' => 'required|max:255',            
            ],[],['name'=>'Folder Name']); // create the validations
          
            if ($validator->fails())   
            {
                return back()->withInput()->withErrors($validator);
            }

            $count = Folders::where('instructor_id',\Auth::user()->id)->where('name',request('name'))
                              ->where('id','!=',$id)->count();
            if($count != 0)
            {
                $validator = 'The Folder Name has already been taken.';
                return back()->withInput()->withErrors($validator);
            }

         $folder = Folders::where('id', $id)->first();

            DB::table('lessons_folders')->where('id',$id)
            ->update([
               'name'=> $request->name,
               'color'=>$request->color,
               'updated_at'=>now(),
            ]);

          return redirect('instructor/library?id='.request('id').'&parent_id='.request('parent_id'));
    
   }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       
    }

    public function delete($id)
    {
            Folders::where('id', $id)->delete();
            Folders::where('parent_id',$id)->delete();
            return redirect('instructor/library');
    }

}
