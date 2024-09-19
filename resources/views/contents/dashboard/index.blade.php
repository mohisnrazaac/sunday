@extends('layouts.admin')

<link rel="stylesheet" href="https://www.cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="https://code.jquery.com/jquery-1.8.2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
<link href="{{ URL::to('css/custom.css') }}" rel="stylesheet">

@section("content")

<div id="wrapper" class="container px-4 mt-5 position-relative">
    <div class="globe-outer w-100 row justify-content-center position-absolute">

        <div id="earth-col" class="mx-5 px-5">
            <div id="element" class="earth-js"></div>
        </div>
    </div>
    <div class="row">
        <!-- Donut Chart Column with Yellow Shades -->
        <div class="col-4 mt-4 position-relative">
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

        <div class="col-4"></div>

        <!-- Donut Chart Column with Green Shades -->
        <div class="col-4 mt-4 position-relative">
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
    <div class="row">
        <!-- Donut Chart Column with Red Shades -->
        <div class="col-4 mt-4 position-relative">
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
        <div class="col-4"></div>
        <!-- Locations -->
        <div class="col-4 mt-4 position-relative">
            <div class="d-flex px-4 py-2 mb-2 align-items-center justify-content-between st_card_heading">
                <div>
                    <h5 class="mb-0 text-uppercase">our locations</h5>
                </div>
            </div>
            <div id="breaking-news" class="px-4 py-3 st_card_body custom-legend text-left" style="height:auto; align-items: start;">
                
                <div id="breaking-news-0" class="news">
                    <h3 onclick="gotoBreakingNews( 0 );">California Office</h3>
                    <p>San Fransisco Office RootCapture</p>
                </div>
                
                <div id="breaking-news-1" class="news">
                    <h3 onclick="gotoBreakingNews( 1 );">Texas Office</h3>
                    <p>Dallas Center.</p>
                </div>
                
                <div id="breaking-news-2" class="news">
                    <h3 onclick="gotoBreakingNews( 2 );">Florida</h3>
                    <p>Head Quarter.</p>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
<script>
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
                @foreach($rolesWithUserCount as $user)
                {label: "{{ $user->role_name }}", value: {{ $user->user_count }}, color: '#{{ sprintf('%06X', mt_rand(0, 0xFFFFFF)) }}'},
                @endforeach
               // {label: "Admin", value: totalUsers, color: '#f3d76b'},
                //{label: "Shoaib", value: 2, color: '#473A13'},
                //{label: "Administrative", value: 25, color: '#785c1b'},
                //{label: "Red", value: 3, color: '#b6902c'},
                //{label: "Blue", value: 10, color: '#d4aa36'},
                //{label: "Purple", value: 10, color: '#edc240'}
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