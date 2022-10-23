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
        </div>




      </nav>

    </div>