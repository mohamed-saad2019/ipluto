@extends('instructor.layouts.head')        
@section('title','Share the lessons')
@section('maincontent')
<div class="Become" style="margin: 30px 0;">
    <div class="container">
        <div class="formTe">
            <h4> Share the lessons </h4>
            
             @if ($errors->any())
                    <div class="alert alert-danger">
                      <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                      </ul>
                    </div>
            @endif
            @if(Session::has('success'))
            <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('success') }}</p>
            @endif
           
            <form method="post" action="{{route('saveShare')}}" enctype="multipart/form-data">
                {{ csrf_field() }}
                {{ method_field('post') }}
                <div class="form-row" id="shareLesson">
                    <div class="form-group col-md-3 form1">
                        <label>Lesson Name </label>
                    </div>
                    <div class="form-group col-md-9 form1">
                        <input type="hidden" type="text" id="lesson_id" value="{{$lesson->id}}" class="form-control" name="lesson_id">
                        {{$lesson->name}}
                    </div>

                    @if(count($share) > 0)
                        @foreach($classes as $class)
                            @if(count($class->sharelesson) > 0)
                            <div class="form-group col-md-3 form1">
                                <label>Choose Class </label>
                            </div>
                            <div class="accordion col-md-9 form1" >
                                <select class=" choosedClass" id="c_{{$class->id}}" name="class_id[]" required >
                                        <option value="">Choose Class</option>
                                        @foreach($classes as $_class)
                                            @if(count($_class->sharelesson) > 0)
                                                @foreach($_class->sharelesson as  $_sh)
                                                    @if($class->id ==  $_sh->class_id) 
                                                    <option value="{{$_class->id}}" selected="selected"  >{{$_class->name}}</option>
                                                    @break
                                                    @endif
                                                @endforeach
                                            @else
                                            <option value="{{$_class->id}}" >{{$_class->name}}</option>
                                            @endif
                                        @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-3 student_{{$class->id}}">
                                <label>Students </label>
                            </div>
                            <div class="form-group col-md-9 form1 student_{{$class->id}}" >
                                <select class="form-control select2"  multiple name="class_students[]" required>
                                    @foreach( \App\ClassesStudent::with('student')->where([['class_id',$class->id],['teacher_id' , auth()->user()->id ]])->get() as  $c_student)
                                        {{$data=array()}}
                                        @foreach( $class->sharelesson as  $share_student)
                                            @if($c_student->student->id ==  $share_student->student->id ) 
                                            {{$data[]=$share_student->student->id}}
                                            <option value="{{$class->id}}_{{$c_student->student->id}}" selected="selected">{{$c_student->student->fname}} {{$c_student->student->lname}} </option>
                                            @break
                                            @endif
                                        @endforeach
                                        @if(!in_array( $c_student->student->id, $data))
                                        <option value="{{$class->id}}_{{$c_student->student->id}}">{{$c_student->student->fname}} {{$c_student->student->lname}} </option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            @endif

                        @endforeach
                    @else
                    <div class="form-group col-md-3 form1">
                        <label>Choose Class </label>
                    </div>
                    <div class="accordion col-md-9 form1" >
                        <select class="form-control select2 choosedClass" id="c_1" name="class_id[]" required >
                            @if($classes)
                                <option value="">Choose Class</option>
                                @foreach($classes as $class)
                                    <option value="{{$class->id}}" >{{$class->name}}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                    @endif
                    
                    

                </div>

                <div class="accordion col-md-12" >
                    <div class="form-group col-md-2 form1">
                        <i class="fa fa-plus add_new_class" aria-hidden="true" style="margin-top: 10px;cursor: pointer;"></i>
                    </div>
                     <br>
                    <button type="submit" class="btn btn-primary">Save Share</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script src="{{ url('js/add_class.js')}}"></script>
@endsection
