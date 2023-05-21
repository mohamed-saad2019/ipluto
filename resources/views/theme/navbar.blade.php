<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" type="image/icon" href="{{url('images/logo.png')}}"> <!-- favicon-icon -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
        integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" rel="stylesheet">

    <link rel="stylesheet" href="{{url('css/custom-style.css')}}">
    <title>@yield('title') | {{ $gsetting->project_title ?? '' }}</title>
</head>

<body>
    <!-- start Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light fix">
        <div class="container">
            <a class="navbar-brand" href="#"> <img src="{{url('images/iPluto_Logo_Animation.gif')}}" alt=""> </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span><i class="fas fa-bars"></i></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav m-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('home')}}"> <span></span>Home </a>
                    </li>

                    @if(!Auth::check())
                     <li class="nav-item">
                      <a class="nav-link" href="{{ route('register') }}"> <span></span>Become A Student</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('become_teacher')}}"> <span></span>Become A Teacher </a>

                    </li>
                    @endif
                    <!-- ####################### start new Find Teacher ####################### -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                            aria-expanded="false">
                            Find Teacher
                        </a>
                        <span></span>
                        <div class="dropdown-menu">

                            @if(\App\ChildCategory::where('status', '1')->GroupBy('slug')->orderBy('id','ASC')->get())
                            @foreach(\App\ChildCategory::where('status',
                            '1')->GroupBy('slug')->orderBy('id','ASC')->get() as $child)
                            <div class="dropdown-item-list">
                                @if(count(\App\SubCategory::whereIN('id' , \App\ChildCategory::where('slug' ,
                                $child->slug)->pluck('subcategory_id'))->get()) > 0 )
                                <ul class="dropdown-item-ul">
                                    @foreach(\App\SubCategory::whereIN('id' , \App\ChildCategory::where('slug' ,
                                    $child->slug)->pluck('subcategory_id'))->get() as $grade)
                                    <li> <a href="{{route('teachers',[$child->id,$grade->id])}}">{{$grade->title}}</a>
                                    </li>
                                    @endforeach
                                </ul>
                                @endif
                                <a class="dropdown-item" href="#">{{$child->title}} <span></span> </a>
                            </div>
                            @endforeach
                            @endif
                        </div>
                    </li>
                    <!-- ####################### start new Find Teacher ####################### -->

                    <li class="nav-item">
                        <a class="nav-link" href="{{route('user_contact')}}"> <span></span>Contact </a>

                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('about.show')}}"> <span></span>About </a>

                    </li>
                </ul>
                @guest
                <div class="iconUserShp">
                    <a href="{{ route('login') }}">Login</a>
                    {{--<a href="{{ route('register') }}">Register</a>--}}
                </div>
                @endguest
                @auth
                <div class="iconUserShp" style="display: contents;">
                    @if(Auth::User()['role'] == 'instructor')
                    <a href="{{url('instructor')}}"><button class="form-control" style="margin-top: 5px">
                            My Dashboard
                        </button></a>
                    @elseif(Auth::User()['role'] == 'user')
                     @if(!empty(get_student_subjects()))
                    <a href="{{url('student/profile?subject_id='.auth()->user()->subject_id.'&class_id='.auth()->user()->class_key)}}"><button class="form-control" style="margin-top: 5px">
                            My Dashboard
                        </button></a>                        
                     @endif
                    @endif
                    <span><i class="fas fa-shopping-cart"></i></span>
                    @if(Auth::User()['user_img'] != null && Auth::User()['user_img'] !='' &&
                    @file_get_contents('images/avatar/'.Auth::user()['user_img']))

                    <span><img src="{{ url('/images/avatar/'.Auth::User()->user_img) }}"
                            style="width: 35px;height: 35px;border-radius: 50%;" class="dropdown-user-circle"
                            alt=""></span>
                    @else
                    <!-- <span><img src="{{ asset('images/default/user.jpg')}}" class="dropdown-user-circle" alt=""></span> -->
                    @endif

                    <div class="user-detailss">
                        Hi, {{ Auth::User()->fname }}
                    </div>
                    <a href="{{ route('logout') }}" class="doLogout" 
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();hiddenName();">
                        {{ __('frontstaticword.Logout') }}

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="display-none">
                            @csrf
                        </form>
                    </a>
                </div>
                @endauth

            </div>
        </div>
    </nav>
    <script>
        function hiddenName(){
            document.getElementById('logout-form').remove();
        }
    </script>

    <!-- end Navbar -->