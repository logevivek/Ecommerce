<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

@extends('backend.layout.app')

    @section ('content')
    <div class="content-wrapper">
                <section class="content-header">
                    <div class="container-fluid">
                      <div class="row mb-2">
                        <div class="col-sm-6">
                          <h1>Manage Category</h1>
                        </div>
                        <div class="col-sm-6">
                          <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                            <li class="breadcrumb-item active">Manage Category</li>
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
                              <h3 class="card-title">Total Number Of Categories  {{$TotalCategory}}</h3>
                              <a href="/addcategory" class="btn btn-primary float-right">Add New Category</a></h4>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">

                              <table id="example1" class="table table-bordered table-striped">
                                <thead style="background-color:#007bff">
                                <tr class="text-center" style="color:aliceblue">
                                  <th>Sr.No</th>
                                  <th>Name</th>
                                  <th>Description</th>
                                  <th>Image</th>
                                  <th>Status</th>
                                  <th>Action</th>
                                </tr>
                                </thead>
                              
                                <tbody>
                                @foreach ( $categories as $values )
                                <tr class="text-center">
                                <td>{{$loop->iteration}}</td>
                                  <td>{{ $values->name }}</td>
                                  <td>{!! $values->description !!}</td>
                                  <td><img src="backend/images/{{ $values->cat_img }}" width="100px" height="100px"/></td>
                                    <td class="text-center">
                                        <input data-id="{{$values->id}}" class="toggle-category" type="checkbox" data-onstyle="danger" data-offstyle="success" data-toggle="toggle" data-on="Deactive" data-off="Active" {{ $values->status ? 'checked' : '' }}>  
                                    </td>
                                  <td class="text-center"> 
                                    <a href="/editcategory/{{ $values->id }}" class="btn btn-success" title="Update record"> <i class="fa fa-edit"></i></a>
                                    <a href="javascript:void(0)" class="btn btn-danger" title="Delete record" onclick="confirmDelete({{ $values->id }})">
                                      <i class="fa fa-trash"></i>
                                  </a>
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
    Category
    @endsection

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>



    @if (session('status'))
    <script>
        $(document).ready(function() {
            toastr.success("{{ session('status') }}");
        });
    </script>
    @endif
  
 