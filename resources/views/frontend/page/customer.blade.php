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
    <?php $web_designs = DB::table('web_designs')->get();?>
    @if ($web_designs)
    <section class="customer-pages my-5">
        <div class="container">
           <div class="row">
               @foreach ($web_designs as $customer)
              <div class="col-md-3 col-6">
                 <div class="customer-image mb-2 text-center">
                    <div class="border p-2">
                       <img src="{{ asset($customer->image) }}" class="img-fluid">
                    </div>
                    <div class="overlays">
                       <div class="texts">
                          <h5>{{ $customer->title }}</h5>
                          <p class="mb-4">{{ $customer->description }}</p>
                       </div>
                    </div>
                 </div>
              </div>
              @endforeach
           </div>
        </div>
     </section>
    @endif
@endsection
