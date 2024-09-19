@extends('layouts.admin')
<meta name="csrf-token" content="{{ csrf_token() }}">

<style>
.col-sm-12 .dataTables_wrapper row:nth-child(1), .col-sm-12 .dataTables_wrapper row:nth-child(3){
    display:none !important;
}
.modal-content {
    background-color: #0F0C2A;
    color: #ffffff;
}

.nav-pills .nav-link {
    color: #ffffff;
    background-color: #343a40;
    border-radius: .25rem;
}

.nav-pills .nav-link.active {
    color: #ffffff;
    background-color: #007bff;
}

.table-dark {
    background-color: #1c1c3d;
    color: #ffffff;
}


    .table-cyber{
        border: 1px solid #154279;
        vertical-align: baseline;
        --bs-table-bg: transparent !important;
    }
    .table-cyber tr {
        border-top: 2px #154279 outset;
        border-bottom: 2px inset #154279;
        border-left: 0;
        border-right: 0;
        transition: 0.3s;
        margin-top: 1px;
        background-color: transparent !important;
        background-image: linear-gradient(120deg, rgba(31, 24, 84, 0.2), rgba(31, 24, 84, 0.2));
    }
    .quiz-btns:active, .quiz-btns:focus-visible {
        background: #1ce5df !important;
        color: black !important;
    }
<<<<<<< HEAD
    .modal {
    display: none;
}

=======
>>>>>>> main

</style>
@section("content")
    <div class="container px-4 mt-5 ">
        <div class="main  px-2 ">
            <div class="d-flex justify-content-between mb-4">
                <div class="col">
                    <h1 class="homeHeading"><strong>@lang('Courses')</strong></h1>
                </div>
            </div>
        </div>




        @if(auth()->check() && auth()->user()->hasRole('Super-Admin'))
        {{-- TEACHERS TABLE (SUPER ADMIN) --}}

<<<<<<< HEAD
        <div class="d-flex align-items-center" style="height: 100px">
            <div class="col-4">
                <h1 class="h5 homeHeading"><strong>@lang('Courses Management')</strong></h1>
            </div>
            <div class="col-8 text-end">
                <a href="{{ route('department.index') }}" style="width:215px" class="btn_factory_reset btn">
                    <i class="fa-solid fa-book me-2"></i> COURSE CATEGORY
                </a>
                <a href="{{ route('course.create') }}" style="width:215px" class="btn_factory_reset btn">
                    <i class="fa-solid fa-plus me-2"></i> CREATE COURSE
                </a>
            </div>
        </div>
=======
        <h1 class="h5 homeHeading mt-5"><strong>@lang('Course Management')</strong></h1>
