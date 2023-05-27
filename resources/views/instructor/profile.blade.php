@extends('instructor.layouts.head')
@section('title','Profile')
@section('maincontent')
<style>
    .select2-selection__rendered
    {
        border: 1px solid #ddd;
    }
</style>
<div class="uplode__page">
    <div class="container">
         @if(Session::has('success') and !empty(Session::get('success')))
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ Session::get('success') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          @endif
           @if ($errors->any())
             <div class="alert alert-danger">
               <ul>
                @foreach ($errors->all() as $error)
                   <li>{{ $error }}</li>
                @endforeach
               </ul>
          </div>
          @endif
        <div class="shadow-sm p-3 mb-5 bg-white rounded ">
            <div class="row">
               
                <div class="col-md-8">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <!-- begin File tab -->
                        <li class="nav-item" role="presentation">
                            <button class="nav-link @if(! request('active')) active @endif" id="File-tab" data-toggle="tab" data-target="#File"type="button" role="tab" aria-controls="File" aria-selected="true">Personal Info</button>
                        </li>
                        <!-- End File tab -->
                        <!-- begin Video tab -->
                        <li class="nav-item" role="presentation">
                            <button class="nav-link @if(request('active')=='subject') active @endif" id="Video-tab" data-toggle="tab" data-target="#Video" type="button" role="tab" aria-controls="Video" aria-selected="false">
                                Subjects
                            </button>
                        </li>
                        <!-- End Video tab -->
                    </ul>

                    <div class="tab-content mt-4">

                        <!-- begin file tab content -->
                        <div class="tab-pane fade @if(! request('active')) show active @endif" id="File" role="tabpanel" aria-labelledby="File-tab">
                            
                        <!-- begin class dropdown  -->
                         <form action="{{url('instructor/save_profile')}}" method="POST"
                              enctype="multipart/form-data">
                            {{ csrf_field() }}

                                <div class="form-group row class__dropdown">
                                  <label for="store__title" class="col-sm-2 col-form-label">Full Name</label>
                                    <div class="col-sm-4 dropdown" id="">
                                       <input type="text" class="form-control " id="store__title" placeholder="First Name" name="fname"  value="{{$user->fname}}" required>
                                    </div>
                                     @if($errors->has('fname'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('fname') }}</strong>
                                    </span>
                                    @endif
                                     <div class="col-sm-4 dropdown" id="">
                                       <input type="text" class="form-control " id="store__title1" placeholder="Last Name" name="lname" value="{{$user->lname}}" required>
                                    </div>
                                     @if($errors->has('lname'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('lname') }}</strong>
                                    </span>
                                    @endif
                                </div>

                               <div class="form-group row class__dropdown">
                                <label for="youtube" class="col-sm-2 col-form-label">
                                    Email
                                </label>
                                <div class="col-sm-8 dropdown" id="">
                                    <input type="text" class="form-control" name="email" required 
                                    id="youtube"  placeholder="Email" value="{{$user->email}}">
                                </div>
                                   @if($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <div class="form-group row class__dropdown">
                                <label for="phone" class="col-sm-2 col-form-label">
                                    Phone
                                </label>
                                <div class="col-sm-8 dropdown" id="">
                                     <input type="number" class="form-control" name="mobile" required 
                                    id="phone"  placeholder="Phone" value="{{$user->mobile}}">
                                </div>
                                    @if($errors->has('mobile'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('mobile') }}</strong>
                                    </span>
                                    @endif
                                </div>

                          <div class="form-group row class__dropdown">
                                  <label for="passInput" class="col-sm-2 col-form-label">Password</label>
                                <div class="col-sm-8 dropdown" id="">
                                   <input type="password" class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" value="" id="passInput" placeholder="Password" required>
                                       @if($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                        @endif
                                </div>
                                <div class="col-sm-1 dropdown" style="margin-left:-60px;">
                                   <i class="fa fa-eye" id="showPass" style="margin-top:10px;cursor: pointer;"></i>
                                </div>
                            </div>

                            <div class="form-group row class__dropdown">
                                  <label for="password" class="col-sm-2 col-form-label">Confirm Password</label>
                                <div class="col-sm-8 dropdown" id="">
                                   <input type="password" required class="form-control {{ $errors->has('confirm_password') ? ' is-invalid' : '' }}" name="confirm_password" value="" id="passInput1" placeholder="Confirm Password">
                                       @if($errors->has('confirm_password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('confirm_password') }}</strong>
                                        </span>
                                        @endif
                                </div>
                                <div class="col-sm-1 dropdown" style="margin-left:-60px;">
                                   <i class="fa fa-eye" id="showPass1" style="margin-top:10px;cursor: pointer;"></i>
                                </div>
                            </div>

                             <div class="form-group row class__dropdown">
                                <label for="govern" class="col-sm-2 col-form-label">
                                     Governorate
                                </label>
                                <div class="col-sm-8 dropdown">
                                    <select class="form-control form-control {{ $errors->has('state_id') ? ' is-invalid' : '' }} " required id="govern"
                                     style="border:1px solid #ddd;color:#000;" name="state_id">
                                     <option  value="">Governorate</option>
                                        @foreach(getGovern(64) as $govern)
                                          <option value="{{$govern->id}}"
                                           @if($user->state_id == $govern->id) selected @endif>
                                           {{$govern->name}}
                                          </option>
                                        @endforeach
                                    </select>
                                </div>
                                 @if($errors->has('state_id'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('state_id') }}</strong>
                                    </span>
                                    @endif
                            </div>

                            <div class="form-group row class__dropdown">
                                <label for="city" class="col-sm-2 col-form-label">
                                     City
                                </label>
                                <div class="col-sm-8 dropdown">
                                    <select class="form-control form-control {{ $errors->has('city_id') ? ' is-invalid' : '' }} " required id="city"
                                     style="border:1px solid #ddd;color:#000;" name="city_id">
                                     <option  value="$user->city">{{$user->city()->value('name')}}</option>
                                      
                                    </select>
                                </div>
                                 @if($errors->has('city_id'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('city_id') }}</strong>
                                    </span>
                                    @endif
                            </div>

                              <div class="form-group row class__dropdown">
                                <label for="address" class="col-sm-2 col-form-label">
                                    info
                                </label>
                                <div class="col-sm-8 dropdown" id="">
                                  <textarea name="address" rows="2" class="form-control {{ $errors->has('address') ? ' is-invalid' : '' }}" id="address" 
                                    placeholder="{{$user->address}}">{{$user->address}}</textarea>
                                </div>
                             </div>

                              <div class="form-group row class__dropdown">
                                <label for="lesson__dropdown" class="col-sm-2 col-form-label">
                                    Files / Videos
                                </label>
                                <div class="col-sm-8 dropdown" id="lesson__dropdown">
                                   <div class="drop-zone" 
                                        style="width:445px;max-width: 445px;">
                                    <div class="drop-zone__prompt">
                                     <img src="{{ url('images/user_img/'.Auth()->User()['user_img'])}}"
                                       alt="profilephoto" style="width:420px;height:180px;">
                                    </div>
                                    <input type="file" name="user_img" class="drop-zone__input">
                                   </div>
                                </div>
                            </div>

                            <div class="col-sm-10 dropdown">
                              <input type="submit"  class="btn btn-primary text-capitalize px-5" value="Save" style="float:right;">
                            </div>

                          </form>
                        </div>
                        <!-- End file tab content -->

                        <!--begin  Video-tab  -->
                        <div class="tab-pane fade @if(request('active')=='subject') active show @endif" id="Video" role="tabpanel" aria-labelledby="Video-tab">
                         
                            <div class="tab-content mt-4" id="myTabContent">
                                <div class="tab-pane fade show active" id="home" role="tabpanel"
                                    aria-labelledby="home-tab">
                                    <!-- begin class dropdown  -->
                                    <div class=" class__dropdown">
                                <form action="{{url('instructor/save_sub_grade')}}"
                                 method="POST"   enctype="multipart/form-data">
                                    {{ csrf_field() }}

                                  @php $sum=1 ; $index=0; @endphp
                                  
                                   @if($user_subjects)
                                    <div class="" id="becomeTeacher__wrapper" style="width:1100px">
                                    @foreach($user_subjects as $user_subject)
                                <div class=" @if($sum !=1) inserted @endif">
                                  <div class="form-group row class__dropdown">
                                        <label for="subjects" class="col-sm-2 col-form-label">
                                             Subject{{$sum}}
                                        </label>
                                        <div class="col-sm-3 dropdown">
                                         <select class="form-control{{ $errors->has('subjects') ? ' is-invalid' : '' }} @if($sum==1) selectSubjects @endif" required id="subjects" style="border:1px solid #ddd;color:#000;" name="subjects[]">
                                             @if($subjects)
                                                @foreach($subjects as $subject)
                                                <option value="{{$subject->id}}" @if($user_subject->subject_id == $subject->id) selected @endif>{{$subject->title}}</option>
                                                @endforeach
                                            @endif
                                         </select>
                                        </div>
                                         @if($errors->has('subjects'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('subjects') }}</strong>
                                            </span>
                                        @endif
                                         <div class="col-sm-4 dropdown">
                                         <select class="form-control  {{ $errors->has('grades_'.$index) ? ' is-invalid' : '' }} @if($sum==1) selectGrades @endif" required id="select_{{$sum}}" style="border:1px solid #ddd;color:#000;" name="grade_{{$index}}[]" multiple="multiple" required>
                                             @if($grades)
                                              @php 
                                              $user_grade = \App\InstructorGrade::where('instructor_id',auth()->user()->id)
                                              ->where('subject_id',$user_subject->subject_id)
                                              ->pluck('grade_id')->toArray();
                                              @endphp

                                                @foreach($grades as $grade)
                                                 <option value="{{$grade->id}}" @if(in_array($grade->id,$user_grade)) selected @endif>{{$grade->title}}</option>
                                                @endforeach
                                            @endif
                                         </select>
                                        </div>
                                     @if($sum==1)
                                        <div class="col-sm-3 dropdown">
                                         <button type="button" class="btn btn-primary add_more" title="add new subject and grade row"> <i class="fa fa-plus"></i></button>
                                         <button type="button" class="btn btn-danger del_buttonEn" title="delete last subject and grade "> <i class="fa fa-trash"></i></button>
                                        </div>
                                     @endif
                                    </div>
                                      @php $sum++ ; $index++ ; @endphp
                                    </div>
                                    @endforeach
                                    </div>
                                   @endif

                                     <div class="col-sm-10 dropdown"><br>
                                      <input type="submit"  class="btn btn-primary text-capitalize px-5" value="Save" style="float:right;">
                                    </div>
                                 </form>
                                 
                              </div>

                                    <!-- End class dropdown  -->
                             </div>
                        
                            </div>




                        </div>
                        <!-- End Video-tab -->

                    </div>
                    <!--End tab-content -->
                    <div class="uplode__footer">
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script src="{{ url('js/add_class.js')}}"></script>
<script>
    document.querySelectorAll(".drop-zone__input").forEach((inputElement) => {
        const dropZoneElement = inputElement.closest(".drop-zone");

        dropZoneElement.addEventListener("click", (e) => {
            inputElement.click();
        });

        inputElement.addEventListener("change", (e) => {
            if (inputElement.files.length) {
                updateThumbnail(dropZoneElement, inputElement.files[0]);
            }
        });

        dropZoneElement.addEventListener("dragover", (e) => {
            e.preventDefault();
            dropZoneElement.classList.add("drop-zone--over");
        });

        ["dragleave", "dragend"].forEach((type) => {
            dropZoneElement.addEventListener(type, (e) => {
                dropZoneElement.classList.remove("drop-zone--over");
            });
        });

        dropZoneElement.addEventListener("drop", (e) => {
            e.preventDefault();

            if (e.dataTransfer.files.length) {
                inputElement.files = e.dataTransfer.files;
                updateThumbnail(dropZoneElement, e.dataTransfer.files[0]);
            }

            dropZoneElement.classList.remove("drop-zone--over");
        });
    });

    /**
     * Updates the thumbnail on a drop zone element.
     *
     * @param {HTMLElement} dropZoneElement
     * @param {File} file
     */
    function updateThumbnail(dropZoneElement, file) {
        let thumbnailElement = dropZoneElement.querySelector(".drop-zone__thumb");

        // First time - remove the prompt
        if (dropZoneElement.querySelector(".drop-zone__prompt")) {
            dropZoneElement.querySelector(".drop-zone__prompt").remove();
        }

        // First time - there is no thumbnail element, so lets create it
        if (!thumbnailElement) {
            thumbnailElement = document.createElement("div");
            thumbnailElement.classList.add("drop-zone__thumb");
            dropZoneElement.appendChild(thumbnailElement);
        }

        thumbnailElement.dataset.label = file.name;

        // Show thumbnail for image files
        if (file.type.startsWith("image/")) {
            const reader = new FileReader();

            reader.readAsDataURL(file);
            reader.onload = () => {
                thumbnailElement.style.backgroundImage = `url('${reader.result}')`;
            };
        } else {
            thumbnailElement.style.backgroundImage = null;
        }
    }
 $('#showPass').on('click', function(){
              var passInput=$("#passInput");
              if(passInput.attr('type')==='password')
                {
                  passInput.attr('type','text');
              }else{
                 passInput.attr('type','password');
              }
          })
$('#showPass1').on('click', function(){
              var passInput=$("#passInput1");
              if(passInput.attr('type')==='password')
                {
                  passInput.attr('type','text');
              }else{
                 passInput.attr('type','password');
              }
          })
  $("#govern").change(function(){
              jQuery.ajax({
                    type: "GET",
                    url: "/admin/select2/city",
                    data: {
                      _token: "{{ csrf_token() }}",
                       govern:$("#govern").val()
                    },
                    success: function (data) {
                      $("#city").html(data);
                       // alert('error');
                    },
                    error: function()
                    {
                        // alert('error');
                    }
                }); 
         });
</script>
            <script>
            var del_buttonEn = $(".del_buttonEn");
                    $(del_buttonEn).click(function(e) {
                        $('#becomeTeacher__wrapper').find('.inserted:last').remove();       
                        $('#becomeTeacher__wrapper').find('.inserted1:last').remove();       
                     })
            
            var add_buttonEn = $(".add_more");
            var wrapperEn = $("#becomeTeacher__wrapper");

            let index = '{{$index}}'; let v = 0;

             $(add_buttonEn).click(function(e) {
                // console.log($(".selectGrades option").contents() ) ;
                var optionsGrade = new Array();
                $('.selectGrades option').each(function(){
                    optionsGrade.push("<option value="+$(this).val()+">"+$(this).text()+"</option>");
                });
                var selectSubjects = new Array();
                $('.selectSubjects option').each(function(){
                    selectSubjects.push("<option value="+$(this).val()+">"+$(this).text()+"</option>");
                });

                index++;
                v = index - 1;
                e.preventDefault();
                    $(wrapperEn).append(`
                    <div class="inserted">
                        <div class=" form-group row">
                           <label for="subjects" class="col-sm-2 col-form-label">
                                             Subject`+index+`
                            </label>
                             <!-- begin subject -->
                            <div class="dropdown col-md-3 " id="accordionExample`+index+`">
                                <div class="card">
                                    <select class="form-control" name="subjects[]" required>
                                        "`+selectSubjects+`"
                                    </select>
                                </div>
                            </div>
                            <!-- end subject -->
                            <!-- begin grade -->
                            <div class="dropdown col-md-4" id="gradeAccordion">
                            <select class="form-control select3" multiple="multiple" id="`+index+`select3" name="grade_`+v+`[]" required>
                                "`+ optionsGrade +`"
                            </select>
                            </div>
                            <!-- End grade -->
                        </div>
                    </div>
                    `); //add input box
                    $('#'+index+'select3').select2({ placeholder: "Select Grade",allowClear: true});
                } 
            );
    
             for (var i = 0 ; i <= '{{$sum}}' ; i++) 
             {
                 $('#select_'+i).select2({ placeholder: "Select Grade",allowClear: true});
             }
    </script>
@endsection