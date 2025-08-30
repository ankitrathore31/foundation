@extends('home.layout.master')
@section('content')
    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb" class="bg-light py-3 mb-4 shadow-sm">
        <div class="container">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Notices</li>
            </ol>
        </div>
    </nav>

    <!-- Notices Section -->
    <div class="container mb-5">
        <h2 class="mb-4 text-center"><strong>Notices</strong></h2>
    </div>
    <div class="container my-4">
        <div class="card shadow border-0">
            <div class="card-header text-white" style="background-color: #FF9933;">
                <h4 class="mb-0 text-center fw-bold">📌 Notice Board</h4>
            </div>
            <div class="card-body" style="background-color: #FFF8E7;">
                @forelse($notice as $notice)
                    <div class="card mb-3 shadow-sm border-left" style="border-left: 6px solid #FF9933;">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <h5 class="card-title text-dark fw-bold mb-1">
                                    {{ $notice->academic_session }}
                                </h5>
                                <span class="badge bg-warning text-dark">
                                    📅 {{ \Carbon\Carbon::parse($notice->date)->format('d M Y') }}
                                </span>
                            </div>
                            <p class="card-text mt-2 text-muted">
                                {{ $notice->notice }}
                            </p>
                        </div>
                    </div>
                @empty
                    <div class="alert alert-info text-center">
                        No notices available right now.
                    </div>
                @endforelse
            </div>
        </div>
    </div>
@endsection
