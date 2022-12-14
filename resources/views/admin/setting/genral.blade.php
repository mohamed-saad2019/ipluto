<form class="form" action="{{ route('setting.store') }}" method="POST" novalidate enctype="multipart/form-data">
    @csrf
    <div class="row">
         <!-- TextLogo -->
        <div class="col-md-12">
            <div class="form-group">
                <label class="text-dark" for="status">{{ __('adminstaticword.TextLogo') }} :</label><br>
                <input type="checkbox" class="custom_toggle" id="customSwitch1" name="project_logo" {{ $gsetting->logo_type == 'L' ? 'checked' : '' }}/>
                <input type="hidden" name="free" value="0" for="customSwitch1" id="customSwitch1">
            </div>
        </div>
      
        <!-- ============ Project Title Start =============================-->
        <div class="col-md-6">
        <div class="form-group">
            <label class="text-dark">{{ __('adminstaticword.ProjectTitle') }}:</label>
            <input name="project_title" autofocus="" type="text" class="{{ $errors->has('project_title') ? ' is-invalid' : '' }} form-control" placeholder="Enter project title" value="{{ $setting->project_title }}" required="">
            <div class="invalid-feedback">
                {{ __('Please enter Project Title !') }}.
            </div>
        </div>
        </div>
        <!-- ============ Project Title end =========================-->
        <!-- ============ APP URL start =============================-->
        <div class="col-md-6">
        <div class="form-group">
            <label class="text-dark">{{ __('adminstaticword.APPURL') }}:</label>
            <input name="APP_URL" autofocus="" type="text" class="{{ $errors->has('APP_URL') ? ' is-invalid' : '' }} form-control" placeholder="http://localhost/" value="{{ $env_files['APP_URL'] }}" required="" >
            <div class="invalid-feedback">
                {{ __('Please Enter APP URL !') }}.
            </div>
        </div>
        </div>
        <!-- ============ APP URL end =============================-->
        <!-- ============ Contact start =============================-->
        <div class="col-md-6">
        <div class="form-group">
            <label  class="text-dark" for="phone">{{ __('adminstaticword.Contact') }} : <span class="text-danger">*</span></label>
            <input value="{{ $setting->default_phone }}" name="default_phone" placeholder="Enter contact no." type="text" class="{{ $errors->has('default_phone') ? ' is-invalid' : '' }} form-control" required>
            <div class="invalid-feedback">
                {{ __('Please Enter Contact !') }}.
            </div>
        </div>
        </div>
        <!-- ============ Contact end =============================-->
        <!-- ============ email start =============================-->
        <div class="col-md-6">
        <div class="form-group">
            <label class="text-dark" for="wel_email">{{ __('adminstaticword.Email') }} : <span class="text-danger">*</span></label>
            <input value="{{ $setting->wel_email }}" name="wel_email" placeholder="Enter your email" type="text" class="{{ $errors->has('wel_email') ? ' is-invalid' : '' }} form-control" required>
            <div class="invalid-feedback">
                {{ __('Please Enter Email !') }}.
            </div>
        </div>
        </div>
        <!-- ============ email end =============================-->
        <!-- ============ Copyright Text start ==================-->
        <div class="col-md-6">
        <div class="form-group">
            <label class="text-dark" for="cpy_txt">{{ __('adminstaticword.CopyrightText') }} : <span class="text-danger">*</span></label>
            <input value="{{ $setting->cpy_txt }}" name="cpy_txt" placeholder="Enter Copyright Text" type="text" required class="{{ $errors->has('cpy_txt') ? ' is-invalid' : '' }} form-control">
            <div class="invalid-feedback">
                {{ __('Please Enter Copy right Text !') }}.
            </div>
        </div>
        </div>
        <!-- ============ Copyright Text end ====================-->
        <!-- ============ Amount to feature a course start ======-->
        <div class="col-md-6">
        <div class="form-group">
            <label class="text-dark" for="feature_amount">{{ __('Amount to feature a course') }} </label>
            <input min="1" class="form-control" name="feature_amount" type="number" value="{{ $setting->feature_amount }}" id="duration"  placeholder="Enter amount to feature course ex: 100" class="{{ $errors->has('feature_amount') ? ' is-invalid' : '' }} form-control">
            <small>{{ __('(Instructor can feature its course, by paying this amount)') }}</small>
        </div>
        </div>


        <!-- ============ Amount to feature a course end =========-->

        
        <!-- ============ Address start =========-->
        <div class="col-md-12">
        <div class="form-group">
            <label class="text-dark" for="exampleInputDetails">{{ __('adminstaticword.Address') }} : <span class="text-danger">*</span></label>
            <textarea name="default_address" rows="2" class="form-control" placeholder="Enter your address" required>{{ $setting->default_address }}</textarea>
        </div>
        </div>
        <!-- ============ Address end =========-->
        <!-- ============ MapCoordinates start =========-->
        <div class="col-md-6">
        <h6 class="text-dark">{{ __('adminstaticword.MapCoordinates') }}</h6>
            <div class="form-group">
                <label class="text-dark" for="map_lat">{{ __('adminstaticword.MapEnable') }}:</label><br>
                    <input type="checkbox" class="custom_toggle" id="customSwitch2" name="map_enable" {{ $gsetting->map_enable == 'map' ? 'checked' : '' }}/>
                    <input type="hidden" name="free" value="0" for="customSwitch2" id="customSwitch2">
                <div>
                    <small>{{ __('(Enable Map on contact page)') }}</small>
                </div>
            </div>
        </div><br>
        <!-- ============ MapCoordinates end =========-->
        <!-- contact page start -->
        <div class="col-md-6">
        <div class="row" style="{{ $setting['map_enable'] == 'image' ? '' : 'display:none' }}" id="sec_one">
        <div class="col-md-12">
            <label class="text-dark">{{ __('adminstaticword.ContactPageImage') }} :</label>
            <small>{{ __('(Note - Size : 300x90)') }}</small>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                </div>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="inputGroupFile01" name="contact_image" aria-describedby="inputGroupFileAddon01">
                    <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                </div>
            </div>
            @if($image = @file_get_contents('../public/images/contact/'.$setting->contact_image))
            <img src="{{ url('/images/contact/'.$setting->contact_image) }}" class="image_size"/>
            @endif
         </div>
        </div>
        </div>
        
        <!-- contact page end -->
        <div class="col-md-12">
        <div class="row" style="{{ $setting['map_enable'] == 'map' ? '' : 'display:none' }}" id="sec1_one">
            <div class="col-md-4">
                <label class="text-dark" for="map_lat">{{ __('adminstaticword.MapLatitude') }}:</label>
                <input value="{{ $setting->map_lat }}" name="map_lat" placeholder="Enter Latitude" type="text" class="{{ $errors->has('map_lat') ? ' is-invalid' : '' }} form-control">
            </div>
            <div class="col-md-4">
                <label class="text-dark" for="map_long">{{ __('adminstaticword.MapLongitude') }}:</label>
                <input value="{{ $setting->map_long }}" name="map_long" placeholder="Enter Longitude" type="text" class="{{ $errors->has('map_long') ? ' is-invalid' : '' }} form-control">
            </div>
            <div class="col-md-4">
                <label class="text-dark" for="map_api">{{ __('adminstaticword.MapApiKey') }}:</label>
                <input value="{{ $setting->map_api }}" name="map_api" placeholder="Enter Map Api" type="text" class="{{ $errors->has('map_api') ? ' is-invalid' : '' }} form-control">
            </div>
        </div>
        </div>
        <!-- =========================================== -->
    </div>

    <!-- ====== PromoBar start ============ -->
    <hr>
        <h6 class="text-dark">{{ __('adminstaticword.PromoBar') }}</h6>
        <div class="row"> 
            <div class="col-md-12">
                <div class="form-group">
                    <label class="text-dark" for="promo_enable">{{ __('adminstaticword.PromoEnable') }} :</label><br>
                    <input type="checkbox" class="custom_toggle" id="customSwitch3" name="promo_enable" {{ $gsetting->promo_enable == 1 ? 'checked' : '' }}/>
                    <input type="hidden" name="free" value="0" for="customSwitch3" id="customSwitch3">
                    <div>
                        <small>{{ __('(Enable Promobar on site)') }}</small>
                    </div> 
                </div>
            </div>
        </div>
        <!-- ============================ -->
        <div class="row" style="{{ $setting['promo_enable'] == 1 ? '' : 'display:none' }}" id="sec2_one">
                <div class="col-md-6">
                    <label for="promo_text">{{ __('adminstaticword.PromoText') }}:</label>
                    <input value="{{ $setting->promo_text }}" name="promo_text" placeholder="Enter Promo Text" type="text" class="{{ $errors->has('promo_text') ? ' is-invalid' : '' }} form-control">
                </div>
                <div class="col-md-6">
                    <label for="promo_link">{{ __('adminstaticword.PromoLink') }}:</label>
                    <input value="{{ $setting->promo_link }}" name="promo_link" placeholder="Enter Promo Text Link" type="text" class="{{ $errors->has('promo_link') ? ' is-invalid' : '' }} form-control">
                </div>
        </div>
        <!-- ============================ -->
        <!-- =======Facebook Cha tBubble start========== -->
        <hr>
        <div class="row">  
            <div class="col-md-12">
                <div class="form-group">
                    <label class="text-dark" for="promo_text">{{ __('adminstaticword.FacebookChatBubble') }}:</label>
                    <input value="{{ $setting->chat_bubble }}" name="chat_bubble" placeholder="https://app.respond.io/facebook/chat/plugin/XXXX/XXXXXXXXXX" type="text" class="{{ $errors->has('chat_bubble') ? ' is-invalid' : '' }} form-control">
                    <small>Facebook Bubble Chat will not work on localhost (eg. xampp & wampp)</small>
                    <br>
                    <small><a target="__blank" href="https://app.respond.io/">Get URL For Facebook Messenger Chat Bubble</a></small>
                </div>
            </div>
        </div>
        <!-- =======Facebook Chat Bubble end ========== -->
        <!-- ======= App Store start ========== -->
        <hr>
        <h6 class="text-dark">{{ __('adminstaticword.AppDownload') }}</h6>
        <div class= "row">
            <div class="col-md-2">
                <div class="form-group">
                    <label class="text-dark" for="status">{{ __('App Store') }} :</label>
                    <input type="checkbox" class="custom_toggle" id="customSwitch4" name="app_download" {{ $gsetting->app_download == '1' ? 'checked' : '' }}/>
                    <input type="hidden" name="free" value="0" for="customSwitch4" id="customSwitch4">
                </div>
            </div>

            <div class="col-md-10">
                <div class="form-group">
                    <label class="text-dark">{{ __('Link:') }}</label>
                    <input name="app_link" autofocus="" type="text" class="{{ $errors->has('app_link') ? ' is-invalid' : '' }} form-control" placeholder="Please Enter Link"  value="{{ $setting->app_link }}">
                    <div class="invalid-feedback">
                        {{ __('Please Enter Link !') }}.
                    </div>
                </div>
            </div>

            <div class="col-md-2">
                <div class="form-group">
                    <label class="text-dark">{{ __('Play Store') }}</label><br>
                    <input type="checkbox" class="custom_toggle" id="customSwitch5" name="play_download" {{ $setting->play_download == '1' ? 'checked' : '' }}/>
                    <input type="hidden" name="free" value="0" for="customSwitch5" id="customSwitch5">
                </div>
            </div>

            <div class="col-md-10">
                <div class="form-group">
                <label class="text-dark">{{ __('Link:') }}</label>
                    <input name="play_link" autofocus="" type="text" class="form-control" placeholder="Please Enter Link"  value="{{ $setting->play_link }}">
                    <div class="invalid-feedback">
                        {{ __('Please Enter Link !') }}.
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <!-- ======= Donation link start ========== -->
        <h6 class="text-dark">{{ __('Donation link') }}</h6>
        <div class="row">
            <div class="col-md-2">
                <div class="form-group">
                    <label class="text-dark">{{ __('Donation link') }}: </label><br>
                    <input type="checkbox" class="custom_toggle" id="customSwitch6" name="donation_enable" {{ $setting->donation_enable == '1' ? 'checked' : '' }}/>
                    <input type="hidden" name="free" value="0" for="customSwitch6" id="customSwitch6">
                </div>
            </div>

            <div class="col-md-10">
                <div class="form-group">
                <label class="text-dark">{{ __('adminstaticword.Link') }} :</label>
                    <input name="donation_link" autofocus="" type="text" class="form-control" placeholder="Please Enter Link"  value="{{ $setting->donation_link }}">
                    <small>Get Donation link by register on <a target="__blank" href="https://www.paypal.com/in/webapps/mpp/paypal-me"> Paypal.me</a></small>
                    <div class="invalid-feedback">
                        {{ __('Please Enter Link !') }}.
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <!-- ======= Donation link end ========== -->
        <!-- ======= section 1 start ========== -->
        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <label class="text-dark">{{ __('adminstaticword.RightClick') }} :</label><br>
                    <input type="checkbox" class="custom_toggle" id="customSwitch7" name="rightclick" {{ $gsetting->rightclick == '0' ? 'checked' : '' }}/>
                    <input type="hidden" name="free" value="0" for="customSwitch7" id="customSwitch7">
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                <label class="text-dark">{{ __('adminstaticword.InspectElement') }} :</label><br>
                <input type="checkbox" class="custom_toggle" id="customSwitch8" name="inspect" {{ $setting->inspect == '0' ? 'checked' : '' }}/>
                <input type="hidden" name="free" value="0" for="customSwitch8" id="customSwitch8">
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                <label class="text-dark">{{ __('adminstaticword.PreloaderEnable') }} :</label><br>
                <input type="checkbox" class="custom_toggle" id="customSwitch9" name="preloader_enable" {{ $gsetting->preloader_enable == '1' ? 'checked' : '' }}/>
                <input type="hidden" name="free" value="0" for="customSwitch9" id="customSwitch9">
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label class="text-dark">{{ __('adminstaticword.APPDebug') }} :</label><br>
                    <input type="checkbox" class="custom_toggle" id="customSwitch10" name="APP_DEBUG" {{ env('APP_DEBUG') == true ? "checked" : "" }}/>
                    <input type="hidden" name="free" value="0" for="customSwitch10" id="customSwitch10">
                </div>
            </div>

        </div>
        <hr>
        <!-- ======= section 1 end ========== -->
        <!-- ======= section 2 start ========== -->
        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <label class="text-dark">{{ __('adminstaticword.WelcomeEmail') }} : </label><br>
                    <input type="checkbox" class="custom_toggle" id="customSwitch11" name="w_email_enable" {{ $gsetting->w_email_enable == '1' ? 'checked' : '' }}/>
                    <input type="hidden" name="free" value="0" for="customSwitch11" id="customSwitch11">
                    <div>
                <small>(If you enable it, a welcome email will be sent to user's register email id,<br> make sure you updated your mail setting in Site Setting >> Mail Settings before enable it.)</small>
                <small class="text-danger">{{ $errors->first('color') }}</small> 
            </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label class="text-dark">{{ __('adminstaticword.VerifyEmail') }} : </label><br>
                    <input type="checkbox" class="custom_toggle" id="customSwitch12" name="verify_enable" {{ $gsetting->verify_enable == '1' ? 'checked' : '' }}/>
                    <input type="hidden" name="free" value="0" for="customSwitch12" id="customSwitch12">
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label class="text-dark">{{ __('adminstaticword.BecomeAnInstructor') }}: </label><br>
                    <input type="checkbox" class="custom_toggle" id="customSwitch13" name="instructor_enable" {{ $gsetting->instructor_enable == '1' ? 'checked' : '' }}/>
                    <input type="hidden" name="free" value="0" for="customSwitch13" id="customSwitch13">
                    <div>
                    <small>(Enable Become an instructor option for users)</small>
                    <small class="text-danger">{{ $errors->first('color') }}</small> 
                </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label class="text-dark">{{ __('adminstaticword.CategoryMenu') }} :</label><br>
                    <input type="checkbox" class="custom_toggle" id="customSwitch14" name="cat_enable" {{ $gsetting->cat_enable == '1' ? 'checked' : '' }}/>
                    <input type="hidden" name="free" value="0" for="customSwitch14" id="customSwitch14">
                    <div>
                    <small>(If you enable it, Category menu will show on instructor Dashboard)</small>
                    <small class="text-danger">{{ $errors->first('color') }}</small> 
                    </div>
                </div>
            </div>

        </div>
        <hr>
        <!-- ======= section 2 end ========== -->
        <!-- ======= section 3 start ========== -->
        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <label class="text-dark">{{ __('Mobile no. on SignUp') }} : </label><br>
                    <input type="checkbox" class="custom_toggle" id="customSwitch15" name="mobile_enable" {{ $gsetting->mobile_enable == 1 ? 'checked' : '' }}/>
                    <input type="hidden" name="free" value="0" for="customSwitch15" id="customSwitch15">
                    <div>
                    <small>(Enable mobile no. on SignUp)</small>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label class="text-dark">{{ __('adminstaticword.DeviceControl') }} :</label><br>
                    <input type="checkbox" class="custom_toggle" id="customSwitch16" name="device_enable" {{ $gsetting->device_control == 1 ? 'checked' : '' }}/>
                    <input type="hidden" name="free" value="0" for="customSwitch16" id="customSwitch16">
                    <div>
                        <small>(Enable Device Control on Courses)</small>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label class="text-dark">{{ __('adminstaticword.CookieNotice') }} :</label><br>
                    <input type="checkbox" class="custom_toggle" id="customSwitch17" name="cookie_enable" {{ $gsetting->cookie_enable == 1 ? 'checked' : '' }}/>
                    <input type="hidden" name="free" value="0" for="customSwitch17" id="customSwitch17">
                    <div>
                        <small>(Enable Cookie Notice on Site)</small>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label class="text-dark">{{ __('adminstaticword.IPBlock') }} :</label><br>
                    <input type="checkbox" class="custom_toggle" id="customSwitch18" name="ipblock_enable" {{ $gsetting->ipblock_enable == 1 ? 'checked' : '' }}/>
                    <input type="hidden" name="free" value="0" for="customSwitch18" id="customSwitch18">
                    <div>
                    <small>(Enable Ip block on portal)</small>
                    </div>
                </div>
            </div>

        </div>
        <hr>
        <!-- ======= section 3 end ========== -->
        <!-- ======= section 4 start ========== -->
        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <label class="text-dark">{{ __('adminstaticword.ActivityLog') }} :</label><br>
                    <input type="checkbox" class="custom_toggle" id="customSwitch19" name="activity_enable" {{ $gsetting->activity_enable == 1 ? 'checked' : '' }}/>
                    <input type="hidden" name="free" value="0" for="customSwitch19" id="customSwitch19">
                    <div>
                        <small>(Enable Users Activity Logs on Login/Register)</small>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label class="text-dark">{{ __('adminstaticword.Assignment') }} :</label><br>
                    <input type="checkbox" class="custom_toggle" id="customSwitch20" name="assignment_enable" {{ $gsetting->assignment_enable == 1 ? 'checked' : '' }}/>
                    <input type="hidden" name="free" value="0" for="customSwitch20" id="customSwitch20">
                    <div>
                        <small>(Enable Assignment on Course)</small>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label class="text-dark">{{ __('adminstaticword.Appointment') }} :</label><br>
                    <input type="checkbox" class="custom_toggle" id="customSwitch21" name="appointment_enable" {{ $gsetting->appointment_enable == 1 ? 'checked' : '' }}/>
                    <input type="hidden" name="free" value="0" for="customSwitch21" id="customSwitch21">
                    <div>
                        <small>(Enable Appointment on Course)</small>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label class="text-dark">{{ __('adminstaticword.CertificateEnable') }} :</label><br>
                    <input type="checkbox" class="custom_toggle" id="customSwitch22" name="certificate_enable" {{ $gsetting->certificate_enable == 1 ? 'checked' : '' }}/>
                    <input type="hidden" name="free" value="0" for="customSwitch22" id="customSwitch22">
                    <div>
                    <small>(Enable Ip block on portal)</small>
                    </div>
                </div>
            </div>
        </div>
        <!-- ======= section 4 end ========== -->
        <!-- ======= section 5 start ========== -->
        <hr>
        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <label class="text-dark">{{ __('adminstaticword.HideIdentity') }} :</label><br>
                    <input type="checkbox" class="custom_toggle" id="customSwitch23" name="hide_identity" {{ $gsetting->hide_identity == 1 ? 'checked' : '' }}/>
                    <input type="hidden" name="free" value="0" for="customSwitch23" id="customSwitch23">
                    <div>
                        <small>(Hide User Indentity from Instructor)</small>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label class="text-dark">{{ __('adminstaticword.CourseHover') }} :</label><br>
                    <input type="checkbox" class="custom_toggle" id="customSwitch24" name="course_hover" {{ $gsetting->course_hover == 1 ? 'checked' : '' }}/>
                    <input type="hidden" name="free" value="0" for="customSwitch24" id="customSwitch24">
                    <div>
                        <small>(Enable/Disable Hover from home sliders)</small>
                    </div>
                </div>
            </div>

            <div class="col-md-3 d-none">
                <div class="form-group">
                    <label class="text-dark">{{ __('Currency Swipe') }} : </label><br>
                    <input type="checkbox" class="custom_toggle" id="customSwitch25" name="currency_swipe" {{ $gsetting->currency_swipe == 1 ? 'checked' : '' }}/>
                    <input type="hidden" name="free" value="0" for="customSwitch25" id="customSwitch25">
                    <div>
                        <small>(Swipe currency before/after icon)</small>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label class="text-dark">{{ __('Attandance') }} :</label><br>
                    <input type="checkbox" class="custom_toggle" id="customSwitch26" name="attandance_enable" {{ $gsetting->attandance_enable == 1 ? 'checked' : '' }}/>
                    <input type="hidden" name="free" value="0" for="customSwitch26" id="customSwitch26">
                    <div>
                    <small>(Enable Attandance on Courses)</small>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label class="text-dark">{{ __('Guest Login') }} :</label><br>
                    <input type="checkbox" class="custom_toggle" id="customSwitch26" name="guest_enable" {{ $gsetting->guest_enable == 1 ? 'checked' : '' }}/>
                    <input type="hidden" name="free" value="0" for="customSwitch26" id="customSwitch26">
                    <div>
                    <small>(Enable Guest checkout on portal)</small>
                    </div>
                </div>
            </div>
        </div>
        <!-- ======= section 5 end ========== -->
        <!-- ======= section 6 start ========== -->
        <hr>
        <div class="row">
            <div class="col-md-3">
               <div class="form-group">
                    <label class="text-dark">{{ __('Enable Zoom On Portal') }} :</label><br>
                    <input type="checkbox" class="custom_toggle" id="customSwitch27" name="zoom_enable" {{ $gsetting->zoom_enable == 1 ? 'checked' : '' }}/>
                    <input type="hidden" name="free" value="0" for="customSwitch27" id="customSwitch27">
                   <div>
                       <small>( Enable Live zoom meetings on portal )</small>
                   </div>
               </div>
           </div>

           <div class="col-md-3">
               <div class="form-group">
                    <label class="text-dark">{{ __('Enable Big Blue Meetings') }} : </label><br>
                    <input type="checkbox" class="custom_toggle" id="customSwitch28" name="bbl_enable" {{ $gsetting->bbl_enable == 1 ? 'checked' : '' }}/>
                    <input type="hidden" name="free" value="0" for="customSwitch28" id="customSwitch28">
                   <div>
                       <small>(Enable Big Blue meetings on portal)</small>
                   </div>
               </div>
           </div>

           <div class="col-md-3">
               <div class="form-group">
                    <label class="text-dark">{{ __('adminstaticword.GoogleMeet') }} :</label><br>
                    <input type="checkbox" class="custom_toggle" id="customSwitch29" name="googlemeet_enable" {{ $gsetting->googlemeet_enable == 1 ? 'checked' : '' }}/>
                    <input type="hidden" name="free" value="0" for="customSwitch29" id="customSwitch29">
                   <div>
                       <small>(Enable Google Meet on portal)</small>
                   </div>
               </div>
           </div>

           <div class="col-md-3">
               <div class="form-group">
                   <label class="text-dark">{{ __('adminstaticword.JitsiMeeting') }} :</label><br>
                   <input type="checkbox" class="custom_toggle" id="customSwitch30" name="jitsimeet_enable" {{ $gsetting->jitsimeet_enable == 1 ? 'checked' : '' }}/>
                    <input type="hidden" name="free" value="0" for="customSwitch30" id="customSwitch30">
                   <div>
                   <small>(Enable Jitsi Meeting on Portal)</small>
                   </div>
               </div>
           </div>
        </div>
        <hr>
        <!-- ========Logo================= -->
        <div class="row">
            <div class="form-group col-md-6">
                <label class="text-dark">{{ __('adminstaticword.Logo') }} :</label>
                <small>{{ __('(Note - Size : 300x90)') }}</small> 
                

                <div class="input-group">

                    <input required readonly id="image" name="logo" type="text"
                        class="form-control">
                    <div class="input-group-append">
                        <span data-input="image"
                            class="bg-primary text-light midia-toggle input-group-text">Browse</span>
                    </div>
                </div>
           
            <img src="{{ url('/images/logo/'.$setting->logo) }}" class="image_size"/>
            </div>
            
        
            <!-- ============ footer logo start =============================-->
         
             <div class="form-group col-md-6">
                <label class="text-dark">{{ __('adminstaticword.footerlogo') }} :</label>
                <small>{{ __('(Note - Size : 300x90)') }}</small> 
                

                <div class="input-group">

                    <input required readonly id="image" name="footer_logo" type="text"
                        class="form-control">
                    <div class="input-group-append">
                        <span data-input="image"
                            class="bg-primary text-light midia-toggle input-group-text">Browse</span>
                    </div>
                </div>
                @if($image = @file_get_contents('../public/images/logo/'.$setting->footer_logo))
                <img src="{{ url('/images/logo/'.$setting->footer_logo) }}" class="image_size"/>
                @endif
            </div>
            <!-- ============ Favicon end =========================== -->
            <div class="form-group col-md-6">
                <label class="text-dark">{{ __('adminstaticword.Favicon') }} :</label>
                <small>{{ __('(Note - Size : 35x35)') }}</small>
                

                <div class="input-group">

                    <input required readonly id="image" name="favicon" type="text"
                        class="form-control">
                    <div class="input-group-append">
                        <span data-input="image"
                            class="bg-primary text-light midia-toggle2 input-group-text">Browse</span>
                    </div>
                </div>

                @if($image = @file_get_contents('../public/images/favicon/'.$setting->favicon))
                <img src="{{ url('/images/favicon/'.$setting->favicon) }}" class="image_size"/>
                @endif
            </div>
            <!-- ============ Favicon end =============================-->
            <!-- ============ Preloader logo start =========================== -->
            <div class="form-group col-md-6">
                <label class="text-dark">{{ __('adminstaticword.Preloaderlogo') }} :</label>
                <small>{{ __('(Note - Size : 300x90)') }}</small>
               

                <div class="input-group">

                    <input required readonly id="image" name="preloader_logo" type="text"
                        class="form-control">
                    <div class="input-group-append">
                        <span data-input="image"
                            class="bg-primary text-light midia-toggle input-group-text">Browse</span>
                    </div>
                </div>

                @if($image = @file_get_contents('../public/images/logo/'.$setting->preloader_logo))
                <img src="{{ url('/images/logo/'.$setting->preloader_logo) }}" class="image_size"/>
                @endif
            </div>
        </div>
       
        <hr>
        <!-- ============ Preloader logo end =============================-->
        <!-- ======= section 6 end ========== -->
        <div class="form-group">
            <button type="reset" class="btn btn-danger-rgba mr-1"><i class="fa fa-ban"></i> {{ __("Reset")}}</button>
            <button type="submit" class="btn btn-primary-rgba"><i class="fa fa-check-circle"></i>
                {{ __("Update")}}</button>
        </div>
        
       
                        
</form>

<style>
    .image_size{
    height:80px;
    width:200px;
}
</style>

