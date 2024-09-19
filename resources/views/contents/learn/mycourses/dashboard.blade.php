@extends('layouts.admin')


@section("content")
<style>
    .coming-soon-container {
        text-align: center;
        padding: 50px;
        border: 1px solid #055e6e;
        border-radius: 10px;
        box-shadow: 0 0 15px linear-gradient(120deg, rgba(31, 24, 84, 0.5), rgba(31, 24, 84, 0.5));
        background: linear-gradient(120deg, rgba(31, 24, 84, 0.5), rgba(31, 24, 84, 0.5)) !important;
        backdrop-filter: blur(10px);
    }

    .coming-soon-container h1 {
        font-size: 50px;
        margin-bottom: 20px;
    }

    .coming-soon-container p {
        font-size: 20px;
        margin-bottom: 30px;
    }

    .coming-soon-container .countdown {
        font-size: 30px;
        margin-bottom: 20px;
    }

    .neon-text {
        color: #fff;
        text-shadow: 
            0 0 5px #fff,
            0 0 10px #fff,
            0 0 20px #1ce5df,
            0 0 30px #1ce5df,
            0 0 40px #1ce5df,
            0 0 50px #1ce5df,
            0 0 60px #1ce5df;
    }
</style>

<div class="coming-soon-container m-5">
    <h1 class="neon-text">Coming Soon</h1>
    <p>Our new learner course dashboard is on its way!</p>
    <div class="countdown" id="countdown"></div>
    <p>Stay tuned for updates.</p>
</div>

<script>
    // Set the date we're counting down to
    var countDownDate = new Date("Dec 31, 2024 23:59:59").getTime();

    // Update the count down every 1 second
    var x = setInterval(function() {
        var now = new Date().getTime();
        var distance = countDownDate - now;

        var days = Math.floor(distance / (1000 * 60 * 60 * 24));
        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);

        document.getElementById("countdown").innerHTML = days + "d " + hours + "h " +
            minutes + "m " + seconds + "s ";

        if (distance < 0) {
            clearInterval(x);
            document.getElementById("countdown").innerHTML = "EXPIRED";
        }
    }, 1000);
</script>
@endsection
