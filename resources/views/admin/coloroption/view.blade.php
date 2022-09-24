@extends('admin.layouts.master')
@section('title', 'Color Option - Admin')
@section('maincontent')
@component('components.breadcumb',['fourthactive' => 'active'])
@slot('heading')
   {{ __('Color Settings') }}
@endslot
@slot('menu1')
{{ __('Color Settings') }}
@endslot

@slot('button')
<div class="col-md-4 col-lg-4">
  <div class="widgetbar">
      <a href="{{ route('coloroption.reset') }}" class="btn btn-primary-rgba"><i class="feather icon-plus mr-2"></i>{{ __("Reset")}}</a>
                                
     
  </div>                        
</div>

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
                    <h5 class="card-box">{{ __('adminstaticword.ColorSettings') }}</h5>
                </div> 
               
                <!-- card body started -->
                <div class="card-body">
                 <!-- form start -->
				  <form action="{{ url('admin/coloroption/update') }}" method="POST" enctype="multipart/form-data">
		                @csrf
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
                                                    
                                                    <!-- BlueBackground -->
													
												
                                                    <div class="col-md-6">
													
                                                        <div class="form-group">
															<label class="text-dark" for="blue_bg">{{ __('adminstaticword.BlueBackground') }}:</label>
															<input name="blue_bg" class="form-control" type="color" value="{{ optional($color)['blue_bg'] }}"/>
															
															<!--<div id="initial-color" class="input-group colorpicker1-element" title="Using input value" data-colorpicker-id="4">-->
															<!--<input type="text" name="blue_bg" class="form-control input-lg" placeholder="Choose color" value="{{ optional($color)['blue_bg'] }}">-->
															<!--<span class="input-group-append">-->
															<!--	<span class="input-group-text colorpicker-input-addon" data-original-title="" title="" tabindex="0"><i style="background: {{ optional($color)['blue_bg'] }};"></i></span>-->
															<!--</span>-->
															<!--</div>-->
                                                        </div>
                                                    </div>

                                                    <!-- image 1 -->
                                                    <div class="col-md-6">
                                                        <div class="form-group">
															<img src="{{ url('images/screenshot/18.png') }}" class="img-thumbnail" width="400px" height="400px">
                                                        </div>
                                                    </div>

													<!-- RedBackground -->
													<div class="col-md-6">
                                                        <div class="form-group">
															<label class="text-dark" for="red_bg">{{ __('adminstaticword.RedBackground') }} :</label>
															<input name="red_bg" class="form-control" type="color" value="{{ optional($color)['red_bg'] }}"/>
															<!--<div id="initial-color1" class="input-group colorpicker-element" title="Using input value" data-colorpicker-id="4">-->
															<!--<input type="text" name="red_bg" class="form-control input-lg" placeholder="Choose color" value="{{ optional($color)['red_bg'] }}">-->
															<!--<span class="input-group-append">-->
															<!--	<span class="input-group-text colorpicker-input-addon" data-original-title="" title="" tabindex="0"><i style="background: {{ optional($color)['red_bg'] }};"></i></span>-->
															<!--</span>-->
															<!--</div>-->
                                                        </div>
                                                    </div>

                                                    <!-- image 2 -->
                                                    <div class="col-md-6">
                                                        <div class="form-group">
															<img src="{{ url('images/screenshot/19.png') }}" class="img-thumbnail" width="400px" height="400px">
                                                        </div>
                                                    </div>

													<!-- Grey Background -->
													<div class="col-md-6">
                                                        <div class="form-group">
															<label class="text-dark" for="red_bg">{{ __('Grey Background') }} :</label>
																<input name="grey_bg" class="form-control" type="color" value="{{ optional($color)['grey_bg'] }}"/>
															<!--<div id="initial-color2" class="input-group colorpicker-element" title="Using input value" data-colorpicker-id="5">-->
															<!--<input type="text" name="grey_bg" class="form-control input-lg" placeholder="Choose color" value="{{ optional($color)['grey_bg'] }}">-->
															<!--<span class="input-group-append">-->
															<!--	<span class="input-group-text colorpicker-input-addon" data-original-title="" title="" tabindex="0"><i style="background: {{ optional($color)['grey_bg'] }};"></i></span>-->
															<!--</span>-->
															<!--</div>-->
                                                        </div>
                                                    </div>

                                                    <!-- image 3 -->
                                                    <div class="col-md-6">
                                                        <div class="form-group">
															<img src="{{ url('images/screenshot/15.png') }}" class="img-thumbnail" width="400px" height="400px">
                                                        </div>
                                                    </div>

													<!-- Light Grey Background -->
													<div class="col-md-6">
                                                        <div class="form-group">
															<label class="text-dark" for="red_bg">{{ __('Light Grey Background') }} :</label>
															
																<input name="light_grey_bg" class="form-control" type="color" value="{{ optional($color)['light_grey_bg'] }}"/>
																
															<!--<div id="initial-color3" class="input-group colorpicker-element" title="Using input value" data-colorpicker-id="6">-->
															<!--<input type="text" name="light_grey_bg" class="form-control input-lg" placeholder="Choose color" value="{{ optional($color)['light_grey_bg'] }}">-->
															<!--<span class="input-group-append">-->
															<!--	<span class="input-group-text colorpicker-input-addon" data-original-title="" title="" tabindex="0"><i style="background: {{ optional($color)['light_grey_bg'] }};"></i></span>-->
															<!--</span>-->
															<!--</div>-->
                                                        </div>
                                                    </div>

                                                    <!-- image 4 -->
                                                    <div class="col-md-6">
                                                        <div class="form-group">
															<img src="{{ url('images/screenshot/17.png') }}" class="img-thumbnail" width="400px" height="400px">
                                                        </div>
                                                    </div>

													<!-- Black Background -->
													<div class="col-md-6">
                                                        <div class="form-group">
															<label class="text-dark" for="red_bg">{{ __('Black Background') }} :</label>
															
															<input name="black_bg" class="form-control" type="color" value="{{ optional($color)['black_bg'] }}"/>
															
															<!--<div id="initial-color4" class="input-group colorpicker-element" title="Using input value" data-colorpicker-id="7">-->
															<!--<input type="text" name="black_bg" class="form-control input-lg" placeholder="Choose color" value="{{ optional($color)['black_bg'] }}">-->
															<!--<span class="input-group-append">-->
															<!--	<span class="input-group-text colorpicker-input-addon" data-original-title="" title="" tabindex="0"><i style="background: {{ optional($color)['black_bg'] }};"></i></span>-->
															<!--</span>-->
															<!--</div>-->
                                                        </div>
                                                    </div>

                                                    <!-- image 5 -->
                                                    <div class="col-md-6">
                                                        <div class="form-group">
															<img src="{{ url('images/screenshot/16.png') }}" class="img-thumbnail" width="400px" height="400px">
                                                        </div>
                                                    </div>

													<!-- White Background -->
													<div class="col-md-6">
                                                        <div class="form-group">
															<label class="text-dark" for="red_bg">{{ __('White Background') }} :</label>
																<input name="white_bg" class="form-control" type="color" value="{{ optional($color)['white_bg'] }}"/>
																
															<!--<div id="initial-color5" class="input-group colorpicker-element" title="Using input value" data-colorpicker-id="9">-->
															<!--<input type="text" name="white_bg" class="form-control input-lg" placeholder="Choose color" value="{{ optional($color)['white_bg'] }}">-->
															<!--<span class="input-group-append">-->
															<!--	<span class="input-group-text colorpicker-input-addon" data-original-title="" title="" tabindex="0"><i style="background: {{ optional($color)['white_bg'] }};"></i></span>-->
															<!--</span>-->
															<!--</div>-->
                                                        </div>
                                                    </div>

                                                    <!-- image 6 -->
                                                    <div class="col-md-6">
                                                        <div class="form-group">
															
                                                        </div>
                                                    </div>

													<!-- Deep Red Background -->
													<div class="col-md-6">
                                                        <div class="form-group">
															<label class="text-dark" for="red_bg">{{ __('Deep Red Background') }} :</label>
																<input name="dark_red_bg" class="form-control" type="color" value="{{ optional($color)['dark_red_bg'] }}"/>
																
															<!--<div id="initial-color6" class="input-group colorpicker-element" title="Using input value" data-colorpicker-id="10">-->
															<!--<input type="text" name="dark_red_bg" class="form-control input-lg" placeholder="Choose color" value="{{ optional($color)['dark_red_bg'] }}">-->
															<!--<span class="input-group-append">-->
															<!--	<span class="input-group-text colorpicker-input-addon" data-original-title="" title="" tabindex="0"><i style="background: {{ optional($color)['dark_red_bg'] }};"></i></span>-->
															<!--</span>-->
															<!--</div>-->
                                                        </div>
                                                    </div>

                                                    <!-- image 7 -->
                                                    <div class="col-md-6">
                                                        <div class="form-group">
														<img src="{{ url('images/screenshot/14.png') }}" class="img-thumbnail" width="400px" height="400px">
                                                        </div>
                                                    </div>

                                                  </div><!-- row end -->
                                              </div><!-- col end -->
                                          </div>
										  <hr>
										  <!-- row end -->

										   <!-- row start -->
										   <div class="row">
                                              
                                              <div class="col-md-12">
                                                  <!-- row start -->
												  <!-- <div>
                                                  <h5 class="card-title">{{ __('Text Color') }}</h5>
												    </div> -->
                                                  <div class="row">
                                                    
													<!-- Text Color Background -->
													<div class="col-md-6">
                                                        <div class="form-group">
															<label class="text-dark" for="red_bg">{{ __('Black Text') }} :</label>
																<input name="black_text" class="form-control" type="color" value="{{ optional($color)['black_text'] }}"/>
															<!--<div id="initial-color7" class="input-group colorpicker-element" title="Using input value" data-colorpicker-id="11">-->
															<!--<input type="text" name="black_text" class="form-control input-lg" placeholder="Choose color" value="{{ optional($color)['black_text'] }}">-->
															<!--<span class="input-group-append">-->
															<!--	<span class="input-group-text colorpicker-input-addon" data-original-title="" title="" tabindex="0"><i style="background: {{ optional($color)['black_text'] }};"></i></span>-->
															<!--</span>-->
															<!--</div>-->
                                                        </div>
                                                    </div>

                                                    <!-- image 7 -->
                                                    <div class="col-md-6">
                                                        <div class="form-group">
														<img src="{{ url('images/screenshot/12.png') }}" class="img-thumbnail" width="400px" height="400px">
                                                        </div>
                                                    </div>

													<!-- Light Grey Text -->
													<div class="col-md-6">
                                                        <div class="form-group">
															<label class="text-dark" for="red_bg">{{ __('Light Grey Text') }} :</label>
																<input name="light_grey_text" class="form-control" type="color" value="{{ optional($color)['black_text'] }}"/>
															<!--<div id="initial-color8" class="input-group colorpicker-element" title="Using input value" data-colorpicker-id="12">-->
															<!--<input type="text" name="light_grey_text" class="form-control input-lg" placeholder="Choose color" value="{{ optional($color)['black_text'] }}">-->
															<!--<span class="input-group-append">-->
															<!--	<span class="input-group-text colorpicker-input-addon" data-original-title="" title="" tabindex="0"><i style="background: {{ optional($color)['black_text'] }};"></i></span>-->
															<!--</span>-->
															<!--</div>-->
                                                        </div>
                                                    </div>

                                                    <!-- image 8 -->
                                                    <div class="col-md-6">
                                                        <div class="form-group">
														<img src="{{ url('images/screenshot/11.png') }}" class="img-thumbnail" width="400px" height="400px">
                                                        </div>
                                                    </div>

													<!-- Dark Grey Text -->
													<div class="col-md-6">
                                                        <div class="form-group">
															<label class="text-dark" for="red_bg">{{ __('Dark Grey Text') }} :</label>
																<input name="dark_grey_text" class="form-control" type="color" value="{{ optional($color)['dark_grey_text'] }}"/>
															<!--<div id="initial-color9" class="input-group colorpicker-element" title="Using input value" data-colorpicker-id="13">-->
															<!--<input type="text" name="dark_grey_text" class="form-control input-lg" placeholder="Choose color" value="{{ optional($color)['dark_grey_text'] }}">-->
															<!--<span class="input-group-append">-->
															<!--	<span class="input-group-text colorpicker-input-addon" data-original-title="" title="" tabindex="0"><i style="background: {{ optional($color)['dark_grey_text'] }};"></i></span>-->
															<!--</span>-->
															<!--</div>-->
                                                        </div>
                                                    </div>

                                                    <!-- image 9 -->
                                                    <div class="col-md-6">
                                                        <div class="form-group">
														<img src="{{ url('images/screenshot/10.png') }}" class="img-thumbnail" width="400px" height="400px">
                                                        </div>
                                                    </div>

													<!-- Red Text -->
													<div class="col-md-6">
                                                        <div class="form-group">
															<label class="text-dark" for="red_bg">{{ __('Red Text') }} :</label>
															<input name="red_text" class="form-control" type="color" value="{{ optional($color)['red_text'] }}"/>
															<!--<div id="initial-color10" class="input-group colorpicker-element" title="Using input value" data-colorpicker-id="14">-->
															<!--<input type="text" name="red_text" class="form-control input-lg" placeholder="Choose color" value="{{ optional($color)['red_text'] }}">-->
															<!--<span class="input-group-append">-->
															<!--	<span class="input-group-text colorpicker-input-addon" data-original-title="" title="" tabindex="0"><i style="background: {{ optional($color)['red_text'] }};"></i></span>-->
															<!--</span>-->
															<!--</div>-->
                                                        </div>
                                                    </div>

                                                    <!-- image 10 -->
                                                    <div class="col-md-6">
                                                        <div class="form-group">
														<img src="{{ url('images/screenshot/9.png') }}" class="img-thumbnail" width="400px" height="400px">
                                                        </div>
                                                    </div>

													<!-- Blue Text -->
													<div class="col-md-6">
                                                        <div class="form-group">
															<label class="text-dark" for="red_bg">{{ __('Blue Text') }} :</label>
															<input name="blue_text" class="form-control" type="color" value="{{ optional($color)['blue_text'] }}"/>
															<!--<div id="initial-color11" class="input-group colorpicker-element" title="Using input value" data-colorpicker-id="15">-->
															<!--<input type="text" name="blue_text" class="form-control input-lg" placeholder="Choose color" value="{{ optional($color)['blue_text'] }}">-->
															<!--<span class="input-group-append">-->
															<!--	<span class="input-group-text colorpicker-input-addon" data-original-title="" title="" tabindex="0"><i style="background: {{ optional($color)['blue_text'] }};"></i></span>-->
															<!--</span>-->
															<!--</div>-->
                                                        </div>
                                                    </div>

                                                    <!-- image 11 -->
                                                    <div class="col-md-6">
                                                        <div class="form-group">
														<img src="{{ url('images/screenshot/8.png') }}" class="img-thumbnail" width="400px" height="400px">
                                                        </div>
                                                    </div>

													<!-- Dark Blue Text -->
													<div class="col-md-6">
                                                        <div class="form-group">
															<label class="text-dark" for="red_bg">{{ __('Dark Blue Text') }} :</label>
															<input name="dark_blue_text" class="form-control" type="color" value="{{ optional($color)['dark_blue_text'] }}"/>
															<!--<div id="initial-color12" class="input-group colorpicker-element" title="Using input value" data-colorpicker-id="16">-->
															<!--<input type="text" name="dark_blue_text" class="form-control input-lg" placeholder="Choose color" value="{{ optional($color)['dark_blue_text'] }}">-->
															<!--<span class="input-group-append">-->
															<!--	<span class="input-group-text colorpicker-input-addon" data-original-title="" title="" tabindex="0"><i style="background: {{ optional($color)['dark_blue_text'] }};"></i></span>-->
															<!--</span>-->
															<!--</div>-->
                                                        </div>
                                                    </div>

                                                    <!-- image 12 -->
                                                    <div class="col-md-6">
                                                        <div class="form-group">
														<img src="{{ url('images/screenshot/8.png') }}" class="img-thumbnail" width="400px" height="400px">
                                                        </div>
                                                    </div>

													<!-- White Text -->
													<div class="col-md-6">
                                                        <div class="form-group">
															<label class="text-dark" for="red_bg">{{ __('White Text') }} :</label>
																<input name="white_text" class="form-control" type="color" value="{{ optional($color)['white_text'] }}"/>
															<!--<div id="initial-color13" class="input-group colorpicker-element" title="Using input value" data-colorpicker-id="17">-->
															<!--<input type="text" name="white_text" class="form-control input-lg" placeholder="Choose color" value="{{ optional($color)['white_text'] }}">-->
															<!--<span class="input-group-append">-->
															<!--	<span class="input-group-text colorpicker-input-addon" data-original-title="" title="" tabindex="0"><i style="background: {{ optional($color)['white_text'] }};"></i></span>-->
															<!--</span>-->
															<!--</div>-->
                                                        </div>
                                                    </div>

                                                    <!-- image 13 -->
                                                    <div class="col-md-6">
                                                        <div class="form-group">
														<img src="{{ url('images/screenshot/6.png') }}" class="img-thumbnail" width="400px" height="400px">
                                                        </div>
                                                    </div>
                                                    

                                                  </div><!-- row end -->
                                              </div><!-- col end -->
                                          </div>
										  <hr>
										  <!-- row end -->
											
										     <!-- row start -->
											 <div class="row">
                                              
                                              <div class="col-md-12">
                                                  <!-- row start -->
												    <!-- <div>
                                                    <h5 class="card-title">{{ __('Gradient Background Color') }}</h5>
													</div> -->
                                                  <div class="row">
                                                    
													<!-- Gradient Background Color -->
													<div class="col-md-4">
                                                        <div class="form-group">
															<label class="text-dark" for="red_bg">{{ __('Gradient Background') }} :</label>
																<input name="linear_bg_one" class="form-control" type="color" value="{{ optional($color)['linear_bg_one'] }}"/>
															<!--<div id="initial-color14" class="input-group colorpicker-element" title="Using input value" data-colorpicker-id="18">-->
															<!--<input type="text" name="linear_bg_one" class="form-control input-lg" placeholder="Choose color" value="{{ optional($color)['linear_bg_one'] }}">-->
															<!--<span class="input-group-append">-->
															<!--	<span class="input-group-text colorpicker-input-addon" data-original-title="" title="" tabindex="0"><i style="background: {{ optional($color)['linear_bg_one'] }};"></i></span>-->
															<!--</span>-->
															<!--</div>-->
                                                        </div>
                                                    </div>

													<!-- Gradient Background Color -->
													<div class="col-md-4">
                                                        <div class="form-group">
															<label class="text-dark" for="red_bg">{{ __('Gradient Background') }} :</label>
															<input name="linear_bg_two" class="form-control" type="color" value="{{ optional($color)['linear_bg_two'] }}"/>
															<!--<div id="initial-color15" class="input-group colorpicker-element" title="Using input value" data-colorpicker-id="19">-->
															<!--<input type="text" name="linear_bg_two" class="form-control input-lg" placeholder="Choose color" value="{{ optional($color)['linear_bg_two'] }}">-->
															<!--<span class="input-group-append">-->
															<!--	<span class="input-group-text colorpicker-input-addon" data-original-title="" title="" tabindex="0"><i style="background: {{ optional($color)['linear_bg_two'] }};"></i></span>-->
															<!--</span>-->
															<!--</div>-->
                                                        </div>
                                                    </div>

                                                    <!-- image 14 -->
                                                    <div class="col-md-4">
                                                        <div class="form-group">
														<img src="{{ url('images/screenshot/6.png') }}" class="img-thumbnail" width="400px" height="400px">
                                                        </div>
                                                    </div>
                                                                  
                                                  </div><!-- row end -->
                                              </div><!-- col end -->
                                          </div>
                                          <hr>
										  <!-- row end -->

                                            <!-- Reverse Background Gradient Color -->
                                            <!-- row start -->
											 <div class="row">
                                              
                                              <div class="col-md-12">
                                                  <!-- row start -->
												    <!-- <div>
                                                    <h5 class="card-title">{{ __('Reverse Background Gradient Color') }}</h5>
													</div> -->
                                                  <div class="row">
                                                    
													<!-- Gradient Background Color -->
													<div class="col-md-4">
                                                        <div class="form-group">
															<label class="text-dark" for="red_bg">{{ __('Gradient Background') }} :</label>
																<input name="linear_reverse_bg_one" class="form-control" type="color" value="{{ optional($color)['linear_reverse_bg_one'] }}"/>
															<!--<div id="initial-color16" class="input-group colorpicker-element" title="Using input value" data-colorpicker-id="20">-->
															<!--<input type="text" name="linear_reverse_bg_one" class="form-control input-lg" placeholder="Choose color" value="{{ optional($color)['linear_reverse_bg_one'] }}">-->
															<!--<span class="input-group-append">-->
															<!--	<span class="input-group-text colorpicker-input-addon" data-original-title="" title="" tabindex="0"><i style="background: {{ optional($color)['linear_reverse_bg_one'] }};"></i></span>-->
															<!--</span>-->
															<!--</div>-->
                                                        </div>
                                                    </div>

													<!-- Gradient Background Color -->
													<div class="col-md-4">
                                                        <div class="form-group">
															<label class="text-dark" for="red_bg">{{ __('Gradient Background') }} :</label>
															<input name="linear_reverse_bg_two" class="form-control" type="color" value="{{ optional($color)['linear_reverse_bg_two'] }}"/>
															<!--<div id="initial-color17" class="input-group colorpicker-element" title="Using input value" data-colorpicker-id="21">-->
															<!--<input type="text" name="linear_reverse_bg_two" class="form-control input-lg" placeholder="Choose color" value="{{ optional($color)['linear_reverse_bg_two'] }}">-->
															<!--<span class="input-group-append">-->
															<!--	<span class="input-group-text colorpicker-input-addon" data-original-title="" title="" tabindex="0"><i style="background: {{ optional($color)['linear_reverse_bg_two'] }};"></i></span>-->
															<!--</span>-->
															<!--</div>-->
                                                        </div>
                                                    </div>

                                                    <!-- image 15 -->
                                                    <div class="col-md-4">
                                                        <div class="form-group">
														<img src="{{ url('images/screenshot/2.png') }}" class="img-thumbnail" width="400px" height="400px">
                                                        </div>
                                                    </div>

                                                  </div><!-- row end -->
                                              </div><!-- col end -->
                                          </div>
                                          <hr>
										  <!-- row end -->

                                          <!-- About Gradient Background Color -->
                                            <!-- row start -->
											 <div class="row">
                                              
                                              <div class="col-md-12">
                                                  <!-- row start -->
												    <!-- <div>
                                                    <h5 class="card-title">{{ __('About Gradient Background Color') }}</h5>
													</div> -->
                                                  <div class="row">
                                                    
													<!-- Gradient Background Color -->
													<div class="col-md-4">
                                                        <div class="form-group">
															<label class="text-dark" for="red_bg">{{ __('Gradient Background') }} :</label>
																<input name="linear_about_bg_one" class="form-control" type="color" value="{{ optional($color)['linear_about_bg_one'] }}"/>
															<!--<div id="initial-color18" class="input-group colorpicker-element" title="Using input value" data-colorpicker-id="22">-->
															<!--<input type="text" name="linear_about_bg_one" class="form-control input-lg" placeholder="Choose color" value="{{ optional($color)['linear_about_bg_one'] }}">-->
															<!--<span class="input-group-append">-->
															<!--	<span class="input-group-text colorpicker-input-addon" data-original-title="" title="" tabindex="0"><i style="background: {{ optional($color)['linear_about_bg_one'] }};"></i></span>-->
															<!--</span>-->
															<!--</div>-->
                                                        </div>
                                                    </div>

													<!-- Gradient Background Color -->
													<div class="col-md-4">
                                                        <div class="form-group">
															<label class="text-dark" for="red_bg">{{ __('Gradient Background') }} :</label>
															<input name="linear_about_bg_two" class="form-control" type="color" value="{{ optional($color)['linear_about_bg_two'] }}"/>
															<!--<div id="initial-color19" class="input-group colorpicker-element" title="Using input value" data-colorpicker-id="23">-->
															<!--<input type="text" name="linear_about_bg_two" class="form-control input-lg" placeholder="Choose color" value="{{ optional($color)['linear_about_bg_two'] }}">-->
															<!--<span class="input-group-append">-->
															<!--	<span class="input-group-text colorpicker-input-addon" data-original-title="" title="" tabindex="0"><i style="background: {{ optional($color)['linear_about_bg_two'] }};"></i></span>-->
															<!--</span>-->
															<!--</div>-->
                                                        </div>
                                                    </div>

                                                    <!-- image 16 -->
                                                    <div class="col-md-4">
                                                        <div class="form-group">
														<img src="{{ url('images/screenshot/3.png') }}" class="img-thumbnail" width="400px" height="400px">
                                                        </div>
                                                    </div>

                                                  </div><!-- row end -->
                                              </div><!-- col end -->
                                          </div>
										  <!-- row end -->

                                            <!--About Gradient Background Color Two -->
                                            <!-- row start -->
											 <div class="row">
                                              
                                              <div class="col-md-12">
                                                  <!-- row start -->
												    <!-- <div>
                                                    <h5 class="card-title">{{ __('About Gradient Background Color Two') }}</h5>
													</div> -->
                                                  <div class="row">
                                                    
													<!-- Gradient Background Color -->
													<div class="col-md-4">
                                                        <div class="form-group">
															<label class="text-dark" for="red_bg">{{ __('Gradient Background') }} :</label>
															<input name="linear_about_bluebg_one" class="form-control" type="color" value="{{ optional($color)['linear_about_bluebg_one'] }}"/>
															<!--<div id="initial-color20" class="input-group colorpicker-element" title="Using input value" data-colorpicker-id="24">-->
															<!--<input type="text" name="linear_about_bluebg_one" class="form-control input-lg" placeholder="Choose color" value="{{ optional($color)['linear_about_bluebg_one'] }}">-->
															<!--<span class="input-group-append">-->
															<!--	<span class="input-group-text colorpicker-input-addon" data-original-title="" title="" tabindex="0"><i style="background: {{ optional($color)['linear_about_bluebg_one'] }};"></i></span>-->
															<!--</span>-->
															<!--</div>-->
                                                        </div>
                                                    </div>

													<!-- Gradient Background Color -->
													<div class="col-md-4">
                                                        <div class="form-group">
															<label class="text-dark" for="red_bg">{{ __('Gradient Background') }} :</label>
																<input name="linear_about_bluebg_two" class="form-control" type="color" value="{{ optional($color)['linear_about_bluebg_two'] }}"/>
															<!--<div id="initial-color21" class="input-group colorpicker-element" title="Using input value" data-colorpicker-id="25">-->
															<!--<input type="text" name="linear_about_bluebg_two" class="form-control input-lg" placeholder="Choose color" value="{{ optional($color)['linear_about_bluebg_two'] }}">-->
															<!--<span class="input-group-append">-->
															<!--	<span class="input-group-text colorpicker-input-addon" data-original-title="" title="" tabindex="0"><i style="background: {{ optional($color)['linear_about_bluebg_two'] }};"></i></span>-->
															<!--</span>-->
															<!--</div>-->
                                                        </div>
                                                    </div>

                                                    <!-- image 16 -->
                                                    <div class="col-md-4">
                                                        <div class="form-group">
														<img src="{{ url('images/screenshot/4.png') }}" class="img-thumbnail" width="400px" height="400px">
                                                        </div>
                                                    </div>

                                                  </div><!-- row end -->
                                              </div><!-- col end -->
                                          </div>
                                          <hr>
										  <!-- row end -->

                                           <!--Career Gradient Background Color -->
                                            <!-- row start -->
											 <div class="row">
                                              
                                              <div class="col-md-12">
                                                  <!-- row start -->
												    <!-- <div>
                                                    <h5 class="card-title">{{ __('Career Gradient Background Color') }}</h5>
													</div> -->
                                                  <div class="row">
                                                    
													<!-- Gradient Background Color -->
													<div class="col-md-4">
                                                        <div class="form-group">
															<label class="text-dark" for="red_bg">{{ __('Gradient Background') }} :</label>
															<input name="linear_career_bg_one" class="form-control" type="color" value="{{ optional($color)['linear_career_bg_one'] }}"/>
															<!--<div id="initial-color22" class="input-group colorpicker-element" title="Using input value" data-colorpicker-id="26">-->
															<!--<input type="text" name="linear_career_bg_one" class="form-control input-lg" placeholder="Choose color" value="{{ optional($color)['linear_career_bg_one'] }}">-->
															<!--<span class="input-group-append">-->
															<!--	<span class="input-group-text colorpicker-input-addon" data-original-title="" title="" tabindex="0"><i style="background: {{ optional($color)['linear_career_bg_one'] }};"></i></span>-->
															<!--</span>-->
															<!--</div>-->
                                                        </div>
                                                    </div>

													<!-- Gradient Background Color -->
													<div class="col-md-4">
                                                        <div class="form-group">
															<label class="text-dark" for="red_bg">{{ __('Gradient Background') }} :</label>
															<input name="linear_career_bg_two" class="form-control" type="color" value="{{ optional($color)['linear_career_bg_two'] }}"/>
															<!--<div id="initial-color23" class="input-group colorpicker-element" title="Using input value" data-colorpicker-id="27">-->
															<!--<input type="text" name="linear_career_bg_two" class="form-control input-lg" placeholder="Choose color" value="{{ optional($color)['linear_career_bg_two'] }}">-->
															<!--<span class="input-group-append">-->
															<!--	<span class="input-group-text colorpicker-input-addon" data-original-title="" title="" tabindex="0"><i style="background: {{ optional($color)['linear_career_bg_two'] }};"></i></span>-->
															<!--</span>-->
															<!--</div>-->
                                                        </div>
                                                    </div>

                                                    <!-- image 16 -->
                                                    <div class="col-md-4">
                                                        <div class="form-group">
														<img src="{{ url('images/screenshot/5.png') }}" class="img-thumbnail" width="400px" height="400px">
                                                        </div>
                                                    </div>
                                                                  
                                                    <!-- update and reset button -->
                                                    <div class="col-md-12">
                                                        <button type="reset" class="btn btn-danger-rgba mr-1"><i class="fa fa-ban"></i> {{ __("Reset")}}</button>
                                                        <button type="submit" class="btn btn-primary-rgba"><i class="fa fa-check-circle"></i>
                                                            {{ __("Update")}}</button>
                                                    </div>
                                                   

                                                  </div><!-- row end -->
                                              </div><!-- col end -->
                                          </div>
										  <!-- row end -->



                                    </div><!-- card body end -->
                                </div><!-- card end -->
                            </div><!-- col end -->
                        </div><!-- row end -->
                  </form>
                  <!-- form end -->
                </div><!-- card body end -->
            
        </div><!-- col end -->
    </div>
</div>
</div><!-- row end -->
    <br><br>
@endsection
<!-- main content section ended -->
<!-- This section will contain javacsript start -->
@section('script')
 <!-- Color Picker js -->
 <script src="{{ url('admin_assets/assets/plugins/colorpicker/bootstrap-colorpicker.js') }}"></script>
<script src="{{ url('admin_assets/assets/js/custom/custom-form-colorpicker.js') }}"></script>  
@endsection
<!-- This section will contain javacsript end -->