@extends('student.layouts.head')        
@section('title','Videos')
@section('maincontent') 
    <div class="Page__content">
    <div class="student__video mt-5">
        <div class="container">
          <div class="row">

            <div class="col-md-3 mb-4">
              <div class="student__singleVideo">
                <div class="videoOverlay">
                  <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quasi, consequatur!</p>
                </div>
                <div class="info__icon">
                  <button type="button" class="btn info__btn "  >
                    <i class="fa fa-info"></i> 
                  </button>
                </div>
                <video width="100%" height="100%" controls controlsList="nodownload" poster="./images/Profile/logo.png">
                  <source src="./images/video.mp4" type="video/mp4">
                  <source src="./images/video.mp4" type="video/ogg">
                  Your browser does not support the video tag.
                </video>

                <div class="video__details mt-3 d-flex">
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
              <div class="student__singleVideo">
                <div class="videoOverlay">
                  <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quasi, consequatur!</p>
                </div>
                <div class="info__icon">
                  <button type="button" class="btn info__btn "  >
                    <i class="fa fa-info"></i> 
                  </button>
                </div>
                <video width="100%" height="100%" controls controlsList="nodownload" poster="./images/Profile/logo.png">
                  <source src="./images/video.mp4" type="video/mp4">
                  <source src="./images/video.mp4" type="video/ogg">
                  Your browser does not support the video tag.
                </video>

                <div class="video__details mt-3 d-flex">
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
              <div class="student__singleVideo">
                <div class="videoOverlay">
                  <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quasi, consequatur!</p>
                </div>
                <div class="info__icon">
                  <button type="button" class="btn info__btn "  >
                    <i class="fa fa-info"></i> 
                  </button>
                </div>
                <video width="100%" height="100%" controls controlsList="nodownload" poster="./images/Profile/logo.png">
                  <source src="./images/video.mp4" type="video/mp4">
                  <source src="./images/video.mp4" type="video/ogg">
                  Your browser does not support the video tag.
                </video>

                <div class="video__details mt-3 d-flex">
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

@section('scripts')
<script>
  $('.info__btn').click(function() {
    $(this).parent().prev().toggleClass("toggleClass");
  })
  </script>
@endsection