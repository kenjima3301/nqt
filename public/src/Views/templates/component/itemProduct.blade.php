<a class="product" href="{{ url('slugweb', ['slug' => $product['slugvi']]) }}" title="{{ $product['name'.$lang] }}">
    <div class="pic-product scale-img">
        <img width="290" height="320" class="lazy" onerror="this.src='thumbs/290x320x1/assets/images/noimage.png';" data-src="{{assets_photo('product','290x320x1',$product['photo'],'watermarks')}}" alt="{{$product['name'.$lang]}}">
    </div>
    <div class="info-product">
        <h3 class="name-product text-split">
            {{ $product['name'.$lang] }}
        </h3>
        <div class="brand-product">{{ $product['parametervi'] }}</div>
        <p class="price-product">
            <span class="price-txt">{{ __('web.gia') }}:</span>
            @if (empty($product->sale_price))
                @if (empty($product->regular_price))
                    <span class="price-new">{{ __('web.lienhe') }}</span>
                @else
                    <span class="price-new">{{ Func::formatMoney($product->regular_price) }}</span>
                @endif
            @else
                <span class="price-new">{{ Func::formatMoney($product->sale_price) }}</span>
                <span class="price-old">{{ Func::formatMoney($product->regular_price) }}</span>
            @endif
        </p>
        <?php /*
        <p class="price-product">Giá Sỉ: <a href="tel:<?= preg_replace('/[^0-9]/', '', $optSetting['hotline']); ?>">{{$optSetting['hotline']}}</a></p>
        <span class="cart-add addcart2 addnow" data-id="<?=$product['id']?>" data-action="addnow"><i class="fa-sharp fa-solid fa-cart-shopping"></i><?=__('web.themvaogiohang')?></span>
        */ ?>
        
    </div>
</a>