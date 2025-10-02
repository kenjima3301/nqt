@extends ('client.layouts.master')
@section('title', 'Công ty Cổ phần Ngọc Quyết Thắng | Nhà nhập khẩu các loại lốp xe uy tín và chất lượng')
@section('content')
{{-- <div class="container-fluid px-0">
    <!-- hero / slider -->
    <div class="w-100" style="background: linear-gradient(135deg, rgba(53,162,91,0.12) 0%, rgba(53,162,91,0.25) 100%);">
      <div class="container py-3 py-md-4">
        <div class="row align-items-center g-3">
          <div class="col-12 col-md-6 order-2 order-md-1">
            <h1 class="mb-2" style="color:#35A25B; font-weight:800; font-size: clamp(20px, 4vw, 36px);">Lốp xe chất lượng cho mọi hành trình</h1>
            <p class="mb-3" style="color:#2b2b2b; opacity:0.8; font-size: clamp(13px, 2vw, 16px);">Tìm kiếm nhanh theo mã gai, thương hiệu, kích cỡ. Giá tốt, cập nhật liên tục.</p>
            <div class="d-flex gap-2 flex-wrap">
              <a href="{{ route('list-product') }}" class="btn" style="background:#35A25B; color:#fff; font-weight:600;">Tìm lốp xe</a>
              <a href="{{ route('finddealer') }}" class="btn btn-light border" style="font-weight:600;">Tìm đại lý</a>
            </div>
          </div>
          <div class="col-12 col-md-6 order-1 order-md-2">
            @if(session()->get('language') == 'vi')
              <img src="{{ asset('assets/images/huong-dan-tim-kiem-AS668.png')}}" alt="Hướng dẫn tìm kiếm" class="img-fluid rounded-3 shadow-sm" loading="lazy">
            @else
              <img src="{{ asset('assets/images/huong-dan-tim-kiem-AS668_en.png')}}" alt="Quick search guide" class="img-fluid rounded-3 shadow-sm" loading="lazy">
            @endif
          </div>
        </div>
      </div>
    </div>
    <!-- end hero -->
    @if(count($promotions) > 0)
    <div class="new-product container py-4">
      @php
          $truong_trinh_khuyen_mai = $sectioncontents->filter(function($item) {
                                  return $item->key == 'truong_trinh_khuyen_mai';
                              })->first();
          @endphp
        <div class="d-flex align-items-center justify-content-between mb-3">
          <h3 class="text-color m-0" style="color:#2b2b2b; font-weight:700;">{{$truong_trinh_khuyen_mai->name_show()}}</h3>
          <span class="badge" style="background:#35A25B; color:#fff;">Hot deals</span>
        </div>
        <div class="list-new-product row row-cols-2 row-cols-md-4 row-cols-lg-6 g-3 mt-2 mb-3">
          @foreach($promotions as $promotion)
            <div class="col">

              <div class="card h-100 border-0 shadow-sm rounded-3 overflow-hidden">
                <a href="{{url('lop-xe-tai/'.$promotion->tyre->id)}}" class="bg-white d-block">
                  <img class="card-img-top" id="lop-image"
                       src="{{ $promotion->tyre->thumbnail_image ? asset($promotion->tyre->thumbnail_image) : (isset($promotion->tyre->images[0]) ? asset($promotion->tyre->images[0]->image) : asset('assets/images/placeholder-tyre.png')) }}"
                       alt="{{ $promotion->tyre->brand->name }} {{ $promotion->tyre->name }}"
                       title="{{ $promotion->tyre->brand->name }} {{ $promotion->tyre->name }}"
                       style="aspect-ratio: 1 / 1; object-fit: cover;" loading="lazy">
                </a>
                <div class="card-body p-2" id="info_content">
                  <h4 class="card-title m-0" id="ten-lop" style="color:#2b2b2b; font-size:13px; font-weight:700; line-height:1.3">{{$promotion->tyre->brand->name}} {{$promotion->tyre->name}}</h4>
                  <div class="d-flex justify-content-between align-items-center mt-1">
                    <span class="card-text" id='sub_info' style="font-size: 11px; color:#666;">
                      @if(isset($promotion->tyre->drive)){{$promotion->tyre->drive->name}} @endif
                      {{$promotion->tyre->model->name}} {{$promotion->tyre->structure->name ?? ''}}
                    </span>
                  </div>
                  <div class="d-flex justify-content-end gap-1 mt-2" style="font-size:12px;">
                    @if($promotion->promotion_price == 0)
                      <span style="color:#35A25B; font-weight:700;">Liên hệ 0934541313</span>
                    @else
                      <span style="color:#35A25B; font-weight:700;">{{number_format($promotion->promotion_price, 0, '', ',')}}đ</span>
                      @if($promotion->tyre->price != 0)
                        <span style="text-decoration-line: line-through; color:#ae2b2b">{{number_format($promotion->tyre->price, 0, '', ',')}}đ</span>
                      @endif
                      <span>/ Lốp</span>
                    @endif
                  </div>
                </div>
              </div>
            </div>
          @endforeach
        </div>
    </div>
    @endif

    <!-- new product -->
    <div class="new-product container py-4">
      @php
          $san_pham_moi = $sectioncontents->filter(function($item) {
                                  return $item->key == 'san_pham_moi';
                              })->first();
          @endphp
        <div class="d-flex align-items-center justify-content-between mb-3">
          <h3 class="text-color m-0" style="color:#2b2b2b; font-weight:700;">{{$san_pham_moi->name_show()}}</h3>
          <a href="{{ route('list-product') }}" class="btn btn-sm" style="background:#35A25B; color:#fff;">Xem tất cả</a>
        </div>
        <div class="list-new-product row row-cols-2 row-cols-md-4 row-cols-lg-6 g-3 mt-2">
          @foreach($new_products as $new)
            <div class="col">
              <div class="card h-100 border-0 shadow-sm rounded-3 overflow-hidden">
                <a href="{{url('lop-xe-tai/'.$new->id)}}" class="bg-white d-block">
                  <img class="card-img-top" id="lop-image"
                       src="{{ $new->thumbnail_image ? asset($new->thumbnail_image) : (isset($new->images[0]) ? asset($new->images[0]->image) : asset('assets/images/placeholder-tyre.png')) }}"
                       alt="{{ $new->brand->name }} {{ $new->name }}"
                       title="{{ $new->brand->name }} {{ $new->name }}"
                       style="aspect-ratio: 1 / 1; object-fit: cover;" loading="lazy">
                </a>
                <div class="card-body p-2" id="info_content">
                  <h4 class="card-title m-0" id="ten-lop" style="color:#2b2b2b; font-size:13px; font-weight:700; line-height:1.3">{{$new->brand->name}} {{$new->name}}</h4>
                  <span class="card-text" id='sub_info' style="font-size: 11px; color:#666; display:block; margin-top:2px;">@if(isset($new->drive)){{$new->drive->name}} @endif {{$new->model->name}} {{$new->structure->name ?? ''}}</span>
                  <div class="d-flex justify-content-end mt-2" style="font-size:12px; color:#2b2b2b;">
                    @if($new->price == 0)
                      Liên hệ 0934541313
                    @else
                      {{number_format($new->price, 0, '', ',')}}đ / Lốp
                    @endif
                  </div>
                </div>
              </div>
            </div>
          @endforeach
        </div>
    </div>
    <!-- end new product -->

    <!-- product bestseller -->
    <div class="product-best-seller container py-4">
       @php
          $san_pham_ban_chay = $sectioncontents->filter(function($item) {
                                  return $item->key == 'san_pham_ban_chay';
                              })->first();
          @endphp
    <div class="d-flex align-items-center justify-content-between mb-3">
      <h3 class="text-color m-0" style="color:#2b2b2b; font-weight:700;">{{$san_pham_ban_chay->name_show()}}</h3>
    </div>
        <div class="list-new-product row row-cols-2 row-cols-md-4 row-cols-lg-6 g-3">
        @foreach($best_products as $best)
        <div class="col">
          <div class="card h-100 border-0 shadow-sm rounded-3 overflow-hidden">
            <a href="{{url('lop-xe-tai/'.$best->id)}}" class="bg-white d-block">
              <img class="card-img-top" id="lop-image"
                   src="{{ isset($best->images[0]) ? asset($best->images[0]->image) : asset('assets/images/placeholder-tyre.png') }}"
                   alt="{{ $best->brand->name }} {{ $best->name }}"
                   title="{{ $best->brand->name }} {{ $best->name }}"
                   style="aspect-ratio: 1 / 1; object-fit: cover;" loading="lazy">
            </a>
            <div class="card-body p-2" id="info_content">
              <h4 class="card-title m-0" id="ten-lop" style="color:#2b2b2b; font-size:13px; font-weight:700; line-height:1.3">{{$best->brand->name}} {{$best->name}}</h4>
              <span class="card-text" id='sub_info' style="font-size: 11px; color:#666; display:block; margin-top:2px;">
                @if(isset($best->drive)){{$best->drive->name}} @endif {{$best->model->name}} {{$best->structure->name ?? ''}}
              </span>
              <div class="d-flex justify-content-end mt-2" style="font-size:12px; color:#2b2b2b;">
                @if($best->price == 0)
                  Liên hệ 0934541313
                @else
                  {{number_format($best->price, 0, '', ',')}}đ / Lốp
                @endif
              </div>
            </div>
          </div>
        </div>
        @endforeach
        </div>
    </div>
</div>
<style>
  /* subtle hover */
  .card:hover { transform: translateY(-2px); transition: transform .2s ease; }
</style> --}}

    <!-- Advanced Search -->
