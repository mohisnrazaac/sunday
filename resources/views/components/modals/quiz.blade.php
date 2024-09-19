<!-- QUIZ MODAL WINDOW -->
<div class="modal fade show in quizModal" id="quizModal" tabindex="-1" role="dialog" aria-labelledby="quizModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" style="margin-right: auto;" id="quizModalLabel"><b>Add Quiz</b></h4>
                <button type="button" class="close" style="margin-left: auto;" data-dismiss="modal"
                    aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div id="messagediv" style="display:none;color: green; background-color: #d4edda; border: 1px solid #c3e6cb; padding: 10px; border-radius: 5px; font-family: Arial, sans-serif;">
                Success! Your operation was completed successfully.
              </div>
            <div class="modal-body">

                <ul class="nav nav-pills mb-3 justify-content-center py-4 rounded" id="pills-tab" role="tablist">
                    <li class="nav-item active" role="presentation">
                        <button class="nav-link" id="pills-basic-quiz-tab" data-toggle="pill"
                            data-target="#pills-basic-quiz" type="button" role="tab" aria-controls="pills-basic-quiz" aria-selected="true"><i class="fa-solid fa-file-lines"></i> Basic</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-question-tab" data-toggle="pill"
                            data-target="#pills-question" type="button" role="tab" aria-controls="pills-question" aria-selected="false"><i class="fa-regular fa-circle-question"></i> Question</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-setting-tab" data-toggle="pill"
                            data-target="#pills-setting" type="button" role="tab" aria-controls="pills-setting"
                            aria-selected="false"><i class="fa-solid fa-gear"></i> Settings</button>
                    </li>
                </ul>
                <div class="tab-content mt-5" id="pills-tabContent">
                    <!-- BASIC QUIZ -->
                    <div class="tab-pane show active" id="pills-basic-quiz" role="tabpanel"
                        aria-labelledby="pills-basic-quiz-tab">
                        <form class="user" method="POST" data-action="{{ URL::to('/savequiz')}}" method="POST" id="quizform" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <h6>Select Topic</h6>
                                    <select name="sectionsDropdownQ" class="form-control mb-4 custom-inner-style" id="sectionsDropdownQ" onclick="fetchSectionsQ()">
                                        <option value="" disabled selected>Select Section Title</option>
                                       
                                        <!-- Add more options as needed -->
                                    </select>
                                </div>
                                <div class="col-6">
                                    <h6>Quiz Title*</h6>
                                    <input type="text" class="form-control custom-inner-style mb-4" placeholder="Section title here" name="quizetitle" id="quizetitle" value="{{ $quiz->title ?? '' }}">
                                    @error('title')
                                        <small class="invalid-feedback" role="alert">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-6">
                                    <h6>Attempt*</h6>
                                    <input name="quizeattempt" type="number" class="form-control custom-inner-style mb-4" id="quizeattempt" min="0" max="50" placeholder="Attempt" value="{{ $quiz->attempt ?? 'zero is unlimited...' }}">
                                    @error('attempt')
                                        <small class="invalid-feedback" role="alert">{{ $message }}</small>
                                    @enderror
                                    
                                </div>
                                <div class="col-6">
                                    <h6>Quiz Duration*</h6>
                                    <input name="quizduration" type="number" class="form-control custom-inner-style mb-4" id="quizduration" placeholder="Duration" value="{{ $quiz->duration ?? 'zero is unlimited...' }}">
                                    @error('duration')
                                        <small class="invalid-feedback" role="alert">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-6">
                                    <h6>Minimum Pass Score*</h6>
                                    <input name="min_pass_score" type="number" class="form-control custom-inner-style mb-4" id="min_pass_score"
                                        placeholder="Minimum Pass Score" value="{{ $quiz->min_pass_score ?? '80' }}">
                                    @error('min_pass_score')
                                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-6">
                                    <h6>Question Reveal*</h6>
                                    <select name="show_question" class="form-control custom-inner-style mb-4" id="show_question">
                                        @php 
                                          $show_question = ['StepByStep', 'OnePage'];
                                        @endphp
                                        @foreach($show_question as $question)
                                            <option value="{{ $question }}"
                                            {{ isset($quiz->show_question) && $quiz->show_question == $question ? 'selected' : '' }}>
                                                {{ $question }} 
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('show_question')
                                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-6">
                                    <h6>Question Reveal*</h6>
                                    <input name="random_question" type="number" class="form-control custom-inner-style mb-4" id="random_question"
                                        placeholder="Random Question" value="{{ $quiz->random_question ?? '0' }}">
                                    @error('random_question')
                                    <small class="invalid-feedback" role="alert">{{ $message }}</small>
                                    @enderror 
                                </div>
                                <h6>Description*</h6>
                                <textarea name="quizdescription" type="text" class="form-control editor" id="quizdescription"
                                placeholder="Description">{{ $quiz->description ?? '' }}</textarea>
                                @error('description')
                                <small class="invalid-feedback" role="alert">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn exit" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn save quiz" value="{{ __('Save') }}">Add Quiz</button>
                            </div>
                        </form>
                    </div>

                    <!-- Question -->
                    <div class="tab-pane" id="pills-question" role="tabpanel" aria-labelledby="pills-question-tab">
                        <h6>Select Topic</h6>
                        <select name="sectionsDropdownQ" class="form-control mb-4 custom-inner-style" id="sectionsDropdownQ" onclick="fetchSectionsQ()">
                            <option value="" disabled selected>Select Section Title</option>
                           
                            <!-- Add more options as needed -->
                        </select>
                        <input type="radio" class="btn-check custom-inner-style" name="question-outlined"
                            id="singleChoice-outlined" autocomplete="off" checked>
                        <label class="btn quiz-btns" for="singleChoice-outlined">Single Choice</label>

                        <input type="radio" class="btn-check custom-inner-style" name="question-outlined"
                            id="mulChoice-outlined" autocomplete="off">
                        <label class="btn quiz-btns" for="mulChoice-outlined">Multiple Choice</label>

                        <input type="radio" class="btn-check custom-inner-style" name="question-outlined"
                            id="singleText-outlined" autocomplete="off">
                        <label class="btn quiz-btns" for="singleText-outlined">Single Line Text</label>


                        <div id="radioQuestion" class="mt-3">
                            <!-- Content will be updated here -->
                        </div>

                    </div>
                    <!-- Settings -->
                    <div class="tab-pane" id="pills-setting" role="tabpanel" aria-labelledby="pills-setting-tab">
                        <div class="row mx-0 mb-5">
                            <div class="col-12 mb-3">
                                <h6>Select Topic</h6>
                                <select name="sectionsDropdownQ" class="form-control mb-4 custom-inner-style" id="sectionsDropdownQ" onclick="fetchSectionsQ()">
                                    <option value="" disabled selected>Select Section Title</option>
                                   
                                    <!-- Add more options as needed -->
                                </select>
                                <h6>Gradable</h6>
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" role="switch"
                                        id="flexSwitchCheckDefault">
                                    <label class="form-check-label fs-6" for="flexSwitchCheckDefault">Quiz
                                        Gradable</label><Br />
                                    <lead class="dark-small-text" style="font-size:12px; margin-top:-10px">
                                        If this quiz test affect on the students grading system for this course.
                                    </lead>
                                </div>
                            </div>
                            <div class="col-12 mb-3">
                                <h6>Remaining time display</h6>
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" role="switch"
                                        id="flexSwitchCheckDefault">
                                    <label class="form-check-label fs-6" for="flexSwitchCheckDefault">Show
                                        Time</label><Br />
                                    <lead class="dark-small-text" style="font-size:12px; margin-top:-10px">
                                        By enabling this option, quiz taker will show remaining time during attempt.
                                    </lead>
                                </div>
                            </div>
                            <div class="col-6 mb-3">
                                <h6>Time Limit</h6>
                                <div class="input-group">
                                    <input type="time" class="form-control custom-inner-style" id="inputGroupFile02" />
                                    <div class="input-group-text" for="inputGroupFile02">Minutes</div>
                                </div>
                            </div>
                            <div class="col-6 mb-3">
                                <h6>Passing Score(%)*</h6>
                                <div class="input-group">
                                    <input type="number" class="form-control custom-inner-style" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
            
        </div>
    </div>
