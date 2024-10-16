
@extends('backend.layout.app')


    @section ('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
              <div class="row mb-2">
                <div class="col-sm-6">
                  <h1>Update Banner</h1>
                </div>
                <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                    <li class="breadcrumb-item active">Update Banner</li>
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
                        <form action="/updatbanner?id={{ $banner->id }}" method="post"  id="bannerForm" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-3">
                                    <label>Title <span style="color: red;">*</span></label>
                                    <input type="text" name="title" id="title" class="form-control" value="{{ $banner->title }}" autocomplete="off">
                                    @error('title') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>

                                <div class="col-md-4">
                                    <label>Banner</label>
                                    <input type="file" name="banner_img" id="banner_img" class="form-control">
                                    @error('banner_img') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>

                                
                                <div class="col-md-5" style="display: flex; align-items: center;">
                                    <div style="position: relative; margin-right: 16px;">
                                        <img src="backend/images/{{  $banner->banner_img }}"  id="bannerpreview" style="max-height: 100px; margin-top:24px; padding: 8px;" />
                                        <span id="c_banner">X</span>
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-5">
                                <div class="col-md-12">
                            <button type="submit" class="btn btn-primary">Update</button>
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
    Edit Banner
    @endsection


  
 