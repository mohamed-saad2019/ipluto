@extends('instructor.layouts.head')    
@section('title',' Student List')
@if(Auth::User()->role == "instructor")
@section('maincontent')
         

             <div class="Become" style="margin: -15px 0;">
                <div class="">
                    <div class="formTe" style="width:100%">
                     @if(Session::has('success') and !empty(Session::get('success')))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>{{ Session::get('success') }}</strong>
                           <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                               <span aria-hidden="true">&times;</span>
                         </button>
                        </div> 
                      @endif
                        @if(Session::has('error') and !empty(Session::get('error')))
                                    <div class="alert alert-info alert-dismissible fade show" role="alert">
                                        <strong>{{ Session::get('error') }}</strong>
                                       <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                           <span aria-hidden="true">&times;</span>
                                     </button>
                                    </div> 
                      @endif
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
                              <th scope="col">Last Seen</th>
                              <th scope="col">Class</th>
                              <th scope="col">Approval</th>
                         @if(request()->has('class_id') and !empty(request('class_id')))
                              <th scope="col">Settings</th>
                          @endif
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
                                 <td>
                                      @if(!empty($st->student()->value('last_seen')))
                                        {{ \Carbon\Carbon::parse($st->student()->value('last_seen'))->shortRelativeDiffForHumans() }}
                                      @endif
                                 </td>
                                 <td>
                               @if(!empty(getStudentClass($st->student()->value('id'))))
                                    
                                    {{getStudentClass($st->student()->value('id'))->name}}
                                    <div class="dropdown" style="color:#2c5f9e;font-size:15px;">

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
                                @else
                                    <div class="dropdown" style="color:#2c5f9e;font-size:15px;">
                                        Add Class
                                    <span id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"></span>
                                      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton"
                                         style="max-height:300px;overflow:scroll;">
                                        @foreach($classes as $class)
                                        <li><a class="dropdown-item" href="{{url('/instructor/change_class?student_id='.$st->student()->value('id').'&new_class_id='.$class->id)}}" >{{$class->name}}</a></li>
                                        <li class="dropdown-divider" 
                                            style="border:1px solid #eee;margin:5px 10px;"></li>
                                        @endforeach
                                      </div>
                                  </div>
                                @endif
                               </td>
                               <td>
                                   <a href="{{url('instructor/approval_student?class_id='.request('class_id').'&student_id='.$st->student()->value('id'))}}">Approval</a>
                               </td>
                        @if(request()->has('class_id') and !empty(request('class_id')))
                                 <td>
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
                            @endif
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
@endsection