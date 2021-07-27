@extends('admin.layout')
@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-body">
                <div class="col-xl-12 col-lg-12 col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>General Settings</h4>
                        </div>

                        <!----------------------Start Of All Return Messages-------------------------------->
                        <!---Change Rate Messsage------>
                        @if(Session::has('successRate'))
                        <div class="col-6 col-lg-6 col-md-6">
                            <div class="alert alert-success">
                                {{ Session::get('successRate') }}
                            </div>
                        </div>
                        @endif
                        @if(Session::has('failRate'))
                        <div class="col-6 col-lg-6 col-md-6">
                            <div class="alert alert-danger">
                                {{ Session::get('failRate') }}
                            </div>
                        </div>
                        @endif
                        <!---Change Rate Messsage------>

                        <!---Add Amount Messsage------>
                        @if(Session::has('successAmount'))
                        <div class="col-6 col-lg-6 col-md-6">
                            <div class="alert alert-success">
                                {{ Session::get('successAmount') }}
                            </div>
                        </div>
                        @endif
                        @if(Session::has('failAmount'))
                        <div class="col-6 col-lg-6 col-md-6">
                            <div class="alert alert-danger">
                                {{ Session::get('failAmount') }}
                            </div>
                        </div>
                        @endif
                        <!---Add Amount Messsage------>

                        <!---Add Amount Messsage------>
                        @if(Session::has('deleteAmount'))
                        <div class="col-6 col-lg-6 col-md-6">
                            <div class="alert alert-success">
                                {{ Session::get('deleteAmount') }}
                            </div>
                        </div>
                        @endif
                        @if(Session::has('failDelete'))
                        <div class="col-6 col-lg-6 col-md-6">
                            <div class="alert alert-danger">
                                {{ Session::get('failDelete') }}
                            </div>
                        </div>
                        @endif
                        <!---Add Amount Messsage------>

                        <!---Before Get Messsage------>
                        @if(Session::has('successBefore'))
                        <div class="col-6 col-lg-6 col-md-6">
                            <div class="alert alert-success">
                                {{ Session::get('successBefore') }}
                            </div>
                        </div>
                        @endif
                        @if(Session::has('failBefore'))
                        <div class="col-6 col-lg-6 col-md-6">
                            <div class="alert alert-danger">
                                {{ Session::get('failBefore') }}
                            </div>
                        </div>
                        @endif
                        <!---Before Get Messsage------>
                        <!----------------------End Of All Return Messages-------------------------------->

                        <div class="card-body">
                            <div>
                                <form action="{{ route('admin/changeRate') }}" method="POST" class= "form-group">
                                @csrf
                                    <div class="form-row">
                                        <div class="col-xl-3 col-lg-3 col-md-3" style="font-weight: bold;">
                                            Change the Interest Rate Here:
                                        </div>
                                    <div class="col xl-6 col-lg-6 col-md-6 form-group">
                                    <span style="font-weight: bold;">Current Interest Rate is {{$sett['rate']}}%</span>
                                        <input type="text" name="rate" placeholder="Change Interest Rate Here" class="form-control">
                                        <span class="text-danger">@error('rate'){{ "Please Provide the Rate" }}@enderror</span>
                                    </div>
                                    <div class="col xl-3 col-lg-3 col-md-3 form-group">
                                        <button type="submit" class="btn btn-block btn-primary">Submit</button>
                                    </div>
                                </form>
                            </div>
                            <div>
                                <form action="{{ route('admin/addAmount') }}" method="POST" class= "form-group">
                                @csrf
                                <div class="form-row">
                                    <div class="col-xl-2 col-lg-2 col-md-2" style="font-weight: bold;">
                                        All Payable Amounts:
                                    </div>
                                    <span class="col-xl-6 col-lg-6 col-md-6" style="font-weight: bold;">
                                        <ul>
                                            @foreach($allAmount as $item)
                                                <li>{{$item->amountProv}}</li>
                                            @endforeach
                                        </ul>
                                    </span>
                                </div>
                                    
                                    <div class="form-row">
                                        <div class="col-xl-3 col-lg-3 col-md-3" style="font-weight: bold;">
                                            Add New Amount Payable:
                                        </div>
                                    <div class="col xl-6 col-lg-6 col-md-6 form-group">
                                        <input type="text" name="amountProv" placeholder="Add New Amount Providable" class="form-control">
                                        <span class="text-danger">@error('amountProv'){{ "This Amount is Required" }}@enderror</span>
                                    </div>
                                    <div class="col xl-3 col-lg-3 col-md-3 form-group">
                                        <button type="submit" class="btn btn-block btn-success">Add</button>
                                    </div>
                                </form>
                            </div>
                            <div>
                                <form action="{{ route('admin/deleteAmount') }}" method="POST" class= "form-group">
                                @csrf
                                    <div class="form-row">
                                        <div class="col-xl-3 col-lg-3 col-md-3" style="font-weight: bold;">
                                            Delete a Providable Amount:
                                        </div>
                                    <div class="col xl-6 col-lg-6 col-md-6 form-group">
                                    <select name="amountProv" class="form-control custom-select">
                                        <option value="">Select Amount to Delete Here</option>
                                        @foreach($allAmount as $item)
                                            <option value="{{ $item->amountProv }}">{{$item->amountProv}}</option>
                                        @endforeach
                                    </select>
                                        <span class="text-danger">@error('amountProv'){{ "This Amount is Required" }}@enderror</span>
                                    </div>
                                    <div class="col xl-3 col-lg-3 col-md-3 form-group">
                                        <button type="submit" class="btn btn-block btn-danger">Delete</button>
                                    </div>
                                </form>
                            </div>
                            <div>
                                <form action="{{ route('admin/beforeGet') }}" method="POST" class= "form-group">
                                @csrf
                                    <div class="form-row">
                                        <div class="col-xl-3 col-lg-3 col-md-3" style="font-weight: bold;">
                                            Minimum Number of Provide Before Get
                                        </div>
                                    <div class="col xl-6 col-lg-6 col-md-6 form-group">
                                    <span style="font-weight: bold;">Current Minimum number of Provide before get is {{$sett['beforeGet']}}</span>
                                        <input type="text" name="beforeGet" placeholder="Change minimum Number of Provided Help before Get" class="form-control">
                                        <span class="text-danger">@error('beforeGet'){{ "This field is Required" }}@enderror</span>
                                    </div>
                                    <div class="col xl-3 col-lg-3 col-md-3 form-group">
                                        <button type="submit" class="btn btn-block btn-primary">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>


@stop
