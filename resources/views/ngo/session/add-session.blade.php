@extends('ngo.layout.master')
@Section('content')
    <div class="main-wrapper">
        <div class="page-wrapper">
            <div class=" container-fluid">
                <!-- Breadcrumb -->
                <div class="row d-flex justify-content-end m-4">
                    <div class="col-auto">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href=" {{-- route('admin') --}}">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Add Session</li>
                            </ol>
                        </nav>
                    </div>
                </div>
                {{-- Display success message if present --}}
                @if (session('Success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('Success') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                {{-- Display error message if present --}}
                @if (session('Error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('Error') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif


                <div class="row mt-5">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ route('save-session') }}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-12">
                                            <h5 class="form-title"><span>Session</span></h5>
                                        </div>

                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms">
                                                <label>Session Year <span class="login-danger">*</span></label>
                                                <input type="text"
                                                    class="form-control @error('session') is-invalid @enderror"
                                                    name="session" value="{{ old('session') }}"
                                                    placeholder="Enter session (e.g. 2025-26)" autocomplete="off">
                                                @error('session')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                        </div>

                                        <div class="col-12">
                                            <div class="student-submit text-end">
                                                <button type="submit" class="btn btn-warning">Submit</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
