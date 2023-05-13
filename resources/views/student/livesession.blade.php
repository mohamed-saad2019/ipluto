@extends('student.layouts.head')        
@section('title','Live Session')
@section('maincontent') 

    <div class="Page__content">
        <div class="live__session">
            <div class="container">
            <div class="join__lesson">
                <div class="text-center">
                <h4 class="h4 title"> Join a Lesson</h3>
                    <p class="">Your teacher will give you CODE to enter  </p>
                </div>
                <form method="post" action="{{route('join.zoom')}}"  enctype="multipart/form-data">
                    {{ csrf_field() }}
                    {{ method_field('post') }}
                    <div class="enter__code">
                        <small class="text-capitalize">Enter code</small>
                        <div class="code">
                            <div class="d-flex">
                                <input type="text" class="form-control" name="code" placeholder="Enter code" required="required">
                                <input type="submit" class="btn btn-primary" value="Join"></button>
                            </div>
                            @if(Session::has('error'))
                            <p class="alert {{ Session::get('alert-class', 'alert-danger') }}">{{ Session::get('error') }}</p>
                            @endif
                        </div>
                    </div>
                </form>
            </div>

            </div>
        </div>
    </div>



@endsection


