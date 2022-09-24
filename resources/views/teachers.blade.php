@extends('theme.master')
@section('title', 'Online Courses')
@section('content')
<div class="teacherParent">
      <!-- start overLayGlobal -->

      <div class="overLayGlobal">
        <div class="overLayGlobalChild"></div>
        <div class="container">
          <div class="overLayGlobaleText">
            <!-- <h3>Title Page</h3>
            <div>
              <a href="">Home</a>
              <span></span>
              <a>Title Page</a>
            </div> -->
          </div>
        </div>
      </div>

      <!-- start overLayGlobal -->

      <div class="container">
        <div class="row">
        @foreach($teachers as $teacher)
          <div class="col-12 col-md-6 col-lg-3">
            <a href="{{route('teacher',$teacher->id)}}">
            <div class="teacherParent1">
              <div class="teacherParentimg">
                <div class="overlayteacherParent"></div>
                <img src="{{url('images/user_img/')}}/{{$teacher->user_img}}" alt="" />
              
              </div>
              <div class="teacherParentText">
                <h5>{{$teacher->fname}} {{$teacher->lname}}</h5>
                <h6>{{$subject->title}}</h6>
              </div>
            </div>
            </a>
          </div>
        @endforeach
        </div>
      </div>
    </div>
@endsection