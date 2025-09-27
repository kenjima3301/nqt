@extends('layout')
@section('content')
<section>
<div class="max-width py-5">
        <div class="title-main">
            <span><?= $titleMain?></span>
        </div>
        @if( $news->isNotEmpty() )
            <div class="album-d">
                @foreach ($news as $key => $v)
                <a href="{{ $v['slug'.$lang] }}" class="album-item">
                    <div class="album-img scale-img"><img width="375" height="475" onerror="this.src='thumbs/375x475x1/assets/images/noimage.png';"  src="{{assets_photo('news','375x475x1',$v['photo'],'thumbs')}}" alt="{{$v['name'.$lang]}}"></div>
                    <div class="album-txt">
                        <div class="album-txt-1 text-split">{{ $v['name'.$lang] }}</div>
                    </div>
                </a>
                @endforeach
            </div>
        @else
            <div class="alert alert-warning w-100" role="alert">
                <strong>Không tìm thấy kết quả</strong>
            </div>
        @endif
    </div>
</section>
@endsection