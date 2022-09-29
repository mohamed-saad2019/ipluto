@extends('instructor.layouts.head')    
@section('title','myLessons')

@if(Auth::User()->role == "instructor")
        
        @php $storage = \Auth::user()->storage==null?100:\Auth::user()->storage;
             $current_storage = str_replace("MB","",get_size_instructor());
        @endphp

@section('maincontent')
      <div class="Mylesson">
        <div class="custom-container shadow p-3 mb-5 bg-white rounded">
        
         @if($current_storage >= $storage)
            <div class="alert alert-danger alert-dismissible fade show"
              style="background-color:#b31c20;">
               <h6 style="color:#fff;">  
                 <i class="fa fa-info-circle" aria-hidden="true" style="font-size:25px"></i>
                      You cannot add lessons because the storage space is enough (100MB), delete some lessons or 
                     <a href="#" style="color: #f6a233;text-decoration:underline;">do a space upgrade</a>
                </h6>
          </div>
         @endif
               
                 @if(!request()->has('id') and !request()->has('parent_id'))
                 <div class="myLessoncont">
            <h3 style="">My Lessons</h3>
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
                      aria-haspopup="true" aria-expanded="false" >
                      Create
                </button>
                  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    
                    <li class="dropdown-item dropdown-itemLesspar">
                      <a href="{{url('instructor/add_lesson')}}" class="icon"> <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 48 48"><style>
                      </style><g id="Svg_Export___1gun0Zjm">
                        <path d="M38.7 9.6H3.1c-1.1 0-2 .8-2 1.7v31.5c0 .9.9 1.7 2 1.7h35.6c1.1 0 2-.8 2-1.7V11.3c0-.9-.9-1.7-2-1.7zm-3.6 27.9c0 .7-.6 1.3-1.4 1.3H8.2c-.8 0-1.4-.6-1.4-1.3V25.7c0-.7.6-1.3 1.4-1.3h25.5c.8 0 1.4.6 1.4 1.3v11.8zm0-17.3c0 .8-.6 1.4-1.4 1.4H8.2c-.8 0-1.4-.6-1.4-1.4v-3c0-.8.6-1.4 1.4-1.4h25.5c.8 0 1.4.6 1.4 1.4v3z" fill="#00a8ff"></path>
                        <path d="M46.9 5.1c0-.9-.7-1.6-1.6-1.6H8.9c-.9 0-1.5.8-1.5 1.7 0 .4.2.8.4 1 .3.3.7.4 1.1.5H42c.9 0 1.6.7 1.6 1.6v33.2c0 1.4 3.2 1.5 3.2 0 .1 0 .1-36.4.1-36.4z" fill="#7ccbff"></path>
                      </g></svg> Lesson</a>
                    
                    </li>

                    <li class="dropdown-divider"></li>

                     <li class="dropdown-item dropdown-itemLesspar">
                      <a href="#" class="icon"> 
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 48 48">
                            <style></style><g id="Svg_Export___Kwe8ari9">
                              <path d="M29.1 29.4c.6-.9 1.7-1.5 2.8-1.5.3 0 .7.1 1 .2h.2l.1.1 9.2 4.1c1.2-2.5 1.8-5.4 1.8-8.3 0-11.1-9-20.2-20.2-20.2-11.1 0-20.2 9-20.2 20.2s9 20.2 20.2 20.2c3 0 5.9-.7 8.5-1.9l-3.7-9.8c-.5-1-.3-2.1.3-3.1z" fill="#00a8ff"></path>
                              <path d="M43.7 36.1L32 30.9c-.4-.1-.8.3-.6.7l4.4 11.6c.1.3.4.4.6.3.1 0 .2-.1.3-.2l1.6-2.9 3.6 3.7c.1-.1.2-.1.3-.1h.1s.1 0 .1-.1l1.7-1.6c.1-.1.1-.3 0-.5l-3.5-3.6 3.1-1.2c.3-.1.4-.4.3-.6 0-.1-.1-.2-.3-.3z" fill="#7ccbff"></path>
                              <path d="M23.1 16.1l6.5 6.5c.6.6.6 1.6 0 2.1l-6.5 6.5c-1 1-2.6.3-2.6-1.1V17.2c0-1.4 1.7-2.1 2.6-1.1z" fill="#fff">
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
                      <button href="{{ route('vacation.reset') }}" class="btn folder-btn" data-toggle="modal" data-target="#exampleModalCenter">
                          <i class="feather icon-plus mr-2"></i>{{ __("Folder")}}
                      </button>
                  </div>                    
                </div>
                 </div>
              <div class="sort d-flex align-items-center">
                <div class="dropdown">

                <button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Sort By
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                 <a  class="dropdown-item" href="#">Seniority</a>
                  <a  class="dropdown-item" href="#">Alphabetically</a>
                </div>
              </div>

              </div>              
            </div>
          </div>
            
        @else
                    <h3>My Lessons</h3>
            
                   @if ($errors->any())
                      <div class="alert alert-danger">
                        <ul>
                          @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                          @endforeach
                        </ul>
                      </div>
                      @endif

                <ol class="breadcrumb" style="background-color: #fff;">
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
                            <span id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle" 
                            style="color:{{$p->color}}"> {{$p->name}}
                            </span>
                              <div class="dropdown-menu folder_elem" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item"
                          href="{{url('instructor/add_lesson?folder_id='.$p->id.'&parent_id='.$p->parent_id)}}">
                          
                                  <i class="fas fa-book"></i>
                                  Add Lessons
                                </a>
                                <a class="dropdown-item" href="#"data-toggle="modal" data-target="#exampleModalCenter"><i class="feather icon-plus mr-2"></i>
                                 Add Folder
                                </a>
                            <a class="dropdown-item" href="#"data-toggle="modal" data-target="#exampleModalCenter1" id='{{request("id")}}' data-name="{{$p->name}}">
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

                <div class="row paste" id="dvDest">
                @foreach($folders as $folder)
                <div class="col-12 col-md-6 col-lg-3 folders mb-4" id="{{$folder->id}}" >
                  <div class="single__paste" style="border:1px solid {{$folder->color}} ;">
                    <a  class="w-100 d-flex align-items-center" href="{{url('instructor/library?id='.$folder->id.'&parent_id='.$folder->parent_id)}}" >
                     <i class="fa fa-folder fa-2x text-info "
                    style="color:{{$folder->color}} !important;border-right:1px solid {{$folder->color}}"
                      ></i>
                      <span class="description ml-2" 
                            style="color:{{$folder->color}} !important"
                       >{{$folder->name}}</span>
                    </a>
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
        <div class="col-md-3 mb-4">
        <div class="lessons sort contTechFolder drog" id="{{$lesson->id}}">
            <div class="d-flex justify-content-between">
              <input type="checkbox" name="select[]" value="{{$lesson->id}}"
                     id="{{$lesson->id.'_checkbox'}}" class="select_lesson">
              <div class="dropdown cus_dropdown" style="display:none;"
                  id="{{$lesson->id.'_cus_dropdown'}}">
                  <button type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="drop-down-button more">
                    <svg height="10" width="20" viewBox="0 0 38 10" class="library_npp_content__hover-layer-more-actions-btn-svg--1Jsnz"> <path d="M 5 10 C 7.76 10 10 7.76 10 5 C 10 2.24 7.76 0 5 0 C 2.24 0 0 2.24 0 5 C 0 7.76 2.24 10 5 10 Z M 5 10" fill="#333" class="library_npp_content__color-change--37R-g"></path> <path d="M 19 10 C 21.76 10 24 7.76 24 5 C 24 2.24 21.76 0 19 0 C 16.24 0 14 2.24 14 5 C 14 7.76 16.24 10 19 10 Z M 19 10" fill="#333" class="library_npp_content__color-change--37R-g"></path> <path d="M 33 10 C 35.76 10 38 7.76 38 5 C 38 2.24 35.76 0 33 0 C 30.24 0 28 2.24 28 5 C 28 7.76 30.24 10 33 10 Z M 33 10" fill="#333" class="library_npp_content__color-change--37R-g"></path> </svg>
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                        
                          <a class="dropdown-item cu_items"
                            href="{{url('instructor/add_lesson?id='.$lesson->id)}}">
                              View Lesson
                        </a>

                          @if(empty(($lesson->ensure_save)))
                            <a class="dropdown-item cu_items"
                            href="{{url('instructor/saved_lesson?id='.$lesson->id)}}">
                        
                            <svg width="15px" height="15px" viewBox="0 0 19 20" xmlns="http://www.w3.org/2000/svg">
                              <g fill="#8B9195" class="color-change" fill-rule="evenodd">
                                <path d="M18.8 15.3c0 .7-.6 1.3-1.3 1.3H4.6c-.7 0-1.3-.6-1.3-1.3v-14C3.3.6 3.9 0 4.6 0h9.6v2.8c0 1.1.9 1.9 1.9 1.9h2.7v10.6z" fill="#2c5f9e"></path>
                                <path d="M18.6 4h-2.5c-.3 0-.5-.1-.7-.3-.3-.2-.5-.6-.5-1V.1l3.5 3.6.2.3zM3.2 18.1c-.7 0-1.3-.6-1.3-1.3V3.4h-.6C.6 3.4 0 4 0 4.7v14c0 .7.6 1.3 1.3 1.3h12.5c.7 0 1.3-.6 1.3-1.3v-.6H3.2z"
                                fill="#2c5f9e"></path>
                              </g>
                            </svg>
                              Save Changes
                              </a>
                            @endif
                            
                            <a class="dropdown-item cu_items"
                            href="{{url('instructor/add_lesson?id='.$lesson->id)}}">
                        
                            <svg width="20px" height="20px" viewBox="0 0 19 20" class="library_npp_content__hover-layer-preview-btn-svg--2rgQj"><path fill="#2c5f9e" d="M13.758,12.559c0,0.427-0.356,0.773-0.795,0.773H2.54c-0.437,0-0.794-0.347-0.794-0.773V2.422 c0-0.427,0.357-0.754,0.794-0.754h9.848l2.125-1.638C14.483,0.02,14.473,0,14.452,0H1.05C0.485,0,0.028,0.427,0.028,0.973v13.034 C0.028,14.554,0.485,15,1.05,15h13.402c0.566,0,1.023-0.446,1.023-0.993V6.691l-1.718,1.33V12.559L13.758,12.559z" class="library_npp_content__color-change--37R-g"></path><path fill="#2c5f9e" d="M16.202,0.155l-0.78,0.72l1.78,1.8l0.77-0.72L16.202,0.155z" class="library_npp_content__color-change--37R-g"></path><path fill="#2c5f9e" d="M7.352,8.285l1.77,1.79l7.35-6.81l-1.77-1.8L7.352,8.285z" class="library_npp_content__color-change--37R-g"></path><path fill="#2c5f9e" d="M5.751,11.436l1.81,0.04h0.02l0.64-0.591l-1.77-1.799l0,0l-0.65,0.6L5.751,11.436z" class="library_npp_content__color-change--37R-g"></path></svg>
                              Edit
                          </a>

                            <a class="dropdown-item cu_items"
                            href="{{url('instructor/duplicate_lesson?id='.$lesson->id)}}">
                          
                              <svg width="15px" height="15px" viewBox="0 0 19 20" xmlns="http://www.w3.org/2000/svg">
                              <g fill="#8B9195" class="color-change" fill-rule="evenodd">
                                <path d="M18.8 15.3c0 .7-.6 1.3-1.3 1.3H4.6c-.7 0-1.3-.6-1.3-1.3v-14C3.3.6 3.9 0 4.6 0h9.6v2.8c0 1.1.9 1.9 1.9 1.9h2.7v10.6z" fill="#2c5f9e"></path>
                                <path d="M18.6 4h-2.5c-.3 0-.5-.1-.7-.3-.3-.2-.5-.6-.5-1V.1l3.5 3.6.2.3zM3.2 18.1c-.7 0-1.3-.6-1.3-1.3V3.4h-.6C.6 3.4 0 4 0 4.7v14c0 .7.6 1.3 1.3 1.3h12.5c.7 0 1.3-.6 1.3-1.3v-.6H3.2z"
                                fill="#2c5f9e"></path>
                              </g>
                            </svg>
                          Duplicate
                          
                        </a>
                        <a class="dropdown-item cu_items" href="#" style="">
                          
                            <svg width="20px" height="20px" viewBox="0 -4 18 23">
                              <g id="Page-1___kp0CKxNX" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" sketch:type="MSPage">
                                  <path class="color-change" d="M16.8,2 L7.3,2 L5.4,0.3 C5.3,0.2 5.2,0.2 5,0.2 L0.6,0.2 C0.3,0.2 0,0.4 0,0.7 L0,12.3 C0,12.6 0.3,13 0.6,13 L16.7,13 C17,13 17.2,12.7 17.2,12.3 L17.2,2.6 C17.3,2.2 17.1,2 16.8,2" id="folder___kp0CKxNX" fill="#2c5f9e" sketch:type="MSShapeGroup"></path>
                              </g>
                          </svg>
                          Add To Folder
                          
                        </a>
                          <a class="dropdown-item cu_items del_lesson" id='{{$lesson->id}}'
                          href="#exampleModal22222" class="trigger-btn" data-toggle="modal">
                          
                          <svg class="" height="15" width="15" viewBox="0 0 13 14">
                              <path class="color-change" d="M.34.64S0 .64 0 1.27c0 .64.34.64.34.64h12.32s.34 0 .34-.64c0-.63-.34-.63-.34-.63H.34zm.33 1.91H12.3L10.93 14h-8.9L.67 2.55zM5.46 0c-.69 0-.69.64-.69.64h3.42s0-.64-.68-.64H5.46zM4.09 12.73h.68L4.09 2.52H3.4l.69 10.21zM8.88 2.52l-.69 10.21h.69l.68-10.21h-.68zm-2.74 0v10.21h.68V2.52h-.68zm0 0" fill="#2c5f9e"></path>
                        </svg>
                        Delete
                          
                        </a>
                        <a  class="cu_items" href="{{route('lesson.share',$lesson->id)}}">
                          <i class="fa fa-share-alt" style="font-size: 18px;" aria-hidden="true"> Share </i>
                        </a>
                      
                      </div>
                      </div>
            </div>
              
                    <br>
                  <small class="title text-center">
                        <label for="{{$lesson->id.'_checkbox'}}">{{$lesson->name}}</label>
                  </small>
                  <div class="description d-flex justify-content-between">
                    <span>{{\Carbon\Carbon::parse($lesson->updated_at)->format('d-m-Y')}}</span>
                    <span>{{get_size_lesson($lesson->id)}}</span>
                  </div>
                  
                <div >
                  <img class="img-fluid " width="60px" src="{{url('image/logo.png')}}">
                </div>
                @if(empty(($lesson->ensure_save)))
                <div>
                  <span >
                    Unsaved Lesson
                  </span>
                </div>
                @else
                 <br>
                @endif
              </div>
              </div>
      @endforeach
  </div>
  </div>

