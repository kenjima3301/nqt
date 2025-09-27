@extends ('client.layouts.master')
@section('title', 'NQT - Chi tiết sản phẩm')
@section('content')
<link rel="stylesheet" href="{{asset('client/assets/css/lightslider.min.css')}}">
<style>
    .breadcrumb {
        background: transparent;
        padding: 0;
        margin-bottom: 20px;
    }
    .breadcrumb-item a {
        color: #35A25B;
        text-decoration: none;
    }
    .breadcrumb-item.active {
        color: #6c757d;
    }
    .product-detail-card {
        border: none;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        border-radius: 15px;
        overflow: hidden;
    }
    .search-sidebar {
        background: #fff;
        border-radius: 15px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        padding: 20px;
        margin-bottom: 20px;
    }
    .product-image-container {
        position: relative;
        overflow: hidden;
        border-radius: 15px;
    }
    .product-image-container img {
        transition: transform 0.3s ease;
    }
    .product-image-container:hover img {
        transform: scale(1.05);
    }
    .size-badge {
        display: inline-block;
        padding: 8px 16px;
        margin: 4px;
        background: #f8f9fa;
        border: 2px solid #e9ecef;
        border-radius: 25px;
        text-decoration: none;
        color: #495057;
        transition: all 0.3s ease;
    }
    .size-badge:hover, .size-badge.active {
        background: #35A25B;
        color: white;
        border-color: #35A25B;
        text-decoration: none;
    }
    .product-info-card {
        background: #fff;
        border-radius: 15px;
        padding: 25px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }
    .feature-list {
        list-style: none;
        padding: 0;
    }
    .feature-list li {
        padding: 8px 0;
        border-bottom: 1px solid #f8f9fa;
    }
    .feature-list li:last-child {
        border-bottom: none;
    }
    .spec-table {
        background: #fff;
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }
    .spec-table th {
        background: #35A25B;
        color: white;
        border: none;
        padding: 15px;
        font-weight: 600;
    }
    .spec-table td {
        padding: 12px 15px;
        border-bottom: 1px solid #f8f9fa;
        vertical-align: middle;
    }
    .spec-table tr:hover {
        background: #f8f9fa;
    }
    .price-highlight {
        font-size: 1.2em;
        font-weight: bold;
        color: #35A25B;
    }
    .price-old {
        text-decoration: line-through;
        color: #dc3545;
        margin-left: 10px;
    }
    .btn-add-cart {
        background: linear-gradient(45deg, #35A25B, #28a745);
        border: none;
        border-radius: 25px;
        padding: 10px 25px;
        color: white;
        font-weight: 600;
        transition: all 0.3s ease;
    }
    .btn-add-cart:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(53, 162, 91, 0.3);
        color: white;
    }
    .related-products {
        background: #fff;
        border-radius: 15px;
        padding: 25px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        margin-top: 30px;
    }
    .related-product-card {
        border: none;
        border-radius: 15px;
        overflow: hidden;
        transition: all 0.3s ease;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }
    .related-product-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.15);
    }
    .rating-stars {
        color: #ffc107;
        font-size: 1.2em;
    }
    .review-section {
        background: #fff;
        border-radius: 15px;
        padding: 25px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        margin-top: 30px;
    }
    @media (max-width: 768px) {
        .search-sidebar {
            margin-bottom: 20px;
        }
        .product-info-card {
            margin-top: 20px;
        }
    }
</style>

