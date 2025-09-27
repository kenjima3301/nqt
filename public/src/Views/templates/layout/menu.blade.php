<div class="menu">
    <div class="wrap-content">
        <ul class="menu-ul menu-main">       
            <li>
                <a class="{{($com == '') ? 'active' : ''}}" href="" title="{{__('web.trangchu')}}">
                    {{__('web.trangchu')}}
                </a>
            </li>
            
            <li class="">
                <a class="{{ ($com == 'gioi-thieu') ? 'active' : '' }}" href="gioi-thieu" title="{{ __('web.gioithieu') }}">
                    {{ __('web.gioithieu') }}
                </a>
            </li>
            
            <li class="">
                <a class="{{($com == 'san-pham') ? 'active' : ''}}" href="san-pham" title="{{__('web.khaikhoang')}}">
                    {{__('web.khaikhoang')}}
                </a>
                <ul>
                @foreach ($listProductMenu ?? [] as $vlist)
                    <li x-data="{ open: false }" x-on:mouseover="open = true" x-on:mouseleave="open = false">
                        <a class="transition" href="{{ url('slugweb', ['slug' => $vlist['slugvi']]) }}" title="{{ $vlist['name'.$lang] }}">{{ $vlist['name'.$lang] }}</a>
                        @if ($vlist->getCategoryCats()->get()->isNotEmpty())
                            <ul x-show="open" x-transition>
                                @foreach ($vlist->getCategoryCats()->get() ?? [] as $vcat)
                                    <li>
                                        <a class="transition" href="{{ url('slugweb', ['slug' => $vcat['slugvi']]) }}" title="{{ $vcat['name'.$lang] }}">{{ $vcat['name'.$lang] }} </a>
                                        <ul>
                                            @foreach ($vcat->getCategoryItems()->get() ?? [] as $vitem)
                                                <li>
                                                    <a class="transition"
                                                        href="{{ url('slugweb', ['slug' => $vitem['slugvi']]) }}"
                                                        title="{{ $vitem['name'.$lang] }}">{{ $vitem['name'.$lang] }}</a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </li>
                @endforeach
                </ul>
            </li>

            <li class="">
                <a class="{{ ($com == 'dich-vu') ? 'active' : '' }}" href="dich-vu" title="{{ __('web.dichvu') }}">
                    {{ __('web.dichvu') }}
                </a>
            </li>
            
            <li class="">
                <a class="{{($com == 'tin-tuc') ? 'active' : ''}}" href="tin-tuc" title="{{__('web.tintuc')}}">
                    {{__('web.tintuc')}}
                </a>
            </li>

            <li>
                <a class="{{($com == 'tuyen-dung') ? 'active' : ''}}" href="tuyen-dung" title="{{__('web.tuyendung')}}">{{__('web.tuyendung')}}
                </a>
                
            </li>
            
            <li class="">
                <a class="{{($com == 'lien-he') ? 'active' : ''}}" href="lien-he" title="{{__('web.lienhe')}}">
                    {{__('web.lienhe')}}
                </a>
            </li>
            <?php /*
            <div class="search-box">
                <div class="search-btn">
                    <img width="17" height="17" class="lazy" onerror="this.src='thumbs/17x17x1/assets/images/noimage.png';" data-src="assets/images/search.png" alt="">
                </div>
                <div class="search">
                    <input type="text" id="keyword" placeholder="{{__('web.nhaptukhoatimkiem')}}" onkeypress="doEnter(event,'keyword');">
                    <p onclick="onSearch('keyword');" class=''>
                        Tìm kiếm
                    </p>
                </div>
            </div> 
            */ ?>
        </ul>
    </div>
</div>