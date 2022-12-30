@extends('instructor.layouts.head')    
@section('title',' Student List')

@if(Auth::User()->role == "instructor")



@section('maincontent')
         

             <div class="Become" style="margin: 20px 0;">
                <div class="">
                    <div class="formTe" style="width:95%">

                <h4 style="display:inline;"> 
                   <span> Student  </span> List @if(request()->has('type'))({{request('type')}})@endif
                    <li class="dropdown auth-drp" style="display:inline;margin:0px 5px !important;
                    margin-top:-10px !important;">
                    <a href="#" class="btn bt-sm btn-primary" data-toggle="dropdown"
                       style="border:none;margin-right:10px;border-radius:5px;color:white !important;
                       background-color: #f6a233 !important;">
                        <i class="fas fa-sort"></i> Type of Students</a>
                    </a>
                    <ul class="dropdown-menu user-auth-dropdown" data-dropdown-in="flipInX"
                        data-dropdown-out="flipOutX" style="padding:10px">
                        <li>
                            <a href="{{url('/instructor/students')}}">
                             <i class="fa fa-filter"></i> All Students</a>
                        </li>
                        <li class="dropdown-divider" style="border:1px solid #eee;"></li>
                        
                        <li>
                            <a href="{{url('/instructor/students?type=center')}}">
                                <i class="fa fa-filter"></i> Center Students</a>
                        </li>

                        <li class="dropdown-divider" style="border:1px solid #eee;"></li>

                        <li>
                            <a href="{{url('/instructor/students?type=online')}}">
                                <i class="fa fa-filter"></i> Online Students</a>
                        </li>

                    </ul>
                </li>
                   <div class="dropdown" style="float:right;display:inline;">
                  <button class="btn dropdown-toggle togCreate btn-primary" type="button" id="dropdownMenuButton" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false" style="margin-top:0px;width:140px;">
                 <i class="fa fa-plus" style="margin:0px 2px;font-size:12px !important;"></i>
                 Add Student</button>
                  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    
                    <li class="dropdown-item dropdown-itemLesspar">
                      <a href="{{url('instructor/add_students?type=online')}}" class="icon">
                      <i class="fa fa-plus" style="margin:0px 2px;font-size:12px !important;"></i>
                         Add Student(Online)
                      </a>
                    </li>

                    <li class="dropdown-divider" style="border:1px solid #eee;"></li>

                   <li class="dropdown-item dropdown-itemLesspar">
                      <a href="{{url('instructor/add_students?type=center')}}" class="icon">
                      <i class="fa fa-plus" style="margin:0px 2px;font-size:12px !important;"></i>
                         Add Student(Center)
                      </a>
                    </li>
                    
                    <li class="dropdown-divider" style="border:1px solid #eee;"></li>
                    
                    <li class="dropdown-item dropdown-itemLesspar">
                      <a href="{{url('instructor/add_students?type=pluck')}}" class="icon">
                      <i class="fa fa-plus" style="margin:0px 2px;font-size:12px !important;"></i>
                         Add Students (Excel Sheet)
                      </a>
                    </li>
                  </div>
                </div>

            </h4>
                   <br>

             @if ($errors->any())
                    <div class="alert alert-danger">
                      <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                      </ul>
                    </div>
            @endif

                    <div class="table-responsive" style="margin-top: 30px;">
                        <table class="table table-hover" id='example1'>
                            <thead class="thead-dark">
                              <th scope="col">#</th>
                              <th scope="col">Name</th>
                              <th scope="col">Phone</th>
                              <th scope="col">Email</th>
                              <th scope="col">Grade</th>
                              <th scope="col">Code</th>
                              <th scope="col">Type</th>
                              <th scope="col">Last Seen</th>
                              <th scope="col">Class</th>
                              <th scope="col">Settings</th>
                            </tr>
                          </thead>
                          <tbody style="background:#fff !important;">

                            @foreach($students as $st)
                              <tr class="cus_table">                          
                                 <td>{{$st->student()->value('id')}}</td>
                            
                            
                            <td>{{$st->student()->value('fname')}} {{$st->student()->value('lname')}}</td>
                                 <td>{{$st->student()->value('mobile')}} </td>
                                 <td>{{$st->student()->value('email')}}</td>
                                 <td>
                                  @if(!empty($st->student()->value('grade')))
                                    {{get_student_grade($st->student()->value('grade'))}}
                                   @endif
                                 </td>
                                 <td>{{$st->student()->value('code')}} </td>
                                 <td>{{$st->type}}</td>
                                 <td>
                                      @if(!empty($st->student()->value('last_seen')))
                                        {{ \Carbon\Carbon::parse($st->student()->value('last_seen'))->shortRelativeDiffForHumans() }}
                                      @endif
                                 </td>
                                 <td>
                                    <div class="dropdown" style="color:#2c5f9e;font-size:15px;">
                                  @if(!empty(getStudentClass($st->student()->value('id'))))
                                        {{getStudentClass($st->student()->value('id'))->name}}
                                  @else
                                            Add Class
                                  @endif    
                                    <span id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"></span>
                                      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton"
                                         style="max-height:300px;overflow:scroll;">
                                        @foreach($classes as $class)
                                        
                                         @if(!empty(getStudentClass($st->student()->value('id')))
                                         and getStudentClass($st->student()->value('id'))->id != $class->id)
                                        
                                        <li><a class="dropdown-item" href="{{url('/instructor/change_class?student_id='.$st->student()->value('id').'&new_class_id='.$class->id)}}" >{{$class->name}}</a></li>

                                        <li class="dropdown-divider" 
                                            style="border:1px solid #eee;margin:5px 10px;"></li>
                                         @endif
                                        @endforeach
                      
                                      </div>
                                  </div>
                               </td>
                                 <td>
                                    
                                  <label class="switch">
                                   <input class="user" type="checkbox"  data-id="{{$st->id}}" name="status" {{ $st->status == '1' ? 'checked' : '' }}> 
                                   <span class="knob"></span>
                                </label>

                               

                                    <a href="" class="btn btn-danger btn-xs delete" title="delete"
                                    data-toggle="modal" data-target="#delete{{ $st->id }}"
                                     style="padding:5px 10px !important">
                                     <i class="fa fa-trash-o" style="font-size:18px"> </i> 
                                    </a>

                                      <!-- delete Modal start -->
                                      <div class="modal fade" id="delete{{$st->id}}" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
                                      <div class="modal-dialog" role="document">
                                        <div class="modal-content" style="background-color:#fff;">
                                        <div class="modal-header">
                                          <h5 class="modal-title" id="exampleSmallModalLabel">
                                            <i class="fa fa-trash-o"></i>  Delete Student</h5>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                           <span aria-hidden="true">&times;</span>
                                           </button>
                                        </div>
                                          <div class="modal-body">
                                             <br>
                                             <h4>{{ __('Are You Sure ?')}}</h4>
                                              <p>{{ __('Do you really want to delete')}} <b>{{$st->student()->value('fname')}}</b>? When you delete this student, you will not be able to share it in any classٍ</p>
                                         </div>
                                         <div class="modal-footer">                   
                                            <button type="reset" class="btn btn-secondary" data-dismiss="modal">No</button>
                                            <a href="{{url('/instructor/del_student?id='.$st->id)}}"
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
                        </div>
                    </div>
                </div>
            </div>

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
    $(document).on("change",".user",function() {
        
        $.ajax({
            type: "GET",
            dataType: "json",
            url: "{{url('instructor/status_student')}}",
            data: {'id': $(this).data('id')},
            success: function(data){
                // alert('id')
            }
        });
    })
</script>
@endsection