<div class="container mt-4">
    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{url('/')}}">Trang chủ</a></li>
            <li class="breadcrumb-item"><a href="{{url('tim-lop-xe')}}">Tìm lốp xe</a></li>
            <li class="breadcrumb-item active">{{$tyre->brand->name}} {{$tyre->name}}</li>
        </ol>
    </nav>

    <div class="row">
        <!-- Left Sidebar -->
        <div class="col-lg-3 col-md-4 col-sm-12">
            <div class="search-sidebar">
                <form method="POST" action="{{url('tim-lop-xe-filter')}}" enctype="multipart/form-data">
                    @csrf
                    @php
                        $tim_kiem = $contents->filter(function($item) {
                                        return $item->key == 'tim_kiem';
                                    })->first();
                    @endphp
                    <h5 class="text-center mb-4 text-primary">
                        <i class="fas fa-search"></i> {{$tim_kiem->name_show()}}
                    </h5>
                    
                    <div class="form-group mb-3">
                        @php
                            $tim_kiem_loai_xe = $contents->filter(function($item) {
                                            return $item->key == 'tim_kiem_loai_xe';
                                        })->first();
                        @endphp
                        <label class="form-label fw-bold">{{$tim_kiem_loai_xe->name_show()}}</label>
                        <select class="form-select js-select2" name="model">
                            @foreach($models as $model)
                            <option value="{{$model->id}}">{{$model->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group mb-3">
                        @php
                            $tim_kiem_hang = $contents->filter(function($item) {
                                            return $item->key == 'tim_kiem_hang';
                                        })->first();
                        @endphp
                        <label class="form-label fw-bold">{{$tim_kiem_hang->name_show()}}</label>
                        <select class="form-select js-select2" name="brand">
                            @foreach($brands as $brand)
                            <option value="{{$brand->id}}">{{$brand->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group mb-3">
                        @php
                            $tim_kiem_size = $contents->filter(function($item) {
                                            return $item->key == 'tim_kiem_size';
                                        })->first();
                        @endphp
                        <label class="form-label fw-bold">{{$tim_kiem_size->name_show()}}</label>
                        <select class="form-select js-select2" name="size">
                            @foreach($sizes as $size)
                            <option value="{{$size->size}}">{{$size->size}}</option>
                            @endforeach
                        </select>
                    </div>
                    
                    <button class="btn btn-success w-100 mb-3">
                        <i class="fas fa-search"></i> {{$tim_kiem->name_show()}}
                    </button>
                    
                    <div class="border-top pt-3">
                        <h6 class="mb-3">Bộ lọc xuất xứ:</h6>
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="checkbox" id="chinacheck" value="option2" checked="checked">
                            <label class="form-check-label" for="chinacheck">
                                <img src="{{asset('client/assets/img/china.jpg') }}" width="15px" alt=""> 
                                China ({{$china}})
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="thailandcheck" value="option1" checked="checked">
                            <label class="form-check-label" for="thailandcheck">
                                <img src="{{asset('country/flag/1681452454.png') }}" width="15px" alt=""> 
                                Thailand ({{$thailand}})
                            </label>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- Right Product Detail -->
        <div class="col-lg-9 col-md-8 col-sm-12">
            <div class="product-detail-card">
                <div class="row">
                    <!-- Product Images -->
                    <div class="col-lg-6">
                        <div class="product-image-container p-4">
                            <ul id="lightSlider" class="text-center">
                                <!-- Thumbnail Image First -->
                                @if($tyre->thumbnail_image)
                                    <li data-thumb="{{asset($tyre->thumbnail_image)}}" class="text-center">
                                        <img class="mx-auto d-block img-fluid" id="myImgThumbnail" src="{{asset($tyre->thumbnail_image)}}" style="max-height: 400px; max-width: 100%; border-radius: 10px;">
                                    </li>
                                @endif
                                
                                <!-- Tyre Images -->
                                @foreach ($tyre->images as $image)
                                    <li data-thumb="{{asset($image->image)}}" class="text-center">
                                        <img class="mx-auto d-block img-fluid" id="myImg{{$image->id}}" src="{{asset($image->image)}}" style="max-height: 400px; max-width: 100%; border-radius: 10px;">
                                    </li>
                                @endforeach
                                
                                <!-- Size-specific Images -->
                                @if(isset($sizedetail))
                                    <!-- Show images for selected size only -->
                                    @foreach($sizedetail->images as $image)
                                        <li data-thumb="{{asset($image->image)}}" class="text-center">
                                            <img class="mx-auto d-block img-fluid" id="myImg{{$image->id}}" src="{{asset($image->image)}}" style="max-height: 400px; max-width: 100%; border-radius: 10px;">
                                        </li>
                                    @endforeach
                                @else
                                    <!-- Show images for all sizes when no specific size selected -->
                                    @foreach($tyre_sizes as $sizeimage)
                                        @foreach($sizeimage->images as $image)
                                            <li data-thumb="{{asset($image->image)}}" class="text-center">
                                                <img class="mx-auto d-block img-fluid" id="myImg{{$image->id}}" src="{{asset($image->image)}}" style="max-height: 400px; max-width: 100%; border-radius: 10px;">
                                            </li>
                                        @endforeach
                                    @endforeach
                                @endif
                            </ul>
                            
                            <!-- Size Selection -->
                            <div class="mt-4">
                                <h6 class="mb-3">Chọn kích thước:</h6>
                                <div class="d-flex flex-wrap">
                                    @foreach($tyre_sizes as $size)
                                    <a class="size-badge @if(isset($sizedetail) && $size->id == $sizedetail->id) active @endif" 
                                       href="{{url('lop-xe-tai/'.$tyre->id.'/'.$size->id)}}">
                                        {{$size->size}}
                                    </a>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Product Information -->
                    <div class="col-lg-6">
                        <div class="product-info-card">
                            <!-- Product Title -->
                            <h2 class="mb-3 text-primary">{{$tyre->brand->name}} {{$tyre->name}}</h2>
                            <p class="text-muted mb-4">
                                <i class="fas fa-car"></i> @if(isset($tyre->drive)) {{$tyre->drive->name}} @endif
                            </p>
                            
                            <!-- Product Features -->
                            <div class="mb-4">
                                <h5 class="mb-3">Đặc điểm nổi bật:</h5>
                                @php
                                $features = preg_split("/\r\n|\n|\r/", $tyre->tyre_features);
                                @endphp
                                <ul class="feature-list">
                                    @foreach($features as $feature)
                                    <li>
                                        <i class="fas fa-check-circle text-success me-2"></i> 
                                        {{trim($feature)}}
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                            
                            <!-- Installation Position -->
                            @if($tyre->install_position_image != null)
                            <div class="mb-4">
                                <h6 class="mb-2">Vị trí lắp đặt:</h6>
                                <img src="{{asset($tyre->install_position_image)}}" class="img-fluid" style="max-width: 250px; border-radius: 10px;">
                            </div>
                            @endif
                            
                            <!-- Product Specifications -->
                            <div class="row bg-light p-3 rounded">
                                <div class="col-4 text-center">
                                    <div class="fw-bold text-primary">{{$tyre->model->name}}</div>
                                    <small class="text-muted">Loại xe</small>
                                </div>
                                <div class="col-4 text-center">
                                    <div class="fw-bold text-primary">{{$tyre->brand->name}}</div>
                                    <small class="text-muted">Thương hiệu</small>
                                </div>
                                <div class="col-4 text-center">
                                    <div class="fw-bold text-primary">{{$tyre->tyre_structure}}</div>
                                    <small class="text-muted">Cấu trúc</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Specifications Table -->
            <div class="spec-table mt-4">
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead>
                            @php
                                $san_pham_tiet_table = $contents->filter(function($item) {
                                            return $item->key == 'san_pham_tiet_table';
                                        })->first();
                                $table = preg_split("/\r\n|\n|\r/", $san_pham_tiet_table->content_show());
                            @endphp
                            <tr>
                                <th>{{$table[0]}}</th>
                                <th>{{$table[1]}}</th>
                                <th>{{$table[2]}}</th>
                                <th>{{$table[3]}}</th>
                                <th>{{$table[4]}}</th>
                                <th>{{$table[5]}}</th>
                                <th>{{$table[6]}}</th>
                                <th>{{$table[7]}}</th>
                                <th>Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($tyre_sizes as $size)
                            <tr class="@if(isset($size->madeins[0]) && count($size->madeins) == 2){{'bothflag'}}@elseif(isset($size->madeins[0]) && $size->madeins[0]->country->name == 'Thailand'){{'thai'}}@elseif(isset($size->madeins[0]) && $size->madeins[0]->country->name == 'China'){{'china'}}@endif" 
                                @if(isset($sizedetail) && $size->id == $sizedetail->id) style="background:#e8f5e8; border-left: 4px solid #35A25B;" @endif>
                                
                                <td class="text-center">
                                    @foreach ($size->madeins as $country)
                                        @if(count($size->madeins) == 1 && $country->country->name == 'Thailand')
                                            &nbsp;&nbsp;
                                        @endif
                                        <img src="{{asset($country->country->flag)}}" width='20' class="me-1">
                                    @endforeach
                                </td>
                                
                                <td class="fw-bold">{{$size->size}}</td>
                                <td>{{$size->ply}}</td>
                                <td>{{$size->sevice_index}}</td>
                                <td>{{$size->unit}}</td>
                                <td>{{$size->tread_type}}</td>
                                <td>{{$size->total}}</td>
                                
                                <td class="price-highlight">
                                    @if(isset($size->promotion))
                                        <span class="text-success">{{number_format(intval($size->promotion->promotion_price), 0, '', ',')}}đ</span>
                                        <span class="price-old">{{number_format(intval($size->price), 0, '', ',')}}đ</span>
                                    @else
                                        {{number_format(intval($size->price), 0, '', ',')}}đ
                                    @endif
                                    <small class="text-muted d-block">/ {{$size->unit}}</small>
                                </td>
                                
                                @php
                                    $them_gio_hang = $contents->filter(function($item) {
                                                            return $item->key == 'them_gio_hang';
                                                        })->first();
                                @endphp
                                <td>
                                    <a href="{{ url('client/them-gio-hang/'.$size->id)}}" class="btn btn-add-cart btn-sm">
                                        <i class="fas fa-shopping-cart"></i> {{$them_gio_hang->name_show()}}
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                
                <!-- Legend -->
                <div class="p-3 bg-light border-top">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="d-flex align-items-center">
                                <img src="{{asset('client/assets/img/china.jpg') }}" width="20px" alt="" class="me-2">
                                <span class="fw-bold">China</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex align-items-center">
                                <img src="{{asset('country/flag/1681452454.png') }}" width="20px" alt="" class="me-2">
                                <span class="fw-bold">Thailand</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <style>
                .ratings {
                    list-style-type: none;
                    margin: 0;
                    padding: 0;
                    display: flex;
                    gap: 5px;
                }

                .star {
                    cursor: pointer;
                    font-size: 1.5em;
                    color: #ddd;
                    transition: color 0.2s ease;
                }

                .star:hover,
                .star.selected,
                .star:hover ~ .star,
                .star.selected ~ .star {
                    color: #ffc107;
                }

                .checked {
                    color: #ffc107;
                }

                /* Enhanced animations */
                .product-detail-card {
                    animation: fadeInUp 0.6s ease-out;
                }

                @keyframes fadeInUp {
                    from {
                        opacity: 0;
                        transform: translateY(30px);
                    }
                    to {
                        opacity: 1;
                        transform: translateY(0);
                    }
                }

                /* Improved responsive design */
                @media (max-width: 992px) {
                    .product-detail-card .row {
                        flex-direction: column;
                    }
                    
                    .product-image-container {
                        margin-bottom: 20px;
                    }
                }

                @media (max-width: 768px) {
                    .size-badge {
                        font-size: 0.9em;
                        padding: 6px 12px;
                    }
                    
                    .spec-table {
                        font-size: 0.9em;
                    }
                    
                    .related-product-card .card-body {
                        padding: 15px;
                    }
                }

                /* Loading animation for images */
                .product-image-container img {
                    transition: opacity 0.3s ease;
                }

                .product-image-container img.loading {
                    opacity: 0.7;
                }

                /* Enhanced hover effects */
                .btn-add-cart {
                    position: relative;
                    overflow: hidden;
                }

                .btn-add-cart::before {
                    content: '';
                    position: absolute;
                    top: 0;
                    left: -100%;
                    width: 100%;
                    height: 100%;
                    background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
                    transition: left 0.5s;
                }

                .btn-add-cart:hover::before {
                    left: 100%;
                }
            </style>
            <!-- Review Section -->
            @if(auth()->check() && Auth::user()->hasRole('client'))
            <div class="review-section">
                @php
                    $viet_danh_gia_san_pham = $contents->filter(function($item) {
                                            return $item->key == 'viet_danh_gia_san_pham';
                                        })->first();
                @endphp
                <h5 class="mb-4">
                    <i class="fas fa-star text-warning"></i> {{$viet_danh_gia_san_pham->name_show()}}
                </h5>
                
                <div class="row">
                    <div class="col-md-6">
                        <div class="rating-input mb-3">
                            <label class="form-label">Đánh giá của bạn:</label>
                            <ul class="ratings d-flex justify-content-start">
                                <li class="star" data-id="5"><i class="fas fa-star"></i></li>
                                <li class="star" data-id="4"><i class="fas fa-star"></i></li>
                                <li class="star" data-id="3"><i class="fas fa-star"></i></li>
                                <li class="star" data-id="2"><i class="fas fa-star"></i></li>
                                <li class="star" data-id="1"><i class="fas fa-star"></i></li>
                            </ul>
                        </div>
                    </div>
                </div>
                
                <form method="POST" action="{{url('client/danh-gia-add')}}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="vote" id="vote">
                    <input type="hidden" name="tyre_id" value="{{$tyre->id}}">
                    
                    <div class="mb-3">
                        <label class="form-label">Nhận xét của bạn:</label>
                        <textarea name="comment" class="form-control" rows="4" placeholder="Chia sẻ trải nghiệm của bạn về sản phẩm này..."></textarea>
                    </div>
                    
                    @if($errors->any())
                    <div class="alert alert-danger">
                        @php
                            $viet_danh_gia_san_pham_canh_bao = $contents->filter(function($item) {
                                            return $item->key == 'viet_danh_gia_san_pham_canh_bao';
                                        })->first();
                        @endphp
                        {{$viet_danh_gia_san_pham_canh_bao->name_show()}}
                    </div>
                    @endif
                    
                    @php
                        $viet_danh_gia_san_pham_button = $contents->filter(function($item) {
                                        return $item->key == 'viet_danh_gia_san_pham_button';
                                    })->first();
                    @endphp
                    
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-paper-plane"></i> {{$viet_danh_gia_san_pham_button->name_show()}}
                    </button>
                </form>
            </div>
            @endif
            <!-- Customer Reviews -->
            @if(count($tyre->reviews) > 0)
            <div class="review-section">
                @php
                    $danh_gia_cua_khach_hang = $contents->filter(function($item) {
                                            return $item->key == 'danh_gia_cua_khach_hang';
                                        })->first();
                @endphp
                <h5 class="mb-4">
                    <i class="fas fa-comments text-info"></i> {{$danh_gia_cua_khach_hang->name_show()}}
                </h5>
                
                <div class="row">
                    @foreach($tyre->reviews as $review)
                    <div class="col-12 mb-3">
                        <div class="card border-0 bg-light">
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-2">
                                    <div class="rating-stars me-3">
                                        @for($i = 1; $i <= 5; $i++)
                                            <i class="fas fa-star @if($review->vote >= $i) text-warning @else text-muted @endif"></i>
                                        @endfor
                                    </div>
                                    <small class="text-muted">{{$review->created_at->format('d/m/Y')}}</small>
                                </div>
                                <p class="mb-0">{{$review->comment}}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            @endif
            <!-- Related Products -->
            @if(count($relatedtypres)> 0)
            <div class="related-products">
                @php
                    $san_pham_cung_loai = $contents->filter(function($item) {
                                            return $item->key == 'san_pham_cung_loai';
                                        })->first();
                @endphp
                <h5 class="mb-4">
                    <i class="fas fa-th-large text-primary"></i> {{$san_pham_cung_loai->name_show()}}
                </h5>
                
                <div class="row">
                    @foreach ($relatedtypres as $relatedtypre)
                    <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                        <div class="related-product-card">
                            <div class="position-relative overflow-hidden">
                                <a href="{{url('lop-xe-tai/'.$relatedtypre->id)}}">
                                    <img class="card-img-top img-fluid" 
                                         src="{{asset($relatedtypre->images[0]->image)}}" 
                                         alt="{{$relatedtypre->name}}" 
                                         style="height: 200px; object-fit: cover;">
                                </a>
                                <div class="position-absolute top-0 end-0 m-2">
                                    <span class="badge bg-success">Mới</span>
                                </div>
                            </div>
                            
                            <div class="card-body p-3">
                                <h6 class="card-title mb-2 text-dark fw-bold">
                                    {{$relatedtypre->brand->name}} {{$relatedtypre->name}}
                                </h6>
                                
                                <p class="card-text text-muted small mb-2">
                                    @if(isset($relatedtypre->drive)){{$relatedtypre->drive->name}} @endif
                                    {{$relatedtypre->model->name}} {{$relatedtypre->structure->name ?? ''}}
                                </p>
                                
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="price-highlight">
                                        {{number_format($relatedtypre->price, 0, '', ',')}}đ
                                    </span>
                                    <a href="{{url('lop-xe-tai/'.$relatedtypre->id)}}" class="btn btn-outline-primary btn-sm">
                                        <i class="fas fa-eye"></i> Xem
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            @endif

        </div>
    </div>
</div>
<style>
  #DataTables_Table_0_length {
    display: none;
  }

  #DataTables_Table_0_paginate {
    float: right;
  }
#myImg:hover {opacity: 0.7;}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 100; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
}

/* Modal Content (image) */
.modal-content {
  margin: auto;
  display: block;
  width: 100%;
  max-width: 800px;
}

/* Caption of Modal Image */
#caption {
  margin: auto;
  display: block;
  width: 80%;
  max-width: 700px;
  text-align: center;
  color: #ccc;
  padding: 10px 0;
  height: 150px;
}

