@extends('layouts.admin')


@section("content")


<div class="container px-4 mt-5 ">
    <h1 class="homeHeading mt-5"><strong>@lang('Sections')</strong></h1>
    <div class="main-container">
        <span class="cyber_range_heading_bg">
            <span class="primary-color">
            Sections
            </span>
        </span>
    </div>
    <div class="main_announcement container px-0">
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
                                @can('session.create')
                                <x-CreateButton path="{{ route('session.create') }}" />
                                @endcan
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">


                    <table id="rc_table" class="table table-striped nowrap dataTable no-footer" style="width:100%" aria-describedby="rc_table_info">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">{{ __("Title") }}</th>
                                @if(Auth::user()->hasRole('Super-Admin') || Auth::user()->hasRole('Super-Admin') || Auth::user()->hasAnyPermission(['session.edit' , 'session.delete']))
                                <th scope="col">{{ __("Action") }}</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($sessions as $session)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $session->title }}</td>
         

                                <td>
                                    <div class="dropdown no-arrow">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink" style="">
                                            <div class="dropdown-header">{{ __('Actions') }}:</div>
                                            @if(Auth::user()->hasRole('Super-Admin')
                                            || Auth::user()->hasRole('Super-Admin')
                                            || Auth::user()->hasAnyPermission(['rubric.edit' , 'rubric.delete']))

                                            @can('session.edit')
                                            <x-EditButton itemId="{{ $session->id }}" path="session.edit" />
                                            @endcan
                                            @can('session.delete')
                                            <x-DeleteButton itemId="{{ $session->id }}" path="rubric.destroy" />
                                            @endcan
                                            @can('session.show')
                                            <x-buttons.show itemId="{{ $session->id }}" path="session.show" />
                                            @endcan

                                            @endif
                                        </div>
                                    </div>

                                </td>

                               
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
                        {!! $sessions->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>


    @endsection
