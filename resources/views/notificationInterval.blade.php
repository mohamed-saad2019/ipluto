       
                               @foreach(notifications($colum) as $n)
                                   <!-- begin notifications-item -->
                                     <div class="notifications-item">
                                                               
                                         <div class="text row" style="margin-right:0px;">
                                           <div class="col-md-2">
                                              @if($n->type == 'ipluto')
                                                <img src="../images/logo.png">
                                              @elseif($n->type == 'instructor' or $n->type == 'student')
                                                @if($n->user->user_img != null && $n->user->user_img && @file_get_contents('images/user_img/'.$n->user->user_img))
                                                    <img src="{{ url('images/user_img/'.$n->user->user_img)}}"
                                                        alt="profilephoto" class="rounded-circle">

                                                    @elseif($n->user->user_img != null && $n->user->user_img
                                                    !='' && @file_get_contents('images/avatar/'. $n->user->user_img))
                                                    <img src="{{ url('images/avatar/'.$n->user->user_img)}}"
                                                        alt="profilephoto" class="rounded-circle">

                                                    @else

                                                    <img @error('photo') is-invalid @enderror
                                                        src="{{ Avatar::create($n->user->fname)->toBase64() }}"
                                                        alt="profilephoto" class="rounded-circle">
                                                    @endif
                                              @endif
                                           </div>
                                           <div class="col-md-7">
                                               <h6 class="text-capitalize">
                                                @if($n->type == 'ipluto')
                                                  Ipluto

                                                 @elseif($n->type == 'instructor')
                                                  Mr {{str_limit($n->user->fname.' '.$n->user->lname,15)}} 

                                                 @elseif($n->type == 'student')
                                                  {{str_limit($n->user->fname.' '.$n->user->lname,15)}} 
                                                @endif
                                                </h6>
                                           </div>
                                           <div class="col-md-3">
                                                <p >
                                                 {{ \Carbon\Carbon::parse($n->notify_date)->shortRelativeDiffForHumans() }}
                                                 </p>
                                           </div>
                                           <div class="col-md-12" style="margin: -20px 50px 2px;">
                                            @if($n->notifiable_type == 'zoom' )
                                               @php 
                                               $zoom = \App\Zoom::where('id',$n->notifiable_id)->first();
                                               @endphp
                                               <p><a href="{{$zoom->url ?? '#'}}"> {{$n->data}} </a> </p>
                                            
                                             @else
                                                 <p><a 
                                                @if($n->notifiable_type == 'today_class' ) href="{{url('student/livesession')}}" 

                                                @elseif($n->notifiable_type == 'add_lesson' ) href="{{url('student/view_lesson?lesson_id='.$n->notifiable_id)}}"

                                                @elseif($n->notifiable_type == 'del_lesson' ) href="#"

                                                @elseif(!empty($n->notify_url)) href="{{url($n->notify_url)}}"

                                                @else href="" @endif> {{$n->data}} </a> </p>

                                             @endif
                                           </div>
                                        </div>                                     
                                 </div>
                                   <!-- End notifications-item -->
                                @endforeach
                            