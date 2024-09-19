jQuery(function(){
    $('.delete-item').submit(function(e){
        if(!confirm('Are you sure to delete this item?')){
            e.preventDefault();
            return false;
        }
    });

    //course adding

    var form = '#msform';

    $(form).on('submit', function(event){
        event.preventDefault();
        //alert("mica");

        var url = $(this).attr('data-action');
        //alert($('meta[name="csrf-token"]').attr('content'));

        var frmData = new FormData(this);
      

      
       

        $.ajax({
            url: url, // the endpoint
            type: 'POST', // http method
            data: frmData,
            contentType: false,
            processData: false, 
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            beforeSend: function() {
                // Show the loader before sending the request
                $('#sectionModal').modal('hide');
                $('#loader').show();
            },
            success: function(response) {
                // handle success
                $("#last_course_id").val(response);
                //alert("Section Saved!!");
              //  console.log(response);
              document.querySelector('.btn.exit').click();
            },
            error: function(xhr) {
                // handle error
                console.log(xhr.responseText);
            },
            complete: function() {
                // Hide the loader after request is complete (both success and error)
                $('#loader').hide();
            }
        });
        
    });

    //end of course adding


    //single choice form
    var form = '#savesinglechoice';

    $(form).on('submit', function(event){
        event.preventDefault();
      

        var url = $(this).attr('data-action');
        //alert($('meta[name="csrf-token"]').attr('content'));

        var frmData = new FormData(this);
        frmData.append('last_quize_id',$('#last_quize_id').val());

      
       

        $.ajax({
            url: url, // the endpoint
            type: 'POST', // http method
            data: frmData,
            contentType: false,
            processData: false, 
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                // handle success
               // console.log(response);
               if(response==true)
                {
                   // alert("Questions Saved");
                }


            },
            error: function(xhr) {
                // handle error
                console.log(xhr.responseText);
                alert("Something wrong occured");
            }
        });
        
    });
    //end of single choice form


    


    var form = '#sectiofrm';

    $(form).on('submit', function(event){
        event.preventDefault();
        //alert("mica");

        var url = $(this).attr('data-action');
        //alert($('meta[name="csrf-token"]').attr('content'));

      
       

        $.ajax({
            url: url, // the endpoint
            type: 'POST', // http method
            data: {
                '_token': $('meta[name="csrf-token"]').attr('content'),
                title: $('#sectiontitle').val() ,
                last_course_id:$('#last_course_id').val()// data you are sending
            },
            success: function(response) {
                // handle success
                $("#last_section_id").val(response);
               // alert("Section Saved!!");
                setTimeout(function() {
                    getallsectionbycourse();
                    document.querySelector('.btn.exit').click();
                    $('#sectionModal').modal('hide');
                    $('#sectiontitle').val('');
                    
                }, 2000); // 2-second delay
               
               
               // console.log(response);
            },
            error: function(xhr) {
                // handle error
                console.log(xhr.responseText);
            }
        });
        
    });

    

  function getallsectionbycourse()
  {
    $.ajax({
        url: $('#actionUrl').val(), // the endpoint
        type: 'POST', // http method
        data: {
            '_token': $('meta[name="csrf-token"]').attr('content'),
            title: $('#sectiontitle').val() ,
            courseid:$('#last_course_id').val()// data you are sending
        },
        success: function(response) {
            // handle success
            $('#cirriculamdiv').html(response);
          //  alert("Section Saved!!");
            console.log(response);
        },
        error: function(xhr) {
            // handle error
            console.log(xhr.responseText);
        }
    });
  }


    var form = '#quizform';

    $(form).on('submit', function(event){
        event.preventDefault();
        //alert("mica");

        var url = $(this).attr('data-action');
        //alert($('meta[name="csrf-token"]').attr('content'));

        var frmData = new FormData(this);
        frmData.append('last_section_id',$('#last_section_id').val());
        frmData.append('last_course_id',$('#last_course_id').val());
       

      
       

        $.ajax({
            url: url, // the endpoint
            type: 'POST', // http method
            data: frmData,
            contentType: false,
            processData: false, 
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                $("#last_quize_id").val(response);
                $("#messagediv").show();
                //alert("Quiz Saved!! Please add questions");
                setTimeout(function() {
                    $("#messagediv").hide();
                    getallsectionbycourse();
                }, 2000); // 2-second delay
                // handle success
                console.log(response);
            },
            error: function(xhr) {
                // handle error
                console.log(xhr.responseText);
            }
        });
        
    });

    var form = '#savemultichoiceform';

    $(form).on('submit', function(event){
        event.preventDefault();
        //alert("mica");

        var url = $(this).attr('data-action');
        //alert($('meta[name="csrf-token"]').attr('content'));

        var frmData = new FormData(this);
        frmData.append('last_quize_id',$('#last_quize_id').val());

      
       

        $.ajax({
            url: url, // the endpoint
            type: 'POST', // http method
            data: frmData,
            contentType: false,
            processData: false, 
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                // handle success
               // console.log(response);
               if(response==true)
                {
                    alert("Questions Saved");
                }


            },
            error: function(xhr) {
                // handle error
                console.log(xhr.responseText);
                alert("Something wrong occured");
            }
        });
        
    });


    


    var form = '#coursemedia';

    $(form).on('submit', function(event){
        event.preventDefault();
        //alert("mica");

        var url = $(this).attr('data-action');
        //alert($('meta[name="csrf-token"]').attr('content'));

        var frmData = new FormData(this);
        frmData.append('last_course_id',$('#last_course_id').val());
       

        $.ajax({
            url: url, // the endpoint
            type: 'POST', // http method
            data: frmData,
            contentType: false,
            processData: false, 
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                // handle success
               // console.log(response);
               if(response==true)
                {
                    alert("Questions Saved");
                }


            },
            error: function(xhr) {
                // handle error
                console.log(xhr.responseText);
                alert("Something wrong occured");
            }
        });
        
    });


    
})


