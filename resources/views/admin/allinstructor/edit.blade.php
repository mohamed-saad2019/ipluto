@extends('admin.layouts.master')
@section('title','Edit Instructor')
@section('maincontent')

@component('components.breadcumb',['thirdactive' => 'active'])

@slot('heading')
{{ __('Home') }}
@endslot

@slot('menu1')
{{ __('Admin') }}
@endslot

@slot('menu2')
{{ __(' Edit Instructor') }}
@endslot

@slot('button')
<div class="col-md-4 col-lg-4">
  <a href="{{ route('allinstructor.index') }}" class="float-right btn btn-primary-rgba mr-2"><i
      class="feather icon-arrow-left mr-2"></i>Back</a>
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
    <div class="col-lg-12">
      <div class="card m-b-30">
        <div class="card-header">
          <h5 class="box-title">{{ __('adminstaticword.Edit') }} {{ __('adminstaticword.Instructor') }}</h5>
        </div>
        <div class="card-body ml-2">
          <form action="{{ route('allinstructor.update',$user->id) }}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="fname">
                    {{ __('adminstaticword.FirstName') }}:
                    <sup class="text-danger">*</sup>
                  </label>
                  <input value="{{ $user->fname }}" autofocus required name="fname" type="text" class="form-control"
                    placeholder="{{ __('adminstaticword.Please') }} {{ __('adminstaticword.Enter') }} {{ __('adminstaticword.FirstName') }}" />
                </div>
                <div class="form-group">
                  <label for="lname">
                    {{ __('adminstaticword.LastName') }}:
                    <sup class="text-danger">*</sup>
                  </label>
                  <input value="{{ $user->lname }}" required name="lname" type="text" class="form-control"
                    placeholder=" {{ __('adminstaticword.Please') }} {{ __('adminstaticword.Enter') }} {{ __('adminstaticword.LastName') }}" />
                </div>

                <div class="form-group">
                  <label for="mobile"> Storage :</label>
                  <input value="{{ $user->storage }}" type="text" name="storage"
                    placeholder="Teacher's set storage space"
                    class="form-control">
                </div>
                
                <div class="form-group">
                  <label for="mobile"> {{ __('adminstaticword.Mobile') }}:</label>
                  <input value="{{ $user->mobile }}" type="text" name="mobile"
                    placeholder="{{ __('adminstaticword.Please') }} {{ __('adminstaticword.Enter') }} {{ __('adminstaticword.Mobile') }}"
                    class="form-control">
                </div>
                <div class="form-group">
                  <label for="mobile">{{ __('adminstaticword.Email') }}:<sup class="text-danger">*</sup> </label>
                  <input value="{{ $user->email }}" required type="email" name="email"
                    placeholder="{{ __('adminstaticword.Please') }} {{ __('adminstaticword.Enter') }} {{ __('adminstaticword.Email') }}"
                    class="form-control">
                </div>
                <div class="form-group">
                  <label for="address">{{ __('adminstaticword.Address') }}: </label>
                  <textarea name="address" class="form-control" rows="1"
                    placeholder="{{ __('adminstaticword.Please') }} {{ __('adminstaticword.Enter') }} adderss" value="">{{ $user->address }}</textarea>
                </div>

            
                
                <div class="form-group">
                  

                  <div class="row">
                    <div class="col-md-12">
                      <div class="update-password">
                        <label for="box1"> {{ __('adminstaticword.UpdatePassword') }}:</label>
                        <input type="checkbox" id="myCheck" name="update_pass" class="custom_toggle" onclick="myFunction()">
                      </div>
                    </div>
                  </div>


                  <div style="display: none" id="update-password">
                  <div class="form-group">
                    <label>{{ __('adminstaticword.Password') }}</label>
                    <input type="password" name="password" class="form-control"
                      placeholder="{{ __('adminstaticword.Please') }} {{ __('adminstaticword.Enter') }} {{ __('adminstaticword.Password') }}">
                  </div>
               
              
                <div class="form-group" >
                  <label>{{ __('adminstaticword.ConfirmPassword') }}</label>
                  <input type="password" name="confirmpassword" class="form-control"
                    placeholder="{{ __('adminstaticword.Please') }} {{ __('adminstaticword.ConfirmPassword') }}">
                </div>

              </div>
               
              </div>
              {{--
                <div class="form-group">
                  <label for="twitter_url">
                    {{ __('adminstaticword.TwitterUrl') }}:
                  </label>
                  <input autofocus name="twitter_url" value="{{ $user->twitter_url }}" type="text" class="form-control"
                    placeholder="https://twitter.com" />
                </div>
                <div class="form-group">
                  <label for="linkedin_url">
                    {{ __('adminstaticword.LinkedInUrl') }}:
                  </label>
                  <input autofocus name="linkedin_url" value="{{ $user->linkedin_url }}" type="text"
                    class="form-control" placeholder="https://linkedin.com" />
                </div>--}}
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="role">{{ __('adminstaticword.SelectRole') }}:</label>
                  @if(Auth::User()->role=="admin")
                  <select class="form-control select2" name="role">
                    <option {{ $user->role == 'instructor' ? 'selected' : ''}} value="instructor">{{ __('adminstaticword.Instructor') }}
                    </option>
                  </select>
                   
                  @endif
                  @if(Auth::User()->role=="instructor")
                  <select class="form-control select2" name="role">
                    <option {{ $user->role == 'user' ? 'selected' : ''}} value="user">{{ __('adminstaticword.User') }}
                    </option>
                    <option {{ $user->role == 'instructor' ? 'selected' : ''}} value="instructor">
                      {{ __('adminstaticword.Instructor') }}</option>
                  </select>
                  @endif
                  @if(Auth::User()->role=="user")
                  <select class="form-control select2" name="role">
                    <option {{ $user->role == 'user' ? 'selected' : ''}} value="user">{{ __('adminstaticword.User') }}
                    </option>
                  </select>
                  @endif
                </div>
               
              {{--  <div class="form-group">
                  <label for="city_id">{{ __('adminstaticword.Country') }}:</label>
                  <select id="country_id" class="form-control select2" name="country_id">
                    <option value="none" selected disabled hidden>
                      {{ __('adminstaticword.Please') }}  {{ __('adminstaticword.SelectanOption') }}
                    </option>

                    @foreach ($countries as $coun)
                    <option value="{{ $coun->country_id }}"
                      {{ $user->country_id == $coun->country_id ? 'selected' : ''}}>
                      {{ $coun->nicename }}
                    </option>
                    @endforeach
                  </select>
                </div>--}}

                            <input type="hidden" name="country_id" value="64">

                <div class="form-group">
                  <label for="govern">{{ __('adminstaticword.State') }}:</label>
                  <select id="govern" class="form-control select2" name="state_id">
                    <option value="">Select an Option</option>
                      @foreach(getGovern(64) as $govern)
                        <option value="{{$govern->id}}" @if($user->state_id==$govern->id) selected @endif>{{$govern->name}}</option>
                      @endforeach
                  </select>
                </div>
                <div class="form-group">
                  <label for="city">{{ __('adminstaticword.City') }}:</label>
                  <select id="city" class="form-control select2" name="city_id">
                       @if(!empty($user->city_id))
                       <option value="{{$user->city_id}}">{{$user->city()->value('name')}}</option>
                      @else
                        <option value="">Select an Option</option>
                      @endif
                  </select>
                </div>
               {{-- <div class="form-group">
                  <label for="pin_code">{{ __('adminstaticword.Pincode') }}:</label>
                  <input value="{{ $user->pin_code }}"
                    placeholder="{{ __('adminstaticword.Please') }} {{ __('adminstaticword.Enter') }} {{ __('adminstaticword.Pincode') }}" type="text"
                    name="pin_code" class="form-control">
                </div>--}}
           
                <div class="form-group">
                  <label>{{ __('Preview Image') }}:<sup class="redstar">*</sup></label>
                  <small class="text-muted"><i class="fa fa-question-circle"></i>
                    {{ __('adminstaticword.Recommendedsize') }} (1375 x 409px)</small>
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                    </div>
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" id="inputGroupFile01" name="user_img"
                        aria-describedby="inputGroupFileAddon01">
                      <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                    </div>
                  </div>
                  @if($user->user_img != null || $user->user_img !='')
                  <div class="edit-user-img">
                    <img src="{{ url('/images/user_img/'.$user->user_img) }}"  alt="User Image" class="img-responsive image_size">
                  </div>
                  @else
                  <div class="edit-user-img">
                    <img src="{{ asset('images/default/user.jpg')}}"  alt="User Image" class="img-responsive img-circle">
                  </div>
                  @endif
                </div>

              
               {{-- <div class="form-group">
                  <label for="fb_url">
                    {{ __('adminstaticword.FacebookUrl') }}:
                  </label>
                  <input autofocus name="fb_url" value="{{ $user->fb_url }}" type="text" class="form-control"
                    placeholder="https://facebook.com" />
                </div>
                <div class="form-group">
                  <label for="youtube_url">
                    {{ __('adminstaticword.YoutubeUrl') }}:
                  </label>
                  <input autofocus name="youtube_url" value="{{ $user->youtube_url }}" type="text" class="form-control"
                    placeholder="https://youtube.com" />

                </div>--}}

                

              </div>

               <div class="form-group col-md-6">
                    <label class="text-dark" for="course">
                      {{ __('adminstaticword.Course') }}:
                    </label>
                    <div id="subjects">
                     @php $c = 0; @endphp
                     @foreach($instructor_subject as $sub)
                         <div style="margin-top:10px;">
                            <select autofocus name="course[]" type="text" class="form-control @if($c == 0) selectSubjects  @endif" >
                            <option value=""> 
                             {{ __('adminstaticword.PleaseSelect') }}  {{ __('adminstaticword.Course') }}
                             </option>
                              @if(!empty($childcategory))
                                 @foreach($childcategory as $child)
                                  <option value="{{$child->id}}"
                                   @if($child->id == $sub){{'selected'}}@endif>{{$child->title}}
                                  </option>
                                 @endforeach
                              @endif
                           </select>
                         </div>
                      @php $c += 1; @endphp
                     @endforeach
                  </div>
                </div>

                  <div class="form-group col-md-6">
                    <label class="text-dark" for="grade">
                      {{ __('adminstaticword.SubCategory') }}:
                    </label>
                   
                    <div  id="grades">
                      @php $k = 0; @endphp
                       @foreach($instructor_subject as  $v)
                        <div style="margin-top:10px;">
                           <select autofocus name="grade_{{$k}}[]" type="text" 
                              class="form-control select2 @if($k == 0) selectGrades @endif" multiple>
                            <option value="">
                             {{ __('adminstaticword.PleaseSelect') }}  {{ __('adminstaticword.grade') }}
                            </option>
                             @if(!empty($subcategory))
                               @foreach($subcategory as $sub)
                                @php
                                  $gradesInsub = App\InstructorGrade::where('instructor_id',$user->id)->where('subject_id',$v)->pluck('grade_id')->toArray(); 
                                @endphp
                                <option value="{{$sub->id}}"
                                   @if(in_array($sub->id,$gradesInsub)){{'selected'}}@endif>
                                 {{$sub->title}}
                               </option>
                               @endforeach
                            @endif
                        </select>
                      </div>
                      @php $k += 1; @endphp
                    @endforeach
                     </div>
                     
                      <div class="col-sm-12" style="margin-top:10px;">
                         <div class="text-right mb-3">
                           <button type="button" class="btn btn-primary add_more"> <i class="fa fa-plus"></i></button>
                           <button type="button" class="btn btn-danger del_buttonEn"> <i class="fa fa-trash"></i></button>
                         </div>
                      </div>
                 
                  </div>
            {{--   <div class="form-group">
                  <label for="detail">{{ __('adminstaticword.Detail') }}:<sup class="text-danger">*</sup></label>
                  <textarea id="detail" name="detail" class="form-control" rows="5"
                    placeholder="{{ __('adminstaticword.Please') }} {{ __('adminstaticword.Enter') }} {{ __('adminstaticword.Detail') }}"
                    value="">{{ $user->detail }}</textarea>
                </div>--}}
            </div>
            
            <div class="col-md-6">
     <div class="form-group">
                  <label for="exampleInputDetails">{{ __('adminstaticword.Verified') }}:<sup
                      class="redstar text-danger">*</sup></label><br>
                  <input id="verified" type="checkbox" class="custom_toggle" name="verified"
                    {{  $user->email_verified_at != NULL ? 'checked' : '' }} />
                  {{-- <input type="hidden" name="verified" value="0" for="jeet120" id="verified"> --}}

                </div>
                <div class="form-group">
                  <label for="exampleInputTit1e">{{ __('adminstaticword.Status') }}:<sup
                      class="text-danger">*</sup></label><br>
                  <input type="checkbox" class="custom_toggle" name="status"
                    {{ $user->status == '1' ? 'checked' : '' }} />

                    {{-- <input type="hidden" name="status" value="0" for="status" id="status">--}}
                </div>
            </div>
            <div class="col-md-6">

               <div class="form-group">
                 {{-- <button type="reset" class="btn btn-danger-rgba"><i class="fa fa-ban"></i>
                    Reset</button>--}}
                  <button type="submit" class="btn btn-primary-rgba"><i class="fa fa-check-circle"></i>
                    Update</button>
                </div>

                <div class="clear-both"></div>
            </div>
        </div>

      </div>
    </div>
  </div>
