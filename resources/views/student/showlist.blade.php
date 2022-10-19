@extends('student.layouts.head')        
@section('title','Videos')
@section('maincontent') 
    <div class="Page__content">
    <div class="live__session">
        <div class="container">
          <div class="row">
            <div class="col-md-8">
              <div class="video_playnow w-100 bg-light">
                <video width="100%" height="100%" controls poster="./images/Profile/Layer 32.png">
                  <source src="./images/video.mp4" type="video/mp4">
                  <source src="./images/video.mp4" type="video/ogg">
                  Your browser does not support the video tag.
                </video>
              </div>
              <div class="footer_video d-flex justify-content-between pt-3 m-2">
                <div class="font-weight-bold">
                  <span>Power</span>
                  <p>120 views - Oct 4,2022</p>
                </div>
                <div class="div  ">
                  <div class="like bg-light p-1">
                    <i class="fa fa-thumbs-o-up mx-2 mr-2"> <small style="font-size: 10px">345</small></i>/
                    <i class="fa fa-thumbs-o-down mx-2 ml-3"> <small style="font-size: 10px">45</small></i>
                  </div>
                </div>
              </div>
              <div class="content_vid p-2">
                <div class="d-flex">
                  <img src="./images/Profile/logo.png" height="3em" class="img-fluid" alt="">
                  <div class="vedio__subject mx-3 ">
                    <span>By:Hatem</span>
                    <p>Grade:11 - subject physecs</p>
                  </div>
                </div>
              </div>
              <div class="add_comment p-2">
                <div class="d-flex">
                  <img src="./images/Profile/Ellipse.png" style="width:50px;height:50px;border-radius:50%;" alt="">
                  <div class="coment font-weight-bold mx-3 w-100 h-50">
                    <input class="pt-3" placeholder="Add Comment"></input>
                  </div>
                </div>
              </div>
              <div class="comment_user">
                <div class="d-flex my-4">
                  <img src="./images/Profile/Ellipse.png" style="width:50px;height:50px;border-radius:50%;" alt="">
                  <div class="coment_contet font-weight-bold mx-3 w-100 h-50">
                    <span>1Gehad Adel</span> <small class="ml-5">1 hour ago</small>
                    <p class="video__comment">Its Amazing idea</p>
                    <div class="like_unlike">

                      <i class="fa fa-thumbs-o-up mx-2 mr-2"> <small style="font-size: 10px"></small></i>
                      <i class="fa fa-thumbs-o-down mx-2 ml-3"></i> <small class="font-weight-bold comment__replay">Replay</small>
                    </div>
                  </div>
                </div>
                <div class="d-flex">
                  <img src="./images/Profile/Ellipse.png" style="width:50px;height:50px;border-radius:50%;" alt="">
                  <div class="coment_contet font-weight-bold mx-3 w-100 h-50">
                    <span>2Gehad Adel</span> <small class="ml-5">1 hour ago</small>
                    <p class="video__comment">Its Amazing idea</p>
                    <div class="like_unlike">

                      <i class="fa fa-thumbs-o-up mx-2 mr-2"> <small style="font-size: 10px"></small></i>
                      <i class="fa fa-thumbs-o-down mx-2 ml-3"></i> <small class="font-weight-bold comment__replay">Replay</small>

                      <div class="repay text-left">
                        <a class="my-2 mx-3 d-block text-warning btn_replay comment__replay">2 Replay <i
                            class="fa fa-chevron-down mx-2 pt-2"></i></a>
                        <div class="replay_ather">
                          <div class="d-flex">
                            <img class="mt-2" src="./images/Profile/Ellipse.png"
                              style="width:30px;height:30px;border-radius:50%;" alt="">
                            <div class=" mx-3">
                              <span>3Gehad Adel</span> <small class="ml-5">1 hour ago</small>
                              <p class="video__comment">Its Amazing idea</p>
                              <div style="width: 150px;">
                                <i class="fa fa-thumbs-o-up mx-2 mr-2"> <small style="font-size: 10px">45</small></i>
                                <i class="fa fa-thumbs-o-down mx-2 ml-3"></i> <small
                                  class="font-weight-bold">Replay</small>
                              </div>
                              <a class="my-2 mx-3 btn_rep text-warning d-block comment__replay">3 Replay <i
                                  class="fa fa-chevron-down mx-2 pt-2"></i></a>
                            </div>
                          </div>
                          <div class="rep_ather">
                            <div class="d-flex my-2 ">
                              <img class="mt-2" src="./images/Profile/Ellipse.png"
                                style="width:30px;height:30px;border-radius:50%;" alt="">
                              <div class=" mx-3">
                                <span>4Gehad Adel</span> <small class="ml-5">1 hour ago</small>
                                <p class="video__comment">Its Amazing idea</p>
                                <div style="width: 150px;">
                                  <i class="fa fa-thumbs-o-up mx-2 mr-2"> <small style="font-size: 10px">45</small></i>
                                  <i class="fa fa-thumbs-o-down mx-2 ml-3"></i> 
                                  <small class="font-weight-bold"> Replay </small>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
 
            <div class="col-md-4">
              
              <div class="list_video d-flex">
                <div class="video_next w-75 h-100">
                  <video width="100%" height="100%" controls poster="./images/Profile/Layer 32.png">
                    <source src="./images/video.mp4" type="video/mp4">
                    <source src="./images/video.mp4" type="video/ogg">
                    Your browser does not support the video tag.
                  </video> </div>
                <div class="video_next_content h-100 p-2 " >
                  <h5 class="video__listTile font-weight-bold">7 Amazing Magnetic Accelerators | Maggnetec Games</h5>
                  <span class="d-block">Magnetec Games <i class="fa fa-check-circle"></i></span>
                  <small>12 M views - 11 months ago</small>
                </div>
              </div>
              <div class="list_video d-flex">
                <div class="video_next w-75 h-100">
                  <video width="100%" height="100%" controls poster="./images/Profile/Layer 32.png">
                    <source src="./images/video.mp4" type="video/mp4">
                    <source src="./images/video.mp4" type="video/ogg">
                    Your browser does not support the video tag.
                  </video> </div>
                <div class="video_next_content h-100 p-2 " >
                  <h5 class="video__listTile font-weight-bold">7 Amazing Magnetic Accelerators | Maggnetec Games</h5>
                  <span class="d-block">Magnetec Games <i class="fa fa-check-circle"></i></span>
                  <small>12 M views - 11 months ago</small>
                </div>
              </div>
              <div class="list_video d-flex">
                <div class="video_next w-75 h-100">
                  <video width="100%" height="100%" controls poster="./images/Profile/Layer 32.png">
                    <source src="./images/video.mp4" type="video/mp4">
                    <source src="./images/video.mp4" type="video/ogg">
                    Your browser does not support the video tag.
                  </video> </div>
                <div class="video_next_content h-100 p-2 " >
                  <h5 class="video__listTile font-weight-bold">7 Amazing Magnetic Accelerators | Maggnetec Games</h5>
                  <span class="d-block">Magnetec Games <i class="fa fa-check-circle"></i></span>
                  <small>12 M views - 11 months ago</small>
                </div>
              </div>
              <div class="list_video d-flex">
                <div class="video_next w-75 h-100">
                  <video width="100%" height="100%" controls poster="./images/Profile/Layer 32.png">
                    <source src="./images/video.mp4" type="video/mp4">
                    <source src="./images/video.mp4" type="video/ogg">
                    Your browser does not support the video tag.
                  </video> </div>
                <div class="video_next_content h-100 p-2 " >
                  <h5 class="video__listTile font-weight-bold">7 Amazing Magnetic Accelerators | Maggnetec Games</h5>
                  <span class="d-block">Magnetec Games <i class="fa fa-check-circle"></i></span>
                  <small>12 M views - 11 months ago</small>
                </div>
              </div>
              <div class="list_video d-flex">
                <div class="video_next w-75 h-100">
                  <video width="100%" height="100%" controls poster="./images/Profile/Layer 32.png">
                    <source src="./images/video.mp4" type="video/mp4">
                    <source src="./images/video.mp4" type="video/ogg">
                    Your browser does not support the video tag.
                  </video> </div>
                <div class="video_next_content h-100 p-2 " >
                  <h5 class="video__listTile font-weight-bold">7 Amazing Magnetic Accelerators | Maggnetec Games</h5>
                  <span class="d-block">Magnetec Games <i class="fa fa-check-circle"></i></span>
                  <small>12 M views - 11 months ago</small>
                </div>
              </div>
              <div class="list_video d-flex">
                <div class="video_next w-75 h-100">
                  <video width="100%" height="100%" controls poster="./images/Profile/Layer 32.png">
                    <source src="./images/video.mp4" type="video/mp4">
                    <source src="./images/video.mp4" type="video/ogg">
                    Your browser does not support the video tag.
                  </video> </div>
                <div class="video_next_content h-100 p-2 " >
                  <h5 class="video__listTile font-weight-bold">7 Amazing Magnetic Accelerators | Maggnetec Games</h5>
                  <span class="d-block">Magnetec Games <i class="fa fa-check-circle"></i></span>
                  <small>12 M views - 11 months ago</small>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>



@endsection


