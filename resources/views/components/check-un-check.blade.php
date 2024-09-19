<style>
  .toggle-switch {
position: relative;
display: inline-block;
width: 60px;
height: 20px;
background-color: black;
border-radius: 20px;
cursor: pointer;
border: 3px solid #00e4ff;
padding: 12px;
}

.toggle-text {
position: absolute;
top: 50%;
left:15%;
transform: translateY(-50%);
width: 100%;
text-align: center;
color: #00e4ff;
font-size: 14px;
font-weight: bold;
transition: transform 0.3s ease-in-out;
}
.toggle-text-on {
position: absolute;
top: 50%;
left:30%;
transform: translate(-50%,-50%); 
width: 100%;
text-align: center;
color: #00e4ff;
font-size: 14px;
font-weight: bold;
transition: transform 0.3s ease-in-out;
}

.slider {
position: absolute;
top: 4px;
left: 2px;
width: 16px;
height: 16px;
background-color: #00e4ff;
border-radius: 50%;
box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
transition: transform 0.3s ease-in-out;
}

.slider-on {
position: absolute;
transform: translateX(100%);
top: 4px;
left: 17px;
width: 16px;
height: 16px;
background-color: #00e4ff;
border-radius: 50%;
box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
transition: transform 0.3s ease-in-out;
}

.form-switch .form-check-input:checked {
  filter: hue-rotate(331deg);
}
</style>
<div class="form-check form-switch">

@if($isChecked == 1)
<input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked" checked onclick="updatePublishStatus({{ $courseId }}, 0)">
  {{-- <div class="toggle-switch" onclick="toggle()">
        <span class="toggle-text-on" id="toggleText1">ON</span>
        <div class="slider-on slider1"></div>
    </div> --}}
@else
<input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault" onclick="updatePublishStatus({{ $courseId }}, 1)">
  {{-- <div class="toggle-switch" onclick="toggle()">
        <span class="toggle-text" id="toggleText1">OFF</span>
        <div class="slider slider1"></div>
    </div> --}}
@endif
</div>

<script>

function updatePublishStatus(courseId, isPublished) {
      fetch(`{{ route('course.publish', ['course_id' => '__COURSE_ID__']) }}`.replace('__COURSE_ID__', courseId), {
          method: 'PATCH',
          headers: {
              'Content-Type': 'application/json',
              'X-Requested-With': 'XMLHttpRequest',
              'X-CSRF-TOKEN': '{{ csrf_token() }}'
          },
          body: JSON.stringify({ is_published: isPublished })
      })
      .then(response => response.json())
      .then(data => {
          if (data.success) {
              console.log('Publish status updated successfully.');
          } else {
              console.error('Failed to update publish status.');
          }
      })
      .catch(error => console.error('Error:', error));
  }



  let isAnimationOff = false;
  function toggle() {
    const toggleText = document.getElementById("toggleText1");
    const slider = document.querySelector(".slider1");     
    isAnimationOff = !isAnimationOff;
      const video = document.getElementById("myVideo"); 
    if (isAnimationOff) {
      toggleText.textContent = "OFF";
      slider.style.transform = "translateX(0)";
      toggleText.style.transform = "translate(-8,-50%)";

  video.pause();
    } else {
  video.play();
      toggleText.textContent = "ON";
      slider.style.transform = "translateX(100%)";
      toggleText.style.transform = "translate(-36%,-50%)";
    }
  }


</script>