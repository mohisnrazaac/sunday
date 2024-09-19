@extends('layouts.admin')

@section('content')

<div class="container px-5 mt-5">

    <div class="row g-0">
        <div class="col-2">
            <div class="card card-stat text-white bg-purple">
                <div class="card-body">
                    <p class="card-text display-6">001</p>
                    <h6 class="card-title"><b>Reconnaissance</b><br><span>6 Techniques</span></h6>
                </div>
            </div>
        </div>
        <div class="col-2">
            <div class="card card-stat text-white bg-light-blue">
                <div class="card-body">
                    <p class="card-text display-6">004</p>
                    <h6 class="card-title"><b>Initial Access</b><br><span>4 Techniques</span></h6>
                </div>
            </div>
        </div>
        <div class="col-2">
            <div class="card card-stat text-white bg-teal">
                <div class="card-body">
                    <p class="card-text display-6">004</p>
                    <h6 class="card-title"><b>Persistence</b><br><span>4 Techniques</span></h6>
                </div>
            </div>
        </div>
        <div class="col-2">
            <div class="card card-stat text-white bg-green">
                <div class="card-body">
                    <p class="card-text display-6">045</p>
                    <h6 class="card-title"><b>Persistence</b><br><span>4 Techniques</span></h6>
                </div>
            </div>
        </div>
        <div class="col-2">
            <div class="card card-stat text-white bg-brown">
                <div class="card-body">
                    <p class="card-text display-6">102</p>
                    <h6 class="card-title"><b>Persistence</b><br><span>4 Techniques</span></h6>
                </div>
            </div>
        </div>
        <div class="col-2">
            <div class="card card-stat text-white bg-orange">
                <div class="card-body">
                    <p class="card-text display-6">087</p>
                    <h6 class="card-title"><b>Persistence</b><br><span>4 Techniques</span></h6>
                </div>
            </div>
        </div>
    </div>







    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const cards = document.querySelectorAll(".card-stat");

            cards.forEach((card, index) => {
                setTimeout(() => {
                    card.style.opacity = "1";
                }, index * 200); // Adjust the delay (in milliseconds) between each card
            });
        });

    </script>

</div>

@endsection
