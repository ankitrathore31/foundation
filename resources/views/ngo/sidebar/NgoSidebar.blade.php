<style>
    /* Navbar gradient background */
    .navbar-gradient {
        background: linear-gradient(90deg, #ff512f, #f09819);
        /* red to saffron */
    }

    /* Navbar text styling */
    .navbar-nav .nav-link {
        color: white;
        font-size: 16px;
        font-weight: 500;
        transition: all 0.3s ease;
    }

    /* Navbar item hover effect */
    .navbar-nav .nav-link:hover {
        background-color: rgba(255, 255, 255, 0.15);
        border-radius: 6px;
        padding: 6px 12px;
    }

    /* Dropdown hover effect */
    .navbar-nav .nav-item.dropdown:hover>.dropdown-menu {
        display: block;
        animation: fadeIn 0.3s ease;
        /* z-index: 10 !important; */
    }

    /* Dropdown menu gradient */
    .navbar-nav .dropdown-menu {
        display: none;
        background: linear-gradient(90deg, #ff512f, #f09819);
        border: none;
        border-radius: 8px;
        padding: 0.5rem 0;
    }

    /* Dropdown item */
    .dropdown-item {
        color: white;
        font-size: 14px;
        font-weight: 500;
        transition: all 0.3s ease;
    }

    /* Dropdown item hover */
    .dropdown-item:hover {
        background-color: rgba(255, 255, 255, 0.2);
        border-radius: 5px;
        padding-left: 18px;
        /* smooth slide-in */
    }

    /* Dropdown animation */
    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(-5px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Navbar brand */
    .navbar-brand {
        font-size: 22px;
        font-weight: bold;
        color: white !important;
    }

    /* Toggler (mobile) */
    .navbar-toggler {
        border: 1px solid rgba(255, 255, 255, 0.4);
    }
</style>

<!-- Navbar -->
<nav class="navbar navbar-expand-md navbar-gradient">
    <div class="container-fluid">
        <!-- Toggle for Mobile -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar"
            aria-controls="mainNavbar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        @php
            $user = auth()->user();
            $isStaff = $user && $user->user_type === 'staff';
        @endphp

        <!-- Navbar content -->
        <div class="collapse navbar-collapse" id="mainNavbar">
            <ul class="navbar-nav flex-wrap w-100 justify-content-center overflow-auto">

                <li class="nav-item">
                    <a href="{{ route('ngo') }}" class="nav-link"><i class="fas fa-tachometer-alt"></i>
                        DASHBOARD</a>
                </li>

                <!-- ACTIVITY -->
                @if (!$isStaff || ($user->hasPermission('add-activity') || $user->hasPermission('activity-list')))
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
                            <i class="fas fa-tasks"></i> ACTIVITY
                        </a>
                        <ul class="dropdown-menu">
                            @if (!$isStaff || $user->hasPermission('add-activity'))
                                <li><a class="dropdown-item" href="{{-- route('addactivity') --}}">Add Activity</a></li>
                            @endif
                            @if (!$isStaff || $user->hasPermission('activity-list'))
                                <li><a class="dropdown-item" href="{{-- route('activitylist') --}}">Activity List</a></li>
                            @endif
                        </ul>
                    </li>
                @endif

                <!-- PROJECT -->
                @if (
                    !$isStaff ||
                        $user->hasPermission('add-project') ||
                        $user->hasPermission('project-list') ||
                        $user->hasPermission('report-list'))
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
                            <i class="fas fa-tasks"></i> PROJECT
                        </a>
                        <ul class="dropdown-menu">
                            @if (!$isStaff || $user->hasPermission('add-project'))
                                <li><a class="dropdown-item" href="{{-- route('add.project') --}}">Add Project</a></li>
                            @endif
                            @if (!$isStaff || $user->hasPermission('project-list'))
                                <li><a class="dropdown-item" href="{{-- route('list.project') --}}">Project List</a></li>
                            @endif
                            @if (!$isStaff || $user->hasPermission('report-list'))
                                <li><a class="dropdown-item" href="{{-- route('list.project.report') --}}">Project Report</a></li>
                            @endif
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>
