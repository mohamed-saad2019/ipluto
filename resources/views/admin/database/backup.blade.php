@extends('admin.layouts.master')
@section('title', 'Database Backup - Admin')
@section('maincontent')
@component('components.breadcumb',['fourthactive' => 'active'])
@slot('heading')
   {{ __('Database Backup') }}
@endslot
@slot('menu1')
{{ __('Database Backup') }}
@endslot
@endcomponent
<div class="contentbar">
    <div class="row">
@if ($errors->any())  
  <div class="alert alert-danger" role="alert">
  @foreach($errors->all() as $error)     
  <p>{{ $error}}<button type="button" class="close" data-dismiss="alert" aria-label="Close">
  <span aria-hidden="true" style="color:red;">&times;</span></button></p>
      @endforeach  
  </div>
  @endif
  
    <!-- row started -->
    <div class="col-lg-12">
    
        <div class="card m-b-30">
                <!-- Card header will display you the heading -->
                <div class="card-header">
                    <h5 class="card-box">{{ __('Database Backup') }}</h5>
                </div> 
               
                <!-- card body started -->
                <div class="card-body">
                <div class="card bg-success-rgba m-b-30">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-12">
								<!-- form start -->
								<h3 class="box-title">{{ __('MySQL Dump Path') }}</h3>
								<form action="{{ action('DatabaseController@update') }}" class="form" method="POST">
								{{ csrf_field() }}
								{{ method_field('POST') }}
									<!-- row start -->
									<div class="row">
										<div class="col-md-12">
											<!-- card start -->
											<div class="card">
												<!-- card body start -->
												<div class="card-body">
													<!-- row start -->
													<div class="row">
														<div class="col-md-12">
															<!-- row start -->
															<div class="row">       
																	<!-- DemoImport -->
																	<div class="col-md-12">
																		<div class="input-group input-group-sm">
																			<input type="text" name="DUMP_BINARY_PATH" value="{{ $dump }}" class="form-control">
																			<span class="input-group-btn">
																			<button type="submit" class="btn btn-primary btn-block">{{ __('adminstaticword.Save') }}!</button>
																			</span>
																		</div>
																		<small class="text-muted"><i class="fa fa-info-circle"></i> {{ __('adminstaticword.ImportantNote') }}:
																			<br>
																			• Usually in all hosting dump path for MYSQL is <b>/usr/bin/</b>
																			<br>
																			• If that path not work than contact your hosting provider with subject <b>"What is my MYSQL DUMP Binary path ?"</b>
																			<br>
																			• Enter the path without <b>mysqldump</b> in path"</b>
																		</small>
																	</div>
															</div><!-- row end -->
														</div><!-- col end -->
													</div><!-- row end -->
												</div><!-- card body end -->
											</div><!-- card end -->
										</div><!-- col end -->
									</div><!-- row end -->
								</form>
								<!-- form end -->
								<br>
								<!-- Generate Backup start -->
								<h5 class="panel-title">{{ __('adminstaticword.GenerateBackup') }} :</h5>
								<br>
								<div class="panel panel-default">
									<div class="panel-body">
										<form action="{{ action('DatabaseController@genrate') }}" method="POST" enctype="multipart/form-data">
										{{ csrf_field() }}
										{{ method_field('POST') }}
										<button type="submit" class="btn btn-default btn-block">{{ __('adminstaticword.GenerateBackup') }}</button>
										</form>
									</div>
									<div>
										<ul>
											<li>
												{{ __('It will generate only database backup of your site.') }}
											</li>

											<li>
												<b>{{ __('Download URL is valid only for 1 (minute).') }}</b>
											</li>

											<li>
												Make sure <b>mysql dump is enabled on your server</b> for database backup and before run
												this or
												run only database backup command make sure you save the mysql dump path in
												<b>config/database.php</b>.
											</li>
										</ul>
									</div>
								</div>
								<!-- Generate Backup end -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ========== Download and Delete backups start ===================== -->
                <div class="row">
                    <!-- Download the latest backup start -->
                    <div class="col-6">
						<p class="text-muted"> <b>Download the latest backup</b> </p>
						@php
							$dir1 = storage_path() . '/app/'.config('app.name');
							$files = glob("$dir1/*");
						@endphp
						@foreach (array_reverse($files) as $key=> $file)
						@if($loop->first)
						<li><a href="{{ URL::temporarySignedRoute('database.download', now()->addMinutes(1), ['filename' => basename($file)]) }}"><b>{{ basename($file)  }}
							(Latest)</b></a></li>
						@else
						<li><a href="{{ URL::temporarySignedRoute('database.download', now()->addMinutes(1), ['filename' => basename($file)]) }}">{{ basename($file)  }}</a>
						</li>
						@endif
						@endforeach
                    </div>
                    <!-- Download the latest backup end -->
                    <!-- >Delete all backups start -->
                    <div class="col-6">
					<p class="text-muted"> <b>Delete all backups</b> </p>
						<form action="{{ action('DatabaseController@deletebackup') }}" method="POST" enctype="multipart/form-data">
						{{ csrf_field() }}
						{{ method_field('POST') }}
						<button type="submit" class="btn btn-danger-rgba mr-2"><i
            class="feather icon-trash mr-2"></i> {{ __('Delete All Backups') }}</button>
							<!--<button type="submit" class="btn btn-default">{{ __('Delete All Backups') }}</button>-->
						</form>
                    </div>
                     <!-- >Delete all backups end -->
                </div>
                <!-- ========== Download and Delete backups end ===================== -->
                </div>
				<!-- card body end -->
            
        </div><!-- col end -->
    </div>
</div>
</div><!-- row end -->
    <br><br>
@endsection
<!-- main content section ended -->
<!-- This section will contain javacsript start -->
@section('script')
@endsection
<!-- This section will contain javacsript end -->