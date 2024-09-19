@extends('layouts.admin')

@section("content")
<div class="container centralize_container pt-5 ">
    <div class="main  px-2 ">
        <div class="d-flex justify-content-between mb-4">
            <div class="col">
                <h1 class="homeHeading"><strong>@lang('Create Team')</strong></h1>
            </div>
        </div>
    </div>
    <ul class="nav nav-pills   justify-content-center" id="pills-tab" role="tablist">
        <li class="nav-item" role="presentation">
        <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true"> 
        Add an Team    </button>
        </li>
    </ul>
    <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab" tabindex="0">
            <form id="form" onsubmit="if (!window.__cfRLUnblockHandlers) return false; javascript: return process();" method="POST">
                <div class="p-5 row">
                    <div class="col-6 px-5">
                        <div class="mb-3">
                            <label for="team" class="form-label">Team Name <span id="teamErr" style="color:red"></span> </label>
                            <input type="text" class="form-control" id="team" name="team" placeholder="Write your team name here">
                        </div>
                    </div>
                    <div class="col-6 px-5">
                        <div class="mb-3">
                            <label for="favcolor" class="form-label">Pick Color <span id="favcolorErr" color="red"></span> </label>
                            <img style="min-width:16px;min-height:16px;box-sizing:unset;box-shadow:none;background:unset;padding:0 6px 0 0;cursor:pointer;" src="chrome-extension://ohcpnigalekghcmgcdcenkpelffpdolg/img/icon16.png" title="Select with ColorPick Eyedropper - See advanced option: &quot;Add ColorPick Eyedropper near input[type=color] fields on websites&quot;" class="colorpick-eyedropper-input-trigger"><input type="color" class="form-control" id="favcolor" name="favcolor" colorpick-eyedropper-active="true">
                        </div>
                    </div>
                </div>
                <div class="tab_footer d-flex flex-row align-items-center justify-content-center  ">
                    <button type="submit" name="submitTeam" class="rc-btn submit-button">Create Team</button>
                </div>
            </form>
        </div> 
    </div>
</div>
@endsection