@extends('admin.layouts.master')

@section('content')

<div class="page-header">
    <div class="row">
        <div class="col-lg-8">
            <div class="page-header-title">
                <i class="ik ik-command bg-blue"></i>
                <div class="d-inline">
                    <h5>Service</h5>
                    <span>Add A Service for Specialty</span>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <nav class="breadcrumb-container" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="../index.html"><i class="ik ik-home"></i></a>
                    </li>
                    <li class="breadcrumb-item"><a href="#">Service</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Create</li>
                </ol>
            </nav>
        </div>
    </div>
</div>

<div class="row justify-content-center">
    <div class="col-lg-8">
        @if (Session::has('message'))
        <div class="alert bg-success alert-success text-white" role="alert">
            {{ Session::get('message') }}
        </div>
        @endif

        <div class="card">
            <div class="card-header">
                <h3>Add Service</h3>
            </div>
            <div class="card-body">
                <form class="forms-sample" action="{{ route('services.store') }}" method="post">@csrf

                    <div class="form-group">
                        <label for="">Service Name</label>
                        <input type="text" name="service" class="form-control @error('name') is-invalid @enderror"
                            value="{{ old('name') }}">
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Specialty </label>
                        <select name="specialty_id" class="form-control @error('specialty_id') is-invalid @enderror">
                            <option value="">Please select specialty</option>
                            @foreach ($specialties as $specialty)
                                    <option value="{{ $specialty->id }}" >
                                        {{ $specialty->specialty }}</option>
                                @endforeach
                        </select>
                        @error('specialty_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>



@endsection