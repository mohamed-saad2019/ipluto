<!-- Fevicon -->
<link rel="shortcut icon" href="">
<!-- Start css -->
<!-- Switchery css -->

<link rel="icon" type="image/icon" href="{{url('images/logo.png')}}"> <!-- favicon-icon -->
<?php
$language = Session::get('changed_language'); //or 'english' //set the system language
$rtl = array('ar','he','ur', 'arc', 'az', 'dv', 'ku', 'fa'); //make a list of rtl languages
?>
@if (in_array($language,$rtl))
<link href="{{ url('admin_assets_rtl/assets/plugins/switchery/switchery.min.css') }}" rel="stylesheet">
<!-- Select2 css -->
<link href="{{ url('admin_assets_rtl/assets/plugins/select2/select2.min.css') }}" rel="stylesheet" type="text/css">
<!-- Slick css -->
<link href="{{ url('admin_assets_rtl/assets/plugins/slick/slick.css') }}" rel="stylesheet">
<link href="{{ url('admin_assets_rtl/assets/plugins/slick/slick-theme.css') }}" rel="stylesheet">
<link href="{{ url('admin_assets_rtl/assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
<!-- Fontawesome 4 css -->
<link rel="stylesheet" href="{{ url('admin_assets/assets/icons/font-awesome/css/font-awesome.min.css') }}">
<link href="{{ url('admin_assets_rtl/assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css') }}" rel="stylesheet" type="text/css">
<link href="{{ url('admin_assets_rtl/assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput-typeahead.css') }}" rel="stylesheet" type="text/css">
<link href="{{ url('admin_assets_rtl/assets/plugins/pnotify/css/pnotify.custom.min.css') }}" rel="stylesheet" type="text/css">
<link href="{{ url('admin_assets_rtl/assets/css/flag-icon.min.css') }}" rel="stylesheet" type="text/css">
<link href="{{ url('admin_assets_rtl/assets/plugins/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ url('admin_assets_rtl/assets/plugins/datatables/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
 <!-- Responsive Datatable css -->
<link href="{{ url('admin_assets_rtl/assets/plugins/datatables/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ url('admin_assets_rtl/assets/css/style.css') }}" rel="stylesheet" type="text/css">
<!-- jQuery ui css -->
<link href="{{ url('admin_assets_rtl/assets/plugins/jquery-ui/jquery-ui.min.css') }}" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="{{ url('admin_assets_rtl/css/imagestyle.css') }}" type="text/css">
<link rel="stylesheet" href="{{url('admin_assets_rtl/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')}}">
<!-- End css -->
<link rel="stylesheet" href="{{ url('admin_assets_rtl/assets/css/theme.css') }}" type="text/css">
@else
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
<link href="{{ url('admin_assets/assets/plugins/switchery/switchery.min.css') }}" rel="stylesheet">
<!-- Select2 css -->
<link href="{{ url('admin_assets/assets/plugins/select2/select2.min.css') }}" rel="stylesheet" type="text/css">
<!-- Slick css -->
<link href="{{ url('admin_assets/assets/plugins/apexcharts/apexcharts.css') }}" rel="stylesheet">
<link href="{{ url('admin_assets/assets/plugins/slick/slick.css') }}" rel="stylesheet">
<link href="{{ url('admin_assets/assets/plugins/slick/slick-theme.css') }}" rel="stylesheet">
<link href="{{ url('admin_assets/assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
<!-- Fontawesome 4 css -->
<link rel="stylesheet" href="{{ url("admin_assets/assets/icons/font-awesome/css/font-awesome.min.css") }}">
<link href="{{ url('admin_assets/assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css') }}" rel="stylesheet" type="text/css">
<link href="{{ url('admin_assets/assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput-typeahead.css') }}" rel="stylesheet" type="text/css">
<link href="{{ url('admin_assets/assets/plugins/pnotify/css/pnotify.custom.min.css') }}" rel="stylesheet" type="text/css">
<link href="{{ url('admin_assets/assets/css/flag-icon.min.css') }}" rel="stylesheet" type="text/css">
<link href="{{ url('admin_assets/assets/plugins/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ url('admin_assets/assets/plugins/datatables/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
 <!-- Responsive Datatable css -->

 <!-- jvectormap css -->

<link href="{{ url('admin_assets/assets/plugins/datatables/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ url('admin_assets/assets/css/style.css') }}" rel="stylesheet" type="text/css">
<!-- jQuery ui css -->
<link href="{{ url('admin_assets/assets/plugins/datepicker/datepicker.min.css') }}" rel="stylesheet" type="text/css">
<link href="{{ url('admin_assets/assets/plugins/jquery-ui/jquery-ui.min.css') }}" rel="stylesheet" type="text/css">

<link rel="stylesheet" href="{{ url('admin_assets/css/imagestyle.css') }}" type="text/css">
<link rel="stylesheet" href="{{url('admin_assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')}}">
<link rel="stylesheet" href="{{ url('admin_assets/css/theme.css') }}" type="text/css">
<link rel="stylesheet" href="{{ url('css/custom-style.css') }}" type="text/css">
<!-- End css -->

@endif

<link type="text/css" rel="stylesheet" href="{{ url("admin_assets/css/bootstrap-iconpicker.min.css") }}"/>





<link href="{{ url('admin_assets/assets/plugins/colorpicker/bootstrap-colorpicker.css') }}" rel="stylesheet" type="text/css">
<style type="text/css">
    .title_secondary__title_text--1Ugn3
    {
        word-wrap: break-word;
    vertical-align: sub;
    white-space: pre-line;
    -ms-word-break: break-all;
    word-break: break-word;
    word-wrap: break-word;
    }
</style>
{!! midia_css() !!}

@yield('stylesheet')
