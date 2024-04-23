@extends ('client.layouts.master')
@section('title', 'NQT - Trang chủ')
@section('content')
<div class="container">
    <!-- slider -->
    <div class="slider">
      @if(session()->get('language') == 'vi')
        <img src="{{ asset('assets/images/huong-dan-tim-kiem-AS668.png')}}" alt="">
      @else 
        <img src="{{ asset('assets/images/huong-dan-tim-kiem-AS668_en.png')}}" alt="">
      @endif
    </div>
    <!-- end slider -->
    @if(count($promotions) > 0)
    <div class="new-product">
        <h3 class="text-color" style="background: #35A25B; padding: 10px;color: #fff;">Chương trình khuyến mãi</h3>
        <div class="list-new-product row mt-4 mb-4">
          @foreach($promotions as $promotion)
            <div class="col-lg-3">
            
              <div class="card booking-card v-2 mt-2 rounded-bottom">
      <div class="bg-image hover-overlay ripple ripple-surface ripple-surface-light bg-white" data-mdb-ripple-color="light">
        <a href="{{url('lop-xe-tai/'.$promotion->tyre->id)}}">
        <img class="card-img-top"  src="{{asset($promotion->tyre->images[0]->image)}}" alt="{{$promotion->tyre->name}}" style="max-height:291px;">
        </a>
      </div>
      <div class="card-body" style="padding-bottom: 0">
        <h4 class="card-title m-0"><a>{{$promotion->tyre->brand->name}} {{$promotion->tyre->name}}</a></h4>

        <span class="card-text">@if(isset($promotion->tyre->drive)){{$promotion->tyre->drive->name}} @endif</span>
        <span class="card-text">{{$promotion->tyre->model->name}}</span>
        <span class="card-text">{{$promotion->tyre->brand->name}}</span>
        <span class="card-text">{{$promotion->tyre->structure->name ?? ''}}</span>
        <!--<hr class="my-4">-->
        <p style="float: right;">{{number_format($promotion->promotion_price, 0, '', ',')}}đ <span style="text-decoration-line: line-through; color:red">{{number_format($promotion->tyre->price, 0, '', ',')}}đ</span> / Lốp</p>

      </div>
    </div>
            </div>
          @endforeach
        </div>
    </div>
    @endif
    
    <!-- new product -->
    <div class="new-product">
        <h3 class="text-color" style="background: #35A25B; padding: 10px;color: #fff;">Sản phẩm mới</h3>
        <div class="list-new-product row mt-4">
          @foreach($new_products as $new)
            <div class="col-lg-3">
            <div class="card booking-card v-2 mt-2 rounded-bottom">
      <div class="bg-image hover-overlay ripple ripple-surface ripple-surface-light bg-white" data-mdb-ripple-color="light">
        <a href="{{url('lop-xe-tai/'.$new->id)}}">
        <img class="card-img-top"  src="{{asset($new->images[0]->image)}}" alt="{{$new->name}}" style="max-height:291px;">
        </a>
      </div>
      <div class="card-body">
        <h4 class="card-title m-0"><a>{{$new->brand->name}} {{$new->name}}</a></h4>

        <span class="card-text">@if(isset($new->drive)){{$new->drive->name}} @endif</span>
        <span class="card-text">{{$new->model->name}}</span>
        <span class="card-text">{{$new->brand->name}}</span>
        <span class="card-text">{{$new->structure->name ?? ''}}</span>
        <!--<hr class="my-4">-->
        <p style="float: right;">{{number_format($new->price, 0, '', ',')}}đ / Lốp</p>

      </div>
    </div>
            </div>
          @endforeach
        </div>
    </div>
    <!-- end new product -->

    <!-- product bestseller -->
    <div class="product-best-seller mt-4">
    <h3 class="text-color" style="background: #35A25B; padding: 10px;color: #fff;">Sản phẩm bán chạy</h3>
        <div class="list-new-product row">
        @foreach($best_products as $best)
        <div class="col-lg-3 mt-4">
            <div class="card booking-card v-2 mt-2 rounded-bottom">
      <div class="bg-image hover-overlay ripple ripple-surface ripple-surface-light bg-white" data-mdb-ripple-color="light">
        <a href="{{url('lop-xe-tai/'.$best->id)}}">
        <img class="card-img-top"  src="{{asset($best->images[0]->image)}}" alt="{{$best->name}}" style="max-height:291px;">
        </a>
      </div>
      <div class="card-body">
        <h4 class="card-title m-0"><a>{{$best->brand->name}} {{$best->name}}</a></h4>

        <span class="card-text">@if(isset($best->drive)){{$best->drive->name}} @endif</span>
        <span class="card-text">{{$best->model->name}}</span>
        <span class="card-text">{{$best->brand->name}}</span>
        <span class="card-text">{{$best->structure->name ?? ''}}</span>
        <!--<hr class="my-4">-->
        <p style="float: right;">{{number_format($best->price, 0, '', ',')}}đ / Lốp</p>

      </div>
    </div>
        </div>
        @endforeach
        </div>
    </div>
</div>
@endsection