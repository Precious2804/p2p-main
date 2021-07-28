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
                        Reset<span class="special"> Password</span>
                        </h2>
                    </div>
                   <div class="container">
                    <div class="all-testimonials">
                        <div class="row justify-content-center">
                            <div class="col-xl-8 col-lg-8">
                                <div class="testi-text-slider">
                                    <div class="single-testimonial">
                                        <form action="{{route('password.update')}}" method="POST">
                                            @if (Session::get('email'))
                                                <div class="alert alert-success">
                                                    {{Session::get('email')}}
                                                </div>
                                            @endif
                                            @if (Session::get('invalid'))
                                                <div class="alert alert-success">
                                                    {{Session::get('invalid')}}
                                                </div>
                                            @endif
                                            @csrf
                                            <input type="hidden" name="token" value="{{$token}}">
                                            <div class="form-group">
                                            <label class="float-left" style="font-weight: bold;">Email Address:</label>
                                                <input type="email" class="form-control" name="email" value="{{old('email')}}" placeholder="Please Enter Your Email Address">
                                                <span class="text-danger">@error('email') {{$message}} @enderror</span>
                                            </div>
                                            <div class="form-group">
                                            <label class="float-left" style="font-weight: bold;">New Password</label>
                                                <input type="password" class="form-control" name="password" placeholder="Enter your new Password">
                                                <span class="text-danger">@error('password') {{$message}} @enderror</span>
                                            </div>
                                            <div class="form-group">
                                            <label class="float-left" style="font-weight: bold;">Email Address:</label>
                                                <input type="password" class="form-control" name="password_confirmation" placeholder="Confirm New password">
                                            </div>
                                            <button type="submit" class="btn btn-block btn-primary">Submit</button>
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