>>>>>>> main
        <div class="main-container">
            <span class="cyber_range_heading_bg">
                {{ __('Courses') }} / 
                <span class="primary-color">
                Course Management
                </span>
            </span>
        </div>
        <div class="main_announcement container ">
            <div style="margin-bottom: 1px">
                <label class="cyber_range_bg" for="editor"><i>&nbsp;</i></label>
            </div>
            <div id="rc_table_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                <div class="row">
                    <div class="col-sm-12 col-md-6">
                        <div class="dataTables_length" id="rc_table_length">
                            <label>
                                Show 
                                <select name="rc_table_length"
                                    aria-controls="rc_table" class="form-select form-select-sm">
                                    <option value="10">10</option>
                                    <option value="25">25</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                </select> 
                                entries
                            </label>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div id="rc_table_filter" class="dataTables_filter">
                            <div class="dropdown no-arrow" style="display:inline-block; margin-left: 20px;">
                                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                </a>
                                <div class="dropdown-menu bg-transparent dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink" style="">
                                    @can('course.create')
                                        <a href="{{ route('course.create') }}" class="dropdown-item">
                                            <i class="fas fa-plus pr-2"></i> {{ __('Create Course') }}
                                        </a>
                                    @endcan
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="{{ route('department.index') }}">
                                        <i class="fas fa-arrow-right pr-2"></i> {{ __('Category') }}
                                    </a>
                                    <a class="dropdown-item" href="{{ route('term.index') }}">
                                        <i class="fas fa-arrow-right pr-2"></i> {{ __('Term') }}
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <table id="rc_table" class="table table-striped nowrap dataTable no-footer" style="width:100%"
                            aria-describedby="rc_table_info">
                            <thead>
                                <tr>
                                    <th class="sorting sorting_asc text-center" tabindex="0" aria-controls="rc_table" rowspan="1"
                                        colspan="1" aria-sort="ascending" aria-label="#: activate to sort column descending"
                                        style="width: 18.4062px;">#
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="rc_table" rowspan="1" colspan="1"
                                        aria-label="Title: activate to sort column ascending" style="width: 199.016px;">
                                        {{ __("Title") }}
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="rc_table" rowspan="1" colspan="1"
                                        aria-label="Publish Date: activate to sort column ascending"
                                        style="width: 224.859px;">{{ __("Category") }}
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="rc_table" rowspan="1" colspan="1"
                                        aria-label="Category: activate to sort column ascending" style="width: 138.781px;">
                                        {{ __("is_published") }}
                                    </th>
                                    @if(Auth::user()->hasRole('Super-Admin') || Auth::user()->hasAnyPermission(['course.edit' , 'course.delete']))
                                    <th style="text-align: right; width: 495.266px;" class="sorting" tabindex="0"
                                        aria-controls="rc_table" rowspan="1" colspan="1"
                                        aria-label="Action: activate to sort column ascending">{{ __("Action") }}
                                    </th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($courses as $course)
                                <tr class="odd">
                                    <td scope="row" class="sorting_1 text-center">{{ $loop->iteration }}</td>
                                    <td><a href="file/getmedia/{{$course->courseId}}">{{ $course->courseTitle }}</a></td>
                                    <td>{{ $course->departmentTitle }}</td>
                                    <td class="ps-5"><x-CheckUnCheck isChecked="{{ $course->is_published }}" courseId="{{ $course->courseId }}" /></td>
                                    @if(Auth::user()->hasRole('Super-Admin') || Auth::user()->hasAnyPermission(['course.edit' , 'course.delete']))
                                    <td>
                                        <div class="d-flex flex-row-reverse">
                                                <a href="#" class="btn mx-2 rc-btn button-primary dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    MORE
                                                </a>
                                                <div class="dropdown-menu bg-transparent dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuButton">
                                                    <a class="dropdown-item" href="file/create/{{$course->courseId}}">
                                                        <i class="fas fa-arrow-right pr-2"></i> {{ __("Add Media") }}
                                                    </a>
                                                    <a class="dropdown-item" href="termbycourse/{{$course->courseId}}">
                                                        <i class="fas fa-arrow-right pr-2"></i> {{ __("Show Curriculum") }}
                                                    </a>
                                                    <a class="dropdown-item" href="course/publish/{{$course->courseId}}">
                                                        <i class="fas fa-arrow-right pr-2"></i> {{ __("Publish") }}
                                                    </a>
                                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#curriModal">
                                                        <i class="fas fa-arrow-right pr-2"></i> {{ __("Add Curriculum") }}
                                                    </a>
                                                    <a class="dropdown-item" href="session/create">
                                                        <i class="fas fa-arrow-right pr-2"></i> {{ __("Add Section") }}
                                                    </a>
                                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#quizModal">
                                                        <i class="fas fa-arrow-right pr-2"></i> {{ __("Add Quiz") }}
                                                    </a>
                                                </div>
                                           
                                            @can('course.delete', $course)
                                            <form action="{{ route('course.destroy', ['course' => $course->courseId]) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="mx-2 rc-btn button-danger">DELETE</button>
                                            </form>
                                            @endcan
                                            
                                        </div>
                                    </td>
                                    @endif
                                </tr>
                                @empty
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-5">
                        <div class="dataTables_info" id="rc_table_info" role="status" aria-live="polite">Showing 1 to 3 of 3 entries</div>
                    </div>
                    <div class="col-sm-12 col-md-7">
                        <div class="dataTables_paginate paging_simple_numbers" id="rc_table_paginate">
                            <ul class="pagination">
                                <li class="paginate_button page-item previous disabled" id="rc_table_previous">
                                    <a href="#" aria-controls="rc_table" data-dt-idx="0" tabindex="0" class="page-link">Previous</a>
                                </li>
                                <li class="paginate_button page-item active">
                                    <a href="#" aria-controls="rc_table" data-dt-idx="1" tabindex="0" class="page-link">1</a>
                                </li>
                                <li class="paginate_button page-item next disabled" id="rc_table_next">
                                    <a href="#" aria-controls="rc_table" data-dt-idx="2" tabindex="0" class="page-link">Next</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>








        @elseif(auth()->check() && auth()->user()->hasRole('supervisor'))
        {{-- IMPORTED COURSES TABLE --}}
        <div class="d-flex align-items-center" style="height: 100px">
            <div class="col-4">
                <h1 class="h5 homeHeading"><strong>@lang('Professor Courses')</strong></h1>
            </div>
            <div class="col-8 text-end">
                <a href="{{ route('department.index') }}" style="width:215px" class="btn_factory_reset btn">
                    <i class="fa-solid fa-book me-2"></i> COURSE CATEGORY
                </a>
                <a href="{{ route('course.create') }}" style="width:215px" class="btn_factory_reset btn">
                    <i class="fa-solid fa-plus me-2"></i> CREATE COURSE
                </a>
                <a href="#" style="width:215px" class="btn_factory_reset btn" data-bs-toggle="modal" data-bs-target="#importCourseModal">
                    <i class="fa-solid fa-list me-2"></i> IMPORT COURSE
                </a>
            </div>
        </div>
        <div class="main-container">
            <span class="cyber_range_heading_bg">
                {{ __('Courses') }} / 
                <span class="primary-color">
                Professor Courses
                </span>
            </span>
        </div>
        <div class="main_announcement">
            <div style="margin-bottom: 1px">
                <label class="cyber_range_bg" for="editor"><i>&nbsp;</i></label>
            </div>
            <div id="rc_table_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                <div class="d-flex">
                    <div class="col-sm-12 col-md-6">
                        <div class="dataTables_length" id="rc_table_length">
                            <label>
                                Show 
                                <select name="rc_table_length"
                                    aria-controls="rc_table" class="form-select form-select-sm">
                                    <option value="10">10</option>
                                    <option value="25">25</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                </select> 
                                entries
                            </label>
                        </div>
                    </div>
                    {{-- <div class="col-sm-12 col-md-6">
                        <div id="rc_table_filter" class="dataTables_filter">
                            <div class="dropdown no-arrow" style="display:inline-block; margin-left: 20px;">
                                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                </a>
                                <div class="dropdown-menu bg-transparent dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink" style="">
                                    @can('course.create')
                                        <a href="{{ route('course.create') }}" class="dropdown-item">
                                            <i class="fas fa-plus pr-2"></i> {{ __('Create Course') }}
                                        </a>
                                    @endcan
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="{{ route('department.index') }}">
                                        <i class="fas fa-arrow-right pr-2"></i> {{ __('Category') }}
                                    </a>
                                    <a class="dropdown-item" href="{{ route('term.index') }}">
                                        <i class="fas fa-arrow-right pr-2"></i> {{ __('Term') }}
                                    </a>
                                    <a class="dropdown-item" href="{{ route('courses.import') }}">
                                        <i class="fas fa-arrow-right pr-2"></i> {{ __('Import Courses') }}
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                </div>
                <div class="d-flex">
                    <div class="col-sm-12 table-responsive">
                        <table id="rc_table" class="table table-striped nowrap dataTable no-footer" style="width:100%"
                            aria-describedby="rc_table_info">
                            <thead>
                                <tr>
                                    <th class="sorting sorting_asc text-center" tabindex="0" aria-controls="rc_table" rowspan="1"
                                        colspan="1" aria-sort="ascending" aria-label="#: activate to sort column descending"
                                        style="width: 18.4062px;">#
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="rc_table" rowspan="1" colspan="1"
                                        aria-label="Title: activate to sort column ascending" style="width: 199.016px;">
                                        {{ __("Title") }}
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="rc_table" rowspan="1" colspan="1"
                                        aria-label="Category: activate to sort column ascending"
                                        style="width: 224.859px;">{{ __("Category") }}
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="rc_table" rowspan="1" colspan="1"
                                        aria-label="Publish Date: activate to sort column ascending"
                                        style="width: 224.859px;">{{ __("Creation Date") }}
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="rc_table" rowspan="1" colspan="1"
                                        aria-label="Enrollments: activate to sort column ascending"
                                        style="width: 224.859px;">{{ __("Enrollments") }}
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="rc_table" rowspan="1" colspan="1"
                                        aria-label="Course Published: activate to sort column ascending" style="width: 138.781px;">
                                        {{ __("Course Published") }}
                                    </th>
                                    @if(Auth::user()->hasRole('Super-Admin') || Auth::user()->hasAnyPermission(['course.edit' , 'course.delete']))
                                    <th style="text-align: right; width: 495.266px;" class="sorting" tabindex="0"
                                        aria-controls="rc_table" rowspan="1" colspan="1"
                                        aria-label="Action: activate to sort column ascending">{{ __("Action") }}
                                    </th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                
                                @forelse ($supercourses as $course)
                                <tr class="odd">
                                    <td scope="row" class="sorting_1 text-center">{{ $loop->iteration }}</td>
                                    <td><a href="file/getmedia/{{$course->courseId}}">{{ $course->courseTitle }}</a></td>
                                    <td>{{ $course->departmentTitle }}</td>
                                    <!-- Creation Date -->
                                    <td>
                                        {{ \Carbon\Carbon::parse($course->created_at)->format('Y-m-d H:i:s') ?? 'N/A' }}
                                    </td>
                                    
                                    <!-- Enrollments -->
                                    <td>
                                        {{ $course->require_enroll ?? '0' }}
                                    </td>
                                    <td class="ps-5"><x-CheckUnCheck isChecked="{{ $course->is_published }}" courseId="{{ $course->courseId }}" />
                                    </td>
                                    @if(Auth::user()->hasRole('Super-Admin') || Auth::user()->hasAnyPermission(['course.edit' , 'course.delete']))
                                    <td>
                                        <div class="d-flex flex-row-reverse">
                                                <a href="{{ route('courses.view') }}" class="btn mx-2 rc-btn button-warning">
                                                    EDIT
                                                </a>
                                                {{-- <div class="dropdown-menu bg-transparent dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuButton">
                                                    <a class="dropdown-item" href="file/create/{{$course->courseId}}">
                                                        <i class="fas fa-arrow-right pr-2"></i> {{ __("Add Media") }}
                                                    </a>
                                                    <a class="dropdown-item" href="termbycourse/{{$course->courseId}}">
                                                        <i class="fas fa-arrow-right pr-2"></i> {{ __("Show Curriculum") }}
                                                    </a>
                                                    <a class="dropdown-item" href="course/publish/{{$course->courseId}}">
                                                        <i class="fas fa-arrow-right pr-2"></i> {{ __("Publish") }}
                                                    </a>
                                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#curriModal">
                                                        <i class="fas fa-arrow-right pr-2"></i> {{ __("Add Curriculum") }}
                                                    </a>
                                                    <a class="dropdown-item" href="session/create">
                                                        <i class="fas fa-arrow-right pr-2"></i> {{ __("Add Topic") }}
                                                    </a>
                                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#quizModal">
                                                        <i class="fas fa-arrow-right pr-2"></i> {{ __("Add Quiz") }}
                                                    </a>
                                                    <a class="dropdown-item" href="importcourse/{{ $course->courseId }}">
                                                        <i class="fas fa-arrow-right pr-2"></i> {{ __("Import Course") }}
                                                    </a>
                                                </div> --}}
                                           
                                            @can('course.delete', $course)
                                            <form action="{{ route('course.destroy', ['course' => $course->courseId]) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="mx-2 rc-btn button-danger">DELETE</button>
                                            </form>
                                            @endcan
                                            
                                        </div>
                                    </td>
                                    @endif
                                </tr>
                                @empty
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-5">
                        <div class="dataTables_info" id="rc_table_info" role="status" aria-live="polite">Showing 1 to 3 of 3 entries</div>
                    </div>
                    <div class="col-sm-12 col-md-7">
                        <div class="dataTables_paginate paging_simple_numbers" id="rc_table_paginate">
                            <ul class="pagination">
                                <li class="paginate_button page-item previous disabled" id="rc_table_previous">
                                    <a href="#" aria-controls="rc_table" data-dt-idx="0" tabindex="0" class="page-link">Previous</a>
                                </li>
                                <li class="paginate_button page-item active">
                                    <a href="#" aria-controls="rc_table" data-dt-idx="1" tabindex="0" class="page-link">1</a>
                                </li>
                                <li class="paginate_button page-item next disabled" id="rc_table_next">
                                    <a href="#" aria-controls="rc_table" data-dt-idx="2" tabindex="0" class="page-link">Next</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>
    @endsection
       
    {{-- MODAL WINDOW --}}
    <!-- Modal Structure -->
    <div class="modal fade" id="importCourseModal" tabindex="-1" aria-labelledby="importCourseModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content" style="background-color: #0F0C2A; color: #ffffff;">
                <div class="modal-header">
                    <h5 class="modal-title" id="importCourseModalLabel">Import Courses</h5>
<<<<<<< HEAD
                    <button type="button" class="btn-close bg-white" data-bs-dismiss="modal" aria-label="Close"></button>
=======
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
>>>>>>> main
                </div>
                <div class="modal-body">
                    <!-- Category Pills -->
                    <ul class="nav mb-3" role="tablist">

                    @foreach ($departments as $department)
                    <li class="me-2 mt-2" role="presentation">
                        <button class="quiz-btns btn" id="pills-{{ $department->id }}-tab" data-bs-toggle="pill" data-bs-target="#pills-{{ $department->id }}" type="button" role="tab" aria-controls="pills-{{ $department->id }}" aria-selected="false">{{ $department->title }}</button>
                    </li>
                    @endforeach
                       <!-- <li class="me-2" role="presentation">
                            <button class="active quiz-btns btn" id="pills-persistence-tab" data-bs-toggle="pill" data-bs-target="#pills-persistence" type="button" role="tab" aria-controls="pills-persistence" aria-selected="true">Persistence</button>
                        </li>
                        <li class="me-2" role="presentation">
                            <button class="quiz-btns btn" id="pills-privilege-tab" data-bs-toggle="pill" data-bs-target="#pills-privilege" type="button" role="tab" aria-controls="pills-privilege" aria-selected="false">Privilege Escalation</button>
                        </li>
                        <li class="me-2" role="presentation">
                            <button class="quiz-btns btn" id="pills-defense-tab" data-bs-toggle="pill" data-bs-target="#pills-defense" type="button" role="tab" aria-controls="pills-defense" aria-selected="false">Defense Evasion</button>
                        </li>
                        <li class="me-2" role="presentation">
                            <button class="quiz-btns btn" id="pills-credential-tab" data-bs-toggle="pill" data-bs-target="#pills-credential" type="button" role="tab" aria-controls="pills-credential" aria-selected="false">Credential Access</button>
                        </li>
                        <li class="me-2" role="presentation">
                            <button class="quiz-btns btn" id="pills-discovery-tab" data-bs-toggle="pill" data-bs-target="#pills-discovery" type="button" role="tab" aria-controls="pills-discovery" aria-selected="false">Discovery</button>
                        </li>
                        <li class="me-2" role="presentation">
                            <button class="quiz-btns btn" id="pills-collection-tab" data-bs-toggle="pill" data-bs-target="#pills-collection" type="button" role="tab" aria-controls="pills-collection" aria-selected="false">Collection</button>
                        </li>
                        <li class="me-2" role="presentation">
                            <button class="quiz-btns btn" id="pills-cc-tab" data-bs-toggle="pill" data-bs-target="#pills-cc" type="button" role="tab" aria-controls="pills-cc" aria-selected="false">Command and Control</button>
                        </li>
                        <div class="d-flex" style="margin:0px auto">
                            <li class="me-2 mt-2" role="presentation">
                                <button class="quiz-btns btn" id="pills-exfiltration-tab" data-bs-toggle="pill" data-bs-target="#pills-exfiltration" type="button" role="tab" aria-controls="pills-exfiltration" aria-selected="false">Exfiltration</button>
                            </li>
                            <li class="me-2 mt-2" role="presentation">
                                <button class="quiz-btns btn" id="pills-impact-tab" data-bs-toggle="pill" data-bs-target="#pills-impact" type="button" role="tab" aria-controls="pills-impact" aria-selected="false">Impact</button>
                            </li>
                            <li class="me-2 mt-2" role="presentation">
                                <button class="quiz-btns btn" id="pills-reconnaissance-tab" data-bs-toggle="pill" data-bs-target="#pills-reconnaissance" type="button" role="tab" aria-controls="pills-reconnaissance" aria-selected="false">Reconnaissance</button>
                            </li>
                            <li class="me-2 mt-2" role="presentation">
                                <button class="quiz-btns btn" id="pills-rd-tab" data-bs-toggle="pill" data-bs-target="#pills-rd" type="button" role="tab" aria-controls="pills-rd" aria-selected="false">Resource Development</button>
                            </li>
                            <li class="me-2 mt-2" role="presentation">
                                <button class="quiz-btns btn" id="pills-ia-tab" data-bs-toggle="pill" data-bs-target="#pills-ia" type="button" role="tab" aria-controls="pills-ia" aria-selected="false">Initial Access</button>
                            </li>
                            <li class="me-2 mt-2" role="presentation">
                                <button class="quiz-btns btn" id="pills-execute-tab" data-bs-toggle="pill" data-bs-target="#pills-execute" type="button" role="tab" aria-controls="pills-execute" aria-selected="false">Execution</button>
                            </li>
                        </div>-->
                        <!-- Add other categories similarly -->
                    </ul>

                    <!-- Tab Content for Categories -->
                    <div class="tab-content" id="pills-tabContent">

<<<<<<< HEAD
                    <div class="select_cat">
                        <p class="h5 homeHeading my-5">Please select a category to import course</p>
                    </div>
                    @foreach ($departments as $index => $department)
                        <div class="tab-pane rc_table_wrapper fade @if($index === 0) show @endif" id="pills-{{ $department->id }}" role="tabpanel" aria-labelledby="pills-{{ $department->id }}-tab">
=======
                    @foreach ($departments as $index => $department)
                        <div class="tab-pane rc_table_wrapper fade @if($index === 0) show active @endif" id="pills-{{ $department->id }}" role="tabpanel" aria-labelledby="pills-{{ $department->id }}-tab">
>>>>>>> main
                            <!-- Courses Table for {{ $department->title }} Category -->
                            <table class="table table-striped table-cyber">
                                <thead>
                                    <tr>
                                        <th scope="col">Course ID</th>
                                        <th scope="col">Course Title</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody id="{{ $department->id }}-courses">
                                    <!-- Courses for this category will be populated dynamically -->
                                </tbody>
                            </table>
                        </div>
                    @endforeach
                
                        <!-- Repeat the same structure for other categories -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
    <script>
        new DataTable('#rc_table');
        document.addEventListener('DOMContentLoaded', function () {
           
            
            console.log('listen fourseData');

           

            console.log('before fourseData');
            // Placeholder data for each category

            const coursesData = {
    @php
        $first = true;
    @endphp
    @foreach($departmentsmodal as $departmentId => $departmentCourses)
        @if(count($departmentCourses) > 0)
            @if(!$first)
                ,
            @endif
            {{ $departmentCourses[0]->department_id }}: [
                @foreach($departmentCourses as $course)
                    { id: {{ $course->course_id }}, title: '{{ $course->course_title }}' }@if(!$loop->last),@endif
                @endforeach
            ]
            @php
                $first = false;
            @endphp
        @else
            @if(!$first)
                ,
            @endif
            {{ $departmentId }}: [
                { id: null, title: 'Course not found' }
            ]
            @php
                $first = false;
            @endphp
        @endif
    @endforeach
};
                
            
          // Function to populate a table with the provided data
                function populateTable(category, data) {
                    var tableBody = document.getElementById(`${category}-courses`);
                    if (tableBody) {
                        console.log('Element exists');
                        tableBody.innerHTML = ''; // Clear existing rows

                        data.forEach(course => {
                            const row = document.createElement('tr');
                            row.innerHTML = `
                                <td>${course.id}</td>
                                <td>${course.title}</td>
                                <td><a class="btn btn-primary" href="/panel/importcourse/${course.id}">Import</button></td>
                            `;
                            tableBody.appendChild(row);
                        });
                    } else {
                        console.log('Element does not exist');
                    }
                }

            // Attach event listeners to each pill
            document.querySelectorAll('.quiz-btns').forEach(button => {
                button.addEventListener('click', function () {
                    const category = this.id.replace('pills-', '').replace('-tab', '');
                    
                    if (coursesData[category]) {
                        populateTable(category, coursesData[category]);
                    }
                });
            });

            // Optionally, populate the first active tab initially
           // populateTable('persistence', coursesData['persistence']);
            // Optionally, populate the first active tab initially
<<<<<<< HEAD
        // const firstCategory = Object.keys(coursesData)[0];
        // if (firstCategory) {
        //     populateTable(firstCategory, coursesData[firstCategory]);
        // }
            
        });

        $(document).ready(function(){
            $(".modal-body .quiz-btns").click(function(){
                $(".select_cat").hide();
            });
        });

=======
        const firstCategory = Object.keys(coursesData)[0];
        if (firstCategory) {
            populateTable(firstCategory, coursesData[firstCategory]);
        }
            
        });

>>>>>>> main
    </script>