
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
                        <a href="/order" class="btn btn-danger" style="margin-left:95%;">Back</a>
                    </div>

                    <div class="card-body">
                      <fieldset class="border p-3 rounded">
                        <legend class="w-auto px-2">Order Details</legend>
                        <div class="d-flex justify-content-between">
                            <div class="w-50 me-2">
                                <div class="mb-3">
                                    <label class="fw-bold">Order Id:</label>
                                    <p>{{ $order_data->order_id }}</p>
                                </div>
                                <div class="mb-3">
                                    <label class="fw-bold">Product Price:</label>
                                    <p>{{ $order_data->pro_price }}</p> 
                                </div>
                            </div>
                    
                            <div class="w-50 ms-2">
                                <div class="mb-3">
                                    <label class="fw-bold">Product Name:</label>
                                    <p>{{ $order_data->pro_name }}</p>
                                </div>
                                <div class="mb-3">
                                    <label class="fw-bold">Quantity:</label>
                                    <p>{{ $order_data->pro_quantity }}</p>
                                </div>
                            </div>
                        </div>
                    </fieldset>

                    <fieldset class="border p-3 rounded">
                      <legend class="w-auto px-2">Customer Details</legend>
                      <div class="d-flex justify-content-between">
                          <div class="w-50 me-2">
                              <div class="mb-3">
                                  <label class="fw-bold">Customer Name:</label>
                                  <p>{{ $order_data->first_name }} {{ $order_data->last_name }}</p>
                              </div>
                              <div class="mb-3">
                                  <label class="fw-bold">Email:</label>
                                  <p>{{ $order_data->email  }}</p> 
                              </div>
                          </div>
                  
                          <div class="w-50 ms-2">
                              <div class="mb-3">
                                  <label class="fw-bold">Phone:</label>
                                  <p>{{ $order_data->phone }}</p>
                              </div>
                              <div class="mb-3">
                                  <label class="fw-bold">Payment Mode:</label>
                                  <p>{{ $order_data->pay_mode }}</p> 
                              </div>
                          </div>


                          <div class="w-50 ms-2">
                            <div class="mb-3">
                                <label class="fw-bold">Address:</label>
                                <p>{{ $order_data->address }}</p>
                            </div>
                            <div class="mb-3">
                                <label class="fw-bold">Image:</label>
                                <br>
                                <img src="backend/images/{{ $order_data->pro_img }}" style="border:1px solid;" width="100px" height="100px"/>
                                
                            </div>
                        </div>
                      </div>
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

  
    