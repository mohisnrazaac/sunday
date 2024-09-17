@extends('layouts.admin')


@section("content")

<div class="  homeBorder p-4 mb-5">
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
    </div>



    <div class="row mt-3">
        <div class="col-3 course_detail_content_menu">

            <h1 class="display-5 homeHeading"><strong>{{ $courses[0]->courseTitle ?? 'Course Not Found' }}</strong></h1>
            {{-- PROGRESS BAR --}}
            <div class="progress">
                <div class="progress-bar" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
            </div>
            <div id="courseDetailSection" class="row mt-3 course-outer-card about-content">
                <div class="accordion" id="courseAccordion">
                    {{-- <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button fw-bold" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                <i class="fa-regular fa-circle  "></i> Introduction
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                            data-bs-parent="#courseAccordion" style=""> --}}
                            <div class="accordion-body p-0 course_detail_accordion_body">


                                <?php if (!function_exists('getRandomTime')) {
                                        function getRandomTime() {
                                            $minutes = str_pad(rand(0, 59), 2, '0', STR_PAD_LEFT);
                                            $seconds = str_pad(rand(0, 59), 2, '0', STR_PAD_LEFT);
                                            return "$minutes:$seconds";
                                        }
                                    }?>

                                @foreach ($sessions as $sec)
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingTwo">
                                        <button class="accordion-button fw-bold collapsed" type="button" data-bs-toggle="collapse"
                                                data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                            <i class="fa-regular fa-circle"></i>
                                            <i class="fa-regular fa-circle-check"></i> 
                                            {{ $sec->sessionTitle }}
                                        </button>
                                    </h2>
                                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                                         data-bs-parent="#courseAccordion">
                                        <div class="accordion-body course_detail_accordion_body">
                                
                                            <div id="courseDetailSection" class="row course-outer-card content-content">
                                
                                                <?php
                                                $items = explode('*', $sec->terms);

                                               
                                                
                                
                                                foreach ($items as $title) {
                                                    $time = getRandomTime();
                                                    echo "
                                                        <div class='card cursor-pointer col-12 '>
                                                            <div class='card-body text-start row'>
                                                                <div class='col-12'>
                                                                    <i class='fa-regular fa-circle'></i>
                                                                    <i class='fa-regular fa-circle-check'></i> 
                                                                    <span class='text-secondary'>$title</span>
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
                                @endforeach
                                
                                
                                



                            </div>
                </div>
            </div>


        </div>
        <div class="col-9 course_detail_content_column">
            <h2>Content</h2>
           {{ $courses[0]->coursedescription }}
        </div>
    </div>



</div>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script>
    $(document).ready(function() {
        $(".accordion-item").each(function(index, element) {
            // Incremented number for each accordion item
            var number = index + 1;  

            // Update the heading ID and collapse ID with the incremented number
            $(this).find(".accordion-header").attr("id", "heading" + number);
            $(this).find(".collapse").attr("id", "collapse" + number);

            // Update aria-labelledby and data-bs-target dynamically
            $(this).find(".accordion-button").attr({
                "data-bs-target": "#collapse" + number,  
                "aria-controls": "collapse" + number     
            });

            $(this).find(".collapse").attr("aria-labelledby", "heading" + number);
        });
    });


</script>
@endsection
