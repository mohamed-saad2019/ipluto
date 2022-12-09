@extends('student.layouts.head')    
@section('title', ' Lessons Materials ( ' . get_name_subject(request('subject_id')) .' ) ')
@section('select_subject') 
        @include('student.partial.select_subject_and_teacher')
@endsection
@section('maincontent')
<div class="tableClassList">
    <div class="container">

          @if(Session::has('success') and !empty(Session::get('success')))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>{{ Session::get('success') }}</strong>
                           <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                               <span aria-hidden="true">&times;</span>
                         </button>
                        </div> 
          @endif
            @if(Session::has('info') and !empty(Session::get('info')))
                        <div class="alert alert-info alert-dismissible fade show" role="alert">
                            <strong>{{ Session::get('info') }}</strong>
                           <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                               <span aria-hidden="true">&times;</span>
                         </button>
                        </div> 
          @endif

       @if(!empty($path) and !empty(request('folder_id')))

             <ol class="breadcrumb" style="background-color: #fff; border-bottom:0">
              <li style="font-size:22px;">
                <a href="{{url('student/lessons?subject_id='.request('subject_id'))}}">My Lessons</a>
                <span style="padding:0px 20px;"> > </span>
              </li>
              @foreach($path as $p)
                  <li style="font-size:22px;">
                    <a href="{{url('student/lessons?subject_id='.request('subject_id').'&instructor_id='.request('instructor_id').'&folder_id='.$p->id.'&parent_id='.$p->parent_id)}}"
                      style="color:{{$p->color}}">{{$p->name}} </a>
                     
                     @if($p->id != request('folder_id'))
                       <span style="padding:0px 20px;"> > </span>
                     @endif

                  </li>
              @endforeach
            </ol>
            <br>

       @endif

        @if(!empty($myFolders))  
            <div class="row paste shadow-sm mb-5 bg-white rounded" id="">
         @foreach($myFolders as $folder)
           @if(check_share_child_folders($folder->id,get_child($folder->id)))
              <div class="col-12 col-md-6 col-lg-3 folders mb-4" id="">
                <div class="single__paste d-flex justify-content-between">
                  <div class="">
                   <a class="w-100 d-flex align-items-center" style="color:{{$folder->color}}"
                        href="{{url('student/lessons?subject_id='.request('subject_id').'&instructor_id='.request('instructor_id').'&folder_id='.$folder->id.'&parent_id='.$folder->parent_id)}}">
                      <i class="fas fa-folder"></i>
                      <span class="description ml-2">{{$folder->name}}</span>
                    </a>
                  </div>
                  <div class="sizing d-flex align-items-end mr-1 mb-1" >           
                     <span>
                     {{number_of_lessons_in_folder($folder->id,get_child($folder->id),'student')}} Lesson
                    </span>
                    <span style="margin:0px 1px">|</span>
                    <span>
                      {{get_size_folder($folder->id,get_child($folder->id),'student')}}
                    </span>
                  </div>
                </div>
              </div>
            @endif
          @endforeach
            </div>
            <br>
       @endif

             <!-- begin  -->
      <div class="container">
        <div class="row go" id="dvSource">
          @foreach($myLessons as $lesson)
          <div class="col-md-3 col-sm-6 mb-4">
            <div class="lessons  contTechFolder  " id="{{$lesson->id}}">
              <div class="overlay">
                <div class="content">
                <div class="overlay_btn mt-5">
                    <br>
                  <a href="{{url('student/view_lesson?lesson_id='.$lesson->id)}}" 
                  class="btn live__Session d-flex align-items-center justify-content-center">
                    <i class="fa fa-eye" aria-hidden="true"></i>View
                  </a>
                </div>
              </div>
            </div>
             
              <div class="lessons__card__header d-flex mx-2">
                <div class="w-25 d-flex align-items-center">
                  <div class="d-flex"><br>
                      @if(!empty($lesson->background))
                        <img class="img-fluid " width="100%" style="height: 7em;"
                          src="{{url('storage/'.$lesson->background)}}">
                        @else
                        <img class="img-fluid " width="100%" style="height: 7em;"
                          src="../images/logo.png">
                      @endif
                  </div>
                </div>
                <div class="w-75">
                  <div class="title">
                    <span for="{{$lesson->id.'_checkbox'}}" class="d-block text-capitalize">{{$lesson->name}}
                      <span style="font-size:20px;float: right;color:#ffd43b">
                          <i class="fas fa-star"></i>
                      </span>
                    </span>
                    <span class="d-block text-capitalize">
                        {{$my_teacher->fname.' '.$my_teacher->lname}}
                    </span>
                     <span class="text-capitalize" style="float:right;">
                        Unit :{{ $lesson->unit}}
                    </span>
                    <span class="d-block text-capitalize">
                       {{get_name_subject(request('subject_id'))}}
                   </span>
                    <span>{{\Carbon\Carbon::parse($lesson->updated_at)->format('d-m-Y h:i:s')}}
                    </span> 
                    <span style="float:right;">{{get_size_lesson($lesson->id,'',$lesson->instructor_id)}}</span>
                  </div>
                </div>
              </div>
              <div class="lesson_image">
                @if(!empty($lesson->background))
                <img class="img-fluid " width="100%" style="height: 7em;"
                  src="{{url('storage/'.$lesson->background)}}">
                @else
                <img class="img-fluid " width="100%" style="height: 7em;"
                  src="{{url('image/overlayGlobale.jpg')}}">
                @endif
              </div>
            </div>

          </div>
          @endforeach
        </div>
      </div>

      <!-- End -->
        
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
