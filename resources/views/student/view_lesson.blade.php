@extends('student.layouts.head')    
@section('title', 'view Lesson')
@section('maincontent')
<div class="wrap">
  <div class="contTeach">
    <div class="container">
         <div class="row go">
        @php $sum=0; @endphp

        @foreach($files as $file)
        
         @php $sum++; @endphp
        
        @if(str_contains($file->mime_type, 'image'))
        <div class="col-12 col-md-6 col-lg-3 py-5">
          <div class="contTechFolder" id='{{$file->id}}' style="cursor:pointer;">
             <a href="{{url('storage/'.$file->path.'/'.$file->hash_name)}}">
              <i class="fas fa-file-image fa-xl"></i>
              <h6>{{ str_limit($file->file_name,15)}}</h6>
            </a>
            <div class="d-flex justify-content-between addlesson__footer ">
                <span> {{$sum}}</span>
              </div>
          </div>
        </div>

        @elseif(str_contains($file->mime_type, 'word'))
        <div class="col-12 col-md-6 col-lg-3 py-5">
          <div class="contTechFolder" id='{{$file->id}}' style="cursor:pointer;">
            <a href="https://view.officeapps.live.com/op/view.aspx?src={{url('storage/'.$file->path.'/'.$file->hash_name)}}">
              <i class="fas fa-file-word"></i>
              <h6>{{ str_limit($file->file_name,15)}}</h6>
            </a>
            <div class="d-flex justify-content-between addlesson__footer ">
                <span> {{$sum}}</span>
              </div>
          </div>
        </div>

        @elseif(str_contains($file->mime_type, 'sheet'))
        <div class="col-12 col-md-6 col-lg-3 py-5">
          <div class="contTechFolder" id='{{$file->id}}' style="cursor:pointer;">
            <a href="https://view.officeapps.live.com/op/view.aspx?src={{url('storage/'.$file->path.'/'.$file->hash_name)}}">
              <i class="fas fa-file-excel"></i>
              <h6>{{ str_limit($file->file_name,15)}}</h6>
            </a>
            <div class="d-flex justify-content-between addlesson__footer ">
                <span> {{$sum}}</span>
              </div>
          </div>
        </div>

        @elseif(str_contains($file->mime_type, 'pdf'))
        <div class="col-12 col-md-6 col-lg-3 py-5">
          <div class="contTechFolder" id='{{$file->id}}' style="cursor:pointer;">
            <a href="{{url('storage/'.$file->path.'/'.$file->hash_name)}}">
              <i class="fas fa-file-pdf fa-xl"></i>
              <h6>{{ str_limit($file->file_name,15)}}</h6>
            </a>
            <div class="d-flex justify-content-between addlesson__footer ">
               <span> {{$sum}}</span>
              </div>
          </div>
        </div>

          @elseif(str_contains($file->mime_type, 'audio') )
          <div class="col-12 col-md-6 col-lg-3 py-5">
            <div class="contTechFolder" id='{{$file->id}}' style="cursor:pointer;">
              <a href="{{url('storage/'.$file->path.'/'.$file->hash_name)}}">
                <i class="fas fa-file-audio-o"></i>
                <h6>{{ str_limit($file->file_name,15)}}</h6>
              </a>
              <div class="d-flex justify-content-between addlesson__footer ">
                <span> {{$sum}}</span>
              </div>
            </div>
          </div>

          @elseif(str_contains($file->mime_type, 'video') and $file->hash_name=='Video From Dashboard')
          <div class="col-12 col-md-6 col-lg-3 py-5">
            <div class="contTechFolder" id='{{$file->id}}' style="cursor:pointer;">
              <a href="{{ url('student/show_videos?lesson_id='.request('lesson_id').'&file_id='.$file->id) }}">
                <i class="far fa-file-video"></i>
                <h6>{{ str_limit($file->file_name,15)}}</h6>
              </a>
              <div class="d-flex justify-content-between addlesson__footer ">
                <span> {{$sum}}</span>
              </div>
            </div>
          </div>

          @elseif(str_contains($file->mime_type, 'video') and $file->hash_name !='Video From Dashboard')
          <div class="col-12 col-md-6 col-lg-3 py-5">
            <div class="contTechFolder" id='{{$file->id}}' style="cursor:pointer;">
              <a href="{{ url('student/show_videos?lesson_id='.request('lesson_id').'&file_id='.$file->id) }}">
                <i class="far fa-file-video"></i>
                <h6>{{ str_limit($file->file_name,15)}}</h6>
              </a>
              <div class="d-flex justify-content-between addlesson__footer ">
                <span> {{$sum}}</span>
              </div>
            </div>
          </div>


          @elseif(str_contains($file->mime_type, 'presentation'))
          <div class="col-12 col-md-6 col-lg-3 py-5">
            <div class="contTechFolder" id='{{$file->id}}' style="cursor:pointer;">
              <a href="https://view.officeapps.live.com/op/view.aspx?src={{url('storage/'.$file->path.'/'.$file->hash_name)}}">
                <i class="fas fa-file-powerpoint"></i>
                <h6>{{ str_limit($file->file_name,15)}}</h6>
              </a>
              <div class="d-flex justify-content-between addlesson__footer ">
                <span> {{$sum}}</span>
              </div>
            </div>
          </div>

          @elseif(str_contains($file->mime_type, 'url'))
          <div class="col-12 col-md-6 col-lg-3 py-5">
            <div class="contTechFolder" id='{{$file->id}}' style="cursor:pointer;">
              <a href="{{$file->file_name}}">
                <i class="fas fa-link"></i>
                <h6>URL</h6>
              </a>
              <div class="d-flex justify-content-between addlesson__footer ">
                <span> {{$sum}}</span>
              </div>
            </div>
          </div>
          @endif

          @endforeach

        </div>
    </div>
</div>
</div>

@endsection

@section('scripts')
<script>
    $(function () {
      $('#example1').DataTable({  
             'ordering'    : false,
      })
    }) 
    
  </script>
@endsection
