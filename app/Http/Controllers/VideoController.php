<?php

namespace App\Http\Controllers;

use App\ChildCategory;
use Illuminate\Http\Request;
use App\User;
use App\Video;
use Auth;
use Session;
use Illuminate\Support\Facades\Storage;

class VideoController extends Controller
{
    public function index()
    {
    	$data = Video::orderBy('id','DESC')->get() ; 
		return view('admin.videos.index',compact('data'));
    }

    public function create()
    {
        $subjects = ChildCategory::where('status', '1')->GroupBy('slug')->orderBy('id','ASC')->get();

        return view('admin.videos.create' ,  compact('subjects')) ;
    }

    public function store(Request $request)
    {
        $data = $this->validate($request, [
            'title' => 'required',
            'subject_id' => 'required',
            'videos' => 'required' ,
            'img' => 'required'
        ]);


        if($request->hasfile('videos'))
         {

            foreach($request->file('videos') as $file)
            {
                $name=$file->getClientOriginalName();  
                $name = time().$name ;
                Storage::put("public/vedioTeachr/". $name, file_get_contents($file->getRealPath()));
                $list[] = $name ;
            }

         }
         if($request->hasfile('img'))
         {

            $imgName=$request->file('img')->getClientOriginalName();  
            $imgName = time().$imgName ;
            Storage::put("public/vedioTeachrBackground/". $imgName, file_get_contents($request->file('img')->getRealPath()));

         }

         if(count($list) > 0)
         {
            foreach($list as $v)
            {
                Video::create([
                    'title' => $request->title ,
                    'subject_id' => $request->subject_id ,
                    'path_background' => $imgName ,
                    'path_video' => $v ,
                    'created_by' => auth()->user()->id ,
                    'created_by' => NOW() ,
                ]);
            }
            
         }

        Session::flash('success', trans('flash.AddedSuccessfully'));
        return redirect('videos');
         

    }

    public function destroy($id)
    {
       
        $video = Video::find($id);
        
        if(file_exists(storage_path('app/public/vedioTeachr/'.$video->path_video)))
        {
            unlink(storage_path('app/public/vedioTeachr/'.$video->path_video));
        }
        if(file_exists(storage_path('app/public/vedioTeachrBackground/'.$video->path_background)))
        {
            unlink(storage_path('app/public/vedioTeachrBackground/'.$video->path_background));
        }

        $video->delete();
        session()->flash('delete',trans('flash.DeletedSuccessfully'));
        return redirect('videos');
        
    }
}