/* function lectureForm() {
    alert("mica");
    
    var formData = new FormData($('#lecturefrm')[0]);
    var url = $(this).attr('data-action');

    $.ajax({
        url: url,  // Adjust this URL to your route
        type: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(response) {
            alert('Form submitted successfully');
            console.log(response);
        },
        error: function(response) {
            alert('Error in form submission');
            console.log(response);
        }
    });
} */



    
//jQuery time
var current_fs, next_fs, previous_fs; //fieldsets
var left, opacity, scale; //fieldset properties which we will animate
var animating; //flag to prevent quick multi-click glitches

$(".next").click(function(){
	if(animating) return false;
	animating = true;
	
	current_fs = $(this).closest(".fieldset");
	next_fs = $(this).closest(".fieldset").next();
	
	//activate next step on progressbar using the index of next_fs
	$("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");
	
	//show the next fieldset
	next_fs.show(); 
	//hide the current fieldset with style
	current_fs.animate({opacity: 0}, {
		step: function(now, mx) {
			//as the opacity of current_fs reduces to 0 - stored in "now"
			//1. scale current_fs down to 80%
			scale = 1 - (1 - now) * 0.2;
			//2. bring next_fs from the right(50%)
			left = (now * 50)+"%";
			//3. increase opacity of next_fs to 1 as it moves in
			opacity = 1 - now;
			current_fs.css({
			'transform': 'scale('+scale+')',
			'position': 'absolute',
			'width': '100%'
		});
			next_fs.css({'left': left, 'opacity': opacity});
		}, 
		duration: 800, 
		complete: function(){
			current_fs.hide();
			animating = false;
		}, 
		//this comes from the custom easing plugin
		easing: 'easeInOutBack'
	});
	// Scroll to the top of the page
    $("html, body").animate({ scrollTop: 0 }, "slow");
});

