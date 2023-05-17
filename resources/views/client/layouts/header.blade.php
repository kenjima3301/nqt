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
                                <li class="nav-item dropdown {{ Request::path() == 'san-pham' ? 'active' : ''}}">
                                    <a class="nav-link dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Sản phẩm</a>
                                    <div class="dropdown-menu dropright" aria-labelledby="dropdownMenu2">  
                                    <a class="nav-link-sub dropdown-toggle" type="button" id="submenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Lốp xe tải Trazano</a>
                                        <div class="dropdown-menu">
                                        <a class="dropdown-item-header" href="{{url('ve-trazano')}}">Về Trazano</a>
                                        <a class="dropdown-item-header" href="#">Điểm nổi bật</a>
                                        <a class="dropdown-item-header" href="{{url('tim-lop-xe')}}">Các dòng lốp</a>
                                    </div>
                                    <a class="dropdown-item-header" type="button">Lốp Xe tải Golden Crown</a>
                                    </div>
                                </li>
                                <li class="nav-item dropdown {{ Request::path() == 'dich-vu' ? 'active' : ''}}">
                                    <a class="nav-link dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dịch vụ</a>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenu2">  
                                    <a href="{{url('/ve-trazano')}}"  class="dropdown-item-header" type="button">Tư vấn chọn lốp xe hiệu quả</a>
                                    <a class="dropdown-item-header" type="button">Cứu hộ xe</a>
                                    <a class="dropdown-item-header" type="button">Kiểm tra kỹ thuật</a>
                                    <a class="dropdown-item-header" type="button">Chạy thử</a>
                                    <a class="dropdown-item-header" type="button">Dịch vụ cao cấp</a>
                                    </div>
                                </li>
                            
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Thông tin
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                    <a href="{{url('blog/bi-quyet-chon-lop-xe')}}" class="dropdown-item-header" type="button">Bí quyết chọn lốp xe</a>
                                    <a class="dropdown-item-header" type="button">Phân loại các dòng xe</a>
                                    <a class="dropdown-item-header" type="button">Đánh giá hiệu quả lốp xe</a>
                                    <a class="dropdown-item-header" type="button">Kiểm tra lốp định kỳ</a>
                                    <a class="dropdown-item-header" type="button">Cách tìm mua lốp xe an toàn, hiệu quả</a>
                                    <a class="dropdown-item-header" type="button">An toàn đường dài</a>
                                    <a class="dropdown-item-header" type="button">Lốp xe tải: kinh nghiệm mua và bảo dưỡng</a>
                                    <a class="dropdown-item-header" type="button">Cách đọc thông số lốp xe</a>
                                    </div>
                                </li>
                                
                                <li class="nav-item  {{ Request::path() == 'tim-dai-ly' ? 'active' : ''}}">
                                    <a class="nav-link" href="{{url('/tim-dai-ly')}}">Tìm đại lý</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{url('/khuyen-mai')}}">Khuyến mại</a>
                                </li>
                                <!-- login -->
                                <li class="nav-item mt-3">
                                @guest
                                    @if (Route::has('login'))
                                    <a class="nav-link" href="{{ route('login') }}">Đăng nhập</a>
                                    @endif
                                    <!-- @if (Route::has('register'))
                                    <a class="nav-link" href="{{ route('register') }}">Đăng kí</a>
                                    @endif -->
                                @else
                                <div class="dropdown">
                                    <a class="dropbtn nav-link dropdown-toggle">{{ Auth::user()->name }}</a>
                                    <div class="dropdown-content">
                                        <a href="{{ route('user.profile') }}">Hồ sơ của tôi</a>
                                        <a href="{{ route('user.purchase') }}">Đơn mua</a>
                                        <a  href="{{ route('logout') }}" onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">Đăng xuất</a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                    </div>
                                    @endguest
                                </li>
                            </ul>
                        </nav>
                    </div>
                    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="{{url('')}}">Trang chủ</a>
                            </li>
                            <li class="nav-item dropdown {{ Request::path() == 'san-pham' ? 'active' : ''}}">
                                <a class="nav-link dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Sản phẩm</a>
                                <div class="dropdown-menu dropright" aria-labelledby="dropdownMenu2">  
                                   <a class="nav-link-sub dropdown-toggle tranzano" type="button" id="submenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Lốp xe tải Trazano</a>
                                    <div class="dropdown-menu">
                                    <a class="dropdown-item-header tranzano" href="{{url('ve-trazano')}}">Về Trazano</a>
                                    <a class="dropdown-item-header tranzano" href="#">Điểm nổi bật</a>
                                    <a class="dropdown-item-header tranzano" href="{{url('tim-lop-xe')}}">Các dòng lốp</a>
                                </div>
                                <a class="dropdown-item-header golden-crown" type="button">Lốp Xe tải Golden Crown</a>
                                <a class="dropdown-item-header" type="button">Lốp xe tải các nhãn hiệu khác</a>

                                </div>
                            </li>
                            <li class="nav-item dropdown {{ Request::path() == 'dich-vu' ? 'active' : ''}}">
                                <a class="nav-link dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dịch vụ</a>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenu2">  
                                   <a href="{{url('/ve-trazano')}}"  class="dropdown-item-header" type="button">Tư vấn chọn lốp xe hiệu quả</a>
                                  <a class="dropdown-item-header" type="button">Cứu hộ xe</a>
                                  <a class="dropdown-item-header" type="button">Kiểm tra kỹ thuật</a>
                                  <a class="dropdown-item-header" type="button">Chạy thử</a>
                                  <a class="dropdown-item-header" type="button">Dịch vụ cao cấp</a>
                                  <a class="dropdown-item-header" type="button">Quy trình bảo hành lốp</a>
                                  <a href="{{url('/staff')}}" class="dropdown-item-header" type="button">NỘI BỘ NQT</a>
                                </div>
                            </li>
                           
                            <li class="nav-item dropdown">
                                 <a class="nav-link dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  Thông tin
                                </a>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                  <a href="{{url('/khuyen-mai')}}" class="dropdown-item-header" type="button">Khuyến mại</a>
                                  <a href="{{url('blog/bi-quyet-chon-lop-xe')}}" class="dropdown-item-header" type="button">Bí quyết chọn lốp xe</a>
                                  <a class="dropdown-item-header" type="button">Phân loại các dòng xe</a>
                                  <a class="dropdown-item-header" type="button">Đánh giá hiệu quả lốp xe</a>
                                  <a class="dropdown-item-header" type="button">Kiểm tra lốp định kỳ</a>
                                  <a class="dropdown-item-header" type="button">Cách tìm mua lốp xe an toàn, hiệu quả</a>
                                  <a class="dropdown-item-header" type="button">An toàn đường dài</a>
                                  <a class="dropdown-item-header" type="button">Lốp xe tải: kinh nghiệm mua và bảo dưỡng</a>
                                  <a class="dropdown-item-header" type="button">Cách đọc thông số lốp xe</a>
                                </div>
                            </li>
                            
                            <li class="nav-item  {{ Request::path() == 'tim-dai-ly' ? 'active' : ''}}">
                                <a class="nav-link" href="{{url('/tim-dai-ly')}}">Tìm đại lý</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{url('lien-he')}}">Liên hệ</a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="row mt-4 d-none d-lg-block">
                    <div class="form-group has-search offset-lg-2">
                        <span class="form-control-feedback"><i class="fa-light fa-magnifying-glass"></i></span>
                        <form method="POST" action="{{url('tim-lop-xe')}}" enctype="multipart/form-data">
                          @csrf
                        <input type="text" name="search" class="form-control" placeholder="Tìm kiếm mã gai hoặc size lốp">
                        </form>
                    </div>
                </div>
            </div>
            </nav>
    </div>
</header>