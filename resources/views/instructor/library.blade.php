@extends('instructor.layouts.head')
@section('title','myLessons')

@if(Auth::User()->role == "instructor")

@php $storage = \Auth::user()->storage==null?100:\Auth::user()->storage;
$current_storage = str_replace("MB","",get_size_instructor());
@endphp

@section('maincontent')
<div class="Mylesson">
  <div class="custom-container">

    @if($current_storage >= $storage)
    <div class="alert alert-danger alert-dismissible fade show" style="background-color:#b31c20;">
      <h6 style="color:#fff;">
        <i class="fa fa-info-circle" aria-hidden="true" style="font-size:25px"></i>
        You cannot add lessons because the storage space is enough (100MB), delete some lessons or
        <a href="#" style="color: #f6a233;text-decoration:underline;">do a space upgrade</a>
      </h6>
    </div>
    @endif

    @if(!request()->has('id') and !request()->has('parent_id'))
    <div class="myLessoncont d-flex justify-content-between">
      <div class="sort d-flex align-items-center">
        <span class="mr-2">Sort by</span>
        <div class="dropdown recent">
          <button class="btn  dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
            {{$sort == 'Title'?"Lesson Title" : $sort}}
          </button>
          <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
            <a class="dropdown-item" href="{{url('/instructor/library?sort=Recent')}}">Recent</a>
            <a class="dropdown-item" href="{{url('/instructor/library?sort=Size')}}">Size</a>
            <a class="dropdown-item" href="{{url('/instructor/library?sort=Title')}}">Lesson Title</a>
          </div>
        </div>

      </div>
      @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
          @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
      @endif
      <div class="myLessoncont1 mt-4 mb-3">
        <div class="d-flex">
          <div class="dropdown">
            <button class="btn  dropdown-toggle togCreate" type="button" id="dropdownMenuButton" data-toggle="dropdown"
              aria-haspopup="true" aria-expanded="false">
              Create
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">

              <li class="dropdown-item dropdown-itemLesspar">
                <a href="{{url('instructor/add_lesson')}}" class="icon"> <svg xmlns="http://www.w3.org/2000/svg"
                    width="25" height="25" viewBox="0 0 48 48">
                    <style>
                    </style>
                    <g id="Svg_Export___1gun0Zjm">
                      <path
                        d="M38.7 9.6H3.1c-1.1 0-2 .8-2 1.7v31.5c0 .9.9 1.7 2 1.7h35.6c1.1 0 2-.8 2-1.7V11.3c0-.9-.9-1.7-2-1.7zm-3.6 27.9c0 .7-.6 1.3-1.4 1.3H8.2c-.8 0-1.4-.6-1.4-1.3V25.7c0-.7.6-1.3 1.4-1.3h25.5c.8 0 1.4.6 1.4 1.3v11.8zm0-17.3c0 .8-.6 1.4-1.4 1.4H8.2c-.8 0-1.4-.6-1.4-1.4v-3c0-.8.6-1.4 1.4-1.4h25.5c.8 0 1.4.6 1.4 1.4v3z"
                        fill="#00a8ff"></path>
                      <path
                        d="M46.9 5.1c0-.9-.7-1.6-1.6-1.6H8.9c-.9 0-1.5.8-1.5 1.7 0 .4.2.8.4 1 .3.3.7.4 1.1.5H42c.9 0 1.6.7 1.6 1.6v33.2c0 1.4 3.2 1.5 3.2 0 .1 0 .1-36.4.1-36.4z"
                        fill="#7ccbff"></path>
                    </g>
                  </svg> Lesson</a>

              </li>

              <li class="dropdown-divider"></li>

              <li class="dropdown-item dropdown-itemLesspar">
                <a href="#" class="icon">
                  <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 48 48">
                    <style></style>
                    <g id="Svg_Export___Kwe8ari9">
                      <path
                        d="M29.1 29.4c.6-.9 1.7-1.5 2.8-1.5.3 0 .7.1 1 .2h.2l.1.1 9.2 4.1c1.2-2.5 1.8-5.4 1.8-8.3 0-11.1-9-20.2-20.2-20.2-11.1 0-20.2 9-20.2 20.2s9 20.2 20.2 20.2c3 0 5.9-.7 8.5-1.9l-3.7-9.8c-.5-1-.3-2.1.3-3.1z"
                        fill="#00a8ff"></path>
                      <path
                        d="M43.7 36.1L32 30.9c-.4-.1-.8.3-.6.7l4.4 11.6c.1.3.4.4.6.3.1 0 .2-.1.3-.2l1.6-2.9 3.6 3.7c.1-.1.2-.1.3-.1h.1s.1 0 .1-.1l1.7-1.6c.1-.1.1-.3 0-.5l-3.5-3.6 3.1-1.2c.3-.1.4-.4.3-.6 0-.1-.1-.2-.3-.3z"
                        fill="#7ccbff"></path>
                      <path
                        d="M23.1 16.1l6.5 6.5c.6.6.6 1.6 0 2.1l-6.5 6.5c-1 1-2.6.3-2.6-1.1V17.2c0-1.4 1.7-2.1 2.6-1.1z"
                        fill="#fff">
                      </path>
                    </g>
                  </svg>
                  Video
                </a>

              </li>

            </div>
          </div>
          <div class="col-md-4 col-lg-4">
            <div class="widgetbar">
              <button href="{{ route('vacation.reset') }}" class="btn folder-btn" data-toggle="modal"
                data-target="#exampleModalCenter">
                <i class="feather icon-plus mr-2"></i>{{ __("Folder")}}
              </button>
            </div>
          </div>
        </div>

      </div>
    </div>

    @else
    <div class="myLessoncont1 d-flex justify-content-end">
      <div class="sort d-flex align-items-center ">
        Sort by:
        <div class="dropdown ml-1">
          <button class="btn dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
            {{$sort == 'Title'?"Lesson Title" : $sort}}
          </button>
          <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
            <a class="dropdown-item"
              href="{{url('/instructor/library?id='.request('id').'&parent_id='.request('parent_id').'&sort=Recent')}}">Recent</a>
            <a class="dropdown-item"
              href="{{url('/instructor/library?id='.request('id').'&parent_id='.request('parent_id').'&sort=Size')}}">Size</a>
            <a class="dropdown-item"
              href="{{url('/instructor/library?id='.request('id').'&parent_id='.request('parent_id').'&sort=Title')}}">Lesson
              Title</a>
          </div>
        </div>
      </div>
    </div>

    @if ($errors->any())
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
    @endif

    <ol class="breadcrumb" style="background-color: #fff; border-bottom:0">
      <li style="font-size:22px;">
        <a href="{{url('/instructor/library')}}">My Lessons</a>
        <span style="padding:0px 20px;"> > </span>
      </li>
      @foreach($path as $p)
      @php $i=1 ; @endphp
      <li style="font-size:22px;">
        @if($p->id != request('id'))
        <a href="{{url('/instructor/library?id='.$p->id.'&parent_id='.$p->parent_id)}}"
          style="color:{{$p->color}}">{{$p->name}} </a>
        <span style="padding:0px 20px;"> > </span>
        @else
        @php $color = $p->color @endphp
        <div class="dropdown">
          <span id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
            class="dropdown-toggle" style="color:{{$p->color}}"> {{$p->name}}
          </span>
          <div class="dropdown-menu folder_elem" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item"
              href="{{url('instructor/add_lesson?folder_id='.$p->id.'&parent_id='.$p->parent_id)}}">

              <i class="fas fa-book"></i>
              Add Lessons
            </a>
            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#exampleModalCenter"><i
                class="feather icon-plus mr-2"></i>
              Add Folder
            </a>
            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#exampleModalCenter1"
              id='{{request("id")}}' data-name="{{$p->name}}">
              <i class="fas fa-edit"></i>

              Folder Setting
            </a>


            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#exampleModalCenter2">
              <i class="feather icon-trash mr-2"></i>
              Delete
            </a>

          </div>
        </div>
        @endif

      </li>
      @endforeach

    </ol>


    @endif
    <br>


    <div id="le" style="display:none"></div>

    <div class="row paste shadow-sm mb-5 bg-white rounded" id="dvDest">
      @foreach($folders as $folder)
      <div class="col-12 col-md-6 col-lg-3 folders mb-4" id="{{$folder->id}}">
        <div class="single__paste d-flex justify-content-between">
          <div class="">
            <a class="w-100 d-flex align-items-center" style="color:{{$folder->color}}"
              href="{{url('instructor/library?id='.$folder->id.'&parent_id='.$folder->parent_id)}}">
              <i class="fa fa-folder"></i>
              <span class="description ml-2">{{$folder->name}}</span>
            </a>
          </div>
          <div class="sizing d-flex align-items-end mr-1 mb-1">
            <span>
                {{number_of_lessons_in_folder($folder->id,get_child($folder->id),'teacher')}} Lesson
            </span>
            <span style="margin:0px 1px">|</span>
            <span>
              {{get_size_folder($folder->id,get_child($folder->id),'teacher')}}
            </span>
          </div>
        </div>
      </div>
      @endforeach
    </div>
    <br>

    <div class="container">

      <!-- begin  -->
      <div class="container">
        <div class="row go" id="dvSource">
          @foreach($lessons as $lesson)
          <div class="col-md-3 col-sm-6 mb-4">
            <div class="lessons sort contTechFolder drog sahdow-sm" id="{{$lesson->id}}"
                 style='overflow: unset;'>
              <div class="overlay">
                <div class="content">
                <div class="overlay_btn mt-5">

                  <a href="{{route('create.zoom')}}?lesson_id={{$lesson->id}}"
                     class="btn live__Session d-flex align-items-center justify-content-center">
                   <i class="fa fa-folder mr-2"></i>Live Session</a>

                  <button class="btn in__Class d-flex align-items-center justify-content-center"> <i class="fa fa-folder mr-2"></i>In Class</button>

                </div>
                <div class="">
                  <div class="overlay__footer d-flex justify-content-between mx-2">
                   <span>
                       <a href="{{url('instructor/add_lesson?id='.$lesson->id)}}">
                         <i class="fa fa-pencil-square-o"></i>Edit
                       </a>
                   </span>
                    <span>
                      <a href='{{url("view_lesson?lesson_id=".$lesson->id)}}'
                         target="_blank">
                       <i class="fa fa-eye" aria-hidden="true"></i>Preview
                      </a>
                     </span>
                  </div>
                </div>
              </div>
            </div>
              <div class="d-flex justify-content-between mx-2 card--header">
                <input type="checkbox" name="select[]" value="{{$lesson->id}}" id="{{$lesson->id.'_checkbox'}}"
                  class="select_lesson">
                <div class="dropdown cus_dropdown" id="{{$lesson->id.'_cus_dropdown'}}">
                  <button type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false" class="drop-down-button more">
                    <svg height="10" width="20" viewBox="0 0 38 10"
                      class="library_npp_content_hover-layer-more-actions-btn-svg--1Jsnz">
                      <path
                        d="M 5 10 C 7.76 10 10 7.76 10 5 C 10 2.24 7.76 0 5 0 C 2.24 0 0 2.24 0 5 C 0 7.76 2.24 10 5 10 Z M 5 10"
                        fill="#333" class="library_npp_contentcolor-change--37R-g"></path>
                      <path
                        d="M 19 10 C 21.76 10 24 7.76 24 5 C 24 2.24 21.76 0 19 0 C 16.24 0 14 2.24 14 5 C 14 7.76 16.24 10 19 10 Z M 19 10"
                        fill="#333" class="library_npp_contentcolor-change--37R-g"></path>
                      <path
                        d="M 33 10 C 35.76 10 38 7.76 38 5 C 38 2.24 35.76 0 33 0 C 30.24 0 28 2.24 28 5 C 28 7.76 30.24 10 33 10 Z M 33 10"
                        fill="#333" class="library_npp_content_color-change--37R-g"></path>
                    </svg>
                  </button>
                  <div class="dropdown-menu" aria-labelledby="dropdownMenu2">

                   

                    @if(empty(($lesson->ensure_save)))
                    <a class="dropdown-item cu_items" href="{{url('instructor/saved_lesson?id='.$lesson->id)}}">

                      <svg width="15px" height="15px" viewBox="0 0 19 20" xmlns="http://www.w3.org/2000/svg">
                        <g fill="#8B9195" class="color-change" fill-rule="evenodd">
                          <path
                            d="M18.8 15.3c0 .7-.6 1.3-1.3 1.3H4.6c-.7 0-1.3-.6-1.3-1.3v-14C3.3.6 3.9 0 4.6 0h9.6v2.8c0 1.1.9 1.9 1.9 1.9h2.7v10.6z"
                            fill="#2c5f9e"></path>
                          <path
                            d="M18.6 4h-2.5c-.3 0-.5-.1-.7-.3-.3-.2-.5-.6-.5-1V.1l3.5 3.6.2.3zM3.2 18.1c-.7 0-1.3-.6-1.3-1.3V3.4h-.6C.6 3.4 0 4 0 4.7v14c0 .7.6 1.3 1.3 1.3h12.5c.7 0 1.3-.6 1.3-1.3v-.6H3.2z"
                            fill="#2c5f9e"></path>
                        </g>
                      </svg>
                      Save Changes
                    </a>
                    @endif

                   

                    <a class="dropdown-item cu_items" href="{{url('instructor/duplicate_lesson?id='.$lesson->id)}}">

                      <svg width="15px" height="15px" viewBox="0 0 19 20" xmlns="http://www.w3.org/2000/svg">
                        <g fill="#8B9195" class="color-change" fill-rule="evenodd">
                          <path
                            d="M18.8 15.3c0 .7-.6 1.3-1.3 1.3H4.6c-.7 0-1.3-.6-1.3-1.3v-14C3.3.6 3.9 0 4.6 0h9.6v2.8c0 1.1.9 1.9 1.9 1.9h2.7v10.6z"
                            fill="#2c5f9e"></path>
                          <path
                            d="M18.6 4h-2.5c-.3 0-.5-.1-.7-.3-.3-.2-.5-.6-.5-1V.1l3.5 3.6.2.3zM3.2 18.1c-.7 0-1.3-.6-1.3-1.3V3.4h-.6C.6 3.4 0 4 0 4.7v14c0 .7.6 1.3 1.3 1.3h12.5c.7 0 1.3-.6 1.3-1.3v-.6H3.2z"
                            fill="#2c5f9e"></path>
                        </g>
                      </svg>
                      Duplicate

                    </a>
                    <a class="dropdown-item cu_items move_lesson" id='{{$lesson->id}}' href="#move_lesson"
                      class="trigger-btn" data-toggle="modal">

                      <svg width="20px" height="20px" viewBox="0 -4 18 23">
                        <g id="Page-1___kp0CKxNX" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"
                          sketch:type="MSPage">
                          <path class="color-change"
                            d="M16.8,2 L7.3,2 L5.4,0.3 C5.3,0.2 5.2,0.2 5,0.2 L0.6,0.2 C0.3,0.2 0,0.4 0,0.7 L0,12.3 C0,12.6 0.3,13 0.6,13 L16.7,13 C17,13 17.2,12.7 17.2,12.3 L17.2,2.6 C17.3,2.2 17.1,2 16.8,2"
                            id="folder___kp0CKxNX" fill="#2c5f9e" sketch:type="MSShapeGroup"></path>
                        </g>
                      </svg>
                      Add to Folder

                    </a>
                    <a class="dropdown-item cu_items del_lesson" id='{{$lesson->id}}' href="#exampleModal22222"
                      class="trigger-btn" data-toggle="modal">

                      <svg class="" height="15" width="15" viewBox="0 0 13 14">
                        <path class="color-change"
                          d="M.34.64S0 .64 0 1.27c0 .64.34.64.34.64h12.32s.34 0 .34-.64c0-.63-.34-.63-.34-.63H.34zm.33 1.91H12.3L10.93 14h-8.9L.67 2.55zM5.46 0c-.69 0-.69.64-.69.64h3.42s0-.64-.68-.64H5.46zM4.09 12.73h.68L4.09 2.52H3.4l.69 10.21zM8.88 2.52l-.69 10.21h.69l.68-10.21h-.68zm-2.74 0v10.21h.68V2.52h-.68zm0 0"
                          fill="#2c5f9e"></path>
                      </svg>
                      Delete

                    </a>
                    <a class="dropdown-item cu_items" href="{{route('lesson.share',$lesson->id)}}">
                      <i class="fa fa-share-alt" style="font-size: 18px;" aria-hidden="true"> Share </i>
                    </a>

                  </div>
                </div>

              </div>
              <div class="lessons__card__header d-flex mx-2">
                <div class="w-25 d-flex align-items-center pr-2">
                  <div class="d-flex">
                    <img class="img-fluid" src="../images/logo.png" alt="logo image not found">
                  </div>
                </div>
                <div class="w-75">
                  <div class="title">
                    <span for="{{$lesson->id.'_checkbox'}}" class="d-block text-capitalize">{{$lesson->name}}</span>
                    <span class="d-block text-capitalize">hatem</span>
                    <span>{{\Carbon\Carbon::parse($lesson->updated_at)->format('d-m-Y')}}</span> - 
                    <span>{{get_size_lesson($lesson->id)}}</span>
                  </div>
                </div>
              </div>
           
             @if($lesson->ensure_save != '1')
              <p class="mt-2 pl-3 lessons__Unsaved px-2 py-1">
                Unsaved
              </p>
             @else
               <p class="mt-2 pl-3 lessons__Unsaved px-2 py-1">
                 Saved
              </p>
             @endif
              <div class="lesson_image">
                @if(!empty($lesson->background))
                <img class="img-fluid " width="100%" style="height: 7em;"
                  src="{{url('storage/'.$lesson->background)}}">
                @else
                <img class="img-fluid " width="100%" style="height: 7em;"
                  src="../images/logo.png">
                @endif
              </div>
            </div>

          </div>
          @endforeach
        </div>
      </div>

      <!-- End -->

      @include('instructor.modales.library_modales')

      @endsection

      @endif

      @section('scripts')

      @if(request()->has('id'))
      <script type="text/javascript">
        $('#{{request("id")}}').click(function () {
          $('#one').val($(this).data('name'));
        });
      </script>
      @endif
      <script type="text/javascript">
        $('#ensure_multi_del').click(function () {
          $('#del_show').modal('show');
        });

        $(function () {
          $('[name="type"]').change(function () {
            if ($(this).is(':checked')) {
              alert('sdsdsds');
            };

          });
        });

        $(function () {
          $('.del_lesson').click(function () {
            $('.insure_del').attr('href', '{{url("instructor/del_lesson?id=")}}' + this.id);
            $('#del_show').modal('show');

          });
        });


        $(function () {
          $('.contTechFolder').hover(function () {

            var elem = this.id + '_cus_dropdown';

            $('#' + elem).css('display', 'inline');

          }, function () {

            var elem = this.id + '_cus_dropdown';

            //  $('#'+elem).css('display','none');

          })
        });

        $(function () {

          $("#dvSource .contTechFolder").draggable({
            revert: "invalid",
            refreshPositions: true,
            drag: function (event, ui) {

              var count = $("#dvDest").children().length;
              if (count == 0) {
                alert('There are no child folders!');
              }

              $('#le').text(this.id);
              $('.cus_dropdown').css('display', 'none');

            },
            stop: function (event, ui) {}
          });
          $("#dvDest .folders").droppable({
            drop: function (event, ui) {
              var f = this.id;
              var lesson_selected = '';
              if ($(":checkbox:checked").length != 0) {
                var serial = '';
                $(":checkbox:checked").each(function () {
                  var t = $(this).attr('id');
                  var i = t.replace("_checkbox", "");
                  $('#' + i).fadeTo(400, 0, function () {
                    $('#' + i).slideUp(400);
                  });
                  serial = serial + i + ',';

                });
                lesson_selected = serial;
              } else {
                ui.draggable.fadeTo(400, 0, function () {
                  ui.draggable.slideUp(400);
                });
                lesson_selected = $('#le').text() + ',';
              }

              jQuery.ajax({
                async: true,
                type: "POST",
                url: "{{route('transport_lesson')}}",
                data: {
                  _token: "{{ csrf_token() }}",
                  f_id: f,
                  l_id: lesson_selected
                },

                success: function (data) {

                },
                error: function () {
                  alert('error in droping');
                }
              });
            }
          });
        });

        $(function () {
          $('.select_lesson').change(function () {
            var text = this.id;
            var id = text.replace("_checkbox", "");

            if ($(":checkbox:checked").length != 0) {
              var serial = '';
              $(":checkbox:checked").each(function () {
                var t = $(this).attr('id');
                var i = t.replace("_checkbox", "");
                serial = serial + i + ',';
              });

              $('.footer').css('display', 'block');
              $('#footer_from_library_js').css('display', 'block');
              $('.insure_del').attr('href', '{{url("/instructor/multiple_del_lesson?id=")}}' + serial);

            } else {
              $('.footer').css('display', 'none');
            }

            if ($(this).is(':checked')) {
              $('#' + id).css('border', '3px solid #f47c1c');
            } else {

              $('#' + id).css('border', '1px solid #ccc');
            }

          });
        });

        //start colorselector library//////////////

        $('.colorselector').colorselector({
          callback: function (value, color, title) {
            $('#f_color').val(color);
          }
        });

        //end colorselector library//////////////


        ///start add lesson to folder/////////

        $('.move_lesson').click(function () {
          $('.lesson_moved').val(this.id);
        });

        //start create_new_folder//////////////

        $("#create_new_folder").click(function () {
          $('#move_lesson').modal('hide');
          $('#exampleModalCenter').modal('toggle');
          myFunction(ex);
        });

        //end create_new_folder//////////////

        ///end add lesson to folder/////////
      </script>




      @endsection