<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/font-awesome-line-awesome/css/all.min.css">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <title>Ticket</title>
    <style>
            body 
                {                                      
                    font-family: 'Times New Roman', serif;
                }

            .col-md-8
                {
                    max-width: 1200px;
                    width: 100%;
                    margin: 0 auto;
                    margin-top: 30px;
                }

            .header
              {
                background-color: rgb(78, 158, 84);
                color: blanchedalmond;
                font-weight: 650;
                letter-spacing: 1.5px;
              }

            form label 
              {
                color:rgb(138, 24, 24)
              }

            .table
              {
                max-width: 1200px;
                width: 100%;
                margin: 0 auto;
                margin-top: 70px;
              }

            thead
              {
                background-color: rgb(78, 158, 84);
                color: blanchedalmond;
              }

        

            .float
              {
                float:right;
              }

            .pagi
              {
                padding-top:20px;
              }

              .td{
                display: flex;
              }
              button{
                margin:0 5px;
              }
    </style>
  
</head>

<body>

        <div class="container">
            <div class="col-md-8">
              <table class="table">
                <thead>
                <tr>
                    <th>Name</th> 
                    <th>Email</th>
                    <th>Support</th>
                    <th>Subject</th>
                    <th>Status</th>
                    <th>Last Updated</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  @foreach ($data as $item)
                    <tr>
                        <td>{{$item->user_name }}</td>
                        <td>{{ $item->user_email }}</td>
                        <td>{{$item->department}}</td>
                        <td>{{$item->subject}}</td>
                        
                        @if ($item->status == 'Open') 

                        <td><span class="badge badge-info">{{$item->status}}</span></td>  

                        @elseif ($item->status == 'Closed') 

                         <td><span class="badge badge-danger">{{$item->status}}</span></td> 

                        @elseif ($item->status == 'Answered' )

                          <td><span class="badge badge-warning">{{$item->status}}</span></td>

                        @endif

                        <td>{{$item->updated_at->format("j F, Y : g:i a")}}</td>
                        <td class="td"> 
                          <a href="{{url('admin/reply/'.$item->id)}}"><button class="btn btn-sm btn-secondary"> @include('svg.message')</button></a>
                            <a href="{{url('edit/ticket/'.$item->id)}}"><button class="btn btn-primary" data-toggle="tooltip" title="Show Ticket"><i class="la la-eye" "></i></button></a>
                           <form method="POST" action="{{ route('delete', $item->id) }}">
                            @csrf
                            <input name="_method" type="hidden" value="DELETE">
                            <button type="submit" class="btn btn-xs btn-danger btn-flat show_confirm" data-toggle="tooltip" title='Delete Ticket'><span class="las la-trash"></span></button>
                          </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
             </table>
           <div class="pagi"> {{$data->links()}} </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
    <script type="text/javascript">
 
     $('.show_confirm').click(function(event) {
          var form =  $(this).closest("form");
          var name = $(this).data("name");
          event.preventDefault();
          swal({
              title: `Are you sure you want to delete this record?`,
              text: "If you delete this, it will be gone forever.",
              icon: "warning",
              buttons: true,
              dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
              form.submit();
            }
          });
      });
  
</script>
</body>      
</html>