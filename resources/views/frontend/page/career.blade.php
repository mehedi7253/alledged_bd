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
    <?php $office_hours = DB::table('office_hours')->first(); ?>
    @if ($office_hours)
    <section id="overview">
        <div class="container">
          <div class="row">
            <div class="col-md-12" data-aos="fade-up" data-aos-duration="3000">
                <?php echo $office_hours->description; ?>
            </div>
          </div>
        </div>
      </section>
    @endif
@endsection
