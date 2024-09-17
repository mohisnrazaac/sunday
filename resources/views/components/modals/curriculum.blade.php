<!-- LECTURE MODAL WINDOW -->
<div class="modal fade show in lectureModal" id="lectureModal" tabindex="-1" role="dialog" aria-labelledby="lectureModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" style="margin-right: auto;" id="lectureModalLabel"><b>Add Lecture</b></h4>
                <button type="button" class="close" style="margin-left: auto;" data-dismiss="modal"
                    aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="user" data-action="{{ URL::to('/savelecture')}}" method="POST" id="lecturefrm" enctype="multipart/form-data">
            <div class="modal-body">

                <ul class="nav nav-pills mb-3 justify-content-center py-4 rounded" id="pills-tab" role="tablist">
                    <li class="nav-item active" role="presentation">
                        <button class="nav-link" id="pills-basic-tab" data-toggle="pill"
                            data-target="#pills-basic" type="button" role="tab" aria-controls="pills-basic"
                            aria-selected="true"><i class="fa-solid fa-file-lines"></i> Basic</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-video-tab" data-toggle="pill"
                            data-target="#pills-video" type="button" role="tab" aria-controls="pills-video"
                            aria-selected="false"><i class="fa-solid fa-video"></i> Video</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        
                        <button class="nav-link" id="pills-attachment-tab" data-toggle="pill"
                            data-target="#pills-attachment" type="button" role="tab" aria-controls="pills-attachment"
                            aria-selected="false"><i class="fa-solid fa-paperclip"></i> Attachment</button>
                    </li>
                </ul>
                <div class="tab-content mt-5" id="pills-tabContent">
                    <!-- BASIC -->
                    <div class="tab-pane show active" id="pills-basic" role="tabpanel"
                        aria-labelledby="pills-basic-tab">
                        @csrf
                        <h6>Select Topic</h6>
                        <select name="sectionsDropdown" class="form-control mb-4" id="sectionsDropdown" onclick="fetchSections()">
                            <option value="" disabled selected>Select Section Title</option>
                           
                            <!-- Add more options as needed -->
                        </select>
                        <h6>Lecture Title*</h6>
                        <input type="text" name="lecturetitle" class="form-control mb-4 custom-inner-style" placeholder="Section title here" id="lecturetitle" value="{{ $term->title ?? '' }}">
                        @error('title')
                            <small class="invalid-feedback" role="alert">{{ $message }}</small>
                        @enderror
                        <h6>Description*</h6>
                        <div id="lecdescription" type="text" name="lecdescription">{{ $term->description ?? '' }}</div>
                    </div>

                    <!-- VIDEO -->
                    <div class="tab-pane" id="pills-video" role="tabpanel" aria-labelledby="pills-video-tab">
                        <h6>Select Topic</h6>
                        <select name="sectionsDropdown" class="form-control mb-4 custom-inner-style" id="sectionsDropdown" onclick="fetchSections()">
                            <option value="" disabled selected>Select Section Title</option>
                           
                            <!-- Add more options as needed -->
                        </select>
                        <input type="radio" class="btn-check custom-inner-style" name="options-outlined"
                            id="html-outlined" autocomplete="off" checked>
                        <label class="btn lecVidBtn" for="html-outlined">HTML5(mp4)</label>

                        <input type="radio" class="btn-check custom-inner-style" name="options-outlined"
                            id="url-outlined" autocomplete="off">
                        <label class="btn lecVidBtn" for="url-outlined">External URL</label>

                        <input type="radio" class="btn-check custom-inner-style" name="options-outlined"
                            id="youtube-outlined" autocomplete="off">
                        <label class="btn lecVidBtn" for="youtube-outlined">Youtube</label>

                        <input type="radio" class="btn-check custom-inner-style" name="options-outlined"
                            id="vimeo-outlined" autocomplete="off">
                        <label class="btn lecVidBtn" for="vimeo-outlined">Vimeo</label>

                        <input type="radio" class="btn-check custom-inner-style" name="options-outlined"
                            id="embeded-outlined" autocomplete="off">
                        <label class="btn lecVidBtn" for="embeded-outlined">Embeded</label>

                        <div id="radioContent" class="mt-3">
                            <!-- Content will be updated here -->
                        </div>
                    </div>
                    <!-- ATTACHMENT -->
                    <div class="tab-pane" id="pills-attachment" role="tabpanel" aria-labelledby="pills-attachment-tab">
                        <h6>Select Topic</h6>
                        <select name="sectionsDropdown" class="form-control mb-4 custom-inner-style" id="sectionsDropdown" onclick="fetchSections()">
                            <option value="" disabled selected>Select Section Title</option>
                           
                            <!-- Add more options as needed -->
                        </select>
                        <div class="my-3">
                            <h6>Attachment</h6>
                            
                            <input class="form-control" type="file" name="fileAttachment" id="fileAttachment" multiple>
                        </div>
                    </div>
                </div>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn exit" data-dismiss="modal">Close</button>
                <button type="button" class="btn save lecture" onclick="submitlecture()">Add Lecture</button>
            </div>
        </form>
        </div>
    </div>
