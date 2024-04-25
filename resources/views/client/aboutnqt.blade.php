@extends ('client.layouts.master')
@section('title', 'NQT - Trang chủ')
@section('content')
 <section id="hero">
<div class="container">
      <div class="row">
        <div class="col-lg-12 pt-5 pt-lg-0 order-2 order-lg-1 d-flex flex-column content-center" data-aos="fade-up">
          @php
          $ve_nqt_tieu_de = $sectioncontents->filter(function($item) {
                                  return $item->key == 've_nqt_tieu_de';
                              })->first();
          @endphp  
          <h1 class="text-center">{{$ve_nqt_tieu_de->name_show()}}</h1>
          @php
          $ve_nqt_thanh_lap = $sectioncontents->filter(function($item) {
                                  return $item->key == 've_nqt_thanh_lap';
                              })->first();
          $ve_nqt_thanh_laps = preg_split("/\r\n|\n|\r/", $ve_nqt_thanh_lap->content_show());                    
          @endphp 
            <h2 class="text-center">{{$ve_nqt_thanh_lap->name_show()}}</h2>
            
            <span class="lh-sm">
              @foreach($ve_nqt_thanh_laps as $ve_nqt_thanh_lap)
              <p class="text-center" style="margin-bottom: 0px;"><strong>{{$ve_nqt_thanh_lap}} </strong></p>
              @endforeach
            </span>
        </div>
      </div>
      
    </div>

  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container">

        <div class="row">
          <div class="col-lg-6 center-block" data-aos="zoom-in">
            <div alt="" id="mission"></div>
          </div>
          <div class="col-lg-6 d-flex flex-column justify-contents-center" data-aos="fade-left">
            <div class="content pt-4 pt-lg-0">
          @php
          $ve_nqt_su_menh = $sectioncontents->filter(function($item) {
                                  return $item->key == 've_nqt_su_menh';
                              })->first();
          $ve_nqt_su_menhs = preg_split("/\r\n|\n|\r/", $ve_nqt_su_menh->content_show());                    
          @endphp 
              <h3>{{$ve_nqt_su_menh->name_show()}}</h3>
              @foreach($ve_nqt_su_menhs as $ve_nqt_su_menh)
              <p class="fst-italic">
                {{$ve_nqt_su_menh}}
                </p>
              @endforeach
            </div>
          </div>
        </div>

     

        <div class="row" style="margin-top: 100px;">
          <div class="col-lg-6 d-flex flex-column justify-contents-center" data-aos="fade-left">
            <div class="content pt-4 pt-lg-0">
              @php
          $ve_nqt_tam_nhin = $sectioncontents->filter(function($item) {
                                  return $item->key == 've_nqt_tam_nhin';
                              })->first();
          $ve_nqt_tam_nhins = preg_split("/\r\n|\n|\r/", $ve_nqt_tam_nhin->content_show());                    
          @endphp 
              <h3>{{$ve_nqt_tam_nhin->name_show()}}</h3>
              @foreach ($ve_nqt_tam_nhins as $key=>$ve_nqt_tam_nhin)
              <h5>{{$ve_nqt_tam_nhin}}</h5>
              @if($key == 0)
              @php
          $ve_nqt_tam_nhin_1 = $sectioncontents->filter(function($item) {
                                  return $item->key == 've_nqt_tam_nhin_1';
                              })->first();
          $ve_nqt_tam_nhin_1s = preg_split("/\r\n|\n|\r/", $ve_nqt_tam_nhin_1->content_show());                    
          @endphp 
              <p class="fst-italic">{{$ve_nqt_tam_nhin_1->name_show()}}
                </p>
              <ul>
                @foreach($ve_nqt_tam_nhin_1s as $ve_nqt_tam_nhin_1)
                <li><i class="bi bi-check-circle"></i>{{$ve_nqt_tam_nhin_1}}</li>
                @endforeach
              </ul>
                @php
          $ve_nqt_tam_nhin_12 = $sectioncontents->filter(function($item) {
                                  return $item->key == 've_nqt_tam_nhin_12';
                              })->first();
          $ve_nqt_tam_nhin_12s = preg_split("/\r\n|\n|\r/", $ve_nqt_tam_nhin_12->content_show());                    
          @endphp
              <p class="fst-italic">{{$ve_nqt_tam_nhin_12->name_show()}}
                </p>
              <ul>
                @foreach($ve_nqt_tam_nhin_12s as $ve_nqt_tam_nhin_12)
                <li><i class="bi bi-check-circle"></i> {{$ve_nqt_tam_nhin_12}}</li>
                @endforeach
              </ul>
                @elseif($key == 1)
                @php
          $ve_nqt_tam_nhin_2 = $sectioncontents->filter(function($item) {
                                  return $item->key == 've_nqt_tam_nhin_2';
                              })->first();
          $ve_nqt_tam_nhin_2s = preg_split("/\r\n|\n|\r/", $ve_nqt_tam_nhin_2->content_show());                    
          @endphp
                <p class="fst-italic">{{$ve_nqt_tam_nhin_2->name_show()}}
                </p>
              <ul>
                @foreach($ve_nqt_tam_nhin_2s as $ve_nqt_tam_nhin_2)
                <li><i class="bi bi-check-circle"></i> {{$ve_nqt_tam_nhin_2}}</li>
                @endforeach
              </ul>
                @endif
              @endforeach
               
              
            </div>
            
          </div>
          <div class="col-lg-6 justify-contents-center" data-aos="zoom-in">
            <img src="{{ asset('assets/images/vision.jpeg') }}" class="img-fluid" alt="" style="margin-top: 20%">
          </div>
          
        </div>

      </div>
    </section><!-- End About Section -->

    <!-- ======= Team Section ======= -->
    <section id="team" class="team">
      <div class="container">

        <div class="section-title">
          @php
          $ve_nqt_gia_tri = $sectioncontents->filter(function($item) {
                                  return $item->key == 've_nqt_gia_tri';
                              })->first();
          $ve_nqt_gia_tris = preg_split("/\r\n|\n|\r/", $ve_nqt_gia_tri->content_show());                    
          @endphp
          <h2>{{$ve_nqt_gia_tri->name_show()}}</h2>
          @foreach($ve_nqt_gia_tris as $ve_nqt_gia_tri)
          <p>{{$ve_nqt_gia_tri}}</p>
          @endforeach
        </div>

        <div class="row">

          <div class="col-lg-4">
            <div class="member">
              <div class="member-info">
                @php
          $ve_nqt_gia_tri_1 = $sectioncontents->filter(function($item) {
                                  return $item->key == 've_nqt_gia_tri_1';
                              })->first();
          $ve_nqt_gia_tri_1s = preg_split("/\r\n|\n|\r/", $ve_nqt_gia_tri_1->content_show());                    
          @endphp
                <h4>{{$ve_nqt_gia_tri_1->name_show()}}</h4>
                @foreach($ve_nqt_gia_tri_1s as $ve_nqt_gia_tri_1)
                <span>{{$ve_nqt_gia_tri_1}}</span>
                @endforeach
              </div>
            </div>
          </div>

          <div class="col-lg-4">
            <div class="member">
              <!--<div class="pic"><img src="" class="img-fluid" alt=""></div>-->
              <div class="member-info">
                @php
          $ve_nqt_gia_tri_2 = $sectioncontents->filter(function($item) {
                                  return $item->key == 've_nqt_gia_tri_2';
                              })->first();
          $ve_nqt_gia_tri_2s = preg_split("/\r\n|\n|\r/", $ve_nqt_gia_tri_2->content_show());                    
          @endphp
                <h4>{{$ve_nqt_gia_tri_2->name_show()}}</h4>
                @foreach($ve_nqt_gia_tri_2s as $ve_nqt_gia_tri_2)
                <span>{{$ve_nqt_gia_tri_2}}</span>
                @endforeach
                </div>
            </div>
          </div>

          <div class="col-lg-4">
            <div class="member">
              <div class="member-info">
                @php
          $ve_nqt_gia_tri_3 = $sectioncontents->filter(function($item) {
                                  return $item->key == 've_nqt_gia_tri_3';
                              })->first();
          $ve_nqt_gia_tri_3s = preg_split("/\r\n|\n|\r/", $ve_nqt_gia_tri_3->content_show());                    
          @endphp
                <h4>{{$ve_nqt_gia_tri_3->name_show()}}</h4>
                @foreach($ve_nqt_gia_tri_3s as $ve_nqt_gia_tri_3)
                <span>{{$ve_nqt_gia_tri_3}}</span>
                @endforeach
               </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-2"></div>
          <div class="col-lg-4">
            <div class="member">
              <div class="member-info">
                @php
          $ve_nqt_gia_tri_4 = $sectioncontents->filter(function($item) {
                                  return $item->key == 've_nqt_gia_tri_4';
                              })->first();
          $ve_nqt_gia_tri_4s = preg_split("/\r\n|\n|\r/", $ve_nqt_gia_tri_4->content_show());                    
          @endphp
                <h4>{{$ve_nqt_gia_tri_4->name_show()}}</h4>
                @foreach($ve_nqt_gia_tri_4s as $ve_nqt_gia_tri_4)
                <span>{{$ve_nqt_gia_tri_4}}</span>
                @endforeach
              </div>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="member">
              <div class="member-info">
                @php
          $ve_nqt_gia_tri_5 = $sectioncontents->filter(function($item) {
                                  return $item->key == 've_nqt_gia_tri_5';
                              })->first();
          $ve_nqt_gia_tri_5s = preg_split("/\r\n|\n|\r/", $ve_nqt_gia_tri_5->content_show());                    
          @endphp
                <h4>{{$ve_nqt_gia_tri_5->name_show()}}</h4>
                @foreach($ve_nqt_gia_tri_5s as $ve_nqt_gia_tri_5)
                <span>{{$ve_nqt_gia_tri_5}}</span>
                @endforeach
              </div>
            </div>
          </div>
          <div class="col-lg-2"></div>
        </div>

      </div>
    </section><!-- End Team Section -->

    <!-- ======= Clients Section ======= -->
    <section id="clients" class="clients">
      <div class="container">
          @php
          $ve_nqt_he_thong_phan_phoi = $sectioncontents->filter(function($item) {
                                  return $item->key == 've_nqt_he_thong_phan_phoi';
                              })->first();
          $ve_nqt_he_thong_phan_phois = preg_split("/\r\n|\n|\r/", $ve_nqt_he_thong_phan_phoi->content_show());                    
          @endphp
        <div class="section-title" data-aos="fade-up">
          <h2>{{$ve_nqt_he_thong_phan_phoi->name_show()}}</h2>
          @foreach($ve_nqt_he_thong_phan_phois as $ve_nqt_he_thong_phan_phoi)
          <p>{{$ve_nqt_he_thong_phan_phoi}}</p>        
          @endforeach
        </div>


        <div class="section-title" data-aos="fade-up">
          @php
          $ve_nqt_thanh_qua = $sectioncontents->filter(function($item) {
                                  return $item->key == 've_nqt_thanh_qua';
                              })->first();
          $ve_nqt_thanh_quas = preg_split("/\r\n|\n|\r/", $ve_nqt_thanh_qua->content_show());                    
          @endphp
          <h2>{{$ve_nqt_thanh_qua->name_show()}}</h2>
          @foreach($ve_nqt_thanh_quas as $ve_nqt_thanh_qua)
          <p>{{$ve_nqt_thanh_qua}}</p>
          @endforeach
        </div>



        <div class="section-title" data-aos="fade-up">
          @php
          $ve_nqt_chien_luoc = $sectioncontents->filter(function($item) {
                                  return $item->key == 've_nqt_chien_luoc';
                              })->first();
          $ve_nqt_chien_luocs = preg_split("/\r\n|\n|\r/", $ve_nqt_chien_luoc->content_show());                    
          @endphp
          <h2>{{$ve_nqt_chien_luoc->name_show()}}</h2>
          @foreach($ve_nqt_chien_luocs as $ve_nqt_chien_luoc)
          <p>{{$ve_nqt_chien_luoc}}</p>
          @endforeach
        </div>

      </div>
    </section><!-- End Clients Section -->
 
    <!-- ======= Contact Section ======= -->
