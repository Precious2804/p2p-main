@extends('admin.layout')
@section('content')
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="row ">
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
              <div class="card">
                <div class="card-statistic-4">
                  <div class="align-items-center justify-content-between">
                    <div class="row ">
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                        <div class="card-content">
                          <h5 class="font-15"> Total Users</h5>
                          <h2 class="mb-3 font-18">{{$noOfUsers}}</h2>
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                        <div class="banner-img">
                          <img src="{{URL::asset('asset/img/banner/2.png')}}" alt="">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
              <div class="card">
                <div class="card-statistic-4">
                  <div class="align-items-center justify-content-between">
                    <div class="row ">
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                        <div class="card-content">
                          <h5 class="font-15">Total Provided Helps</h5>
                          <h2 class="mb-3 font-18">{{$noOfCompleted}}</h2>
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                        <div class="banner-img">
                          <img src="{{URL::asset('asset/img/banner/3.png')}}" alt="">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
              <div class="card">
                <div class="card-statistic-4">
                  <div class="align-items-center justify-content-between">
                    <div class="row ">
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                        <div class="card-content">
                          <h5 class="font-15">Total Number Of Referrals</h5>
                          <h2 class="mb-3 font-18">{{$noOfRef}}</h2>
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                        <div class="banner-img">
                          <img src="{{URL::asset('asset/img/banner/4.png')}}" alt="">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
              <div class="card">
                <div class="card-statistic-4">
                  <div class="align-items-center justify-content-between">
                    <div class="row ">
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                        <div class="card-content">
                          <h5 class="font-15">Total Number Of Complain Tickets</h5>
                          <h2 class="mb-3 font-18">{{$noOfTickets}}</h2>
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                        <div class="banner-img">
                          <img src="{{URL::asset('asset/img/banner/4.png')}}" alt="">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-7 col-lg-12 col-xl-7">
              <!-- Support tickets -->
              <div class="card">
                <div class="card-header">
                  <h4>All Messages</h4>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-hover mb-0">
                      <thead>
                        <tr>
                          <th>Ticket ID</th>
                          <th>Complain Type</th>
                          <th>Message</th>
                          <th>Attachments</th>
                          <th>Creation Date/Time</th>
                        </tr>
                      </thead>
                      @foreach($allMessages as $item)
                      <tbody>
                        <tr>
                          <td>{{$item->unique_id}}</td>
                          <td>{{$item->ticket_type}}</td>
                          <td><a href="/admin/reply/{{$item->unique_id}}">{{$item->message}}</a></td>
                          @if(!$item->attach)
                            <td>NULL</td>
                          @endif
                          @if($item->attach)
                            <td>{{$item->attach}}</td>
                          @endif
                          <td>{{$item->created_at}}</td>
                        </tr>
                      </tbody>
                      @endforeach
                    </table>
                  </div>
                </div>
                </div>
              </div>
              <!-- Support tickets -->
            <div class="col-md-5 col-lg-10 col-xl-5">
              <div class="card">
                <div class="card-header">
                  <h4>All Created Tickets</h4>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-hover mb-0">
                      <thead>
                        <tr>
                          <th>Ticket ID</th>
                          <th>User Email</th>
                          <th>Ticket Type</th>
                          <th>Creation Date/Time</th>
                        </tr>
                      </thead>
                      @foreach($allTickets as $item)
                      <tbody>
                        <tr>
                          <td>{{$item->id}}</a></td>
                          <td>{{$item->email}}</td>
                          <td>{{$item->ticket_type}}</td>
                          <td>{{$item->created_at}}</td>
                        </tr>
                      </tbody>
                      @endforeach
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        @stop