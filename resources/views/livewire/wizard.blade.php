
<div class="courses container centralize_container pt-4 ">
    <!-- MultiStep Form -->
    <div class="row">
        <div>
            <div id="messagediv" style="display:none;color: green; background-color: #d4edda; border: 1px solid #c3e6cb; padding: 10px; border-radius: 5px; font-family: Arial, sans-serif;">
                Success! Your operation was completed successfully.
              </div>

            <form class="multiForm" data-action="{{ URL::to('/panel/course/addcourse')}}" method="POST" enctype="multipart/form-data" id="msform">
                @csrf
                <meta name="csrf-token" content="{{ csrf_token() }}" />
                <input type="hidden" name="actionUrl" id="actionUrl" value="{{ URL::to('/fetchcurriculam')}}"  />
                <input type="hidden" name="last_course_id" id="last_course_id"   />
                <input type="hidden" name="last_section_id" id="last_section_id"   />
                <input type="hidden" name="last_quize_id" id="last_quize_id"  />
                <input type="hidden" name="last_lec_id" id="last_lec_id"  />

                <input type="hidden" name="jsonData" id="jsonData"  />

                <!-- Loader -->
                <div id="loader" style="display: none">
                    <div class="cyber-loader">
                        <div class="loader-text">LOADING</div>
                        <div class="loader-bars">
                            <div class="bar"></div>
                            <div class="bar"></div>
                            <div class="bar"></div>
                            <div class="bar"></div>
                        </div>
                    </div>
                </div>
                
                <!-- progressbar -->
                <ul id="progressbar" class="row justify-content-center">
                    <li class="active">BASIC</li>
                    <li>DETAILS</li>
                    <li>CURRICULUM</li>
                    <li>MEDIA</li>
                    <li>PUBLISH</li>
                </ul>
                <!-- fieldsets -->
                <!-------------------- BASIC INFORMATION STARTS  -------------------->
                <fieldset class="basicInfo fieldset">
                    <h2 class=" fs-title">Basic Information</h2>

                    <h3 class="fs-subtitle ps-3 ps-3">{{ __('Course Title') }}*</h3>
                    <input wire:model="title" type="text" name="title" id="title" class="form-control multiField "  placeholder="Course Title" value="{{ $course->title ?? '' }}">
                    <small class="dark-small-text">(Please make this a maximum of 100 characters and unqiue.)</small>
                    @error('title')
                        <small class="invalid-feedback" role="alert">
                            {{ $message }}
                        </small>
                    @enderror  

                    <h3 class="fs-subtitle ps-3">{{ __('Short Description') }}*</h3>
                    <input wire:model="course_short_desc" type="text" name="course_short_desc" id="course_short_desc" class="form-control multiField " placeholder="Item description here..">
                    @error('course_short_desc')
                        <small class="invalid-feedback" role="alert">
                            {{ $message }}
                        </small>
                    @enderror

                    


                    <h3 class="fs-subtitle ps-3">{{ __('Course Description') }}*</h3>
                    <input wire:model="description" type="text" name="descriptiondone" id="descriptiondone" class="form-control multiField " placeholder="Item description here..">
                    
                    @error('description')
                        <small class="invalid-feedback" role="alert">
                            {{ $message }}
                        </small>
                    @enderror

                    <div class="row  ">
                        <div class="col-md-6 col-12 ">
                            <h3 class="fs-subtitle ps-3">{{ __('Learning Purpose') }}*</h3>
                            <textarea wire:model="learning_purpose" name="learning_purpose" type="text" id="learning_purpose" class="form-control multiField" rows="3">{{ $course->learning_purpose ?? '' }}</textarea>
                            <small class="dark-small-text">Student will gain this skills, knowledge after completing this course. (One per line).</small>
                            @error('learning_purpose')
                            <small class="invalid-feedback" role="alert">
                                {{ $message }}
                            </small>
                            @enderror
                        </div>
                        <div class="col-md-6 col-12 ">
                            <h3 class="fs-subtitle ps-3">{{ __('Course Requirements') }}*</h3>
                            <textarea wire:model="requirements" name="requirements" type="text" id="requirements" class="form-control multiField" rows="3">{{ $course->requirements ?? '' }}</textarea>
                            <small class="dark-small-text">What knowledge, technology, tools required by useres to start this course. (One per line).</small>
                            @error('requirements')
                            <small class="invalid-feedback" role="alert">
                                {{ $message }}
                            </small>
                            @enderror
                        </div>
                    </div>

                    <div class="row  " style="display: flex;
    justify-content: center;
    align-items: center;">
                        <input type="button" name="next" class="next action-button mt-5" value="Next" onClick="submitcoursestepone()" id="btn-save"  />
                    </div>

                </fieldset>
                <!-------------------- BASIC INFORMATION ENDS  -------------------->
                
                
                
                
                
                
                
                <!-------------------- DETAILS STARTS  -------------------->
                <fieldset class="basicInfo fieldset">
                    <h2 class=" fs-title">Details</h2>

                    <div class="row  ">
                        <div class="col-md-6 col-12   position-relative selectContainer">
                            <h3 class="fs-subtitle ps-3">{{ __('Course Level') }}*</h3>
                            <select id="course_level" name="course_level" class="form-control multiField" aria-label="Default select example">
                                <option value="0" selected disabled>Select Course Level</option>
                                <option value="Beginner" @if(isset($course))
                                {{$course->course_level=='Beginner' ? 'selected="selected"' : ''}}
                                @endif
                                >
                                Beginner
                                </option>
                                <option value="Intermediate" @if(isset($course))
                                {{$course->course_level=='Intermediate' ? 'selected="selected"' : ''}}
                                @endif>
                                Intermediate
                                </option>
                                <option value="Expert" @if(isset($course))
                                {{$course->course_level=='Expert' ? 'selected="selected"' : ''}}
                                @endif>
                                Expert
                                </option>
                            </select>
                            <i class="fas fa-chevron-down"></i>
                        </div>
                        <div class="col-md-6 col-12  position-relative selectContainer">
                            <h3 class="fs-subtitle ps-3">{{ __('Course Language') }}*</h3>
                            <select id="audio_lang" name="audio_lang" class="form-control multiField" aria-label="Default select example">
                                <option value="0" disabled selected>Select Course Language</option>
                                @if(isset($audiolangs))  @foreach($audiolangs as $ver)
                                <option value="{{ $ver->id }}" @if(isset($course)){{$ver->id==$course->ver_id ? 'selected="selected"' : ''}}
                                    @endif>
                                    {{ $ver->title }}
                                </option>
                                @endforeach
                                @endif
                            </select>
                            <i class="fas fa-chevron-down"></i>
                        </div>
                        <div class="col-md-6 col-12 position-relative selectContainer">
                            <h3 class="fs-subtitle ps-3">{{ __('Language Caption') }}*</h3>
                            <select wire:model="caption_lang" name="caption_lang" id="caption_lang" class="form-control multiField" aria-label="Default select example">
                                <option value="0" disabled selected>Select Caption</option>
                                @if(isset($captionlangs)) @foreach($captionlangs as $ver)
                                <option value="{{ $ver->id }}" @if(isset($course)){{$ver->id==$course->ver_id ? 'selected="selected"' : ''}}
                                    @endif>
                                    {{ $ver->title }}
                                </option>
                                @endforeach
                                @endif
                            </select>
                            <i class="fas fa-chevron-down"></i>
                        </div>
                        <div class="col-md-6 col-12 position-relative selectContainer">
                            <h3 class="fs-subtitle ps-3">{{ __('Course Category') }}*</h3>
                            <select wire:model="department_id" id="department_id" name="department_id" class="form-control multiField" aria-label="Default select example">
                                <option value="0" disabled selected>Select Category</option>
                                @if(isset($department)) 
                                @foreach($department as $ver)
                                <option value="{{ $ver->id }}" @if(isset($course)){{$ver->id==$course->ver_id ? 'selected="selected"' : ''}}
                                    @endif>
                                    {{ $ver->title }}
                                </option>
                                @endforeach
                                @endif
                            </select> 
                            <i class="fas fa-chevron-down"></i>
                        </div>
                        <div class="col-md-6 col-12 position-relative selectContainer">
                            <h3 class="fs-subtitle ps-3">{{ __('Version') }}*</h3>
                            <select wire:model="ver_id" name="ver_id" id="ver_id" class="form-control multiField" aria-label="Default select example">
                                <option selected disabled value="0">Select Version</option>
                                @if(isset($version)) 
                                @foreach($version as $ver)
                                <option value="{{ $ver->id }}" @if(isset($course)){{$ver->id==$course->ver_id ? 'selected="selected"' : ''}}
                                    @endif>
                                    {{ $ver->name }}
                                </option>
                                @endforeach
                                @endif
                            </select>
                            <i class="fas fa-chevron-down"></i>
                        </div>
                        <div class="col-md-6 col-12 position-relative selectContainer">
                            <h3 class="fs-subtitle ps-3">{{ __('Course Theme') }}*</h3>
                            <select wire:model="coursetheme" name="coursetheme" id="coursetheme" class="form-control multiField" aria-label="Default select example">
                                <option selected disabled>Select Color</option>
                                <option value="Blue">Blue</option>
                                <option value="Green">Green</option>
                                <option value="Red">Red</option>
                                <option value="Yellow">Yellow</option>
                                <option value="Orange">Orange</option>
                                <option value="Purple">Purple</option>
                                <option value="Navy">Navy</option>
                            </select>
                            <i class="fas fa-chevron-down"></i>
                        </div>
                    </div>

                    <div class="row" style="margin-top:60px">
                        <div class="col text-start ms-3">
                            <input type="button" name="previous" class="previous action-button-previous"
                                value="Previous" />
                        </div>
                        <div class="col text-end me-3">
                            <input type="button" name="next" class="next action-button mt-5" value="Next" onClick="submitcourse()" id="btn-save"  />
                        </div>
                    </div>

                </fieldset>
                <!-------------------- DETAILS ENDS  -------------------->
                
                
                
                
                
                
                
                
                

                <!-------------------- CURRICULUM STARTS  -------------------->
                <fieldset class="fieldset ">
                    <h2 class="fs-title">Curriculum</h2>
                    <div class="card fs-card mt-5" style="padding-right: 0px !important;">
                        <div class="card-body fs-subtitle">
                            <div class="row curriculum" style="margin-top: 0px;margin-bottom: 0px;margin-right: -12px;">
                                <div class="col">
                                    <i class="fa-solid fa-circle color-cyan"></i> Curriculum
                                </div>
                                <div class="col d-flex justify-content-center align-items-center">
                                    <div>
                                        <button class="btn cirBtn" type="button" data-toggle="modal"
                                            data-target="#lectureModal">
                                            <i class="fa-regular fa-square-plus color-cyan-2"></i> Lecture
                                        </button>
                                    </div>
                                    <div>
                                        <button class="btn cirBtn " type="button" data-toggle="modal"
                                            data-target="#quizModal">
                                            <i class="fa-regular fa-square-plus color-cyan-2"></i> Quiz
                                        </button>
                                    </div>
                                    <div>
                                        <button class="btn cirBtn " type="button" data-toggle="modal"
                                            data-target="#assignModal">
                                            <i class="fa-regular fa-square-plus color-cyan-2"></i> Assignment
                                        </button>
                                    </div>
                                </div>
                                <div class="col text-end">
                                    <button type="button" class="cirr-btn" data-toggle="modal"
                                        data-target="#sectionModal">New Topic</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="cirriculamdiv">
                    </div>

                    <!-- btns -->
                    <div class="row" style="margin-top:60px">
                        <div class="col text-start ms-3">
                            <input type="button" name="previous" class="previous action-button-previous"
                                value="Previous" />
                        </div>
                        <div class="col text-end me-3">
                            <input type="button" name="next" class="next action-button" value="Next" />
                        </div>
                    </div>

                </fieldset>
                <!-------------------- CURRICULUM ENDS  -------------------->

                <!-------------------- MEDIA STARTS  -------------------->
                <form id="mediaForm" data-action="{{ URL::to('/savecoursemedia')}}" method="post" enctype="multipart/form-data">
    <fieldset class="fieldset">
        <h2 class="fs-title">MEDIA</h2>
        <div class="tab-pane" id="pills-media" role="tabpanel" aria-labelledby="pills-media-tab">
            <div class="mediaUpload-border p-0">
                <input type="radio" class="btn-check custom-inner-style" name="media-outlined"
                    id="htmlFirst-outlined" autocomplete="off" checked>
                <label class="btn MediaBtn" for="htmlFirst-outlined">HTML5(mp4)</label>

                <input type="radio" class="btn-check custom-inner-style" name="media-outlined"
                    id="urlFirst-outlined" autocomplete="off">
                <label class="btn MediaBtn" for="urlFirst-outlined">External URL</label>

                <input type="radio" class="btn-check custom-inner-style" name="media-outlined"
                    id="youtubeFirst-outlined" autocomplete="off">
                <label class="btn MediaBtn" for="youtubeFirst-outlined">Youtube</label>

                <input type="radio" class="btn-check custom-inner-style" name="media-outlined"
                    id="vimeoFirst-outlined" autocomplete="off">
                <label class="btn MediaBtn" for="vimeoFirst-outlined">Vimeo</label>

                <input type="radio" class="btn-check custom-inner-style" name="media-outlined"
                    id="embededFirst-outlined" autocomplete="off">
                <label class="btn MediaBtn" for="embededFirst-outlined">Embeded</label>
            </div>

            <div style="text-align: center;" id="mediaContent">
                <!-- Content will be updated here -->
            </div>

        </div>
        <!-- Buttons -->
        <div class="row mt-4">
            <div class="col text-start ms-3">
                <input type="button" name="previous" class="previous action-button-previous"
                    value="Previous" />
            </div>
            <div class="col text-end me-3">
                <input type="button" name="next" class="next action-button" value="Next" onclick="submitMedia()" />
            </div>
        </div>
    </fieldset>
