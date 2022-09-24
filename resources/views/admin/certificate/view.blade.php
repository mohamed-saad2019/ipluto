@extends('admin.layouts.master')
@section('title', 'Certificate Verification - Admin')
@section('maincontent')
 

@component('components.breadcumb',['thirdactive' => 'active'])
@slot('heading')
   {{ __('Certificate Verification') }}
@endslot
@slot('menu1')
   {{ __('Certificate Verification') }}
@endslot

@slot('button')
<div class="col-md-4 col-lg-4">
  <div class="widgetbar">
    <button type="reset" class="btn btn-danger-rgba reset-btn"><i class="fa fa-ban"></i> Reset</button>
</div>
@endslot
@endcomponent

	@if ($errors->any())  
	<div class="alert alert-danger" role="alert">
	@foreach($errors->all() as $error)     
	<p>{{ $error}}<button type="button" class="close" data-dismiss="alert" aria-label="Close">
	<span aria-hidden="true" style="color:red;">&times;</span></button></p>
		@endforeach  
	</div>
	@endif
							
                          
	<div class="row mt-5">
	  <div class="col-lg-12">
		<div class="card m-b-30">
		  <div class="card-header">
			<h5 class="card-title">{{ __('Certificate Verification') }}</h5>
		  </div>
		  <div class="card-body">
			<form action="{{ action('CertificateController@verification') }}" method="GET" enctype="multipart/form-data">
				
				<div class="row">
					<div class="form-group col-md-12 ">
					<label>{{ __('Enter Certificate Serial Number') }}:<span class="redstar">*</span></label>
					<input type="text" class="form-control" id="skillifyTheme" name="title" value="{{ optional($posts)->title }}" required >
				</div>
					<div class="col-md-12">
						<div class="form-group">
							<button type="submit" class="btn btn-primary-rgba">
								<i class="fa fa-check-circle"></i>
								{{ __("verify")}}
							</button>
						</div>
					</div>
	            
            	</div>
			</form>





			@if (isset($posts))
			
			<a href="{{ url('certificate'.'/'.$posts->title) }}" target="blank"> 
			<h4> {{$posts->title}}  </h4>
			</a>

			<div class="button-list">
                <a href="{{ url('certificate'.'/'.$posts->title) }}" target="blank" class="btn btn-success-rgba btn-lg btn-block">View Certificate</a>
            </div>

			@endif

	  </div>
	</div>
  </div>
</div>
@endsection


@section('script')
	
<script>
  $(document).ready(function () {
    $(".reset-btn").click(function () {
      var uri = window.location.toString();

      if (uri.indexOf("?") > 0) {

        var clean_uri = uri.substring(0, uri.indexOf("?"));

        window.history.replaceState({}, document.title, clean_uri);

      }

      location.reload();
    });
  });
</script>
<!-- script to change status end -->
@endsection


