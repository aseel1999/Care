@extends('admin.layouts.master')

@section('content')

<div class="page-header">
    <div class="row ">
        <div class="col-lg-8">
            <div class="page-header-title">
                <i class="ik ik-inbox bg-blue"></i>
                <div class="d-inline">
                    <h5>Review</h5>
                    <span>The List of All Review</span>
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
                        <a href="#">Review</a>
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
                <h3>All Reviews</h3>

            </div>
            <div class="card-body">
                <table id="data_table" class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>review_rating</th>
                            <th>Doctor Name</th>
                            <th>User Name</th>
                            <th>Comment</th>

                        </tr>
                    </thead>
                    <tbody>
                        @if (count($reviews) > 0)
                        @foreach ($reviews as $review)
                        <tr>
                            <td>{{$review->id}}</td>
                            <td>{{$review->review_rating}}</td>
                            <td>{{@$review->docts->doctor_name}}</td>
                            <td>{{@$review->uses->name}}</td>
                            <td>{{@$review->comment}}</td>
                        </tr>
                        @endforeach

                        @else
                        <td>No Reviews. Please create one.</td>
                        @endif

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection