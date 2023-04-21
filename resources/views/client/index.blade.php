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
          @foreach($new_products as $new)
            <div class="col-lg-3">
            <div class="card">
                <div class="card-body">
                <h5 class="card-title">{{$new->name}}</h5>
                <p class="card-text">{{$new->drive->name}}</p>
                <img class="card-img-top" src="{{asset($new->images[0]->image)}}" alt="{{$new->name}}">
                <div class="sub-desc row mt-3">
                    <div class="col-lg-4">
                    <p>{{$new->model->name}} </p>
                    </div>
                    <div class="col-lg-4">
                    <p>{{$new->brand->name}}</p>
                    </div>
                    <div class="col-lg-4">
                    <p> {{$new->tyre_structure}}</p>
                    </div>
                </div>
                <div class="row mt">
                    <div class="col-lg-6">
                    <p>1.000.000Đ / Lốp <span class="discount">1.500.00Đ</span></p>
                    </div>
                    <div class="col-lg-6 text-center">
                    <a href="#" class="btn btn-success">Chi tiết</a>
                    </div>
                </div>
                </div>
            </div>
            </div>
          @endforeach
        </div>
    </div>
    <!-- end new product -->

    <!-- product bestseller -->
    <div class="product-best-seller mt-4">
    <h3 class="text-color">Sản phẩm bán chạy</h3>
        <div class="list-new-product row">
        @foreach($best_products as $best)
        <div class="col-lg-3 mt-4">
            <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{$best->name}}</h5>
                <p class="card-text">{{$best->drive->name}}</p>
                <img class="card-img-top" src="{{asset($best->images[0]->image)}}" alt="{{$best->name}}">
                <div class="sub-desc row mt-3">
                <div class="col-lg-4">
                    <p>Xe tải</p>
                </div>
                <div class="col-lg-4">
                    <p>Trazano</p>
                </div>
                <div class="col-lg-4">
                    <p> Steer/Trailler</p>
                </div>
                </div>
                <div class="row mt">
                <div class="col-lg-6">
                    <p>1.000.000Đ / Lốp <span class="discount">1.500.00Đ</span></p>
                </div>
                <div class="col-lg-6 text-center">
                    <a href="#" class="btn btn-success">Chi tiết</a>
                </div>
                </div>
            </div>
            </div>
        </div>
        @endforeach
        </div>
    </div>
</div>
@endsection