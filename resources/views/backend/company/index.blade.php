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
                            @if ($company)
                            <form class="needs-validation" novalidate method="POST" action="{{ route('company.update',$company->id) }}" enctype="multipart/form-data">
                                <div class="panel-content">
                                    <div class="form-row">
                                        <div class="col-md-6 mb-6">
                                            @csrf
                                            @method('PATCH')
                                            <label class="form-label" for="name">Company name <span class="text-danger">*</span> </label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fal fa-building fs-xl"></i></span>
                                                </div>
                                                <input type="text" class="form-control" id="name" name="name" value="{{ $company->name }}" placeholder="Company name" required>
                                                <div class="valid-tooltip">
                                                    Looks good!
                                                </div>
                                                <div class="invalid-tooltip">
                                                    Please choose a name.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-6">
                                            <label class="form-label" for="phone">Phone <span class="text-danger">*</span></label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fal fa-phone fs-xl"></i></span>
                                                </div>
                                                <input type="text" class="form-control" id="phone" placeholder="Phone number" name="phone" value="{{ $company->phone }}" required>
                                                <div class="valid-tooltip">
                                                    Looks good!
                                                </div>
                                                <div class="invalid-tooltip">
                                                    Please choose a phone number.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row form-group">
                                        <div class="col-md-6 mb-6">
                                            <label class="form-label" for="email">Email <span class="text-danger">*</span></label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="email">@</span>
                                                </div>
                                                <input type="text" class="form-control" id="email" placeholder="Email" value="{{ $company->email }}" name="email" aria-describedby="inputGroupPrepend2" required>
                                                <div class="invalid-tooltip">
                                                    Please choose a email.
                                                </div>
                                                <div class="valid-tooltip">
                                                    Looks good!
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-6">
                                            <label class="form-label" for="address">Address <span class="text-danger">*</span></label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fal fa-map-marker fs-xl"></i></span>
                                                </div>
                                                <textarea required name="address" class="form-control" id="address">{{ $company->address }}</textarea>
                                                <div class="invalid-tooltip">
                                                    Please provide a address.
                                                </div>
                                                <div class="valid-tooltip">
                                                    Looks good!
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-6">
                                            <label class="form-label" for="logo">Logo <span class="text-danger">*</span></label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fal fa-image fs-xl"></i></span>
                                                </div>
                                                <input type="file" class="form-control" id="uploadImage" placeholder="Select image" accept="image/png,image/jpg,image/jpeg" name="logo">
                                                <div class="invalid-tooltip">
                                                    Please provide a logo.
                                                </div>
                                                <div class="valid-tooltip">
                                                    Looks good!
                                                </div>
                                            </div>
                                            <br>
                                            <img id="upload_image"
                                            src="{{asset($company->logo) }}"
                                            width="40%"
                                            height="100px" alt="your image"/>
                                        </div>
                                        <div class="col-md-6 mb-6">
                                            <label class="form-label" for="favicon">Favicon <span class="text-danger">*</span></label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fal fa-image fs-xl"></i></span>
                                                </div>
                                                <input type="file" class="form-control" id="profileImage" placeholder="Select image" accept="image/png,image/jpg,image/jpeg" name="favicon">
                                                <div class="invalid-tooltip">
                                                    Please provide a favicon.
                                                </div>
                                                <div class="valid-tooltip">
                                                    Looks good!
                                                </div>
                                            </div>
                                            <br>
                                            @if ($company->favicon)
                                            <img id="profile_image"
                                            src="{{asset($company->favicon) }}"
                                            width="40%"
                                            height="100px" alt="your image"/>
                                            @else
                                            <img id="profile_image"
                                            class="d-none"
                                            width="40%"
                                            height="100px" alt="your image"/>
                                            @endif
                                        </div>
                                        <div class="col-md-6 mb-6">
                                            <label class="form-label" for="about_company">About Company </label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fal fa-home fs-xl"></i></span>
                                                </div>
                                                <textarea name="about_company" id="about_company" class="form-control">{{ $company->about_company }}</textarea>
                                                <div class="valid-tooltip">
                                                    Looks good!
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel-content border-faded border-left-0 border-right-0 border-bottom-0 d-flex flex-row align-items-center">
                                    <button class="btn btn-primary ml-auto" type="submit">Update Information</button>
                                </div>
                            </form>
                            @else
                            <form class="needs-validation" novalidate method="POST" action="{{ route('company.store') }}" enctype="multipart/form-data">
                                <div class="panel-content">
                                    <div class="form-row">
                                        <div class="col-md-6 mb-6">
                                            @csrf
                                            <label class="form-label" for="name">Company name <span class="text-danger">*</span> </label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fal fa-building fs-xl"></i></span>
                                                </div>
                                                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" placeholder="Company name" required>
                                                <div class="valid-tooltip">
                                                    Looks good!
                                                </div>
                                                <div class="invalid-tooltip">
                                                    Please choose a name.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-6">
                                            <label class="form-label" for="phone">Phone <span class="text-danger">*</span></label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fal fa-phone fs-xl"></i></span>
                                                </div>
                                                <input type="text" class="form-control" id="phone" placeholder="Phone number" name="phone" value="{{ old('phone') }}" required>
                                                <div class="valid-tooltip">
                                                    Looks good!
                                                </div>
                                                <div class="invalid-tooltip">
                                                    Please choose a phone number.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row form-group">
                                        <div class="col-md-6 mb-6">
                                            <label class="form-label" for="email">Email <span class="text-danger">*</span></label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="email">@</span>
                                                </div>
                                                <input type="text" class="form-control" id="email" placeholder="Email" value="{{ old('email') }}" name="email" aria-describedby="inputGroupPrepend2" required>
                                                <div class="invalid-tooltip">
                                                    Please choose a email.
                                                </div>
                                                <div class="valid-tooltip">
                                                    Looks good!
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-6">
                                            <label class="form-label" for="address">Address <span class="text-danger">*</span></label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fal fa-map-marker fs-xl"></i></span>
                                                </div>
                                                <textarea required name="address" class="form-control" id="address"></textarea>
                                                <div class="invalid-tooltip">
                                                    Please provide a address.
                                                </div>
                                                <div class="valid-tooltip">
                                                    Looks good!
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-6">
                                            <label class="form-label" for="logo">Logo <span class="text-danger">*</span></label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fal fa-image fs-xl"></i></span>
                                                </div>
                                                <input required type="file" class="form-control" id="uploadImage" placeholder="Select image" accept="image/png,image/jpg,image/jpeg" name="logo">
                                                <div class="invalid-tooltip">
                                                    Please provide a logo.
                                                </div>
                                                <div class="valid-tooltip">
                                                    Looks good!
                                                </div>
                                            </div>
                                            <br>
                                            <img id="upload_image"
                                            src=""
                                            class="d-none"
                                            width="40%"
                                            height="100px" alt="your image"/>
                                        </div>
                                        <div class="col-md-6 mb-6">
                                            <label class="form-label" for="favicon">Favicon <span class="text-danger">*</span></label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fal fa-image fs-xl"></i></span>
                                                </div>
                                                <input required type="file" class="form-control" id="profileImage" placeholder="Select image" accept="image/png,image/jpg,image/jpeg" name="favicon">
                                                <div class="invalid-tooltip">
                                                    Please provide a favicon.
                                                </div>
                                                <div class="valid-tooltip">
                                                    Looks good!
                                                </div>
                                            </div>
                                            <br>
                                            <img id="profile_image"
                                            src=""
                                            class="d-none"
                                            width="40%"
                                            height="100px" alt="your image"/>
                                        </div>
                                        <div class="col-md-6 mb-6">
                                            <label class="form-label" for="about_company">About Company </label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fal fa-home fs-xl"></i></span>
                                                </div>
                                                <textarea name="about_company" id="about_company" class="form-control">{{ old('about_compnay') }}</textarea>
                                                <div class="valid-tooltip">
                                                    Looks good!
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel-content border-faded border-left-0 border-right-0 border-bottom-0 d-flex flex-row align-items-center">
                                    <button class="btn btn-primary ml-auto" type="submit">Save Information</button>
                                </div>
                            </form>
                            @endif
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
