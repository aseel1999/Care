@extends('admin.layouts.master')

@section('content')

<div class="page-header">
    <div class="row align-items-end">
        <div class="col-lg-8">


            <div class="page-header-title">
                <i class="ik ik-command bg-blue"></i>
                <div class="d-inline">
                    <h5>Appoinments</h5>
                    <span>Available time</span>

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
                    <li class="breadcrumb-item active" aria-current="page">Appointment</li>
                </ol>
            </nav>
        </div>
    </div>
</div>

<div class="row justify-content-center">
    <div class="col-lg-10">
        @if (Session::has('message'))
        <div class="alert bg-success alert-success text-white" role="alert">
            {{ Session::get('message') }}
        </div>
        @endif
        @if (Session::has('errMessage'))
        <div class="alert bg-danger alert-success text-white" role="alert">
            {{ Session::get('errMessage') }}
        </div>
        @endif
        @foreach ($errors->all() as $error)
        <div class="alert alert-danger">
            {{ $error }}

        </div>

        @endforeach

        @if(\Session::has('success'))

        <div class="alert alert-success">{{ \Session::get('success') }}</div>


        @endif

        @if(\Session::has('error'))

        <div class="alert alert-danger">{{ \Session::get('error') }}</div>


        @endif
        


        <form action="{{ route('appoinment.check') }}" method="post">
            @csrf

            <div class="card">
                <div class="card-header">
                    Choose date
                    <br>
                    @if (isset($appoinment_date))
                    Your timetable for:
                    {{ $appoinment_date }}
                    @endif

                </div>
                <div class="card-body">
                    <input type="text" class="form-control datetimepicker-input" id="datepicker"
                        data-toggle="datetimepicker" data-target="#datepicker" name="date">
                    <br>
                    <button type="submit" class="btn btn-primary">Check</button>
                </div>
            </div>
        </form>
        <form action="{{ route('appoinment.index') }}" method="GET">
            <div class="row">
                <div class="col-md-4">
                    <input type="text" name="search" class="form-control" placeholder="search"
                        value="{{ request()->search }}">
                </div>
                <div class="col-md-4">
                    <select name="specialty_id" class="fospecialtiesrm-control">
                        <option value="">All Doctor</option>
                        @foreach ($doctors as $doctor)
                        {{ $doctor}}
                        <option value="{{ $doctor->id }}" {{ request()->doctor_id == $doctor->id ? 'selected' : '' }}>
                            {{ $doctor->doctor_name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> Search</button>
                </div>
            </div>
        </form>


        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Date</th>
                    <th scope="col">Time</th>
                    <th scope="col">User</th>
                    <th scope="col">Doctor</th>
                    <th scope="col">Status</th>
                    

                </tr>
            </thead>
            <tbody>
                @if (count($myAppoinments) > 0)
                @foreach ($myAppoinments as $appoinment)
                <tr>
                    <td>{{ $loop->index + 1 }}</td>
                    <td>{{ $appoinment->appoinment_date }}</td>
                    <td>{{ $appoinment->appoinment_time }}</td>
                    <td>{{ $appoinment->user1->name }}</td>
                    <td>{{ $appoinment->doctors->doctor_name }}</td>
                    <td>{{ $appoinment->appoinment_status }}</td>
                    
                </tr>
                @endforeach
                {{ $myAppoinments->appends(request()->query())->links() }}
            </tbody>
        </table>
        @else
        <h>No appoinment to display<h>
        @endif

    </div>
    <style type="text/css">
    input[type="checkbox"] {
        zoom: 1.1;

    }

    body {
        font-size: 18px;
    }
    </style>
</div>

@endsection