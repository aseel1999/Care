@extends('admin.layouts.master')

@section('content')

<div class="page-header">
    <div class="row ">
        <div class="col-lg-8">
            <div class="page-header-title">
                <i class="ik ik-inbox bg-blue"></i>
                <div class="d-inline">
                    <h5>Contact</h5>
                    
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

        <div class="card">
            <div class="card-header">
                

            </div>
            <div class="card-body">
                @if (Session::has('message_sent'))
                <div class="alert bg-success alert-success text-white" role="alert">
                    {{ Session::get('message_sent') }}
                </div>
                @endif
            </div>
            <form class="forms-sample" action="{{ route('contact.send.email') }}" method="POST">
                @csrf
                @method('POST')
                <div class="form-group">

                    <label for="title">from:</label>
                    <input type="text" name="from" class="form-control" name="title" >
                </div>

                <div class="form-group">

                    <label for="title">email:</label>
                    <input type="text" name="email" class="form-control" name="title"  >
                </div>
                <div class="form-group">

                    <label for="title">message:</label>
                    <input type="textarea" name="message" class="form-control" name="title" >
                </div>

                <button type="submit" class="btn btn-primary">Save & Close</button>

            </form>
        </div>
    </div>
</div>
@endsection