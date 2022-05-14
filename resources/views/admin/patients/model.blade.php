<div class="modal fade" id="exampleModal{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Patient information</h5>
                <button type="button" class="close" data-dismiss="modal1" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Name: {{ $user->name }}</p>
                <p>Phone number: {{$user->phone}}</p>
                <p>Email: {{ $user->email }}</p>
                <p><img src="{{ asset('assets/images') }}/{{ $user->image }}" class="table-user-thumb" alt="" width="200"></p>
                <p>Address: {{ $user->address }}</p>
                <p>Date_Of_Birth:{{ $user->date_of_birth}}</p>
                <p>Status:{{ $user->social_status }}</p>
                <p>Blood_Type:{{ $user->blood_type }}</p>
                <p>Diseases:{{ $user->patient_diseases }}</p>
                <p>Medicines{{ $user->patient_medicines}}</p>
                
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>

            </div>
        </div>
    </div>
</div>
