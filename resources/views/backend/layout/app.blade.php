<!DOCTYPE html>
<html lang="en">
    <head>
        <?php $company = DB::table('company_settings')->first();?>
        <meta charset="utf-8">
        <title>
            {{$company->name}} | {{ $menu }} | @yield('title') | {{ Auth::user()->name }}
        </title>
        <meta name="description" content="Marketing Dashboard">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, user-scalable=no, minimal-ui">
        <!-- Call App Mode on ios devices -->
        <meta name="apple-mobile-web-app-capable" content="yes" />
        <!-- Remove Tap Highlight on Windows Phone IE -->
        <meta name="msapplication-tap-highlight" content="no">
        <!-- base css -->
        <link rel="stylesheet" media="screen, print" href="{{ asset('assets/backend') }}/css/vendors.bundle.css">
        <link rel="stylesheet" media="screen, print" href="{{ asset('assets/backend') }}/css/app.bundle.css">
        <!-- Place favicon.ico in the root directory -->
        <link rel="apple-touch-icon" sizes="180x180" href="{{ asset($company->logo) }}">
        <link rel="icon" type="image/webp" sizes="32x32" href="{{ asset($company->logo) }}">
        <link rel="mask-icon" href="{{ asset($company->logo) }}" color="#5bbad5">
        <link rel="stylesheet" media="screen, print" href="{{ asset('assets/backend') }}/css/datagrid/datatables/datatables.bundle.css">
        <link rel="stylesheet" media="screen, print" href="{{ asset('assets/backend') }}/css/notifications/sweetalert2/sweetalert2.bundle.css">
        <link rel="stylesheet" media="screen, print" href="{{ asset('assets/backend') }}/css/formplugins/select2/select2.bundle.css">
        <link rel="stylesheet" media="screen, print" href="{{ asset('assets/backend') }}/css/fa-brands.css">
        <link rel="stylesheet" media="screen, print" href="{{ asset('assets/backend') }}/css/fa-solid.css">
        <link rel="stylesheet" media="screen, print" href="{{ asset('assets/backend') }}/css/formplugins/summernote/summernote.css">
        <link rel="stylesheet" media="screen, print" href="{{ asset('assets/backend') }}/css/statistics/chartjs/chartjs.css">
    </head>
    <body class="mod-bg-1 ">
        <!-- DOC: script to save and load page settings -->
        <script>
            /**
             *	This script should be placed right after the body tag for fast execution
             *	Note: the script is written in pure javascript and does not depend on thirdparty library
             **/
            'use strict';

            var classHolder = document.getElementsByTagName("BODY")[0],
                /**
                 * Load from localstorage
                 **/
                themeSettings = (localStorage.getItem('themeSettings')) ? JSON.parse(localStorage.getItem('themeSettings')) :
                {},
                themeURL = themeSettings.themeURL || '',
                themeOptions = themeSettings.themeOptions || '';
            /**
             * Load theme options
             **/
            if (themeSettings.themeOptions)
            {
                classHolder.className = themeSettings.themeOptions;
                console.log("%c✔ Theme settings loaded", "color: #148f32");
            }
            else
            {
                console.log("Heads up! Theme settings is empty or does not exist, loading default settings...");
            }
            if (themeSettings.themeURL && !document.getElementById('mytheme'))
            {
                var cssfile = document.createElement('link');
                cssfile.id = 'mytheme';
                cssfile.rel = 'stylesheet';
                cssfile.href = themeURL;
                document.getElementsByTagName('head')[0].appendChild(cssfile);
            }
            /**
             * Save to localstorage
             **/
            var saveSettings = function()
            {
                themeSettings.themeOptions = String(classHolder.className).split(/[^\w-]+/).filter(function(item)
                {
                    return /^(nav|header|mod|display)-/i.test(item);
                }).join(' ');
                if (document.getElementById('mytheme'))
                {
                    themeSettings.themeURL = document.getElementById('mytheme').getAttribute("href");
                };
                localStorage.setItem('themeSettings', JSON.stringify(themeSettings));
            }
            /**
             * Reset settings
             **/
            var resetSettings = function()
            {
                localStorage.setItem("themeSettings", "");
            }

        </script>
        <!-- BEGIN Page Wrapper -->
        <div class="page-wrapper">
            <div class="page-inner">
                <!-- BEGIN Left Aside -->
                <aside class="page-sidebar">
                    <div class="page-logo">
                        <a href="{{ url('dashboard') }}" class="page-logo-link press-scale-down d-flex align-items-center position-relative">
                            <img src="{{ asset($company->logo) }}" alt="{{ $company->name }}" title="{{ $company->name }}" aria-roledescription="logo">
                            <span class="page-logo-text mr-1">Dashboard</span>
                        </a>
                    </div>
                    <!-- BEGIN PRIMARY NAVIGATION -->
                    <nav id="js-primary-nav" class="primary-nav" role="navigation">
                        <div class="nav-filter">
                            <div class="position-relative">
                                <input type="text" id="nav_filter_input" placeholder="Filter menu" class="form-control" tabindex="0">
                                <a href="#" onclick="return false;" class="btn-primary btn-search-close js-waves-off" data-action="toggle" data-class="list-filter-active" data-target=".page-sidebar">
                                    <i class="fal fa-chevron-up"></i>
                                </a>
                            </div>
                        </div>
                        <div class="info-card">
                            <img src="{{ asset('assets/backend') }}/img/demo/avatars/avatar-m.png" class="profile-image rounded-circle" alt="{{ Auth::user()->name }}">
                            <div class="info-card-text">
                                <a href="#" class="d-flex align-items-center text-white">
                                    <span class="text-truncate text-truncate-sm d-inline-block">
                                        {{ Auth::user()->name }}
                                    </span>
                                </a>
                                <span class="d-inline-block text-truncate text-truncate-sm">{{ Auth::user()->email }}</span>
                            </div>
                            <img src="{{ asset('assets/backend') }}/img/card-backgrounds/cover-1-lg.png" class="cover" alt="cover">
                            <a href="#" onclick="return false;" class="pull-trigger-btn" data-action="toggle" data-class="list-filter-active" data-target=".page-sidebar" data-focus="nav_filter_input">
                                <i class="fal fa-angle-down"></i>
                            </a>
                        </div>
                        <ul id="js-nav-menu" class="nav-menu">
                            <li <?php if($menu == 'Dashboard'){ ?> class="active" <?php } ?>>
                                <a href="{{ url('/dashboard') }}" title="Dashboard" data-filter-tags="dashboard">
                                    <i class="fal fa-tachometer"></i>
                                    <span class="nav-link-text" data-i18n="nav.dashboard">Dashboard</span>
                                </a>
                            </li>
                            <li <?php if($menu == 'Admin Settings'){ ?> class="active open" <?php } ?>>
                                <a href="#" title="Admin Settings" data-filter-tags="admin settings">
                                    <i class="fal fa-cog"></i>
                                    <span class="nav-link-text" data-i18n="nav.admin_settings">Admin Settings</span>
                                </a>
                                <ul>
                                    @can('user-list')
                                    <li <?php if(Request::segment(1) == 'user'){ ?> class="active" <?php } ?>>
                                        <a href="{{ route('user.index') }}" title="Users" data-filter-tags="theme settings how it works">
                                            <span class="nav-link-text" data-i18n="nav.theme_settings_how_it_works">Users</span>
                                        </a>
                                    </li>
                                    @endcan
                                    @can('role-list')
                                    <li <?php if(Request::segment(1) == 'role'){ ?> class="active" <?php } ?>>
                                        <a href="{{ route('role.index') }}" title="Roles" data-filter-tags="theme settings layout options">
                                            <span class="nav-link-text" data-i18n="nav.theme_settings_layout_options">Roles</span>
                                        </a>
                                    </li>
                                    @endcan
                                    @can('permission-list')
                                    <li <?php if(Request::segment(1) == 'permission'){ ?> class="active" <?php } ?>>
                                        <a href="{{ route('permission.index') }}" title="Permissions" data-filter-tags="theme settings skin options">
                                            <span class="nav-link-text" data-i18n="nav.theme_settings_skin_options">Permissions</span>
                                        </a>
                                    </li>
                                    @endcan
                                </ul>
                            </li>
                            <li <?php if($menu == 'Company Settings'){ ?> class="active open" <?php } ?>>
                                <a href="#" title="Company Settings" data-filter-tags="ui components">
                                    <i class="fal fa-building"></i>
                                    <span class="nav-link-text" data-i18n="nav.ui_components">Company Settings</span>
                                </a>
                                <ul>
                                    <li <?php if(Request::segment(1) == 'company'){ ?> class="active" <?php } ?>>
                                        <a href="{{ route('company.index') }}" title="Company Information" data-filter-tags="ui components alerts">
                                            <span class="nav-link-text" data-i18n="nav.ui_components_alerts">Company Information</span>
                                        </a>
                                    </li>
                                    <li <?php if(Request::segment(1) == 'google-map'){ ?> class="active" <?php } ?>>
                                        <a href="{{ route('google-map.index') }}" title="Google Map" data-filter-tags="ui components alerts">
                                            <span class="nav-link-text" data-i18n="nav.ui_components_alerts">Google Map</span>
                                        </a>
                                    </li>
                                    <li <?php if(Request::segment(1) == 'contact-us'){ ?> class="active" <?php } ?>>
                                        <a href="{{ route('contact-us.index') }}" title="Contact Us" data-filter-tags="ui components alerts">
                                            <span class="nav-link-text" data-i18n="nav.ui_components_alerts">Contact Us</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li <?php if($menu == 'Menu Settings'){ ?> class="active open" <?php } ?>>
                                <a href="#" title="Menu Settings" data-filter-tags="menu settings">
                                    <i class="fal fa-caret-square-down"></i>
                                    <span class="nav-link-text" data-i18n="nav.menu_settings">Menu Settings</span>
                                </a>
                                <ul>
                                    <li <?php if(Request::segment(1) == 'menu'){ ?> class="active" <?php } ?>>
                                        <a href="{{ route('menu.index') }}" title="Menu List" data-filter-tags="menu settings menu list">
                                            <span class="nav-link-text" data-i18n="nav.menu_settings">Menu List</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li <?php if($menu == 'Sliders'){ ?> class="active open" <?php } ?>>
                                <a href="#" title="Sliders" data-filter-tags="ui sliders">
                                    <i class="fal fa-sliders-v-square"></i>
                                    <span class="nav-link-text" data-i18n="nav.ui_sliders">Sliders</span>
                                </a>
                                <ul>
                                    <li <?php if(Request::segment(1) == 'slider'){ ?> class="active" <?php } ?>>
                                        <a href="{{ route('slider.index') }}" title="Slider List" data-filter-tags="ui sliders alerts">
                                            <span class="nav-link-text" data-i18n="nav.ui_sliders_alerts">Slider List</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li <?php if($menu == 'Product'){ ?> class="active open" <?php } ?>>
                                <a href="#" title="Product" data-filter-tags="ui product">
                                    <i class="fal fa-newspaper"></i>
                                    <span class="nav-link-text" data-i18n="nav.ui_product">Product</span>
                                </a>
                                <ul>
                                    <li <?php if(Request::segment(1) == 'blog-category'){ ?> class="active" <?php } ?>>
                                        <a href="{{ route('blog-category.index') }}" title="Product Category" data-filter-tags="ui blog alerts">
                                            <span class="nav-link-text" data-i18n="nav.ui_blog_alerts">Product Category</span>
                                        </a>
                                    </li>
                                    <li <?php if(Request::segment(1) == 'social-link'){ ?> class="active" <?php } ?>>
                                        <a href="{{ route('social-link.index') }}" title="Product Brand" data-filter-tags="ui blog alerts">
                                            <span class="nav-link-text" data-i18n="nav.ui_blog_alerts">Product Brand</span>
                                        </a>
                                    </li>
                                    <li <?php if(Request::segment(1) == 'blog'){ ?> class="active" <?php } ?>>
                                        <a href="{{ route('blog.index') }}" title="Product List" data-filter-tags="ui blog alerts">
                                            <span class="nav-link-text" data-i18n="nav.ui_blog_alerts">Product List</span>
                                        </a>
                                    </li>



                                </ul>
                            </li>
                            <li <?php if($menu == 'Frontend Settings'){ ?> class="active open" <?php } ?>>
                                <a href="#" title="Frontend Settings" data-filter-tags="ui blog">
                                    <i class="fal fa-window"></i>
                                    <span class="nav-link-text" data-i18n="nav.ui_blog">Home Page Settings</span>
                                </a>
                                <ul>
                                    <li <?php if(Request::segment(1) == 'section'){ ?> class="active" <?php } ?>>
                                        <a href="{{ route('section.index') }}" title="Section" data-filter-tags="ui blog alerts">
                                            <span class="nav-link-text" data-i18n="nav.ui_blog_alerts">Section</span>
                                        </a>
                                    </li>
                                    <li <?php if(Request::segment(1) == 'we-best'){ ?> class="active" <?php } ?>>
                                        <a href="{{ route('we-best.index') }}" title="Our Products" data-filter-tags="ui blog alerts">
                                            <span class="nav-link-text" data-i18n="nav.ui_blog_alerts">Our Products</span>
                                        </a>
                                    </li>
                                    <li <?php if(Request::segment(1) == 'services'){ ?> class="active" <?php } ?>>
                                        <a href="{{ route('services.index') }}" title="Services" data-filter-tags="ui blog alerts">
                                            <span class="nav-link-text" data-i18n="nav.ui_blog_alerts">Services</span>
                                        </a>
                                    </li>
                                    <li <?php if(Request::segment(1) == 'it-services'){ ?> class="active" <?php } ?>>
                                        <a href="{{ route('it-services.index') }}" title="Successfully Story" data-filter-tags="ui blog alerts">
                                            <span class="nav-link-text" data-i18n="nav.ui_blog_alerts">Successfully Story</span>
                                        </a>
                                    </li>

                                    <li <?php if(Request::segment(1) == 'client-comment'){ ?> class="active" <?php } ?>>
                                        <a href="{{ route('client-comment.index') }}" title="Client Comment" data-filter-tags="ui blog alerts">
                                            <span class="nav-link-text" data-i18n="nav.ui_blog_alerts">Client Comment</span>
                                        </a>
                                    </li>
                                    <li <?php if(Request::segment(1) == 'projects'){ ?> class="active" <?php } ?>>
                                        <a href="{{ route('projects.index') }}" title="Brands" data-filter-tags="ui blog alerts">
                                            <span class="nav-link-text" data-i18n="nav.ui_blog_alerts">Brands</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li <?php if($menu == 'About Us'){ ?> class="active open" <?php } ?>>
                                <a href="#" title="About Us" data-filter-tags="ui blog">
                                    <i class="fal fa-hourglass-end"></i>
                                    <span class="nav-link-text" data-i18n="nav.ui_blog">About Us</span>
                                </a>
                                <ul>
                                    <li <?php if(Request::segment(1) == 'about-us'){ ?> class="active" <?php } ?>>
                                        <a href="{{ route('about-us.index') }}" title="Company Overview" data-filter-tags="ui blog alerts">
                                            <span class="nav-link-text" data-i18n="nav.ui_blog_alerts">Company Overview</span>
                                        </a>
                                    </li>
                                    <li <?php if(Request::segment(1) == 'greeting'){ ?> class="active" <?php } ?>>
                                        <a href="{{ route('greeting.index') }}" title="Greeting" data-filter-tags="ui blog alerts">
                                            <span class="nav-link-text" data-i18n="nav.ui_blog_alerts">Greeting</span>
                                        </a>
                                    </li>
                                    <li <?php if(Request::segment(1) == 'strengths'){ ?> class="active" <?php } ?>>
                                        <a href="{{ route('strengths.index') }}" title="Management" data-filter-tags="ui blog alerts">
                                            <span class="nav-link-text" data-i18n="nav.ui_blog_alerts">Management</span>
                                        </a>
                                    </li>
                                    <li <?php if(Request::segment(1) == 'gallery'){ ?> class="active" <?php } ?>>
                                        <a href="{{ route('gallery.index') }}" title="Gallery Image" data-filter-tags="ui blog">
                                            <span class="nav-link-text" data-i18n="nav.ui_blog">Gallery Image</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li <?php if(Request::segment(1) == 'web-design'){ ?> class="active" <?php } ?>>
                                <a href="{{ route('web-design.index') }}" title="Customer" data-filter-tags="ui blog alerts">
                                    <i class="fal fa-user"></i>
                                    <span class="nav-link-text" data-i18n="nav.ui_blog_alerts">Customer</span>
                                </a>
                            </li>

                            <li <?php if(Request::segment(1) == 'pf'){ ?> class="active" <?php } ?>>
                                <a href="{{ route('pf.index') }}" title="Portfolio" data-filter-tags="ui blog alerts">
                                    <i class="fal fa-user"></i>
                                    <span class="nav-link-text" data-i18n="nav.ui_blog_alerts">Portfolio</span>
                                </a>
                            </li>

                            <li <?php if(Request::segment(1) == 'catalog'){ ?> class="active" <?php } ?>>
                                <a href="{{ route('catalog.index') }}" title="Catalog" data-filter-tags="ui blog alerts">
                                    <i class="fal fa-user"></i>
                                    <span class="nav-link-text" data-i18n="nav.ui_blog_alerts">Catalog</span>
                                </a>
                            </li>

                            <li <?php if(Request::segment(1) == 'youtube'){ ?> class="active" <?php } ?>>
                                <a href="{{ route('youtube.index') }}" title="Youtube" data-filter-tags="ui blog alerts">
                                    <i class="fal fa-user"></i>
                                    <span class="nav-link-text" data-i18n="nav.ui_blog_alerts">Youtube</span>
                                </a>
                            </li>

                            <li <?php if(Request::segment(1) == 'msw'){ ?> class="active" <?php } ?>>
                                <a href="{{ route('msw.index') }}" title="Youtube" data-filter-tags="ui blog alerts">
                                    <i class="fal fa-user"></i>
                                    <span class="nav-link-text" data-i18n="nav.ui_blog_alerts">Moving Seftly</span>
                                </a>
                            </li>

                            <li <?php if(Request::segment(1) == 'subscribe'){ ?> class="active" <?php } ?>>
                                <a href="{{ route('subscribe.index') }}" title="Achievement" data-filter-tags="ui blog alerts">
                                    <i class="fal fa-cube"></i>
                                    <span class="nav-link-text" data-i18n="nav.ui_blog_alerts">Achievement</span>
                                </a>
                            </li>
                            <li <?php if(Request::segment(1) == 'office-hour'){ ?> class="active" <?php } ?>>
                                <a href="{{ route('office-hour.index') }}" title="Career" data-filter-tags="ui blog alerts">
                                    <i class="fal fa-cube"></i>
                                    <span class="nav-link-text" data-i18n="nav.ui_blog_alerts">Career</span>
                                </a>
                            </li>
                            <li <?php if($menu == 'Business'){ ?> class="active open" <?php } ?>>
                                <a href="#" title="Business" data-filter-tags="ui blog">
                                    <i class="fal fa-hourglass-end"></i>
                                    <span class="nav-link-text" data-i18n="nav.ui_blog">Business</span>
                                </a>
                                <ul>
                                    <li <?php if(Request::segment(1) == 'menu-content'){ ?> class="active" <?php } ?>>
                                        <a href="{{ route('menu-content.index') }}" title="Business Content" data-filter-tags="ui blog alerts">
                                            <span class="nav-link-text" data-i18n="nav.ui_blog_alerts">Business Content</span>
                                        </a>
                                    </li>
                                    <li <?php if(Request::segment(1) == 'experience'){ ?> class="active" <?php } ?>>
                                        <a href="{{ route('experience.index') }}" title="Business Content Image" data-filter-tags="ui blog alerts">
                                            <span class="nav-link-text" data-i18n="nav.ui_blog_alerts">Business Content Image</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li <?php if($menu == 'Services'){ ?> class="active open" <?php } ?>>
                                <a href="#" title="Services" data-filter-tags="ui blog">
                                    <i class="fal fa-hourglass-end"></i>
                                    <span class="nav-link-text" data-i18n="nav.ui_blog">Services</span>
                                </a>
                                <ul>
                                    <li <?php if(Request::segment(1) == 'slider-content'){ ?> class="active" <?php } ?>>
                                        <a href="{{ route('slider-content.index') }}" title="Services Content" data-filter-tags="ui blog alerts">
                                            <span class="nav-link-text" data-i18n="nav.ui_blog_alerts">Services Content</span>
                                        </a>
                                    </li>
                                    <li <?php if(Request::segment(1) == 'md-message'){ ?> class="active" <?php } ?>>
                                        <a href="{{ route('md-message.index') }}" title="Services Content Image" data-filter-tags="ui blog alerts">
                                            <span class="nav-link-text" data-i18n="nav.ui_blog_alerts">Services Content Image</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li <?php if($menu == 'Footer'){ ?> class="active open" <?php } ?>>
                                <a href="#" title="Footer" data-filter-tags="ui blog">
                                    <i class="fal fa-hourglass-end"></i>
                                    <span class="nav-link-text" data-i18n="nav.ui_blog">Footer</span>
                                </a>
                                <ul>
                                    <li <?php if(Request::segment(1) == 'footer-link'){ ?> class="active" <?php } ?>>
                                        <a href="{{ route('footer-link.index') }}" title="Footer Link" data-filter-tags="ui blog alerts">
                                            <span class="nav-link-text" data-i18n="nav.ui_blog_alerts">Footer Link</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <li <?php if(Request::segment(1) == 'seo'){ ?> class="active" <?php } ?>>
                                <a href="{{ route('seo.index') }}" title="SEO Settings" data-filter-tags="ui blog">
                                    <i class="fal fa-search"></i>
                                    <span class="nav-link-text" data-i18n="nav.ui_blog">SEO Settings</span>
                                </a>
                            </li>
                            <li <?php if(Request::segment(1) == 'message'){ ?> class="active" <?php } ?>>
                                <a href="{{ route('message.index') }}" title="Messages" data-filter-tags="ui blog">
                                    <i class="fal fa-envelope-open"></i>
                                    <span class="nav-link-text" data-i18n="nav.ui_blog">Messages</span>
                                </a>
                            </li>
                        </ul>
                        <div class="filter-message js-filter-message bg-success-600"></div>
                    </nav>
                    <!-- END PRIMARY NAVIGATION -->
                    <!-- NAV FOOTER -->
                    {{-- <div class="nav-footer shadow-top">
                        <a href="#" onclick="return false;" data-action="toggle" data-class="nav-function-minify" class="hidden-md-down">
                            <i class="ni ni-chevron-right"></i>
                            <i class="ni ni-chevron-right"></i>
                        </a>
                        <ul class="list-table m-auto nav-footer-buttons">
                            <li>
                                <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="Chat logs">
                                    <i class="fal fa-comments"></i>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="Support Chat">
                                    <i class="fal fa-life-ring"></i>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="Make a call">
                                    <i class="fal fa-phone"></i>
                                </a>
                            </li>
                        </ul>
                    </div> <!-- END NAV FOOTER --> --}}
                </aside>
                <!-- END Left Aside -->
                <div class="page-content-wrapper">
                    <!-- BEGIN Page Header -->
                    <header class="page-header" role="banner">
                        <!-- we need this logo when user switches to nav-function-top -->
                        <div class="page-logo">
                            <a href="#" class="page-logo-link press-scale-down d-flex align-items-center position-relative" data-toggle="modal" data-target="#modal-shortcut">
                                <img src="{{ asset('assets/backend') }}/img/logo.png" alt="{{ $company->name }}" aria-roledescription="logo">
                                <span class="page-logo-text mr-1">{{ $company->name }}</span>
                                <span class="position-absolute text-white opacity-50 small pos-top pos-right mr-2 mt-n2"></span>
                                <i class="fal fa-angle-down d-inline-block ml-1 fs-lg color-primary-300"></i>
                            </a>
                        </div>
                        <!-- DOC: nav menu layout change shortcut -->
                        <div class="hidden-md-down dropdown-icon-menu position-relative">
                            <a href="#" class="header-btn btn js-waves-off" data-action="toggle" data-class="nav-function-hidden" title="Hide Navigation">
                                <i class="ni ni-menu"></i>
                            </a>
                            <ul>
                                <li>
                                    <a href="#" class="btn js-waves-off" data-action="toggle" data-class="nav-function-minify" title="Minify Navigation">
                                        <i class="ni ni-minify-nav"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="btn js-waves-off" data-action="toggle" data-class="nav-function-fixed" title="Lock Navigation">
                                        <i class="ni ni-lock-nav"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <!-- DOC: mobile button appears during mobile width -->
                        <div class="hidden-lg-up">
                            <a href="#" class="header-btn btn press-scale-down" data-action="toggle" data-class="mobile-nav-on">
                                <i class="ni ni-menu"></i>
                            </a>
                        </div>
                        <div class="search">

                        </div>
                        <div class="ml-auto d-flex">

                            <!-- app settings -->
                            <div class="hidden-md-down">
                                <a href="#" class="header-icon" data-toggle="modal" data-target=".js-modal-settings">
                                    <i class="fal fa-cog"></i>
                                </a>
                            </div>
                            <div>
                                <?php $allMessages = DB::table('messages')->where('status','unread')->get(); ?>
                                <a href="#" class="header-icon" data-toggle="dropdown" title="You got {{ count($allMessages) }} messages">
                                    <i class="fal fa-envelope"></i>
                                    <span class="badge badge-icon">{{ count($allMessages) }}</span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-animated dropdown-xl">
                                    <div class="dropdown-header bg-trans-gradient d-flex justify-content-center align-items-center rounded-top mb-2">
                                        <h4 class="m-0 text-center color-white">
                                            {{ count($allMessages) }} New
                                            <small class="mb-0 opacity-80">User Messages</small>
                                        </h4>
                                    </div>
                                    <?php $newMessages = DB::table('messages')->orderByDesc('messages.id')->where('status','unread')->paginate(8); ?>
                                    <div class="tab-content tab-notification">
                                        <div class="tab-pane active p-3 text-center">
                                            <ul class="notification">
                                                @foreach ($newMessages as $newMessage)
                                                <li class="unread">
                                                    <a href="{{ route('message.show',$newMessage->id)}}" class="d-flex align-items-center">
                                                        <span class="d-flex flex-column flex-1 ml-1">
                                                            <span class="name">{{ $newMessage->full_name }}</span>
                                                            <span class="msg-a fs-sm">{{ $newMessage->email_address }}</span>
                                                            <span class="msg-b fs-xs">{{ $newMessage->subject }}</span>
                                                            {{-- <span class="fs-nano text-muted mt-1">56 seconds ago</span> --}}
                                                        </span>
                                                    </a>
                                                </li>
                                                @endforeach
                                            </ul>
                                            {{ $newMessages->links('pagination::bootstrap-4') }}
                                        </div>
                                    </div>
                                    <div class="py-2 px-3 bg-faded d-block rounded-bottom text-right border-faded border-bottom-0 border-right-0 border-left-0">
                                        <a href="#" class="fs-xs fw-500 ml-auto">view all notifications</a>
                                    </div>
                                </div>
                            </div>
                            <!-- app user menu -->
                            <div>
                                <a href="#" data-toggle="dropdown" title="{{ Auth::user()->email }}" class="header-icon d-flex align-items-center justify-content-center ml-2">
                                    <img src="{{ asset('assets/backend') }}/img/demo/avatars/avatar-m.png" class="profile-image rounded-circle" alt="{{ Auth::user()->name }}">
                                    <!-- you can also add username next to the avatar with the codes below:
									<span class="ml-1 mr-1 text-truncate text-truncate-header hidden-xs-down">Me</span>
									<i class="ni ni-chevron-down hidden-xs-down"></i> -->
                                </a>
                                <div class="dropdown-menu dropdown-menu-animated dropdown-lg">
                                    <div class="dropdown-header bg-trans-gradient d-flex flex-row py-4 rounded-top">
                                        <div class="d-flex flex-row align-items-center mt-1 mb-1 color-white">
                                            <span class="mr-2">
                                                <img src="{{ asset('assets/backend') }}/img/demo/avatars/avatar-m.png" class="rounded-circle profile-image" alt="{{ Auth::user()->name }}">
                                            </span>
                                            <div class="info-card-text">
                                                <div class="fs-lg text-truncate text-truncate-lg">{{ Auth::user()->name }}</div>
                                                <span class="text-truncate text-truncate-md opacity-80">{{ Auth::user()->email }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="dropdown-divider m-0"></div>
                                    <a href="{{ route('user.show',Auth::user()->id) }}" class="dropdown-item">
                                        <span data-i18n="drpdwn.print">Profile</span>
                                        <i class="float-right text-muted fw-n">{{ Auth::user()->name }}</i>
                                    </a>
                                    <a href="#" class="dropdown-item" data-toggle="modal" data-target=".js-modal-settings">
                                        <span data-i18n="drpdwn.settings">Settings</span>
                                    </a>
                                    <div class="dropdown-divider m-0"></div>
                                    <a href="#" class="dropdown-item" data-action="app-fullscreen">
                                        <span data-i18n="drpdwn.fullscreen">Fullscreen</span>
                                        <i class="float-right text-muted fw-n">F11</i>
                                    </a>
                                    <a href="#" class="dropdown-item" data-action="app-print">
                                        <span data-i18n="drpdwn.print">Print</span>
                                        <i class="float-right text-muted fw-n">Ctrl + P</i>
                                    </a>
                                    <div class="dropdown-divider m-0"></div>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button class="dropdown-item fw-500 pt-3 pb-3">
                                            <span data-i18n="drpdwn.page-logout">Logout</span>
                                            <span class="float-right fw-n">{{ Auth::user()->email }}</span>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </header>
                    <!-- END Page Header -->
                    <!-- BEGIN Page Content -->
                    <!-- the #js-page-content id is needed for some plugins to initialize -->
                    @yield('mainContent')
                    <!-- this overlay is activated only when mobile menu is triggered -->
                    <div class="page-content-overlay" data-action="toggle" data-class="mobile-nav-on"></div> <!-- END Page Content -->
                    <!-- BEGIN Page Footer -->
                    <footer class="page-footer" role="contentinfo">
                        <div class="d-flex align-items-center flex-1 text-muted">
                            <span class="hidden-md-down fw-700"><?php echo date('Y') ?> © {{$company->name}}&nbsp;</span>
                        </div>
                        <div>
                            <ul class="list-table m-0">
                                <li class="pl-3"><a href="{{ route('dashboard') }}" class="text-secondary fw-700">Dashboard</a></li>
                                {{-- <li class="pl-3"><a href="info_app_docs.html" class="text-secondary fw-700">Documentation</a></li>
                                <li class="pl-3 fs-xl"><a href="https://wrapbootstrap.com/user/MyOrange" class="text-secondary" target="_blank"><i class="fal fa-question-circle" aria-hidden="true"></i></a></li> --}}
                            </ul>
                        </div>
                    </footer>
                    <!-- END Page Footer -->
                    <!-- BEGIN Shortcuts -->
                    <div class="modal fade modal-backdrop-transparent" id="modal-shortcut" tabindex="-1" role="dialog" aria-labelledby="modal-shortcut" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-top modal-transparent" role="document">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <ul class="app-list w-auto h-auto p-0 text-left">
                                        <li>
                                            <a href="intel_introduction.html" class="app-list-item text-white border-0 m-0">
                                                <div class="icon-stack">
                                                    <i class="base base-7 icon-stack-3x opacity-100 color-primary-500 "></i>
                                                    <i class="base base-7 icon-stack-2x opacity-100 color-primary-300 "></i>
                                                    <i class="fal fa-home icon-stack-1x opacity-100 color-white"></i>
                                                </div>
                                                <span class="app-list-name">
                                                    Home
                                                </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="page_inbox_general.html" class="app-list-item text-white border-0 m-0">
                                                <div class="icon-stack">
                                                    <i class="base base-7 icon-stack-3x opacity-100 color-success-500 "></i>
                                                    <i class="base base-7 icon-stack-2x opacity-100 color-success-300 "></i>
                                                    <i class="ni ni-envelope icon-stack-1x text-white"></i>
                                                </div>
                                                <span class="app-list-name">
                                                    Inbox
                                                </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="intel_introduction.html" class="app-list-item text-white border-0 m-0">
                                                <div class="icon-stack">
                                                    <i class="base base-7 icon-stack-2x opacity-100 color-primary-300 "></i>
                                                    <i class="fal fa-plus icon-stack-1x opacity-100 color-white"></i>
                                                </div>
                                                <span class="app-list-name">
                                                    Add More
                                                </span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END Shortcuts -->
                    <!-- BEGIN Color profile -->
                    <!-- this area is hidden and will not be seen on screens or screen readers -->
                    <!-- we use this only for CSS color refernce for JS stuff -->
                    <p id="js-color-profile" class="d-none">
                        <span class="color-primary-50"></span>
                        <span class="color-primary-100"></span>
                        <span class="color-primary-200"></span>
                        <span class="color-primary-300"></span>
                        <span class="color-primary-400"></span>
                        <span class="color-primary-500"></span>
                        <span class="color-primary-600"></span>
                        <span class="color-primary-700"></span>
                        <span class="color-primary-800"></span>
                        <span class="color-primary-900"></span>
                        <span class="color-info-50"></span>
                        <span class="color-info-100"></span>
                        <span class="color-info-200"></span>
                        <span class="color-info-300"></span>
                        <span class="color-info-400"></span>
                        <span class="color-info-500"></span>
                        <span class="color-info-600"></span>
                        <span class="color-info-700"></span>
                        <span class="color-info-800"></span>
                        <span class="color-info-900"></span>
                        <span class="color-danger-50"></span>
                        <span class="color-danger-100"></span>
                        <span class="color-danger-200"></span>
                        <span class="color-danger-300"></span>
                        <span class="color-danger-400"></span>
                        <span class="color-danger-500"></span>
                        <span class="color-danger-600"></span>
                        <span class="color-danger-700"></span>
                        <span class="color-danger-800"></span>
                        <span class="color-danger-900"></span>
                        <span class="color-warning-50"></span>
                        <span class="color-warning-100"></span>
                        <span class="color-warning-200"></span>
                        <span class="color-warning-300"></span>
                        <span class="color-warning-400"></span>
                        <span class="color-warning-500"></span>
                        <span class="color-warning-600"></span>
                        <span class="color-warning-700"></span>
                        <span class="color-warning-800"></span>
                        <span class="color-warning-900"></span>
                        <span class="color-success-50"></span>
                        <span class="color-success-100"></span>
                        <span class="color-success-200"></span>
                        <span class="color-success-300"></span>
                        <span class="color-success-400"></span>
                        <span class="color-success-500"></span>
                        <span class="color-success-600"></span>
                        <span class="color-success-700"></span>
                        <span class="color-success-800"></span>
                        <span class="color-success-900"></span>
                        <span class="color-fusion-50"></span>
                        <span class="color-fusion-100"></span>
                        <span class="color-fusion-200"></span>
                        <span class="color-fusion-300"></span>
                        <span class="color-fusion-400"></span>
                        <span class="color-fusion-500"></span>
                        <span class="color-fusion-600"></span>
                        <span class="color-fusion-700"></span>
                        <span class="color-fusion-800"></span>
                        <span class="color-fusion-900"></span>
                    </p>
                    <!-- END Color profile -->
                </div>
            </div>
        </div>
        <!-- END Page Wrapper -->

        <!-- BEGIN Page Settings -->
        <div class="modal fade js-modal-settings modal-backdrop-transparent" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-right modal-md">
                <div class="modal-content">
                    <div class="dropdown-header bg-trans-gradient d-flex justify-content-center align-items-center w-100">
                        <h4 class="m-0 text-center color-white">
                            Layout Settings
                            <small class="mb-0 opacity-80">User Interface Settings</small>
                        </h4>
                        <button type="button" class="close text-white position-absolute pos-top pos-right p-2 m-1 mr-2" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"><i class="fal fa-times"></i></span>
                        </button>
                    </div>
                    <div class="modal-body p-0">
                        <div class="settings-panel">
                            <div class="mt-4 d-table w-100 px-5">
                                <div class="d-table-cell align-middle">
                                    <h5 class="p-0">
                                        App Layout
                                    </h5>
                                </div>
                            </div>
                            <div class="list" id="fh">
                                <a href="#" onclick="return false;" class="btn btn-switch" data-action="toggle" data-class="header-function-fixed"></a>
                                <span class="onoffswitch-title">Fixed Header</span>
                                <span class="onoffswitch-title-desc">header is in a fixed at all times</span>
                            </div>
                            <div class="list" id="nff">
                                <a href="#" onclick="return false;" class="btn btn-switch" data-action="toggle" data-class="nav-function-fixed"></a>
                                <span class="onoffswitch-title">Fixed Navigation</span>
                                <span class="onoffswitch-title-desc">left panel is fixed</span>
                            </div>
                            <div class="list" id="nfm">
                                <a href="#" onclick="return false;" class="btn btn-switch" data-action="toggle" data-class="nav-function-minify"></a>
                                <span class="onoffswitch-title">Minify Navigation</span>
                                <span class="onoffswitch-title-desc">Skew nav to maximize space</span>
                            </div>
                            <div class="list" id="nfh">
                                <a href="#" onclick="return false;" class="btn btn-switch" data-action="toggle" data-class="nav-function-hidden"></a>
                                <span class="onoffswitch-title">Hide Navigation</span>
                                <span class="onoffswitch-title-desc">roll mouse on edge to reveal</span>
                            </div>
                            <div class="list" id="nft">
                                <a href="#" onclick="return false;" class="btn btn-switch" data-action="toggle" data-class="nav-function-top"></a>
                                <span class="onoffswitch-title">Top Navigation</span>
                                <span class="onoffswitch-title-desc">Relocate left pane to top</span>
                            </div>
                            <div class="list" id="mmb">
                                <a href="#" onclick="return false;" class="btn btn-switch" data-action="toggle" data-class="mod-main-boxed"></a>
                                <span class="onoffswitch-title">Boxed Layout</span>
                                <span class="onoffswitch-title-desc">Encapsulates to a container</span>
                            </div>
                            <div class="expanded">
                                <ul class="">
                                    <li>
                                        <div class="bg-fusion-50" data-action="toggle" data-class="mod-bg-1"></div>
                                    </li>
                                    <li>
                                        <div class="bg-warning-200" data-action="toggle" data-class="mod-bg-2"></div>
                                    </li>
                                    <li>
                                        <div class="bg-primary-200" data-action="toggle" data-class="mod-bg-3"></div>
                                    </li>
                                    <li>
                                        <div class="bg-success-300" data-action="toggle" data-class="mod-bg-4"></div>
                                    </li>
                                </ul>
                                <div class="list" id="mbgf">
                                    <a href="#" onclick="return false;" class="btn btn-switch" data-action="toggle" data-class="mod-fixed-bg"></a>
                                    <span class="onoffswitch-title">Fixed Background</span>
                                </div>
                            </div>
                            <div class="mt-4 d-table w-100 px-5">
                                <div class="d-table-cell align-middle">
                                    <h5 class="p-0">
                                        Mobile Menu
                                    </h5>
                                </div>
                            </div>
                            <div class="list" id="nmp">
                                <a href="#" onclick="return false;" class="btn btn-switch" data-action="toggle" data-class="nav-mobile-push"></a>
                                <span class="onoffswitch-title">Push Content</span>
                                <span class="onoffswitch-title-desc">Content pushed on menu reveal</span>
                            </div>
                            <div class="list" id="nmno">
                                <a href="#" onclick="return false;" class="btn btn-switch" data-action="toggle" data-class="nav-mobile-no-overlay"></a>
                                <span class="onoffswitch-title">No Overlay</span>
                                <span class="onoffswitch-title-desc">Removes mesh on menu reveal</span>
                            </div>
                            <div class="list" id="sldo">
                                <a href="#" onclick="return false;" class="btn btn-switch" data-action="toggle" data-class="nav-mobile-slide-out"></a>
                                <span class="onoffswitch-title">Off-Canvas <sup>(beta)</sup></span>
                                <span class="onoffswitch-title-desc">Content overlaps menu</span>
                            </div>
                            <div class="mt-4 d-table w-100 px-5">
                                <div class="d-table-cell align-middle">
                                    <h5 class="p-0">
                                        Accessibility
                                    </h5>
                                </div>
                            </div>
                            <div class="list" id="mbf">
                                <a href="#" onclick="return false;" class="btn btn-switch" data-action="toggle" data-class="mod-bigger-font"></a>
                                <span class="onoffswitch-title">Bigger Content Font</span>
                                <span class="onoffswitch-title-desc">content fonts are bigger for readability</span>
                            </div>
                            <div class="list" id="mhc">
                                <a href="#" onclick="return false;" class="btn btn-switch" data-action="toggle" data-class="mod-high-contrast"></a>
                                <span class="onoffswitch-title">High Contrast Text (WCAG 2 AA)</span>
                                <span class="onoffswitch-title-desc">4.5:1 text contrast ratio</span>
                            </div>
                            <div class="list" id="mcb">
                                <a href="#" onclick="return false;" class="btn btn-switch" data-action="toggle" data-class="mod-color-blind"></a>
                                <span class="onoffswitch-title">Daltonism <sup>(beta)</sup> </span>
                                <span class="onoffswitch-title-desc">color vision deficiency</span>
                            </div>
                            <div class="list" id="mpc">
                                <a href="#" onclick="return false;" class="btn btn-switch" data-action="toggle" data-class="mod-pace-custom"></a>
                                <span class="onoffswitch-title">Preloader Inside</span>
                                <span class="onoffswitch-title-desc">preloader will be inside content</span>
                            </div>
                            <div class="mt-4 d-table w-100 px-5">
                                <div class="d-table-cell align-middle">
                                    <h5 class="p-0">
                                        Global Modifications
                                    </h5>
                                </div>
                            </div>
                            <div class="list" id="mcbg">
                                <a href="#" onclick="return false;" class="btn btn-switch" data-action="toggle" data-class="mod-clean-page-bg"></a>
                                <span class="onoffswitch-title">Clean Page Background</span>
                                <span class="onoffswitch-title-desc">adds more whitespace</span>
                            </div>
                            <div class="list" id="mhni">
                                <a href="#" onclick="return false;" class="btn btn-switch" data-action="toggle" data-class="mod-hide-nav-icons"></a>
                                <span class="onoffswitch-title">Hide Navigation Icons</span>
                                <span class="onoffswitch-title-desc">invisible navigation icons</span>
                            </div>
                            <div class="list" id="dan">
                                <a href="#" onclick="return false;" class="btn btn-switch" data-action="toggle" data-class="mod-disable-animation"></a>
                                <span class="onoffswitch-title">Disable CSS Animation</span>
                                <span class="onoffswitch-title-desc">Disables CSS based animations</span>
                            </div>
                            <div class="list" id="mhic">
                                <a href="#" onclick="return false;" class="btn btn-switch" data-action="toggle" data-class="mod-hide-info-card"></a>
                                <span class="onoffswitch-title">Hide Info Card</span>
                                <span class="onoffswitch-title-desc">Hides info card from left panel</span>
                            </div>
                            <div class="list" id="mlph">
                                <a href="#" onclick="return false;" class="btn btn-switch" data-action="toggle" data-class="mod-lean-subheader"></a>
                                <span class="onoffswitch-title">Lean Subheader</span>
                                <span class="onoffswitch-title-desc">distinguished page header</span>
                            </div>
                            <div class="list" id="mnl">
                                <a href="#" onclick="return false;" class="btn btn-switch" data-action="toggle" data-class="mod-nav-link"></a>
                                <span class="onoffswitch-title">Hierarchical Navigation</span>
                                <span class="onoffswitch-title-desc">Clear breakdown of nav links</span>
                            </div>
                            <div class="list mt-1">
                                <span class="onoffswitch-title">Global Font Size <small>(RESETS ON REFRESH)</small> </span>
                                <div class="btn-group btn-group-sm btn-group-toggle my-2" data-toggle="buttons">
                                    <label class="btn btn-default btn-sm" data-action="toggle-swap" data-class="root-text-sm" data-target="html">
                                        <input type="radio" name="changeFrontSize"> SM
                                    </label>
                                    <label class="btn btn-default btn-sm" data-action="toggle-swap" data-class="root-text" data-target="html">
                                        <input type="radio" name="changeFrontSize" checked=""> MD
                                    </label>
                                    <label class="btn btn-default btn-sm" data-action="toggle-swap" data-class="root-text-lg" data-target="html">
                                        <input type="radio" name="changeFrontSize"> LG
                                    </label>
                                    <label class="btn btn-default btn-sm" data-action="toggle-swap" data-class="root-text-xl" data-target="html">
                                        <input type="radio" name="changeFrontSize"> XL
                                    </label>
                                </div>
                                <span class="onoffswitch-title-desc d-block mb-0">Change <strong>root</strong> font size to effect rem
                                    values</span>
                            </div>
                            <hr class="mb-0 mt-4">
                            <div class="mt-2 d-table w-100 pl-5 pr-3">
                                <div class="fs-xs text-muted p-2 alert alert-warning mt-3 mb-2">
                                    <i class="fal fa-exclamation-triangle text-warning mr-2"></i>The settings below uses localStorage to load
                                    the external CSS file as an overlap to the base css. Due to network latency and CPU utilization, you may
                                    experience a brief flickering effect on page load which may show the intial applied theme for a split
                                    second. Setting the prefered style/theme in the header will prevent this from happening.
                                </div>
                            </div>
                            <div class="mt-2 d-table w-100 pl-5 pr-3">
                                <div class="d-table-cell align-middle">
                                    <h5 class="p-0">
                                        Theme colors
                                    </h5>
                                </div>
                            </div>
                            <div class="expanded theme-colors pl-5 pr-3">
                                <ul class="m-0">
                                    <li>
                                        <a href="#" id="myapp-0" data-action="theme-update" data-themesave data-theme="" data-toggle="tooltip" data-placement="top" title="Wisteria (base css)" data-original-title="Wisteria (base css)"></a>
                                    </li>
                                    <li>
                                        <a href="#" id="myapp-1" data-action="theme-update" data-themesave data-theme="{{ asset('assets/backend') }}/css/themes/cust-theme-1.css" data-toggle="tooltip" data-placement="top" title="Tapestry" data-original-title="Tapestry"></a>
                                    </li>
                                    <li>
                                        <a href="#" id="myapp-2" data-action="theme-update" data-themesave data-theme="{{ asset('assets/backend') }}/css/themes/cust-theme-2.css" data-toggle="tooltip" data-placement="top" title="Atlantis" data-original-title="Atlantis"></a>
                                    </li>
                                    <li>
                                        <a href="#" id="myapp-3" data-action="theme-update" data-themesave data-theme="{{ asset('assets/backend') }}/css/themes/cust-theme-3.css" data-toggle="tooltip" data-placement="top" title="Indigo" data-original-title="Indigo"></a>
                                    </li>
                                    <li>
                                        <a href="#" id="myapp-4" data-action="theme-update" data-themesave data-theme="{{ asset('assets/backend') }}/css/themes/cust-theme-4.css" data-toggle="tooltip" data-placement="top" title="Dodger Blue" data-original-title="Dodger Blue"></a>
                                    </li>
                                    <li>
                                        <a href="#" id="myapp-5" data-action="theme-update" data-themesave data-theme="{{ asset('assets/backend') }}/css/themes/cust-theme-5.css" data-toggle="tooltip" data-placement="top" title="Tradewind" data-original-title="Tradewind"></a>
                                    </li>
                                    <li>
                                        <a href="#" id="myapp-6" data-action="theme-update" data-themesave data-theme="{{ asset('assets/backend') }}/css/themes/cust-theme-6.css" data-toggle="tooltip" data-placement="top" title="Cranberry" data-original-title="Cranberry"></a>
                                    </li>
                                    <li>
                                        <a href="#" id="myapp-7" data-action="theme-update" data-themesave data-theme="{{ asset('assets/backend') }}/css/themes/cust-theme-7.css" data-toggle="tooltip" data-placement="top" title="Oslo Gray" data-original-title="Oslo Gray"></a>
                                    </li>
                                    <li>
                                        <a href="#" id="myapp-8" data-action="theme-update" data-themesave data-theme="{{ asset('assets/backend') }}/css/themes/cust-theme-8.css" data-toggle="tooltip" data-placement="top" title="Chetwode Blue" data-original-title="Chetwode Blue"></a>
                                    </li>
                                    <li>
                                        <a href="#" id="myapp-9" data-action="theme-update" data-themesave data-theme="{{ asset('assets/backend') }}/css/themes/cust-theme-9.css" data-toggle="tooltip" data-placement="top" title="Apricot" data-original-title="Apricot"></a>
                                    </li>
                                    <li>
                                        <a href="#" id="myapp-10" data-action="theme-update" data-themesave data-theme="{{ asset('assets/backend') }}/css/themes/cust-theme-10.css" data-toggle="tooltip" data-placement="top" title="Blue Smoke" data-original-title="Blue Smoke"></a>
                                    </li>
                                    <li>
                                        <a href="#" id="myapp-11" data-action="theme-update" data-themesave data-theme="{{ asset('assets/backend') }}/css/themes/cust-theme-11.css" data-toggle="tooltip" data-placement="top" title="Green Smoke" data-original-title="Green Smoke"></a>
                                    </li>
                                    <li>
                                        <a href="#" id="myapp-12" data-action="theme-update" data-themesave data-theme="{{ asset('assets/backend') }}/css/themes/cust-theme-12.css" data-toggle="tooltip" data-placement="top" title="Wild Blue Yonder" data-original-title="Wild Blue Yonder"></a>
                                    </li>
                                    <li>
                                        <a href="#" id="myapp-13" data-action="theme-update" data-themesave data-theme="{{ asset('assets/backend') }}/css/themes/cust-theme-13.css" data-toggle="tooltip" data-placement="top" title="Emerald" data-original-title="Emerald"></a>
                                    </li>
                                </ul>
                            </div>
                            <hr class="mb-0 mt-4">
                            <div class="pl-5 pr-3 py-3 bg-faded">
                                <div class="row no-gutters">
                                    <div class="col-6 pr-1">
                                        <a href="#" class="btn btn-outline-danger fw-500 btn-block" data-action="app-reset">Reset Settings</a>
                                    </div>
                                    <div class="col-6 pl-1">
                                        <a href="#" class="btn btn-danger fw-500 btn-block" data-action="factory-reset">Factory Reset</a>
                                    </div>
                                </div>
                            </div>
                        </div> <span id="saving"></span>
                    </div>
                </div>
            </div>
        </div>
        @include('sweetalert::alert')
        <script src="{{ asset('assets/backend') }}/js/vendors.bundle.js"></script>
        <script src="{{ asset('assets/backend') }}/js/app.bundle.js"></script>
        <script src="{{ asset('assets/backend') }}/js/statistics/chartjs/chartjs.bundle.js"></script>
        <script src="{{ asset('assets/backend') }}/js/statistics/flot/flot.bundle.js"></script>
        <script type="text/javascript">
            /* Activate smart panels */
            $('#js-page-content').smartPanel();
        </script>
        <!-- The order of scripts is irrelevant. Please check out the plugin pages for more details about these plugins below: -->
        <script src="{{ asset('assets/backend') }}/js/statistics/peity/peity.bundle.js"></script>
        <script src="{{ asset('assets/backend') }}/js/statistics/flot/flot.bundle.js"></script>
        <script src="{{ asset('assets/backend') }}/js/statistics/easypiechart/easypiechart.bundle.js"></script>
        <script src="{{ asset('assets/backend') }}/js/datagrid/datatables/datatables.bundle.js"></script>
        <script src="{{ asset('assets/backend') }}/js/notifications/sweetalert2/sweetalert2.bundle.js"></script>
        <script src="{{ asset('assets/backend') }}/js/formplugins/select2/select2.bundle.js"></script>
        <script src="{{ asset('assets/backend') }}/js/formplugins/summernote/summernote.js"></script>
        <script>
            function loadImage(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        $("#upload_image").attr('class', 'd-block');
                        $('#upload_image').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(input.files[0]);
                }
            }
            $("#uploadImage").change(function () {
                loadImage(this);
            });
        </script>
        <script>
            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        $('#profile_image').attr('class', 'd-block');
                        $('#profile_image').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(input.files[0]);
                }
            }
            $("#profileImage").change(function () {
                readURL(this);
            });
        </script>
        <script>
            function readFileURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        $('#gallery_image').attr('class', 'd-block');
                        $('#gallery_image').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(input.files[0]);
                }
            }
            $("#galleryImage").change(function () {
                readFileURL(this);
            });
        </script>
        <script>
            function readBackgroundImageURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        $('#background_image').attr('class', 'd-block');
                        $('#background_image').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(input.files[0]);
                }
            }
            $("#backgroundImage").change(function () {
                readBackgroundImageURL(this);
            });
        </script>
        <script>
            function readPDFURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        $("#pdfViewer").attr('class', 'd-block');
                        $('#pdfViewer').attr('data',  e.target.result);
                    }
                    reader.readAsDataURL(input.files[0]);
                }
            }
            $("#pdf-upload").change(function () {
                readPDFURL(this);
            });
        </script>
        <script type="text/javascript">
            $(".show_password").on('click',function(){
                var x = document.getElementById("showPassword");
                if (x.type === "password") {
                    x.type = "text";
                } else {
                    x.type = "password";
                }
            });
            $(".show_confirm_password").on('click',function(){
                var x = document.getElementById("showConfirmPassword");
                if (x.type === "password") {
                    x.type = "text";
                } else {
                    x.type = "password";
                }
            });
            function confirm_delete(id) {
                event.preventDefault();
                Swal.fire(
                {
                    title: "Are you sure?",
                    text: "You won't be able to revert this!",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Yes, delete it!"
                }).then(function(result)
                {
                    if (result.value)
                    {
                        $("#delete_form_"+id).submit();
                    }else{
                        event.preventDefault();
                    }
                });
            }
        </script>
        <script type="text/javascript">
            $(function () {
                $('#timezone').val(Intl.DateTimeFormat().resolvedOptions().timeZone)
                $('.select2').select2();
                //init default
                $('.js-summernote').summernote(
                {
                    height: 200,
                    tabsize: 2,
                    placeholder: "",
                    dialogsFade: true,
                    toolbar: [
                        ['style', ['style']],
                        ['font', ['strikethrough', 'superscript', 'subscript']],
                        ['font', ['bold', 'italic', 'underline', 'clear']],
                        ['fontsize', ['fontsize']],
                        ['fontname', ['fontname']],
                        ['color', ['color']],
                        ['para', ['ul', 'ol', 'paragraph']],
                        ['height', ['height']]
                        ['table', ['table']],
                        ['insert', ['link', 'picture', 'video']],
                        ['view', ['fullscreen', 'codeview', 'help']]
                    ]
                });

                var table = $('#user_list').DataTable({
                    processing: true,"aaSorting": [],
                    serverSide: true,
                    ajax: "{{ route('user.index') }}",
                    columns: [
                        {data: 'id', name: 'id'},
                        {data: 'name', name: 'name'},
                        {data: 'phone', name: 'phone'},
                        {data: 'email', name: 'email'},
                        {data: 'action', name: 'action', orderable: false, searchable: false},
                    ]
                });
                var table = $('#permission_list').DataTable({
                    processing: true,"aaSorting": [],
                    serverSide: true,
                    ajax: "{{ route('permission.index') }}",
                    columns: [
                        {data: 'id', name: 'id'},
                        {data: 'name', name: 'name'},
                        {data: 'action', name: 'action', orderable: false, searchable: false},
                    ]
                });
                var table = $('#role_list').DataTable({
                    processing: true,"aaSorting": [],
                    serverSide: true,
                    ajax: "{{ route('role.index') }}",
                    columns: [
                        {data: 'id', name: 'id'},
                        {data: 'name', name: 'name'},
                        {data: 'action', name: 'action', orderable: false, searchable: false},
                    ]
                });

                var table = $('#msw_list').DataTable({
                    processing: true,"aaSorting": [],
                    serverSide: true,
                    ajax: "{{ route('msw.index') }}",
                    columns: [
                        {data: 'id', name: 'id'},
                        {data: 'title', name: 'title'},
                        {data: 'des', name: 'des'},
                        {data: 'action', name: 'action', orderable: false, searchable: false},
                    ]
                });
                var table = $('#social_link_list').DataTable({
                    processing: true,"aaSorting": [],
                    serverSide: true,
                    ajax: "{{ route('social-link.index') }}",
                    columns: [
                        {data: 'id', name: 'id'},
                        {data: 'product_category', name: 'product_category'},
                        {data: 'name', name: 'name'},
                        {data: 'action', name: 'action', orderable: false, searchable: false},
                    ]
                });
                var table = $('#contact_us_list').DataTable({
                    processing: true,"aaSorting": [],
                    serverSide: true,
                    ajax: "{{ route('contact-us.index') }}",
                    columns: [
                        {data: 'id', name: 'id'},
                        {data: 'name', name: 'name'},
                        {data: 'icon', name: 'icon'},
                        {data: 'url', name: 'url'},
                        {data: 'action', name: 'action', orderable: false, searchable: false},
                    ]
                });
                var table = $('#menu_list').DataTable({
                    processing: true,"aaSorting": [],
                    serverSide: true,
                    ajax: "{{ route('menu.index') }}",
                    columns: [
                        {data: 'id', name: 'id'},
                        {data: 'name', name: 'name'},
                        {data: 'slug', name: 'slug'},
                        {data: 'parent', name: 'parent'},
                        {data: 'action', name: 'action', orderable: false, searchable: false},
                    ]
                });
                var table = $('#menu_content_list').DataTable({
                    processing: true,"aaSorting": [],
                    serverSide: true,
                    ajax: "{{ route('menu-content.index') }}",
                    columns: [
                        {data: 'id', name: 'id'},
                        {data: 'menu_id', name: 'menu_id'},
                        {data: 'title', name: 'title'},
                        {data: 'action', name: 'action', orderable: false, searchable: false},
                    ]
                });
                var table = $('#experience_list').DataTable({
                    processing: true,"aaSorting": [],
                    serverSide: true,
                    ajax: "{{ route('experience.index') }}",
                    columns: [
                        {data: 'id', name: 'id'},
                        {data: 'menu_id', name: 'menu_id'},
                        {data: 'title', name: 'title'},
                        {data: 'image', name: 'image'},
                        {data: 'action', name: 'action', orderable: false, searchable: false},
                    ]
                });
                var table = $('#slider_list').DataTable({
                    processing: true,"aaSorting": [],
                    serverSide: true,
                    ajax: "{{ route('slider.index') }}",
                    columns: [
                        {data: 'id', name: 'id'},
                        {data: 'image_text', name: 'image_text'},
                        {data: 'image_text_2', name: 'image_text_2'},
                        {data: 'image', name: 'image'},
                        {data: 'action', name: 'action', orderable: false, searchable: false},
                    ]
                });
                var table = $('#slider_content_list').DataTable({
                    processing: true,"aaSorting": [],
                    serverSide: true,
                    ajax: "{{ route('slider-content.index') }}",
                    columns: [
                        {data: 'id', name: 'id'},
                        {data: 'menu_id', name: 'menu_id'},
                        {data: 'title', name: 'title'},
                        {data: 'image', name: 'image'},
                        {data: 'action', name: 'action', orderable: false, searchable: false},
                    ]
                });
                var table = $('#services_content_image_list').DataTable({
                    processing: true,"aaSorting": [],
                    serverSide: true,
                    ajax: "{{ route('md-message.index') }}",
                    columns: [
                        {data: 'id', name: 'id'},
                        {data: 'menu_id', name: 'menu_id'},
                        {data: 'title', name: 'title'},
                        {data: 'image', name: 'image'},
                        {data: 'action', name: 'action', orderable: false, searchable: false},
                    ]
                });
                var table = $('#blog_category_list').DataTable({
                    processing: true,"aaSorting": [],
                    serverSide: true,
                    ajax: "{{ route('blog-category.index') }}",
                    columns: [
                        {data: 'id', name: 'id'},
                        {data: 'name', name: 'name'},
                        {data: 'parent', name: 'parent'},
                        {data: 'action', name: 'action', orderable: false, searchable: false},
                    ]
                });
                var table = $('#blog_list').DataTable({
                    processing: true,"aaSorting": [],
                    serverSide: true,
                    ajax: "{{ route('blog.index') }}",
                    columns: [
                        {data: 'id', name: 'id'},
                        {data: 'category_id', name: 'category_id'},
                        {data: 'brand_id', name: 'brand_id'},
                        {data: 'image', name: 'image'},
                        {data: 'action', name: 'action', orderable: false, searchable: false},
                    ]
                });
                var table = $('#section_list').DataTable({
                    processing: true,"aaSorting": [],
                    serverSide: true,
                    ajax: "{{ route('section.index') }}",
                    columns: [
                        {data: 'id', name: 'id'},
                        {data: 'name', name: 'name'},
                        {data: 'description', name: 'description'},
                        {data: 'action', name: 'action', orderable: false, searchable: false},
                    ]
                });
                var table = $('#we_best_list').DataTable({
                    processing: true,"aaSorting": [],
                    serverSide: true,
                    ajax: "{{ route('we-best.index') }}",
                    columns: [
                        {data: 'id', name: 'id'},
                        {data: 'title', name: 'title'},
                        {data: 'description', name: 'description'},
                        {data: 'action', name: 'action', orderable: false, searchable: false},
                    ]
                });
                var table = $('#services_list').DataTable({
                    processing: true,"aaSorting": [],
                    serverSide: true,
                    ajax: "{{ route('services.index') }}",
                    columns: [
                        {data: 'id', name: 'id'},
                        {data: 'title', name: 'title'},
                        {data: 'image', name: 'image', orderable: false, searchable: false},
                        {data: 'action', name: 'action', orderable: false, searchable: false},
                    ]
                });
                var table = $('#it_services_list').DataTable({
                    processing: true,"aaSorting": [],
                    serverSide: true,
                    ajax: "{{ route('it-services.index') }}",
                    columns: [
                        {data: 'id', name: 'id'},
                        {data: 'title', name: 'title'},
                        {data: 'image', name: 'image', orderable: false, searchable: false},
                        {data: 'action', name: 'action', orderable: false, searchable: false},
                    ]
                });
                var table = $('#web_design_list').DataTable({
                    processing: true,"aaSorting": [],
                    serverSide: true,
                    ajax: "{{ route('web-design.index') }}",
                    columns: [
                        {data: 'id', name: 'id'},
                        {data: 'title', name: 'title'},
                        {data: 'image', name: 'image', orderable: false, searchable: false},
                        {data: 'action', name: 'action', orderable: false, searchable: false},
                    ]
                });
                var table = $('#projects_list').DataTable({
                    processing: true,"aaSorting": [],
                    serverSide: true,
                    ajax: "{{ route('projects.index') }}",
                    columns: [
                        {data: 'id', name: 'id'},
                        {data: 'image_text', name: 'image_text'},
                        {data: 'image', name: 'image', orderable: false, searchable: false},
                        {data: 'action', name: 'action', orderable: false, searchable: false},
                    ]
                });
                var table = $('#strengths_list').DataTable({
                    processing: true,"aaSorting": [],
                    serverSide: true,
                    ajax: "{{ route('strengths.index') }}",
                    columns: [
                        {data: 'id', name: 'id'},
                        {data: 'name', name: 'name'},
                        {data: 'designation', name: 'designation'},
                        {data: 'image', name: 'image', orderable: false, searchable: false},
                        {data: 'action', name: 'action', orderable: false, searchable: false},
                    ]
                });
                var table = $('#client_comment_list').DataTable({
                    processing: true,"aaSorting": [],
                    serverSide: true,
                    ajax: "{{ route('client-comment.index') }}",
                    columns: [
                        {data: 'id', name: 'id'},
                        {data: 'name', name: 'name'},
                        {data: 'description', name: 'description'},
                        {data: 'image', name: 'image', orderable: false, searchable: false},
                        {data: 'action', name: 'action', orderable: false, searchable: false},
                    ]
                });
                var table = $('#footer_link_list').DataTable({
                    processing: true,"aaSorting": [],
                    serverSide: true,
                    ajax: "{{ route('footer-link.index') }}",
                    columns: [
                        {data: 'id', name: 'id'},
                        {data: 'name', name: 'name'},
                        {data: 'url', name: 'url'},
                        {data: 'outer_link', name: 'outer_link'},
                        {data: 'action', name: 'action', orderable: false, searchable: false},
                    ]
                });
                var table = $('#gallery_list').DataTable({
                    processing: true,"aaSorting": [],
                    serverSide: true,
                    ajax: "{{ route('gallery.index') }}",
                    columns: [
                        {data: 'id', name: 'id'},
                        {data: 'title', name: 'title'},
                        {data: 'image', name: 'image', orderable: false, searchable: false},
                        {data: 'action', name: 'action', orderable: false, searchable: false},
                    ]
                });
                var table = $('#message_list').DataTable({
                    processing: true,"aaSorting": [],
                    serverSide: true,
                    ajax: "{{ route('message.index') }}",
                    columns: [
                        {data: 'id', name: 'id'},
                        {data: 'full_name', name: 'full_name'},
                        {data: 'email_address', name: 'email_address'},
                        {data: 'subject', name: 'subject'},
                        {data: 'action', name: 'action', orderable: false, searchable: false},
                    ]
                });

                var table = $('#catalog_list').DataTable({
                    processing: true,"aaSorting": [],
                    serverSide: true,
                    ajax: "{{ route('catalog.index') }}",
                    columns: [
                        {data: 'id', name: 'id'},
                        {data: 'title', name: 'title'},
                        {data: 'dis_title', name: 'dis_title'},
                        {data: 'dis', name: 'dis'},
                        {data: 'action', name: 'action', orderable: false, searchable: false},
                    ]
                });

                var table = $('#pf_list').DataTable({
                    processing: true,"aaSorting": [],
                    serverSide: true,
                    ajax: "{{ route('pf.index') }}",
                    columns: [
                        {data: 'id', name: 'id'},
                        {data: 'title', name: 'title'},
                        {data: 'des', name: 'des'},
                        {data: 'icon', name: 'icon'},
                        {data: 'action', name: 'action', orderable: false, searchable: false},
                    ]
                });

                var table = $('#youtube_video_list').DataTable({
                    processing: true,"aaSorting": [],
                    serverSide: true,
                    ajax: "{{ route('youtube.index') }}",
                    columns: [
                        {data: 'id', name: 'id'},
                        {data: 'title', name: 'title'},
                        {data: 'video_link', name: 'video_link'},
                        {data: 'action', name: 'action', orderable: false, searchable: false},
                    ]
                });

                var table = $('#subscribe_list').DataTable({
                    processing: true,"aaSorting": [],
                    serverSide: true,
                    ajax: "{{ route('subscribe.index') }}",
                    columns: [
                        {data: 'id', name: 'id'},
                        {data: 'title', name: 'title'},
                        {data: 'image', name: 'image'},
                        {data: 'action', name: 'action', orderable: false, searchable: false},
                    ]
                });
            });
          </script>
    </body>
</html>
