@extends('instructor.layouts.head')
@section('title','Create a live Lesson')
@section('maincontent')
<div class=" ">
    <div class="custom-container">
        <div class="formTe bg-white">
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            @if(Session::has('success'))
            <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('success') }}</p>
            @endif

        </div>
            <!-- <div class="custom-container">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb inner__breadcrumb d-flex justify-content-between">
                    <li class="breadcrumb-item active d-flex align-items-center" aria-current="page">
                        <img src="./images/Profile/breadcrumb_icon.png" class="img-fluid text-capitalize" alt="">
                        Create Live Session
                    </li>
                    <li class="back" aria-current="page">
                        <button type="button" class="btn btn-light text-capitalize">back </button>
                    </li>
                    </ol>
                </nav>
            </div> -->

            <div class="Page__content">
                <form method="post" action="{{route('saveZoom')}}"  enctype="multipart/form-data">
                    {{ csrf_field() }}
                    {{ method_field('post') }}
                    <div class="Createlive__session">
                        <div class="container">
                        <div class="Create__lesson px-5">
                            <div class="text-center">
                            <h4 class="h4 title">Create a live Lesson</h3>
                                <p class="">Please choce class and time to start</p>
                            </div>
                            <div class="Createlive__body">
                                <div class="class d-flex justify-content-between">
                                <div class="row div_zoom">
                                    <label class="col-sm-2 col-form-label">Calss </label>
                                    <div class="col-sm-10">
                                        <select class="form-control select2" multiple required="required" name="classes[]">
                                            @foreach($classes as $class)
                                            <option value="{{$class->id}}">{{$class->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <!-- <button class="btn btn-primary px-4">start now</button> -->
                                </div>
                                <div class="">
                                    <div class="row">
                                        <label class="col-sm-4 col-form-label text-capitalize">Start Now </label>
                                        <div class="col-sm-8">
                                            <input type="checkbox" name="now" id="input_now" >
                                        </div>
                                    </div>
                                </div>
                                <div class="date__time d-flex justify-content-between mt-4" id="dateTimeDiv">
                                    <div class="row">
                                        <label class="col-sm-2 col-form-label text-capitalize">date </label>
                                        <div class="col-sm-10">
                                            <input type="date" class="form-control" name="date">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-sm-2 col-form-label text-capitalize">time </label>
                                        <div class="col-sm-9 ml-1">
                                            <input type="time" class="form-control" name="time">
                                        </div>
                                    </div>
                                </div>
                                <div class="save text-center mt-4">
                                <button class="btn btn-primary px-5" id="saveZoom" onclick="submit_form();">Save</button>
                                </div>
                            </div>
                        </div>

                        </div>
                    </div>
                </form>
            </div>
    </div>
</div>






@endsection

@section('scripts')
<script src="{{ url('js/zoom.js')}}"></script>
@endsection