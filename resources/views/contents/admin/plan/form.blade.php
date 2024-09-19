@extends('layouts.admin')


@section("content")




<div class="modal fade show" style="display:block;">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" style="margin-right: auto;"><b>{{ __("plan Form") }}</b></h4>
            </div>
            <div class="modal-body">
                    @if(isset($plan))
                    <form class="user" method="POST" action="{{ route('plan.update' , $plan->id) }}">                    
                     @method('patch')
                    @else
                        <form class="user" method="POST" action="{{ route('plan.store') }}">
                    @endif
                    
                        @csrf
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input name="title" type="text" class="form-control form-control-user" id="title"
                                    placeholder="Title" value="{{ $plan->title ?? '' }}">                            
                            </div>
                            <div class="col-sm-6">
                                <input name="validDaysForUse" type="number" class="form-control form-control-user" id="validDaysForUse"
                                    placeholder="validDaysForUse" value="{{ $plan->validDaysForUse ?? '' }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input name="price" type="number" class="form-control form-control-user" id="price"
                                placeholder="price" value="{{ $plan->price ?? '' }}">
                            </div>
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input name="discount" type="number" class="form-control form-control-user" id="discount"
                                placeholder="discount" value="{{ $plan->discount ?? '' }}">
                            </div>
                           
                        </div>
                        <div class="form-group">
                            <textarea name="description" type="text" class="form-control editor" id="description"
                                placeholder="Description">{{ $plan->description ?? '' }}</textarea>
    
                        </div>
       
                   
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary btn-user btn-block"
                                value="{{ __('Save') }}">
                        </div>
                    </form>
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
