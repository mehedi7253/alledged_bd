@extends('frontend.layout.app')
@section('title')
    {{ $title }}
@endsection

@section('homeContent')
<div id="transcroller-body" class="aos-all">
  <!--<div class="banner">-->
  <!--   <div class="container-fluid">-->
  <!--      <div class="row">-->
  <!--       <?php $sliders = DB::table('sliders')->get(); ?>-->
  <!--         <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">-->
  <!--            <ol class="carousel-indicators">-->
  <!--               @foreach ($sliders as $b=> $button)-->
  <!--               <li data-target="#carouselExampleIndicators" data-slide-to="{{ $b }}" class="{{ ($b == 0) ? 'active' : ''}}"></li>-->
  <!--               @endforeach-->
  <!--            </ol>-->
              
  <!--            <div class="carousel-inner">-->
  <!--               @foreach ($sliders as $s=> $slider)-->
                 <!--<div class="carousel-item {{ ($s == 0) ? 'active' : ''}}">-->
                 <!--    <img class="d-block w-100" src="{{ asset($slider->image) }}" alt="First slide">-->
                 <!--    <div class="carousel-caption">-->
                 <!--       <div class="slider-text animate__animated animate__slideInLeft animate__delay-1s">{{ $slider->image_text }}</div>-->
                 <!--       <div class="slider-text animate__animated animate__fadeInDownBig">{{ $slider->image_text_2 }}</div>-->
                 <!--    </div>-->
                 <!-- </div>-->
  <!--                <div class="carousel-item active">-->
  <!--                  <img class="d-block w-100" src="{{ asset($slider->image) }}" alt="First slide">-->
  <!--                  <div class="carousel-caption">-->
  <!--                    <div class="row">-->
  <!--                      <div class="col-md-8">-->
  <!--                        <div class="slider-text animate__animated animate__slideInLeft animate__delay-1s">{{ $slider->image_text }}</div>-->
  <!--                    <div class="slider-text animate__animated animate__fadeInDownBig"> {{ $slider->image_text_2 }}</div>-->
  <!--                      </div>-->
  <!--                      <div class="col-md-4 animate__animated animate__slideInRight animate__delay-1s "><img src="{{ asset($slider->icon_image) }}" height="300" width="300"></div>-->
  <!--                    </div>-->
  <!--                  </div>-->
  <!--                </div>-->
  <!--                @endforeach-->
  <!--            </div>-->
  <!--            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev"> <span class="carousel-control-prev-icon" aria-hidden="true"></span> <span class="sr-only">Previous</span> </a> <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next"> <span class="carousel-control-next-icon" aria-hidden="true"></span> <span class="sr-only">Next</span> </a> -->
  <!--         </div>-->
  <!--      </div>-->
  <!--   </div>-->
  <!--</div>-->
  
  <div class="banner">
      <div class="container-fluid">
         <div class="row">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
               <ol class="carousel-indicators">
                  @foreach ($sliders as $b=> $button)
                  <li data-target="#carouselExampleIndicators" data-slide-to="{{$b}}" class="{{ ($b == 0) ? 'active' : ''}}"></li>
                  @endforeach
               </ol>
               <div class="carousel-inner">
                  @foreach ($sliders as $s=> $slider)
                  <div class="carousel-item {{ ($s == 0) ? 'active' : ''}}">
                     <img class="d-block w-100" src="{{ asset($slider->image) }}" alt="First slide">
                     <div class="carousel-caption">
                        <div class="row">
                           <div class="col-md-12">
                              <div class="slider-text animate__animated animate__slideInLeft animate__delay-1s text-center">{{ $slider->image_text }}</div>
                              <div class="slider-text33 animate__animated animate__fadeInDownBig text-center"> {{ $slider->image_text_2 }}</div>
                           </div><!---
                           <div class="col-md-4 animate__animated animate__slideInRight animate__delay-1s "><img src="{{ asset($slider->icon_image) }}" height="300" width="300"></div>-->
                        </div>
                     </div>
                  </div>
                @endforeach
               </div>
               <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev"> <span class="carousel-control-prev-icon" aria-hidden="true"></span> <span class="sr-only">Previous</span> </a> <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next"> <span class="carousel-control-next-icon" aria-hidden="true"></span> <span class="sr-only">Next</span> </a> 
            </div>
         </div>
      </div>
   </div>
  <!---------------------------------------- about us-------------------------->
  <?php $sections = DB::table('sections')->get(); ?>
  <div class="aboutus">
     <div class="container">
        <div class="row">
           <div class="col-md-8 col-sm-12 mt-2">
              <div class="alledgedabout">
                 <h2 class="aos-item" data-aos="fade-down" data-aos-duration="3000"><span>{{ $sections[0]->name }}</span></h2>
                 <p class="" data-aos="fade-up" data-aos-duration="2000"><?php echo $sections[0]->description;?>
                 </p>
              </div>
           </div>
           <div class="col-md-4 aos-item" data-aos="fade-left" data-aos="fade-right" data-aos-duration="3000">
              <div class="about-right-image"><img src="{{ asset($sections[0]->image) }}" class="img-fluid"></div>
              <p style="text-align: center;
                 margin: auto;
                 color: #cdaf57;
                 font-size: 18px;
                 background: #177881;
                 padding: 2px;
                 font-weight: bold;
                 font-size: 16px;
