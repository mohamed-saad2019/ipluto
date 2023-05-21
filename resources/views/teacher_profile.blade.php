@extends('theme.master')
@section('title', 'Online Courses')
@section('content')

<div class="profileTeacher">
      <!-- start overLayGlobal -->

      <div class="overLayGlobal">
        <div class="overLayGlobalChild"></div>
        <div class="container">
          <div class="overLayGlobaleText">
            <h3>Title Page</h3>
            <div>
              <a href="">Home</a>
              <span></span>
              <a>Title Page</a>
            </div>
          </div>
        </div>
      </div>

      <!-- start overLayGlobal -->
      <div class="container">
        <div class="row">
          <div class="col-12 col-lg-6">
            <div class="textTeacher">
              <span>Mr</span>
              <h2>{{$teacher->fname}} {{$teacher->lname}}</h2>
              <h3><span></span> {{$teacher->subject[0]->title}}</h3>
              @foreach($teacher->grades as $grade)
              <p>{{$grade->title}}</p>
              @endforeach
              <p>{{$teacher->address}}</p>
              <p>{!! $teacher->detail !!}</p>
              <div class="teacherBut">

                <a href="#">
                  <button>
                    Videos <span><i class="fas fa-play"></i></span>
                  </button>
                </a>
                
                <a href="/calendar/index.html" target="_blank"><button type="submit" class="primaryLast">live session</button></a>
              </div>
            </div>
          </div>
          <div class="col-12 col-lg-6">
            <div class="imageTeacher">
              <span></span>
              <span></span>
              @if($image = @file_get_contents('../public/images/user_img/'.$teacher->user_img))
              <img style="width: 322px;" src="{{url('images/user_img')}}/{{$teacher->user_img}}" />
              @endif 
            </div>
          </div>
        </div>
      </div>
    </div>
    
    @endsection