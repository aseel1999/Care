@extends('admin.layouts.master')
@section('content')

<div class="container">

    @if (Session::has('message'))
    <div class="alert alert-success">{{ Session::get('message') }}</div>
    @endif
    <div class="row ">
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">User Profile</div>
                <div class="card-body">
                    <p>Name: {{$user->name }}</p>
                    <p>Email: {{$user->email }}</p>
                    <p>Phone: {{  $user->phone }}</p>
                    <p>Address: {{ $user->address }}</p>
                    <p>Status: {{  $user->social_status }}</p>
                    <p>BloodType: {{  $user->blood_type }}</p>
                    <p>Diseases: {{ $user->patient_diseases }}</p>
                    <p>Medicines: {{  $user->patient_medicines }}</p>
               
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Update Profile</div>
                <div class="card-body">
                    <form action="{{ route('profile.store') }}" method="post">@csrf
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                value="{{$user->name }}">
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Phone </label>
                            <input type="text" name="phone_number" class="form-control" value="{{ $user->phone }}">

                        </div>

                        <div class="form-group">
                            <label>Address</label>
                            <input type="text" name="address" class="form-control" value="{{ $user->address }}">

                        </div>
                        <div class="form-group">
                            <label>Status</label>
                            <select name="social_status"
                                class="form-control @error('social_status') is-invalid @enderror">
                                <option value="">select social_status</option>
                                <option value="male" @if ($user->social_status === 'single')selected @endif
                                    >Single</option>
                                <option value="female" @if ($user->social_status === 'married')selected @endif
                                    >Married</option>
                            </select>
                            @error('social_status')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            <div class="form-group">
                                <label>BloodType</label>
                                <select name="blood_type"
                                    class="form-control @error('blood_type') is-invalid @enderror">
                                    <option value="">select blood_type</option>
                                    <option value="A+" @if ($user->blood_type === 'A+')selected @endif
                                        >A+</option>
                                    <option value="AB+" @if ($user->blood_type === 'AB+')selected @endif
                                        >AB+</option>
                                    <option value="AB+" @if ($user->blood_type === 'B')selected @endif
                                        >B</option>
                                    <option value="AB-" @if ($user->blood_type === 'AB-')selected @endif
                                        >AB-</option>
                                    <option value="O-" @if ($user->blood_type === 'O-')selected @endif
                                        >O-</option>
                                    <option value="O+" @if ($user->blood_type === 'O+')selected @endif
                                        >O+</option>
                                </select>
                                @error('blood_type')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror

                                <div class="form-group">
                                    <label>Diseases</label>
                                    <textarea name="patient_diseases"
                                        class="form-control">{{ $user->patient_diseases}}</textarea>

                                </div>
                                <div class="form-group">
                                    <label>Medicines</label>
                                    <textarea name="patient_medicines"
                                        class="form-control">{{ $user->patient_medicines}}</textarea>

                                </div>

                                <div class="form-group">

                                    <button class="btn btn-primary" type="submit">Update Profile</button>

                                </div>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">Update Image</div>
                <form action="{{ route('profile.pic') }}" method="post" enctype="multipart/form-data">@csrf
                    <div class="card-body">
                        @if (!$user->image)
                        <img src="assets/images/blank.png" width="120">
                        @else
                        <img src="/profile/{{$user->image }}" width="120">
                        @endif
                        <br>
                        <input type="file" name="file" class="form-control" required="">
                        <br>
                        @error('file')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        <button type="submit" class="btn btn-primary">Update Image</button>

                    </div>
                </form>
            </div>
        </div>

    </div>
</div>
@endsection