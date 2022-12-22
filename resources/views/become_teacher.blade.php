<style>
    
.file-placeholder {
  position: relative;
  cursor: pointer;

}

.file-placeholder input[type=file] {
  position: absolute;
  z-index: 3;
  top: 0;
  left: 0;
  width: 100%;
  max-width: 400px;
  height: 40px;
  opacity: 0;
}
.file-placeholder .file-browse {
  width: 100%;
  height: 40px;
  border: 1px solid #ccc;
}
.file-placeholder .file-browse .file-browse-txt {
  display: block;
  float: left;
  line-height: 40px;
  width: 85%;
  padding-left: 10px;
  overflow: hidden;
  text-overflow: ellipsis;
  white-space: nowrap;
}
.file-placeholder .file-browse .file-browse-txt.hasValue {
  background-color: #ededed;
}
.file-placeholder .file-browse .browse {
  display: block;
  float: left;
  width: 15%;
  background-color: #2668a7;
  color: #fff;
  height: 100%;
  line-height: 35px;
  padding: 0 10px;
  text-align: center
}
</style>
@extends('theme.master')
@section('title', 'Online Courses')
@section('content')
<br />
<br />
<br />
<div class="Become">
    <div class="overLayGlobal">
        <div class="overLayGlobalChild"></div>
        <div class="container">
            
            <div class="overLayGlobaleText">
                <h3>Title Page</h3>
                <div>
                    <a href="">Home</a>
                    <span></span>
                    <a>Title Page</a>
                </div>
            </div>

        </div>
    </div>
    <div class="container">
        <div class="formTe card shadow-sm w-75">
            <h4 class="text-center mb-5"> <img src="{{url('images/teacher.png')}}"> join our <span> team </span> </h4>
            @if(Session::has('success'))
            <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('success') }}</p>
            @endif
            <form class="signup-form" method="POST" action="{{ route('save_teacher') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-6 form1">
                        <input type="text" class="form-control {{ $errors->has('fname') ? ' is-invalid' : '' }}"
                            value="{{ old('fname') }}" id="inputEmail4" name="fname" placeholder="first name">
                        @if ($errors->has('fname'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('fname') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group col-md-6 form1">
                        <input type="text" class="form-control {{ $errors->has('lname') ? ' is-invalid' : '' }}"
                            value="{{ old('lname') }}" id="inputEmail4" name="lname" placeholder="last name">
                        @if ($errors->has('lname'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('lname') }}</strong>
                        </span>
                        @endif
                    </div>
                    <!-- begin subject -->
                    <div class="accordion col-md-5" id="accordionExample">
                        <div class="card">
                            <div class="card-header" id="headingOne1">
                                <h2 class="mb-0">
                                    <button id="hiddenSubjectBut"
                                        class="btn btn-link btn-block text-left {{ $errors->has('lname') ? ' is-invalid' : '' }}"
                                        type="button" data-toggle="collapse" data-target="#collapseOne1"
                                        aria-expanded="true" aria-controls="collapseOne1">
                                        subject
                                    </button>
                                    <input type="hidden" value="{{ old('subject') }}" name="subject" id="hiddenSubject">
                                    @if ($errors->has('subject'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('subject') }}</strong>
                                    </span>
                                    @endif
                                </h2>
                            </div>
                            <div id="collapseOne1" class="collapse" aria-labelledby="headingOne1"
                                data-parent="#accordionExample">
                                <span class="arow10"></span>
                                @if($subjects)
                                @foreach($subjects as $subject)
                                <div class="card-body"
                                    onclick="createValueInputSubject('{{$subject->title}}','{{$subject->id}}')">
                                    <span></span>{{$subject->title}}
                                </div>
                                @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                    <!-- end subject -->
                    <!-- begin grade -->
                    <div class="accordion col-md-5" id="gradeAccordion">
                        <div class="card">
                            <div class="card-header" id="gradeheading">
                                <h2 class="mb-0">
                                    <button id="hiddenGradetBut"
                                        class="btn btn-link btn-block text-left  {{ $errors->has('grade') ? ' is-invalid' : '' }}"
                                        type="button" data-toggle="collapse" data-target="#gradeCollapse"
                                        aria-expanded="true" aria-controls="gradeCollapse">
                                        grade
                                    </button>
                                    <input type="hidden" value="{{ old('grade')}}" name="grade" id="hiddenGrade">
                                    @if ($errors->has('grade'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('grade') }}</strong>
                                    </span>
                                    @endif
                                </h2>
                            </div>
                            <div id="gradeCollapse" class="collapse" aria-labelledby="gradeheading"
                                data-parent="#gradeAccordion">
                                <span class="arow10"></span>
                                @if($grades)
                                @foreach($grades as $grade)
                                <div class="card-body"
                                    onclick="createValueInputGrade('{{$grade->title}}','{{$grade->id}}')">
                                    <span></span>{{$grade->title}}
                                </div>
                                @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                    <!-- End grade -->
                    <div class="col-md-2">
                        <button class="btn btn-primary"> Add</button>
                        <button class="btn btn-danger"> Del</button>
                    </div>
                    <div class="form-group col-md-12 form4">
                        <input type="number" class="form-control {{ $errors->has('mobile') ? ' is-invalid' : '' }}"
                            name="mobile" value="{{ old('mobile') }}" id="inputAddress" placeholder="mobile">
                        @if($errors->has('mobile'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('mobile') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group col-md-12 form6">
                        <input type="text" class="form-control {{ $errors->has('governorate') ? ' is-invalid' : '' }}"
                            name="governorate" value="{{ old('governorate') }}" id="inputAddress2"
                            placeholder="governorate">
                        @if($errors->has('governorate'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('governorate') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group col-md-12">
                        <input type="text" class="form-control {{ $errors->has('city') ? ' is-invalid' : '' }}"
                            name="city" value="{{ old('city') }}" id="inputCity" placeholder="City">
                        @if($errors->has('city'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('city') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group col-md-12">
                        <input type="email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}"
                            name="email" value="{{ old('email') }}" id="inputCity" placeholder="email">
                        @if($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group col-md-12">
                        <input type="password" class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}"
                            name="password" value="{{ old('password') }}" id="inputPassword" placeholder="password">
                        @if($errors->has('password'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group col-md-12">
                        <div class="file-placeholder">
                            <!-- <label></label> -->
                            <input type="file" class="{{ $errors->has('image') ? ' is-invalid' : '' }}" name="image"
                                value="{{ old('image') }}" name="image">
                            @if($errors->has('image'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('image') }}</strong>
                            </span>
                            @endif
                            <div class="file-browse">
                                <span class="file-browse-txt">Select files </span>
                                <span class="browse">Browse</span>

                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-12">
                        <textarea class="form-control" rows="5" name="detail"
                            placeholder="massage">{{old('detail')}}</textarea>
                    </div>
                </div>
                <div class="text-right">
                    <button type="submit" class="form10">submit</button>
                </div>
            </form>
        </div>
    </div>
    @endsection
    @section('scripts')
        <script>
        $('.info__btn').click(function() {
            $(this).parent().prev().remove();
        })
        </script>
    @endsection