</div>

<script>
     function submitquestion() {
            var form = document.getElementById('savesinglechoice');
            var formData = new FormData(form);
            var actionUrl = form.getAttribute('data-action');

         //   alert(actionUrl);
           
         formData.append('last_quize_id',$('#last_quize_id').val());

            fetch(actionUrl, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            })
            .then(
                //alert("Quiz Saved!!")
            )
            .catch(error => {
                console.error('Error:', error);
                // Optionally, you can display an error message or handle the error
            });
        }

        // Example usage: Call generateForm with the action URL and a unique ID
        var actionUrl = "{{ URL::to('/savesinglechoice') }}";
        var uniqueId = "uniqueQuizBtnId";
        generateForm(actionUrl, uniqueId);




        function submitmultiquestion() {
            var form = document.getElementById('savemultichoiceform');
            var formData = new FormData(form);
            var actionUrl = form.getAttribute('data-action');

         //   alert(actionUrl);
           
         formData.append('last_quize_id',$('#last_quize_id').val());

            fetch(actionUrl, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            })
            .then(
                //alert("Quiz Saved!!")
            )
            .catch(error => {
                console.error('Error:', error);
                // Optionally, you can display an error message or handle the error
            });
        }

        // Example usage: Call generateForm with the action URL and a unique ID
        var actionUrl = "{{ URL::to('/savesinglechoice') }}";
        var uniqueId = "uniqueQuizBtnId";
        generateForm(actionUrl, uniqueId);


        function submitsinglequestion() {
            var form = document.getElementById('savesingleline');
            var formData = new FormData(form);
            var actionUrl = form.getAttribute('data-action');

         //   alert(actionUrl);
           
         formData.append('last_quize_id',$('#last_quize_id').val());

            fetch(actionUrl, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            })
            .then(
                //alert("Quiz Saved!!")
            )
            .catch(error => {
                console.error('Error:', error);
                // Optionally, you can display an error message or handle the error
            });
        }


        function submitmultilinequestion() {
            var form = document.getElementById('savesmultiline');
            var formData = new FormData(form);
            var actionUrl = form.getAttribute('data-action');

         //   alert(actionUrl);
           
         formData.append('last_quize_id',$('#last_quize_id').val());

            fetch(actionUrl, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            })
            .then(
               // alert("Quiz Saved!!")
            )
            .catch(error => {
                console.error('Error:', error);
                // Optionally, you can display an error message or handle the error
            });
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
            //alert("Section Saved!!");
            console.log(response);
        },
        error: function(xhr) {
            // handle error
            console.log(xhr.responseText);
        }
    });
  }


  function fetchSectionsQ() {
            $.ajax({
                url: '{{ route('fetch.sections') }}',
                type: 'GET',
                success: function(response) {
                    let dropdown = $('#sectionsDropdownQ');
                    dropdown.empty(); // Clear existing options
                    //dropdown.append('<option value="">-- Select Section --</option>'); // Default option

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
