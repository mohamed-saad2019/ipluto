@extends('admin.layouts.master')
@section('title','Import Question')
@section('maincontent')
@component('components.breadcumb',['secondaryactive' => 'active'])
@slot('heading')
   {{ __('Question') }}
@endslot
@slot('menu1')
{{ __('Question') }}
@endslot

@slot('button')

<div class="col-md-4 col-lg-4">
  <div class="widgetbar">
    <a href="{{ url('files/QuizQuestion.xlsx') }}" class="float-right btn btn-primary-rgba mr-2"><i
        class="feather icon-arrow-down mr-2"></i>Download Example xls/csv File</a> </div>
</div>

@endslot
@endcomponent
<div class="contentbar">

<div class="row">
    <div class="col-lg-12">
      <div class="card m-b-30">
        <div class="card-header">
          <h5 class="box-tittle">{{ __('adminstaticword.Import') }} {{ __('adminstaticword.Question') }}</h5>
        </div>
        <div class="card-body">
			<form action="{{ route('import') }}" method="POST" enctype="multipart/form-data">
				{{ csrf_field() }}
		  
		  <div class="row">
			  <div class="form-group col-md-6">
			   <label for="file">Select xls/csv File :</label>
				<input required="" type="file" name="file" class="form-control">
				@if ($errors->has('file'))
				  <span class="invalid-feedback text-danger" role="alert">
					  <strong>{{ $errors->first('file') }}</strong>
				  </span>
			   @endif
			  <br>
			   <button type="submit" class="btn btn-primary"><i class="fa fa-check-circle"></i>
                Submit</button>
			  </div>

			  
		  </div>

		  </form>
		</div>
		<div class="row">
		
			<div class="col-lg-12">
				<div class="card m-b-30">
					<div class="card-header">
						<h5 class="box-title">Import Question</h5>
					</div>
					<div class="card-body">
					
						<div class="table-responsive">
							<table id="datatable-buttons" class="table table-striped table-bordered">
								<thead>
								<tr>
									<th>Column No</th>
							<th>Column Name</th>
							<th>Description</th>
						</tr>
					</thead>
	
					<tbody>
						<tr>
							<td>1</td>
							<td><b>Course</b> (Required)</td>
							<td>Name of course</td>
	
							
						</tr>
	
						<tr>
							<td>2</td>
							<td><b>QuizTopic</b> (Required)</td>
							<td>Name of Quiz Topic</td>
						</tr>
	
						<tr>
							<td>3</td>
							<td><b>Question</b> (Required)</td>
							<td>Name of Question</td>
						</tr>
	
						<tr>
							<td>4</td>
							<td><b>A</b> (Required)</td>
							<td>Option A.</td>
						</tr>
	
						<tr>
							<td>5</td>
							<td><b>B</b> (Required)</td>
							<td>Option B.</td>
						</tr>
	
						<tr>
							<td>6</td>
							<td><b>C</b> (Required)</td>
							<td>Option C.</td>
						</tr>
	
						<tr>
							<td>7</td>
							<td><b>D</b> (Required)</td>
							<td>Option D.</td>
						</tr>
	
						<tr>
							<td>8</td>
							<td><b>CorrectAnswer</b> (Required)</td>
							<td>Question correct answer -> options (a,b,c,d)</td>
						</tr>
	
						
	
						
	
					</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	  </div>
	</div>
</div>

</div>	


@endsection
{{-- @extends("admin/layouts.master")
@section('title','Import Question - Admin')
@section("body")

@if ($errors->any())
<div class="alert alert-danger">
  <ul>
    @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
  </ul>
</div>
@endif

<section class="content">
	<div class="box box-primary">
		<div class="box-header with-header">
			<div class="box-title">Import Questions</div>
		</div>

		<div class="box-body">

			 <a href="{{ url('files/QuizQuestion.xlsx') }}" class="btn btn-md btn-success"> Download Example xls/csv File</a>
			 <hr>
		
			<form action="{{ route('import') }}" method="POST" enctype="multipart/form-data">
          		{{ csrf_field() }}
            
            <div class="row">
            	<div class="form-group col-md-6">
            	 <label for="file">Select xls/csv File :</label>
             	 <input required="" type="file" name="file" class="form-control">
             	 @if ($errors->has('file'))
                    <span class="invalid-feedback text-danger" role="alert">
                        <strong>{{ $errors->first('file') }}</strong>
                    </span>
                 @endif
				<p></p>
                 <button type="submit" class="btn bg-primary btn-sm">Submit</button>
            	</div>
 
            	
            </div>

        	</form>
			
		</div>
	</div>

	<div class="box box-primary">
		<div class="box-header with-border">
			<div class="box-title">Instructions</div>
		</div>

		<div class="box-body">
			<p>The columns of the upload file should be in the following order.</p>

			<table class="table table-striped">
				<thead>
					<tr>
						<th>Column No</th>
						<th>Column Name</th>
						<th>Description</th>
					</tr>
				</thead>

				<tbody>
					<tr>
						<td>1</td>
						<td><b>Course</b> (Required)</td>
						<td>Name of course</td>

						
					</tr>

					<tr>
						<td>2</td>
						<td><b>QuizTopic</b> (Required)</td>
						<td>Name of Quiz Topic</td>
					</tr>

					<tr>
						<td>3</td>
						<td><b>Question</b> (Required)</td>
						<td>Name of Question</td>
					</tr>

					<tr>
						<td>4</td>
						<td><b>A</b> (Required)</td>
						<td>Option A.</td>
					</tr>

					<tr>
						<td>5</td>
						<td><b>B</b> (Required)</td>
						<td>Option B.</td>
					</tr>

					<tr>
						<td>6</td>
						<td><b>C</b> (Required)</td>
						<td>Option C.</td>
					</tr>

					<tr>
						<td>7</td>
						<td><b>D</b> (Required)</td>
						<td>Option D.</td>
					</tr>

					<tr>
						<td>8</td>
						<td><b>CorrectAnswer</b> (Required)</td>
						<td>Question correct answer -> options (a,b,c,d)</td>
					</tr>

					

					

				</tbody>
			</table>
		</div>
	</div>
</section>
@endsection --}}