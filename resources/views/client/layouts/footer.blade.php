@php 
$contents = \App\Models\SectionContent::where('key','LIKE',"%footer%")->get();
$information = \App\Models\Menu::find(4);
$menus = \App\Models\Menu::where('status', 'public')->get();
$aboutus = \App\Models\Menu::find(14);
@endphp 
<!-- Footer -->
<footer class="bg-gray-800 text-white py-12">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div>
                    <div class="text-center mb-1">
                        <a href="{{route('index')}}" class="inline-block"><img src="{{ asset('/upload/photo/bien-hieu-cty-1-1740488494.png') }}" alt="NQT" class="h-10"></a>
                    </div>
                    @php
                      $footer_dia_chi = $contents->filter(function($item) { return $item->key == 'footer_dia_chi'; })->first();
                      $footer_mst = $contents->filter(function($item) { return $item->key == 'footer_mst'; })->first();
                      $footer_email = $contents->filter(function($item) { return $item->key == 'footer_email'; })->first();
                      $footer_dien_thoai = $contents->filter(function($item) { return $item->key == 'footer_dien_thoai'; })->first();
                    @endphp
                    <ul class="space-y-2 text-gray-300">
                        @if($footer_dia_chi)<li><i class="fa-light fa-location-dot mr-2"></i> {{$footer_dia_chi->name_show()}}</li>@endif
                        @if($footer_mst)<li><i class="fa-light fa-rectangle-code mr-2"></i> {{$footer_mst->name_show()}}</li>@endif
                        @if($footer_email)<li><i class="fa-light fa-envelope mr-2"></i> {{$footer_email->name_show()}}</li>@endif
                        @if($footer_dien_thoai)<li><i class="fa-light fa-phone mr-2"></i> {{$footer_dien_thoai->name_show()}}</li>@endif
                    </ul>
                </div>
                <div class="text-center">
                    @php
                      $footer_ve_chung_toi= $contents->filter(function($item) { return $item->key == 'footer_ve_chung_toi'; })->first();
                      $footer_ve_nqt = $contents->filter(function($item) { return $item->key == 'footer_ve_nqt'; })->first();
                    @endphp
                    <h4 class="text-lg font-semibold mb-4">{{$footer_ve_chung_toi->name_show() ?? 'Về chúng tôi'}}</h4>
                    <ul class="space-y-2 text-gray-300">
                        @if($footer_ve_nqt)<li><a href="{{url('/ve-nqt')}}" class="hover:text-white">{{$footer_ve_nqt->name_show()}}</a></li>@endif
                        @if(count($aboutus->posts) > 0)
                          @foreach($aboutus->posts as $post)
                            <li><a href="{{url('blog/'.$post->slug)}}" class="hover:text-white">{{$post->title_show()}}</a></li>
                          @endforeach
                        @endif
                    </ul>
                </div>
                <div class="text-center">
                    <h4 class="text-lg font-semibold mb-4">Chính sách</h4>
                    <ul class="space-y-2 text-gray-300">
                        <li><a href="#" class="hover:text-white">Chính sách bảo mật</a></li>
                        <li><a href="#" class="hover:text-white">Điều khoản sử dụng</a></li>
                        <li><a href="#" class="hover:text-white">Chính sách đổi trả</a></li>
                        <li><a href="#" class="hover:text-white">Chính sách giao hàng</a></li>
                        <li><a href="#" class="hover:text-white">Chính sách thanh toán</a></li>
                        <li><a href="#" class="hover:text-white">Chính sách bảo hành</a></li>
                    </ul>
                </div>
                <div class="text-center">
                    <h4 class="text-lg font-semibold mb-4">Trazano</h4>
                    <ul class="space-y-2 text-gray-300">
                        @foreach($menus as $tranzano)
                          @if($tranzano->parent_id == 8)
                            <li><a @if($tranzano->link != '') href="{{url($tranzano->link)}}" @endif class="hover:text-white">{{$tranzano->name_show()}}</a></li>
                          @endif
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="border-t border-gray-700 mt-8 pt-8 text-center text-gray-300">
                <p>&copy; {{ date('Y') }} NQT. Tất cả quyền được bảo lưu.</p>
            </div>
        </div>
    </footer>

    <!-- Floating Chat -->
    <div class="chat-float">
        <div class="flex flex-col space-y-2">
            @php
              $footer_facebook_chat = $contents->filter(function($item) { return $item->key == 'footer_facebook_chat'; })->first();
              $footer_zalo_chat = $contents->filter(function($item) { return $item->key == 'footer_zalo_chat'; })->first();
            @endphp
            @if($footer_facebook_chat && $footer_facebook_chat->name)
            <a class="bg-blue-500 text-white p-3 rounded-full shadow-lg hover:bg-blue-600 flex items-center justify-center" href="{{$footer_facebook_chat->name}}" target="_blank" rel="noopener">
                <i class="fab fa-facebook-messenger"></i>
            </a>
            @endif
            @if($footer_zalo_chat && $footer_zalo_chat->name)
            <a class="bg-blue-600 text-white p-3 rounded-full shadow-lg hover:bg-blue-700 flex items-center justify-center" href="{{$footer_zalo_chat->name}}" target="_blank" rel="noopener">
                <img src="{{ asset('assets/images/zalo.png') }}" class="w-6 h-6" alt="Zalo">
            </a>
            @endif
            <!-- Google Map Button -->
            <a class="bg-red-500 text-white p-3 rounded-full shadow-lg hover:bg-red-600 flex items-center justify-center" href="https://maps.app.goo.gl/3MXgvYAoSSc5nvoy6" target="_blank" rel="noopener">
                <i class="fas fa-map-marker-alt"></i>
            </a>
            <!-- Facebook Page Button -->
            <a class="bg-blue-600 text-white p-3 rounded-full shadow-lg hover:bg-blue-700 flex items-center justify-center" href="https://www.facebook.com/share/1BRJf23dJd/?mibextid=wwXIfr" target="_blank" rel="noopener">
                <i class="fab fa-facebook-f"></i>
            </a>
            <!-- TikTok Button -->
            <a class="bg-black text-white p-3 rounded-full shadow-lg hover:bg-gray-800 flex items-center justify-center" href="https://www.tiktok.com/@lopxengocquyetthang" target="_blank" rel="noopener">
                <i class="fab fa-tiktok"></i>
            </a>
        </div>
    </div>

<script>(function(){function c(){var b=a.contentDocument||a.contentWindow.document;if(b){var d=b.createElement('script');d.innerHTML="window.__CF$cv$params={r:'984b030eb3db5f33',t:'MTc1ODgwODQ1MC4wMDAwMDA='};var a=document.createElement('script');a.nonce='';a.src='/cdn-cgi/challenge-platform/scripts/jsd/main.js';document.getElementsByTagName('head')[0].appendChild(a);";b.getElementsByTagName('head')[0].appendChild(d)}}if(document.body){var a=document.createElement('iframe');a.height=1;a.width=1;a.style.position='absolute';a.style.top=0;a.style.left=0;a.style.border='none';a.style.visibility='hidden';document.body.appendChild(a);if('loading'!==document.readyState)c();else if(window.addEventListener)document.addEventListener('DOMContentLoaded',c);else{var e=document.onreadystatechange||function(){};document.onreadystatechange=function(b){e(b);'loading'!==document.readyState&&(document.onreadystatechange=e,c())}}}})();</script>

