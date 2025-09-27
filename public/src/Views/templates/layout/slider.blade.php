<div class="slideshow">
    <div class="slideshow-slide">
        @php 
            $thumb=$configType_js['photo']['slide']['width'].'x'.$configType_js['photo']['slide']['height'].'x1';
            $thumb_2=($configType_js['photo']['slide']['width']/2).'x'.($configType_js['photo']['slide']['height']/2).'x1';
        @endphp
        @foreach ($slider as $key => $v)
        <div>
            <a href="{{ $v['link'] }}" class="slide-item">
                <picture>
                    <source media="(max-width: 500px)" srcset="{{ assets_photo('photo',$thumb_2,$v['photo'],'thumbs') }}">
                    <img width="{{ $configType_js['photo']['slide']['width'] }}"  height="{{ $configType_js['photo']['slide']['height'] }}" class="w-100" onerror="this.src='thumbs/{{ $thumb }}/assets/images/noimage.png';" src="{{assets_photo('photo',$thumb,$v['photo'],'thumbs')}}" alt="{{$v['namevi']}}">
                </picture>
            </a>
        </div>
        @endforeach
    </div>
</div>
<?php /*
<div class="slideshow">
    <div class="owl-page owl-carousel owl-theme" data-items="screen:0|items:1" data-rewind="1" data-autoplay="1"
        data-loop="1" data-lazyload="0" data-mousedrag="0" data-touchdrag="0" data-smartspeed="800" data-autoplayspeed="800"
        data-autoplaytimeout="5000" data-dots="0"
        data-animations=""
        data-nav="1" data-navcontainer=".control-slideshow">
        @foreach ($slider??[] as $v)
            <div class="slideshow-item block" owl-item-animation>
                <a class="slideshow-image " href="" target="_blank" title="{{ $v['name'.$lang] }}">
                    <picture>
                        <source media="(max-width: 500px)" srcset="{{ assets_photo('photo','500x190x1',$v['photo'],'thumbs') }}">
                        <img width="1366" height="515" class="w-100" onerror="this.src='assets/images/noimage.png';"
                            src="{{ assets_photo('photo','1366x515x1',$v['photo'],'thumbs') }}" alt="{{ $v['name'.$lang] }}"
                            title="{{ $v['name'.$lang] }}" />
                    </picture>
                </a>
            </div>
        @endforeach
    </div>
    <div class="control-slideshow control-owl transition"></div>
</div>
*/ ?>