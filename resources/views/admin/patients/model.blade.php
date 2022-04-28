<div class="modal1 fade" id="exampleModal1{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModal1Label"
    aria-hidden="true">
    <div class="modal1-dialog modal1-lg">
        <div class="modal1-content">
            <div class="modal1-header">
                <h5 class="modal1-title" id="exampleModal1Label">Patient information</h5>
                <button type="button" class="close" data-dismiss="modal1" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal1-body">
                <p>Name: {{ $user->name }}</p>
                <p>Phone number: {{$user->phone}}</p>
                <p>Email: {{ $user->email }}</p>
                <p><img src="{{ asset('assets/images/blank.png') }}" class="table-user-thumb" alt="" width="200"></p>
                <p>Address: {{ $user->address }}</p>
                <p>Date_Of_Birth:{{ $user->doctor_experience }}</p>
                <p>Status:{{ $user->social_status }}</p>
                <p>Blood_Type:{{ $user->blood_type }}</p>
                <p>Diseases:{{ $user->patient_diseases }}</p>
                <p>Medicines{{ $user->patient_medicines}}</p>
                <p>Doctor:{{ $user->doctors->doctor_name}}</p>
                
            </div>
            <div class="modal1-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal1">Close</button>

            </div>
        </div>
    </div>
</div>
