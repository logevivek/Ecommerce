
@extends('backend.layout.app')

    @section ('content')
    <div class="content-wrapper">
                <section class="content-header">
                    <div class="container-fluid">
                      <div class="row mb-2">
                        <div class="col-sm-6">
                          <h1>Manage Order</h1>
                        </div>
                        <div class="col-sm-6">
                          <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                            <li class="breadcrumb-item active">Manage Order</li>
                          </ol>
                        </div>
                      </div>
                    </div><!-- /.container-fluid -->
                  </section>

                  <section class="content">
                    <div class="col-md-12">
                    <div class="container-fluid">
                      <div class="row">
                        <div class="col-12">
                          <div class="card">
                            <div class="card-header">
                                   <h3 class="card-title">Total No. Of Orders {{$TotalOrder}}</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">

                              <table id="example1" class="table table-bordered table-striped">
                                <thead style="background-color:#007bff">
                                <tr class="text-center" style="color:aliceblue">
                                <th>Sr No</th>
                                  <th>Order Id</th>
                                  <th>Customer Id</th>
                                  <th>Customer Name</th>
                                  <th>Email</th>
                                  <th>Phone</th>
                                  <th>Status</th>
                                  <th>Action</th>
                              </tr>
                                </thead>
                                <tbody>
                            @foreach ( $order as $values )
                                <tr class="text-center">
                                <td>{{$loop->iteration}}</td>
                                <td>{{ $values->order_id}}</td>
                                <td>{{ $values->customer_id}}</td>
                                <td>{{ $values->first_name}} {{ $values->last_name}}</td>
                                <td>{{ $values->email}}</td>
                                <td>{{ $values->phone}}</td>
                                <td class="text-center">
                                  <form id="status-form-{{ $values->id }}" class="d-inline">
                                      @csrf
                                      <input type="hidden" name="id" value="{{ $values->id }}">
                                      <select name="status" class="form-control status-select" data-id="{{ $values->id }}">
                                          <option value="0" {{ $values->status == 0 ? 'selected' : '' }}>Pending</option>
                                          <option value="1" {{ $values->status == 1 ? 'selected' : '' }}>Processing</option>
                                          <option value="2" {{ $values->status == 2 ? 'selected' : '' }}>Hold</option>
                                          <option value="3" {{ $values->status == 3 ? 'selected' : '' }}>Completed</option>
                                      </select>
                                  </form>
                              </td>
                                <td class="text-center"> 
                                    <a href="/Vieworder?order_id={{ $values->order_id }}" class="btn btn-info" title="View record"><i class="fa fa-eye"></i></a>
                                </td>
                          </tr>
                                @endforeach
                                </tbody>
                          
                              </table>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </section>
                </div>

    @endsection
    @section('title')
    Order
    @endsection

