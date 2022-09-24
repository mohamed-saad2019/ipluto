@extends('admin.layouts.master')
@section('title', 'API Setting - Admin')
@section('maincontent')
@component('components.breadcumb',['fourthactive' => 'active'])
@slot('heading')
   {{ __('Api Setting') }}
@endslot
@slot('menu1')
{{ __('Api Setting') }}
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
                    <h5 class="card-box">{{ __('adminstaticword.APISetting') }}</h5>
                </div> 
               
                <!-- card body started -->
                <div class="card-body">
                  <!-- form start -->
                  <form action="{{ route('api.update') }}" method="POST">
		                {{ csrf_field() }}
		                {{ method_field('POST') }}
						
                        <!-- STRIPE PAYMENT start -->
						<div class="row">
							<div class="col-md-12">
                                <div class="form-group">
		                            <label class="text-dark" for="s_enable">{{ __('adminstaticword.STRIPEPAYMENT') }}</label><br>
                                    <input type="checkbox" class="custom_toggle" id="customSwitch1" name="stripe_check" {{ $gsetting->stripe_enable==1 ? 'checked' : '' }} />
                                    <input type="hidden" name="free" value="0" for="status" id="customSwitch1">
                                    <!-- <div class="custom-control custom-switch">
                                        <input type="checkbox" name="stripe_check" class="custom-control-input" id="customSwitch1" {{ $gsetting->stripe_enable==1 ? 'checked' : '' }}/>
                                        <label class="custom-control-label" for="customSwitch1"></label>
                                    </div> -->
                                </div>
		    
		                        <div class="row" style="{{ $gsetting->stripe_enable==1 ? '' : 'display:none' }}" id="s_sec">
		                          <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="text-dark" for="STRIPE_KEY">{{ __('adminstaticword.StripeKey') }} <span class="text-danger">*</span></label>
                                        <input value="{{ $env_files['STRIPE_KEY'] }}" autofocus name="STRIPE_KEY" type="text" class="form-control" placeholder="Enter Stripe Key"/>
                                    </div>
                                  </div>

				                  <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="text-dark" for="s_secretkey">{{ __('adminstaticword.StripeSecretKey') }} <span class="text-danger">*</span></label>
                                        <input value="{{ $env_files['STRIPE_SECRET'] }}" autofocus name="STRIPE_SECRET" type="text" class="form-control" placeholder="Enter Stripe Secret Key"/>
                                    </div>
                                </div>
				              	</div>
		                    </div>
		                </div>
                         <!-- STRIPE PAYMENT end -->
						
                         <!-- PAYPAL PAYMENT start -->
		              	<div class="row">
							<div class="col-md-12">
                                <div class="form-group">
                                    <label class="text-dark" for="pay_enable">{{ __('adminstaticword.PAYPALPAYMENT') }}</label><br>
                                    <input type="checkbox" class="custom_toggle" id="customSwitch2" name="paypal_check" {{ $gsetting->paypal_enable==1 ? 'checked' : '' }} />
                                    <input type="hidden" name="free" value="0" for="status" id="customSwitch2">
                                    <!-- <div class="custom-control custom-switch">
                                        <input type="checkbox" name="paypal_check" class="custom-control-input" id="customSwitch2" {{ $gsetting->paypal_enable==1 ? 'checked' : '' }}/>
                                        <label class="custom-control-label" for="customSwitch2"></label>
                                    </div> -->
                                </div>
		                        
		                        <div class="row" style="{{ $gsetting->paypal_enable==1 ? '' : 'display:none' }}" id="pay_sec">
					                <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="text-dark" for="pay_cid">{{ __('adminstaticword.PaypalClientID') }} <span class="text-danger">*</span></label>
                                            <input value="{{ $env_files['PAYPAL_CLIENT_ID'] }}" autofocus name="PAYPAL_CLIENT_ID" type="text" class="form-control" placeholder="Enter Paypal Client ID"/>
                                        </div>
					                </div>

					                <div class="col-md-6">
                                        <div class="form-group">
					                        <label class="text-dark" for="pay_sid">{{ __('adminstaticword.PaypalSecretID') }} <span class="text-danger">*</span></label>
					                        <input value="{{ $env_files['PAYPAL_SECRET'] }}" autofocus name="PAYPAL_SECRET" type="text" class="form-control" placeholder="Enter Paypal Secret ID"/>
					                    </div>
					                </div>

				                  	<div class="col-md-6">
                                        <div class="form-group">
                                            <label class="text-dark" for="pay_mode">{{ __('adminstaticword.PaypalMode') }} <span class="text-danger">*</span></label>
                                            <input value="{{ $env_files['PAYPAL_MODE'] }}" autofocus name="PAYPAL_MODE" type="text" class="form-control" placeholder="Enter Paypal Mode"/>
                                            <small class="text-muted"><i class="fa fa-question-circle"></i> For Test use <b>"sandbox"</b> and for Live use <b>"live"</b></small>
				                  	    </div>
                                    </div>

				              	</div>
		                    </div>
		                </div>
                        <!-- PAYPAL PAYMENT end -->
                        <!-- INSTAMOJOPAYMENT start -->
						<div class="row">
							<div class="col-md-12">
                                <div class="form-group">
		                        <label class="text-dark" for="pay_enable">{{ __('adminstaticword.INSTAMOJOPAYMENT') }}</label><br>
                                    <input type="checkbox" class="custom_toggle" id="customSwitch3" name="instamojo_check" {{ $gsetting->instamojo_enable==1 ? 'checked' : '' }} />
                                    <input type="hidden" name="free" value="0" for="status" id="customSwitch3">
                                <!-- <div class="custom-control custom-switch">
                                    <input type="checkbox" name="instamojo_check" class="custom-control-input" id="customSwitch3" {{ $gsetting->instamojo_enable==1 ? 'checked' : '' }} />
                                    <label class="custom-control-label" for="customSwitch3"></label>
                                </div> -->
                                </div>
		                
		                        
		                        <div class="row" style="{{ $gsetting->instamojo_enable==1 ? '' : 'display:none' }}" id="insta_sec">
					                <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="text-dark" for="pay_cid">{{ __('adminstaticword.InstaMojoApiKey') }} <span class="text-danger">*</span></label>
                                            <input value="{{ $env_files['IM_API_KEY'] }}" autofocus name="IM_API_KEY" type="text" class="form-control" placeholder="Enter InstaMojo Api Key"/>
					                    </div>
					                </div>

					                <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="text-dark" for="pay_sid">{{ __('adminstaticword.InstaMojoAuthToken') }} <span class="text-danger">*</span></label>
                                            <input value="{{ $env_files['IM_AUTH_TOKEN'] }}" autofocus name="IM_AUTH_TOKEN" type="text" class="form-control" placeholder="Enter InstaMojo Auth Token"/>
					                    </div>
					                </div>

				                  	<div class="col-md-6">
                                      <div class="form-group">
				                    	<label class="text-dark" for="pay_mode">{{ __('adminstaticword.InstaMojoURL') }} <span class="text-danger">*</span></label>
				                    	<input value="{{ $env_files['IM_URL'] }}" autofocus name="IM_URL" type="text" class="form-control" placeholder="Enter InstaMojo Url"/>
				                    	<small class="text-muted"><i class="fa fa-question-circle"></i> For Test use <b>https://test.instamojo.com/api/1.1/</b> <br>
				                    	<i class="fa fa-question-circle"></i> For Live use <b>https://www.instamojo.com/api/1.1/</b></small>
				                  	</div>
                                    </div>

				                  	<div class="col-md-6">
                                      <div class="form-group">
				                    	<label class="text-dark" for="pay_mode">{{ __('InstaMojo Refund URL ') }} <span class="text-danger">*</span></label>
				                    	<input value="{{ $env_files['IM_REFUND_URL'] }}" autofocus name="IM_REFUND_URL" type="text" class="form-control" placeholder="Enter InstaMojo Url"/>
				                    	<small class="text-muted"><i class="fa fa-question-circle"></i> For Test use <b>https://test.instamojo.com/api/1.1/refunds/</b> <br>
				                    	<i class="fa fa-question-circle"></i> For Live use <b>https://instamojo.com/api/1.1/refunds/</b></small>
				                  	    </div>
                                    </div>
				              	</div>
		                    </div>
		                </div>
                        <!-- INSTAMOJOPAYMENT end -->
                        <!-- RAZORPAYPAYMENT start -->
						<div class="row">
							<div class="col-md-12">
                                <div class="form-group">
		                        <label class="text-dark" for="razorpay_enable">{{ __('adminstaticword.RAZORPAYPAYMENT') }}</label><br>
                                <input type="checkbox" class="custom_toggle" id="customSwitch4" name="razor_check" {{ $gsetting->razorpay_enable==1 ? 'checked' : '' }} />
                                <input type="hidden" name="free" value="0" for="status" id="customSwitch4">
                                <!-- <div class="custom-control custom-switch">
                                    <input type="checkbox" name="razor_check" class="custom-control-input" id="customSwitch4" {{ $gsetting->razorpay_enable==1 ? 'checked' : '' }} />
                                    <label class="custom-control-label" for="customSwitch4"></label>
                                </div> -->
                                </div>
		        
		                        <div class="row" style="{{ $gsetting->razorpay_enable==1 ? '' : 'display:none' }}" id="razor_sec">
		                            <div class="col-md-6">
                                        <div class="form-group">
                                        <label class="text-dark" for="RAZORPAY_KEY">{{ __('adminstaticword.RazorpayKey') }} <span class="text-danger">*</span></label>
                                        <input value="{{ $env_files['RAZORPAY_KEY'] }}" autofocus name="RAZORPAY_KEY" type="text" class="form-control" placeholder="Enter Razorpay Key"/>
                                        </div>
				                    </div>

				                  <div class="col-md-6">
                                  <div class="form-group">
				                    <label class="text-dark" for="RAZORPAY_SECRET">{{ __('adminstaticword.RazorpaySecretKey') }} <span class="text-danger">*</span></label>
				                    <input value="{{ $env_files['RAZORPAY_SECRET'] }}" autofocus name="RAZORPAY_SECRET" type="text" class="form-control" placeholder="Enter Razorpay Secret Key"/>
				                  </div>
                                  </div>
				              	</div>
		                    </div>
		                </div>
						<!-- RAZORPAYPAYMENT end -->
                        <!-- PAYSTACKPAYMENT start -->
		              	<div class="row">
							<div class="col-md-12">
                                <div class="form-group">
                                    <label class="text-dark" for="paystack_enable">{{ __('adminstaticword.PAYSTACKPAYMENT') }}</label><br>
                                    <input type="checkbox" class="custom_toggle" id="customSwitch5" name="paystack_check" {{ $gsetting->paystack_enable==1 ? 'checked' : '' }} />
                                    <input type="hidden" name="free" value="0" for="status" id="customSwitch5">
                                    <!-- <div class="custom-control custom-switch">
                                        <input type="checkbox" name="paystack_check" class="custom-control-input" id="customSwitch5" {{ $gsetting->paystack_enable==1 ? 'checked' : '' }} />
                                        <label class="custom-control-label" for="customSwitch5"></label>
                                    </div> -->
                                </div>
		                       
		                        <div class="row" style="{{ $gsetting->paystack_enable==1 ? '' : 'display:none' }}" id="paystack_sec">
		                          <div class="col-md-6">
                                  <div class="form-group">
				                    <label class="text-dark" for="RAZORPAY_KEY">{{ __('adminstaticword.PayStackPublicKey') }} <span class="text-danger">*</span></label>
				                    <input value="{{ $env_files['PAYSTACK_PUBLIC_KEY'] }}" autofocus name="PAYSTACK_PUBLIC_KEY" type="text" class="form-control" placeholder="Enter Paystack Public Key"/>
				                  </div>
                                  </div>

				                  <div class="col-md-6">
                                  <div class="form-group">
				                    <label class="text-dark" for="RAZORPAY_SECRET">{{ __('adminstaticword.PayStackSecretKey') }} <span class="text-danger">*</span></label>
				                    <input value="{{ $env_files['PAYSTACK_SECRET_KEY'] }}" autofocus name="PAYSTACK_SECRET_KEY" type="text" class="form-control" placeholder="Enter Paystack Secret Key"/>
                                    </div>
				                  </div>

				              
		                          <div class="col-md-6">
                                  <div class="form-group">
				                    <label class="text-dark" for="RAZORPAY_KEY">{{ __('adminstaticword.PayStackPaymentUrl') }} <span class="text-danger">*</span></label>
				                    <input value="{{ $env_files['PAYSTACK_PAYMENT_URL'] }}" autofocus name="PAYSTACK_PAYMENT_URL" type="text" class="form-control" placeholder="Enter Paystack Payment URL"/>
				                    <small class="text-muted"><i class="fa fa-question-circle"></i> use <b>https://api.paystack.co</b> </small>
				                    </div>
				                  </div>

				                  <div class="col-md-6">
                                  <div class="form-group">
				                    <label class="text-dark" for="RAZORPAY_SECRET">{{ __('adminstaticword.PayStackMerchantEmail') }} <span class="text-danger">*</span></label>
				                    <input value="{{ $env_files['PAYSTACK_MERCHANT_EMAIL'] }}" autofocus name="PAYSTACK_MERCHANT_EMAIL" type="text" class="form-control" placeholder="Enter Paystack Merchant Email"/>
				                    <small class="text-muted"><i class="fa fa-question-circle"></i> use <b>Paystack email</b> </small>
                                    </div>

				                  </div>
				                  


				                  <div class="col-md-6">
                                  <div class="form-group">
				                    <label class="text-dark" for="RAZORPAY_SECRET">{{ __('adminstaticword.PaystackCallbackURL') }} <span class="text-danger">*</span></label>
				                    <input value="{{ url('callback') }}" autofocus type="text" class="form-control" placeholder="" disabled/>
				                    <small class="text-muted"><i class="fa fa-question-circle"></i> use <b>this callback url in Paystack account</b> </small>
				                  </div>
                                  </div>
				              	</div>
		                    </div>
		                </div>
						<!-- PAYSTACKPAYMENT end -->

						<div class="row">
							<div class="col-md-12">
                                <div class="form-group">
		                        <label class="text-dark" for="s_enable">{{ __('adminstaticword.PAYTMPAYMENT') }}</label><br>
                                <input type="checkbox" class="custom_toggle" id="customSwitch6" name="paytm_check" {{ $gsetting->paytm_enable==1 ? 'checked' : '' }} />
                                <input type="hidden" name="free" value="0" for="status" id="customSwitch6">
                                <!-- <div class="custom-control custom-switch">
                                    <input type="checkbox" name="paytm_check" class="custom-control-input" id="customSwitch6" {{ $gsetting->paytm_enable==1 ? 'checked' : '' }} />
                                    <label class="custom-control-label" for="customSwitch6"></label>
                                </div> -->
                                </div>
		                       
		                        <div class="row" style="{{ $gsetting->paytm_enable==1 ? '' : 'display:none' }}" id="paytm_sec">

		                          <div class="col-md-6">
		                          	<div class="form-group">
					                    <label class="text-dark" for="PAYTM_ENVIRONMENT">{{ __('adminstaticword.PaytmEnviroment') }} <span class="text-danger">*</span></label>
					                    <small class="text-muted"><i class="fa fa-question-circle"></i> For Test use <b>"local"</b> and for Live use <b>"production"</b></small>
					                    <input value="{{ $env_files['PAYTM_ENVIRONMENT'] }}" autofocus name="PAYTM_ENVIRONMENT" type="text" class="form-control" placeholder="Enter Paytm Enviroment"/>
					                    
				                    </div>
				                  </div>

				                  <div class="col-md-6">
				                  	<div class="form-group">
					                    <label class="text-dark" for="PAYTM_MERCHANT_ID">{{ __('adminstaticword.PaytmMerchantID') }} <span class="text-danger">*</span></label>
					                    <input value="{{ $env_files['PAYTM_MERCHANT_ID'] }}" autofocus name="PAYTM_MERCHANT_ID" type="text" class="form-control" placeholder="Enter Paytm Merchant Id"/>

					                </div>
				                  </div>

				                  <div class="col-md-6">
				                  	<div class="form-group">
					                    <label class="text-dark" for="PAYTM_MERCHANT_KEY">{{ __('adminstaticword.PaytmMerchantKey') }} <span class="text-danger">*</span></label>
					                    <input value="{{ $env_files['PAYTM_MERCHANT_KEY'] }}" autofocus name="PAYTM_MERCHANT_KEY" type="text" class="form-control" placeholder="Enter Paytm Merchant Key"/>
					                </div>
				                  </div>

				                  <div class="col-md-6">
				                  	<div class="form-group">
					                    <label class="text-dark" for="PAYTM_MERCHANT_WEBSITE">{{ __('adminstaticword.PaytmMerchantWebsite') }} <span class="text-danger">*</span></label>
					                    <input value="{{ $env_files['PAYTM_MERCHANT_WEBSITE'] }}" autofocus name="PAYTM_MERCHANT_WEBSITE" type="text" class="form-control" placeholder="Enter Paytm Merchant Website"/>
					                </div>
				                  </div>

				                  <div class="col-md-6">
				                  	<div class="form-group">
					                    <label class="text-dark" for="PAYTM_CHANNEL">{{ __('adminstaticword.PaytmChannel') }} <span class="text-danger">*</span></label>
					                    <input value="{{ $env_files['PAYTM_CHANNEL'] }}" autofocus name="PAYTM_CHANNEL" type="text" class="form-control" placeholder="Enter Paytm Channel"/>
					                </div>
				                  </div>

				                  <div class="col-md-6">
				                  	<div class="form-group">
					                    <label class="text-dark" for="PAYTM_INDUSTRY_TYPE">{{ __('adminstaticword.PaytmIndustryType') }} <span class="text-danger">*</span></label>
					                    <input value="{{ $env_files['PAYTM_INDUSTRY_TYPE'] }}" autofocus name="PAYTM_INDUSTRY_TYPE" type="text" class="form-control" placeholder="Enter Paytm Industry Type"/>
					                </div>
				                  </div>

				              	</div>
		                    </div>
		                </div>
						<br>

						<div class="row">
							<div class="col-md-12">
                                <div class="form-group">
		                        <label class="text-dark" for="s_enable">{{ __('adminstaticword.ReCaptcha') }}</label><br>
                                <input type="checkbox" class="custom_toggle" id="customSwitch7" name="captcha_check" {{ $gsetting->captcha_enable == 1 ? 'checked' : '' }} />
                                <input type="hidden" name="free" value="0" for="status" id="customSwitch7">
                                <!-- <div class="custom-control custom-switch">
                                    <input type="checkbox" name="captcha_check" class="custom-control-input" id="customSwitch7" {{ $gsetting->captcha_enable == 1 ? 'checked' : '' }} />
                                    <label class="custom-control-label" for="customSwitch7"></label>
                                </div> -->
                                </div>
		                       
		                        <div class="row" style="{{ $gsetting->captcha_enable==1 ? '' : 'display:none' }}" id="captcha_sec">

				                  <div class="col-md-6">
				                  	<div class="form-group">
					                    <label class="text-dark" for="PAYTM_CHANNEL">{{ __('adminstaticword.CaptchaSiteKey') }} <span class="text-danger">*</span></label>
					                    <input value="{{ $env_files['NOCAPTCHA_SITEKEY'] }}" autofocus name="NOCAPTCHA_SITEKEY" type="text" class="form-control" placeholder="Enter Captcha Site Key"/>
					                </div>
				                  </div>

				                  <div class="col-md-6">
				                  	<div class="form-group">
					                    <label class="text-dark" for="PAYTM_INDUSTRY_TYPE">{{ __('adminstaticword.CaptchaSecretKey') }} <span class="text-danger">*</span></label>
					                    <input value="{{ $env_files['NOCAPTCHA_SECRET'] }}" autofocus name="NOCAPTCHA_SECRET" type="text" class="form-control" placeholder="Enter Captcha Secret Key"/>
					                </div>
				                  </div>

				              	</div>
		                    </div>
		                </div>
						<br>

						<div class="row">
							<div class="col-md-12">
                            <div class="form-group">
		                        <label class="text-dark" for="aws_enable">{{ __('adminstaticword.AWSSettings') }}</label><br>
                                <input type="checkbox" class="custom_toggle" id="customSwitch8" name="aws_check" {{ $gsetting->aws_enable == 1 ? 'checked' : '' }} />
                                <input type="hidden" name="free" value="0" for="status" id="customSwitch8">
                                <!-- <div class="custom-control custom-switch">
                                    <input type="checkbox" name="aws_check" class="custom-control-input" id="customSwitch8" {{ $gsetting->aws_enable == 1 ? 'checked' : '' }} />
                                    <label class="custom-control-label" for="customSwitch8"></label>
                                </div> -->
                                </div>
		                        
		                        <div class="row" style="{{ $gsetting->aws_enable==1 ? '' : 'display:none' }}" id="aws_sec">

				                  <div class="col-md-6">
				                  	<div class="form-group">
					                    <label class="text-dark" for="AWS_ACCESS_KEY_ID">{{ __('adminstaticword.AWSAccessKeyID') }} <span class="text-danger">*</span></label>
					                    <input value="{{ $env_files['AWS_ACCESS_KEY_ID'] }}" autofocus name="AWS_ACCESS_KEY_ID" type="text" class="form-control" placeholder="Enter AWS Access Key Id"/>
					                </div>
				                  </div>

				                  <div class="col-md-6">
				                  	<div class="form-group">
					                    <label class="text-dark" for="AWS_SECRET_ACCESS_KEY">{{ __('adminstaticword.AWSSecretAccessKey') }} <span class="text-danger">*</span></label>
					                    <input value="{{ $env_files['AWS_SECRET_ACCESS_KEY'] }}" autofocus name="AWS_SECRET_ACCESS_KEY" type="text" class="form-control" placeholder="Enter AWS Secret Access Key"/>
					                </div>
				                  </div>

				                  <div class="col-md-6">
				                  	<div class="form-group">
					                    <label class="text-dark" for="AWS_DEFAULT_REGION">{{ __('adminstaticword.AWSDefaultRegion') }} <span class="text-danger">*</span></label>
					                    <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="top" title="eg:ap-south-1"></i>
					                    <input value="{{ $env_files['AWS_DEFAULT_REGION'] }}" autofocus name="AWS_DEFAULT_REGION" type="text" class="form-control" placeholder="Enter AWS Default Region"/>
					                </div>
				                  </div>

				                  <div class="col-md-6">
				                  	<div class="form-group">
					                    <label class="text-dark" for="AWS_BUCKET">{{ __('adminstaticword.AWSBucketName') }} <span class="text-danger">*</span></label>
					                    <input value="{{ $env_files['AWS_BUCKET'] }}" autofocus name="AWS_BUCKET" type="text" class="form-control" placeholder="Enter AWS Bucket Name"/>
					                </div>
				                  </div>

				                  <div class="col-md-6">
				                  	<div class="form-group">
					                    <label class="text-dark" for="AWS_URL">{{ __('adminstaticword.AWSURL') }} <span class="text-danger">*</span></label>
					                    <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="top" title="eg:https://bucket-name.s3.Region.amazonaws.com/"></i>
					                    <input value="{{ $env_files['AWS_URL'] }}" autofocus name="AWS_URL" type="text" class="form-control" placeholder="Enter AWS URL eg:https://bucket-name.s3.Region.amazonaws.com/"/>

					                    <small class="text-muted"><i class="fa fa-question-circle"></i>  eg: https://bucket-name.s3.Region.amazonaws.com/</small>
					                </div>
				                  </div>

				              	</div>
		                    </div>
		                </div>
						<br>


						<div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                <label class="text-dark" for="enable_omise">{{ __('Omise Payment Setting') }}</label><br>
                                <input type="checkbox" class="custom_toggle" id="customSwitch9" name="enable_omise" {{ $gsetting->enable_omise == 1 ? 'checked' : '' }} />
                                <input type="hidden" name="free" value="0" for="status" id="customSwitch9">
                                <!-- <div class="custom-control custom-switch">
                                    <input type="checkbox" name="enable_omise" class="custom-control-input" id="customSwitch9" {{ $gsetting->enable_omise == 1 ? 'checked' : '' }} />
                                    <label class="custom-control-label" for="customSwitch9"></label>
                                </div> -->
                                </div>

                                <div class="row" style="{{ $gsetting->enable_omise == 1 ? '' : 'display:none' }}"
                                    id="omise_sec">

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="text-dark" for="OMISE_PUBLIC_KEY">{{ __('OMISE PUBLIC KEY') }}<sup
                                                    class="redstar">*</sup></label>
                                            <input value="{{ env('OMISE_PUBLIC_KEY') }}" autofocus
                                                name="OMISE_PUBLIC_KEY" type="text" class="form-control"
                                                placeholder="Enter omise app public key" />

                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="text-dark" for="OMISE_SECRET_KEY">{{ __('Omise Secret Key') }} <span class="text-danger">*</span></label>
                                            <input value="{{ env('OMISE_SECRET_KEY') }}" autofocus
                                                name="OMISE_SECRET_KEY" type="text" class="form-control"
                                                placeholder="Enter omise secret key" />

                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="text-dark" for="OMISE_API_VERSION">{{ __('OMISE API VERSION') }} <span class="text-danger">*</span></label>
                                            <input value="{{ env('OMISE_API_VERSION') }}" autofocus
                                                name="OMISE_API_VERSION" type="text" class="form-control"
                                                placeholder="Enter omise api version" />
                                            <small class="text-muted">
                                                • Check API VERSION <a
                                                    href="https://dashboard.omise.co/api-version/edit">HERE</a>
                                            </small>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <br>

                        <div class="row">
                            <div class="col-md-12">
                            <div class="form-group">
                                <label class="text-dark" for="s_enable">{{ __('PayUBiz/Money Payment Setting') }}</label><br>
                                <input type="checkbox" class="custom_toggle" id="customSwitch10" name="enable_payu" {{ $gsetting->enable_payu == 1 ? 'checked' : '' }} />
                                <input type="hidden" name="free" value="0" for="status" id="customSwitch10">
                                <!-- <div class="custom-control custom-switch">
                                    <input type="checkbox" name="enable_payu" class="custom-control-input" id="customSwitch10" {{ $gsetting->enable_payu == 1 ? 'checked' : '' }} />
                                    <label class="custom-control-label" for="customSwitch10"></label>
                                </div> -->
                                </div>
                              
                                <div class="row" style="{{ $gsetting->enable_payu == 1 ? '' : 'display:none' }}"
                                    id="payu_sec">

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="text-dark" for="PAYU_DEFAULT">{{ __('PAYU DEFAULT') }} <span class="text-danger">*</span></label>
                                            <input value="{{ env('PAYU_DEFAULT') }}" autofocus name="PAYU_DEFAULT"
                                                type="text" class="form-control" placeholder="Choose Payu Enviroment" />
                                            <small class="text-muted"><i class="fa fa-question-circle"></i> Choose
                                                <b>"payubiz"</b> or <b>"payumoney"</b> option</small>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="text-dark" for="PAYU_METHOD">{{ __('PAYU METHOD') }} <span class="text-danger">*</span></label>
                                            <input value="{{ env('PAYU_METHOD') }}" autofocus name="PAYU_METHOD"
                                                type="text" class="form-control"
                                                placeholder="Choose PAYU METHOD Enviroment" />

                                            <small class="text-muted"><i class="fa fa-question-circle"></i> For Test use
                                                <b>"test"</b> and for Live use <b>"secure"</b> method</small>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="text-dark" for="PAYU_MERCHANT_KEY">{{ __('PAYU MERCHANT KEY') }} <span class="text-danger">*</span></label>
                                            <input value="{{ env('PAYU_MERCHANT_KEY') }}" autofocus
                                                name="PAYU_MERCHANT_KEY" type="text" class="form-control"
                                                placeholder="Enter PAYU MERCHANT KEY" />
                                            <small class="text-muted"><i class="fa fa-question-circle"></i> Enter Payu
                                                Merchant key.</small>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="text-dark" for="PAYU_MERCHANT_SALT">{{ __('PAYU MERCHANT SALT') }} <span class="text-danger">*</span></label>
                                            <input value="{{ env('PAYU_MERCHANT_SALT') }}" autofocus
                                                name="PAYU_MERCHANT_SALT" type="text" class="form-control"
                                                placeholder="Enter PAYU MERCHANT SALT" />
                                            <small class="text-muted"><i class="fa fa-question-circle"></i> Enter Payu
                                                Merchant salt key.</small>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="text-dark" for="PAYU_AUTH_HEADER">{{ __('PAYU AUTH HEADER') }}</label>
                                            <input value="{{ env('PAYU_AUTH_HEADER') }}" autofocus
                                                name="PAYU_AUTH_HEADER" type="text" class="form-control"
                                                placeholder="Enter PAYU AUTH HEADER" />
                                            <small class="text-muted"><i class="fa fa-question-circle"></i> Required if
                                                method is <b>Payumoney</b></small>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="text-dark" for="payu_money">{{ __('PayU Money Account ?') }} <span class="text-danger">*</span></label><br>
                                            <input type="checkbox" class="custom_toggle" id="customSwitch11" name="payu_money" {{ env('PAYU_MONEY_TRUE') == true ? 'checked' : '' }} />
                                            <input type="hidden" name="free" value="0" for="status" id="customSwitch11">
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <br>

                        <div class="row">
                            <div class="col-md-12">
                                <label class="text-dark" for="s_enable">{{ __('Moli Payment Setting') }}</label><br>
                                <input type="checkbox" class="custom_toggle" id="customSwitch12" name="enable_moli" {{ $gsetting->enable_moli == 1 ? 'checked' : '' }} />
                                <input type="hidden" name="free" value="0" for="status" id="customSwitch12">
                                <!-- <div class="custom-control custom-switch">
                                    <input type="checkbox" name="enable_moli" class="custom-control-input" id="customSwitch12" {{ $gsetting->enable_moli == 1 ? 'checked' : '' }} />
                                    <label class="custom-control-label" for="customSwitch12"></label>
                                </div> -->
                                <!-- <li class="tg-list-item">
                                    <input class="tgl tgl-skewed" id="enable_moli" type="checkbox" name="enable_moli"
                                        {{ $gsetting->enable_moli == 1 ? 'checked' : '' }} />
                                    <label class="tgl-btn" data-tg-off="OFF" data-tg-on="ON" for="enable_moli"></label>
                                </li> -->


                                <br>
                                <div class="row" style="{{ $gsetting->enable_moli == 1 ? '' : 'display:none' }}"
                                    id="moli_sec">

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="text-dark" for="MOLLIE_KEY">{{ __('MOLI API KEY') }} <span class="text-danger">*</span></label>
                                            <input value="{{ env('MOLLIE_KEY') }}" autofocus name="MOLLIE_KEY"
                                                type="text" class="form-control" placeholder="Enter Moli Api Key" />
                                            <small class="text-muted"><i class="fa fa-question-circle"></i> Enter Moli
                                                Api Key</small>
                                            <br>
                                            <small class="text-muted">
                                                <b>Supported Moli Currency</b> : <a title="Moli Supported Currency List"
                                                    href="https://docs.mollie.com/payments/multicurrency">https://docs.mollie.com/payments/multicurrency</a>
                                            </small>
                                        </div>
                                    </div>



                                </div>
                            </div>
                        </div>

                        <br>

                        <div class="row">
                            <div class="col-md-12">
                                <label class="text-dark" for="s_enable">{{ __('Cashfree Payment Setting') }}</label><br>
                                <input type="checkbox" class="custom_toggle" id="customSwitch13" name="enable_cashfree" {{ $gsetting->enable_cashfree == 1 ? 'checked' : '' }} />
                                <input type="hidden" name="free" value="0" for="status" id="customSwitch13">
                                <!-- <div class="custom-control custom-switch">
                                    <input type="checkbox" name="enable_cashfree" class="custom-control-input" id="customSwitch13" {{ $gsetting->enable_cashfree == 1 ? 'checked' : '' }} />
                                    <label class="custom-control-label" for="customSwitch13"></label>
                                </div> -->
                                <!-- <li class="tg-list-item">
                                    <input class="tgl tgl-skewed" id="enable_cashfree" type="checkbox"
                                        name="enable_cashfree" {{ $gsetting->enable_cashfree == 1 ? 'checked' : '' }} />
                                    <label class="tgl-btn" data-tg-off="OFF" data-tg-on="ON"
                                        for="enable_cashfree"></label>
                                </li> -->
                                <br>
                                <div class="row" style="{{ $gsetting->enable_cashfree == 1 ? '' : 'display:none' }}"
                                    id="cf_sec">

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="text-dark" for="CASHFREE_APP_ID">{{ __('CASHFREE APP ID') }} <span class="text-danger">*</span></label>
                                            <input value="{{ env('CASHFREE_APP_ID') }}" autofocus name="CASHFREE_APP_ID"
                                                type="text" class="form-control" placeholder="Enter cashfree app id" />
                                            <small class="text-muted"><i class="fa fa-question-circle"></i> Please enter
                                                Cashfree <b>APP ID</b></small>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="text-dark" for="CASHFREE_SECRET_KEY">{{ __('CASHFREE SECRET KEY') }} <span class="text-danger">*</span></label>
                                            <input value="{{ env('CASHFREE_SECRET_KEY') }}" autofocus
                                                name="CASHFREE_SECRET_KEY" type="text" class="form-control"
                                                placeholder="Enter CASHFREE SECRET KEY " />
                                            <small class="text-muted"><i class="fa fa-question-circle"></i> Please enter
                                                Cashfree <b>Secret Key</b></small>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="text-dark" for="CASHFREE_END_POINT">{{ __('CASHFREE END POINT') }} <span class="text-danger">*</span></label>
                                            <input value="{{ env('CASHFREE_END_POINT') }}" autofocus
                                                name="CASHFREE_END_POINT" type="text" class="form-control"
                                                placeholder="Enter Cashfree end point Url" />
                                            <small class="text-muted"><i class="fa fa-question-circle"></i>
                                                • For <b>Live</b> use : https://api.cashfree.com
                                                <b>|</b>
                                                • For <b>Test</b> use : https://test.cashfree.com
                                            </small>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <br>

                        <div class="row">
                            <div class="col-md-12">
                                <label class="text-dark" for="s_enable">{{ __('Skrill Payment Setting') }}</label><br>
                                <input type="checkbox" class="custom_toggle" id="customSwitch14" name="enable_skrill" {{ $gsetting->enable_skrill == 1 ? 'checked' : '' }}  />
                                <input type="hidden" name="free" value="0" for="status" id="customSwitch14">
                                <!-- <div class="custom-control custom-switch">
                                    <input type="checkbox" name="enable_skrill" class="custom-control-input" id="customSwitch14" {{ $gsetting->enable_skrill == 1 ? 'checked' : '' }} />
                                    <label class="custom-control-label" for="customSwitch14"></label>
                                </div> -->
                                <br>
                                <div class="row" style="{{ $gsetting->enable_skrill == 1 ? '' : 'display:none' }}"
                                    id="sk_sec">

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="text-dark" for="SKRILL_MERCHANT_EMAIL">{{ __('SKRILL MERCHANT EMAIL') }} <span class="text-danger">*</span></label>
                                            <input value="{{ env('SKRILL_MERCHANT_EMAIL') }}" autofocus
                                                name="SKRILL_MERCHANT_EMAIL" type="text" class="form-control"
                                                placeholder="Enter skrill merchant email" />
                                            <small class="text-muted"><i class="fa fa-question-circle"></i> For
                                                <b>test</b> use <b>demoqco@sun-fish.com</b></small>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="text-dark" for="SKRILL_API_PASSWORD">{{ __('SKRILL API PASSWORD') }} <span class="text-danger">*</span></label>
                                            <input value="{{ env('SKRILL_API_PASSWORD') }}" autofocus
                                                name="SKRILL_API_PASSWORD" type="text" class="form-control"
                                                placeholder="Enter skrill api password" />
                                            <small class="text-muted"><i class="fa fa-question-circle"></i> For
                                                <b>test</b> use <b>skrill</b></small>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="text-dark" for="SKRILL_LOGO_URL">{{ __('SKRILL APP LOGO URL') }}</label>
                                            <input value="{{ env('SKRILL_LOGO_URL') }}" autofocus name="SKRILL_LOGO_URL"
                                                type="url" class="form-control" placeholder="Enter app logo url" />
                                            <small class="text-muted"><i class="fa fa-question-circle"></i>Enter your
                                                site logo url here.</small>
                                        </div>
                                    </div>




                                </div>
                            </div>
                        </div>

                        <br>

                        <div class="row">
                            <div class="col-md-12">
                                <label class="text-dark" for="enable_rave">{{ __('FlutterRave Payment Setting') }}</label><br>
                                <input type="checkbox" class="custom_toggle" id="customSwitch15" name="enable_rave" {{ $gsetting->enable_rave == 1 ? 'checked' : '' }}/>
                                <input type="hidden" name="free" value="0" for="status" id="customSwitch15">
                                
                               
                                <br>
                                <div class="row" style="{{ $gsetting->enable_rave == 1 ? '' : 'display:none' }}"
                                    id="rave_sec">

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="text-dark" for="RAVE_PUBLIC_KEY">{{ __('RAVE PUBLIC KEY') }} <span class="text-danger">*</span></label>
                                            <input value="{{ env('RAVE_PUBLIC_KEY') }}" autofocus name="RAVE_PUBLIC_KEY"
                                                type="text" class="form-control"
                                                placeholder="Enter rave public email" />
                                            <small class="text-muted"><i class="fa fa-question-circle"></i> Public Key:
                                                Your Rave publicKey. Sign up on <a
                                                    href="https://rave.flutterwave.com/">https://rave.flutterwave.com/</a>
                                                to get one from your settings page</small>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="text-dark" for="RAVE_SECRET_KEY">{{ __('RAVE SECRET KEY') }} <span class="text-danger">*</span></label>
                                            <input value="{{ env('RAVE_SECRET_KEY') }}" autofocus name="RAVE_SECRET_KEY"
                                                type="text" class="form-control" placeholder="Enter rave secret key" />
                                            <small class="text-muted"><i class="fa fa-question-circle"></i> Secret Key:
                                                Your Rave secretKey. Sign up on <a
                                                    href="https://rave.flutterwave.com/">https://rave.flutterwave.com/</a>
                                                to get one from your settings page</small>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="text-dark" for="RAVE_SECRET_HASH">{{ __('RAVE SECRET HASH') }} <span class="text-danger">*</span></label>
                                            <input value="{{ env('RAVE_SECRET_HASH') }}" autofocus name="RAVE_SECRET_KEY"
                                                type="text" class="form-control" placeholder="Enter rave secret hash" />
                                            <small class="text-muted"><i class="fa fa-question-circle"></i> This is the secret hash for your webhook</small>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="text-dark" for="RAVE_ENVIRONMENT">{{ __('RAVE ENVIRONMENT') }} <span class="text-danger">*</span></label>
                                            <input value="{{ env('RAVE_ENVIRONMENT') }}" autofocus
                                                name="RAVE_ENVIRONMENT" type="text" class="form-control"
                                                placeholder="Enter rave app enviroment" />
                                            <small class="text-muted"><i class="fa fa-question-circle"></i> Environment:
                                                This can either be <b>'staging'</b> or <b>'live'</b></small>
                                        </div>
                                    </div>



                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="text-dark" for="RAVE_PREFIX">{{ __('RAVE Transcation Prefix') }} <span class="text-danger">*</span></label>
                                            <input value="{{ env('RAVE_PREFIX') }}" autofocus name="RAVE_PREFIX"
                                                type="text" class="form-control"
                                                placeholder="Enter rave transcation prefix" />
                                            <small class="text-muted"><i class="fa fa-question-circle"></i> Prefix: This
                                                is added to the front of your <b>Transaction reference
                                                    numbers</b>.</small>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="text-dark" for="RAVE_COUNTRY">{{ __('RAVE country code') }} <span class="text-danger">*</span></label>
                                            <input value="{{ env('RAVE_COUNTRY') }}" autofocus name="RAVE_COUNTRY"
                                                type="text" class="form-control"
                                                placeholder="Enter rave country code" />
                                            <small class="text-muted"><i class="fa fa-question-circle"></i> Enter rave
                                                country code <b>eg : IN</b>.</small>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="text-dark" for="RAVE_LOGO">{{ __('RAVE Buisness APP Logo') }} <span class="text-danger">*</span></label>
                                            <input value="{{ env('RAVE_LOGO') }}" autofocus name="RAVE_LOGO" type="text"
                                                class="form-control" placeholder="Enter rave app logo url" />
                                            <small class="text-muted"><i class="fa fa-question-circle"></i> Logo: Enter
                                                the <b>URL</b> of your company/business logo.</small>
                                        </div>
                                    </div>




                                </div>
                            </div>
                        </div>

                        <br>

                        <div class="row">
                            <div class="col-md-12">
                                <label class="text-dark" for="s_enable">{{ __('Payhere Payment Setting') }}</label><br>
                                <input type="checkbox" class="custom_toggle" id="customSwitch16" name="enable_payhere" {{ $gsetting->enable_payhere == 1 ? 'checked' : '' }}/>
                                <input type="hidden" name="free" value="0" for="status" id="customSwitch16">
                                <!-- <div class="custom-control custom-switch">
                                    <input type="checkbox" name="enable_payhere" class="custom-control-input" id="customSwitch16" {{ $gsetting->enable_payhere == 1 ? 'checked' : '' }} />
                                    <label class="custom-control-label" for="customSwitch16"></label>
                                </div> -->
                                <!-- <li class="tg-list-item">
                                    <input class="tgl tgl-skewed" id="enable_payhere" type="checkbox"
                                        name="enable_payhere" {{ $gsetting->enable_payhere == 1 ? 'checked' : '' }} />
                                    <label class="tgl-btn" data-tg-off="OFF" data-tg-on="ON"
                                        for="enable_payhere"></label>
                                </li> -->
                                <br>
                                <div class="row" style="{{ $gsetting->enable_payhere == 1 ? '' : 'display:none' }}"
                                    id="payhere_sec">

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="text-dark" for="PAYHERE_MERCHANT_ID">{{ __('PAYHERE MERCHANT ID') }} <span class="text-danger">*</span></label>
                                            <input value="{{ env('PAYHERE_MERCHANT_ID') }}" autofocus
                                                name="PAYHERE_MERCHANT_ID" type="text" class="form-control"
                                                placeholder="Enter payhere merchant id" />
                                            
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="text-dark" for="PAYHERE_BUISNESS_APP_CODE">{{ __('PAYHERE BUISNESS APP CODE') }} <span class="text-danger">*</span></label>
                                            <input value="{{ env('PAYHERE_BUISNESS_APP_CODE') }}" autofocus
                                                name="PAYHERE_BUISNESS_APP_CODE" type="text" class="form-control"
                                                placeholder="Enter payhere buisness app code" />
                                            
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="text-dark" for="PAYHERE_APP_SECRET">{{ __('PAYHERE APP SECRET') }}</label>
                                            <input value="{{ env('PAYHERE_APP_SECRET') }}" autofocus name="PAYHERE_APP_SECRET"
                                                type="text" class="form-control" placeholder="Enter app logo url" />
                                            
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="text-dark" for="PAYHERE_MODE">{{ __('PAYHERE MODE') }}</label>
                                            <input value="{{ env('PAYHERE_MODE') }}" autofocus name="PAYHERE_MODE"
                                                type="text" class="form-control" placeholder="Enter payhere mode" />
                                            <small class="text-muted"><i class="fa fa-question-circle"></i> For Test use <b>"sandbox"</b> and for Live use <b>"live"</b></small>
                                        </div>
                                    </div>




                                </div>
                            </div>
                        </div>

                        <br>


                        <div class="row">
                            <div class="col-md-12">
                                <label class="text-dark" for="s_enable">{{ __('Iyzipay Payment Setting') }}</label><br>
                                <input type="checkbox" class="custom_toggle" id="customSwitch17" name="iyzico_enable" {{ $gsetting->iyzico_enable == 1 ? 'checked' : '' }}/>
                                <input type="hidden" name="free" value="0" for="status" id="customSwitch17">
                                <!-- <div class="custom-control custom-switch">
                                    <input type="checkbox" name="iyzico_enable" class="custom-control-input" id="customSwitch17" {{ $gsetting->iyzico_enable == 1 ? 'checked' : '' }} />
                                    <label class="custom-control-label" for="customSwitch17"></label>
                                </div> -->
                                <!-- <li class="tg-list-item">
                                    <input class="tgl tgl-skewed" id="iyzico_enable" type="checkbox"
                                        name="iyzico_enable" {{ $gsetting->iyzico_enable == 1 ? 'checked' : '' }} />
                                    <label class="tgl-btn" data-tg-off="OFF" data-tg-on="ON"
                                        for="iyzico_enable"></label>
                                </li> -->
                                <br>
                                <div class="row" style="{{ $gsetting->iyzico_enable == 1 ? '' : 'display:none' }}"
                                    id="iyzico_sec">

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="text-dark" for="IYZIPAY_BASE_URL">{{ __('IYZIPAY BASE URL') }} <span class="text-danger">*</span></label>
                                            <input value="{{ env('IYZIPAY_BASE_URL') }}" autofocus
                                                name="IYZIPAY_BASE_URL" type="text" class="form-control"
                                                placeholder="Enter Iyzipay base url" />

                                            <small class="text-muted"><i class="fa fa-question-circle"></i> For Sandbox use <b>https://sandbox-api.iyzipay.com</b> <br>
				                    		<i class="fa fa-question-circle"></i> For Live use <b>https://api.iyzipay.com</b></small>
                                            
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="text-dark" for="IYZIPAY_API_KEY">{{ __('IYZIPAY API KEY') }} <span class="text-danger">*</span></label>
                                            <input value="{{ env('IYZIPAY_API_KEY') }}" autofocus
                                                name="IYZIPAY_API_KEY" type="text" class="form-control"
                                                placeholder="Enter iyzipay api key" />
                                            
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="text-dark" for="IYZIPAY_SECRET_KEY">{{ __('IYZIPAY SECRET KEY') }}</label>
                                            <input value="{{ env('IYZIPAY_SECRET_KEY') }}" autofocus name="IYZIPAY_SECRET_KEY"
                                                type="text" class="form-control" placeholder="Enter Iyzipay secret key" />
                                            
                                        </div>
                                    </div>




                                </div>
                            </div>
                        </div>

                        <br>


                        <div class="row">
                            <div class="col-md-12">
                                <label class="text-dark" for="s_enable">{{ __('SSLCommerze Payment Setting') }}</label><br>
                                <input type="checkbox" class="custom_toggle" id="customSwitch18" name="ssl_enable" {{ $gsetting->ssl_enable == 1 ? 'checked' : '' }}/>
                                <input type="hidden" name="free" value="0" for="status" id="customSwitch18">
                                <!-- <div class="custom-control custom-switch">
                                    <input type="checkbox" name="ssl_enable" class="custom-control-input" id="customSwitch18" {{ $gsetting->ssl_enable == 1 ? 'checked' : '' }} />
                                    <label class="custom-control-label" for="customSwitch18"></label>
                                </div> -->
                                <!-- <li class="tg-list-item">
                                    <input class="tgl tgl-skewed" id="ssl_enable" type="checkbox"
                                        name="ssl_enable" {{ $gsetting->ssl_enable == 1 ? 'checked' : '' }} />
                                    <label class="tgl-btn" data-tg-off="OFF" data-tg-on="ON"
                                        for="ssl_enable"></label>
                                </li> -->
                                <br>
                                <div class="row" style="{{ $gsetting->ssl_enable == 1 ? '' : 'display:none' }}"
                                    id="ssl_sec">

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="text-dark" for="API_DOMAIN_URL">{{ __('SSL API DOMAIN URL') }} <span class="text-danger">*</span></label>
                                            
                                            <input value="{{ env('API_DOMAIN_URL') }}" autofocus
                                                name="API_DOMAIN_URL" type="text" class="form-control"
                                                placeholder="Enter Iyzipay base url" />

                                            <small class="text-muted"><i class="fa fa-question-circle"></i> For Sandbox use <b>https://sandbox.sslcommerz.com</b> <br>
				                    		<i class="fa fa-question-circle"></i> For Live use <b>https://securepay.sslcommerz.com</b></small>
                                            
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="text-dark">Enable LOCALHOST:</label><br>
                                            <input type="checkbox" class="custom_toggle" id="customSwitch19" name="IS_LOCALHOST" {{ env('IS_LOCALHOST') == true ? "checked"  : "" }}/>
                                            <input type="hidden" name="free" value="0" for="status" id="customSwitch19"><br>
                                            <!-- <div class="custom-control custom-switch">
                                                <input type="checkbox" name="IS_LOCALHOST" class="custom-control-input" id="customSwitch19" {{ env('IS_LOCALHOST') == true ? "checked"  : "" }} />
                                                <label class="custom-control-label" for="customSwitch19"></label>
                                            </div> -->
                                            <!-- <input name="IS_LOCALHOST" id="IS_LOCALHOST"
                                            {{ env('IS_LOCALHOST') == true ? "checked"  :"" }} type="checkbox"
                                            class="tgl tgl-skewed">
                                            <label class="tgl-btn" data-tg-off="False" data-tg-on="True"
                                            for="IS_LOCALHOST"></label> -->
                                            <small class="txt-desc">(Enable it to when it's when sandbox mode is true.) </small>
                                        </div>
                                        <br>
                                        <br>

                                        <div class="form-group display-none">
                                            <label class="text-dark" for="">SANDBOX MODE:</label><br>
                                            <input type="checkbox" class="custom_toggle" id="customSwitch20" name="SANDBOX_MODE" {{ env('SANDBOX_MODE') == true ? "checked"  :"" }}/>
                                            <input type="hidden" name="free" value="0" for="status" id="customSwitch20"><br>
                                            <!-- <div class="custom-control custom-switch">
                                                <input type="checkbox" name="SANDBOX_MODE" class="custom-control-input" id="customSwitch20" {{ env('SANDBOX_MODE') == true ? "checked"  :"" }} />
                                                <label class="custom-control-label" for="customSwitch20"></label>
                                            </div> -->
                                            <!-- <input name="SANDBOX_MODE" id="SANDBOX_MODE"
                                            {{ env('SANDBOX_MODE') == true ? "checked"  :"" }} type="checkbox"
                                            class="tgl tgl-skewed">
                                            <label class="tgl-btn" data-tg-off="Disable" data-tg-on="Enable"
                                            for="SANDBOX_MODE"></label> -->
                                            <small class="txt-desc">(Enable or disable sandbox by toggle it.) </small>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="text-dark" for="STORE_ID">{{ __('SSL STORE ID') }} <span class="text-danger">*</span></label>
                                            <input value="{{ env('STORE_ID') }}" autofocus
                                                name="STORE_ID" type="text" class="form-control"
                                                placeholder="Enter iyzipay api key" />
                                            
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="text-dark" for="STORE_PASSWORD">{{ __('SSL STORE PASSWORD') }}</label>
                                            <input value="{{ env('STORE_PASSWORD') }}" autofocus name="STORE_PASSWORD"
                                                type="text" class="form-control" placeholder="Enter Iyzipay secret key" />
                                            
                                        </div>
                                    </div>




                                </div>
                            </div>
                        </div>

                        <br>


                        <div class="row">
                            <div class="col-md-12">
                                <label class="text-dark" for="s_enable">{{ __('Youtube API Keys') }}</label><br>
                                <input type="checkbox" class="custom_toggle" id="customSwitch21" name="youtube_enable" {{ $gsetting->youtube_enable == 1 ? 'checked' : '' }}/>
                                <input type="hidden" name="free" value="0" for="status" id="customSwitch21">
                                <!-- <div class="custom-control custom-switch">
                                    <input type="checkbox" name="youtube_enable" class="custom-control-input" id="customSwitch21" {{ $gsetting->youtube_enable == 1 ? 'checked' : '' }} />
                                    <label class="custom-control-label" for="customSwitch21"></label>
                                </div> -->
                                <!-- <li class="tg-list-item">
                                    <input class="tgl tgl-skewed" id="youtube_enable" type="checkbox"
                                        name="youtube_enable" {{ $gsetting->youtube_enable == 1 ? 'checked' : '' }} />
                                    <label class="tgl-btn" data-tg-off="OFF" data-tg-on="ON"
                                        for="youtube_enable"></label>
                                </li> -->
                                <br>
                                <div class="row" style="{{ $gsetting->youtube_enable == 1 ? '' : 'display:none' }}" id="youtube_sec">

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="text-dark" for="YOUTUBE_API_KEY">{{ __('Youtube API Keys') }} <span class="text-danger">*</span></label>
                                            <input value="{{ env('YOUTUBE_API_KEY') }}" autofocus
                                                name="YOUTUBE_API_KEY" type="text" class="form-control"
                                                placeholder="Enter Iyzipay base url" />
                                           
                                            
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>

                        <br>



                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                <label class="text-dark" for="s_enable">{{ __('Vimeo API Keys') }}</label><br>
                                <input type="checkbox" class="custom_toggle" id="customSwitch22" name="vimeo_enable" {{ $gsetting->vimeo_enable == 1 ? 'checked' : '' }}/>
                                <input type="hidden" name="free" value="0" for="status" id="customSwitch22">
                                <!-- <div class="custom-control custom-switch">
                                    <input type="checkbox" name="vimeo_enable" class="custom-control-input" id="customSwitch22" {{ $gsetting->vimeo_enable == 1 ? 'checked' : '' }} />
                                    <label class="custom-control-label" for="customSwitch22"></label>
                                </div> -->
                                </div>
                                <div class="row" style="{{ $gsetting->vimeo_enable == 1 ? '' : 'display:none' }}"
                                    id="vimeo_sec">

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="text-dark" for="VIMEO_CLIENT">{{ __('VIMEO_CLIENT') }} <span class="text-danger">*</span></label>
                                            <input value="{{ env('VIMEO_CLIENT') }}" autofocus
                                                name="VIMEO_CLIENT" type="text" class="form-control"
                                                placeholder="Enter vimeo client" />
                                            
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="text-dark" for="VIMEO_SECRET">{{ __('VIMEO SECRET') }} <span class="text-danger">*</span></label>
                                            <input value="{{ env('VIMEO_SECRET') }}" autofocus
                                                name="VIMEO_SECRET" type="text" class="form-control"
                                                placeholder="Enter vimeo secret" />
                                            
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="text-dark" for="VIMEO_ACCESS">{{ __('VIMEO ACCESS') }} <span class="text-danger">*</span></label>
                                            <input value="{{ env('VIMEO_ACCESS') }}" autofocus
                                                name="VIMEO_ACCESS" type="text" class="form-control"
                                                placeholder="Enter vimeo access key" />
                                            
                                        </div>
                                    </div>

                                   



                                </div>
                            </div>
                        </div>

                        <br>

                        <div class="row">
                            <div class="col-md-12">
                            <div class="form-group">
                                <label class="text-dark" for="aamarpay_enable">{{ __('AAMAR PAY API KEYS') }}</label><br>
                                <input type="checkbox" class="custom_toggle" id="customSwitch23" name="aamarpay_enable" {{ $gsetting->aamarpay_enable == 1 ? 'checked' : '' }}/>
                                <input type="hidden" name="free" value="0" for="status" id="customSwitch23">
                                <!-- <div class="custom-control custom-switch">
                                    <input type="checkbox" name="aamarpay_enable" class="custom-control-input" id="customSwitch23" {{ $gsetting->aamarpay_enable == 1 ? 'checked' : '' }} />
                                    <label class="custom-control-label" for="customSwitch23"></label>
                                </div> -->
                                </div>

                                <div class="row" style="{{ $gsetting->aamarpay_enable == 1 ? '' : 'display:none' }}"
                                    id="aamarpay_sec">

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="text-dark" for="AAMARPAY_STORE_ID">{{ __('AAMARPAY STORE ID') }} <span class="text-danger">*</span></label>
                                            <input value="{{ env('AAMARPAY_STORE_ID') }}" autofocus
                                                name="AAMARPAY_STORE_ID" type="text" class="form-control"
                                                placeholder="Enter Aamarpay store ID" />
                                            
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="text-dark" for="AAMARPAY_KEY">{{ __('AAMARPAY SIGNATURE KEY') }} <span class="text-danger">*</span></label>
                                            <input value="{{ env('AAMARPAY_KEY') }}" autofocus
                                                name="AAMARPAY_KEY" type="text" class="form-control"
                                                placeholder="Enter Aamarpay key" />
                                            
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                      
                                        <div class="form-group">
                                            <label class="text-dark" for="aamar_pay">{{ __('AAMARPAY SANDBOX ?') }}</label><br>
                                            <input type="checkbox" class="custom_toggle" id="customSwitch24" name="AAMARPAY_SANDBOX" {{ env('AAMARPAY_SANDBOX') == true ? 'checked' : '' }}/>
                                            <input type="hidden" name="free" value="0" for="status" id="customSwitch24">
                                            <!-- <div class="custom-control custom-switch">
                                                <input type="checkbox" name="AAMARPAY_SANDBOX" class="custom-control-input" id="customSwitch24" {{ env('AAMARPAY_SANDBOX') == true ? 'checked' : '' }} />
                                                <label class="custom-control-label" for="customSwitch24"></label>
                                            </div> -->
                                            <!-- <li class="tg-list-item">
                                                <input class="tgl tgl-skewed" id="aamar_pay" type="checkbox" name="AAMARPAY_SANDBOX" {{ env('AAMARPAY_SANDBOX') == true ? 'checked' : '' }} />
                                                <label class="tgl-btn" data-tg-off="NO" data-tg-on="YES" for="aamar_pay"></label>
                                            </li> -->
                                        </div>
                                    </div>

                                   



                                </div>
                            </div>
                        </div>

                        <br>


                        <div class="row">
							<div class="col-md-12">
                                <div class="form-group">
		                        <label class="text-dark" for="braintree_enable">BrainTree PAYMENT</label><br>
                                <input type="checkbox" class="custom_toggle" id="customSwitch25" name="braintree_check" {{ $gsetting->braintree_enable==1 ? 'checked' : '' }}/>
                                <input type="hidden" name="free" value="0" for="status" id="customSwitch25">
                                <!-- <div class="custom-control custom-switch">
                                    <input type="checkbox" name="braintree_check" class="custom-control-input" id="customSwitch25" {{ $gsetting->braintree_enable==1 ? 'checked' : '' }} />
                                    <label class="custom-control-label" for="customSwitch25"></label>
                                </div> -->
		                        </div>

		                        <div class="row" style="{{ $gsetting->braintree_enable==1 ? '' : 'display:none' }}" id="brain_sec">
					                <div class="col-md-6">
                                        <div class="form-group">
					                    <label class="text-dark" for="pay_cid">BrainTree Env <span class="text-danger">*</span></label>
					                    <input value="{{ $env_files['BRAINTREE_ENV'] }}" autofocus name="BRAINTREE_ENV" type="text" class="form-control" placeholder="Enter BrainTree Env"/>
					                    </div>
                                    </div>
					                <div class="col-md-6">
                                        <div class="form-group">
					                    <label class="text-dark" for="pay_sid">BrainTree Merchant ID <span class="text-danger">*</span></label>
					                    <input value="{{ $env_files['BRAINTREE_MERCHANT_ID'] }}" autofocus name="BRAINTREE_MERCHANT_ID" type="text" class="form-control" placeholder="Enter BrainTree Merchant ID"/>
                                        </div>
					                </div>

				                  	<div class="col-md-6">
                                        <div class="form-group">
				                    	<label class="text-dark" for="pay_mode">BrainTree Public Key <span class="text-danger">*</span></label>
				                    	<input value="{{ $env_files['BRAINTREE_PUBLIC_KEY'] }}" autofocus name="BRAINTREE_PUBLIC_KEY" type="text" class="form-control" placeholder="Enter BrainTree Public Key"/>
				                  	    </div>
                                    </div>

				                  	<div class="col-md-6">
                                        <div class="form-group">
				                    	<label class="text-dark" for="pay_mode">BrainTree Private Key <span class="text-danger">*</span></label>
				                    	<input value="{{ $env_files['BRAINTREE_PRIVATE_KEY'] }}" autofocus name="BRAINTREE_PRIVATE_KEY" type="text" class="form-control" placeholder="Enter BrainTree Private Key"/>
				                  	    </div>
                                    </div>

				              	</div>
		                    </div>
		                </div>
						<br>
						<br>

						<div class="row">
							<div class="col-md-12">
                            <div class="form-group">
		                        <label class="text-dark" for="gtm_enable">GOOGLE TAG MANAGER</label><br>
                                <input type="checkbox" class="custom_toggle" id="customSwitch26" name="GOOGLE_TAG_MANAGER_ENABLED" {{ env('GOOGLE_TAG_MANAGER_ENABLED')=='true' ? 'checked' : '' }}/>
                                <input type="hidden" name="free" value="0" for="status" id="customSwitch26">
                                <!-- <div class="custom-control custom-switch">
                                    <input type="checkbox" name="GOOGLE_TAG_MANAGER_ENABLED" class="custom-control-input" id="customSwitch26" {{ env('GOOGLE_TAG_MANAGER_ENABLED')=='true' ? 'checked' : '' }} />
                                    <label class="custom-control-label" for="customSwitch26"></label>
                                </div> -->
		                        </div>

		                        <div class="row" style="{{ env('GOOGLE_TAG_MANAGER_ENABLED')=='true' ? '' : 'display:none' }}" id="gtm_sec">
					                <div class="col-md-6">
                                    <div class="form-group">
					                    <label class="text-dark" for="pay_cid">GOOGLE TAG MANAGER ID <span class="text-danger">*</span></label>
					                    <input value="{{ $env_files['GOOGLE_TAG_MANAGER_ID'] }}" autofocus name="GOOGLE_TAG_MANAGER_ID" type="text" class="form-control" placeholder="Enter GTM ID"/>
					                </div>
                                    </div>
					               

				              	</div>
		                    </div>
		                </div>
						<br>
						<br>


						  <div class="row">
							<div class="col-md-12">
                            <div class="form-group">
		                        <label class="text-dark" for="payflexi_enable">{{ __('adminstaticword.PAYFLEXIPAYMENT') }}</label><br>
                                <input type="checkbox" class="custom_toggle" id="customSwitch27" name="payflexi_check" {{ $gsetting->payflexi_enable==1 ? 'checked' : '' }}/>
                                <input type="hidden" name="free" value="0" for="status" id="customSwitch27">
                                <!-- <div class="custom-control custom-switch">
                                    <input type="checkbox" name="payflexi_check" class="custom-control-input" id="customSwitch27" {{ $gsetting->payflexi_enable==1 ? 'checked' : '' }} />
                                    <label class="custom-control-label" for="customSwitch27"></label>
                                </div> -->
		                        </div>

		                        <div class="row" style="{{ $gsetting->payflexi_enable==1 ? '' : 'display:none' }}" id="payflexi_sec">
		                          <div class="col-md-6">
                                  <div class="form-group">
				                    <label class="text-dark" for="PAYFLEXI_KEY">{{ __('adminstaticword.PayFlexiPublicKey') }} <span class="text-danger">*</span></label>
				                    <input value="{{ $env_files['PAYFLEXI_PUBLIC_KEY'] }}" autofocus name="PAYFLEXI_PUBLIC_KEY" type="text" class="form-control" placeholder="Enter PayFlexi Public Key"/>
                                    <small class="text-muted"><i class="fa fa-question-circle"></i> Public Key: Your PayFlexi publicKey. Sign up on <a href="https://merchant.payflexi.co/">https://merchant.payflexi.co/</a>to get one from your settings page</small>
				                  </div>
                                  </div>

				                  <div class="col-md-6">
                                  <div class="form-group">
				                    <label class="text-dark" for="PAYFLEXI_SECRET">{{ __('adminstaticword.PayFlexiSecretKey') }} <span class="text-danger">*</span></label>
				                    <input value="{{ $env_files['PAYFLEXI_SECRET_KEY'] }}" autofocus name="PAYFLEXI_SECRET_KEY" type="text" class="form-control" placeholder="Enter PayFlexi Secret Key"/>
                                    <small class="text-muted"><i class="fa fa-question-circle"></i> Secret Key: Your PayFlexi secretKey. Sign up on <a href="https://merchant.payflexi.co/">https://merchant.payflexi.co/</a>to get one from your settings page</small>
				                    </div>
				                  </div>

                                  <div class="col-md-6">
                                  <div class="form-group">
				                    <label class="text-dark" for="PAYFLEXI_PAYMENT_GATEWAY">{{ __('adminstaticword.PayFlexiSecretKey') }} <span class="text-danger">*</span></label>
				                    <input value="{{ $env_files['PAYFLEXI_PAYMENT_GATEWAY'] }}" autofocus name="PAYFLEXI_PAYMENT_GATEWAY" type="text" class="form-control" placeholder="Enter Supported PayFlexi Gateway"/>
                                    <small class="text-muted"><i class="fa fa-question-circle"></i> Mode:This can either be <b>'stripe'</b> or <b>'paystack'</b>. We are adding more gateways soon</small>
				                    </div>
				                  </div>

		                          <div class="col-md-6">
                                    <div class="form-group">
				                    <label class="text-dark" for="PAYFLEXI_MODE">{{ __('adminstaticword.PayFlexiMode') }} <span class="text-danger">*</span></label>
				                    <input value="{{ $env_files['PAYFLEXI_MODE'] }}" autofocus name="PAYFLEXI_MODE" type="text" class="form-control" placeholder="Enter PayFlexi Mode"/>
                                    <small class="text-muted"><i class="fa fa-question-circle"></i> Mode:This can either be <b>'test'</b> or <b>'live'</b>. Add your keys based on the mode</small>
                                    </div>
				                  </div>

				                  <div class="col-md-6">
                                  <div class="form-group">
				                    <label class="text-dark" for="PAYFLEXI_WEBHOOK_URL">{{ __('adminstaticword.PayFlexiWebhookURL') }} <span class="text-danger">*</span></label>
				                    <input value="{{ route('payflexi.webhook') }}" autofocus type="text" class="form-control" placeholder="" disabled/>
				                    <small class="text-muted"><i class="fa fa-question-circle"></i> use <b>this webhook url in PayFlexi Merchant settings page</b> </small>
				                  </div>
                                  </div>

				                  <div class="col-md-6">
                                  <div class="form-group">
				                    <label class="text-dark" for="PAYFLEXI_WEBHOOK_URL">{{ __('adminstaticword.PayFlexiCallbackURL') }} <span class="text-danger">*</span></label>
				                    <input value="{{ route('payflexi.callback') }}" autofocus type="text" class="form-control" placeholder="" disabled/>
				                    <small class="text-muted"><i class="fa fa-question-circle"></i> use <b>this callback url in PayFlexi Merchant settings page</b> </small>
				                  </div>
                                  </div>
				              	</div>
		                    </div>
		                </div>
						<br>
                        

                        @if(Module::has('Esewa') && Module::find('Esewa')->isEnabled())
				            @include('esewa::admin.api_settings')
				        @endif
                        
                        @if(Module::has('Smanager') && Module::find('Smanager')->isEnabled())
                            @include('smanager::admin.api_settings')
                        @endif

                        @if(Module::has('Paytab') && Module::find('Paytab')->isEnabled())
                            @include('paytab::admin.api_settings')
                        @endif

                        @if(Module::has('DPOPayment') && Module::find('DPOPayment')->isEnabled())
                            @include('dpopayment::admin.api_settings')
                        @endif

                        @if(Module::has('AuthorizeNet') && Module::find('AuthorizeNet')->isEnabled())
                            @include('authorizenet::admin.api_settings')
                        @endif

                        @if(Module::has('Bkash') && Module::find('Bkash')->isEnabled())
                            @include('bkash::admin.api_settings')
                        @endif

                        @if(Module::has('Midtrains') && Module::find('Midtrains')->isEnabled())
                            @include('midtrains::admin.api_settings')
                        @endif

                        @if(Module::has('SquarePay') && Module::find('SquarePay')->isEnabled())
                            @include('squarepay::admin.api_settings')
                        @endif

                        @if(Module::has('Worldpay') && Module::find('Worldpay')->isEnabled())
                            @include('worldpay::admin.api_settings')
                        @endif
                       
						<div class="form-group">
							<button type="reset" class="btn btn-danger-rgba mr-1"><i class="fa fa-ban"></i> {{ __("Reset")}}</button>
							<button type="submit" class="btn btn-primary-rgba"><i class="fa fa-check-circle"></i>
								{{ __("Update")}}</button>
						</div>

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
<script>
(function($) {
  "use strict";

  $(function(){

      $('#customSwitch1').change(function(){
        if($('#customSwitch1').is(':checked')){
        	$('#s_sec').show('fast');
        }else{
        	$('#s_sec').hide('fast');
        }

      });


      $('#customSwitch2').change(function(){
        if($('#customSwitch2').is(':checked')){
        	$('#pay_sec').show('fast');
        }else{
        	$('#pay_sec').hide('fast');
        }

      });
      $('#payu_sec1').change(function(){
        if($('#payu_sec1').is(':checked')){
        	$('#payu_sec').show('fast');
        }else{
        	$('#payu_sec').hide('fast');
        }

      });
      $('#customSwitch3').change(function(){
        if($('#customSwitch3').is(':checked')){
        	$('#insta_sec').show('fast');
        }else{
        	$('#insta_sec').hide('fast');
        }

      });

      $('#customSwitch25').change(function(){
        if($('#customSwitch25').is(':checked')){
        	$('#brain_sec').show('fast');
        }else{
        	$('#brain_sec').hide('fast');
        }

      });

      $('#customSwitch4').change(function(){
        if($('#customSwitch4').is(':checked')){
        	$('#razor_sec').show('fast');
        }else{
        	$('#razor_sec').hide('fast');
        }

      });

      $('#customSwitch5').change(function(){
        if($('#customSwitch5').is(':checked')){
        	$('#paystack_sec').show('fast');
        }else{
        	$('#paystack_sec').hide('fast');
        }

      });

      $('#customSwitch6').change(function(){
        if($('#customSwitch6').is(':checked')){
        	$('#paytm_sec').show('fast');
        }else{
        	$('#paytm_sec').hide('fast');
        }

      });

      $('#customSwitch7').change(function(){
        if($('#customSwitch7').is(':checked')){
        	$('#captcha_sec').show('fast');
        }else{
        	$('#captcha_sec').hide('fast');
        }

      });

      	$('#customSwitch8').change(function(){
	        if($('#customSwitch8').is(':checked')){
	        	$('#aws_sec').show('fast');
	        }else{
	        	$('#aws_sec').hide('fast');
	        }

	    });


      	$('#customSwitch9').change(function () {
            if ($('#customSwitch9').is(':checked')) {
                $('#omise_sec').show('fast');
            } else {
                $('#omise_sec').hide('fast');
            }

        });

       	$('#customSwitch10').change(function () {
            if ($('#customSwitch10').is(':checked')) {
                $('#payu_sec').show('fast');
            } else {
                $('#payu_sec').hide('fast');
            }

        });

        $('#customSwitch12').change(function () {
            if ($('#customSwitch12').is(':checked')) {
                $('#moli_sec').show('fast');
            } else {
                $('#moli_sec').hide('fast');
            }

        });

        $('#customSwitch13').change(function () {
            if ($('#customSwitch13').is(':checked')) {
                $('#cf_sec').show('fast');
            } else {
                $('#cf_sec').hide('fast');
            }

        });

        $('#customSwitch14').change(function () {
            if ($('#customSwitch14').is(':checked')) {
                $('#sk_sec').show('fast');
            } else {
                $('#sk_sec').hide('fast');
            }

        });

        $('#customSwitch15').change(function () {
            if ($('#customSwitch15').is(':checked')) {
                $('#rave_sec').show('fast');
            } else {
                $('#rave_sec').hide('fast');
            }
        });


        $('#customSwitch16').change(function () {
            if ($('#customSwitch16').is(':checked')) {
                $('#payhere_sec').show('fast');
            } else {
                $('#payhere_sec').hide('fast');
            }
        });


        $('#customSwitch17').change(function () {
            if ($('#customSwitch17').is(':checked')) {
                $('#iyzico_sec').show('fast');
            } else {
                $('#iyzico_sec').hide('fast');
            }
        });

        $('#customSwitch18').change(function () {
            if ($('#customSwitch18').is(':checked')) {
                $('#ssl_sec').show('fast');
            } else {
                $('#ssl_sec').hide('fast');
            }
        });


        $('#customSwitch21').change(function () {
            if ($('#customSwitch21').is(':checked')) {
                $('#youtube_sec').show('fast');
            } else {
                $('#youtube_sec').hide('fast');
            }
        });


        $('#customSwitch22').change(function () {
            if ($('#customSwitch22').is(':checked')) {
                $('#vimeo_sec').show('fast');
            } else {
                $('#vimeo_sec').hide('fast');
            }
        });

        $('#customSwitch23').change(function () {
            if ($('#customSwitch23').is(':checked')) {
                $('#aamarpay_sec').show('fast');
            } else {
                $('#aamarpay_sec').hide('fast');
            }
        });

        $('#customSwitch26').change(function () {
            if ($('#customSwitch26').is(':checked')) {
                $('#gtm_sec').show('fast');
            } else {
                $('#gtm_sec').hide('fast');
            }
        });


        $('#customSwitch27').change(function(){
	        if($('#customSwitch27').is(':checked')){
	        	$('#payflexi_sec').show('fast');
	        }else{
	        	$('#payflexi_sec').hide('fast');
	        }
	    });


  });

})(jQuery);

</script>


<script src="{{ Module::asset('esewa:js/esewa.js') }}"></script>

<script src="{{ Module::asset('smanager:js/smanager.js') }}"></script>

<script src="{{ Module::asset('paytab:js/paytab.js') }}"></script>

<script src="{{ Module::asset('dpopayment:js/dpopayment.js') }}"></script>

<script src="{{ Module::asset('authorizenet:js/authorizenet.js') }}"></script>

<script src="{{ Module::asset('bkash:js/bkash.js') }}"></script>

<script src="{{ Module::asset('midtrains:js/midtrains.js') }}"></script>

<script src="{{ Module::asset('squarepay:js/squarepay.js') }}"></script>

<script src="{{ Module::asset('worldpay:js/worldpay.js') }}"></script>
@endsection
<!-- This section will contain javacsript end -->