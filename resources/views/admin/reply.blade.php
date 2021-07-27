@extends('admin.layout')
@section('content')

      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-body">
            <div class="row">
              <div class="col-xl-10 col-lg-10 col-md-10">
                <div class="card">
                  <div class="card-header">
                    <h4>Messages & Replies</h4>
                  </div>
                  @if(Session::has('success'))
                    <div class="alert alert-success col-xl-6 col-lg-6 col-md-6">
                        {{Session::get('success')}}
                    </div>
                  @endif
                  @if(Session::has('fail'))
                      <div class="alert alert-danger">
                          {{Session::get('fail')}}
                      </div>
                  @endif
                  <div class="card-body" style="overflow-x: hidden; overflow-y: auto; height:500px; border-radius: 20px;">
                        <br>
                        @foreach($allMessages as $item)
                            @if($item->message)
                            <div class="col-xl-7 col-lg-7 col-md-7 float-right">
                                <div class="alert alert-success">
                                <p>{{$item->message}} </p>
                                <i class="text-primary" style="font-size: 12px;">{{$item->created_at}}</i>
                                <i style="font-size: 12px; color: black;"> User</i>
                                @if($item->attach)
                                  <img src="{{$item->attach}}" alt="" style="height: 150px;">
                                @endif
                            </div>
                            </div>
                            @endif

                            @if($item->reply)
                            <div class="col-xl-7 col-lg-7 col-md-7 float-left">
                                <div class="alert alert-info">
                                <p>{{$item->reply}} </p>
                                <i class="text-primary" style="font-size: 12px;">{{$item->created_at}}</i>
                                <i style="font-size: 12px; color: black;"> Admin</i>
                            </div>
                            </div>
                            @endif
                        @endforeach
                    </div>

                    <div class="card-footer">
                        <form action="{{ route('admin/replyMessage') }}" method="POST">
                            @csrf
                            <div class="row">
                            <input type="hidden" name="reply_id" value="{{$allTickets['id']}}">
                            <input type="hidden" name="email" value="{{$allTickets['email']}}">
                            <input type="hidden" name="ticket_type" value="{{$allTickets['ticket_type']}}">
                                <div class="col-xl-10 col-lg-10 col-md-10">
                                    <textarea name="reply" id="" cols="30" rows="5" class="form-control" placeholder="Write your Message Here in this box Here"></textarea>
                                    <span class="text-danger">@error('reply'){{ $message }}@enderror</span>
                                </div>                    
                                <div class="col-xl-2 col-lg-2 col-md-2">
                                    <button type="submit" class="btn btn-primary btn-lg btn-block">Send</button>
                                </div> 
                            </div>
                        </form>                   
                    </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
@stop