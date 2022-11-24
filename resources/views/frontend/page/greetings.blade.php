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
    <?php $greeting = DB::table('greetings')->first(); ?>
    @if($greeting)
    <section id="overview">
        <div class="container">
            <div class="row">
                <div class="col-md-12" data-aos="fade-up" data-aos-duration="3000">
                    <div class="Greetings-images mb-4">
                        <img src="{{ asset($greeting->image) }}">
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-md-3" data-aos="fade-up" data-aos-duration="3000">
                    <div class="Greetings-sidebar"><br><br>
                        <h3>{{ $greeting->title }}</h3>
                    </div>
                </div>
                <div class="col-md-9" data-aos="fade-up" data-aos-duration="3000">
                    <p>
                        <?php echo $greeting->description; ?>
                    </p>
                </div>
            </div>
        </div>
        <br>
        <section class="gray" data-aos="fade-up" data-aos-duration="3000">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <div class="Greetings-under-title-text">
                            <div class="Greetings-under-title-1"><span>01</span></div>
                            <h4>{{ $greeting->first_point_title }}</h4>
                            <p><?php echo $greeting->first_point_description; ?></p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="Greetings-under-title-text">
                            <div class="Greetings-under-title-1"><span>02</span></div>
                            <h4>{{ $greeting->second_point_title }}</h4>
                            <p><?php echo $greeting->second_point_description; ?></p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="Greetings-under-title-text">

                            <div class="Greetings-under-title-1"><span>03</span></div>
                            <h4>{{ $greeting->third_point_title }}</h4>
                            <p><?php echo $greeting->third_point_description?></p>
                        </div>
                    </div>


                </div>
            </div>
        </section>

        <div class="container">
            <div class="row">
                <div class="col-md-12" data-aos="fade-down" data-aos-duration="3000">
                    <?php echo $greeting->footer; ?>
                </div>
            </div>
        </div>
        </div>
    </section>
    @endif
@endsection
