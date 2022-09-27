@extends('instructor.layouts.head')        
@section('title','Create class')
@section('maincontent')
<div class="Become" style="margin: 30px 0;">
    <div class="container">
        <div class="formTe">
            <h4> Share Lesson </h4>
            
             @if ($errors->any())
                    <div class="alert alert-danger">
                      <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                      </ul>
                    </div>
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
                        <span type="text" class="form-control" >{{$lesson->name}}</span>
                    </div>
                    
                    <div class="form-group col-md-3 form1">
                        <label>Choose Class </label>
                    </div>
                    <div class="accordion col-md-9 form1" >
                        <select class="form-control select2 choosedClass" id="c_1" name="class_id[]" required >
                            @if($classes)
                                <option value="">Choose Class</option>
                                @foreach($classes as $class)
                                    <option value="{{$class->id}}">{{$class->name}}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                    
                    

                    

                </div>

                <div class="accordion col-md-12" >
                    <div class="form-group col-md-2 form1">
                        <i class="fa fa-plus add_new_class" aria-hidden="true" style="margin-top: 10px;cursor: pointer;"></i>
                    </div>
                     <br>
                    <button type="submit" class="btn btn-primary">Save Class</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script src="{{ url('js/add_class.js')}}"></script>
@endsection