</div>
</div>
@endsection
@section('scripts')
<script>
  (function ($) {
    "use strict";

    $(function () {
      $("#dob,#doa").datepicker({
        changeYear: true,
        yearRange: "-100:+0",
        dateFormat: 'yy/mm/dd',
      });
    });


    $('#married_status').change(function () {

      if ($(this).val() == 'Married') {
        $('#doaboxxx').show();
      } else {
        $('#doaboxxx').hide();
      }
    });

    $(function () {
      var urlLike = '{{ url('
      country / dropdown ') }}';
      $('#country_id').change(function () {
        var up = $('#upload_id').empty();
        var cat_id = $(this).val();
        if (cat_id) {
          $.ajax({
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: "GET",
            url: urlLike,
            data: {
              catId: cat_id
            },
            success: function (data) {
              console.log(data);
              up.append('<option value="0">Please Choose</option>');
              $.each(data, function (id, title) {
                up.append($('<option>', {
                  value: id,
                  text: title
                }));
              });
            },
            error: function (XMLHttpRequest, textStatus, errorThrown) {
              console.log(XMLHttpRequest);
            }
          });
        }
      });
    });

    $(function () {
      var urlLike = '{{ url('
      country / gcity ') }}';
      $('#upload_id').change(function () {
        var up = $('#grand').empty();
        var cat_id = $(this).val();
        if (cat_id) {
          $.ajax({
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: "GET",
            url: urlLike,
            data: {
              catId: cat_id
            },
            success: function (data) {
              console.log(data);
              up.append('<option value="0">Please Choose</option>');
              $.each(data, function (id, title) {
                up.append($('<option>', {
                  value: id,
                  text: title
                }));
              });
            },
            error: function (XMLHttpRequest, textStatus, errorThrown) {
              console.log(XMLHttpRequest);
            }
          });
        }
      });
    });

  })(jQuery);
</script>


<script>
  (function($) {
    "use strict";
    $(function(){
        $('#myCheck').change(function(){
          if($('#myCheck').is(':checked')){
            $('#update-password').show('fast');
          }else{
            $('#update-password').hide('fast');
          }
        });
        
    });
  })(jQuery);
  </script>

@endsection