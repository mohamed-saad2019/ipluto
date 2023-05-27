@extends('instructor.layouts.head')    
@section('title','Dashboard')

@if(Auth::User()->role == "instructor")


@section('maincontent')
<div class="contentbar">
    <!-- Start row -->
    <div class="row">

  
        <div class="col-lg-12">

            <!-- Start row -->
            <div class="row">

                <!-- Start col -->
                <div class="col-md-3 col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <h4>
                                        {{
                                            \App\InstructorsSubjects::where('instructor_id',auth()->user()->id)->count()
                                        }}
                                    </h4>  
                                    <p class="font-14 mb-0">Total Subjects</p>
                                </div> 
                              <div class="col-6 text-right">
                                <a href="{{url('/instructor/setting?active=subject')}}"><i
                                    class="text-info feather icon-book-open icondashboard"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                  <div class="col-md-3 col-12">
                    <div class="card m-b-30 shadow-sm">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <h4>
                                      {{
                                        count(array_unique(\App\InstructorGrade::where('instructor_id',auth()->user()->id)->pluck('grade_id')->toArray()))
                                        }}
                                    </h4>
                                    <p class="font-12 mb-0">Total Grades</p>
                                </div>
                                <div class="col-6 text-right">
                                    <a href="{{url('/instructor/setting?active=subject')}}"><i
                                        class="text-warning feather icon-book-open icondashboard"></i></a>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
                  <div class="col-md-3 col-12">
                    <div class="card m-b-30 shadow-sm">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <h4>
                                      {{
                                             \App\Classes::where('instructor_id',auth()->user()->id)->count()
                                        }}
                                    </h4>
                                    <p class="font-12 mb-0">Total Classes</p>
                                </div>
                                <div class="col-6 text-right">
                                    <a href="{{url('/instructor/list_classes')}}"><i
                                        class="text-warning feather icon-aperture icondashboard"></i></a>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-12">
                    <div class="card m-b-30 shadow-sm">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <h4>

                                      @php
                                       $classes = \App\Classes::where('instructor_id',auth()->user()->id)->pluck('id')->toArray();

                                      @endphp

                                      {{
                                        \DB::table('class_days')->whereIn('class_id',$classes)
                                         ->where('day',\Carbon\Carbon::parse(now())->locale('en')->dayName)->count();
                                      }}

                                    </h4>
                                    <p class="font-12 mb-0">Total  today’s Classes</p>
                                </div>
                                <div class="col-6 text-right">

                                    <a href="{{url('/instructor/list_classes?today='.\Carbon\Carbon::parse(now())->locale('en')->dayName)}}"><i
                                        class="text-warning feather icon-aperture icondashboard"></i></a>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-12">
                    <div class="card m-b-30 shadow-sm">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <h4>{{
                                    \App\InstructorStudents::where('instructor_id',\Auth::user()->id)->where('type','center')->count();
                                    }}</h4>
                                    <p class="font-13 mb-0">Total Students<br>(Center)</p>
                                </div>
                                <div class="col-6 text-right">
                                    <a href="{{url('/instructor/students?type=center')}}"><i
                                        class="text-primary feather icon-users icondashboard"></i></a>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>

               <div class="col-md-3 col-12">
                    <div class="card m-b-30 shadow-sm">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <h4>{{
                                    \App\InstructorStudents::where('instructor_id',\Auth::user()->id)->where('type','online')->count();
                                    }}</h4>
                                    <p class="font-13 mb-0">Total Students<br>(Online)</p>
                                </div>
                                <div class="col-6 text-right">
                                    <a href="{{url('/instructor/students?type=online')}}"><i
                                        class="text-primary feather icon-users icondashboard"></i></a>
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
@section('scripts')
<script>

</script>
@endsection

@endif