@extends('admin.layouts.master')

@section('content')

    <div class="page-header">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="ik ik-command bg-blue"></i>
                    <div class="d-inline">
                        <h5>Contact</h5>
                        <span>Update Contact</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <nav class="breadcrumb-container" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="../index.html"><i class="ik ik-home"></i></a>
                        </li>
                        <li class="breadcrumb-item"><a href="#">Department</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Update</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h3>Add Contact</h3>
                </div>
                <div class="card-body">
                    <form class="forms-sample" action="{{ route('contact.update', [$contact->id]) }}" method="post">
                        @csrf
                        @method('PATCH')
                        <div class="form-group">
              @csrf
              <label for="name">from:</label>
              <input type="text" class="form-control" name="rom" value={{ $contact->from}}>
          </div>

          <div class="form-group">
              @csrf
              <label for="name">email:</label>
              <input type="text" class="form-control" name="email" value={{ $contact->email }}>
          </div>
          <div class="form-group">
              @csrf
              <label for="name">message:</label>
              <input type="textarea" class="form-control" name="message" value={{ $contact->message }}>
          </div>
          <button type="submit" class="btn btn-primary">Save & Close</button>
          <a href="/contact" class="btn btn-secondary">Cancel</a>
          <button type="reset" class="btn btn-tertiary">Restore Defaults</button>
      </form>
       </div>
</div>

        

@endsection
          