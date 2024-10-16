
@extends('backend.layout.app')
    @section ('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
              <div class="row mb-2">
                <div class="col-sm-6">
                  <h1>Upadate Category</h1>
                </div>
                <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                    <li class="breadcrumb-item active">Update Category</li>
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
                        <a href="/category" class="btn btn-danger float-right">Back</a>
                    </div>
                    <div class="card-body">
                        <form action="/updatecategory?id={{ $category->id }}" method="post"  id="myForm" enctype="multipart/form-data">
                            @csrf
                            <fieldset class="border p-3 rounded">
                                <legend class="w-auto px-2"><strong>Category Details</strong></legend>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Name <span style="color: red;">*</span></label>
                                    <input type="text" name="name" id="name" class="form-control" value="{{ $category->name }}" autocomplete="off">
                                    @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>

                                <div class="col-md-4">
                                    <label>Image</label>
                                    <input type="file" name="cat_img" id="cat_img" class="form-control">
                                    @error('cat_img') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>

                                
                            <div class="col-md-2" style="display: flex; align-items: center;">
                                    <div style="position: relative; margin-right: 16px;">
                                        <img src="{{asset('backend/images/'.$category->cat_img )}}"  id="imagepreview" class="previewimgcss" />
                                        <span id="cancel">X</span>
                                    </div>
                                </div>
                            </div>
                        
                            <div class="row">
                                <div class="col-md-12">
                                    <label>Description </label> 
                                    <textarea type="text" name="description" id="description" row="3"  class="form-control">{{ $category->description }}</textarea>
                                    @error('description') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                        </fieldset>
                        <br>

                        <fieldset class="border p-3 rounded">
                            <legend class="w-auto px-2"><strong>Category Meta Details<strong></legend>
                            <div class="row">
                                <div class="col-md-4">
                                    <label>Meta Title <span style="color: red;">*</span></label>
                                    <input type="text" name="meta_title" id="meta_title" class="form-control" value="{{ $category->meta_title }}" autocomplete="off">
                                    @error('meta_title') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>

                                <div class="col-md-4">
                                    <label>Focus keyword <span style="color: red;">*</span></label>
                                    <input type="text" name="focus_keyword" id="focus_keyword" class="form-control" value="{{ $category->meta_title }}">
                                    @error('focus_keyword') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>

                                <div class="col-md-4">
                                    <label>Tags <span style="color: red;">*</span></label>
                                    <input type="text" name="tags" id="click" class="form-control" value="{{ $category->tags }}" >
                                    @error('tags') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-12">
                                    <label>Meta Description <span style="color: red;">*</span></label>
                                    <textarea  name="meta_description" id="meta_description" rows="2" class="form-control">{{ $category->meta_description }}</textarea>
                                    @error('meta_description') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>

                        </fieldset>


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

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@yaireo/tagify@3.1.0/dist/tagify.css" />
<script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify@3.1.0/dist/tagify.min.js"></script>
<script>
    var input = document.querySelector('input[name=tags]');
    var tagify = new Tagify(input);
    $("#click").on("click", function() {
      var tags = [];
      tagify.addTags(tags);
    })
  </script> 
@endsection

    @section('title')
    Edit Category
    @endsection


  
 