$(".previous").click(function(){
	if(animating) return false;
	animating = true;
	
	current_fs = $(this).closest(".fieldset");
	previous_fs = $(this).closest(".fieldset").prev();
	
	//de-activate current step on progressbar
	$("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");
	
	//show the previous fieldset
	previous_fs.show(); 
	//hide the current fieldset with style
	current_fs.animate({opacity: 0}, {
		step: function(now, mx) {
			//as the opacity of current_fs reduces to 0 - stored in "now"
			//1. scale previous_fs from 80% to 100%
			scale = 0.8 + (1 - now) * 0.2;
			//2. take current_fs to the right(50%) - from 0%
			left = ((1-now) * 50)+"%";
			//3. increase opacity of previous_fs to 1 as it moves in
			opacity = 1 - now;
			current_fs.css({'left': left});
			previous_fs.css({'transform': 'scale('+scale+')', 'opacity': opacity, 'width': '100%'});
		}, 
		duration: 800, 
		complete: function(){
			current_fs.hide();
			animating = false;
		}, 
		//this comes from the custom easing plugin
		easing: 'easeInOutBack'
	});
	// Scroll to the top of the page
    $("html, body").animate({ scrollTop: 0 }, "slow");
});

// $(".submit").click(function(){
// 	return false;
// })

// Appending activities
$(document).ready(function() {
	// Function to get saved content from localStorage
	function getSavedContent() {
		return JSON.parse(localStorage.getItem('content')) || [];
	  }
	
	  // Function to save content to localStorage
	  function saveContent(content) {
		localStorage.setItem('content', JSON.stringify(content));
	  }
	
	  // Function to append content to the specific target row
	  function appendContent(html) {
		$(".target-row").append(html);
	  }
	
	  // Function to initialize the page with saved content
	  function initializeContent() {
		const savedContent = getSavedContent();
		savedContent.forEach(html => appendContent(html));
	  }
	
	  // Functions to create HTML for different types of content
	  function createLectureHtml() {
		return `<div class="card cursor-pointer mx-3 mb-2">
				  <div class="card-body text-left">
					<i class="fa-solid fa-file-lines color-cyan-2"></i> <span>Lecture Title</span>
				  </div>
				</div>`;
	  }
	
	  function createQuizHtml() {
		return `<div class="card cursor-pointer mx-3 mb-2">
				  <div class="card-body text-left">
					<i class="fa-solid fa-bars-staggered color-cyan-2"></i> <span>Quiz</span>
				  </div>
				</div>`;
	  }
	
	  function createAssignmentHtml() {
		return `<div class="card cursor-pointer mx-3 mb-2">
				  <div class="card-body text-left">
					<i class="fa-regular fa-clipboard color-cyan-2"></i> <span>Assignment</span>
				  </div>
				</div>`;
	  }
	
	  // Event listener for the "Add Lecture" button
	  $('#lectureModal').on('click', '.save.lecture', function() {
		const newContent = createLectureHtml(); // or createQuizHtml() / createAssignmentHtml() based on your logic
		appendContent(newContent);
	
		// Save the new content to localStorage
		const savedContent = getSavedContent();
		savedContent.push(newContent);
		saveContent(savedContent);
	
		// Close the modal
		$('#lectureModal').modal('hide');
	  });
	  // Event listener for the "Add Quiz" button
	  $('#quizModal').on('click', '.save.quiz', function() {
		const newContent = createQuizHtml(); // or createQuizHtml() / createAssignmentHtml() based on your logic
		appendContent(newContent);
	
		// Save the new content to localStorage
		const savedContent = getSavedContent();
		savedContent.push(newContent);
		saveContent(savedContent);
	
		// Close the modal
		$('#quizModal').modal('hide');
	  });
	  // Event listener for the "Add Assignment" button
	  $('#assignModal').on('click', '.save.assignment', function() {
		const newContent = createAssignmentHtml(); // or createQuizHtml() / createAssignmentHtml() based on your logic
		appendContent(newContent);
	
		// Save the new content to localStorage
		const savedContent = getSavedContent();
		savedContent.push(newContent);
		saveContent(savedContent);
	
		// Close the modal
		$('#assignModal').modal('hide');
	  });

	// Event listeners for the icons
	$(".lecture:contains('Lecture')").click(function() {
	  const lectureHtml = createLectureHtml();
	  appendContent(lectureHtml);
	  const savedContent = getSavedContent();
	  savedContent.push(lectureHtml);
	  saveContent(savedContent);
	});

	$(".quiz:contains('Quiz')").click(function() {
	  const quizHtml = createQuizHtml();
	  appendContent(quizHtml);
	  const savedContent = getSavedContent();
	  savedContent.push(quizHtml);
	  saveContent(savedContent);
	});

	$(".assignment:contains('Assignment')").click(function() {
	  const assignmentHtml = createAssignmentHtml();
	  appendContent(assignmentHtml);
	  const savedContent = getSavedContent();
	  savedContent.push(assignmentHtml);
	  saveContent(savedContent);
	});

	// Initialize the page with saved content on load
	initializeContent();
  });

