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
                        <li class="breadcrumb-item"><a href="#">Doctor</a></li>
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
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                    value="{{ $doctor->name }}">
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col-lg-6">
                                <label for="">Phone</label>
                                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                                    value="{{ $doctor->phone }}">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="col-lg-6">
                                <label for="">Email</label>
                                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                                    value="{{ $doctor->email }}">
                                @error('email')
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
                                <select class="form-control @error('gender') is-invalid @enderror" name="gender">
                                    @foreach (['male', 'female'] as $gender)
                                        <option value="{{ $gender }}" @if ($doctor->gender == $gender)selected
                                    @endif>{{ $gender }}</option>
                                    @endforeach
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
                                    class="form-control @error('experience') is-invalid @enderror"
                                    placeholder="Doctor'sExperience Number" value="{{ $doctor->experience }}">
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
                                @error(booking_price')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                             </div> 
                             <div class="row">
                             <div class="form-group">
                            <label for="exampleTextarea1">Qualification</label>
                            <textarea class="form-control @error('qualifications') is-invalid @enderror" id="exampleTextarea1"
                                rows="4" name="qualifications">{{ $doctor->qualifications }}
                            </textarea>
                            @error('qualifications')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                            <div class="col-lg-6">
                                <label for="">Certificates</label>
                                <input type="file" name="certificates"
                                    class="form-control file-upload-info @error('image') is-invalid @enderror"
                                    >
                                @error('certificates')
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
                                <label>Specialtyid</label>
                                <select name="specialty_id" class="form-control @error('specialty_id') is-invalid @enderror">
                                    <option value="">Please select specialty</option>
                                    @foreach (App\models\Specialtie::where('name', '=', '')->get() )
                                        <option value="{{ $specialty->id }}" @if ($doctor->specialty_id == $specialty->id)selected
                                    @endif>{{ $specialty->name }}</option>
                                    @endforeach
                                </select>
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
