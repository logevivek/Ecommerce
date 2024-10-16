



@extends('backend.layout.app')

    @section ('content')
    <div class="content-wrapper">
                <section class="content-header">
                    <div class="container-fluid">
                      <div class="row mb-2">
                        <div class="col-sm-6">
                          <h1>Manage Product Review</h1>
                        </div>
                        <div class="col-sm-6">
                          <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                            <li class="breadcrumb-item active">Manage Product Review</li>
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
                                   <h3 class="card-title">Total Product Review {{$TotalReview }}</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">

                              <table id="example1" class="table table-bordered table-striped">
                                <thead style="background-color:#007bff">
                                <tr class="text-center" style="color:aliceblue">
                                <th>Sr No</th>
                                  <th>Product Name</th>
                                  <th>Customer Name</th>
                                  <th>Email</th>
                                  <th>Star</th>
                                  <th>Product Review</th>
                                  <th>Status</th>
                                </tr>
                                </thead>
                                <tbody>
                         @foreach ( $review as $reviewData )
                                <tr class="text-center">
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$reviewData->pro_name}}</td>
                                    <td>{{$reviewData->coustomer_name}}</td>
                                    <td>{{$reviewData->email}}</td>
                                    <td>{{$reviewData->star_rating}}</td>
                                    <td>{{$reviewData->review}}</td>
                                    <td class="text-center">
                                        <input data-id="{{$reviewData->id}}" class="toggle-review" type="checkbox" data-onstyle="danger" data-offstyle="success" data-toggle="toggle" data-on="Deactive" data-off="Active" {{ $reviewData->status ? 'checked' : '' }}>  
                                    </td>
                                </tr>
                         @endforeach
                                </tbody>
                            </tr>
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
    Review
    @endsection

  
 