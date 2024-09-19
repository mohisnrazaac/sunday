@extends('layouts.admin')


@section("content")

<!-- Create Form Card -->
<div class="col-12">
    <div class="card shadow mb-4 border-bottom-primary">
        <!-- Card Header - Dropdown -->
        <div
            class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">{{ __("Course Form") }}</h6>
            <div class="dropdown no-arrow">
                <x-BackButton />
            </div>
        </div>
        <!-- Card Body -->
        <div class="card-body">
            <div class="text-center">

                @if(isset($course))
                    <form class="user" method="POST" action="{{ route('course.update' , $course->id) }}">                    
                     @method('patch')
                @else
                    <form class="user" method="POST" action="{{ route('course.store') }}">
                @endif
                
                    @csrf
                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                        <label for="html">{{ __('Course Title') }}</label>
                            <input name="title" type="text" class="form-control form-control-user" id="title"
                                placeholder="Course Title" value="{{ $course->title ?? '' }}">
                            @error('title')
                                <span class="invalid-feedback" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror    
                        </div>
                        <div class="col-sm-6">
                        <label for="html">{{ __('Any Image') }}</label>
                            <input name="image" type="text" class="form-control form-control-user" id="image"
                                placeholder="Image" value="{{ $course->image ?? '' }}">
                            @error('image')
                                <span class="invalid-feedback" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                       
                        
                        <div class="col-sm-12 mb-3 mb-sm-0">
                        <label for="html">{{ __('Version') }}</label>
                        <select  name="ver_id" class="form-select">
                            @if(isset($version)) @foreach($version as $ver)
        <option value="{{ $ver->id }}" @if(isset($course)){{$ver->id==$course->ver_id ? 'selected="selected"' : ''}}
            @endif>
            {{ $ver->title }}
        </option>
    @endforeach
    @endif
</select>
                        </div>
                       
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                    
                        </div>
                        
                        <div class="col-sm-6 mb-3 mb-sm-0">
                        <label for="html">{{ __('Category') }}</label>
                           <x-forms.DropDown model="Department" name="department_id" selected="{{ $course->department_id ?? 0 }}" />
                        </div>
                       
                    </div>

                    <div class="form-group">
                    <label for="html">{{ __('Course Description') }}</label>
                        <textarea name="description" type="text" class="form-control editor" id="description"
                            placeholder="Description">{{$course->description ?? ''}}</textarea>
                        @error('description')
                            <span class="invalid-feedback" role="alert">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="html">{{ __('Short Description') }}</label>
                        <textarea name="course_short_desc" type="text" class="form-control editor" id="course_short_desc"
                            placeholder="Description">{{ $course->course_short_desc ?? '' }}</textarea>
                        @error('course_short_desc')
                            <span class="invalid-feedback" role="alert">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                    <label for="html">{{ __('Learning Purpose') }}</label>
                        <textarea name="learning_purpose" type="text" class="form-control editor" id="learning_purpose"
                            placeholder="Description">{{ $course->learning_purpose ?? '' }}</textarea>
                        @error('learning_purpose')
                            <span class="invalid-feedback" role="alert">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                    <label for="html">{{ __('Course Requirements') }}</label>
                        <textarea name="requirements" type="text" class="form-control editor" id="requirements"
                            placeholder="Description">{{ $course->requirements ?? '' }}</textarea>
                        @error('requirements')
                            <span class="invalid-feedback" role="alert">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>

                        <div class="form-group">

                        <label for="html">{{ __('Course Level') }}</label>
                            <select  name="course_level" class="form-select">
                               
                                <option value="Beginner" @if(isset($course))
                                {{$course->course_level=='Beginner' ? 'selected="selected"' : ''}}
                                @endif
                                >
                                Beginner
                                </option>
                                <option value="Intermediate" @if(isset($course))
                                {{$course->course_level=='Intermediate' ? 'selected="selected"' : ''}}
                                @endif>
                                Intermediate
                                </option>
                                <option value="Expert" @if(isset($course))
                                {{$course->course_level=='Expert' ? 'selected="selected"' : ''}}
                                @endif>
                                Expert
                                </option>
                               
                            </select>
                            </div>
                            <div class="form-group">
                            <label for="html">{{ __('Course Language') }}</label>
                                
                            <select  name="audio_lang" class="form-select">
                            @if(isset($get_lang)) @foreach($get_lang as $lang)
        <option value="{{ $lang->id }}" @if(isset($course)){{$lang->id==$course->audio_lang ? 'selected="selected"' : ''}}
            @endif>
            {{ $lang->title }}
        </option>
    @endforeach
    @endif
