@extends('instructor.layouts.head')    
@section('title','Library List ('.$type .' Students)')

@if(Auth::User()->role == "instructor")



@section('maincontent')
         

             <div class="Become">
              <div class="formTe">
               <div class="table-responsive">
                      
                      @if(request()->has('type'))
                         <table class="table table-hover" id='example1'>
                            <thead class="thead-dark">
                              <th scope="col">#</th>
                              @if(request('type')=='online')
                               <th>Title</th>
                              @endif
                              <th scope="col">Conclusion</th>
                              <th scope="col">Grade</th>
                              @if(request('type')=='online')
                               <th>Unit</th>
                              @endif
                              @if(request('type')=='center')
                               <th scope="col">Lesson</th>
                              @endif
                              @if(request('type')=='online')
                               <th>Price</th>
                              @endif
                              <th scope="col">Files / Videos </th>
                              <th scope="col">Settings</th>
                            </tr>
                          </thead>
                          <tbody style="background:#fff !important;">

                            @foreach($library as $l)
                              <tr>
                                 <td>{{++$sum}}</td>
                                  @if(request('type')=='online')
                                   <td>{{str_limit($l->title,30)}}</td>
                                  @endif
                                 <td>
                                    {{str_limit($l->info,30)}}
                                 </td>
                                 <td>
                                    {{$l->grade()->value('title')}} 
                                 </td>
                                 @if(request('type')=='online')
                                   <td>{{$l->unit}}</td>
                                  @endif
                                @if(request('type')=='center')
                                 <td>
                                    {{$l->lesson()->value('name')}}
                                 </td>
                                @endif

                                @if(request('type')=='online')
                                   <td>{{$l->price}}</td>
                                @endif
                                 <td>
                                   @if(request('type')=='center')
                                    <a href="{{url('/instructor/add_lesson?id='.$l->lesson()->value('id'))}}">
                                      {{ count($l->files)}}
                                    </a>
                                   @endif
                                   @if(request('type')=='online')
                                     <a href="{{url('/instructor/view_library?id='.$l->id)}}">
                                      {{ count($l->files_library)}}
                                    </a>
                                   @endif
                                 </td>
                             <td style="">

                              <span class="btn btn-primary edit_info"
                                          data-id = "{{$l->id}}"
                                          style="padding:5px 10px !important"
                                          title="Copy Another Lesson In Same Class">
                                        <i class="fas fa-copy"></i> 
                              </span>

                              <a class="btn btn-success btn-xs" title="Edit Library"
                               href="" data-toggle="modal" data-target="#edit{{ $l->id }}"
                               style="padding:5px 10px !important">
                                <i class="fas fa-edit"></i>
                              </a>

                                  <!-- edit Modal start -->
                                      <div class="modal fade" id="edit{{$l->id}}" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
                                      <div class="modal-dialog" role="document">
                                        <div class="modal-content" style="background-color:#fff;">
                                           <div class="modal-header">
                                               <span style="margin-top:5px; font-size:20px;color: #fff;">
                                                    Edit  Library
                                                </span>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                  <span aria-hidden="true">×</span>
                                                </button>
                                          </div>
                                        <div class="modal-body" >
                                          <form action="{{url('instructor/edit_library')}}" method="post" enctype="multipart/form-data">
                                              {{ csrf_field() }} 
                                                  <input type="hidden" name="library_id"
                                                  value="{{$l->id}}">
                                               <div class="row">

                                                <div class="col-md-11" style="margin:10px auto">
                                                 <label>Conclusion:<span class="redstar">*</span></label>
                                                 <textarea class="form-control" name="info" required value="{{$l->info}}">{{$l->info}}</textarea>   
                                                </div>

                                                <div class="col-md-11" style="margin:10px auto">
                                                  <label>Grade:<span class="redstar">*</span></label>
                                                    <select class="form-control select2 getLessonInGrade" required style="border:1px solid #ddd;color:#000;" name="grade">
                                                            @foreach($grades as $s)
                                                             <option value="{{$s->id}}"
                                                            @if($s->id == $l->grade_id) selected @endif>
                                                                {{$s->title}}
                                                             </option>
                                                           @endforeach
                                                   </select>
                                                </div>

                                                <div class="col-md-11" style="margin:10px auto">
                                                  <label>Lesson:<span class="redstar">*</span></label>
                                                    <select class="form-control select2 fetch_lesson" required style="border:1px solid #ddd;color:#000;" name="lesson" > 
                                                     @foreach(get_lessons_in_grade($l->grade_id) as $s)
                                                             <option value="{{$s->id}}"
                                                            @if($s->id == $l->lesson_id) selected @endif>
                                                                {{$s->name}}
                                                             </option>
                                                       @endforeach
                                                    </select>
                                                </div>
                                          </div>
                                        <div class="modal-footer" style="margin:auto;margin-top: 30px;">
                                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                          <button type="submit" class="btn btn-primary">Save</button>
                                          <br>
                                        </div>
                                         </form>
                                        </div>
                                        </div>
                                      </div>
                                    </div>
                                                   
                                 <!-- edit Model ended -->
                              
                              <a href="" class="btn btn-danger btn-xs delete" title="Delete Library"
                                    data-toggle="modal" data-target="#delete{{ $l->id }}"
                                     style="padding:5px 10px !important">
                                     <i class="fa fa-trash-o" style="font-size:18px"> </i> 
                                    </a>

                                      <!-- delete Modal start -->
                                      <div class="modal fade" id="delete{{$l->id}}" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
                                      <div class="modal-dialog" role="document">
                                        <div class="modal-content" style="background-color:#fff;">
                                        <div class="modal-header">
                                          <h5 class="modal-title" id="exampleSmallModalLabel">
                                            <i class="fa fa-trash-o"></i>  Delete Library</h5>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                           <span aria-hidden="true">&times;</span>
                                           </button>
                                        </div>
                                          <div class="modal-body">
                                             <br>
                                             <h4> Are you sure to delete ...?</h4>
                                             <small>
                                               When you delete this library, the files for this library will also be deleted
                                             </small>
                                         </div>
                                         <div class="modal-footer">                   
                                            <button type="reset" class="btn btn-secondary" data-dismiss="modal">No</button>
                                            <a href="{{url('instructor/delete_library?type=center&id='.$l->id)}}"
                                            class="btn btn-danger">Yes</a>
                                        </div>
                                        </div>
                                        </div>
                                      </div>
                                    </div>
                                                   
                                                    <!-- delete Model ended -->
                                  </td>
                             </tr>
                            @endforeach
                          
                          </tbody>
                        </table>
                      @endif

                        </div>
                    </div>
                </div>

