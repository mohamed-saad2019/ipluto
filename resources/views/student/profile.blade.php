@extends('student.layouts.head')        
@section('title','Home')
@section('select_subject') 
        @include('student.partial.select_subject')
@endsection
@section('maincontent') 

    <div class="Page__content">
      <div class="student__dashbord">
        <div class="container">
           @if(Session::has('info') and !empty(Session::get('info')))
                       <br>
                        <div class="alert alert-info alert-dismissible fade show" role="alert">
                            <strong>{{ Session::get('info') }}</strong>
                           <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                               <span aria-hidden="true">&times;</span>
                         </button>
                        </div> 
           @elseif(Session::has('error') and !empty(Session::get('error')))
                       <br>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>{{ Session::get('error') }}</strong>
                           <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                               <span aria-hidden="true">&times;</span>
                         </button>
                        </div> 
           @endif
          <div class="row">
            <div class="col-md-4">
              <a class='' href="#">
                  <div class="student_dashbord_card text-center">
                  <h3 class="h4 card__header text-capitalize">Assessment</h3>
                  <div class="card-content">
                    <img src="./images/Profile/Layer 32.png" class="img-fluid" alt="" srcset="">
                  </div>
                </div>
              </a>
            </div>
            <div class="col-md-4">
               <a class='grids' href="{{url('student/show_subject_videos?subject_id='.request('subject_id').'&class_id='.request('class_id').'&instructor_id='.request('instructor_id').'&data='.request('data'))}}">
                  <div class="student_dashbord_card text-center">
                  <h3 class="h4 card__header text-capitalize">Videos</h3>
                  <div class="card-content">
                    <img src="./images/Profile/Layer 32.png" class="img-fluid" alt="" srcset="">
                  </div>
                </div>
              </a>
            </div>
            <div class="col-md-4">
             
              
             <a class='' href="{{route('student.livesession')}}">
                  <div class="student_dashbord_card text-center">
                  <h3 class="h4 card__header text-capitalize">Live Session</h3>
                  <div class="card-content">
                    <img src="./images/Profile/Layer 32.png" class="img-fluid" alt="" srcset="">
                  </div>
                </div>
              </a>
            </div>
            <div class="col-md-4">
             <a class='grids' href="{{url('/student/lessons?subject_id='.request('subject_id').'&class_id='.request('class_id').'&instructor_id='.request('instructor_id').'&data='.request('data'))}}">
                  <div class="student_dashbord_card text-center">
                  <h3 class="h4 card__header text-capitalize"> Lesson Materials</h3>
                  <div class="card-content">
                    <img src="./images/Profile/Layer 32.png" class="img-fluid" alt="" srcset="">
                  </div>
                </div>
              </a>
            </div>
            <div class="col-md-4">
              <a class='' href="#">
                  <div class="student_dashbord_card text-center">
                  <h3 class="h4 card__header text-capitalize">Reports</h3>
                  <div class="card-content">
                    <img src="./images/Profile/Layer 32.png" class="img-fluid" alt="" srcset="">
                  </div>
                </div>
              </a>
          </div>
        </div>
      </div>
    </div>



<!-- start Modal HTML for choose your subject  -->
<div class="modal fade" id="del_show_empty" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="width:350px !important">
        <div>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true" 
                  style="font-size:40px !important;margin-right:-100px !important;color:#fff;">×</span>
             </button>
        </div>
      <div class="modal-body" style="margin:0px 10px;margin-top:-20px;">
      
        <div class="row">
              <div class="col-md-12">
                <h6 id="slide_del_msg">
                </h6>
              </div>
             
            </div>
      </div>
     <div class="modal-footer" >
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <a style="display:none" 
        href="" class="btn btn-danger insure_del">Delete</a>

      </div>
    </div>
  </div>
</div>
<!-- end Modal HTML for delete -->


<!-- start Modal choose subject  -->
<div class="modal fade" id="chooes_sub" tabindex="-1" role="dialog"  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="width:450px !important">
        <div>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true" 
                  style="font-size:40px !important;margin-right:-100px !important;color:#fff;">×</span>
             </button>
        </div>
      <div class="modal-body" style="margin:0px 10px;margin-top:-20px;">
      
        <div class="row">
              <div class="col-md-12">
                <h4 id="">
                 Please choose your subject first
                </h4>
              </div>
             
            </div>
      </div>
     <div class="modal-footer" >
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>
<!-- start Modal choose subject  -->

@endsection

 @section('scripts')

       @if(!request()->has('subject_id') or empty(request('subject_id')))
       
        <script type="text/javascript">
          $(document).ready(function () {
              $('.grids').click(function() {
                  $('#chooes_sub').modal('show'); 
                   return false;
              });
          });
        </script>
       @endif

@endsection

