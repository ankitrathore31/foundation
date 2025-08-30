@extends('ngo.layout.master')
@section('content')
    <style>
        .card-hover {
            border-radius: 18px;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.15);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card-hover:hover {
            transform: translateY(-6px);
            box-shadow: 0 12px 25px rgba(0, 0, 0, 0.25);
        }

        /* 🎨 Gradient backgrounds */
        .bg-gradient-primary {
            background: linear-gradient(135deg, #4e54c8, #8f94fb);
        }

        .bg-gradient-warning {
            background: linear-gradient(135deg, #f7971e, #ffd200);
        }

        .bg-gradient-success {
            background: linear-gradient(135deg, #11998e, #38ef7d);
        }

        .bg-gradient-danger {
            background: linear-gradient(135deg, #e53935, #e35d5b);
        }

        .bg-gradient-info {
            background: linear-gradient(135deg, #36d1dc, #5b86e5);
        }


        .card i {
            display: block;
        }

        .card p {
            font-size: 0.9rem;
            margin: 0;
        }

        .card h5 {
            font-weight: bold;
        }
    </style>
    <div class="container-fluid my-4">
        @php
            $user = auth()->user();
            $isStaff = $user && $user->user_type === 'staff';
        @endphp
        <div class=" mt-4">
            <div class="container my-4">
                @if (!$isStaff || $user->hasPermission('new-registration') || $user->hasPermission('pending-registration'))
                    <h5 class=" fw-bold mb-2">- Registration </h5>

                    <div class="row g-3">
                        <div class="col-md-3 col-sm-6 mb-3">
                            <div class="card text-white bg-gradient-primary p-3 h-100 card-hover">
                                <div class="d-flex align-items-center">
                                    <i class="fas fa-user-plus fa-2x me-3"></i>
                                    <div>
                                        <p class="mb-1">Total Registration</p>
                                        <h5 class="mb-0">{{-- totalReg() --}}</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 mb-3">
                            <div class="card text-white bg-gradient-warning p-3 h-100 card-hover">
                                <div class="d-flex align-items-center">
                                    <i class="fas fa-clock fa-2x me-3"></i>
                                    <div>
                                        <p class="mb-1">Pending Registration</p>
                                        <h5 class="mb-0">{{-- totalPendingReg() --}}</h5>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3 col-sm-6 mb-3">
                            <div class="card text-white bg-gradient-success p-3 h-100 card-hover">
                                <div class="d-flex align-items-center">
                                    <i class="fas fa-check-circle fa-2x me-3"></i>
                                    <div>
                                        <p class="mb-1">Approved Registration</p>
                                        <h5 class="mb-0">{{-- totalApprovedReg() --}}</h5>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3 col-sm-6 mb-3">
                            <div class="card text-white bg-gradient-danger p-3 h-100 card-hover">
                                <div class="d-flex align-items-center">
                                    <i class="fas fa-times-circle fa-2x me-3"></i>
                                    <div>
                                        <p class="mb-1">Rejected Registration</p>
                                        <h5 class="mb-0">{{-- totalRejectedReg() --}}</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif

                @if (!$isStaff || $user->hasPermission('beneficiarie-add') || $user->hasPermission('all-beneficiarie-list'))
                    <h5 class=" fw-bold mb-2">- Beneficiaries </h5>

                    <div class="row g-3">
                        <div class="col-md-3 col-sm-6 mb-3">
                            <div class="card text-white bg-gradient-primary p-3 h-100 card-hover">
                                <div class="d-flex align-items-center">
                                    <i class="fas fa-user-plus fa-2x me-3"></i>
                                    <div>
                                        <p class="mb-1">Total Beneficiaries</p>
                                        <h5 class="mb-0">{{-- $allbene --}}</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 mb-3">
                            <div class="card text-white bg-gradient-warning p-3 h-100 card-hover">
                                <div class="d-flex align-items-center">
                                    <i class="fas fa-clock fa-2x me-3"></i>
                                    <div>
                                        <p class="mb-1">Pending Beneficiaries</p>
                                        <h5 class="mb-0">{{-- $penbene --}}</h5>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3 col-sm-6 mb-3">
                            <div class="card text-white bg-gradient-success p-3 h-100 card-hover">
                                <div class="d-flex align-items-center">
                                    <i class="fas fa-check-circle fa-2x me-3"></i>
                                    <div>
                                        <p class="mb-1">Approved Beneficiaries</p>
                                        <h5 class="mb-0">{{-- $apbene --}}</h5>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3 col-sm-6 mb-3">
                            <div class="card text-white bg-gradient-danger p-3 h-100 card-hover">
                                <div class="d-flex align-items-center">
                                    <i class="fas fa-times-circle fa-2x me-3"></i>
                                    <div>
                                        <p class="mb-1">Rejected Beneficiaries</p>
                                        <h5 class="mb-0">{{-- $rebene --}}</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
                @if (
                    !$isStaff ||
                        ($user->hasPermission('add-activity') ||
                            $user->hasPermission('activity-list') ||
                            $user->hasPermission('add-event') ||
                            $user->hasPermission('event-list')))
                    <div class="row ">
                        <h5 class="fw-bold mb-2">- Activities</h5>
                        @if (!$isStaff || $user->hasPermission('add-activity'))
                            <div class="col-md-3 col-sm-6 mb-3">
                                <div class="card text-white bg-gradient-info p-3 h-100 card-hover">
                                    <div class="d-flex align-items-center">
                                        <i class="fas fa-running fa-2x me-3"></i>
                                        <div>
                                            <p class="mb-1">Today's Activities</p>
                                            <h5 class="mb-0">{{todayActivities()}}</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3 col-sm-6 mb-3">
                                <div class="card text-white bg-gradient-warning p-3 h-100 card-hover">
                                    <div class="d-flex align-items-center">
                                        <i class="fas fa-clipboard-list fa-2x me-3"></i>
                                        <div>
                                            <p class="mb-1">Total Activities</p>
                                            <h5 class="mb-0">{{totalActivities()}}</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                @endif
                @if (
                    !$isStaff ||
                        $user->hasPermission('member-list') ||
                        $user->hasPermission('add-member-position') ||
                        $user->hasPermission('member-position-list') ||
                        $user->hasPermission('member-activity') ||
                        $user->hasPermission('active-members') ||
                        $user->hasPermission('inactive-members'))
                    <div class="row">
                        <h5 class="fw-bold mb-2">- Memebers</h5>
                        <div class="col-md-4 col-sm-6 mb-3">
                            <div class="card text-white bg-gradient-success p-3 h-100 card-hover">
                                <div class="d-flex align-items-center">
                                    <i class="fas fa-users fa-2x me-3"></i>
                                    <div>
                                        <p class="mb-1">Total Members</p>
                                        <h5 class="mb-0">{{-- $allmem --}}</h5>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 col-sm-6 mb-3">
                            <div class="card text-white bg-gradient-success p-3 h-100 card-hover">
                                <div class="d-flex align-items-center">
                                    <i class="fas fa-check-circle fa-2x me-3"></i>
                                    <div>
                                        <p class="mb-1">Active Members</p>
                                        <h5 class="mb-0">{{-- $appmem --}}</h5>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 col-sm-6 mb-3">
                            <div class="card text-white bg-gradient-danger p-3 h-100 card-hover">
                                <div class="d-flex align-items-center">
                                    <i class="fas fa-times-circle fa-2x me-3"></i>
                                    <div>
                                        <p class="mb-1">Inactive Members</p>
                                        <h5 class="mb-0">{{-- $penmem --}}</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
                @if (
                    !$isStaff ||
                        $user->hasPermission('donation') ||
                        $user->hasPermission('donation-list') ||
                        $user->hasPermission('online-donor-list') ||
                        $user->hasPermission('donation-card-list') ||
                        $user->hasPermission('all-donor-list') ||
                        $user->hasPermission('donation-report'))
                    <div class="row">
                        <h5 class="fw-bold mb-2">- Donation</h5>
                        @if (!$isStaff || $user->hasPermission('donation'))
                            <div class="col-md-3 col-sm-6 mb-3">
                                <div class="card text-white bg-gradient-success p-3 h-100 card-hover">
                                    <div class="d-flex align-items-center">
                                        <i class="fas fa-hand-holding-usd fa-2x me-3"></i>
                                        <div>
                                            <p class="mb-1">Today's Donation</p>
                                            <h5 class="mb-0">₹ {{-- number_format($todaydonate, 2) --}}</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                        @if (!$isStaff || $user->hasPermission('onilne-donor-list'))
                            <div class="col-md-3 col-sm-6 mb-3">
                                <div class="card text-white bg-gradient-primary p-3 h-100 card-hover">
                                    <div class="d-flex align-items-center">
                                        <i class="fas fa-donate fa-2x me-3"></i>
                                        <div>
                                            <p class="mb-1">Total Online Donation</p>
                                            <h5 class="mb-0">₹ {{-- number_format($succdonate, 2) --}}</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                        @if (!$isStaff || $user->hasPermission('donation-list'))
                            <div class="col-md-3 col-sm-6 mb-3">
                                <div class="card text-white bg-gradient-info p-3 h-100 card-hover">
                                    <div class="d-flex align-items-center">
                                        <i class="fas fa-donate fa-2x me-3"></i>
                                        <div>
                                            <p class="mb-1">Total Offline Donation</p>
                                            <h5 class="mb-0">₹ {{-- number_format($offlinedonate,2) --}}</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                        @if (!$isStaff || $user->hasPermission('all-donor-list'))
                            <div class="col-md-3 col-sm-6 mb-3">
                                <div class="card text-white bg-gradient-success p-3 h-100 card-hover">
                                    <div class="d-flex align-items-center">
                                        <i class="fas fa-hand-holding-usd fa-2x me-3"></i>
                                        <div>
                                            <p class="mb-1">Total Donation</p>
                                            <h5 class="mb-0">₹ {{-- number_format($totaldonation, 2) --}}</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
