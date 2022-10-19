    <div class="container">

      <nav class=" sub__breadcrumb d-flex justify-content-between">
        <div class="Subject" style="display:inline">
          <div class="d-flex align-items-center ">
            Subject
            <div class="dropdown ml-1">
              <button class="btn dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                 @if(!request()->has('subject_id') or empty(request('subject_id')))
                    Chooes
                 @else
                    {{get_name_subject(request('subject_id'))}}
                 @endif
              </button>
              <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                  @foreach(get_student_subjects() as $sub)
                    <a class="dropdown-item" href="{{url()->current().'?subject_id='.$sub->id}}">
                        {{$sub->title}}
                    </a>
                  @endforeach
              </div>
            </div>
          <div class="d-flex align-items-center float-righ" style="margin:0px 50px">
            Instructor
            <div class="dropdown ml-1">
              <button class="btn dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                 {{$my_teacher->fname.' '.$my_teacher->lname}}
              </button>
              <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                @if(!empty($my_teachers))
                  @foreach($my_teachers as $teacher)
                    <a class="dropdown-item" href="{{url()->current().'?subject_id='.request('subject_id').'&instructor_id='.$teacher->instructor->id}}">
                       {{$teacher->instructor->fname.' '.$teacher->instructor->lname}}
                    </a>                   
                  @endforeach
                @else
                  <a class="dropdown-item" href="{{url()->current().'?subject_id='.request('subject_id').'&instructor_id='.$my_teacher->id}}">
                       {{$my_teacher->fname.' '.$my_teacher->lname}}
                    </a> 
                @endif
              </div>
            </div>
          </div>
        </div>




      </nav>

    </div>