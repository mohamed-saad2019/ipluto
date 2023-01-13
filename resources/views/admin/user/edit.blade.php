@extends('admin.layouts.master')
@section('title','Edit Admin')
@section('maincontent')

@component('components.breadcumb',['thirdactive' => 'active'])

@slot('heading')
{{ __('Home') }}
@endslot

@slot('menu1')
{{ __('Admin') }}
@endslot

@slot('menu2')
{{ __(' Edit Admin') }}
@endslot

@slot('button')
<div class="col-md-4 col-lg-4">
  <a href="{{ route('user.index') }}" class="float-right btn btn-primary-rgba mr-2"><i
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
          <h5 class="box-title">Edit Admin</h5>
        </div>
        <div class="card-body ml-2">
          <form action="{{ route('user.update',$user->id) }}" method="POST" enctype="multipart/form-data">
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
                    placeholder="{{ __('adminstaticword.Enter') }} {{ __('adminstaticword.FirstName') }}" />
                </div>
               
                <div class="form-group">
                  <label for="mobile">{{ __('adminstaticword.Email') }}:<sup class="text-danger">*</sup> </label>
                  <input value="{{ $user->email }}" required type="email" name="email"
                    placeholder="{{ __('adminstaticword.Enter') }} {{ __('adminstaticword.Email') }}"
                    class="form-control">
                </div>
              
               
                <div class="form-group">
                  <label>{{ __('adminstaticword.Image') }}:<sup class="redstar">*</sup></label>
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
              </div>
              <div class="col-md-6">
                 <div class="form-group">
                  <label for="lname">
                    {{ __('adminstaticword.LastName') }}:
                    <sup class="text-danger">*</sup>
                  </label>
                  <input value="{{ $user->lname }}" required name="lname" type="text" class="form-control"
                    placeholder="{{ __('adminstaticword.Enter') }} {{ __('adminstaticword.LastName') }}" />
                </div>

                <div class="form-group">
                  <label for="mobile"> {{ __('adminstaticword.Mobile') }}:</label>
                  <input value="{{ $user->mobile }}" type="text" name="mobile"
                    placeholder="{{ __('adminstaticword.Enter') }} {{ __('adminstaticword.Mobile') }}"
                    class="form-control">
                </div>
                <div style="" id="update-password">
                  <div class="form-group">
                    <label>{{ __('adminstaticword.Password') }}</label>
                    <input type="password" name="password" class="form-control"
                      placeholder="{{ __('adminstaticword.Enter') }} {{ __('adminstaticword.Password') }}">
                  </div>
              </div>
            </div>
            
            <div class="col-md-6">

                <div class="form-group">
                  <label for="exampleInputTit1e">{{ __('adminstaticword.Status') }}:<sup
                      class="text-danger">*</sup></label><br>
                  <input type="checkbox" class="custom_toggle" name="status"
                    {{ $user->status == '1' ? 'checked' : '' }} />

                  <input type="hidden" name="status" value="0" for="status" id="status">
                </div>
            </div>
            <div class="col-md-6">
 <div class="form-group">
                  {{--<button type="reset" class="btn btn-danger-rgba"><i class="fa fa-ban"></i>
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