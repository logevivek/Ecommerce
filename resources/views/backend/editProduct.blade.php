
@extends('backend.layout.app')
    @section ('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
              <div class="row mb-2">
                <div class="col-sm-6">
                  <h1>Update Product</h1>
                </div>
                <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                    <li class="breadcrumb-item active">Update Product</li>
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
                        <a href="product" class="btn btn-danger float-right">Back</a>
                    </div>
                    <div class="card-body">
                        <form action="/updateproduct?id={{ $product->id }}" method="post" id="proForm" enctype="multipart/form-data">
                            @csrf
                        <fieldset class="border p-3 rounded">
                                <legend class="w-auto px-2"><strong>Products Details</strong></legend>
                            <div class="row">
                                <div class="col-md-4">
                                    <label>Product Name <span style="color: red;">*</span></label>
                                    <input type="text" name="pro_name" id="pro_name" class="form-control"  value="{{ $product->pro_name }}" autocomplete="off">
                                    @error('pro_name') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>

                                <div class="col-md-4">
                                    <label>Category <span style="color: red;">*</span></label>
                                    <select name="cat_id" id="cat_id" class="form-control">
                                        <option selected disabled> Select Category</option>
                                        @foreach ( $data as $values)
                                        <option value="{{$values->id}}"{{$values->id == $product->cat_id ? 'selected' : ''}}>{{$values->name}}</option>
                                        @endforeach   
                                        </select>
                                    @error('cat_id') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>

                                <div class="col-md-4">
                                    <label>Product Price <span style="color: red;">*</span></label>
                                    <input type="text" name="pro_price" id="pro_price" class="form-control"  value="{{ $product->pro_price }}"  autocomplete="off">
                                    @error('pro_price') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <br>

                            <div class="row">

                                <div class="col-md-4">
                                    <label>Quantity <span style="color: red;">*</span></label>
                                    <input type="text" name="pro_quantity" id="pro_quantity" class="form-control"   value="{{ $product->pro_quantity }}" autocomplete="off">
                                    @error('pro_quantity') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>

                                <div class="col-md-4">
                                    <label>Product Image</label>
                                    <input type="file" name="pro_img" id="pro_img" class="form-control">
                                    @error('pro_img') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>

                                <div class="col-md-2" style="display: flex; align-items: center;">
                                    <div style="position: relative; margin-right: 16px;">
                                        <img src="backend/images/{{  $product->pro_img }}"  id="pro_imgpreview" style="max-height:100px; margin-top: 23px; padding: 8px;" />
                                        <span id="cancel2">X</span>
                                      
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <label>Description </label>
                                    <textarea type="text" name="pro_desc" id="pro_desc" row="3" class="form-control">{{ $product->pro_desc }}</textarea>
                                    @error('pro_desc') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>

                    </fieldset>
                    <br>
                    <fieldset class="border p-3 rounded">
                        <legend class="w-auto px-2"><strong>Product Meta Details<strong></legend>
                        <div class="row">
                            <div class="col-md-4">
                                <label>Meta Title <span style="color: red;">*</span></label>
                                <input type="text" name="meta_title" id="meta_title" class="form-control" value="{{ $product->meta_title }}" autocomplete="off">
                                @error('meta_title') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <div class="col-md-4">
                                <label>Focus keyword <span style="color: red;">*</span></label>
                                <input type="text" name="focus_keyword" id="focus_keyword" class="form-control" value="{{ $product->meta_title }}">
                                @error('focus_keyword') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <div class="col-md-4">
                                <label>Tags <span style="color: red;">*</span></label>
                                <input type="text" name="tags" id="click" class="form-control" value="{{ $product->tags }}" >
                                @error('tags') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-12">
                                <label>Meta Description <span style="color: red;">*</span></label>
                                <textarea type="text" name="meta_description" id="meta_description" rows="2" class="form-control">{{ $product->meta_description }}</textarea>
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
Edit Product
@endsection

  
    