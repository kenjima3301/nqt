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
                        @if($menu->children->count() > 0)
                            <div class="relative group">
                                @if(!empty($menu->link) || $menu->name_show() == 'Sản phẩm')
                                    <a href="{{ $menu->getUrl() }}" class="text-gray-700 hover:text-green-600 font-medium flex items-center text-lg">
                                        {{$menu->name_show()}} <i class="fas fa-chevron-down ml-1"></i>
                                    </a>
                                @else
                                    <button class="text-gray-700 hover:text-green-600 font-medium flex items-center text-lg">
                                        {{$menu->name_show()}} <i class="fas fa-chevron-down ml-1"></i>
                                    </button>
                                @endif
                                <div class="absolute top-full left-0 mt-2 min-w-[12rem] bg-white rounded shadow-lg hidden group-hover:block z-[60] pt-2">
                                    @foreach ($menu->children as $child)
                                        @if($child->children->count() > 0)
                                            <div class="relative group/sub">
                                                <a href="{{ $child->getUrl() }}" class="block px-4 py-2 hover:bg-gray-100">{{$child->name_show()}}</a>
                                                <div class="absolute top-0 left-full mt-0 min-w-[12rem] bg-white rounded shadow-lg hidden group-hover/sub:block z-[70] pt-2">
                                                    @foreach ($child->children as $grandchild)
                                                        <a href="{{ $grandchild->getUrl() }}" class="block px-4 py-2 hover:bg-gray-100">
                                                            {{$grandchild->name_show()}}
                                                        </a>
                                                    @endforeach
                                                </div>
                                            </div>
                                        @else
                                            <a href="{{ $child->getUrl() }}" class="block px-4 py-2 hover:bg-gray-100">
                                                {{$child->name_show()}}
                                            </a>
                                        @endif
                                    @endforeach
                                    @if($menu->posts->count() > 0)
                                        @foreach($menu->posts as $post)
                                            <a href="{{url('blog/'.$post->slug)}}" class="block px-4 py-2 hover:bg-gray-100">{{$post->title_show()}}</a>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        @else
                            <a href="{{ $menu->getUrl() }}" class="text-gray-700 hover:text-green-600 font-medium text-lg text-center">
                               {{ $menu->name_show() }}
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
                <div class="flex justify-between items-center ml-4 mb-3">
                    <img src="{{ asset('upload/photo/bien-hieu-cty-1-1740488494.png') }}" alt="Logo công ty" class="w-32 md:w-48 lg:w-64 h-auto transition-all duration-300">
                    <button onclick="toggleMobileMenu()">
                        <i class="fas fa-times text-xl"></i>
                    </button>
                </div>
                <nav class="space-y-4">
                    @foreach ($menus as $menu)
                        @if($menu->parent_id == '')
                            <a href="{{ $menu->getUrl() }}" class="block text-gray-700 hover:text-green-600">
                                {{ $menu->name_show() }}
                            </a>
                        @endif
                    @endforeach

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