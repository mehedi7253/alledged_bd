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
    <?php $subscribes = DB::table('subscribes')->get(); ?>
    @if ($subscribes)
        <section id="gallery mt-4 mb-4">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="gallery-all">
                            <!-- Portfolio Gallery Grid -->
                            <div class="row">
                                @foreach ($subscribes as $subscribe)
                                <div class="col-md-4 col-sm-6 column nature" data-aos="fade-up" data-aos-duration="3000">
                                    <div class="content">
                                        <div class="hover-box">
                                            <div class="hover-img">
                                                <img src="{{ asset($subscribe->image) }}" alt="People">
                                                <div class="over-layer">
                                                    <h3>{{ $subscribe->title }}</h3>
                                                    <div class="hover-info">
                                                        <span>{{ $subscribe->description }}.</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                <!-- END GRID -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
@endsection
