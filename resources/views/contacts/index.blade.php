@extends('admin.layouts.master')

@section('content')

<div class="page-header">
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <i class="ik ik-command bg-blue"></i>
                <div class="d-inline">
                    <h5>Contact</h5>
                    <span>The List of all Contact</span>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <nav class="breadcrumb-container" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="../index.html"><i class="ik ik-home"></i></a>
                    </li>
                    <li class="breadcrumb-item"><a href="#">Contact</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Index</li>
                </ol>
            </nav>
        </div>
    </div>
</div>

<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3> Contact</h3>
            </div>
            <div class="card-body">

                    <table id="data_table" class="table  table-responsive">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>from</th>
                                <th>Email</th>
                                <th>Message</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($contacts as $key => $contact)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{$contact->from}}</td>
                                <td>{{$contact->email}}</td>
                                <td>{{$contact->message}}</td>
                                <td>
<!-- Button trigger modal -->
<!-- Button trigger modal -->
<button type="button" data-email="{{ $contact->email }}" class="btn btn-primary send-email" data-toggle="modal" data-target="#exampleModal">
    Launch demo modal
  </button>

                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
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
          <form action="{{ route('contact.send.email') }}" method="POST">
            @csrf
              <input type="email" name="email" id="email" class="form-control">
              <textarea  name="message" id="message" class=" mt-2 form-control" cols="4" rows="4"></textarea>

              <button class="btn btn-info"> Send Email </button>
         
        </div>
        <div class="modal-footer">
          <button  class="btn btn-primary">Send Email</button>
        </form>
        </div>
      </div>
    </div>
  </div>



  @section('JS')
      <script>
        $('.send-email').on('click',function(){
           $('#email').val( $(this).data('email'));
        })
      </script>
  @endsection

@endsection