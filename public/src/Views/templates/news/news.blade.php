@extends('layout')
@section('content')
<section>
    <div class="max-width py-5">
        <div class="title-main">
            <span><?= $titleMain?></span>
        </div>
        @if ($news->isNotEmpty())
        <div class="grid-news">
            @foreach ($news as $k => $v)
            @component('component.itemNews', ['news' => $v])
            <div class="desc-news line-clamp-3 mt-1">{{ $v['desc'.$lang] }}</div>
            @endcomponent
            @endforeach
        </div>
        {!! $news->links() !!}
        @else
        <div class="alert alert-warning w-100" role="alert">
            <strong><?=__('web.chuacapnhatdulieu')?></strong>
        </div>
        @endif
    </div>
</section>
@endsection