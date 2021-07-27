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
                                    <li>Track  Provide Help Status</li>
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
                                        <a class="nav-link active" href="{{ route('track') }}">Tracker</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('support') }}">Chat Support</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>

                        <div class="row">
                            <div class="col-xl-7 col-lg-7 col-md-7">
                            <br>
                            <h3 class="title">
                                    <div class="">Pending Provide Requests</div>
                                </h3>
                                <div class="add-credit-card card">
                                @if(Session::get('proofUpload'))
                                    <div class="alert alert-sucess">
                                        {{Session::get('proofUpload')}}
                                    </div>
                                @endif
                                @if(Session::get('successConfirm'))
                                    <div class="alert alert-sucess">
                                        {{Session::get('successConfirm')}}
                                    </div>
                                @endif
                                    <div class="table-reponsive">
                                        <table class="table display misco-data-table" style="width:100%">
                                            <tr>
                                                <th scope="col" style="font-weight: bold;">Transaction ID</th>
                                                <th scope="col">Date/Time</th>
                                                <th scope="col">Amount</th>
                                                <th scope="col">Profit</th>
                                                <th scope="col">Total</th>
                                                <th scope="col">View</th>
                                                <!-- <th scope="col">Remove</th> -->
                                            </tr>
                                            @foreach ($allProvide as $item)
                                            <tr>
                                                <td style="font-weight: bold;">{{$item->id}}</td>
                                                <td>{{$item->created_at}}</td>
                                                <td>₦{{$item->amount}}</td>
                                                <td>₦{{$item->profit}}</td>
                                                <td>₦{{$item->total}}</td>
                                                <td><a href="/pay/{{$item->id}}">View</a></td>
                                                <!-- <td><a href="/removeHelp/{{$item->id}}">Remove</a></td> -->
                                            </tr>
                                            @endforeach
                                        </table>
                                    </div>
                            </div>
                            </div>
                            <div class="col-xl-5 col-lg-5 col-md-5">
                            <br>
                            <h3 class="title">
                            <div class="">Pending Get Requests</div>
                                </h3>
                                <div class="add-credit-card card">
                                    <div class="table-reponsive">
                                        <table class="table display misco-data-table" style="width:100%">
                                            <tr>
                                                <th scope="col">Transaction ID</th>
                                                <th scope="col">Date/Time</th>
                                                <th scope="col">Amount</th>
                                                <th scope="col">View</th>
                                            </tr>

                                            @foreach ($allGet as $item)
                                            <tr>
                                                <td style="font-weight: bold;">{{$item->get_help_id}}</td>
                                                <td>{{$item->created_at}}</td>
                                                <td>₦{{$item->amount}}</td>
                                                <td><a href="/receive/{{$item->get_help_id}}">View</a></td>
                                            </tr>
                                            @endforeach
                                        </table>
                                    </div>
                            </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <br>

@stop
