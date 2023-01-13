@extends('instructor.layouts.head')    
@section('title','Zoom List')

@if(Auth::User()->role == "instructor")



@section('maincontent')
         

             <div class="Become">
              <div class="formTe">
               <div class="table-responsive">
                      
                         <table class="table table-hover" id='example1'>
                            <thead class="thead-dark">
                              <th scope="col">#</th>
                              <th scope="col">Class</th>
                              <th scope="col">Zoom Link</th>
                              <th scope="col">Code</th>
                              <th scope="col">Start Time</th>
                              <th scope="col">Created At</th>
                            </tr>
                          </thead>
                          <tbody style="background:#fff !important;">

                           
                            @foreach($zoom as $z)
                             <tr>
                                  
                                      <td>{{++$sum}}</td>
                                      <td>{{$z->name}}</td>
                                      <td><a href="{{$z->url}}">{{$z->url}}</a>
                                             <input type="hidden" value="{{$z->url}}" id="link_{{$z->name}}">
                                              <a id="a_{{$z->name}}" onclick="Copy('link_{{$z->name}}','a_{{$z->name}}')" title="{{__('main.copy_link')}}" style="color:#4839EB;font-size:20px;margin:0px 10px;cursor: pointer;" class="links">
                                                   <span class="action-edit"><i class="feather icon-copy"></i></span>
                                                 </a>

                                                 <script type="text/javascript">
                                                        
                                                   function Copy(id,id2)
                                                     {
                                                        $('.links').css('color','blue');
                                                        $('#'+id2).css('color','green');
                                                        var $temp = $("<input>");
                                                        $("body").append($temp);
                                                        $temp.val($('#'+id).val()).select();
                                                        document.execCommand("copy");
                                                        $temp.remove();
                                                    }
                                                    
                                                 </script>

                                      </td>
                                      <td>{{$z->code}}</td>
                                      <td>{{$z->start_time}}</td>
                                      <td>{{$z->created_at}}</td>
                             </tr>
                            @endforeach
                           

                          
                          </tbody>
                        </table>

                        </div>
                    </div>
                </div>


@endsection

@endif




@section('scripts')
<script>
    $(function () {
      $('#example1').DataTable({
               'ordering'    : false,
      })
    }) 
    
  </script>
@endsection