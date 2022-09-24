@extends('admin.layouts.master')
@section('title','All Course')
@section('maincontent')
@component('components.breadcumb',['secondaryactive' => 'active'])
@slot('heading')
{{ __('adminstaticword.Lessons') }}
@endslot

@slot('menu1')
{{ __('adminstaticword.Lessons') }}

@endslot

@endcomponent
<div class="contentbar">
  <!-- Start row -->

  <!--=========master check box fro bulk delete start ==============================================-->
  <!--=========master check box fro bulk delete start ==============================================-->
<div class="row" style="margin-bottom: 40px">
      <div class="col-lg-4">
        <form class="navbar-form" role="search">
          <div class="input-group ">
            <form method="get" action="">
              <input value="{{ app('request')->input('title') ?? '' }}" type="text" name="searchTerm" cllass="form-control float-left text-center" placeholder="{{__('Search Courses')}}">
              <button type="submit" class="search-button"><i class="fa fa-search"></i></button>
            </form>
            @if(app('request')->input('searchTerm') != '')
            <a role="button" title="Back" href="{{ url('course') }}" name="clear" value="search" id="clear_id"
                class="btn btn-warning-rgba btn-xs">
                Clear Search
            </a>
            @endif
         
          </div>
        </form>
      </div>

     


      <div class="col-md-8 text-right mb-2">
        
          <a href="{{url('course/create')}}" class="btn btn-primary-rgba mr-2"><i
              class="feather icon-plus mr-2"></i>Add Lesson</a>
      
          @if(Auth::User()->role == "admin" )
          <button type="button" class="btn btn-danger-rgba mr-2" data-toggle="modal" data-target="#bulk_delete"><i
              class="feather icon-trash mr-2"></i> Delete Selected</button>
              <button type="button" class="btn btn-success-rgba mr-2">
                <div class="select-all-checkbox">
        
                  <div>
                    <input id="checkboxAll" type="checkbox" class="filled-in width-15 height-15 t-3 position-relative"
                      name="checked[]" value="all" />
                    <label for="checkboxAll" class="material-checkbox"></label> Select All
                  </div>
                  
          
                </div>
          
              </button>
          @endif
          
        
          <li class="list-inline-item">
            <div class="settingbar">
              <a href="javascript:void(0)" id="infobar-settings-open" class="btn btn-warning-rgba">
                <i class="feather icon-filter mr-2"></i>Filter
              </a>
            </div>
          </li>
          <form action="" method="get" class="filterForm">
            <div id="infobar-settings-sidebar" class="infobar-settings-sidebar">
              <div class="infobar-settings-sidebar-head d-flex w-100 justify-content-between">
                <h4>Filtered</h4>
                <a href="javascript:void(0)" id="infobar-settings-close" class="btn btn-primary close">
                  <img src="admin_assets/assets/images/svg-icon/close.svg" class="img-fluid menu-hamburger-close" alt="close">
                </a>
              </div>
              <div class="infobar-settings-sidebar-body">
                <div class="custom-mode-setting">
                  <div class="row align-items-center">
                    <div class="col-8">
                      <h6 class="mb-0 filter">Price</h6>
                    </div>
                   
                      <div class="col-4 text-right">
                        <div class="form-group">
                          <div class="update-password1">
                            <input type="checkbox" id="myCheck1" name="type" class="custom_toggle" onclick="myFunction()">
                          </div>
                        </div>
                      </div>
                      <div style="display: none" id="update-password1">
                          <div class="form-group text-right col-md-12">
                            <select required="" name="type" id="myCheck1" class="form-control select2">
                              <option value="paid">Paid</option>
                          <option value="free">Free</option>
                        </select>
                      </div>
                    </div>

      
                  </div>
      
                </div>
                <div class="custom-mode-setting">
                  <div class="row align-items-center pb-3">
                    <div class="col-8">
                      <h6 class="mb-0 filter">Status</h6>
                    </div>
                    <div class="col-4 text-right"><input type="checkbox" name="status" class="custom_toggle"  /></div>
                  </div>
      
                </div>
                <div class="custom-mode-setting">
                  <div class="row align-items-center pb-3">
                    <div class="col-8">
                      <h6 class="mb-0 filter">Featured</h6>
                    </div>
                    <div class="col-4 text-right"><input type="checkbox" name="featured" class="custom_toggle"  /></div>
                  </div>
      
                </div>
                <div class="custom-mode-setting">
                  <div class="row align-items-center pb-3">
                    <div class="col-8">
                      <h6 class="mb-0 filter">A-Z</h6>
                    </div>
                    <div class="col-4 text-right"><input type="checkbox" name="asc" class="custom_toggle"  /></div>
                  </div>
      
                </div>
                <div class="custom-mode-setting">
                  <div class="row align-items-center pb-3">
                    <div class="col-8">
                      <h6 class="mb-0 filter">Z-A</h6>
                    </div>
                    <div class="col-4 text-right"><input type="checkbox" name="desc" class="custom_toggle"  /></div>
                  </div>
      
                </div>
                <div class="infobar-settings-sidebar-body">
                  <div class="custom-mode-setting">
                    <div class="row align-items-center pb-3">
                      <div class="col-8">
                        <h6 class="mb-0 filter">Category</h6>
                      </div>
                      
                        <div class="col-4 text-right">
                          <div class="form-group">
                            <div class="update-password">
                              <input type="checkbox" id="myCheck" name="category_id" class="custom_toggle" onclick="myFunction()">
                            </div>
                          </div>
                        </div>
                        <div style="display: none" id="update-password">
                            <div class="form-group text-right col-md-12">
                              <select autofocus="" class="form-control select2" name="category_id">
                                <option value="">Select Category</option>
                                @foreach($categorys as $category)
            
                                <option value="{{ $category->id }}">{{ $category->title }}</option>
                                @endforeach
                              </select>
            
                        </div>
                      </div>
      
        
                    </div>
        
                  </div>
                </div>
              </div>
              <div class="form-group col-md-12 text-center">
                <button type="reset" class="btn btn-danger reset-btn"><i class="fa fa-ban"></i> Reset Filter</button>
                <button type="submit" class="btn btn-primary"><i class="fa fa-check-circle"></i>
                  Apply Filter</button>
              </div>
          </form>
      </div>
  </div>

  
  <div class="col-lg-12 mt-3 text-center">
    @if(request()->get('searchTerm'))
        <h5 class="">{{ __("Showing") }} {{ filter_var($course->count()) }} {{ __("of") }} {{ filter_var($course->total()) }} {{ __("results for ") }} "<span class="text-primary">{{  Request::get('searchTerm') }}</span>"</h5>
        <div class="clearfix"></div>
      @endif
  </div>
  
      @forelse($course as $cat)
        
        <div class="col-lg-4 mb-4">
          <input type='checkbox' form='bulk_delete_form'
            class='form-card-input check filled-in material-checkbox-input position-absolute width-25 height-25 l-30 t-13'
            name='checked[]' value="{{ $cat->id }}" id='checkbox{{ $cat->id }}'>
          <label for='checkbox{{ $cat->id }}' class='material-checkbox'></label>
          <div class="card">
            @if($cat['preview_image'] !== NULL && $cat['preview_image'] !== '' && @file_get_contents('images/course/'.$cat['preview_image']))
            <img class="card-img-top" src="{{ url('images/course/'.$cat['preview_image']) }}" alt="User Avatar">
            <div class="overlay-bg"></div>
            @else
            <img class="card-img-top" src="{{ Avatar::create($cat->title)->toBase64() }}" alt="User Avatar">
            <div class="overlay-bg"></div>
            @endif
            <div class="card-img-block">
              <h4 class="mt-3 card-title" style="color:white;">{{ $cat->title }}</h4>
              <p class="card-sub-title" style="color:white;">@if(isset($cat->user)) {{ $cat->user['fname'] }} @endif</p>
            </div>
            <div class="card-user-img">

              @if($cat->user['user_img'] != null && $cat->user['user_img'] !='')

                <img src="{{ url('images/user_img/'.$cat->user->user_img) }}" alt="profilephoto" class="img-fluid">

                @else

                <img src="{{ Avatar::create($cat->user['fname'])->toBase64() }}" alt="profilephoto" class="img-fluid">

              @endif

            </div>
            <div class="card-body">

              <div style="list-style-type: none;" class="mt-4"><a href="#" style="color:black">Type <span
                    class="pull-right">
                    @if($cat->type == '1')
                    Paid

                    @else
                    Free
                    @endif

                  </span></a></div>
                  <li style="list-style-type: none;" class="mt-3"> 
                    <a href="#" style="color:black">Features<span class="pull-right">
                   <input  data-id="{{$cat->id}}" type="checkbox"  class="custom_toggle status1" name="featured" {{ $cat->featured == 1 ? 'checked' : ''}} />
                    </span>
                    </a>
                    
                  </li>
              <li style="list-style-type: none;" class="mt-3">
                <a href="#" style="color:black">Status<span class="pull-right">
                    <input  data-id="{{$cat->id}}" type="checkbox"  class="custom_toggle status2" name="status" {{ $cat->status == 1 ? 'checked' : ''}} />
                </span>
                </a>
              
              </li>

            </div>
            <div class="card-footer">
              <div class="row mt-3 mb-3">
                <div class="col-1"></div>
                <div class="col-2">
                  <a href="{{ route('course.show',$cat->id) }}">

                    <i title="Edit" class="feather icon-edit"></i></a>
                </div>
                <div class="col-2">
                  <a data-toggle="modal" data-target="#delete{{ $cat->id }}">
                    <i title="Delete" class="text-primary feather icon-trash"></i></a>

                  <div class="modal fade bd-example-modal-sm" id="delete{{$cat->id}}" tabindex="-1" role="dialog"
                    aria-hidden="true">
                    <div class="modal-dialog modal-sm">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleSmallModalLabel">Delete</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <h4>{{ __('Are You Sure ?')}}</h4>
                          <p>{{ __('Do you really want to delete')}} ? {{ __('This process cannot be undone.')}}</p>
                        </div>
                        <div class="modal-footer">
                          <form method="post" action="{{url('course/'.$cat->id)}}" class="pull-right">
                            {{csrf_field()}}
                            {{method_field("DELETE")}}
                            <button type="reset" class="btn btn-secondary" data-dismiss="modal">No</button>
                            <button type="submit" class="btn btn-primary">Yes</button>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-2">
                  <a href="{{ route('user.course.show',['id' => $cat->id, 'slug' => $cat->slug ]) }}" target="_blank"
                    title="Show">

                    <i class="feather icon-eye"></i></a>
                </div>



                <!--==================bulk delete start========================================-->

                <div id="bulk_delete" class="delete-modal modal fade" role="dialog">
                  <div class="modal-dialog modal-sm">
                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <div class="delete-icon"></div>
                      </div>
                      <div class="modal-body text-center">
                        <h4 class="modal-heading">Are You Sure ?</h4>
                        <p>Do you really want to delete selected item ? This process
                          cannot be undone.</p>
                      </div>
                      <div class="modal-footer">
                        <form id="bulk_delete_form" method="post" action="{{ route('cource.bulk.delete') }}">
                          @csrf
                          @method('POST')
                          <button type="reset" class="btn btn-gray translate-y-3" data-dismiss="modal">No</button>
                          <button type="submit" class="btn btn-danger">Yes</button>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>

                <!--=================== bulk delete end =======================================--->


                @if(Module::has('Homework') && Module::find('Homework')->isEnabled())
                <div class="col-2">
                  @include('homework::admin.icon')
                </div>
                @endif

                <div class="col-2 duplicate">


                  {{-- <a href="{{route('course.duplicate',$cat->id)}}"><i class="feather icon-eye"></i></a> --}}
                  <a href="#" title="Duplicate">
                    <form action="{{ route('course.duplicate',$cat->id) }}" method="POST">
                      {{ csrf_field() }}
                      <button type="Submit" class="btn mr-3">
                        <i class="text-primary feather icon-copy"></i>
                      </button>
                    </form>

                  </a>


                </div>
                <div class="col-1"></div>
              </div>
            </div>



          </div>
        </div>
        <br>
        <br>
        @empty
        <h3 class="col-md-12 mt-5 text-center">
          <i class="fa fa-frown-o text-warning"></i> {{ __("No Course Found !") }}
        </h3>
        @endforelse

      <br>

      <div class="col-xs-12">

        <div class="pull-right">
          {!! $course->render() !!}
        </div>
      </div>


    

    <br>
    <br>
    <br>



  </div>
  <!-- End row -->
