@extends('instructor.layouts.head')    
@section('title','Add Students')

@if(Auth::User()->role == "instructor")



@section('maincontent')
            <div class="Become" style="margin: 10px 0;">
                <div class="container">
                    <div class="formTe">
                        <h4> Add <span> Students({{request('type')}})</span>
                            <div class="widgetbar" style="float:right;margin-top:-8px">
                                    <a href="{{url('instructor/students')}}" class="float-right btn btn-primary-rgba mr-2"><i
                                        class="feather icon-arrow-left mr-2"></i>Back</a> 
                            </div>
                        </h4>

                      
                      @if(request('type')=='online')


                       <form action="{{url('instructor/save_student')}}" method="get"
                       style="margin-top:15px;border:1px solid #ddd; padding:10px;"><br>
                            <div class="form-row">
                                <div class="form-group col-md-10 form1">
                                    <input type="text" class="form-control" id="" 
                            placeholder="Enter the student code" name="code" style="border:1px solid #ddd !important;" required>
                                </div>
                                <div class="form-group col-md-2 form1">
                                    <input type="submit" class="btn btn-primary" value="Add student">
                                </div>
                            </div>
                        </form>
                     @endif

                    @if(request('type')=='pluck')
                    @if(Session::has('adding') and !empty(Session::get('adding')))
                        <p class="alert alert-info">Number of students added : 
                            {{ Session::get('adding') }}
                        </p>
                    @endif
                      @if(Session::has('not_adding') and !empty(Session::get('not_adding')))
                        <p class="alert alert-danger">Number of students not added :
                         {{ Session::get('not_adding') }}
                       </p>
                    @endif
                    @if (Session::has('errorw') and !empty(Session::get('errorw'))) 
                    <div class="row">
                      <div class="col-md-12">
                        <div class="alert alert-danger">
                      @foreach (Session::get('errorw') as $k=>$v)
                             -  <strong style="text-decoration:underline;">
                                 Error In Row ( {{$k}} )<br>
                                 <small style="font-size:15px;">{{$v}}</small>
                             </strong><br>
                      @endforeach
                          </div>
                      </div>
                    </div>
                   @endif

                    <table class="table table-striped table-bordered table-hover" id="example1" style="display:none">
                            <thead>
                                <tr>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>E-mail</th>
                                    <th>Phone Number</th>
                                    <th>Password</th>
                                    
                                </tr>
                            </thead>
                    </table><br>
                  <form action="{{ route('instructor.upload_students') }}" method="POST"
                        enctype="multipart/form-data"
                  style="margin-top:5px;border:1px solid #ddd; padding:10px;"><br>
                    @csrf
                         <div class="form-row">
                            <div class="custom-file col-md-10">
                              <input type="file" name="file" class="custom-file-input" required 
                                aria-describedby="inputGroupFileAddon01">
                              <label class="custom-file-label" for="inputGroupFile01">
                               Choose Excel Sheet File</label>
                                  @if ($errors->has('file'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('file') }}</strong>
                                    </span>
                                @endif
                           </div>
                            <div class="form-group col-md-2 form1">
                                <button class="btn btn-success" type="submit">
                                    <i class="fas fa-file-import"></i> Upload
                                </button>
                            </div>
                        </div>

                </form>
                        @endif

                    @if(request('type')=='center')
            
             <form class="signup-form" method="POST" action="{{ route('instructor.register_student') }}"
              style="margin-top:15px;border:1px solid #ddd; padding:30px;">
        @csrf
        <div class="row">
          <div class="col-12 col-md-6">
            <label for="exampleInputPassword1">First name</label>
            <input type="text" class="form-control {{ $errors->has('fname') ? ' is-invalid' : '' }}"  name="fname" value="{{ old('fname') }}" id="fname" autofocus required/>
            @if ($errors->has('fname'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('fname') }}</strong>
                </span>
            @endif
          </div>
          <div class="col-12 col-md-6">
            <label for="exampleInputPassword1">Last name</label>
            <input type="text" class="form-control{{ $errors->has('lname') ? ' is-invalid' : '' }}" name="lname" value="{{ old('lname') }}" id="lname" required autocomplete="last_name" autofocus/>
            @if($errors->has('lname'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('lname') }}</strong>
                </span>
            @endif
          </div>
        <div class="col-12 col-md-6">
          <label for="exampleInputEmail1">Email address</label>
          <input
            type="email"
            class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" id="email" required
            aria-describedby="emailHelp"
          />
          @if($errors->has('email'))
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('email') }}</strong>
              </span>
          @endif
          <small id="emailHelp" class="form-text text-muted"
            >We'll never share your email with anyone else.</small>
        </div>
        <div class="col-12 col-md-6">
          <label for="exampleInputEmail1">Mobile</label>
          <input type="number"class="form-control{{ $errors->has('mobile') ? ' is-invalid' : '' }}" name="mobile" value="{{ old('mobile') }}" id="mobile" required autofocus/>
          @if($errors->has('mobile'))
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('mobile') }}</strong>
              </span>
          @endif
        </div>
   
        @error('mobile')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
        @enderror
            </div>

        <!--################################### End Choose A Photo ################################### -->

        <div class="row">
          <div class="col-12 col-sm-6">
            <label for="exampleInputPassword1">Password</label>
            <input
              type="password"
              class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" id="password" 
              required
            />
            @if ($errors->has('password'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
          </div>
          <div class="col-12 col-sm-6">
            <label for="exampleInputPassword1">Confirm Password</label>
            <input
              type="password"
              class="form-control{{ $errors->has('password_confirmation') ? ' is-invalid' : '' }}" name="password_confirmation" id="password-confirm" 
              required
            />
          </div>
          <div class="col-12 col-sm-6">
              <br><input type="submit" class="btn btn-primary" value="Add student">
          </div>
  
        </div>
    </form>

                     @endif
                     
                    </div>
                </div>
            </div>



@endsection

@endif

@section('scripts')


<script type="text/javascript">
   $(function () {
      $('#example1').DataTable({
        dom: 'Bfrtip',
            buttons: [
                {
                    extend: 'excel',
                    text: '<i class="fas fa-download"> Blank Form',
                    className: 'btn btn-success cus_btn_datatable' 
                },
             
                ],
        'paging'      : false,
        'lengthChange': false,
        'searching'   : false,
        'ordering'    : false,
        'info'        : false,
        'autoWidth'   : true,
      })
    });

</script>
@endsection