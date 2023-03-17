<nav id="sidebar">
    <!-- Sidebar Header-->
    <div class="sidebar-header d-flex align-items-center p-4"><img class="avatar shadow-0 img-fluid rounded-circle"
            src="{{ asset('assets/img/avatar-6.jpg') }}" alt="...">
        <div class="ms-3 title">
            <h1 class="h5 mb-1">Mark Stephen</h1>
            <p class="text-sm text-gray-700 mb-0 lh-1">Web Designer</p>
        </div>
    </div><span class="text-uppercase text-gray-600 text-xs mx-3 px-2 heading mb-2">Main</span>
    <ul class="list-unstyled">
        <li class="sidebar-item {{ $title === 'Dashboard' ? 'active' : '' }}"><a class="sidebar-link" href="index.html">
                <svg class="svg-icon svg-icon-sm svg-icon-heavy">
                    <use xlink:href="#real-estate-1"> </use>
                </svg><span>Dashboard </span></a></li>
        <li class="sidebar-item {{ $title === 'Polygons' ? 'active' : '' }}"><a class="sidebar-link" href="tables.html">
                <svg class="svg-icon svg-icon-sm svg-icon-heavy">
                    <use xlink:href="#portfolio-grid-1"> </use>
                </svg><span>Dots </span></a></li>
        <li class="sidebar-item {{ $title === 'Polygons' ? 'active' : '' }}"><a class="sidebar-link" href="charts.html">
                <svg class="svg-icon svg-icon-sm svg-icon-heavy">
                    <use xlink:href="#sales-up-1"> </use>
                </svg><span>Polygons </span></a></li>
    </ul>
</nav>