//   radio button content change for lecture video modal window
$(document).ready(function() {
    function updateContent() {
        if ($('#html-outlined').is(':checked')) {
          $('#radioContent').html('<div class="row mx-0 my-5"><div class="col-6 mb-3"><h6>Video Upload</h6><input class="custom-inner-style form-control" type="file" name="videoAttachment" id="videoAttachment"><p style="font-size: 12px;">File Format: .mp4</p></div><div class="col-6 mb-3"><h6>Video Poster Upload</h6><input class="custom-inner-style form-control" type="file" name="videoposter" id="videoposter"><p style="font-size: 12px;">Size: 590x300 pixels. Supports: jpg,jpeg, or png</p></div></div>');
        } else if ($('#url-outlined').is(':checked')) {
            $('#radioContent').html('<div class="row mx-0 my-5"><div class="col"><h6>External URL*</h6><input type="text" id="externalurllec" class="form-control custom-inner-style mb-5" placeholder="External URL" name="externalurllec"><h6>Video Runtime - hh:mm:ss**</h6><input type="time" class="form-control custom-inner-style" id="externalurlTime" name="externalurlTime" value="10:05 AM" /></div></div>');
        } else if ($('#youtube-outlined').is(':checked')) {
          $('#radioContent').html('<div class="row mx-0 my-5"><div class="col"><h6>Youtube URL*</h6><input type="text" class="form-control custom-inner-style mb-5" placeholder="Youtube Video URL" name="youtubeurllec" id="youtubeurllec"><h6>Video Runtime - hh:mm:ss**</h6><input type="time" class="form-control custom-inner-style" id="youtubeurlTime" name="youtubeurlTime" value="10:05 AM" /></div></div>');
        } else if ($('#vimeo-outlined').is(':checked')) {
          $('#radioContent').html('<div class="row mx-0 my-5"><div class="col"><h6>Vimeo URL*</h6><input type="text" class="form-control custom-inner-style mb-5" placeholder="Vimeo Video URL" name="vimeourllec" id="vimeourllec"><h6>Video Runtime - hh:mm:ss**</h6><input type="time" class="form-control custom-inner-style" value="10:05 AM" id="vimeourlTime" name="vimeourlTime" /></div></div>');
        } else if ($('#embeded-outlined').is(':checked')) {
          $('#radioContent').html('<div class="row mx-0 my-5"><div class="col"><h6>Embedded Code*</h6><input type="text" class="form-control custom-inner-style mb-5" placeholder="Place your embedded code here" name="embeddedurllec" id="embeddedurllec"><h6>Video Runtime - hh:mm:ss**</h6><input type="time" class="form-control custom-inner-style" value="10:05 AM" id="embeddedurlTime" name="embeddedurlTime" /></div></div>');
        }
      }

    // Initial content update
    updateContent();

    // Add event listener for change event on radio buttons
    $('input[name="options-outlined"]').change(updateContent);
  });

  //   radio button content change for Question modal window
  $(document).ready(function() {
    let uniqueIdCounter = 0;

    function generateUniqueId() {
        uniqueIdCounter += 1;
        return `quizBtn-${uniqueIdCounter}`;
    }


    

    

    function updateContent() {
        if ($('#singleChoice-outlined').is(':checked')) {
            const uniqueId = generateUniqueId();
            var actionUrl = baseUrl+"/savesinglechoice";
            $('#radioQuestion').html(`
                <form data-action="${actionUrl}" method="POST" enctype="multipart/form-data" id="savesinglechoice">
                    <div id="singleradioAnswer" class="row radio-answer mt-3">
                        <button class="btn quiz-btns mb-5 mt-3" id="${uniqueId}" type="button">
                        <i class="fa-solid fa-file-lines me-2"></i> New Single Question
                        </button>
                        <div class="col-12 mb-4">
                            <h6 class="ps-0">Question Title*</h6>
                            <input class="form-control custom-inner-style" type="text" id="multipleQuestion" name="question${uniqueId}" placeholder="Write Question">
                        </div>
                        <div class="col-6 mb-4">
                            <h6>Option 1*</h6>
                            <input type="text" class="form-control custom-inner-style" placeholder="Option Title" name="option1q${uniqueId}" id="option1">
                        </div>
                        <div class="col-6 mb-4">
                            <h6>Option 2*</h6>
                            <input type="text" class="form-control custom-inner-style" placeholder="Option Title" name="option2q${uniqueId}"   id="option2q1">
                        </div>
                        <div class="col-6 mb-4">
                            <h6>Option 3*</h6>
                            <input type="text" class="form-control custom-inner-style" placeholder="Option Title" name="option3q${uniqueId}" id="option3q1">
                        </div>
                        <div class="col-6 mb-4">
                            <h6>Option 4*</h6>
                            <input type="text" class="form-control custom-inner-style" placeholder="Option Title" name="option4q${uniqueId}" id="option4q1">
                        </div>
                        <div class="col-12 mb-4">
                            <h6>Choose Correct Answer*</h6>
                            <select class="form-control" name="correctans${uniqueId}"  id="correctOption">
                                <option value="" disabled selected>Select Correct Option</option>
                                <option value="1">Option 1</option>
                                <option value="2">Option 2</option>
                                <option value="3">Option 3</option>
                                <option value="4">Option 4</option>
                            </select>
                        </div>
                    </div>
                    
                   
                    <div class="mt-5 text-end">
                        <button type="button" class="btn exit" data-dismiss="modal">Close</button>
                        <button type="button" class="btn save add-question" onClick="submitquestion()">Add Question</button>
                    </div>
                </form>
            `);
        } else if ($('#mulChoice-outlined').is(':checked')) {
            const uniqueId = generateUniqueId();
            var actionUrl = baseUrl+"/savemultichoiceform";
            $('#radioQuestion').html(`
                <form class="user mt-3"  method="POST" data-action="${actionUrl}"  id="savemultichoiceform" enctype="multipart/form-data">
                    <div id="radioAnswer" class="row radio-answer mt-3">
                        <button class="btn quiz-btns mb-5 mt-3" id="${uniqueId}" type="button">
                            <i class="fa-solid fa-file-lines me-2"></i> New Multiple Question
                        </button>
                        <div class="col-12 mb-4">
                            <h6 class="ps-0">Multi Choice Title*</h6>
                            <input type="text" class="form-control custom-inner-style" placeholder="Write Question" id="multipleQuestion${uniqueId}" name="question${uniqueId}">
                        </div>
                        <div class="col-6 mb-4">
                            <h6>Option 1*</h6>
                            <input type="text" class="form-control custom-inner-style" placeholder="Option Title" name="option1${uniqueId}" id="option1">
                        </div>
                        <div class="col-6 mb-4">
                            <h6>Option 2*</h6>
                            <input type="text" class="form-control custom-inner-style" placeholder="Option Title" name="option2${uniqueId}" id="option2q1">
                        </div>
                        <div class="col-6 mb-4">
                            <h6>Option 3*</h6>
                            <input type="text" class="form-control custom-inner-style" placeholder="Option Title" name="option3${uniqueId}" id="option3q1">
                        </div>
                        <div class="col-6 mb-4">
                            <h6>Option 4*</h6>
                            <input type="text" class="form-control custom-inner-style" placeholder="Option Title" name="option4${uniqueId}" id="option4q1">
                        </div>
                        <div class="col-12 d-flex">
                            <div class="custom-checkbox">
                                <input type="checkbox" class="custom-inner-style" name="correctans${uniqueId}[]" id="answer1" value="1">
                                <label class="btn btn-sm blue-color" for="answer1">Option 1</label>
                            </div>
                            <div class="custom-checkbox">
                                <input type="checkbox" class="custom-inner-style" name="correctans${uniqueId}[]" id="answer2" value="2">
                                <label class="btn btn-sm blue-color" for="answer2">Option 2</label>
                            </div>
                            <div class="custom-checkbox">
                                <input type="checkbox" class="custom-inner-style" name="correctans${uniqueId}[]" id="answer3" value="3">
                                <label class="btn btn-sm blue-color" for="answer3">Option 3</label>
                            </div>
                            <div class="custom-checkbox">
                                <input type="checkbox" class="custom-inner-style" name="correctans${uniqueId}[]" id="answer4" value="4">
                                <label class="btn btn-sm blue-color" for="answer4">Option 4</label>
                            </div>
                            

                              <input type="text" name="uniquekey" id="uniquekey" value="${uniqueId}" />

                        </div>
                    </div>
                    <div class="mt-5 text-end">
                        <button type="button" class="btn exit" data-dismiss="modal">Close</button>
                        <button type="button" class="btn save add-question" onClick="submitmultiquestion()">Add Question</button>
                    </div>
                </form>
            `);
        } else if ($('#singleText-outlined').is(':checked')) {
            var actionUrl = baseUrl+"/savesingleline";
            $('#radioQuestion').html(`
                 <form class="user mt-3"  method="POST" data-action="${actionUrl}"  id="savesingleline" enctype="multipart/form-data">
                <div class="row radio-answer mt-3">
                    <h6 class="ps-0">Single Text Title*</h6>
                    <input type="text" class="form-control custom-inner-style" placeholder="Write Question" name="singleText" id="singleText">
                   
                </div>
                
                <div class="my-5 text-end">
                    <button type="button" class="btn exit" data-dismiss="modal">Close</button>
                    <button type="button" class="btn save add-question" onClick="submitsinglequestion()">Add Question</button>
                </div>
                </form>
            `);
        } else if ($('#multiText-outlined').is(':checked')) {
            var actionUrl = baseUrl+"/savesmultiline";
            $('#radioQuestion').html(`
                 <form class="user mt-3"  method="POST" data-action="${actionUrl}"  id="savesmultiline" enctype="multipart/form-data">
                <div class="row radio-answer mt-3">
                    <h6 class="ps-0">Multi Text Title*</h6>
                    <input type="text" class="form-control custom-inner-style" placeholder="Write Question" name="multiText" id="multiText">
                  
                </div>
                
                <div class="my-5 text-end">
                    <button type="button" class="btn exit" data-dismiss="modal">Close</button>
                    <button type="button" class="btn save add-question" onClick="submitmultilinequestion()">Add Question</button>
                </div>
                </form>
            `);
        }

        // Add event listener to the button within the updated content
        // Remove previous click events to avoid multiple bindings
        $(document).off('click', '[id^="quizBtn-"]');

        // Re-apply click event
        $(document).on('click', '[id^="quizBtn-"]', function() {
            const uniqueId = generateUniqueId();
            $('#radioAnswer').append(`
                <div class="row mt-5">
                    <div class="col-12 mb-4">
                        <h6 class="ps-0">Multi Choice Title*</h6>
                        <input type="text" class="form-control custom-inner-style" placeholder="Write Question" id="multipleQuestion" name="question${uniqueId}">
                    </div>
                    <div class="col-6 mb-4">
                        <h6>Option 1*</h6>
                        <input type="text" class="form-control custom-inner-style" placeholder="Option Title" name="option1${uniqueId}" id="option1">
                    </div>
                    <div class="col-6 mb-4">
                        <h6>Option 2*</h6>
                        <input type="text" class="form-control custom-inner-style" placeholder="Option Title" name="option2${uniqueId}" id="option2q1">
                    </div>
                    <div class="col-6 mb-4">
                        <h6>Option 3*</h6>
                        <input type="text" class="form-control custom-inner-style" placeholder="Option Title" name="option3${uniqueId}" id="option3q1">
                    </div>
                    <div class="col-6 mb-4">
                        <h6>Option 4*</h6>
                        <input type="text" class="form-control custom-inner-style" placeholder="Option Title" name="option4${uniqueId}" id="option4q1">
                    </div>
                    <div class="col-12 d-flex">
                        <div class="custom-checkbox">
                            <input type="checkbox" class="custom-inner-style" name="correctans${uniqueId}[]" id="answer1-${uniqueId}" value="1">
                            <label class="btn btn-sm blue-color" for="answer1-${uniqueId}">Option 1</label>
                        </div>
                        <div class="custom-checkbox">
                            <input type="checkbox" class="custom-inner-style" name="correctans${uniqueId}[]" id="answer2-${uniqueId}" value="2">
                            <label class="btn btn-sm blue-color" for="answer2-${uniqueId}">Option 2</label>
                        </div>
                        <div class="custom-checkbox">
                            <input type="checkbox" class="custom-inner-style" name="correctans${uniqueId}[]" id="answer3-${uniqueId}" value="3">
                            <label class="btn btn-sm blue-color" for="answer3-${uniqueId}">Option 3</label>
                        </div>
                        <div class="custom-checkbox">
                            <input type="checkbox" class="custom-inner-style" name="correctans${uniqueId}[]" id="answer4-${uniqueId}" value="4">
                            <label class="btn btn-sm blue-color" for="answer4-${uniqueId}">Option 4</label>
                        </div>
                    </div>
                </div>
            `);
            $('#singleradioAnswer').append(`<div class="row mt-5">
                        <div class="col-12 mb-4">
                            <h6 class="ps-0">Question Title*</h6>
                            <input class="form-control custom-inner-style" type="text" id="multipleQuestion" name="question${uniqueId}" placeholder="Write Question">
                        </div>
                        <div class="col-6 mb-4">
                            <h6>Option 1*</h6>
                            <input type="text" class="form-control custom-inner-style" placeholder="Option Title" name="option1q${uniqueId}" id="option${uniqueId}">
                        </div>
                        <div class="col-6 mb-4">
                            <h6>Option 2*</h6>
                            <input type="text" class="form-control custom-inner-style" placeholder="Option Title" name="option2q${uniqueId}"   id="option2q${uniqueId}">
                        </div>
                        <div class="col-6 mb-4">
                            <h6>Option 3*</h6>
                            <input type="text" class="form-control custom-inner-style" placeholder="Option Title" name="option3q${uniqueId}" id="option3q${uniqueId}">
                        </div>
                        <div class="col-6 mb-4">
                            <h6>Option 4*</h6>
                            <input type="text" class="form-control custom-inner-style" placeholder="Option Title" name="option4q${uniqueId}" id="option4q${uniqueId}">
                        </div>
                        <div class="col-12 mb-4">
                            <h6>Choose Correct Answer*</h6>
                            <select class="form-control" name="correctans${uniqueId}"  id="correctOption${uniqueId}">
                                <option value="" disabled selected>Select Correct Option</option>
                                <option value="1">Option 1</option>
                                <option value="2">Option 2</option>
                                <option value="3">Option 3</option>
                                <option value="4">Option 4</option>
                            </select>
                        </div></div>`);
        });
    }

    // Initial content update
    updateContent();

    // Add event listener for change event on radio buttons
    $('input[name="question-outlined"]').change(updateContent);
});


