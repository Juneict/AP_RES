<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Form</title>
     <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="../../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
</head>
<body>
      <div class="card">
      @if (session('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
       @endif
      

        <div class="card-body">
          <h3>Order Form</h3>
        <!-- ./row -->
        <div class="row">
          <div class="col-12 col-sm-6 col-lg-12">
            <div class="card card-primary card-tabs">
              <div class="card-header p-0 pt-1">
                <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill" href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true">New Order</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="pill" href="#custom-tabs-one-profile" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="false">OrderList</a>
                  </li>
                  
                </ul>
              </div>
              <div class="card-body">
                <div class="tab-content" id="custom-tabs-one-tabContent">
                  <div class="tab-pane fade show active" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
                  <div>
                    <form class="navbar-form navbar-left col-md-4" method="GET" action="{{ url('search') }}">
                          <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search Dishes" name="search">
                              <button class="btn btn-default" type="submit">
                                <i class="fa fa-search"></i>
                              </button>
                          </div>
                    </form>
                  </div><br>
                  
                    <form action="{{route('order.submit')}}" method="post">
                      <div class="row">
                          @csrf
                          @foreach($dishes as $dish)
                          <!-- <img src="{{url('/images/'.$dish->image)}}" alt="Image" alt="" width="100" height="100"><br>
                          <label for="">{{ $dish->name }} </label>
                          <input type="number" value="1"> -->

                          <div class="card" style="width: 13rem;">
                              <img class="card-img-top" src="{{url('/images/'.$dish->image)}}" alt="Card image cap">
                              <div class="card-body">
                                <h3 class="card-title">{{ $dish->name }}</h3>
                                <input type="number" class='card-text' value="" name="{{$dish->id}}"><br> 
                              </div>
                          </div>
                          @endforeach
                        </div>
                          <div class="form-group">
                            <select name="table" id="">
                                @foreach($tables as $table)
                                  <option class="form-control" value="{{ $table->id }}">{{ $table->number }}</option>
                                @endforeach
                            </select>
                          </div>
                      
                      <input type="submit" class="btn btn-success" value="submit">
                    </form>
                  </div>
                  <div class="tab-pane fade" id="custom-tabs-one-profile" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab">
                      <table class="table table-bordered table-striped">
                            <thead>
                              <tr>
                                <th>Dish Name</th>
                                <th>Table Number</th>
                                <th>Table Status</th>
                                <th>Action</th>
                              </tr>
                            </thead>
                            <tbody>
                              @foreach( $orders as $order)
                                <tr>
                                    <td>{{ $order->dish->name}}</td>
                                    <td>{{ $order->table_id }} </td>    
                                    <td>{{ $status[$order->status] }} </td>                     
                                    <td>
                                    
                                      <a style="height:40px; margin-right: 10px" href="/order/{{$order->id}}/serve" class="btn btn-warning">Serve</a>
                                      
                                    </td>
                                    
                                    
                              </tr>
                              @endforeach
                            
                            </tbody>
                      </table>
                  </div>
                  
                </div>
              </div>
              <!-- /.card -->
            </div>
          </div>
         
          
        </div>
        <!-- /.row -->
        </div>
      </div>
        <!-- jQuery -->
<script src="/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="/dist/js/adminlte.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="/plugins/jszip/jszip.min.js"></script>
<script src="/plugins/pdfmake/pdfmake.min.js"></script>
<script src="/plugins/pdfmake/vfs_fonts.js"></script>
<script src="/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
</body>
</html>