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
<<<<<<< HEAD
            <div class="container my-4">
              <h2>Content</h2>
              <p>{{$contentdetails[0]->title}}</p>
              <p>{{$contentdetails[0]->description}}</p>
              @if($contentdetails[0]->video)
                    <div class="row my-4" style="width: fit-content; margin: 0px auto; border: 1px solid #1CE5DF; background: black;">
                        <video width="640" height="360" controls class="embed-responsive-item">
                            <source src="{{ url($contentdetails[0]->video) }}" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                    </div>
              @endif

                @if($contentdetails[0]->fileattachment)
  
                <div class="st_card_heading row text-end p-4 my-4" style="margin: 0px auto;"> 
                    <div class="col-8 text-start align-content-center h5 homeHeading">
                        Download file name
                    </div>
                    <div class="col-4">
                        <a href="{{ url($contentdetails[0]->fileattachment) }}" download="{{$contentdetails[0]->fileattachment}}" class="quiz-btns btn">
                            <i class="fa-solid fa-download"></i> Download Word Document
                        </a>
                    </div>
                </div>
@endif
            @if($contentdetails[0]->videoposter)  <div class="row my-4" style="width: fit-content; margin: 0px auto; border: 1px solid #1CE5DF; background: black;"> <img class="embed-responsive-item" src="{{$contentdetails[0]->videoposter}}" allowfullscreen /></div>@endif
            @if($contentdetails[0]->externalurl)   <div class="row my-4" style="width: fit-content; margin: 0px auto; border: 1px solid #1CE5DF; background: black;"><video width="640" height="360" controls class="embed-responsive-item"><source src="{{$contentdetails[0]->externalurl}}" type="video/mp4"></video></div>@endif
            @if($contentdetails[0]->youtube)  <div class="row my-4" style="width: fit-content; margin: 0px auto; border: 1px solid #1CE5DF; background: black;"><video width="640" height="360" controls class="embed-responsive-item"><source src="{{$contentdetails[0]->youtube}}" type="video/mp4"></video></div>@endif
            @if($contentdetails[0]->vimeo)   <div class="row my-4" style="width: fit-content; margin: 0px auto; border: 1px solid #1CE5DF; background: black;"><video width="640" height="360" controls class="embed-responsive-item"><source src="{{$contentdetails[0]->vimeo}}" type="video/mp4"></video></div>@endif
          </div>
      </div>
    </div>
=======
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
>>>>>>> main
</div>
@endsection
