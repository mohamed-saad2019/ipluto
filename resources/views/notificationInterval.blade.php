       
                               @foreach(notifications($colum) as $n)
                                   <!-- begin notifications-item -->
                                     <div class="notifications-item">
                                         @if($n->notifiable_type == 'zoom')
                                           @php 
                                           $zoom = \App\Zoom::where('id',$n->notifiable_id)->first();
                                           @endphp
                                           <a href="{{$zoom->url}}"> 
                                          @else
                                           <a href="#">
                                          @endif
                                         
                                          @if($n->type == 'ipluto')
                                            <img src="../images/logo.png">
                                          @elseif($n->type == 'instructor')
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
                                         <div class="text row" style="margin-right:0px;">
                                           <div class="col-md-8">
                                               <h4 class="text-capitalize">
                                                @if($n->type == 'ipluto')
                                                  Ipluto

                                                 @elseif($n->type == 'instructor')
                                                   {{ucwords($n->user->fname)}} 
                                                   {{ucwords($n->user->lname)}} 
                                                @endif
                                                </h4>
                                           </div>
                                           <div class="col-md-4">
                                                <p >
                                                 {{ \Carbon\Carbon::parse($n->created_at)->shortRelativeDiffForHumans() }}
                                                 </p>
                                           </div>
                                           <div class="col-md-12">
                                               <p>{{$n->data}}</p>
                                           </div>
                                        </div>
                                       </a>
                                 </div>
                                   <!-- End notifications-item -->
                                @endforeach
                            