/* Add Animation */
.modal-content, #caption {
  -webkit-animation-name: zoom;
  -webkit-animation-duration: 0.6s;
  animation-name: zoom;
  animation-duration: 0.6s;
}

@-webkit-keyframes zoom {
  from {-webkit-transform:scale(0)}
  to {-webkit-transform:scale(1)}
}

@keyframes zoom {
  from {transform:scale(0)}
  to {transform:scale(1)}
}

/* The Close Button */
.close {
  position: absolute;
  top: 15px;
  right: 35px;
  color: #f1f1f1;
  font-size: 40px;
  font-weight: bold;
  transition: 0.3s;
}

.close:hover,
.close:focus {
  color: #bbb;
  text-decoration: none;
  cursor: pointer;
}

/* 100% Image Width on Smaller Screens */
@media only screen and (max-width: 700px){
  .modal-content {
    width: 100%;
  }
}
.lSSlideOuter .lSPager.lSGallery img{
  max-width: 50px;
  max-height: 50px;
}
.thumbSelected{
    border:4px solid red;
 }
 .lSGallery li img {
   width: 50px !important;
   height: 50px !important;
 }
</style>
<div id="myModal" class="modal">
  <span class="close">&times;</span>
  <img class="modal-content" id="img01">
  <div id="caption"></div>
