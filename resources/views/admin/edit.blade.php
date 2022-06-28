<!DOCTYPE html>
<html lang="en">
<head>
   
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Edit Ticket</title>
    <style>
                body {                                      
                      font-family: 'Times New Roman', serif;
                      }
                .design 
                  {
                      max-width: 1200px;
                      width: 100%;
                      margin: 0 auto;
                      margin-top: 80px;
                  }
                  select.form-control:not([size]):not([multiple]) {
                      height: calc(2.25rem + 2px);
                      width: 200px;
                  }

                  label {
                    color:rgb(138, 24, 24)
                  }
    </style>


</head>

 <body>
   
  <div class="container design">
      <div class='row'>
      <div class="col-md-6">
          <h3 class="header">TICKET NO #{{$data->id}}</h3>
          <hr>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="name">Name</label>
            <p>{{$data->user_name}}</p>
          </div>
          <div class="form-group col-md-6">
            <label for="email">Email</label>
            <p>{{$data->user_email}}</p>
          </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
              <label for="subject">Subject</label>
              <p>{{$data->subject}}</p>
            </div>
          
            <div class="form-group col-md-6">
              <label for="subject">Support</label><br>
                <p>{{$data->department}}</p>
              </div>
            </div>
          <div class="form-row">
              <div class="form-group col-md-6">
                <label for="subject">Priority</label><br>
                  <p>{{$data->priority}}</p>
              </div>

              <div class="form-group col-md-6">
                <label for="message">Message</label><br>
                  <p>{{$data->message}}</p>
              </div>
            </div>     

        <form action="{{url('update/ticket/'.$data->id)}}" method="POST" enctype="multipart/form-data">
          @csrf   
        <div class="form-group">
          <label >Status</label>
          <select name='status' class="form-control">
            <option value="Open">Open</option>
            <option value="Closed">Closed</option>
            <option value="Answered">Answered</option>
          </select>
        </div>
        <div style="margin-left:20px ">
        <a href="{{route('admin/ticket')}}"><button type="button" class="btn btn-danger">Back</button></a>
        <button type="submit" class="btn btn-success">Update</button>
      </div>
      </form> 
    </div>  
   </div>
  </div>

 
<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

</body>
</html>