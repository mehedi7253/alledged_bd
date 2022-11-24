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
    <?php $menu_content = DB::table('menu_contents')
    ->where('menu_id', $menu->id)
    ->first(); ?>
    @if($menu_content)
    <section id="overview">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="mb-3" data-aos="fade-up" data-aos-duration="3000">{{ $menu_content->title }}</h3>
                    <p>{{ $menu_content->description }}</p>
                    <div class="row">
                        <?php $contentImage = DB::table('experiences')->where('menu_id',$menu->id)->get(); ?>
                        @foreach ($contentImage as $contentImg)
                        <div class="col-md-3">
                            <div class="Greetings-images mb-4" data-aos="fade-down" data-aos-duration="3000">
                                <img src="{{ asset($contentImg->image) }}" alt="{{ $contentImg->title }}">
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <p class="" data-aos="fade-up" data-aos-duration="3000">{{ $menu_content->footer }}</p>
                </div>
            </div>
        </div>
        <br>
        </div>
    </section>
    @endif
@endsection
