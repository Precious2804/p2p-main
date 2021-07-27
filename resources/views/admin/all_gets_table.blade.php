@extends('admin.layout')
@section('content')

      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-body">
            <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
              @if(Session::has('merged'))
                    <div class="col-6 col-lg-6 col-md-6">
                        <div class="alert alert-success">
                            {{ Session::get('merged') }}
                        </div>
                    </div>
                @endif
              <div class="col-12">
                @if(Session::has('notmerged'))
                    <div class="col-6 col-lg-6 col-md-6">
                        <span class="alert alert-danger">
                            {{ Session::get('notmerged') }}
                        </span>
                    </div>
                @endif
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Merge Get to Provide Request</h4>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped table-hover" id="tableExport" style="width:100%;">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Get Help ID</th>
                            <th scope="col">Email</th>
                            <th scope="col">Amount</th>
                            <th scope="col">Account Name</th>
                            <th scope="col">Account Number</th>
                            <th scope="col">Bank Name</th>
                            <th scope="col">Phone Number</th>
                            <th scope="col">Date Created</th>
                            <th scope="col">Merge Now</th>
                            <th scope="col">Remove</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach($allGets as $item)
                                <tr>
                                    <td>{{$item->id}}</td>
                                    <td>{{$item->get_help_id}}</td>
                                    <td>{{$item->email}}</td>
                                    <td>{{$item->amount}}</td>
                                    <td>{{$item->acct_name}}</td>
                                    <td>{{$item->acct_number}}</td>
                                    <td>{{$item->bank}}</td>
                                    <td>{{$item->phone}}</td>
                                    <td>{{$item->created_at}}</td>
                                    <td><a href="/admin/merge_help/{{$item->id}}"><i class="fas fa-location-arrow"></i></a></td>
                                    <td><a href="/delete_req/{{$item->id}}"><i class="fas fa-trash-alt text-danger"></i></a></td>
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
        </section>
      </div>

@stop