@extends('admin.layouts.master')

@section('content')

<div class="page-header">
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <i class="ik ik-command bg-blue"></i>
                <div class="d-inline">
                    <h5>Patients</h5>
                    <span>add patient</span>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <nav class="breadcrumb-container" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="../index.html"><i class="ik ik-home"></i></a>
                    </li>
                    <li class="breadcrumb-item"><a href="{{ route('users.index') }}">Patient</a></li>
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
                <h3>Add patient</h3>
            </div>
            <div class="card-body">
                <form class="forms-sample" action="{{ route('users.store') }}" method="post"
                    enctype="multipart/form-data">@csrf
                    <div class="row">
                        <div class="col-lg-6">
                            <label for="">Full name</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                value="{{ old('name') }}">
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="col-lg-6">
                            <label for="">Phone</label>
                            <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror"
                                value="{{ old('phone') }}">
                            @error('phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="col-lg-6">
                            <label for="">Email</label>
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                                value="{{ old('email')}}">
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
                                <label>Image</label>
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
                            <label for="">blood_type</label>
                                <select class="form-control @error('blood_type') is-invalid @enderror" name="blood_type">
                                    <option value="">select</option>
                                    <option value="O+">O+</option>
                                    <option value="O-">O-</option>
                                    <option value="A+">A+</option>
                                    <option value="AB+">AB+</option>
                                    <option value="AB-">AB-</option>
                                    <option value="B">B</option>
                                </select>
                                @error('blood_type')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6">
                            <label for="">Date_of_birth</label>
                            <input type="text" name="date_of_birth"
                                class="form-control @error('date_of_Birth') is-invalid @enderror"
                                value="{{ old('date_of_birth') }}">
                            @error('date_of_birth')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="col-lg-6">
                            <label for="">Social_status</label>
                            <select class="form-control @error('social_status') is-invalid @enderror" name="blood_type">
                                    <option value="">select</option>
                                    <option value="Single">Single</option>
                                    <option value="Married">Married</option>
                                    
                                </select>
                                @error('social_status')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                        </div>

                    </div>
                    <div class="row">
                        <div class="form-group">
                            <label for="exampleTextarea1">Diseases</label>
                            <textarea class="form-control @error('patient_diseases') is-invalid @enderror" id="exampleTextarea1"
                                rows="4" name="diseases">{{ old('patient_diseases') }}
                            </textarea>
                            @error('patient_diseases')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="col-lg-6">
                            <label for="exampleTextarea1">Mediciens</label>
                            <textarea class="form-control @error('patient_medicines') is-invalid @enderror"
                                id="exampleTextarea1" rows="4" name="medicines">{{ old('patient_medicines') }}
                            </textarea>
                            @error('patient_medicines')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                    </div>


            </div>

            <div class="col-md-6">
                <label>Doctor</label>
                <select name="doctor_id" class="form-control @error('doctor_id') is-invalid @enderror">
                <option value="">Please select a doctor</option>
                @foreach ($doctors as $doctor)
                                    <option value="{{ $doctor->id }}" {{ old('doctor_id') == $doctor->id ? 'selected' : '' }}>
                                        {{ $doctor->name }}</option>
                                @endforeach
                </select>
                @error('doctor_id')
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