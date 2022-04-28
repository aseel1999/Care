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
            <form action="{{ route('users.index') }}" method="POST">

                        <div class="row">
                            <div class="col-md-4">
                                <input type="text" name="search" class="form-control" placeholder="search" value="{{ request()->search }}">
                            </div>

                            <div class="col-md-4">
                                <select name="doctor_id" class="fospecialtiesrm-control">
                                    <option value="">All Doctor</option>
                                    @foreach ($doctors as $doctor)
                                      {{$doctor}}
                                        <option value="" >{{ $doctor->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-4">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> Search</button>
                                    <a href="{{ route('users.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Add</a>
                                    
                                
                            </div>

                        </div>
                    </form>
            <div class="card">
                <div class="card-body ">
                    <table  class="table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>phone</th>
                                <th>Email</th>
                                <th>Image_path</th>
                                <th>Date_of_birth</th>
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
                                        <td><a href="{{route('profile',$user->id)}}">{{ $user->name }}</a></td>
                                        <td>{{ $user->phone }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td><img src="{{ asset('images') }}" class="table-user-thumb"
                                                alt="">
                                        </td>
                                        <td>{{ $user->date_of_birth }}</td>
                                        <td>{{ $user->blood_type }}</td>
                                        <td>{{ $user->patient_diseases}}</td>
                                        <td>{{ $user->patient_medicines}}</td>
                                        <td>
                                            <div class="table-actions">
                                            <a href="#" data-toggle="modal" data-target="#exampleModal{{ $doctor->id }}">
                                                    <i class="btn btn-primary ik ik-eye"></i>
                                                </a>
                                                <a href="{{ route('users.edit', $user->id) }}"><i
                                                        class="btn btn-warning ik ik-edit-2"></i></a>

                                                <a href="{{ route('users.show', $user->id) }}">
                                                    <i class="btn btn-danger ik ik-trash-2"></i>
                                                </a>

                                            </div>
                                        </td>
                                    </tr>
                                    
                                @endforeach

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
