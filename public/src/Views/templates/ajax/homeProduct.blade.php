@if (!empty($productAjax) && count($productAjax))
    <div class="grid-product">
        @foreach ($productAjax as $v)
        @component('component.itemProduct', ['product' => $v])
        @endcomponent
        @endforeach
    </div>
    @php
        $page_limit=5;
    @endphp
    
    @if($page > 1)
        <div class="product-page">  
        @if($page>$page_limit)
            <a class="@if($currentPage==1) active @endif product-page-number" data-cat="{{ $id['id_cat'] ?? 0  }}" data-list="{{ $id['id_list'] ?? 0 }}" data-status="{{ $id['status'] ?? '' }}" data-page="1" data-pagereturn="{{ $pagereturn ?? '' }}">1</a>
            @if ($currentPage!=1 && $currentPage-1!=1 && $currentPage-2!=1 && $currentPage-3!=1)
                <span>...</span>
            @endif
            @for ($i=$currentPage-2; $i<=$currentPage+2; $i++)
                @if ($i!=$page && $i<=$page && $i!=1 && $i>=1 ) 
                <a class="@if($currentPage==$i) active @endif product-page-number" data-cat="{{ $id['id_cat'] ?? 0  }}" data-list="{{ $id['id_list'] ?? 0 }}" data-status="{{ $id['status'] ?? '' }}" data-page="{{ $i ?? 0}}" data-pagereturn="{{ $pagereturn ?? '' }}">{{ $i }}</a>    
                @endif
            @endfor
            @if ($currentPage+1!=$page && $currentPage+2!=$page && $currentPage+3!=$page && $currentPage!=$page )
                <span>...</span>
            @endif
            <a class="@if($currentPage==$page) active @endif product-page-number" data-cat="{{ $id['id_cat'] ?? 0  }}" data-list="{{ $id['id_list'] ?? 0 }}" data-status="{{ $id['status'] ?? '' }}" data-page="{{ $page }}" data-pagereturn="{{ $pagereturn ?? '' }}">{{ $page }}</a>
        @else
            @for ($i=1; $i<= $page; $i++)
                <a class="@if($currentPage==$i) active @endif product-page-number" data-cat="{{ $id['id_cat'] ?? 0  }}" data-list="{{ $id['id_list'] ?? 0 }}" data-status="{{ $id['status'] ?? '' }}" data-page="{{ $i ?? 0}}" data-pagereturn="{{ $pagereturn ?? '' }}">{{ $i }}</a>
            @endfor
        @endif
        </div>
    @endif
@else
    <div class="alert alert-warning w-100" role="alert">
        <strong>Không tìm thấy sản phẩm</strong>
    </div>
@endif

<?php /*
@if (!empty($productAjax))
    <div class="grid-product">
        @foreach ($productAjax as $v)
            @component('component.itemProduct', ['product' => $v])
            @endcomponent
        @endforeach
    </div>
@endif
{!! $productAjax->appends(request()->query())->links('pagination.pagin-ajax') !!}
*/ ?>