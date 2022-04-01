@extends('admin.layouts.master')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Total Appointments: {{ $bookings->count() }}
                    </div>
                    <form action="{{ route('patients') }}" method="GET">

                        <div class="card-header">
                            Filter by Date: &nbsp;
                            <div class="row">
                                <div class="col-md-10 col-sm-6">
                                    <input type="text" class="form-control datetimepicker-input" id="datepicker"
                                        data-toggle="datetimepicker" data-target="#datepicker" name="date"
                                        placeholder=@isset($date) {{ $date }} @endisset>
                                </div>
                                <div class="col-md-2 col-sm-6">
                                    <button type="submit" class="btn btn-primary">Search</button>
                                </div>
                            </div>

                        </div>
                    </form>

                    <div class="card-body table-responsive-lg">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Time</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Doctor</th>
                                    <th scope="col">User</th>
                                    <th scope="col">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($bookings as $key=>$booking)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $booking->time }}</td>
                                        <td>{{ $booking->date }}</td>
                                        <td>{{ $booking->user->name }}</td>
                                        <td>{{ $booking->doctor->name}}</td>
                                        <td>
                                            @if ($booking->status == "waiting")
                                                <a href="{{ route('update.status', [$booking->id]) }}"><button
                                                        class="btn btn-warning">Pending</button></a>
                                            @else
                                                <a href="{{ route('update.status', [$booking->id]) }}"><button
                                                        class="btn btn-success">Checked-In</button></a>
                                            @endif
                                        </td>

                                    </tr>
                                @empty
                                    <td>There is no appointment!</td>
                                @endforelse

                            </tbody>
                        </table>
                    </div>
                    {{-- Pagination --}}
                    {{ $bookings->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
