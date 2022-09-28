@extends('instructor.layouts.head')    
@section('title','myLessons')

@if(Auth::User()->role == "instructor")

@section('maincontent')
  <div class="Mylesson" style="padding:0px">
        <div class="container">
          <div class="courses">
            <div class="row">
              <div class="col-md-12">
                   <a href="{{url()->previous()}}" class="float-right btn btn-primary-rgba mr-2">
                            <i class="feather icon-arrow-left mr-2"></i>Back
                   </a> 
              </div>
            </div>

          <div class="row">
            <div class="col-md-4">
             <form>
              <select class="select2 form-control" style="border:1px solid #ddd;color:#000;" name="grade"
              id='four'>
                <option selected value="">Grade</option>
                @foreach($grades as $s)
                  <option value="{{$s->id}}" @if($s->id == $grade) {{'selected'}}@endif>{{$s->title}}</option>
                @endforeach
              </select>
              </div>
                
               <div class="col-md-4">
               <select class="select2 one form-control" data-placeholder="Uint" name='unit[]'
                       id='three' multiple="multiple" style="padding: 0px;">
                @foreach($all_units as $s)
                  <option value="{{$s}}" 
                   @if(!empty($units) and in_array($s,$units)) {{'selected'}}@endif>{{$s}}
                  </option>
                @endforeach      
               </select>
              </div>

              <div class="col-md-2">
                <button type="submit" class="btn btn-primary"><i class="fas fa-filter"></i> Filter</button>
                </form>
              </div>

            </form>
          </div>
          <br>
          <div class="row">
              @if(count($videos) > 0)
              @foreach ($videos as $v)
              <div class="col-12 col-md-6 col-lg-4">
                <form action="{{url('instructor/add_viedo_to_lesson').'/'.request('id')}}" 
                      method="post" enctype="multipart/form-data">
                {{ csrf_field() }} 
                <!-- Modal -->
                <div class="modal fade" id="exampleModal{{$v->id}}" tabindex="-1" aria-labelledby="exampleModalLabel"
                  aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <video id="video1" controls>
                      </video>
                    </div>
                  </div>
                </div>
                <!-- Modal -->
                <div class="course">
                  <div class="courseHead">
                    <div class="courseHeadLeft">
                      <img src="./../image/logo.png" />
                      <div>
                        <h5>{{$v->title}}</h5>
                      </div>
                    </div>
                    <input type="checkbox" name="videos[]" value="{{$v->path_video}}">
                  </div>
                  <video id="{{$v->id}}" poster="{{ url('storage/vedioTeachrBackground/'.$v->path_background) }}">
                    <source src="./../vedioTeachr/vedio1.webm" type="video/webm" />
                    <source src="{{ url('storage/vedioTeachr/'.$v->path_video) }}" type="video/mp4" />
                  </video>
                  <div class="overlayCourse">
                    <i class="fas fa-play" data-toggle="modal" data-target="#exampleModal{{$v->id}}"></i>
                    <p>5:25</p>
                  </div>
                </div>
              </div>
              @endforeach
              
            </div>
            <div class="pagiOldQuez">
               <center><button  class="btn btn-primary" type="submit" 
                 style="margin-top:10px;font-size:17px;" > Save & Exit</button></center>
              </form>
          @endif

              <!-- <nav aria-label="Page navigation example">
                <ul class="pagination">
                  <li class="page-item">
                    <a class="page-link" href="#" aria-label="Previous">
                      <span aria-hidden="true">&laquo;</span>
                      <span class="sr-only">Previous</span>
                    </a>
                  </li>
                  <li class="page-item">
                    <a class="page-link" href="#">1</a>
                  </li>
                  <li class="page-item">
                    <a class="page-link" href="#">2</a>
                  </li>
                  <li class="page-item">
                    <a class="page-link" href="#">3</a>
                  </li>
                  <li class="page-item">
                    <a class="page-link" href="#" aria-label="Next">
                      <span aria-hidden="true">&raquo;</span>
                      <span class="sr-only">Next</span>
                    </a>
                  </li>
                </ul>
              </nav> -->
            </div>
          </div>
        </div>
      </div>
@endsection

@section('scripts')

@endsection
@endif

