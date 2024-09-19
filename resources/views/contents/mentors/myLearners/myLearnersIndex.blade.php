@extends('layouts.admin')


@section("content")
<div class="row">

    <div class="col-12">
        <!-- Card Header - Dropdown -->
        <div class="main-container">
            <span class="cyber_range_heading_bg">
                <span class="primary-color">
                    My Learners
                </span>
            </span>
        </div>
        <!-- Card Body -->
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
                                <select name="rc_table_length" aria-controls="rc_table"
                                    class="form-select form-select-sm">
                                    <option value="10">10</option>
                                    <option value="25">25</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                </select>
                                entries
                            </label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <table id="rc_table" class="table table-striped nowrap dataTable no-footer" style="width:100%"
                            aria-describedby="rc_table_info">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">{{ __("name") }}</th>
                                    <th scope="col">{{ __("email") }}</th>


                                </tr>
                            </thead>
                            <tbody>
                                @forelse($participants as $participant)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            <a href="{{ route('learnerShowTerms', $participant->User->id) }}"
                                                class="btn btn-sm btn-primary btn-block">
                                                {{ $participant->User->name }}
                                            </a>
                                        </td>
                                        <td>{{ $participant->User->email }}</td>

                                    </tr>
                                @empty

                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-5">
                        <div class="dataTables_info" role="status" aria-live="polite">
                            {{ $participants->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
