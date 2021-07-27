@extends('admin.layout')
@section('content')

      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-body">
            <div class="row">
              <div class="col-12">
              @if(Session::has('deleted'))
                    <div class="col-6 col-lg-6 col-md-6">
                        <div class="alert alert-success">
                            {{ Session::get('deleted') }}
                        </div>
                    </div>
                @endif
              <div class="col-12">
                @if(Session::has('notdeleted'))
                    <div class="col-6 col-lg-6 col-md-6">
                        <span class="alert alert-danger">
                            {{ Session::get('notdeleted') }}
                        </span>
                    </div>
                @endif
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Referral Management</h4>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped table-hover" id="tableExport" style="width:100%;">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Email</th>
                            <th scope="col">Referral ID</th>
                            <th scope="col">Number of Referrals</th>
                            <!-- <th scope="col">Remove</th> -->
                          </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $item)
                                <tr>
                                    <td>{{$item->id}}</td>
                                    <td>{{$item->email}}</td>
                                    @if(!$item->ref_id)
                                        <td>Not Created Yet</td>
                                    @endif
                                    @if($item->ref_id)
                                        <td>{{$item->ref_id}}</td>
                                    @endif
                                    <td>{{$item->commision}}</td>
                                    <!-- <td><a href="/deleteRef/{{$item->id}}"><i class="fas fa-trash-alt text-danger"></i></a></td> -->
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