@extends('admin.layouts.master')
@section('title', 'Instructor Subscription Settings - Admin')
@section('maincontent')
 

@component('components.breadcumb',['thirdactive' => 'active'])
@slot('heading')
   {{ __('Instructor Subscription Settings') }}
@endslot
@slot('menu1')
   {{ __('Instructor') }}
@endslot
@slot('menu2')
   {{ __('Instructor Subscription Settings') }}
@endslot
@endcomponent

<div class="contentbar">
    <div class="row">
      <div class="col-lg-12">
        <div class="card m-b-30">
          <div class="card-header">
            <h5 class="card-title">{{ __("Instructor Subscription Settings")}} </h5>
          </div>
          <div class="card-body">
            
            <form action="{{ action('SubscriptionEnableController@settings') }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                {{ method_field('POST') }}
            
            <div class="row">
              <div class="form-group col-md-6">
               
                <label for="">{{ __('adminstaticword.InstructorSubscription') }}: </label>
                <input  class="custom_toggle"   type="checkbox"  id="subscription" name="ENABLE_INSTRUCTOR_SUBS_SYSTEM" {{ env('ENABLE_INSTRUCTOR_SUBS_SYSTEM') == 1 ? 'checked' : '' }} />
              
                <div>
                <small>(Enable Instructor subcription plans)</small>
                     
            </div>
               
           

              <div class="form-group mt-4" id="code">
                <div class="{{ !old('purchase_code') ? "display-none" : "" }}  purbox">
                    <label for="validationCustom02">Purchase Code:<sup class="redstar">*</sup></label>
                    <input name="purchase_code" type="password" class="form-control" id="validationCustom02" placeholder="Please enter valid purchase code" value="{{ old('purchase_code') }}" autocomplete="off" required>
                    
                  <br>

                  <small class="text-muted"><i class="fa fa-question-circle"></i> Enter envanto purchase code.</small>
                </div>
             </div>

                  @if($errors->any())
                  <h6 class="text-danger alert alert-error">{{$errors->first()}}</h6>
                @endif
              @error('code')
              <div class="invalid-feedback">
                {{$message}}
              </div> 
              @enderror 

             
           <div class="form-group">
                <button type="reset" class="btn btn-danger-rgba mr-1"><i class="fa fa-ban"></i> {{ __("Reset")}}</button>
                <button type="submit" class="btn btn-primary-rgba"><i class="fa fa-check-circle"></i>
                {{ __("Update")}}</button>
            </div>

           </form>
         </div>
       </div>
     </div>
   </div>
 </div>
@endsection




@section('scripts')



<script>
  (function($) {
    "use strict";
    $(function(){
        $('#subscription').change(function(){
          if($('#subscription').is(':checked')){
            $('#code').show('fast');
          }else{
            $('#code').hide('fast');
          }
        });
       
    });
  })(jQuery);
  </script>


@endsection