<section class="bg-green-50 py-6">
        <div class="container mx-auto px-4">
            <div class="bg-white rounded-lg shadow-md p-6">
                <h3 class="text-lg font-semibold mb-4 text-gray-800">Tìm kiếm lốp xe nâng cao</h3>
                <form method="POST" action="{{url('tim-lop-xe-filter')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-4 gap-4 items-end">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Kích thước</label>
                            <select name="size" class="w-full border border-gray-300 rounded-md px-3 py-2 focus:ring-2 focus:ring-green-500 focus:border-transparent">
                                <option value="">Chọn kích thước</option>
                                @if(isset($sizes))
                                    @foreach($sizes as $size)
                                        <option value="{{$size->size}}">{{$size->size}}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Loại xe</label>
                            <select name="model" class="w-full border border-gray-300 rounded-md px-3 py-2 focus:ring-2 focus:ring-green-500 focus:border-transparent">
                                <option value="">Chọn loại xe</option>
                                @if(isset($models))
                                    @foreach($models as $model)
                                        <option value="{{$model->id}}">{{$model->name}}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Thương hiệu</label>
                            <select name="brand" class="w-full border border-gray-300 rounded-md px-3 py-2 focus:ring-2 focus:ring-green-500 focus:border-transparent">
                                <option value="">Chọn thương hiệu</option>
                                @if(isset($brands))
                                    @foreach($brands as $brand)
                                        <option value="{{$brand->id}}">{{$brand->name}}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                        <div>
                            <button type="submit" class="w-full bg-green-600 text-white px-6 py-2 rounded-md hover:bg-green-700 font-medium transition-colors duration-200">
                                <i class="fas fa-search mr-2"></i>Tìm lốp xe
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <!-- Banner Slider -->
    <section class="py-0">
        <div id="homepageCarousel" class="carousel slide" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#homepageCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#homepageCarousel" data-slide-to="1"></li>
            <li data-target="#homepageCarousel" data-slide-to="2"></li>
            <!--  -->
          </ol>
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img class="d-block w-100 slide-image" src="{{ asset('/upload/photo/slide_01.jpg') }}" alt="Slide 1" loading="lazy">  
            </div>
            <div class="carousel-item">
              <img class="d-block w-100 slide-image" src="{{ asset('/upload/photo/slide_02.jpg') }}" alt="Slide 2" loading="lazy">
            </div>
            <div class="carousel-item">
              <img class="d-block w-100 slide-image" src="{{ asset('/upload/photo/slide_03.jpg') }}" alt="Slide 3" loading="lazy">
            </div>
          </div>
          <a class="carousel-control-prev" href="#homepageCarousel" role="button" data-slide="prev" style="background: rgba(0,0,0,0.4); backdrop-filter: blur(5px); border-radius: 0 15px 15px 0; width: 60px; height: 80px; top: 50%; transform: translateY(-50%); left: 0; display: flex; align-items: center; justify-content: center;">
            <span style="color: white; font-size: 48px; font-weight: bold;">‹</span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#homepageCarousel" role="button" data-slide="next" style="background: rgba(0,0,0,0.4); backdrop-filter: blur(5px); border-radius: 15px 0 0 15px; width: 60px; height: 80px; top: 50%; transform: translateY(-50%); right: 0; display: flex; align-items: center; justify-content: center;">
            <span style="color: white; font-size: 48px; font-weight: bold;">›</span>
            <span class="sr-only">Next</span>
          </a>
        </div>
    </section>

    <!-- New Products -->
    <section class="py-16">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-12 text-gray-800">Sản phẩm mới</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                @forelse($new_products as $new)
                <div class="product-card bg-white rounded-lg shadow-md overflow-hidden">
                    <a href="{{ url('lop-xe-tai/'.$new->id) }}" class="block">
                        <div class="h-48 bg-gray-200 flex items-center justify-center overflow-hidden">
                            <img src="{{ $new->thumbnail_image ? asset($new->thumbnail_image) : (isset($new->images[0]) ? asset($new->images[0]->image) : asset('assets/images/placeholder-tyre.png')) }}" alt="{{ $new->brand->name }} {{ $new->name }}" class="w-full h-full object-cover" loading="lazy">
                        </div>
                    </a>
                    <div class="p-4">
                        <h3 class="font-semibold text-lg mb-1 text-gray-800">{{ $new->brand->name }} {{ $new->name }}</h3>
                        <p class="text-gray-600 text-sm mb-2">@if(isset($new->drive)){{ $new->drive->name }} @endif {{ $new->model->name }} {{ $new->structure->name ?? '' }}</p>
                        <p class="text-green-600 font-semibold mb-3">
                            @if($new->price == 0)
                                Liên hệ 0934541313
                            @else
                                {{ number_format($new->price, 0, '', ',') }}đ / Lốp
                            @endif
                        </p>
                        <a href="{{ url('lop-xe-tai/'.$new->id) }}" class="w-full inline-block text-center bg-green-600 text-white py-2 rounded hover:bg-green-700">Xem chi tiết</a>
                    </div>
                </div>
                @empty
                <div class="text-center text-gray-500 col-span-4">Chưa có sản phẩm mới.</div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- Best Sellers -->
    <section class="py-16 bg-gray-100">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-12 text-gray-800">Sản phẩm bán chạy</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                @forelse($best_products as $best)
                <div class="product-card bg-white rounded-lg shadow-md overflow-hidden relative">
                    <div class="absolute top-2 right-2 bg-red-500 text-white px-2 py-1 rounded text-xs font-semibold">Best Seller</div>
                    <a href="{{ url('lop-xe-tai/'.$best->id) }}" class="block">
                        <div class="h-48 bg-gray-200 flex items-center justify-center overflow-hidden">
                            <img src="{{ $best->thumbnail_image ? asset($best->thumbnail_image) : (isset($best->images[0]) ? asset($best->images[0]->image) : asset('assets/images/placeholder-tyre.png')) }}" alt="{{ $best->brand->name }} {{ $best->name }}" class="w-full h-full object-cover" loading="lazy">
                        </div>
                    </a>
                    <div class="p-4">
                        <h3 class="font-semibold text-lg mb-1 text-gray-800">{{ $best->brand->name }} {{ $best->name }}</h3>
                        <p class="text-gray-600 text-sm mb-2">@if(isset($best->drive)){{ $best->drive->name }} @endif {{ $best->model->name }} {{ $best->structure->name ?? '' }}</p>
                        <p class="text-green-600 font-semibold mb-3">
                            @if($best->price == 0)
                                Liên hệ 0934541313
                            @else
                                {{ number_format($best->price, 0, '', ',') }}đ / Lốp
                            @endif
                        </p>
                        <a href="{{ url('lop-xe-tai/'.$best->id) }}" class="w-full inline-block text-center bg-green-600 text-white py-2 rounded hover:bg-green-700">Xem chi tiết</a>
                    </div>
                </div>
                @empty
                <div class="text-center text-gray-500 col-span-4">Chưa có sản phẩm bán chạy.</div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- News Section -->
    <section class="py-16">
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-center mb-12">
                <h2 class="text-3xl font-bold text-gray-800">Tin tức mới nhất</h2>
                <a href="{{ route('news-list') }}" class="text-green-600 hover:text-green-700 font-medium">
                    Xem tất cả <i class="fas fa-arrow-right ml-1"></i>
                </a>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- News Item 1 -->
                <article class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow">
                    <div class="h-48 bg-gradient-to-br from-green-400 to-green-600 flex items-center justify-center">
                        <i class="fas fa-newspaper text-4xl text-white"></i>
                    </div>
                    <div class="p-6">
                        <div class="flex items-center text-sm text-gray-500 mb-2">
                            <i class="fas fa-calendar mr-2"></i>
                            <span>15/12/2024</span>
                        </div>
                        <h3 class="text-xl font-semibold mb-3 text-gray-800 hover:text-green-600">
                            <a href="#">Cách chọn lốp xe phù hợp cho mùa mưa</a>
                        </h3>
                        <p class="text-gray-600 mb-4 line-clamp-3">
                            Mùa mưa đang đến gần, việc lựa chọn lốp xe phù hợp là vô cùng quan trọng để đảm bảo an toàn khi lái xe. Hãy cùng tìm hiểu những tiêu chí quan trọng...
                        </p>
                        <a href="#" class="text-green-600 hover:text-green-700 font-medium">
                            Đọc thêm <i class="fas fa-arrow-right ml-1"></i>
                        </a>
                    </div>
                </article>

                <!-- News Item 2 -->
                <article class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow">
                    <div class="h-48 bg-gradient-to-br from-blue-400 to-blue-600 flex items-center justify-center">
                        <i class="fas fa-tools text-4xl text-white"></i>
                    </div>
                    <div class="p-6">
                        <div class="flex items-center text-sm text-gray-500 mb-2">
                            <i class="fas fa-calendar mr-2"></i>
                            <span>12/12/2024</span>
                        </div>
                        <h3 class="text-xl font-semibold mb-3 text-gray-800 hover:text-green-600">
                            <a href="#">Bảo dưỡng lốp xe đúng cách để tăng tuổi thọ</a>
                        </h3>
                        <p class="text-gray-600 mb-4 line-clamp-3">
                            Việc bảo dưỡng lốp xe định kỳ không chỉ giúp tiết kiệm chi phí mà còn đảm bảo an toàn cho người sử dụng. Dưới đây là những mẹo hữu ích...
                        </p>
                        <a href="#" class="text-green-600 hover:text-green-700 font-medium">
                            Đọc thêm <i class="fas fa-arrow-right ml-1"></i>
                        </a>
                    </div>
                </article>

                <!-- News Item 3 -->
                <article class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow">
                    <div class="h-48 bg-gradient-to-br from-orange-400 to-orange-600 flex items-center justify-center">
                        <i class="fas fa-award text-4xl text-white"></i>
                    </div>
                    <div class="p-6">
                        <div class="flex items-center text-sm text-gray-500 mb-2">
                            <i class="fas fa-calendar mr-2"></i>
                            <span>10/12/2024</span>
                        </div>
                        <h3 class="text-xl font-semibold mb-3 text-gray-800 hover:text-green-600">
                            <a href="#">Top 5 thương hiệu lốp xe được ưa chuộng nhất 2024</a>
                        </h3>
                        <p class="text-gray-600 mb-4 line-clamp-3">
                            Năm 2024, thị trường lốp xe có nhiều thay đổi với sự xuất hiện của các công nghệ mới. Cùng điểm qua top 5 thương hiệu được người tiêu dùng tin tưởng...
                        </p>
                        <a href="#" class="text-green-600 hover:text-green-700 font-medium">
                            Đọc thêm <i class="fas fa-arrow-right ml-1"></i>
                        </a>
                    </div>
                </article>
            </div>
        </div>
    </section>

