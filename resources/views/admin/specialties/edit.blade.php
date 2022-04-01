@extends('admin.layouts.master')

@section('content')

    <div class="page-header">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="ik ik-command bg-blue"></i>
                    <div class="d-inline">
                        <h5>Specialty</h5>
                        <span>Update Specialty for Doctor's Specialty</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <nav class="breadcrumb-container" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="../index.html"><i class="ik ik-home"></i></a>
                        </li>
                        <li class="breadcrumb-item"><a href="#">Department</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Update</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h3>Add Specialty</h3>
                </div>
                <div class="card-body">
                    <form class="forms-sample" action="{{ route('specialties.update', [$specialty->id]) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">

                                    <label for="">Specialty name</label>
                                    <input type="text" name="specialty"
                                        class="form-control @error('specialty') is-invalid @enderror"
                                        value="{{ $specialty->specialty }}">
                                    @error('specialty')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                <div class="form-group">
                                    <label>Image</label>
                                    <input type="file"
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
                            </div>

                                <div class="form-group">

                                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                </div>
                            </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>


@endsection
