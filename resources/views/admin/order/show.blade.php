@extends('admin.layouts.master')
@section('title','Order')
@section('maincontent')
@component('components.breadcumb',['secondaryactive' => 'active'])
@slot('heading')
   {{ __('Order') }}
@endslot

@slot('menu1')
   {{ __('Order') }}
@endslot
@slot('button')

<div class="col-md-4 col-lg-4">
  <div class="widgetbar">
    <a href="{{route('order.create')}}"  class="float-right btn btn-primary-rgba mr-2"><i class="feather icon-plus mr-2"></i>Enroll User</a>
  </div>                        
</div>

@endslot
@endcomponent
<div class="contentbar"> 
  <div class="row">
    <div class="col-md-12">
      <div class="box box-primary">
        
       <div class="box-body">
       
    <div class="col-md-12">
      <div class="card m-b-30">
          <div class="card-header">
              <h5 class="card-box">Orders</h5>
          </div>
          <div class="card-body">
              <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                  <li class="nav-item">
                      <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Order</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Refund Order</a>
                  </li>
                  
              </ul>
              <div class="tab-content" id="pills-tabContent">
                  <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                    @include('admin.order.index')
                  </div>
                  <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                    @include('admin.refund_order.index')
                  </div>
                 
              </div>
          </div>
      </div>
  </div>
       </div>
      </div>
    </div>
  </div>
</div>
@endsection