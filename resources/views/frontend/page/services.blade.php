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
    <?php $menu_content = DB::table('slider_contents')->where('menu_id',$menu->id)->first();?>
    @if ($menu_content)
    <section id="overview">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="services-category border" data-aos="fade-up" data-aos-duration="3000">
                        <h3>Services</h3>
                        <?php $childMenu = DB::table('menus')->where('parent',4)->get(); ?>
                        <div class="product-sidebar">
                            <div class="sidenav">
                                @foreach ($childMenu as $child)
                                <a href="/page/services/{{ $child->slug }}">{{ $child->name }}</a>
                                @endforeach
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-md-9" data-aos="fade-up" data-aos-duration="3000">
                    <h4 class="mb-3">{{ $menu->name }} Services</h4>
                    <div class="Greetings-images mb-4">
                        <img src="{{ asset($menu_content->image) }}">
                    </div>
                    <h5>
                        {{ $menu_content->title }}
                    </h5>
                    <br>
                    <p>{{ $menu_content->description }}</P>


                    <div class="row">
                        <?php $pictures = DB::table('m_d_messages')->where('menu_id',$menu->id)->get(); ?>
                        @foreach ($pictures as $pic)
                        <div class="col-md-4">
                            <div class="Greetings-images mb-4 text-center" data-aos="fade-up" data-aos-duration="3000">
                                <img src="{{ asset($pic->image) }}">
                                <p>{{ $pic->title }} </p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <br>
        </div>
    </section>
    @endif
@endsection
