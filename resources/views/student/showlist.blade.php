@extends('student.layouts.head')        
@section('title','Videos')
@section('maincontent') 
    <div class="Page__content">
    <div class="live__session">
        <div class="container">
          @if(isset($mainVideo) && !empty($mainVideo))
          <div class="row">
            <div class="col-md-8">
              <div class="video_playnow w-100 bg-light">
                <!-- <video width="100%" height="100%" controls poster="./images/Profile/Layer 32.png"> -->
                <video width="100%" height="100%" controls poster="./images/Profile/Layer 32.png" >
                  <source src="{{url('storage/'.$mainVideo->path.'/'.$mainVideo->hash_name)}}" type="video/mp4">
                  <source src="{{url('storage/'.$mainVideo->path.'/'.$mainVideo->hash_name)}}" type="video/ogg">
                  Your browser does not support the video tag.
                </video>
              </div>
              <div class="footer_video d-flex justify-content-between pt-3 m-2">
                <div class="font-weight-bold">
                  <span>{{getTitle($mainVideo->file_name)}} </span>
                  <p>{{$mainVideo->created_at}}</p>
                </div>
                <div class="div  ">
                  <div class="like bg-light p-1">
                    <i class="far fa-thumbs-up mx-2 mr-2"> <small style="font-size: 10px">345</small></i>/
                    <i class="far fa-thumbs-down mx-2 ml-3"> <small style="font-size: 10px">45</small></i>
                  </div>
                </div>
              </div>
              <div class="content_vid p-2">
                <div class="d-flex">
                @if($mainVideo->instructor->user_img != null && $mainVideo->instructor->user_img && @file_get_contents('images/user_img/'.$mainVideo->instructor->user_img))
                  <img src="{{ url('images/user_img/'.$mainVideo->instructor->user_img)}}" height="3em" class="img-fluid" alt="">
                  @else
                  <img src="./images/Profile/logo.png" height="3em" class="img-fluid" alt="">
                @endif
                  <div class="vedio__subject mx-3 ">
                    <span>By: {{$mainVideo->instructor->fname}} {{$mainVideo->instructor->lname}}</span>
                    <!-- <p>Grade:11 - subject physecs</p> -->
                  </div>
                </div>
              </div>
              <div class="add_comment p-2">
                <div class="d-flex">
                  @if(Auth::User()['user_img'] != null && Auth::User()['user_img'] && @file_get_contents('images/avatar/'. Auth::User()['user_img'].'.png' ))
                    <img src="{{ url('images/avatar/'. Auth::User()['user_img'].'.png')}}" style="width: 38px" class="img-fluid" alt="">
                    @else
                    <img src="./images/Profile/Ellipse.png" style="width:50px;height:50px;border-radius:50%;" alt="">
                  @endif
                  <div class="coment font-weight-bold mx-3 w-100 h-50">
                    <form method="post" action="{{route('store_comment')}}">
                      {{ csrf_field() }}
                      {{ method_field('post') }}
                      
                      <input type="hidden" name="lesson_id" value="{{$lesson_id}}">
                      <input type="hidden" name="instructor_id" value="{{$mainVideo->instructor->id}}">
                      <input type="hidden" name="student_id" value="{{Auth::User()['id']}}">
                      <input type="hidden" name="video_id" value="{{$mainVideo->id}}">
                      <input type="text" class="pt-3" placeholder="Add Comment" name="comment" required="required">
                    </form>
                  </div>
                </div>
                @if (Session::has('error'))
                    <div class="alert alert-danger">
                        <ul>
                            <li>{{ Session::get('error') }}</li>
                        </ul>
                    </div>
                @endif
                @if (Session::has('success'))
                    <div class="alert alert-success">
                        <ul>
                            <li>{{ Session::get('success') }}</li>
                        </ul>
                    </div>
                @endif
              </div>
              <div class="comment_user">
                @if(isset($comments) && count($comments) > 0)
                @foreach($comments as $comment)
                <div class="d-flex my-4">
                @if($comment->student->user_img != null && $comment->student->user_img && @file_get_contents('images/avatar/'.$comment->student->user_img.'.png'))
                  <img src="{{ url('images/avatar/'.$comment->student->user_img).'.png'}}" style="width: 38px;max-height:38px" class="img-fluid" alt="">
                  @else
                  <img src="./images/Profile/Ellipse.png" style="width:50px;height:50px;border-radius:50%;" alt="">
                @endif
                  <div class="coment_contet font-weight-bold mx-3 w-100 h-50">
                    <span>{{$comment->student->fname}} {{$comment->student->lname}}</span> <small class="ml-5">{{ \Carbon\Carbon::parse($comment->created_at)->shortRelativeDiffForHumans() }}</small>
                    <p class="video__comment">{{$comment->comment}}</p>
                    <div class="like_unlike">

                      <i class="far fa-thumbs-up mx-2 mr-2"> <small style="font-size: 10px"></small></i>
                      <i class="far fa-thumbs-down mx-2 ml-3"></i> <small class="font-weight-bold comment__replay">Replay</small>
                    </div>
                  </div>
                </div>
                @endforeach
                @endif
                <div class="d-flex mb-5">
                  <img src="./images/Profile/Ellipse.png" style="width:50px;height:50px;border-radius:50%;" alt="">
                  <div class="coment_contet font-weight-bold mx-3 w-100 h-50">
                    <span>Gehad Adel</span> <small class="ml-5">1 hour ago</small>
                    <p class="video__comment">Its Amazing idea</p>
                    <div class="like_unlike">

                      <i class="far fa-thumbs-up mx-2 mr-2"> <small style="font-size: 10px"></small></i>
                      <i class="far fa-thumbs-down mx-2 ml-3"></i> 
                      <button class="font-weight-bold btn comment__replay">Replay</button>
                        <div class="comment_input">
                          <input  type="text" class="form-control replay" style="border:0; border-bottom: 1px solid #ddd;" >
                        </div>
                      <div class="repay text-left">
                        <a class="my-2 mx-3 d-block text-warning btn_replay">
                          2 Replay 
                          <i class="fa fa-chevron-down mx-2 pt-2"></i>
                        </a>
                        <div class="replay_ather">
                          <div class="d-flex">
                            <img class="mt-2" src="./images/Profile/Ellipse.png"
                              style="width:30px;height:30px;border-radius:50%;" alt="">
                            <div class=" mx-3">
                              <span>Gehad Adel</span> <small class="ml-5">1 hour ago</small>
                              <p class="video__comment">Its Amazing idea</p>
                              <div style="width: 150px;">
                                <i class="far fa-thumbs-up mx-2 mr-2"> <small style="font-size: 10px">45</small></i>
                                <i class="far fa-thumbs-down mx-2 ml-3"></i>  <small class="font-weight-bold">20</small>
                              </div>
                            </div>
                          </div>
              
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="d-flex mb-5">
                  <img src="./images/Profile/Ellipse.png" style="width:50px;height:50px;border-radius:50%;" alt="">
                  <div class="coment_contet font-weight-bold mx-3 w-100 h-50">
                    <span>Gehad Adel</span> <small class="ml-5">1 hour ago</small>
                    <p class="video__comment">Its Amazing idea</p>
                    <div class="like_unlike">

                      <i class="far fa-thumbs-up mx-2 mr-2"> <small style="font-size: 10px"></small></i>
                      <i class="far fa-thumbs-down mx-2 ml-3"></i> 
                      <button class="font-weight-bold btn comment__replay">Replay</button>
                        <div class="comment_input">
                          <input  type="text" class="form-control replay" style="border:0; border-bottom: 1px solid #ddd;" >
                        </div>
                      <div class="repay text-left">
                        <a class="my-2 mx-3 d-block text-warning btn_replay">
                          2 Replay 
                          <i class="fa fa-chevron-down mx-2 pt-2"></i>
                        </a>
                        <div class="replay_ather">
                          <div class="d-flex">
                            <img class="mt-2" src="./images/Profile/Ellipse.png"
                              style="width:30px;height:30px;border-radius:50%;" alt="">
                            <div class=" mx-3">
                              <span>Gehad Adel</span> <small class="ml-5">1 hour ago</small>
                              <p class="video__comment">Its Amazing idea</p>
                              <div style="width: 150px;">
                                <i class="far fa-thumbs-up mx-2 mr-2"> <small style="font-size: 10px">45</small></i>
                                <i class="far fa-thumbs-down mx-2 ml-3"></i>  <small class="font-weight-bold">20</small>
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
              @if(isset($files) &&  count($files) > 0)
                @foreach($files as $file)
                @if($file->id != $mainVideo->id)
                <a href="{{route('showVideos')}}?lesson_id={{$lesson_id}}&file_id={{$file->id}}">
                <div class="list_video d-flex">
                  <div class="video_next w-75 h-100">

                      <video width="100%" height="100%" poster="./images/Profile/Layer 32.png" controlsList="nodownload">
                        <source src="{{url('storage/'.$file->path.'/'.$file->hash_name)}}" type="video/mp4">
                        <source src="{{url('storage/'.$file->path.'/'.$file->hash_name)}}" type="video/ogg">
                        Your browser does not support the video tag.
                      </video>
                    </div>
                    <div class="video_next_content h-100 p-2 " >
                      <h5 class="video__listTile font-weight-bold">{{getTitle($file->file_name)}} </h5>
                      <span class="d-block">{{$file->instructor->fname}} {{$file->instructor->lname}}<i class="fa fa-check-circle"></i></span>
                      <small>{{ \Carbon\Carbon::parse($file->created_at)->shortRelativeDiffForHumans() }}</small>
                    </div>
                  </div>
                  </a>
                @endif
                @endforeach
              @endif
            </div>
          </div>
          @else
          <div class="alert alert-danger">
              <ul>
                  <li>There are no videos for this lesson</li>
              </ul>
          </div>
          @endif
        </div>
      </div>
    </div>



@endsection


