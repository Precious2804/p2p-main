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
                                    <li>Dashboard</li>
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

            <!-- account begin -->
            <div class="user-dashboard">
                <div class="container">
                <div class="dashboard-menu row d-flex justify-content-center">
                        <nav>
                            <ul>
                                <li class="nav-item">
                                    <a class="nav-link active" href="{{ route('dashboard') }}">Dashboard</a>
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
                    @if(!$data['acct_number'])
                        <div class="alert alert-warning"><i class="fa fa-exclamation-triangle"></i>
                        Please Ensure that you Complete Your Registration by Updating your Bank Account Information,
                        this is important for completing any Merging Process. <a href="{{ route('account') }}">Click to Update Now</a></div>
                    @endif
                    <div class="user-statics">
                        <div class="row">
                            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                                <div class="single-statics">
                                    <div class="part-icon">
                                        <img src="assets/img/icon/002-cash.png" alt="">
                                    </div>
                                    <div class="part-info">
                                    @if(!$helpInfo['amount'])
                                        <span class="number">₦0</span>
                                    @endif
                                    @if($helpInfo['amount'])
                                        <span class="number">₦{{$helpInfo['amount']}}</span>
                                    @endif
                                        <span class="text">Current Investment</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                                <div class="single-statics">
                                    <div class="part-icon">
                                        <img src="assets/img/icon/003-credit-card.png" alt="">
                                    </div>
                                    <div class="part-info">
                                    @if(!$helpInfo['profit'])
                                        <span class="number">₦0</span>
                                    @endif
                                    @if($helpInfo['profit'])
                                        <span class="number">₦{{$helpInfo['profit']}}</span>
                                    @endif
                                        <span class="text">Expected Profit</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                                <div class="single-statics">
                                    <div class="part-icon">
                                        <img src="assets/img/icon/001-donation.png" alt="">
                                    </div>
                                    <div class="part-info">
                                    @if(!$helpInfo['rate'])
                                        <span class="number">0%</span>
                                    @endif
                                    @if($helpInfo['rate'])
                                        <span class="number">{{$helpInfo['rate']}}%</span>
                                    @endif
                                        <span class="text">Net Rate</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                                <div class="single-statics">
                                    <div class="part-icon">
                                        <img src="assets/img/icon/004-hourglass.png" alt="">
                                    </div>
                                    <div class="part-info">
                                    @if(!$helpInfo['total'])
                                        <span class="number">₦0</span>
                                    @endif
                                    @if($helpInfo['total'])
                                        <span class="number">₦{{$helpInfo['total']}}</span>
                                    @endif
                                        <span class="text">Expected Returns</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    @if(count($allProvide) > 0)
                        <div class="row">
                            <div class="col-xl-12 col-lg-12">
                                <div class="transactions-table">
                                    <h3 class="title">
                                        Transaction History
                                    </h3>
                                    <div class="table-responsive">
                                        <table id="example" class="table display misco-data-table" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Transaction ID</th>
                                                    <th scope="col">Date/Time</th>
                                                    <th scope="col">Amount</th>
                                                    <th scope="col">Profit</th>
                                                    <th scope="col">Total</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                @foreach ($allProvide as $item)
                                                <tr>
                                                    <td>{{$item->id}}</td>
                                                    <td>{{$item->created_at}}</td>
                                                    <td>₦{{$item->amount}}</td>
                                                    <td>₦{{$item->profit}}</td>
                                                    <td>₦{{$item->total}}</td>
                                                </tr>
                                                @endforeach
                                            </tbody>

                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
            <!---account ends-->
@stop
