@extends('backend.layout.app')
@section('title')
    {{ $title }}
@endsection

@section('mainContent')
    <!-- the #js-page-content id is needed for some plugins to initialize -->
    <main id="js-page-content" role="main" class="page-content">
        <ol class="breadcrumb page-breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item">{{ $menu }}</li>
            <li class="breadcrumb-item active">{{ $title }}</li>
            <li class="position-absolute pos-top pos-right d-none d-sm-block"><span class="js-get-date"></span></li>
        </ol>
        <div class="row">
            <div class="col-xl-12">
                <div id="panel-5" class="panel">
                    <div class="panel-hdr">
                        <h2>
                            {{ $title }}
                        </h2>
                        <div class="panel-toolbar">
                            <button class="btn btn-panel" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
                            <button class="btn btn-panel" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
                            <button class="btn btn-panel" data-action="panel-close" data-toggle="tooltip" data-offset="0,10" data-original-title="Close"></button>
                        </div>
                    </div>
                    <div class="panel-container show">
                        <div class="panel-content p-0">
                            <form class="needs-validation" novalidate method="POST" action="{{ route('blog.store') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="panel-content">
                                    <div class="form-row">
                                        <div class="col-md-6 mb-6">
                                            <label class="form-label" for="category_id">Category <span class="text-danger">*</span> </label>
                                            <div class="input-group">
                                                <select name="category_id" id="category_id" class="form-control select2" required>
                                                    <option value="">Choose one</option>
                                                    @foreach ($blogCategory as $category)
                                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                    @endforeach
                                                </select>
                                                <div class="valid-tooltip">
                                                    Looks good!
                                                </div>
                                                <div class="invalid-tooltip">
                                                    Please choose a category.
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="col-md-6 mb-6">
                                                <label class="form-label" for="name">Name <span class="text-danger">*</span> </label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fal fa-shield fs-xl"></i></span>
                                                </div>
                                                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" placeholder="Name" required>
                                                <div class="valid-tooltip">
                                                    Looks good!
                                                </div>
                                                <div class="invalid-tooltip">
                                                    Please choose a name.
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6 mb-6">
                                            <label class="form-label" for="brand_id">Brand <span class="text-danger">*</span> </label>
                                            <div class="input-group">
                                                <select name="brand_id" id="brand_id" class="form-control select2" required>
                                                    <option value="">Choose one</option>
                                                    @foreach ($socialLink as $social)
                                                        <option value="{{ $social->id }}">{{ $social->name }}</option>
                                                    @endforeach
                                                </select>
                                                <div class="valid-tooltip">
                                                    Looks good!
                                                </div>
                                                <div class="invalid-tooltip">
                                                    Please choose a brand.
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6 mb-6">
                                            <label class="form-label" for="name">Page Title <span class="text-danger">*</span> </label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fal fa-book fs-xl"></i></span>
                                                </div>
                                                <input type="text" class="form-control" id="page_title" name="page_title" value="{{ old('page_title') }}" placeholder="Page title" required>
                                                <div class="valid-tooltip">
                                                    Looks good!
                                                </div>
                                                <div class="invalid-tooltip">
                                                    Please choose a title.
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6 mb-6">
                                            <label class="form-label" for="name">Page Description <span class="text-danger">*</span> </label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fal fa-book fs-xl"></i></span>
                                                </div>
                                                <input type="text" class="form-control" id="name" name="page_description" value="{{ old('page_description') }}" placeholder="Page Description" required>
                                                <div class="valid-tooltip">
                                                    Looks good!
                                                </div>
                                                <div class="invalid-tooltip">
                                                    Please choose a page description.
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6 mb-6">
                                            <label class="form-label" for="image">Image </label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fal fa-cube fs-xl"></i></span>
                                                </div>
                                                <input type="file" required accept="image/jpeg,image/jpg,image/png" name="image" id="uploadImage" class="form-control">
                                                <div class="valid-tooltip">
                                                    Looks good!
                                                </div>
                                                <div class="invalid-tooltip">
                                                    Please choose a image.
                                                </div>
                                            </div><br>
                                            <img class="d-none" alt="image" width="100" height="100" id="upload_image">
                                        </div>
                                        <div class="col-md-6 mb-6">
                                            <label class="form-label" for="pdf_file">PDF File </label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fal fa-cube fs-xl"></i></span>
                                                </div>
                                                <input type="file" accept="application/pdf" name="pdf_file" id="pdf-upload" class="form-control">
                                               
                                            </div><br>
                                            <object type="application/pdf" class="d-none" data ="#" id="pdfViewer">
                                                <embed id="preview-3_1" type="application/pdf">
                                            </object>
                                        </div>
                                        <div class="col-md-6 mb-6">
                                            <label class="form-label" for="video_code">Youtube Embed Code </label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fal fa-video fs-xl"></i></span>
                                                </div>
                                                <input name="video_code" id="video_code" class="form-control" value="{{ old('video_code') }}" placeholder="Embed Video Code">
                                                
                                            </div><br>
                                            <span class="text-info">Ex: https://www.youtube.com/watch?v=<strong class="text-danger">3ohVPB1r7IU</strong></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel-content border-faded border-left-0 border-right-0 border-bottom-0 d-flex flex-row align-items-center">
                                    <a href="{{ route('blog.index') }}" class="btn btn-dark">Product List</a>
                                    <button class="btn btn-primary ml-auto" type="submit">Add Product</button>
                                </div>
                            </form>
                            <script>
                                // Example starter JavaScript for disabling form submissions if there are invalid fields
                                (function()
                                {
                                    'use strict';
                                    window.addEventListener('load', function()
                                    {
                                        // Fetch all the forms we want to apply custom Bootstrap validation styles to
                                        var forms = document.getElementsByClassName('needs-validation');
                                        // Loop over them and prevent submission
                                        var validation = Array.prototype.filter.call(forms, function(form)
                                        {
                                            form.addEventListener('submit', function(event)
                                            {
                                                if (form.checkValidity() === false)
                                                {
                                                    event.preventDefault();
                                                    event.stopPropagation();
                                                }
                                                form.classList.add('was-validated');
                                            }, false);
                                        });
                                    }, false);
                                })();
                            </script>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!-- this overlay is activated only when mobile menu is triggered -->
@endsection
