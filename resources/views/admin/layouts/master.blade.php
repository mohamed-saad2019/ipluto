<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="{{ $gsetting->meta_data_desc }}">
    <meta name="keywords" content="{{ $gsetting->meta_data_keyword }}">
    <meta name="author" content="{{ config('app.name') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    @if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests"> 
    @endif
    <!-- <title>@yield('title') | {{ __('Admin') }}</title> -->
    <title>@yield('title')</title>
    @include('admin.layouts.head')
    <style>
       .select2-selection .select2-selection--single{
                padding: 7px 5px !important
            }
    </style>
</head>
<body class="vertical-layout"> 
<div id="containerbar">
    @if(Auth::User()->role == "admin")
    @include('admin.layouts.sidebar')
  @endif
  @if(Auth::User()->role == "instructor")
    @include('instructor.layouts.sidebar')
  @endif
   

<div class="rightbar">
     @include('admin.layouts.topbar')
    
    
 
   
        @yield('maincontent')
       

         <!-- Start Footerbar -->
    <div class="footerbar">
        <footer class="footer">
          {{ $gsetting->project_title }} @if(Auth()->user()->role == "admin") (version {{ env('APP_VERSION') }}) @endif
            <p class="mb-0">© {{ $gsetting->cpy_txt }} {{ get_release() }}</p>
        </footer>
    </div>
       
  
  
    
    <!-- End Footerbar -->
</div>

</div>
     <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <link href="{{ url('admin_assets/assets/plugins/select2/select2.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ url('admin_assets/assets/plugins/select2/select2.min.css') }}" rel="stylesheet" type="text/css">
    <script src="{{ url('admin_assets/assets/plugins/select2/select2.min.js') }}"></script>    
    <script src="{{ url('admin_assets/assets/js/custom/custom-form-select.js') }}"></script>   
    <script src="{{ url('admin_assets/assets/plugins/select2/select2.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script type="text/javascript">
            $('.select2').select2({allowClear: true});

            
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
                                // alert('error2');
                            }
                        }); 
                 }); 
            
              var del_buttonEn = $(".del_buttonEn");
                    $(del_buttonEn).click(function(e) {
                        $('#grades').find('.grades_added:first').remove();    
                        $('#subjects').find('.subjects_added:first').remove();       
                     })

            var add_buttonEn = $(".add_more");
            var wrapperEn  = $("#grades");
            var wrapperEn1 = $("#subjects");

            let index = 0;
             $(add_buttonEn).click(function(e) {
                // console.log($(".selectGrades option").contents() ) ;
                var optionsGrade = new Array();
                $('.selectGrades option').each(function(){
                    optionsGrade.push("<option value="+$(this).val()+">"+$(this).text()+"</option>");
                });
                var selectSubjects = new Array();
                $('.selectSubjects option').each(function(){
                    selectSubjects.push("<option value="+$(this).val()+">"+$(this).text()+"</option>");
                });

                index++
                e.preventDefault();
                    $(wrapperEn).append(`<div class="grades_added" style="margin:10px 0px">
                      <select class="form-control select2" multiple="multiple" id="`+index+`_grade" name="grade_`+index+`[]" style="margin:10px 0px" !important>"`+ optionsGrade +`"</select></div>`); //add input box
                    $(wrapperEn1).append(`<div class="subjects_added" style="margin:10px 0px">
                        <select class="form-control " id="`+index+`_subject" name="course[]">
                                        "`+selectSubjects+`" </select> </div>`); //add input box

                    $('#'+index+'_grade').select2({allowClear: true});
                } 
            );

    </script>
 @include('admin.layouts.scripts')
 @yield('scripts')
</body>
</html>