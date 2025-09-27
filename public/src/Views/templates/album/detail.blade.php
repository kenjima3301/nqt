@extends('layout')
@section('content')
<section>
    <div class="max-width py-5">
        <div class="title-main">
            <span>{{ $rowDetail['name'.$lang] }}</span>
        </div>
        @if( $rowDetailPhoto->isNotEmpty() )
            <div class="album-d album-gallery">
            @foreach ($rowDetailPhoto as $key => $v)
            <a href="upload/news/{{ $v['photo'] }}" class="album-item" >
                <div class="album-img scale-img"><img onerror="this.src='thumbs/375x475x1/assets/images/noimage.png';" src="{{assets_photo('news','375x475x1',$v['photo'],'thumbs')}}" alt="{{$v['name'.$lang]}}"></div>
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

