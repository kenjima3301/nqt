@php 
$contents = \App\Models\SectionContent::where('key','LIKE',"%footer%")->get();
$information = \App\Models\Menu::find(4);
$menus = \App\Models\Menu::where('status', 'public')->get();
$aboutus = \App\Models\Menu::find(14);
@endphp 
<footer class="pt-3 " style="background: #35A25B;">
  <div class="container">
    <div class="row mt-4 mb">
      <div class="col-lg-6">
        <a href="{{route('index')}}"><img src="{{ asset('client/assets/img/logo.png') }}" alt="Your logo" class="img-fluid" width="15%"></a>
        <div class="footer-info">
          @php
          $footer_dia_chi = $contents->filter(function($item) {
                                  return $item->key == 'footer_dia_chi';
                              })->first();
          @endphp
          <p><i class="fa-light fa-location-dot" style="color:#fff"></i> {{$footer_dia_chi->name_show()}}</p>
          @php
          $footer_mst = $contents->filter(function($item) {
                                  return $item->key == 'footer_mst';
                              })->first();
          @endphp
          <p><i class="fa-light fa-rectangle-code"  style="color:#fff"></i> {{$footer_mst->name_show()}}</p>
          @php
          $footer_email = $contents->filter(function($item) {
                                  return $item->key == 'footer_email';
                              })->first();
          @endphp
          <p><i class="fa-light fa-envelope"  style="color:#fff"></i> {{$footer_email->name_show()}}</p>
          @php
          $footer_dien_thoai = $contents->filter(function($item) {
                                  return $item->key == 'footer_dien_thoai';
                              })->first();
          @endphp
          <p><i class="fa-light fa-phone"  style="color:#fff"></i> {{$footer_dien_thoai->name_show()}}</p>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="row">
            <div class="menu-footer col-lg-4 col-md-6">
          @php
          $footer_ve_chung_toi= $contents->filter(function($item) {
                                  return $item->key == 'footer_ve_chung_toi';
                              })->first();
          @endphp
                <h5>{{$footer_ve_chung_toi->name_show()}}</h5>
                <ul class="list-unstyled">
                  @php
                  $footer_ve_nqt = $contents->filter(function($item) {
                                          return $item->key == 'footer_ve_nqt';
                                      })->first();
                  @endphp
                    <li><a href="{{url('/ve-nqt')}}" class="nav-link">{{$footer_ve_nqt->name_show()}}</a></li>
                    @if(count($aboutus->posts) > 0)
                      @foreach($aboutus->posts as $post)
                      <li><a href="{{url('blog/'.$post->slug)}}" class="nav-link">{{$post->title_show()}}</a></li>
                      @endforeach
                    @endif
                </ul>
            </div>
            <div class="menu-footer col-lg-4 col-md-6">
          @php
          $footer_thong_tin = $contents->filter(function($item) {
                                  return $item->key == 'footer_thong_tin';
                              })->first();
          @endphp
                <h5>{{$footer_thong_tin->name_show()}}</h5>
                <ul class="list-unstyled">
                    @if(count($information->posts) > 0)
                      @foreach($information->posts as $post)
                      <li><a href="{{url('blog/'.$post->slug)}}" class="nav-link">{{$post->title_show()}}</a></li>
                      @endforeach
                    @endif
                </ul>
            </div>
            <div class="menu-footer col-lg-4 col-md-6">
                <h5>Trazano</h5>
                <ul class="list-unstyled">
                  @foreach($menus as $tranzano)
                    @if($tranzano->parent_id == 8)
                    <li><a @if($tranzano->link != '') href="{{url($tranzano->link)}}" @endif class="nav-link">{{$tranzano->name_show()}}</a></li>
                    @endif
                    @endforeach
                </ul>
            </div>
        </div>
      </div>
      <div class="col-lg-4 footer-info">
        
      </div>
    </div>
  </div>
          @php
          $footer_facebook_chat = $contents->filter(function($item) {
                                  return $item->key == 'footer_facebook_chat';
                              })->first();
          @endphp
  <a href="{{$footer_facebook_chat->name ?? ''}}">
  <div style="border: none; visibility: visible; bottom: 122px; right: 52px; position: fixed; width: 60px; z-index: 2147483644; height: 60px; top: auto; width: 60px; height: 60px; background-color: #0A7CFF; display: flex; justify-content: center; align-items: center; border-radius:60px">
    <svg width="36" height="36" viewBox="0 0 36 36"><path fill="white" d="M1 17.99C1 8.51488 8.42339 1.5 18 1.5C27.5766 1.5 35 8.51488 35 17.99C35 27.4651 27.5766 34.48 18 34.48C16.2799 34.48 14.6296 34.2528 13.079 33.8264C12.7776 33.7435 12.4571 33.767 12.171 33.8933L8.79679 35.3828C7.91415 35.7724 6.91779 35.1446 6.88821 34.1803L6.79564 31.156C6.78425 30.7836 6.61663 30.4352 6.33893 30.1868C3.03116 27.2287 1 22.9461 1 17.99ZM12.7854 14.8897L7.79161 22.8124C7.31238 23.5727 8.24695 24.4295 8.96291 23.8862L14.327 19.8152C14.6899 19.5398 15.1913 19.5384 15.5557 19.8116L19.5276 22.7905C20.7193 23.6845 22.4204 23.3706 23.2148 22.1103L28.2085 14.1875C28.6877 13.4272 27.7531 12.5704 27.0371 13.1137L21.673 17.1847C21.3102 17.4601 20.8088 17.4616 20.4444 17.1882L16.4726 14.2094C15.2807 13.3155 13.5797 13.6293 12.7854 14.8897Z"></path></svg>
  </div>
  </a>
          @php
          $footer_zalo_chat = $contents->filter(function($item) {
                                  return $item->key == 'footer_zalo_chat';
                              })->first();
          @endphp
  <a href="{{$footer_zalo_chat->name}}">
  <img style="border: none; visibility: visible; bottom: 52px; right: 52px; position: fixed; width: 55px; z-index: 2147483644; height: 55px; top: auto;" src="{{ asset('assets/images/zalo.png') }}">
  </a>
<script src="https://sp.zalo.me/plugins/sdk.js"> </script> 
</footer>
