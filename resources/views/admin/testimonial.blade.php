@extends('admin.layout')
@section('content')

      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-body">
              <div class="col-12 col-md-12 col-lg-12">

                @if(Session::has('success'))
                <div class="col-6 col-lg-6 col-md-6">
                    <div class="alert alert-success">
                        {{ Session::get('success') }}
                    </div>
                </div>
                @endif
                @if(Session::has('fail'))
                <div class="col-6 col-lg-6 col-md-6">
                    <div class="alert alert-danger">
                        {{ Session::get('fail') }}
                    </div>
                </div>
                @endif
              
                <div class="card">
                  <div class="card-header">
                    <h4>Write Testimonial Here</h4>
                  </div>
                  <form action="{{ route('admin/createComment') }}" method="POST">
                  @csrf
                    <div class="card-body">
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="inputEmail4">Full Name</label>
                                <input type="text" class="form-control" name="fullname" placeholder="Enter Full Name">
                            </div>
                            <div class="form-group col-md-12">
                                <label for="inputEmail4">Comments</label>
                                <textarea name="comment" id="" cols="30" rows="10" class="form-control">Write Comments Here</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer col-xl-4 col-lg-4 col-md-4">
                        <button class="btn btn-primary btn-block btn-lg" type="submit">Submit</button>
                    </div>
                  </form>
                </div>                    
            </div>
          </div>
        </section>
      </div>



@stop