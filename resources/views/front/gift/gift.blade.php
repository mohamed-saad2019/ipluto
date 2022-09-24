@extends('theme.master')
@section('title', "Gift Course")
@section('content')

@include('admin.message')
<!-- course detail header start -->

<section id="gift-block" class="gift-main-block btm-60">
	<div class="container">
		<div class="panel-body">
			<h1 class="student-heading text-center top-30 btm-60">{{ __('frontstaticword.Giftacourse') }}</h1>
			<div class="row">
				<div class="col-lg-6">
					@if($course['preview_image'] !== NULL && $course['preview_image'] !== '')
          	<a href="{{ route('user.course.show',['id' => $course->id, 'slug' => $course->slug ]) }}"><img src="{{ asset('images/course/'. $course->preview_image) }}" class="img-fluid" alt="course"></a>
          @else
          	<a href="{{ route('user.course.show',['id' => $course->id, 'slug' => $course->slug ]) }}"><img src="{{ Avatar::create($course->title)->toBase64() }}" class="img-fluid" alt="course"></a>
          @endif
          <br>
          <br>
          <h3 class="text-center">
              <a href="{{ route('user.course.show',['id' => $course->id, 'slug' => $course->slug ]) }}">{{ $course->title }}</a>
          </h3>

                    
				</div>

				<div class="col-lg-6">
					<form id="demo-form2" method="post" action="{{ route('gift.checkout') }}" data-parsley-validate 
                  class="form-horizontal form-label-left" enctype="multipart/form-data">
                    {{ csrf_field() }}

                    <input type="hidden" name="course_id"  value="{{$course->id}}" />
                      
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="fname">{{ __('frontstaticword.FirstName') }}:<sup class="redstar">*</sup></label>
                          <input type="text" class="form-control" name="fname" id="title" placeholder="  {{ __('frontstaticword.EnterFirstName') }}" required>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="lname">{{ __('frontstaticword.LastName') }}:<sup class="redstar">*</sup></label>
                          <input type="text" class="form-control" name="lname" id="title" placeholder="  {{ __('frontstaticword.EnterLastName') }}"  required>
                        </div>
                      </div>
                    </div>
                    
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label for="email">{{ __('frontstaticword.Email') }}:<sup class="redstar">*</sup></label>
                          <input type="email" value="" class="form-control" name="email" id="title" placeholder="Enter {{ __('frontstaticword.Email') }}" value="" required>
                        </div>
                      </div>
                      
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label for="detail">{{ __('Your message') }}({{ __('optional') }}):</label>
                          <textarea name="detail" rows="5"  class="form-control" placeholder="" ></textarea>
                        </div>
                      </div>
                      
                    </div>
                    <br>
                    <div class="box-footer text-center">
                     <button type="submit" class="btn btn-lg btn-primary">{{ __('frontstaticword.ProceedtoCheckout') }}</button>
                    </div>
                </form>
				</div>
			</div>
		</div>
	</div>
</section>

<!-- course detail end -->
@endsection
