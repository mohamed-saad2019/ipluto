@extends('student.layouts.head')        
@section('title','Videos')
@section('maincontent') 
    <div class="Page__content">
    <div class="student__video mt-5">
        <div class="container">
          <div class="row">
            <div class="col-md-3 mb-4">
              <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
              aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    ...
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                  </div>
                </div>
              </div>
            </div>
              <div class="student__singleVideo">
                <div class="info__icon">
                  <button type="button" class="btn" data-toggle="modal" data-target="#exampleModal">
                    <i class="fa fa-info"></i> 
                  </button>
                </div>
  
                <video width="100%" height="100%" controls controlsList="nodownload" poster="./images/Profile/logo.png">
                  <source src="./images/video.mp4" type="video/mp4">
                  <source src="./images/video.mp4" type="video/ogg">
                  Your browser does not support the video tag.
                </video>

                <div class="video__details d-flex">
                  <div class="logo__icon">
                    <img src="./images/Profile/logo.png" class="img-fluid ml-1" alt="" srcset="">
                  </div>
                  <div class="description">
                    <h5 class="h5"><a href="{{route('showlist')}}">Power</a></h5>
                    <h6 class="h6">By: Hatem </h6>
                    <h6 class="h6">Oct 4,2022 - 30MB </h6>
                    <h6 class="h6">Grade: 11 - Subject: Physics</h6>
                  </div>
                </div>

              </div>
            </div>
            <div class="col-md-3 mb-4">
              <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
              aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    ...
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                  </div>
                </div>
              </div>
            </div>
              <div class="student__singleVideo">
                <div class="info__icon">
                  <button type="button" class="btn" data-toggle="modal" data-target="#exampleModal">
                    <i class="fa fa-info"></i> 
                  </button>
                </div>
  
                <video width="100%" height="100%" controls controlsList="nodownload" poster="./images/Profile/logo.png">
                  <source src="./images/video.mp4" type="video/mp4">
                  <source src="./images/video.mp4" type="video/ogg">
                  Your browser does not support the video tag.
                </video>

                <div class="video__details d-flex">
                  <div class="logo__icon">
                    <img src="./images/Profile/logo.png" class="img-fluid ml-1" alt="" srcset="">
                  </div>
                  <div class="description">
                    <h5 class="h5"><a href="{{route('showlist')}}">Power</a></h5>
                    <h6 class="h6">By: Hatem </h6>
                    <h6 class="h6">Oct 4,2022 - 30MB </h6>
                    <h6 class="h6">Grade: 11 - Subject: Physics</h6>
                  </div>
                </div>

              </div>
            </div>
            <div class="col-md-3 mb-4">
              <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
              aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    ...
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                  </div>
                </div>
              </div>
            </div>
              <div class="student__singleVideo">
                <div class="info__icon">
                  <button type="button" class="btn" data-toggle="modal" data-target="#exampleModal">
                    <i class="fa fa-info"></i> 
                  </button>
                </div>
  
                <video width="100%" height="100%" controls controlsList="nodownload" poster="./images/Profile/logo.png">
                  <source src="./images/video.mp4" type="video/mp4">
                  <source src="./images/video.mp4" type="video/ogg">
                  Your browser does not support the video tag.
                </video>

                <div class="video__details d-flex">
                  <div class="logo__icon">
                    <img src="./images/Profile/logo.png" class="img-fluid ml-1" alt="" srcset="">
                  </div>
                  <div class="description">
                    <h5 class="h5"><a href="{{route('showlist')}}">Power</a></h5>
                    <h6 class="h6">By: Hatem </h6>
                    <h6 class="h6">Oct 4,2022 - 30MB </h6>
                    <h6 class="h6">Grade: 11 - Subject: Physics</h6>
                  </div>
                </div>

              </div>
            </div>
            <div class="col-md-3 mb-4">
              <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
              aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    ...
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                  </div>
                </div>
              </div>
            </div>
              <div class="student__singleVideo">
                <div class="info__icon">
                  <button type="button" class="btn" data-toggle="modal" data-target="#exampleModal">
                    <i class="fa fa-info"></i> 
                  </button>
                </div>
  
                <video width="100%" height="100%" controls controlsList="nodownload"  poster="./images/Profile/logo.png">
                  <source src="./images/video.mp4" type="video/mp4">
                  <source src="./images/video.mp4" type="video/ogg">
                  Your browser does not support the video tag.
                </video>

                <div class="video__details d-flex">
                  <div class="logo__icon">
                    <img src="./images/Profile/logo.png" class="img-fluid ml-1" alt="" srcset="">
                  </div>
                  <div class="description">
                    <h5 class="h5"><a href="{{route('showlist')}}">Power</a></h5>
                    <h6 class="h6">By: Hatem </h6>
                    <h6 class="h6">Oct 4,2022 - 30MB </h6>
                    <h6 class="h6">Grade: 11 - Subject: Physics</h6>
                  </div>
                </div>

              </div>
            </div>
            <div class="col-md-3 mb-4">
              <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
              aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    ...
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                  </div>
                </div>
              </div>
            </div>
              <div class="student__singleVideo">
                <div class="info__icon">
                  <button type="button" class="btn" data-toggle="modal" data-target="#exampleModal">
                    <i class="fa fa-info"></i> 
                  </button>
                </div>
  
                <video width="100%" height="100%" controls controlsList="nodownload" poster="./images/Profile/logo.png">
                  <source src="./images/video.mp4" type="video/mp4">
                  <source src="./images/video.mp4" type="video/ogg">
                  Your browser does not support the video tag.
                </video>

                <div class="video__details d-flex">
                  <div class="logo__icon">
                    <img src="./images/Profile/logo.png" class="img-fluid ml-1" alt="" srcset="">
                  </div>
                  <div class="description">
                    <h5 class="h5"><a href="{{route('showlist')}}">Power</a></h5>
                    <h6 class="h6">By: Hatem </h6>
                    <h6 class="h6">Oct 4,2022 - 30MB </h6>
                    <h6 class="h6">Grade: 11 - Subject: Physics</h6>
                  </div>
                </div>

              </div>
            </div>

          </div>
        </div>
      </div>
    </div>



@endsection


