@extends('instructor.layouts.head')    
@section('title','All Lessons')
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
        <h4> <i class="fas fa-book"></i> Shared Lesson In Class ({{$class->name}})</h4>

        <br>
   
        <div class="table-responsive" style="margin-top:-15px">
            <table class="table table-hover" id='example1'>
                <thead class="thead-dark">
                    <tr>
                        <th scope="col" style="">id</th>
                        <th scope="col" style="">Lesson Name</th>
                        <th scope="col" style="">Unit</th>
                        <th scope="col" style="">Size</th>
                        <th scope="col" style="">Status</th>
                    </tr>
                </thead>
                <tbody style="background:#fff !important;">
                    @if($lessons)
                    @foreach($lessons as $lesson)
                            @php 
                              $lesson_share = \App\ShareLessons::where('class_id',$class->id)->where('lesson_id',$lesson->id)->first();
                            @endphp
                          @if($lesson_share)
                            <tr class="cus_table">
                                <td scope="row"><a href="{{route('instructor.add_lesson')}}?id={{$lesson->id}}"> {{$lesson->id}} </a></td>
                                <td style="">{{$lesson->name}}</td>
                                <td style="">{{$lesson->unit}}</td>
                                <td style="">{{$lesson->size}}</td>
                                <td style="">
                                      <label class="switch">
                                           <input class="user" type="checkbox"  data-class_id="{{$lesson_share->class_id}}" data-lesson_id="{{$lesson_share->lesson_id}}" name="status" {{ $lesson_share->status == '1' ? 'checked' : '' }}> 
                                           <span class="knob"></span>
                                     </label>
                              </td>
                            </tr>
                          @endif
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

<script type="text/javascript">
    $(document).on("change",".user",function() {
        
        $.ajax({
            type: "GET",
            dataType: "json",
            url: "{{url('instructor/status_share_lesson')}}",
            data: {'class_id': $(this).data('class_id'),'lesson_id': $(this).data('lesson_id')},
            success: function(data){
                // alert('{{request("class_id")}}');
            },
            error: function(data){
                // alert('class_id');
            }
        });
    })
</script>
@endsection
