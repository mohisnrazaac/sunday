
@extends('layouts.guest')
<style>
    /* LOGIN SECTION PAGE */
    :root{
    --colora:#ff454e29;
    --colorb:#c92f2f2e;
    --colorc:#ff454e26;

    --btn:265px;
    --input:40px;
    --height:40px;

    --base-padding: 16%;
    --padding-increase: 1%;
    --width-increase-interval: 50px;
  }
    #left_alignment_html_content {
	  display:none;
	  position: absolute;
	  margin-left: calc(20vw + startingPixelX);
	  top: 0;
	  color: white;       
}
   

  .content_2{
    padding: 0 13%;
  }
  .cont_3{
    padding: 0 16%;
  }
  /* .cont_3{
    padding: 0 24%;
  } */
  .cr_ac{
 /*   width: 40%;
    margin-top: 10%;*/
  }

@media only screen and (max-width:850px){
	  
 
    .cr_ac{
      width: 80%;
    }
    #myVideo, 
    #myVideo1, 
    #myVideo2, 
    #validTokenVideo, 
    #myVideo3,
    #myVideo4
     {
      width: auto;
    }
    /* .cont_3{
      padding: 0 20%;
    } */
  }
  @media only screen and (max-width:450px){
   /* .content{
      padding: 0 4%;
    }*/
    .cont_3{
      padding: 0 4%;
    }
    .content_2{
      padding: 0 3%;
    }
    .cr_ac{
      width: 100%;
    }
  }
