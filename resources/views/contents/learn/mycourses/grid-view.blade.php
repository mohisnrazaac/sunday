@extends('layouts.admin')

@section('content')
{{-- @foreach($courses as $course)
            <div class="col-md-4">
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title">{{ $course->title }}</h5>
                        <p class="card-text">{{ $course->description }}</p>
                        <a href="{{ route('courses.detail', $course->id) }}"
                            class="btn btn-primary">View Details</a>
                    </div>
                </div>
            </div>
    @endforeach  --}}

<div class="  container pt-4 ">
    <div class="main mb-5">
        <div class="container homeBorder p-4 mb-5">
            <div class="d-flex justify-content-between mb-4">
                <div class="col">
                    <h1 class="h5 homeHeading"><strong>Course Guide</strong></h1>
                </div>
                <div class="col text-end">
                    <i class="fa-solid fa-maximize iconColor"></i>
                    <i class="fa-regular fa-circle-question iconColor mx-1"></i>
                    <i class="fa-solid fa-gear iconColor"></i>
                </div>
            </div>
            <div class="row">

                @foreach ($courses as $course)
                <div class="col-sm-3 col-md-4 col-lg-3 course_card_width">
                    <a href="/learn/my/course/{{$course->courseId}}">
                        <div class="course_{{ $course->theme }}">
                            <img src="{{ asset('img/admin/istockphoto-1386162662-612x612.jpg') }}" height="98px" class="card-img-top"
                                alt="sca">
                            <div class="cc_card_heading text-uppercase">
                                <h4 class=" pt-1 mb-0"><strong>{{ $course->courseTitle }}</strong></h4>
                            </div>
                            <div class="px-2 pt-2 cc_card_body border-bottom-0">
                                <p class="subtitle text-uppercase h6 mb-0">{{ $course->departmentTitle }}</p>
                            </div>
                            <div class="px-3  border-top-0 border-bottom-0">
                                <span class="cc_card_body_text">{{$course->coursedescription}}<br></span>
                            </div>
                            <div class="text-start ps-3 py-2 border-top-0">
                                <a href="javascript:void(0);" class="iconColor me-1">
                                    <i class="fa-solid iconColor fa-share-nodes"></i>
                                </a>
                                <a href="" class="iconColor mx-1">
                                    <i class="fa-solid iconColor fa-download"></i>
                                </a>
                                <a href="javascript:void(0);" class="iconColor mx-1">
                                    <i class="fa-solid iconColor fa-bars"></i>
                                </a>
                                <a href="javascript:void(0);" class="iconColor ms-1">
                                    <i class="fa-solid iconColor fa-arrow-up-right-from-square"></i>
                                </a>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
               {{--  <div class="col-sm-3 col-md-4 col-lg-3 course_card_width">
                    <a href="">
                        <div class="course_green">
                            <img src="{{ asset('img/admin/satellite.png') }}" height="98px" class="card-img-top" alt="sca">
                            <div class="cc_card_heading text-uppercase">
                                <h4 class=" pt-1 mb-0"><strong>satellite hacking</strong></h4>
                            </div>
                            <div class="px-2 pt-2 cc_card_body border-bottom-0">
                                <p class="subtitle text-uppercase h6 mb-0">satellite hacking</p>
                            </div>
                            <div class="px-3  border-top-0 border-bottom-0">
                                <span class="cc_card_body_text">Within this course you will discover the protocols
                                    utilized in satellites and how to attack and defend satellite communication
                                    systems<br></span>
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
                <div class="col-sm-3 col-md-4 col-lg-3 course_card_width">
                    <a href="">
                        <div class="course_red">
                            <img src="{{ asset('img/admin/ransomware.png') }}" height="98px" class="card-img-top" alt="sca">
                            <div class="cc_card_heading text-uppercase">
                                <h4 class=" pt-1 mb-0"><strong>ransomware engineering</strong></h4>
                            </div>
                            <div class="px-2 pt-2 cc_card_body border-bottom-0">
                                <p class="subtitle text-uppercase h6 mb-0">ransomware engineering</p>
                            </div>
                            <div class="px-3  border-top-0 border-bottom-0">
                                <span class="cc_card_body_text">Understand how to reverse engineer ransomware through
                                    the expiration of the current threats attacking the various targets of the modern
                                    world<br></span>
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
                <div class="col-sm-3 col-md-4 col-lg-3 course_card_width">
                    <a href="">
                        <div class="course_yellow">
                            <img src="{{ asset('img/admin/malware.png') }}" height="98px" class="card-img-top" alt="sca">
                            <div class="cc_card_heading text-uppercase">
                                <h4 class=" pt-1 mb-0"><strong>malware engineering</strong></h4>
                            </div>
                            <div class="px-2 pt-2 cc_card_body border-bottom-0">
                                <p class="subtitle text-uppercase h6 mb-0">malware engineering</p>
                            </div>
                            <div class="px-3  border-top-0 border-bottom-0">
                                <span class="cc_card_body_text">Dive into and reverse engineer the inneroperations of
                                    current malware haunting the society at large. <br></span>
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
                <div class="col-sm-3 col-md-4 col-lg-3 course_card_width">
                    <a href="">
                        <div class="course_ ">
                            <img src="{{ asset('img/admin/social.png') }}" height="98px" class="card-img-top" alt="sca">
                            <div class="cc_card_heading text-uppercase">
                                <h4 class=" pt-1 mb-0"><strong>Social engineering</strong></h4>
                            </div>
                            <div class="px-2 pt-2 cc_card_body border-bottom-0">
                                <p class="subtitle text-uppercase h6 mb-0">Social engineering</p>
                            </div>
                            <div class="px-3  border-top-0 border-bottom-0">
                                <span class="cc_card_body_text">Discover how attackers work to manipulate the human mind
                                    through applied psychological process through exploration of various concept.
                                    <br></span>
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
                <div class="col-sm-3 col-md-4 col-lg-3 course_card_width">
                    <a href="">
                        <div class="course_orange">
                            <img src="{{ asset('img/admin/drone.png') }}" height="98px" class="card-img-top" alt="sca">
                            <div class="cc_card_heading text-uppercase">
                                <h4 class=" pt-1 mb-0"><strong>Drone Hacking</strong></h4>
                            </div>
                            <div class="px-2 pt-2 cc_card_body border-bottom-0">
                                <p class="subtitle text-uppercase h6 mb-0">Drone Hacking</p>
                            </div>
                            <div class="px-3  border-top-0 border-bottom-0">
                                <span class="cc_card_body_text">Explore the emerging attack vectors and defensive
                                    methods that target drones. <br></span>
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
                <div class="col-sm-3 col-md-4 col-lg-3 course_card_width">
                    <a href="">
                        <div class="course_pink">
                            <img src="{{ asset('img/admin/algorithm.png') }}" height="98px" class="card-img-top" alt="sca">
                            <div class="cc_card_heading text-uppercase">
                                <h4 class=" pt-1 mb-0"><strong>Computational algorithms</strong></h4>
                            </div>
                            <div class="px-2 pt-2 cc_card_body border-bottom-0">
                                <p class="subtitle text-uppercase h6 mb-0">Computational algorithms</p>
                            </div>
                            <div class="px-3  border-top-0 border-bottom-0">
                                <span class="cc_card_body_text">In this course, you will learn about various algorithms
                                    that power computing. <br></span>
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
                <div class="col-sm-3 col-md-4 col-lg-3 course_card_width">
                    <a href="">
                        <div class="course_dBlue">
                            <img src="{{ asset('img/admin/maths.png') }}" height="98px" class="card-img-top" alt="sca">
                            <div class="cc_card_heading text-uppercase">
                                <h4 class=" pt-1 mb-0"><strong>Discrete mathematics</strong></h4>
                            </div>
                            <div class="px-2 pt-2 cc_card_body border-bottom-0">
                                <p class="subtitle text-uppercase h6 mb-0">Discrete mathematics</p>
                            </div>
                            <div class="px-3  border-top-0 border-bottom-0">
                                <span class="cc_card_body_text">In this course, you will graphs various concepts
                                    associated with Mathematics and will learn discrete maths. <br></span>
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
                </div> --}}
            </div>
        </div>
    </div>
</div>
@endsection