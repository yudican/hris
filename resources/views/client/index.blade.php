@extends('layouts.client')

@section('content')
<div class="ftco-blocks-cover-1">
  <div class="ftco-cover-1" style="background-image: url('{{ asset('storage/'.$banner->foto) }}')">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-12">
          <h1>{{ $data->perusahaan_nama }}</h1>
          <p class="mb-5" align="justify">{!! $banner->isi !!}</p>
        </div>
      </div>
    </div>
  </div>

</div>

<div class="site-section bg-light block-13" id="testimonials-section" data-aos="fade">
  <div class="container">

    <div class="text-center mb-5">
      <div class="block-heading-1">
        <h2>Happy Clients</h2>
      </div>
    </div>

      <div>
        <div class="block-testimony-1 text-center">
          <blockquote class="mb-4">
            <p>&ldquo;Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of Grammar.&rdquo;</p>
          </blockquote>
          <figure>
            <img src="{{ url('assets/client/images/person_2.jpg') }}" alt="Image" class="img-fluid rounded-circle mx-auto">
          </figure>
          <h3 class="font-size-20 mb-4 text-black">Ken Davis</h3>

        </div>
      </div>

    </div>

  </div>
</div>

@endsection

@push('scripts')
<script src="{{ url('assets/client/js/owl.carousel.min.js') }}"></script>
<script src="{{ url('assets/client/js/jquery.sticky.js') }}"></script>
<script src="{{ url('assets/client/js/jquery.waypoints.min.js') }}"></script>
<script src="{{ url('assets/client/js/jquery.animateNumber.min.js') }}"></script>
<script src="{{ url('assets/client/js/jquery.fancybox.min.js') }}"></script>
<script src="{{ url('assets/client/js/jquery.easing.1.3.js') }}"></script>
<script src="{{ url('assets/client/js/aos.js') }}"></script>

@endpush