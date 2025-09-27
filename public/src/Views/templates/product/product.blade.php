@extends('layout')
@section('content')
<section>
    <div class="max-width py-5">
        <div class="product-layout">
            <div class="product-box">
                <div class="title-main">
                    <span>Tìm kiểm sản phẩm</span>
                </div>
                <form action="loc-san-pham" method="get" class="filter-product">
                          <select class="form-control" name="brand" id="">
                    <option value="">-- Tìm theo hãng--</option>
                    @foreach ($tagsBrand as $key => $v)
                    <option value="{{ $v['id'] }}" 
                        @if(isset($_REQUEST['brand']))
                           @if ($v['id']==$_REQUEST['brand'])
                            selected
                           @endif 
                        @endif
                    > {{ $v['name'.$lang] }} </option>
                    @endforeach
                    
                </select>
                <select class="form-control" name="size" id="">
                    <option value="">-- Tìm theo size--</option>
                    @foreach ($tagsSize as $key => $v)
                    <option value="{{ $v['id'] }}" 
                        @if(isset($_REQUEST['size']))
                           @if ($v['id']==$_REQUEST['size'])
                            selected
                           @endif 
                        @endif
                    > {{ $v['name'.$lang] }} </option>
                    @endforeach
                </select>
                <select class="form-control" name="code" id="">
                    <option value="">-- Tìm theo mã--</option>
                    @foreach ($tagsCode as $key => $v)
                    <option value="{{ $v['id'] }}" 
                        @if(isset($_REQUEST['code']))
                           @if ($v['id']==$_REQUEST['code'])
                            selected
                           @endif 
                        @endif
                    > {{ $v['name'.$lang] }} </option>
                    @endforeach
                </select>
                <select class="form-control" name="type" id="">
                    <option value="">-- Loại xe--</option>
                    @foreach ($tagsType as $key => $v)
                    <option value="{{ $v['id'] }}" 
                        @if(isset($_REQUEST['type']))
                           @if ($v['id']==$_REQUEST['type'])
                            selected
                           @endif 
                        @endif
                    > {{ $v['name'.$lang] }} </option>
                    @endforeach
                </select>
                <button>TÌM KIẾM</button>
            </form>
            </div>
            <div class="product-box">
                <div class="title-main">
                    <span>{{ $titleMain }}</span>
                </div>
                @if ($product->isNotEmpty())
                <div class="grid-product">
                    @foreach ($product as $v)
                    @component('component.itemProduct', ['product' => $v])
                    @endcomponent
                    @endforeach
                </div>
                {!! $product->appends(request()->query())->links() !!}
                @else
                <div class="alert alert-warning w-100" role="alert">
                    <strong><?=__('web.chuacapnhatdulieu')?></strong>
                </div>
                @endif
            </div>
        </div>
        
    </div>
</section>
@endsection