<!-- ////start Modal Edit Conclusion//////////////// -->

  <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content" >
          <div class="modal-header">
                <span style="margin-top:5px; font-size:20px;color: #fff;"> 
                    Copy  Library
                </span>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
          </div>
        <div class="modal-body" >
          <form action="{{url('instructor/copy_library')}}" method="post" enctype="multipart/form-data">
              {{ csrf_field() }} 

                  <input type="hidden" name="instructor_id" value="{{ Auth::user()->id }}">
                  <input type="hidden" name="library_id" id="library_id" value="">
               
               <div class="row">
                <div class="col-md-11" style="margin:10px auto">
                  <label>Grade:<span class="redstar">*</span></label>
                    <select class="form-control select2 
                            @if($type=='center') getLessonInGrade @endif" required 
                            style="border:1px solid #ddd;color:#000;" name="grade">
                            <option  value="">Select Grade</option>
                            @foreach($grades as $s)
                             <option value="{{$s->id}}">
                                {{$s->title}}
                             </option>
                           @endforeach
                   </select>
                </div>
               @if($type=='center')
                <div class="col-md-11" style="margin:10px auto">
                  <label>Lesson:<span class="redstar">*</span></label>
                    <select class="form-control select2 fetch_lesson" required 
                            style="border:1px solid #ddd;color:#000;" name="lesson" > 
                        <option selected value="">Select Lesson</option>
                    </select>
                </div>
              @endif

               @if($type=='online')
                <div class="col-md-11" style="margin:10px auto">
                  <label>Unit:<span class="redstar">*</span></label>
                    <select class="form-control select2" required 
                      style="border:1px solid #ddd;color:#000;"name="unit">
                        <option  value="">Select Unit</option>
                          @foreach($all_units as $s)
                          <option value="{{$s}}">{{$s}}@endforeach
                          </select>
                </div>
              @endif

                

        <div class="modal-footer" style="margin:auto;margin-top: 30px;">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-primary">Copy</button>
          <br>
        </div>
         </form>
      </div>
    </div>
  </div>


<!-- ////End Modal Edit Conclusion//////////////// -->
@endsection

@endif




@section('scripts')
<script src="{{ url('js/add_class.js')}}"></script>
<script>
    $(function () {
      $('#example1').DataTable({
               'ordering'    : false,
      })
    }) 
    
  </script>

<script type="text/javascript">
     $(document).on("click",".edit_info",function() {
      $('#library_id').val($(this).attr("data-id"));
      $('#conclusion').val($(this).attr("data-info"));
      $('#exampleModalCenter').modal('show');
    })

</script>
@endsection