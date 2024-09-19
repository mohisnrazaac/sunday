<!DOCTYPE html>
<html lang="en">
@include('layouts.header')


<body id="page-top">

<!-- Page Wrapper -->
<div id="wrapper">

    @include("layouts.menus.sidebar",['unreadCount' => $unreadCount])
    

     <!-- Content Wrapper -->
     <div id="content-wrapper" class="d-flex flex-column">
         
        <!-- Main Content -->
        <div id="content">

            {{-- @include("layouts.menus.top") --}}


            <!-- Begin Page Content -->
            <div class="container-fluid">

                @include('layouts.msg')
                @yield('content')
            </div>
        </div>

        <div class="copyright row">

            <div class="col">
                Copyright © 2023 rootCapture. All rights reserved.
            </div>
        
            <div class="col ">
        
                <ul class="  d-flex flex-row-reverse " class="menu_items_right">
                    <li class="ms-4">
                        <a href="" class="footer_menu">
                            <p>Privacy Policy</p>
                        </a>
                    </li>
                    <li class="ms-4">
                        <a href="" class="footer_menu">
                            <p>Terms of Services</p>
                        </a>
                    </li>
                    <li class="ms-4">
                        <a href="" class="footer_menu">English</a>
                    </li>
                </ul>
        
            </div>
        
        </div>
    </div>
</div>

@if (request()->is('panel/course/create'))
<!-- Do not include footer -->
@else
    @include('layouts.footer')
@endif
</body>
</html>