</div>

@endsection
@section('script')

<script>
  $(function () {
    $('.status1').change(function () {
      var featured = $(this).prop('checked') == true ? 1 : 0;

      var id = $(this).data('id');


      $.ajax({
        type: "GET",
        dataType: "json",
        url: 'cource-featured-status',
        data: {
          'featured': featured,
          'id': id
        },
        success: function (data) {
          console.log(id)
        }
      });
    });
  });
</script>
<!-- script to change featured-status end -->
<!-- script to change status start -->
<script>
  $(function () {
    $('.status2').change(function () {
      var status = $(this).prop('checked') == true ? 1 : 0;

      var id = $(this).data('id');


      $.ajax({
        type: "GET",
        dataType: "json",
        url: 'cource-status',
        data: {
          'status': status,
          'id': id
        },
        success: function (data) {
          console.log(id)
        }
      });
    });
  });
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
<script>
  (function($) {
    "use strict";
    $(function(){
        $('#myCheck1').change(function(){
          if($('#myCheck1').is(':checked')){
            $('#update-password1').show('fast');
          }else{
            $('#update-password1').hide('fast');
          }
        });
        
    });
  })(jQuery);
  </script>
<script>
  $(document).ready(function () {
    $(".reset-btn").click(function () {
      var uri = window.location.toString();

      if (uri.indexOf("?") > 0) {

        var clean_uri = uri.substring(0, uri.indexOf("?"));

        window.history.replaceState({}, document.title, clean_uri);

      }

      location.reload();
    });
  });
</script>
<!-- script to change status end -->

<script>
    $('#search').on('change', function () {
        var v = $(this).val();
        if (v == 'search') {
            $('#clear_id').show();
            $('#clear').attr('required', '');
        } else {
            $('#clear_id').hide();
        }
    });
</script>
@endsection