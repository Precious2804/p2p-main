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
                                    <li>Get help</li>
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
            <div class="user-dashboard ">
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
                                    <a class="nav-link active" href="{{ route('gh') }}">Get Help</a>
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

                    <!--Put page here-->
                            <h3 class="text">
                                Get Your Investment Returns Here 
                            </h3>
                        <div class="last-step">
                            <div>
                                <div class="row">
                                        <div class="col-xl-7 col-lg-7 col-md-7">
                                        <form action="{{ route('doGet') }}" method="POST" class="form-group">
                                        @csrf
                                            <div>
                                                @if(Session::get('successWithdraw'))
                                                    <div class="alert alert-success">
                                                        {{Session::get('successWithdraw')}}
                                                    </div>
                                                @endif

                                                @if(Session::get('failWithdraw'))
                                                    <div class="alert alert-danger">
                                                        {{Session::get('failWithdraw')}}
                                                    </div>
                                                @endif

                                                @if(Session::get('failedGet'))
                                                    <div class="alert alert-danger">
                                                        {{Session::get('failedGet')}}
                                                    </div>
                                                @endif
                                                @if(Session::get('failed'))
                                                    <div class="alert alert-danger">
                                                        {{Session::get('failed')}}
                                                    </div>
                                                @endif
                                                @if(Session::get('notDue'))
                                                    <div class="alert alert-danger">
                                                        {{Session::get('notDue')}}
                                                    </div>
                                                @endif
                                                <label>Select the Transaction ID</label>
                                                <select name="get_help_id" class="form-control custom-select lg">
                                                    <option value="">Select Transaction ID</option>
                                                    @foreach($getInfo as $item)
                                                        <option value="{{$item->id}}">{{$item->id}}</option>
                                                        <span class="text-danger">@error('get_help_id'){{ "You must Provide the Transaction ID to Proces your Withdrawal" }}@enderror</span>
                                                    @endforeach
                                                </select>
                                                
                                                <br>
                                                <br>
                                                <input type="hidden" name="email" value="{{$loggedUserInfo['email']}}">
                                            </div>
                                            <div class="">
                                                <button type="submit" style="border-radius: 20px;" 
                                                class="btn btn-primary col-xl-5 col-lg-5 col-md-5">Process Withdrawal</button>
                                            </div>
                                        </form> 
                                        <div>
                                            <div class="alert alert-info">Hint: Select from the Options Above, the Transaction ID of the Investment that is Ready for Withdrawal</div>
                                        </div>
                                        <br>   
                                        </div>

                                        @if(Session::get('successGet'))
                                        <div class="col-xl-5 col-lg-5 col-md-5">
                                        <h3 class="title">
                                            Verify and Confirm Withdrawal 
                                        </h3>
                                        <span class="text-info">Confirm the Details of Withdrawal, then Proceed or <a href="{{ route('gh') }}" class="text-danger">Click Here to Cancel</a></span>
                                            <div class="calculation-content">
                                                <form action="{{ route('withdraw') }}" method="POST">
                                                    @csrf
                                                <ul>
                                                    <input type="hidden" name="email" value="{{$loggedUserInfo['email']}}">
                                                    <input type="hidden" name="acct_name" value="{{$loggedUserInfo['acct_name']}}">
                                                    <input type="hidden" name="acct_number" value="{{$loggedUserInfo['acct_number']}}">
                                                    <input type="hidden" name="bank" value="{{$loggedUserInfo['bank']}}">
                                                    <input type="hidden" name="phone" value="{{$loggedUserInfo['phone']}}">
                                                    <input type="hidden" name="get_help_id" value="{{$getSpecific['id']}}">
                                                    <li>
                                                        <i class="far fa-check-circle"></i>
                                                        <span class="list-title">
                                                            Amount to be Received
                                                        </span>
                                                        <input type="hidden" name="amount" value="{{$getSpecific['total']}}">
                                                        <span class="list-descr">₦{{$getSpecific['total']}}</span>
                                                    </li>
                                                    <li>
                                                        <i class="far fa-check-circle"></i>
                                                        <span class="list-title">
                                                            Profit Rate
                                                        </span>
                                                        <input type="hidden" name="rate" value="{{$getSpecific['rate']}}">
                                                        <span class="list-descr">{{$getSpecific['rate']}}%</span>
                                                    </li>
                                                    <li>
                                                        <i class="far fa-check-circle"></i>
                                                        <span class="list-title">
                                                            Net Profit
                                                        </span>
                                                        <input type="hidden" name="profit" value="{{$getSpecific['profit']}}">
                                                        <span class="list-descr">₦{{$getSpecific['profit']}}</span>
                                                    </li>
                                                    <li>
                                                        <i class="far fa-check-circle"></i>
                                                        <span class="list-title">
                                                            Expected Returns
                                                        </span>
                                                        <input type="hidden" name="" value="{{$getSpecific['total']}}">
                                                        <span class="list-descr">₦{{$getSpecific['total']}}</span>
                                                    </li>
                                                </ul>
                                                <!-- <input type="hidden" name="day" value=""> -->
                                                    <button type="submit" class="btn btn-info btn-block">Click to Proceed</button>
                                                </form>
                                            </div>
                                        </div>
                                        @endif
                                        
                                    <div class="col-xl-12 col-lg-12">
                                        <br>
                                        <h3 class="title">
                                            All Processing Investments 
                                        </h3>
                                        <h5 class="text-muted" style="font-style: italic;">The following is/are the availbale Helps that can be withdrawn from your account, 
                                        if the necessary conditions are met for withdrawal</h5>
                                            <div class="transactions-table">
                                                <div class="table-responsive">
                                                    <table class="table display misco-data-table" style="width:100%">
                                                        <thead>
                                                        <tr>
                                                            <th scope="col">#</th>
                                                            <th scope="col">Transaction ID</th>
                                                            <th scope="col">Date/Time</th>
                                                            <th scope="col">Amount</th>
                                                            <th scope="col">Rate</th>
                                                            <th scope="col">Profit</th>
                                                            <th scope="col">Total Returns</th>
                                                        </tr>
                                                        </thead>        
                                                        <tbody>
                                                            @foreach($getInfo as $item)
                                                                <tr>
                                                                    <td>{{$item->tab_id}}</td>
                                                                    <td style="font-weight: bold;">{{$item->id}}</td>
                                                                    <td>{{$item->created_at}}</td>
                                                                    <td>{{$item->amount}}</td>
                                                                    <td>{{$item->rate}}%</td>
                                                                    <td>{{$item->profit}}</td>
                                                                    <td>{{$item->total}}</td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>                                                
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
            <!-- account end -->

@stop