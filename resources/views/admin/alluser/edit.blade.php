@extends('admin.layouts.master')
@section('title','Edit Student')
@section('maincontent')

@component('components.breadcumb',['thirdactive' => 'active'])

@slot('heading')
{{ __('Home') }}
@endslot

@slot('menu1')
{{ __('Admin') }}
@endslot

@slot('menu2')
{{ __(' Edit Student') }}
@endslot

@slot('button')
<div class="col-md-4 col-lg-4">
  <a href="{{ route('allusers.index') }}" class="float-right btn btn-primary-rgba mr-2"><i
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
          <h5 class="box-title">Edit Student</h5>
        </div>
        <div class="card-body ml-2">
          <form action="{{ route('alluser.update',$user->id) }}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label class="text-dark" for="fname">
                    {{ __('adminstaticword.FirstName') }}:<sup class="text-danger">*</sup>
                  </label>
                  <input value="{{ $user->fname }}" autofocus required name="fname" type="text" class="form-control"
                    placeholder="{{ __('adminstaticword.Enter') }} {{ __('adminstaticword.FirstName') }}" />
                </div>


                <div class="form-group">
                  <label class="text-dark" for="mobile">{{ __('adminstaticword.Email') }}: <sup
                      class="text-danger">*</sup></label>
                  <input value="{{ $user->email }}" required type="email" name="email"
                    placeholder="{{ __('adminstaticword.Enter') }} {{ __('adminstaticword.Email') }}"
                    class="form-control">
                </div>

                <div class="form-group">
                  <label class="text-dark" for="mobile">{{ __('adminstaticword.Password') }}: <sup
                      class="text-danger">*</sup> </label>
                  <input  type="password" name="password"
                    placeholder="{{ __('adminstaticword.Enter') }} {{ __('adminstaticword.Password') }}"
                    class="form-control">
                </div>
             
                {{--<div class="form-group">
                  <label class="text-dark" for="city_id">{{ __('adminstaticword.Country') }}: </label>
                  <select id="country_id" class="form-control select2" name="country_id">
                    <option value="none" selected disabled hidden>
                      {{ __('adminstaticword.SelectanOption') }}
                    </option>
                    @foreach ($countries as $coun)
                    <option value="{{ $coun->country_id }}">{{ $coun->nicename }}</option>
                    @endforeach
                  </select>
                </div>--}}


                <div class="form-group">
                  <label class="text-dark" for="exampleInputSlug">{{ __('adminstaticword.Image') }}: </label>

                  <div class="input-group mb-3">

                    <div class="input-group-prepend">
                      <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                    </div>


                    <div class="custom-file">

                      <input type="file" name="user_img" class="custom-file-input" id="user_img"
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

                 <div class="form-group">
                  <label class="text-dark" for="city">{{ __('adminstaticword.City') }}: </label>
                  <select id="city" class="form-control select2" name="city_id">
                    @if(!empty($user->city_id))
                     <option value="{{$user->city_id}}">{{$user->city()->value('name')}}</option>
                    @else
                      <option value="">Select an Option</option>
                    @endif
                  </select>
                </div>

                {{--<div class="form-group">
                  <label class="text-dark" for="pin_code">{{ __('adminstaticword.Pincode') }}:</sup></label>
                  <input value="{{ old('pin_code')}}" placeholder="{{ __('adminstaticword.Enter') }} pincode"
                    type="text" name="pin_code" class="form-control">
                </div>
                <div class="form-group">
                  <label class="text-dark" for="fb_url">
                    {{ __('adminstaticword.FacebookUrl') }}:
                  </label>
                  <input autofocus name="fb_url" type="text" class="form-control" placeholder="Facebook.com/" />
                </div>
                <div class="form-group">
                  <label class="text-dark" for="youtube_url">
                    {{ __('adminstaticword.YoutubeUrl') }}:
                  </label>
                  <input autofocus name="youtube_url" type="text" class="form-control" placeholder="youtube.com/" />
                </div>
                --}}


              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label class="text-dark" for="lname">
                    {{ __('adminstaticword.LastName') }}:<sup class="text-danger">*</sup>
                  </label>
                  <input value="{{ $user->lname }}" required name="lname" type="text" class="form-control"
                    placeholder="{{ __('adminstaticword.Enter') }} {{ __('adminstaticword.LastName') }}" />
                </div>

                <div class="form-group">
                  <label class="text-dark" for="mobile">{{ __('adminstaticword.Mobile') }}: <sup
                      class="text-danger">*</sup></label>
                  <input value="{{$user->mobile}}" required type="text" name="mobile"
                    placeholder="{{ __('adminstaticword.Enter') }} {{ __('adminstaticword.Mobile') }}"
                    class="form-control">
                </div>
          
                          <input type="hidden" name="role" value="user">

              {{--  <div class="form-group">
                  <label class="text-dark" for="role">{{ __('adminstaticword.SelectRole') }}:
                   <sup class="text-danger">*</sup></label>
                  <select class="form-control select2" name="role" required id="role">
                    <option value="none" selected disabled hidden>
                      {{ __('adminstaticword.SelectanOption') }}
                    </option>
                    <option value="user">{{ __('adminstaticword.User') }}</option>
                    <option value="admin">{{ __('adminstaticword.Admin') }}</option>
                    <option value="instructor">{{ __('adminstaticword.Instructor') }}</option>
                  </select>
                </div>--}}

                @php
                  $grades = \App\SubCategory::where('status', '1')->orderBy('id','ASC')->get(); 
                @endphp

               <div class="form-group" id="">
                  <label class="text-dark" for="grade">Grade:<sup
                      class="text-danger">*</sup></label>
                     <select name='grade'  class="form-control select2" id="">
                        <option value="">Choose Your Grade</option>
                         @if($grades)
                           @foreach($grades as $grade)
                            <option value="{{$grade->id}}"  @if($user->grade==$grade->id) selected @endif>{{$grade->title}}</option>
                           @endforeach
                        @endif
                    </select>
                </div>

                 <input type="hidden" name="country_id" value="64">

                <div class="form-group">
                  <label class="text-dark" for="govern">Governorate: <sup
                      class="text-danger">*</sup></label>
                  <select class="form-control select2" name="state_id"  id="govern" required>
                    <option value="">Select an Option</option>
                      @foreach(getGovern(64) as $govern)
                        <option value="{{$govern->id}}" @if($user->state_id==$govern->id) selected @endif>{{$govern->name}}</option>
                      @endforeach
                  </select>
                </div>

               

                <div class="form-group">
                  <label class="text-dark" for="exampleInputDetails">{{ __('adminstaticword.Address') }}:</label>
                  <textarea name="address" rows="2" class="form-control"
                    placeholder="{{ __('adminstaticword.Enter') }} address" value="{{$user->address}}">{{$user->address}}</textarea>
                </div>
     


              {{--<div class="form-group">
                <label for="exampleInputDetails">{{ __('adminstaticword.Status') }}</label><br>
                <input id="status_toggle" type="checkbox" class="custom_toggle" name="status" checked />
                <input type="hidden" name="status" value="0" for="jeet120" id="jeet120">
              </div>--}}
               
              <input type="hidden" name="status" value="1">


              </div>
            </div>
         {{--   <div class="form-group">
              <label class="text-dark" for="exampleInputDetails">{{ __('adminstaticword.Detail') }}:</label>
              <textarea id="detail" name="detail" rows="3" class="form-control"
                placeholder="{{ __('adminstaticword.Enter') }} {{ __('adminstaticword.Detail') }}"></textarea>
            </div>--}}

            
            <div class="col-md-6">
                <div class="form-group">
                  <label for="exampleInputTit1e">{{ __('adminstaticword.Status') }}:<sup
                      class="text-danger">*</sup></label><br>
                  <input type="checkbox" class="custom_toggle" name="status"
                    {{ $user->status == '1' ? 'checked' : '' }} />
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

        $('.select2').select2();

     $("#govern").change(function(){
              jQuery.ajax({
                    type: "GET",
                    url: "/admin/select2/city",
                    data: {
                      _token: "{{ csrf_token() }}",
                       govern:$("#govern").val()
                    },
                    success: function (data) {
                      $("#city").html(data);
                       // alert('error');
                    },
                    error: function()
                    {
                        // alert('error');
                    }
                }); 
         });  

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


         