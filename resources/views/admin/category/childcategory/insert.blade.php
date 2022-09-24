@extends('admin.layouts.master')
@section('title','Create a new Course')
@section('breadcum')
@component('components.breadcumb',['secondaryactive' => 'active'])
@slot('heading')
   {{ __('adminstaticword.ChildCategory') }}
@endslot

@slot('menu1')
   {{ __('adminstaticword.ChildCategory') }}
@endslot

@slot('button')

<div class="col-md-4 col-lg-4">
  <div class="widgetbar">
    <a href="{{url('childcategory')}}" class="float-right btn btn-dark-rgba mr-2"><i
      class="feather icon-arrow-left mr-2"></i>Back</a> </div>                        
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
    <h5 class="card-box">{{ __('adminstaticword.AddSubject') }}</h5>
        </div>
        <div class="card-body">
          <form id="demo-form2" method="post" action="{{url('childcategory/')}}" data-parsley-validate class="form-horizontal form-label-left" autocomplete="off">
            {{ csrf_field() }}
              
            <div class="row" style="display:none;">
              <div class="col-md-5">
                <label for="exampleInputTit1e">{{ __('adminstaticword.Category') }}</label>
                <select name="category_id" id="category_id" class="form-control select2">
                  <option value="0">{{ __('adminstaticword.Please Select Categories') }}</option>
                  @foreach($category as $cat)
                    <option value="{{$cat->id}}">{{$cat->title}}</option>
                  @endforeach
                </select>
              </div>

              <div class="col-md-5">
                <label for="exampleInputTit1e">{{ __('adminstaticword.SubCategory') }}</label>
                <select name="subcategories" id="upload_id" class="form-control select2">
                   @foreach($childcategory as $cat)
                    <option value="{{$cat->id}}">{{$cat->title}}</option>
                  @endforeach
                </select>
              </div>

              <div class="col-md-2">
                <label for="exampleInputTit1e">{{ __('adminstaticword.SubCategory') }}</label>
                <br>
                <button type="button" data-dismiss="modal" data-toggle="modal" data-target="#myModal7" title="AddCategory" class="btn btn-md btn-primary">{{ __('adminstaticword.Add') }}</button>
              </div>
            </div>
            <br>       
                   
            <div class="row">

              <div class="col-md-6">
                <label for="exampleInputTit1e">{{ __('adminstaticword.Title') }}:<sup class="redstar">*</sup></label>
                <input type="text" class="form-control" name="title" id="exampleInputTitle" placeholder="Enter your childcategory" value="">
              </div>
              <div class="col-md-4">
                <label for="exampleInputTit1e">{{ __('adminstaticword.SubCategory') }}</label>
                <select name="subcategories" id="upload_id" class="form-control select2">
                      <option value="0">{{ __('adminstaticword.PleaseSelectCourse') }}</option>
                   @foreach($childcategory as $cat)
                    <option value="{{$cat->id}}">{{$cat->title}}</option>
                  @endforeach
                </select>
              </div>

              <div class="col-md-2">
                <label for="exampleInputTit1e">{{ __('adminstaticword.SubCategory') }}</label>
                <br>
                <button type="button" data-dismiss="modal" data-toggle="modal" data-target="#myModal7" title="AddCategory" class="btn btn-md btn-primary">{{ __('adminstaticword.Add') }}</button>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <label for="exampleInputTit1e">{{ __('adminstaticword.Slug') }}:<sup class="redstar">*</sup></label>
                <input pattern="[/^\S*$/]+" type="text" class="form-control" name="slug" id="exampleInputTitle" placeholder="Enter slug" value="">
              </div>
         
            
             
            </div>
            <br>

            <div class="row">

               <div class="col-md-6">
                <label for="exampleInputTit1e">{{ __('adminstaticword.Icon') }}:<sup class="redstar">*</sup></label>
                
                <div class="input-group">
                  <input type="text" class="form-control iconvalue" name="icon" value="Choose icon">
                  <span class="input-group-append">
                      <button  type="button" class="btnicon btn btn-outline-secondary" role="iconpicker"></button>
                  </span>
              </div>
              </div>


              <div class="col-md-6">
                <label for="exampleInputDetails">{{ __('adminstaticword.Status') }}:</label>
                <br>
                <input  class="custom_toggle"  type="checkbox" name="status"  checked />

                   
                  <label class="tgl-btn" data-tg-off="Disable" data-tg-on="Enable" for="status"></label>
                
                <input type="hidden"  name="free" value="0" for="status" id="status">
              </div>
            </div>
            <br>

            <div class="box-footer">
              <button type="submit" class="btn btn-lg col-md-3 btn-primary-rgba">{{ __('adminstaticword.Save') }}</button>
            </div>
       
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@include('admin.category.childcategory.child') 
@endsection
@section('scripts')

<script>
(function($) {
  "use strict";

  $(function() {
    var urlLike = '{{ url('admin/dropdown') }}';
    $('#category_id').change(function() {
      var up = $('#upload_id').empty();
      var cat_id = $(this).val();    
      if(cat_id){
        $.ajax({
          headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          type:"GET",
          url: urlLike,
          data: {catId: cat_id},
          success:function(data){   
            console.log(data);
            up.append('<option value="0">Please Choose</option>');
            $.each(data, function(id, title) {
              up.append($('<option>', {value:id, text:title}));
            });
          },
          error: function(XMLHttpRequest, textStatus, errorThrown) {
            console.log(XMLHttpRequest);
          }
        });
      }
    });
  });

})(jQuery);
</script> 
  
@endsection

