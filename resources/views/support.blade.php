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
                                    <li>Support Ticket</li>
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
                                    <a class="nav-link active" href="{{ route('support') }}">Chat Support</a>
                                </li>
                            </ul>
                        </nav>
                    </div>

                    <div class="row">
                        <div class="col-xl-7 col-lg-7 col-md-7">
                        <div class="card col-xl-12 col-lg-12 col-md-12" style="border-radius: 20px;">
                        <div class="align-items-center justify-content-between">
                        <br>
                            <div id="accordion">
                            <div class="accordion">
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
                                <div class="accordion-header" role="button" data-toggle="collapse" data-target="#panel-body-1"
                                aria-expanded="true">
                                <button class="btn btn-dark btn-lg btn-responsive col-xl-12 col-lg-12 col-md-12" style="border-radius: 20px; height: 70px;" type="button" data-toggle="collapse"
                                    data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                                    + Create New Complain Ticket
                                </button>
                            </div>
                                <br>
                                <div class="collapse" id="collapseExample">
                                    <form action="{{ route('chatSupport') }}" method="POST" class="form-group" enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="email" value="{{$loggedUserInfo['email']}}">
                                        <div>
                                            <label>Ticket Type</label>
                                            <select name="ticket_type" class="form-control custom-select">
                                                <option value="">Select Ticket Type</option>
                                                <option value="Enquiry">Enquiry</option>
                                                <option value="Transaction Delay">Transaction Delay</option>
                                                <option value="Pairing Issues">Pairing Issues</option>
                                                <option value="Others">Others</option>
                                            </select>
                                            <span class="text-danger">@error('ticket_type'){{ $message }}@enderror</span>
                                        </div>
                                        <div>
                                            <label style="font-weight: bold;">Subject</label>
                                            <input type="text" name="subject" placeholder="Title/Subject of Complain" class="form-control">
                                            <span class="text-danger">@error('subject'){{ $message }}@enderror</span>
                                        </div>
                                        <br>
                                        <div>
                                            <label style="font-weight: bold;">Message</label>
                                            <textarea name="message" id="" cols="30" rows="5" class="form-control" placeholder="Write your Message Here in this box Here"></textarea>
                                            <span class="text-danger">@error('message'){{ $message }}@enderror</span>
                                        </div>
                                        <br>
                                        <div>
                                            <label>Attach Image Proof (Max size of 2MB)</label>
                                            <input type="file" name="attach">
                                            <span class="text-danger">@error('attach'){{ $message }}@enderror</span>
                                        </div>
                                        <br>
                                            <button type="submit" class="btn btn-primary" style="border-radius: 12px;">Send Message</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        </div>
                        </div>
                    </div>
                    <br>
                    <br>

                    <!----Tickets Section----->
                    <div class="col-xl-5 col-lg-5 col-md-5">
                    <div class="card col-xl-12 col-lg-12 col-md-12" style="border-radius: 20px;">
                        <div class="align-items-center justify-content-between">
                            <h6>
                                All My Tickets
                            </h6>
                            <div class="table-reponsive">
                                <table class="table display misco-data-table" style="width:100%">
                                    <tr>
                                        <th scope="col" style="font-weight: bold;">Ticket ID</th>
                                        <th scope="col">Type</th>
                                        <th scope="col">Chat</th>
                                    </tr>


                                    @foreach ($tickets as $item)
                                        <tr>
                                            <td style="font-weight: bold;">{{$item->id}}</td>
                                            <td>{{$item->ticket_type}}</td>
                                            <td><a href="/chat/{{$item->id}}">Chat Here</a></td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                    </div>
                    </div>
                </div>
            </div>
@stop
