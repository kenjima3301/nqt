<a href="{{$news['slugvi']}}" class="tintuc-item">
	<div class="tintuc-img scale-img">
		<img class="w-100" width="385" height="285" onerror="this.src='thumbs/385x285x1/assets/images/noimage.png';" src="{{assets_photo('news','385x285x1',$news['photo'],'thumbs')}}" alt="{{ $news['name'.$lang] }}">
	</div>
	<div class="tintuc-txt">
		<div class="tintuc-txt-1 text-split">{{ $news['name'.$lang] }}</div>
		<div class="tintuc-line"></div>
		<div class="tintuc-txt-2 text-split">{{ $news['desc'.$lang] }}</div>
		<div class="tintuc-txt-3">
			<div> 
				<img width="14" height="14" class="" onerror="this.src='thumbs/14x14x1/assets/images/noimage.png';" src="assets/images/date.png" alt=""> 
				Thứ {{ date('w \n\g\à\y d/m/Y',$news['created_date']) }}
			</div> 
			<div> 
				{{ __('web.xemthem') }}
				<img width="22" height="6" class="" onerror="this.src='thumbs/22x6x1/assets/images/noimage.png';" src="assets/images/right-arrow.png" alt=""> 
			</div> 		
		</div>
	</div>
</a>