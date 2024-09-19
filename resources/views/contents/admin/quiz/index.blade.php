@extends('layouts.admin')


@section("content")



<div class="container px-4 mt-5 ">
    <h1 class="homeHeading mt-5"><strong>@lang('Quiz List')</strong></h1>
    <div class="main-container">
        <span class="cyber_range_heading_bg">
            <span class="primary-color">
            Quiz List
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
                                <div class="dropdown-header">{{ __('Managment') }}</div>
                                <a class="dropdown-item" href="{{ route('quiz.create') }}">{{ __("New") }}</a>
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
                                <th scope="col">{{ __("Mentor") }}</th>
                                <th scope="col">{{ __("attempt") }}</th>
                                <th scope="col">{{ __("duration") }}</th>
                                <th scope="col">{{ __("min_pass_score") }}</th>
                                <th scope="col">{{ __("theme") }}</th>

                                <th scope="col">{{ __("Shuffle") }}</th>
                            
                                @if(Auth::user()->hasRole('Super-Admin') || Auth::user()->hasRole('Super-Admin') || Auth::user()->hasAnyPermission(['quiz.edit' , 'quiz.delete']))
                                <th scope="col">{{ __("Action") }}</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($quizes as $quiz)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>
                                    <strong>{{ $quiz->title }}</strong>
                                </td>
                                <td>
                                    <x-CheckUnCheck isChecked="{{ $quiz->is_mentor }}" />
                                </td>
                                <td>
                                    <span class="badge badge-center rounded-pill bg-success text-white">
                                        {{ $quiz->attempt }}
                                    </span>
                                </td>
                                <td>
                                    @if($quiz->duration > 0)
                                    <span class="badge badge-center rounded-pill bg-info text-light">
                                        <small>{{ $quiz->duration }}</small>
                                    </span>
                                    @else
                                    <span class="badge badge-center rounded-pill bg-light">
                                        <label class="fa fa-ban "></label>
                                    </span>
                                    @endif
                                </td>
                                <td>
                                    <span class="badge badge-center rounded-pill bg-label-danger">
                                        {{ $quiz->min_pass_score }}
                                    </span>
                                </td>
                                <td>
                                    {{ $quiz->show_question }}
                                </td>


                                <td>
                                    <x-CheckUnCheck isChecked="{{ $quiz->is_shuffle }}" />
                                </td>
                               
                                @if(Auth::user()->hasRole('Super-Admin')
                                || Auth::user()->hasRole('Super-Admin')
                                || Auth::user()->hasAnyPermission(['quiz.edit' , 'quiz.delete']))
                                <td>
                                    <div class="dropdown no-arrow">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink" style="">
                                            <div class="dropdown-header">{{ __('Actions') }}:</div>
                                            @can('quiz.edit')
                                            <x-EditButton itemId="{{ $quiz->id }}" path="quiz.edit" />
                                            @endcan
                                            @can('quiz.delete')
                                            <x-DeleteButton itemId="{{ $quiz->id }}" path="quiz.destroy" />
                                            
                                            @endcan
                                            <div class="dropdown-divider"></div>
                                            @can('quiz.show')
                                            <x-buttons.show itemId="{{ $quiz->id }}" path="quiz.show" text="Show Questions" />
                                            @endcan
                                        </div>
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
                        {!! $quizes->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    @endsection
