@extends ('client.layouts.master')
@section('title', 'NQT - Trang chủ')
@section('content')
 <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container">
              @php
              $contact = $contents->filter(function($item) {
                                      return $item->key == 'contact';
                                  })->first();
              @endphp
        <div class="section-title" data-aos="fade-up">
          <h2>{{$contact->name_show()}}</h2>
        </div>

        <div class="row">

          <div class="col-lg-12 d-flex align-items-stretch" data-aos="fade-right">
            <div class="info">
              <div class="address">
                <i class="bi bi-geo-alt"></i>
                
                <h4>@if(session()->get('language') == 'vi') Địa chỉ: @else Address: @endif</h4>
                @php
          $footer_dia_chi = $contents->filter(function($item) {
                                  return $item->key == 'footer_dia_chi';
                              })->first();
          @endphp
                <p>{{$footer_dia_chi->name_show()}}</p>
              </div>

              <div class="email">
                <i class="bi bi-envelope"></i>
                <h4>Email:</h4>
                @php
          $footer_email = $contents->filter(function($item) {
                                  return $item->key == 'footer_email';
                              })->first();
          @endphp
                <p>{{$footer_email->name_show()}}</p>
              </div>

              <div class="phone">
                <i class="bi bi-phone"></i>
                <h4>@if(session()->get('language') == 'vi') Điện thoại: @else Phone: @endif</h4>
                @php
          $footer_dien_thoai = $contents->filter(function($item) {
                                  return $item->key == 'footer_dien_thoai';
                              })->first();
          @endphp
                <p>{{$footer_dien_thoai->name_show()}}</p>
              </div>
              @php
            $map = $contents->filter(function($item) {
                                  return $item->key == 'map';
                              })->first();
          @endphp
            <iframe src="{{$map->content}}" frameborder="0" style="border:0; width: 100%; height: 290px;" allowfullscreen></iframe>
            </div>

          </div>

        </div>

      </div>
      </section><!-- End Contact Section -->
  <script src="https://bootstrapmade.com/assets/js/demo.js?v=5.0"></script>
  <script src="https://bootstrapmade.com/assets/vendor/aos/aos.js"></script>
  <script src="https://bootstrapmade.com/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="https://bootstrapmade.com/assets/vendor/glightbox/js/glightbox.min.jss"></script>
  <script src="https://bootstrapmade.com/assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="https://bootstrapmade.com/demo/templates/Scaffold/assets/js/main.js"></script>
  <script defer="" src="https://static.cloudflareinsights.com/beacon.min.js/v2b4487d741ca48dcbadcaf954e159fc61680799950996" integrity="sha512-D/jdE0CypeVxFadTejKGTzmwyV10c1pxZk/AqjJuZbaJwGMyNHY3q/mTPWqMUnFACfCTunhZUVcd4cV78dK1pQ==" data-cf-beacon="{&quot;rayId&quot;:&quot;7ba19c60cd9f0796&quot;,&quot;token&quot;:&quot;68c5ca450bae485a842ff76066d69420&quot;,&quot;version&quot;:&quot;2023.3.0&quot;,&quot;si&quot;:100}" crossorigin="anonymous"></script>
@endsection