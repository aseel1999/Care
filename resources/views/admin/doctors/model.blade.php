<div class="modal fade" id="exampleModal{{ $doctor->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Doctor information</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Name: {{ $doctor->doctor_name }}</p>
                <p>Phone number: {{$doctor->doctor_phone}}</p>
                <p>Email: {{ $doctor->doctor_email }}</p>
                <p><img src="{{ asset('assets/images/one.png') }}" class="table-user-thumb" alt="" width="200"></p>
                <p>Gender: {{ $doctor->doctor_gender }}</p>
                <p>Experience:{{ $doctor->doctor_experience }}</p>
                <p>Price:{{ $doctor->booking_price }}</p>
                <p>Qualification:{{ $doctor->qualifications }}</p>
                <p>Certificates:{{ $doctor->certificates }}</p>
                <p>Clinic_name{{ $doctor->clinic_name}}</p>
                <p>Clinic_location:{{ $doctor->clinic_location}}</p>
                <p>clinic_phone:{{ $doctor->clinic_phone}}</p>
                
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>

            </div>
        </div>
    </div>
</div>
