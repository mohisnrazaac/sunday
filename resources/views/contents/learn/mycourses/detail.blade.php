@extends('layouts.admin')


@section("content")

<div class="homeBorder p-4 mb-5">
  <div class="d-flex justify-content-between mb-4">
      <div class="col">
          <h1 class="h5 homeHeading"><strong>Course Detail Page</strong></h1>
      </div>
      <div class="col text-end">
          <i class="fa-solid fa-maximize iconColor"></i>
          <i class="fa-regular fa-circle-question iconColor mx-1"></i>
          <i class="fa-solid fa-gear iconColor"></i>
      </div>
  </div>

  <div class="row">
      <div class="col-3 course_detail_content_menu">
          <div id="courseDetailSection" class="row mt-3 course-outer-card about-content">
              <div class="accordion" id="courseAccordion">
                @foreach($sections as $sec)
                  <div class="accordion-item">
                      <h2 class="accordion-header" id="headingOne">
                          <button class="accordion-button fw-bold" type="button" data-bs-toggle="collapse"
                              data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                              <i class="fa-regular fa-circle"></i> {{$sec->sectiontitle}}
                          </button>
                      </h2>
                     

                      @php
                   
                   $chapter=DB::table('terms')
        ->select('terms.id as chapter_id','terms.title as chapter','terms.totaltime as totaltime')
        ->where('terms.section_id', $sec->section_id)->get();
                    
                      @endphp
                        @foreach($chapter as $chap)	
                            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                                data-bs-parent="#courseAccordion">
                                <div class="accordion-body course_detail_accordion_body">
                                    <div id="courseDetailSection" class="row course-outer-card content-content">
                                        <div class='card cursor-pointer col-12'>
                                            <div class='card-body text-start row'>
                                                <div class='col-12'>
                                                    <i class='fa-regular fa-circle-check'></i><a href="{{ URL::to('/learn/my/coursedetails/')}}/{{$course_id}}/{{$chap->chapter_id}}"> <span class='text-secondary'>{{$chap->chapter}}</span></a>
                                                    <br>
                                                    <small class='float-end ms-4 text-end text-secondary'><i class='fa-regular fa-clock'></i> time </small>
                                                    <small class='float-start mr-4 text-end text-secondary'><i class='fa-solid fa-video'></i> {{$chap->totaltime}}</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    
                      @endforeach
                    
                  </div>
                  @endforeach
                 
                
                  </div>
              </div>
          </div>
          <div class="col-9 course_detail_content_column">
              <h2>Content</h2>
              <p>{{$contentdetails[0]->title}}</p>
              <p>{{$contentdetails[0]->description}}</p>
              <video width="640" height="360" controls>
                @if($contentdetails[0]->video)
                <source src="{{ url($contentdetails[0]->video) }}" type="video/mp4">
  Your browser does not support the video tag.
</video>
                @endif

                @if($contentdetails[0]->fileattachment)
  
                <a href="{{ url($contentdetails[0]->fileattachment) }}" download="{{$contentdetails[0]->fileattachment}}">
    Download Word Document
</a>
@endif
            @if($contentdetails[0]->videoposter)  <p> <iframe class="embed-responsive-item" src="{{$contentdetails[0]->videoposter}}" allowfullscreen></iframe></p>@endif
            @if($contentdetails[0]->externalurl)   <p><iframe class="embed-responsive-item" src="{{$contentdetails[0]->externalurl}}" allowfullscreen></iframe></p>@endif
            @if($contentdetails[0]->youtube)  <p><iframe class="embed-responsive-item" src="{{$contentdetails[0]->youtube}}" allowfullscreen></iframe></p>@endif
            @if($contentdetails[0]->vimeo)   <p><iframe class="embed-responsive-item" src="{{$contentdetails[0]->vimeo}}" allowfullscreen></iframe></p>@endif
          </div>
      </div>
</div>
@endsection
