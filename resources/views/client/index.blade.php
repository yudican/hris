@extends('layouts.client')

@section('content')
<div class="ftco-blocks-cover-1">
  <div class="ftco-cover-1 overlay" style="background-image: url('https://source.unsplash.com/pSyfecRCBQA/1920x780')">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-6">
          <h1>Choose Your Quality Delivery of Your Cargo</h1>
          <p class="mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est magni perferendis fugit modi similique, suscipit, deserunt a iure.</p>
          <form action="#">
            <div class="form-group d-flex">
              <input type="text" class="form-control" placeholder="Enter your tracking number">
              <input type="submit" class="btn btn-primary text-white px-4" value="Track Now">
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- END .ftco-cover-1 -->
  <div class="ftco-service-image-1 pb-5">
    <div class="container">
      <div class="owl-carousel owl-all">
        <div class="service text-center">
          <a href="#"><img src="{{ url('assets/client/images/cargo_sea_small.jpg') }}" alt="Image" class="img-fluid"></a>
          <div class="px-md-3">
            <h3><a href="#">Sea Freight</a></h3>
            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia.</p>
          </div>
        </div>
        <div class="service text-center">
          <a href="#"><img src="{{ url('assets/client/images/cargo_air_small.jpg') }}" alt="Image" class="img-fluid"></a>
          <div class="px-md-3">
            <h3><a href="#">Air Freight</a></h3>
            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia.</p>
          </div>
        </div>
        <div class="service text-center">
          <a href="#"><img src="{{ url('assets/client/images/cargo_delivery_small.jpg') }}" alt="Image" class="img-fluid"></a>
          <div class="px-md-3">
            <h3><a href="#">Package Forwarding</a></h3>
            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia.</p>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>

<div class="site-section bg-light" id="services-section">
  <div class="container">
    <div class="row mb-5 justify-content-center">
      <div class="col-md-7 text-center">
        <div class="block-heading-1">
          <h2>What We Offer</h2>
          <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
        </div>
      </div>
    </div>
    <div class="owl-carousel owl-all">
      <div class="block__35630">
        <div class="icon mb-0">
          <span class="flaticon-ferry"></span>
        </div>
        <h3 class="mb-3">Sea Freight</h3>
        <p>A small river named Duden flows by their place and supplies it with the necessary regelialia. </p>
      </div>

      <div class="block__35630">
        <div class="icon mb-0">
          <span class="flaticon-airplane"></span>
        </div>
        <h3 class="mb-3">Air Freight</h3>
        <p>A small river named Duden flows by their place and supplies it with the necessary regelialia. </p>
      </div>

      <div class="block__35630">
        <div class="icon mb-0">
          <span class="flaticon-box"></span>
        </div>
        <h3 class="mb-3">Package Forwarding</h3>
        <p>A small river named Duden flows by their place and supplies it with the necessary regelialia. </p>
      </div>

      <div class="block__35630">
        <div class="icon mb-0">
          <span class="flaticon-lorry"></span>
        </div>
        <h3 class="mb-3">Trucking</h3>
        <p>A small river named Duden flows by their place and supplies it with the necessary regelialia. </p>
      </div>

      <div class="block__35630">
        <div class="icon mb-0">
          <span class="flaticon-warehouse"></span>
        </div>
        <h3 class="mb-3">Warehouse</h3>
        <p>A small river named Duden flows by their place and supplies it with the necessary regelialia. </p>
      </div>

      <div class="block__35630">
        <div class="icon mb-0">
          <span class="flaticon-add"></span>
        </div>
        <h3 class="mb-3">Delivery</h3>
        <p>A small river named Duden flows by their place and supplies it with the necessary regelialia. </p>
      </div>

    </div>
  </div>
</div>




<div class="site-section" id="about-section">

  <div class="container">
    <div class="row mb-5 justify-content-center">
      <div class="col-md-7 text-center">
        <div class="block-heading-1" data-aos="fade-up" data-aos-delay="">
          <h2>About Us</h2>
          <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
        </div>
      </div>
    </div>
  </div>

</div>



