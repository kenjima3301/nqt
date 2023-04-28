<header class="header-site">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light ">
            <div class="col-lg-2 col-md-2 col-sm-2">
                <a href="{{route('index')}}" class="navbar-brand"><img src="{{ asset('client/assets/img/logo.png') }}" alt=""></a>
            </div>
            <div class="col-lg-10 col-md-10 col-sm-10">
                <div class="row mt-4">
                    <div class="col-lg-10 col-sm-10 float-right">
                        <button class="navbar-toggler float-right" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                    </div>
                    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                        <ul class="navbar-nav">
                            <li class="nav-item dropdown {{ Request::path() == 'san-pham' ? 'active' : ''}}">
                                <a class="nav-link dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Sản phẩm</a>
                                <div class="dropdown-menu dropright" aria-labelledby="dropdownMenu2">  
                                   <a class="nav-link-sub dropdown-toggle" type="button" id="submenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Lốp xe tải Trazano</a>
                                    <div class="dropdown-menu">
                                    <a class="dropdown-item-header" href="{{url('ve-trazano')}}">Về Trazano</a>
                                    <a class="dropdown-item-header" href="#">Điểm nổi bật</a>
                                    <a class="dropdown-item-header" href="{{url('tim-lop-xe')}}">Các dòng lốp</a>
                                  </div>
                                  <a class="dropdown-item-header" type="button">Lốp xe du lịch</a>
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
                                  <a class="dropdown-item-header" type="button">Bí quyết chọn lốp xe</a>
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
                                <a class="nav-link" href="#">Khuyến mại</a>
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