<!-- End -->


  <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content" >
        <div class="modal-header">
          <div class="title_secondary__title_icon--3m9hH"><svg height="30px" width="50px" viewBox="0 0 19 14"> <path d="M18.49 2.06H8.02L5.97.16C5.85.06 5.71 0 5.56 0H.71C.37 0 0 .17 0 .51v12.77c0 .34.37.72.71.72h17.78c.34 0 .51-.38.51-.72V2.57c0-.34-.17-.51-.51-.51z" fill="#5FD598"></path> <path d="M12.92 5.08v2.735h2.735v.79H12.92v2.735h-.79V8.605H9.394v-.79h2.734V5.08h.79z" fill="blue"></path> </svg></div><span style="margin-top:5px; font-size:20px;color: #fff;"> Name Folder</span>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body" >
          <form action="{{url('add_folder')}}" method="post" enctype="multipart/form-data">
              {{ csrf_field() }} 
          <div class="row">
                <div class="col-md-11" style="margin:10px auto">
                        <input type="title" class="form-control" name="name" id="" placeholder="Folder Name" value="{{ (old('name')) }}" required style="border:1px solid #ccc">
                  <input type="hidden" name="parent_id" 
                  value="{{request()->has('id')?request('id'):''}}">
                  <input type="hidden" name="instructor_id" value="{{ Auth::user()->id }}">
                </div>
              
              </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-primary">Create</button>
                  </form>

        </div>
      </div>
    </div>
  </div>
