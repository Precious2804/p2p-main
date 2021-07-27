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
                                    <li>Payment Information</li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-5 col-md-7 col-sm-6 col-4 d-flex align-items-center">
                            @include('/partials/navigation')
                        </div>
                        <div class="float-right"><a href="{{ route('track') }}"style="color: black;" class="float-right">Back to Tracker</a></div>
                    </div>
                </div>
            </div>
            <!-- breadcrumb end -->
                @if(!$findMerge['id'])
                <div class="user-dashboard">
                <div class="">
                    <div class="container card alert alert-info">
                        <div class="d-flex justify-content-center">
                            <div class="special" style="font-size: 35px; font-style:oblique;">Processing Provide Help Request.....</div>
                        </div>
                        <br>
                        <div class="d-flex justify-content-center">
                            <div style="text-align: center; font-size: 20px;">The Details of your Payment would be revealed to You as soon as a Pair is Found for this transaction. 
                                Note that the Provide Help can be revoked only if a Pair Cannot be found after Seven(7) Days
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

                        @if(Session::get('successPay'))
                        <div class="user-dashboard">
                        <div class="container">
                        <div class="last-step">
                            <h3 class="title">
                                Upload Payment Proof
                            </h3>
                            <div class="add-credit-card card">
                                <div class="card-body">
                                    <form action="{{ route('uploadProof') }}" method="POST" enctype="multipart/form-data">
                                        @if (Session::get('proofFail'))
                                            <div class="alert alert-danger">
                                                {{Session::get('proofFail')}}
                                            </div>
                                        @endif
                                    @csrf
                                    <input type="hidden" name="email" value="{{$loggedUserInfo['email']}}">
                                    <input type="hidden" name="id" value="{{$findMerge['id']}}">
                                    <input type="hidden" name="get_help_id" value="{{$findMerge['get_help_id']}}">
                                    <input type="hidden" name="amount" value="{{$payID['amount']}}">
                                    <input type="hidden" name="profit" value="{{$payID['profit']}}">
                                    <input type="hidden" name="rate" value="{{$payID['rate']}}">
                                    <input type="hidden" name="total" value="{{$payID['total']}}">
                                        <div class="row">
                                            <div class="col-xl-6 col-lg-6">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Payment Method Used</label>
                                                    <select name="pay_method" class="form-control custom-select">
                                                        <option value="">Select Method</option>
                                                        <option value="Cash">Cash</option>
                                                        <option value="Bank">Bank</option>
                                                        <option value="USSD">USSD</option>
                                                        <option value="Mobile Transfer">Mobile Transfer</option>
                                                        <option value="Cheque Book">Cheque Book</option>
                                                        <option value="ATM Transfer">ATM Transfer</option>
                                                        <option value="Credit Card">Credit Card</option>
                                                        <option value="Debit Card">Debit Card</option>
                                                    </select>
                                                    <span class="text-danger">@error('pay_method'){{ "This Field is required" }}@enderror</span>
                                                </div>
                                                <div class="form-group">
                                                <label for="exampleInputEmail4">Depositor's Name</label>
                                                <input type="text" name="dep_name" class="form-control" id="exampleInputEmail4" aria-describedby="emailHelp" placeholder="Your Username">
                                                <span class="text-danger">@error('dep_name'){{ "This field is required" }}@enderror</span>
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-lg-6">
                                                <div class="form-group expire-date-elem">
                                                    <label for="inputDate">Date of Payment</label>
                                                    <div class="form-row">
                                                        <input type="date" name="paid_date" class="form-control" placeholder="Payment Date">
                                                        <span class="text-danger">@error('paid_date'){{ "This field is required" }}@enderror</span>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label>Upload Proof</label>
                                                    <input type="file" name="proof">
                                                    <span class="text-danger">@error('proof'){{$message}}@enderror</span>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary float-right col-xl-5 col-lg-5 col-md-5">Submit Proof</button>
                                    </form>
                                </div>
                            </div>
                            <div class="alert alert-info">Refresh This Page if You want to See the Payment Details</div>
                            </div>
                        </div>
                        </div>
                        @endif


                        @if($findMerge['id'])
                            @if(!Session::get('successPay'))
                        <div class="user-dashboard">
                        <div class="container">
                            <div class="last-step">
                                <h3 class="title">
                                    Provide Help Payment Details
                                </h3>
                                <span class="text-info">Below are the details of the help that you requested to provide 
                                    </span>
                                    <div class="calculation-content">
                                        <h4 class="title">breakdown of investment</h4>
                                        <form action="{{ route('doPay') }}" method="POST" class="form-group">
                                            @csrf
                                        <ul>
                                            <li>
                                                <i class="far fa-check-circle"></i>
                                                <span class="list-title">
                                                    Transaction ID
                                                </span>
                                                <input type="hidden" name="id" value="{{$findMerge['id']}}">
                                                <span class="list-descr">{{$findMerge['id']}}</span>
                                            </li>
                                            <li>
                                                <i class="far fa-check-circle"></i>
                                                <span class="list-title">
                                                    Bank
                                                </span>
                                                <span class="list-descr">{{$findMerge['bank']}}</span>
                                            </li>
                                            <li>
                                                <i class="far fa-check-circle"></i>
                                                <span class="list-title">
                                                    Account Name
                                                </span>
                                                <span class="list-descr">{{$findMerge['acct_name']}}</span>
                                            </li>
                                            <li>
                                                <i class="far fa-check-circle"></i>
                                                <span class="list-title">
                                                    Account Number
                                                </span>
                                                <span class="list-descr">{{$findMerge['acct_number']}}</span>
                                            </li>
                                            <li>
                                                <i class="far fa-check-circle"></i>
                                                <span class="list-title">
                                                    Phone Number
                                                </span>
                                                <span class="list-descr">{{$findMerge['phone']}}</span>
                                            </li>
                                            <li>
                                                <i class="far fa-check-circle"></i>
                                                <span class="list-title">
                                                    Amount to be Paid
                                                </span>
                                                <span class="list-descr">₦{{$findMerge['amount']}}</span>
                                            </li>
                                        </ul>
                                        <br>
                                        <br>
                                        <div class="alert alert-warning"> <b>Be Aware</b> that, you have Four(4) days to make this payment to the above merged details.
                                        Failure to do that in the specified Time Frame would lead to a Cancellation of this Merge.
                                        <br>
                                        <br>
                                        <div class="text text-info">You can Proceed to Upload Payment Proof by Clicking the button below, if Payment has been completed</div>
                                        </div>
                                        <br>
                                            <button type="submit" class="btn btn-primary float-right col-xl-5 col-lg-5 col-md-5">Click Here to Upload Proof of Payment</button>
                                        </form>
                                    </div>  
                                </div>    
                            </div>
                            </div>
                        <br>                         
                        @endif
                        @endif
                        

@stop