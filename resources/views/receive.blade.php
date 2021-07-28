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
                                    <li>Get Help Info</li>
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
                @if(!$paid['get_help_id'])
                <div class="user-dashboard">
                <div class="">
                    <div class="container card alert alert-info">
                        <div class="d-flex justify-content-center">
                            <div class="special" style="font-size: 35px; font-style:oblique;">Processing Get Help Request.....</div>
                        </div>
                        <br>
                        <div class="d-flex justify-content-center">
                            <div style="text-align: center; font-size: 20px;"> Please be Patient, while we Merge your Get Help Request to a Help Provider, as Soon as this process is completed and Payment is made, with the upload of a proof of payment, just Refresh this page and to receive a Proof of Payment from the Help Provider. Please, also ensure that you Confirm the Payment of the Provider as soon as you get the Deposit of the Payment and a Proof is Uploaded.
                            </div>
                        </div>
                        <br>
                        <div class="d-flex justify-content-center">
                            <a href="{{route('track')}}">Back to Tracker</a>
                        </div>
                    </div>
                </div>
                </div>
                @endif

            @if($paid['get_help_id'])
            <div class="user-dashboard">
                <div class="container">
                    <div class="last-step">
                        <h3 class="title">
                            Confirm Payment Here
                        </h3>
                        <form action="{{ route('confirmPay') }}" method="POST">
                            @csrf
                        <div class="calculation-content">
                            <div class="row">
                                <div class="col-xl-7 col-lg-7 col-md-7">
                                    <ul>
                                    <input type="hidden" name="id" value="{{$paid['id']}}">
                                    <input type="hidden" name="get_help_id" value="{{$paid['get_help_id']}}">
                                        <li>
                                            <i class="far fa-check-circle"></i>
                                            <span class="list-title">Transaction ID</span>
                                            <span class="list-descr">{{$paid['get_help_id']}}</span>
                                            <input type="hidden" name="email" value="{{$paid['email']}}">
                                            <input type="hidden" name="profit" value="{{$paid['profit']}}">
                                            <input type="hidden" name="rate" value="{{$paid['rate']}}">
                                            <input type="hidden" name="total" value="{{$paid['total']}}">
                                        </li>
                                        <li>
                                            <i class="far fa-check-circle"></i>
                                            <span class="list-title">Amount Received</span>
                                            <span class="list-descr">{{$paid['amount']}}</span>
                                            <input type="hidden" name="amount" value="{{$paid['amount']}}">
                                        </li>
                                        <li>
                                            <i class="far fa-check-circle"></i>
                                            <span class="list-title">Payment Method</span>
                                            <span class="list-descr">{{$paid['pay_method']}}</span>
                                        </li>
                                        <li>
                                            <i class="far fa-check-circle"></i>
                                            <span class="list-title">Depositor's Name</span>
                                            <span class="list-descr">{{$paid['dep_name']}}</span>
                                        </li>
                                        <li>
                                            <i class="far fa-check-circle"></i>
                                            <span class="list-title">Payment Date</span>
                                            <span class="list-descr">{{$paid['paid_date']}}</span>
                                        </li>
                                    </ul>
                                    <br>
                                    <div>
                                        <button type="submit" class="btn btn-primary col-xl-6 col-lg-6 col-md-6" style="border-radius: 12px;">Confirm Payment</button>
                                    </div>
                                </div>
                                <div class="col-xl-5 col-lg-5 col-md-5">
                                    <div class="player-card">
                                        <div class="part-pic">
                                        <h3 class="title">Payment Proof</h3>
                                            <img src="{{asset($paid->proof)}}" alt="" style="height: 250px; width: 300px;">
                                        </div>
                                    </div>
                                </div>
                                    
                                </div>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
@stop