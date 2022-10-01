

<!-- ////start Modal Add New Folder For My Lesson//////////////// -->

  <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content" >
          <div class="modal-header">
                <span style="margin-top:5px; font-size:20px;color: #fff;"> Folder Setting</span>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
          </div>
        <div class="modal-body" >
          <form action="{{url('add_folder')}}" method="post" enctype="multipart/form-data">
              {{ csrf_field() }} 
                  <input type="hidden" name="parent_id" 
                  value="{{request()->has('id')?request('id'):''}}">
                  <input type="hidden" name="instructor_id" value="{{ Auth::user()->id }}">
                 <input type="hidden" name="color" value="#777" id="f_color">
                 <input type="hidden" name="lesson_id" class="lesson_moved" value="">
               <div class="row">

                <div class="col-md-11" style="margin:10px auto">
                  <label>Folder Name:<span class="redstar">*</span></label>
                  <input type="title" class="form-control" name="name" id="" placeholder="Folder Name" value="{{ (old('name')) }}" required style="border:1px solid #ccc">
                </div>

             <div class="col-md-11" style="margin:0px auto;margin-bottom:35px;">
              <label>Folder Color:<span class="redstar">*</span></label>
              <select class="colorselector">
           <option value="102" data-color="#777" @if(old('color')=='#777' )selected @endif>test</option>
           <option value="106" data-color="#A0522D" @if(old('color')=='#A0522D') selected @endif>test</option>
          <option value="47" data-color="#CD5C5C" @if(old('color')=='#CD5C5Cd') selected @endif>test</option>
            <option value="87" data-color="#FF4500" @if(old('color')=='#FF4500')selected @endif>test</option>
            <option value="15" data-color="#DC143C" @if(old('color')=='#DC143C') selected @endif>test</option>
           <option value="24" data-color="#FF8C00"@if(old('color')=='#FF8C00') selected @endif>test</option>
          <option value="78" data-color="#C71585"@if(old('color')=='#C71585') selected @endif>test</option>
          <option value="1006" data-color="#3498ff"@if(old('color')=='#3498ff') selected @endif>test</option>
            <option value="407" data-color="#ffff00"@if(old('color')=='#ffff00') selected @endif>test</option>
            <option value="807" data-color="#5fd598"@if(old('color')=='#5fd598') selected @endif>test</option>
            <option value="105" data-color="#8e8e93"@if(old('color')=='#8e8e93') selected @endif>test</option>
            <option value="204" data-color="#cddc39"@if(old('color')=='#cddc39') selected @endif>test</option>
           <option value="108" data-color="#4caf50"@if(old('color')=='#4caf50') selected @endif>test</option>
            <option value="808" data-color="#3c3f43"@if(old('color')=='#3c3f43')selected @endif>test</option>
           <option value="908" data-color="#000000"@if(old('color')=='#000000') selected @endif>test</option>
           <option value="508" data-color="#00804e"@if(old('color')=='#00804e')selected @endif>test</option>
           <option value="408" data-color="#080099"@if(old('color')=='#b8c0c6')selected @endif>test</option>
           <option value="108" data-color="#80004a"@if(old('color')=='#80004a')selected @endif>test</option>
           <option value="208" data-color="#9b0329"@if(old('color')=='#9b0329') selected @endif>test</option>
            <option value="308" data-color="#22d8d5"@if(old('color')=='#22d8d5')selected @endif>test</option>
              </select>
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


<!-- ////End Modal Add New Folder For My Lesson//////////////// -->


<!-- ////start Modal Add New Folder For Custom Folder//////////////// -->

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
              <select class="colorselector">
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

<!-- ////End Modal Add New Folder For Custom Folder//////////////// -->


<!-- ////start Modal Delete For Custom Folder//////////////// -->

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

<!--   ////End Modal Delete For Custom Folder//////////////// -->

@endif

<!-- ////start Modal Delete For Custom Lesson//////////////// -->
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

<!-- ////End Modal Delete For Custom Lesson//////////////// -->


<!-- ////start Modal Move Lesson For Custom Folder////////////////--> 
  <div class="modal fade" id="move_lesson" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
   <div class="modal-dialog" role="document">
      <div class="modal-content" style="width:400px !important">
        <div class="modal-header">
          <span style="font-size:16px;color: #fff;"> Add to Folder </span>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
      
      <form action="{{url('add_lesson_to_folder')}}" method="post" enctype="multipart/form-data">

        <div class="modal-body" style="margin:0px 15px;border:0px">
              {{ csrf_field() }} 
                  <input type="hidden" name="lesson_id"  class='lesson_moved' value="1" />
                  <input type="hidden" name="parent_id"  value="{{request('parent_id')}}" />

                    @if(!empty($folders))
                       <div class="funkyradio" style="">
                           @foreach($folders as $folder)
                             <div class="funkyradio-default">
                              <input type="radio" name="folder_id" id="radio{{$folder->id}}" 
                              value="{{$folder->id}}" required/>
                              <label for="radio{{$folder->id}}">{{$folder->name}}</label>
                             </div>
                           @endforeach
                      </div>
                   @endif

                    <br>
                     <small>
                         <a href="#" class="" id="create_new_folder">
                          Create New Folder
                        </a>
                     </small>
              
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
          <input type="submit" value="Add Lesson" class="btn btn-primary">

        </div>
     
     </form>

      </div>
    </div>
  </div>

<!-- ////End Modal Move Lesson For Custom Folder//////////////// -->
