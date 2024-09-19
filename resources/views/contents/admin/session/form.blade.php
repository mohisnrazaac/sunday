@extends('layouts.admin')


@section("content")

<div class="modal fade show" id="createSessionModal" tabindex="-1" role="dialog" aria-labelledby="createSessionModalLabel" aria-hidden="true" style="display:block;">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" style="margin-right: auto;" id="createSessionModalLabel"><b>{{ isset($session) ? 'Edit Session' : 'Create New Session' }}</b></h4>
            </div>
            <div class="modal-body">
                @if(isset($session))
                    <form class="user" method="POST" action="{{ route('session.update', $session->id) }}">                    
                        @method('patch')
                @else
                    <form class="user" method="POST" action="{{ route('session.store') }}">
                @endif
                    @csrf
                    <div class="row mx-0 my-5">
                        <div class="col-12 mb-3">
                            <h6>Title*</h6>
                            <input name="title" type="text" class="form-control form-control-user" id="title" placeholder="Title" value="{{ $session->title ?? '' }}">
                            @error('title')
                                <span class="invalid-feedback" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror 
                        </div>
                    </div>
                    <div class="modal-footer">
                        <x-BackButton />
                        <button type="submit" class="btn save">{{ __('Save') }}</button>
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
