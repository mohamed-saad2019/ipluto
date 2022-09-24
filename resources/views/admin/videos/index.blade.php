@extends('admin.layouts.master')
@section('title','All Countries')
@section('maincontent')
 

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
      <a  href=" {{url('videos/create')}}" class="btn btn-primary-rgba"><i class="feather icon-plus mr-2"></i>Add Videos</a>
    
                            
  </div>                        
</div>
@endslot
@endcomponent


  <div class="contentbar">                
    <!-- Start row -->
    <div class="row">
    
        <div class="col-lg-12">
            <div class="card m-b-30">
                <div class="card-header">
                    <h5 class="box-title">{{ __('Add Videos')}}</h5>
                </div>
                <div class="card-body">
                 
                    <div class="table-responsive">
                        <table id="datatable-buttons" class="table table-striped table-bordered">
                            <thead>
                            <tr>
                              <th> 
                                {{ __("#")}}</th>
                              <th>{{ __("title")}} </th>
                              <th>{{ __("video")}}</th>
                              <th>{{ __("Action")}}</th>
                      
                            </tr>
                            </thead>
                            <tbody>
                              <?php $i=0;?> 
                              @foreach ($data as $v)

                                <tr>
                                  <?php $i++;?>
                                  <td><?php echo $i;?></td>
                                  <td>{{ $v->title }}</td>
                                  <td><video width="100" height="70" controls>
                                        <source src="{{ url('storage/vedioTeachr/'.$v->path_video) }}" type="video/mp4">
                                        Your browser does not support the video tag.
                                        </video>
                                    </td>
                               <td>
                                
                                  <div class="dropdown">
                                      <button class="btn btn-round btn-primary-rgba" type="button" id="CustomdropdownMenuButton3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="feather icon-more-vertical-"></i></button>
                                      <div class="dropdown-menu" aria-labelledby="CustomdropdownMenuButton3">
                                          <a class="dropdown-item" data-toggle="modal" data-target=".bd-example-modal-sm"><i class="feather icon-delete mr-2"></i>{{ __("Delete")}}</a>
                                      </div>
                                  </div>
                                </td>
  
                                
                                <div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog modal-sm">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleSmallModalLabel">Delete</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <p class="text-muted">{{ __("Do you really want to delete these records? This process cannot be undone.")}}</p>
                                            </div>
                                            <div class="modal-footer">
                                              <form  method="post" action="{{url('videos/destroy/'.$v->id)}}
                                                "data-parsley-validate class="form-horizontal form-label-left">
                                                {{ csrf_field() }}
                                                
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __("Close")}}</button>
                                                <button type="submit" class="btn btn-primary">{{ __("Delete")}}</button>
                                            </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                           
              
                               
                              
                              </tr>
                               
                              
                                @endforeach
                              </tr>
                              
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- End col -->
    </div>
    <!-- End row -->
</div>        


@endsection
