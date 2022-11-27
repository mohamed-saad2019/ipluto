@extends('student.layouts.head')        
@section('title','Videos')
@section('maincontent') 
    <div class="Page__content">
    <div class="student__video mt-5">
      @section('select_subject') 
        @include('student.partial.select_subject_and_teacher')
      @endsection
        <div class="container">
          <div class="row">
          @if(empty($videos))
              <div class="alert alert-danger alert-dismissible fade show" style="background-color:#b31c20;">
                <h6 style="color:#fff;">
                  <i class="fa fa-info-circle" aria-hidden="true" style="font-size:25px"></i>No Videos in this subject</h6>
              </div>
          @else
             @foreach($videos as $v)
            <div class="col-md-3 mb-4">
              <div class="student__singleVideo">
                <div class="videoOverlay">
                  <p>
                    @if(!empty($v->library()->value('info')))
                      {{$v->library()->value('info')}}
                    @else
                       {{$v->lesson()->value('des')}}
                    @endif
                  </p>
                </div>
                <div class="info__icon">
                  <button type="button" class="btn info__btn "  >
                    <i class="fa fa-info"></i> 
                  </button>
                </div>
                <video width="100%" height="100%" controls controlsList="nodownload" poster="@if(!empty($v->lesson->value('background'))){{url('storage/'.$v->lesson->value('background'))}}@else {{'./images/Profile/logo.png'}} @endif">
                  <source src="{{url('storage/'.$v->path.'/'.$v->hash_name)}}" type="video/mp4">
                  <source src="{{url('storage/'.$v->path.'/'.$v->hash_name)}}" type="video/ogg">
                  Your browser does not support the video tag.
                </video>

                <div class="video__details mt-3 d-flex">
                  <div class="logo__icon">
                    <img src="./images/Profile/logo.png" class="img-fluid ml-1" alt="" srcset="">
                  </div>
                  <div class="description">
                    <h5 class="h5" title="{{$v->file_name}}">
                      <a href="{{ url('student/show_videos?subject_id='.request('subject_id').'&lesson_id='.$v->lesson_id.'&file_id='.$v->id) }}">
                      {{str_limit($v->file_name,20)}}
                    </a></h5>
                    <h6 class="h6">
                      By: {{$v->instructor->fname}} {{$v->instructor->lname}}
                    </h6>
                    <h6 class="h6">
                        {{ \Carbon\Carbon::parse($v->created_at)->shortRelativeDiffForHumans() }} - 
                        {{get_size_file($v->size)}} 
                    </h6>
                    <h6 class="h6">
                     <span>
                      Grade: {{$v->lesson->grade()->value('title')}}
                     </span>
                         <br>
                     <span>
                      Subject : {{$v->lesson->subject()->value('title')}}
                     </span>
                         <br>
                     <span title="{{$v->lesson->name}}">
                         Lesson  : {{str_limit($v->lesson->name,20)}}
                     </span>
                    </h6>
                  </div>
                </div>

              </div>
            </div>
            @endforeach
            @endif
          </div>
        </div>
      </div>
    </div>




@endsection

@section('scripts')
<script>
  $('.info__btn').click(function() {
    $(this).parent().prev().toggleClass("toggleClass");
  })
  </script>
@endsection