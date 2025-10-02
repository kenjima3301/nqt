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
        <!-- Desktop: Always show all buttons -->
        <div class="desktop-chat-buttons hidden md:flex flex-col space-y-2">
            @php
              $footer_facebook_chat = $contents->filter(function($item) { return $item->key == 'footer_facebook_chat'; })->first();
              $footer_zalo_chat = $contents->filter(function($item) { return $item->key == 'footer_zalo_chat'; })->first();
            @endphp
            @if($footer_facebook_chat && $footer_facebook_chat->name)
            <a class="bg-blue-500 text-white p-3 rounded-full shadow-lg hover:bg-blue-600 flex items-center justify-center transition-all duration-300" href="{{$footer_facebook_chat->name}}" target="_blank" rel="noopener" title="Facebook Messenger">
                <i class="fab fa-facebook-messenger"></i>
            </a>
            @endif
            @if($footer_zalo_chat && $footer_zalo_chat->name)
            <a class="bg-blue-600 text-white p-3 rounded-full shadow-lg hover:bg-blue-700 flex items-center justify-center transition-all duration-300" href="{{$footer_zalo_chat->name}}" target="_blank" rel="noopener" title="Zalo">
                <img src="{{ asset('assets/images/zalo.png') }}" class="w-6 h-6" alt="Zalo">
            </a>
            @endif
            <!-- Google Map Button -->
            <a class="bg-red-500 text-white p-3 rounded-full shadow-lg hover:bg-red-600 flex items-center justify-center transition-all duration-300" href="https://maps.app.goo.gl/3MXgvYAoSSc5nvoy6" target="_blank" rel="noopener" title="Vị trí trên bản đồ">
                <i class="fas fa-map-marker-alt"></i>
            </a>
            <!-- Facebook Page Button -->
            <a class="bg-blue-600 text-white p-3 rounded-full shadow-lg hover:bg-blue-700 flex items-center justify-center transition-all duration-300" href="https://www.facebook.com/share/1BRJf23dJd/?mibextid=wwXIfr" target="_blank" rel="noopener" title="Facebook Page">
                <i class="fab fa-facebook-f"></i>
            </a>
            <!-- TikTok Button -->
            <a class="bg-black text-white p-3 rounded-full shadow-lg hover:bg-gray-800 flex items-center justify-center transition-all duration-300" href="https://www.tiktok.com/@lopxengocquyetthang" target="_blank" rel="noopener" title="TikTok">
                <i class="fab fa-tiktok"></i>
            </a>
        </div>

        <!-- Mobile: Collapsible menu -->
        <div class="mobile-chat-container md:hidden">
            <!-- Chat Menu (appears above toggle button) -->
            <div class="mobile-chat-menu hidden">
                <div class="flex flex-col-reverse space-y-reverse space-y-2 mb-3">
                    @if($footer_facebook_chat && $footer_facebook_chat->name)
                    <a class="mobile-chat-item bg-blue-500 text-white p-2 rounded-full shadow-lg hover:bg-blue-600 flex items-center justify-center transition-all duration-300" href="{{$footer_facebook_chat->name}}" target="_blank" rel="noopener" title="Facebook Messenger">
                        <i class="fab fa-facebook-messenger text-sm"></i>
                    </a>
                    @endif
                    @if($footer_zalo_chat && $footer_zalo_chat->name)
                    <a class="mobile-chat-item bg-blue-600 text-white p-2 rounded-full shadow-lg hover:bg-blue-700 flex items-center justify-center transition-all duration-300" href="{{$footer_zalo_chat->name}}" target="_blank" rel="noopener" title="Zalo">
                        <img src="{{ asset('assets/images/zalo.png') }}" class="w-4 h-4" alt="Zalo">
                    </a>
                    @endif
                    <!-- Google Map Button -->
                    <a class="mobile-chat-item bg-red-500 text-white p-2 rounded-full shadow-lg hover:bg-red-600 flex items-center justify-center transition-all duration-300" href="https://maps.app.goo.gl/3MXgvYAoSSc5nvoy6" target="_blank" rel="noopener" title="Vị trí trên bản đồ">
                        <i class="fas fa-map-marker-alt text-sm"></i>
                    </a>
                    <!-- Facebook Page Button -->
                    <a class="mobile-chat-item bg-blue-600 text-white p-2 rounded-full shadow-lg hover:bg-blue-700 flex items-center justify-center transition-all duration-300" href="https://www.facebook.com/share/1BRJf23dJd/?mibextid=wwXIfr" target="_blank" rel="noopener" title="Facebook Page">
                        <i class="fab fa-facebook-f text-sm"></i>
                    </a>
                    <!-- TikTok Button -->
                    <a class="mobile-chat-item bg-black text-white p-2 rounded-full shadow-lg hover:bg-gray-800 flex items-center justify-center transition-all duration-300" href="https://www.tiktok.com/@lopxengocquyetthang" target="_blank" rel="noopener" title="TikTok">
                        <i class="fab fa-tiktok text-sm"></i>
                    </a>
                </div>
            </div>
            
            <!-- Main Toggle Button (mobile only) -->
            <div class="mobile-chat-toggle bg-blue-500 text-white p-3 rounded-full shadow-lg hover:bg-blue-600 flex items-center justify-center cursor-pointer transition-all duration-300" onclick="toggleMobileChatMenu()">
                <i class="fas fa-comments mobile-chat-icon"></i>
                <i class="fas fa-times mobile-close-icon hidden"></i>
            </div>
        </div>
    </div>

    <script>
        function toggleMobileChatMenu() {
            const chatMenu = document.querySelector('.mobile-chat-menu');
            const chatIcon = document.querySelector('.mobile-chat-icon');
            const closeIcon = document.querySelector('.mobile-close-icon');
            const toggleBtn = document.querySelector('.mobile-chat-toggle');
            
            if (chatMenu.classList.contains('hidden')) {
                // Show menu
                chatMenu.classList.remove('hidden');
                chatIcon.classList.add('hidden');
                closeIcon.classList.remove('hidden');
                toggleBtn.classList.add('bg-red-500', 'hover:bg-red-600');
                toggleBtn.classList.remove('bg-blue-500', 'hover:bg-blue-600');
                
                // Animate items from bottom to top
                const items = document.querySelectorAll('.mobile-chat-item');
                items.forEach((item, index) => {
                    setTimeout(() => {
                        item.style.transform = 'translateY(0) scale(1)';
                        item.style.opacity = '1';
                    }, index * 100);
                });
            } else {
                // Hide menu
                chatMenu.classList.add('hidden');
                chatIcon.classList.remove('hidden');
                closeIcon.classList.add('hidden');
                toggleBtn.classList.remove('bg-red-500', 'hover:bg-red-600');
                toggleBtn.classList.add('bg-blue-500', 'hover:bg-blue-600');
                
                // Reset items
                const items = document.querySelectorAll('.mobile-chat-item');
                items.forEach(item => {
                    item.style.transform = 'translateY(20px) scale(0)';
                    item.style.opacity = '0';
                });
            }
        }

        // Initialize mobile chat items with hidden state
        document.addEventListener('DOMContentLoaded', function() {
            const items = document.querySelectorAll('.mobile-chat-item');
            items.forEach(item => {
                item.style.transform = 'translateY(20px) scale(0)';
                item.style.opacity = '0';
                item.style.transition = 'all 0.3s ease';
            });
        });

        // Close mobile menu when clicking outside
        document.addEventListener('click', function(event) {
            const mobileContainer = document.querySelector('.mobile-chat-container');
            if (mobileContainer && !mobileContainer.contains(event.target)) {
                const chatMenu = document.querySelector('.mobile-chat-menu');
                const chatIcon = document.querySelector('.mobile-chat-icon');
                const closeIcon = document.querySelector('.mobile-close-icon');
                const toggleBtn = document.querySelector('.mobile-chat-toggle');
                
                if (chatMenu && !chatMenu.classList.contains('hidden')) {
                    chatMenu.classList.add('hidden');
                    chatIcon.classList.remove('hidden');
                    closeIcon.classList.add('hidden');
                    toggleBtn.classList.remove('bg-red-500', 'hover:bg-red-600');
                    toggleBtn.classList.add('bg-blue-500', 'hover:bg-blue-600');
                    
                    // Reset items
                    const items = document.querySelectorAll('.mobile-chat-item');
                    items.forEach(item => {
                        item.style.transform = 'translateY(20px) scale(0)';
                        item.style.opacity = '0';
                    });
                }
            }
        });
    </script>

<script>(function(){function c(){var b=a.contentDocument||a.contentWindow.document;if(b){var d=b.createElement('script');d.innerHTML="window.__CF$cv$params={r:'984b030eb3db5f33',t:'MTc1ODgwODQ1MC4wMDAwMDA='};var a=document.createElement('script');a.nonce='';a.src='/cdn-cgi/challenge-platform/scripts/jsd/main.js';document.getElementsByTagName('head')[0].appendChild(a);";b.getElementsByTagName('head')[0].appendChild(d)}}if(document.body){var a=document.createElement('iframe');a.height=1;a.width=1;a.style.position='absolute';a.style.top=0;a.style.left=0;a.style.border='none';a.style.visibility='hidden';document.body.appendChild(a);if('loading'!==document.readyState)c();else if(window.addEventListener)document.addEventListener('DOMContentLoaded',c);else{var e=document.onreadystatechange||function(){};document.onreadystatechange=function(b){e(b);'loading'!==document.readyState&&(document.onreadystatechange=e,c())}}}})();</script>

