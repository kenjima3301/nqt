<div class="mmenu-logo">
    <a class="logo-header" href="">
        <img width="185" height="95" class="lazy" onerror="this.src='thumbs/185x95x2/assets/images/noimage.png';" data-src="{{assets_photo('photo','185x95x2',$logoPhoto['photo'],'thumbs')}}" alt="{{$logoPhoto['name'.$lang]}}">
    </a>
    <a class="banner-header" href="">
        <img width="465" height="75" class="lazy" onerror="this.src='thumbs/465x75x2/assets/images/noimage.png';" data-src="{{assets_photo('photo','465x75x2',$bannerPhoto['photo'],'thumbs')}}" alt="{{$bannerPhoto['name'.$lang]}}">
    </a>
</div>
<div class="menu_mobi_add">
    <div class="load-menu"><ul></ul></div>
    <div class="thongtin-mb">
        <ul>
            <li class="w-clear"><i class="fas fa-map-marker-alt"></i><span></span><?=$setting['addressvi']?></li>
            <li class="w-clear"><i class="fas fa-phone-volume"></i><span></span><?=$optSetting['phone']?></li>
            <li class="w-clear"><i class="fas fa-envelope"></i><span></span><?=$optSetting['email']?></li>
            <li class="w-clear"><i class="fas fa-globe"></i><span></span><?=$optSetting['website']?></li>
        </ul>
    </div>
</div>
<div class="menu_mobi">
    <p class="menu_baophu"></p>
    <p class="icon_menu_mobi"><i class="fas fa-bars"></i></p>        
    <?php /*
    <a class="logo-mobi" href="">
        <img src="upload/photo/<?=$logoPhoto->photo?>"
            alt="{{ $setting['name'.$lang] }}">
    </a>
    */ ?>
    <div class="search-res">
        <!-- <p class="icon-search transition"><i class="fa fa-search"></i></p> -->
        <div class="search-grid w-clear">
            <input type="text" id="keyword2" class="search-auto flex-1"
                placeholder="Bạn cần tìm gì ?" onkeypress="doEnter(event,'keyword2');">
            <p class="mb-0" onclick="onSearch('keyword2');"><i class="fal fa-search"></i></p>
        </div>
    </div>
</div>