</select>
                        </div>

                       
                        <div class="form-group">
                        <label for="html">{{ __('Language Caption') }}</label>
                        <select  name="caption_lang" class="form-select">
                        @if(isset($get_lang_cap))@foreach($get_lang_cap as $caplang)
        <option value="{{$caplang->id}}" @if(isset($course)){{$lang->id==$course->caption_lang ? 'selected="selected"' : ''}}
            @endif>
            {{$caplang->title}}
        </option>
    @endforeach
    @endif
</select>
                        </div>

                        <!-- Div Tab price -->
                        <!-- Tab links -->
                        <div class="title-icon">
												<h3 class="title"><i class="uil uil-usd-square"></i>Price</h3>
											</div>
<div class="tab">
<div id="Div1"><a href="javascript:" onclick="switchVisible();" class="btn btn-primary">Free</a>
<div class="price-require-dt">
																			<div class="cogs-toggle center_d">
																				<label class="switch">
																					<input type="checkbox" name="require_login" id="require_login" value="1">
																					<span></span>
																				</label>
																				<label for="require_login" class="lbl-quiz">Require Log In</label>
																			</div>
																			<div class="cogs-toggle center_d mt-3">
																				<label class="switch">
																					<input type="checkbox" name="require_enroll" id="require_enroll" value="1">
																					<span></span>
																				</label>
																				<label for="require_enroll" class="lbl-quiz">Require Enroll</label>
																			</div>
																			<p>If the course is free, if student require to enroll your course, if not required enroll, if students required sign in to your website to take this course.</p>
																		</div>
</div></div>
    

<div id="Div2" style="display: none;">
<a href="javascript:" onclick="switchVisible();" class="btn btn-primary">Paid</a>
<div class="license_pricing mt-30">
																			<label class="label25">Regular Price*</label>
																			<div class="row">
																				<div class="col-lg-4 col-md-6 col-sm-6">
																					<div class="loc_group">
																						<div class="ui left icon input swdh19">
																							<input class="prompt srch_explore" type="text" placeholder="$0" name="regular_price" id="regular_price" value="">															
																						</div>
																						<span class="slry-dt">USD</span>
																					</div>
																				</div>
																			</div>																		
																		</div>
																		<div class="license_pricing mt-30 mb-30">
																			<label class="label25">Discount Price*</label>
																			<div class="row">
																				<div class="col-lg-4 col-md-6 col-sm-6">
																					<div class="loc_group">
																						<div class="ui left icon input swdh19">
																							<input class="prompt srch_explore" type="text" placeholder="$0" name="discount_price" id="discount_price" value="">															
																						</div>
																						<span class="slry-dt">USD</span>
																					</div>
																				</div>
																			</div>																		
																		</div>
</div>

</div>
   
  
</div>

<!-- Tab content -->

  

                        <!-- Div Tab price -->

                      





                    
   
                    
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary btn-user btn-block"
                            value="{{ __('Save') }}">
                    </div>
                </form>


            </div>
        </div>
    </div>
</div>

<livewire:wizard />

<script>
        function switchVisible() {
            const div1 = document.getElementById('Div1');
            const div2 = document.getElementById('Div2');

            if (div1.style.display === 'block') {
                div1.style.display = 'none';
                div2.style.display = 'block';
            } else {
                div1.style.display = 'block';
                div2.style.display = 'none';
            }
        }
    </script>
@endsection