@extends('layouts.admin')

@section("content")
<div class="container px-4 mt-5 ">
    <div class="main  px-2 ">
        <div class="d-flex justify-content-between mb-4">
            <div class="col">
                <h1 class="homeHeading"><strong>@lang('Team Management')</strong></h1>
            </div>
        </div>
    </div>
    {{-- <h1 class="h5 homeHeading mt-5"><strong>@lang('Team Management')</strong></h1> --}}
    <div class="main-container">
        <span class="cyber_range_heading_bg">
            {{ __('Team') }} / 
            <span class="primary-color">
            Team Management
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
                <div class="col-sm-12 col-md-6">
                </div>
            </div>
            <div class="d-flex">
                <div class="col-sm-12 table-responsive">
                    <table id="rc_table" class="table table-striped nowrap dataTable no-footer" style="width:100%"
                        aria-describedby="rc_table_info">
                        <thead>
                            <tr>
                                <th class="sorting" tabindex="0" aria-controls="rc_table" rowspan="1" colspan="1"
                                    aria-label="Teams: activate to sort column ascending" style="width: 199.016px;">
                                    {{ __("Teams") }}
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="rc_table" rowspan="1" colspan="1"
                                    aria-label="Color Date: activate to sort column ascending"
                                    style="width: 224.859px;">{{ __("Color") }}
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="rc_table" rowspan="1" colspan="1"
                                    aria-label="Code: activate to sort column ascending" style="width: 138.781px;">
                                    {{ __("Code") }}
                                </th>
                                @if(Auth::user()->hasRole('Super-Admin') || Auth::user()->hasAnyPermission(['course.edit' , 'course.delete']))
                                <th style="text-align: left; width: 495.266px; text-align:right" class="sorting" tabindex="0"
                                    aria-controls="rc_table" rowspan="1" colspan="1"
                                    aria-label="Action: activate to sort column ascending">{{ __("Action") }}
                                </th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="odd">
                                <td>team name</td>
                                <td><img style="min-width:16px;min-height:16px;box-sizing:unset;box-shadow:none;background:unset;padding:0 6px 0 0;cursor:pointer;" src="chrome-extension://ohcpnigalekghcmgcdcenkpelffpdolg/img/icon16.png" title="Select with ColorPick Eyedropper - See advanced option: &quot;Add ColorPick Eyedropper near input[type=color] fields on websites&quot;" class="colorpick-eyedropper-input-trigger"><input type="color" disabled="" value="#2196f3" colorpick-eyedropper-active="true"></td>
                                <td>
                                    KXNh6xH4ok73lGycfOLw
                                </td>
                                <td>
                                    <div class="d-flex flex-row-reverse">
                                        <button type="submit" class="btn mx-2 rc-btn btn_factory_reset" style="width: 185px; height: auto; font-weight:bold">
                                            ACTIVE
                                        </button>
                                        <a href="" class="mx-2 rc-btn button-danger" style="font-size: 15px; filter: hue-rotate(135deg);">EDIT</a>
                                    </div>
                                </td>
                            </tr>
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
</div>
@endsection


<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
<script>
    new DataTable('#rc_table');
    document.addEventListener('DOMContentLoaded', function () {
    const slider = document.querySelector('.table-responsive');

    let isDown = false;
    let startX;
    let scrollLeft;

    slider.addEventListener('mousedown', (e) => {
        isDown = true;
        slider.classList.add('active');
        startX = e.pageX - slider.offsetLeft;
        scrollLeft = slider.scrollLeft;
    });

    slider.addEventListener('mouseleave', () => {
        isDown = false;
        slider.classList.remove('active');
    });

    slider.addEventListener('mouseup', () => {
        isDown = false;
        slider.classList.remove('active');
    });

    slider.addEventListener('mousemove', (e) => {
        if (!isDown) return;  // Stop the function from running if the mouse is not down
        e.preventDefault();
        const x = e.pageX - slider.offsetLeft;
        const walk = (x - startX) * 2; // The multiplier (2) can be adjusted to make the scrolling faster or slower
        slider.scrollLeft = scrollLeft - walk;
    });
});


</script>