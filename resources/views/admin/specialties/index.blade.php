@extends('admin.layouts.master')

@section('content')

    <div class="page-header">
        <div class="row ">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="ik ik-inbox bg-blue"></i>
                    <div class="d-inline">
                        <h5>Specialty</h5>
                        <span>The List of All specialty</span>
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
                            <a href="#">specialty</a>
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
                    <h3>All specialty</h3>

                </div>
                <div class="col-md-4">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> Search</button>
                                    <a href="{{ route('specialties.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Add</a>
                                    
                                
                            </div>
                <div class="card-body">
                    <table id="data_table" class="table">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>Name</th>
                                <th>Image</th>
                                <th>RelatedServices</th>
                                <th class="nosort">&nbsp;</th>
                                <th class="nosort">&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($specialties) > 0)
                                @foreach ($specialties as $key => $specialty)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{$specialty->specialty}}</td>
                                        <td><img src="profile/{{$specialty->image_path}}" width="80">
                                        <td><a href="{{ route('services.index', ['specialty_id' => $specialty->id]) }}" class="btn btn-info btn-sm">Related_Services</a></td>
                                        <td>
                                            <div class="table-actions row">
                                                <a href="{{ route('specialties.edit', [$specialty->id]) }}"><i
                                                        class="btn btn-warning ik ik-edit-2"></i></a>

                                                <form action="{{ route('specialties.destroy', [$specialty->id]) }}"
                                                    method="post">@csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger ml-3"><i
                                                            class="ik ik-trash-2"></i></button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach

                            @else
                                <td>No Specialties. Please create one.</td>
                            @endif

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