</form>
                
                <!-------------------- PUBLISH STARTS  -------------------->
                <fieldset class="fieldset">
                    <h2 class="fs-title">PUBLISH</h2>
                    <div class="py-3 px-5 publish-div">
                        <i class="fa-regular fa-square-check text-center submit-icon"></i>
                        <p class="dark-small-text ">Your course is in a draft state. Students cannot view, purchase or
                            enroll in this course. For students that are already enrolled, this course will not appear
                            on thier student dashboard</p>
                    </div>
                    <!-- btns -->
                    <div class="row mt-5" style="margin-bottom: 100px;">
                        <div class="col text-start ms-3">
                            <input type="button" name="previous" class="previous action-button-previous"
                                value="Previous" />
                        </div>
                        <div class="col text-end me-3">
                            <input type="submit" wire:click="submitForm" name="submit" class="submit action-button" value="Submit for Review" />
                        </div>
                    </div>

                </fieldset>
              
        </div>
    </div>
    <!-- /.MultiStep Form -->

</div>
@php

@endphp
<x-curriModal :data="$sections" />
<!-- MODAL WINDOW -->
@php
                        $data = 3;
                        
                    @endphp
                
<x-sectionModal :data='$data' />


@php
        $data = 3;
    @endphp

<x-quizModal :data='$data' />






