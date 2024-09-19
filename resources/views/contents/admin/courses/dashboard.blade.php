@extends('layouts.admin')
@section('head')
    <link rel="stylesheet" href="https://www.cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css" />
@endsection
<style>
    .cyan_card_general {
        background-image: linear-gradient(120deg, rgba(28, 229, 223, 0.1), rgba(28, 229, 223, 0.1)) !important;
    }
    .st_card_body {
        height: auto !important;
    }
</style>
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="https://code.jquery.com/jquery-1.8.2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
@section("content")
    <div class="container px-4 mt-5 ">
        <div class="row mb-5">
            <div class="col-sm-3 col-md-4 col-lg-3 mt-4 ">
                <div class="cyan_card_general p-4 d-flex align-items-center">
                    <div class="col-4">
                        <i class="fa-solid super-big iconColor fa-graduation-cap"></i>
                    </div>
                    <div class="col-8">
                        <div class="cc_card_heading text-uppercase">
                            <h4 class=" pt-1 mb-0"><strong>{{ __('Total Courses') }}</strong></h4>
                        </div>
                        <div class="px-3  border-top-0 border-bottom-0">
                            <span class="cc_card_body_text fw-bold fs-2">12</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-3 col-md-4 col-lg-3 mt-4 ">
                <div class="cyan_card_general p-4 d-flex align-items-center">
                    <div class="col-4">
                        <i class="fa-solid super-big iconColor fa-user-graduate"></i>
                    </div>
                    <div class="col-8">
                        <div class="cc_card_heading text-uppercase">
                            <h4 class=" pt-1 mb-0"><strong>{{ __('Students Enrolled') }}</strong></h4>
                        </div>
                        <div class="px-3  border-top-0 border-bottom-0">
                            <span class="cc_card_body_text fw-bold fs-2">12</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-3 col-md-4 col-lg-3 mt-4 ">
                <div class="cyan_card_general p-4 d-flex align-items-center">
                    <div class="col-4">
                        <i class="fa-solid super-big iconColor fa-clipboard"></i>
                    </div>
                    <div class="col-8">
                        <div class="cc_card_heading text-uppercase">
                            <h4 class=" pt-1 mb-0"><strong>{{ __('Quizzes & Tests') }}</strong></h4>
                        </div>
                        <div class="px-3  border-top-0 border-bottom-0">
                            <span class="cc_card_body_text fw-bold fs-2">12</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-3 col-md-4 col-lg-3 mt-4 ">
                <div class="cyan_card_general p-4 d-flex align-items-center">
                    <div class="col-4">
                        <i class="fa-solid super-big iconColor fa-clipboard-question"></i>
                    </div>
                    <div class="col-8">
                        <div class="cc_card_heading text-uppercase">
                            <h4 class=" pt-1 mb-0"><strong>{{ __('Questions') }}</strong></h4>
                        </div>
                        <div class="px-3  border-top-0 border-bottom-0">
                            <span class="cc_card_body_text fw-bold fs-2">12</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-3 col-md-4 col-lg-3 mt-4 ">
                <div class="cyan_card_general p-4 d-flex align-items-center">
                    <div class="col-4">
                        <i class="fa-solid super-big iconColor fa-user-tie"></i>
                    </div>
                    <div class="col-8">
                        <div class="cc_card_heading text-uppercase">
                            <h4 class=" pt-1 mb-0"><strong>{{ __('Instructors') }}</strong></h4>
                        </div>
                        <div class="px-3  border-top-0 border-bottom-0">
                            <span class="cc_card_body_text fw-bold fs-2">12</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-3 col-md-4 col-lg-3 mt-4 ">
                <div class="cyan_card_general p-4 d-flex align-items-center">
                    <div class="col-4">
                        <i class="fa-solid super-big iconColor fa-users"></i>
                    </div>
                    <div class="col-8">
                        <div class="cc_card_heading text-uppercase">
                            <h4 class=" pt-1 mb-0"><strong>{{ __('Students') }}</strong></h4>
                        </div>
                        <div class="px-3  border-top-0 border-bottom-0">
                            <span class="cc_card_body_text fw-bold fs-2">12</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-3 col-md-4 col-lg-3 mt-4 ">
                <div class="cyan_card_general p-4 d-flex align-items-center">
                    <div class="col-4">
                        <i class="fa-solid super-big iconColor fa-comment"></i>
                    </div>
                    <div class="col-8">
                        <div class="cc_card_heading text-uppercase">
                            <h4 class=" pt-1 mb-0"><strong>{{ __('Reviews Placed') }}</strong></h4>
                        </div>
                        <div class="px-3  border-top-0 border-bottom-0">
                            <span class="cc_card_body_text fw-bold fs-2">12</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="d-flex px-4 py-2 mb-2 align-items-center justify-content-between st_card_heading">
                    <div>
                        <h4 class="mb-0">Student Enrollment Graph For This Month</h4>
                    </div>
                    <div>
                        <a style="color: rgb(3, 202, 223);" href=""><i class="fa-solid fa-file-csv me-1"></i> Download as CSV</a>
                    </div>
                </div>
                <div class="px-4 py-3 st_card_body text-center">
                    <ul class="list-inline">
                        <li class="list-inline-item"><i class="fa-solid fa-circle fa-2xs" style="color: #FFD43B;"></i> Admin</li>
                        <li class="list-inline-item"><i class="fa-solid fa-circle fa-2xs" style="color: #ff9b3d;"></i> Administrative Assistant</li>
                        <li class="list-inline-item"><i class="fa-solid fa-circle fa-2xs" style="color: #ff3d3d;"></i> Red Team</li>
                        <li class="list-inline-item"><i class="fa-solid fa-circle fa-2xs" style="color: rgb(3, 202, 223);"></i> Blue Team</li>
                        <li class="list-inline-item"><i class="fa-solid fa-circle fa-2xs" style="color: #B197FC;"></i> Purple Team</li>
                        <li class="list-inline-item"><i class="fa-solid fa-circle fa-2xs" style="color: #63E6BE;"></i> Green Team</li>
                    </ul>
                    <canvas id="line-chart-2" class="w-100"></canvas>
                </div>
            </div>
        </div>
    </div>

