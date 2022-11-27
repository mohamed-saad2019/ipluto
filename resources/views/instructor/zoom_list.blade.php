@extends('instructor.layouts.head')    
@section('title','Zoom List')

@if(Auth::User()->role == "instructor")



@section('maincontent')
         

             <div class="Become">
              <div class="formTe">
               <div class="table-responsive">
                      
                         <table class="table table-hover" id='example1'>
                            <thead class="thead-dark">
                              <th scope="col">#</th>
                              <th scope="col">Class</th>
                              <th scope="col">Zomm Link</th>
                              <th scope="col">Code</th>
                              <th scope="col">Start Time</th>
                              <th scope="col">Created At</th>
                            </tr>
                          </thead>
                          <tbody style="background:#fff !important;">

                           
                            @foreach($zoom as $z)
                             <tr>
                              <td>{{++$sum}}</td>
                              <td>{{$z->name}}</td>
                              <td>{{$z->url}}</td>
                              <td>{{$z->code}}</td>
                              <td>{{$z->start_time}}</td>
                              <td>{{$z->created_at}}</td>
                             </tr>
                            @endforeach
                           

                          
                          </tbody>
                        </table>

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