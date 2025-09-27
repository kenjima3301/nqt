@extends('layout')
@section('content')
<div class="d-flex flex-column">
    <div class="filter-index">
        <div class="wrap-content">
            <div class="filter-title">
                <img width="40" height="34" class="lazy" onerror="this.src='thumbs/40x34x1/assets/images/noimage.png';" data-src="assets/images/search-ic.png" alt="">
                tìm kiếm loại lốp xe
            </div>
            <form action="loc-san-pham" method="get">
                <select class="form-control" name="brand" id="">
                    <option value="">-- Tìm theo hãng--</option>
                    @foreach ($tagsBrand as $key => $v)
                    <option value="{{ $v['id'] }}" > {{ $v['name'.$lang] }} </option>
                    @endforeach
                    
                </select>
                <select class="form-control" name="size" id="">
                    <option value="">-- Tìm theo size--</option>
                    @foreach ($tagsSize as $key => $v)
                    <option value="{{ $v['id'] }}"> {{ $v['name'.$lang] }} </option>
                    @endforeach
                </select>
                <select class="form-control" name="code" id="">
                    <option value="">-- Tìm theo mã--</option>
                    @foreach ($tagsCode as $key => $v)
                    <option value="{{ $v['id'] }}"> {{ $v['name'.$lang] }} </option>
                    @endforeach
                </select>
                <select class="form-control" name="type" id="">
                    <option value="">-- Loại xe--</option>
                    @foreach ($tagsType as $key => $v)
                    <option value="{{ $v['id'] }}"> {{ $v['name'.$lang] }} </option>
                    @endforeach
                </select>
                <button>TÌM KIẾM</button>
            </form>
        </div>
    </div>
    <img width="1366" height="28" class="lazy w-100" onerror="this.src='thumbs/1366x28/assets/images/noimage.png';" data-src="assets/images/intro-line.png" alt="">
</div>
<div class="intro">
    <div class="wrap-content">
        <div class="intro-box">
            <div class="intro-txt-1">
                <div>giới thiệu</div>
                <span>{{ $gioithieu['name'.$lang] }}</span>
            </div>
            <div class="intro-txt-2 text-split"> <?=htmlspecialchars_decode($gioithieu['descvi']) ?></div>
            <a href="gioi-thieu" class="intro-more">
                TÌM HIỂU THÊM
            </a>
        </div>
        <div class="intro-box">
            <img width="563" height="99" class="lazy about_us" onerror="this.src='thumbs/563x99x2/assets/images/noimage.png';" data-src="assets/images/about_us.png" alt="">
            <div class="intro-img">
                <div class="scale-img">
                    <img width="600" height="425" class="lazy w-100" onerror="this.src='thumbs/600x425x1/assets/images/noimage.png';" data-src="{{assets_photo('news','600x425x1',$gioithieu['photo'],'thumbs')}}" alt="{{$gioithieu['name'.$lang]}}">
                </div>
            </div>
        </div>
    </div>
</div>
<div class="tieuchi">
    <div class="wrap-content">
        <div class="tieuchi-slide">
            @foreach ($tieuchi as $v)
            <div>
                <div class="tieuchi-item">
                    <div class="tieuchi-img">
                        <img width="60" height="60"  onerror="this.src='thumbs/100x100x1/assets/images/noimage.png';" src="{{assets_photo('photo','100x100x2',$v['photo'],'thumbs')}}" alt="{{$v['name'.$lang]}}">
                    </div>
                    <div class="tieuchi-txt">
                        <div class="tieuchi-txt-1 catchuoi1">
                            <?=$v['name'.$lang]?>
                        </div>
                        <div class="tieuchi-txt-2 catchuoi2">
                            <?=$v['desc'.$lang]?>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<a href="{{ $banner1['link'] }}" class="banner-qc">
    <img class="lazy" onerror="this.src='thumbs/1366x500x1/assets/images/noimage.png';" data-src="{{assets_photo('photo','1366x500x1',$banner1['photo'],'thumbs')}}" alt="{{$banner1['name'.$lang]}}">
</a>
@if( $listProductNB->isNotEmpty() )
<div class="productLayout">
    @foreach ($listProductNB as $key => $vlist)
    <div class="wrap-content">
        <div class="title-product">
            <span>{{ $vlist['namevi'] }}</span>
            <img width="79" height="47" class="lazy" onerror="this.src='thumbs/79x47x1/assets/images/noimage.png';" data-src="assets/images/product-img.png" alt="">
            <a href="{{ $vlist['slug'.$lang] }}" class="product-more">
                Xem tất cả
                <svg width="10" height="11" viewBox="0 0 10 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M1.28369 0.234375L0 1.23438L4 5.23438L0 9.23438L1.28331 10.2344L6 5.23454L1.28369 0.234375Z" fill="white" />
                  <path d="M5.28332 0L3.99964 1L8.00002 5.23438L3.71669 9.73438L5 10.7344L10 5.23454L5.28332 0Z" fill="white" />
                </svg>
            </a>
        </div>
        <div class="product-list d-none">
            <a class="product-page-number" data-list="{{ $vlist['id'] }}" data-pagereturn="load-product{{ $vlist['id'] }}">
                Tất cả
            </a>
        </div>
        <div class="load-product{{ $vlist['id'] }}"></div>
    </div>
    @endforeach
</div>
@endif

<a href="{{ $banner2['link'] }}" class="banner-qc">
    <img class="lazy" onerror="this.src='thumbs/1366x500x1/assets/images/noimage.png';" data-src="{{assets_photo('photo','1366x500x1',$banner2['photo'],'thumbs')}}" alt="{{$banner2['name'.$lang]}}">
