<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <?php $company = DB::table('company_settings')->first();?>
        <title>
            {{ $title }} | {{ $company->name }}
        </title>
        <meta name="description" content="Login">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, user-scalable=no, minimal-ui">
        <!-- Call App Mode on ios devices -->
        <meta name="apple-mobile-web-app-capable" content="yes" />
        <!-- Remove Tap Highlight on Windows Phone IE -->
        <meta name="msapplication-tap-highlight" content="no">
        <?php $logo = json_decode($company->logo); ?>
        <!-- base css -->
        <link rel="stylesheet" media="screen, print" href="{{ asset('assets/backend')}}/css/vendors.bundle.css">
        <link rel="stylesheet" media="screen, print" href="{{ asset('assets/backend')}}/css/app.bundle.css">
        <!-- Place favicon.ico in the root directory -->
        <link rel="apple-touch-icon" sizes="180x180" href="{{ asset($logo->large) }}">
        <link rel="icon" type="image/webp" sizes="32x32" href="{{ asset($logo->large) }}">
        <link rel="mask-icon" href="{{ asset($logo->large) }}" color="#5bbad5">
        <!-- Optional: page related CSS-->
        <link rel="stylesheet" media="screen, print" href="{{ asset('assets/backend')}}/css/page-login.css">
    </head>
    <body>
        <div class="blankpage-form-field">
            <div class="page-logo m-0 w-100 align-items-center justify-content-center rounded border-bottom-left-radius-0 border-bottom-right-radius-0 px-4">
                <a href="javascript:void(0)" class="page-logo-link press-scale-down d-flex align-items-center">
                    <img src="{{ asset($logo->large)}}" style="width: 100px; height: 70px;" alt="SmartAdmin WebApp" aria-roledescription="logo">
                    <span class="page-logo-text mr-1">{{ $title }}</span>
                    <i class="fal fa-angle-down d-inline-block ml-1 fs-lg color-primary-300"></i>
                </a>
            </div>
            <div class="card p-4 border-top-left-radius-0 border-top-right-radius-0">
                <form action="{{ route('password.email') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label class="form-label" for="email">Email Address</label>
                        <input type="email" required id="email" class="form-control" value="{{ old('email') }}" placeholder="email" name="email">
                        <span class="help-block">
                            Your email
                        </span>
                    </div>
                    <button type="submit" class="btn btn-primary float-right">Submit</button>
                </form>
            </div>
        </div>
        @include('sweetalert::alert')
        <video poster="{{ asset('assets/backend')}}/img/backgrounds/news.jpg" id="bgvid" playsinline autoplay muted loop>
            <!--<source src="{{ asset('assets/backend')}}/media/video/dd.mp4" type="video/mp4">-->
            <!--<source src="{{ asset('assets/backend')}}/media/video/dd.mp4" type="video/mp4">-->
        </video>
        <script src="{{ asset('assets/backend')}}/js/vendors.bundle.js"></script>
        <script src="{{ asset('assets/backend')}}/js/app.bundle.js"></script>
        <!-- Page related scripts -->
    </body>
</html>
