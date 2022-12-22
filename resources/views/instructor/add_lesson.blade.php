@extends('instructor.layouts.head')
@section('title','myLessons')

@if(Auth::User()->role == "instructor")


@php $storage = \Auth::user()->storage==null?100:\Auth::user()->storage;
$current_storage = str_replace("MB","",get_size_instructor());
@endphp

@section('maincontent')
<div class="wrap">
  <div class="lesson">
    <div class="container">
      @if(Session::has('success') and !empty(Session::get('success')))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>{{ Session::get('success') }}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      @endif

      @if($current_storage >= $storage)
      <div class="alert alert-danger alert-dismissible fade show" style="background-color:#b31c20;">
        <h6 style="color:#fff;">
          <i class="fa fa-info-circle" aria-hidden="true" style="font-size:25px"></i>
          You cannot add lessons because the storage space is enough (100MB), delete some lessons or
          <a href="#" style="color: #f6a233;text-decoration:underline;">do a space upgrade</a>
        </h6>
      </div>
      @endif


      <div class="alert msg_lesson" role="alert" style="display:none">
        <p> </p>
      </div>



      <h3 style="margin-bottom:5px">

        <span id='change_name'>
          {{$full_name}}
        </span>

        @if(request()->has('id'))
        <span style="margin:0px 15px;font-size:14px;">
          Size Lesson : <span style="color:#888">
            {{get_size_lesson(request('id'))}}</span>
        </span>
        @endif


        <button type="button" class="btn btn-default btn-lg" data-toggle="modal" data-target="#exampleModalCenter"
          style="margin:0px 10px;">
          <svg width="18" height="18" xmlns="http://www.w3.org/2000/svg">
            <g fill="#fff" fill-rule="nonzero">
              <path
                d="M11.22 3.616l2.944 2.947-9.477 9.47-2.945-2.948zM14.122.594l2.945 2.95-2.475 2.47-2.945-2.95zM4.357 16.498l-2.942-2.997-.517 2.42 1.305 1.332zM.485 17.854l1.152-.403-.876-.893z">
              </path>
            </g>
          </svg> Settings
        </button>

        <div class="widgetbar" style="float:right;">
          <a href="{{url()->previous()}}" class="float-right btn btn-primary-rgba mr-2">
            <i class="feather icon-arrow-left mr-2"></i>Back
          </a>
        </div>



      </h3>

      <ul>

        @if($current_storage < $storage) 
          @if(!empty($grade)) 
            <li data-toggle="modal" data-target="#exampleModalCenter2"
            class='tab' id='tab_add'>
            <i class="fas fa-plus"></i>Add
            </li>
          @else
          <li data-toggle="modal" data-target="#exampleModalCenter" class='tab' id='tab_add'>Add</li>
          @endif
      @else
          <li data-toggle="modal" data-target="#exampleModalCenter55" class='tab' 
          id='tab_not_add'>
            <i class="fas fa-plus"></i>Add
          </li>
      @endif

          <li class="tab" id='tab_del'><i class="fas fa-trash"></i>Delete</li>
          <li class="tab"><i class="fas fa-copy"></i>Copy</li>
          <li class="tab"><i class="fas fa-clone"></i>Past</li>
          <li class="tab"><i class="fas fa-pen"></i>Convert</li>
      </ul>
    </div>
  </div>
  <div class="contTeach">
    <div class="container">
      <div class="row go">
        @php $sum=0; @endphp

        @foreach($files as $file)
        
         @php $sum++; @endphp
        
        @if(str_contains($file->mime_type, 'image'))
        <div class="col-12 col-md-6 col-lg-3 py-5">
          <div class="contTechFolder" id='{{$file->id}}' style="cursor:pointer;">
                 <small>
                 <i class="fas fa-file-image"></i>  {{ str_limit($file->file_name,15)}}
                  @if($file->file_type=='Library')
                   <span> (Library) </span>
                  @endif
                </small>
                <img src="{{url('storage/'.$file->path.'/'.$file->hash_name)}}"
                 style="width:240px;height:150px">
            <div class="d-flex justify-content-between addlesson__footer ">
                <small> #{{$sum}}</small>
                <small style="float: right;">
                  <a href="{{url('storage/'.$file->path.'/'.$file->hash_name)}}"><i class="fa fa-eye"></i><span style="margin-top:-5px"> show</span>
                  </a>
                </small>
              </div>
          </div>
        </div>

        @elseif(str_contains($file->mime_type, 'word'))
        <div class="col-12 col-md-6 col-lg-3 py-5">
          <div class="contTechFolder" id='{{$file->id}}' style="cursor:pointer;">
              <small>
                 <i class="fas fa-file-word"></i>  {{ str_limit($file->file_name,15)}}
                  @if($file->file_type=='Library')
                   <span> (Library) </span>
                  @endif
                </small>
              <embed src="https://view.officeapps.live.com/op/view.aspx?src={{url('storage/'.$file->path.'/'.$file->hash_name)}}"
               style="border: 1px solid white;width:266px;height:150px;" />
            <div class="d-flex justify-content-between addlesson__footer ">
                 <small> #{{$sum}}</small>
                <small style="float: right;">
                  <a href="https://view.officeapps.live.com/op/view.aspx?src={{url('storage/'.$file->path.'/'.$file->hash_name)}}"><i class="fa fa-eye"></i><span style="margin-top:-5px"> show</span>
                  </a>
                </small>
              </div>
          </div>
        </div>

        @elseif(str_contains($file->mime_type, 'sheet'))
        <div class="col-12 col-md-6 col-lg-3 py-5">
          <div class="contTechFolder" id='{{$file->id}}' style="cursor:pointer;">
             <small>
                 <i class="fas fa-file-excel"></i>  {{ str_limit($file->file_name,15)}}
                  @if($file->file_type=='Library')
                   <span> (Library) </span>
                  @endif
                </small>
              <embed src="https://view.officeapps.live.com/op/view.aspx?src={{url('storage/'.$file->path.'/'.$file->hash_name)}}"
               style="border: 1px solid white;width:266px;height:150px;" />
            <div class="d-flex justify-content-between addlesson__footer ">
                <small> #{{$sum}}</small>
                <small style="float: right;">
                  <a href="https://view.officeapps.live.com/op/view.aspx?src={{url('storage/'.$file->path.'/'.$file->hash_name)}}"><i class="fa fa-eye"></i><span style="margin-top:-5px"> show</span>
                  </a>
                </small>
              </div>
          </div>
        </div>

        @elseif(str_contains($file->mime_type, 'pdf'))
        <div class="col-12 col-md-6 col-lg-3 py-5">
          <div class="contTechFolder" id='{{$file->id}}' style="cursor:pointer;">
                <small>
                 <i class="fas fa-file-pdf"></i>  {{ str_limit($file->file_name,15)}}
                  @if($file->file_type=='Library')
                   <span> (Library) </span>
                  @endif
                </small>
              <embed src="{{url('storage/'.$file->path.'/'.$file->hash_name)}}" 
               style="border: 1px solid white;width:266px;height:150px;overflow:hidden;" />
            <div class="d-flex justify-content-between addlesson__footer ">
                <small> #{{$sum}}</small>
                <small style="float: right;">
                  <a href="{{url('storage/'.$file->path.'/'.$file->hash_name)}}">
                    <i class="fa fa-eye"></i><span style="margin-top:-5px"> show</span>
                  </a>
                </small>
              </div>
          </div>
        </div>

          @elseif(str_contains($file->mime_type, 'audio') )
          <div class="col-12 col-md-6 col-lg-3 py-5">
            <div class="contTechFolder" id='{{$file->id}}' style="cursor:pointer;">
                <small>
                 <i class="fas fa-file-audio"></i>  {{ str_limit($file->file_name,15)}}
                  @if($file->file_type=='Library')
                   <span> (Library) </span>
                  @endif
                </small>
                  <audio controls controlsList="nodownload" style="width:80%;">
                  <source src="{{url('storage/'.$file->path.'/'.$file->hash_name)}}" type="audio/ogg">
                  <source src="{{url('storage/'.$file->path.'/'.$file->hash_name)}}" type="audio/mpeg">
                  Your browser does not support the audio tag.
                  </audio>
              
              <div class="d-flex justify-content-between addlesson__footer ">
                <small> #{{$sum}}</small>
              </div>
            </div>
          </div>

          @elseif(str_contains($file->mime_type, 'video') and $file->hash_name=='Video From Dashboard')
          <div class="col-12 col-md-6 col-lg-3 py-5">
            <div class="contTechFolder" id='{{$file->id}}' style="cursor:pointer;">
               <small>
                 <i class="fas fa-file-video"></i>  {{ str_limit($file->file_name,15)}}
                  @if($file->file_type=='Library')
                   <span> (Library) </span>
                  @endif
                </small>
                <video style="width:240px;height:150px">
                        <source src="{{ url('storage/vedioTeachr/'.$file->path) }}" type="video/mp4">
                        <source src="{{ url('storage/vedioTeachr/'.$file->path) }}" type="video/ogg">
                        Your browser does not support the video tag.
                      </video>
              <div class="d-flex justify-content-between addlesson__footer ">
               <small> #{{$sum}}</small>
                <small style="float: right;">
                  <a href="{{ url('storage/vedioTeachr/'.$file->path) }}">
                    <i class="fa fa-eye"></i><span style="margin-top:-5px"> show</span>
                  </a>
                </small>
              </div>
            </div>
          </div>

          @elseif(str_contains($file->mime_type, 'video') and $file->hash_name !='Video From Dashboard')
          <div class="col-12 col-md-6 col-lg-3 py-5">
            <div class="contTechFolder" id='{{$file->id}}' style="cursor:pointer;">
               <small>
                 <i class="fas fa-file-video"></i>  {{ str_limit($file->file_name,15)}}
                  @if($file->file_type=='Library')
                   <span> (Library) </span>
                  @endif
                </small>
                <video style="width:240px;height:150px">
                        <source src="{{url('storage/'.$file->path.'/'.$file->hash_name)}}" type="video/mp4">
                        <source src="{{url('storage/'.$file->path.'/'.$file->hash_name)}}" type="video/ogg">
                        Your browser does not support the video tag.
                      </video>
              <div class="d-flex justify-content-between addlesson__footer ">
               <small> #{{$sum}}</small>
                <small style="float: right;">
                  <a href="{{ url('student/show_videos?lesson_id='.request('id').'&file_id='.$file->id) }}">
                    <i class="fa fa-eye"></i><span style="margin-top:-5px"> show</span>
                  </a>
                </small>
              </div>
            </div>
          </div>


          @elseif(str_contains($file->mime_type, 'presentation'))
          <div class="col-12 col-md-6 col-lg-3 py-5">
          <div class="contTechFolder" id='{{$file->id}}' style="cursor:pointer;">
              <small>
                 <i class="fas fa-file-powerpoint"></i>  {{ str_limit($file->file_name,15)}}
                  @if($file->file_type=='Library')
                   <span> (Library) </span>
                  @endif
                </small>
              <embed src="https://view.officeapps.live.com/op/view.aspx?src={{url('storage/'.$file->path.'/'.$file->hash_name)}}"
               style="border: 1px solid white;width:266px;height:150px;" />
            <div class="d-flex justify-content-between addlesson__footer ">
                 <small> #{{$sum}}</small>
                <small style="float: right;">
                  <a href="https://view.officeapps.live.com/op/view.aspx?src={{url('storage/'.$file->path.'/'.$file->hash_name)}}"><i class="fa fa-eye"></i><span style="margin-top:-5px"> show</span>
                  </a>
                </small>
              </div>
          </div>
        </div>
          @elseif(str_contains($file->mime_type, 'url'))
             <div class="col-12 col-md-6 col-lg-3 py-5">
          <div class="contTechFolder" id='{{$file->id}}' style="cursor:pointer;">
              <small>
                 <i class="fas fa-file-link"></i>  {{ str_limit($file->file_name,15)}}
                  @if($file->file_type=='Library')
                   <span> (Library) </span>
                  @endif
                </small>
             <center>{{str_limit($file->file_name,15)}}</center>
            <div class="d-flex justify-content-between addlesson__footer ">
                 <small> #{{$sum}}</small>
                <small style="float: right;">
                  <a href="{{$file->file_name}}"><i class="fa fa-eye"></i><span style="margin-top:-5px"> visit</span>
                  </a>
                </small>
              </div>
           </div>
         </div>
          @endif

          @endforeach

        </div>
       </div>
      </div>
    </div>
   </div>


  <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content" style="width:650px!important;padding: 20px;">

        <div class="modal-body" style="border:0px !important">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true" style="font-size:22px">×</span>
          </button><br>
          <form id='form' enctype="multipart/form-data">
            <div class="row">
              @csrf
              <div class="col-md-12">
                <center>
                  <img src="https://a3.nearpod.com/4.1.1660323733/img/create/customize.png" style="margin-top:-15px">
                  <h4>Lesson Details</h4>
                </center>
              </div><br><br>
              <div class="col-md-12">
                <input type="text" class="form-control" name="name" id="one" required='required' value="{{$full_name}}"
                  style="border:1px solid #ddd;padding:20px;font-size:17px;margin:10px auto;color:#000;">
              </div>

              <div class="col-md-12">
                <input type="text" class="form-control" name="des" id="two" value="{{$des}}"
                  placeholder='Description & Tags (e.g. Algebra, US Presidents, Verbs, etc.)'
                  style="border:1px solid #ddd;color:#000;height:80px;" max="500" min="5">
              </div>



              <div class="col-md-6">
                <select class="form-control" style="border:1px solid #ddd;color:#000;" name="grade" id='four'>
                  <option selected value="">Grade</option>
                  @foreach($grades as $s)
                  <option value="{{$s->id}}" @if($s->id == $grade) {{'selected'}}@endif>{{$s->title}}</option>
                  @endforeach
                </select>
              </div>

              <div class="col-md-6">
                <select class="multiple-select one form-control" data-placeholder="Uint" name='units[]' id='three'
                  multiple="multiple" style="padding: 0px;">
                  @foreach($all_units as $i)
                  <option value="{{ $i }}" @if(!empty($units) and in_array($i,explode(',',$units)))
                    {{'selected'}}@endif>
                    Unit ( {{$i}} )
                  </option>
                  @endforeach
                </select>
              </div>

              <div class="custom-file col-md-11" style="border: 1px solid #ddd;margin: 0px 13px;border-radius:5px;">
                <input type="file" name="img" class="custom-file-input form-control" 
                  aria-describedby="inputGroupFileAddon01">
                <label class="custom-file-label" for="inputGroupFile01">
                  Choose Lesson Background
                </label>
              </div>

              <input type="hidden" name="id" value="{{$id}}" id='five' />
              <input type="hidden" name="instructor_id" value="{{ Auth::user()->id }}" id='sex'>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
          <button type="button" class="btn btn-primary" id="save">Save</button>

        </div>
      </div>
    </div>
  </div>

  <div class="popFolder">
    <div class="modal fade modal" id="exampleModalCenter2" tabindex="-1" role="dialog"
      aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <input type="hidden" name="ex" id="ex" value="all">
          <!--                   <p style="">Add content to your lesson</p>
 -->
          <div class="row">
            <div class="col-6 col-md-4 col-lg-3 IconCont">
              <a href="{{url('instructor/attach_viedo?id='.$id.'&grade='.$grade.'&unit='.$units)}}"
                style="color:#2c5f9e">
                <i class="fas fa-plus-square"></i>
                <h6>ipluto</h6>
              </a>
            </div>
            <!-- <div class="col-6 col-md-4 col-lg-3 IconCont">
                            <i class="fas fa-plus-square"></i>
                            <h6>Slides (classic)</h6>
                        </div>-->
            <div class="col-6 col-md-4 col-lg-3 IconCont check" id='video' data-ex='video/*'
              data-text='Upload a Video File' data-type='fa-play-circle'>
              <i class="fas fa-play-circle"></i>
              <h6>Video</h6>
            </div>
            <div class="col-6 col-md-4 col-lg-3 IconCont check" id='audio' data-ex='audio/*'
              data-text='Upload a Audio File' data-type='fa-volume-up'>
              <i class="fas fa-volume-up"></i>
              <h6>Audio</h6>
            </div>
            <div class="col-6 col-md-4 col-lg-3 IconCont" id='web'>
              <i class="fas fa-globe-africa"></i>
              <h6>Web Content</h6>
            </div>
            <div class="col-6 col-md-4 col-lg-3 IconCont check" id='pdf' data-ex='application/pdf'
              data-text='Upload a PDF File' data-type='fa-file-pdf'>
              <i class="far fa-file-pdf"></i>
              <h6>PDF Viewer</h6>
            </div>
            <div class="col-6 col-md-4 col-lg-3 IconCont check" id='ppt' data-ex='.ppt,.pptx'
              data-text='Upload a Power Point File' data-type='fa-file-powerpoint'>
              <i class="fas fa-file-powerpoint"></i>
              <h6>Power Point</h6>
            </div>
            <div class="col-6 col-md-4 col-lg-3 IconCont check" id='doc' data-ex='.doc,.docx'
              data-text='Upload a Word File' data-type='fa-file-word'>
              <i class='fas fa-file-word'></i>
              <h6>Word</h6>
            </div>
            <div class="col-6 col-md-4 col-lg-3 IconCont check" id='xsl' data-ex='.xls,.xlsx,.csv'
              data-text='Upload a Excel File' data-type='fa-file-excel'>
              <i class='fas fa-file-excel'></i>
              <h6>Excel</h6>
            </div>
            <div class="col-6 col-md-4 col-lg-3 IconCont check" id="img" data-ex='image/*'
              data-text='Upload a Slideshow Files' data-type='fa-file-image'>
              <i class="fas fa-file-image"></i>
              <h6>Slideshow</h6>
            </div>
            <!--<div class="col-6 col-md-4 col-lg-3 IconCont">
                            <i class="far fa-file-pdf"></i>
                            <h6>PDF Viewer</h6>
                        </div>-->
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- start Modal HTML for delete -->
  <div class="modal fade" id="del_show_empty" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content" style="width:350px !important">
        <div>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true"
              style="font-size:40px !important;margin-right:-100px !important;color:#fff;">×</span>
          </button>
        </div>
        <div class="modal-body" style="margin:0px 10px;margin-top:-20px;">

          <div class="row">
            <div class="col-md-12">
              <h6 id="slide_del_msg">
              </h6>
            </div>

          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
          <a style="display:none" href="" class="btn btn-danger insure_del">Delete</a>

        </div>
      </div>
    </div>
  </div>
  <!-- end Modal HTML for delete -->


  <!-- start Can Not Add Lessons Beacause Size -->
  <div class="modal fade" id="exampleModalCenter55" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content" style="width:500px !important">
        <div>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true"
              style="font-size:40px !important;margin-right:-100px !important;color:#fff;">×</span>
          </button>
        </div>
        <div class="modal-body" style="margin:0px 10px;margin-top:-20px;">

          <div class="row">
            <div class="col-md-12">
              <h6 id="">

                <i class="fa fa-info-circle" aria-hidden="true" style="font-size:25px"></i>
                You cannot add lessons because the storage space is enough (100MB), delete some lessons or
                <a href="#">do a space upgrade</a>
              </h6>
            </div>

          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
          <a style="display:none" href="" class="btn btn-danger insure_del">Delete</a>

        </div>
      </div>
    </div>
  </div>
  <!-- end  Can Not Add Lessons Beacause Size -->


  <div class="modal fade" id="exampleModalCenter8" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content" style="width:650px!important;padding: 20px;">

        <div class="modal-body">
          <form action="{{url('instructor/upload_files/'.$id)}}" method="post">
            {{ csrf_field() }}

            <h4><i class="fa fa-globe" style="color:#2c5f9e;padding:20px 5px;"></i> Web Content</h4>
            <div class="col-md-12 " id="">
              <label for="url" class="" style="color:#000"> Add Valid Website URL :</label>
              <input type="url" class="form-control" name="url" id='url' value="" required
                style="border:1px solid #ddd;padding:20px;font-size:17px;margin:10px auto;color:#000;">
            </div>
            <div class="col-12" style="display:none;" id='adding'>
              <a href="" style="font-size:15px;text-decoration:underline;">Check Linke Before Adding</a>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-primary" id="save">Save</button>
          </form>

        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="exampleModalCenter7" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content" style="">

        <div class="modal-body">
          <div style="color:#2c5f9e;padding:10px 10px;font-size:22px;">
            <i class="fa " style="" id='ch_ty'></i>
            <span id="ch_h"> </span>
          </div>
          <form>
            <div class="col-md-12 " id="">
              <div class="dropzone" id="dropzoneUpload">
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Exit</button>
          </form>

        </div>
      </div>
    </div>
  </div>




  @endsection

  @endif

  @section('scripts')
  <link rel="stylesheet" type="text/css"
    href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.css">
  <script type="text/javascript" src='https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.js'>
  </script>

  <script>
    $(document).ready(function () {
      var id = '';
      var ex = '';

      $(".check").click(function () {
        id = this.id;
        ex = $(this).data("ex");
        $('#ch_ty').addClass($(this).data("type"));
        $('#ch_h').html($(this).data("text"));

        $('#exampleModalCenter2').modal('hide');
        $('#exampleModalCenter7').modal('toggle');
        myFunction(ex);
      });

      $("#web").click(function () {
        $('#exampleModalCenter2').modal('hide');
        $('#exampleModalCenter8').modal('toggle');
      });


      $('#url').keyup(function () {
        if ($('#url').val() != '') {
          $('#adding').attr("href", $('#url').val());
          $('#adding').css("display", 'block');
        } else {
          $('#adding').attr("href", '');
          $('#adding').css("display", 'none');
        }
      });

      $("#save").click(function () {
        var form = $('#form')[0];
        var data = new FormData(form);
        $.ajax({

          type: "POST",
          enctype: "multipart/form-data",
          url: "{{url('instructor/update_lesson/'.$id)}}",
          data: data,
          processData: false,
          contentType: false,
          cache: false,
          success: function (data) {

            $('#exampleModalCenter').modal('hide');
            $('.msg_lesson').css('display', 'block');

            if (data == 1) {
              $('#change_name').html($('#one').val());
              $('.msg_lesson').addClass('alert-success');
              $('.msg_lesson').removeClass('alert-danger');
              $('.msg_lesson p').text('Lesson Settings have been updated.');
              window.location.href = "{{url('instructor/add_lesson?id='.$id)}}";
            }

            if (data == -1) {
              $('.msg_lesson').addClass('alert-danger');
              $('.msg_lesson').removeClass('alert-success');
              $('.msg_lesson p').text(
                'Error Lesson Name: Required, must not be numeric, must contain at least 3 or no more than 255 characters.'
                );
            }

            if (data == -2) {
              $('.msg_lesson').addClass('alert-danger');
              $('.msg_lesson').removeClass('alert-success');
              $('.msg_lesson p').text('The Lesson Name has already been taken.');
            }



            // console.log('dssdds');
            // alert(data);
          },

          error: function (response) {

            $.each(response.responseJSON.errors, function (field_name, error) {
              $(document).find('[name=' + field_name + ']').after(
                '<span class="text-strong textdanger alert-danger">' + error + '</span>')
            })
          },
        });
      });
    });

    Dropzone.autoDiscover = false;

    function myFunction(x) {

      $('#dropzoneUpload').dropzone({
        url: "{{url('instructor/upload_files/'.$id)}}",
        paramName: 'file',
        // uploadMultiple : false,
        maxFiles: 15, //# file,
        maxFilessize: 15, //MB,
        parallelUploads: 1,
        acceptedFiles: x,
        // acceptedFiles:"image/,video/,audio/*,application/pdf,.doc,.docx,.xls,.xlsx,.csv,.html,.zip,.txt,.xml,.ppt,.pptx",
        // dictDefaultMessage:'<img src="https://static.vecteezy.com/system/resources/previews/004/896/060/non_2x/drag-and-drop-document-files-here-to-upload-concept-illustration-flat-design-eps10-folder-empty-state-icon-ui-vector.jpg" style="width:120px;height:80px;"><br><span>UPLOAD FILES Here</span>',
        params: {
          _token: '{{csrf_token()}}'
        },

        init: function () {
          this.on('sending', function (file, xhr, formData) {
            formData.append('fid', '');
            file.fid = '';
          });
          this.on('success', function (file, response) {

            window.location.href = "{{url('instructor/add_lesson?id='.$id)}}"
            $(".tab").removeClass("active");

          });
          this.on('error', function (file, response) {
            alert(error);
          });

        },
        addRemoveLinks: true,
        dictRemoveFile: "",
      });

    }

    $(".contTechFolder").click(function () {

      var text = this.className;
      if (text.includes("del")) {
        $(this).removeClass("del");
      } else {
        $(this).addClass("del");
      }

    });

    $("#tab_add").click(function () {
      $(".tab").removeClass("active");
      $('.contTechFolder').removeClass("del");
      $("#tab_add").addClass("active");
      // alert($('.del').length);
    });

    $("#tab_del").click(function () {
      $(".tab").removeClass("active");
      $("#tab_del").addClass("active");

      if ($('.del').length == 0) {

        if ($('.contTechFolder').length != 0) {
          $('#slide_del_msg').text('Please Select the slides you want to delete first by clicking on them.');
        } else {
          $('#slide_del_msg').text('There are no slides you can delete!');
        }

      } else {
        var arr = '';

        $('.del').each(function () {
          arr = arr + this.id + ',';
        });

        $('#slide_del_msg').text('Are you sure you want to delete this slide...?');

        $('.insure_del').css('display', 'inline');

        $('.insure_del').attr('href', "{{url('/instructor/del_sildes?id=')}}" + arr);
      }


      $('#del_show_empty').modal('show');

    });

    var count = $(".go").children().length;
    if (count != 0) {
      $('.footer').css('display', 'block');
      $('#footer_from_add_lesson_js').css('display', 'block');



    } else {

      $('.footer').css('display', 'none');

    }

    /////////
    $('#footer_from_library_js').css('display', 'none');
  </script>
  <script type="text/javascript">
    $('.multiple-select.one').multipleSelect();
    $('.ms-select-all label span').text('All Subject Units');
  </script>
  @endsection