</div>

@endsection
@section('script')
<script src="{{asset('client/assets/js/jquery360.js')}}"></script>
<script src="https://code.jquery.com/jquery-migrate-1.4.1.min.js"></script>
<script>
$(document).ready(function() {
    // Initialize Select2
    $(".js-select2").select2({
        theme: 'bootstrap-5',
        width: '100%'
    });
    
    // Enhanced country filter functionality
    $("#chinacheck").change(function() {
        if($(this).prop('checked')) {
            $(".china").show();
            $(".bothflag").show();
            if($('#thailandcheck').is(":checked")){
                $(".thai").show();
            } else {
                $(".thai").hide();
            }
        } else {
            $(".china").hide();
            if($('#thailandcheck').is(":checked")){
                $(".bothflag").show();
                $(".thai").show();
            } else {
                $(".bothflag").hide();
                $(".thai").hide();
            }
        }
    });
    
    $("#thailandcheck").change(function() {
        if($(this).prop('checked')) {
            $(".bothflag").show();
            $(".thai").show();
            if($('#chinacheck').is(":checked")){
                $(".china").show();
            } else {
                $(".china").hide();
            }
        } else {
            if($('#chinacheck').is(":checked")){
                $(".china").show();
                $(".bothflag").show();
            } else {
                $(".china").hide();
                $(".bothflag").hide();
            }
            $(".thai").hide();
        }
    });
    
    // Enhanced image loading
    $('.product-image-container img').on('load', function() {
        $(this).removeClass('loading');
    }).on('error', function() {
        $(this).attr('src', '{{asset("client/assets/img/no-image.png")}}');
    });
    
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
    
    // Add loading state to buttons
    $('.btn-add-cart').on('click', function() {
        var $btn = $(this);
        var originalText = $btn.html();
        $btn.html('<i class="fas fa-spinner fa-spin"></i> Đang thêm...');
        $btn.prop('disabled', true);
        
        setTimeout(function() {
            $btn.html(originalText);
            $btn.prop('disabled', false);
        }, 2000);
    });
});
</script>
<script>
  $(document).ready(function(){
    $(".parent").click(function(){
      $(this).find(".arrow").toggleClass("fa-light fa-caret-down fa-light fa-caret-up");
    });
  });
  $(function (){
  var star = '.star',
      selected = '.selected';

  $(star).on('click', function(){
    $(selected).each(function(){
      $(this).removeClass('selected');
    });
    $(this).addClass('selected');
    var value = $(this).attr("data-id");
    $('#vote').val(value);
  });

});
</script>

