<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.1/css/bootstrap.min.css" integrity="sha512-T584yQ/tdRR5QwOpfvDfVQUidzfgc2339Lc8uBDtcp/wYu80d7jwBgAxbyMh0a9YM9F8N3tdErpFI8iaGx6x5g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Open Ticket</title>

</head>


<body style="font-family: 'Times New Roman', serif;">
  <div class="mb-4">
    <div class="row">
        <div class="col-md-2 pb-5">
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
        <div class="col-md-4 pb-5 main-container">
          <div class="container design">
            <div class="">
                <h3 class="header">OPEN TICKET</h3>
                <hr>
          <form action="{{route('store')}}" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="name">Name</label>
                  <input name="name" type="text" class="form-control" value="{{ $data->name }}" id="inputEmail4" placeholder={{ $data->name }} >
                </div>
                <div class="form-group col-md-6">
                  <label for="email">Email</label>
                  <input name="email" type="email" class="form-control" id="inputPassword4" value="{{ $data->email }}" placeholder={{ $data->email }}>
                </div>
              </div>
              <div class="form-group">
                <label for="subject" >Subject</label>
                <input name="subject" type="text" class="form-control" id="inputAddress" placeholder="Subject" required>
              </div>

              <div class="form-row">
                  <div class="form-group col-md-6">
                      <label for="inputState">Support Type</label>
                      <select name="department" class="form-control" required>
                        <option selected>Technical Support </option>
                        <option>Refund Support</option>
                        <option>Sales and Billings Support</option>
                        <option>General Enquiries Support </option>
                      </select>
                    </div>


                <div class="form-group col-md-6">
                  <label for="inputState">Priority</label>
                  <select name='priority' class="form-control" required>
                    <option selected>High</option>
                    <option>Medium</option>
                    <option>Low</option>
                  </select>
                </div>
              </div>
              <div class="form-group">
                  <label for="exampleFormControlTextarea4">Message</label>
                  <textarea name="message" class="form-control" id="exampleFormControlTextarea4" rows="5" required></textarea>
              </div>

              <div class="form-group">
                  <label for="exampleFormControlFile1">Attachments</label><br>
                  <input type="file" accept=".jpg,.png,.pdf,.txt" name="filenames[]" id="exampleFormControlFile1" multiple>                        </div>
                </div>

              <a href="{{route('myticket')}}"><button type="button" class="btn btn-danger">Cancel</button></a>
              <button type="submit" class="btn btn-success">Send</button>
            </form>
          </div>
        </div>
        </div>
    </div>
</div>


<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

</body>
</html>