<!--    <section id="contact" class="contact">
      <div class="container">

        <div class="section-title" data-aos="fade-up">
          <h2>Contact Us</h2>
        </div>

        <div class="row">

          <div class="col-lg-5 d-flex align-items-stretch" data-aos="fade-right">
            <div class="info">
              <div class="address">
                <i class="bi bi-geo-alt"></i>
                <h4>Địa chỉ:</h4>
                <p>79/5A DT743 - Phường Tân Đông Hiệp - TP. Dĩ An - Tỉnh Bình Dương</p>
              </div>

              <div class="email">
                <i class="bi bi-envelope"></i>
                <h4>Email:</h4>
                <p>nqt3999@gmail.com</p>
              </div>

              <div class="phone">
                <i class="bi bi-phone"></i>
                <h4>Điện thoại:</h4>
                <p> (+84) 934.54.13.13</p>
              </div>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3917.517855388182!2d106.741649!3d10.924199799999998!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3174d9c94916fadf%3A0xbb6ff70818f161ad!2zNzkgxJBUNzQzLCBLaHUgUGjhu5EsIFRodeG6rW4gQW4sIELDrG5oIETGsMahbmc!5e0!3m2!1sen!2s!4v1683176185483!5m2!1sen!2s" frameborder="0" style="border:0; width: 100%; height: 290px;" allowfullscreen></iframe>
            </div>

          </div>

          <div class="col-lg-7 mt-5 mt-lg-0 d-flex align-items-stretch" data-aos="fade-left">
            <form action="forms/contact.php" method="post" role="form" class="php-email-form">
              <div class="row">
                <div class="form-group col-md-6">
                  <label for="name">Your Name</label>
                  <input type="text" name="name" class="form-control" id="name" required>
                </div>
                <div class="form-group col-md-6 mt-3 mt-md-0">
                  <label for="name">Your Email</label>
                  <input type="email" class="form-control" name="email" id="email" required>
                </div>
              </div>
              <div class="form-group mt-3">
                <label for="name">Subject</label>
                <input type="text" class="form-control" name="subject" id="subject" required>
              </div>
              <div class="form-group mt-3">
                <label for="name">Message</label>
                <textarea class="form-control" name="message" rows="10" required></textarea>
              </div>
              <div class="my-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your message has been sent. Thank you!</div>
              </div>
              <div class="text-center"><button class="btn-success" type="submit">Send Message</button></div>
            </form>
          </div>

        </div>

      </div>
      </section> End Contact Section -->