@if(request()->has('id'))
  <div class="modal fade" id="exampleModalCenter1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <span style="margin-top:5px; font-size:20px;color: #fff;"> Folder Setting</span>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="{{url('update_folder/'.request('id'))}}"
                method="post" enctype="multipart/form-data">
              {{ csrf_field() }} 
          <div class="row">
                   <input type="hidden" name="parent_id" 
                  value="{{request()->has('id')?request('id'):''}}">
                  <input type="hidden" name="instructor_id" value="{{ Auth::user()->id }}">
                  <input type="hidden" name="color" value="" id="f_color">

              <div class="col-md-11" style="margin:10px auto">
               <label>Folder Name:<span class="redstar">*</span></label>
               <input type="title" class="form-control" name="name" id="one" placeholder="Enter Folder Name" value="{{ (old('name')) }}" required style="border:1px solid #ddd">
              </div>
             <div class="col-md-11" style="margin:0px auto;margin-bottom:35px;">
              <label>Folder Color:<span class="redstar">*</span></label>
              <select id="colorselector">
              <option value="102" data-color="#ddd" @if($color=='#dddd') selected @endif>test</option>
              <option value="106" data-color="#A0522D" @if($color=='#A0522D') selected @endif>test</option>
              <option value="47" data-color="#CD5C5C" @if($color=='#CD5C5Cd') selected @endif>test</option>
              <option value="87" data-color="#FF4500" @if($color=='#FF4500')selected @endif>test</option>
              <option value="15" data-color="#DC143C" @if($color=='#DC143C') selected @endif>test</option>
              <option value="24" data-color="#FF8C00"@if($color=='#FF8C00') selected @endif>test</option>
             <option value="78" data-color="#C71585"@if($color=='#C71585') selected @endif>test</option>
            <option value="1006" data-color="#3498ff"@if($color=='#3498ff') selected @endif>test</option>
               <option value="407" data-color="#ffff00"@if($color=='#ffff00') selected @endif>test</option>
               <option value="807" data-color="#5fd598"@if($color=='#5fd598') selected @endif>test</option>
               <option value="105" data-color="#8e8e93"@if($color=='#8e8e93') selected @endif>test</option>
               <option value="204" data-color="#cddc39"@if($color=='#cddc39') selected @endif>test</option>
              <option value="108" data-color="#4caf50"@if($color=='#4caf50') selected @endif>test</option>
             <option value="808" data-color="#3c3f43"@if($color=='#3c3f43')selected @endif>test</option>
             <option value="908" data-color="#000000"@if($color=='#000000') selected @endif>test</option>
             <option value="508" data-color="#00804e"@if($color=='#00804e')selected @endif>test</option>
             <option value="408" data-color="#080099"@if($color=='#b8c0c6')selected @endif>test</option>
             <option value="108" data-color="#80004a"@if($color=='#80004a')selected @endif>test</option>
             <option value="208" data-color="#9b0329"@if($color=='#9b0329') selected @endif>test</option>
            <option value="308" data-color="#22d8d5"@if($color=='#22d8d5')selected @endif>test</option>
              </select>
            </div>
         </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-primary">Save</button>
                  </form>

        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="exampleModalCenter2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content" style="width:300px !important">
        <div class="modal-header">
          <div class="title_secondary__title_icon--3m9hH">
              <svg height="30px" width="50px" viewBox="0 0 19 14"> <path d="M23.36 2.5H10.13L7.54.19C7.4.07 7.21 0 7.02 0H.89C.47 0 0 .21 0 .63v15.5c0 .41.47.87.89.87h22.47c.42 0 .64-.46.64-.87v-13c0-.42-.22-.63-.64-.63zm0 0" fill="#f26c59"></path> <path d="M12.5 10h8" fill="none" stroke="#fff" stroke-linecap="square" stroke-width="2"></path> </svg>
          </div><span style="margin:5px; font-size:20px;color: #fff;">  Delete Folder</span>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="{{url('delete_folder/'.request('id'))}}"
                method="post" enctype="multipart/form-data">
              {{ csrf_field() }} 
          <div class="row">
                <div class="col-md-12">
                  <h5 style="margin:5px;">
                      Are you sure you want to delete this folder? All contents will also be deleted
                  </h5>
                  <input type="hidden" name="instructor_id" value="{{ Auth::user()->id }}">
                </div>
              
              </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-danger">Delete</button>
                  </form>

        </div>
      </div>
    </div>
  </div>
