<div id="back" class="back"></div>
<div id="mySidenav" class="sidenav ri2-bgnavy1" id="tes">
    <div class="nav-block" data-simplebar>
        <div class="nav-topbottom"></div>
        <nav class="nav" role="navigation">
            <ul>
                <li><a href="{{ url('home') }}" class="{{ Request::segment(1) === 'dashboard' || Request::segment(1) === 'formwo' ? 'selected' : '' }}">
                    <div class="nav-icon"><i class="fas fa-chart-line awesome-nav"></i></div>Dashboard</a>
                </li>

            </ul>
        </nav>
        <div class="nav-topbottom"></div>
    </div>
</div>
<!-- <div id="sidenavfix" class="sidenav-fix"></div> -->
