<style>
    .header {
        padding: 15px 0;
    }
</style>

<!-- Header Section -->
<header class="container-fluid shadow-sm py-2">
    <div class="row align-items-center">
        <!-- Left: Logo + School Info -->
        <div class="col-md-6 d-flex align-items-center">
            <img src="{{ asset('images/logo1.png') }}" alt="Logo" width="60" height="60" class="me-2">
            <div>
                <h6 class="mb-0 fw-bold text-uppercase">DAYARAM CHARITABLE FOUNDATION</h6>
                <small class="text-muted">JANGROLI PUL PILIBHIT UTTAR- PRADESH INDIA 262001</small>
            </div>
        </div>


        <!-- Right: User Info + Dropdown -->
        <div class="col-md-6 text-end">
            <div class="dropdown">
                <a href="#" class="d-inline-flex align-items-center text-decoration-none dropdown-toggle"
                    id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="{{ asset('images/LOGO1.png') }}" alt="User" width="48" height="48"
                        class="rounded-circle shadow-sm me-2">
                    <div class="text-start">
                        <div class="fw-semibold text-dark fs-6">{{auth()->user()->name}}</div>
                        @php $user = auth()->user(); @endphp
                        <small class="text-muted fst-italic">@if($user->user_type == 'staff'){{$user->staff->position}}@endif
                        @if($user->user_type == 'ngo')Founder
                        @endif
                        </small>
                    </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end mt-2 shadow-sm border-0" aria-labelledby="userDropdown">
                    <li><a class="dropdown-item text-dark fw-medium" href="{{route('profile')}}"><i
                                class="fas fa-user me-2 text-primary"></i>Profile</a></li>
                    <li><a class="dropdown-item text-dark fw-medium" href="{{route('change.pass.show')}}"><i
                                class="fas fa-cog me-2 text-secondary"></i>Change Password</a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li>
                        <form method="POST" action="{{ route('logout') }}" class="px-3">
                            @csrf
                            <a class="btn btn-sm btn-danger w-100 fw-semibold" href="{{ route('logout') }}"
                                onclick="event.preventDefault(); this.closest('form').submit();">
                                <i class="fas fa-sign-out-alt me-1"></i> Log Out
                            </a>
                        </form>
                    </li>
                </ul>
            </div>
        </div>

    </div>
</header>
