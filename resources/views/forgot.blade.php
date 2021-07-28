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
                        Forgot<span class="special"> Password</span>
                        </h2>
                    </div>
                   <div class="container">
                    <div class="all-testimonials">
                        <div class="row justify-content-center">
                            <div class="col-xl-8 col-lg-8">
                                <div class="testi-text-slider">
                                    <div class="single-testimonial">
                                        <form action="{{ route('password.email') }}" method="POST">
                                            @if (Session::get('invalid'))
                                                <div class="alert alert-danger">
                                                    {{Session::get('invalid')}}
                                                </div>
                                            @endif
                                            @if (Session::get('status'))
                                                <div class="alert alert-success">
                                                    {{Session::get('status')}}
                                                </div>
                                            @endif
                                            @if (Session::get('email'))
                                                <div class="alert alert-danger">
                                                    {{Session::get('email')}}
                                                </div>
                                            @endif
                                            @csrf
                                            <div class="form-group">
                                            <label class="float-left" style="font-weight: bold;">Email Address:</label>
                                                <input type="email" class="form-control" name="email" value="{{old('email')}}" placeholder="Please Enter Your Email Address" value="{{old('email')}}">
                                                <span class="text-danger">@error('email') {{$message}} @enderror</span>
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



