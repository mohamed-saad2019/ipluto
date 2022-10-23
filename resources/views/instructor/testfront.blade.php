@extends('instructor.layouts.head')
@section('title','Share the lessons')
@section('maincontent')
<div class="uplode__page">
    <div class="container">
        <div class="shadow-sm p-3 mb-5 bg-white rounded ">
            <div class="row">
                <div class="col-md-4">
                    <form action="">
                    </form>
                    <div class="drop-zone">
                        <div class="drop-zone__prompt">
                            <i class="fa fa-cloud-upload fa-2x d-block" aria-hidden="true"></i>

                            Drop file to upload or
                            <span class="browse"> browse </span>
                        </div>
                        <input type="file" name="myFile" class="drop-zone__input">
                    </div>

                </div>

                <div class="col-md-8">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <!-- begin File tab -->
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="File-tab" data-toggle="tab" data-target="#File"
                                type="button" role="tab" aria-controls="File" aria-selected="true">File</button>
                        </li>
                        <!-- End File tab -->
                        <!-- begin Video tab -->
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="Video-tab" data-toggle="tab" data-target="#Video" type="button"
                                role="tab" aria-controls="Video" aria-selected="false">Video</button>
                        </li>
                        <!-- End Video tab -->
                    </ul>

                    <div class="tab-content mt-4">

                        <!-- begin file tab content -->
                        <div class="tab-pane fade show active" id="File" role="tabpanel" aria-labelledby="File-tab">
                            <!-- begin class dropdown  -->
                            <div class="form-group row class__dropdown">
                                <label for="class__dropdown" class="col-sm-2 col-form-label"> Class</label>
                                <div class="col-sm-8 dropdown" id="class__dropdown">
                                    <button class="btn btn-light dropdown-toggle" type="button" data-toggle="dropdown"
                                        aria-expanded="false">
                                        Chose class
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="#">Action</a>
                                        <a class="dropdown-item" href="#">Another action</a>
                                        <a class="dropdown-item" href="#">Something else here</a>
                                    </div>
                                </div>
                            </div>
                            <!-- End class dropdown  -->
                            <div class="form-group row class__dropdown">
                                <label for="class__dropdown" class="col-sm-2 col-form-label">Lesson</label>
                                <div class="col-sm-8 dropdown" id="class__dropdown">
                                    <button class="btn btn-light dropdown-toggle" type="button" data-toggle="dropdown"
                                        aria-expanded="false">
                                        Select lesson
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="#">Action</a>
                                        <a class="dropdown-item" href="#">Another action</a>
                                        <a class="dropdown-item" href="#">Something else here</a>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!-- End file tab content -->

                        <!--begin  Video-tab  -->
                        <div class="tab-pane fade" id="Video" role="tabpanel" aria-labelledby="Video-tab">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="home-tab" data-toggle="tab" data-target="#home"
                                        type="button" role="tab" aria-controls="home" aria-selected="true">Home</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="profile-tab" data-toggle="tab" data-target="#profile"
                                        type="button" role="tab" aria-controls="profile"
                                        aria-selected="false">Profile</button>
                                </li>
                   
                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="home" role="tabpanel"
                                    aria-labelledby="home-tab">...</div>
                                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab"> ...</div>
                            </div>




                        </div>
                        <!-- End Video-tab -->

                    </div>
                    <!--End tab-content -->


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