<section id="gallery" class="gallery">
      <div class="container">

        <div class="section-title">
          @php
          $ve_nqt_hinh_anh = $sectioncontents->filter(function($item) {
                                  return $item->key == 've_nqt_hinh_anh';
                              })->first();
          @endphp
          <h2>{{$ve_nqt_hinh_anh->name_show()}}</h2>
      </div>

      <div class="container-fluid">
        <div class="row g-0">
        @for ($i =1; $i<=7; $i++)
          <div class="col-lg-3 col-md-4">
            
            <div class="gallery-item">
              <a href="{{asset('assets/images/nqt/'.$i.'.jpg')}}" class="galelry-lightbox">
                <img src="{{asset('assets/images/nqt/'.$i.'.jpg')}}" alt="" class="img-fluid">
              </a>
            </div>
            
          </div>
        @endfor
        </div>

      </div>
    </section>
  </main><!-- End #main -->
  <script src="https://bootstrapmade.com/assets/js/demo.js?v=5.0"></script>
  <script src="https://bootstrapmade.com/assets/vendor/aos/aos.js"></script>
  <script src="https://bootstrapmade.com/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="https://bootstrapmade.com/assets/vendor/glightbox/js/glightbox.min.jss"></script>
  <script src="https://bootstrapmade.com/assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="https://bootstrapmade.com/demo/templates/Scaffold/assets/js/main.js"></script>
  <script defer="" src="https://static.cloudflareinsights.com/beacon.min.js/v2b4487d741ca48dcbadcaf954e159fc61680799950996" integrity="sha512-D/jdE0CypeVxFadTejKGTzmwyV10c1pxZk/AqjJuZbaJwGMyNHY3q/mTPWqMUnFACfCTunhZUVcd4cV78dK1pQ==" data-cf-beacon="{&quot;rayId&quot;:&quot;7ba19c60cd9f0796&quot;,&quot;token&quot;:&quot;68c5ca450bae485a842ff76066d69420&quot;,&quot;version&quot;:&quot;2023.3.0&quot;,&quot;si&quot;:100}" crossorigin="anonymous"></script>
@endsection