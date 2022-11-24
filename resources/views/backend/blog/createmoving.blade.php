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
            <div class="col-xl-6">
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
                            <form class="needs-validation" novalidate method="POST" action="{{ route('msw-update',[$sliderContent->id]) }}" enctype="multipart/form-data">
                                @csrf
                                <!-- @method('PATCH') -->
                                <div class="panel-content">
                                    <div class="form-row">
                                        <div class="col-md-12 mb-12">
                                            <label class="form-label" for="title">Title</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fal fa-cube fs-xl"></i></span>
                                                </div>
                                                <input type="text" id="title" name="title" value="{{ @$sliderContent->title }}" class="form-control" placeholder="title text">
                                                <div class="valid-tooltip">
                                                    Looks good!
                                                </div>
                                                <div class="invalid-tooltip">
                                                    Please input title.
                                                </div>
                                            </div>
                                        </div>

                                        <!-- <div class="col-md-12 mb-12">
                                            <label class="form-label" for="des">Description</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fal fa-cube fs-xl"></i></span>
                                                </div>
                                                <input type="text" id="des" name="image_text_2" value="{{ @$sliderContent->des }}" class="form-control" placeholder="Description text">
                                                <div class="valid-tooltip">
                                                    Looks good!
                                                </div>
                                                <div class="invalid-tooltip">
                                                    Please input Description.
                                                </div>
                                            </div>
                                        </div> -->

                                        <div class="col-md-12 mb-12">
                                            <label class="form-label" for="description">Description <span class="text-danger">*</span> </label>
                                            <div class="input-group">
                                                <textarea name="image_text_2" id="description" class="js-summernote">{{ @$sliderContent->des }}</textarea>
                                            </div>
                                        </div>

                                        <div class="col-md-12 mb-12">
                                            <label class="form-label" for="image">Image </label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fal fa-image fs-xl"></i></span>
                                                </div>
                                                <input type="file" class="form-control" id="uploadImage" placeholder="Select image" accept="image/png,image/jpg,image/jpeg" name="image">
                                                <div class="valid-tooltip">
                                                    Looks good!
                                                </div>
                                                <div class="invalid-tooltip">
                                                    Please choose a image.
                                                </div>
                                            </div>
                                            <br>
                                            <img src="{{ asset(@$sliderContent->img) }}" alt="image" width="250" height="100" id="upload_image">
                                        </div>

                                    </div>
                                </div>
                                <div class="panel-content border-faded border-left-0 border-right-0 border-bottom-0 d-flex flex-row align-items-center">

                                    <button class="btn btn-primary ml-auto" type="submit">Update</button>
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
