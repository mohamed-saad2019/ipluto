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
                 @elseif(request()->has('class_id') and !empty(request('subject_id')))
                    {{get_name_subject(request('subject_id'))}}
                    ( {{getClassByKey('',request('class_id'))->name}} )
                    ( {{getClassByKey('',request('class_id'))->instructor->fname}} 
                    {{getClassByKey('',request('class_id'))->instructor->lname}} )  
                 @elseif(request()->has('subject_id') and !empty(request('subject_id')))
                    {{get_name_subject(request('subject_id'))}}
                 @endif
              </button>
              <div class="dropdown-menu" aria-labelledby="dropdownMenu2" style="width:330px !important;font-size: 16px !important;">
                  @foreach(get_student_subjects() as $sub)
                    <a class="dropdown-item" href="{{url()->current().'?subject_id='.$sub->childcategory->id.'&class_id='.$sub->id.'&instructor_id='.$sub->instructor->id}}" >
                       {{$sub->childcategory->title}} 
                       
                        ( {{$sub->name}}) ( {{$sub->instructor->fname}} {{$sub->instructor->lname}} )  
                       
                    </a>
                  @endforeach
              </div>
            </div>
          </div>
        </div>


      </nav>
    </div>