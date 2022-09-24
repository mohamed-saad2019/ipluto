@extends('admin.layouts.master')
@section('title','View Course Review')
@section('maincontent')
@component('components.breadcumb',['secondaryactive' => 'active'])
@slot('heading')
{{ __('CourseReview') }}
@endslot

@slot('menu1')
{{ __('CourseReview') }}
@endslot


@endcomponent
<div class="contentbar">
  <div class="row">
    <div class="col-lg-12">
      <div class="col-md-12">
        <div class="card m-b-30">
          <div class="card-header">
            <h5 class="card-box">CourseReview</h5>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-2 text-center">
                @if($course->preview_image != null || $course->preview_image !='')
                <img src="{{ asset('images/course/'.$course->preview_image) }}" width="150px" height="100px"
                  class="img-circle" />
                @else
                <img src="{{ Avatar::create($course->title)->toBase64() }}" alt="course" width="150px" height="100px"
                  class="img-responsive">
                @endif
              </div>
              <div class="col-md-10">
                <h3>{{ __('adminstaticword.Name') }} :</h3><h4><span class="text-muted">{{ $course->user->fname }} {{ $course->user->lname }}</span></h4>

                <h3>{{ __('adminstaticword.Course') }} :</h3><h4><span class="text-muted">{{ $course->title }}</span></h4>
                <h3>{{ __('adminstaticword.Title') }} :</h3> <h6><span class="text-muted">{{ $course->title }}</span></h6>
                <h3>{{ __('adminstaticword.Detail') }} :</h3><p> <span class="text-muted">{!! $course->detail !!}</span></p>
              </div>
             
              

             

            </div>

            <form action="{{url('coursereview/'.$course->id)}}" method="POST" enctype="multipart/form-data">
              {{ csrf_field() }}
              {{ method_field('PUT') }}

              <input type="hidden" value="{{ $course->course_id }}" name="course_id" class="form-control">

              <div class="row">
                <div class="col-md-6">
                  <label for="exampleInputTit1e">
                    <h5>{{ __('adminstaticword.Accept') }}:</h5>
                  </label>
                  <input type="checkbox" id="appoint_accept" class="custom_toggle" name="status"
                    {{ $course->status == '1' ? 'checked' : '' }} />

                  <label class="tgl-btn" data-tg-off="Reject" data-tg-on="Accept" for="appoint_accept"></label>

                </div>
                <div class="col-md-12">
                  <div style="{{ $course->status == '0' ? '' : 'display:none' }}" id="sec1_one">
                    <label for="exampleInputDetails">{{ __('adminstaticword.ReasonforRejection') }}:</label>
                    <textarea  name="reject_txt" rows="1" class="form-control"
                      placeholder="Enter class detail">{{ $course['reject_txt'] }}</textarea>

                  </div>
                </div>
              </div>
              <div class="form-group mt-3">
                <button type="reset" class="btn btn-danger"><i class="fa fa-ban"></i>
                  Reset</button>
                <button type="submit" class="btn btn-primary"><i class="fa fa-check-circle"></i>
                  Update</button>
              </div>

              <div class="clear-both"></div>


            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>

@endsection
@section('script')


<script>
  (function ($) {
    "use strict";

    $(function () {

      $('#appoint_accept').change(function () {
        if ($('#appoint_accept').is(':checked')) {
          $('#sec_one').show('fast');
          $('#sec1_one').hide('fast');
        } else {
          $('#sec_one').hide('fast');
          $('#sec1_one').show('fast');
        }

      });

    });
  })(jQuery);
</script>

@endsection