@if (request()->is('panel/course/item/detail*'))
    <main class="col">
        <div class="row top-header">
            <div class="col-2">
                <div class="  d-flex flex-row  justify-content-center align-items-center logo">
                    <img width="220px" src="{{ asset('img/admin/logo_tr.png') }}" class=" p-2 img-fluid">
                </div>
            
            </div>
            <div class="col ">
                <ul class="d-flex flex-sm-row flex-column align-items-center justify-content-center"
                    style="width: 100%;">
                    <li class=""><a class="top_menu_item" href="{{ route('dashboard') }}">Admin Dashboard</a></li>
                    <li class="ms-sm-5"><a class="top_menu_item {{ request()->is('panel/lab*') ? 'top_menu_item_long_menu_active' : '' }}" href="{{ route('lab.index') }}">Labs</a></li>
                    
                    @if(auth()->check() && auth()->user()->hasRole('Super-Admin'))
                        <!-- Only for Super-Admin -->
                        <li class="ms-sm-5">
                            <a class="top_menu_item {{ request()->is('panel/course*') ? 'top_menu_item_long_menu_active' : '' }}" href="{{ route('course.index') }}">Courses</a>
                        </li>
                    @elseif(auth()->check() && auth()->user()->hasRole('student'))
                        <!-- Only for student -->
                        <li class="ms-sm-5">
                            <a class="top_menu_item {{ request()->is('learn/my/courses/dashboard') ? 'top_menu_item_long_menu_active' : '' }}" href="{{ route('learner.courses.dashboard') }}">Courses</a>
                        </li>
                    @elseif(auth()->check() && auth()->user()->hasRole('supervisor'))
                        <!-- Only for supervisor -->
                        <li class="ms-sm-5">
                            <a class="top_menu_item {{ request()->is('panel/course*') ? 'top_menu_item_long_menu_active' : '' }}" href="{{ route('course.index') }}">Courses</a>
                        </li>
                    @endif

                    <li class="ms-sm-5"><a class="top_menu_item {{ request()->is('panel/range*') ? 'top_menu_item_long_menu_active' : '' }}" href="{{ route('range.index') }}">Range</a></li>
                    <li class="ms-sm-5">
                        <a class="top_menu_item" href="{{ route('chat') }}">
                            Chat
                            <span class="chat-notification-badge">3</span> <!-- Replace 3 with your dynamic value -->
                        </a>
                    </li>
                    
                </ul>
            </div>
            @if (request()->is('panel/dashboard*') || request()->is('panel/statistics*') || request()->is('panel/range*'))
            <div class="col-2 d-flex flex-sm-row flex-column align-items-center justify-content-center">
                <a href="#" class="top_menu_item px-2"> <i class="fa fa-fw" aria-hidden="true"
                        title="Copy to use user"></i></a>
                <a href="#" data-bs-target="#sidebar" data-bs-toggle="collapse" class="  px-2 text-decoration-none">
                    <i class="fa-solid fa-bars"></i></a>

            </div>
            @endif
        </div>
@else
    @if (request()->is('panel/dashboard*') || request()->is('panel/statistics*') || request()->is('panel/range*') || request()->is('panel/teams*'))
    <div class="row special_btn_long_menu">
        <ul class="d-flex flex-sm-row flex-column align-items-center justify-content-center" style="width: 100%;">
            <li class="">
                <a class="top_menu_item_long_menu {{ request()->routeIs('dashboard') ? 'top_menu_item_long_menu_active' : '' }}" href="{{ route('dashboard') }}">
                    Dashboard
                </a>
            </li>
            <li class="ms-sm-5">
                <a class="top_menu_item_long_menu {{ request()->routeIs('statistics.index') ? 'top_menu_item_long_menu_active' : '' }}" href="{{ route('statistics.index') }}">
                    Statistics
                </a>
            </li>
            <li class="ms-sm-5">
                <a class="top_menu_item_long_menu {{ request()->routeIs('range.range_settings') ? 'top_menu_item_long_menu_active' : '' }}" href="{{ route('range.range_settings') }}">
                    Range Settings
                </a>
            </li>
            <li class="ms-sm-5">
                <a class="top_menu_item_long_menu {{ request()->routeIs('range_administration') ? 'top_menu_item_long_menu_active' : '' }}" href="{{ route('range.range_administration') }}">
                    Range Administration
                </a>
            </li>
            <li class="ms-sm-5">
                <a class="top_menu_item_long_menu {{ request()->routeIs('login') ? 'top_menu_item_long_menu_active' : '' }}" href="">
                    Login
                </a>
            </li>
            <li class="ms-sm-5">
                <a class="top_menu_item_long_menu {{ request()->routeIs('log_administration') ? 'top_menu_item_long_menu_active' : '' }}" href="">
                    Log Administration
                </a>
            </li>
        </ul>
    </div>
    @elseif (request()->is('panel/announcements*'))
    <div class="row special_btn_long_menu">
        <ul class="d-flex flex-sm-row flex-column align-items-center justify-content-center" style="width: 100%;">
            <li class="">
                <a class="top_menu_item_long_menu {{ request()->routeIs('admin.createAnnouncements') ? 'top_menu_item_long_menu_active' : '' }}" href="{{ route('admin.createAnnouncements') }}">
                    Add a Announcement
                </a>
            </li>
        </ul>
    </div>
    @endif

    @if (request()->is('panel/course*'))
    <div class="row special_btn_long_menu">
        <ul class="d-flex flex-sm-row flex-column align-items-center justify-content-center" style="width: 100%;">
            {{-- <li class="">
                <a class="top_menu_item_long_menu {{ request()->is('panel/courses/dashboard') ? 'top_menu_item_long_menu_active' : '' }}" href="{{ route('course.dashboard') }}">
                    Dashboard
                </a>
            </li> --}}
            <li class="ms-sm-5">
                <a class="top_menu_item_long_menu {{ request()->is('panel/course') ? 'top_menu_item_long_menu_active' : '' }}" href="{{ route('course.index') }}">
                    Courses
                </a>
            </li>
            <li class="ms-sm-5">
                <a class="top_menu_item_long_menu {{ request()->is('panel/course/create') ? 'top_menu_item_long_menu_active' : '' }}" href="{{ route('course.create') }}">
                    Add Course
                </a>
            </li>
            <li class="ms-sm-5">
                <a class="top_menu_item_long_menu {{ request()->is('panel/course/item/view-course') ? 'top_menu_item_long_menu_active' : '' }}" href="{{ route('courses.view') }}">
                    View Course
                </a>
            </li>
            <li class="ms-sm-5">
                <a class="top_menu_item_long_menu {{ request()->is('panel/course/item/course-grid-view') ? 'top_menu_item_long_menu_active' : '' }}" href="{{ route('courses.grid-view') }}">
                    Course Grid View
                </a>
            </li>
            <li class="ms-sm-5">
                <a class="top_menu_item_long_menu {{ request()->is('panel/course/item/detail') ? 'top_menu_item_long_menu_active' : '' }}" href="{{ route('courses.detail') }}">
                    Course Detail Page
                </a>
            </li>
        </ul>
    </div>
    @endif
@endif
