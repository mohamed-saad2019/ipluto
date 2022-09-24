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