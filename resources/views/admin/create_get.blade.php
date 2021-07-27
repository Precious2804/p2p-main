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
                @if(Session::has('no_acct'))
                <div class="col-6 col-lg-6 col-md-6">
                    <div class="alert alert-danger">
                        {{ Session::get('no_acct') }}
                    </div>
                </div>
                @endif
              
                <div class="card">
                  <div class="card-header">
                    <h4>Create Get Request</h4>
                  </div>
                  <form action="{{ route('admin/doCreateGet') }}" method="POST">
                  @csrf
                    <div class="card-body">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Email</label>
                                <select name="email" id="" class="form-control custom-select">
                                    <option value="">Select Email</option>
                                    @foreach($users as $item)
                                        <option value="{{$item->email}}">{{$item->email}}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger">@error('email'){{ $message }}@enderror</span>
                            </div>
                            <div class="form-group col-md-6">
                            <label for="inputEmail4">Amount</label>
                                <select name="amount" id="" class="form-control custom-select">
                                    <option value="">Select Amount</option>
                                    @foreach($data as $item)
                                      <option value="{{$item->amountProv}}">{{$item->amountProv}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer col-xl-4 col-lg-4 col-md-4">
                        <button class="btn btn-primary btn-block btn-lg" type="submit">Submit</button>
                    </div>
                  </form>
                </div>                
            </div>
          </div>
        </section>
      </div>



@stop