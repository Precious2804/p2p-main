@extends('layout2')
@section('content')

                <!-- breadcrumb begin -->
                <div class="breadcrumb-oitila db-breadcrumb">
                <div class="container">
                    <div class="row justify-content-lg-around">
                        <div class="col-xl-6 col-lg-7 col-md-5 col-sm-6 col-8">
                            <div class="part-txt">
                                <h1>Dashboard</h1>
                                <ul>
                                    <li>home</li>
                                    <li>Chat Here</li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-5 col-md-7 col-sm-6 col-4 d-flex align-items-center">
                            @include('/partials/navigation')
                        </div>
                    </div>
                </div>
            </div>
            <!-- breadcrumb end -->


            <div class="user-dashboard">
                <div class="container">
                <div class="dashboard-menu row d-flex justify-content-center">
                        <nav>
                            <ul>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('dashboard') }}">Dashboard</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('account') }}">My Account</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('ph') }}">Provide Help</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('gh') }}">Get Help</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('referral') }}">Referrals</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('track') }}">Tracker</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('support') }}">Chat Support</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                <div class="row">

                <div class="col-xl-5 col-lg-5 col-md-5">
                        <div class="card col-xl-12 col-lg-12 col-md-12" style="border-radius: 20px;">
                        <div class="align-items-center justify-content-between">
                        <br>
                                        @if(Session::has('success'))
                                            <div class="alert alert-success">
                                                {{Session::get('success')}}
                                            </div>
                                        @endif
                                        @if(Session::has('fail'))
                                            <div class="alert alert-danger">
                                                {{Session::get('fail')}}
                                            </div>
                                        @endif
                                <br>
                                    <form action="{{ route('newMessage') }}" method="POST" class="form-group" enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="email" value="{{$loggedUserInfo['email']}}">
                                        <input type="hidden" name="ticket_type" value="{{$chatData['ticket_type']}}">
                                        <input type="hidden" name="unique_id" value="{{$chatData['unique_id']}}">
                                        <div>
                                            <label style="font-weight: bold;">Message</label>
                                            <textarea name="message" id="" cols="30" rows="5" class="form-control" placeholder="Write your Message Here in this box Here"></textarea>
                                            <span class="text-danger">@error('message'){{ $message }}@enderror</span>
                                        </div>
                                        <br>
                                        <div>
                                            <label>Attach Image (Max size of 2MB)</label>
                                            <input type="file" name="attach">
                                            <span class="text-danger">@error('attach'){{ $message }}@enderror</span>
                                        </div>
                                        <br>
                                            <button type="submit" class="btn btn-primary" style="border-radius: 12px;">Send Message</button>
                                    </form>
                                </div>
                            </div>
                            <br>
                    </div>

                    <!----Chat Section----->
                    <div class="col-xl-7 col-lg-7 col-md-7" style="height: 300px;">
                        <div class="">
                            <h5 style="font-weight: bold;">
                                Messages & Replies
                            </h5>
                            <div class="border" style="overflow-x: hidden; overflow-y: auto; height:400px; border-radius: 20px;">
                                <br>
                                @foreach($allMessages as $item)
                                @if($item->message)
                                    <div class="col-xl-7 col-lg-7 col-md-7 float-right">
                                        <div class="alert alert-success">
                                        <p>{{$item->message}} </p>
                                        <i class="text-primary" style="font-size: 12px;">{{$item->created_at}}</i>
                                        <i style="font-size: 12px; color: black;"> User</i>
                                        @if($item->attach)
                                            <img src="{{$item->attach}}" alt="">
                                        @endif
                                    </div>
                                    </div>
                                @endif
                                @if($item->reply)
                                    <div class="col-xl-7 col-lg-7 col-md-7 float-left">
                                        <div class="alert alert-info">
                                        <p>{{$item->reply}} </p>
                                        <i class="text-primary" style="font-size: 12px;">{{$item->created_at}}</i>
                                        <i style="font-size: 12px; color: black;">from Admin</i>
                                    </div>
                                    </div>
                                @endif

                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
            <br>
            <br>
            <br><br><br>
@stop
