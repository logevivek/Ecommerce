
@extends('backend.layout.app')
    @section ('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
              <div class="row mb-2">
                <div class="col-sm-6">
                  <h1>View Order</h1>
                </div>
                <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                    <li class="breadcrumb-item active">View Order</li>
                  </ol>
                </div>
              </div>
            </div><!-- /.container-fluid -->
          </section>
       
          <section class="content">
            <div class="container-fluid">
              <div class="row">
                <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <a href="/order" class="btn btn-danger float-right">Back</a>
                    </div>

                    <div class="card-body">
                
                     <fieldset class="border p-3 rounded">
                        <legend class="w-auto px-2">Customer Details</legend>
                        <div class="d-flex justify-content-between">
                            <div class="w-50 me-2">
                                <div class="mb-3">
                                    <label class="fw-bold">Customer Id:</label>
                                    <p>{{ $order_data['0']->customer_id }}</p>
                                </div>
                                <div class="mb-3">
                                    <label class="fw-bold">Customer Name:</label>
                                    <p> {{ $order_data['0']->first_name }} {{ $order_data['0']->last_name }} </p> 
                                </div>
                            </div>
                    
                            <div class="w-50 ms-2">
                                <div class="mb-3">
                                    <label class="fw-bold">Phone:</label>
                                    <p>{{ $order_data['0']->phone }}</p>
                                </div>
                                <div class="mb-3">
                                    <label class="fw-bold">Email:</label>
                                    <p>{{ $order_data['0']->email }}</p>
                                </div>
                            </div>
                            <div class="w-50 ms-2">
                                <div class="mb-3">
                                    <label class="fw-bold">Payment Mode:</label>
                                    <p>{{ $order_data['0']->pay_mode }}</p>
                                </div>
                                <div class="mb-3">
                                    <label class="fw-bold">Address:</label>
                                    <p>{{ $order_data['0']->address }}</p>
                                </div>
                            </div>
                        </div>
                    </fieldset><br>

                    <fieldset class="border p-3 rounded">
                      <legend class="w-auto px-2">Order Details</legend>
                    
                        
                        <table id="example1" class="table table-bordered table-striped">
                            <thead style="background-color:#007bff">
                            <tr class="text-center" style="color:aliceblue">
                            <th>Sr No</th>
                            <th>Product Name</th>
                            <th>Product Quantity</th>
                            <th>Product Price</th>
                        </tr>
                            </thead>
                            <tbody>
                    @php $totalPrice = 0  @endphp
                    @foreach ($order_data as  $order_values)
                    @php  $totalPrice += $order_values->pro_price * $order_values->pro_quantity @endphp

                        <tr class="text-center">
                            <td>{{ $loop->iteration}}</td>
                            <td>{{ $order_values->pro_name }}</td>
                            <td>{{$order_values->pro_quantity}}</td>
                            <td>{{$order_values->pro_price}}</td>
                        </tr>
                       
                        @endforeach
                            </tbody>
                     
                        <tr class="text-center">
                            <td colspan="4"><b>Total Price</b> : {{ $totalPrice}}</td>
                        </tr>
                          </table>
                      
                  </fieldset> 

                  
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>
</section>

    @endsection
@section('title')
View Order
@endsection

  
    