@php 
$menus = \App\Models\Menu::where('status','public')->orderBy('order','DESC')->get();
$ten_tim_kiem = \App\Models\SectionContent::where('key','ten_tim_kiem')->first();
@endphp
<header class="header-site">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light ">
            <div class="col-lg-2 col-md-2 col-sm-2">
                <a href="{{route('index')}}" class="navbar-brand logo"><img src="{{ asset('client/assets/img/logo.png') }}" alt=""></a>
            </div>
            <div class="col-lg-10 col-md-10 col-sm-10">
                <div class="row mt-4">
                    <div class="col-lg-12 col-sm-12 float-right">
                        <!-- <button class="navbar-toggler float-right" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button> -->

                        <label for="nav-mobile-input" class="navbar-toggler float-right" >
                            <span class="navbar-toggler-icon"></span>
                        </label>

                        <input type="checkbox" class="nav__input" id="nav-mobile-input" hidden>
                        <label for="nav-mobile-input" class="nav__overlay"></label>
                        <!-- navbar mobile -->
                        <nav class="nav__mobile">
                            <label for="nav-mobile-input" class="nav__mobile-close">
                                <i class="fas fa-times"></i>
                            </label>
                            <ul class="nav__mobile-list navbar-nav mt-5">
                                @foreach ($menus as $menu)
                            @if($menu->parent_id == '')
                              @if($menu->level == 1) 
                                  <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{$menu->name_show()}}</a>
                                    <div class="dropdown-menu dropright" aria-labelledby="dropdownMenu2">
                                      
                                          @foreach ($menus as $sub1)
                                           @if($sub1->parent_id == $menu->id)
                                              @if($menu->level == 1) 
                                              <a class="nav-link-sub dropdown-toggle" type="button" id="submenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{$sub1->name_show()}}</a>
                                               <div class="dropdown-menu">
                                                 @foreach ($menus as $sub2)
                                                    @if($sub2->parent_id == $sub1->id)
                                                    <a class="dropdown-item-header " href="{{url('ve-trazano')}}">{{$sub2->name_show()}}</a>
                                                    @endif
                                                  @endforeach
                                               </div>
                                              @else 
                                                <a class="dropdown-item-header golden-crown" type="button">{{$sub1->name_show()}}</a>
                                              @endif
                                           @endif
                                          @endforeach
                                          
                                          @if(count($menu->posts) > 0)
                                          @foreach($menu->posts as $post)
                                          <a @if($post->slug != '') href="{{url('blog/'.$post->slug)}}" @endif class="dropdown-item-header" type="button">{{$post->title_show()}}</a>
                                          @endforeach
                                      @endif 
                                      </div>
                                   </li>
                              @else 
                                <li class="nav-item">
                                    <a class="nav-link" @if($menu->link != '') href="{{url($menu->link)}}" @endif>{{$menu->name_show()}}</a>
                                </li>
                              @endif
                            @endif
                            @endforeach
                                <!-- login -->
                                @if( auth()->check() )
                            @if(Auth::user()->hasRole('client'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{url('client/gio-hang')}}"><i class="fa-light fa-cart-shopping"></i> <span id="cart-total">@if($order) {{count($order->tyres)}} @endif</span></a>
                            </li>
                            @endif
                                <li class="nav-item dropdown">
                                 <a class="nav-link dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  @if(session()->get('language') == 'vi') Tài khoản @else Account @endif
                                </a>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                  <a href="@if(Auth::user()->hasRole('admin')) {{url('admin')}} @elseif (Auth::user()->hasRole('staff')) {{url('staff')}} @elseif (Auth::user()->hasRole('client')) {{url('client/profile')}} @elseif (Auth::user()->hasRole('dealer')) {{url('dealer/bang-quan-tri')}} @endif" class="dropdown-item-header" type="button">{{ auth()->user()->name }}</a>
                                 <a href="{{url('/logout')}}" class="dropdown-item-header" type="button" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                   @if(session()->get('language') == 'vi') Đăng xuất @else Logout @endif
                                 </a>
                                  <form id="logout-form" action="{{ url('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                                </div>
                            </li>
                            @else
                                <li class="nav-item">
                                    <a class="nav-link" href="{{url('/login')}}">
                                      @if(session()->get('language') == 'vi') Đăng nhập @else Login @endif
                                    </a>
                                </li>
                            @endif
                            
                                @if(session()->get('language') == 'vi')
                                  <li class="nav-item">
                                    <a href="{{url('language/en')}}"><img src="{{asset('assets/images/en.jpg')}}"></a>
                                  </li>
                                @else 
                                  <li class="nav-item">
                                    <a  href="{{url('language/vi')}}"><img src="{{asset('assets/images/vn.png')}}"></a>
                                  </li>
                                @endif
                            </ul>
                          <div class="row mt-4 d-lg-none">
                              <div class="form-group offset-lg-2" style="display: contents;width: 300px !important; height: 44px; border: 1px solid #35A25B; border-radius: 70px;">
                                <form method="POST" action="{{url('tim-lop-xe')}}" enctype="multipart/form-data" style="padding-left: 5%;">
                          @csrf
                        <input type="text" name="search" class="form-control" placeholder="{{$ten_tim_kiem->name_show()}}">
                        </form>
                    </div>
                </div>
                        </nav>
                    </div>
                    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                        <ul class="navbar-nav">
                          @foreach ($menus as $menu)
                            @if($menu->parent_id == '')
                              @if($menu->level == 1) 
                                  <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{$menu->name_show()}}</a>
                                    <div class="dropdown-menu dropright" aria-labelledby="dropdownMenu2">
                                      
                                          @foreach ($menus as $sub1)
                                           @if($sub1->parent_id == $menu->id)
                                              @if($menu->level == 1) 
                                              <a class="nav-link-sub dropdown-toggle @if($sub1->id==8) tranzano @elseif($sub1->id==9) golden-crown @endif" type="button" id="submenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{$sub1->name_show()}}</a>
                                               <div class="dropdown-menu">
                                                 @foreach ($menus as $sub2)
                                                    @if($sub2->parent_id == $sub1->id)
                                                    <a class="dropdown-item-header @if($sub2->parent_id==8) tranzano @elseif($sub1->parent_id==9) golden-crown @endif" href="{{url('ve-trazano')}}">{{$sub2->name_show()}}</a>
                                                    @endif
                                                  @endforeach
                                               </div>
                                              @else 
                                                <a class="dropdown-item-header golden-crown" type="button">{{$sub1->name_show()}}</a>
                                              @endif
                                           @endif
                                          @endforeach
                                          
                                          @if(count($menu->posts) > 0)
                                          @foreach($menu->posts as $post)
                                          <a @if($post->slug != '') href="{{url('blog/'.$post->slug)}}" @endif class="dropdown-item-header" type="button">{{$post->title_show()}}</a>
                                          @endforeach
                                      @endif 
                                      </div>
                                   </li>
                              @else 
                                <li class="nav-item">
                                    <a class="nav-link" @if($menu->link != '') href="{{url($menu->link)}}" @endif>{{$menu->name_show()}}</a>
                                </li>
                              @endif
                            @endif
                            @endforeach
                            
                            
                            
                            @if( auth()->check() )
                            @if(Auth::user()->hasRole('client'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{url('client/gio-hang')}}"><i class="fa-light fa-cart-shopping"></i> <span id="cart-total">@if($order) {{count($order->tyres)}} @endif</span></a>
                            </li>
                            @endif
                                <li class="nav-item dropdown">
                                 <a class="nav-link dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  @if(session()->get('language') == 'vi') Tài khoản @else Account @endif
                                </a>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                  <a href="@if(Auth::user()->hasRole('admin')) {{url('admin')}} @elseif (Auth::user()->hasRole('staff')) {{url('staff')}} @elseif (Auth::user()->hasRole('client')) {{url('client/profile')}} @elseif (Auth::user()->hasRole('dealer')) {{url('dealer/bang-quan-tri')}} @endif" class="dropdown-item-header" type="button">{{ auth()->user()->name }}</a>
                                 <a href="{{url('/logout')}}" class="dropdown-item-header" type="button" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                   @if(session()->get('language') == 'vi') Đăng xuất @else Logout @endif
                                 </a>
                                  <form id="logout-form" action="{{ url('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                                </div>
                            </li>
                            @else 
                            <li class="nav-item">
                                    <a class="nav-link" href="{{url('/login')}}">
                                      @if(session()->get('language') == 'vi') Đăng nhập @else Login @endif
                                    </a>
                            </li>
                            @endif
                            
                                @if(session()->get('language') == 'vi')
                                  <li class="nav-item">
                                    <a class="" href="{{url('language/en')}}"  style="padding-left: 10px; padding-right: 10px">
                                      <img src="{{asset('assets/images/en.jpg')}}">
                                    </a>
                                  </li>
                                @else 
                                  <li class="nav-item">
                                    <a class="" href="{{url('language/vi')}}" style="padding-left: 10px; padding-right: 10px">
                                      <img src="{{asset('assets/images/vn.png')}}">
                                    </a>
                                  </li>
                                @endif
                        </ul>
                    </div>
                </div>

                <div class="row mt-4 d-none d-lg-block">
                    <div class="form-group has-search offset-lg-2">
                        <span class="form-control-feedback"><i class="fa-light fa-magnifying-glass"></i></span>
                        <form method="POST" action="{{url('tim-lop-xe')}}" enctype="multipart/form-data">
                          @csrf
                        <input type="text" name="search" class="form-control" placeholder="{{$ten_tim_kiem->name_show()}}">
                        </form>
                    </div>
                </div>
            </div>
            </nav>
    </div>
</header>