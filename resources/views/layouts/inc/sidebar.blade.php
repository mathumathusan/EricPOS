<aside class="app-sidebar sticky" id="sidebar">

    <!-- Start::main-sidebar-header -->
    <div class="main-sidebar-header">
        <a href="{{ route('dashboard') }}" class="header-logo">
            <img src="{{ asset('assets/images/lonceybiz/loncey_semi.png') }}" alt="logo" class="desktop-logo">
            <img src="{{ asset('assets/images/lonceybiz/favicon.png') }}" alt="logo" class="toggle-logo">
            <img src="{{ asset('assets/images/lonceybiz/loncey_semi.png') }}" alt="logo" class="desktop-dark">
            <img src="{{ asset('assets/images/lonceybiz/favicon.png') }}" alt="logo" class="toggle-dark">
            <img src="{{ asset('assets/images/lonceybiz/loncey-logo.png') }}" alt="logo" class="desktop-white">
            <img src="{{ asset('assets/images/lonceybiz/favicon.png') }}" alt="logo" class="toggle-white">
        </a>
    </div>
    <!-- End::main-sidebar-header -->

    <!-- Start::main-sidebar -->
    <div class="main-sidebar" id="sidebar-scroll">

        <!-- Start::nav -->
        <nav class="main-menu-container nav nav-pills flex-column sub-open">
            <div class="slide-left" id="slide-left">
                <svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24" viewBox="0 0 24 24">
                    <path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z"></path>
                </svg>
            </div>
            <ul class="main-menu">
                <!-- Start::slide__category -->
                <li class="slide__category"><span class="category-name">Loncey Biz</span></li>
                <!-- End::slide__category -->
                @can('view_dashboard')
                <li class="slide">
                    <a href="{{ route('dashboard') }}"
                        class="side-menu__item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                        <i class="bx bx-home side-menu__icon"></i>
                        <span class="side-menu__label">Dashboard</span>
                    </a>
                </li>
                @endcan

                @can('view_locations')
                <li class="slide">
                    <a href="{{ route('locations') }}"
                        class="side-menu__item {{ request()->routeIs('locations') ? 'active' : '' }}">
                        <i class="bx bx-map side-menu__icon"></i>
                        <span class="side-menu__label">Locations</span>
                    </a>
                </li>
                @endcan

                @can('view_customers')
                <li class="slide">
                    <a href="{{ route('customers') }}"
                        class="side-menu__item {{ request()->routeIs('customers') ? 'active' : '' }}">
                        <i class="bx bx-user-pin side-menu__icon"></i>
                        <span class="side-menu__label">Customers</span>
                    </a>
                </li>
                @endcan

                @can('view_users')
                <!-- Start::slide__category -->
                <li class="slide__category"><span class="category-name">Users & Permissions</span></li>
                <!-- End::slide__category -->

                <!-- Start::slide -->
                <li class="slide has-sub {{ request()->routeIs(['users','user-permissions','user-roles','users.add']) ? 'active open' : '' }}">
                    <a href="javascript:void(0);" class="side-menu__item {{ request()->routeIs(['users','user-permissions','user-roles','users.add']) ? 'active' : '' }}">
                        <i class="bx bx-group side-menu__icon"></i>
                        <span class="side-menu__label">Users</span>
                        <i class="fe fe-chevron-right side-menu__angle"></i>
                    </a>
                    <ul class="slide-menu child1">
                        <li class="slide side-menu__label1">
                            <a href="javascript:void(0)">Users</a>
                        </li>
                        <li class="slide">
                            <a href="{{ route('users') }}" class="side-menu__item {{ request()->routeIs('users') ? 'active' : '' }}">All Users</a>
                        </li>
                        @can('view_permissions')
                        <li class="slide">
                            <a href="{{ route('user-permissions') }}" class="side-menu__item {{ request()->routeIs('user-permissions') ? 'active' : '' }}">Permissions</a>
                        </li>
                        @endcan
                        @can('view_roles')
                        <li class="slide">
                            <a href="{{ route('user-roles') }}" class="side-menu__item {{ request()->routeIs('user-roles') ? 'active' : '' }}">Roles</a>
                        </li>
                        @endcan
                        @can('add_users')
                        <li class="slide">
                            <a href="{{ route('users.add') }}" class="side-menu__item {{ request()->routeIs('users.add') ? 'active' : '' }}">New User</a>
                        </li>
                        @endcan
                    </ul>
                </li>
                <!-- End::slide -->

                @endcan

                @if (false)


                <!-- Start::slide__category -->
                <li class="slide__category"><span class="category-name">Tables &amp; Charts</span></li>
                <!-- End::slide__category -->

                <!-- Start::slide -->
                <li class="slide has-sub">
                    <a href="javascript:void(0);" class="side-menu__item">
                        <i class="bx bx-table side-menu__icon"></i>
                        <span class="side-menu__label">Tables<span
                                class="badge bg-success-transparent ms-2">3</span></span>
                        <i class="fe fe-chevron-right side-menu__angle"></i>
                    </a>
                    <ul class="slide-menu child1">
                        <li class="slide side-menu__label1">
                            <a href="javascript:void(0)">Tables</a>
                        </li>
                        <li class="slide">
                            <a href="tables.html" class="side-menu__item">Tables</a>
                        </li>
                        <li class="slide">
                            <a href="grid-tables.html" class="side-menu__item">Grid JS Tables</a>
                        </li>
                        <li class="slide">
                            <a href="data-tables.html" class="side-menu__item">Data Tables</a>
                        </li>
                    </ul>
                </li>
                <!-- End::slide -->
                @endif
            </ul>
            <div class="slide-right" id="slide-right"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24"
                    height="24" viewBox="0 0 24 24">
                    <path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z"></path>
                </svg></div>
        </nav>
        <!-- End::nav -->

    </div>
    <!-- End::main-sidebar -->

</aside>
