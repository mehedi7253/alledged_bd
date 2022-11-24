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
    <?php $strengths = DB::table('strengths')->get(); ?>
    @if($strengths)
    <section id="gallery mb-4">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="gallery-all">
                        <!-- Portfolio Gallery Grid -->
                        <div class="row">
                            @foreach ($strengths as $strength)
                            <div class="col-md-4 column nature" data-aos="fade-down" data-aos-duration="3000">
                                <div class="gs-l mb-2">
                                    <img src="{{ asset($strength->image) }}" alt="Avatar" class="image">
                                    <div class="overlay">
                                        <div class="text">
                                            <h3>{{ $strength->name }}</h3>
                                            <h6 class="mb-4">{{ $strength->designation }}</h6>
                                            <p>{{ $strength->description }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif
@endsection