font-weight: 400;
color: #fff;
background: #177881a6;
width: 85%;
text-align: center;
margin: auto;
    margin-top: auto;
border-radius: 8px;
top: -38px;
z-index: 11;
margin-top: 5px;
position: relative;
padding: 6px;
border: 1px solid #fff;">Our Corporate Office Building</p>
           </div>
        </div>
     </div>
  </div>
  <div data-aos="fade-up" data-aos-duration="3000"></div>
  <div id="particle-canvas">
     <div class="canvers-tst">
        <div class="heading-3 bottom-spach text-uppercase" data-aos="fade-up" data-aos-duration="2000">{{ $sections[1]->name }}
        </div>
        <div class="about-button text-center" data-aos="fade-up" data-aos-duration="3000"><a href="/page/contact-us" type="button" class="btn btn-successess btn-lg">Contact Us</a></div>
     </div>
  </div>
  <style type="text/css">
     #particle-canvas {
     width: 100%;
     height: 600px;
     margin: 0;
     padding: 0;
     overflow: hidden;
     }
  </style>
  <script type="text/javascript">
     !function(a){var b="object"==typeof self&&self.self===self&&self||"object"==typeof global&&global.global===global&&global;"function"==typeof define&&define.amd?define(["exports"],function(c){b.ParticleNetwork=a(b,c)}):"object"==typeof module&&module.exports?module.exports=a(b,{}):b.ParticleNetwork=a(b,{})}(function(a,b){var c=function(a){this.canvas=a.canvas,this.g=a.g,this.particleColor=a.options.particleColor,this.x=Math.random()*this.canvas.width,this.y=Math.random()*this.canvas.height,this.velocity={x:(Math.random()-.5)*a.options.velocity,y:(Math.random()-.5)*a.options.velocity}};return c.prototype.update=function(){(this.x>this.canvas.width+20||this.x<-20)&&(this.velocity.x=-this.velocity.x),(this.y>this.canvas.height+20||this.y<-20)&&(this.velocity.y=-this.velocity.y),this.x+=this.velocity.x,this.y+=this.velocity.y},c.prototype.h=function(){this.g.beginPath(),this.g.fillStyle=this.particleColor,this.g.globalAlpha=.7,this.g.arc(this.x,this.y,1.5,0,2*Math.PI),this.g.fill()},b=function(a,b){this.i=a,this.i.size={width:this.i.offsetWidth,height:this.i.offsetHeight},b=void 0!==b?b:{},this.options={particleColor:void 0!==b.particleColor?b.particleColor:"#fff",background:void 0!==b.background?b.background:"#1a252f",interactive:void 0!==b.interactive?b.interactive:!0,velocity:this.setVelocity(b.speed),density:this.j(b.density)},this.init()},b.prototype.init=function(){if(this.k=document.createElement("div"),this.i.appendChild(this.k),this.l(this.k,{position:"absolute",top:0,left:0,bottom:0,right:0,"z-index":1}),/(^#[0-9A-F]{6}$)|(^#[0-9A-F]{3}$)/i.test(this.options.background))this.l(this.k,{background:this.options.background});else{if(!/\.(gif|jpg|jpeg|tiff|png)$/i.test(this.options.background))return console.error("Please specify a valid background image or hexadecimal color"),!1;this.l(this.k,{background:'url("'+this.options.background+'") no-repeat center',"background-size":"cover"})}if(!/(^#[0-9A-F]{6}$)|(^#[0-9A-F]{3}$)/i.test(this.options.particleColor))return console.error("Please specify a valid particleColor hexadecimal color"),!1;this.canvas=document.createElement("canvas"),this.i.appendChild(this.canvas),this.g=this.canvas.getContext("2d"),this.canvas.width=this.i.size.width,this.canvas.height=this.i.size.height,this.l(this.i,{position:"relative"}),this.l(this.canvas,{"z-index":"20",position:"relative"}),window.addEventListener("resize",function(){return this.i.offsetWidth===this.i.size.width&&this.i.offsetHeight===this.i.size.height?!1:(this.canvas.width=this.i.size.width=this.i.offsetWidth,this.canvas.height=this.i.size.height=this.i.offsetHeight,clearTimeout(this.m),void(this.m=setTimeout(function(){this.o=[];for(var a=0;a<this.canvas.width*this.canvas.height/this.options.density;a++)this.o.push(new c(this));this.options.interactive&&this.o.push(this.p),requestAnimationFrame(this.update.bind(this))}.bind(this),500)))}.bind(this)),this.o=[];for(var a=0;a<this.canvas.width*this.canvas.height/this.options.density;a++)this.o.push(new c(this));this.options.interactive&&(this.p=new c(this),this.p.velocity={x:0,y:0},this.o.push(this.p),this.canvas.addEventListener("mousemove",function(a){this.p.x=a.clientX-this.canvas.offsetLeft,this.p.y=a.clientY-this.canvas.offsetTop}.bind(this)),this.canvas.addEventListener("mouseup",function(a){this.p.velocity={x:(Math.random()-.5)*this.options.velocity,y:(Math.random()-.5)*this.options.velocity},this.p=new c(this),this.p.velocity={x:0,y:0},this.o.push(this.p)}.bind(this))),requestAnimationFrame(this.update.bind(this))},b.prototype.update=function(){this.g.clearRect(0,0,this.canvas.width,this.canvas.height),this.g.globalAlpha=1;for(var a=0;a<this.o.length;a++){this.o[a].update(),this.o[a].h();for(var b=this.o.length-1;b>a;b--){var c=Math.sqrt(Math.pow(this.o[a].x-this.o[b].x,2)+Math.pow(this.o[a].y-this.o[b].y,2));c>120||(this.g.beginPath(),this.g.strokeStyle=this.options.particleColor,this.g.globalAlpha=(120-c)/120,this.g.lineWidth=.7,this.g.moveTo(this.o[a].x,this.o[a].y),this.g.lineTo(this.o[b].x,this.o[b].y),this.g.stroke())}}0!==this.options.velocity&&requestAnimationFrame(this.update.bind(this))},b.prototype.setVelocity=function(a){return"fast"===a?1:"slow"===a?.33:"none"===a?0:.66},b.prototype.j=function(a){return"high"===a?5e3:"low"===a?2e4:isNaN(parseInt(a,10))?1e4:a},b.prototype.l=function(a,b){for(var c in b)a.style[c]=b[c]},b});
     
     // Initialisation
     
     var canvasDiv = document.getElementById('particle-canvas');
     var options = {
     particleColor: '#888',
     background: '<?php echo $sections[1]->image;?>',
     interactive: true,
     speed: 'medium',
     density: 'high'
     };
     var particleCanvas = new ParticleNetwork(canvasDiv, options);
  </script>
  <!---------------------------------------- paralux-------------------------->
  <div class="products" style="background-color: #dddddd80; padding: 80px 0px;">
     <div class="container">
        <div class="row">
           <div class="col-md-12">
              <div class="heading bottom-spach">
                 <h2 class=""data-aos="fade-up" data-aos-duration="3000"><span class="title-gold ">{{ $sections[2]->name }}</span></h2>
              </div>
           </div>
        </div>
        <div class="row">
           <div class="col-md-12">
              <p style="text-align: center;" class="pb-3"data-aos="fade-up" data-aos-duration="3000" >{{ $sections[2]->description }}</p>
           </div>
        </div>
        <div class="row" data-aos="fade-up" data-aos-duration="3000">
           <div class="donor owl-carousel owl-theme">
            <?php $products = DB::table('we_bests')->get(); ?>  
            @foreach ($products as $product)
            <div class="item" >
               <div class="col-md-12 Popular-packages">
                  <a href="/page/products">
                     <div class="product-slider">
                        <div class="battery"><img src="{{ asset($product->image) }}" class="img-fluid"></div>
                        <div class="product-subtitle text-center">{{ $product->title }}</div>
                     </div>
                  </a>
               </div>
            </div>
            @endforeach
           </div>
        </div>
     </div>
  </div>
  <!---------------------------------------- paralux-------------------------->
  <div class="services" style="background-image: url({{ asset($sections[3]->image) }}); padding: 150px 0px;background-attachment: fixed;
     background-position: center;
     background-repeat: no-repeat;
     background-size: cover; ">
     <div class="container">
        <div class="row">
           <div class="col-md-12 col-12 col-lg-12">
              <div class="heading-3 bottom-spach text-uppercase">{{ $sections[3]->name }}
              </div>
              <div class="about-button text-center"><a href="/page/contact-us" type="button" class="btn btn-successess btn-lg">Contact Us</a></div>
           </div>
        </div>
     </div>
  </div>
  <div class="services space">
     <div class="container">
        <div class="row">
           <div class="col-md-12">
              <div class="heading bottom-spach" data-aos="fade-right" data-aos-duration="3000">
                 <h2><span class="title-gold">{{ $sections[4]->name }}</span></h2>
              </div>
           </div>
        </div>
        <div class="row" data-aos="fade-left" data-aos-duration="3000">
           <div class="col-md-12">
              <p style="text-align: center;" class="pb-3">{{ $sections[4]->description }}</p>
           </div>
        </div>
        <div class="service-item">
           <div class="row">
            <?php $services = DB::table('services')->get(); ?>
            @foreach ($services as $service)
              <div class="col-md-4 col-sm-6 inner">
                 <div class="media" data-aos="fade-right" data-aos-duration="3000">
                    <div class="service-thumb">
                       <a href=""><img src="{{ asset($service->image) }}" class="img-fluid" class="attachment-coni_image_a size-coni_image_a wp-post-image" alt="" loading="lazy" width="360" height="218"></a>               
                    </div>
                    <div class="service-inner-text">
                       <div class="service-inner-content">
                          <div class="media-left">
                             <div class="service_icon">
                                <img src="{{ asset($service->icon) }}" >
                             </div>
                          </div>
                          <div class="media-body">
                             <h2><a href="">{{ $service->title }}</a></h2>
                          </div>
                          <p>{{ $service->description}}</p>
                          <a href="" class="service-readmore">Read More<span class="lnr lnr-arrow-right"></span></a>
                       </div>
                    </div>
                 </div>
              </div>
            @endforeach
           </div>
        </div>
     </div>
  </div>
  <!-- Project -->
  <div class="projects">
     <div class="container">
        <div class="row">
           <div class="col-md-6">
              <div class="standard-sec-title">
                 <h2 class=""data-aos="fade-right" data-aos-duration="3000"><span class="title-gold">{{ $sections[5]->name }}</span></h2>
                 <p class=""data-aos="fade-up" data-aos-duration="3000">{{ $sections[5]->description }}</p>
              </div>
           </div>
        </div>
        <div class="row">
           <?php $i_t_services = DB::table("i_t_services")->get(); ?>
           @foreach ($i_t_services as $i_t_service)
           <div class="col-md-4 col-sm-6 standard-project-gallery-inner" data-aos="fade-right" data-aos-duration="3000">
              <div class="standard-project-gallery-img">
                 <a href="">
                 <img src="{{ asset($i_t_service->image) }}" class="attachment-coni_image_h size-coni_image_h wp-post-image" alt="" loading="lazy" width="100%" height="350">
                 </a>
              </div>
              <div class="standard-project-gallery-desc">
                 <div class="standard-project-gallery-desc-box">
                    <h2><a href="">{{ $i_t_service->title }}</a></h2>
                 </div>
              </div>
           </div>
           @endforeach
        </div>
     </div>
  </div>
  <div class="package space">
     <div class="container">
        <div class="row">
           <div class="col-md-12">
              <div class="heading bottom-spach">
                 <h2 class=""data-aos="fade-down" data-aos-duration="3000"><span class="title-gold">{{ $sections[6]->name }}</span></h2>
                 <p style="text-align: center;" class="pb-3"data-aos="fade-up" data-aos-duration="3000">{{ $sections[6]->description }}</p>
              </div>
           </div>
        </div>
        <div class="row" data-aos="fade-up" data-aos-duration="3000">
           <div class="donor2 owl-carousel owl-theme">
              <?php $client_comments = DB::table('client_comments')->get(); ?>
              @foreach ($client_comments as $client_comment)
              <div class="item">
                 <div class="single-testimonial">
                    <div class="testimonial-comment-box">
                       <img src="{{ asset($client_comment->image) }}" alt="{{ $client_comment->name }}" title="{{ $client_comment->name }}">
                    </div>
                    <div class="testimonial-comment-desc">
                       <img src="{{ asset('assets/frontend') }}/image/quote.png">
                       <h2>{{ $client_comment->name }}</h2>
                       <p>{{ $client_comment->description }}</p>
                    </div>
                 </div>
              </div>
              @endforeach
           </div>
        </div>
        <div class="row">
           <div class="our-brants mt-5"data-aos="fade-right" data-aos-duration="3000">
              <h2><span class="title-gold">{{ $sections[7]->name }}</span></h2>
           </div>
           <div class="clients-logo owl-carousel owl-theme">
              <?php $brands = DB::table('projects')->get(); ?>
              @foreach ($brands as $brand)
              <div class="item" data-aos="zoom-in" data-aos-duration="1000">
                 <div class="slients-logo">
                    <img src="{{ asset($brand->image) }}" alt="{{ $brand->image_text }}" title="{{ $brand->image_text }}">
                 </div>
              </div>
              @endforeach
           </div>
        </div>
     </div>
  </div>
</div>
@endsection