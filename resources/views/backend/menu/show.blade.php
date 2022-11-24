@extends('backend.layout.app')
@section('title')
    {{ $title }}
@endsection

@section('mainContent')
    <!-- the #js-page-content id is needed for some plugins to initialize -->
    <main id="js-page-content" role="main" class="page-content">
        <ol class="breadcrumb page-breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
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
                            {{-- <form class="needs-validation" novalidate method="POST" action="{{ route('menu.update',$menuData->id) }}" enctype="multipart/form-data"> --}}
                                <div class="panel-content">
                                    <div class="form-row">
                                        <div class="col-md-6 mb-6">
                                            <label class="form-label" for="name">Name <span class="text-danger">*</span> </label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fal fa-shield fs-xl"></i></span>
                                                </div>
                                                <input type="text" class="form-control" onkeyup="return createSlug()" id="name" name="name" value="{{ $menuData->name }}" placeholder="Name" required>
                                                <div class="valid-tooltip">
                                                    Looks good!
                                                </div>
                                                <div class="invalid-tooltip">
                                                    Please choose a name.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-6">
                                            <label class="form-label" for="slug">Slug <span class="text-danger">*</span> </label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fal fa-shield fs-xl"></i></span>
                                                </div>
                                                <input type="text" class="form-control" id="slug" name="slug" value="{{ $menuData->slug }}" placeholder="Slug" readonly>
                                                <div class="valid-tooltip">
                                                    Looks good!
                                                </div>
                                                <div class="invalid-tooltip">
                                                    Please choose a slug.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-6">
                                            <label class="form-label" for="heading">Text </label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fal fa-shield fs-xl"></i></span>
                                                </div>
                                                <textarea name="heading" id="heading" class="form-control">{{ $menuData->heading }}</textarea>
                                                <div class="valid-tooltip">
                                                    Looks good!
                                                </div>
                                                <div class="invalid-tooltip">
                                                    Please choose a text.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-6">
                                            <label class="form-label" for="parent">Parent <span class="text-danger">*</span> </label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fal fa-caret-square-down fs-xl"></i></span>
                                                </div>
                                                <select name="parent" id="parent" class="form-control">
                                                    <option value="">No parent</option>
                                                    @foreach ($menus as $smenu)
                                                        <option {{ $smenu->id == $menuData->parent ? 'selected' : '' }} value="{{ $smenu->id }}">{{ $smenu->name }}</option>
                                                    @endforeach
                                                </select>
                                                <div class="valid-tooltip">
                                                    Looks good!
                                                </div>
                                                <div class="invalid-tooltip">
                                                    Please choose a parent.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-6">
                                            <label class="form-label" for="outer_link">Outer Link </label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fal fa-link fs-xl"></i></span>
                                                </div>
                                                <input type="text" class="form-control" id="outer_link" name="outer_link" value="{{ $menuData->outer_link }}" placeholder="Outer link">
                                                <div class="valid-tooltip">
                                                    Looks good!
                                                </div>
                                                <div class="invalid-tooltip">
                                                    Please choose a outer link.
                                                </div>
                                            </div>
                                        </div>
                                        @if ($menuData->background_image)
                                        <div class="col-md-6 mb-6">
                                            <label class="form-label" for="background_image">Background Image </label>
                                            <br>
                                            <img src="{{ asset($menuData->background_image) }}" alt="image" width="250" height="100" id="upload_image">
                                        </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="panel-content border-faded border-left-0 border-right-0 border-bottom-0 d-flex flex-row align-items-center">
                                    <a href="{{ route('menu.index') }}" class="btn btn-dark">Menu List</a>
                                    <a class="btn btn-primary ml-auto" href="{{ route('menu.edit',$menuData->id) }}" type="submit">Edit Menu</a>
                                </div>
                            {{-- </form> --}}
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
                            <script>
                                const createSlug = () => {
                                    const name = $("#name").val();
                                    const slug = name.replace(/\s+/g, '-');
                                    $("#slug").val(slug.toLowerCase());
                                }
                            </script>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!-- this overlay is activated only when mobile menu is triggered -->
@endsection
