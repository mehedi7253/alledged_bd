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
    <?php $aboutUs = DB::table('about_us')->first(); ?>
    @if($aboutUs)
    <section id="overview">
        <div class="container">
            <div class="row">
                <div class="col-md-12" data-aos="fade-up" data-aos-duration="3000">
                    <h2 class="heading-color mb-3">{{ $aboutUs->title }}</h2>
                    <p>{{ $aboutUs->description }}</P>
                </div>

                <div class="col-md-8">
                    <div class="mission mt-2">

                        <div class="accordion" id="accordionExample">

                            <div class="card" data-aos="fade-up" data-aos-duration="3000">
                                <div class="card-header" id="headingTwo">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                                            data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                            Mission
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                                    data-parent="#accordionExample">
                                    <div class="card-body">
                                        {{ $aboutUs->mission }}
                                    </div>
                                </div>
                            </div>
                            <div class="card" data-aos="fade-up" data-aos-duration="3000">
                                <div class="card-header" id="headingThree">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                                            data-target="#collapseThree" aria-expanded="false"
                                            aria-controls="collapseThree">
                                            Vision
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                                    data-parent="#accordionExample">
                                    <div class="card-body">
                                        {{ $aboutUs->vision }}
                                    </div>
                                </div>
                            </div>
                            <div class="card" data-aos="fade-up" data-aos-duration="3000">
                                <div class="card-header" id="headingThree">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                                            data-target="#collapsefour" aria-expanded="false" aria-controls="collapsefour">
                                            Company Profile
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapsefour" class="collapse" aria-labelledby="headingfour"
                                    data-parent="#accordionExample">
                                    <div class="card-body">
                                        <a href="{{ asset($aboutUs->company_profile) }}" target="_blank">
                                            <img src="/assets/frontend/image/pdf.png" width="200" height="100" class="img-fluid">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-md-4" data-aos="fade-left" data-aos-duration="3000">
                    <div class="overview-imge"><img src="{{ asset($aboutUs->image) }}" class="img-fluid"></div>
                </div>
            </div>
        </div>
    </section>
    @endif
@endsection
