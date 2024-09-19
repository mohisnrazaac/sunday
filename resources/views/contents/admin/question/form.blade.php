@extends('layouts.admin')


@section("content")


<div class="modal fade show" style="display:block;">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" style="margin-right: auto;"><b>{{ __("Create New questions") }}</b></h4>
            </div>
            <div class="modal-body">
                    <div class="form-group row">
                        @livewire('factory.render', [
                        'question' => $question ?? null,
                        'quiz' => $quiz ?? null
                        ])
                    </div>
                    <div class="modal-footer">
                        <x-BackButton />
                    </div>
                </form>
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
