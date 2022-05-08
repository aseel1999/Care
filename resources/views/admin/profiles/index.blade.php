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
        
        
    </div>
</div>
@endsection