

@if (!request()->is('panel/course/item/detail*'))
<div class="row flex-nowrap">
    @if (request()->is('panel/dashboard*') || request()->is('panel/statistics*') || request()->is('panel/range*') || request()->is('panel/teams*') || request()->is('panel/announcements*'))
        <div class="col-auto px-0">


            <div id="sidebar" class="collapse collapse-horizontal show  ">

                <div class="  d-flex flex-row  justify-content-center align-items-center    logo">
                    <img width="220px" src="{{ asset('img/admin/logo_tr.png') }}" class=" p-2 img-fluid">
                </div>




                <div id="sidebar-nav" class="list-group border-0 rounded-0 text-sm-start min-vh-100">
                    <a href="{{ route('home') }}" class="special_btn " data-bs-parent="#sidebar">
                        <i class="bi bi-bootstrap"></i> <span>Home</span>
                    </a>
                    <a href="{{ route('home') }}" class="special_btn" data-bs-parent="#sidebar">
                        <i class="bi bi-bootstrap"></i> <span>Asset List</span>
                    </a>
                    <a href="#" class="mb-3 special_btn" data-bs-parent="#sidebar">
                        <i class="bi bi-bootstrap"></i> <span>Grading Rubric</span>
                    </a>
                    <a href="#" class="list-group-label" data-bs-parent="#sidebar">
                        <i class="bi bi-bootstrap"></i> <span>Administrative Functions</span>
                    </a>
                    <a href="{{ route('dashboard') }}" class="list-group-item border-end-0 d-inline-block" data-bs-parent="#sidebar">
                        <i class="bi bi-bootstrap"></i> <span>Admin Dashboards</span>
                    </a>
                    <a href="#announcementSubmenu" class="list-group-item border-end-0 d-inline-block" data-bs-toggle="collapse" aria-expanded="false" aria-controls="announcementSubmenu">
                        <i class="bi bi-bootstrap"></i> <span>Announcement</span> <i class="fa fa-caret-down float-end"></i>
                    </a>
                    <div class="collapse" id="announcementSubmenu">
                        <a href="{{ route('admin.manageAnnouncements') }}" class="ms-3 list-group-item border-end-0 d-inline-block" data-bs-parent="#sidebar-nav">
                            <i class="bi bi-bootstrap"></i><i class="fa-solid translate-middle fa-circle" style="font-size:8px"></i> <span>Manage Announcements</span>
                        </a>
                        <a href="{{ route('admin.createAnnouncements') }}" class="ms-3 list-group-item border-end-0 d-inline-block" data-bs-parent="#sidebar-nav">
                            <i class="bi bi-bootstrap"></i><i class="fa-solid translate-middle fa-circle" style="font-size:8px"></i> <span>Create Announcements</span>
                        </a>
                    </div>
                    <a href="#teamSubmenu" class="list-group-item border-end-0 d-inline-block" data-bs-toggle="collapse" aria-expanded="false" aria-controls="teamSubmenu">
                        <i class="bi bi-bootstrap"></i> <span>Team Management</span> <i class="fa fa-caret-down float-end"></i>
                    </a>
                    <div class="collapse" id="teamSubmenu">
                        <a href="{{ route('admin.manageTeam') }}" class="ms-3 list-group-item border-end-0 d-inline-block" data-bs-parent="#sidebar-nav">
                            <i class="bi bi-bootstrap"></i><i class="fa-solid translate-middle fa-circle" style="font-size:8px"></i> <span>Manage Team</span>
                        </a>
                        <a href="{{ route('admin.createTeam') }}" class="ms-3 list-group-item border-end-0 d-inline-block" data-bs-parent="#sidebar-nav">
                            <i class="bi bi-bootstrap"></i><i class="fa-solid translate-middle fa-circle" style="font-size:8px"></i> <span>Create Team</span>
                        </a>
                    </div>
                    <a href="#courseManagement" class="list-group-item border-end-0 d-inline-block" data-bs-toggle="collapse" aria-expanded="false" aria-controls="courseManagement">
                        <i class="bi bi-bootstrap"></i> <span>Course Management</span> <i class="fa fa-caret-down float-end"></i>
                    </a>
                    <div class="collapse" id="courseManagement">

                        @unless(auth()->check() && auth()->user()->hasRole('Super-Admin') || auth()->user()->hasRole('supervisor'))
                            <a href="{{ route('learner.courses.dashboard') }}" class="ms-3 list-group-item border-end-0 d-inline-block {{ request()->is('learn/my/courses/dashboard') ? 'active-menu' : '' }}" data-bs-parent="#sidebar">
                                <i class="bi bi-bootstrap"></i><i class="fa-solid translate-middle fa-circle" style="font-size:8px"></i> <span>Courses Dashboard</span>
                            </a>
                            <a href="{{ route('learn.courses.grid-view') }}" class="w-100 ms-3 list-group-item border-end-0 d-inline-block {{ request()->is('learn/course-grid-view') ? 'active-menu' : '' }}" data-bs-parent="#sidebar-nav">
                                <i class="bi bi-bootstrap"></i><i class="fa-solid translate-middle fa-circle" style="font-size:8px"></i> <span>View Grid</span>
                            </a>
                        @endunless
                        
                        @unless(auth()->check() && auth()->user()->hasRole('student'))
                            <a href="{{ route('course.index') }}" class="ms-3 list-group-item border-end-0 d-inline-block {{ request()->is('panel/course') ? 'active-menu' : '' }}" data-bs-parent="#sidebar">
                                <i class="bi bi-bootstrap"></i><i class="fa-solid translate-middle fa-circle" style="font-size:8px"></i> <span>Courses Dashboard</span>
                            </a>
                            <a href="{{ route('courses.grid-view') }}" class="w-100 ms-3 list-group-item border-end-0 d-inline-block {{ request()->is('panel/course/item/course-grid-view') ? 'active-menu' : '' }}" data-bs-parent="#sidebar-nav">
                                <i class="bi bi-bootstrap"></i><i class="fa-solid translate-middle fa-circle" style="font-size:8px"></i> <span>View Grid</span>
                            </a>
                            <a href="{{ route('courses.view') }}" class="w-100 ms-3 list-group-item border-end-0 d-inline-block {{ request()->is('panel/course/item/view-course') ? 'active-menu' : '' }}" data-bs-parent="#sidebar-nav">
                                <i class="bi bi-bootstrap"></i><i class="fa-solid translate-middle fa-circle" style="font-size:8px"></i> <span>View Course</span>
                            </a>
                        @endunless
                    </div>
                    <a href="#learnerSubmenu" class="list-group-item border-end-0 d-inline-block" data-bs-toggle="collapse" aria-expanded="false" aria-controls="learnerSubmenu">
                        <i class="bi bi-bootstrap"></i> <span>Learners</span> <i class="fa fa-caret-down float-end"></i>
                    </a>
                    <div class="collapse" id="learnerSubmenu">
                        <a href="{{ route('myLearners') }}" class="ms-3 w-100 list-group-item border-end-0 d-inline-block {{ request()->is('myLearners*') ? 'active-menu' : '' }}" data-bs-parent="#sidebar-nav">
                            <i class="fa-solid translate-middle fa-circle" style="font-size:8px"></i> <span>My Learners</span>
                        </a>
                    </div>
                    <a href="" class="list-group-item border-end-0 d-inline-block <?php if (isset($_GET['page']) && $_GET['page'] == 'system_management.php') { echo ' active-menu '; } ?>" data-bs-parent="#sidebar">
                        <i class="bi bi-bootstrap"></i> <span>System Management</span>
                    </a>
                    <a href="#userSubmenu" class="list-group-item border-end-0 d-inline-block" data-bs-toggle="collapse" aria-expanded="false" aria-controls="userSubmenu">
                        <i class="bi bi-bootstrap"></i> <span>User Management</span> <i class="fa fa-caret-down float-end"></i>
                    </a>
                    <div class="collapse" id="userSubmenu">
                        <a href="{{ route('user.index') }}" class="ms-3 w-100 list-group-item border-end-0 d-inline-block {{ request()->is('user*') ? 'active-menu' : '' }}" data-bs-parent="#sidebar-nav">
                            <i class="fa-solid translate-middle fa-circle" style="font-size:8px"></i> <span>User</span>
                        </a>
                        <a href="{{ route('role.index') }}" class="ms-3 w-100 list-group-item border-end-0 d-inline-block {{ request()->is('role*') ? 'active-menu' : '' }}" data-bs-parent="#sidebar-nav">
                            <i class="fa-solid translate-middle fa-circle" style="font-size:8px"></i> <span>Role</span>
                        </a>
                        <a href="{{ route('permission.index') }}" class="ms-3 w-100 list-group-item border-end-0 d-inline-block {{ request()->is('permission*') ? 'active-menu' : '' }}" data-bs-parent="#sidebar-nav">
                            <i class="fa-solid translate-middle fa-circle" style="font-size:8px"></i> <span>Permission</span>
                        </a>
                    </div>
                    <a href="" class="list-group-item border-end-0 d-inline-block <?php if (isset($_GET['page']) && $_GET['page'] == 'api_management.php') { echo ' active-menu '; } ?>" data-bs-parent="#sidebar">
                        <i class="bi bi-bootstrap"></i> <span>API Management</span>
                    </a>
                    <a href="" class="list-group-item border-end-0 d-inline-block <?php if (isset($_GET['page']) && $_GET['page'] == 'ruberic_management.php') { echo ' active-menu '; } ?>" data-bs-parent="#sidebar">
                        <i class="bi bi-bootstrap"></i> <span>Ruberic Management</span>
                    </a>
                    <a href="" class="list-group-item border-end-0 d-inline-block <?php if (isset($_GET['page']) && $_GET['page'] == 'quiz_management.php') { echo ' active-menu '; } ?>" data-bs-parent="#sidebar">
                        <i class="bi bi-bootstrap"></i> <span>Quiz Management</span>
                    </a>
                    <a href="#financeSubmenu" class="list-group-item border-end-0 d-inline-block" data-bs-toggle="collapse" aria-expanded="false" aria-controls="financeSubmenu">
                        <i class="bi bi-bootstrap"></i> <span>Financial</span> <i class="fa fa-caret-down float-end"></i>
                    </a>
                    <div class="collapse" id="financeSubmenu">
                        <a href="{{ route('plan.index') }}" class="ms-3 w-100 list-group-item border-end-0 d-inline-block {{ request()->is('plan*') ? 'active-menu' : '' }}" data-bs-parent="#sidebar-nav">
                            <i class="fa-solid translate-middle fa-circle" style="font-size:8px"></i> <span>Plan</span>
                        </a>
                    </div>
                    <a href="" class="list-group-item border-end-0 d-inline-block <?php if (isset($_GET['page']) && $_GET['page'] == 'knowledge_base.php') { echo ' active-menu '; } ?>" data-bs-parent="#sidebar">
                        <i class="bi bi-bootstrap"></i> <span>Knowledge Base</span>
                    </a>
                    <a href="" class="list-group-item border-end-0 d-inline-block <?php if (isset($_GET['page']) && $_GET['page'] == 'ticket_management.php') { echo ' active-menu '; } ?>" data-bs-parent="#sidebar">
                        <i class="bi bi-bootstrap"></i> <span>Ticket Management</span>
                    </a>
                </div>

            </div>
        </div>
        @endif

        @if (request()->is('panel/course*') || request()->is('learn/course-grid-view') || request()->is('learn/my/course') )
        <div class="col-auto px-0">
            <div id="sidebar" class="collapse collapse-horizontal show  ">
                <div class="  d-flex flex-row  justify-content-center align-items-center    logo">
                    <img width="220px" src="{{ asset('img/admin/logo_tr.png') }}" class=" p-2 img-fluid">
                </div>
                <div id="sidebar-nav" class="list-group border-0 rounded-0 text-sm-start min-vh-100">
                    <a href="{{ route('home') }}" class="special_btn " data-bs-parent="#sidebar">
                        <i class="bi bi-bootstrap"></i> <span>Home</span>
                    </a>
                    <a href="{{ route('home') }}" class="special_btn" data-bs-parent="#sidebar">
                        <i class="bi bi-bootstrap"></i> <span>Asset List</span>
                    </a>
                    <a href="#" class="mb-3 special_btn" data-bs-parent="#sidebar"  data-toggle="modal" data-target="#logoutModal">
                        <i class="bi bi-bootstrap"></i> <span>Log Out</span>
                    </a>
                    <a href="#" class="list-group-label" data-bs-parent="#sidebar">
                        <i class="bi bi-bootstrap"></i> <span>Administrative Functions</span>
                    </a>
                    <a href="{{ route('dashboard') }}" class="list-group-item border-end-0 d-inline-block" data-bs-parent="#sidebar">
                        <i class="bi bi-bootstrap"></i> <span>Admin Dashboards</span>
                    </a>
                    <a href="#courseManagement" class="list-group-item border-end-0 d-inline-block" data-bs-toggle="collapse" aria-expanded="false" aria-controls="courseManagement">
                        <i class="bi bi-bootstrap"></i> <span>Course Management</span> <i class="fa fa-caret-down float-end"></i>
                    </a>
                    <div class="collapse" id="courseManagement">
                        
                        @unless(auth()->check() && auth()->user()->hasRole('Super-Admin') || auth()->user()->hasRole('supervisor'))
                            <a href="{{ route('learner.courses.dashboard') }}" class="ms-3 list-group-item border-end-0 d-inline-block {{ request()->is('learn/my/courses/dashboard') ? 'active-menu' : '' }}" data-bs-parent="#sidebar">
                                <i class="bi bi-bootstrap"></i><i class="fa-solid translate-middle fa-circle" style="font-size:8px"></i> <span>Courses Dashboard</span>
                            </a>
                            <a href="{{ route('learn.courses.grid-view') }}" class="w-100 ms-3 list-group-item border-end-0 d-inline-block {{ request()->is('learn/course-grid-view') ? 'active-menu' : '' }}" data-bs-parent="#sidebar-nav">
                                <i class="bi bi-bootstrap"></i><i class="fa-solid translate-middle fa-circle" style="font-size:8px"></i> <span>View Grid</span>
                            </a>
                        @endunless
                        
                        @unless(auth()->check() && auth()->user()->hasRole('student'))
                            <a href="{{ route('course.index') }}" class="ms-3 list-group-item border-end-0 d-inline-block {{ request()->is('panel/course') ? 'active-menu' : '' }}" data-bs-parent="#sidebar">
                                <i class="bi bi-bootstrap"></i><i class="fa-solid translate-middle fa-circle" style="font-size:8px"></i> <span>Courses Dashboard</span>
                            </a>
                            <a href="{{ route('courses.grid-view') }}" class="w-100 ms-3 list-group-item border-end-0 d-inline-block {{ request()->is('panel/course/item/course-grid-view') ? 'active-menu' : '' }}" data-bs-parent="#sidebar-nav">
                                <i class="bi bi-bootstrap"></i><i class="fa-solid translate-middle fa-circle" style="font-size:8px"></i> <span>View Grid</span>
                            </a>
                            <a href="{{ route('courses.view') }}" class="w-100 ms-3 list-group-item border-end-0 d-inline-block {{ request()->is('panel/course/item/view-course') ? 'active-menu' : '' }}" data-bs-parent="#sidebar-nav">
                                <i class="bi bi-bootstrap"></i><i class="fa-solid translate-middle fa-circle" style="font-size:8px"></i> <span>View Course</span>
                            </a>
                        @endunless

                        <a href="{{ route('course.create') }}" class="ms-3 list-group-item border-end-0 d-inline-block {{ request()->is('panel/course/create') ? 'active-menu' : '' }}" data-bs-parent="#sidebar">
                            <i class="bi bi-bootstrap"></i><i class="fa-solid translate-middle fa-circle" style="font-size:8px"></i> <span>Add Course</span>
                        </a>
                        <a href="{{ route('courses.detail') }}" class="ms-3 list-group-item border-end-0 d-inline-block {{ request()->is('panel/course/item/detail') ? 'active-menu' : '' }}" data-bs-parent="#sidebar">
                            <i class="bi bi-bootstrap"></i><i class="fa-solid translate-middle fa-circle" style="font-size:8px"></i> <span>Course Details</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        @endif

        <main class="col">
            <div class="row top-header">
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
                            <a class="top_menu_item" href="{{ route('chat.index') }}">
                                Chat
                                <span id="chat-notification-badge" class="chat-notification-badge">{{$unreadCount}}</span> <!-- Initially 0 -->
                            </a>
                        </li>
                    </ul>
                </div>
                @if ( request()->is('panel*') || request()->is('learner*') )
                <div class="col-2 d-flex flex-sm-row flex-column align-items-center justify-content-center">
                    <ul class="list-group bg-transparent d-flex flex-row align-items-center align-content-center" style="min-height:auto">
                        <li class="nav-item dropdown border-0 list-group-item bg-transparent notification-dropdown text-white">
                            <a href="javascript:void(0);" class="nav-link dropdown-toggle" id="notificationDropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bell"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path><path d="M13.73 21a2 2 0 0 1-3.46 0"></path></svg><span class="badge badge-success"></span>
                            </a>

                            <div class="dropdown-menu special_dropdown position-absolute" aria-labelledby="notificationDropdown">
                                <div class="drodpown-title">
                                    <h6 class="d-flex justify-content-between">
                                        <span class="align-self-center">Messages</span> 
                                        <span class="badge badge-primary">0 Unread</span>
                                    </h6>
                                </div>
                                <div class="notification-scroll ps">
                                    <div class="drodpown-title notification mt-2">
                                        <h6 class="d-flex justify-content-between"><span class="align-self-center">Notifications</span> 
                                            <a href="livechat/chat.php"> <span class="badge badge-secondary">View Chat</span></a>
                                        </h6>
                                    </div>
                                    <div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div></div>
                                </div>
                            </div>
                        </li>
                        <li class=" list-group-item border-0 bg-transparent">
                            <div class="dropdown">
                                <a href="javascript:void(0);" data-bs-toggle="dropdown" class="nav-link dropdown-toggle user px-2 text-decoration-none">
                                    <i class="fa-solid fa-bars"></i>
                                </a>
                            
                                <ul class="dropdown-menu special_dropdown position-absolute">
                                    <!-- User Profile Section -->
                                    <li class="dropdown-item user-profile-section">
                                        <div class="media row">
                                            <div class="emoji col-1">
                                                👋
                                            </div>
                                            <div class="media-body col-9">
                                                <h5 class="text-white">AdminDemo</h5>
                                                <p><font color="#e1d005">Admin</font></p>
                                            </div>
                                        </div>
                                    </li>
                            
                                    <!-- Profile Link -->
                                    <li class="dropdown-item">
                                        <a href="../user-account-settings.php" class="d-header-flex">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user">
                                                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                                <circle cx="12" cy="7" r="4"></circle>
                                            </svg>
                                            <span>Profile</span>
                                        </a>
                                    </li>
                            
                                    <!-- Groups Link -->
                                    <li class="dropdown-item">
                                        <a href="group-list.php" class="d-header-flex">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users">
                                                <path d="M17 21v-2a4 4 0 0 0-4-4H7a4 4 0 0 0-4 4v2"></path>
                                                <circle cx="9" cy="7" r="4"></circle>
                                                <circle cx="17" cy="7" r="4"></circle>
                                            </svg>
                                            <span>Groups</span>
                                        </a>
                                    </li>
                            
                                    <!-- Logout Link -->
                                    <li class="dropdown-item">
                                        <a href="#" class="d-header-flex" data-bs-toggle="modal" data-bs-target="#logoutModal">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-log-out">
                                                <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                                                <polyline points="16 17 21 12 16 7"></polyline>
                                                <line x1="21" y1="12" x2="9" y2="12"></line>
                                            </svg>
                                            <span>Log Out</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            
                        </li>
                    </ul>
                </div>
                @endif
            </div>
@endif


