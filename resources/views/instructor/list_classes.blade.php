@extends('instructor.layouts.head')    
@section('title','All Classes')
@section('maincontent')
<div class="tableClassList">
    <div class="container">

          @if(Session::has('success') and !empty(Session::get('success')))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>{{ Session::get('success') }}</strong>
                           <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                               <span aria-hidden="true">&times;</span>
                         </button>
                        </div> 
          @endif
            @if(Session::has('info') and !empty(Session::get('info')))
                        <div class="alert alert-info alert-dismissible fade show" role="alert">
                            <strong>{{ Session::get('info') }}</strong>
                           <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                               <span aria-hidden="true">&times;</span>
                         </button>
                        </div> 
          @endif

         <br>
        <h4> <i class="fas fa-book"></i> Classes Table 



            <a href="{{url('instructor/add_class')}}" class='btn btn-primary' style="float:right"> <i class="fas fa-plus"></i> Add Class</a>
        </h4>

        <br>
   
        <div class="" style="margin-top:-15px">
            <table class="table table-hover" id='example1'>
                <thead class="thead-dark">
                    <tr>
                        <th scope="col" style="">id</th>
                        <th scope="col" style="">Name</th>
                        <th scope="col" style="">Grade</th>
                        <th scope="col" style="">Day</th>
                        <th scope="col" style="">Duration</th>
                        <th scope="col" style="">lessons</th>
                        <th scope="col" style="">Students</th>
                        <th scope="col" style="">Settings</th>
                    </tr>
                </thead>
                <tbody style="background:#fff !important;">
                    @if($classes)
                    @foreach($classes as $class)
                    <tr class="cus_table">
                        <td scope="row" style="">{{$class->id}}</td>
                        <td style="">{{$class->name}}</td>
                        <td style="">
                            @if(!empty($class->grade_id))
                             {{get_student_grade($class->grade_id)}}
                            @endif
                        </td>
                        <td style="">
                            @foreach(getDaysClass($class->id) as $day)
                                <p>{{$day->day}}</p> <p>{{$day->time}}</p>
                            @endforeach
                        </td>                        
                        <td style="">{{$class->duration}}</td>
                        <td style="">
                          @if($class->count_lessons!=0)
                            <a href="{{route('lessons.index')}}?class_id={{$class->id}}" style="text-decoration:underline">{{$class->count_lessons}}</a>
                          @else
                             0
                         @endif
                        </td>
                        <td style="">
                          @if($class->count_students!=0)
                            <a href="{{url('instructor/students?class_id='.$class->id)}}" style="text-decoration:underline">{{$class->count_students}}</a>
                          @else
                             0
                         @endif
                        </td>

                        <td style="">
                              <a class="btn btn-success btn-xs"
                               href="{{url('instructor/edit_class?id='.$class->id)}}" 
                               style="padding:5px 10px !important">
                                <i class="fas fa-edit"></i>
                              </a>

                              <a href="" class="btn btn-danger btn-xs delete" title="delete"
                                    data-toggle="modal" data-target="#delete{{ $class->id }}"
                                     style="padding:5px 10px !important">
                                     <i class="fa fa-trash-o" style="font-size:18px"> </i> 
                                    </a>

                                      <!-- delete Modal start -->
                                      <div class="modal fade" id="delete{{$class->id}}" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
                                      <div class="modal-dialog" role="document">
                                        <div class="modal-content" style="background-color:#fff;">
                                        <div class="modal-header">
                                          <h5 class="modal-title" id="exampleSmallModalLabel">
                                            <i class="fa fa-trash-o"></i>  Delete Class</h5>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                           <span aria-hidden="true">&times;</span>
                                           </button>
                                        </div>
                                          <div class="modal-body">
                                             <br>
                                             <h4> Are you sure to delete  <b>{{$class->name}} class</b>...?</h4>
                                         </div>
                                         <div class="modal-footer">                   
                                            <button type="reset" class="btn btn-secondary" data-dismiss="modal">No</button>
                                            <a href="{{url('/instructor/del_class?id='.$class->id)}}"
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
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script>
    $(function () {
      $('#example1').DataTable({
      
               'ordering'    : false,


      })
    }) 
    
  </script>
@endsection
