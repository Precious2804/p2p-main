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
                        <li>My Account</li>
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
                        <a class="nav-link active" href="{{ route('account') }}">My Account</a>
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

        <!-- profile begin -->
        <div class="profile">
            <div class="row justify-content-center">
                <div class="col-xl-3 col-lg-3">
                    <div class="accont-tab">
                        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                            <a class="nav-link active" id="personal-info-tab" data-toggle="pill" href="#personal-info" role="tab" aria-controls="v-pills-home" aria-selected="true"><i class="far fa-user"></i> Personal Info</a>
                            <a class="nav-link" id="payment-info-tab" data-toggle="pill" href="#bank-info" role="tab" aria-controls="v-pills-profile" aria-selected="false"><i class="fas fa-credit-card"></i> Bank Information</a>
                            <a class="nav-link" id="payment-info-tab" data-toggle="pill" href="#update-password" role="tab" aria-controls="v-pills-profile" aria-selected="false"><i class="fas fa-key"></i> Update Password</a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-9 col-lg-9">
                    <div class="tab-content" id="v-pills-tabContent">
                        <div class="tab-pane fade show active" id="personal-info" role="tabpanel" aria-labelledby="personal-info-tab">
                            <h3 class="title">Edit Your Profile</h3>
                            @if(!$loggedUserInfo['acct_number'])
                            <div class="alert alert-warning"><i class="fa fa-exclamation-triangle"></i>
                                Please Ensure that you Complete Your Registration by Updating your Bank Account Information,
                                this is important for completing any Merging Process</div>
                            @endif
                            <div class="player-profile">
                                <div class="row no-gutters">
                                    <div class="col-xl-4 col-lg-4 col-md-4">
                                        @if (Session::get('successBank'))
                                        <div class="alert alert-success">
                                            {{Session::get('successBank')}}
                                        </div>
                                        @endif
                                        @if (Session::get('failBank'))
                                        <div class="alert alert-danger">
                                            {{Session::get('failBank')}}
                                        </div>
                                        @endif
                                        @if (Session::get('successPic'))
                                        <div class="alert alert-success">
                                            {{Session::get('successPic')}}
                                        </div>
                                        @endif
                                        @if (Session::get('failPic'))
                                        <div class="alert alert-danger">
                                            {{Session::get('failPic')}}
                                        </div>
                                        @endif
                                        <span class="text-danger">@error('image'){{$message}}@enderror</span>
                                        <div class="player-card">
                                            <div class="part-pic">
                                                <img src="{{ asset('uploads/site/'.auth()->user()->image) }}" alt="">
                                            </div>
                                        </div>
                                        <form action="{{ route('updatePicture') }}" method="POST" enctype="multipart/form-data" class="form-group">
                                            @csrf
                                            <input type="file" name="image" class="form-control">
                                            <button type="submit" class="btn btn-info form-control">Upload Picture</button>
                                        </form>
                                    </div>
                                    <div class="col-xl-8 col-lg-8 col-md-8">
                                        <div class="part-info">
                                            <span class="player-name">
                                                {{$loggedUserInfo['fname']}} {{$loggedUserInfo['lname']}}
                                            </span>
                                            <form action="{{ route('updateAccount') }}" method="POST">
                                                @csrf
                                                @if (Session::get('successUpdate'))
                                                <div class="alert alert-success">
                                                    {{Session::get('successUpdate')}}
                                                </div>
                                                @endif
                                                @if (Session::get('failUpdate'))
                                                <div class="alert alert-danger">
                                                    {{Session::get('failUpdate')}}
                                                </div>
                                                @endif
                                                <ul>
                                                    <input type="hidden" name="id" value="{{$loggedUserInfo['id']}}">
                                                    <li>
                                                        <span class="property">First Name :</span>
                                                        <input type="text" name="fname" value="{{$loggedUserInfo['fname']}}" class="form-control">
                                                    </li>
                                                    <li>
                                                        <span class="property">Last Name :</span>
                                                        <input type="text" name="lname" value="{{$loggedUserInfo['lname']}}" class="form-control">
                                                    </li>
                                                    <li>
                                                        <span class="property">Username :</span>
                                                        <input disabled type="text" name="username" value="{{$loggedUserInfo['username']}}" class="form-control">
                                                    </li>
                                                    <li>
                                                        <span class="property">Email Address :</span>
                                                        <input type="text" name="" disabled value="{{$loggedUserInfo['email']}}" class="form-control">
                                                    </li>
                                                    <li>
                                                        <span class="property">Phone Number :</span>
                                                        <input type="text" name="phone" value="{{$loggedUserInfo['phone']}}" class="form-control">
                                                    </li>
                                                    <li>
                                                        <span class="property">Gender :</span>
                                                        <input type="text" name="" disabled value="{{$loggedUserInfo['gender']}}" class="form-control">
                                                    </li>
                                                    {{-- <li>
                                                                    <span class="property">Resident Address :</span>
                                                                    <input type="text" name="address" value="{{$loggedUserInfo['address']}}" class="form-control">
                                                    </li> --}}
                                                </ul>
                                                <div class="edit-profile text-center">
                                                    <button class="btn btn-block btn-primary" type="submit">Edit Profile</button>
                                                </div>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="bank-info" role="tabpanel" aria-labelledby="payment-info-tab">
                            <h3 class="title">Update Bank Information</h3>
                            <div class="payment-info">
                                <div class="responsive">
                                    <form action="{{ route('bankUpdate') }}" method="POST" class="form-group">
                                        @csrf
                                        @if (Session::get('successBank'))
                                        <div class="alert alert-success">
                                            {{Session::get('successBank')}}
                                        </div>
                                        @endif
                                        @if (Session::get('failBank'))
                                        <div class="alert alert-danger">
                                            {{Session::get('failBank')}}
                                        </div>
                                        @endif
                                        <div class="form-group">
                                            <label>Account Name</label>
                                            <input type="text" name="acct_name" class="form-control" value="{{$loggedUserInfo['acct_name']}}">
                                            <span class="text-danger">@error('acct_name'){{ 'This field is Required' }}@enderror</span>
                                        </div>
                                        <div class="form-group">
                                            <label>Account Number</label>
                                            <input type="text" name="acct_number" class="form-control" value="{{$loggedUserInfo['acct_number']}}">
                                            <span class="text-danger">@error('acct_number'){{ $message }}@enderror</span>
                                        </div>
                                        <div class="form-group">
                                            <label>Account Type</label>
                                            <select name="acct_type" class="form-control custom-select">
                                                <option value="">{{$loggedUserInfo['acct_type']}}</option>
                                                <option value="Savings">Savings</option>
                                                <option value="Current">Current</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Bank</label>
                                            <input type="text" name="bank" class="form-control" value="{{$loggedUserInfo['bank']}}">
                                            <span class="text-danger">@error('bank'){{ 'This field is Required' }}@enderror</span>
                                        </div>
                                        <button type="submit" class="btn btn-block btn-primary">Update Bank Information</button>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="update-password" role="tabpanel" aria-labelledby="payment-info-tab">
                            <h3 class="title">Update Password</h3>
                            <div class="payment-info">
                                <div class="responsive">
                                    <form action="{{route('change_password')}}" method="POST" class="form-group">
                                        @csrf
                                        @if(Session::get('success'))
                                        <div class="alert alert-success">
                                            {{Session::get('success')}}
                                        </div>
                                        @endif

                                        <div class="form-group">
                                            <label>Current Password</label>
                                            <input type="password" name="current_password" class="form-control" value="">
                                            <span class="text-danger"> @error('current_password') {{$message}} @enderror </span>
                                        </div>

                                        <div class="form-group">
                                            <label>New Password</label>
                                            <input type="password" name="password" class="form-control" value="">
                                            <span class="text-danger"> @error('password') {{$message}} @enderror </span>
                                        </div>


                                        <div class="form-group">
                                            <label>New Password Confirmation</label>
                                            <input type="password" name="password_confirmation" class="form-control" value="">
                                            <span class="text-danger"> @error('password_confirmation') {{$message}} @enderror </span>
                                        </div>

                                        <button type="submit" class="btn btn-block btn-primary">Update Account Password</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- profile end -->

    </div>
</div>
</div>
</div>
<!-- account end -->

@stop