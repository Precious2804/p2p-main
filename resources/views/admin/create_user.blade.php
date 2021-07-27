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
                    <h4>Create New User</h4>
                  </div>
                  <form action="{{ route('admin/createUser') }}" method="POST">
                  @csrf
                    <div class="card-body">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">First Name</label>
                                <input type="text" class="form-control" name="fname" placeholder="Enter First Name">
                                <span class="text-danger">@error('fname'){{ "The First Name is Required" }}@enderror</span>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Last Name</label>
                                <input type="text" class="form-control" name="lname" placeholder="Enter Last Name">
                                <span class="text-danger">@error('lname'){{ "The Last Name is Required" }}@enderror</span>
                            </div>
                        </div>
                            <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Username</label>
                            <input type="text" class="form-control" id="inputEmail4" name="username" placeholder="Choose Username">
                            <span class="text-danger">@error('username'){{ $message }}@enderror</span>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Email</label>
                            <input type="email" class="form-control" id="inputPassword4" name="email" placeholder="Enter Email">
                            <span class="text-danger">@error('email'){{ $message }}@enderror</span>
                        </div>
                        </div>
                        <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Phone Number</label>
                            <input type="text" class="form-control" id="inputEmail4" name="phone" placeholder="Enter Phone Number">
                            <span class="text-danger">@error('phone'){{ $message }}@enderror</span>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Gender</label>
                            <select name="gender" id="" class="form-control">
                                <option value="">Select Gender</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                        </div>
                        <div class="form-group">
                        <label for="inputAddress">Address</label>
                        <input type="text" class="form-control" name="address" id="inputAddress" placeholder="Resident Address">
                        </div>
                        <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputPassword4">Password</label>
                            <input type="password" class="form-control" id="inputEmail4" name="password" placeholder="Enter Password">
                            <span class="text-danger">@error('password'){{ $message }}@enderror</span>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPassword4">Confirm Password</label>
                            <input type="password" class="form-control" id="inputEmail4" name="password_confirmation" placeholder="Enter Password">
                        </div>
                        </div>
                    </div>
                    <div class="card-footer col-xl-4 col-lg-4 col-md-4">
                        <button class="btn btn-primary btn-block btn-lg">Submit</button>
                    </div>
                  </form>
                </div>                
            </div>
          </div>
        </section>
      </div>



@stop