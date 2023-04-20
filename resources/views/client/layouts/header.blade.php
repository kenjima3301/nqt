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
                            <li class="nav-item  {{ Request::path() == 've-trazano' ? 'active' : ''}}">
                                <a class="nav-link" href="{{url('/ve-trazano')}}">Trazano</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Thông tin</a>
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
                        <input type="text" class="form-control" placeholder="Tìm kiếm mã gai hoặc size lốp">
                    </div>
                </div>
            </div>
            </nav>
    </div>
</header>