<header class="header-site">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light ">
            <div class="col-lg-2">
                <a href="{{route('index')}}" class="navbar-brand"><img src="{{ asset('client/assets/img/logo.png') }}" alt=""></a>
            </div>
            <div class="col-lg-10">
                <div class="row mt-4">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                        <ul class="navbar-nav">
                            <li class="nav-item  {{ Request::path() == 'san-pham' ? 'active' : ''}}">
                                <a class="nav-link" href="#">Sản phẩm <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item  {{ Request::path() == 'dich-vu' ? 'active' : ''}}">
                                <a class="nav-link" href="{{url('/dich-vu')}}">Dịch vụ</a>
                            </li>
                            <li class="nav-item  {{ Request::path() == 'tim-dai-ly' ? 'active' : ''}}">
                                <a class="nav-link" href="{{url('/tim-dai-ly')}}">Tìm đại lý</a>
                            </li>
                            <li class="nav-item dropdown {{ Request::path() == 've-trazano' ? 'active' : ''}}">
                                <a class="nav-link dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Trazano</a>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                  <a href="{{url('/ve-trazano')}}"  class="dropdown-item-header" type="button">Giới thiệu</a>
                                  <a class="dropdown-item-header" type="button">Điểm nổi bật</a>
                                  <a class="dropdown-item-header" type="button">Các dòng lốp</a>
                            </li>
                            <li class="nav-item dropdown">
                                 <a class="nav-link dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  Thông tin
                                </a>
                                  <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                  <a class="dropdown-item-header" type="button">Khuyến mãi</a>
                                  <a class="dropdown-item-header" type="button">Trải nghiệm khách hàng</a>
                                  <a class="dropdown-item-header" type="button">Bí quyết chọn lốp</a>
                                  <a class="dropdown-item-header" type="button">Thông số lốp xe</a>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Hỗ trợ</a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="row mt-4">
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