<div class="site-section bg-light" id="about-section">
  <div class="container">
    <div class="row justify-content-center mb-4 block-img-video-1-wrap">
      <div class="col-md-12 mb-5">
        <figure class="block-img-video-1" data-aos="fade">
          <a href="https://vimeo.com/45830194" data-fancybox data-ratio="2">
          <span class="icon"><span class="icon-play"></span></span>
          <img src="{{ url('assets/client/images/cargo_delivery_big.jpg') }}" alt="Image" class="img-fluid">
        </a>
        </figure>
      </div>
    </div>
    <div class="row">
      <div class="col-12">
        <div class="row">
          <div class="col-6 col-md-6 mb-4 col-lg-0 col-lg-3" data-aos="fade-up" data-aos-delay="">
            <div class="block-counter-1">
              <span class="number"><span data-number="50">0</span>+</span>
              <span class="caption">Years of Experience</span>
            </div>
          </div>
          <div class="col-6 col-md-6 mb-4 col-lg-0 col-lg-3" data-aos="fade-up" data-aos-delay="100">
            <div class="block-counter-1">
              <span class="number"><span data-number="300">0</span>+</span>
              <span class="caption">Companies</span>
            </div>
          </div>
          <div class="col-6 col-md-6 mb-4 col-lg-0 col-lg-3" data-aos="fade-up" data-aos-delay="200">
            <div class="block-counter-1">
              <span class="number"><span data-number="108">0</span>+</span>
              <span class="caption">Covered Countries</span>
            </div>
          </div>
          <div class="col-6 col-md-6 mb-4 col-lg-0 col-lg-3" data-aos="fade-up" data-aos-delay="300">
            <div class="block-counter-1">
              <span class="number"><span data-number="1500">0</span>+</span>
              <span class="caption">Couriers</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<div class="site-section" id="faq-section">
  <div class="container">
    <div class="row mb-5">
      <div class="block-heading-1 col-12 text-center">
        <h2>Frequently Ask Questions</h2>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-6">

        <div class="mb-5" data-aos="fade-up" data-aos-delay="100">
          <h3 class="text-black h4 mb-4"><span class="icon-question_answer text-primary mr-2"></span>Can I accept both Paypal and Stripe?</h3>
          <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. </p>
        </div>

        <div class="mb-5" data-aos="fade-up" data-aos-delay="100">
          <h3 class="text-black h4 mb-4"><span class="icon-question_answer text-primary mr-2"></span>What available is refund period?</h3>
          <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. </p>
        </div>

        <div class="mb-5" data-aos="fade-up" data-aos-delay="100">
          <h3 class="text-black h4 mb-4"><span class="icon-question_answer text-primary mr-2"></span>Can I accept both Paypal and Stripe?</h3>
          <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. </p>
        </div>

        <div class="mb-5" data-aos="fade-up" data-aos-delay="100">
          <h3 class="text-black h4 mb-4"><span class="icon-question_answer text-primary mr-2"></span>What available is refund period?</h3>
          <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. </p>
        </div>
      </div>
      <div class="col-lg-6">

        <div class="mb-5" data-aos="fade-up" data-aos-delay="100">
          <h3 class="text-black h4 mb-4"><span class="icon-question_answer text-primary mr-2"></span>Where are you from?</h3>
          <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. </p>
        </div>

        <div class="mb-5" data-aos="fade-up" data-aos-delay="100">
          <h3 class="text-black h4 mb-4"><span class="icon-question_answer text-primary mr-2"></span>What is your opening time?</h3>
          <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. </p>
        </div>

        <div class="mb-5" data-aos="fade-up" data-aos-delay="100">
          <h3 class="text-black h4 mb-4"><span class="icon-question_answer text-primary mr-2"></span>Can I accept both Paypal and Stripe?</h3>
          <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. </p>
        </div>

        <div class="mb-5" data-aos="fade-up" data-aos-delay="100">
          <h3 class="text-black h4 mb-4"><span class="icon-question_answer text-primary mr-2"></span>What available is refund period?</h3>
          <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. </p>
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

    <div class="owl-carousel nonloop-block-13">
      <div>
        <div class="block-testimony-1 text-center">

          <blockquote class="mb-4">
            <p>&ldquo;The Big Oxmox advised her not to do so, because there were thousands of bad Commas, wild Question Marks and devious Semikoli, but the Little Blind Text didn’t listen. She packed her seven versalia, put her initial into the belt
              and made herself on the way.&rdquo;</p>
          </blockquote>

          <figure>
            <img src="{{ url('assets/client/images/person_4.jpg') }}" alt="Image" class="img-fluid rounded-circle mx-auto">
          </figure>
          <h3 class="font-size-20 text-black">Ricky Fisher</h3>
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

      <div>
        <div class="block-testimony-1 text-center">


          <blockquote class="mb-4">
            <p>&ldquo;A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.&rdquo;</p>
          </blockquote>

          <figure>
            <img src="{{ url('assets/client/images/person_1.jpg') }}" alt="Image" class="img-fluid rounded-circle mx-auto">
          </figure>
          <h3 class="font-size-20 text-black">Mellisa Griffin</h3>


        </div>
      </div>

      <div>
        <div class="block-testimony-1 text-center">
          <blockquote class="mb-4">
            <p>&ldquo;Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.&rdquo;</p>
          </blockquote>

          <figure>
            <img src="{{ url('assets/client/images/person_3.jpg') }}" alt="Image" class="img-fluid rounded-circle mx-auto">
          </figure>
          <h3 class="font-size-20 mb-4 text-black">Robert Steward</h3>

        </div>
      </div>


    </div>

  </div>
</div>


<div class="site-section bg-light" id="contact-section">
  <div class="container">
    <div class="row">
      <div class="col-12 text-center mb-5" data-aos="fade-up" data-aos-delay="">
        <div class="block-heading-1">
          <span>Get In Touch</span>
          <h2>Contact Us</h2>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-6 mb-5" data-aos="fade-up" data-aos-delay="100">
        <form action="#" method="post">
          <div class="form-group row">
            <div class="col-md-6 mb-4 mb-lg-0">
              <input type="text" class="form-control" placeholder="First name">
            </div>
            <div class="col-md-6">
              <input type="text" class="form-control" placeholder="First name">
            </div>
          </div>

          <div class="form-group row">
            <div class="col-md-12">
              <input type="text" class="form-control" placeholder="Email address">
            </div>
          </div>

          <div class="form-group row">
            <div class="col-md-12">
              <textarea name="" id="" class="form-control" placeholder="Write your message." cols="30" rows="10"></textarea>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-md-6 mr-auto">
              <input type="submit" class="btn btn-block btn-primary text-white py-3 px-5" value="Send Message">
            </div>
          </div>
        </form>
      </div>
      <div class="col-lg-4 ml-auto" data-aos="fade-up" data-aos-delay="200">
        <div class="bg-white p-3 p-md-5">
          <h3 class="text-black mb-4">Contact Info</h3>
          <ul class="list-unstyled footer-link">
            <li class="d-block mb-3">
              <span class="d-block text-black">Address:</span>
              <span>34 Street Name, City Name Here, United States</span></li>
            <li class="d-block mb-3"><span class="d-block text-black">Phone:</span><span>+1 242 4942 290</span></li>
            <li class="d-block mb-3"><span class="d-block text-black">Email:</span><span>info@yourdomain.com</span></li>
          </ul>
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