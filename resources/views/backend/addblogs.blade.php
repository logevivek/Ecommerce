
@extends('backend.layout.app')
    @section ('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
              <div class="row mb-2">
                <div class="col-sm-6">
                  <h1>Create New Blog</h1>
                </div>
                <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                    <li class="breadcrumb-item active">Add New Blog</li>
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
                        <a href="/blogs" class="btn btn-danger float-right">Back</a>
                    </div>
                    <div class="card-body">
                        <form action="/storeblogs" method="post" id="blogForm" enctype="multipart/form-data">
                            @csrf
                            <fieldset class="border p-3 rounded">
                                <legend class="w-auto px-2"><strong>Blog Details</strong></legend>
                            <div class="row">
                                <div class="col-md-3">
                                    <label>Title <span style="color: red;">*</span></label>
                                    <input type="text" name="title" id="title" class="form-control" value="{{ old ('title') }}" autocomplete="off">
                                    @error('title') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="col-md-3">
                                    <label>Heading <span style="color: red;">*</span></label>
                                    <input type="text" name="heading" id="heading" class="form-control" value="{{ old ('heading') }}" autocomplete="off">
                                    @error('heading') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>


                                
                                <div class="col-md-4">
                                    <label>Image</label>
                                    <input type="file" name="blog_banner" id="blog_banner" class="form-control">
                                    @error('blog_banner') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>

                             <div class="col-md-2" style="display: flex; align-items: center;">
                                    <div style="position: relative; margin-right: 16px;">
                                        <img id='blogpreview' src="backend/images/dammy.png" style="max-height: 100px; margin-top:24px; padding: 8px;">
                                        <span id="blog_cancel">X</span>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <label>Description <span style="color: red;">*</span></label>
                                     <textarea type="text" name="blog_desc" id="blog_desc" rows="2" class="form-control">
                                         {{{ old('blog_desc') }}}
                                     </textarea>
                                     @error('blog_desc') <span class="text-danger">{{ $message }}</span> @enderror
                                 </div>
                            </div>
                        </fieldset><br>

                                <fieldset class="border p-3 rounded">
                                    <legend class="w-auto px-2"><strong>Blog Meta Details<strong></legend>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Meta Title <span style="color: red;">*</span></label>
                                            <input type="text" name="meta_title" id="meta_title" class="form-control" value="{{ old ('meta_title') }}" autocomplete="off">
                                            @error('meta_title') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
        
                                
                                        <div class="col-md-6">
                                            <label>Tags <span style="color: red;">*</span></label>
                                            <input type="text" name="tags" id="click" class="form-control" value="{{ old ('tags') }}">
                                            @error('tags') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                    </div><br>
                           
                                        
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label>Meta Description <span style="color: red;">*</span></label>
                                            <textarea  name="meta_description" id="meta_description" rows="2" class="form-control"> {{{ old('meta_description') }}}</textarea>
                                            @error('meta_description') <span class="text-danger">{{ $message }}</span> @enderror
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
Add Blog
@endsection

  
    