</a>

@if($dichvu->isNotEmpty())
<div class="dichvu">
    <div class="wrap-content">
        <div class="title-main">
            <span>DỊCH VỤ <span class="text-green">TIÊU BIỂU</span></span>
            <div>{{$slogan['desc'.$lang]}}</div>
        </div>
        <div class="dichvu-box">
            <div class="dichvu-slide">
                @foreach($dichvu as $key => $v)
                    <div>
                        <a href="{{$v['slugvi']}}" class="dichvu-item">
                            <div class="dichvu-img scale-img">
                                <img class="" width="520" height="370" onerror="this.src='thumbs/520x370x1/assets/images/noimage.png';" src="{{assets_photo('news','520x370x1',$v['photo'],'thumbs')}}" alt="{{$v['name'.$lang]}}">
                            </div>
                            <div class="dichvu-txt">
                                <div class="dichvu-txt-1 text-split">{{ $v['name'.$lang] }}</div>
                                <div class="dichvu-txt-2 text-split">{{ $v['desc'.$lang] }}</div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endif

@if( $hinhanh->isNotEmpty() )
<div class="hinhanh">
    <div class="wrap-content">
        <div class="hinhanh-desc">
            <div class="hinhanh-txt-1">
                <span>HÌNH ẢNH KHO XƯỞNG</span>
                <div class="hinhanh-txt-2 text-split">{{ $hinhanh_mota['desc'.$lang] }}</div>
            </div>
            <div class="hinhanh-txt-3 text-split">{{ $hinhanh_mota['content'.$lang] }}</div>
            <div class="hinhanh-arr"></div>
        </div>
        <div class="hinhanh-box">
            <div class="hinhanh-slide">
                @foreach ($hinhanh as $key => $v)
                <div>
                    <a href="{{ $v['slug'.$lang] }}" class="hinhanh-item">
                        <div class="hinhanh-img scale-img">
                            <img width="270" height="370" class="" onerror="this.src='thumbs/270x370x1/assets/images/noimage.png';" src="{{assets_photo('news','270x370x1',$v['photo'],'thumbs')}}" alt="{{$v['name'.$lang]}}">
                        </div>
                        <div class="hinhanh-txt">
                            <div class="hinhanh-txt-4 text-split">{{ $v['name'.$lang] }}</div>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endif

<div class="tintuc-video">
    <div class="wrap-content">
        <div class="title-main">
            <span>tin tức <span class="text-green">- video</span></span>
            <div>{{$slogan['desc'.$lang]}}</div>
        </div>
        <div class="tt-video-d">
            <div class="tintuc-box">
                <div class="tintuc-slide">
                    @foreach ($tintuc as $key => $v)
                    <div>
                        <a href="{{ $v['slug'.$lang] }}" class="tintuc-item">
                            <div class="tintuc-img scale-img">
                                <img width="190" height="145" class="" onerror="this.src='thumbs/190x145x1/assets/images/noimage.png';" src="{{assets_photo('news','190x145x1',$v['photo'],'thumbs')}}" alt="{{$v['name'.$lang]}}">
                            </div>
                            <div class="tintuc-txt">
                                <div class="tintuc-txt-1 text-split">{{ $v['name'.$lang] }}</div>
                                <div class="tintuc-txt-2 text-split">{{ date('d/m/Y',$v['date_created']) }}</div>
                                <div class="tintuc-txt-3 text-split">{{ $v['desc'.$lang] }}</div>
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="video-box">
                <div class="video-for">
                    @foreach ($video as $key => $v)
                    <div>
                        <a href="{{ $v['link_video'] }}" class="video-item" data-fancybox>
                            <div class="video-img">
                                <img class="" onerror="this.src='thumbs/550x350x1/assets/images/noimage.png';" src="{{assets_photo('photo','550x350x1',$v['photo'],'thumbs')}}" alt="{{$v['name'.$lang]}}">
                            </div>
                            <img width="120" height="120" class="lazy play-ic" onerror="this.src='thumbs/120x120x1/assets/images/noimage.png';" data-src="assets/images/play-ic.png" alt="">
                        </a>
                    </div>
                    @endforeach
                </div>
                <div class="video-nav">
                    @foreach ($video as $key => $v)
                    <div>
                        <div class="video-item">
                            <div class="video-img">
                                <img class="" onerror="this.src='thumbs/550x350x1/assets/images/noimage.png';" src="{{assets_photo('photo','550x350x1',$v['photo'],'thumbs')}}" alt="{{$v['name'.$lang]}}">
                            </div>
                            <img width="50" height="50" class="lazy play-ic" onerror="this.src='thumbs/120x120x1/assets/images/noimage.png';" data-src="assets/images/play-ic.png" alt="">
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

@if( $doitac->isNotEmpty() )
<div class="doitac">
    <div class="wrap-content">
        <div class="title-main">
            <span>{{ __('web.doitac') }}</span>
            <div>{{$slogan['desc'.$lang]}}</div>
            <p></p>
        </div>
        <div class="doitac-slide">
            @foreach ($doitac as $key => $v)
            <div>
                <a href="{{ $v['link'] }}" class="doitac-item" target="_blank">
                    <img width="145" height="70" class="" onerror="this.src='thumbs/145x70x2/assets/images/noimage.png';" src="{{assets_photo('photo','145x70x2',$v['photo'],'thumbs')}}" alt="{{$v['name'.$lang]}}">
                </a>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endif
@endsection