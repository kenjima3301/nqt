@extends ('client.layouts.master')
@section('title', 'NQT - Trang chủ')
@section('content')
<div class="container">
    <!-- slider -->
    <div class="slider">
        <img src="{{ asset('client/assets/img/slider.png')}}" alt="">
    </div>
    <!-- end slider -->

    <!-- new product -->
    <div class="new-product">
        <h3 class="text-color">Sản phẩm mới cập nhật</h3>
        <div class="list-new-product row mt-4">
            <div class="col-lg-3">
            <div class="card">
                <div class="card-body">
                <h5 class="card-title">AS858</h5>
                <p class="card-text">LONGHAUL</p>
                <img class="card-img-top" src="{{ asset('client/assets/img/car.png') }}" alt="Product 1">
                <div class="sub-desc row mt-3">
                    <div class="col-lg-4">
                    <p><i class="fa-regular fa-gas-pump"></i> Xe tải</p>
                    </div>
                    <div class="col-lg-4">
                    <p><i class="fa-solid fa-user-group"></i> Trazano</p>
                    </div>
                    <div class="col-lg-4">
                    <p> Steer/Trailler</p>
                    </div>
                </div>
                <div class="row mt">
                    <div class="col-lg-6">
                    <p>1.000.000Đ / Lốp 1.500.00Đ</p>
                    </div>
                    <div class="col-lg-6 text-center">
                    <a href="#" class="btn btn-success">Chi tiết</a>
                    </div>
                </div>
                </div>
            </div>
            </div>
            <div class="col-lg-3">
            <div class="card">
                <div class="card-body">
                <h5 class="card-title">AS858</h5>
                <p class="card-text">LONGHAUL</p>
                <img class="card-img-top" src="{{ asset('client/assets/img/car1.png') }}" alt="Product 1">
                <div class="sub-desc row mt-3">
                    <div class="col-lg-4">
                    <p><i class="fa-regular fa-gas-pump"></i> Xe tải</p>
                    </div>
                    <div class="col-lg-4">
                    <p><i class="fa-solid fa-user-group"></i> Trazano</p>
                    </div>
                    <div class="col-lg-4">
                    <p> Steer/Trailler</p>
                    </div>
                </div>
                <div class="row mt">
                    <div class="col-lg-6">
                    <p>1.000.000Đ / Lốp 1.500.00Đ</p>
                    </div>
                    <div class="col-lg-6 text-center">
                    <a href="#" class="btn btn-success">Chi tiết</a>
                    </div>
                </div>
                </div>
            </div>
            </div> <div class="col-lg-3">
            <div class="card">
                <div class="card-body">
                <h5 class="card-title">AS858</h5>
                <p class="card-text">LONGHAUL</p>
                <img class="card-img-top" src="{{ asset('client/assets/img/car.png') }}" alt="Product 1">
                <div class="sub-desc row mt-3">
                    <div class="col-lg-4">
                    <p><i class="fa-regular fa-gas-pump"></i> Xe tải</p>
                    </div>
                    <div class="col-lg-4">
                    <p><i class="fa-solid fa-user-group"></i> Trazano</p>
                    </div>
                    <div class="col-lg-4">
                    <p> Steer/Trailler</p>
                    </div>
                </div>
                <div class="row mt">
                    <div class="col-lg-6">
                    <p>1.000.000Đ / Lốp 1.500.00Đ</p>
                    </div>
                    <div class="col-lg-6 text-center">
                    <a href="#" class="btn btn-success">Chi tiết</a>
                    </div>
                </div>
                </div>
            </div>
            </div> <div class="col-lg-3">
            <div class="card">
                <div class="card-body">
                <h5 class="card-title">AS858</h5>
                <p class="card-text">LONGHAUL</p>
                <img class="card-img-top" src="{{ asset('client/assets/img/car1.png') }}" alt="Product 1">
                <div class="sub-desc row mt-3">
                    <div class="col-lg-4">
                    <p><i class="fa-regular fa-gas-pump"></i> Xe tải</p>
                    </div>
                    <div class="col-lg-4">
                    <p><i class="fa-solid fa-user-group"></i> Trazano</p>
                    </div>
                    <div class="col-lg-4">
                    <p> Steer/Trailler</p>
                    </div>
                </div>
                <div class="row mt">
                    <div class="col-lg-6">
                    <p>1.000.000Đ / Lốp 1.500.00Đ</p>
                    </div>
                    <div class="col-lg-6 text-center">
                    <a href="#" class="btn btn-success">Chi tiết</a>
                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>
    </div>
    <!-- end new product -->

    <!-- product bestseller -->
    <div class="product-best-seller mt-4">
    <h3 class="text-color">Sản phẩm bán chạy</h3>
        <div class="list-new-product row">
        <div class="col-lg-3 mt-4">
            <div class="card">
            <div class="card-body">
                <h5 class="card-title">AS858</h5>
                <p class="card-text">LONGHAUL</p>
                <img class="card-img-top" src="{{ asset('client/assets/img/car.png') }}" alt="Product 1">
                <div class="sub-desc row mt-3">
                <div class="col-lg-4">
                    <p><i class="fa-regular fa-gas-pump"></i> Xe tải</p>
                </div>
                <div class="col-lg-4">
                    <p><i class="fa-solid fa-user-group"></i> Trazano</p>
                </div>
                <div class="col-lg-4">
                    <p> Steer/Trailler</p>
                </div>
                </div>
                <div class="row mt">
                <div class="col-lg-6">
                    <p>1.000.000Đ / Lốp 1.500.00Đ</p>
                </div>
                <div class="col-lg-6 text-center">
                    <a href="#" class="btn btn-success">Chi tiết</a>
                </div>
                </div>
            </div>
            </div>
        </div>
        <div class="col-lg-3 mt-4">
            <div class="card">
            <div class="card-body">
                <h5 class="card-title">AS858</h5>
                <p class="card-text">LONGHAUL</p>
                <img class="card-img-top" src="{{ asset('client/assets/img/car1.png') }}" alt="Product 1">
                <div class="sub-desc row mt-3">
                <div class="col-lg-4">
                    <p><i class="fa-regular fa-gas-pump"></i> Xe tải</p>
                </div>
                <div class="col-lg-4">
                    <p><i class="fa-solid fa-user-group"></i> Trazano</p>
                </div>
                <div class="col-lg-4">
                    <p> Steer/Trailler</p>
                </div>
                </div>
                <div class="row mt">
                <div class="col-lg-6">
                    <p>1.000.000Đ / Lốp 1.500.00Đ</p>
                </div>
                <div class="col-lg-6 text-center">
                    <a href="#" class="btn btn-success">Chi tiết</a>
                </div>
                </div>
            </div>
            </div>
        </div> 
        <div class="col-lg-3 mt-4">
            <div class="card">
            <div class="card-body">
                <h5 class="card-title">AS858</h5>
                <p class="card-text">LONGHAUL</p>
                <img class="card-img-top" src="{{ asset('client/assets/img/car.png') }}" alt="Product 1">
                <div class="sub-desc row mt-3">
                <div class="col-lg-4">
                    <p><i class="fa-regular fa-gas-pump"></i> Xe tải</p>
                </div>
                <div class="col-lg-4">
                    <p><i class="fa-solid fa-user-group"></i> Trazano</p>
                </div>
                <div class="col-lg-4">
                    <p> Steer/Trailler</p>
                </div>
                </div>
                <div class="row mt">
                <div class="col-lg-6">
                    <p>1.000.000Đ / Lốp 1.500.00Đ</p>
                </div>
                <div class="col-lg-6 text-center">
                    <a href="#" class="btn btn-success">Chi tiết</a>
                </div>
                </div>
            </div>
            </div>
        </div> 
        <div class="col-lg-3 mt-4">
            <div class="card">
            <div class="card-body">
                <h5 class="card-title">AS858</h5>
                <p class="card-text">LONGHAUL</p>
                <img class="card-img-top" src="{{ asset('client/assets/img/car1.png') }}" alt="Product 1">
                <div class="sub-desc row mt-3">
                <div class="col-lg-4">
                    <p><i class="fa-regular fa-gas-pump"></i> Xe tải</p>
                </div>
                <div class="col-lg-4">
                    <p><i class="fa-solid fa-user-group"></i> Trazano</p>
                </div>
                <div class="col-lg-4">
                    <p> Steer/Trailler</p>
                </div>
                </div>
                <div class="row mt">
                <div class="col-lg-6">
                    <p>1.000.000Đ / Lốp 1.500.00Đ</p>
                </div>
                <div class="col-lg-6 text-center">
                    <a href="#" class="btn btn-success">Chi tiết</a>
                </div>
                </div>
            </div>
            </div>
        </div>
        <div class="col-lg-3 mt-4">
            <div class="card">
            <div class="card-body">
                <h5 class="card-title">AS858</h5>
                <p class="card-text">LONGHAUL</p>
                <img class="card-img-top" src="{{ asset('client/assets/img/car.png') }}" alt="Product 1">
                <div class="sub-desc row mt-3">
                <div class="col-lg-4">
                    <p><i class="fa-regular fa-gas-pump"></i> Xe tải</p>
                </div>
                <div class="col-lg-4">
                    <p><i class="fa-solid fa-user-group"></i> Trazano</p>
                </div>
                <div class="col-lg-4">
                    <p> Steer/Trailler</p>
                </div>
                </div>
                <div class="row mt">
                <div class="col-lg-6">
                    <p>1.000.000Đ / Lốp 1.500.00Đ</p>
                </div>
                <div class="col-lg-6 text-center">
                    <a href="#" class="btn btn-success">Chi tiết</a>
                </div>
                </div>
            </div>
            </div>
        </div>
        <div class="col-lg-3 mt-4">
            <div class="card">
            <div class="card-body">
                <h5 class="card-title">AS858</h5>
                <p class="card-text">LONGHAUL</p>
                <img class="card-img-top" src="{{ asset('client/assets/img/car1.png') }}" alt="Product 1">
                <div class="sub-desc row mt-3">
                <div class="col-lg-4">
                    <p><i class="fa-regular fa-gas-pump"></i> Xe tải</p>
                </div>
                <div class="col-lg-4">
                    <p><i class="fa-solid fa-user-group"></i> Trazano</p>
                </div>
                <div class="col-lg-4">
                    <p> Steer/Trailler</p>
                </div>
                </div>
                <div class="row mt">
                <div class="col-lg-6">
                    <p>1.000.000Đ / Lốp 1.500.00Đ</p>
                </div>
                <div class="col-lg-6 text-center">
                    <a href="#" class="btn btn-success">Chi tiết</a>
                </div>
                </div>
            </div>
            </div>
        </div> 
        <div class="col-lg-3 mt-4">
            <div class="card">
            <div class="card-body">
                <h5 class="card-title">AS858</h5>
                <p class="card-text">LONGHAUL</p>
                <img class="card-img-top" src="{{ asset('client/assets/img/car.png') }}" alt="Product 1">
                <div class="sub-desc row mt-3">
                <div class="col-lg-4">
                    <p><i class="fa-regular fa-gas-pump"></i> Xe tải</p>
                </div>
                <div class="col-lg-4">
                    <p><i class="fa-solid fa-user-group"></i> Trazano</p>
                </div>
                <div class="col-lg-4">
                    <p> Steer/Trailler</p>
                </div>
                </div>
                <div class="row mt">
                <div class="col-lg-6">
                    <p>1.000.000Đ / Lốp 1.500.00Đ</p>
                </div>
                <div class="col-lg-6 text-center">
                    <a href="#" class="btn btn-success">Chi tiết</a>
                </div>
                </div>
            </div>
            </div>
        </div> 
        <div class="col-lg-3 mt-4">
            <div class="card">
            <div class="card-body">
                <h5 class="card-title">AS858</h5>
                <p class="card-text">LONGHAUL</p>
                <img class="card-img-top" src="{{ asset('client/assets/img/car1.png') }}" alt="Product 1">
                <div class="sub-desc row mt-3">
                <div class="col-lg-4">
                    <p><i class="fa-regular fa-gas-pump"></i> Xe tải</p>
                </div>
                <div class="col-lg-4">
                    <p><i class="fa-solid fa-user-group"></i> Trazano</p>
                </div>
                <div class="col-lg-4">
                    <p> Steer/Trailler</p>
                </div>
                </div>
                <div class="row mt">
                <div class="col-lg-6">
                    <p>1.000.000Đ / Lốp 1.500.00Đ</p>
                </div>
                <div class="col-lg-6 text-center">
                    <a href="#" class="btn btn-success">Chi tiết</a>
                </div>
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>
</div>
@endsection