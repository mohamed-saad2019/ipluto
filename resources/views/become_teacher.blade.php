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
.select2-container--default .select2-selection--multiple .select2-selection__rendered{
    padding: 7px 5px !important
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
            <p class="alert  alert-success">{{ Session::get('success') }}</p>
            @endif
            @if(Session::has('error'))
            <p class="alert  alert-danger">{{ Session::get('error') }}</p>
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
                  
                    <div class="col-md-12">
                        <div class="row" id="becomeTeacher__wrapper">
                            <!-- begin subject -->
                            <div class="accordion col-md-6 " id="accordionExample">
                                <select class="form-control selectSubjects" name="subject[]" required>
                                        <option value="">Select Subject</option>
                                    @if($subjects)
                                        @foreach($subjects as $subject)
                                        <option value="{{$subject->id}}">{{$subject->title}}</option>
                                        @endforeach
                                    @endif
                                </select>
                                @if ($errors->has('subject'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('subject') }}</strong>
                                </span>
                                @endif
                            </div>
                            <!-- end subject -->
                            <!-- begin grade -->
                            <div class="accordion col-md-6" id="gradeAccordion">
                            <select class="form-control select3 selectGrades" multiple="multiple" name="grade_0[]" required>
                                @if($subjects)
                                    @foreach($grades as $grade)
                                        <option value="{{$grade->id}}">{{$grade->title}}</option>
                                    @endforeach
                                @endif
                            </select>
                            </div>
                            <!-- End grade -->
                        </div>
                    </div>

                    <div class="col-md-12">
                         <div class="text-right mb-3">
                           <button type="button" class="btn btn-primary add_more" title="add new subject and grade row"> <i class="fa fa-plus"></i></button>
                           <button type="button" class="btn btn-danger del_buttonEn" title="delete last subject and grade "> <i class="fa fa-trash"></i></button>
                         </div>
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
                    <div class="form-group col-md-12 form4">
                        <input type="number" class="form-control {{ $errors->has('mobile') ? ' is-invalid' : '' }}"
                            name="mobile" value="{{ old('mobile') }}" id="inputAddress" placeholder="mobile">
                        @if($errors->has('mobile'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('mobile') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group col-md-5">
                        <input type="password" class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}"
                            name="password" value="{{ old('password') }}" id="passInput" placeholder="password">
                        @if($errors->has('password'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                        @endif
                         <small id="emailHelp" class="form-text text-muted">The password must be at least 6 characters long</small>
                    </div>
                    <div class="form-group col-md-1">
                       <i class="fa fa-eye" id="showPass" style="margin-top:10px;cursor: pointer;"></i>
                    </div>
                    <div class="form-group col-md-5">
                        <input type="password" class="form-control {{ $errors->has('confirm_password') ? ' is-invalid' : '' }}" name="confirm_password" value="{{ old('confirm_password') }}" id="passInput1" placeholder="confirm password">
                        @if($errors->has('confirm_password'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('confirm_password') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group col-md-1">
                       <i class="fa fa-eye" id="showPass1" style="margin-top:10px;cursor: pointer;"></i>
                    </div>
                    <div class="form-group col-md-12 form6">
                     <select class="form-control {{ $errors->has('governorate') ? ' is-invalid' : '' }} " name="governorate"  id="govern" required>
                            <option value="">governorate</option>
                              @foreach(getGovern(64) as $govern)
                                <option value="{{$govern->id}}">{{$govern->name}}</option>
                              @endforeach
                          </select>

                        @if($errors->has('governorate'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('governorate') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group col-md-12">
                        <select id="city" class="form-control {{ $errors->has('city') ? ' is-invalid' : '' }}" name="city">
                            <option value="">City</option>
                         </select>
                        @if($errors->has('city'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('city') }}</strong>
                        </span>
                        @endif
                    </div>

                     <div class="form-group col-md-12">
                      <textarea name="address" rows="2" class="form-control {{ $errors->has('address') ? ' is-invalid' : '' }}"
                        placeholder="{{ __('adminstaticword.Enter') }} address"></textarea>
                     </div>
                 
                    <div class="form-group col-md-12">
                            <label> Select Your Profile </label>
                            <input type="file" class="{{ $errors->has('image') ? ' is-invalid' : '' }}" name="image"  value="{{ old('image') }}" name="image" style="border:1px solid #ddd;width:100%;">
                            <small class="form-text text-muted">Recommended size (1375 x 409px) and type (jpg,jpeg,png,tiff)</small>
                            @if($errors->has('image'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('image') }}</strong>
                            </span>
                            @endif
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
@section('custom-script')

    <script type="text/javascript">
        $(".select3").select2({
            placeholder: "Select Grade",
            allowClear: true
        });


     $("#govern").change(function(){
              jQuery.ajax({
                    type: "GET",
                    url: "/admin/select2/city",
                    data: {
                      _token: "{{ csrf_token() }}",
                       govern:$("#govern").val()
                    },
                    success: function (data) {
                      $("#city").html(data);
                       // alert('error');
                    },
                    error: function()
                    {
                        // alert('error');
                    }
                }); 
         });
    
       $('#showPass').on('click', function(){
              var passInput=$("#passInput");
              if(passInput.attr('type')==='password')
                {
                  passInput.attr('type','text');
              }else{
                 passInput.attr('type','password');
              }
          })

        $('#showPass1').on('click', function(){
              var passInput=$("#passInput1");
              if(passInput.attr('type')==='password')
                {
                  passInput.attr('type','text');
              }else{
                 passInput.attr('type','password');
              }
          })
         $('form input').focus(function(){
           $(this).siblings(".invalid-feedback").hide(); 
           $(this).removeClass('is-invalid');
         });
         $('form select').change(function(){
           if($(this).attr('value') != "")
           {
            $(this).siblings(".invalid-feedback").hide(); 
            $(this).removeClass('is-invalid');
           }
         });
    </script>
@endsection