</div>

<script>
function submitlecture() {
    var form = document.getElementById('lecturefrm');
    var frmData = new FormData(form);
    var actionUrl = form.getAttribute('data-action');
    
    frmData.append('last_course_id', $('#last_course_id').val());
    frmData.append('last_section_id', $('#last_section_id').val());

    // Get the file input elements
    var fileAttachmentInput = document.getElementById('fileAttachment');
    var videoAttachmentInput = document.getElementById('videoAttachment');
    var videoposterInput = document.getElementById('videoposter');

    // Validate fileAttachment (doc, pdf, excel, ppt)
    if (fileAttachmentInput.files.length > 0) {
        var validFileTypes = ['application/pdf', 'application/msword', 'application/vnd.ms-excel', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', 'application/vnd.ms-powerpoint', 'application/vnd.openxmlformats-officedocument.presentationml.presentation'];
        var fileAttachment = fileAttachmentInput.files[0];
        if (!validFileTypes.includes(fileAttachment.type)) {
            alert('Invalid file type for Attachment. Only DOC, PDF, Excel, and PPT files are allowed.');
            return;
        }
        frmData.append('fileAttachment', fileAttachment);
    }

    // Validate videoAttachment (mp4)
    if (videoAttachmentInput.files.length > 0) {
        var videoAttachment = videoAttachmentInput.files[0];
        if (videoAttachment.type !== 'video/mp4') {
            alert('Invalid file type for video. Only MP4 files are allowed.');
            return;
        }
        frmData.append('videoAttachment', videoAttachment);
    }

    // Validate videoposter (png, jpg, jpeg)
    if (videoposterInput.files.length > 0) {
        var validImageTypes = ['image/png', 'image/jpeg'];
        var videoposter = videoposterInput.files[0];
        if (!validImageTypes.includes(videoposter.type)) {
            alert('Invalid file type for video poster. Only PNG, JPG, and JPEG files are allowed.');
            return;
        }
        frmData.append('videoposter', videoposter);
    }

    // Log the form data for debugging
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
        document.getElementById("last_lec_id").value = data.last_lec_id;
        setTimeout(function() {
            getallsectionbycourse();
        }, 2000); // 2-second delay
        $('#lecturefrm').trigger('reset');
        document.querySelector('.btn.exit').click();
        console.log('Success:', data);

        if (data.last_lec_id) {
            document.getElementById("last_lec_id").value = data.last_lec_id;
        }
    })
    .catch(error => console.error('Error:', error));
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
           // alert("Section Saved!!");
            console.log(response);
        },
        error: function(xhr) {
            // handle error
            console.log(xhr.responseText);
        }
    });
  }
  function fetchSections() {
  
            $.ajax({
                url: '{{ route('fetch.sections') }}',
                type: 'GET',
                success: function(response) {
                    let dropdown = $('#sectionsDropdown');
                    dropdown.empty(); // Clear existing options
                  //  dropdown.append('<option value="">-- Select Section --</option>'); // Default option

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
    </script>

