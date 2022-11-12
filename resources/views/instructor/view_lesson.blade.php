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

   


<div class="section_slider" id="full">
        
<div class="container py-5">
    <div class="row_slide d-flex  align-items-center">
       @php $sum = 0 ; @endphp
        @foreach($files as $file)
          @php $sum++; @endphp


            <div class="item list_item " data-type='{{$file->mime_type}}' 
                 data-src=" @if(str_contains($file->mime_type, 'video') and $file->hash_name=='Video From Dashboard')
                 {{url('storage/vedioTeachr/'.$file->path)}}
                 @else{{url('storage/'.$file->path.'/'.$file->hash_name)}}@endif">
                
                <div class="over_lay">
                    <div class="overlay">
                        <i class="fa fa-arrows-alt d-flex justify-content-center align-items-center"></i>
                        <button class="btn btn-info">Share</button>
                    </div>
                </div>
               
             @if(str_contains($file->mime_type, 'url'))
                    <i class="fas fa-link cus_i" ></i>
                   @endif
                   @if(str_contains($file->mime_type, 'presentation'))
                    <i class="fas fa-file-powerpoint cus_i" ></i>
                   @endif
                   @if(str_contains($file->mime_type, 'video') and $file->hash_name !='Video From Dashboard')
                    <i class="fas fa-file-video cus_i" ></i>
                   @endif
                   @if(str_contains($file->mime_type, 'video') and $file->hash_name=='Video From Dashboard')
                    <i class="fas fa-file-video cus_i" ></i>
                   @endif
                   @if(str_contains($file->mime_type, 'audio') )
                    <i class="fas fa-file-audio-o cus_i" ></i>
                   @endif
                   @if(str_contains($file->mime_type, 'pdf'))
                    <i class="fas fa-file-pdf cus_i" ></i>
                   @endif
                   @if(str_contains($file->mime_type, 'sheet'))
                    <i class="fas fa-file-excel cus_i" ></i>
                   @endif
                   @if(str_contains($file->mime_type, 'word'))
                    <i class="fas fa-file-word cus_i" ></i>
                   @endif
                   @if(str_contains($file->mime_type, 'image'))
                    <i class="fas fa-file-image cus_i" ></i>
                   @endif

                <span class=" d-flex justify-content-center align-items-center">
                    {{$sum}}
                </span>
            </div>
       
        @endforeach
               <div class="item list_item " data-type='whiteboard' >
                
                <div class="over_lay">
                    <div class="overlay">
                        <i class="fa fa-arrows-alt d-flex justify-content-center align-items-center"></i>
                       
                    </div>
                </div>
               
             
                <i class="fas fa-chalkboard-teacher cus_i" ></i>   

                <span class=" d-flex justify-content-center align-items-center">
                    {{$sum+1}}
                </span>
            </div>



        
    </div>
</div>





<div id="lightBoxContainer"class=" d-flex justify-content-center align-items-center">


<div id="lightBoxItem" class="lightBox position-relative d-flex  align-items-center ">
                        <button class="btn" id="fullscreen-button" data-mode="full">
                                <i class="fas fa-expand"></i>
                         </button> 
                         <div id="child" style="width:100%;height:100%;">
                            @if(!empty($lesson->background))
                            <img class="img-fluid " width="100%" style=""
                              src="{{url('storage/'.$lesson->background)}}">
                            @else
                            <img class="img-fluid " style="width:100%;height:100%;"
                              src="{{url('image/overlayGlobale.jpg')}}">
                            @endif
                         </div>

                           
    </div>
    
 
</div>
  
</div>
 





    <script src="{{ url('admin_assets/assets/js/jquery.min.js') }}"></script>
    <script src="{{ url('newslider/js/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ url('newslider/js/popper.min.js') }}"></script>
    <script src="{{ url('newslider/js/bootstrap.min.js') }}"></script>
    <script src="{{ url('newslider/js/script.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/html2canvas@1.0.0-rc.5/dist/html2canvas.min.js"></script>
    <script src="https://www.whiteboard.team/dist/api.js"></script>
   
</body>
</html>