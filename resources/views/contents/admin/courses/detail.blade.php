@extends('layouts.admin')


@section("content")

<div class="  homeBorder p-4 mb-5">
<<<<<<< HEAD
    <div class="d-flex justify-content-between">
      <div class="col">
          <button onclick="window.history.back();" class="quiz-btns btn mb-0">◀ Go Back</button>
      </div>
      <div class="col text-end">
          {{-- <div style="margin-block: .5rem">
              <i class="fa-solid fa-maximize iconColor"></i>
              <i class="fa-regular fa-circle-question iconColor mx-1"></i>
              <i class="fa-solid fa-gear iconColor"></i>
          </div> --}}
          <button onclick="" class="quiz-btns btn mb-0">Continue ▶</button>
      </div>
=======
    <div class="d-flex justify-content-between mb-4">
        <div class="col">
            <h1 class="h5 homeHeading"><strong>Course Detail Page</strong></h1>
        </div>
        <div class="col text-end">
            <i class="fa-solid fa-maximize iconColor"></i>
            <i class="fa-regular fa-circle-question iconColor mx-1"></i>
            <i class="fa-solid fa-gear iconColor"></i>
        </div>
>>>>>>> main
    </div>



<<<<<<< HEAD
    <div class="row mt-3">
      <div class="col-3 course_detail_content_menu">

        <h1 class="display-5 homeHeading"><strong>Scada security</strong></h1>
        {{-- PROGRESS BAR --}}
        <div class="progress">
            <div class="progress-bar" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
        </div>
=======
    <div class="row">
        <div class="col-3 course_detail_content_menu  ">
