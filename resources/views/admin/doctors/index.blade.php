@extends('admin.layouts.master')

@section('content')

    <div class="page-header">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="ik ik-inbox bg-blue"></i>
                    <div class="d-inline">
                        <h5>Doctors</h5>
                        <span>List of All Doctors</span>
                    </div>
                </div>
            </div>
           
            <div class="col-lg-4">
                <nav class="breadcrumb-container" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="../index.html"><i class="ik ik-home"></i></a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="#">Doctors</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Index</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-md-12">
            @if (Session::has('message'))
                <div class="alert bg-success alert-success text-white text-center" role="alert">
                    {{ Session::get('message') }}
                </div>
            @endif
            <form action="{{ route('doctors.index') }}" method="POST">
                @csrf
                        <div class="row">
                            <div class="col-md-4">
                                <input type="text" name="search" class="form-control" placeholder="search" value="{{ request()->search }}">
                            </div>
                            <div class="col-md-4">
                                <select name="specialty_id" class="fospecialtiesrm-control">
                                    <option value="">All Speciality</option>
                                    @foreach ($specialties as $specialty)
                                    {{ $specialty}}
                                        <option value="{{ $specialty->id }}" {{ request()->specialty_id == $specialty->id ? 'selected' : '' }}>{{ $specialty->specialty }}</option>
                                    @endforeach
                                </select>
                            </div>

                            

                        </div>
                    </form>
            <div class="card">
                <div class="card-body ">
                    <table id="data_table" class="table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>phone</th>
                                <th>Email</th>
                                <th>Image_path</th>
                                <th>Doctor_gender</th>
                                <th>Doctor_experience</th>
                                <th>Booking_price</th>
                                <th>Clinic_name</th>
                                <th>Clinic_location</th>
                                <th>Clinic_phone</th>
                                 <th> status</th>
                                 <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($doctors) > 0)
                                @foreach ($doctors as $doctor)
                                    <tr>
                                        <td>{{ $doctor->doctor_name }}</td>
                                        <td>{{ $doctor->doctor_phone }}</td>
                                        <td>{{ $doctor->doctor_email }}</td>
                                        <td><img src="{{ asset('images') }}" class="table-user-thumb"
                                                alt="">
                                        </td>
                                        <td>{{ $doctor->doctor_gender }}</td>
                                        <td>{{ $doctor->doctor_experience }}</td>
                                        <td>{{ $doctor->booking_price }}</td>
                                        <td>{{ $doctor->clinic_name}}</td>
                                        <td>{{ $doctor->clinic_location}}</td>
                                        <td>{{ $doctor->clinic_phone}}</td>
                                        <td>{{ $doctor->status}}</td>
                                        <td>
                                            <div class="table-actions">
                                            <a href="#" data-toggle="modal" data-target="#exampleModal{{ $doctor->id }}">
                                                    <i class="btn btn-primary ik ik-eye"></i>
                                                </a>
                                                <a href="{{ route('doctors.edit', $doctor->id) }}"><i
                                                        class="btn btn-warning ik ik-edit-2"></i></a>

                                                <a href="{{ route('doctors.show', [$doctor->id]) }}">
                                                    <i class="btn btn-danger ik ik-trash-2"></i>
                                                </a>

                                            </div>
                                        </td>
                                    </tr>
                                    
                                @endforeach

                            @else
                                <td>No doctor to display</td>
                            @endif

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
