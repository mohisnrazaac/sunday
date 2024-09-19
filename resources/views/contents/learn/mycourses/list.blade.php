@extends('layouts.admin')


@section("content")



<div class="container pt-4 ">
    <div class="main mb-5">
        <div class="container homeBorder p-4 mb-5">
            <div class="d-flex justify-content-between mb-4">
                <div class="col">
                    <h1 class="h5 homeHeading"><strong>{{ __("My Course") }}</strong></h1>
                </div>
            </div>



            <div class="row">
                @if(isset($courses)) 
                @php
                    $colors = ['course_cyan', 'course_green', 'course_red', 'course_yellow', 'course_blue', 'course_orange', 'course_pink', 'course_dBlue'];
                @endphp
                @foreach($courses as $index => $course)
                    @php
                        $colorClass = $colors[$index % count($colors)];
                    @endphp
                    <div class="col-sm-3 col-md-4 col-lg-3 course_card_width">
                        <a href="{{ route('learningCourse', ['participant' => $course->course_id]) }}">
                            <div class="{{ $colorClass }}">
                                <img src="{{ asset('img/admin/istockphoto-1386162662-612x612.jpg') }}" height="98px" class="card-img-top" alt="sca">
                                <div class="cc_card_heading text-uppercase">
                                    <h4 class="pt-1 mb-0"><strong>{{ $course->courseTitle }}</strong></h4>
                                </div>
                                <div class="px-2 pt-2 cc_card_body border-bottom-0">
                                    <p class="subtitle text-uppercase h6 mb-0">{{ $course->departmentTitle }}</p>
                                </div>
                                <div class="px-3 border-top-0 border-bottom-0">
                                    <span class="cc_card_body_text">{{ $course->courseDesc }}<br></span>
                                </div>
                                <div class="text-start ps-3 py-2 border-top-0">
                                    <a href="#" class="iconColor me-1">
                                        <i class="fa-solid iconColor fa-share-nodes"></i>
                                    </a>
                                    <a href="#" class="iconColor mx-1">
                                        <i class="fa-solid iconColor fa-download"></i>
                                    </a>
                                    <a href="#" class="iconColor mx-1">
                                        <i class="fa-solid iconColor fa-bars"></i>
                                    </a>
                                    <a href="#" class="iconColor ms-1">
                                        <i class="fa-solid iconColor fa-arrow-up-right-from-square"></i>
                                    </a>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            @endif

            </div>
        </div>
    </div>
</div>

@endsection
