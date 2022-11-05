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

</div>




<div id="lightBoxContainer" class=" d-flex  justify-content-center align-items-center ">
    <div class="list_items">
          @php $sum = 0 ; @endphp
        @foreach($files as $file)
          @php $sum++; @endphp
            <div class="list_item" data-type='{{$file->mime_type}}' 
                                data-src=" @if(str_contains($file->mime_type, 'video') and $file->hash_name=='Video From Dashboard')
                                {{url('storage/vedioTeachr/'.$file->path)}}
                                @else{{url('storage/'.$file->path.'/'.$file->hash_name)}}@endif">

                <span > {{$sum}} </span>
                <small style="float:right;">{{$lesson->name}}</small>
                <center style="font-size:40px;margin-top: 10px;">
                   @if(str_contains($file->mime_type, 'url'))
                    <i class="fas fa-file-link"></i>
                   @endif
                   @if(str_contains($file->mime_type, 'presentation'))
                    <i class="fas fa-file-powerpoint"></i>
                   @endif
                   @if(str_contains($file->mime_type, 'video') and $file->hash_name !='Video From Dashboard')
                    <i class="fas fa-file-video"></i>
                   @endif
                   @if(str_contains($file->mime_type, 'video') and $file->hash_name=='Video From Dashboard')
                    <i class="fas fa-file-video"></i>
                   @endif
                   @if(str_contains($file->mime_type, 'audio') )
                    <i class="fas fa-file-audio-o"></i>
                   @endif
                   @if(str_contains($file->mime_type, 'pdf'))
                    <i class="fas fa-file-pdf"></i>
                   @endif
                   @if(str_contains($file->mime_type, 'sheet'))
                    <i class="fas fa-file-excel"></i>
                   @endif
                   @if(str_contains($file->mime_type, 'word'))
                    <i class="fas fa-file-word"></i>
                   @endif
                   @if(str_contains($file->mime_type, 'image'))
                    <i class="fas fa-file-image"></i>
                   @endif
                </center>
                <center style="font-size:16px;">{{$file->file_name}}</center>
           </div>
        @endforeach
        
    </div>
    <div id="lightBoxItem" class="lightBox position-relative d-flex  align-items-center ">

                            @if(!empty($lesson->background))
                            <img class="img-fluid " width="100%" style="height:40em;"
                              src="{{url('storage/'.$lesson->background)}}">
                            @else
                            <img class="img-fluid " width="100%" style="height: 40em;"
                              src="{{url('image/overlayGlobale.jpg')}}">
                            @endif

                           
    </div>
    
 
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