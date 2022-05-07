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
                            <div class="col-md-6">
                                <label>Status</label>
                                <select class="form-control @error('status') is-invalid @enderror" name="blood_type">
                                    <option value="">select</option>
                                    <option value="approved">approved</option>
                                    <option value="pending">pending</option>
                                    </select>
                                    @error('status')
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