<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ $title }} | RAM</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Google fonts - Muli-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Muli:300,400,700">
    <!-- Choices.js-->
    <link rel="stylesheet" href="{{ asset('assets/vendor/choices.js/public/assets/styles/choices.min.css') }}">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="{{ asset('assets/css/style.default.css') }}" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
    <!-- Favicon-->
    <link rel="shortcut icon" href="{{ asset('assets/img/favicon.ico') }}">
    <!-- Tweaks for older IEs-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.6.0/leaflet.css" integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Make sure you put this AFTER Leaflet's CSS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.6.0/leaflet.js" integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ asset('assets/js/catiline.js') }}"></script>
    <script src="{{ asset('assets/js/leaflet.shpfile.js') }}"></script>
    <script src="{{ asset('assets/js/shp.js') }}"></script>
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
</head>

<body>
    <header class="header">
        <nav class="navbar navbar-expand-lg py-3 bg-dash-dark-2 border-bottom border-dash-dark-1 z-index-10">
            <div class="search-panel">
                <div class="search-inner d-flex align-items-center justify-content-center">
                    <div
                        class="close-btn d-flex align-items-center position-absolute top-0 end-0 me-4 mt-2 cursor-pointer">
                        <span>Close </span>
                        <svg class="svg-icon svg-icon-md svg-icon-heavy text-gray-700 mt-1">
                            <use xlink:href="#close-1"> </use>
                        </svg>
                    </div>
                    <div class="row w-100">
                        <div class="col-lg-8 mx-auto">
                            <form class="px-4" id="searchForm" action="#">
                                <div class="input-group position-relative flex-column flex-lg-row flex-nowrap">
                                    <input class="form-control shadow-0 bg-none px-0 w-100" type="search"
                                        name="search" placeholder="What are you searching for...">
                                    <button
                                        class="btn btn-link text-gray-600 px-0 text-decoration-none fw-bold cursor-pointer text-center"
                                        type="submit">Search</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid d-flex align-items-center justify-content-between py-1">
                <div class="navbar-header d-flex align-items-center"><a class="navbar-brand text-uppercase text-reset"
                        href="index.html">
                        <div class="brand-text brand-big"><strong
                                class="text-primary">Dark</strong><strong>Admin</strong></div>
                        <div class="brand-text brand-sm"><strong class="text-primary">D</strong><strong>A</strong></div>
                    </a>
                    <button class="sidebar-toggle">
                        <svg class="svg-icon svg-icon-sm svg-icon-heavy transform-none">
                            <use xlink:href="#arrow-left-1"> </use>
                        </svg>
                    </button>
                </div>
                <ul class="list-inline mb-0">
                    <li class="list-inline-item"><a class="search-open nav-link px-0" href="#">
                            <svg class="svg-icon svg-icon-xs svg-icon-heavy text-gray-700">
                                <use xlink:href="#find-1"> </use>
                            </svg></a></li>
                    <li class="list-inline-item logout px-lg-2"> <a class="nav-link text-sm text-reset px-1 px-lg-0"
                            id="logout" href="login.html"> <span class="d-none d-sm-inline-block">Logout </span>
                            <svg class="svg-icon svg-icon-xs svg-icon-heavy">
                                <use xlink:href="#disable-1"> </use>
                            </svg></a></li>
                </ul>
            </div>
        </nav>
    </header>
    <div class="d-flex align-items-stretch">
        <!-- Sidebar Navigation-->
        @include('template.sidebar')
        <div class="page-content">
            <!-- Page Header-->
            <div class="bg-dash-dark-2 py-4">
                <div class="container-fluid">
                    <h2 class="h5 mb-0">Dashboard</h2>
                </div>
            </div>

            {{-- Content --}}
            @yield('content')

            <!-- Page Footer-->
            @include('template.footer')
        </div>
    </div>
    <!-- JavaScript files-->
    {{-- <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script> --}}
    <script src="{{ asset('assets/vendor/just-validate/js/just-validate.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/choices.js/public/assets/scripts/choices.min.js') }}"></script>
    <script src="{{ asset('assets/js/charts-home.js') }}"></script>
    <!-- Main File-->
    <script src="{{ asset('assets/js/front.js') }}"></script>
    <script>
        // ------------------------------------------------------- //
        //   Inject SVG Sprite -
        //   see more here
        //   https://css-tricks.com/ajaxing-svg-sprite/
        // ------------------------------------------------------ //
        function injectSvgSprite(path) {

            var ajax = new XMLHttpRequest();
            ajax.open("GET", path, true);
            ajax.send();
            ajax.onload = function(e) {
                var div = document.createElement("div");
                div.className = 'd-none';
                div.innerHTML = ajax.responseText;
                document.body.insertBefore(div, document.body.childNodes[0]);
            }
        }
        // this is set to BootstrapTemple website as you cannot
        // inject local SVG sprite (using only 'icons/orion-svg-sprite.svg' path)
        // while using file:// protocol
        // pls don't forget to change to your domain :)
        injectSvgSprite('https://bootstraptemple.com/files/icons/orion-svg-sprite.svg');
    </script>
    <!-- FontAwesome CSS - loading as last, so it doesn't block rendering-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
</body>

</html>
