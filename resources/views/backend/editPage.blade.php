
@extends('backend.layout.app')
    @section ('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
              <div class="row mb-2">
                <div class="col-sm-6">
                  <h1>Update Page</h1>
                </div>
                <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                    <li class="breadcrumb-item active">Update Page</li>
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
                        <a href="/page" class="btn btn-danger float-right">Back</a>
                    </div>
                    <div class="card-body">
                        <form action="/updatePage?id={{ $page->id }}" method="post" id="pageForm">
                            @csrf
                            <fieldset class="border p-3 rounded">
                                <legend class="w-auto px-2"><strong>Page Details</strong></legend>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Title <span style="color: red;">*</span></label>
                                    <input type="text" name="title" id="title" class="form-control" value="{{ $page->title }}" autocomplete="off">
                                    @error('title') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>

                                <div class="col-md-6">
                                    <label>Heading <span style="color: red;">*</span></label>
                                    <input type="text" name="heading" id="heading" class="form-control" value="{{ $page->heading }}" autocomplete="off">
                                    @error('heading') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <br>
                                <div class="row">
                                    <div class="col-md-12">
                                        <label>Description </label>
                                        <textarea type="text" name="desc" id="desc" rows="3" class="form-control">{{ $page->desc }}</textarea>
                                            
                                        
                                        @error('desc') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                            </fieldset>
                            <br>
                        <fieldset class="border p-3 rounded">
                            <legend class="w-auto px-2"><strong>Page Meta Details<strong></legend>
                            <div class="row">
                                <div class="col-md-4">
                                    <label>Meta Title <span style="color: red;">*</span></label>
                                    <input type="text" name="meta_title" id="meta_title" class="form-control" value="{{ $page->meta_title }}" autocomplete="off">
                                    @error('meta_title') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>

                                <div class="col-md-4">
                                    <label>Focus keyword <span style="color: red;">*</span></label>
                                    <input type="text" name="focus_keyword" id="focus_keyword" class="form-control" value="{{ $page->meta_title }}">
                                    @error('focus_keyword') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>

                                <div class="col-md-4">
                                    <label>Tags <span style="color: red;">*</span></label>
                                    <input type="text" name="tags" id="click" class="form-control" value="{{ $page->tags }}">
                                    @error('tags') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>  
                            <br>

                            <div class="row">
                                <div class="col-md-12">
                                    <label>Meta Description <span style="color: red;">*</span></label>
                                    <textarea type="text" name="meta_description" id="meta_description" rows="2" class="form-control">{{ $page->meta_description }}</textarea>
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
Update Page
@endsection

  
    