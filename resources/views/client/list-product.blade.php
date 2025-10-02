@extends ('client.layouts.master')
@section('title', 'Công ty Cổ phần Ngọc Quyết Thắng - Sản phẩm')
@section('content')

<!-- Hero Section -->
<section class="bg-white py-0">
    <div class="w-full">
        <img src="{{ asset('/upload/photo/san-pham-1727711865.jpg') }}" alt="Banner Sản phẩm" class="product-banner-image w-full" loading="lazy">
    </div>
</section>

<!-- Main Content -->
<section class="py-8 bg-gray-50 min-h-screen">
    <div class="container mx-auto px-4">
        <div class="row">
            <!-- Left Sidebar - Filters -->
            <div class="col-lg-3 col-md-4 mb-6">
                <div class="bg-white rounded-lg shadow-lg p-6 sticky-top" style="top: 120px; z-index: 10;">
                    <form method="POST" action="{{url('tim-lop-xe-filter')}}" enctype="multipart/form-data">
                        @csrf
                        @php
                            $tim_kiem = $contents->filter(function($item) {
                                return $item->key == 'tim_kiem';
                            })->first();
                        @endphp
                        
                        <h4 class="text-xl font-bold text-gray-800 mb-6 text-center border-b pb-3">
                            {{$tim_kiem->name_show()}}
                        </h4>
                        
                        <!-- Model Filter -->
                        <div class="mb-6">
                            @php
                                $tim_kiem_loai_xe = $contents->filter(function($item) {
                                    return $item->key == 'tim_kiem_loai_xe';
                                })->first();
                            @endphp
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                {{$tim_kiem_loai_xe->name_show()}}
                            </label>
                            <select class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all duration-200" name="model">
                                <option value="">Chọn loại xe</option>
                                @foreach($models as $model)
                                    <option value="{{$model->id}}" @if(isset($model_selected) && $model->id == $model_selected) selected @endif>
                                        {{$model->name}}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Brand Filter -->
                        <div class="mb-6">
                            @php
                                $tim_kiem_hang = $contents->filter(function($item) {
                                    return $item->key == 'tim_kiem_hang';
                                })->first();
                            @endphp
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                {{$tim_kiem_hang->name_show()}}
                            </label>
                            <select class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all duration-200" name="brand">
                                <option value="">Chọn thương hiệu</option>
                                @foreach($brands as $brand)
                                    <option value="{{$brand->id}}" @if(isset($brand_selected) && $brand->id == $brand_selected) selected @endif>
                                        {{$brand->name}}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Size Filter -->
                        <div class="mb-6">
                            @php
                                $tim_kiem_size = $contents->filter(function($item) {
                                    return $item->key == 'tim_kiem_size';
                                })->first();
                            @endphp
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                {{$tim_kiem_size->name_show()}}
                            </label>
                            <select class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all duration-200" name="size">
                                <option value="">Chọn kích thước</option>
                                @foreach($sizes as $size)
                                    <option value="{{$size->size}}" @if(isset($sizeselected) && $size->size == $sizeselected) selected @endif>
                                        {{$size->size}}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Search Button -->
                        <button type="submit" class="w-full bg-green-600 hover:bg-green-700 text-white font-semibold py-3 px-6 rounded-lg transition-all duration-200 transform hover:scale-105 shadow-lg">
                            <i class="fas fa-search mr-2"></i>{{$tim_kiem->name_show()}}
                        </button>
                    </form>
                </div>
            </div>

            <!-- Right Content - Product Grid -->
            <div class="col-lg-9 col-md-8">
                <!-- Results Header -->
                <div class="bg-white rounded-lg shadow-lg p-6 mb-6">
                    <div class="flex justify-between items-center">
                        <h2 class="text-2xl font-bold text-gray-800">
                            Kết quả tìm kiếm 
                            <span class="text-green-600">({{count($tyres)}} sản phẩm)</span>
                        </h2>
                        <div class="flex items-center space-x-4">
                            <span class="text-sm text-gray-600">Sắp xếp:</span>
                            <select class="px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500">
                                <option>Mới nhất</option>
                                <option>Giá thấp đến cao</option>
                                <option>Giá cao đến thấp</option>
                                <option>Tên A-Z</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Product Grid -->
                @if(count($tyres) > 0)
                    <div class="row">
                        @foreach ($tyres as $tyre)
                            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 mb-6">
                                <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                                    <!-- Product Image -->
                                    <div class="relative overflow-hidden">
                                        <a href="{{url('lop-xe-tai/'.$tyre->id)}}">
                                            @if($tyre->thumbnail_image)
                                                <img class="w-full h-48 object-cover hover:scale-105 transition-transform duration-300" 
                                                     src="{{asset($tyre->thumbnail_image)}}" 
                                                     alt="{{$tyre->name}}" 
                                                     loading="lazy">
                                            @elseif(isset($tyre->images[0]))
                                                <img class="w-full h-48 object-cover hover:scale-105 transition-transform duration-300" 
                                                     src="{{asset($tyre->images[0]->image)}}" 
                                                     alt="{{$tyre->name}}" 
                                                     loading="lazy">
                                            @else
                                                <img class="w-full h-48 object-cover bg-gray-200" 
                                                     src="{{asset('assets/images/noimage.png')}}" 
                                                     alt="No Image" 
                                                     loading="lazy">
                                            @endif
                                        </a>
                                        <!-- Status Badge -->
                                        <div class="absolute top-3 right-3">
                                            <span class="bg-green-500 text-white px-2 py-1 rounded-full text-xs font-semibold">
                                                Còn hàng
                                            </span>
                                        </div>
                                    </div>

                                    <!-- Product Info -->
                                    <div class="p-4">
                                        <h3 class="text-lg font-semibold text-gray-800 mb-2 line-clamp-2">
                                            {{$tyre->brand->name}} {{$tyre->name}}
                                        </h3>
                                        
                                        <div class="text-sm text-gray-600 mb-3">
                                            <div class="flex items-center mb-1">
                                                <i class="fas fa-car text-green-600 mr-2"></i>
                                                @if(isset($tyre->drive)){{$tyre->drive->name}}@endif
                                            </div>
                                            <div class="flex items-center mb-1">
                                                <i class="fas fa-cog text-green-600 mr-2"></i>
                                                {{$tyre->model->name}}
                                            </div>
                                            @if($tyre->structure)
                                                <div class="flex items-center">
                                                    <i class="fas fa-layer-group text-green-600 mr-2"></i>
                                                    {{$tyre->structure->name}}
                                                </div>
                                            @endif
                                        </div>

                                        <!-- Price -->
                                        <div class="flex justify-between items-center">
                                            <div class="text-lg font-bold text-green-600">
                                                @if($tyre->price == 0)
                                                    Liên hệ 0934541313
                                                @else
                                                    {{number_format($tyre->price, 0, '', ',')}}đ
                                                @endif
                                            </div>
                                            @if($tyre->price != 0)
                                                <span class="text-sm text-gray-500">/ Lốp</span>
                                            @endif
                                        </div>

                                        <!-- Action Button -->
                                        <div class="mt-4">
                                            <a href="{{url('lop-xe-tai/'.$tyre->id)}}" 
                                               class="w-full bg-green-600 hover:bg-green-700 text-white font-semibold py-2 px-4 rounded-lg transition-all duration-200 text-center block">
                                                <i class="fas fa-eye mr-2"></i>Xem chi tiết
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!-- Pagination (if needed) -->
                    @if(count($tyres) > 12)
                        <div class="mt-8 flex justify-center">
                            <nav class="flex items-center space-x-2">
                                <button class="px-3 py-2 bg-white border border-gray-300 rounded-lg hover:bg-gray-50">
                                    <i class="fas fa-chevron-left"></i>
                                </button>
                                <button class="px-3 py-2 bg-green-600 text-white rounded-lg">1</button>
                                <button class="px-3 py-2 bg-white border border-gray-300 rounded-lg hover:bg-gray-50">2</button>
                                <button class="px-3 py-2 bg-white border border-gray-300 rounded-lg hover:bg-gray-50">3</button>
                                <button class="px-3 py-2 bg-white border border-gray-300 rounded-lg hover:bg-gray-50">
                                    <i class="fas fa-chevron-right"></i>
                                </button>
                            </nav>
                        </div>
                    @endif
                @else
                    <!-- No Results -->
                    <div class="bg-white rounded-lg shadow-lg p-12 text-center">
                        <div class="text-gray-400 mb-4">
                            <i class="fas fa-search text-6xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-700 mb-2">Không tìm thấy sản phẩm</h3>
                        <p class="text-gray-500 mb-6">Hãy thử thay đổi bộ lọc hoặc từ khóa tìm kiếm</p>
                        <button onclick="window.location.reload()" class="bg-green-600 hover:bg-green-700 text-white font-semibold py-2 px-6 rounded-lg transition-all duration-200">
                            <i class="fas fa-refresh mr-2"></i>Làm mới
                        </button>
                    </div>
                @endif
            </div>
        </div>
    </div>
