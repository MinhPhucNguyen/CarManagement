<ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ url('admin/dashboard') }}">
        <div class="sidebar-brand-text">Management</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0 ">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
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

    <li class="nav-item">
        <a class="nav-link collapsed fw-bold" href="#" data-toggle="collapse" data-target="#collapseOne"
            aria-expanded="true" aria-controls="collapseOne">
            <i class="fas fa-fw fa-user"></i>
            <span>User</span>
        </a>
        <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Action</h6>
                <a class="collapse-item" href="{{ url('admin/users') }}">View Users</a>
                <a class="collapse-item" href="{{ route('users.create') }}">Add New User</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link fw-bold" href="{{route('brand')}}">
            <i class="fa-sharp fa-solid fa-bars"></i>
            <span>Brand</span>
        </a>
    </li>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed fw-bold" href="#" data-toggle="collapse" data-target="#collapseThree"
            aria-expanded="true" aria-controls="collapseThree">
            <i class="fas fa-fw fa-car"></i>
            <span>Car</span>
        </a>
        <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Action</h6>
                <a class="collapse-item" href="{{ url('admin/cars') }}">View Cars</a>
                <a class="collapse-item" href="{{ route('cars.create') }}">Create New Car</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">
</ul>
