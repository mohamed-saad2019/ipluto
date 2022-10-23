<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />



    <link rel="stylesheet" href="https://unpkg.com/multiple-select@1.5.2/dist/multiple-select.min.css">

    <link href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" rel="stylesheet" />
    <link rel="stylesheet" href="./../style.css" />
    <!-- <link rel="stylesheet" href="{{ url('css/style.css') }}" /> -->
    @include('admin.layouts.head')
    <title>@yield('title')</title>

</head>

<body>
    <div class="student">
        <div class="NavTeacher">

            <div class="navbarStudent">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <div class="container-fluid">
                        <div class="navbar-brand">
                            <img src="../images/iPluto_Logo_Animation.gif" alt="">
                        </div>
                        <button type="button" id="sidebarCollapse" class="btn btn-info">
                            <i class="fas fa-align-left"></i>
                        </button>
                        <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button"
                            data-toggle="collapse" data-target="#navbarSupportedContent"
                            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <i class="fas fa-align-justify"></i>
                        </button>

                        <div class="collapse navbar-collapse d-flex justify-content-between "
                            id="navbarSupportedContent">
                            <div class="search ml-5">
                                <i class="fas fa-search"></i>
                                <input type="text" class="form-control shadow-sm" placeholder="Search" />
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="Create">
                                    <div class="dropdown">
                                        <button class="btn dropdown-toggle togCreate" type="button"
                                            id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">Create
                                        </button>
                                        <div class="dropdown-menu dropTeach dropdown-itemLess"
                                            aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item" href="{{url('instructor/add_lesson')}}"> Lesson</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#"> Video</a>
                                        </div>
                                    </div>
                                </div>



                                <!-- <div class="notification mx-2">
                                    <i class="far fa-bell fa-lg"></i>
                                    <span class="notification--num">5</span>
                                </div> -->
                                <ul class="list-unstyled">


                                    <li class="message-nav dropdown">
                                        <a href="#" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="true">
                                            <div class="notification mx-2">
                                                <i class="far fa-bell fa-lg"></i>
                                                <span class="notification--num">5</span>
                                            </div>
                                            <ul class="dropdown-menu dropdown-menu-right list-unstyled"
                                                aria-labelledby="dropdownMenu1">
                                                <li class="notification-title mt-2">
                                                    <h6 class="h5 pl-2">Notification</h6>
                                                </li>
                                                <ul class="notification-list  list-unstyled">
                                                    <li class="notification-item">
                                                        <a class="notification-anchor" href="#">
                                                            <p class="notification-details">
                                                                <strong>Anh Nguyen</strong> |
                                                                <span class="timestamp">15 mins ago</span>
                                                            </p>
                                                            <p class="notification-content">
                                                                Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                                            </p>
                                               
                                                        </a>
                                                    </li>
                                                    <li class="notification-item">
                                                        <a class="notification-anchor" href="#">
                                                            <p class="notification-details">
                                                                <strong>Anh Nguyen</strong> |
                                                                <span class="timestamp">15 mins ago</span>
                                                            </p>
                                                            <p class="notification-content">
                                                                Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                                            </p>
                                               
                                                        </a>
                                                    </li>

                                                </ul>
                                                <li class="notification-footer pl-2 mt-3">
                                                    <h4><a>View All</a></h4>
                                                </li>
                                            </ul>
                                        </a>
                                    </li>
                                </ul>


                                <div class="setting mr-3">
                                    <i class="fa fa-cog fa-lg"></i>
                                </div>
                                <div class="avatarNavStu">
                                    <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                                        aria-expanded="false">
                                    </a>
                                    <div class="dropdown-menu">
                                        <div class="dropdownHead ">
                                         @if(Auth()->User()['user_img'] != null && Auth()->User()['user_img'] !='' && @file_get_contents('images/user_img/'.Auth::user()['user_img']))
                                         <img src="{{ url('images/user_img/'.Auth()->User()['user_img'])}}" 
                                         alt="profilephoto" class="rounded-circle">

                                        @elseif(Auth()->User()['user_img'] != null && Auth()->User()['user_img'] !='' && @file_get_contents('images/avatar/'.Auth::user()['user_img']))
                                         <img src="{{ url('images/avatar/'.Auth()->User()['user_img'])}}" 
                                         alt="profilephoto" class="rounded-circle">

                                        @else

                                         <img @error('photo') is-invalid @enderror src="{{ Avatar::create(Auth::user()->fname)->toBase64() }}"
                                             alt="profilephoto"  class="rounded-circle">
                                       @endif
                                            <div class="dropdownHeadText">
                                                <h5>{{\Auth::user()->fname.' '.\Auth::user()->lname}}</h5>
                                                <h6 style="margin-top:-8px !important;">{{\Auth::user()->email}}</h6>
                                                <div class="progress" style="height:6px">
                                                    <div class="progress-bar" role="progressbar"
                                                        style="width:{{calc_free_size(get_size_instructor())}}"></div>
                                                </div>
                                                <small style="">
                                                    {{get_size_instructor()}}
                                                    of
                                                    {{\Auth::user()->storage==null?100:\Auth::user()->storage}}MB
                                                </small>
                                                <p style="margin-top:-8px !important;">
                                                    <a href="#">
                                                        <small style="font-size:12px !important;font-weight:bold;">
                                                            Storage space upgrade</small>
                                                    </a>
                                                </p>
                                            </div>

                                        </div>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#">Manage ipluto account</a>
                                        <a class="dropdown-item" href="#">Lesson Settings</a>
                                        <a class="dropdown-item" href="#">Notification Preferences</a>
                                        <a class="dropdown-item" href="#">Help & FAQs</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            {{ __('frontstaticword.Logout') }}

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                class="display-none">
                                                @csrf
                                            </form>
                                        </a>
                                    </div>

                              @if(Auth()->User()['user_img'] != null && Auth()->User()['user_img'] !='' && @file_get_contents('images/user_img/'.Auth::user()['user_img']))
                               <img src="{{ url('images/user_img/'.Auth()->User()['user_img'])}}" alt="profilephoto" width='50px' height="50px" class="rounded-circle">

                              @elseif(Auth()->User()['user_img'] != null && Auth()->User()['user_img'] !='' && @file_get_contents('images/avatar/'.Auth::user()['user_img']))
                               <img src="{{ url('images/avatar/'.Auth()->User()['user_img'])}}" alt="profilephoto" width='50px' height="50px" class="rounded-circle">
                                           
                                 @else
                                  <img @error('photo') is-invalid @enderror src="{{ Avatar::create(Auth::user()->fname)->toBase64() }}" alt="profilephoto" width='50px' height="50px" class="rounded-circle">
        
                                @endif
                                </div>
                            </div>

                        </div>
                    </div>
                </nav>

                <div class="wrapper">

                    <!-- Sidebar  -->
                    <nav id="sidebar">
                        <div class="breadcrumb">
                            Welcome Mr. {{\Auth::user()->fname}}
                        </div>
                        <ul class=" sidebar_links">
                            <li>
                                <a href="#Dashboard" data-toggle="collapse" aria-expanded="false"
                                    class="dropdown-toggle">
                                    <i class="fa fa-thermometer-three-quarters" aria-hidden="true"></i>
                                    Dashboard
                                </a>
                                <ul class="collapse list-unstyled" id="Dashboard">
                                    <li class="active">
                                        <a href="{{url('instructor/students')}}"> Students</a>
                                    </li>
                                    <li>
                                        <a href="#"> Videos </a>
                                    </li>
                                    <li>
                                        <a href="#"> Calendar </a>
                                    </li>
                                    <li>
                                        <a href="#"> Questions </a>
                                    </li>
                                    <li>
                                        <a href="#"> Reports </a>
                                    </li>
                                    <li>
                                        <a href="#"> Notification </a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#Assignment" data-toggle="collapse" aria-expanded="false"
                                    class="dropdown-toggle">
                                    <i class="fa fa-thermometer-three-quarters" aria-hidden="true"></i>
                                    Assignment
                                </a>
                                <ul class="collapse list-unstyled" id="Assignment">
                                    <li>
                                        <a href="#">New Assessment</a>
                                    </li>
                                    <li>
                                        <a href="#">Previous Assessment</a>
                                    </li>
                                    <li>
                                        <a href="#">Live Session</a>
                                    </li>
                                </ul>
                            </li>

                            <li>
                                <a href="#Classes" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                                    <i class="fa fa-users" aria-hidden="true"></i>
                                    Classes
                                </a>
                                <ul class="collapse list-unstyled" id="Classes">

                                    <li>
                                        <a href="{{route('list_classes')}}"> ALL Classes </a>
                                    </li>
                                    <li>
                                        <a href="{{route('instructor_add_class')}}"> Create Class </a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="{{route('instructor.library')}}">
                                    <i class="fa fa-users" aria-hidden="true"></i>
                                    Lessons
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fa fa-users" aria-hidden="true"></i>
                                    Library
                                </a>
                            </li>

                            <div class="dropdown-divider" style="border-top: 1px solid #F0B243"></div>
                            <li>
                                <a href="#Grade" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                                    <i class="fa fa-thermometer-three-quarters" aria-hidden="true"></i>
                                    Grade
                                </a>
                                <ul class="collapse list-unstyled" id="Grade">
                                    <li>
                                        <a href="#">New Assessment</a>
                                    </li>
                                    <li>
                                        <a href="#">Previous Assessment</a>
                                    </li>
                                    <li>
                                        <a href="#">Live Session</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#Subject" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                                    <i class="fa fa-thermometer-three-quarters" aria-hidden="true"></i>
                                    Subject
                                </a>
                                <ul class="collapse list-unstyled" id="Subject">
                                    <li>
                                        <a href="#">New Assessment</a>
                                    </li>
                                    <li>
                                        <a href="#">Previous Assessment</a>
                                    </li>
                                    <li>
                                        <a href="{{route('create.zoom')}}">Live Session</a>
                                    </li>
                                </ul>
                            </li>

                        </ul>

                    </nav>

                    <!-- Page Content  -->
                    <div id="content">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <div class="container">
                                    <li class="breadcrumb-item active" aria-current="page">
                                        <i class="fa fa-line-chart" aria-hidden="true"></i>
                                        @yield('title')
                                    </li>
                                </div>
                            </ol>
                        </nav>

                        @yield('maincontent')

                    </div>
                </div>

            </div>
        </div>
    </div>


    @include('instructor.layouts.footer')