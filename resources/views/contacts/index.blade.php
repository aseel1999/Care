@extends('admin.layouts.master')

@section('content')

    <div class="page-header">
        <div class="row ">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="ik ik-inbox bg-blue"></i>
                    <div class="d-inline">
                        <h5>Contact</h5>
                        <span>The List of All contact</span>
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
                            <a href="#">Contact</a>
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
                    <h3>All Contacts</h3>

                </div>
                <div class="card-body">
                    <table id="data_table" class="table">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>from</th>
                                <th>Email</th>
                                <th>Message</th>
                                <th colspan="2">Actions</th>

                                <th class="nosort">&nbsp;</th>
                                <th class="nosort">&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($contacts) > 0)
                                @foreach ($contacts as $key => $contact)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{$contact->from}}</td>
                                        <td>{{$contact->email}}</td>
                                        <td>{{$contact->message}}</td>
                                        <td><a href="{{ route('contact.edit',$contact->id)}}" class="btn btn-primary">Edit</a></td>
                                        <td>
                                             <form action="{{ route('contact.destroy', $contact->id)}}" method="post">
                                               @csrf
                                             @method('DELETE')
                                        <button class="btn btn-danger" type="submit">Delete</button>
                                             </form>
                                        </td>
                                        
                                    </tr>
                                @endforeach

                            @else
                                <td>No Contacts. Please create one.</td>
                            @endif

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection