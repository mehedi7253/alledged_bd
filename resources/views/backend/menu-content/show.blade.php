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
                            {{-- <form class="needs-validation" novalidate method="POST" action="{{ route('menu-content.update',$menuContent->id) }}" enctype="multipart/form-data"> --}}
                                {{-- @csrf --}}
                                <div class="panel-content">
                                    <div class="form-row">
                                        <div class="col-md-6 mb-6">
                                            <label class="form-label" for="menu_id">Menu </label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fal fa-cube fs-xl"></i></span>
                                                </div>
                                                <select name="menu_id" id="menu_id" class="form-control" disabled>
                                                    <option value="">Choose one</option>
                                                    @foreach ($childMenus as $childMenu)
                                                        <option {{ $menuContent->menu_id == $childMenu->id ? 'selected' : '' }} value="{{ $childMenu->id }}">{{ $childMenu->name }}</option>
                                                    @endforeach
                                                </select>
                                                <div class="valid-tooltip">
                                                    Looks good!
                                                </div>
                                                <div class="invalid-tooltip">
                                                    Please choose a menu.
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-12 mb-12">
                                            <label class="form-label" for="description">Title </label>
                                            <div class="input-group">
                                                <textarea name="description" id="description" class="form-control">{{ $menuContent->title }}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-12">
                                            <label class="form-label" for="description">Description </label>
                                            <div class="input-group">
                                                <textarea name="description" id="description" class="form-control">{{ $menuContent->description }}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-12">
                                            <label class="form-label" for="description">Footer Text </label>
                                            <div class="input-group">
                                                <textarea name="description" id="description" class="form-control">{{ $menuContent->footer }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel-content border-faded border-left-0 border-right-0 border-bottom-0 d-flex flex-row align-items-center">
                                    <a href="{{ route('menu-content.index') }}" class="btn btn-dark">Menu Content List</a>
                                    <a class="btn btn-primary ml-auto" href="{{ route('menu-content.edit',$menuContent->id) }}">Edit Menu Content</a>
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!-- this overlay is activated only when mobile menu is triggered -->
@endsection
