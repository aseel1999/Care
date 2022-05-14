@extends('admin.layouts.master')

@section('content')

    <div class="page-header">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="ik ik-inbox bg-blue"></i>
                    <div class="d-inline">
                        <h5>Doctors</h5>
                        <span>List of All Doctors</span>
                    </div>
                </div>
            </div>
           
            <div class="col-lg-16">
                <nav class="breadcrumb-container" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="../index.html"><i class="ik ik-home"></i></a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="#">Doctors</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Index</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-lg-30">
            @if (Session::has('message'))
                <div class="alert bg-success alert-success text-white text-center" role="alert">
                    {{ Session::get('message') }}
                </div>
            @endif
            <form action="{{ route('doctors.index') }}" method="GET">
                @csrf
                        <div class="row">
                            <div class="col-md-4">
                                <input type="text" name="search" class="form-control" placeholder="search" value="{{ request()->search }}">
                            </div>
                            <div class="col-md-4">
                                <select name="specialty_id" class="fospecialtiesrm-control">
                                    <option value="">All Speciality</option>
                                    @foreach ($specialties as $specialty)
                                    {{ $specialty}}
                                        <option value="{{ $specialty->id }}" {{ request()->specialty_id == $specialty->id ? 'selected' : '' }}>{{ $specialty->specialty }}</option>
                                    @endforeach
                                </select>
                                <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> Search</button>
                                    
                            </div>

                            
                        </div>
                    </form>
            <div class="card">
                <div class="card-body ">
                    <table id="data_table" class="table table-responsive">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>phone</th>
                                <th>Email</th>
                                <th>Image_path</th>
                                <th>Doctor_gender</th>
                                <th>Doctor_experience</th>
                                <th>Booking_price</th>
                                <th>specialty_id</th>
                                <th>Clinic_name</th>
                                <th>Clinic_location</th>
                                <th>Clinic_phone</th>
                                 <th> status</th>
                                 <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($doctors) > 0)
                                @foreach ($doctors as $doctor)
                                    <tr>
                                        <td>{{ $doctor->doctor_name }}</td>
                                        <td>{{ $doctor->doctor_phone }}</td>
                                        <td>{{ $doctor->doctor_email }}</td>
                                        <td><img src="{{asset('assets/images/'.$doctor->image_path)}}" class="table-user-thumb"
                                            width="40">
                                        </td>
                                        <td>{{ $doctor->doctor_gender }}</td>
                                        <td>{{ $doctor->doctor_experience }}</td>
                                        <td>{{ $doctor->booking_price }}</td>
                                        <td>{{ $doctor->specialty_id}}</td>
                                        <td>{{ $doctor->clinic_name}}</td>
                                        <td>{{ $doctor->clinic_location}}</td>
                                        <td>{{ $doctor->clinic_phone}}</td>
                                        <td>{{ $doctor->status}}</td>
                                        <td>
                                            <div class="table-actions">
                                                <a href="{{ route('doctors.edit', $doctor->id) }}"><i
                                                        class="btn btn-warning ik ik-edit-2"></i></a>
                                                        <a href="#" data-toggle="modal" data-target="#exampleModal{{ $doctor->id }}">
                                                            <i class="btn btn-primary ik ik-eye"></i>
                                                        </a>
                                                        <button type="button" data-email="{{ $doctor->doctor_email }}" class="btn btn-primary send" data-toggle="modal" data-target="#exampleModal">
                                                            Launch demo modal
                                                          </button>

                                                

                                            </div>
                                        </td>
                                    </tr>
                                    @include('admin.doctors.model')
                                @endforeach

                                {{ $doctors->appends(request()->query())->links() }}

                        </tbody>
                    </table>
                    @else
                    <h>No doctor to display<h>
                         @endif
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="{{ route('doctor.send') }}" method="POST">
                @csrf
                <label for="">Full name</label>
                <input type="text" name="name" class="form-control @error('doctor_name') is-invalid @enderror"
                    value="{{ $doctor->doctor_name }}">
                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            
            <div class="col-lg-6">
                <label for="">Email</label>
                <input type="email" name="doctor_email" class="form-control @error('doctor_email') is-invalid @enderror"
                    value="{{ $doctor->doctor_email }}">
                @error('doctor_email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="col-lg-6">
                <label for="">phone</label>
                <input type="text" name="phone" class="form-control @error('email') is-invalid @enderror"
                    value="{{ $doctor->doctor_phone }}">
                @error('doctor_phone')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="col-lg-6">
            
            
        </div>

        <div class="row">
            <div class="col-lg-6">
                <label for="">BookingPrice</label>
                <input type="number" name="bookingPrice"
                    class="form-control @error('booking_price') is-invalid @enderror"
                    placeholder="Doctor'sbookingPrice" value="{{ $doctor->booking_price }}">
                @error('booking_price')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

             </div> 
            
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="">Clinic Name</label>
                    <input type="text" name="clinic_name"
                        class="form-control @error('clinic_name') is-invalid @enderror"
                        value="{{ $doctor->clinic_name }}">
                    @error('clinic_name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror

                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="">Clinic Location</label>
                    <input type="text" name="clinic_location"
                        class="form-control @error('clinic_location') is-invalid @enderror"
                        value="{{ $doctor->clinic_location }}">
                    @error('clinic_location')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror

                </div>
                <div class="form-group">
                <label for="">Specialty </label>
        <select name="specialty_id" class="form-control @error('specialty_id') is-invalid @enderror">
            <option value="">Please select specialty</option>
            @foreach ($specialties as $specialty)
                    <option value="{{ $specialty->id }}" >
                        {{ $specialty->specialty }}</option>
                @endforeach
        </select>
        @error('specialty_id')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror

                </div>
            </div>
        
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                <label for="">ClinicPhone</label>
                    <input type="text" name="clinic_phone"
                        class="form-control @error('clinic_phone') is-invalid @enderror"
                        value="{{ $doctor->clinic_phone}}">
                    @error('clinic_phone')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            
    
                  <button class="btn btn-info"> Send Email </button>
             
            </div>
            <div class="modal-footer">
              <button  class="btn btn-primary">Send Email</button>
            </form>
        </div>
    </div>
        </div>
          </div>
       </div>
        </div>
      </div>
      @section('JS')
      <script>
        $('.send').on('click',function(){
           $('#email').val( $(this).data('email'));
        })
      </script>
  @endsection
    
@endsection
