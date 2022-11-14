@extends('instructor.layouts.head')    
@section('title','Library List ('.$type .' Students)')

@if(Auth::User()->role == "instructor")



@section('maincontent')
         

             <div class="Become">
              <div class="formTe">
               <div class="table-responsive">
                      
                      @if($type == 'Center')
                         <table class="table table-hover" id='example1'>
                            <thead class="thead-dark">
                              <th scope="col">#</th>
                              <th scope="col">Conclusion</th>
                              <th scope="col">Class</th>
                              <th scope="col">Lesson</th>
                              <th scope="col">Settings</th>
                            </tr>
                          </thead>
                          <tbody style="background:#fff !important;">

                            @foreach($library as $l)
                              <tr>
                                 <td>{{++$sum}}</td>

                                 <td>
                                    {{str_limit($l->info,30)}}
                                   <span class='edit_info' style="float:right;cursor:pointer;"
                                          data-id='{{$l->id}}'
                                          data-info = '{{$l->info}}'
                                          title="Edit Conclusion">
                                        <i class="fas fa-pen"></i> 
                                    </span>
                                 </td>
                                 <td>
                                    {{$l->class()->value('name')}} 
                                    <span style="float:right;cursor:pointer;" 
                                          title="Copy Another Class">
                                        <i class="fas fa-copy"></i> 
                                    </span>
                                 </td>
                                 <td>
                                    {{$l->lesson()->value('name')}}
                                    <span style="float:right;cursor:pointer;"
                                          title="Copy Another Lesson In Same Class">
                                        <i class="fas fa-copy"></i> 
                                    </span>
                                 </td>
                                 <td></td>
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
                    Edit  Conclusion
                </span>
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
                 <input type="hidden" name="library_id" id="library_id" value="">
               
               <div class="row">
                <div class="col-md-11" style="margin:10px auto">
                  <label>Conclusion:<span class="redstar">*</span></label>
                  <textarea class="form-control" name="info" id="conclusion" 
                  placeholder="Conclusion" value="" required
                   style="border:1px solid #ccc"></textarea>
                </div>

            
        <div class="modal-footer" style="margin:auto;">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-primary">Save</button>
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