<x-logoutModal />



@livewireScripts

<!-- Bootstrap core JavaScript-->
<script src="{{ URL::to('vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ URL::to('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<!-- Core plugin JavaScript-->
<script src="{{ URL::to('vendor/jquery-easing/jquery.easing.min.js') }}"></script>

<!-- Custom scripts for all pages-->
<script src="{{ URL::to('js/sb-admin-2.min.js') }}"></script>
<script src="{{ URL::to('js/jquery-steps.min.js') }}"></script>
<script src="{{ URL::to('js/jquery-ui.min.js') }}"></script>

<script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
<script src="{{ URL::to('vendor/jQuery-TE/jquery-te-1.4.0.min.js') }}"></script>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"
        integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"
        integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.4.0/chart.umd.min.js">
    </script>
    <script src="https://miniature.earth/demo/world-news/countries.js"></script>
    <script src="https://miniature.earth/miniature.earth.js"></script>
    
    <script src="dashboard.js"></script>
    <script src="{{ URL::to('js/custom.js') }}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('#sidebar-nav .collapse').forEach(function (collapseElement) {
        collapseElement.addEventListener('show.bs.collapse', function () {
            this.previousElementSibling.querySelector('.fa-caret-down').classList.add('rotate');
        });
        collapseElement.addEventListener('hide.bs.collapse', function () {
            this.previousElementSibling.querySelector('.fa-caret-down').classList.remove('rotate');
        });
    });
});


// ADMIN DASHBOARD GLOBE PLANET
var myearth;
var localNewsMarker;
var news = [];

window.addEventListener("earthjsload", function () {

    var earthElement = document.getElementById('element');
    if (!earthElement) {
        console.error("Element with ID 'element' not found");
        return;
    }

    myearth = new Earth(earthElement, {

        location: {
            lat: 18,
            lng: 50
        },
        zoom: 1.05,
        light: 'none',

        transparent: false,
        mapSeaColor: 'RGBA(96,96,117,1)',
        mapLandColor: '#070814',
        mapBorderColor: '#16132f',
        mapBorderWidth: 0,
        mapStyles: ' #CU, #DO, #HT, #JM, #PR { fill: red; stroke: red; } ',
        mapHitTest: true,
        // Use a direct URL here if this is an external JS file
        mapImage: 'http://192.81.219.28/img/admin/map.jpg',

        autoRotate: false,
        autoRotateSpeed: 0.7,
        autoRotateDelay: 4000,

    });

    myearth.addEventListener("ready", function () {
        this.startAutoRotate();

        // San Fan
        news[0] = myearth.addOverlay({
            location: { lat: 34.0489, lng: -111.0937 },
            offset: 0.0,
            depthScale: 1.20,
            className: 'warning',
            occlude: true,
            newsId: 0 // custom property
        });
        news[0].element.addEventListener('click', highlightBreakingNews);

        // Texas
        news[1] = myearth.addOverlay({
            location: { lat: 30.0489, lng: -90.0 },
            offset: 0.0,
            depthScale: 1.20,
            className: 'warning',
            occlude: true,
            newsId: 1
        });
        news[1].element.addEventListener('click', highlightBreakingNews);

        myearth.addLine({
            polyLine: true,
            locations: [
                { lat: 50, lng: 100 },
                { lat: 43, lng: 100 },
                { lat: 43, lng: 96 },
                { lat: 46, lng: 90 },
                { lat: 50, lng: 90 },
                { lat: 50, lng: 100 }
            ],
            color: "red",
            width: 0.0 /* Sarim */
        });

        // Florida
        news[2] = myearth.addOverlay({
            location: { lat: 30.0489, lng: -80.0 },
            offset: 0.0,
            depthScale: 1.20,
            className: 'warning',
            occlude: true,
            newsId: 2
        });
        news[2].element.addEventListener('click', highlightBreakingNews);

        myearth.addMarker({
            location: { lat: 3.52, lng: 97.3 },
            mesh: "Pin3",
            color: "green",
            scale: 0.0,
            hotspot: false,
        });
    });

    var selectedCountry;

    myearth.addEventListener('click', function (event) {
        if (event.id) {
            if (selectedCountry !== event.id) {
                selectedCountry = event.id;
                const countryNameEl = document.getElementById('country-name');
                if (countryNameEl) {
                    countryNameEl.innerHTML = countries[event.id];
                }

                const localNewsEl = document.getElementById('local-news');
                if (localNewsEl) {
                    localNewsEl.classList.add('has-news');
                    localNewsEl.classList.toggle('toggle-news');
                }
            }

            // create news marker on first click
            if (!localNewsMarker) {
                localNewsMarker = this.addMarker({
                    mesh: "Marker",
                    color: '#257cff',
                    location: event.location,
                    scale: 0.01
                });

                localNewsMarker.animate('scale', 0.9, { easing: 'out-back' });
            } else {
                localNewsMarker.animate('location', event.location, {
                    duration: 200,
                    relativeDuration: 50,
                    easing: 'in-out-cubic'
                });
            }
        }
    });
});

function highlightBreakingNews(event) {
    var overlay = event.target.closest('.earth-overlay').overlay;
    var newsId = overlay.newsId;

    var breakingNewsEl = document.getElementById('breaking-news-' + newsId);
    if (breakingNewsEl) {
        breakingNewsEl.classList.add('news-highlight');
        setTimeout(function () {
            breakingNewsEl.classList.remove('news-highlight');
        }, 500);
    }

    myearth.goTo(overlay.location, { duration: 250, relativeDuration: 70 });
    event.stopPropagation();
}

function gotoBreakingNews(newsId) {
    if (news[newsId]) {
        myearth.goTo(news[newsId].location, { duration: 250, relativeDuration: 70 });
    }
}





</script>


@yield('js')
<script>
    $(".editor").jqte();
</script>


