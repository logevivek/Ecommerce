
@extends('backend.layout.app')
    @section ('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
              <div class="row mb-2">
                <div class="col-sm-6">
                  <h1>Create New Coupons</h1>
                </div>
                <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                    <li class="breadcrumb-item active">Add New Coupons</li>
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
                        <a href="/coupons" class="btn btn-danger float-right">Back</a>
                    </div>
                    <div class="card-body">
                        <form action="storecoupons" method="post" id="" enctype="multipart/form-data">
                            @csrf
                            <fieldset class="border p-3 rounded">
                                <legend class="w-auto px-2"><strong>Coupons Details</strong></legend>
                            <div class="row">
                                <div class="col-md-4">
                                    <label>Coupon Name <span style="color: red;">*</span></label>
                                    <input type="text" name="coupon_name" id="coupon_name" class="form-control" value="{{ old ('coupon_name') }}" autocomplete="off">
                                    @error('coupon_name') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>

                                <div class="col-md-4">
                                    <label>Discount (In Percents %) <span style="color: red;">*</span></label>
                                    <input type="text" name="discount" id="discount" class="form-control" value="{{ old ('discount') }}" autocomplete="off">
                                    @error('discount') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>

                                <div class="col-md-4">
                                    <label>Coupon Attempt </label>
                                    <input type="text" name="coupon_attempt" id="coupon_attempt" class="form-control" value="{{ old ('coupon_attempt') }}" autocomplete="off">
                                </div>

                            </div>
                        </fieldset>

                            <div class="row mt-5">
                                <div class="col-md-12">
                            <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</section>


@endsection
@section('title')
Add Coupons
@endsection

  
    