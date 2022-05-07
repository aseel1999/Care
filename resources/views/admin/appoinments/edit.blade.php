@extends('admin.layouts.master')

@section('content')

<div class="page-header">
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <i class="ik ik-command bg-blue"></i>
                <div class="d-inline">
                    <h5>Appoinments</h5>
                    <span>Update An Appoinment </span>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <nav class="breadcrumb-container" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="../index.html"><i class="ik ik-home"></i></a>
                    </li>
                    <li class="breadcrumb-item"><a href="#">Appoinment</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Edit</li>
                </ol>
            </nav>
        </div>
    </div>
</div>

<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                <h3>Update an Appoinment</h3>
            </div>
            <div class="card-body">
                <form class="forms-sample" action="{{ route('appoinment.update',$appoinments->id) }}" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">status </label>
                                <select name="appoinment_status"
                                    class="form-control @error('appoinment_status') is-invalid @enderror">
                                    <option value="">Please select appoinment_status</option>
                                    @foreach ($appoinments as $appoinment)
                                    <option value="{{ $appoinment->appoinment_status }}"
                                        {{ old('appoinment_status') == $appoinment->appoinment_status ? 'selected' : '' }}>
                                        {{ $appoinment->appoinment_status }}</option>
                                    @endforeach
                                </select>
                                @error('appoinment->appoinment_status')
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



@endsection