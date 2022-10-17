<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/icon" href="{{url('images/logo.png')}}"> <!-- favicon-icon -->
    <link rel="stylesheet" href="./../style.css" />
        @include('admin.layouts.head')
    <link rel="stylesheet" href="{{ url('student/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ url('student/css/all.css') }}">
    <link rel="stylesheet" type="text/css" media="screen" href="{{ url('student/css/style.css') }}" />
    <title>@yield('title')</title>

</head>

<body>
  <div class="student__Profile">

    <!-- navbar -->
   <div class="student">
        <div class="NavTeacher">
            <div class="navbarStudent">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <div class="container-fluid">
                        <div class="navbar-brand">
                            <img src="../images/iPluto_Logo_Animation.gif" alt="">
                        </div>
                        <div class="collapse navbar-collapse d-flex justify-content-between " id="navbarSupportedContent">
                            <div class="search ml-5">
                                <i class="fas fa-search"></i>
                                <input type="text" class="form-control shadow-sm" placeholder="Search" />
                            </div>
                            <div class="d-flex justify-content-between align-items-center" >
                            <div class="avatarNavStu">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                                    aria-expanded="false">
                                </a>
                                <div class="dropdown-menu">
                                    <div class="dropdownHead ">
                                        @if($image =
                                        @file_get_contents('../public/images/user_img/'.\Auth::user()->user_img))
                                        <img @error('photo') is-invalid @enderror
                                            src="{{ url('images/user_img/'.\Auth::user()->user_img) }}"
                                            alt="profilephoto" class="img-responsive img-circle">
                                        @else
                                        <img @error('photo') is-invalid @enderror
                                            src="{{ Avatar::create(\Auth::user()->fname)->toBase64() }}"
                                            alt="profilephoto" class="img-responsive img-circle">
                                        @endif
                                        <div class="dropdownHeadText">
                                             <br>
                                            <h5>{{\Auth::user()->fname.' '.\Auth::user()->lname}}</h5>
                                            <h6 style="margin-top:-8px !important;">{{\Auth::user()->email}}</h6>
                                          
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

                                @if($image =
                                @file_get_contents('../public/images/user_img/'.\Auth::user()->user_img))
                                <img @error('photo') is-invalid @enderror
                                    src="{{ url('images/user_img/'.\Auth::user()->user_img) }}" alt="profilephoto"
                                    width='50px' height="50px" class="rounded-circle">
                                @else
                                <img @error('photo') is-invalid @enderror
                                    src="{{ Avatar::create(\Auth::user()->fname)->toBase64() }}" alt="profilephoto"
                                    width='50px' height="50px" class="rounded-circle">
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
          </li>
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