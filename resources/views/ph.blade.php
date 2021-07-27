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
                                    <li>Provide Help</li>
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
                                    <a class="nav-link " href="{{ route('dashboard') }}">Dashboard</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('account') }}">My Account</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link active" href="{{ route('ph') }}">Provide Help</a>
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

                    <!---Provide Help Section Starts-->
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12">
                                 @if (Session::get('helpSuccess'))
                                            <div class="alert alert-success">
                                                {{Session::get('helpSuccess')}} <a href="{{route('track')}}">Click Here to Track your Investment Status</a>
                                            </div>
                                        @endif
                                        @if (Session::get('helpFail'))
                                            <div class="alert alert-danger">
                                                {{Session::get('helpFail')}}
                                            </div>
                                        @endif

                                <div class="last-step">
                                    <!--break down of the investment package--->
                                @if (Session::get('success'))
                                    <h3 class="title">
                                        Complete Provide Help Process
                                    </h3>
                                    <span class="text-info">Verify the Details of your Investment, then Proceed or 
                                        <a href="{{ route('ph') }}" class="text-danger">
                                        Click Here to Cancel</a>
                                    </span> <br><hr>
                                    <span class="text-warning"> <b>Note that: </b> once this Help is provide, 
                                        it can be cancelled only after Seven(7) days or in a case where there wasn't an availaible pairing for this Help. 
                                        So Ensure that you go through the details properly before proceeding. If you encounter any issue, <a href="{{ route('support') }}" class="text-info">Click Here</a>
                                        to Send us a message of your Challenge. 
                                    </span>
                                    <div class="calculation-content">
                                        <h4 class="title">breakdown of investment</h4>
                                        <form action="{{ route('doProvide') }}" method="POST">
                                            @csrf
                                        <ul>
                                            <input type="hidden" name="updated_at" value="{{$helpInfo['updated_at']}}" id="">
                                            <input type="hidden" name="email" value="{{$loggedUserInfo['email']}}">
                                            <li>
                                                <i class="far fa-check-circle"></i>
                                                <span class="list-title">
                                                    Amount
                                                </span>
                                                <input type="hidden" name="amount" value="{{$helpInfo['amount']}}">
                                                <span class="list-descr">₦{{$helpInfo['amount']}}</span>
                                            </li>
                                            <li>
                                                <i class="far fa-check-circle"></i>
                                                <span class="list-title">
                                                    Profit Rate
                                                </span>
                                                <input type="hidden" name="rate" value="{{$rate}}">
                                                <span class="list-descr">{{$rate}}%</span>
                                            </li>
                                            <li>
                                                <i class="far fa-check-circle"></i>
                                                <span class="list-title">
                                                    Net Profit
                                                </span>
                                                <input type="hidden" name="profit" value="{{$helpInfo['profit']}}">
                                                <span class="list-descr">₦{{$helpInfo['profit']}}</span>
                                            </li>
                                            <li>
                                                <i class="far fa-check-circle"></i>
                                                <span class="list-title">
                                                    Total Expected Returns
                                                </span>
                                                <input type="hidden" name="total" value="{{$helpInfo['total']}}">
                                                <span class="list-descr">₦{{$helpInfo['total']}}</span>
                                            </li>
                                        </ul>
                                        <br>
                                        <span class="text-warning"> <b>Note: </b>By Clicking on the button below, 
                                            you agree with all the pre-defined terms and conditions
                                        </span>
                                        <br>
                                        <br>
                                        <div class="d-flex justify-content-center">
                                            <button type="submit" style="border-radius: 20px;" 
                                            class="btn btn-primary btn-lg col-xl-5 col-lg-5 col-md-5">Click to Proceed</button>
                                        </div>
                                        </form>
                                    </div>
                                    <br>
                                    <br>
                                @endif

                                @if(!Session::get('success'))
                                <div>
                                    <h3 class="title">
                                        Provide Help Here 
                                    </h3>
                                    <label>Provide Help Amount</label>
                                    <form action="{{ route('processAmount') }}" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <input type="hidden" name="email" value="{{$loggedUserInfo['email']}}">
                                            <select name="amount" class="form-control custom-select">
                                                <option value="">Select Amount</option>
                                                @foreach($amountPayable as $item)
                                                    <option value="{{$item->amountProv}}">{{$item->amountProv}}</option>
                                                @endforeach
                                            </select>
                                            <span class="text-danger">@error('amount'){{ "Please Provide The Amount" }}@enderror</span>
                                        </div>
                                            <button type="submit" style="border-radius: 20px;" class="btn btn-primary btn-lg col-xl-4 col-lg-4 col-md-4">Process Amount</button>
                                        <br>
                                        <br>
                                    </form>        
                                </div>
                                @endif

                                @if(Session::get('success'))
                                   <!---Displaying an Empty Space if this condition is met---->
                                @endif
                                
                            </div>
                        </div>
                            
                    </div>
                    <!---Provide Here Section Ends-->

                    </div>
            </div>
            </div>
            </div>
            <!-- account end -->

@stop