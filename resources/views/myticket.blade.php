<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/font-awesome-line-awesome/css/all.min.css">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <title>My Ticket</title>

</head>
<body>
    
<div class="mb-4">
    <div class="row">
        <div class="col-lg-2 pb-5">
            <!-- Account Sidebar-->
            <div class="author-card pb-3">
                <div class="author-card-cover" style="background-image: url(https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSHRzlh8gzTFZAokgbIGOMfF03oQ7JkawWe0A&usqp=CAUhttps://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSHRzlh8gzTFZAokgbIGOMfF03oQ7JkawWe0A&usqp=CAU);"><a class="btn btn-style-1 btn-white btn-sm" href="#" data-toggle="tooltip" title="" data-original-title="You currently have 290 Reward points to spend"><i class="fa fa-award text-md"></i>&nbsp;290 points</a></div>
                <div class="author-card-profile">
                    <div class="author-card-avatar"><img src="{{asset('avatar/avatar4.png')}}" alt="Daniel Adams">
                    </div>
                    <div class="author-card-details">
                        <h5 class="author-card-name text-lg">Daniel Adams</h5><span class="author-card-position">Joined February 06, 2017</span>
                    </div>
                </div>
            </div>
            <div class="wizard">
                <nav class="list-group list-group-flush">
                    <a class="list-group-item active">
                        <div class="d-flex justify-content-between align-items-center">
                            <div><i class="fa fa-shopping-bag mr-1 text-muted"></i>
                                <div class="d-inline-block font-weight-medium text-uppercase">Orders List</div>
                            </div>
                        </div>
                    </a><a class="list-group-item"  target="__blank"><i class="fa fa-user text-muted"></i>Profile Settings</a><a class="list-group-item" ><i class="fa fa-map-marker text-muted"></i>Addresses</a>
                    <a class="list-group-item" href="{{route('template')}}"  tagert="__blank">
                        <div class="d-flex justify-content-between align-items-center">
                            <div><i class="fa fa-plus mr-1 text-muted"></i>
                                <div class="d-inline-block font-weight-medium text-uppercase">Create a Ticket</div>
                            </div>
                        </div>
                    </a>
                    <a class="list-group-item" href="{{url('MyTicket')}}">
                        <div class="d-flex justify-content-between align-items-center">
                            <div><i class="fa fa-tag mr-1 text-muted"></i>
                                <div class="d-inline-block font-weight-medium text-uppercase">My Tickets</div>
                            </div>
                        </div>
                    </a>
                </nav>
            </div>
        </div>
        <!-- Orders Table-->
        <div class="col-lg-6 pb-5">
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                     @endif
                    <thead>
                        <tr>
                          <th>Support #</th>
                          <th>Subject</th>
                          <th>Status</th>
                          <th>Message</th>
                          <th>Last Updated</th>
                        </tr>
                    </thead>
                    <tbody>
                      @foreach ($data as $item)
                      <tr>
                            <td>{{$item->department}}</td>

                            <td>{{$item->subject}}</td>
                            
                            @if ($item->status == 'Open')

                            <td><span class="badge badge-info">{{$item->status}}</span></td>

                            @elseif ($item->status == 'Closed')

                              <td><span class="badge badge-danger">{{$item->status}}</span></td>

                            @elseif ($item->status == 'Answered' )

                              <td><span class="badge badge-warning">{{$item->status}}</span></td>

                            @endif

                            <td>
                              <a href="{{url('Reply/Blade/'.$item->id)}}"> @include('svg.message')</a>
                            </td>

                            <td>{{$item->updated_at->format("j F, Y : g:i a")}}</td>

                        </tr>
                        @endforeach

                    </tbody>
                </table>
                <div> {{$data->links()}} </div>
            </div>
        </div>
    </div>
</div>


</html>
