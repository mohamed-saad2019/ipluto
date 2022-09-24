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
         <div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <h3>ipiuto</h3>
            </div>

            <ul class="list-unstyled components">
                <li class="active">
                    <a href="#">Dashboard</a>
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
                            <a href="#">ALL Classes</a>
                        </li>
                        <li>
                            <a href="#">Create Class </a>
                        </li>
                    </ul>
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

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="nav navbar-nav ml-auto">
                            <li class="nav-item active">
                                <a class="nav-link" href="#">Page</a>
                            </li>
                  
                        </ul>
                    </div>
                </div>
            </nav>

             @include('instructor.layouts.topbar')
             @yield('maincontent')

        </div>
    </div>


  
    </div>
  </div>
</div>


                @include('instructor.layouts.footer')
