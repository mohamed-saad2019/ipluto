@extends('theme.master')
@section('title', 'Online Courses')
@section('content')
    <!-- start header -->
    <div class="header">
        <div class="headerText">
          <h4>The natural science changes, </br>
              ipluto will support you.</h4>
            <p>the way of change by using digital lessons to make science better. we create animated digital visualization lessons Physics, Chemistry, and Biology. Do You Want To Join…?</p>
            <button class="btn btn-primary"> Ready to Get Started? </button>
        </div>
    </div>
    <!-- start header -->
    
    <div class="section1">
        <div class="container">
            <div class='animat1'>
              <h6 class='animat1H4'>At every step we believe that learning natural science is very</br><span></span> important to our students and society at large</h6>
              <p class='animat1['> Our goal is to make teaching easier with the interactive tools, resources, and content teachers need.</p>
              <img src="{{url('images/gifs/our-services.gif')}}" alt="">
            </div>
        </div>
    </div>
    <div class="section1 my-15">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-6">
                    <img class='animatImage2' src="{{url('images/gifs/vizualize.gif')}}" alt="">
                </div>
                <div class="col-12 col-lg-6">
                    <h6>Support , Visualize, and improve students understanding</h6>
                    <ul class="list-unstyled one">
                        <div>
                            <li>Differentiate, or provide extra support to meet students where they’re at 
                              from wherever they are learning (physical classroom, remote, hybrid)
                              using digital content
                          </li>
                        </div>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="sectionVedio">
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <!-- <video src="https://news.nearpod.com/videos/what-is-nearpod/What-is-npod2021-PREVIEW-12-secs.mp4" controls></video> -->
                        <!-- <video src="https://news.nearpod.com/videos/what-is-nearpod/What-is-npod2021-PREVIEW-12-secs.mp4" autoplay></video> -->
                        <iframe width="560" height="315" src="https://www.youtube.com/embed/C7xU4YqYzP8" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                </div>
                </div>
            </div>
        <div class="overLay"></div>
        <div class="sectionVediotext">
            <h6>What is ipluto? See how it works</h6>
            <i class="fas fa-play"></i>
        </div>
        <video src="https://news.nearpod.com/videos/what-is-nearpod/What-is-npod2021-PREVIEW-12-secs.mp4"></video>
    </div>
    <div class="section1 my-10">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-6">
                    <h6>Interactive lessons</h6>
                    <ul class="list-unstyled one">
                            <li>Allowing different levels of student participation with animated, 2D, 3D lessons.</li>
                            <li>teacher white board and teacher dashboard.</li>
                            <li>inspire and improve your students understanding.</li>
                    </ul>
                </div>
              <div class="col-12 col-lg-6">
                    <img class='animatImage3' src="{{url('images/gifs/interactive-lessons.gif')}}" alt="">
                </div>
            </div>
        </div>
    </div>
    <div class="section1 Interactive__videos">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-6">
                    <img class='animatImage4' src="{{url('images/gifs/interactive-videos.gif')}}" alt="">
                </div>
                <div class="col-12 col-lg-6">
                    <h6>Interactive videos</h6>
                    <ul class="list-unstyled one">
                            <li>Create active animated videos to check for understanding with built-in interactive questions. 
                                Bring your video into <span>ipluto</span>

                            </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="section1 activities">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-6">
                    <h6 class="ml-1">Activities</h6>
                    <ul class="list-unstyled one">
                        <div>
                            <li>Doing activities for your students to get more engagement to your classes,and  more entertaining.
                            </li>
                        </div>
                    </ul>
                </div>
                <div class="col-12 col-lg-6">
                    <img class='animatImage5' src="{{url('images/gifs/activities.gif')}}" alt="">
                </div>
            </div>
        </div>
    </div>
    
    <div class="section1 hyperd__learning">
        <div class="container">
            <div class="row">
                <div class='col-12 col-lg-6'>
                    <img class='animatImage6' src="{{url('images/gifs/hyperd-learning.gif')}}"/>
                </div>
                <div class="col-12 col-lg-6">
                    <h6 class="ml-1">Hyperd learning</h6>
                    <ul class="list-unstyled one">
                         <li>  Flex between classroom, distance learning, or blended learning Feel confident that your lessons will work in any environment.</li>
                    </ul>
                </div>
                
            </div>
        </div>
    </div>
    <div class="section1 assessments">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-6">
                    <h6 class="ml-1">Assessments</h6>
                    <ul class="list-unstyled one">
                         <li>  Create assessment to your students and get a student performance report.</li>
                    </ul>
                </div>
                <div class="col-12 col-lg-6">
                    <img class='animatImage7' src="{{url('images/gifs/assessment.gif')}}" alt="">
                </div>
            </div>
        </div>
    </div>
    <div class="section1 connected__with">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-6">
                    <img class='animatImage8' src="{{url('images/gifs/connected-with.gif')}}" alt="">
                </div>
                <div class="col-12 col-lg-6">
                    <h6 class="ml-1">Connected with</h6>
                    <ul class="list-unstyled one">
                            <li>   Connected with zoom  .</li>
                            <li>  upload files, sheets, powerpoint , videos .</li>
                            <li>  integrate with LMS .</li>
                    </ul>
                </div>
                
            </div>
        </div>
    </div>
    <div class="footertop">
        <div class="container">
            <div class="row">
                <div class="col-12 col-xl-7">
                    <div class="row">
                        <div class="col-12 col-lg-4">
                            <ul class="list-unstyled footer--list">
                                <li class="list--item list--header">Get started</li>
                                <li class="list--item"><a href="/how-nearpod-works" class="item--link">How it works</a></li>
                                <li class="list--item"><a href="/pricing" class="item--link">Pricing</a></li>
                                <li class="list--item"><a href="/resources" class="item--link">Resources hub</a></li>
                                <li class="list--item"><a href="/blog" class="item--link">Blog</a></li>
                                <li class="list--item"><a href="https://nearpod.zendesk.com/" class="item--link">Help center</a></li>
                                <li class="list--item"><a href="/communities" class="item--link">Communities</a></li>
                            </ul>
                        </div>
                        <div class="col-12 col-lg-4">
                            <ul class="footer--list list-unstyled">
                                <li class="list--item list--header">Our platform</li>
                                <li class="list--item"><a href="/interactive-slides" class="item--link">Interactive slides</a></li>
                                <li class="list--item"><a href="/interactive-video" class="item--link">Interactive video</a></li>
                                <li class="list--item"><a href="/gamification-activities" class="item--link">Gamification &amp; activities</a></li>
                            </ul>
                        </div>
                        <div class="col-12 col-lg-4">
                            <ul class="footer--list list-unstyled">
                                <li class="list--item list--header">Content &amp; features</li>
                                <li class="list--item"><a href="/nearpod-library" class="item--link">Lesson library</a></li>
                                <li class="list--item"><a href="/formative-assessment" class="item--link">Formative assessment</a></li>
                                <li class="list--item"><a href="/nearpod-vr" class="item--link">Virtual reality</a></li>
                                <li class="list--item"><a href="/distance-learning" class="item--link">Distance learning</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-xl-5">
                    <div class="row">
                        <div class="col-12 col-lg-6">
                            <ul class="footer--list list-unstyled">
                                <li class="list--item list--header">For schools &amp; districts</li>
                                <li class="list--item"><a href="/nearpod-site-license" class="item--link">Site license</a></li>
                                <li class="list--item"><a href="/programs" class="item--link">Programs</a></li>
                                <li class="list--item"><a href="/lms-integrations" class="item--link">Integrations</a></li>
                                <li class="list--item"><a href="/essa" class="item--link">Funding</a></li>
                                <li class="list--item"><a href="/case-studies" class="item--link">Efficacy</a></li>
                                <li class="list--item"><a href="/international" class="item--link">International</a></li>
                                <li class="list--item"><a href="/higher-ed" class="item--link">Higher Education</a></li>
                            </ul>
                        </div>
                        <div class="col-12 col-lg-6">
                            <ul class="footer--list list-unstyled">
                                <li class="list--item list--header">Get to know us</li>
                                <li class="list--item"><a href="/about" class="item--link">Who we are</a></li>
                                <li class="list--item"><a href="/blog/press" class="item--link">Press</a></li>
                                <li class="list--item"><a href="/careers" class="item--link">Careers</a></li>
                                <li class="list--item"><a href="/contact" class="item--link">Contact us</a></li>
                                <li class="list--item"><a href="/flocabulary" class="item--link">Flocabulary</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection