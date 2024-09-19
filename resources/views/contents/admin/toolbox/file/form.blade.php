@extends('layouts.admin')


@section("content")






<div class="modal fade show" id="createSessionModal" tabindex="-1" role="dialog"
    aria-labelledby="createSessionModalLabel" aria-hidden="true" style="display:block;">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" style="margin-right: auto;" id="createSessionModalLabel">
                    <b>{{ __("Create New file") }}</b></h4>
                <x-BackButton />
            </div>
            <div class="modal-body">
                @if(isset($file))
                <form class="user" method="POST"
                    action="{{ route('file.update' , $file->id) }}"
                    enctype="multipart/form-data">
                    @method('patch')
                @else
                <form class="user" method="POST" action="{{ route('file.store') }}" enctype="multipart/form-data">
                @endif
                    @csrf
                    <div class="row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <div class="form-group">
                                <label for="title">{{ __('Video Title') }}</label>
                                <input name="title" type="text" class="form-control form-control-user" id="title"
                                    placeholder="title" value="{{ $file->title ?? '' }}">
                            </div>
                            <div class="form-group">
                                <label for="description">{{ __('Video Link') }}</label>
                                <input name="description" type="text" class="form-control form-control-user"
                                    id="description" placeholder="description"
                                    value="{{ $file->description ?? '' }}">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label>{{ __('File') }}</label>
                            @livewire('services.media.uploadable',[
                                'file' => $file->file ?? '',
                                'path' => 'files',
                                'target' => 'files'
                                ])
                        </div>
                    </div>
                    <div class="row mb-5">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <div class="form-group">
                                <label for="title">{{ __('Course Name') }}</label>
                                <select name="course_id" class="form-select">
                                    @if(isset($course))@foreach($course as $varCourse)
                                        <option value="{{ $varCourse->id }}">
                                            {{ $varCourse->title }}
                                        </option>
                                    @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn save">{{ __('Save') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<script>
    $(document).ready(function () {
        $('#createSessionModal').modal('show');
    });

</script>

@endsection
