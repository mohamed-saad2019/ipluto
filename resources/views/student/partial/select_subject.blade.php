    <div class="container">

      <nav class=" sub__breadcrumb d-flex justify-content-between">
        <div class="Subject">
          <div class="d-flex align-items-center ">
            Subject
            <div class="dropdown ml-1">
              <button class="btn dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                 @if(!request()->has('subject_id') or empty(request('subject_id')))
                    Chooes
                 @elseif(request()->has('data') and !empty(request('data')))
                   {{  request('data')}}
                 @elseif(request()->has('class_key') or request()->has('class_id'))
                  @if(getClassByKey(request('class_key'),request('class_id')) and !empty(get_student_subjects()))
                    {{get_name_subject(request('subject_id'))}}
                    ( {{getClassByKey(request('class_key'),request('class_id'))->name}} )
                    ( {{getClassByKey(request('class_key'),request('class_id'))->instructor->fname}} 
                    {{getClassByKey(request('class_key'),request('class_id'))->instructor->lname}} ) 
                  @endif
                 @endif
              </button>
              <div class="dropdown-menu" aria-labelledby="dropdownMenu2" style="width:460px !important;font-size: 16px !important; overflow:hidden;">
                  @foreach(get_student_subjects() as $sub)
                    <a class="dropdown-item" href="{{url()->current().'?subject_id='.$sub->childcategory->id.'&class_id='.$sub->id.'&instructor_id='.$sub->instructor->id.'&data='. $sub->childcategory->title . ' ( ' .$sub->name .') ( ' .$sub->instructor->fname.' '. $sub->instructor->lname .')' }}" 
                    title="{{$sub->childcategory->title}}( {{$sub->name}}) ( {{$sub->instructor->fname}}{{$sub->instructor->lname}} )">
                      
                      @php 
                       $days = \DB::table('class_days')->where('class_id',$sub->id)->where('day',\Carbon\Carbon::parse(now())->locale('en')->dayName)->pluck('class_id')->toArray();
                      @endphp

                       {{str_limit($sub->childcategory->title .'('.$sub->name.') - Mr '.$sub->instructor->fname.' '.$sub->instructor->lname,40)}} 
                      
                       @if(in_array($sub->id,$days))
                        - Today
                       @endif
                    </a>
                  @endforeach
              </div>
            </div>
          </div>
        </div>


      </nav>
    </div>

