
@extends('backend.layout.app')
    @section ('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
              <div class="row mb-2">
                <div class="col-sm-6">
                  <h1>Customize Website Details</h1>
                </div>
                <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                    <li class="breadcrumb-item active">Add Website Data</li>
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
                        <a href="/website" class="btn btn-danger float-right">Back</a>
                    </div>
                    <div class="card-body">
                        <form action="/storewebsite" method="post" id="webForm" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-4">
                                    <label>Address <span style="color: red;">*</span></label>
                                    <input type="text" name="web_address" id="web_address" class="form-control" value="{{ old ('web_address') }}" autocomplete="off">
                                    @error('web_address') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>

                                <div class="col-md-4">
                                    <label>Mobile <span style="color: red;">*</span></label>
                                    <input type="text" name="web_mobile" id="web_mobile" class="form-control" value="{{ old ('web_mobile') }}" autocomplete="off">
                                    @error('web_mobile') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>

                                <div class="col-md-4">
                                    <label>Email <span style="color: red;">*</span></label>
                                    <input type="text" name="web_email" id="web_email" class="form-control" value="{{ old ('web_email') }}" autocomplete="off">
                                    @error('web_email') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div><br>

                            <div class="row">
                                <div class="col-md-4">
                                    <label>Logo <span style="color: red;">*</span></label>
                                    <input type="file" name="web_logo" id="web_logo" class="form-control">
                                    @error('web_logo') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>

                                <div class="col-md-2" style="display: flex; align-items: center;">
                                    <div style="position: relative; margin-right: 16px;">
                                        <img id='webpreview' src="backend/images/dammy.png" style="max-height: 100px; margin-top: 23px; padding: 8px;">
                                        <span id="cancelweb">X</span>
                                    </div>
                                </div>

                            </div>

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
Website Data
@endsection

  
    