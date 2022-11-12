<?php

namespace App\Http\Controllers;

use App\ChildCategory;
use App\SubCategory;
use Illuminate\Http\Request;
use App\User;
use App\Video;
use Auth;
use Session;
use App\Setting;

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
        $grades = SubCategory::where('status', '1')->orderBy('id','ASC')->get();
        $subjects = ChildCategory::where('status', '1')->GroupBy('slug')->orderBy('id','ASC')->get();

        return view('admin.videos.create' ,  compact('subjects','grades')) ;
    }

    public function store(Request $request)
    {
        $max_size_video =  Setting::first()->size_lesson_videos;

        $data = $this->validate($request, [
            'title' => 'required|min:3|max:255|string',
            'subject_id' => 'required',
            'grade_id' => 'required',
            'unit' => 'required',
            'videos' => 'required|array',
            'img' => 'required|image|mimes:jpeg,png,jpg,gif,svg'
        ]);

    
          $check = Video::where('title',$request->title)->where('unit',$request->unit)->where('subject_id',$request->subject_id)->where('grade_id',$request->grade_id)->count();

         if($check != 0 )
         {
               return back()->withInput()->withErrors('The title of the video should not be repeated');

         }


        if($request->hasfile('videos'))
         {

            foreach($request->file('videos') as $file)
            {
                $i = 1 ;
                $name=$file->getClientOriginalName();  
                $size = $file->getSize();
                $mime_type = $file->getMimeType();

                if ($size > $max_size_video) {
                    
                    $mb = number_format($max_size_video / 1048576, 2).'MB';

                 return back()->withInput()->withErrors('File size must be less than '.$mb .' In Video #'.$i);
                }
                if (!str_contains($mime_type, 'video'))
                {
                  return back()->withInput()->withErrors('File type must video In Video #'.$i);
                }

                $name = time().$name ;
                Storage::put("public/vedioTeachr/". $name, file_get_contents($file->getRealPath()));
                $list[] = $name ;

                $i++;
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
                    'grade_id' => $request->grade_id ,
                    'unit' => $request->unit ,
                    'status' => $request->status ,
                    'path_background' => $imgName ,
                    'path_video' => $v ,
                    'created_by' => auth()->user()->id ,
                    'created_at' => NOW() ,
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

    public function status(Request $request)
    {

        $video = Video::find($request->id);
        $video->status = $request->status;
        $video->save();
        return back()->with('success',trans('flash.UpdatedSuccessfully'));
        
        
    }
}