>>>>>>> main



            <div id="courseDetailSection" class="row mt-3 course-outer-card about-content">
                <div class="accordion" id="courseAccordion">
                    <div class="accordion-item  ">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button fw-bold" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                <i class="fa-regular fa-circle  "></i> Introduction
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                            data-bs-parent="#courseAccordion" style="">
                            <div class="accordion-body course_detail_accordion_body">


                                <div id="courseDetailSection" class="row course-outer-card content-content">



                                    <?php
          $titles = [
            "Introduction to PHP",
            "Advanced PHP Techniques",
            "PHP and MySQL",
            "Working with Arrays in PHP",
            "Object-Oriented PHP",
            "PHP Security Best Practices",
            "Building Web Applications with PHP",
            "Handling Forms in PHP",
            "PHP Error Handling",
            "Introduction to Laravel"
          ];

          function getRandomTime() {
            $minutes = str_pad(rand(0, 59), 2, '0', STR_PAD_LEFT);
            $seconds = str_pad(rand(0, 59), 2, '0', STR_PAD_LEFT);
            return "$minutes:$seconds";
          }

          foreach ($titles as $title) {
            $time = getRandomTime();
            echo "
              <div class='card cursor-pointer col-12 '>
                <div class='card-body text-start row'>
                  <div class='  col-12'>
                    <i class='fa-regular fa-circle-check'></i> <span class='text-secondary'>$title</span>
                    <br>
                    <small class='float-end ms-4 text-end text-secondary'><i class='fa-regular fa-clock'></i> $time </small>
                    <small class='float-start mr-4 text-end text-secondary'><i class='fa-solid fa-video'></i> EMBED </small>
                  </div> 
                </div>
              </div>
            ";
          }
        ?>




                                </div>












                            </div>
                        </div>
                    </div>
                    <div class="accordion-item  ">
                        <h2 class="accordion-header" id="headingTwo">
                            <button class="accordion-button fw-bold collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                <i class="fa-regular fa-circle  "></i> What is PHP Programming
                            </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                            data-bs-parent="#courseAccordion" style="">
                            <div class="accordion-body course_detail_accordion_body">




                                <div id="courseDetailSection" class="row course-outer-card content-content">



                                    <?php
          $titles = [
            "Introduction to Programming", 
            "Basics of programming", 
            "Loops", 
            "What are variables", 
            "Writing algorithm" 
          ];
 
          foreach ($titles as $title) {
            $time = getRandomTime();
            echo "
              <div class='card cursor-pointer col-12 '>
                <div class='card-body text-start row'>
                  <div class='  col-12'>
                    <i class='fa-regular fa-circle-check'></i> <span class='text-secondary'>$title</span>
                    <br>
                    <small class='float-end ms-4 text-end text-secondary'><i class='fa-regular fa-clock'></i> $time </small>
                    <small class='float-start mr-4 text-end text-secondary'><i class='fa-solid fa-video'></i> EMBED </small>
                  </div> 
                </div>
              </div>
            ";
          }
        ?>




                                </div>


                            </div>
                        </div>
                    </div>
                    <div class="accordion-item  ">
                        <h2 class="accordion-header" id="headingThree">
                            <button class="accordion-button fw-bold collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                <i class="fa-regular fa-circle  "></i> What is Databases and MySQL
                            </button>
                        </h2>
                        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                            data-bs-parent="#courseAccordion">
                            <div class="accordion-body course_detail_accordion_body">



                                <div id="courseDetailSection" class="row course-outer-card content-content">



                                    <?php
          $titles = [
            "Introduction to Programming", 
            "Basics of programming", 
            "Loops", 
            "What are variables", 
            "Writing algorithm" 
          ];
 
          foreach ($titles as $title) {
            $time = getRandomTime();
            echo "
              <div class='card cursor-pointer col-12 '>
                <div class='card-body text-start row'>
                  <div class='  col-12'>
                    <i class='fa-regular fa-circle-check'></i> <span class='text-secondary'>$title</span>
                    <br>
                    <small class='float-end ms-4 text-end text-secondary'><i class='fa-regular fa-clock'></i> $time </small>
                    <small class='float-start mr-4 text-end text-secondary'><i class='fa-solid fa-video'></i> EMBED </small>
                  </div> 
                </div>
              </div>
            ";
          }
        ?>




                                </div>



                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
        <div class="col-9 course_detail_content_column">
            <h2>Content</h2>
            <p>This is the main content area. It will also be scrollable if the content exceeds the height of the
                viewport.</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus
                ante dapibus diam. Sed nisi. Nulla quis sem at nibh elementum imperdiet. Duis sagittis ipsum. Praesent
                mauris. Fusce nec tellus sed augue semper porta. Mauris massa. Vestibulum lacinia arcu eget nulla. Class
                aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Curabitur sodales
                ligula in libero.</p>
            <p>Sed dignissim lacinia nunc. Curabitur tortor. Pellentesque nibh. Aenean quam. In scelerisque sem at
                dolor. Maecenas mattis. Sed convallis tristique sem. Proin ut ligula vel nunc egestas porttitor. Morbi
                lectus risus, iaculis vel, suscipit quis, luctus non, massa. Fusce ac turpis quis ligula lacinia
                aliquet. Mauris ipsum. Nulla metus metus, ullamcorper vel, tincidunt sed, euismod in, nibh. Quisque
                volutpat condimentum velit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per
                inceptos himenaeos.</p>
            <p>Nam nec ante. Sed lacinia, urna non tincidunt mattis, tortor neque adipiscing diam, a cursus ipsum ante
                quis turpis. Nulla facilisi. Ut fringilla. Suspendisse potenti. Nunc feugiat mi a tellus consequat
                imperdiet. Vestibulum sapien. Proin quam. Etiam ultrices. Suspendisse in justo eu magna luctus suscipit.
                Sed lectus. Integer euismod lacus luctus magna. Quisque cursus, metus vitae pharetra auctor, sem massa
                mattis sem, at interdum magna augue eget diam. Vestibulum ante ipsum primis in faucibus orci luctus et
                ultrices posuere cubilia Curae; Morbi lacinia molestie dui. Praesent blandit dolor. Sed non quam. In vel
                mi sit amet augue congue elementum.</p>
            <p>Morbi in ipsum sit amet pede facilisis laoreet. Donec lacus nunc, viverra nec, blandit vel, egestas et,
                augue. Vestibulum tincidunt malesuada tellus. Ut ultrices ultrices enim. Curabitur sit amet mauris.
                Morbi in dui quis est pulvinar ullamcorper. Nulla facilisi. Integer lacinia sollicitudin massa. Cras
                metus. Sed aliquet risus a tortor. Integer id quam. Morbi mi. Quisque nisl felis, venenatis tristique,
                dignissim in, ultrices sit amet, augue. Proin sodales libero eget ante. Nulla quam. Aenean laoreet.
                Vestibulum nisi lectus, commodo ac, facilisis ac, ultricies eu, pede. Ut orci risus, accumsan porttitor,
                cursus quis, aliquet eget, justo. Sed pretium blandit orci. Ut eu diam at pede suscipit sodales.</p>
        </div>
    </div>



</div>
@endsection
