@extends ('client.layouts.master')
@section('title', 'NQT - Trang chủ')
@section('content')


    <!-- ======= Features Section ======= -->
    <section id="features" class="features">
      <div class="container">

        <div class="row">
          <div class="col-md-12 blog-main">
            <div class="blog-post">
              <h1 class="blog-post-title text-center mb-3">{{$post->title}}</h1>
              <!--<p class="blog-post-meta">January 1, 2014 by <a href="#">Mark</a></p>-->
              {!! $post->content  !!}

            </div>
          </div>

        </div>
    </section><!-- End Features Section -->

  </main><!-- End #main -->
  <script src="https://bootstrapmade.com/assets/js/demo.js?v=5.0"></script>
  <script src="https://bootstrapmade.com/assets/vendor/aos/aos.js"></script>
  <script src="https://bootstrapmade.com/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="https://bootstrapmade.com/assets/vendor/glightbox/js/glightbox.min.jss"></script>
  <script src="https://bootstrapmade.com/assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="https://bootstrapmade.com/demo/templates/Scaffold/assets/js/main.js"></script>
  <script defer="" src="https://static.cloudflareinsights.com/beacon.min.js/v2b4487d741ca48dcbadcaf954e159fc61680799950996" integrity="sha512-D/jdE0CypeVxFadTejKGTzmwyV10c1pxZk/AqjJuZbaJwGMyNHY3q/mTPWqMUnFACfCTunhZUVcd4cV78dK1pQ==" data-cf-beacon="{&quot;rayId&quot;:&quot;7ba19c60cd9f0796&quot;,&quot;token&quot;:&quot;68c5ca450bae485a842ff76066d69420&quot;,&quot;version&quot;:&quot;2023.3.0&quot;,&quot;si&quot;:100}" crossorigin="anonymous"></script>
@endsection