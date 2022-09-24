@extends('admin.layouts.master')
@section('title','Upload New Video')
@section('breadcum')
@component('components.breadcumb',['secondaryactive' => 'active'])
@slot('heading')
   Videos
@endslot

@slot('menu1')
  Videos
@endslot

@slot('button')

<div class="col-md-4 col-lg-4">
  <div class="widgetbar">
    <a href="{{ url('subcategory') }}" class="float-right btn btn-dark-rgba mr-2"><i
      class="feather icon-arrow-left mr-2"></i>Back</a></div>                        
</div>

@endslot
@endcomponent
@if ($errors->any())
<div class="alert alert-danger">
  <ul>
    @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
  </ul>
</div>
@endif
<div class="contentbar">
  <div class="row">
    <div class="col-lg-12">
      <div class="card m-b-30">
        <div class="card-header">
          <h5 class="card-tittle">Upload Videos </h5>
        </div>
        <div class="card-body">
          <form id="demo-form2" method="post" action="{{url('videos/store')}}" data-parsley-validate class="form-horizontal form-label-left" autocomplete="off" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="box-body">
              <div class="form-group">
                <form id="demo-form2" method="post" action="{{url('videos/store')}}" data-parsley-validate class="form-horizontal form-label-left" autocomplete="off" enctype="multipart/form-data">
                  {{ csrf_field() }}
                  {{ method_field('PUT') }}
                  <div class="row">
                    <div class="col-md-6">
                        <label for="exampleInputTit1e">{{ __('adminstaticword.title') }}:<sup class="redstar">*</sup></label>
                        <input type="text" class="form-control" name="title" id="exampleInputTitle" placeholder="Enter Your subcategory" value="">
                    </div>
                    <div class="col-md-6">
                      <label for="exampleInputTit1e">{{ __('adminstaticword.subject') }}</label>
                      <select name="subject_id" class="form-control select2">
                        @foreach($subjects as $subject)
                        <option value="{{$subject->id}}">{{$subject->title}}</option>
                        @endforeach
                      </select>
                    </div>
                    
                  </div>
                  <br>
                  <div class="row">
                    <div class="col-md-12">
                      <label for="exampleInputTit1e">{{ __('adminstaticword.choose_videos') }}:<sup class="redstar">*</sup></label>
                      <input type="file" name="videos[]" class="form-control" multiple>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <label for="exampleInputTit1e">{{ __('adminstaticword.video_background') }}:<sup class="redstar">*</sup></label>
                      <input type="file" name="img" class="form-control">
                    </div>
                  </div>
                  <br>
    
                  <div class="row">
    
                    <div class="col-md-6">
                      <label for="exampleInputDetails">{{ __('adminstaticword.Status') }}:<sup
                        class="redstar text-danger">*</sup></label><br>
                    <input id="status_toggle" type="checkbox" class="custom_toggle" name="status" checked/>
                    <input type="hidden" name="free" value="0" for="status" id="status">
                     
                    </div>
                  </div>
                  <br>
             
                  <div class="form-group">
                    <button type="reset" class="btn btn-danger"><i class="fa fa-ban"></i> Reset</button>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-check-circle"></i>
                        Create</button>
                </div>
            
            <div class="clear-both"></div>
           
               
            </div>
          </form>
          

        </div>
      </div>
    </div>
  </div>
</div>
@include('admin.category.subcategory.cat') 

@endsection


