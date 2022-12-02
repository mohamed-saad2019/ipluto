@extends('instructor.layouts.head')
@section('title','View Library')

@if(Auth::User()->role == "instructor")


@php $storage = \Auth::user()->storage==null?100:\Auth::user()->storage;
$current_storage = str_replace("MB","",get_size_instructor());
@endphp

@section('maincontent')
<div class="wrap">
  <div class="lesson">
    <div class="container">
      
  <div class="contTeach">
    <div class="container">
      <div class="row go">
        @php $sum=0; @endphp

        @foreach($files as $file)
        
         @php $sum++; @endphp
        
        @if(str_contains($file->mime_type, 'image'))
        <div class="col-12 col-md-6 col-lg-3 py-5">
          <div class="contTechFolder" id='{{$file->id}}' style="cursor:pointer;">
                 <small>
                 <i class="fas fa-file-image"></i>  {{ str_limit($file->file_name,15)}}
                  @if($file->file_type=='Library')
                   <span> (Library) </span>
                  @endif
                </small>
                <img src="{{url('storage/'.$file->path.'/'.$file->hash_name)}}"
                 style="width:240px;height:150px">
            <div class="d-flex justify-content-between addlesson__footer ">
                <small> #{{$sum}}</small>
                <small style="float: right;">
                  <a href="{{url('storage/'.$file->path.'/'.$file->hash_name)}}"><i class="fa fa-eye"></i><span style="margin-top:-5px"> show</span>
                  </a>
                </small>
              </div>
          </div>
        </div>

        @elseif(str_contains($file->mime_type, 'word'))
        <div class="col-12 col-md-6 col-lg-3 py-5">
          <div class="contTechFolder" id='{{$file->id}}' style="cursor:pointer;">
              <small>
                 <i class="fas fa-file-word"></i>  {{ str_limit($file->file_name,15)}}
                  @if($file->file_type=='Library')
                   <span> (Library) </span>
                  @endif
                </small>
              <embed src="https://view.officeapps.live.com/op/view.aspx?src={{url('storage/'.$file->path.'/'.$file->hash_name)}}"
               style="border: 1px solid white;width:266px;height:150px;" />
            <div class="d-flex justify-content-between addlesson__footer ">
                 <small> #{{$sum}}</small>
                <small style="float: right;">
                  <a href="https://view.officeapps.live.com/op/view.aspx?src={{url('storage/'.$file->path.'/'.$file->hash_name)}}"><i class="fa fa-eye"></i><span style="margin-top:-5px"> show</span>
                  </a>
                </small>
              </div>
          </div>
        </div>

        @elseif(str_contains($file->mime_type, 'sheet'))
        <div class="col-12 col-md-6 col-lg-3 py-5">
          <div class="contTechFolder" id='{{$file->id}}' style="cursor:pointer;">
             <small>
                 <i class="fas fa-file-excel"></i>  {{ str_limit($file->file_name,15)}}
                  @if($file->file_type=='Library')
                   <span> (Library) </span>
                  @endif
                </small>
              <embed src="https://view.officeapps.live.com/op/view.aspx?src={{url('storage/'.$file->path.'/'.$file->hash_name)}}"
               style="border: 1px solid white;width:266px;height:150px;" />
            <div class="d-flex justify-content-between addlesson__footer ">
                <small> #{{$sum}}</small>
                <small style="float: right;">
                  <a href="https://view.officeapps.live.com/op/view.aspx?src={{url('storage/'.$file->path.'/'.$file->hash_name)}}"><i class="fa fa-eye"></i><span style="margin-top:-5px"> show</span>
                  </a>
                </small>
              </div>
          </div>
        </div>

        @elseif(str_contains($file->mime_type, 'pdf'))
        <div class="col-12 col-md-6 col-lg-3 py-5">
          <div class="contTechFolder" id='{{$file->id}}' style="cursor:pointer;">
                <small>
                 <i class="fas fa-file-pdf"></i>  {{ str_limit($file->file_name,15)}}
                  @if($file->file_type=='Library')
                   <span> (Library) </span>
                  @endif
                </small>
              <embed src="{{url('storage/'.$file->path.'/'.$file->hash_name)}}" 
               style="border: 1px solid white;width:266px;height:150px;overflow:hidden;" />
            <div class="d-flex justify-content-between addlesson__footer ">
                <small> #{{$sum}}</small>
                <small style="float: right;">
                  <a href="{{url('storage/'.$file->path.'/'.$file->hash_name)}}">
                    <i class="fa fa-eye"></i><span style="margin-top:-5px"> show</span>
                  </a>
                </small>
              </div>
          </div>
        </div>

          @elseif(str_contains($file->mime_type, 'audio') )
          <div class="col-12 col-md-6 col-lg-3 py-5">
            <div class="contTechFolder" id='{{$file->id}}' style="cursor:pointer;">
                <small>
                 <i class="fas fa-file-audio"></i>  {{ str_limit($file->file_name,15)}}
                  @if($file->file_type=='Library')
                   <span> (Library) </span>
                  @endif
                </small>
                  <audio controls controlsList="nodownload" style="width:80%;">
                  <source src="{{url('storage/'.$file->path.'/'.$file->hash_name)}}" type="audio/ogg">
                  <source src="{{url('storage/'.$file->path.'/'.$file->hash_name)}}" type="audio/mpeg">
                  Your browser does not support the audio tag.
                  </audio>
              
              <div class="d-flex justify-content-between addlesson__footer ">
                <small> #{{$sum}}</small>
              </div>
            </div>
          </div>

          @elseif(str_contains($file->mime_type, 'video') and $file->hash_name=='Video From Dashboard')
          <div class="col-12 col-md-6 col-lg-3 py-5">
            <div class="contTechFolder" id='{{$file->id}}' style="cursor:pointer;">
               <small>
                 <i class="fas fa-file-video"></i>  {{ str_limit($file->file_name,15)}}
                  @if($file->file_type=='Library')
                   <span> (Library) </span>
                  @endif
                </small>
                <video style="width:240px;height:150px">
                        <source src="{{ url('storage/vedioTeachr/'.$file->path) }}" type="video/mp4">
                        <source src="{{ url('storage/vedioTeachr/'.$file->path) }}" type="video/ogg">
                        Your browser does not support the video tag.
                      </video>
              <div class="d-flex justify-content-between addlesson__footer ">
               <small> #{{$sum}}</small>
                <small style="float: right;">
                  <a href="{{ url('storage/vedioTeachr/'.$file->path) }}">
                    <i class="fa fa-eye"></i><span style="margin-top:-5px"> show</span>
                  </a>
                </small>
              </div>
            </div>
          </div>

          @elseif(str_contains($file->mime_type, 'video') and $file->hash_name !='Video From Dashboard')
          <div class="col-12 col-md-6 col-lg-3 py-5">
            <div class="contTechFolder" id='{{$file->id}}' style="cursor:pointer;">
               <small>
                 <i class="fas fa-file-video"></i>  {{ str_limit($file->file_name,15)}}
                  @if($file->file_type=='Library')
                   <span> (Library) </span>
                  @endif
                </small>
                <video style="width:240px;height:150px">
                        <source src="{{url('storage/'.$file->path.'/'.$file->hash_name)}}" type="video/mp4">
                        <source src="{{url('storage/'.$file->path.'/'.$file->hash_name)}}" type="video/ogg">
                        Your browser does not support the video tag.
                      </video>
              <div class="d-flex justify-content-between addlesson__footer ">
               <small> #{{$sum}}</small>
                <small style="float: right;">
                  <a href="{{ url('student/show_videos?lesson_id='.request('id').'&file_id='.$file->id) }}">
                    <i class="fa fa-eye"></i><span style="margin-top:-5px"> show</span>
                  </a>
                </small>
              </div>
            </div>
          </div>


          @elseif(str_contains($file->mime_type, 'presentation'))
          <div class="col-12 col-md-6 col-lg-3 py-5">
          <div class="contTechFolder" id='{{$file->id}}' style="cursor:pointer;">
              <small>
                 <i class="fas fa-file-powerpoint"></i>  {{ str_limit($file->file_name,15)}}
                  @if($file->file_type=='Library')
                   <span> (Library) </span>
                  @endif
                </small>
              <embed src="https://view.officeapps.live.com/op/view.aspx?src={{url('storage/'.$file->path.'/'.$file->hash_name)}}"
               style="border: 1px solid white;width:266px;height:150px;" />
            <div class="d-flex justify-content-between addlesson__footer ">
                 <small> #{{$sum}}</small>
                <small style="float: right;">
                  <a href="https://view.officeapps.live.com/op/view.aspx?src={{url('storage/'.$file->path.'/'.$file->hash_name)}}"><i class="fa fa-eye"></i><span style="margin-top:-5px"> show</span>
                  </a>
                </small>
              </div>
          </div>
        </div>
          @elseif(str_contains($file->mime_type, 'url'))
             <div class="col-12 col-md-6 col-lg-3 py-5">
          <div class="contTechFolder" id='{{$file->id}}' style="cursor:pointer;">
              <small>
                 <i class="fas fa-file-link"></i>  {{ str_limit($file->file_name,15)}}
                  @if($file->file_type=='Library')
                   <span> (Library) </span>
                  @endif
                </small>
             <center>{{str_limit($file->file_name,15)}}</center>
            <div class="d-flex justify-content-between addlesson__footer ">
                 <small> #{{$sum}}</small>
                <small style="float: right;">
                  <a href="{{$file->file_name}}"><i class="fa fa-eye"></i><span style="margin-top:-5px"> visit</span>
                  </a>
                </small>
              </div>
           </div>
         </div>
          @endif

          @endforeach

        </div>
       </div>
      </div>
    </div>
   </div>
  @endsection

@endif