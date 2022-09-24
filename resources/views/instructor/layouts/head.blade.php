<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
    integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous" />
  <link href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" rel="stylesheet" />
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous" />
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
      <div class="container">
        <div class="navbarStuTop">
          <div class="logoNavStu">
            <a href="#">
              <!-- <img src="./../../image/logo.png" alt="" /> -->

           <img src="../images/iPluto_Logo_Animation.gif" style="width: 97px;height: 57px;" alt="" />
            </a>
          </div>
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
                <div class="dropdownHead">
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
               <a href="http://127.0.0.1:8000/logout" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="dropdown-item">Logout
                  <form id="logout-form" action="http://127.0.0.1:8000/logout" method="POST" class="display-none">{{ csrf_field() }}  </form>
               </a>
              </div>

                    @if($image = @file_get_contents('../public/images/user_img/'.\Auth::user()->user_img))
                    <img   @error('photo') is-invalid @enderror src="{{ url('images/user_img/'.\Auth::user()->user_img) }}" alt="profilephoto" width='100px' height="50px"
                     style="padding: 3px">
               @else
                    <img   @error('photo') is-invalid @enderror src="{{ Avatar::create(\Auth::user()->fname)->toBase64() }}" alt="profilephoto" width='100px' height="50px" style="padding: 3px">
               @endif 
            </div>
          </div>
        </div>
      </div>
      <div class="navbarStuBott">
        <div class="container">
          <div class="navbarStuBottChild">
            <ul class="dropTecher">
              <li>
                <div class="dropdown show">
                  <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    Dashboard
                  </a>

                  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <a class="dropdown-item" href="{{url('instructor/students')}}">Students</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#"> Videos </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#"> Calendar </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#"> Questions </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#"> Reports </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#"> Notification </a>
                  </div>
                </div>
              </li>
              <li>
                <div class="dropdown show">
                  <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    Assignment
                  </a>

                  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <a class="dropdown-item" href="#">New Assessment</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#"> Previous Assessment </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#"> Live Session </a>
                  </div>
                </div>
              </li>
              <li>
                <div class="dropdown show">
                  <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    Classes
                  </a>

                  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <a class="dropdown-item" href="{{route('list_classes')}}"> ALL Classes </a>
                    <a class="dropdown-item" href="{{route('instructor_add_class')}}"> Create Class </a>
                  </div>
                </div>
              </li>
              <li> <a href="{{route('instructor.library')}}">Library</a> </li>
            </ul>
          </div>
        </div>
      </div>

            @yield('maincontent')
  
    </div>
  </div>
</div>


    <footer class="footer mt-auto py-3 bg-dark" style="display:none">
    <div class="container" id="footer_from_library_js">
      <button class="btn btn-danger" style="float:right !important;padding:3px 25px" 
      id="ensure_multi_del">Delete selected lessons</button><br>
    </div>
      <div class="container" id="footer_from_add_lesson_js" style="display:none">
        @if(isset($folder_id))
          <a class='btn btn-success' 
             href="{{url('instructor/saved_lesson?id='.request('id').'&folder_id='.$folder_id.'&parent_id='.$parent_id)}}"
          style="float:right !important;padding:3px 25px;margin:0px 5px;">Save & Exit
          </a>   
        @else
          <a class='btn btn-success' href="{{url('instructor/saved_lesson?id='.request('id'))}}"
          style="float:right !important;padding:3px 25px;margin:0px 5px;">Save & Exit
          </a>
        @endif
        <a class='btn btn-primary' href="#" 
          style="float:right !important;padding:3px 25px;margin:0px 5px;" >preview Lesson
       </a>
       <br>
    </div>
  </footer>
    <script src="./../script.js"></script>
    @include('admin.layouts.scripts')
    @yield('scripts')

</body>

</html>