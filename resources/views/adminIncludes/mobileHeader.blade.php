<!-- HEADER MOBILE-->
<header class="header-mobile d-block d-lg-none">
    <div class="header-mobile__bar">
        <div class="container-fluid">
            <div class="header-mobile-inner">
                <a class="logo" href="#">
                    <img src="{{asset('admin_assets/images/logo_header.png')}}" alt="AGHS" width="80px" height="80px"/>
                </a>
                <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                </button>
            </div>
        </div>
    </div>
    <nav class="navbar-mobile">
        <div class="container-fluid">
            <ul class="navbar-mobile__list list-unstyled">
                <li class="active has-sub">
                    <a class="js-arrow" href="#">
                        <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                </li>
                <li>
                    <a href="{{route('students')}}">
                        <i class="fas fa-copy"></i>Students</a>
                </li>
                <li>
                    <a href="{{route('results')}}">
                        <i class="fas fa-chart-bar"></i>Results</a>
                </li>
                <li>
                    <a href="{{route('slips')}}">
                        <i class="fas fa-table"></i>Roll No Slip's</a>
                </li>
            </ul>
        </div>
    </nav>
</header>
<!-- END HEADER MOBILE-->
