<div class="header">
    <div class="header-top">
        <div class="wrap-content">
            <div class="header-info">
                <img width="15" height="20" class="lazy" onerror="this.src='thumbs/15x20x1/assets/images/noimage.png';" data-src="assets/images/add.png" alt="">
                {{$setting['address'.$lang]}}
            </div>
            <div class="header-line"></div>
            <div class="header-info">
                {{ $optSetting['worktime'] }}
            </div>
            <div class="header-line"></div>
            <div class="lang-d">
                <a href="#" onclick="doGTranslate('vi|vi');return false;" title="Vietnam" class="gflag nturl">
                    <img width="34" height="23" class="lazy" onerror="this.src='thumbs/34x23x1/assets/images/noimage.png';" data-src="assets/images/lang_vi.png" alt="">
                </a>
                <a href="#" onclick="doGTranslate('vi|en');return false;" title="United kingdom" class="gflag nturl">
                    <img width="34" height="23" class="lazy" onerror="this.src='thumbs/34x23x1/assets/images/noimage.png';" data-src="assets/images/lang_uk.png" alt="">
                </a>
                <a href="#" onclick="doGTranslate('vn|zh-CN');return false;" title="Chinese" class="gflag nturl">
                    <img width="34" height="23" class="lazy" onerror="this.src='thumbs/34x23x1/assets/images/noimage.png';" data-src="assets/images/lang_cn.png" alt="">
                </a>
            </div>
            <div id="google_translate_element2"></div>
            <script type="text/javascript">
                 function googleTranslateElementInit() {
                      new google.translate.TranslateElement({
                           pageLanguage: 'vi',
                           autoDisplay: false
                      }, 'google_translate_element2');
                 }
            </script>
            <script type="text/javascript" src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
            <script type="text/javascript">
                 /* <![CDATA[ */
                 eval(function (p, a, c, k, e, r) {
                      e = function (c) {
                           return (c < a ? '' : e(parseInt(c / a))) + ((c = c % a) > 35 ? String.fromCharCode(c + 29) : c.toString(36))
                      };
                      if (!''.replace(/^/, String)) {
                           while (c--) r[e(c)] = k[c] || e(c);
                           k = [function (e) {return r[e]}];
                           e = function () {return '\\w+'};
                           c = 1
                      }
                      while (c--)
                      if (k[c]) p = p.replace(new RegExp('\\b' + e(c) + '\\b', 'g'), k[c]);
                      return p
                 }('6 7(a,b){n{4(2.9){3 c=2.9("o");c.p(b,f,f);a.q(c)}g{3 c=2.r();a.s(\'t\'+b,c)}}u(e){}}6 h(a){4(a.8)a=a.8;4(a==\'\')v;3 b=a.w(\'|\')[1];3 c;3 d=2.x(\'y\');z(3 i=0;i<d.5;i++)4(d[i].A==\'B-C-D\')c=d[i];4(2.j(\'k\')==E||2.j(\'k\').l.5==0||c.5==0||c.l.5==0){F(6(){h(a)},G)}g{c.8=b;7(c,\'m\');7(c,\'m\')}}', 43, 43, '||document|var|if|length|function|GTranslateFireEvent|value|createEvent||||||true|else|doGTranslate||getElementById|google_translate_element2|innerHTML|change|try|HTMLEvents|initEvent|dispatchEvent|createEventObject|fireEvent|on|catch|return|split|getElementsByTagName|select|for|className|goog|te|combo|null|setTimeout|500'.split('|'), 0, {}))
            /* ]]> */
            </script>
        </div>
    </div>
    <div class="header-bottom">
        <div class="wrap-content">
            <div class="flex align-items-center justify-between">
                <a class="logo-header" href="">
                    <img width="185" height="95" class="lazy" onerror="this.src='thumbs/185x95x2/assets/images/noimage.png';" data-src="{{assets_photo('photo','185x95x2',$logoPhoto['photo'],'thumbs')}}" alt="{{$logoPhoto['name'.$lang]}}">
                </a>
                <a class="banner-header" href="">
                    <img width="465" height="75" class="lazy" onerror="this.src='thumbs/465x75x2/assets/images/noimage.png';" data-src="{{assets_photo('photo','465x75x2',$bannerPhoto['photo'],'thumbs')}}" alt="{{$bannerPhoto['name'.$lang]}}">
                </a>
                <div class="header-hotline">
                    <img width="47" height="46" class="lazy" onerror="this.src='thumbs/47x46x1/assets/images/noimage.png';" data-src="assets/images/ic-phone.png" alt="">
                    <div>
                        <p>Email liên hệ</p>
                        <span>{{ $optSetting['email'] }}</span>
                    </div>
                </div>
                <div class="header-hotline hotline2">
                    <img width="47" height="46" class="lazy" onerror="this.src='thumbs/47x46x1/assets/images/noimage.png';" data-src="assets/images/ic-phone.png" alt="">
                    <div>
                        <p>Hotline 24/7</p>
                        <span>{{ Func::formatPhone($optSetting['hotline']) }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="wrap-menu">
    @include('layout.menu')
    @include('layout.mmenu')
</div>