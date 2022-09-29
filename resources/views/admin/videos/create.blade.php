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
                        <label >{{ __('adminstaticword.title') }}:<sup class="redstar">*</sup></label>
                        <input type="text" class="form-control" name="title" id="exampleInputTitle" placeholder="Video Title" value="{{old('title')}}">
                    </div>
                    <div class="col-md-6">
                      <label >{{ __('adminstaticword.subject') }}:<sup class="redstar">*</sup></label>
                      <select name="subject_id" class="form-control select2">
                        <option value="">Choose Subject</option>
                        @foreach($subjects as $subject)
                        <option value="{{$subject->id}}"
                         @if(old("subject_id")== $subject->id) {{'selected'}} @endif>
                         {{$subject->title}}</option>
                        @endforeach
                      </select>
                    </div>

                    <div class="col-md-6">
                      <label >{{ __('adminstaticword.grade') }}:<sup class="redstar">*</sup></label>
                      <select name="grade_id" class="form-control select2">
                        <option value="">Choose Grade</option>
                        @foreach($grades as $grade)
                        <option value="{{$grade->id}}"
                         @if(old("grade_id")== $grade->id) {{'selected'}} @endif>
                         {{$grade->title}}</option>
                        @endforeach
                      </select>
                    </div>
                    
                    <div class="col-md-6">
                      <label >Unit:<sup class="redstar">*</sup></label>
                      <input type="number" name="unit" min="1" max="15" class="form-control" 
                             placeholder="Choose Unit" value="{{old('unit')}}">
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
                    <div class="col-md-6">
                      <label for="exampleInputTit1e">{{ __('adminstaticword.video_background') }}:<sup class="redstar">*</sup></label>
                      <input type="file" name="img" class="form-control">
                    </div>
                 
    
                    <div class="col-md-6">
                      <label for="exampleInputDetails">{{ __('adminstaticword.Status') }}:<sup
                        class="redstar text-danger">*</sup></label><br>
                        
                        <select name="status" class="form-control select2">
                        <option value="1" @if(old("status")== 1) {{'selected'}} @endif >
                          Active</option>
                        <option value="0" @if(old("status")== 0) {{'selected'}} @endif>
                          Pending</option>
                      </select>                     
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

@endsection


