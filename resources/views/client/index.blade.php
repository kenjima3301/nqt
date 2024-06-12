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
      @php
          $truong_trinh_khuyen_mai = $sectioncontents->filter(function($item) {
                                  return $item->key == 'truong_trinh_khuyen_mai';
                              })->first();
          @endphp
        <h3 class="text-color" style="background: #35A25B; padding: 10px;color: #fff;">{{$truong_trinh_khuyen_mai->name_show()}}</h3>
        <div class="list-new-product row mt-4 mb-4">
          @foreach($promotions as $promotion)
            <div class="col-md-2 col-6">

              <div class="card booking-card v-2 mt-2 rounded-bottom">
      <div class="bg-image hover-overlay ripple ripple-surface ripple-surface-light bg-white" data-mdb-ripple-color="light">
        <a href="{{url('lop-xe-tai/'.$promotion->tyre->id)}}">
        <img class="card-img-top" id="lop-image" src="{{asset($promotion->tyre->images[0]->image)}}" alt="{{$promotion->tyre->name}}" style="max-height:291px;">
        </a>
      </div>
      <div class="card-body" id="info_content" style="padding: 0.25rem; min-height: 75px;">
        <h4 class="card-title m-0" id="ten-lop" style="color: #fff; font-size: 14px; font-weight: 600" >{{$promotion->tyre->brand->name}} {{$promotion->tyre->name}}</h4>

        <span class="card-text" id='sub_info' style="font-size: 10px;">@if(isset($promotion->tyre->drive)){{$promotion->tyre->drive->name}} @endif
        {{$promotion->tyre->model->name}} {{$promotion->tyre->structure->name ?? ''}}</span>
        <!--<hr class="my-4">-->
        <p style="float: right; margin: 0;">{{number_format($promotion->promotion_price, 0, '', ',')}}đ <span style="text-decoration-line: line-through; color:red">{{number_format($promotion->tyre->price, 0, '', ',')}}đ</span> / Lốp</p>

      </div>
    </div>
            </div>
          @endforeach
        </div>
    </div>
    @endif

    <!-- new product -->
    <div class="new-product">
      @php
          $san_pham_moi = $sectioncontents->filter(function($item) {
                                  return $item->key == 'san_pham_moi';
                              })->first();
          @endphp
        <h3 class="text-color" style="background: #35A25B; padding: 10px;color: #fff;">{{$san_pham_moi->name_show()}}</h3>
        <div class="list-new-product row mt-4">
          @foreach($new_products as $new)
            <div class="col-md-2 col-6">
            <div class="card booking-card v-2 mt-2 rounded-bottom">
      <div class="bg-image hover-overlay ripple ripple-surface ripple-surface-light bg-white" data-mdb-ripple-color="light">
        <a href="{{url('lop-xe-tai/'.$new->id)}}">
        <img class="card-img-top" id="lop-image" src="{{asset($new->images[0]->image)}}" alt="{{$new->name}}" style="max-height:291px;">
        </a>
      </div>
      <div class="card-body" id="info_content" style="padding: 0.25rem; min-height: 75px;">
        <h4 class="card-title m-0" id="ten-lop"  style="color: #fff; font-size: 14px; font-weight: 600" >{{$new->brand->name}} {{$new->name}}</h4>

        <span class="card-text" id='sub_info' style="font-size: 10px;">@if(isset($new->drive)){{$new->drive->name}} @endif
        {{$new->model->name}} {{$new->structure->name ?? ''}}</span>
        <!--<hr class="my-4">-->
        <p style="float: right; margin: 0;">{{number_format($new->price, 0, '', ',')}}đ / Lốp</p>

      </div>
    </div>
            </div>
          @endforeach
        </div>
    </div>
    <!-- end new product -->

    <!-- product bestseller -->
    <div class="product-best-seller mt-4">
       @php
          $san_pham_ban_chay = $sectioncontents->filter(function($item) {
                                  return $item->key == 'san_pham_ban_chay';
                              })->first();
          @endphp
    <h3 class="text-color" style="background: #35A25B; padding: 10px;color: #fff;">{{$san_pham_ban_chay->name_show()}}</h3>
        <div class="list-new-product row">
        @foreach($best_products as $best)
        <div class="col-md-2 col-6">
            <div class="card booking-card v-2 mt-2 rounded-bottom">
      <div class="bg-image hover-overlay ripple ripple-surface ripple-surface-light bg-white" data-mdb-ripple-color="light">
        <a href="{{url('lop-xe-tai/'.$best->id)}}">
        <img class="card-img-top" id="lop-image" src="{{asset($best->images[0]->image)}}" alt="{{$best->name}}" style="max-height:291px;">
        </a>
      </div>
      <div class="card-body" id="info_content"  style="padding: 0.25rem; min-height: 75px;">
        <h4 class="card-title m-0" id="ten-lop" style="color: #fff; font-size: 14px; font-weight: 600" >{{$best->brand->name}} {{$best->name}}</h4>

        <span class="card-text" id='sub_info' style="font-size: 10px;">@if(isset($best->drive)){{$best->drive->name}} @endif {{$best->model->name}}
                      {{$best->structure->name ?? ''}}
        </span>
        <!--<hr class="my-4">-->
        <p style="float: right; margin: 0;">{{number_format($best->price, 0, '', ',')}}đ / Lốp</p>

      </div>
    </div>
        </div>
        @endforeach
        </div>
    </div>
</div>
@endsection