/* pass reset 1 screen */
  #one, #two, #four {
	  
      margin-left: 0rem;
}
.pass_reset_background{
      background-image: linear-gradient(to right, #ff454e1f , #c92f2f1f);

      border-bottom: 6px solid #0000006b;
      box-shadow: 0px 6px 0px 0px #fc4653;
      border-radius: 0 50px 0 0;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: flex-start;
      gap: 3px;
      opacity: 1;
      min-width: 350px;  
      max-width: 355px;
      padding-left: 3rem !important;
      padding-right: 3rem !important;
}
@media only screen and (max-width:1100px){ 
  .pass_reset_background{ 
      min-width: 300px;  
      max-width: 305px;
      padding-left: 1rem !important;
      padding-right: 1rem !important;
      
}  }



@media only screen and (max-width:1440px){ 
.pass_reset_background{
  margin-top: 5%;
  }
  }
  
.yourcodeexpires {
  color: #00e4ff;
  font-weight: bold;
  margin-bottom: 20px !important; 
  display: flex; 
  align-items: center;
  font-size: calc(14px + 0.390625vw) !important ;
}
     


.password-input {
  display: flex;
  align-items: center;
  gap: 5px;
  justify-content: space-between;
  width: 100%; 
  border-radius: 5px;
  outline: none;
}
.password-input input {
  width: 2.7rem;
  height: 3rem;
  text-align: center;
  font-size: 300%;
  border-radius: 5px;
  border: none;
  background-color: #04fefe2f;
  color: #04fefe;
  caret-color: #04fefe; 
  border: 1px solid #04fefe;
  transition: 0.5s;
        font-family: Arial, sans-serif;  }
.password-input input::placeholder {
  color:#04fefe;
}


/* pass reset 2 screen */
.pass_reset_2_btn{
  background-image: url(http://192.81.219.28/img/admin/passwordreset_idle.png);
}
.pass_reset_2_btn:hover{
  background-image: url(http://192.81.219.28/img/admin/passwordreset_hover.png);
}
.email_input{
  width: var(--btn);
  height: var(--height);
 
  background-color: #472f40;
  border: 0.5px solid #795ba2;
  padding: 0% 2.5%;
  opacity: 0.7;
  color: #04fefe;
  
}
 
.pass_reset_2_background{
  background-image: linear-gradient(to right, #ff454e1f , #c92f2f1f);
  border-bottom: solid 4px #fc4653;
  border-radius: 0 50px 0 0;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: flex-start;
  gap: 9px;
  opacity: 0;
  min-width: 350px;
  margin-left: 0em;
}

/* register institution */
.signup-form{
  opacity: 0;
}
.signup-bottom-div {

  gap: 5px;
  overflow: hidden;
  position: relative;
  max-width: 100%;
  transition: 1.5s;
  font-size: 1.2rem;
}  
.signup-top-div {

  gap: 5px;
  overflow: hidden;
  position: relative;
  max-width: 100%;
  transition: 1.5s;
  font-size: 1.4rem;
} 

.signup-h1 {
  text-transform: uppercase;
  text-align: center;
  background: repeating-linear-gradient(
      -45deg,
      var(--colorc),
      var(--colorc) 5px,
      transparent 5px,
      transparent 10px
  );
}
.signup-input{
  background-color: var(--colorb);
  border: none;
  outline: none;
  color: #04fefe;
  width: 90%;
  /* height: 36px; */
  font-size: calc(10px + 0.5vw);
  padding: 5px 10px !important;
}
.signup-input::placeholder{
  color: #914a66  ;
}

@media only screen and (max-width:1440px){ 

.signup-input{ 
  padding: 3px 10px !important;
  font-size: calc(10px + 0.3vw);
}
.signup-h1 {
    
  font-size: calc(12px + 0.3vw);
}
.signup-bottom-div {
    
  font-size: 0.8rem;
}
.cr_ac {
    
  margin-top: 15%;
}
  }
  

.input-box{
  width: 10%;
  background: repeating-linear-gradient(
      -45deg,
      var(--colora),
      var(--colora) 2.5px,
      transparent 2.5px,
      transparent 5px);
}
.signup-button-container{
  border-bottom: 4px solid #fc4653;
  gap: 5px;
}
.signup-btn{
  color: white;
  background-color: var(--colorb);
  border: none;
  width: 90%; 
}
.signup-pref-p{
  text-align: left;
}
.signup-pref-holder{
    margin-left: calc(10% + 5px);
}

.checkbox-input {
  display: none;
}

/*.custom-checkbox {*/
/*    display: flex;*/
/*    flex-direction: row;*/
/*    align-items: center;*/
/*    position: relative; */
/*    cursor: pointer;*/
/*}*/

.checkmark { 
  margin-right: 1rem;
  height: 17px; 
  width: 17px; 
  background-color: transparent;
  border: 2px solid #fff; 
  border-radius: 50%; 
}

.checkbox-input:checked + .checkmark {
  background-color: aqua; 
} 


.pass_reset_btn{
  width: 260px;
  height: 45px;
  background-color: transparent;
  /* border: 1px solid #04fefe; */
  /* color: white; */
  /* border-radius:0 5px 5px 5px; */
  position: relative;
  background-image: url(http://192.81.219.28/img/admin/idle.png);
  background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    transition: 0.5s;
}
.pass_reset_btn:hover{
  /* background-color: #19cec5; */
  /* color: black; */
  background-image: url(http://192.81.219.28/img/admin/1_hover.png);
}



.reg_ins_btn{
  width: 333px;
  height: 52px;
  background-color: transparent; 
  position: relative;
background-image: url(http://192.81.219.28/img/admin/institution_idle.png)
  background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    transition: 0.5s;
}
.reg_ins_btn:hover{ 
background-image: url(http://192.81.219.28/img/admin/institution_hover.png);
}



.continue_btn{
  width: 277px;
  height: 46px;
  background-color: transparent;
  /* border: 1px solid #04fefe; */
  /* color: white; */
  /* border-radius:0 5px 5px 5px; */
  position: relative;
  background-image: url(http://192.81.219.28/img/admin/idle.png);
  background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    transition: 0.5s;
}
.continue_btn:hover{
  /* background-color: #19cec5; */
  /* color: black; */
  background-image: url(http://192.81.219.28/img/admin/1_hover.png);
}


/* set new password */
.set_new_pass_btn{
  background-image: url(http://192.81.219.28/img/admin/password_idle.png);
  width: 266px;
  height: 44px;
  background-color: transparent; 
  position: relative; 
  background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    transition: 0.5s;
    }
.set_new_pass_btn:hover{background-image: url(http://192.81.219.28/img/admin/password_hover.png);}



  @media only screen and (max-width:1440px){ 
.reg_ins_btn{    width: 255px;
  height: 39px;
}}




/* login page */
.signin_btn{
background-image: url(http://192.81.219.28/img/admin/login_idle.png);
}
.signin_btn:hover{
background-image: url(http://192.81.219.28/img/admin/login_hover.png);
}
.login_forgot_p{
color: #04fefe;
letter-spacing: 2px;
text-align: center;
}
.login_register_holder{
background-color: #ff454e1f;
border-radius: 0 0 25px 25px;
}
.login_register_holder_button{
color: #04fefe;
background-color: transparent;    font-weight: bold;
  font-size: calc(8px + 0.3vw);
  margin: 0 10px;
  transition: 0.5s; 
  display: flex;
}
.login_register_holder_button:hover {
  color: white;
}
#login_screen-2,
#login_screen-3,
#login_screen-4,
#login_screen-5
{display: none;}

.terms_holder{
  width: 100%;
  height: 100%;
}
.terms_vid{
  width: 80%;
  top: 50%;
  left: 50%;
  /* transform: translate(-50%,-50%); */
  min-height: 340px;
  min-width: 650px;
}
.login_error_text{
  width: 80%;
}
.terms_video_holder{
  width: 80%;
}
.terms_h_holder{
  z-index: 3;
  position: absolute;
}
.login_error_h {
  display: none;
}
.terms_h {
  display: none;
  width:60vw !important;
}
.login_error_h {
  display: none;
}
.terms_h_holder h4{
  padding: 0 25% !important;
  font-weight: bold;
  /* min-height: 340px; */
  min-width: 650px;
  font-size: 2.2rem;
}
.login_error_h_holder {
  z-index: 3;
  position: absolute;    left: 40%;
    top: 52%;
}
.login_error_h_holder h4 { 
    min-width: 300px;
    font-size: 1.0rem;
    color: white;
    margin-left: 6vw !important;
}


 @media (min-width:1535px){
.login_error_h_holder h4 {  
    font-size: 0.8rem; 
    margin-top: 5px !important;
}

}

 
.terms_color{
    text-decoration: underline;
  color: #00e4ff;
  transition: 0.5s;
} 
.terms_color:hover{
  color: white;
} 

 @media (min-width:1100px) and (max-width:1150px){
  .terms_h_holder h4{padding: 0 30% !important;  font-size: 1.2rem;} 
  
.terms_h { 
  width:80vw !important;
}
 
}


 @media (max-width:1099px){
  .terms_h_holder h4{padding: 0 25% !important;  font-size: 1.2rem;} 
   
 
}

 
 @media (min-width:1100px) and (max-width:1376px){ 
  .login_error_h_holder h4 { 
    font-size: .65rem !important;
    padding-top: 7px !important;
}
 }
 @media (max-width:1100px) { 
  .login_error_h_holder h4 { 
    font-size: .55rem !important;
    padding-top: 7px !important;
}
 }
 
	  
 @media (min-width:1300px) and  (max-width:1600px){ 
  .terms_h_holder h4{       font-size: 200%; } 
 }
 
 @media (max-width:1300px){ 
  .terms_h_holder h4{       font-size: 150%; } 
 }

 /* hero */


@media (min-width:1000px) and  (max-width:1199){ 
 
 .hero_holder2 {
     padding-bottom: 11% !important;
 }
 } 
 
 
 .hero_holder2,
 .hero_holder{
   height: 100%;
 }
 .hero_holder2{
   padding-bottom: 12%;
 }
 .hero_btns{
     transition: transform 0.3s ease-in-out;
   background-color: transparent;
   height: 0px;
   width: 0px;
   background-image: url(http://192.81.219.28/img/admin/HeroButton_Left.png);
   font-weight: bold;
   font-size: 1.2rem;
   transition: 1s; 
 }
 .hero_btns:hover{
           transform: scale(1.1);
   background-color: transparent;
   height: 0px;
   width: 0px;
   background-image: url(http://192.81.219.28/img/admin/HeroButton_Left.png);
   font-weight: bold;
   font-size: 1.2rem; 
   transition: 1s;
 }
 
 .hero_btns_left{
     transition: transform 0.3s ease-in-out;
   background-color: transparent;
   height: 0px;
   width: 0px;
   background-image: url(http://192.81.219.28/img/admin/HeroButton_Left.png);
   font-weight: bold;
   font-size: 1.2rem;
   transition: 1s; 
 }
 .hero_btns_left:hover{
           transform: scale(1.1);
   background-color: transparent;
   height: 0px;
   width: 0px;
   background-image: url(http://192.81.219.28/img/admin/HeroButton_Left.png);
   font-weight: bold;
   font-size: 1.2rem; 
   transition: 1s;
 }
 
 
 .hero_btns_right{
     transition: transform 0.3s ease-in-out;
   background-color: transparent;
   height: 0px;
   width: 0px;
   background-image: url(http://192.81.219.28/img/admin/HeroButton_RIGHT.png);
   font-weight: bold;
   font-size: 1.2rem;
   transition: 1s; 
 }
 .hero_btns_right:hover{
           transform: scale(1.1);
   background-color: transparent;
   height: 0px;
   width: 0px;
   background-image: url(http://192.81.219.28/img/admin/HeroButton_RIGHT.png);
   font-weight: bold;
   font-size: 1.2rem; 
   transition: 1s;
 }
 
 .hero_btn_text{
   font-size: 1.25rem;
   font-weight: bold;
   background: linear-gradient(to right, #00e4ff , #b657ff);;
     -webkit-text-fill-color: transparent; 
     -webkit-background-clip: text; 
     text-transform: uppercase;      
 margin-top: 8px;
 } 
 
 
 
 
 
 @media (min-width:1200px) and  (max-width:1439){ 
 .hero_btn_text {  
   font-size: 1.5rem !important;  
 } 
 .hero_holder2 {
     padding-bottom: 12% !important;
 }
 } 
 
 @media (min-width:1440px) and  (max-width:1599){ 
 .hero_btn_text {  
   font-size: 1.5rem !important;  
 } 
 .hero_holder2 {
     padding-bottom: 14% !important;
 }
 } 
 
 @media (min-width:1600px) and  (max-width:1921px){ 
 .hero_btn_text{  
   font-size: 2rem !important;  
 } 
 .hero_holder2 {
     padding-bottom: 16% !important;
 }
 }  
 
 
 /* 2step authentication */
 .twostep_btn{
   background-image: url(http://192.81.219.28/img/admin/authentication_idle.png);
 }
 .twostep_btn:hover{
   background-image: url(http://192.81.219.28/img/admin/authentication_hover.png);
 }
 .twostep_btn_2{
   background-image: url(http://192.81.219.28/img/admin/2step_idle.png);
 }
 .twostep_btn_2:hover{
   background-image: url(http://192.81.219.28/img/admin/2step_hover.png);
 }
 .two_step_p{
   color: #00e4ff;
 }
 #one{
   opacity: 0;
 }
 .Twostep_p{
   margin-top: -8px !important; 
 }
 .expired_btn{background-image: url(http://192.81.219.28/img/admin/code_idle.png);}
 .expired_btn:hover{background-image: url(http://192.81.219.28/img/admin/code_hover.png);}
 .expired_p{
   background-color: #00e4ff;
   color: black;
   min-width: 265px;
 }
 .expired_p h2{
   font-weight: 800 !important;
 }
 #four{
   display: flex;
   flex-direction: column;
   justify-content: flex-start;
   align-items: start;
 }
 #login_screen-5,
 #login_screen-3,#login_screen-4,
 #invalidToken,
 #validToken{
   display: none;
     z-index: 99;
     position: fixed;
     width: 100%;
     height: 100%;
     top: 0;
     left: 0;
 
 }
 .video-background { 
    position: relative;
    width: 100%;
    height: 100vh;
    overflow: hidden;
  }
  #myVideo, 
  #myVideo1, 
    #myVideo2, 
  #validTokenVideo, 
  #myVideo3,
  #myVideo4
   {
    position: absolute;
    top: 0;
    left: 50%;
    transform: translateX(-50%);
    /* width: 100%; */
    height: 100%;
    object-fit:contain;
    
  }
  
  #validTokenVideo {
	  object-fit: contain; width: 50%; height: auto; top: 50%; left: 50%; transform: translate(-50%,-50%);
  }
  
   #myVideo3 {
	   object-fit: contain; width: 40%; height: auto; top: 50%; left: 50%; transform: translate(-50%,-50%);
   }
    #myVideo2 {
   object-fit: contain; width: 80%; height: 100vh; top: vh; left: 18%; transform: translate(-10%,0%);
    }
    
    button {
        border: 0px;
    }
</style>
@section('content')
<div class="video-background" id="login_screen-1" style="background-color: black; color: white;">
    <div class="terms_holder d-flex flex-column justify-content-center align-items-center">
      <div class="terms_video_holder d-flex flex-column justify-content-center align-items-center">
        <video autoplay muted  preload="auto" class="terms_vid" id="terms_anim_no_text">
          <source src="{{ asset('img/admin/terms_anim_no_text.mp4') }}" type="video/mp4">
          Your browser does not support the video tag.
        </video> 
        <div class="d-flex flex-row justify-content-center align-items-center terms_h_holder">
        
      <h4 class="terms_h" id="twtos">
      <!--By logging into the platform you agree to the rootCapture <a href="#" class="terms_color">ToS</a> and <a  href="#"  class="terms_color">Privacy Policy</a>.-->
      </h4>
      
       
        </div>
      </div>
      <div class="d-flex flex-md-row flex-column" style="margin-top: -80px;">
        <button class="pass_reset_btn hero_btns" id="hero_btns" onclick="showScreen2()"><div class="hero_btn_text">Accept</div></button>
        <a href="./Hero.html" class="mt-md-0 mt-5">
        <button class="pass_reset_btn hero_btns" id="hero_btns1"><div class="hero_btn_text">Reject</div></button></a>
      </div>
    </div>
</div>


<div class="video-background" id="login_screen-3" style="background-color: black;">
    <video autoplay muted id="myVideo2" preload="auto">
        <source src="{{ asset('img/admin/Description 07_me Comp 1.mp4') }}" type="video/mp4" >
        Your browser does not support the video tag.
    </video>
</div>

<div class="video-background" id="login_screen-5" style="background-color: black;">
    <video autoplay muted id="myVideo4" preload="auto"style="object-fit: contain; width: 100%; height: auto; top: 50%; left: 50%; transform: translate(-50%,-50%);">
        <source src="{{ asset('img/admin/login success.mp4') }}" type="video/mp4">
        Your browser does not support the video tag.
    </video>
</div>

<div class="video-background" id="login_screen-4" style="background-color: black;">

    <div class="login_error_text d-flex flex-column justify-content-center align-items-center">
    <video autoplay muted id="myVideo3" preload="auto" >
        <source src="{{ asset('img/admin/login error.mp4') }}" type="video/mp4">
        Your browser does not support the video tag.
    </video>
 
    <div class="d-flex flex-row justify-content-center align-items-center login_error_h_holder">
      <h4 class="login_error_h" id="demo">
      <!--Password Did Not Match Security Requirements<br><span style="color: #00e4ff">REASONS:</span><br>Case Sensative<br>8 Characters Needed-->
      </h4>
    </div>
    
</div>

</div>


    
<div class="video-background" id="login_screen-2">
    <video autoplay muted id="myVideo" preload="auto">
        <source id="videoSource" src="{{ asset('img/admin/Login page.mp4') }}" type="video/mp4">
        Your browser does not support the video tag.
    </video>
<div id="left_alignment_html_content" style=" margin-left: 20vw;" >
                <div class="cr_ac" style="margin-top: 0px !important">
                    <form class="user signup-form" id="signup-form" method="post" action="{{ route('login') }}">
                      @csrf
                        <div class="d-flex flex-column  pb-0 signup-top-div">
                            <h3 class="signup-h1 pt-1">Login Details</h3>
                            <div class="d-flex flex-row" style="gap: 5px;"><div class="input-box"></div><input type="email" class="signup-input p-2 @error('email') is-invalid @enderror" id="email" name="email" placeholder="Enter Email Address..." aria-describedby="email">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror </div> 
                            
                            <div class="d-flex flex-row" style="gap: 5px;">
                            <div class="input-box"></div>
                            <input type="password"  id="password" name="password" placeholder="Password" value="password" class="signup-input p-2 @error('email') is-invalid @enderror"  oninput="maskPassword(this)">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror 
                            </div>
                            
                            <div class="d-flex flex-column  p-4 pt-1 pb-1 signup-bottom-div" >
                                <div class="mt-2 d-flex flex-row justify-content-center align-items-center">
                                    <button class="pass_reset_btn signin_btn" name="submit_create_team" onclick="Login()" type="submit"></button>
                                </div>
                                <a href="https://trsdigital.pk/rootcapture/Password_Reset.html"><p class="mt-2 login_forgot_p">Forgot Password?</p></a>
                            </div>
                        <div class="d-flex flex-row justify-content-center align-items-center p-2 login_register_holder" style="border-top: 4px solid #fc4653;">
                            <a href="CreateAccount.html"><span class="login_register_holder_button">Register Your Account</span></a>
                            <a href="RegisterInstitution.html"><span class="login_register_holder_button">Register Your Institution</span></a>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
</div> 
          


<script>



function isMobileDevice() {
    return /iPhone|iPad|iPod|Android|webOS|BlackBerry|Windows Phone/i.test(navigator.userAgent);
}

function isSmallScreen() {
    return window.innerWidth < 768; // You can adjust this threshold as needed
}

document.addEventListener("DOMContentLoaded", function () {
    var video = document.getElementById("myVideo");
    var videoSource = document.getElementById("videoSource");
    var leftAlignmentHtmlContent = document.getElementById("left_alignment_html_content");

    if (isMobileDevice() && isSmallScreen()) {
        // Update video source for mobile devices and small screens
        videoSource.src = "{{ asset('img/admin/BG_Login_page_Mobile.mp4') }}";
        // Reload the video to apply the new source
        video.load();

        // Apply styling to the div
        leftAlignmentHtmlContent.classList.add("mobile_login_page");
    }
});

function showScreen2() {
document.getElementById('login_screen-1').style.display = 'none';
setupPage(); // Call the setup function on DOMContentLoaded as a fallback
var htmlContent = document.getElementById('left_alignment_html_content');
htmlContent.style.display = 'none';


var myDiv = document.getElementById("signup-form");

// Delay the appearance of the div by 2.2 seconds
setTimeout(function() {
    myDiv.style.opacity = 1; // Make the div visible
}, 2200);

document.getElementById('login_screen-2').style.display = 'block';
// Animation Effects
setTimeout(function() {
    myDiv.style.opacity = 0.7;
}, 2800); // 2.2s + 0.2s
setTimeout(function() {
    myDiv.style.opacity = 0.4;
}, 3000); // 2.2s + 0.4s
setTimeout(function() {
    myDiv.style.opacity = 0;
}, 3200); // 2.2s + 0.6s
setTimeout(function() {
    myDiv.style.opacity = 0.5;
}, 3300); // 2.2s + 0.7s
setTimeout(function() {
    myDiv.style.opacity = 0;
}, 3400); // 2.2s + 0.8s
setTimeout(function() {
    myDiv.style.opacity = 0.5;
}, 3500); // 2.2s + 0.9s
setTimeout(function() {
    myDiv.style.opacity = 0;
}, 3600); // 2.2s + 1.0s
setTimeout(function() {
    myDiv.style.opacity = 0.5;
}, 3700); // 2.2s + 1.1s
setTimeout(function() {
    myDiv.style.opacity = 0;
}, 3780); // 2.2s + 1.18s
setTimeout(function() {
    myDiv.style.opacity = 1;
}, 4400); // 2.2s + 1.8s

const video = document.getElementById('myVideo');
video.autoplay = true;
video.muted = true;

video.addEventListener("ended", handleVideoEnded);

function handleVideoEnded() {
    video.pause();
    video.currentTime = 8.8;
    video.play();
}
}
 
 
function setupPage() {
         var htmlContent = document.getElementById('left_alignment_html_content');
         const video = document.getElementById("myVideo"); 
         video.autoplay = true;
         video.muted = true;    
         video.addEventListener("ended", handleVideoEnded);
     
         function handleVideoEnded() {
             video.pause();
             video.currentTime = 7;
             video.play();
         }
          
      
    video.addEventListener('canplaythrough', function () { 
    console.log(window.innerWidth+'x'+window.innerHeight);
    var startingPixelX = video.getBoundingClientRect().left; 
    var vwValue;  
     
      if (window.devicePixelRatio == 1 && window.innerWidth < 1280) {
         vwValue = 17; // For x-small screens DONE  
     } else if (window.devicePixelRatio == 1.75 && window.innerWidth < 1300 && window.innerHeight < 500) { //1090*470*1.75
         vwValue = 12.8; // For 1920x 175%   
     } else if (window.devicePixelRatio == 1.5 && window.innerWidth < 1300 && window.innerHeight > 500 && window.innerHeight < 600) { //1272*572*1.5
         vwValue = 13.4; // For 1920x 150%   
     } else if (window.devicePixelRatio == 1.5 && window.innerWidth < 1300 && window.innerHeight > 600 && window.innerHeight < 650 ) { //1280*638*1.5
         vwValue = 14.8; // For 1920x 150%   SRM
     } else if (window.devicePixelRatio == 1.5 && window.innerWidth < 1300 && window.innerHeight > 650 && window.innerHeight < 700 ) { //1280*665*1.5
         vwValue = 15.4; // For 1920x 150%  Brandon
     } else if (window.devicePixelRatio == 1.5 && window.innerWidth < 1300 && window.innerHeight > 700 && window.innerHeight < 730 ) { //1280*638*1.5
         vwValue = 16.8; // For 1920x 150%    SRM
     } else if ((window.devicePixelRatio == 1 || window.devicePixelRatio == 1.25) && window.innerWidth < 1366 && window.innerHeight < 720) {
         vwValue = 15; // For 1280x800  
     } else if (window.innerWidth < 1366 && window.innerHeight > 720) {
         vwValue = 18.5; // For 1280x960  
     } else if (window.devicePixelRatio !== 1.75 && window.innerWidth < 1440) {
         vwValue = 13.25; // For 1366x768 DONE  
     } else if (window.devicePixelRatio !== 1.75 && window.innerWidth < 1530 && window.innerHeight < 720) { //1528*716*1.25
         vwValue = 14; // For 1920x 125%  
     } else if (window.devicePixelRatio == 1.25 && window.innerWidth > 1530 && window.innerHeight > 720 && window.innerHeight < 740) { //1536*738*1.25
         vwValue = 14.2; // For 1920x 125%  SRM 
     } else if (window.devicePixelRatio == 1.25 && window.innerWidth > 1530 && window.innerHeight > 740 && window.innerHeight < 800) { //1536*785*1.25
         vwValue = 15.1; // For 1920x 125%   17" 
     } else if (window.devicePixelRatio == 1.25 && window.innerWidth > 1530 && window.innerHeight > 800 && window.innerHeight < 860) { //1536*826*1.25
         vwValue = 15.9; // For 1920x 125%   17"   
     } else if (window.devicePixelRatio == 1.25 && window.innerWidth > 1530 && window.innerHeight > 860) { //1536*864*1.25
         vwValue = 16.7; // For 1920x 125%   17"   
     } else if (window.devicePixelRatio == 1.25 && window.innerWidth > 1530 && window.innerHeight < 720) { //1536x703*1.25 with bookmark
         vwValue = 13.7; // For 1920x 125%    
     } else if (window.devicePixelRatio !== 1.75 && window.innerWidth < 1536) {
         vwValue = 15.3; // For 1440x900 DONE  
     } else if (window.devicePixelRatio !== 1.75 && window.innerWidth < 1600) {
         vwValue = 16; // For 1536x864 DONE   
     } else if (window.devicePixelRatio !== 1.75 && window.innerWidth < 1920) {
         vwValue = 14.5; // For 1600x900 DONE    
     } else if (window.devicePixelRatio == 1 && window.innerWidth < 1921 && window.innerHeight < 920) { //1920*920*1.0 w/o bookmark
         vwValue = 14.1; // For 1920x 125%  SRM  
     } else if (window.devicePixelRatio == 1 && window.innerWidth < 1921 && window.innerHeight > 920) { //1920*920*1.0 w/o bookmark
         vwValue = 16.0; // For 1920x 105%  SRM  
     } else if (window.devicePixelRatio == 1.25 && window.innerWidth < 1921 && window.innerHeight > 920) { //1920*1065*1.25 
         vwValue = 16.7; // For 1920x1065 17" monitor 125%   
     } else {
         vwValue = 14.7; // For 1920x1080 and larger screens DONE    
     }
     
             
             setTimeout(function () {
                 htmlContent.style.display = 'block';
                 htmlContent.style.marginLeft = 'calc(' + vwValue + 'vw + ' + startingPixelX + 'px)';
                 //htmlContent.style.marginTop = videoHeight / ( vhMargin) + 'vh
                 
if ( (window.devicePixelRatio==1.5) && (window.innerWidth < 1300 && window.innerHeight > 500 && window.innerHeight < 700)) { /*1272*572*1.5*/htmlContent.style.marginTop = '33vh';}
else if (window.devicePixelRatio == 1.75 && window.innerWidth < 1300 && window.innerHeight < 500) { /*1090*470*1.75*/ htmlContent.style.marginTop = '15vh'; }	
else if (window.devicePixelRatio == 1.5 && window.innerWidth < 1300 && window.innerHeight > 650 && window.innerHeight < 700 ) { /*1280*665*1.5*/
htmlContent.style.marginTop = '30vh';}	  
else if (window.innerWidth < 500 ) { /*Mobile*/  htmlContent.style.marginTop = '50vh';}		  
else {htmlContent.style.marginTop = '33vh';}
      }, 2200);
         });
     
         // Fallback in case the 'canplaythrough' event is not supported
         setTimeout(function () {
             var startingPixelX = video.getBoundingClientRect().left;
          //   var videoHeight = video.getBoundingClientRect().height;
             var vwValue;
     
     if (window.devicePixelRatio == 1 && window.innerWidth < 1280) {
         vwValue = 17; // For x-small screens DONE  
     } else if (window.devicePixelRatio == 1.75 && window.innerWidth < 1300 && window.innerHeight < 500) { //1090*470*1.75
         vwValue = 12.8; // For 1920x 175%   
     } else if (window.devicePixelRatio == 1.5 && window.innerWidth < 1300 && window.innerHeight > 500 && window.innerHeight < 600) { //1272*572*1.5
         vwValue = 13.4; // For 1920x 150%   
     } else if (window.devicePixelRatio == 1.5 && window.innerWidth < 1300 && window.innerHeight > 600 && window.innerHeight < 650 ) { //1280*638*1.5
         vwValue = 14.8; // For 1920x 150%   SRM
     } else if (window.devicePixelRatio == 1.5 && window.innerWidth < 1300 && window.innerHeight > 650 && window.innerHeight < 700 ) { //1280*665*1.5
         vwValue = 15.4; // For 1920x 150%  Brandon
     } else if (window.devicePixelRatio == 1.5 && window.innerWidth < 1300 && window.innerHeight > 700 && window.innerHeight < 730 ) { //1280*638*1.5
         vwValue = 16.8; // For 1920x 150%    SRM
     } else if ((window.devicePixelRatio == 1 || window.devicePixelRatio == 1.25) && window.innerWidth < 1366 && window.innerHeight < 720) {
         vwValue = 15; // For 1280x800  
     } else if (window.innerWidth < 1366 && window.innerHeight > 720) {
         vwValue = 18.5; // For 1280x960  
     } else if (window.devicePixelRatio !== 1.75 && window.innerWidth < 1440) {
         vwValue = 13.25; // For 1366x768 DONE  
     } else if (window.devicePixelRatio !== 1.75 && window.innerWidth < 1530 && window.innerHeight < 720) { //1528*716*1.25
         vwValue = 14; // For 1920x 125%  
     } else if (window.devicePixelRatio == 1.25 && window.innerWidth > 1530 && window.innerHeight > 720 && window.innerHeight < 740) { //1536*738*1.25
         vwValue = 14.2; // For 1920x 125%  SRM 
     } else if (window.devicePixelRatio == 1.25 && window.innerWidth > 1530 && window.innerHeight > 740 && window.innerHeight < 800) { //1536*785*1.25
         vwValue = 15.1; // For 1920x 125%   17" 
     } else if (window.devicePixelRatio == 1.25 && window.innerWidth > 1530 && window.innerHeight > 800 && window.innerHeight < 860) { //1536*826*1.25
         vwValue = 15.9; // For 1920x 125%   17"   
     } else if (window.devicePixelRatio == 1.25 && window.innerWidth > 1530 && window.innerHeight > 860) { //1536*864*1.25
         vwValue = 16.7; // For 1920x 125%   17"   
     } else if (window.devicePixelRatio == 1.25 && window.innerWidth > 1530 && window.innerHeight < 720) { //1536x703*1.25 with bookmark
         vwValue = 13.7; // For 1920x 125%    
     } else if (window.devicePixelRatio !== 1.75 && window.innerWidth < 1536) {
         vwValue = 15.3; // For 1440x900 DONE  
     } else if (window.devicePixelRatio !== 1.75 && window.innerWidth < 1600) {
         vwValue = 16; // For 1536x864 DONE   
     } else if (window.devicePixelRatio !== 1.75 && window.innerWidth < 1920) {
         vwValue = 14.5; // For 1600x900 DONE    
     } else if (window.devicePixelRatio == 1 && window.innerWidth < 1921 && window.innerHeight < 920) { //1920*920*1.0 w/o bookmark
         vwValue = 14.1; // For 1920x 125%  SRM  
     } else if (window.devicePixelRatio == 1 && window.innerWidth < 1921 && window.innerHeight > 920) { //1920*920*1.0 w/o bookmark
         vwValue = 16.0; // For 1920x 105%  SRM  
     } else if (window.devicePixelRatio == 1.25 && window.innerWidth < 1921 && window.innerHeight > 920) { //1920*1065*1.25 
         vwValue = 16.7; // For 1920x1065 17" monitor 125%   
     } else {
         vwValue = 14.7; // For 1920x1080 and larger screens DONE    
     }
     
     
     setTimeout(function () {
         htmlContent.style.display = 'block';
         htmlContent.style.marginLeft = 'calc(' + vwValue + 'vw + ' + startingPixelX + 'px)';
         //htmlContent.style.marginTop = videoHeight / ( vhMargin) + 'vh
if ( (window.devicePixelRatio==1.5) && (window.innerWidth < 1300 && window.innerHeight > 500 && window.innerHeight < 700)) { /*1272*572*1.5*/htmlContent.style.marginTop = '33vh';}
else if (window.devicePixelRatio == 1.75 && window.innerWidth < 1300 && window.innerHeight < 500) { /*1090*470*1.75*/ htmlContent.style.marginTop = '15vh'; }	
else if (window.devicePixelRatio == 1.5 && window.innerWidth < 1300 && window.innerHeight > 650 && window.innerHeight < 700 ) { /*1280*665*1.5*/
htmlContent.style.marginTop = '30vh';}	
else if (window.innerWidth < 500 ) { /*Mobile*/  htmlContent.style.marginTop = '50vh';}		  

else {htmlContent.style.marginTop = '33vh';}
}, 2200);
 }, 2200);
} // Custom Responsive Core function

document.addEventListener("DOMContentLoaded", function () {
 setupPage(); // Call the setup function on DOMContentLoaded as a fallback
});

window.onload = function () {
 setupPage(); // Call the setup function when the window has fully loaded
};





var i = 0;
var j = 0;
var txt = 'Password Did Not Match Security Requirements<br>REASONS:<br>Case Sensative<br>8 Characters Needed'; 
var txttos = 'By logging into the platform you agree to the rootCapture <a href="#" class="terms_color" id="tosLink">ToS</a> and <a href="#" class="terms_color" id="privacyLink">Privacy Policy</a>';
var speed = 25;
var typeWriterTOSExecuted = false;

function typeWriterTOS() {
if (typeWriterTOSExecuted) {
return;
}

typeWriterTOSExecuted = true;

var twtos = document.getElementById("twtos");

function typeCharacter() {
if (i < txttos.length) {
  var char = txttos.charAt(i);
  if (char === '<') {
    var tagEndIndexTOS = txttos.indexOf('>', i);
    twtos.innerHTML += txttos.substring(i, tagEndIndexTOS + 1);
    i = tagEndIndexTOS + 1;
  } else {
    twtos.appendChild(document.createTextNode(char));
    i++;
  }

  setTimeout(typeCharacter, speed);
} else {
  // Create ToS link
  var tosLink = document.createElement("a");
  tosLink.href = "#"; // Replace '#' with the actual URL of your Terms of Service page
  tosLink.className = "terms_color";
  tosLink.textContent = "ToS";

  // Create Privacy Policy link
  var privacyLink = document.createElement("a");
  privacyLink.href = "#"; // Replace '#' with the actual URL of your Privacy Policy page
  privacyLink.className = "terms_color";
  privacyLink.textContent = "Privacy Policy";

  // Append links to twtos
  twtos.innerHTML = ""; // Clear existing content
  twtos.appendChild(document.createTextNode("By logging into the platform you agree to the rootCapture "));
  twtos.appendChild(tosLink);
  twtos.appendChild(document.createTextNode(" and "));
  twtos.appendChild(privacyLink);
}
}

typeCharacter();
}
    
    
    
function typeWriter() {
if (j < txt.length) {
// Check if the current character is '<', then add the following characters until '>'
if (txt.charAt(j) === '<') {
  var tagEndIndex = txt.indexOf('>', j);
  document.getElementById("demo").innerHTML += txt.substring(j, tagEndIndex + 1);
  j = tagEndIndex + 1;
} else {
  document.getElementById("demo").innerHTML += txt.charAt(j);
    j++;
}
setTimeout(typeWriter, speed);
}
}



document.addEventListener("DOMContentLoaded", function () {
    setTimeout(function () { typeWriterTOS() }, 2000); 
    const videoterms_anim_no_text = document.getElementById('terms_anim_no_text');
    terms_anim_no_text.autoplay = true;
    terms_anim_no_text.muted = true;

    terms_anim_no_text.addEventListener("ended", handleVideoEndedterms_anim_no_text);

    function handleVideoEndedterms_anim_no_text() {
        terms_anim_no_text.pause();
        terms_anim_no_text.currentTime = 2.8;
        terms_anim_no_text.play();
    }
     
    var myDiv = document.getElementById("hero_btns");
    var myDiv2 = document.getElementById("hero_btns1");
    setTimeout(function() {
      myDiv.style.height = '80px';
      myDiv2.style.height = '80px';    
    }, 1000);
    setTimeout(function() {
      myDiv.style.width = '265px';
      myDiv2.style.width = '265px';
      document.querySelector('.terms_h').style.display = 'block'
    }, 1000);
  });
  


  function Login(){
    let login_success = false 
    // document.getElementById('login_screen-2').style.display = 'none';
    document.getElementById('login_screen-1').style.display = 'none';
    document.getElementById('login_screen-3').style.display = 'block';
    setTimeout(function() {
      if(login_success){
        document.getElementById('login_screen-3').style.display = 'none';
        document.getElementById('login_screen-5').style.display = 'block';
      }else{
      document.getElementById('login_screen-3').style.display = 'none';
      document.getElementById('login_screen-4').style.display = 'block';
      
    setTimeout(function () { typeWriter() }, 2000); 
   
    const video = document.getElementById('myVideo3');
    video.autoplay = true;
    video.muted = true;

    video.addEventListener("ended", handleVideoEnded);

    function handleVideoEnded() {
        video.pause();
        video.currentTime = 5;
        video.play();
    }
      document.querySelector('.login_error_h').style.display = 'block'
    }
  }, 5100);
  }

 


</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
   
<script>
    function updatePadding() {
    try {
    const limitingWidth = 1420;
    const container = document.querySelector('.cont_3');
    const basePadding = 12; // Initial padding percentage
    const paddingIncrease = 1; // Padding increase per 50px
    const widthIncreaseInterval = 50; // Width interval for padding increase

    const currentWidth = container.offsetWidth;
    const dynamicPadding = basePadding + Math.floor((currentWidth - limitingWidth) / widthIncreaseInterval) * paddingIncrease;

    if (currentWidth > limitingWidth) {
      container.style.padding = `0 ${dynamicPadding}%`;
    } 
    else if( currentWidth < limitingWidth && currentWidth > 451){
      container.style.padding = `0 21%`;
    }
    else if(currentWidth < 451){
      container.style.padding = `0 20%`;
    }
  } catch (error) {}
  }

  // Call the function on page load and window resize
  window.addEventListener('load', updatePadding);
  window.addEventListener('resize', updatePadding);
  
  
	
	
	        $(document).ready(function () {
            // Initialize input mask for phone number
            $('#phoneNumber').inputmask('(999) 999-9999', {
                onKeyValidation: function (result) {
                    if (!result) {
                        // Show tooltip if alpha character is entered
                        $('#phoneNumber').tooltip('show');
                    } else {
                        // Hide tooltip if valid character is entered
                        $('#phoneNumber').tooltip('hide');
                    }
                }
            });

            // Enable Bootstrap tooltips
            $('[data-toggle="tooltip"]').tooltip();
        });
</script>
@endsection