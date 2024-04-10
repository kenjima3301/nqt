@extends ('client.layouts.master')
@section('title', 'NQT - Trang chủ')
@section('content')
<div class="container">
    <!-- slider -->
    <div class="slider">
        <img src="{{ asset('client/assets/img/slider.png')}}" alt="">
    </div>
    <!-- end slider -->
    @if(count($promotions) > 0)
    <div class="new-product">
        <h3 class="text-color" style="background: #f7931d; padding: 10px;color: #000;">Chương trình khuyến mãi</h3>
        <div class="list-new-product row mt-4 mb-4">
          @foreach($promotions as $promotion)
            <div class="col-lg-3">
            <div class="card">
                <div class="card-body">
                <h5 class="card-title">{{$promotion->tyre->name}}</h5>
                <p class="card-text">@if(isset($promotion->tyre->drive)){{$promotion->tyre->drive->name}} @endif</p>
                <a href="{{url('lop-xe-tai/'.$promotion->tyre->id)}}">
                <img class="card-img-top" style="@if(isset($promotion->tyre->backgroundimage)) background: url('{{asset($promotion->tyre->backgroundimage->image)}}'); background-size:100% 100%;@endif max-height: 256px;"  src="{{asset($promotion->tyre->images[0]->image)}}" alt="{{$promotion->tyre->name}}">
                </a>
                <div class="sub-desc row mt-3">
                    <div class="col-lg-4">
                    <p>{{$promotion->tyre->model->name}} </p>
                    </div>
                    <div class="col-lg-3">
                    <p>{{$promotion->tyre->brand->name}}</p>
                    </div>
                    <div class="col-lg-5">
                    <p> {{$promotion->tyre->tyre_structure}}</p>
                    </div>
                </div>
                <div class="row mt">
                    <div class="col-lg-12">
                      <p>{{number_format($promotion->promotion_price, 0, '', ',')}}đ <span style="text-decoration-line: line-through; color:red">{{number_format($promotion->tyre->price, 0, '', ',')}}đ</span> / Lốp</p>
                    </div>
<!--                    <div class="col-lg-6 text-center">
                    <a href="" class="btn btn-success">Chi tiết</a>
                    </div>-->
                </div>
                </div>
            </div>
            </div>
          @endforeach
        </div>
    </div>
    @endif
    
    <!-- new product -->
    <div class="new-product">
        <h3 class="text-color" style="background: #f7931d; padding: 10px;color: #000;">Sản phẩm mới</h3>
        <div class="list-new-product row mt-4">
          @foreach($new_products as $new)
            <div class="col-lg-3">
            <div class="card">
                <div class="card-body">
                <h5 class="card-title">{{$new->name}}</h5>
                <p class="card-text">@if(isset($tyre->drive)){{$new->drive->name}} @endif</p>
                <a href="{{url('lop-xe-tai/'.$new->id)}}">
                <img class="card-img-top"  style="@if(isset($new->backgroundimage)) background: url('{{asset($new->backgroundimage->image)}}'); background-size:100% 100%; @endif max-height: 256px;" src="{{asset($new->images[0]->image)}}" alt="{{$new->name}}">
                </a>
                <div class="sub-desc row mt-3">
                    <div class="col-lg-4">
                    <p>{{$new->model->name}} </p>
                    </div>
                    <div class="col-lg-3">
                    <p>{{$new->brand->name}}</p>
                    </div>
                    <div class="col-lg-5">
                    <p> {{$new->tyre_structure}}</p>
                    </div>
                </div>
                <div class="row mt">
                    <div class="col-lg-6">
                    <p>{{number_format($new->price, 0, '', ',')}}đ / Lốp</p>
                    </div>
<!--                    <div class="col-lg-6 text-center">
                    <a href="" class="btn btn-success">Chi tiết</a>
                    </div>-->
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
    <h3 class="text-color" style="background: #f7931d; padding: 10px;color: #000;">Sản phẩm bán chạy</h3>
        <div class="list-new-product row">
        @foreach($best_products as $best)
        <div class="col-lg-3 mt-4">
            <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{$best->name}}</h5>
                <p class="card-text">@if(isset($tyre->drive)){{$best->drive->name}} @endif</p>
                <a href="{{url('lop-xe-tai/'.$best->id)}}">
                  <img class="card-img-top" style="@if(isset($best->backgroundimage)) background: url('{{asset($best->backgroundimage->image)}}'); background-size:100% 100%; @endif max-height: 256px;" src="{{asset($best->images[0]->image)}}" alt="{{$best->name}}">
                </a>
                <div class="sub-desc row mt-3">
                    <div class="col-lg-4">
                    <p>{{$best->model->name}} </p>
                    </div>
                    <div class="col-lg-3">
                    <p>{{$best->brand->name}}</p>
                    </div>
                    <div class="col-lg-5">
                    <p> {{$best->tyre_structure}}</p>
                    </div>
                </div>
                <div class="row mt">
                <div class="col-lg-6">
                    <p>{{number_format($best->price, 0, '', ',')}}đ / Lốp</p>
                </div>
<!--                <div class="col-lg-6 text-center">
                    <a href="" class="btn btn-success">Chi tiết</a>
                </div>-->
                </div>
            </div>
            </div>
        </div>
        @endforeach
        </div>
    </div>
</div>
@endsection