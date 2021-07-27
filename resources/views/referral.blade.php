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
                                    <li>Referral</li>
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
                                    <a class="nav-link active" href="{{ route('referral') }}">Referrals</a>
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


                    <!---Put Page here-->
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-6">
                            <h3 class="text">
                                Your Referral Identification (ID)
                            </h3>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6">
                            <h6 class="text-right">
                                <button class="user_ref_llk">Referral Link: <a href="register?ref_id={{$loggedUserInfo['username']}}">{{route('register')}}?ref_id={{$loggedUserInfo['username']}}</a>
                                </button>
                            </h6>
                        </div>
                    </div>

                    <div class="last-step">
                            <div>
                                <div class="row">
                                        <div class="col-xl-12 col-lg-12 col-md-12">
                                            <div class="text-warning_control">Please Note: Your Referral ID is uniquely created for this account, and could be shared to register new Users.
                                            Also Note, this attracts a 10% bonus fee, for whenever an investment is Completed by the new User.
                                            Share your Referral ID to as much people, that you can refer to the system.</div>
                                            <hr>
                                        <br>
                                        <br>
                                        </div>
                                        <br>
                                        <br>
                                        <div class="col-xl-12 col-lg-12 col-md-12">
                                        <h3 class="title">
                                            Referral Commissioning
                                        </h3>
                                            <div class="transactions-table">
                                                <div class="table-responsive">
                                                    <table class="table display misco-data-table" style="width:100%">
                                                        <tr>
                                                            <th scope="col">Username</th>
                                                            <th scope="col">Referral ID</th>
                                                            <th scope="col">No of Referrals</th>
                                                        </tr>

                                                        @foreach($refInfo as $item)
                                                        <tr class="text-primary">
                                                            <th scope="row">{{$loggedUserInfo['username']}}</th>
                                                            <td style="font-weight: bold;">{{$item->ref_id}}</td>

                                                            @if(!$item->commision)
                                                            <td class="text text-muted">0</td>
                                                            @endif
                                                            @if($item->commision)
                                                            <td>{{$item->commision}}</td>
                                                            @endif
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
            </div>
            </div>
            </div>
            <!-- account end-->

@stop
