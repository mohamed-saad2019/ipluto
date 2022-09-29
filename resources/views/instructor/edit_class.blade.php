@extends('instructor.layouts.head')    
@section('title','Edit class')
@section('maincontent')
<div class="Become" style="margin: 30px 0;">
    <div class="container">
        <div class="formTe">
            <h4> Edit <span> classes </span> </h4>
            
             @if ($errors->any())
                    <div class="alert alert-danger">
                      <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                      </ul>
                    </div>
            @endif

           
            <form method="post" action="{{url('instructor/update_class/'.request('id'))}}">
                {{ csrf_field() }}
                {{ method_field('post') }}
                <div class="form-row">
                    <div class="form-group col-md-6 form1">
                        <input type="text" value="{{$class->name}}" class="form-control" name="name" id="inputEmail4" placeholder="Name" required>
                         @if ($errors->has('name'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('students') }}</strong>
                                </span>
                            @endif
                    </div>
                    <div class="accordion col-md-6 form1" >
                        <select class="form-control select2" name="grade_id" required >
                            @if($grades)
                                @foreach($grades as $grade)
                                    <option value="{{$grade->id}}"
                                        @if($class->grade_id == $grade->id) selected @endif
                                        >{{$grade->title}}</option>
                                @endforeach
                            @endif
                        </select>
                      
                    </div>

                  <?php $i = 1; ?>
                @foreach($days as $day)
                    <div class="accordion col-md-6 {{$day->id}}" >
                      <div class="card " style="margin-bottom:17px">
                        <select class="form-control select2" name="day[]">
                    <option value="Saturday" @if($day->day=='Saturday'){{'selected'}}@endif>Saturday</option>
                    <option value="Sunday" @if($day->day=='Sunday'){{'selected'}}@endif>Sunday</option>
                    <option value="Monday" @if($day->day=='Monday'){{'selected'}}@endif>Monday</option>
                    <option value="Tuesday" @if($day->day=='Tuesday'){{'selected'}}@endif>Tuesday</option>
                   <option value="Wednesday" @if($day->day=='Wednesday'){{'selected'}}@endif>Wednesday</option>
                    <option value="Thursday" @if($day->day=='Thursday'){{'selected'}}@endif>Thursday</option>
                    <option value="Friday" @if($day->day=='Friday'){{'selected'}}@endif>Friday</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group col-md-4 form1 {{$day->id}}">
                        <input type="time" class="form-control" placeholder="Time" name="time[]" 
                        value="{{$day->time}}" required>
                    </div>
                  @if($i== 1)
                        <div class="form-group col-md-2 form1">
                        <i class="fa fa-plus add_day" aria-hidden="true" style="margin-top: 10px;cursor: pointer;"></i>
                       </div>
                  @else
                    <i class="fa fa-trash" id="{{$day->id}}" style="padding:17px 10px;color:red;display:block;font-size:22px;cursor: pointer"></i>

                  @endif

                       <?php $i++; ?>


                @endforeach
                    
                    <div class="accordion col-md-6 add_new_day">

                    </div>
                    <div class="form-group col-md-4 form1 add_time">
                        
                    </div>

                    <div class="form-group col-md-2 form1 delete_record">
                       
                    </div>

                    <div class="accordion col-md-12" id="accordionExampleHours">
                        <div class="card">
                            <div class="card-header" id="headingOneHours">
                                <h2 class="mb-0">
                                  
                            <input type="number" value="{{$class->duration}}" class="form-control" 
                                   step="any" name="duration" required placeholder="Duration">
                                </h2>
                            </div>
                            
                        </div>
                    </div>

                    <div class="accordion col-md-12" >
                        <br>
                        <label>Students </label>
                        <select class="form-control select2"  multiple name="students[]"  >
                            @if($grades)
                                @foreach($students as $student)
                                    <option value="{{$student->id}}"
                                        @if(!empty($class_st) and in_array($student->id, $class_st)) selected @endif>
                                        {{$student->fname}} {{$student->lname}}
                                    </option>
                                @endforeach
                            @endif
                        </select>
                         @if ($errors->has('students'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('students') }}</strong>
                                </span>
                            @endif
                    </div>

                </div>

                <div class="accordion col-md-12" >
                     <br>
                    <button type="submit" class="btn btn-primary">Edit Class</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script src="{{ url('js/custom-js.js')}}"></script>
<script src="{{ url('js/add_class.js')}}"></script>
@endsection
