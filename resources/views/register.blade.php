@extends('layout')

@section('content')
    <div class="testimonial">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-8 col-lg-8">
                    <div class="section-title">
                        <span class="sub-title">
                        </span>
                        <h2>
                        Create an <span class="special">Account Here</span>
                        </h2>
                    </div>
                   <div class="container">
                    <div class="all-testimonials">
                        <div class="row justify-content-center">
                            <div class="col-xl-8 col-lg-8">
                                <div class="testi-text-slider">
                                    <div class="single-testimonial">
                                    <form action="{{ route('register') }}" method="POST">

                                        @if (Session::get('success'))
                                        <div class="alert alert-success">
                                            {{Session::get('success')}} <a href="{{ route('login') }}">Click Here to Login</a>
                                        </div>
                                        @endif
                                        @if (Session::get('fail'))
                                            <div class="alert alert-danger">
                                                {{Session::get('fail')}}
                                            </div>
                                        @endif

                                        @if (Session::get('failed'))
                                            <div class="alert alert-danger">
                                                {{Session::get('failed')}}
                                            </div>
                                        @endif

                                        @csrf
                                        <br>
                                    <div class="text-info">
                                        <span>Fill the Form to Create an Account</span>
                                    </div>
                                    <br>

                                        @if($ref_id)
                                        <div class="form-group">
                                        <label class="float-left" style="font-weight: bold;">Referral ID (If any, Optional):</label>
                                            <input type="hidden" class="form-control" name="ref_id" value="{{$ref_id}}">
                                            <input type="text" disabled class="form-control" name="ref_id" value="{{$ref_id}}">
                                        </div>
                                        @endif

                                        <div class="form-group">
                                        <label class="float-left" style="font-weight: bold;">First Name:</label>
                                            <input type="text" class="form-control" name="fname" placeholder="First Name Here" value="{{old('fname')}}">
                                            <span class="text-danger">@error('fname'){{ "The First Name is Required" }}@enderror</span>
                                        </div>
                                        <div class="form-group">
                                        <label class="float-left" style="font-weight: bold;">Last Name:</label>
                                            <input type="text" class="form-control" name="lname" placeholder="Last Name Here" value="{{old('lname')}}">
                                            <span class="text-danger">@error('lname'){{ "The Last Name must be a String" }}@enderror</span>
                                        </div>
                                        <div class="form-group">
                                        <label class="float-left" style="font-weight: bold;">Username:</label>
                                            <input type="text" class="form-control" name="username" placeholder="Choose a Username" value="{{old('username')}}">
                                            <span class="text-danger">@error('username'){{ "$message" }}@enderror</span>
                                        </div>
                                        <div class="form-group">
                                        <label class="float-left" style="font-weight: bold;">Email Address:</label>
                                            <input type="email" class="form-control" name="email" placeholder="Please Enter Your Email Address" value="{{old('email')}}">
                                            <span class="text-danger">@error('email'){{ "$message" }}@enderror</span>
                                        </div>
                                        <div class="form-group">
                                        <label class="float-left" style="font-weight: bold;">Phone Number:</label>
                                            <input type="text" class="form-control" name="phone" placeholder="Please Enter Your Phone Number" value="{{old('phone')}}">
                                            <span class="text-danger">@error('phone'){{ "$message" }}@enderror</span>
                                        </div>
                                        <div class="form-group">
                                        <label class="float-left" style="font-weight: bold;">Gender:</label>
                                            <select name="gender" class="form-control">
                                                <option value="">Select Gender</option>
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                            </select>
                                        </div>
                                        {{-- <div class="form-group">
                                        <label class="float-left" style="font-weight: bold;">Resident/House Address:</label>
                                            <textarea name="address" class="form-control" placeholder="Enter Your Resident Address"></textarea>
                                        </div> --}}

                                        {{-- @if(!$ref_id)
                                        <div class="form-group">
                                        <label class="float-left" style="font-weight: bold;">Referral ID (If any, Optional):</label>
                                            <input type="text" class="form-control" name="ref_id" placeholder="Referral ID (If any, Optional)">
                                        </div>
                                        @endif --}}
                                        <div class="form-group">
                                        <label class="float-left" style="font-weight: bold;">Password:</label>
                                            <input type="password" class="form-control" name="password" placeholder="Enter Your Password">
                                            <span class="text-danger">@error('password'){{ "$message" }}@enderror</span>
                                        </div>
                                        <div class="form-group">
                                        <label class="float-left" style="font-weight: bold;">Confirm Password:</label>
                                            <input type="password" class="form-control" name="password_confirmation" placeholder="Re-enter Password">
                                        </div>
                                        <button type="submit" class="btn btn-block btn-primary">Register</button>
                                        <br>
                                        Already Have an Account?<a href="{{ route('login') }}">Sign In Here</a>
                                    </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                </div>
            </div>
        </div>
    </div>

@stop



