@extends('admin.layouts.master')
@section('title','Report')
@section('maincontent')
@component('components.breadcumb',['secondaryactive' => 'active'])
@slot('heading')
   {{ __('Report') }}
@endslot

@slot('menu1')
   {{ __(' Quiz Report') }}
@endslot
@endcomponent

<div class="contentbar"> 
  <div class="row">
    <div class="col-lg-12">
          <div class="card m-b-30">
              <div class="card-header">
                  <h5 class="card-title">All Quiz Report</h5>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                      <table id="datatable-buttons" class="table table-striped table-bordered">
                          <thead>
                            <tr>
                              <th>User</th>
                              <th>Email</th>          
                              <th>Quiz </th>
                              <th>Marks Get</th>
                              <th>Total Marks</th>
                              </tr>
                          </thead>
                          <tbody>
                           @foreach($quiz as $q)
                            @php
                            
                            $course = App\Course::where('id',$q['course_id'])->first();
                            $user = App\User::where('email',$q['useremail'])->first();
                            $ans = App\QuizAnswer::where('topic_id',$q['topicid'])->where('user_id',$user->id)->get();
                            // @dd($course);
                            if(isset($course)){
                                if(Auth::user()->role == "instructor")
                              {
                                $check = $course->user_id == Auth::user()->id;
                              }
                              else{
                                $check = $ans;

                              }
                            }
                            
                            
                            @endphp
                           
                            @if(isset($check))
                           
                             <tr>
                              <td>{{ $q['fname'] }} {{$q['lname']}}</td>
                              <td>{{ $q['useremail'] }}</td>
                              <td>{{ $q['topictitle'] }}</td>
                              <td>
                                @php
                                $mark=0;
                                $correct = collect();
                                  foreach($ans as $answer){
                                    if($answer->type != 1){
                                      if($answer->user_answer == $answer->answer){
                                        $mark++;
                                      }
                                    }else{
                                      if($answer->txt_approved == 1){
                                        $mark++;
                                      }
                                    }
                                  }
                                  $correct = $mark*$q['per_q_mark'];
                                @endphp
                                {{$correct}}
                              </td>
                              <td>{{ $q['quizquestion_count'] * $q['per_q_mark'] }}</td>
                              </tr> 

                             @endif 
                            @endforeach
                           
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