@endif

  <!-- Modal HTML for delete -->
  <div class="modal fade" id="del_show" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content" style="width:300px !important">
        <div class="modal-header">
          <div class="title_secondary__title_icon--3m9hH">
            <svg class="" height="30" width="25" viewBox="0 0 13 14">
                <path class="color-change" d="M.34.64S0 .64 0 1.27c0 .64.34.64.34.64h12.32s.34 0 .34-.64c0-.63-.34-.63-.34-.63H.34zm.33 1.91H12.3L10.93 14h-8.9L.67 2.55zM5.46 0c-.69 0-.69.64-.69.64h3.42s0-.64-.68-.64H5.46zM4.09 12.73h.68L4.09 2.52H3.4l.69 10.21zM8.88 2.52l-.69 10.21h.69l.68-10.21h-.68zm-2.74 0v10.21h.68V2.52h-.68zm0 0" fill="red"></path>
              </svg>
          </div><span style="margin:5px; font-size:18px;color: #fff;"> Delete lessons </span>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
        
          <div class="row">
                <div class="col-md-12">
                  <h5 style="margin:10px 5px">
                    Delete lesson will delete all files, remove it from all folder and render share links invalid.
                  </h5>
                </div>
              
              </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
          <a href="{{url('/instructor/del_lesson')}}" class="btn btn-danger insure_del">Delete</a>

        </div>
      </div>
    </div>
  </div>


