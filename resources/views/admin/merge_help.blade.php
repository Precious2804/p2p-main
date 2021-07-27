@extends('admin.layout')
@section('content')

      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-body">
              <div class="col-12 col-md-12 col-lg-12">

                @if(Session::has('success'))
                <div class="col-6 col-lg-6 col-md-6">
                    <div class="alert alert-success">
                        {{ Session::get('success') }}
                    </div>
                </div>
                @endif
                @if(Session::has('fail'))
                <div class="col-6 col-lg-6 col-md-6">
                    <div class="alert alert-danger">
                        {{ Session::get('fail') }}
                    </div>
                </div>
                @endif
              
                <div class="card">
                  <div class="card-header">
                    <h4>Create Help Merge Here</h4>
                  </div>
                  <form action="{{ route('admin/doMerge') }}" method="POST">
                  @csrf
                    <div class="card-body">
                        <div class="form-row">
                        <input type="hidden" name="get_help_id" value="{{ $reqDetails['get_help_id'] }}">
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Provide Help Transaction ID</label>
                                <select name="id" class="form-control custom-select">
                                    <option value="">Select the Transaction ID</option>
                                    @foreach($allProvId as $item)
                                        <option style="font-weight: bold;" value="{{$item->id}}">{{$item->id}}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger">@error('id'){{ "$message" }}@enderror</span>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Amount</label>
                                <input type="text" class="form-control" name="amount" placeholder="Enter Amount" value="{{$reqDetails['amount']}}">
                                <span class="text-danger">@error('amount'){{ "$message" }}@enderror</span>
                            </div>
                        </div>
                        <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Account Name</label>
                            <input type="text" class="form-control" id="inputEmail4" name="acct_name" placeholder="Account Name" value="{{$reqDetails['acct_name']}}">
                            <span class="text-danger">@error('acct_name'){{ "$message" }}@enderror</span>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Account Number</label>
                            <input type="text" class="form-control" id="inputPassword4" name="acct_number" placeholder="Account Number" value="{{$reqDetails['acct_number']}}">
                            <span class="text-danger">@error('acct_number'){{ "$message" }}@enderror</span>
                        </div>
                        </div>
                        <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Bank</label>
                            <input type="text" class="form-control" id="inputEmail4" name="bank" placeholder="Bank Account" value="{{$reqDetails['bank']}}">
                            <span class="text-danger">@error('bank'){{ "$message" }}@enderror</span>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPassword4">Phone Number</label>
                            <input type="text" class="form-control" id="inputEmail4" name="phone" placeholder="Enter Phone Number" value="{{$reqDetails['phone']}}">
                            <span class="text-danger">@error('phone'){{ "$message" }}@enderror</span>
                        </div>
                        </div>
                    </div>
                    <div class="card-footer col-xl-4 col-lg-4 col-md-4">
                        <button type="submit" class="btn btn-primary btn-block btn-lg">Merge Now</button>
                    </div>
                  </form>
                </div>                
            </div>
          </div>
        </section>
      </div>



@stop