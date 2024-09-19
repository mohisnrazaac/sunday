@extends('layouts.admin')


@section("content")



<div class="container px-4 mt-5 ">
    <h1 class="homeHeading mt-5"><strong>@lang('Question')</strong></h1>
    <div class="main-container">
        <span class="cyber_range_heading_bg">
            <span class="primary-color">
            Question
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
                                @can('question.create')
                                <x-CreateButton path="{{ route('question.create') }}" />
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
                        <th scope="col">{{ __("Type") }}</th>
                        
                        @if(Auth::user()->hasRole('Super-Admin') || Auth::user()->hasRole('Super-Admin') || Auth::user()->hasAnyPermission(['question.edit' , 'question.delete']))
                        <th scope="col">{{ __("Action") }}</th>
                        @endif
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($questions as $question)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>
                                    {{ $question->title }} 
                                </td>
                                <td>
                                    {{ $question->QuestionType->title }} 
                                </td>
                            

                                @if(Auth::user()->hasRole('Super-Admin') 
                                || Auth::user()->hasRole('Super-Admin') 
                                || Auth::user()->hasAnyPermission(['question.edit' , 'question.delete']))
                                <td>
                                    <div class="btn-group" role="group" aria-label="{{ __("Action Buttons ") }}">
                                        @can('question.edit')
                                            <x-EditButton itemId="{{ $question->id }}" path="question.edit" />
                                        @endcan
                                        @can('question.delete')
                                            <x-DeleteButton itemId="{{ $question->id }}" path="question.destroy" />                                    
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
                    {!! $questions->links() !!}
                </div>
            </div>
        </div>
        </div>
        
    </div>
</div>


@endsection