</section>

<style>
.line-clamp-2 {
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

.sticky-top {
    position: sticky;
    top: 120px;
    z-index: 10;
}

@media (max-width: 1024px) {
    .sticky-top {
        position: static;
        top: auto;
    }
}

/* Custom scrollbar for select */
select::-webkit-scrollbar {
    width: 8px;
}

select::-webkit-scrollbar-track {
    background: #f1f1f1;
    border-radius: 4px;
}

select::-webkit-scrollbar-thumb {
    background: #10b981;
    border-radius: 4px;
}

select::-webkit-scrollbar-thumb:hover {
    background: #059669;
}
</style>

@endsection

@section('script')
<script>
$(document).ready(function() {
    // Initialize select2 if available
    if (typeof $.fn.select2 !== 'undefined') {
        $("select").select2({
            theme: 'bootstrap-5',
            width: '100%'
        });
    }
    
    // Smooth scroll for anchor links
    $('a[href^="#"]').on('click', function(event) {
        var target = $(this.getAttribute('href'));
        if( target.length ) {
            event.preventDefault();
            $('html, body').stop().animate({
                scrollTop: target.offset().top - 100
            }, 1000);
        }
    });
});
</script>

<style>
/* Responsive Product Banner Styles */
.product-banner-image {
    height: 486px;
    object-fit: cover;
    object-position: center top;
    width: 100%;
    display: block;
}

/* Mobile devices (up to 768px) */
@media (max-width: 768px) {
    .product-banner-image {
        height: 300px;
        object-fit: cover;
        object-position: center top;
    }
}

/* Small mobile devices (up to 480px) */
@media (max-width: 480px) {
    .product-banner-image {
        height: 250px;
        object-fit: cover;
        object-position: center top;
    }
}

/* Large screens (1200px and up) */
@media (min-width: 1200px) {
    .product-banner-image {
        height: 600px;
        object-fit: cover;
        object-position: center top;
    }
}

/* Extra large screens (1400px and up) */
@media (min-width: 1400px) {
    .product-banner-image {
        height: 700px;
        object-fit: cover;
        object-position: center top;
    }
}

/* Ultra wide screens (1600px and up) */
@media (min-width: 1600px) {
    .product-banner-image {
        height: 800px;
        object-fit: cover;
        object-position: center top;
    }
}

/* Fallback for very small screens */
@media (max-width: 320px) {
    .product-banner-image {
        height: 200px;
        object-fit: cover;
        object-position: center top;
    }
}

/* Ensure banner doesn't break layout */
.product-banner-image {
    max-width: 100%;
    height: auto;
}
</style>
@endsection