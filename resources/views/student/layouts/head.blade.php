<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/icon" href="{{url('images/logo.png')}}"> <!-- favicon-icon -->
    <link rel="stylesheet" href="https://unpkg.com/multiple-select@1.5.2/dist/multiple-select.min.css">
    <link href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" rel="stylesheet" />
    <link rel="stylesheet" href="./../style.css" />
    @include('admin.layouts.head')
    <link rel="stylesheet" href="{{ url('student/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ url('student/css/all.css') }}">
    <link rel="stylesheet" type="text/css" media="screen" href="{{ url('student/css/style.css') }}" />
    <title>@yield('title')</title>

</head>

<body>
    <div class="student__Profile mb-5">

        <!-- navbar -->
        <div class="student">
            <div class="NavTeacher">
                <div class="navbarStudent">
                    <nav class="navbar navbar-expand-lg navbar-light">
                        <div class="container-fluid">
                            <div class="navbar-brand">
                                <img src="../images/iPluto_Logo_Animation.gif" alt="">
                            </div>
                            <div class="collapse navbar-collapse d-flex justify-content-between "
                                id="navbarSupportedContent">
                                <div class="search ml-5">
                                    <i class="fas fa-search"></i>
                                    <input type="text" class="form-control shadow-sm" placeholder="Search" />
                                </div>


                                <div class="d-flex justify-content-between align-items-center">



                                   
                                <div class="notification mx-2" id="notification_interval" >

                                    <div class="icon" id="bell">
                                        <i class="far fa-bell fa-lg"></i>
                                         @if(notifications_count('student_id') != 0)
                                            <span class="notification--num">
                                                {{notifications_count('student_id')}}
                                            </span>
                                         @endif
                                    </div>

                                    <div class="notifications_menu" id="box">
                                        <div class="h1 font-weight-bold d-flex justify-content-between"
                                        style="border-bottom: 1px solid #DDD;">
                                            <span>
                                                Notifications
                                            </span>
                                            <span>
                                            {{--<!-- <a href="{{url('/delete/notifications?colum=student_id')}}" style="color:#db0404">
                                                <i class="fas fa-trash"></i>
                                               </a> -->--}}
                                            </span>
                                        </div>

                            <div id="notifications" >
                               @foreach(notifications('student_id') as $n)
                                   <!-- begin notifications-item -->
                                     <div class="notifications-item"  syle="display:flex !important">
                                         @if($n->notifiable_type == 'zoom')
                                           @php 
                                           $zoom = \App\Zoom::where('id',$n->notifiable_id)->first();
                                           @endphp
                                          {{-- <!-- <a href="{{$zoom->url}}">  -->--}}
                                          @else
                                           <!-- <a href="#"> -->
                                          @endif
                                         
                                          @if($n->type == 'ipluto')
                                            <img src="../images/logo.png">
                                          @elseif($n->type == 'instructor')
                                            @if($n->user->user_img != null && $n->user->user_img && @file_get_contents('images/user_img/'.$n->user->user_img))
                                                <img src="{{ url('images/user_img/'.$n->user->user_img)}}"
                                                    alt="profilephoto" class="rounded-circle">

                                                @elseif($n->user->user_img != null && $n->user->user_img
                                                !='' && @file_get_contents('images/avatar/'. $n->user->user_img))
                                                <img src="{{ url('images/avatar/'.$n->user->user_img)}}"
                                                    alt="profilephoto" class="rounded-circle">

                                                @else

                                                <img @error('photo') is-invalid @enderror
                                                    src="{{ Avatar::create($n->user->fname)->toBase64() }}"
                                                    alt="profilephoto" class="rounded-circle">
                                                @endif

                                          @endif
                                         <div class="text row" style="margin-right:0px;">
                                           <div class="col-md-8">
                                               <h4 class="text-capitalize">
                                                @if($n->type == 'ipluto')
                                                  Ipluto

                                                 @elseif($n->type == 'instructor')
                                                   {{ucwords($n->user->fname)}} 
                                                   {{ucwords($n->user->lname)}} 
                                                @endif
                                                </h4>
                                           </div>
                                           <div class="col-md-4">
                                                <p >
                                                 {{ \Carbon\Carbon::parse($n->created_at)->shortRelativeDiffForHumans() }}
                                                 </p>
                                           </div>
                                           <div class="col-md-12">
                                               <p>{{$n->data}}</p>
                                           </div>
                                        </div>
                                      {{-- <!-- </a> -->--}}
                                 </div>
                                   <!-- End notifications-item -->
                                @endforeach
                              </div>
                                    </div>
                                </div>


                                    <div class="avatarNavStu">
                                        <a class="nav-link dropdown-toggle" href="#" role="button"
                                            data-toggle="dropdown" aria-expanded="false">
                                        </a>
                                        <div class="dropdown-menu">
                                            <div class="dropdownHead ">
        
                                                @if(Auth()->User()['user_img'] != null && Auth()->User()['user_img']
                                                !='' && @file_get_contents('images/user_img/'.Auth::user()['user_img'].'.png'))
                                                <img src="{{ url('images/user_img/'.Auth()->User()['user_img'].'.png')}}"
                                                    alt="profilephoto" class="rounded-circle">

                                                @elseif(Auth()->User()['user_img'] != null && Auth()->User()['user_img']
                                                !='' && @file_get_contents('images/avatar/'.Auth::user()['user_img'].'.png'))
                                                <img src="{{ url('images/avatar/'.Auth()->User()['user_img'].'.png')}}"
                                                    alt="profilephoto" class="rounded-circle">

                                                @else
    
                                                <img @error('photo') is-invalid @enderror
                                                    src="{{ Avatar::create(Auth::user()->fname)->toBase64() }}"
                                                    alt="profilephoto" class="rounded-circle">
                                                @endif
                                                <div class="dropdownHeadText">
                                                    <br>
                                                    <h5>{{\Auth::user()->fname.' '.\Auth::user()->lname}}</h5>
                                                    <h6 style="margin-top:-8px !important;">{{\Auth::user()->email}}
                                                    </h6>
                                                    <h6 style="margin-top:-5px !important;">
                                                       Your Code Is : {{\Auth::user()->code}}
                                                    </h6>
                                                </div>

                                            </div>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#">Manage ipluto account</a>
                                            <a class="dropdown-item" href="#">Lesson Settings</a>
                                            <a class="dropdown-item" href="#">Notification Preferences</a>
                                            <a class="dropdown-item" href="#">Help & FAQs</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item doLogout" href="{{ route('logout') }}"
                                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();hiddenName();">
                                                {{ __('frontstaticword.Logout') }}

                                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                    class="display-none">
                                                    @csrf
                                                </form>
                                            </a>
                                        </div>
                                        <script>
                                            function hiddenName(){
                                                document.getElementById('logout-form').remove();
                                            }
                                        </script>
                                        @if(Auth()->User()['user_img'] != null && Auth()->User()['user_img'] !='' &&
                                        @file_get_contents('images/user_img/'.Auth::user()['user_img']))
                                        <img src="{{ url('images/user_img/'.Auth()->User()['user_img'].'.png')}}"
                                            alt="profilephoto" width='50px' height="50px" class="rounded-circle">

                                        @elseif(Auth()->User()['user_img'] != null && Auth()->User()['user_img'] !='' &&
                                        @file_get_contents('images/avatar/'.Auth::user()['user_img'].'.png'))
                                        <img src="{{ url('images/avatar/'.Auth()->User()['user_img'].'.png')}}"
                                            alt="profilephoto" width='50px' height="50px" class="rounded-circle">

                                        @else
                                        <img @error('photo') is-invalid @enderror
                                            src="{{ Avatar::create(Auth::user()->fname)->toBase64() }}"
                                            alt="profilephoto" width='50px' height="50px" class="rounded-circle">

                                        @endif

                                    </div>
                                </div>

                            </div>
                        </div>
                    </nav>
                </div>
            </div>
            <!-- End navbar -->
            <div class="custom-container">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb inner__breadcrumb d-flex justify-content-between">
                        <li class="breadcrumb-item active d-flex align-items-center" aria-current="page">
                            <img src="./images/Profile/breadcrumb_icon.png" class="img-fluid" alt="">
                            @yield('title')
                             <div style="margin:0px 40px;">
                               <form action="{{url('student/joinClass')}}" method="GET">
                                 <input type="text" name="class_key" value="@if(request()->has('class_key')){{request('class_key')}} @else{{auth()->user()->class_key}}@endif" 
                                  style="width:300px;padding:0px 5px" minlength="5" maxlength="5" required placeholder="Enter  your Code Join Class ">
                                  <input  class="btn btn-success" type="submit" value="Join" style="padding:0px 5px">
                               </form>
                             </div>
                        </li>
                        <a href="{{url()->previous()}}"
                            style="margin:10px;color: #fff;border: 1px solid #FFE;padding: 0px 14px;">
                            <i class="feather icon-arrow-left mr-2"></i>Back
                        </a>
                        <!-- <li class="back" aria-current="page">
            <button type="button" class="btn btn-light text-capitalize">back </button>
          </li> -->
                    </ol>
                </nav>
            </div>
            @yield('select_subject')

            @yield('maincontent')

        </div>


        @include('student.layouts.footer')
        <script>
            $(document).ready(function () {
                var down = false;

                $('#bell').click(function (e) {

                    var color = $(this).text();
                    if (down) {

                        $('#box').css('height', '0px');
                        $('#box').css('opacity', '0');
                        down = false;
                    } else {

                        $('#box').css('height', 'auto');
                        $('#box').css('opacity', '1');
                        down = true;

                    }

                });

            });
        </script>