<script src="{{asset('client/assets/js/lightslider.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function() {
//        window.prettyPrint && prettyPrint()
        $('#lightSlider').lightSlider({
            gallery:true,
            item:1,
            thumbItem:9,
            slideMargin: 0,
            speed:900,
            auto:true,
            loop:true,
            pauseOnHover: true,
        slideEndAnimation: true,
        pause: 2000,
        keyPress: false,
        controls: true,
        prevHtml: '<div class="lg-prev lg-icon"><i class="fa fa-chevron-left"></i></div>',
        nextHtml: '<div class="lg-prev lg-icon"><i class="fa fa-chevron-right"></i></div>',
        rtl: false,
        adaptiveHeight: false,
        vertical: false,
        verticalHeight: 400,
        vThumbWidth: 100,
        pager: true,
        galleryMargin: 5,
        thumbMargin: 5,
        currentPagerPosition: 'middle',
        enableTouch: true,
        enableDrag: true,
        freeMove: true,
        swipeThreshold: 40,
        responsive: [],
        onBeforeStart: function (el) {

        },
        onSliderLoad: function (el) {
           if ( $( ".lSAction" ).length ) {

           }else {
              location.reload();
           }
        },
        onBeforeSlide: function (el) {

        },
        onAfterSlide: function (el) {

        },
        onBeforeNextSlide: function (el) {},
        onBeforePrevSlide: function (el) {}
        });
    });