<!-- ASSIGNMENT MODAL WINDOW -->
<form class="user" method="POST" data-action="{{ URL::to('/saveassignment')}}" method="POST" id="saveassignment" enctype="multipart/form-data">
<div class="modal fade show in assignModal" id="assignModal" tabindex="-1" role="dialog" aria-labelledby="assignModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" style="margin-right: auto;" id="assignModalLabel"><b>Add Assignment</b></h4>
                <button type="button" class="close" style="margin-left: auto;" data-dismiss="modal"
                    aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row mx-0 my-5">
                    <div class="col-12 mb-3">
                        <h6>Select Topic</h6>
                        <select name="sectionsDropdownA" class="form-control mb-4 custom-inner-style" id="sectionsDropdownA" onclick="fetchSectionsA()">
                            <option value="" disabled selected>Select Section Title</option>
                           
                            <!-- Add more options as needed -->
                        </select>
                    </div>
                    <div class="col-12 mb-3">
                        <h6>Assignment Title*</h6>
                        <input type="text"  name="title" class="form-control w-100 custom-inner-style">
                    </div>
                    <div class="col-12 mb-3">
                        <h6>Description*</h6>
                        <textarea name="description" type="text" class="form-control editor" id="quizdescription"
                        placeholder="Description">{{ $quiz->description ?? '' }}</textarea>
                    </div>
                    <div class="col-4 mb-3">
                        <h6>Time Duration*</h6>
                        <div class="input-group">
                            <input type="time" class="form-control w-50 custom-inner-style" name="duration" />
                            <select class="form-select custom-inner-style w-50" aria-label="Default select example" >
                                <option selected>Select</option>
                                <option value="1">Weeks</option>
                                <option value="2">Days</option>
                                <option value="3">Hours</option>
                            </select><br />
                            <lead class="dark-small-text" style="font-size:12px">
                                Assignment time duration, set 0 for no limit.
                            </lead>
                        </div>
                    </div>
                    <div class="col-4 mb-3">
                        <h6>Total Number*</h6>
                        <div class="input-group">
                            <input type="number" name="totalmarks" class="form-control w-100 custom-inner-style" /><br />
                            <lead class="dark-small-text" style="font-size:12px">
                                Maximum points a student can score
                            </lead>
                        </div>
                    </div>
                    <div class="col-4 mb-3">
                        <h6>Minimum Pass Number*</h6>
                        <div class="input-group">
                            <input type="number" name="passingmarks" class="form-control w-100 custom-inner-style" /><br />
                            <lead class="dark-small-text" style="font-size:12px">
                                Minimum points required for the student to pass this assignment.
                            </lead>
                        </div>
                    </div>

                    <div class="col-6 mb-3">
                        <h6>Upload Attachment Limit*</h6>
                        <div class="input-group">
                            <input type="number" name="uploadlimit" class="form-control w-100 custom-inner-style" /><br />
                            <lead class="dark-small-text" style="font-size:12px">
                                Maximum attachment size limit
                            </lead>
                        </div>
                    </div>
                    <div class="col-6 mb-3">
                        <h6>Maximum attachment size limit*</h6>
                        <div class="input-group">
                            <input type="number" name="uploadsize" class="form-control w-100 custom-inner-style" /><br />
                            <lead class="dark-small-text" style="font-size:12px">
                                Define maximum attachment size in MB
                            </lead>
                        </div>
                    </div>
                    <div class="col-12 mb-3">
                        <input class="form-control w-100 custom-inner-style" name="uploadfile" id="uploadfile" type="file">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn exit" data-dismiss="modal">Close</button>
                    <button type="button" class="btn save assignment" onClick="submitassignment()">Add Assignment</button>
                </div>
            </div>
        </div>
    </div>
    </div>
