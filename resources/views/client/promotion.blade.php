@extends ('client.layouts.master')
@section('title', 'NQT - Trang chủ')
@section('content')
<!-- ======= Hero Section ======= -->
<!--  <section id="hero" class="hero d-flex align-items-center section-bg">
    <div class="container">
      <div class="row justify-content-between gy-5">
        <div class="col-lg-5 order-2 order-lg-1 d-flex flex-column justify-content-center align-items-center align-items-lg-start text-center text-lg-start">
          <h2 data-aos="fade-up" class="text-red">Chương trình ưu đãi<br>Giảm tới 10%</h2>
          <p data-aos="fade-up" data-aos-delay="100">Sed autem laudantium dolores. Voluptatem itaque ea consequatur eveniet. Eum quas beatae cumque eum quaerat.</p>
          <div class="d-flex" data-aos="fade-up" data-aos-delay="200">
            <a href="#book-a-table" class="btn-book-a-table">Book a Table</a>
            <a href="" class="glightbox btn-watch-video d-flex align-items-center"><i class="bi bi-play-circle"></i><span>Watch Video</span></a>
          </div>
        </div>
        <div class="col-lg-5 order-1 order-lg-2 text-center text-lg-start">
          <img src="" class="img-fluid" alt="" data-aos="zoom-out" data-aos-delay="300">
        </div>
      </div>
    </div>
  </section>-->
<!-- End Hero Section -->
   <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <h2>Về các ưu đãi</h2>
        </div>

        <div class="row gy-4">
          <div class="col-lg-7 position-relative about-img" style="background-image: url({{asset('trazano/hero-bg.jpg')}}) ;" data-aos="fade-up" data-aos-delay="150">
            <div class="call-us position-absolute">
              <h4>Liên hệ chi tiết</h4>
              <p>(+84) 934.54.13.13</p>
            </div>
          </div>
          <div class="col-lg-5 d-flex align-items-lg-start" data-aos="fade-up" data-aos-delay="300">
            <div class="content ps-0 ps-lg-5">
              <p class="fst-italic">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
                magna aliqua.
              </p>
              <ul>
                <li><i class="bi bi-check2-all"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat.</li>
                <li><i class="bi bi-check2-all"></i> Duis aute irure dolor in reprehenderit in voluptate velit.</li>
                <li><i class="bi bi-check2-all"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate trideta storacalaperda mastiro dolore eu fugiat nulla pariatur.</li>
              </ul>
              <p>
                Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
                velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident
              </p>
            </div>
          </div>
        </div>

      </div>
    </section><!-- End About Section -->
  <script src="https://bootstrapmade.com/assets/js/demo.js?v=5.0"></script>
  <script src="https://bootstrapmade.com/assets/vendor/aos/aos.js"></script>
  <script src="https://bootstrapmade.com/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="https://bootstrapmade.com/assets/vendor/glightbox/js/glightbox.min.jss"></script>
  <script src="https://bootstrapmade.com/assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="https://bootstrapmade.com/demo/templates/Scaffold/assets/js/main.js"></script>
  <script defer="" src="https://static.cloudflareinsights.com/beacon.min.js/v2b4487d741ca48dcbadcaf954e159fc61680799950996" integrity="sha512-D/jdE0CypeVxFadTejKGTzmwyV10c1pxZk/AqjJuZbaJwGMyNHY3q/mTPWqMUnFACfCTunhZUVcd4cV78dK1pQ==" data-cf-beacon="{&quot;rayId&quot;:&quot;7ba19c60cd9f0796&quot;,&quot;token&quot;:&quot;68c5ca450bae485a842ff76066d69420&quot;,&quot;version&quot;:&quot;2023.3.0&quot;,&quot;si&quot;:100}" crossorigin="anonymous"></script>
@endsection