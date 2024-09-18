@extends('layouts.admin')

@section('content')
    {{-- <div class="container">
        <h1>View Courses</h1>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($courses as $course)
                    <tr>
                        <td>{{ $course->id }}</td>
                        <td>{{ $course->title }}</td>
                        <td>{{ $course->description }}</td>
                        <td>
                            <a href="{{ route('courses.detail', $course->id) }}" class="btn btn-info">View Details</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div> --}}

     
<div class="    centralize_container pt-5 position-relative">
    <div class="row position-relative ps-2">
        <div class="col-3 pe-1">
            <div class="c-image"></div>
        </div>
        <div class="col-9 ps-0">
            <div class="course_content px-4 py-3">
                <h2 class=" crs-title text-uppercase">Scada security</h2>
                <a data-bs-toggle="modal" data-bs-target="#editCourseTitle" href="#" class="btn btn-sm btn-success edit-btn" style="position: absolute; top: 5px; right: 20px;">
                    <i style="color: white" class="fas fa-edit"></i> Edit
                </a>
                <p>Learn how to secure Supervisory Control and Data Aquisition (SCADA) Systems such as Water Systems, Nuclear Reactor, and other mission-critical infrastructure.</p>
                <span class="me-4 c_small_text"><i class=" fa fa-list color_default me-1"></i> Category: Programming</span>
                <span class="me-4 c_small_text"><i class=" fa-solid fa-layer-group color_default me-1"></i> Level: Intermediate</span>
                <span class="me-4 c_small_text"><i class=" fa-solid fa-volume-up color_default me-1"></i> Audio: English</span>
                <span class="me-4 c_small_text"><i class="fa-regular fa-comment color_default me-1"></i> English</span>
                <span class="me-4 c_small_text"><i class="fa-regular fa-closed-captioning color_default me-1"></i> English, Dutch 12 more</span>
                <span class="c_small_text"><i class=" fa fa-gears color_default me-1"></i> Version: 1.0</span>
            </div>
        </div>
    </div>
    <div class="row my-4 text-center">
        <!-- Question -->
        <div class="tab-pane" id="pills-question" role="tabpanel" aria-labelledby="pills-question-tab">
            <input type="radio" class="btn-check course-input-btn" name="question-outlined" id="course-about" autocomplete="off" checked>
            <label class="btn course-nav-btn" for="course-about">About</label>

            <input type="radio" class="btn-check course-input-btn" name="question-outlined" id="course-content" autocomplete="off">
            <label class="btn course-nav-btn" for="course-content">Course Content</label>

            <input type="radio" class="btn-check course-input-btn" name="question-outlined" id="course-reviews" autocomplete="off">
            <label class="btn course-nav-btn" for="course-reviews">Reviews</label>

            <!-- <a href="{{ route('courses.detail') }}">
                <button type="button" class="cirr-btn" data-toggle="modal" data-target="#sectionModal" style="float: right;">Start Course</button>
            </a> -->
            
            <div id="courseDetailSection" class="row mt-3 course-outer-card">
                
            </div>

            {{-- @if(Auth::user()->hasRole('supervisor'))
            <div class="row mt-5">
                <div class="col-9">
                    <p class="text-end" style="font-size:30px; font-family:'Rajdhani', sans-serif;">Are you sure you want to import this course to your institute?</p>
                </div>
                <div class="col-3 d-flex justify-content-end">
                    <button type="button" class="rc-btn me-3 enable-button">Yes</button>
                    <button type="button" class="rc-btn disable-button">No</button>
                </div>
            </div>
            @endif --}}
        </div>

    </div>
</div>

<!-- Bootstrap Modal -->
<div class="modal fade" id="editCourseTitle" tabindex="-1" aria-labelledby="editCourseTitleLabel" aria-hidden="true" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editCourseTitleLabel">Edit SCADA Security</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- Modal content (form or any details to edit) -->
        <form>
            <div class="row">
                <div class="mb-3 col-12">
                    <label for="courseTitle" class="form-label ms-0">Course Title</label>
                    <input type="text" class="form-control" id="courseTitle" value="SCADA Security">
                </div>
            
                <div class="mb-3 col-12">
                    <label for="courseDescription" class="form-label ms-0">Course Description</label>
                    <input type="text" class="form-control" id="courseDescription" value="Learn how to secure Supervisory Control and Data Acquisition (SCADA) Systems such as Water Systems, Nuclear Reactors, and other mission-critical infrastructure.">
                </div>
            
                <div class="col-6 mb-3">
                    <label for="courseCategory" class="form-label ms-0">Category</label>
                    <select class="form-select" id="courseCategory">
                        <option value="programming" selected>Programming</option>
                        <option value="security">Security</option>
                        <option value="networking">Networking</option>
                        <option value="cloud">Cloud Computing</option>
                    </select>
                </div>

                <div class="col-6 mb-3">
                    <label for="courseLevel" class="form-label ms-0">Level</label>
                    <select class="form-select" id="courseLevel">
                        <option value="beginner">Beginner</option>
                        <option value="intermediate" selected>Intermediate</option>
                        <option value="advanced">Advanced</option>
                    </select>
                </div>

                <div class="col-6 mb-3">
                    <label for="courseAudio" class="form-label ms-0">Audio Language</label>
                    <select class="form-select" id="courseAudio">
                        <option value="english" selected>English</option>
                        <option value="spanish">Spanish</option>
                        <option value="french">French</option>
                        <option value="german">German</option>
                    </select>
                </div>

                <div class="col-6 mb-3">
                    <label for="courseTheme" class="form-label ms-0">Theme</label>
                    <select class="form-select" id="courseTheme">
                        <option value="blue" selected>Blue</option>
                        <option value="red">Red</option>
                        <option value="green">Green</option>
                        <option value="yellow">Yellow</option>
                    </select>
                </div>

                <div class="col-6 mb-3">
                    <label for="courseVersion" class="form-label ms-0">Version</label>
                    <select class="form-select" id="courseVersion">
                        <option value="1.0" selected>1.0</option>
                        <option value="2.0">2.0</option>
                        <option value="3.0">3.0</option>
                    </select>
                </div>
            </div>
          <!-- Add more form fields as needed -->
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn exit" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn save">Update</button>
      </div>
    </div>
  </div>
