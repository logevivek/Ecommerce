
@extends('backend.layout.app')
    @section ('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
              <div class="row mb-2">
                <div class="col-sm-6">
                  <h1>Create New Banner</h1>
                </div>
                <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                    <li class="breadcrumb-item active">Add New Banner</li>
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
                        <a href="/banner" class="btn btn-danger float-right">Back</a>
                    </div>
                    <div class="card-body">
                        <form action="/storebanner" method="post" id="bannerForm" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-3">
                                    <label>Title <span style="color: red;">*</span></label>
                                    <input type="text" name="title" id="title" class="form-control" value="{{ old ('title') }}" autocomplete="off">
                                    @error('title') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>

                                <div class="col-md-4">
                                    <label>Image</label>
                                    <input type="file" name="banner_img" id="banner_img" class="form-control">
                                    @error('banner_img') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>

                             <div class="col-md-5" style="display: flex; align-items: center;">
                                    <div style="position: relative; margin-right: 16px;">
                                        <img id='bannerpreview' src="backend/images/dammy.png" style="max-height: 100px; margin-top:24px; padding: 8px;">
                                        <span id="c_banner">X</span>
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
Add Banner
@endsection

  
    