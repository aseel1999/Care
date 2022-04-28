@extends('admin.layouts.master')

@section('content')

<div class="page-header">
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <i class="ik ik-edit bg-blue"></i>
                <div class="d-inline">
                    <h5>Doctors</h5>
                    <span>Update doctor</span>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <nav class="breadcrumb-container" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="../index.html"><i class="ik ik-home"></i></a>
                    </li>
                    <li class="breadcrumb-item"><a href="#">Doctor</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Update</li>
                </ol>
            </nav>
        </div>
    </div>
</div>

<div class="row justify-content-center">
    <div class="col-lg-10">
        @if (Session::has('message'))
        <div class="alert bg-success alert-success text-white text-center" role="alert">
            {{ Session::get('message') }}
        </div>
        @endif

        <div class="card">
            <div class="card-header">
                <h3>Edit doctor</h3>
            </div>
            <div class="card-body">
                <form class="forms-sample" action="{{ route('doctors.update', $doctor->id) }}" method="post"
                    enctype="multipart/form-data">@csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-lg-6">
                            <label for="">Full name</label>
                            <input type="text" name="name" class="form-control @error('doctor_name') is-invalid @enderror"
                                value="{{ $doctor->doctor_name }}">
                            @error('doctor_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="col-lg-6">
                            <label for="">Phone</label>
                            <input type="phone" name="phone" class="form-control @error('doctor_phone') is-invalid @enderror"
                                value="{{ $doctor->doctor_phone }}">
                            @error('doctor_phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="col-lg-6">
                            <label for="">Email</label>
                            <input type="email" name="email" class="form-control @error('doctor_emai') is-invalid @enderror"
                                value="{{ $doctor->doctor_email }}">
                            @error('doctor_email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Image</label>
                                <input type="file" name="image_path"
                                    class="form-control file-upload-info @error('image_path') is-invalid @enderror"
                                    placeholder="Upload Image" name="image_path">
                                <span class="input-group-append">
                                </span>
                                @error('image_path')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col-lg-6">
                                <label for="">Gender</label>
                                <select class="form-control @error('doctor_gender') is-invalid @enderror" name="gender">
                                    
                                </select>
                                @error('gender')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <label for="">Experience</label>
                                <input type="number" name="experience"
                                    class="form-control @error('doctor_experience') is-invalid @enderror"
                                    placeholder="Doctor'sExperience Number" value="{{ $doctor->doctor_experience }}">
                                @error('experience')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col-lg-6">
                                <label for="">BookingPrice</label>
                                <input type="number" name="bookingPrice"
                                    class="form-control @error('booking_price') is-invalid @enderror"
                                    placeholder="Doctor'sbookingPrice" value="{{ $doctor->booking_price }}">
                                @error('booking_price')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Clinic Name</label>
                                    <input type="text" name="clinic_name"
                                        class="form-control @error('clinic_name') is-invalid @enderror"
                                        value="{{ $doctor->clinic_name }}">
                                    @error('clinic_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Clinic Location</label>
                                    <input type="text" name="clinic_location"
                                        class="form-control @error('clinic_location') is-invalid @enderror"
                                        value="{{ $doctor->clinic_location }}">
                                    @error('clinic_location')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">ClinicPhone</label>
                                    <input type="text" name="clinic_phone"
                                        class="form-control @error('clinic_phone') is-invalid @enderror"
                                        value="{{ $doctor->clinic_phone }}">
                                    @error('clinic_phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label>Specialty</label>
                                <input type="text" name="specialty"
                                        class="form-control @error('specialty_id') is-invalid @enderror"
                                        value="{{ $doctor->specialty_id }}">
                                    @error('specialty_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                        <button class="btn btn-light">Cancel</button>

                </form>
            </div>
        </div>
    </div>
</div>


@endsection