@php 
$menus = \App\Models\Menu::where('status','public')->orderBy('order','DESC')->get();
$ten_tim_kiem = \App\Models\SectionContent::where('key','ten_tim_kiem')->first();
@endphp

    <!-- Top Bar -->
    <div class="bg-green-600 text-white py-2 hidden md:block">
        <div class="container mx-auto px-5 flex justify-between items-center text-sm">
            <div class="flex items-center space-x-6">
            <span><i class="fas fa-phone"></i> Hotline: 093 454 1313</span>
            <span><i class="fas fa-envelope"></i> nqt3999@gmail.com</span>
            </div>
            <div class="flex items-center space-x-6">
            @if( auth()->check() )
                @if(Auth::user()->hasRole('client'))
                    <a href="{{url('client/gio-hang')}}" class="hover:text-green-200"><i class="fas fa-shopping-cart"></i> <span id="cart-total">@if($order) {{count($order->tyres)}} @endif</span></a>
                @endif
                <div class="relative group-account">
                    <button class="hover:text-green-200 flex items-center" onclick="toggleAccountDropdown()">
                        <i class="fas fa-user mr-1"></i> @if(session()->get('language') == 'vi') Tài khoản @else Account @endif <i class="fas fa-chevron-down ml-1"></i>
                    </button>
                    <div class="absolute right-0 mt-2 w-44 bg-white text-gray-800 rounded shadow-lg z-[60] hidden" id="account-dropdown">
                        <a href="@if(Auth::user()->hasRole('admin')) {{url('admin')}} @elseif (Auth::user()->hasRole('staff')) {{url('staff')}} @elseif (Auth::user()->hasRole('client')) {{url('client/profile')}} @elseif (Auth::user()->hasRole('dealer')) {{url('dealer/bang-quan-tri')}} @endif" class="block px-4 py-2 hover:bg-gray-100">{{ auth()->user()->name }}</a>
                        <a href="{{url('/logout')}}" class="block px-4 py-2 hover:bg-gray-100" onclick="event.preventDefault(); document.getElementById('logout-form-top').submit();">@if(session()->get('language') == 'vi') Đăng xuất @else Logout @endif</a>
                        <form id="logout-form-top" action="{{ url('logout') }}" method="POST" class="hidden">@csrf</form>
                    </div>
                </div>
            @else
                <a href="{{url('/login')}}" class="hover:text-green-200">@if(session()->get('language') == 'vi') Đăng nhập @else Login @endif</a>
            @endif
            @if(session()->get('language') == 'vi')
                <a href="{{url('language/en')}}" class="hover:text-green-200"><img src="{{asset('assets/images/en.jpg')}}" alt="English" title="Switch to English"></a>
            @else
                <a href="{{url('language/vi')}}" class="hover:text-green-200"><img src="{{asset('assets/images/vn.png')}}" alt="Tiếng Việt" title="Chuyển sang Tiếng Việt"></a>
            @endif
            </div>
        </div>
    </div>

    <!-- Header -->
    <header class="bg-white shadow-md sticky top-0 z-50">
        <div class="container mx-auto px-4">
            <div class="flex items-center justify-between py-2 px-3">
                <!-- Logo -->
                <div class="flex items-center space-x-3">
                    <a href="{{route('index')}}" class="navbar-brand logo"><img src="{{ asset('client/assets/img/logo.png') }}" alt="" class="w-11 md:w-20 lg:w-24 max-w-[150%] h-auto transition-all duration-300"></a>
                    <img src="{{ asset('upload/photo/bien-hieu-cty-1-1740488494.png') }}" alt="Logo công ty" class="w-32 md:w-48 lg:w-64 h-auto transition-all duration-300">
                </div>

                <!-- Desktop Navigation -->
                <nav class="hidden lg:flex items-center justify-center space-x-8 flex-1">
                @foreach ($menus as $menu)
                    @if($menu->parent_id == '')
                        @if($menu->level == 1 && $menu->name_show() != 'Sản phẩm')
                            <div class="relative group">
                                <button class="text-gray-700 hover:text-green-600 font-medium flex items-center text-lg">
                                    {{$menu->name_show()}} <i class="fas fa-chevron-down ml-1"></i>
                                </button>
                                <div class="absolute top-full left-0 mt-2 min-w-[12rem] bg-white rounded shadow-lg hidden group-hover:block z-[60] pt-2">
                                    @foreach ($menus as $sub1)
                                        @if($sub1->parent_id == $menu->id)
                                            @if($menu->level == 1)
                                                <div class="relative group/sub">
                                                    <a class="block px-4 py-2 hover:bg-gray-100">{{$sub1->name_show()}}</a>
                                                    <div class="absolute top-0 left-full mt-0 min-w-[12rem] bg-white rounded shadow-lg hidden group-hover/sub:block z-[70] pt-2">
                                                        @foreach ($menus as $sub2)
                                                            @if($sub2->parent_id == $sub1->id)
                                                                <a class="block px-4 py-2 hover:bg-gray-100" 
                                                                   @if($sub2->link != '') 
                                                                       href="{{url($sub2->link)}}" 
                                                                   @elseif($sub2->name_show() == 'Trang chủ')
                                                                       href="{{route('index')}}"
                                                                   @elseif($sub2->name_show() == 'Sản phẩm')
                                                                       href="{{route('list-product')}}"
                                                                   @elseif($sub2->name_show() == 'Dịch vụ')
                                                                       href="{{route('services')}}"
                                                                   @elseif($sub2->name_show() == 'Tin tức')
                                                                       href="{{route('posts', ['slug' => 'tin-tuc'])}}"
                                                                   @elseif($sub2->name_show() == 'Liên hệ')
                                                                       href="{{route('contactus')}}"
                                                                   @elseif($sub2->name_show() == 'Về NQT')
                                                                       href="{{route('nqt')}}"
                                                                   @elseif($sub2->name_show() == 'Về Trazano')
                                                                       href="{{route('trazano')}}"
                                                                   @elseif($sub2->name_show() == 'Khuyến mãi')
                                                                       href="{{route('promotion')}}"
                                                                   @else
                                                                       href="{{url('ve-trazano')}}"
                                                                   @endif>
                                                                   {{$sub2->name_show()}}
                                                                </a>
                                                            @endif
                                                        @endforeach
                                                    </div>
                                                </div>
                                            @else
                                                <a class="block px-4 py-2 hover:bg-gray-100" 
                                                   @if($sub1->link != '') 
                                                       href="{{url($sub1->link)}}" 
                                                   @elseif($sub1->name_show() == 'Trang chủ')
                                                       href="{{route('index')}}"
                                                   @elseif($sub1->name_show() == 'Sản phẩm')
                                                       href="{{route('list-product')}}"
                                                   @elseif($sub1->name_show() == 'Dịch vụ')
                                                       href="{{route('services')}}"
                                                   @elseif($sub1->name_show() == 'Tin tức')
                                                       href="{{route('posts', ['slug' => 'tin-tuc'])}}"
                                                   @elseif($sub1->name_show() == 'Liên hệ')
                                                       href="{{route('contactus')}}"
                                                   @elseif($sub1->name_show() == 'Về NQT')
                                                       href="{{route('nqt')}}"
                                                   @elseif($sub1->name_show() == 'Về Trazano')
                                                       href="{{route('trazano')}}"
                                                   @elseif($sub1->name_show() == 'Khuyến mãi')
                                                       href="{{route('promotion')}}"
                                                   @endif>
                                                   {{$sub1->name_show()}}
                                                </a>
                                            @endif
                                        @endif
                                    @endforeach
                                    @if(count($menu->posts) > 0)
                                        @foreach($menu->posts as $post)
                                            <a @if($post->slug != '') href="{{url('blog/'.$post->slug)}}" @endif class="block px-4 py-2 hover:bg-gray-100">{{$post->title_show()}}</a>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        @else
                            <a class="text-gray-700 hover:text-green-600 font-medium text-lg text-center" 
                               @if($menu->link != '') 
                                   href="{{url($menu->link)}}" 
                               @elseif($menu->name_show() == 'Trang chủ')
                                   href="{{route('index')}}"
                               @elseif($menu->name_show() == 'Sản phẩm')
                                   href="{{route('list-product')}}"
                               @elseif($menu->name_show() == 'Dịch vụ')
                                   href="{{route('services')}}"
                               @elseif($menu->name_show() == 'Tìm đại lý' || $menu->name_show() == 'Tin tức')
                                   href="{{route('posts', ['slug' => 'tin-tuc'])}}"
                               @elseif($menu->name_show() == 'Liên hệ')
                                   href="{{route('contactus')}}"
                               @elseif($menu->name_show() == 'Về NQT')
                                   href="{{route('nqt')}}"
                               @elseif($menu->name_show() == 'Về Trazano')
                                   href="{{route('trazano')}}"
                               @elseif($menu->name_show() == 'Khuyến mãi')
                                   href="{{route('promotion')}}"
                               @endif>
                               {{$menu->name_show() == 'Tìm đại lý' ? 'Tin tức' : $menu->name_show()}}
                            </a>
                        @endif
                    @endif
                @endforeach

                @if( auth()->check() )
                    @if(Auth::user()->hasRole('client'))
                        <a class="text-gray-700 hover:text-green-600 font-medium text-lg" href="{{url('client/gio-hang')}}"><i class="fa-light fa-cart-shopping"></i> <span id="cart-total">@if($order) {{count($order->tyres)}} @endif</span></a>
                    @endif
                @endif

                </nav>

                <!-- Search Bar -->
                <!-- <div class="hidden md:flex items-center bg-gray-100 rounded-full px-4 py-2 w-64">
                <form method="POST" action="{{url('tim-lop-xe')}}" enctype="multipart/form-data" class="flex w-full items-center">
                    @csrf
                    <input type="text" name="search" class="bg-transparent flex-1 outline-none" placeholder="{{$ten_tim_kiem->name_show()}}">
                    <button type="submit" class="text-gray-500"><i class="fas fa-search"></i></button>
                </form>
                </div> -->

                <!-- Mobile Menu Button -->
                <button class="lg:hidden text-gray-700" onclick="toggleMobileMenu()">
                    <i class="fas fa-bars text-xl"></i>
                </button>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div class="mobile-menu fixed top-0 left-0 w-64 h-full bg-white shadow-lg z-50 lg:hidden">
            <div class="p-4">
                <div class="flex justify-between items-center mb-6">
                    <div class="text-xl font-bold text-green-600">TireShop</div>
                    <button onclick="toggleMobileMenu()">
                        <i class="fas fa-times text-xl"></i>
                    </button>
                </div>
                <nav class="space-y-4">
                    <a href="{{route('index')}}" class="block text-gray-700 hover:text-green-600">Trang chủ</a>
                    <a href="{{route('list-product')}}" class="block text-gray-700 hover:text-green-600">Sản phẩm</a>
                    <a href="{{route('services')}}" class="block text-gray-700 hover:text-green-600">Dịch vụ</a>
                    <a href="{{route('posts', ['slug' => 'tin-tuc'])}}" class="block text-gray-700 hover:text-green-600">Tin tức</a>
                    <a href="{{route('contactus')}}" class="block text-gray-700 hover:text-green-600">Liên hệ</a>

                @if( auth()->check() )
                    @if(Auth::user()->hasRole('client'))
                        <a class="block text-gray-700" href="{{url('client/gio-hang')}}"><i class="fa-light fa-cart-shopping"></i> <span id="cart-total">@if($order) {{count($order->tyres)}} @endif</span></a>
                    @endif
                    <a class="block text-gray-700" href="@if(Auth::user()->hasRole('admin')) {{url('admin')}} @elseif (Auth::user()->hasRole('staff')) {{url('staff')}} @elseif (Auth::user()->hasRole('client')) {{url('client/profile')}} @elseif (Auth::user()->hasRole('dealer')) {{url('dealer/bang-quan-tri')}} @endif">{{ auth()->user()->name }}</a>
                    <a class="block text-gray-700" href="{{url('/logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form-mobile').submit();">@if(session()->get('language') == 'vi') Đăng xuất @else Logout @endif</a>
                    <form id="logout-form-mobile" action="{{ url('logout') }}" method="POST" class="hidden">@csrf</form>
                @else
                    <a class="block text-gray-700" href="{{url('/login')}}">@if(session()->get('language') == 'vi') Đăng nhập @else Login @endif</a>
                @endif

                @if(session()->get('language') == 'vi')
                    <a class="block text-gray-700" href="{{url('language/en')}}"><img src="{{asset('assets/images/en.jpg')}}" alt="English" title="Switch to English"></a>
                @else
                    <a class="block text-gray-700" href="{{url('language/vi')}}"><img src="{{asset('assets/images/vn.png')}}" alt="Tiếng Việt" title="Chuyển sang Tiếng Việt"></a>
                @endif
                </nav>
            </div>
        </div>
    </header>

