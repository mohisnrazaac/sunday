@extends('layouts.admin')


@section("content")
<div class="modal fade show" id="createSessionModal" tabindex="-1" role="dialog"
    aria-labelledby="createSessionModalLabel" aria-hidden="true" style="display:block;">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" style="margin-right: auto;" id="createSessionModalLabel">
                    <b>{{ __("Curriculum Form") }}</b></h4>
                <x-BackButton />
            </div>
            <div class="modal-body">
                @if(isset($term))
                    <form class="user" method="POST" action="{{ route('term.update' , $term->id) }}">                    
                     @method('patch')
                @else
                    <form class="user" method="POST" action="{{ route('term.store') }}">
                @endif
                
                    @csrf
                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <input name="title" type="text" class="form-control form-control-user" id="title"
                                placeholder="Title" value="{{ $term->title ?? '' }}">
                            @error('title')
                                <span class="invalid-feedback" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror    
                        </div>
                        <div class="col-sm-6">
                            <input name="image" type="text" class="form-control form-control-user" id="image"
                                placeholder="Image" value="{{ $term->image ?? '' }}">
                            @error('image')
                                <span class="invalid-feedback" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                    </div>
                    
                    
                    @livewire('forms.department-course-drop-down', [
                        'department_id' => $term->department_id ?? null ,
                        'course_id' => $term->course_id ?? null
                    ])


                    <div class="form-group">
                        <textarea name="description" type="text" class="form-control form-control-user editor" id="description"
                            placeholder="Description">{{ $term->description ?? '' }}</textarea>
                        @error('description')
                            <span class="invalid-feedback" role="alert">
                                {{ $message }}
                            </span>
                        @enderror
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