</form>


<script>


function submitcoursestepone()
{

    var inputIds = ['title', 'course_short_desc', 'descriptiondone', 'learning_purpose', 'requirements'];
    var data = [];

    inputIds.forEach(function(id) {
        var input = document.getElementById(id);
        var inputDetail = {
            id: input.id,
            name: input.name,
            value: input.value
        };
        data.push(inputDetail);
    });

    var jsonData = JSON.stringify(data);
    document.getElementById('jsonData').value = jsonData;

}
    

function submitcourse()
{
    var form = document.getElementById('msform');
            var formData = new FormData(form);
            var actionUrl = form.getAttribute('data-action');

          // alert(actionUrl);
           
           //formData.append('last_quize_id',$('#last_quize_id').val());
           document.getElementById('loader').style.display = 'block';
            fetch(actionUrl, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            })
            .then(response => {

                $("#messagediv").show();
                //alert("Quiz Saved!! Please add questions");
                setTimeout(function() {
                    $("#messagediv").hide();
                   
                }, 2000); // 2-second delay
                // handle success
                document.getElementById('loader').style.display = 'none';
            if (!response.ok) {
                throw new Error('Network response was not ok ' + response.statusText);
            }
            return response.json(); // or response.text() if the response is plain text
        })
        .then(data => {
            // Handle the response data
           // alert("Course Saved!!"+ data.last_course_id);
            document.getElementById("last_course_id").value = data.last_course_id;
            console.log('Success:', data);
            
            // For example, if the response contains the last course ID
            if (data.last_course_id) {
                document.getElementById("last_course_id").value = data.last_course_id;
            }
        })
}
    function submitassignment() {
        console.log("i am starting page");
        
           var form = document.getElementById('saveassignment');
          console.log("i am starting page"+form);
           var frmData = new FormData(form);
           console.log("i am starting page"+frmData);
           var actionUrl = form.getAttribute('data-action');

        //   alert(actionUrl);
          
        frmData.append('last_section_id',$('#sectionsDropdownA').val());
        var fileAttachmentInput = document.getElementById('uploadfile');
        if (fileAttachmentInput.files.length > 0) { // Log the form data for debugging

   
        var validFileTypes = ['application/pdf', 'application/msword', 'application/vnd.ms-excel', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', 'application/vnd.ms-powerpoint', 'application/vnd.openxmlformats-officedocument.presentationml.presentation'];
        var fileAttachment = fileAttachmentInput.files[0];
        if (!validFileTypes.includes(fileAttachment.type)) {
            alert('Invalid file type for Attachment. Only DOC, PDF, Excel, and PPT files are allowed.');
            return;
        }
        frmData.append('fileAttachment', fileAttachment);
    }
    console.log('Submitting the following form data:');
    for (var pair of frmData.entries()) {
        console.log(pair[0] + ': ' + pair[1]);
    }

         


           fetch(actionUrl, {
        method: 'POST',
        body: frmData,
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        }
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Network response was not ok ' + response.statusText);
        }
        return response.json(); // or response.text() if the response is plain text
    })
    .then(data => {
        // Handle the response data
       // document.getElementById("last_lec_id").value = data.last_lec_id;
        setTimeout(function() {
            getallsectionbycourse();
        }, 2000); // 2-second delay
        $('#lecturefrm').trigger('reset');
        document.querySelector('.btn.exit').click();
        console.log('Success:', data);

       
    })
    .catch(error => console.error('Error:', error));




          // getallsectionbycourse();
       }


       function getallsectionbycourse()
  {
    $.ajax({
        url: $('#actionUrl').val(), // the endpoint
        type: 'POST', // http method
        data: {
            '_token': $('meta[name="csrf-token"]').attr('content'),
            title: $('#sectiontitle').val() ,
            courseid:$('#last_course_id').val()// data you are sending
        },
        success: function(response) {
            // handle success
            $('#cirriculamdiv').html(response);
          //  alert("Section Saved!!");
            console.log(response);
        },
        error: function(xhr) {
            // handle error
            console.log(xhr.responseText);
        }
    });
  }

  function fetchSectionsA() {
            $.ajax({
                url: '{{ route('fetch.sections') }}',
                type: 'GET',
                success: function(response) {
                    let dropdown = $('#sectionsDropdownA');
                    dropdown.empty(); // Clear existing options
                   // dropdown.append('<option value="">-- Select Section --</option>'); // Default option

                    // Append new options from the response
                    $.each(response, function(key, section) {
                        dropdown.append('<option value="' + section.id + '">' + section.section + '</option>');
                    });
                },
                error: function(xhr, status, error) {
                    console.error('AJAX Error:', status, error);
                }
            });
        }

       

        function submitMedia() {
    console.log('Function submitMedia started');

    // Collect data from elements by ID
    var selectedMediaType = document.querySelector('input[name="media-outlined"]:checked').id;
    console.log('Selected media type:', selectedMediaType);

    var formData = new FormData();
    formData.append('media_type', selectedMediaType);

    var videoAttachmentmedia = document.getElementById('videoAttachmentmedia');
    if (videoAttachmentmedia && videoAttachmentmedia.files.length > 0) {
        formData.append('videoAttachment', videoAttachmentmedia.files[0]);
        console.log('Appended videoAttachment:', videoAttachmentmedia.files[0]);
    }

    var imagemedia = document.getElementById('imagemedia');
    if (imagemedia && imagemedia.files.length > 0) {
        formData.append('videoposter', imagemedia.files[0]);
        console.log('Appended videoposter:', imagemedia.files[0]);
    }

    var lastCourseId = document.getElementById('last_course_id').value;
    formData.append('last_course_id', lastCourseId);
    console.log('Appended last_course_id:', lastCourseId);

    var lastSectionId = document.getElementById('last_section_id').value;
    formData.append('last_section_id', lastSectionId);
    console.log('Appended last_section_id:', lastSectionId);

    // Use the given route URL directly
    var actionUrl = "{{ URL::to('/savecoursemedia') }}";
    console.log('Action URL:', actionUrl);

    // Send the data using fetch
    fetch(actionUrl, {
        method: 'POST',
        body: formData,
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        }
    })
    .then(response => {
        console.log('Response received:', response);
        return response.json();
    })
    .then(data => {
        console.log('Response data:', data);
       
    })
    .catch(error => {
        console.error('Fetch Error:', error);
    });

    console.log('Fetch request sent');
}
       
     
</script>