<style>
    /* Cải thiện hover behavior cho dropdown */
    .group:hover .group-hover\:block {
        display: block !important;
    }
    
    .group\/sub:hover .group-hover\/sub\:block {
        display: block !important;
    }
    
    /* Thêm padding invisible để tránh dropdown biến mất */
    .group::before {
        content: '';
        position: absolute;
        top: 100%;
        left: 0;
        right: 0;
        height: 8px;
        background: transparent;
        z-index: 55;
    }
    
    .group\/sub::before {
        content: '';
        position: absolute;
        top: 0;
        left: 100%;
        width: 8px;
        height: 100%;
        background: transparent;
        z-index: 65;
    }
</style>

<script>
    function toggleMobileMenu() {
        const menu = document.querySelector('.mobile-menu');
        menu.classList.toggle('active');
    }

    function toggleAccountDropdown() {
        const dropdown = document.getElementById('account-dropdown');
        dropdown.classList.toggle('hidden');
    }

    function openZalo() {
        alert('Chức năng chat sẽ được tích hợp với Zalo/Messenger thực tế!');
    }

    // Close mobile menu and account dropdown when clicking outside
    document.addEventListener('click', function(event) {
        const menu = document.querySelector('.mobile-menu');
        const menuButton = document.querySelector('button[onclick="toggleMobileMenu()"]');
        const accountDropdown = document.getElementById('account-dropdown');
        const accountButton = document.querySelector('button[onclick="toggleAccountDropdown()"]');
        
        // Close mobile menu
        if (!menu.contains(event.target) && !menuButton.contains(event.target)) {
            menu.classList.remove('active');
        }
        
        // Close account dropdown
        if (accountDropdown && accountButton && !accountDropdown.contains(event.target) && !accountButton.contains(event.target)) {
            accountDropdown.classList.add('hidden');
        }
    });

    // Add smooth scrolling for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth'
                });
            }
        });
    });
</script>