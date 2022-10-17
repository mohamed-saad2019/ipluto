@extends('student.layouts.head')    
@section('title', ' Lessons Materials ( ' . get_name_subject(request('subject_id')) .' ) ')
@section('select_subject') 
        @include('student.partial.select_subject')
@endsection
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
       

        <br>
   
        
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
