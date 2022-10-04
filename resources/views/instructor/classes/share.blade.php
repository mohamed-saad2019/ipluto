@extends('instructor.layouts.head')
@section('title','Share the lessons')
@section('maincontent')
<div class=" ">
    <div class="custom-container">
        <div class="formTe bg-white">
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
            <div class="shareLesson mt-5">
                <div class="container bg-white rounded py-4">
                    <h4 class="h4 text-primary"> Share the lessons </h4>
                    <form method="post" action="{{route('saveShare')}}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{ method_field('post') }}
                        <!-- begin Lesson Name -->
                        <div class="form-group row">
                            <label for="lessonName" class="col-md-3 col-form-label">Lesson Name</label>
                            <div class="col-sm-9 d-flex align-content-center">
                                <span> {{$lesson->name}} </span>
                                <input type="hidden" id="lesson_id" value="{{$lesson->id}}" class="form-control" name="lesson_id">
                            </div>
                        </div>
                        <!-- End Lesson Name -->
                        <div id="all_classes">
                        @if(count($share) > 0)
                            @foreach($classes as $class)
                                @if(count($class->sharelesson) > 0)
                                <div class="shadow rounded p-3" id="main_{{$class->id}}">
                                    <div class="chooseClass">
                                            <div class="form-group row">
                                                <label for="lessonName" class="col-md-3 col-form-label">Choose Class</label>
                                                <div class="col-md-7">
                                                    <select class="form-control choosedClass" id="{{$class->id}}" required>
                                                    @if($classes)
                                                        <option value="">Choose Class</option>
                                                        @foreach($classes as $_class)
                                                        @if(count($_class->sharelesson) > 0)
                                                        @foreach($_class->sharelesson as $_sh)
                                                        @if($class->id == $_sh->class_id)
                                                        <option value="{{$_class->id}}" selected="selected">{{$_class->name}}</option>
                                                        @break
                                                        @endif
                                                        @endforeach
                                                        @else
                                                        <option value="{{$_class->id}}">{{$_class->name}}</option>
                                                        @endif
                                                        @endforeach
                                                    @endif
                                                    </select>
                                                </div>
                                                <div class=" col-md-2">
                                                    <div class="lessonBtn">
                                                        <i class="fa fa-eye mr-2 show" status="1" id="{{$class->id}}" style="cursor: pointer" aria-hidden="true"></i>
                                                        <i class="fa fa-minus deleteDivClass" id="{{$class->id}}" style="cursor: pointer" aria-hidden="true"></i>
                                                    </div>
                                                </div>
                                        </div>
                                    </div>
                                    <div class="students_{{$class->id}}">
                                        <div class="form-group row w-100 d-flex">
                                            <label for="lessonName" class="col-md-3 col-form-label">Students</label>
                                            <div class="col-sm-9" id="student_{{$class->id}}">
                                            <select class="form-control select2" multiple name="class_students[]" required>
                                                @foreach(
                                                \App\ClassesStudent::with('student')->where([['class_id',$class->id],['teacher_id' ,
                                                auth()->user()->id ]])->get() as $c_student)
                                                @php ($data = [])
                                                @foreach( $class->sharelesson as $share_student)
                                                @if($c_student->student->id == $share_student->student->id )
                                                {{$data[]=$share_student->student->id}}
                                                <option value="{{$class->id}}_{{$c_student->student->id}}" selected="selected">
                                                    {{$c_student->student->fname}} {{$c_student->student->lname}} </option>
                                                @break
                                                @endif
                                                @endforeach
                                                @if(!in_array( $c_student->student->id, $data))
                                                <option value="{{$class->id}}_{{$c_student->student->id}}">
                                                    {{$c_student->student->fname}} {{$c_student->student->lname}} </option>
                                                @endif
                                                @endforeach
                                            </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endif
                            @endforeach
                        @else
                        <div class="shadow rounded p-3" id="main_1">
                            <div class="chooseClass">
                                    <div class="form-group row">
                                        <label for="lessonName" class="col-md-3 col-form-label">Choose Class</label>
                                        <div class="col-md-7">
                                            <select class="form-control choosedClass" id="1">
                                            @if($classes)
                                                <option value="">Choose Class</option>
                                                @foreach($classes as $class)
                                                <option value="{{$class->id}}">{{$class->name}}</option>
                                                @endforeach
                                            @endif
                                            </select>
                                        </div>
                                        <div class=" col-md-2">
                                            <div class="lessonBtn">
                                                <i class="fa fa-eye mr-2 show" status="1" id="1" style="cursor: pointer" aria-hidden="true"></i>
                                                <i class="fa fa-minus deleteDivClass" id="1" style="cursor: pointer" aria-hidden="true"></i>
                                            </div>
                                        </div>
                                </div>
                            </div>
                            <div class="students_1" style="display:none;">
                                <div class="form-group row w-100 d-flex">
                                    <label for="lessonName" class="col-md-3 col-form-label">Students</label>
                                    <div class="col-sm-9" id="student_1">
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                        </div>
                        <div class="col-md-12 mt-5">
                            <div class="accordion d-flex justify-content-between">
                                <i class="fa fa-plus add_new_class" aria-hidden="true"
                                    style="margin-top: 10px;cursor: pointer;"></i>
                                <button type="submit" class="btn btn-primary">Save Share</button>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>






@endsection

@section('scripts')
<script src="{{ url('js/add_class.js')}}"></script>
@endsection