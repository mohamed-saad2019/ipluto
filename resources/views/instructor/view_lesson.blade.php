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


            <div class="item list_item " title="{{$file->file_name}}"
                 data-type='{{$file->mime_type}}' 
                 data-src=" @if(str_contains($file->mime_type, 'video') and $file->hash_name=='Video From Dashboard')
                 {{url('storage/vedioTeachr/'.$file->path)}}
                 @else{{url('storage/'.$file->path.'/'.$file->hash_name)}}@endif">
                
             
             @if(str_contains($file->mime_type, 'url'))
                    <i class="fas fa-link cus_i" style="width:100%;height:80px"></i>
                   @endif
                   @if(str_contains($file->mime_type, 'presentation'))
                    <embed src="https://view.officeapps.live.com/op/embed.aspx?src={{url('storage/'.$file->path.'/'.$file->hash_name)}}&amp;wdAr=1.7777777777777777"style="width:120px;height:100%;;" />
                   @endif
                   @if(str_contains($file->mime_type, 'video') and $file->hash_name !='Video From Dashboard')
                     <video style="width:100px;height:100%">
                        <source src="{{url('storage/'.$file->path.'/'.$file->hash_name)}}" type="video/mp4">
                        <source src="{{url('storage/'.$file->path.'/'.$file->hash_name)}}" type="video/ogg">
                        Your browser does not support the video tag.
                      </video>
                   @endif
                   @if(str_contains($file->mime_type, 'video') and $file->hash_name=='Video From Dashboard')
                     <video style="width:100px;height:100%">
                        <source src="{{ url('storage/vedioTeachr/'.$file->path) }}" type="video/mp4">
                        <source src="{{ url('storage/vedioTeachr/'.$file->path) }}" type="video/ogg">
                        Your browser does not support the video tag.
                      </video>
                   @endif
                   @if(str_contains($file->mime_type, 'audio') )
                  <i class="fas fa-file-audio cus_i"style="width:100%;height:80px"></i>
                   @endif
                   @if(str_contains($file->mime_type, 'pdf'))
                   <embed src="{{url('storage/'.$file->path.'/'.$file->hash_name)}}"style="width:110px;height:90%;" />
                   @endif
                   @if(str_contains($file->mime_type, 'sheet'))
                    <embed src="https://view.officeapps.live.com/op/embed.aspx?src={{url('storage/'.$file->path.'/'.$file->hash_name)}}&amp;wdAr=1.7777777777777777"style="width:122px;height:100%;" />
                   @endif
                   @if(str_contains($file->mime_type, 'word'))
                    <embed src="https://view.officeapps.live.com/op/embed.aspx?src={{url('storage/'.$file->path.'/'.$file->hash_name)}}&amp;wdAr=1.7777777777777777"style="width:122px;height:100%;" />
                   @endif
                   @if(str_contains($file->mime_type, 'image'))
                    <img  style="width:100px;height:100%" src="{{url('storage/'.$file->path.'/'.$file->hash_name)}}" alt="not Found"/>
                   @endif

                <span class=" d-flex justify-content-center align-items-center eye">
                    {{$sum}}
                </span>
                <span class=" d-flex justify-content-center align-items-center sum">
                     <i class="fa fa-eye"></i> 
                </span>

            </div>
       
        @endforeach
               <div class="item list_item " data-type='whiteboard' > 
                <i class="fas fa-chalkboard-teacher cus_i" ></i>   

                <span class=" d-flex justify-content-center align-items-center eye">
                    {{$sum+1}}
                </span>
                <span class=" d-flex justify-content-center align-items-center sum">
                     <i class="fa fa-eye"></i> 
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