<?php

namespace App\Http\Controllers;
use App\Institute;
use App\Course;
use Illuminate\Support\Facades\Validator;
use Session;
use Auth;

use Illuminate\Http\Request;

class InstituteController extends Controller
{
    public function index()
    {
        $institute = Institute::all();
        return view('admin.institute.index',compact('institute'));
    }

    public function create()
    {
        return view('admin.institute.create');
    }

    public function edit($id)
    {
        $data = Institute::findOrFail($id);
        return view('admin.institute.edit',compact('data'));
    }

    public function view($id,$cour)
    {
        
        $data = Institute::findOrFail($id);
        $course = Course::where('institude_id',$data->id)->first();
        return view('front.institute.view',compact('data','course'));
    }

    public function destroy($id)
    {
        Institute::findOrFail($id)->delete();
        Session::flash('success', __('Delete Successfully'));
        return back();
    }


    public function save(Request $request)
    {
        $request->validate([
            "title" => "required",
            "detail" => "required",
            "skills" => "required"

        ]);
        $institute['title'] = strip_tags($request->title);
        $institute['detail'] = strip_tags($request->detail);
        $institute['user_id'] = Auth::user()->id;
        $institute['skill'] = strip_tags($request->skills);
        

        if ($file = $request->file('image')) {

            $validator = Validator::make(
                [
                    'file' => $request->image,
                    'extension' => strtolower($request->image->getClientOriginalExtension()),
                ],
                [
                    'file' => 'required',
                    'extension' => 'required|in:jpg,png',
                ]
            );

            if ($validator->fails()) {
                return back()->withErrors('Invalid file !');
            }

            if ($file = $request->file('image')) {
                $name = time() . $file->getClientOriginalName();
                $file->move('files/institute', $name);
                $institute['image'] = $name;
            }
        }
        Institute::create($institute);
        Session::flash('success', __('flash.AddedSuccessfully'));
        return redirect()->route('institute.index');

    }

    public function update(Request $request,$id)
    {
        $request->validate([
            "title" => "required",
            "detail" => "required",
            "skills" => "required"

        ]);

        $data = Institute::findOrFail($id);
        $institute['title'] = strip_tags($request->title);
        $institute['detail'] = strip_tags($request->detail);
        
        $institute['skill'] = strip_tags($request->skills);
        

        if ($file = $request->file('image')) {

            $validator = Validator::make(
                [
                    'file' => $request->image,
                    'extension' => strtolower($request->image->getClientOriginalExtension()),
                ],
                [
                    'file' => 'required',
                    'extension' => 'required|in:jpg,png',
                ]
            );

            if ($validator->fails()) {
                return back()->withErrors('Invalid file !');
            }

            if ($file = $request->file('image')) {
                $name = time() . $file->getClientOriginalName();
                $file->move('files/institute', $name);
                $institute['image'] = $name;
            }
        }

        $data->update($institute);
        Session::flash('success', __('flash.AddedSuccessfully'));
        return redirect()->route('institute.index');

    }

    

    public function verify(Request $request)
    { 
        $inst = Institute::find(strip_tags($request->id));

        $inst->verified = strip_tags($request->verify);

        $inst->save();
        return response()->json($request->all());
    }

    public function status(Request $request)
    {
        $inst = Institute::find(strip_tags($request->id));

        $inst->status = strip_tags($request->status);

        $inst->save();
        return response()->json($request->all()); 
    }
}
