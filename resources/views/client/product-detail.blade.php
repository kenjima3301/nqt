@extends ('client.layouts.master')
@section('title', 'NQT - Chi tiết sản phẩm')
@section('content')
<div class="container mt-4">
	<div class="row">
         <!-- Left Navbar -->
        <div class="col-lg-3 col-md-4 col-sm-12 bg-white">
            <h4 class="text-center mt-4">Tìm Lốp</h4>
            <ul class="list-group mt-3">
                <li class="parent list-group-item" data-toggle="collapse" data-target="#subitem1">Loại xe <i class="arrow float-right fa-light fa-caret-down"></i></li>
                <div id="subitem1" class="collapse">
                <div class="input-group mt-3 mb-3 ml-3">
                    <!-- <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
                    <button type="button" class="btn btn-outline-primary">search</button> -->
                </div>
                </div>
                <li class="parent list-group-item" data-toggle="collapse" data-target="#subitem2">Hãng lốp <i class="arrow float-right fa-light fa-caret-down"></i></li>
                <div id="subitem2" class="collapse">
                <ul class="list-group">
                    <li class="list-group-item">Sub-item 2-1</li>
                    <li class="list-group-item">Sub-item 2-2</li>
                    <li class="list-group-item">Sub-item 2-3</li>
                </ul>
                </div>
                <li class="parent list-group-item" data-toggle="collapse" data-target="#subitem3">Mã gai <i class="arrow float-right fa-light fa-caret-down"></i></li>
                <div id="subitem3" class="collapse">
                <ul class="list-group">
                    <li class="list-group-item">Sub-item 3-1</li>
                    <li class="list-group-item">Sub-item 3-2</li>
                    <li class="list-group-item">Sub-item 3-3</li>
                </ul>
                </div>
                <li class="parent list-group-item" data-toggle="collapse" data-target="#subitem4">Size <i class="arrow float-right fa-light fa-caret-down"></i></li>
                <div id="subitem4" class="collapse">
                <ul class="list-group">
                    <li class="list-group-item">Sub-item 4-1</li>
                    <li class="list-group-item">Sub-item 4-2</li>
                    <li class="list-group-item">Sub-item 4-3</li>
                </ul>
                </div>
            </ul>
        </div>

        <!-- Right Product Detail -->
        <div class="col-lg-9 col-md-8 col-sm-12">
            <div class="row mt-4">
                <div class="col-lg-6">
                    <!-- Main product image -->
                    <div class="row">
                        <img src="{{asset('client/assets/img/car.png') }}" width="400px" class="img-fluid mx-auto">
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-3">
                            <img src="{{asset('client/assets/img/car.png') }}" class="img-fluid">
                        </div>
                        <div class="col-md-3">
                            <img src="{{asset('client/assets/img/car.png') }}" class="img-fluid">
                        </div>
                        <div class="col-md-3">
                            <img src="{{asset('client/assets/img/car.png') }}" class="img-fluid">
                        </div>
                        <div class="col-md-3">
                            <img src="{{asset('client/assets/img/car.png') }}" class="img-fluid">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 bg-white">
                    <!-- Product name -->
                    <h3 class="card-title mt-3">AS858</h3>
                    <p class="card-text">LONGHAUL</p>
                    <!-- Product description -->
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed commodo ligula eu luctus rhoncus. Nam hendrerit libero a commodo commodo.</p>
                    <div class="row justify-content-center">
                        <div class="col-sm-4">
                            <img src="{{asset('client/assets/img/image-22.png') }}" class="img-fluid">
                        </div>
                        <div class="col-sm-4">
                            <img src="{{asset('client/assets/img/image-23.png') }}" class="img-fluid">
                        </div>
                        <div class="col-sm-4">
                            <img src="{{asset('client/assets/img/image-24.png') }}" class="img-fluid">
                        </div>
                    </div>
                    <div class="sub-desc row mt-3">
                        <div class="col-lg-4">
                            <p>Xe tải</p>
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
                            <p>1.000.000Đ / Lốp</p>
                            <p>1.500.000</p>
                        </div>
                        <div class="col-lg-6 text-center">
                            <a href="#" class="btn btn-success">Mua hàng</a>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="row mt-3 bg-white ml-2">
                
                    <h5 class="ml-3 mt-3">Các size mẫu AS668</h5>
                    <table class="table table-bordered table-responsive text-center mt-2">
                        <thead>
                            <tr>
                                <th rowspan="3"></th>
                                <th rowspan="3">Size</th>
                                <th rowspan="3">LR / PR</th>
                                <th rowspan="3">Service index</th>
                                <th rowspan="3">Tread Depth (mm)</th>
                                <th rowspan="3">Standard Rim</th>
                                <th rowspan="3">Overall Diameter (mm)</th>
                                <th rowspan="3">Section Width (mm)</th>
                                <th colspan="8">Max. Load Capacity at Cold Inflation Pressure</th>
                            </tr>
                            <tr>
                                <th colspan="4">Single</th>
                                <th colspan="4">Dual</th>
                            </tr>
                            <tr>
                                <th>(kg)</th>
                                <th>(lbs)</th>
                                <th>(kPa)</th>
                                <th>(psi)</th>
                                <th>(kg)</th>
                                <th>(lbs)</th>
                                <th>(kPa)</th>
                                <th>(psi)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><img src="{{asset('client/assets/img/china.jpg') }}" width="20px" alt=""></td>
                                <td>11.00R20</td>
                                <td>J/18</td>
                                <td>152/149K</td>
                                <td>16.0</td>
                                <td>8.0</td>
                                <td>1085</td>
                                <td>293</td>
                                <td>3550</td>
                                <td>7825</td>
                                <td>930</td>
                                <td>135</td>
                                <td>3250</td>
                                <td>7165</td>
                                <td>930</td>
                                <td>135</td>
                            </tr>

                            <tr>
                                <td></td>
                                <td>11.00R20</td>
                                <td>J/18</td>
                                <td>152/149K</td>
                                <td>16.0</td>
                                <td>8.0</td>
                                <td>1085</td>
                                <td>293</td>
                                <td>3550</td>
                                <td>7825</td>
                                <td>930</td>
                                <td>135</td>
                                <td>3250</td>
                                <td>7165</td>
                                <td>930</td>
                                <td>135</td>
                            </tr>

                            <tr>
                                <td></td>
                                <td>11.00R20</td>
                                <td>J/18</td>
                                <td>152/149K</td>
                                <td>16.0</td>
                                <td>8.0</td>
                                <td>1085</td>
                                <td>293</td>
                                <td>3550</td>
                                <td>7825</td>
                                <td>930</td>
                                <td>135</td>
                                <td>3250</td>
                                <td>7165</td>
                                <td>930</td>
                                <td>135</td>
                            </tr>

                            <tr>
                                <td></td>
                                <td>11.00R20</td>
                                <td>J/18</td>
                                <td>154/151M(156/153L)</td>
                                <td>16.0</td>
                                <td>8.0</td>
                                <td>1085</td>
                                <td>293</td>
                                <td>3550</td>
                                <td>7825</td>
                                <td>930</td>
                                <td>135</td>
                                <td>3250</td>
                                <td>7165</td>
                                <td>930</td>
                                <td>135</td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="col-lg-3">
                        <p><img src="{{asset('client/assets/img/china.jpg') }}" width="20px" alt=""> Made in China</p>
                    </div>
                    <div class="col-lg-3">
                        <p><img src="{{asset('client/assets/img/thailan.jpg') }}" width="20px" alt=""> Made in ThaiLand</p>
                    </div>
                
            </div>

            <h5 class="text-color mt-3 ml-2">Sản phẩm bán chạy</h5>

            <div class="row mt-3">
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">AS858</h5>
                            <p class="card-text">LONGHAUL</p>
                            <img class="card-img-top" src="{{asset('client/assets/img/car.png')}}" alt="Product 1">
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

                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">AS858</h5>
                            <p class="card-text">LONGHAUL</p>
                            <img class="card-img-top" src="{{asset('client/assets/img/car.png')}}" alt="Product 1">
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

                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">AS858</h5>
                            <p class="card-text">LONGHAUL</p>
                            <img class="card-img-top" src="{{asset('client/assets/img/car.png')}}" alt="Product 1">
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
</div>
@endsection