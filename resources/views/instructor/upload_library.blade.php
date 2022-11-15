@extends('instructor.layouts.head')
@section('title','Library ( Upload New Files / Videos )')
@section('maincontent')
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
                            <button class="nav-link active" id="File-tab" data-toggle="tab" data-target="#File"
                                type="button" role="tab" aria-controls="File" aria-selected="true">My Students(center)</button>
                        </li>
                        <!-- End File tab -->
                        <!-- begin Video tab -->
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="Video-tab" data-toggle="tab" data-target="#Video" type="button"
                                role="tab" aria-controls="Video" aria-selected="false">Online Students</button>
                        </li>
                        <!-- End Video tab -->
                    </ul>

                    <div class="tab-content mt-4">

                        <!-- begin file tab content -->
                        <div class="tab-pane fade show active" id="File" role="tabpanel" aria-labelledby="File-tab">
                            
                            <!-- begin class dropdown  -->
                         <form action="{{url('instructor/save_library')}}" method="POST"
                        enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <input type="hidden" name="type" value="center">
                         {{--   <div class="form-group row class__dropdown">
                                <label for="class__dropdown" class="col-sm-2 col-form-label">
                                     Class
                                </label>
                                <div class="col-sm-8 dropdown" id="class__dropdown">
                                    <select class="form-control getLessonInClass" required 
                                     style="border:1px solid #ddd;color:#000;" name="class" >
                                     <option  value="">Select Class</option>
                                        @foreach($classes as $s)
                                          <option value="{{$s->id}}">{{$s->name}}</option>
                                         @endforeach
                                    </select>
                                </div>
                            </div>--}}

                              <div class="form-group row class__dropdown">
                                  <label for="store__title" class="col-sm-2 col-form-label">Grade</label>
                                <div class="col-sm-8 dropdown" id="youtube">
                                 <select class="form-control select2 getLessonInGrade" required 
                                 style="border:1px solid #ddd;color:#000;" name="grade">
                                     <option  value="">Select Grade</option>
                                       @foreach($grades as $s)
                                           <option value="{{$s->id}}">
                                            {{$s->title}}
                                           </option>
                                        @endforeach
                                   </select>
                                </div>
                                </div> 

                            <!-- End class dropdown  -->
                            <div class="form-group row class__dropdown">
                                <label for="lesson__dropdown" class="col-sm-2 col-form-label">
                                    Lesson
                                </label>
                                <div class="col-sm-8 dropdown" id="lesson__dropdown">
                                   <select class="form-control select2 fetch_lesson" required 
                                      style="border:1px solid #ddd;color:#000;" 
                                           name="lesson" > 
                                          <option selected value="">Select Lesson</option>
                                  </select>
                                </div>
                            </div>

                              <div class="form-group row class__dropdown">
                                <label for="youtube" class="col-sm-2 col-form-label">
                                    info
                                </label>
                                <div class="col-sm-8 dropdown" id="youtube">
                                    <textarea class="form-control" id="info" rows="3"
                                     placeholder="the purpose of the videos / Files"
                                     name="info"></textarea>
                                </div>
                                </div>
                                

                            <div class="form-group row class__dropdown">
                                <label for="url" class="col-sm-2 col-form-label">
                                    URL
                                </label>
                                <div class="col-sm-8 dropdown" id="url">
                                    <input type="text" name="url" class="form-control">
                                </div>
                            </div>

                             <div class="form-group row class__dropdown">
                                <label for="youtube" class="col-sm-2 col-form-label">
                                    YouTube
                                </label>
                                <div class="col-sm-8 dropdown" id="youtube">
                                    <input type="text" name="youtube" class="form-control">
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
                                    <i class="far fa-cloud-upload-alt fa-2x d-block"></i>
                                        Drop file to upload 
                                        </br>or<span class="browse"> browse </span>
                                    </div>
                                    <input type="file" name="files[]" class="drop-zone__input" multiple required>
                                   </div>
                                </div>
                            </div>

                              <div class="col-sm-10 dropdown">
                                <input type="submit" class="btn btn-primary text-capitalize px-5" value="Upload" style="float:right;">
                            </div>

                          </form>
                        </div>
                        <!-- End file tab content -->

                        <!--begin  Video-tab  -->
                        <div class="tab-pane fade" id="Video" role="tabpanel" aria-labelledby="Video-tab">
                         
                            <div class="tab-content mt-4" id="myTabContent">
                                <div class="tab-pane fade show active" id="home" role="tabpanel"
                                    aria-labelledby="home-tab">
                                    <!-- begin class dropdown  -->
                                    <div class=" class__dropdown">
                                <form action="{{url('instructor/save_library')}}"
                                 method="POST"   enctype="multipart/form-data">
                                    {{ csrf_field() }}

                                <input type="hidden" name="type" value="online">
                                      
                                <div class="form-group row class__dropdown">
                                  <label for="store__title" class="col-sm-2 col-form-label">Grade</label>

                                <div class="col-sm-8 dropdown" id="youtube">
                                 <select class="form-control select2" required 
                                 style="border:1px solid #ddd;color:#000;" name="grade">
                                     <option  value="">Select Grade</option>
                                       @foreach($grades as $s)
                                           <option value="{{$s->id}}">
                                            {{$s->title}}
                                           </option>
                                        @endforeach
                                   </select>
                                </div>
                                </div>  

                                <div class="form-group row class__dropdown">
                                  <label for="store__title" class="col-sm-2 col-form-label">Unit</label>

                                <div class="col-sm-8 dropdown" id="youtube">
                                    <select class="form-control select2" required 
                                  style="border:1px solid #ddd;color:#000;"name="unit">
                                      <option  value="">Select Unit</option>
                                      @foreach($all_units as $s)
                                         <option value="{{$s}}">{{$s}}
                                         </option>
                                        @endforeach
                                    </select>
                                </div>
                                </div>


                                <div class="form-group row class__dropdown">
                                  <label for="store__title" class="col-sm-2 col-form-label">title</label>

                                <div class="col-sm-8 dropdown" id="youtube">
                                    <input type="text" class="form-control " id="store__title" placeholder="Videos/Files Title"
                                    name="title">
                                </div>
                                </div>

                                 <div class="form-group row class__dropdown">
                                <label for="youtube" class="col-sm-2 col-form-label">
                                    Price
                                </label>
                                <div class="col-sm-8 dropdown" id="youtube">
                                    <input type="text" class="form-control" name="price"
                                    id="store__title"  placeholder="select price">
                                </div>
                                </div>

                                <div class="form-group row class__dropdown">
                                <label for="youtube" class="col-sm-2 col-form-label">
                                    info
                                </label>
                                <div class="col-sm-8 dropdown" id="youtube">
                                    <textarea class="form-control" id="info" rows="3"
                                     placeholder="the purpose of the videos / Files"
                                     name="info"></textarea>
                                </div>
                                </div>

                                <div class="form-group row class__dropdown">
                                <label for="url" class="col-sm-2 col-form-label">
                                    URL
                                </label>
                                <div class="col-sm-8 dropdown" id="url">
                                    <input type="text" name="url" class="form-control">
                                </div>
                            </div>

                             <div class="form-group row class__dropdown">
                                <label for="youtube" class="col-sm-2 col-form-label">
                                    YouTube
                                </label>
                                <div class="col-sm-8 dropdown" id="youtube">
                                    <input type="text" name="youtube" class="form-control">
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
                                    <i class="far fa-cloud-upload-alt fa-2x d-block"></i>
                                        Drop file to upload 
                                        </br>or<span class="browse"> browse </span>
                                    </div>
                                    <input type="file" name="files[]" class="drop-zone__input" multiple required>
                                   </div>
                                </div>
                            </div>

                            <div class="col-sm-10 dropdown">
                              <input type="submit"  class="btn btn-primary text-capitalize px-5" value="Upload" style="float:right;">
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

 
</script>
@endsection