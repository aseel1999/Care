@extends('admin.layouts.master')

@section('content')

<div class="page-header">
    <div class="row ">
        <div class="col-lg-8">
            <div class="page-header-title">
                <i class="ik ik-inbox bg-blue"></i>
                <div class="d-inline">
                    <h5>Services</h5>
                    <span>The List of All Services</span>
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
                        <a href="#">Service</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Index</li>
                </ol>
            </nav>
        </div>
    </div>
</div>


<div class="row justify-content-center">
    <div class="col-md-8 ">
        @if (Session::has('message'))
        <div class="alert bg-success alert-success text-white" role="alert">
            {{ Session::get('message') }}
        </div>
        @endif
        <div class="card">
            <div class="card-header">
                <h3>All Services</h3>
            </div>
            <form action="{{ route('services.index') }}" method="get">
                <div class="row">
                    <div class="col-md-4">
                        <input type="text" name="search" class="form-control" placeholder="@lang('site.search')"
                            value="{{ request()->search }}">
                    </div>
                    <div class="col-md-4">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i>
                            Search</button>
                        <a href="{{ route('services.create') }}" class="btn btn-primary"><i
                                class="fa fa-plus"></i> Add</a>
                    </div>
                </div>
            </form>
            <div class="card-body">
                <table id="data_table" class="table">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>Name</th>
                            <th>Specialty</th>
                            <th class="nosort">&nbsp;</th>
                            <th class="nosort">&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($services) > 0)
                        @foreach ($services as $key => $service)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{$service->name}}</td>
                            <td>{{@$service->specialtiess->name}}</td>
                            <td>
                                <div class="table-actions row">
                                    <a href="{{ route('services.edit', [$service->id]) }}"><i
                                            class="btn btn-warning ik ik-edit-2"></i></a>

                                    <form action="{{ route('services.destroy', [$service->id]) }}" method="post">@csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger ml-3"><i
                                                class="ik ik-trash-2"></i></button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach

                        @else
                        <td>No Services. Please create one.</td>
                        @endif

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection