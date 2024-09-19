@extends('layouts.admin')


@section("content")



<div class="modal fade show" id="createSessionModal" tabindex="-1" role="dialog" aria-labelledby="createSessionModalLabel" aria-hidden="true" style="display:block;">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" style="margin-right: auto;"><b>{{ __("Create New Rubric") }}</b></h4>
            </div>
            <div class="modal-body">
                <div class="row mx-0 my-5">
                    <div class="col-12 mb-3">
                        @livewire('services.rubric', [
                            'rubric_id' => ($rubric->id ?? 0)
                        ])
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#createSessionModal').modal('show');
    });
</script>




@endsection
