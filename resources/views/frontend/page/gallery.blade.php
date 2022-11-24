@extends('frontend.layout.app')
@section('title')
    {{ $title }}
@endsection

@section('homeContent')
    <div class="events-page" style="background-image: url({{ asset($menu->background_image) }}); 
                background-position: center;
                background-repeat: no-repeat; height: auto;">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-ms-12">
                    <div class="heading-2">
                        <h2 class="" data-aos="fade-up" data-aos-duration="3000">{{ $menu->name }}</h2>
                        <br>
                        <p class="" data-aos="fade-up" data-aos-duration="3000">{{ $menu->heading }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php $galleries = DB::table('galleries')->get();?>
    @if($galleries)
    <div class="container mt-4">
        <div class="row Gallery-top-main" data-aos="fade-right" data-aos-duration="3000">
            @foreach ($galleries as $gallery)
            <div class="col-md-4 mb-4">
                <div class="stack-head">
                    <div class="thumbnail-type-6">
                        <a class="stack-coverflow" href="/gallery-details/{{ $gallery->id }}">
                            <img src="{{ asset($gallery->image) }}" alt="{{ $gallery->title }}" width="390" height="307">
                            <img src="{{ asset($gallery->image_2) }}" alt="{{ $gallery->title }}" width="390" height="307">
                            <img src="{{ asset($gallery->image_3) }}" alt="{{ $gallery->title }}" width="390" height="307">
                        </a>
                        <div class="caption">
                            <h3>{{ $gallery->title }}</h3>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    @endif
@endsection
