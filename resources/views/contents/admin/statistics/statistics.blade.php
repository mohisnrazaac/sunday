@extends('layouts.admin')

@section('head')
    <link rel="stylesheet" href="https://www.cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css" />
@endsection

<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="https://code.jquery.com/jquery-1.8.2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>

@section('content')
<div class="container centralize_container pt-5">
    <div class="row">
        <div class="col-12 col-md-8">
            <div class="d-flex px-4 py-2 mb-2 align-items-center justify-content-between st_card_heading">
                <div>
                    <h4 class="mb-0">Total Users 1</h4>
                </div>
                <div>
                    <i class="fa-solid fa-ellipsis"></i>
                </div>
            </div>
            <div class="px-4 py-3 st_card_body text-center">
                <ul class="list-inline">
                    <li class="list-inline-item"><i class="fa-solid fa-circle fa-2xs" style="color: #FFD43B;"></i> Admin</li>
                    <li class="list-inline-item"><i class="fa-solid fa-circle fa-2xs" style="color: #ff9b3d;"></i> Administrative Assistant</li>
                    <li class="list-inline-item"><i class="fa-solid fa-circle fa-2xs" style="color: #ff3d3d;"></i> Red Team</li>
                    <li class="list-inline-item"><i class="fa-solid fa-circle fa-2xs" style="color: rgb(3, 202, 223);"></i> Blue Team</li>
                    <li class="list-inline-item"><i class="fa-solid fa-circle fa-2xs" style="color: #B197FC;"></i> Purple Team</li>
                    <li class="list-inline-item"><i class="fa-solid fa-circle fa-2xs" style="color: #63E6BE;"></i> Shoaib Khan</li>
                </ul>
                <canvas id="line-chart" class="w-100"></canvas>
            </div>
        </div>
        <div class="col-12 col-md-4">
            <div class="d-flex px-4 py-2 mb-2 align-items-center justify-content-between st_card_heading">
                <div>
                    <h4 class="mb-0 text-uppercase">Recent Activities</h4>
                </div>
            </div>
            <div class="px-4 py-3 st_card_body">
                <ul>
                    <li class="mb-3">
                        <div class="title">AdminDemo enabled the Maintenance Mode</div>
                        <span class="time">2023-11-15 | 11:08:10</span>
                    </li>
                    <!-- Repeat similar <li> elements as needed -->
                </ul>
                <canvas id="line-chart" class="w-100"></canvas>
            </div>
        </div>
        <!-- Donut Charts -->
        <div class="col-12 col-md-4 mt-4">
            <div class="d-flex px-4 py-2 mb-2 align-items-center justify-content-between st_card_heading">
                <div>
                    <h5 class="mb-0 text-uppercase">Users</h5>
                </div>
            </div>
            <div class="px-4 py-3 st_card_body custom-legend" style="height:auto">
                <div id="donut-chart-yellow" style="height: 250px;"></div>
                <div id="legend-yellow" class="d-flex legend"></div>
            </div>
        </div>
        <div class="col-12 col-md-4 mt-4">
            <div class="d-flex px-4 py-2 mb-2 align-items-center justify-content-between st_card_heading">
                <div>
                    <h5 class="mb-0 text-uppercase">total number of assets</h5>
                </div>
            </div>
            <div class="px-4 py-3 st_card_body custom-legend" style="height:auto">
                <div id="donut-chart-red" style="height: 250px;"></div>
                <div id="legend-red" class="d-flex legend"></div>
            </div>
        </div>
        <div class="col-12 col-md-4 mt-4">
            <div class="d-flex px-4 py-2 mb-2 align-items-center justify-content-between st_card_heading">
                <div>
                    <h5 class="mb-0 text-uppercase">active/inactive session</h5>
                </div>
            </div>
            <div class="px-4 py-3 st_card_body custom-legend" style="height:auto">
                <div id="donut-chart-green" style="height: 250px;"></div>
                <div id="legend-green" class="d-flex legend"></div>
            </div>
        </div>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"
        integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.4.0/chart.umd.min.js"> </script>
<script>
    // Graph
    // bebgin line chart display
    var lineChart = document.getElementById("line-chart").getContext('2d');

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
    // PIE CHART
    $(document).ready(function() {
            // Initialize all donut charts
            initializeDonutChart('yellow', '#donut-chart-yellow', '#legend-yellow');
            initializeDonutChart('red', '#donut-chart-red', '#legend-red');
            initializeDonutChart('green', '#donut-chart-green', '#legend-green');

            // Redraw charts on window resize
            $(window).resize(function() {
                if (window.donutChartYellow) window.donutChartYellow.redraw();
                if (window.donutChartRed) window.donutChartRed.redraw();
                if (window.donutChartGreen) window.donutChartGreen.redraw();
            });
        });

        function initializeDonutChart(colorScheme, chartId, legendId) {
            const data = colorScheme === 'yellow' ? [
                {label: "Admin", value: 50, color: '#f3d76b'},
                {label: "Shoaib", value: 2, color: '#473A13'},
                {label: "Administrative", value: 25, color: '#785c1b'},
                {label: "Red", value: 3, color: '#b6902c'},
                {label: "Blue", value: 10, color: '#d4aa36'},
                {label: "Purple", value: 10, color: '#edc240'}
            ] : colorScheme === 'red' ? [
                {label: "Asset 1", value: 50, color: '#ff6666'},
                {label: "Asset 2", value: 25, color: '#cc0000'},
                {label: "Asset 3", value: 5, color: '#990000'},
                {label: "Asset 4", value: 10, color: '#660000'},
                {label: "Asset 5", value: 10, color: '#330000'}
            ] : [
                {label: "Active", value: 50, color: '#66ff66'},
                {label: "Inactive", value: 25, color: '#33cc33'}
            ];

            // Initialize the donut chart
            const chart = Morris.Donut({
                element: chartId.substring(1), // Remove the '#' from the chartId
                data: data,
                colors: data.map(item => item.color), // Use the colors from the data array
                resize: true,
                redraw: true
            });

            // Remove the stroke (border) of the donut chart segments
            $(`${chartId} svg path`).css('stroke', 'none');

            // Adjust the stroke width of the donut chart segments
            $(`${chartId} svg path`).css('stroke-width', '15px');

            // Generate the legend
            generateLegend(data, legendId);

            // Store the chart in a window variable for resizing
            if (colorScheme === 'yellow') {
                window.donutChartYellow = chart;
            } else if (colorScheme === 'red') {
                window.donutChartRed = chart;
            } else if (colorScheme === 'green') {
                window.donutChartGreen = chart;
            }
        }

        function generateLegend(data, legendId) {
            const legend = document.getElementById(legendId.substring(1)); // Remove the '#' from the legendId
            data.forEach(item => {
                const legendItem = document.createElement('div');
                legendItem.className = 'legend-item';

                const colorBox = document.createElement('div');
                colorBox.className = 'legend-color';
                colorBox.style.backgroundColor = item.color;

                const labelText = document.createElement('span');
                labelText.innerText = item.label;

                legendItem.appendChild(colorBox);
                legendItem.appendChild(labelText);
                legend.appendChild(legendItem);
            });
        }
</script>
@endsection
