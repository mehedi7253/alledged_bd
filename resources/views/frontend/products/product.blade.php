@extends('frontend.layout.app')
@section('title')
    {{ @$title }}
@endsection

@section('homeContent')
    <div class="events-page" style="background-image: url({{ asset(@$menu->background_image) }});
    background-position: center;
    background-repeat: no-repeat; height: auto;">
    @php
        $t = "";
        if(@$_GET["p"]){
            $p_id = \Illuminate\Support\Facades\Crypt::decryptString($_GET["p"]);
            $t = \DB::table('blog_categories')->where('id',$p_id)->first();
        }elseif(@$_GET["b"]){
            $b_id = \Illuminate\Support\Facades\Crypt::decryptString($_GET["b"]);
            $t = \DB::table('social_links')->where('id',$b_id)->first();
        }else{
            $t = @$menu->title;
        }
        @endphp

        <div class="container">
            <div class="row">
                <div class="col-md-12 col-ms-12 text-center">
                    <div class="heading-2">
                        <h2 class="text-light" data-aos="fade-up" data-aos-duration="3000">{{@ $t->name }}</h2>
                        </h2>
                        <br>
                        <!-- <p class="" data-aos="fade-up" data-aos-duration="3000">{{ @$menu->heading }}</p> -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- <div class="container catelogs-tabs">
        <div class="row mt-5">
            <?php $categories = DB::table('blog_categories')->whereNull('parent')->get(); ?>
            <div class="col-md-3">
                <div class="form-group">
                    <select id="category" class="form-control" onchange="return getData()">
                        @foreach ($categories as $cat)
                            <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <select id="subCategory" class="form-control"  onchange="return changeSubCategory()">

                    </select>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <select id="brand" class="form-control" onchange="return changeSubCategory()">
                    </select>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <select id="productType" class="form-control" onchange="return changeSubCategory()">
                        <option value="1">Design</option>
                        <option value="2">Catalogue</option>
                        <option value="3">Technical Specification</option>
                    </select>
                </div>
            </div>

        </div>
    </div> -->


    <div class="bborder">
      <div class="container">
         <div class="row ">
            <div class="pro-butnss" style="border-right: 1px solid #ddd">
               <div class="homeicns p-2 text-center"><a href="#"><i class="fa fa-home fx" style="color: #333"></i></a></div>
            </div>

            <div class="pro-butns">
               <div class="custom-select2 op1">
                  <select class="op11">
                      <option>Select<option>
                     <!-- <option value="0">Elevator</option>
                     <option value="1">Generator</option>
                     <option value="2">Substation</option>
                     <option value="0" >Select<option> -->
                       @php
                            $subMenus = DB::table('blog_categories')->whereNull('parent')->get();
                        @endphp
                        @if ($subMenus->count() > 0)
                        @foreach($subMenus as $sub)
                        <option class="ssub" value="{{$sub->id}}">{{$sub->name}}</option>
                        @endforeach
                        @endif
                     <!-- <option value="1">Generator</option>
                     <option value="2">Substation</option> -->
                  </select>
                  </select>
               </div>
            </div>

            <div class="pro-butns">
               <div class="custom-select2 op2">
                  <select>
                     <option>Select</option>
                     <!-- <option value="1">Bed/Hospital Elevator</option>
                     <option value="2">Freight/Cargo Elevator</option>
                     <option value="3">Car Elevator</option>
                     <option value="4">Escalator</option> -->
                  </select>
               </div>
            </div>
            <div class="pro-butns">
               <div class="custom-select2 brand">
                  <select>
                    <option>Select</option>
                     <!-- <option value="1">GYG</option>
                     <option value="2">Canny</option> -->
                  </select>
               </div>
            </div>
         </div>
      </div>
   </div>

    <div class="bgclors" style="background-color: #f7f7f7; padding: 50px 0">
               <div class="container">
                  <div class="row">
                     <div class="col-md-12">
                        <h2 class="mb-3 pro-titile" data-aos="fade-up" data-aos-duration="3000">

                            <!-- Ultra-High Speed Elevator -->
                            {{ @$t->page_title }}
                        </h2>
               <p class="pro-ubtitle"data-aos="fade-up" data-aos-duration="3000">
                    {{ @$t->page_des }}
                   <!-- Hyundai Elevator has succeeded in developing the world's fastest speed 21m/s elevator in March 2020 with its independent high-speed technology. -->
                  <!-- It will continue on leading the world best high-speed technology after the nation’s fastest elevator 18m/s elevator developed in 2009. -->
               </p>
                     </div>
                  </div>
                  <div class="row mt-5">
                  <div class="elevetor owl-carousel owl-theme">

                @if(count(@$products)>0)
                    @foreach($products as $product)
                    <div class="item">
                        <div class="Greetings-images mb-4 text-center" data-aos="fade-up" data-aos-duration="3000">
                           <img src="{{ asset($product->image)}}">
                           <p>{{@$product->name}}</p>
                        </div>
                     </div>
                    @endforeach
                @else
                    <p class="text-info">No Record Found</p>
                @endif

                     <!-- <div class="item">
                        <div class="Greetings-images mb-4 text-center" data-aos="fade-up" data-aos-duration="3000">
                           <img src="assets/image/elevetor-01.jpg">
                           <p>Elevetor</p>
                        </div>
                     </div>
                     <div class="item">
                        <div class="Greetings-images mb-4 text-center" data-aos="fade-up" data-aos-duration="3000">
                           <img src="assets/image/elevetor-01.jpg">
                           <p>Elevetor</p>
                        </div>
                     </div>
                     <div class="item">
                        <div class="Greetings-images mb-4 text-center" data-aos="fade-up" data-aos-duration="3000">
                           <img src="assets/image/elevetor-01.jpg">
                           <p>Elevetor</p>
                        </div>
                     </div>
                     <div class="item">
                        <div class="Greetings-images mb-4 text-center" data-aos="fade-up" data-aos-duration="3000">
                           <img src="assets/image/elevetor-01.jpg">
                           <p>Elevetor</p>
                        </div>
                     </div>
                     <div class="item">
                        <div class="Greetings-images mb-4 text-center" data-aos="fade-up" data-aos-duration="3000">
                           <img src="assets/image/elevetor-01.jpg">
                           <p>Elevetor</p>
                        </div>
                     </div> -->
                  </div>
               </div>
               </div>
            </div>

   <section id="overviews">
      <div class="container">
         <div class="row mt-5">
            <div class="col-md-12">

                @if(@$msw)
               <div class="row my-5">
                  <div class="col-md-4">
                     <h5>{{@$msw->title}}</h5>
                     <p>{{@$msw->des}}</p>
                  </div>
                  <div class="col-md-8 movingss">
                     <img src="{{$msw->img}}" class="img-fluid">
                  </div>
               </div>

               <hr>
               <br>
               <br>
               @endif

               @if(@$pfs)
               <div class="row my-9">
               @foreach($pfs as $pf)
                <div class="col-md-4 col-12 mb-4">
                     <div class="motions">
                        <i class="{{$pf->icon}} 5x"></i>
                        <h6>{{$pf->title}}</h6>
                     </div>
                    <p>{{$pf->des}}</p>
                </div>
               @endforeach
               </div>
               @endif
            </div>
         </div>
      </div>
      <br>
      </div>
   </section>

   @if(@$catalogs)
   <div class="bgclors" style="background-color: #f7f7f7; padding: 50px 0">
      <!-- <h2 class="mb-5 downtitle" data-aos="fade-up" data-aos-duration="3000">Download Catalog</h2> -->
      <div class="container">
         <div class="video owl-carousel owl-theme">
         @foreach($catalogs as $catalog)
         
            <div class="item">
               <div class="row">
                  <div class="col-md-5 mb-6">
                     <div class="Greetingss-images mb-4 text-center" data-aos="fade-up" data-aos-duration="3000">
                        <a href="{{$catalog->pdf}}" target="_blank" title="download catalog">
                           <img src="{{$catalog->image}}">
                           <p>{{$catalog->title}}</p>
                        </a>
                     </div>
                  </div>
                  <div class="col-md-7 mb-6">
                     <h5 class="mt-3 mb-5">{{$catalog->dis_title}}</h5>
                     <p>{{$catalog->dis}} </p>
                  </div>
               </div>
            </div>
            @endforeach
         </div>

      </div>
   </div>
   @endif

   @if(count(@$youtube_videos)>0)
   <div class="container">
      <div class="row my-5">
         <div class="col-md-6 offset-md-3">

            <h2 class="mb-3 downtitle" data-aos="fade-up" data-aos-duration="3000">Video Gallery</h2>
            <div class="video owl-carousel owl-theme">
            @foreach($youtube_videos as $video)
               <div class="item">
                  <div class="video mt-3 text-center">
                  <?=$video->video_link ?>
                     <!-- <iframe width="100%" height="450" src="{{$video->video_link}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> -->
                  </div>
               </div>
            @endforeach
               <!-- <div class="item">
                  <div class="video mt-3 text-center">
                     <iframe width="100%" height="450" src="https://www.youtube.com/embed/Y9scXQ8LbQg" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                  </div>
               </div> -->

            </div>

         </div>
      </div>
   </div>
   @endif


    <section id="overview">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="mb-3" data-aos="fade-up" data-aos-duration="3000" id="name"></h4>
                    <p class="" data-aos="fade-up" data-aos-duration="3000" id="title">
                    </P>
                    <p class="" data-aos="fade-up" data-aos-duration="3000" id="short_description">
                    </P>
                    <p class="" data-aos="fade-up" data-aos-duration="3000" id="description">
                    </P>
                    <div class="row" id="productList">

                    </div>
                </div>
            </div>
        </div>
        <br>
        </div>
    </section>
    <style>
      .pro-titile{
      font-size: 40px;
      text-align: center;
      font-weight: 400;
      text-transform:none !important;
      margin-bottom: 30px;
      }
      .pro-ubtitle{
      font-size: 18px;
      line-height: 36px;
      margin-top: 30px;
      text-align: center !important;
      font-weight: inherit;
      }
      .motions{
      display: inline-flex;
      }
      .motions i{
      color: #177881;
      margin-right: 15px;
      font-size: 22px;
      }
      .downtitle{
      text-align: center;
      font-weight: 30px;
      color: #177881;
      }
      .homeicns i{font-size: 21px;
      padding: 16px;
      color: #177881 !important;
      }
      .movingss img{
      width: 100%;
      }
      .pro-butns select{
      text-transform: none;
      padding: 9px !important;
      height: 65px !important;
      border-radius: 0 !important;
      border-left: none;
      border-bottom: none;
      }
      .pro-butns option{
      text-transform: none;
      padding: 9px !important;
      height: 65px !important;
      border-radius: 0 !important;
      border-left: none;
      border-bottom: none;
      background-color: #fff;
      color: #333;
      }
      .pro-butns .form-control {
      border-radius: 0px!important
      font-size: 20px;
      }
      .pro-butns{
      width: 30%;
      }
      .bborder{
      border-bottom: 1px solid #ddd;
      }
      .Greetingss-images img{
      width: 100%;
      }
      .pro-butns .form-control:focus {
      color: #fff;
      background-color: #177881;
      }
      .pro-butns .form-control option{
      font-size: 16px !important;
      border-radius: 0px !important;
      background-color: none !important;
      padding: 20px;
      line-height: 2;
      box-shadow: none !important;
      }
      .pro-butns .form-control .option:hover{
      background-color: red;
      }
      .custom-select2 {
      position: relative;
      }
      .custom-select2 select {
      display: none;
      }
      .select-selected {
      background-color: #fff;
      }
      .select-selected:after {
      position: absolute;
      content: "";
      top: 30px;
      right: 20px;
      width: 0;
      height: 0;
      border: 6px solid transparent;
      border-color: #177881 transparent transparent transparent;
      }
      .select-selected.select-arrow-active:after {
      border-color: transparent transparent #fff transparent;
      top: 22px;
      }
      .select-arrow-active{
      background-color: #177881;
      color: #fff;
      }
      .select-items div,.select-selected {
      padding: 20px 16px;
      border: 1px solid transparent;
      border-color: transparent rgba(0, 0, 0, 0.2) transparent transparent;
      cursor: pointer;
      user-select: none;
      font-size: 16px;
      }
      .select-items div {
      padding: 8px 16px;
      }
      .select-items {
      position: absolute;
      background-color: #fff;
      top: 100%;
      left: 0;
      right: 0;
      z-index: 99;
      border:1px solid #ddd;
      }
      .select-hide {
      display: none;
      }
      .select-items div:hover, .same-as-selected {
      color: #177881;
      text-decoration: underline;
      }

      @media (max-width: 1000px) {
      .pro-butns{
      width: 100%;
      }
      }
   </style>
   <script>
       $(document).ready(function() {

      $('.elevetor').owlCarousel({
        loop:false,
        margin:20,
        nav:false,
        autoplay:true,
        dots:true,
        slideSpeed: 200,
        paginationSpeed: 500,
        singleItem: true,
        navigation: true,
        scrollPerPage: true,
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
      });

       $(document).ready(function() {

      $('.video').owlCarousel({
        loop:false,
        margin:20,
        nav:false,
        autoplay:true,
        dots:true,
        slideSpeed: 200,
        paginationSpeed: 500,
        singleItem: true,
        navigation: true,
        scrollPerPage: true,
        autoplayTimeout:4000,
        responsive:{
          0:{
            items:1
          },
          600:{
            items:1
          },
          1000:{
            items:1
          }
        }
      })
      });

   </script>
   <script>



      var x, i, j, l, ll, selElmnt, a, b, c;
      x = document.getElementsByClassName("custom-select2");
      l = x.length;
      for (i = 0; i < l; i++) {
      selElmnt = x[i].getElementsByTagName("select")[0];
      ll = selElmnt.length;
      a = document.createElement("DIV");
      a.setAttribute("class", "select-selected");
      a.innerHTML = selElmnt.options[selElmnt.selectedIndex].innerHTML;
      x[i].appendChild(a);
      b = document.createElement("DIV");
      b.setAttribute("class", "select-items select-hide");
      for (j = 1; j < ll; j++) {
      c = document.createElement("DIV");
      c.innerHTML = selElmnt.options[j].innerHTML;
      c.addEventListener("click", function(e) {
        var y, i, k, s, h, sl, yl;
        s = this.parentNode.parentNode.getElementsByTagName("select")[0];
        sl = s.length;
        h = this.parentNode.previousSibling;
        for (i = 0; i < sl; i++) {
          if (s.options[i].innerHTML == this.innerHTML) {
            s.selectedIndex = i;
            h.innerHTML = this.innerHTML;
            y = this.parentNode.getElementsByClassName("same-as-selected");
            yl = y.length;
            for (k = 0; k < yl; k++) {
              y[k].removeAttribute("class");
            }
            this.setAttribute("class", "same-as-selected");
            break;
          }
        }
        h.click();
      });
      b.appendChild(c);
      }
      x[i].appendChild(b);
      a.addEventListener("click", function(e) {
      e.stopPropagation();
      closeAllSelect(this);
      this.nextSibling.classList.toggle("select-hide");
      this.classList.toggle("select-arrow-active");
      });
      }
      function closeAllSelect(elmnt) {
      var x, y, i, xl, yl, arrNo = [];
      x = document.getElementsByClassName("select-items");
      y = document.getElementsByClassName("select-selected");
      xl = x.length;
      yl = y.length;
      for (i = 0; i < yl; i++) {
      if (elmnt == y[i]) {
      arrNo.push(i)
      } else {
      y[i].classList.remove("select-arrow-active");
      }
      }
      for (i = 0; i < xl; i++) {
      if (arrNo.indexOf(i)) {
      x[i].classList.add("select-hide");
      }
      }
      }
      document.addEventListener("click", closeAllSelect);


      $(document).on("click",".op1",function(){
        console.log($(".select-selected").html());
        const name = $(".select-selected").html();
        $.ajax({
            type: "get",
            url: '{{route("get_sub")}}',
            data: {"_token":"{{ csrf_token() }}","name":name, "l":"1"},
            success: function (response) {
                const {rp,data} = response
                let sub = `<select><option value="0">Select</option>`;
                let hdiv =`<div id="oop2" class="select-selected">Select</div><div id="oop21" class="select-items select-hide">`
                if(rp !=1){
                    window.location = data;
                }else{
                    for (let i = 0; i <data.length; i++) {
                        sub +=`<option value="${data[i].id}">${data[i].name}</option>`;
                        // customs +=`<option value="${data[i].id}">${data[i].name}</option>`
                        hdiv +=`<div class="s_item">${data[i].name}</div>`

                    }
                    hdiv +=`</div>`;

                    sub +=`</select> ${hdiv}`
                    $(".op2").html(sub);
                }

            }
        });
      })

      $(document).on("click",".op2",function(){
         $("#oop2").addClass("select-arrow-active");
         $("#oop21").removeClass("select-hide")
      })

      $(document).on("click",".s_item",function(){
            $("#oop21").addClass("select-hide");
            $("#oop2").removeClass("select-arrow-active");
            $("#oop2").html($(this).html());
            const name = $(this).html();
            $.ajax({
                type: "get",
                url: '{{route("get_sub")}}',
                data: {"_token":"{{ csrf_token() }}","name":name,"l":"2"},
                success: function (response) {
                    let sub = `<select><option value="0">Select</option>`;
                    let hdiv =`<div id="brand1" class="select-selected">Select</div><div id="brand11" class="select-items select-hide">`
                    const {rp,data} = response
                    if(rp !=1){
                        window.location = data;
                    }else{
                        $(".brand").html(data);
                        $(".brand").trigger("click");
                        $("#brand1").addClass("select-arrow-active");
                        $("#brand11").removeClass("select-hide")
                    }
                }
            })
        })

        $(document).on("click",".brand",function(){
            $("#brand1").addClass("select-arrow-active");
            $("#brand11").removeClass("select-hide")
        })


   </script>
@endsection
