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
                        Login<span class="special"> Here</span>
                        </h2>
                    </div>
                   <div class="container">
                    <div class="all-testimonials">
                        <div class="row justify-content-center">
                            <div class="col-xl-8 col-lg-8">
                                <div class="testi-text-slider">
                                    <div class="single-testimonial">
                                        <form action="{{ route('loginPost') }}" method="POST">
                                            @if (Session::get('fail'))
                                                <div class="alert alert-danger">
                                                    {{Session::get('fail')}}
                                                </div>
                                            @endif

                                            @if (Session::get('success'))
                                            <div class="alert alert-success">
                                                {{Session::get('success')}}, please login to continue !
                                            </div>
                                            @endif

                                            @if (Session::get('failed'))
                                                <div class="alert alert-danger">
                                                    {{Session::get('failed')}}
                                                </div>
                                            @endif
                                            @if (Session::get('info'))
                                                <div class="alert alert-danger">
                                                    {{Session::get('info')}}
                                                </div>
                                            @endif

                                            @csrf
                                            <div class="form-group">
                                            <label class="float-left" style="font-weight: bold;">Email Address:</label>
                                                <input type="email" class="form-control" name="email" value="{{old('email')}}" placeholder="Please Enter Your Email Address" value="{{old('email')}}">
                                                <span class="text-danger">@error('email') {{$message}} @enderror</span>
                                            </div>
                                            <div class="form-group">
                                            <label class="float-left" style="font-weight: bold;">Password:</label>
                                                <input type="password" class="form-control" name="password" placeholder="Enter Your Password">
                                                <span class="text-danger">@error('password') {{$message}} @enderror</span>
                                            </div>
                                            <button type="submit" class="btn btn-block btn-primary">Sign In</button>
                                            <br>
                                            Don't have an Account Yet?<a href="{{ route('register') }}">Register Here</a>
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