@endsection

<style>
/* Responsive Slide Styles */
.slide-image {
    height: 486px;
    object-fit: cover;
    object-position: center;
    width: 100%;
}

/* Mobile devices (up to 768px) */
@media (max-width: 768px) {
    .slide-image {
        height: 300px;
        object-fit: cover;
        object-position: center;
    }
    
    /* Adjust carousel controls for mobile */
    .carousel-control-prev,
    .carousel-control-next {
        width: 40px !important;
        height: 60px !important;
    }
    
    .carousel-control-prev span,
    .carousel-control-next span {
        font-size: 32px !important;
    }
}

/* Small mobile devices (up to 480px) */
@media (max-width: 480px) {
    .slide-image {
        height: 250px;
        object-fit: cover;
        object-position: center;
    }
    
    .carousel-control-prev,
    .carousel-control-next {
        width: 35px !important;
        height: 50px !important;
    }
    
    .carousel-control-prev span,
    .carousel-control-next span {
        font-size: 28px !important;
    }
}

/* Large screens (1200px and up) */
@media (min-width: 1200px) {
    .slide-image {
        height: 600px;
        object-fit: cover;
        object-position: center;
    }
}

/* Extra large screens (1400px and up) */
@media (min-width: 1400px) {
    .slide-image {
        height: 700px;
        object-fit: cover;
        object-position: center;
    }
}

/* Ultra wide screens (1600px and up) */
@media (min-width: 1600px) {
    .slide-image {
        height: 800px;
        object-fit: cover;
        object-position: center;
    }
}

/* Ensure carousel container maintains aspect ratio */
#homepageCarousel {
    overflow: hidden;
}

.carousel-inner {
    position: relative;
    width: 100%;
    overflow: hidden;
}

/* Smooth transitions */
.carousel-item {
    transition: transform 0.6s ease-in-out;
}

/* Ensure images don't break layout */
.slide-image {
    display: block;
    max-width: 100%;
    height: auto;
}

/* Fallback for very small screens */
@media (max-width: 320px) {
    .slide-image {
        height: 200px;
        object-fit: cover;
        object-position: center;
    }
}
</style>