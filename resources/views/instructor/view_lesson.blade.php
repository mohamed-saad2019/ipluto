<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>View Lesson</title>
    <link rel="icon" type="image/icon" href="{{url('images/logo.png')}}"> <!-- favicon-icon -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" 
    href="{{ url('newslider/css/style.css') }}" />
    <link rel="stylesheet" href="{{ url('newslider/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ url('newslider/css/all.css') }}">

</head>
<body>

   


<div class="section_slider">
        
<div class="container py-5">
    <div class="row_slide d-flex justify-content-center align-items-center">


            <div class="item  ">
                <div class="over_lay">
                    <div class="overlay">
                        <i class="fa fa-arrows-alt d-flex justify-content-center align-items-center"></i>
                        <button class="btn btn-info">Share</button>
                    </div>
                </div>
                <img src="images/portfolio/01-full.jpg" alt="" class="w-100">

                <span class=" d-flex justify-content-center align-items-center">1</span>
            </div>

    


            <div class="item ">
                <div class="over_lay">
                    <div class="overlay">
                        <i class="fa fa-arrows-alt d-flex justify-content-center align-items-center"></i>
                        <button class="btn btn-info">Share</button>
                    </div>
                </div>
                <img src="images/portfolio/01-thumbnail.jpg" alt="" class="w-100">
                <span class=" d-flex justify-content-center align-items-center">2</span>

            </div>

            <div class="item ">
                <div class="over_lay">
                    <div class="overlay ">
                        <i class="fa fa-arrows-alt d-flex justify-content-center align-items-center"></i>
                        <button class="btn btn-info">Share</button>
                    </div>
                </div>
                <img src="images/portfolio/02-full.jpg" alt="" class="w-100">


                <span class=" d-flex justify-content-center align-items-center">3</span>
             </div>



            <div class="item  ">
                <div class="over_lay">
                    <div class="overlay ">
                        <i class="fa fa-arrows-alt d-flex justify-content-center align-items-center"></i>
                        <button class="btn btn-info">Share</button>
                    </div>
                </div>
                <img src="images/portfolio/03-full.jpg" alt="" class="w-100">

                <span class=" d-flex justify-content-center align-items-center">4</span>
            </div>




            <div class="item  ">
                <div class="over_lay">
                    <div class="overlay ">
                        <i class="fa fa-arrows-alt d-flex justify-content-center align-items-center"></i>
                        <button class="btn btn-info">Share</button>
                    </div>
                </div>
            <img src="{{ url('newslider/images/portfolio/04-full.jpg') }}"alt="" class="w-100">

                <span class=" d-flex justify-content-center align-items-center">5</span>

            </div>


   
            <div class="item  ">
                <div class="over_lay">
                    <div class="overlay">
                        <i class="fa fa-arrows-alt d-flex justify-content-center align-items-center"></i>
                        <button class="btn btn-info">Share</button>
                    </div>
                </div>
                <img src="images/portfolio/05-full.jpg" alt="" class="w-100 img-flued">
                <span class=" d-flex justify-content-center align-items-center">6</span>

            </div>




        
    </div>
</div>




<div id="lightBoxContainer" class=" d-flex  justify-content-center align-items-center ">
    <div class="list_items">
        <div class="list_item"></div>
        <div class="list_item"></div>
        <div class="list_item"></div>
        <div class="list_item"></div>
    </div>
    <div class="play_arrow_prev d-flex justify-content-start align-items-center "><i id="prev" class="fa fa-solid fa-play text-white ml-3"></i></div>
    <div id="lightBoxItem" class="lightBox position-relative d-flex  align-items-center ">
        
    </div>
    <div class="play_arrow_next d-flex justify-content-end align-items-center"><i id="next" class="fa fa-play text-white mr-3"></i> </div>
 
</div>


<div class="full full_screen ">
    <i class="fa fa-arrows-alt d-flex justify-content-center align-items-center"></i>
    <div class="d-flex justify-content-center align-items-center w-100 h-100">
     <div class="full_screenimg "></div>
    </div>
</div>
</div>
    






    <script src="{{ url('newslider/js/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ url('newslider/js/popper.min.js') }}"></script>
    <script src="{{ url('newslider/js/bootstrap.min.js') }}"></script>
    <script src="{{ url('newslider/js/script.js') }}"></script>
</body>
</html>