@endsection

@endif

@section('scripts')

@if(request()->has('id'))
<script type="text/javascript">

    $('#{{request("id")}}').click(function(){
        $('#one').val($(this).data('name'));
    });

   $('#colorselector').colorselector({
          callback: function (value, color, title) {

              $('#f_color').val(color);
              $('.st0 path').css('fill',color);

          }
    });
  
</script>
@endif
<script type="text/javascript">
    
    $('#ensure_multi_del').click(function(){
                 $('#del_show').modal('show');
     });

  $(function()
    {
      $('[name="type"]').change(function()
      {
        if ($(this).is(':checked')) {
          alert('sdsdsds');
        };
     
      });
    });
      
        $(function(){
          $('.del_lesson').click(function() {
             $('.insure_del').attr('href','{{url("instructor/del_lesson?id=")}}'+this.id);
             $('#del_show').modal('show');

        });
      });



          $(function(){
          $('.contTechFolder').hover(function() {

            var elem = this.id+'_cus_dropdown';

            $('#'+elem).css('display','inline');

          }, function() {

              var elem = this.id+'_cus_dropdown';

             $('#'+elem).css('display','none');

          })
        });
          
          $(function () {

            $("#dvSource .contTechFolder").draggable({
                revert: "invalid",
                refreshPositions: true,
                drag: function (event, ui) {

                      var count = $("#dvDest").children().length;
                      if (count==0) 
                      {
                        alert('There are no child folders!');
                      }

                      $('#le').text(this.id);
                      $('.cus_dropdown').css('display','none');

                },
                stop: function (event, ui) {
                }
            });
            $("#dvDest .folders").droppable({
                drop: function (event, ui) {
                      var f = this.id;
                      var lesson_selected = '';
                         if($(":checkbox:checked").length!=0)
                          {
                              var serial = '';
                             $(":checkbox:checked").each(function(){
                               var t = $(this).attr('id') ;
                               var i = t.replace("_checkbox", "");
                             $('#'+i).fadeTo(400, 0, function () {$('#'+i).slideUp(400);});
                                serial = serial + i + ',';

                          });
                             lesson_selected = serial;
                          }
                          else
                          {
                           ui.draggable.fadeTo(400, 0, function () {  ui.draggable.slideUp(400);});
                            lesson_selected = $('#le').text()+',';
                          }

                          jQuery.ajax( {
                          async :true,
                          type  :"POST",
                           url: "{{route('transport_lesson')}}",
                           data:  {
                                   _token: "{{ csrf_token() }}"
                                   ,f_id:f
                                   ,l_id:lesson_selected
                                 },
                        
                          success : function(data) {

                          },
                          error : function() {
                            alert ('error in droping');
                          }
                        });
                }
            });                             
        });

   $(function()
    {
      $('.select_lesson').change(function()
      {
        var text = this.id;
        var id = text.replace("_checkbox", "");
      
        if($(":checkbox:checked").length!=0)
        {
            var serial = '';
           $(":checkbox:checked").each(function(){
             var t = $(this).attr('id') ;
             var i = t.replace("_checkbox", "");
              serial = serial + i + ',';
           });

            $('.footer').css('display','block');
            $('#footer_from_library_js').css('display','block');
            $('.insure_del').attr('href','{{url("/instructor/multiple_del_lesson?id=")}}'+serial);

          }

        else
        {
            $('.footer').css('display','none');
        }

        if ($(this).is(':checked')) {
         $('#'+id).css('border','3px solid #f47c1c');
        }

        else
        {
           
           $('#'+id).css('border','1px solid #ccc');
        }
     
      });
    });

</script>




@endsection