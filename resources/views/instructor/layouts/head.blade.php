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
         <div class="wrapper">
            <!-- Sidebar  -->
            <nav id="sidebar">
                <div class="sidebar-header text-center">
                    <img src="../images/iPluto_Logo_Animation.gif" alt="">            
                </div>

                <ul class="list-unstyled sidebar_links ml-2">
                    <!-- <li class="active">
                        <a href="#">Dashboarddd</a>
                    </li> -->

                    <!--       
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <a class="dropdown-item" href="{{url('instructor/students')}}">Students</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#"> Videos </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#"> Calendar </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#"> Questions </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#"> Questions </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#"> Notification </a>
                  </div> -->
                    <li >
                        <a href="#Assignment" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Dashboarddd</a>
                        <ul class="collapse list-unstyled" id="Assignment">
                            <li>
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
                            <a href="#"> Reports  </a>
                            </li>
                            <li>
                            <a href="#"> Notification </a>
                            </li>
                        </ul>
                    </li>
                    <li >
                        <a href="#Assignment" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Assignment</a>
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
                        <a href="#Classes" data-toggle="collapse" aria-expanded="false"
                            class="dropdown-toggle">Classes</a>
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
                        <a href="{{route('instructor.library')}}">Lessons</a>
                    </li>
                    <li>
                        <a href="#">Library</a>
                    </li>
        
                </ul>
            </nav>

        <!-- Page Content  -->
        <div id="content">

            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">

                    <button type="button" id="sidebarCollapse" class="btn btn-info">
                        <i class="fas fa-align-left"></i>
                    </button>
                    <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-align-justify"></i>
                    </button>

                    <div class="collapse navbar-collapse d-flex justify-content-between" id="navbarSupportedContent">
                        <div class="search">
                            <i class="fas fa-search"></i>
                            <input type="text" class="form-control" placeholder="Search By Topic Or Standard" />
                        </div>
                        <div class="d-flex">
                            <div class="dropdown">
                            <button class="btn dropdown-toggle togCreate" type="button" id="dropdownMenuButton" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">Create
                            </button>
                            <div class="dropdown-menu dropTeach dropdown-itemLess" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="{{url('instructor/add_lesson')}}"> Lesson</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#"> Video</a>
                                <!-- <div class="dropdown-divider"></div>
                                <a class="dropdown-item" data-toggle="modal" data-target="#exampleModalCenter"> Folder</a> -->
                            </div>
                            </div>
                            <div class="avatarNavStu">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                            </a>
                            <div class="dropdown-menu">
                                <div class="dropdownHead ">
                                    @if($image = @file_get_contents('../public/images/user_img/'.\Auth::user()->user_img))
                                            <img   @error('photo') is-invalid @enderror src="{{ url('images/user_img/'.\Auth::user()->user_img) }}" alt="profilephoto" class="img-responsive img-circle" >
                                        @else
                                            <img   @error('photo') is-invalid @enderror src="{{ Avatar::create(\Auth::user()->fname)->toBase64() }}" alt="profilephoto" class="img-responsive img-circle">
                                    @endif 
                                <div class="dropdownHeadText">
                                    <h5>{{\Auth::user()->fname.' '.\Auth::user()->lname}}</h5>
                                    <h6 style="margin-top:-8px !important;">{{\Auth::user()->email}}</h6>
                                    <div class="progress" style="height:6px">
                                    <div class="progress-bar" role="progressbar" style="width:{{calc_free_size(get_size_instructor())}}"></div>
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
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        {{ __('frontstaticword.Logout') }}
                                        
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="display-none">
                                            @csrf
                                        </form>
                                </a>
                            </div>

                                    @if($image = @file_get_contents('../public/images/user_img/'.\Auth::user()->user_img))
                                    <img   @error('photo') is-invalid @enderror src="{{ url('images/user_img/'.\Auth::user()->user_img) }}" alt="profilephoto" width='60px' height="60px" class="rounded-circle"
                                    style="padding: 3px">
                            @else
                                    <img   @error('photo') is-invalid @enderror src="{{ Avatar::create(\Auth::user()->fname)->toBase64() }}" alt="profilephoto" width='60px' height="60px" style="padding: 3px" class="rounded-circle">
                            @endif 
                            </div>
                        </div>

                    </div>
                </div>
            </nav>

             @yield('maincontent')

        </div>
    </div>

</div>
  </div>
</div>


                @include('instructor.layouts.footer')
