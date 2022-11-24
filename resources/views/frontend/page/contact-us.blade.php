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
    <?php $company = DB::table('company_settings')->first(); ?>
    @if($company)
    <section class="contact">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="contact-info" data-aos="fade-right" data-aos-duration="3000">
                        <div class="contact-info-item">
                            <div class="contact-info-icon">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                            <div class="contact-info-text">
                                <h2>Address</h2>
                                <span>{{ $company->address }}</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="contact-info" data-aos="fade-up" data-aos-duration="3000">
                        <div class="contact-info-item">
                            <div class="contact-info-icon">
                                <i class="far fa-envelope"></i>
                            </div>
                            <div class="contact-info-text">
                                <h2>Email</h2>
                                <?php $emails = explode(",",$company->email); ?>
                                @foreach ($emails as $mail)
                                <span>{{ $mail }}</span><br>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="contact-info" data-aos="fade-left" data-aos-duration="3000">
                        <div class="contact-info-item">
                            <div class="contact-info-icon">
                                <i class="fas fa-phone"></i>
                            </div>
                            <div class="contact-info-text">
                                <h2>Phone</h2>
                                <?php $phones = explode(",",$company->phone);  ?>
                                @foreach ($phones as $call)
                                <span>{{ $call}}</span><br>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="contact-form-heading">
                <div class="row">
                    <div class="col-md-12" data-aos="fade-up" data-aos-duration="3000">
                        <h5 style="margin: 0px;"><strong>Get In Touch</strong></h5>
                        <div class="contact-form">
                            <form method="POST" action="{{ route('message.store')}}">
                                @csrf
                                <div class="form-group mt-4">
                                    <input type="text" required class="form-control" name="name" id="name" placeholder="Name">
                                </div>
                                <div class="form-group">
                                    <input type="email" required class="form-control" id="email" name="email" placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <input type="text" required class="form-control" id="subject" name="subject" placeholder="Subject">
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control" required id="message" name="message"
                                        placeholder="Write Your Message" rows="3"></textarea>
                                </div>
                                <div class="news-button"> <button type="submit"
                                        class="btn btn-successess btn-lg">Submit</button> </div>
                            </form>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
        

    </section>
    <div class="">
                        <div class="map">
                            <?php $map = DB::table('google_maps')->value('url'); ?>
                            <iframe
                                src="{{ $map }}"
                                width="100%" height="350px" frameborder="0" style="border:0;" allowfullscreen=""
                                aria-hidden="false" tabindex="0"></iframe>
                        </div>
                    </div>
    @endif
@endsection
