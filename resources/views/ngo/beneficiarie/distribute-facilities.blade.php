@extends('ngo.layout.master')
@section('content')
    <style>
        .upload-container {
            text-align: center;
            margin-top: 15px;
            padding: 10px 20px;
            margin-left: 50px;
        }

        .image-placeholder {
            width: 150px;
            height: 150px;
            /* border: 2px dashed #ccc; */
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 15px;
            background-color: rgb(223, 226, 228);
        }

        .image-placeholder img {
            max-width: 100%;
            max-height: 100%;
            display: none;
        }

        .upload-btn {
            display: inline-block;
            background-color: #343a40;
            color: #fff;
            padding: 10px 15px;
            margin-right: 180px;
            font-size: 16px;
            width: auto;
            border-radius: 5px;
            cursor: pointer;
            border: none;
        }

        .upload-btn:hover {
            background-color: #495057;
        }

        #uploadInput {
            display: none;
        }
    </style>

    <div class="wrapper">
        {{-- <div class="main-content"> --}}
        <!-- Breadcrumb -->
        <div class="row d-flex justify-content-end mt-2">
            <div class="col-auto">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('ngo') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Distribute Facilities</li>
                    </ol>
                </nav>
            </div>
        </div>
        @if (session('success'))
            <div id="successMessage" class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
            </div>
        @endif
        <div class="container-fluide m-3">
            <div class="card bg-white p-2 shadow rounded">
                <div class="text-black text-center border-bottom pb-3">
                    <h4 class=" p-3 bg-info rounded"><b>BENEFICIARIE </b></h4>
                </div>
                <div class="card-body m-1">
                    <div class="border-bottom pb-3 mb-4">
                        <h5 class="text-black"><b>Information</b></h5>
                        <div class="row">
                            <div class="col-md-8">
                                <div class="row d-flex justify-content-between">
                                    <!-- Application Date -->
                                    <div class="col-md-5 col-sm-6 form-group mb-3 bg-light">
                                        <label class="form-label">Application Date:</label>
                                        <p class="form-control-plaintext">{{ $beneficiarie->application_date }}</p>
                                    </div>

                                    <div class="col-md-5 col-sm-6 form-group mb-3 bg-light">
                                        <label class="form-label">Application No:</label>
                                        <p class="form-control-plaintext">{{ $beneficiarie->application_no }}</p>
                                    </div>

                                    <div class="col-md-5 col-sm-6 form-group mb-3 bg-light">
                                        <label class="form-label">Registration Date:</label>
                                        <p class="form-control-plaintext">{{ $beneficiarie->registration_date }}</p>
                                    </div>

                                    <div class="col-md-5 col-sm-6 form-group mb-3 bg-light">
                                        <label class="form-label">Registration No:</label>
                                        <p class="form-control-plaintext">{{ $beneficiarie->registration_no }}</p>
                                    </div>

                                    <!-- Full Name -->
                                    <div class="col-md-5 col-sm-6 form-group mb-3 bg-light">
                                        <label class="form-label">Full Name:</label>
                                        <p class="form-control-plaintext">{{ $beneficiarie->name }}</p>
                                    </div>

                                    <!-- Date of Birth -->
                                    <div class="col-md-5 col-sm-6 form-group mb-3 bg-light">
                                        <label class="form-label">Date of Birth:</label>
                                        <p class="form-control-plaintext">{{ $beneficiarie->dob }}</p>
                                    </div>
                                </div>

                                <div class="row d-flex justify-content-between">
                                    <!-- Gender -->
                                    <div class="col-md-5 col-sm-6 form-group mb-3 bg-light">
                                        <label class="form-label">Gender:</label>
                                        <p class="form-control-plaintext">{{ $beneficiarie->gender }}</p>
                                    </div>

                                    <!-- Eligibility / Education Level -->
                                    <div class="col-md-5 form-group mb-3 bg-light">
                                        <label class="form-label">Eligibility / Education Level:</label>
                                        <p class="form-control-plaintext">{{ $beneficiarie->eligibility }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-4">
                                <div class="upload-container">
                                    @if (!empty($beneficiarie->image))
                                        <img id="previewImage"
                                            src="{{ asset('benefries_images/' . $beneficiarie->image) }}" alt="Preview"
                                            width="160">
                                    @endif
                                </div>
                            </div>

                        </div>
                        {{-- <div class="row d-flex justify-content-between">

                            <div class="col-md-3 mb-3 bg-light">
                                <label class="form-label">Father/Husband Name:</label>
                                <p class="form-control-plaintext">{{ $beneficiarie->gurdian_name }}</p>
                            </div>

                            <div class="col-md-3 mb-3 bg-light">
                                <label class="form-label">Mother Name:</label>
                                <p class="form-control-plaintext">{{ $beneficiarie->mother_name }}</p>
                            </div>

                        </div> --}}
                        {{-- <div class="row d-flex justify-content-between">
                            <div class="col-md-3 form-group mb-3 bg-light">
                                <label class="form-label">Village/Locality:</label>
                                <p class="form-control-plaintext">{{ $beneficiarie->village }}</p>
                            </div>

                            <div class="col-md-3 form-group mb-3 bg-light">
                                <label class="form-label">Post/Town:</label>
                                <p class="form-control-plaintext">{{ $beneficiarie->post }}</p>
                            </div>

                            <div class="col-md-3 form-group mb-3 bg-light">
                                <label class="form-label">Area Type:</label>
                                <p class="form-control-plaintext">{{ $beneficiarie->area_type }}</p>
                            </div>
                        </div> --}}
                        {{-- <div class="row d-flex justify-content-between">
                            <div class="col-md-3 form-group mb-3 bg-light">
                                <label class="form-label">Block:</label>
                                <p class="form-control-plaintext">{{ $beneficiarie->block }}</p>
                            </div>

                            <div class="col-md-3 form-group mb-3 bg-light">
                                <label class="form-label">State:</label>
                                <p class="form-control-plaintext">{{ $beneficiarie->state }}</p>
                            </div>

                            <div class="col-md-3 form-group mb-3 bg-light">
                                <label class="form-label">District:</label>
                                <p class="form-control-plaintext">{{ $beneficiarie->district }}</p>
                            </div>
                        </div>
                        <div class="row d-flex justify-content-between">
                            <div class="col-md-3 form-group mb-3 bg-light">
                                <label class="form-label">Pincode:</label>
                                <p class="form-control-plaintext">{{ $beneficiarie->pincode }}</p>

                                <div class="col-md-3 col-sm-6 form-group mb-3 bg-light">
                                    <label class="form-label">Email:</label>
                                    <p class="form-control-plaintext">{{ $beneficiarie->email }}</p>
                                </div>
                            </div>
                            <div class="row d-flex justify-content-between">
                                <div class="col-md-3 col-sm-6 form-group mb-3 bg-light">
                                    <label class="form-label">Phone:</label>
                                    <p class="form-control-plaintext">{{ $beneficiarie->phone }}</p>
                                </div>
                            </div>
                        </div> --}}
                        {{-- <div class="row">

                            <!-- Occupation -->
                            <div class="col-md-4 mb-3 bg-light">
                                <div class="form-group">
                                    <label class="form-label">Occupation:</label>
                                    <p class="form-control-plaintext">
                                        {{ $beneficiarie->occupation ?? 'N/A' }}
                                    </p>
                                </div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">What beneficiaries need help with:</label>
                                <div class="border rounded p-2" style="background-color: #f8f9fa;">
                                    {{ $beneficiarie->help_needed }}
                                </div>
                            </div>

                        </div> --}}
                    </div>
                </div>
                <div class="card mt-4 p-3 border border-success rounded">
                    <h5 class="text-success text-center">About Beneficiarie Facilities</h5>

                    <div class="row">
                        {{-- @if ($facility->facilitys) --}}
                            {{-- <div class="col-md-4 mb-3">
                            <div class="bg-light border rounded p-3 h-100">
                                <label class="form-label fw-bold">facility Date:</label>
                                <p>{{ \Carbon\Carbon::parse($facility->facility_date)->format('d-m-Y') }}</p>
                            </div>
                        </div>
                        <div class="col-md-8 mb-3">

                            <div class="bg-light border rounded p-3 h-100">
                                <label class="form-label fw-bold">facility Details:</label>
                                <p><strong>Details:</strong> {{ $facility->facility_details ?? 'Not Found' }}</p>
                            </div>
                        </div> --}}
                            <div class="col-md-4 mb-3">
                                <div class="bg-light border rounded p-3 h-100">
                                    <label class="form-label fw-bold">Facilities Category:</label>
                                    <p class="card-text"><strong>Category:</strong>
                                        {{ $facility->facilities_category ?? 'Not Found' }}</p>
                                </div>
                            </div>
                            <div class="col-md-8 mb-3">
                                <div class="bg-light border rounded p-3 h-100">
                                    <label class="form-label fw-bold">Facilities Details:</label>
                                    <p class="card-text"><strong>Facilities:</strong>
                                        {{ $facility->facilities ?? 'Not Found' }}
                                    </p>
                                </div>
                            </div>
                        {{-- @else
                            <div class="col-12">
                                <div class="alert alert-warning">No facility data available for this beneficiary.</div>
                            </div> --}}
                    </div>
                    {{-- @endif --}}
                </div>
                <div class="card mt-4 p-3 border border-success rounded">
                    <form
                        action="{{ route('store-distribute-facilities', ['beneficiarie_id' => $beneficiarie->id, 'facility_id' => $facility->id]) }}"
                        method="POST">
                        @csrf
                        <h5 class="text-success text-center">Distribute Beneficiarie Facilities</h5>

                        <div class="mb-3">
                            <label for="distribute_date" class="form-label">
                                Distribute Date<span class="text-danger">*</span>
                            </label>
                            <input type="date" name="distribute_date" class="form-control">
                            @error('distribute_date')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="distribute_place" class="form-label">Distribute Place</label>
                            <textarea name="distribute_place" class="form-control"></textarea>
                            @error('distribute_place')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3 mt-1">
                            <label for="facilities" class="form-label">
                                Status <span class="text-danger">*</span>
                            </label>
                            <select name="status" id="status" class="form-control">
                                <option value="" selected>Select Status</option>
                                <option value="Pending">Pending</option>
                                <option value="Distributed">Distributed</option>
                            </select>
                            @error('status')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3 mt-1" id="pendingDiv" style="display: none;">
                            <label for="pending_reason" class="form-label">
                                Pending Reason: <span class="text-danger"></span>
                            </label>
                            <textarea name="pending_reason" id="pending_reason" class="form-control">

                       </textarea>
                            @error('pending_reason')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-between">
                            <button type="submit" class="btn btn-success">Distribute Beneficiarie Facilities</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const statusSelect = document.getElementById('status');
                const PendingDiv = document.getElementById('pendingDiv');

                function togglePendingReason() {
                    if (statusSelect.value === 'Pending') {
                        PendingDiv.style.display = 'block';
                    } else {
                        PendingDiv.style.display = 'none';
                    }
                }

                togglePendingReason();

                statusSelect.addEventListener('change', togglePendingReason);
            })
        </script>
    @endsection
