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
            
              <div class="card booking-card v-2 mt-2 rounded-bottom">
      <div class="bg-image hover-overlay ripple ripple-surface ripple-surface-light bg-white" data-mdb-ripple-color="light">
        <img class="card-img-top"  src="{{asset($promotion->tyre->images[0]->image)}}" alt="{{$promotion->tyre->name}}" style="max-height:291px;">
        <a href="#!">
          <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
        </a>
      </div>
      <div class="card-body">
        <h4 class="card-title font-weight-bold m-0"><a>{{$promotion->tyre->brand->name}} {{$promotion->tyre->name}}</a></h4>

        <span class="card-text">@if(isset($promotion->tyre->drive)){{$promotion->tyre->drive->name}} @endif</span>
        <span class="card-text">{{$promotion->tyre->model->name}}</span>
        <span class="card-text">{{$promotion->tyre->brand->name}}</span>
        <span class="card-text">{{$promotion->tyre->tyre_structure}}</span>
        <!--<hr class="my-4">-->
        <p class="h5 font-weight-bold">{{number_format($promotion->promotion_price, 0, '', ',')}}đ <span style="text-decoration-line: line-through; color:red">{{number_format($promotion->tyre->price, 0, '', ',')}}đ</span> / Lốp</p>

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
                <h5 class="card-title">{{$new->brand->name}} {{$new->name}}</h5>
                <p class="card-text">@if(isset($tyre->drive)){{$new->drive->name}} @endif</p>
                <a href="{{url('lop-xe-tai/'.$new->id)}}">
                <img class="card-img-top"  style="max-height: 256px;" src="{{asset($new->images[0]->image)}}" alt="{{$new->name}}">
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
                <h5 class="card-title">{{$best->brand->name}} {{$best->name}}</h5>
                <p class="card-text">@if(isset($tyre->drive)){{$best->drive->name}} @endif</p>
                <a href="{{url('lop-xe-tai/'.$best->id)}}">
                  <img class="card-img-top" style="max-height: 256px;" src="{{asset($best->images[0]->image)}}" alt="{{$best->name}}">
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