@extends('layout')
@section('content')

            <!-- breadcrumb begin -->
            <div class="breadcrumb-oitila">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-9 col-lg-9 col-8">
                            <div class="part-txt">
                                <h1>contact</h1>
                                <ul>
                                    <li>home</li>
                                    <li>contact page</li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-4 d-flex align-items-center">
                            <div class="part-img">
                                <img src="assets/img/breadcrumb-img.png" alt="image">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- breadcrumb end -->
<!-- contact begin -->
<div class="contact contact-page" id="contact">
                <div class="container container-contact">
                    <div class="row justify-content-center">
                        <div class="col-xl-8 col-lg-8">
                            <div class="section-title">
                                <span class="sub-title">
                                    Contact Us
                                </span>
                                <h2>
                                    Get in touch<span class="special"> with us</span>
                                </h2>
                            </div>
                        </div>
                    </div>
                    <div class="bg-tamim">
                        <div class="row justify-content-around">
                            <div class="col-xl-6 col-lg-6 col-sm-10 col-md-6">
                                <div class="part-form">
                                    <form action="{{ route('doContact') }}" method="POST">
                                    @csrf
                                    @if (Session::get('success'))
                                        <div class="alert alert-success">
                                            {{Session::get('success')}}
                                        </div>
                                    @endif
                                    @if (Session::get('fail'))
                                        <div class="alert alert-danger">
                                            {{Session::get('fail')}}
                                        </div>
                                    @endif
                                        <input type="text" name="name" placeholder="Enter Name">
                                        <input type="email" name="email" placeholder="Enter Email">
                                        <textarea name="message" placeholder="Write to Us..."></textarea>
                                        <button class="submit-btn def-btn" type="submit">Submit</button>
                                    </form>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-sm-10 col-md-6">
                                <div class="part-address">
                                    <div class="addressing">
                                        <div class="single-address">
                                            <h4>Our Office</h4>
                                            <p>1941 Romines Mill Road
                                                Irving, TX 75062<br/>Texas, United States</p>
                                        </div>
                                        <div class="single-address">
                                            <h4>Email</h4>
                                            <p>DanielleHButeau@teleworm.us<br/>
                                                CharlesTPride@armyspy.com</p>
                                        </div>
                                        <div class="single-address">
                                            <h4>Phone</h4>
                                            <p>+1 318-342-7639<br/>
                                                +1 530-259-4087</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- contact end -->

@stop