//   radio button content change for multistep media


$(document).ready(function() {
	function updateContent() {
		if ($('#htmlFirst-outlined').is(':checked')) {
<<<<<<< HEAD
			$('#mediaContent').html('<div class="row mx-0 mt-4"><div class="col-12 mb-3 mediaUpload-border py-5"><input class="custom-inner-style form-control" type="file" name="videoAttachmentmedia" id="videoAttachmentmedia" style="display: none;"><label for="videoAttachmentmedia" class="btn MediaBtn" style="cursor: pointer;">Upload Video</label><p style="font-size: 16px; color:grey; margin-bottom:0px">File Format: .mp4</p></div><h3 class="text-start fs-subtitle">Course Thumbnail</h3><div class="col-12 mb-3 mediaUpload-border"><img style="width: 100px;" src="http://192.81.219.28/img/admin/icon_picture.png"></div><div class="col-12"><input class="custom-inner-style form-control" type="file" name="videopostermedia" id="videopostermedia" style="display: none;"><label for="videopostermedia" class="btn MediaBtn" style="cursor: pointer;">Upload Poster Image</label><p style="font-size: 16px; color:grey; margin-bottom:0px">Size: 590x300 pixels. Supports: jpg, jpeg, or png</p></div></div>');
=======
			$('#mediaContent').html('<div class="row mx-0 mt-4"><div class="col-12 mb-3 mediaUpload-border"><input class="custom-inner-style form-control" type="file" name="videoAttachmentmedia" id="videoAttachmentmedia"><p style="font-size: 16px; color:grey; margin-bottom:0px">File Format: .mp4</p></div><h3 class="text-start fs-subtitle">Course Thumbnail</h3><div class="col-12 mb-3 mediaUpload-border"><img style="width: 100px;" src="http://192.81.219.28/img/admin/icon_picture.png"></div><div class="col-12"><input class="custom-inner-style form-control" type="file" name="videopostermedia" id="videopostermedia"><p style="font-size: 16px; color:grey ; margin-bottom:0px">Size: 590x300 pixels. Supports: jpg,jpeg, or png</p></div></div>');
>>>>>>> main
		} else if ($('#urlFirst-outlined').is(':checked')) {
			$('#mediaContent').html('<div class="row mx-0 mt-4"><div class="col"><h3 class="fs-subtitle">External URL*</h3><input type="text" class="multiField form-control mb-5" placeholder="External URL" name="externalurl" id="externalurl"><h3 class="fs-subtitle">Video Runtime - hh:mm:ss**</h3><input type="time" class="form-control multiField" value="10:05 AM" /></div></div>');
		} else if ($('#youtubeFirst-outlined').is(':checked')) {
			$('#mediaContent').html('<div class="row mx-0 mt-4"><div class="col"><h3 class="fs-subtitle">Youtube URL*</h3><input type="text" class="multiField form-control mb-5" placeholder="Youtube Video URL" name="youtubeurl" id="youtubeurl"><h3 class="fs-subtitle">Video Runtime - hh:mm:ss**</h3><input type="time" id="youtubeDuration" name="youtubeDuration" class="form-control multiField" value="10:05 AM" /></div></div>');
		} else if ($('#vimeoFirst-outlined').is(':checked')) {
			$('#mediaContent').html('<div class="row mx-0 mt-4"><div class="col"><h3 class="fs-subtitle">Vimeo URL*</h3><input type="text" class="multiField form-control mb-5" placeholder="Vimeo Video URL" name="vimeourl" id="vimeourl"><h3 class="fs-subtitle">Video Runtime - hh:mm:ss**</h3><input type="time" class="form-control multiField" id="vimeoDuration" name="vimeoDuration" value="10:05 AM" /></div></div>');
		} else if ($('#embededFirst-outlined').is(':checked')) {
			$('#mediaContent').html('<div class="row mx-0 mt-4"><div class="col"><h3 class="fs-subtitle">Embedded Code*</h3><input type="text" name="embeddedurl" id="embeddedurl" class="multiField form-control mb-5" placeholder="Place your embedded code here" name="embedded" id="embedded"><h3 class="fs-subtitle">Video Runtime - hh:mm:ss**</h3><input type="time" class="form-control multiField" id="embeddedDuration" name="embeddedDuration" value="10:05 AM" /></div></div>');
		}

<<<<<<< HEAD
        // document.getElementById('customFileUploadButton').addEventListener('click', function() {
        //     document.getElementById('videoAttachment').click();
        // });

        document.getElementById('videoAttachment').addEventListener('change', function(event) {
            const file = event.target.files[0];
            if (file) {
                alert(`Selected file: ${file.name}`);
            }
        });

        $('#customFileUploadButton2').on('click', function() {
            $('#image').click();
        });
    }
	
    // Initial content update
    updateContent();
	
    // Add event listener for change event on radio buttons
    $('input[name="media-outlined"]').change(updateContent);
});





/*function addquize()
    {

        var form = '#savesinglechoice';

       

   

       
      

        var url = $(this).attr('data-action');
        //alert($('meta[name="csrf-token"]').attr('content'));

        var frmData = new FormData(form);
        frmData.append('last_quize_id',$('#last_quize_id').val());

      

        $.ajax({
            url: url, // the endpoint
            type: 'POST', // http method
            data: frmData,
            contentType: false,
            processData: false, 
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                // handle success
               // console.log(response);
               if(response==true)
                {
                    alert("Questions Saved");
                }


            },
            error: function(xhr) {
                // handle error
                console.log(xhr.responseText);
                alert("Something wrong occured");
            }
        });
        
    
        
    }*/
 