<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.4.0/chart.umd.min.js"> </script>
<script>
    // Graph
    // bebgin line chart display
    var lineChart = document.getElementById("line-chart-2").getContext('2d');

    // line chart options
    var options = {
        borderWidth: 2,
        cubicInterpolationMode: 'monotone', // make the line curvy over zigzag
        pointRadius: 2,
        pointHoverRadius: 5,
        pointHoverBackgroundColor: '#fff',
        pointHoverBorderWidth: 4
    };

    // create linear gradients for line chart
    var gradientOne = lineChart.createLinearGradient(0,0,0,lineChart.canvas.clientHeight);
    gradientOne.addColorStop(0, 'rgba(51, 169, 247, 0.3)');
    gradientOne.addColorStop(1, 'rgba(0, 0, 0, 0)');

    var gradientTwo = lineChart.createLinearGradient(0,0,0,lineChart.canvas.clientHeight);
    gradientTwo.addColorStop(0, 'rgba(195, 113, 239, 0.15)');
    gradientTwo.addColorStop(1, 'rgba(0, 0, 0, 0)');

    new Chart(lineChart, {
        type: 'line',
        data: {
            labels: ['Jan','Feb','Mar','Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
            datasets: [{
                label: 'Users',
                data: [0,0,0,0,0,30,0,0,0,0,0,0],
                ...options,
                borderColor: 'rgb(3, 202, 223)',
                fill: 'start',
                backgroundColor: gradientTwo
            }]
        },
        options: {
            plugins: {
                legend: {
                    display: false // hide display data about the dataset
                },
                tooltip: { // modify graph tooltip
                    backgroundColor: 'rgb(3, 202, 223)',
                    caretPadding: 5,
                    boxWidth: 5,
                    usePointStyle: 'triangle',
                    boxPadding: 3
                }
            },
            scales: {
                x: {
                    grid: {
                        display: false // hide x-axis grid
                    },
                    beginAtZero: true
                },
                y: {
                    ticks: {
                        callback: function(value, index, values) {
                            // return '$ ' + value // prefix '$' to the dataset values
                        },
                        stepSize: 1
                    }
                }
            }
        }
    });
</script>

@endsection