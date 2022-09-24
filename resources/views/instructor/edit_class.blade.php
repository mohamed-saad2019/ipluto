@extends('instructor.layouts.head')    
@section('title','Edit class')
@section('maincontent')
<div class="Become" style="margin: 30px 0;">
    <div class="container">
        <div class="formTe">
            <h4> Create <span> classes </span> </h4>
            
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

                @foreach($days as $day)
                    <div class="accordion col-md-6" id="accordionExampleDay">
                        <div class="card">
                            <div class="card-header" id="headingOneDay">
                                <h2 class="mb-0">
                                    <button id="hiddenDayButClasses"
                                        class="btn btn-link btn-block text-left" type="button"
                                        data-toggle="collapse" data-target="#collapseOneDay"
                                        aria-expanded="true" aria-controls="collapseOneDay">
                                        {{$day->day}}
                                    </button>
                                    <input type="hidden" id="hiddenDayClasses" name="day[]" required
                                    value="{{$day->day}}">
                                </h2>
                            </div>
                            <div id="collapseOneDay" class="collapse" aria-labelledby="headingOneDay"
                                data-parent="#accordionExampleDay">
                                <span class="arow10"></span>
                                <div class="card-body" onclick="createValueInputDayClasses('Saturday')">
                                    <span></span>Saturday
                                </div>
                                <div class="card-body" onclick="createValueInputDayClasses('Sunday')">
                                    <span></span>Sunday
                                </div>
                                <div class="card-body" onclick="createValueInputDayClasses('Monday')">
                                    <span></span>Monday
                                </div>
                                <div class="card-body" onclick="createValueInputDayClasses('Tuesday')">
                                    <span></span>Tuesday
                                </div>
                                <div class="card-body" onclick="createValueInputDayClasses('Wednesday')">
                                    <span></span>Wednesday
                                </div>
                                <div class="card-body" onclick="createValueInputDayClasses('Thursday')">
                                    <span></span>Thursday
                                </div>
                                <div class="card-body" onclick="createValueInputDayClasses('Friday')">
                                    <span></span>Friday
                                </div>
                            </div>
                        </div>                       
                    </div>
                    <div class="form-group col-md-4 form1">
                        <input type="time" class="form-control" placeholder="Time" name="time[]" 
                        value="{{$day->time}}" required>
                    </div>
                @endforeach
                    <div class="form-group col-md-2 form1">
                        <i class="fa fa-plus add_day" aria-hidden="true" style="margin-top: 10px;cursor: pointer;"></i>
                    </div>
                    <div class="accordion col-md-6 add_new_day">

                    </div>
                    <div class="form-group col-md-4 form1 add_time">
                        
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
<script src="{{ url('js/custom-js.js')}}"></script>


@endsection


