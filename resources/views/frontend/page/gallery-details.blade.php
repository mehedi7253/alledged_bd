@extends('frontend.layout.app')
@section('title')
    {{ $title }}
@endsection

@section('homeContent')
<div class="events-page " style="background-image: url({{ asset($gallery->background_image) }}); 
  background-position: center;
  background-repeat: no-repeat; height: auto;">
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-ms-12">
        <div class="heading-2-s">
          <h2>Project 1</h2>
          <p>{{ $gallery->description }}</p>
        </div>
      </div>
    </div>
  </div>
</div>
<section class="all-gallery">

  <div class="container">
    <div class="row">
      <div class="col-md-3 col-6">
        <div class="column22">
          <img src="{{ asset($gallery->image) }}" style="width:100%" onclick="openModal();currentSlide(1)" class="hover-shadow cursor">
        </div>
      </div>
      <div class="col-md-3 col-6">
        <div class="column22">
          <img src="{{ asset($gallery->image_2) }}" style="width:100%" onclick="openModal();currentSlide(2)" class="hover-shadow cursor">
        </div>
      </div>
      <div class="col-md-3 col-6">
        <div class="column22">
          <img src="{{ asset($gallery->image_3) }}" style="width:100%" onclick="openModal();currentSlide(3)" class="hover-shadow cursor">
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div id="myModal3" class="modal">
          <span class="close cursor" onclick="closeModal()">&times;</span>
          <div class="modal-content">

            <div class="mySlides">
              <div class="numbertext">1 / 3</div>
              <img src="{{ asset($gallery->image) }}" style="width:100%">
            </div>

            <div class="mySlides">
              <div class="numbertext">2 / 3</div>
              <img src="{{ asset($gallery->image_2) }}" style="width:100%">
            </div>

            <div class="mySlides">
              <div class="numbertext">3 / 3</div>
              <img src="{{ asset($gallery->image_3) }}" style="width:100%">
            </div>

            <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
            <a class="next" onclick="plusSlides(1)">&#10095;</a>

            <div class="caption-container">
              <p id="caption"></p>
            </div>


            <div class="all-collumt33">
              <div class="column23">
                <img class="demo cursor" src="{{ asset($gallery->image) }}" style="width:100%" onclick="currentSlide(1)" alt="Nature and sunrise">
              </div>
              <div class="column23">
                <img class="demo cursor" src="{{ asset($gallery->image_2) }}" style="width:100%" onclick="currentSlide(2)" alt="Snow">
              </div>
              <div class="column23">
                <img class="demo cursor" src="{{ asset($gallery->image_3) }}" style="width:100%" onclick="currentSlide(3)" alt="Mountains and fjords">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<script>
  function openModal() {
    document.getElementById("myModal3").style.display = "block";
  }

  function closeModal() {
    document.getElementById("myModal3").style.display = "none";
  }

  var slideIndex = 1;
  showSlides(slideIndex);

  function plusSlides(n) {
    showSlides(slideIndex += n);
  }

  function currentSlide(n) {
    showSlides(slideIndex = n);
  }

  function showSlides(n) {
    var i;
    var slides = document.getElementsByClassName("mySlides");
    var dots = document.getElementsByClassName("demo");
    var captionText = document.getElementById("caption");
    if (n > slides.length) {slideIndex = 1}
      if (n < 1) {slideIndex = slides.length}
        for (i = 0; i < slides.length; i++) {
          slides[i].style.display = "none";
        }
        for (i = 0; i < dots.length; i++) {
          dots[i].className = dots[i].className.replace(" active", "");
        }
        slides[slideIndex-1].style.display = "block";
        dots[slideIndex-1].className += " active";
        captionText.innerHTML = dots[slideIndex-1].alt;
      }
    </script>
@endsection
