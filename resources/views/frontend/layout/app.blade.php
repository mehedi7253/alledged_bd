<!DOCTYPE html>
<html lang="en">
   <head>
      <?php $company = DB::table('company_settings')->first(); ?>
      <?php $seo = DB::table('seos')->first(); ?>
      <?php $companyLogo = json_decode($company->logo); ?>
      <?php $favicon = json_decode($company->favicon); ?>
      <meta charset="utf-8">
      <meta content="width=device-width, initial-scale=1.0" name="viewport">
      <title class="demo">{{ $seo->title }}</title>
      <meta name="description" content="{{ $seo->description }}">
      <meta name="keywords" content="{{ $seo->keyword }}">
      <meta property="og:title" content="{{ $seo->og_title }}"/>
      <meta property="og:type" content="website"/>
      <meta property="og:url" content="{{ $seo->og_url }}"/>
      <meta property="og:image" content="{{ asset($company->logo) }}"/>
      <meta property="og:image" itemprop="image" content="{{ asset($company->logo) }}" />
      <meta property="og:image:width" content="300"/>
      <meta property="og:image:height" content="200"/>
      <meta property="og:site_name" content="{{ $company->name }}"/>
      <meta property="og:description"content="{{ $seo->og_description }}" />
      <meta name="author" content="{{ $seo->author }}">
      <meta name="revisit-after" content="{{ $seo->revisit_after }} day(s)">
      <meta name="robots" content="{{ $seo->robots }}" />
      <meta name="googlebot" content="{{ $seo->google_bot }}" />
      <link rel="icon" type="image/x-icon" href="{{ asset($company->favicon) }}" />
      <link rel="shortcut icon" href="{{ asset($company->favicon)}}">
      <link rel="canonical" href="{{ $seo->canonical }}" />
      <link rel="alternate" href="{{ $seo->alternate }}" />
      <!-- Favicons -->
      <link href="{{ asset($company->favicon) }}" rel="icon">
      <!-- Google Fonts -->
      <!-- Vendor CSS Files -->
      <link rel="stylesheet" href="{{ asset('assets/frontend') }}/css/bootstrap.min.css">
      <link href="{{ asset('assets/frontend') }}/css/style2.css" rel="stylesheet">
      <link href="{{ asset('assets/frontend') }}/css/responsive.css" rel="stylesheet">
      <link rel="stylesheet" href="{{ asset('assets/frontend') }}/css/fontawesome.min.css">
      <link rel="preconnect" href="https://fonts.gstatic.com">
      <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;500&display=swap" rel="stylesheet">
      <link rel="preconnect" href="https://fonts.gstatic.com">
      <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;400;500;600;700&display=swap" rel="stylesheet">
      <link rel="stylesheet" href="{{ asset('assets/frontend') }}/css/owl.carousel.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
      <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
      <script src="{{ asset('assets/frontend') }}/js/jquery-3.3.1.min.js"></script>
      <style>
         .mobile-version ul{
         list-style: none;
         padding: 0px;
         }
         .mobile-version .caret {
         cursor: pointer;
         -webkit-user-select: none; /* Safari 3.1+ */
         -moz-user-select: none; /* Firefox 2+ */
         -ms-user-select: none; /* IE 10+ */
         user-select: none;
         font-size: 15px;
         margin-left: 30px;
         }
         .nested li{background-color: #2d2d2d;
         margin-bottom: 1px;
         }
         .nested2 li{
         background-color: #484242;
         margin-bottom: 1px;
         }
         .mobile-version .caret::after {
         color: #fff;
         display: inline-block;
         margin-right: 26px;
         content: "\25B6";
         float: right;
         font-size: 10px;
         }
         .mobile-version .caret-down::before {
         -ms-transform: rotate(90deg); /* IE 9 */
         -webkit-transform: rotate(90deg); /* Safari */'
         transform: rotate(90deg);
         }
         .mobile-version .nested {
         display: none;
         }
         .mobile-version .active {
         display: block;
         }
         nav{position:relative;width:980px;margin:10px auto;}
         #cssmenu,#cssmenu ul,#cssmenu ul li,#cssmenu ul li a,#cssmenu #head-mobile{border:0;list-style:none;line-height:1;display:block;position:relative;-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing:border-box}
         #cssmenu:after,#cssmenu > ul:after{content:".";display:block;clear:both;visibility:hidden;line-height:0;height:0}
         #cssmenu #head-mobile{display:none}
         #cssmenu > ul > li{float:left}
         #cssmenu > ul > li > a{padding:15px 10px;font-size:15px;letter-spacing:1px;text-decoration:none;color:#333;font-weight:500;}
         #cssmenu > ul > li:hover > a,#cssmenu ul li.active a{color:#177881}
         #cssmenu > ul > li:hover,#cssmenu ul li.active:hover,#cssmenu ul li.active,#cssmenu ul li.has-sub.active:hover{-webkit-transition:background .3s ease;-ms-transition:background .3s ease;transition:background .3s ease;}
         #cssmenu > ul > li.has-sub > a{padding-right:23px}
         #cssmenu > ul > li.has-sub > a:after{position:absolute;top:22px;right:11px;width:8px;height:2px;display:block;background:#333;content:''}
         #cssmenu > ul > li.has-sub > a:before{position:absolute;top:19px;right:14px;display:block;width:2px;height:8px;background:#333;content:'';-webkit-transition:all .25s ease;-ms-transition:all .25s ease;transition:all .25s ease}
         #cssmenu > ul > li.has-sub:hover > a:before{top:23px;height:0}
         #cssmenu ul ul{position:absolute;left:-9999px}
         #cssmenu ul ul li{height:0;-webkit-transition:all .25s ease;-ms-transition:all .25s ease;background:#f7f7f7;transition:all .25s ease; z-index: 999; border-bottom: }
         #cssmenu ul ul li:hover{}
         #cssmenu li:hover > ul{left:auto; padding: 0px;}
         #cssmenu li:hover > ul > li{height:45px}
         #cssmenu ul ul ul{margin-left:100%;top:0}
         #cssmenu ul ul li a{border-bottom:1px solid rgba(150,150,150,0.15);padding:14px 15px;width:200px;font-size:15px;text-decoration:none;color:#333;font-weight:400;}
         #cssmenu ul ul li:last-child > a,#cssmenu ul ul li.last-item > a{border-bottom:0}
         #cssmenu ul ul li:hover > a,#cssmenu ul ul li a:hover{color:#fff; background: #177881;}
         #cssmenu ul ul li.has-sub > a:after{position:absolute;top:16px;right:11px;width:8px;height:2px;display:block;background:#333;content:''}
         #cssmenu ul ul li.has-sub > a:before{position:absolute;top:13px;right:14px;display:block;width:2px;height:8px;background:#333;content:'';-webkit-transition:all .25s ease;-ms-transition:all .25s ease;transition:all .25s ease}
         #cssmenu ul ul > li.has-sub:hover > a:before{top:17px;height:0}
         #cssmenu ul ul li.has-sub:hover,#cssmenu ul li.has-sub ul li.has-sub ul li:hover{background:#177881;}
         #cssmenu ul ul ul li.active a{border-left:1px solid #333}
         #cssmenu > ul > li.has-sub > ul > li.active > a,#cssmenu > ul ul > li.has-sub > ul > li.active> a{border-top:1px solid #333}
      </style>
   </head>
   <body>
      <!---------------------------------------- Header -------------------------->

      <div class="header-top">
         <div class="container">
            <div class="row">
               <!-- Logo Start -->
               <div class="col-lg-3 col-md-12 col-sm-12 col-xs-8"></div>
               <!-- Logo End -->
               <div class="col-lg-6 col-md-8 col-sm-8">
                  <div class="header-bar-inner">
                     <div class="header-left">
                      <?php
                      $phones = explode(",",$company->phone);
                      $emails = explode(",",$company->email);


                      ?>
                        <ul>
                           <li><i class="fa fa-envelope"></i> {{ $phones[0] }}</li>
                           <li><i class="fa fa-phone"></i> {{ $emails[0] }}</li>
                        </ul>
                     </div>
                  </div>
               </div>
               <?php $contactUs = DB::table('contact_us')->get(); ?>
               <div class="col-lg-3 col-md-4 col-sm-4">
                  <div class="header-top-right">
                     <div class="header-right-div">
                        <div class="soical-profile">
                           <ul>
                             @foreach ($contactUs as $contact)
                             <li><a href="{{ $contact->url }}" title="{{ $contact->name }}" target="_blank"><i class="{{ $contact->icon }}"></i></a></li>
                             @endforeach
                           </ul>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>



      <!-- header -->
      <div id="navbar_top">
         <div class="hd-sec" style="margin-top: 0px;">
            <div class="container">
               <div class="row">
                  <!-- Logo Start -->
                  <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12 classic-logo">
                     <a href="/">
                     <img src="{{ asset($company->logo) }}" alt="{{ $company->name }}" title="{{ $company->name }}">
                     </a>
                  </div>
                  <div class="col-lg-9 col-md-9 col-sm-9 nav-menu hidden-xs">
                     <div class="menu">
                        <nav id='cssmenu'>
                           <ul>
                              <li class='active'><a href='/'>Home</a></li>
                              <?php $menus = DB::table('menus')->whereNull('parent')->get(); ?>
                              @foreach ($menus as $menu)
                              <?php
                                 if ($menu->name != "Products") {
                                    $subMenus = DB::table('menus')->where('parent',$menu->id)->get();
                                 }else{
                                    $subMenus = DB::table('blog_categories')->whereNull('parent')->get();
                                 }

                               ?>
                                  @if ($subMenus->count() > 0)

                                      <li>
                                       <a href='javascript:void(0)'>{{ $menu->name }}</a>
                                       <ul>
                                          @foreach ($subMenus as $subMenu)
                                              <?php
                                               if ($menu->name != "Products") {
                                                $subSubMenus = DB::table('menus')->where('parent',$subMenu->id)->get();
                                               }else{
                                                $subSubMenus = DB::table('blog_categories')->where('parent',$subMenu->id)->get();
                                               }
                                               ?>

                                              @if ($subSubMenus->count() > 0)
                                              <li>
                                                <a href="javascript:void(0)">{{ $subMenu->name }}</a>

                                                <ul>
                                                   @foreach ($subSubMenus as $subSubMenu)
                                                   <?php
                                                      if ($menu->name != "Products") {
                                                         $subSubSubMenus = DB::table('menus')->where('parent',$subSubMenu->id)->get();
                                                      }else{
                                                         $subSubSubMenus = DB::table('social_links')->where('product_category',$subSubMenu->id)->get();
                                                      }

                                                      ?>

                                                      <li>

                                                        @if($subSubSubMenus->count() > 0)
                                                        <a href="javascript:void(0)">{{ $subSubMenu->name }}</a>
                                                        <ul>
                                                            @foreach($subSubSubMenus as $subSubSubMenu)

                                                            <li>
                                                                @if ($menu->name != "Products")
                                                                <a href="{{ '/page/'.$menu->slug.'/'.$subMenu->slug.'/'.$subSubMenu->slug.'/'.$subSubSubMenu->slug }}">{{ $subSubSubMenu->name }}</a>
                                                                @else
                                                                <a href="{{ '/products?b='. \Illuminate\Support\Facades\Crypt::encryptString($subSubSubMenu->id) }}">{{ $subSubSubMenu->name }}</a>
                                                                @endif
                                                            </li>

                                                            @endforeach
                                                        </ul>

                                                        @else
                                                            @if ($menu->name != "Products")
                                                            @if ($subSubMenu->outer_link)
                                                             <a href="{{ '/page/'.$subSubMenu->outer_link }}" target="_blank">{{ $subSubMenu->name }}</a>
                                                             @else
                                                             <a href="{{ '/page/'.$menu->slug.'/'.$subMenu->slug.'/'.$subSubMenu->slug }}">{{ $subSubMenu->name }}</a>
                                                             @endif
                                                             @else
                                                             <a href="{{ '/products?p='. \Illuminate\Support\Facades\Crypt::encryptString($subSubMenu->id) }}">{{ $subSubMenu->name }}</a>
                                                             @endif
                                                        @endif
                                                      </li>
                                                   @endforeach
                                                </ul>
                                             </li>

                                              @else
                                              <li>
                                                 @if ($menu->name != "Products")
                                                 @if ($subMenu->outer_link)
                                                 <a href="{{ '/page/'.$subMenu->outer_link }}" target="_blank">{{ $subMenu->name }}</a>
                                                 @else
                                                 <a href="{{ '/page/'.$menu->slug.'/'.$subMenu->slug }}">{{ $subMenu->name }}</a>
                                                 @endif
                                                 @else
                                                 <a href="{{ '/products?p='. \Illuminate\Support\Facades\Crypt::encryptString($subMenu->id) }}">{{ $subMenu->name }}</a>
                                                 @endif
                                             </li>
                                              @endif
                                          @endforeach
                                       </ul>
                                    </li>
                                  @else
                                    <li>
                                       @if ($menu->outer_link)
                                       <a href='{{ "/page/".$menu->outer_link }}' target="_blank">{{ $menu->name }}</a>
                                       @else
                                       <a href='{{ "/page/".$menu->slug }}'>{{ $menu->name }}</a>
                                       @endif

                                    </li>
                                  @endif
                              @endforeach
                           </ul>
                        </nav>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- end header -->


      <div class="mobile-version">
         <div id="mySidenav" class="sidenav">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
            <a href="/">Home</a>

            @foreach ($menus as $mobileMenu)
            <?php $mobileSubMenus = DB::table('menus')->where('parent',$mobileMenu->id)->get(); ?>
            @if ($mobileSubMenus->count() > 0)
            <li>
               <ul id="side-menus">
                  <li>
                     <span class="caret">{{ $mobileMenu->name }}</span>
                     <ul class="nested">
                        @foreach ($mobileSubMenus as $mobileSubMenu)
                        <?php $mobileSubSubMenus = DB::table('menus')->where('parent',$mobileSubMenu->id)->get(); ?>
                        <li>
                           @if ($mobileSubSubMenus->count() > 0)
                           <span class="caret">{{ $mobileSubMenu->name }}</span>
                           <ul class="nested nested2">
                                 @foreach ($mobileSubSubMenus as $mobileSubSubMenu)
                                 <?php $mobileSubSubSubMenus = DB::table('menus')->where('parent',$mobileSubSubMenu->id)->get(); ?>
                                 <li>
                                     @if($mobileSubSubSubMenus->count() > 0)
                                     <span class="caret">{{ $mobileSubSubMenu->name }}</span>
                                     <ul class="nested nested2">
                                        @foreach($mobileSubSubSubMenus as $mobileSubSubSubMenu)
                                        <li>
                                            <a href="/page/{{ $mobileMenu->slug }}/{{ $mobileSubMenu->slug }}/{{ $mobileSubSubMenu->slug }}/{{$mobileSubSubSubMenu->slug}}">{{ $mobileSubSubSubMenu->name }}</a>
                                        </li>
                                        @endforeach
                                     </ul>
                                     @else
                                     <a href="/page/{{ $mobileMenu->slug }}/{{ $mobileSubMenu->slug }}/{{ $mobileSubSubMenu->slug }}">{{ $mobileSubSubMenu->name }}</a>
                                     @endif
                                </li>
                                 @endforeach
                           </ul>
                           @else
                              <a href="/page/{{ $mobileMenu->slug }}/{{ $mobileSubMenu->slug }}"><span>{{ $mobileSubMenu->name }}</span></a>
                           @endif
                        </li>
                        @endforeach
                     </ul>
                  </li>
               </ul>
            </li>
            @else
            <a href="/page/{{ $mobileMenu->slug }}">{{ $mobileMenu->name }}</a>
            @endif
            @endforeach
         </div>
         <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</span>
         <span><a href="m-version-logo">
         <img src="assets/image/logo.png" alt="" height="40">
         </a></span>
      </div>
      @yield('homeContent')
      <footer>
         <section class="footer-widget-area footer-widget-area-bg">
            <div class="container">
               <div class="row">
                  <div class="col-md-3 col-sm-6 col-xs-12">
                     <div class="footer-widget"data-aos="fade-right" data-aos-duration="3000">
                        <div class="sidebar-widget-wrapper">
                           <div class="footer-widget-header clearfix">
                              <img src="{{ asset($company->logo) }}">
                           </div>
                           <p>{{ $company->about_company }} </p>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-2 col-sm-12 col-xs-12">
                     <div class="footer-widget clearfix" data-aos="fade-up" data-aos-duration="3000">
                        <div class="sidebar-widget-wrapper">
                           <div class="footer-widget-header clearfix">
                              <h3>Support Links</h3>
                           </div>
                           <?php $footerLinks = DB::table('footer_links')->get(); ?>
                           <ul class="footer-useful-links">
                              @foreach ($footerLinks as $footerLink)
                                 @if ($footerLink->outer_link)
                                 <li> <a href="{{ $footerLink->outer_link }}"> <i class="fas fa-long-arrow-alt-right"></i>{{ $footerLink->name }}</a> </li>
                                 @else
                                 <li> <a href="{{ $footerLink->url }}"> <i class="fas fa-long-arrow-alt-right"></i>{{ $footerLink->name }}</a> </li>
                                 @endif
                              @endforeach
                           </ul>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-3 col-sm-6 col-xs-12">
                     <div class="footer-widget" data-aos="fade-up" data-aos-duration="3000">
                        <div class="sidebar-widget-wrapper">
                           <div class="footer-widget-header clearfix">
                              <h3>Contact Us</h3>
                           </div>
                           <div class="textwidgets">
                              <p><i class="fas fa-location-arrow"></i>{{ $company->address }}</p>
                              @foreach ($emails as $email)
                              <p><i class="fas fa-envelope"></i><a href="mailto:{{ $email }}"> {{ $email }}</a></p>
                              @endforeach
                              @foreach ($phones as $phone)
                              <p><i class="fas fa-phone"></i><a href="tel:{{ $phone }}"> {{ $phone }}</a></p>
                              @endforeach
                           </div>
                        </div>
                     </div>
                  </div>
                  <!--  end .col-md-4 col-sm-12 -->
                  <!--  end .col-md-4 col-sm-12 -->
                  <div class="col-md-4 col-sm-6 col-xs-12">
                     <div class="footer-widget" data-aos="fade-down" data-aos-duration="3500">
                        <div class="sidebar-widget-wrapper">
                           <div class="footer-widget-header clearfix">
                              <h3>Subscribe Us</h3>
                           </div>
                           <div class="social-icon">
                              @foreach ($contactUs as $con)
                              <a href="{{ $con->url }}" title="{{ $con->name }}" class="icon-button facebook"><i class="{{ $con->icon }}"></i><span></span></a>
                              @endforeach
                           </div>
                        </div>
                     </div>
                  </div>
                  <!--  end .col-md-4 col-sm-12 -->
               </div>
               <!-- end row  -->
               <div class="row coder-line"></div>
               <div class="row coder" data-aos="fade-up" data-aos-duration="3000">
                  <div class="col-md-6"> Copyright:  Alledged Limited.  All Rights Reserved. </div>
                  <div class="col-md-6 text-right">
                     <div class="coder71" style="text-align:right; padding-right:32px;"> Design &amp; Developed By: <a href="" target="_blank">M. A. Kayum</a> </div>
                  </div>
               </div>
            </div>
            <!-- end .container  -->
         </section>
         <!--  end .footer-widget-area  -->
         <!--FOOTER CONTENT  -->
         <!--  end .footer-content  -->
      </footer>
      </div>
      <!--/.container-->
      </div>
      <!--/.footer-->
      </footer>
      <div id="stop" class="scrollTop"> <span><a href=""><i class="fas fa-long-arrow-alt-up"></i></a></span> </div>
      @include('sweetalert::alert')
      <script type="text/javascript">
         (function($) {
           $.fn.menumaker = function(options) {
            var cssmenu = $(this), settings = $.extend({
              format: "dropdown",
              sticky: false
            }, options);
            return this.each(function() {
              $(this).find(".button").on('click', function(){
                $(this).toggleClass('menu-opened');
                var mainmenu = $(this).next('ul');
                if (mainmenu.hasClass('open')) {
                  mainmenu.slideToggle().removeClass('open');
                }
                else {
                  mainmenu.slideToggle().addClass('open');
                  if (settings.format === "dropdown") {
                    mainmenu.find('ul').show();
                  }
                }
              });
              cssmenu.find('li ul').parent().addClass('has-sub');
              multiTg = function() {
                cssmenu.find(".has-sub").prepend('<span class="submenu-button"></span>');
                cssmenu.find('.submenu-button').on('click', function() {
                  $(this).toggleClass('submenu-opened');
                  if ($(this).siblings('ul').hasClass('open')) {
                    $(this).siblings('ul').removeClass('open').slideToggle();
                  }
                  else {
                    $(this).siblings('ul').addClass('open').slideToggle();
                  }
                });
              };
              if (settings.format === 'multitoggle') multiTg();
              else cssmenu.addClass('dropdown');
              if (settings.sticky === true) cssmenu.css('position', 'fixed');
              resizeFix = function() {
               var mediasize = 1000;
               if ($( window ).width() > mediasize) {
                cssmenu.find('ul').show();
              }
              if ($(window).width() <= mediasize) {
                cssmenu.find('ul').hide().removeClass('open');
              }
            };
            resizeFix();
            return $(window).on('resize', resizeFix);
          });
          };
         })(jQuery);

         (function($){
         $(document).ready(function(){
           $("#cssmenu").menumaker({
            format: "multitoggle"
          });
         });
         })(jQuery);

      </script>
      <script>
         window.onscroll = function() {myFunction()};

         var navbar = document.getElementById("top");
         var sticky = navbar.offsetTop;

         function myFunction() {
           if (window.pageYOffset >= sticky) {
             navbar.classList.add("sticky")
           } else {
             navbar.classList.remove("sticky");
           }
         }
      </script>
      <script>
         function openNav() {
           document.getElementById("mySidenav").style.width = "250px";
         }

         function closeNav() {
           document.getElementById("mySidenav").style.width = "0";
         }
      </script>
      <script>
         var toggler = document.getElementsByClassName("caret");
         var i;

         for (i = 0; i < toggler.length; i++) {
           toggler[i].addEventListener("click", function() {
             this.parentElement.querySelector(".nested").classList.toggle("active");
             this.classList.toggle("caret-down");
           });
         }
      </script>
      <script>
         $(document).ready(function() {

         $('.donor').owlCarousel({
             loop:true,
             margin:10,
             nav:false,
             autoplay:true,
             dots:true,

              autoplayTimeout:4000,
             responsive:{
                 0:{
                     items:1
                 },
                 600:{
                     items:3
                 },
                 1000:{
                     items:4
                 }
             }
         })
         })



         $(document).ready(function() {

         $('.donor2').owlCarousel({
             loop:true,
             margin:10,
             nav:false,
             autoplay:true,
             dots:true,

              autoplayTimeout:4000,
             responsive:{
                 0:{
                     items:1
                 },
                 600:{
                     items:3
                 },
                 1000:{
                     items:2
                 }
             }
         })
         })



         $(document).ready(function() {

         $('.clients-logo').owlCarousel({
             loop:true,
             margin:10,
             nav:false,
             autoplay:true,
             dots:true,

              autoplayTimeout:4000,
             responsive:{
                 0:{
                     items:2
                 },
                 600:{
                     items:3
                 },
                 1000:{
                     items:5
                 }
             }
         })
         })



      </script>
      <script>
         $(document).ready(function() {
           /******************************
               BOTTOM SCROLL TOP BUTTON
            ******************************/

           // declare variable
           var scrollTop = $(".scrollTop");

           $(window).scroll(function() {
             // declare variable
             var topPos = $(this).scrollTop();

             // if user scrolls down - show scroll to top button
             if (topPos > 100) {
               $(scrollTop).css("opacity", "1");

             } else {
               $(scrollTop).css("opacity", "0");
             }

           }); // scroll END

           //Click event to scroll to top
           $(scrollTop).click(function() {
             $('html, body').animate({
               scrollTop: 0
             }, 800);
             return false;

           }); // click() scroll top EMD

           /*************************************
             LEFT MENU SMOOTH SCROLL ANIMATION
            *************************************/
           // declare variable
           var h1 = $("#h1").position();
           var h2 = $("#h2").position();
           var h3 = $("#h3").position();

           $('.link1').click(function() {
             $('html, body').animate({
               scrollTop: h1.top
             }, 500);
             return false;

           }); // left menu link2 click() scroll END

           $('.link2').click(function() {
             $('html, body').animate({
               scrollTop: h2.top
             }, 500);
             return false;

           }); // left menu link2 click() scroll END

           $('.link3').click(function() {
             $('html, body').animate({
               scrollTop: h3.top
             }, 500);
             return false;

           }); // left menu link3 click() scroll END

         }); // ready() END
      </script>
      <script type="text/javascript">
         $('.counter').each(function() {
         var $this = $(this),
             countTo = $this.attr('data-count');

         $({ countNum: $this.text()}).animate({
           countNum: countTo
         },

         {

           duration: 8000,
           easing:'linear',
           step: function() {
             $this.text(Math.floor(this.countNum));
           },
           complete: function() {
             $this.text(this.countNum);
             //alert('finished');
           }

         });



         });
      </script>
      <script type="text/javascript">
         var dropdown = document.getElementsByClassName("dropdown-btn");
         var i;

         for (i = 0; i < dropdown.length; i++) {
           dropdown[i].addEventListener("click", function() {
             this.classList.toggle("active");
             var dropdownContent = this.nextElementSibling;
             if (dropdownContent.style.display === "block") {
               dropdownContent.style.display = "none";
             } else {
               dropdownContent.style.display = "block";
             }
           });
         }
      </script>
      <script>// accordion
         var acc = document.getElementsByClassName("accordion");
         var i;

         for (i = 0; i < acc.length; i++) {
           acc[i].addEventListener("click", function() {
             this.classList.toggle("active");
             var panel = this.nextElementSibling;
             if (panel.style.maxHeight) {
               panel.style.maxHeight = null;
             } else {
               panel.style.maxHeight = panel.scrollHeight + "px";
             }
           });
         }
      </script>
      <script type="text/javascript">
         ///////////////// fixed menu on scroll for desktop
         if ($(window).width() > 992) {
         $(window).scroll(function(){
            if ($(this).scrollTop() > 40) {
               $('#navbar_top').addClass("fixed-top");
               // add padding top to show content behind navbar
               $('body').css('padding-top', $('.navbar').outerHeight() + 'px');
             }else{
               $('#navbar_top').removeClass("fixed-top");
                // remove padding top from body
               $('body').css('padding-top', '0');
             }
         });
         } // end if
      </script>
      <script type="text/javascript">
         filterSelection("all") // Execute the function and show all columns
         function filterSelection(c) {
         var x, i;
         x = document.getElementsByClassName("column");
         if (c == "all") c = "";
         // Add the "show" class (display:block) to the filtered elements, and remove the "show" class from the elements that are not selected
         for (i = 0; i < x.length; i++) {
           w3RemoveClass(x[i], "show");
           if (x[i].className.indexOf(c) > -1) w3AddClass(x[i], "show");
         }
         }

         // Show filtered elements
         function w3AddClass(element, name) {
         var i, arr1, arr2;
         arr1 = element.className.split(" ");
         arr2 = name.split(" ");
         for (i = 0; i < arr2.length; i++) {
           if (arr1.indexOf(arr2[i]) == -1) {
             element.className += " " + arr2[i];
           }
         }
         }

         // Hide elements that are not selected
         function w3RemoveClass(element, name) {
         var i, arr1, arr2;
         arr1 = element.className.split(" ");
         arr2 = name.split(" ");
         for (i = 0; i < arr2.length; i++) {
           while (arr1.indexOf(arr2[i]) > -1) {
             arr1.splice(arr1.indexOf(arr2[i]), 1);
           }
         }
         element.className = arr1.join(" ");
         }

         // Add active class to the current button (highlight it)
         var btnContainer = document.getElementById("myBtnContainer");
         var btns = btnContainer.getElementsByClassName("btn");
         for (var i = 0; i < btns.length; i++) {
         btns[i].addEventListener("click", function(){
           var current = document.getElementsByClassName("active");
           current[0].className = current[0].className.replace(" active", "");
           this.className += " active";
         });
         }
      </script>
      <script type="text/javascript"> //managemenent gallery
         var $cell = $('.card');

         $cell.find('.js-expander').click(function() {

         var $thisCell = $(this).closest('.card');

         if ($thisCell.hasClass('is-collapsed')) {
           $cell.not($thisCell).removeClass('is-expanded').addClass('is-collapsed').addClass('is-inactive');
           $thisCell.removeClass('is-collapsed').addClass('is-expanded');

           if ($cell.not($thisCell).hasClass('is-inactive')) {

           } else {
             $cell.not($thisCell).addClass('is-inactive');
           }

         } else {
           $thisCell.removeClass('is-expanded').addClass('is-collapsed');
           $cell.not($thisCell).removeClass('is-inactive');
         }
         });

         $cell.find('.js-collapser').click(function() {

         var $thisCell = $(this).closest('.card');

         $thisCell.removeClass('is-expanded').addClass('is-collapsed');
         $cell.not($thisCell).removeClass('is-inactive');

         });
      </script>
      <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
      <script>
         AOS.init();
      </script>
      <script src="{{ asset('assets/frontend') }}/js/bootstrap.min.js"></script>
      <script src="{{ asset('assets/frontend') }}/js/owl.carousel.js"></script>
      <script src="{{ asset('assets/frontend') }}/js/sticky-sidebar.js"></script>
      <script src="{{ asset('assets/frontend') }}/js/wow.min.js"></script>
   </body>
</html>
