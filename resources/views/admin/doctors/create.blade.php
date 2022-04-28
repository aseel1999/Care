@extends('admin.layouts.master')

@section('content')

    <div class="page-header">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="ik ik-command bg-blue"></i>
                    <div class="d-inline">
                        <h5>Doctors</h5>
                        <span>add doctor</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <nav class="breadcrumb-container" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="../index.html"><i class="ik ik-home"></i></a>
                        </li>
                        <li class="breadcrumb-item"><a href="{{ route('doctors.index') }}">Doctor</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Create</li>
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
                    <h3>Add doctor</h3>
                </div>
                <div class="card-body">
                    <form class="forms-sample" action="{{ route('doctors.store') }}" method="post"
                        enctype="multipart/form-data">@csrf
                        <div class="row">
                        <div class="col-lg-6">
                                <label for="">Full name</label>
                                <input type="text" name="name" class="form-control @error('doctor_name') is-invalid @enderror"
                                    value="{{old('doctor_name')  }}">
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col-lg-6">
                                <label for="">Email</label>
                                <input type="email" name="doctor_email" class="form-control @error('doctor_email') is-invalid @enderror"
                                    value="{{ old('doctor_email') }}">
                                @error('doctor_email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="col-lg-6">
                                <label for="">phone</label>
                                <input type="text" name="phone" class="form-control @error('email') is-invalid @enderror"
                                    value="{{ old('doctor_phone') }}">
                                @error('doctor_phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <label for="">Password</label>
                                <input type="password" name="password"
                                    class="form-control @error('password') is-invalid @enderror">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col-lg-6">
                            <div class="form-group">
                                <label >Image</label>
                                <input type="file" name="image_path"
                                    class="form-control file-upload-info @error('image_path') is-invalid @enderror"
                                    placeholder="Upload Image" name="image">
                                    <span class="input-group-append">
                                    </span>
                                @error('image_path')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                           </div>   

                            <div class="col-lg-6">
                            <label for="">Gender</label>
                                <select class="form-control @error('doctor_gender') is-invalid @enderror" name="gender">
                                    <option value="">select</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                </select>
                                @error('doctor_gender')
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
                                    placeholder="Doctor'sExperience Number" value="{{ old('doctor_experience') }}">
                                @error('doctor_experience')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col-lg-6">
                                <label for="">BookingPrice</label>
                                <input type="number" name="bookingPrice"
                                    class="form-control @error('booking_price') is-invalid @enderror"
                                    placeholder="Doctor'sbookingPrice" value="{{ old('booking_price') }}">
                                @error('booking_price')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                             </div> 
                             <div class="row">
                             <div class="form-group">
                            <label for="exampleTextarea1">Qualification</label>
                            <textarea class="form-control @error('doctor_qualifications') is-invalid @enderror" id="exampleTextarea1"
                                rows="4" >{{ old('doctor_qualifications') }}
                            </textarea>
                            @error('doctor_qualifications')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                            <div class="col-lg-6">
                                <label for="">Certificates</label>
                                <input type="file" name="certificates"
                                    class="form-control file-upload-info @error('doctor_certificates') is-invalid @enderror">
                                @error('doctor_certificates')
                                <span class="input-group-append">
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
                                        value="{{ old('clinic_name') }}">
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
                                        value="{{ old('clinic_location') }}">
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
                                        value="{{ old('clinic_location') }}">
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
                                        placeholder="Department" value="{{ old('specialty_id') }}">
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