</div>
 <!-- Bootstrap Modal -->

 <!-- ACCORDIAN MODAL WINDOW -->
 <div class="modal fade" id="editcollapseOne" tabindex="-1" aria-labelledby="editcollapseOneLabel" aria-hidden="true" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editcollapseOneLabel">Edit SCADA Security Description</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- Modal content (form or any details to edit) -->
        <form>
          <h3 class="fs-subtitle">Course Description*</h3>
          <!-- WYSIWYG editor placeholder -->
          <textarea name="description" type="text" class="form-control editor" id="courseDescription" placeholder="Description">asdsdasd</textarea>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn exit" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn save">Update</button>
      </div>
    </div>
  </div>
</div>
 <!-- ACCORDIAN MODAL WINDOW -->

@endsection
<script src="{{ URL::to('vendor/jquery/jquery.min.js') }}"></script>

<script>
    $(document).ready(function() {
    function updateContent() {
        if ($('#course-about').is(':checked')) {
            $('#courseDetailSection').addClass('about-content').removeClass('content-content').html(`
                <div class="accordion" id="courseAccordion">
                    <div class="accordion-item my-3">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button fw-light" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                 Requirements
                                 <a data-bs-toggle="modal" data-bs-target="#editcollapseOne" href="#" style="position: absolute; top: 15px; right: 60px;">
                                    <i class="fas fa-edit"></i>
                                </a>
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#courseAccordion">
                            <div class="accordion-body">
                                <!-- Requirements content goes here -->
                                <p>Requirements content.</p>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item my-3">
                        <h2 class="accordion-header" id="headingTwo">
                            <button class="accordion-button fw-light collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                Description
                                <a data-bs-toggle="modal" data-bs-target="#editcollapseOne" href="" style="position: absolute; top: 15px; right:60px;"><i class="fas fa-edit"> </i></a>
                            </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#courseAccordion">
                            <div class="accordion-body">
                                <!-- Description content goes here -->
                                <p>Description content.</p>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item my-3">
                        <h2 class="accordion-header" id="headingThree">
                            <button class="accordion-button fw-light collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                Who is this for?
                                <a data-bs-toggle="modal" data-bs-target="#editcollapseOne" href="" style="position: absolute; top: 15px; right:60px;"><i class="fas fa-edit"> </i></a>
                            </button>
                        </h2>
                        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#courseAccordion">
                            <div class="accordion-body">
                                <!-- Who is this for content goes here -->
                                <p>Who is this for content.</p>
                            </div>
                        </div>
                    </div>
                </div>
            `);
        } else if ($('#course-content').is(':checked')) {
            const uniqueId = generateUniqueId();
            $('#courseDetailSection').addClass('content-content').removeClass('about-content').html(`
				<div class="card cursor-pointer">
					<div class="card-body text-start row">
						<div class="col-6">
							<i class="fa-regular fa-circle-play color-cyan-2"></i> <span class="color-cyan-2 fw-light">Lecture
								Title</span>
						</div>
						<div class="col-3 text-center text-secondary">
							8 Lectures
						</div>
						<div class="col-3 text-end text-secondary">
							00:12
						</div>
					</div>
				</div>
				<div class="card cursor-pointer">
					<div class="card-body text-start row">
						<div class="col-6">
							<i class="fa-solid fa-file-lines text-secondary"></i> <span class="text-secondary fw-light">A Note On Asking For Help</span>
						</div>
						<div class="col-3 text-center text-secondary">
							Preview
						</div>
						<div class="col-3 text-end text-secondary">
							08:05
						</div>
					</div>
				</div>
				<div class="card cursor-pointer">
					<div class="card-body text-start row">
						<div class="col-6">
							<i class="fa-solid fa-file-lines text-secondary"></i> <span class="text-secondary fw-light">Introducing Our TA</span>
						</div>
						<div class="col-3 text-center text-secondary">
							Preview
						</div>
						<div class="col-3 text-end text-secondary">
							00:12
						</div>
					</div>
				</div>
				<div class="card cursor-pointer">
					<div class="card-body text-start row">
						<div class="col-6">
							<i class="fa-solid fa-file-lines text-secondary"></i> <span class="text-secondary fw-light">Join The Online Community</span>
						</div>
						<div class="col-3 text-center text-secondary">
							Preview
						</div>
						<div class="col-3 text-end text-secondary">
							08:05
						</div>
					</div>
				</div>
            `);
        } else if ($('#course-reviews').is(':checked')) {
            $('#courseDetailSection').removeClass('content-content').html(`
                <div class="row mx-0 my-5">
                    <div class="courseReviews">
                        <!-- Course reviews content goes here -->
                        <p>This is the reviews section content.</p>
                    </div>
                </div>
            `);
        }
    }

    function generateUniqueId() {
        return 'id-' + Math.random().toString(36).substr(2, 9);
    }

    // Initial content update
    updateContent();

    // Update content on radio button change
    $('input[name="question-outlined"]').on('change', updateContent);
    
});


</script>