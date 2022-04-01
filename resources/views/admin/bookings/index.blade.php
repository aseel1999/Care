@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">My appointments: {{ $appointments->count() }}</div>

                    <div class="card-body table-responsive-sm">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Time</th>
                                    <th scope="col">Date for</th>
                                    <th scope="col">Created date</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Doctor</th>
                                    <th scope="col">User</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($appointments as $key=>$appointment)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $appointment->time }}</td>
                                        <td>{{ $appointment->date }}</td>
                                        <td>{{ $appointment->created_at->format('m-d-yy') }}</td>
                                        <td>{{ $appointment->doctors->name }}</td>
                                        <td>{{ $appointment->user1->name }}</td>
                                    </tr>
                                @empty
                                    <td>You have no any appointments</td>
                                @endforelse

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
