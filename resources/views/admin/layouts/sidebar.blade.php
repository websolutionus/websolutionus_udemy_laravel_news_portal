<div class="navbar-bg"></div>
<!-- Navbar Start -->
@include('admin.layouts.navbar')
<!-- Navbar End -->

<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">Stisla</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">St</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="active">
                <a href="#" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a>
            </li>
            <li class="menu-header">Starter</li>
            <li><a class="nav-link" href="{{ route('admin.category.index') }}"><i class="far fa-square"></i>
                    <span>Category</span></a></li>

            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="far fa-file-alt"></i> <span>News</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ route('admin.news.index') }}">All News</a></li>
                    <li><a class="nav-link" href="forms-editor.html">Editor</a></li>
                    <li><a class="nav-link" href="forms-validation.html">Validation</a></li>
                </ul>
            </li>

            <li><a class="nav-link" href="{{ route('admin.social-count.index') }}"><i class="far fa-square"></i>
            <span>Social Count</span></a></li>

            <li><a class="nav-link" href="{{ route('admin.home-section-setting.index') }}"><i class="far fa-square"></i>
                <span>Home Section Setting</span></a></li>

            <li><a class="nav-link" href="{{ route('admin.ad.index') }}"><i class="far fa-square"></i>
                <span>Advertisement</span></a></li>

            <li><a class="nav-link" href="{{ route('admin.language.index') }}"><i class="far fa-square"></i>
                    <span>Languages</span></a></li>

            <li><a class="nav-link" href="{{ route('admin.subscribers.index') }}"><i class="far fa-square"></i>
                <span>Subscribers</span></a></li>

            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="far fa-file-alt"></i> <span>Footer Setting</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ route('admin.social-link.index') }}">Social Links</a></li>

                </ul>
            </li>



            {{-- <li><a class="nav-link" href="blank.html"><i class="far fa-square"></i> <span>Blank Page</span></a></li> --}}

            {{-- <li class="dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="far fa-file-alt"></i> <span>Forms</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="forms-advanced-form.html">Advanced Form</a></li>
                    <li><a class="nav-link" href="forms-editor.html">Editor</a></li>
                    <li><a class="nav-link" href="forms-validation.html">Validation</a></li>
                </ul>
            </li> --}}

        </ul>
    </aside>
</div>