</script>
<script>
// Get the modal
@if($tyre->thumbnail_image)
var modalThumbnail = document.getElementById("myModal");
var imgThumbnail = document.getElementById("myImgThumbnail");
var modalImgThumbnail = document.getElementById("img01");
var captionTextThumbnail = document.getElementById("caption");

imgThumbnail.onclick = function(){
  modalThumbnail.style.display = "block";
  modalImgThumbnail.src = this.src;
  captionTextThumbnail.innerHTML = this.alt;
}
@endif

@foreach ($tyre->images as $image)
var modal{{$image->id}} = document.getElementById("myModal");
var img{{$image->id}} = document.getElementById("myImg{{$image->id}}");
var modalImg{{$image->id}} = document.getElementById("img01");
var captionText{{$image->id}} = document.getElementById("caption");

img{{$image->id}}.onclick = function(){
  modal{{$image->id}}.style.display = "block";
  modalImg{{$image->id}}.src = this.src;
  captionText{{$image->id}}.innerHTML = this.alt;
}
@endforeach

@if(isset($sizedetail))
  @foreach($sizedetail->images as $image)
var modal{{$image->id}} = document.getElementById("myModal");
var img{{$image->id}} = document.getElementById("myImg{{$image->id}}");
var modalImg{{$image->id}} = document.getElementById("img01");
var captionText{{$image->id}} = document.getElementById("caption");
img{{$image->id}}.onclick = function(){
  modal{{$image->id}}.style.display = "block";
  modalImg{{$image->id}}.src = this.src;
  captionText{{$image->id}}.innerHTML = this.alt;
}
  @endforeach
@else
  @foreach($tyre_sizes as $sizeimage)
    @foreach($sizeimage->images as $image)
var modal{{$image->id}} = document.getElementById("myModal");
var img{{$image->id}} = document.getElementById("myImg{{$image->id}}");
var modalImg{{$image->id}} = document.getElementById("img01");
var captionText{{$image->id}} = document.getElementById("caption");
img{{$image->id}}.onclick = function(){
  modal{{$image->id}}.style.display = "block";
  modalImg{{$image->id}}.src = this.src;
  captionText{{$image->id}}.innerHTML = this.alt;
}
    @endforeach
  @endforeach
@endif

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  document.getElementById("myModal").style.display = "none";
}
</script>

<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $('.data-table').dataTable({
            "paging": true,
            "pageLength": 10,
            "searching": false,
            "ordering": false,
            "info": false,
            "autoWidth": false,
        });
    });
</script>

@endsection
