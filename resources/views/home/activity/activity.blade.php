@extends('home.layout.master')
@section('content')
    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb" class="bg-light py-3 mb-4">
        <div class="container">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Activities</li>
            </ol>
        </div>
    </nav>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <form method="GET" action="{{ route('activity') }}" class="row g-3 mb-4">
                    <div class="col-md-4">
                        {{-- <label for="session_filter" class="form-label">Select Session</label> --}}
                        <select name="session_filter" id="session_filter" class="form-control">
                            <option value="">All Sessions</option> <!-- Default option to show all -->
                            @foreach (Session::get('all_academic_session') as $session)
                                <option value="{{ $session->session_date }}"
                                    {{ request('session_filter') == $session->session_date ? 'selected' : '' }}>
                                    {{ $session->session_date }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4 mb-3">
                        <select id="program_category"
                            class="form-control select @error('program_category') is-invalid @enderror"
                            name="program_category">
                            <option value="" selected>Select project/Work Category</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category }}">{{ $category }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-4 mb-3 form-group local-from">
                        <select name="program_name" id="program_name" class="form-control">
                            <option value="">Select Work Name</option>
                        </select>
                    </div>
                    <div class="col-md-4 col-sm-6 form-group mb-3">
                        <input type="text" name="address_filter" id="address"
                            class="form-control @error('address') is-invalid @enderror" value="{{ old('address') }}"
                            placeholder="Search by Address">
                        @error('address')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-md-4">
                        <button type="submit" class="btn btn-primary me-2">Search</button>
                        <a href="{{ route('activity') }}" class="btn btn-info text-white me-2">Reset</a>
                    </div>
                </form>
                {{-- <button onclick="printTable()" class="btn btn-primary mb-3">Print Table</button> --}}
            </div>
        </div>
    </div>
    <!-- Activities Table -->
    <div class="container-fluid mb-5">
        <h2 class="mb-4 text-center">Activities</h2>

        <div class="table-responsive shadow-sm rounded">
            <table class="table table-bordered table-hover align-middle text-center">
                <thead class="table-warning">
                    <tr>
                        <th>Sr. No.</th>
                        <th>Date / Time</th>
                        <th>Program Image</th>
                        <th>Program/Work Name</th>
                        <th>Work Category</th>
                        <th>Address</th>
                        <th>Session</th>
                        {{-- <th class="no-print">Action</th> --}}
                    </tr>
                </thead>
                <tbody>
                    @foreach ($activity as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                {{ \Carbon\Carbon::parse($item->program_date)->format('d-m-Y') }}<br>
                                <small>{{ $item->program_time }}</small>
                            </td>
                            <td>
                                <img src="{{ asset('program_images/' . $item->program_image) }}" alt="image"
                                    class="img-thumbnail" width="100">
                            </td>
                            <td>{{ $item->program_name }}</td>
                            <td>{{ $item->program_category }}</td>
                            <td>{{ $item->program_address }}</td>
                            <td>{{ $item->academic_session }}</td>
                            {{-- <td class="no-print">
                                <div class="d-flex justify-content-center gap-2 flex-wrap">
                                    <a href="{{ route('viewactivity', $item->id) }}" class="btn btn-sm btn-success"
                                        title="View">
                                        <i class="fa-regular fa-eye"></i>
                                    </a>
                                </div>
                            </td> --}}
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <script>
        function printTable() {
            window.print();
        }
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const allProjects = @json($allProjects);
            const categorySelect = document.getElementById('program_category');
            const workNameSelect = document.getElementById('program_name');

            categorySelect.addEventListener('change', function() {
                const selectedCategory = this.value;

                // Clear existing options
                workNameSelect.innerHTML = '<option value="">Select Work Name</option>';

                // Filter projects by selected category
                const filteredProjects = allProjects.filter(
                    project => project.category === selectedCategory
                );

                // Populate new options
                filteredProjects.forEach(project => {
                    const option = document.createElement('option');
                    option.value = project.name;
                    option.text = project.name;
                    workNameSelect.appendChild(option);
                });
            });
        });
    </script>
@endsection
