<ul class="navbar-nav bg-light sidebar sidebar-light accordion border-end" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center border-bottom"
        href="{{ url('admin/dashboard') }}">
        <div class="sidebar-brand-text">CA<span style="color: #1cc88f">R</span>ENTAL</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0 ">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active border-bottom">
        <a class="nav-link text-success" href="{{ url('admin/dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <div class="sidebar-heading text-success">
        Management
    </div>

    <li class="nav-item border-bottom">
        <a class="nav-link collapsed fw-bold text-dark" href="#" data-toggle="collapse" data-target="#collapseOne"
            aria-expanded="true" aria-controls="collapseOne">
            <i class="fas fa-fw fa-user"></i>
            <span>User</span>
        </a>
        <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Action</h6>
                <a class="collapse-item" href="{{ url('admin/users') }}">
                    <span class="ml-3">User List</span></a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item border-bottom">
        <a class="nav-link collapsed fw-bold text-dark" href="#" data-toggle="collapse"
            data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
            <i class="fas fa-fw fa-car"></i>
            <span>Car</span>
        </a>
        <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Action</h6>
                <a class="collapse-item" href="{{ url('admin/cars') }}">
                    <span class="ml-3">Car List</span>
                </a>
                <a class="collapse-item" href="{{route('feature')}}">
                    <span class="ml-3">Features</span>
                </a>
            </div>
        </div>
    </li>

    <li class="nav-item border-bottom">
        <a class="nav-link fw-bold text-dark" href="{{ route('brand') }}">
            <i class="fa-sharp fa-solid fa-bars"></i>
            <span>Brand</span>
        </a>
    </li>

    <li class="nav-item border-bottom">
        <a class="nav-link fw-bold text-dark" href="{{ route('blogs.index') }}">
            <i class="fa-solid fa-square-rss"></i>
            <span>Blog</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">
</ul>
