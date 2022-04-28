@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                      </div>
                    <div class="card-body table-responsive-lg">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">Doctor-Name</th>
                                    <th scope="col">User-Name</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($doctor->users as $doctor1)
                                    <tr>
                                        <td>{{ @$doctor1->name }}</td>
                                        <td>{{ $doctor1->users->name }}</td>
                                    </tr>
                                    @empty
                                    <td>There is notable on this</td>
                                @endforelse

                            </tbody>
                        </table>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
