@extends('admin.layouts.master')

@section('content')

    <div class="page-header">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="ik ik-inbox bg-blue"></i>
                    <div class="d-inline">
                        <h5>Patients</h5>
                        <span>List of All Patients</span>
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
                            <a href="#">Patients</a>
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
            <form action="{{ route('users.index') }}" method="GET">

                        <div class="row">
                            <div class="col-md-4">
                                <input type="text" name="search" class="form-control" placeholder="search" value="{{ request()->search }}">
                            </div>

                            <div class="col-md-4">
                                <select name="doctor_id" class="fospecialtiesrm-control">
                                    <option value="">All Doctor</option>
                                    @foreach ($doctors as $doctor)
                                      {{$doctor}}
                                        <option value="" >{{ $doctor->doctor_name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-4">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> Search</button>
                                    
                                    
                                
                            </div>

                        </div>
                    </form>
            <div class="card">
                <div class="card-body ">
                    <table  class="table table-responsive">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>phone</th>
                                <th>Email</th>
                                <th>Image_path</th>
                                <th>Date_of_birth</th>
                                <th>Doctor_Name</th>
                                <th>Blood_type</th>
                                <th>Patient_diseases</th>
                                <th>Patient_medicines</th>
                                 <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($users) > 0)
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->phone }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td><img src="{{asset('assets/images/'.$user->image)}}" class="table-user-thumb"
                                            width="40">
                                        </td>
                                        <td>{{ $user->date_of_birth }}</td>
                                        <td>{{$user->doctors->doctor_name}}
                                        <td>{{ $user->blood_type }}</td>
                                        <td>{{ $user->patient_diseases}}</td>
                                        <td>{{ $user->patient_medicines}}</td>
                                        <td>
                                            <div class="table-actions">
                                                <a href="#" data-toggle="modal" data-target="#exampleModal{{ $user->id }}">
                                                    <i class="btn btn-primary ik ik-eye"></i>
                                                </a>

                                            </div>
                                        </td>
                                    </tr>
                                    @include('admin.patients.model')
                                @endforeach
                                {{ $users->appends(request()->query())->links() }}
                            @else
                                <td>No user to display</td>
                            @endif

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    
  
@endsection
