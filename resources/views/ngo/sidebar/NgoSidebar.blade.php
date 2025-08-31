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
                                <li><a class="dropdown-item" href="{{ route('addactivity') }}">Add Activity</a></li>
                            @endif
                            @if (!$isStaff || $user->hasPermission('activity-list'))
                                <li><a class="dropdown-item" href="{{ route('activitylist') }}">Activity List</a></li>
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
                                <li><a class="dropdown-item" href="{{ route('add.project') }}">Add Project</a></li>
                            @endif
                            @if (!$isStaff || $user->hasPermission('project-list'))
                                <li><a class="dropdown-item" href="{{ route('list.project') }}">Project List</a></li>
                            @endif
                            @if (!$isStaff || $user->hasPermission('report-list'))
                                <li><a class="dropdown-item" href="{{ route('list.project.report') }}">Project
                                        Report</a></li>
                            @endif
                        </ul>
                    </li>
                @endif

                <!-- Registration -->
                @if (
                    !$isStaff ||
                        $user->hasPermission('new-registration') ||
                        $user->hasPermission('pending-registration') ||
                        $user->hasPermission('approve-registration') ||
                        $user->hasPermission('recover-registration') ||
                        $user->hasPermission('reg-setting'))
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white" href="#" data-bs-toggle="dropdown">
                            <i class="fas fa-clipboard-list"></i> REGISTRATION
                        </a>
                        <ul class="dropdown-menu bg-primary">
                            @if (!$isStaff || $user->hasPermission('new-registration'))
                                <li><a class="dropdown-item" href="{{ route('registration') }}">New Registration</a>
                                </li>
                            @endif
                            @if (!$isStaff || $user->hasPermission('pending-registration'))
                                <li><a class="dropdown-item" href="{{ route('pending-registration') }}">Pending
                                        Registration</a></li>
                            @endif
                            @if (!$isStaff || $user->hasPermission('approve-registration'))
                                <li><a class="dropdown-item" href="{{ route('approve-registration') }}">Approve
                                        Registration</a></li>
                            @endif
                            @if (!$isStaff || $user->hasPermission('recover-registration'))
                                <li><a class="dropdown-item" href="{{ route('recover') }}">Deleted Registration</a>
                                </li>
                            @endif
                            {{-- @if (!$isStaff || $user->hasPermission('reg-setting'))
                                <li><a class="dropdown-item" href="{{ route('reg-setting') }}">Online Registration
                                        Setting</a></li>
                            @endif --}}
                        </ul>
                    </li>
                @endif

                <!-- Membership -->
                @if (
                    !$isStaff ||
                        $user->hasPermission('member-list') ||
                        $user->hasPermission('add-member-position') ||
                        $user->hasPermission('member-position-list') ||
                        $user->hasPermission('member-activity') ||
                        $user->hasPermission('active-members') ||
                        $user->hasPermission('inactive-members'))
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white" href="#" data-bs-toggle="dropdown">
                            <i class="fas fa-user-friends"></i> MEMBERSHIP
                        </a>
                        <ul class="dropdown-menu bg-primary">
                            @if (!$isStaff || $user->hasPermission('member-list'))
                                <li><a class="dropdown-item" href="{{ route('member-list') }}">Member List</a></li>
                            @endif
                            @if (!$isStaff || $user->hasPermission('add-member-position'))
                                <li><a class="dropdown-item" href="{{ route('add-member-list') }}">Add Member
                                        Position</a></li>
                            @endif
                            @if (!$isStaff || $user->hasPermission('member-position-list'))
                                <li><a class="dropdown-item" href="{{ route('member-position-list') }}">Member
                                        Position List</a></li>
                            @endif
                            @if (!$isStaff || $user->hasPermission('member-activity'))
                                <li><a class="dropdown-item" href="{{ route('member-activitylist') }}">Member
                                        Activity</a></li>
                            @endif
                            {{-- @if (!$isStaff || $user->hasPermission('active-members'))
                                <li><a class="dropdown-item" href="#">Active Members</a></li>
                            @endif
                            @if (!$isStaff || $user->hasPermission('inactive-members'))
                                <li><a class="dropdown-item" href="#">Unactive Members</a></li>
                            @endif --}}
                        </ul>
                    </li>
                @endif

                <!-- Donation -->
                @if (
                    !$isStaff ||
                        $user->hasPermission('donation') ||
                        $user->hasPermission('donation-list') ||
                        $user->hasPermission('online-donor-list') ||
                        $user->hasPermission('donation-card-list') ||
                        $user->hasPermission('all-donor-list') ||
                        $user->hasPermission('donation-report'))
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white" href="#" data-bs-toggle="dropdown"><i
                                class="fas fa-donate"></i> DONATION</a>
                        <ul class="dropdown-menu bg-primary">
                            @if (!$isStaff || $user->hasPermission('donation'))
                                <li><a class="dropdown-item" href="{{ route('donation') }}">Deposite Donations</a>
                                </li>
                            @endif
                            @if (!$isStaff || $user->hasPermission('donation-list'))
                                <li><a class="dropdown-item" href="{{ route('donation-list') }}">Donations List</a>
                                </li>
                            @endif
                            {{-- @if (!$isStaff || $user->hasPermission('online-donor-list'))
                                <li><a class="dropdown-item" href="{{ route('online-donor-list') }}">Online Donations
                                        List</a>
                                </li>
                            @endif --}}
                            {{-- @if (!$isStaff || $user->hasPermission('donation-card-list'))
                                <li><a class="dropdown-item" href="{{ route('donation-card-list') }}">Donation
                                        Card</a></li>
                            @endif --}}
                            @if (!$isStaff || $user->hasPermission('all-donor-list'))
                                <li><a href="{{ route('all-donor-list') }}" class="dropdown-item">All Donation
                                        List</a></li>
                            @endif
                            @if (!$isStaff || $user->hasPermission('donation-report'))
                                <li><a class="dropdown-item" href="{{ route('dontaion-report') }}">Donations
                                        Report</a></li>
                            @endif
                        </ul>
                    </li>
                @endif

                <!-- Gallery -->
                @if (!$isStaff || $user->hasPermission('add-photos') || $user->hasPermission('gallery-list'))
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white" href="#" data-bs-toggle="dropdown">
                            <i class="fas fa-images"></i> GALLERY
                        </a>
                        <ul class="dropdown-menu bg-primary">
                            @if (!$isStaff || $user->hasPermission('add-photos'))
                                <li><a class="dropdown-item" href="{{ route('add-photos') }}">Add Photos</a></li>
                            @endif
                            @if (!$isStaff || $user->hasPermission('gallery-list'))
                                <li><a class="dropdown-item" href="{{ route('gallery-list') }}">Manage Gallery</a>
                                </li>
                            @endif
                        </ul>
                    </li>
                @endif

                <!-- Notice -->
                @if (!$isStaff || $user->hasPermission('add-notice') || $user->hasPermission('notice-list'))
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white" href="#" data-bs-toggle="dropdown">
                            <i class="fas fa-bullhorn"></i> NOTICE
                        </a>
                        <ul class="dropdown-menu bg-primary">
                            @if (!$isStaff || $user->hasPermission('add-notice'))
                                <li><a class="dropdown-item" href="{{ route('add-notice') }}">Add Notice</a></li>
                            @endif
                            @if (!$isStaff || $user->hasPermission('notice-list'))
                                <li><a class="dropdown-item" href="{{ route('notice-list') }}">Notice List</a></li>
                            @endif
                        </ul>
                    </li>
                @endif

                <!-- SETTING -->
                @if (
                    !$isStaff ||
                        $user->hasPermission('add-working-area') ||
                        $user->hasPermission('working-area-list') ||
                        $user->hasPermission('signature') ||
                        $user->hasPermission('course-list') ||
                        $user->hasPermission('add-course-centre'))
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white" href="#" data-bs-toggle="dropdown">
                            <i class="fas fa-cogs"></i> SETTING
                        </a>
                        <ul class="dropdown-menu bg-primary">
                            @if (!$isStaff || $user->hasPermission('add-working-area'))
                                <li><a class="dropdown-item" href="{{ route('working-area') }}">Add Working Area</a>
                                </li>
                            @endif
                            @if (!$isStaff || $user->hasPermission('working-area-list'))
                                <li><a class="dropdown-item" href="{{ route('working-area-list') }}">Working Area
                                        List</a></li>
                            @endif
                            @if (!$isStaff || $user->hasPermission('signature'))
                                <li><a class="dropdown-item" href="{{ route('signature') }}">Signature</a></li>
                            @endif
                            <li><a class="dropdown-item" href="{{ route('add-session') }}">Add Session</a></li>
                            <li><a class="dropdown-item" href="{{ route('session-list') }}">Session List</a></li>
                            <li><a class="dropdown-item" href="{{ route('category.list') }}">Work Category</a></li>
                            @if (!$isStaff || $user->hasPermission('add-course-centre'))
                                <li><a class="dropdown-item" href="{{-- route('add.course') --}}">Add Course For Training
                                        Centre</a>
                                </li>
                            @endif
                            @if (!$isStaff || $user->hasPermission('course-list'))
                                <li><a class="dropdown-item" href="{{-- route('list.course') --}}">Course List</a></li>
                            @endif
                            <li><a class="dropdown-item" href="{{-- route('email.list') --}}">Emails</a></li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>
