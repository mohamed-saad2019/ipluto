@extends('theme.master')
@section('title', 'Online Courses')
@section('content')
<style>
  .close1 {
  color: #aaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close1:hover,
.close1:focus {
  color: black;
  text-decoration: none;
  cursor: pointer;
}
</style>
<div class="reg">
      <form class="signup-form" method="POST" action="{{ route('register') }}">
        @csrf
        <div class="logoReg">
          <img src="{{url('images/logo.jpeg')}}" alt="" />
        </div>
        <div class="row">
          <div class="col-12 col-md-6">
            <label for="exampleInputPassword1">First name</label>
            <input type="text" class="form-control {{ $errors->has('fname') ? ' is-invalid' : '' }}"  name="fname" value="{{ old('fname') }}" id="fname" autofocus required placeholder="Write Your First Name"/>
            @if ($errors->has('fname'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('fname') }}</strong>
                </span>
            @endif
          </div>
          <div class="col-12 col-md-6">
            <label for="exampleInputPassword1">Last name</label>
            <input type="text" class="form-control{{ $errors->has('lname') ? ' is-invalid' : '' }}" name="lname" value="{{ old('lname') }}" id="lname" required autocomplete="last_name" autofocus placeholder="Write Your Last Name"/>
            @if($errors->has('lname'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('lname') }}</strong>
                </span>
            @endif
          </div>
        </div>
       <div class="row">
        <div class="col-12 col-md-6">
          <label for="exampleInputEmail1">Email address</label>
          <input
            type="email"
            class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" id="email" required placeholder="Write Your Email Address"
            aria-describedby="emailHelp"
          />
          @if($errors->has('email'))
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('email') }}</strong>
              </span>
          @endif
          <small id="emailHelp" class="form-text text-muted"
            >We'll never share your email with anyone.</small
          >
        </div>
        <div class="col-12 col-md-6">
          <label for="exampleInputEmail1">Mobile</label>
          <input type="number"class="form-control{{ $errors->has('mobile') ? ' is-invalid' : '' }}" name="mobile" value="{{ old('mobile') }}" id="mobile" required autofocus placeholder="Write Your Mobile"/>
          @if($errors->has('mobile'))
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('mobile') }}</strong>
              </span>
          @endif
        </div>
      </div>
        @php
        $grades = \App\SubCategory::where('status', '1')->orderBy('id','ASC')->get(); 
      @endphp
      <div class="row">
          <div class="col-12 col-md-6">
          <label for="exampleInputEmail1">Grade</label>
          <select name='grade' 
                 class="form-control{{ $errors->has('grade') ? ' is-invalid' : '' }} select2" required>
            <option value="">Choose Your Grade</option>
             @if($grades)
               @foreach($grades as $grade)
                      <option value="{{$grade->id}}">{{$grade->title}}</option>
               @endforeach
            @endif
          </select>
          @if($errors->has('grade'))
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('grade') }}</strong>
              </span>
          @endif
        </div>
          <div class="col-12 col-md-6">
           <label for="class_key">Class Code</label>
           <input type="text" id="class_key" name="class_key" value="{{old('class_key')}}" minlength ="5" maxlength="5" class="form-control{{ $errors->has('class_key') ? ' is-invalid' : '' }}"  placeholder="Write Your Class Code">
            @if($errors->has('class_key'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('class_key') }}</strong>
                </span>
            @endif
        </div>
      </div>
      <input type="hidden" name="country" value="64">
      <div class="row">
        <div class="col-12 col-md-6">
          <label for="govern">Governorate</label>
          <select class="form-control select2" name="govern" id="govern" required>
              <option>Choose Governorate</option>
            @foreach(getGovern(64) as $govern)
              <option value="{{$govern->id}}">{{$govern->name}}</option>
            @endforeach
          </select>
          @if($errors->has('govern'))
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('govern') }}</strong>
              </span>
          @endif
        </div>

       <div class="col-12 col-md-6">
          <label for="city">City</label>
          <select class="form-control select2" name="city" id="city">
             <option>Choose City</option>
          </select>
          @if($errors->has('city'))
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('city') }}</strong>
              </span>
          @endif
        </div>
      </div>

       <div class="row">
         <div class="col-md-12">
          <label for="address">Address</label>
          <input class="form-control" type="text" name="address" placeholder="Write Your Adress">
          @if($errors->has('address'))
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('address') }}</strong>
              </span>
          @endif
        </div>
       </div>
        <!--################################### start Choose A Photo ################################### -->
        <label for="exampleInputEmail1">Choose A Photo</label>
        <div
          class="form-control choosePhotoclick"
          data-toggle="modal"
          data-target="#staticBackdrop"
          id="hiddenAvatarBut"
        >What are your professional aspirations?</div>
        @if($errors->has('image'))
        <span class="invalid-feedback" role="alert">
          <strong>{{ $errors->first('image') }}</strong>
        </span>
        @endif
        <input
          type="hidden"
          name="image"
          class="form-conrtol"
          id="hiddenAvatar"
          value="{{old('image')}}"
        />
        <div
          class="modal fade"
          id="staticBackdrop"
          data-backdrop="static"
          data-keyboard="false"
          tabindex="-1"
          aria-labelledby="staticBackdropLabel"
          aria-hidden="true"
        >
        <div class="modal-dialog choosePhotoContent">
            <div class="modal-content">
               <div class="modal-header">
                <h5 class="modal-title">What are your professional aspirations?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
             <div class="modal-body">
                 <div class="row">
                <img
                  data-dismiss="modal"
                  src="{{url('images/avatar/artist(1).png')}}"
                  class="col-2"
                  alt="artist(1)"
                />
                <img
                  data-dismiss="modal"
                  src="{{url('images/avatar/teacher(2).png')}}"
                  class="col-2"
                  alt="teacher(2)"
                />
                <img
                  data-dismiss="modal"
                  src="{{url('images/avatar/astronaut(3).png')}}"
                  class="col-2"
                  alt="astronaut(3)"
                />
                <img
                  data-dismiss="modal"
                  src="{{url('images/avatar/astronomer(4).png')}}"
                  class="col-2"
                  alt="astronomer(4)"
                />
                <img
                  data-dismiss="modal"
                  src="{{url('images/avatar/beard(5).png')}}"
                  class="col-2"
                  alt="beard(5)"
                />
                <img
                  data-dismiss="modal"
                  src="{{url('images/avatar//beauty(6).png')}}"
                  class="col-2"
                  alt="beauty(6)"
                />
                <img
                  data-dismiss="modal"
                  src="{{url('images/avatar/businesswoman(7).png')}}"
                  class="col-2"
                  alt="businesswoman(7)"
                />
                <img
                  data-dismiss="modal"
                  src="{{url('images/avatar/coding(8).png')}}"
                  class="col-2"
                  alt="coding(8)"
                />
                <img
                  data-dismiss="modal"
                  src="{{url('images/avatar/data-science(9).png')}}"
                  class="col-2"
                  alt="data-science(9)"
                />
                <img
                  data-dismiss="modal"
                  src="{{url('images/avatar/dental-care(10).png')}}"
                  class="col-2"
                  alt="dental-care(10)"
                />
                <img
                  data-dismiss="modal"
                  src="{{url('images/avatar/dentist(11).png')}}"
                  class="col-2"
                  alt="dentist(11)"
                />
                <img
                  data-dismiss="modal"
                  src="{{url('images/avatar/doctor(12).png')}}"
                  class="col-2"
                  alt="doctor(12)"
                />
                <img
                  data-dismiss="modal"
                  src="{{url('images/avatar/doctor(13).png')}}"
                  class="col-2"
                  alt="doctor(13)"
                />
                <img
                  data-dismiss="modal"
                  src="{{url('images/avatar/worker(14).png')}}"
                  class="col-2"
                  alt="worker(14)"
                />
                <img
                  data-dismiss="modal"
                  src="{{url('images/avatar/worker(14).png')}}"
                  class="col-2"
                  alt="engineer(15)"
                />
                <img
                  data-dismiss="modal"
                  src="{{url('images/avatar/football-player(16).png')}}"
                  class="col-2"
                  alt="football-player(16)"
                />
                <img
                  data-dismiss="modal"
                  src="{{url('images/avatar/girl(17).png')}}"
                  class="col-2"
                  alt="girl(17)"
                />
                <img
                  data-dismiss="modal"
                  src="{{url('images/avatar/graduate(18).png')}}"
                  class="col-2"
                  alt="graduate(18)"
                />
                <img
                  data-dismiss="modal"
                  src="{{url('images/avatar/graduate(19).png')}}"
                  class="col-2"
                  alt="graduate(19)"
                />
                <img
                  data-dismiss="modal"
                  src="{{url('images/avatar/journalist(20).png')}}"
                  class="col-2"
                  alt="journalist(20)"
                />
                <img
                  data-dismiss="modal"
                  src="{{url('images/avatar/journalist(21).png')}}"
                  class="col-2"
                  alt="journalist(21)"
                />
                <img
                  data-dismiss="modal"
                  src="{{url('images/avatar/lawyer(22).png')}}"
                  class="col-2"
                  alt="lawyer(22)"
                />
                <img
                  data-dismiss="modal"
                  src="{{url('images/avatar/lawyer(23).png')}}"
                  class="col-2"
                  alt="lawyer(23)"
                />
                <img
                  data-dismiss="modal"
                  src="{{url('images/avatar/man(24).png')}}"
                  class="col-2"
                  alt="man(24)"
                />
                <img
                  data-dismiss="modal"
                  src="{{url('images/avatar/marketing(25).png')}}"
                  class="col-2"
                  alt="marketing(25)"
                />
                <img
                  data-dismiss="modal"
                  src="{{url('images/avatar/molecular(26).png')}}"
                  class="col-2"
                  alt="molecular(26)"
                />
                <img
                  data-dismiss="modal"
                  src="{{url('images/avatar/monitoring(27).png')}}"
                  class="col-2"
                  alt="monitoring(27)"
                />
                <img
                  data-dismiss="modal"
                  src="{{url('images/avatar/painter(28).png')}}"
                  class="col-2"
                  alt="painter(28)"
                />
                <img
                  data-dismiss="modal"
                  src="{{url('images/avatar/pharmacist(29).png')}}"
                  class="col-2"
                  alt="pharmacist(29)"
                />
                <img
                  data-dismiss="modal"
                  src="{{url('images/avatar/policeman(30).png')}}"
                  class="col-2"
                  alt="policeman(30)"
                />
                <img
                  data-dismiss="modal"
                  src="{{url('images/avatar/police-officer(31).png')}}"
                  class="col-2"
                  alt="police-officer(31)"
                />
                <img
                  data-dismiss="modal"
                  src="{{url('images/avatar/programmer(32).png')}}"
                  class="col-2"
                  alt="programmer(32)"
                />
                <img
                  data-dismiss="modal"
                  src="{{url('images/avatar/scientific(33).png')}}"
                  class="col-2"
                  alt="scientific(33)"
                />
                <img
                  data-dismiss="modal"
                  src="{{url('images/avatar/scientist(34).png')}}"
                  class="col-2"
                  alt="scientist(34)"
                />
                <img
                  data-dismiss="modal"
                  src="{{url('images/avatar/soccer(35).png')}}"
                  class="col-2"
                  alt="soccer(35)"
                />
                <img
                  data-dismiss="modal"
                  src="{{url('images/avatar/social-media(36).png')}}"
                  class="col-2"
                  alt="social-media(36)"
                />
                <img
                  data-dismiss="modal"
                  src="{{url('images/avatar/monitoring(27).png')}}"
                  class="col-2"
                  alt="monitoring(27)"
                />
                <img
                  data-dismiss="modal"
                  src="{{url('images/avatar/teacher(38).png')}}"
                  class="col-2"
                  alt="teacher(38)"
                />
                <img
                  data-dismiss="modal"
                  src="{{url('images/avatar/teacher(39).png')}}"
                  class="col-2"
                  alt="teacher(39)"
                />
                <img
                  data-dismiss="modal"
                  src="{{url('images/avatar/veterinarian(40).png')}}"
                  class="col-2"
                  alt="veterinarian(40)"
                />
              </div>
             </div>
            </div>
          </div>
        </div>
        @error('mobile')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
        @enderror
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
        </div>
        <div class="form-group form-check">
          <input type="checkbox" class="form-check-input" id="exampleCheck1" />
          <label class="form-check-label" for="exampleCheck1"
            >Remember Me?</label
          >
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>

@endsection