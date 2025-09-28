<!-- MENU SIDEBAR-->
<aside class="menu-sidebar d-none d-lg-block bg-light">
    <div class="text-center py-3 border-bottom">
        <img src="{{ asset('admin_assets/images/logo_header.jpg') }}" alt="Cool Admin" class="img-fluid sidebar-logo" style="max-height: 60px; width: fit-content;" />
    </div>
    
    <div class="menu-sidebar__content h-100 overflow-auto">
        <nav class="navbar-sidebar p-3">
            <ul class="list-unstyled navbar__list m-0">
                <!-- Dashboard -->
                <li class="nav-item active mb-1">
                    <a class="nav-link d-flex align-items-center text-dark py-2 px-3 rounded" href="{{ route('panel') }}">
                        <i class="fas fa-tachometer-alt mr-3"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                
                <!-- Students -->
                <li class="nav-item mb-1">
                    <a class="nav-link d-flex align-items-center text-dark py-2 px-3 rounded" href="{{ route('students') }}">
                        <i class="fas fa-copy mr-3"></i>
                        <span>Students</span>
                    </a>
                </li>
                
                <!-- Results -->
                <li class="nav-item mb-1">
                    <a class="nav-link d-flex align-items-center text-dark py-2 px-3 rounded" href="{{ route('results') }}">
                        <i class="fas fa-chart-bar mr-3"></i>
                        <span>Results</span>
                    </a>
                </li>
                
                <!-- Roll No Slips -->
                <li class="nav-item mb-1">
                    <a class="nav-link d-flex align-items-center text-dark py-2 px-3 rounded" href="{{ route('slips') }}">
                        <i class="fas fa-table mr-3"></i>
                        <span>Roll No Slip's</span>
                    </a>
                </li>
                
                <!-- Short Courses -->
                <li class="nav-item mb-1">
                    <a class="nav-link d-flex align-items-center text-dark py-2 px-3 rounded" href="{{ route('certificates') }}">
                        <i class="fas fa-trophy mr-3"></i>
                        <span>Short Courses</span>
                    </a>
                </li>
                
                <!-- Notifications -->
                <li class="nav-item mb-1">
                    <a class="nav-link d-flex align-items-center text-dark py-2 px-3 rounded" href="{{ route('notifications') }}">
                        <i class="fas fa-flag mr-3"></i>
                        <span>Notifications</span>
                    </a>
                </li>

                   
                <!-- Fees -->
                <li class="nav-item mb-1">
                    <a class="nav-link d-flex align-items-center text-dark py-2 px-3 rounded" href="{{ route('fees') }}">
                        <i class="fas fa-calculator mr-3"></i>
                        <span>Fees</span>
                    </a>
                </li>
                
                <!-- Notes -->
                <li class="nav-item mb-1">
                    <a class="nav-link d-flex align-items-center text-dark py-2 px-3 rounded" href="{{ route('notes.index') }}">
                        <i class="fas fa-address-card mr-3"></i>
                        <span>Notes</span>
                    </a>
                </li>
                
                <!-- Management Dropdown -->
                <li class="nav-item mb-1">
                    <a class="nav-link d-flex align-items-center justify-content-between text-dark py-2 px-3 rounded" data-toggle="collapse" href="#managementCollapse" role="button">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-cog mr-3"></i>
                            <span>Management</span>
                        </div>
                        <i class="fas fa-angle-down"></i>
                    </a>
                    <div class="collapse" id="managementCollapse">
                        <ul class="list-unstyled pl-4 mt-2">
                            <li class="nav-item mb-1">
                                <a class="nav-link d-flex align-items-center text-dark py-2 px-3 rounded" href="{{ route('banners') }}">
                                    <i class="fas fa-sliders mr-3"></i>
                                    <span>Banners</span>
                                </a>
                            </li>
                            <li class="nav-item mb-1">
                                <a class="nav-link d-flex align-items-center text-dark py-2 px-3 rounded" href="{{ route('grades.index') }}">
                                    <i class="fas fa-address-card mr-3"></i>
                                    <span>Classes</span>
                                </a>
                            </li>
                            <li class="nav-item mb-1">
                                <a class="nav-link d-flex align-items-center text-dark py-2 px-3 rounded" href="{{ route('subjects.index') }}">
                                    <i class="fas fa-address-card mr-3"></i>
                                    <span>Subjects</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                
                <!-- E-Books Dropdown -->
                <li class="nav-item mb-1">
                    <a class="nav-link d-flex align-items-center justify-content-between text-dark py-2 px-3 rounded" data-toggle="collapse" href="#ebooksCollapse" role="button">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-book mr-3"></i>
                            <span>E-Books</span>
                        </div>
                        <i class="fas fa-angle-down"></i>
                    </a>
                    <div class="collapse" id="ebooksCollapse">
                        <ul class="list-unstyled pl-4 mt-2">
                            <li class="nav-item mb-1">
                                <a class="nav-link d-flex align-items-center text-dark py-2 px-3 rounded" href="{{ route('ebooks.index') }}">
                                    <i class="fas fa-list mr-3"></i>
                                    <span>Manage E-Books</span>
                                </a>
                            </li>
                            <li class="nav-item mb-1">
                                <a class="nav-link d-flex align-items-center text-dark py-2 px-3 rounded" href="{{ route('authors.index') }}">
                                    <i class="fas fa-user mr-3"></i>
                                    <span>Authors</span>
                                </a>
                            </li>
                            <li class="nav-item mb-1">
                                <a class="nav-link d-flex align-items-center text-dark py-2 px-3 rounded" href="{{ route('genres.index') }}">
                                    <i class="fas fa-tags mr-3"></i>
                                    <span>Genres</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </nav>
    </div>
</aside>
<!-- END MENU SIDEBAR-->