@extends('layouts.admin')

@section("content")
<div class="container centralize_container pt-5 ">
    <div class="main  px-2 ">
        <div class="d-flex justify-content-between mb-4">
            <div class="col">
                <h1 class="homeHeading"><strong>@lang('Create Announcement')</strong></h1>
            </div>
        </div>
    </div>
    <ul class="nav nav-pills   justify-content-center" id="pills-tab" role="tablist">
        <li class="nav-item" role="presentation">
        <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true"> 
        Add an Announcement</button>
        </li>
    </ul>
    <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab" tabindex="0">
            <form id="form" method="POST">
                <div class="p-5 row">
                    <div class="col-6 px-5">
                        <div class="mb-3">
                            <label for="Announcement" class="form-label h5">Title <span id="AnnouncementErr" style="color:red"></span> </label>
                            <input type="text" class="form-control" id="Announcement" name="Announcement" placeholder="Announcement Name..">
                        </div>
                    </div>
                    <div class="col-6 px-5">
                        <div class="mb-3">
                            <label for="favcolor" class="form-label h5">Banner <span id="favcolorErr" color="red"></span> </label>
                            <input type="file" class="form-control" name="" id="">
                        </div>
                    </div>
                </div>
                <div class="tab_footer d-flex flex-row align-items-center justify-content-center  ">
                    <button type="submit" name="submitTeam" class="rc-btn submit-button">Create Announcement</button>
                </div>
            </form>
        </div> 
    </div>
</div>
@endsection