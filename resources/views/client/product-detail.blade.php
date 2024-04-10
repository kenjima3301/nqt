@extends ('client.layouts.master')
@section('title', 'NQT - Chi tiết sản phẩm')
@section('content')
<link rel="stylesheet" href="https://sachinchoolur.github.io/lightslider/dist/css/lightslider.min.css">
<div class="container mt-4">
	<div class="row ">
         <!-- Left Navbar -->
        <div class="col-lg-3 col-md-4 col-sm-12 bg-white">
      <form method="POST" action="{{url('tim-lop-xe-filter')}}" enctype="multipart/form-data">
      @csrf
      <h4 class="text-center mt-4">Tìm Lốp</h4>
        <div class="row">
          <div class="col-lg-12">
            <label>Loại xe</label>
            <select class="js-select2" name="model">
              @foreach($models as $model)
              <option value="{{$model->id}}">{{$model->name}}</option>
              @endforeach
            </select>
          </div>
          
          <div class="col-lg-12">
            <label>Hãng lốp</label>
            <select class="js-select2" name="brand">
              @foreach($brands as $brand)
              <option value="{{$brand->id}}">{{$brand->name}}</option>
              @endforeach
            </select>
          </div>

          <div class="col-lg-12">
            <label>Size lốp</label>
            <select class="js-select2" name="size">
              @foreach($sizes as $size)
              <option value="{{$size->size}}">{{$size->size}}</option>
              @endforeach
            </select>
          </div>
          <div class="col-lg-12 align-items-center mb-3">
          <button class="btn btn-success text-center btn-sm btn-block">Tìm</button>
          </div>
          <div class="col-lg-12">
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="checkbox" id="chinacheck" value="option2" checked="checked">
              <label class="form-check-label" for="inlineCheckbox2"><img src="{{asset('client/assets/img/china.jpg') }}" width="15px" alt=""> China ({{$china}})</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="checkbox" id="thailandcheck" value="option1" checked="checked">
              <label class="form-check-label" for="inlineCheckbox1"><img src="{{asset('country/flag/1681452454.png') }}" width="15px" alt=""> Thailand ({{$thailand}})</label>
            </div>
            
          </div>
        </div>
      </form>
        </div>

        <!-- Right Product Detail -->
        <div class="col-lg-9 col-md-8 col-sm-12" style="background: #f7931d;">
            <div class="row">
                <div class="col-lg-6  mt-4 text-center" >
                    <!-- Main product image -->
                    <!--<div class="row">-->
                          <ul id="lightSlider" class="text-center">
                            @foreach($tyre_sizes as $sizeimage)
                            @if(isset($sizedetail))
                              @php 
                                if($sizeimage->id != $sizedetail->id){
                                    continue;
                                }
                              @endphp
                            @endif
                              @foreach ($sizeimage->images as $image)
                                  <li data-thumb="{{asset($image->image)}}" class="text-center">
                                    <img class="mx-auto d-block" id="myImg{{$image->id}}" src="{{asset($image->image)}}" style="display: block;
                                        max-height: 300px;
                                        max-width: 100%;">
                                  </li>
                              @endforeach
                            @endforeach
                          </ul>                  
                    <!--</div>-->
                    <div class="mt-2 mb-1">
                      @foreach($tyre_sizes as $size)
                      <a class="p-1 " @if(isset($sizedetail) && $size->id == $sizedetail->id) style="background:#ffffff" else style="background:#ffffff" @endif href="{{url('lop-xe-tai/'.$tyre->id.'/'.$size->id)}}">{{$size->size}}</a>
                      @endforeach
                    </div>
                </div>
                <div class="col-lg-6 pt-3" style="background: #f7931d;">
                    <!-- Product name -->
                    <h3 class="card-title mt-3">{{$tyre->name}}</h3>
                    <p class="card-text text-white">@if(isset($tyre->drive)) {{$tyre->drive->name}} @endif</p>
                    <!-- Product description -->
                    @foreach (json_decode($tyre->tyre_features, true) as $feature)
                    @if($feature != null)
                    <p><i class="fa-solid fa-circle fa-2xs" style="color:#35A25B;"></i> {{$feature}}</p>
                    @endif
                    @endforeach
                    <div class="row justify-content-center">
                      @if($tyre->install_position_image != null)
                        <div class="col-sm-12">
                            <img src="{{asset($tyre->install_position_image)}}" style="max-width: 250px;">
                        </div>
                        @endif
                    </div>
                    <div class="sub-desc row mt-3 text-white">
                        <div class="col-lg-4 ">
                            <p>{{$tyre->model->name}}</p>
                        </div>
                        <div class="col-lg-4">
                            <p>{{$tyre->brand->name}}</p>
                        </div>
                        <div class="col-lg-4">
                            <p>{{$tyre->tyre_structure}}</p>
                        </div>
                    </div>

<!--                    <div class="row mt">
                        <div class="col-lg-4">
                            <p>{{number_format($tyre->price, 0, '', ',')}}đ / Lốp</p>
                        </div>
                        <div class="col-lg-8 text-right">
                            <a href="{{url('lien-he')}}" class="btn btn-success">Liên hệ</a>
                        </div>
                    </div>-->
                </div>
            </div>
            
            <div class="row" style="background: #ffffff;">
                
                    <table class=" table-responsive text-center">
<!--                        <thead>
                            <tr>
                              <th rowspan="3" width="3%"></th>
                                <th rowspan="3">Size</th>
                                <th rowspan="3">LR / PR</th>
                                <th rowspan="3">Service index</th>
                                <th rowspan="3">Tread Depth<br/> (mm)</th>
                                <th rowspan="3">Standard Rim</th>
                                <th rowspan="3">Overall Diameter<br/> (mm)</th>
                                <th rowspan="3">Section Width<br/> (mm)</th>
                                <th colspan="8">Max. Load Capacity at Cold Inflation Pressure</th>
                            </tr>
                            <tr>
                                <th colspan="4">Single</th>
                                <th colspan="4">Dual</th>
                            </tr>
                            <tr>
                                <th>(kg)</th>
                                <th>(lbs)</th>
                                <th>(kPa)</th>
                                <th>(psi)</th>
                                <th>(kg)</th>
                                <th>(lbs)</th>
                                <th>(kPa)</th>
                                <th>(psi)</th>
                            </tr>
                        </thead>-->
                      <thead>
                            <tr>
                              <th rowspan="3" width="3%">Nước sản xuất</th>
                                <th rowspan="3">Quy cách</th>
                                <th rowspan="3">Lớp bố</th>
                                <th rowspan="3">Chỉ số tải trọng và tốc độ</th>
                                <th rowspan="3">Đơn vị</th>
                                <th rowspan="3">Kiểu gai</th>
                                <th rowspan="3">Số lượng</th>
                                <th rowspan="3">Đơn giá</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            
                              @foreach($tyre_sizes as $size)
                              <tr class="@if(isset($size->madeins[0]) && count($size->madeins) == 2){{'bothflag'}}@elseif(isset($size->madeins[0]) && $size->madeins[0]->country->name == 'Thailand'){{'thai'}}@elseif(isset($size->madeins[0]) && $size->madeins[0]->country->name == 'China'){{'china'}}@endif" @if(isset($sizedetail) && $size->id == $sizedetail->id) style="background:#f7931d" @endif>
                                  <td class="text-left">@foreach ($size->madeins as $country) 
                                      @if(count($size->madeins) == 1 && $country->country->name == 'Thailand')
                                        &nbsp;&nbsp;
                                      @endif
                                      <img src="{{asset($country->country->flag)}}" width='10'>
                                      @endforeach
                                  </td>
                                  <td>{{$size->size}}</td>
                                  <td>{{$size->ply}}</td>
                                  <td>{{$size->sevice_index}}</td>
                                  <td>{{$size->unit}}</td>
                                  <td>{{$size->tread_type}}</td>
                                  <td>{{$size->total}}</td>
                                  <td>@if(isset($size->promotion))
                                      {{number_format(intval($size->promotion->promotion_price), 0, '', ',')}}đ <span style="text-decoration-line: line-through; color:red">{{number_format(intval($size->price), 0, '', ',')}}đ</span>
                                      @else 
                                      {{number_format(intval($size->price), 0, '', ',')}}đ 
                                      @endif
                                    / {{$size->unit}}</td>
                                  <td><a href="{{ url('client/them-gio-hang/'.$size->id)}}" class="btn btn-success">Thêm vào giỏ hàng</a>
                                  </td>

                                  </tr>
                              @endforeach
                            
                        </tbody>
                    </table>
                    <div class="col-lg-3">
                        <p><img src="{{asset('client/assets/img/china.jpg') }}" width="15px" alt=""> Made in China</p>
                    </div>
                    <div class="col-lg-3">
                        <p><img src="{{asset('country/flag/1681452454.png') }}" width="15px" alt=""> Made in ThaiLand</p>
                    </div>
                
            </div>
            @if(count($relatedtypres)> 0)
            <h5 class="text-color mt-3 " style="padding: 10px;color: #000;">Sản phẩm liên quan:</h5>
            @endif
            <div class="row mt-3">
              @foreach ($relatedtypres as $relatedtypre)
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{$relatedtypre->name}}</h5>
                            <p class="card-text">@if(isset($relatedtypre->drive)) {{$relatedtypre->drive->name}} @endif</p>
                            <a href="{{url('lop-xe-tai/'.$relatedtypre->id)}}" >
                            <img class="card-img-top" style="@if(isset($relatedtypre->backgroundimage)) background: url('{{asset($relatedtypre->backgroundimage->image)}}'); background-size:100% 100%;@endif max-height: 256px;"  src="{{asset($relatedtypre->images[0]->image)}}" alt="{{$relatedtypre->name}}">
                            </a>
                            <div class="sub-desc row mt-3">
                                <div class="col-lg-4">
                                    <p>{{$relatedtypre->model->name}}</p>
                                </div>
                                <div class="col-lg-4">
                                    <p>{{$relatedtypre->brand->name}}</p>
                                </div>
                                <div class="col-lg-4">
                                    <p>{{$relatedtypre->tyre_structure}}</p>
                                </div>
                            </div>
                            <div class="row mt">
                                <div class="col-lg-6">
                                    <p> @if(isset($relatedtypre->promotion))
                                      {{number_format($promotion->promotion_price, 0, '', ',')}}đ <span style="text-decoration-line: line-through; color:red">{{number_format($promotion->tyre->price, 0, '', ',')}}đ</span>
                                      @else 
                                      {{number_format($relatedtypre->price, 0, '', ',')}}đ 
                                      @endif
                                      / Lốp
                                    </p>
                                </div>
<!--                                <div class="col-lg-6 text-center">
                                    <a class="btn btn-success">Chi tiết</a>
                                </div>-->
                            </div>
                        </div>
                    </div>
                </div>
              @endforeach
            </div>

        </div>
    </div>
</div>
<style>
#myImg:hover {opacity: 0.7;}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 100; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
}

/* Modal Content (image) */
.modal-content {
  margin: auto;
  display: block;
  width: 100%;
  max-width: 800px;
}

/* Caption of Modal Image */
#caption {
  margin: auto;
  display: block;
  width: 80%;
  max-width: 700px;
  text-align: center;
  color: #ccc;
  padding: 10px 0;
  height: 150px;
}

/* Add Animation */
.modal-content, #caption {  
  -webkit-animation-name: zoom;
  -webkit-animation-duration: 0.6s;
  animation-name: zoom;
  animation-duration: 0.6s;
}

@-webkit-keyframes zoom {
  from {-webkit-transform:scale(0)} 
  to {-webkit-transform:scale(1)}
}

@keyframes zoom {
  from {transform:scale(0)} 
  to {transform:scale(1)}
}

/* The Close Button */
.close {
  position: absolute;
  top: 15px;
  right: 35px;
  color: #f1f1f1;
  font-size: 40px;
  font-weight: bold;
  transition: 0.3s;
}

.close:hover,
.close:focus {
  color: #bbb;
  text-decoration: none;
  cursor: pointer;
}

/* 100% Image Width on Smaller Screens */
@media only screen and (max-width: 700px){
  .modal-content {
    width: 100%;
  }
}
.lSSlideOuter .lSPager.lSGallery img{
  max-width: 50px;
  max-height: 50px;
}
.thumbSelected{
    border:4px solid red;
 }
 .lSGallery li img {
   width: 50px !important;
   height: 50px !important;
 }
</style>
<div id="myModal" class="modal">
  <span class="close">&times;</span>
  <img class="modal-content" id="img01">
  <div id="caption"></div>
</div>

@endsection
@section('script')
<script>
  $(document).ready(function() {
    $(".js-select2").select2();
    $("#chinacheck").change(function() {
        if($(this).prop('checked')) {
            $(".china").show();  // checked
            $(".bothflag").show();  
            if($('#thailandcheck').is(":checked")){
              $(".thai").show();  
            }else {
              $(".thai").hide();  
            }
          }
        else{
            $(".china").hide();  // checked
            if($('#thailandcheck').is(":checked")){
               $(".bothflag").show();  
                $(".thai").show(); 
            }else {
               $(".bothflag").hide();  
                $(".thai").hide(); 
            }
          }
    });
    $("#thailandcheck").change(function() {
        if($(this).prop('checked')) {
            $(".bothflag").show();  
            $(".thai").show();  
            if($('#chinacheck').is(":checked")){
               $(".china").show();  // checked
            }else {
               $(".china").hide();  // checked
            }
          }
        else{
            if($('#chinacheck').is(":checked")){
              $(".china").show();  // checked
              $(".bothflag").show();
            }else {
               $(".china").hide();  // checked
               $(".bothflag").hide();
            }
            $(".thai").hide(); 
          }
    });
  });
</script>
<script>
  $(document).ready(function(){
    $(".parent").click(function(){
      $(this).find(".arrow").toggleClass("fa-light fa-caret-down fa-light fa-caret-up");
    });
  });
</script>
<script src="{{asset('client/assets/js/jquery360.js')}}"></script>
<!--<link type="text/css" rel="stylesheet" href=https://sachinchoolur.github.io/lightslider/dist/css/lightslider.min.css" />-->                  
<!--<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>-->
<script src="https://sachinchoolur.github.io/lightslider/src/js/lightslider.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        window.prettyPrint && prettyPrint()
        var slider = $('#lightSlider').lightSlider({
            gallery:true,
            item:1,
            thumbItem:9,
            slideMargin: 0,
            speed:900,
            auto:true,
            loop:true,
            pauseOnHover: true,
        slideEndAnimation: true,
        pause: 2000,
        keyPress: false,
        controls: true,
        prevHtml: '',
        nextHtml: '',
        rtl: false,
        adaptiveHeight: false,
        vertical: false,
        verticalHeight: 400,
        vThumbWidth: 100,
        pager: true,
        galleryMargin: 5,
        thumbMargin: 5,
        currentPagerPosition: 'middle',
        enableTouch: true,
        enableDrag: true,
        freeMove: true,
        swipeThreshold: 40,
        responsive: [],
            onSliderLoad: function() {
                $('#lightSlider').removeClass('cS-hidden');
            }     
        });
    });

</script>
<script>
// Get the modal
@foreach($tyre_sizes as $sizeimage)
@if(isset($sizedetail))
                              @php 
                                if($sizeimage->id != $sizedetail->id){
                                    continue;
                                }
                              @endphp
                            @endif
  @foreach ($sizeimage->images as $image)
var modal{{$image->id}} = document.getElementById("myModal");

// Get the image and insert it inside the modal - use its "alt" text as a caption

var img{{$image->id}} = document.getElementById("myImg{{$image->id}}");
var modalImg{{$image->id}} = document.getElementById("img01");
var captionText{{$image->id}} = document.getElementById("caption");
img{{$image->id}}.onclick = function(){
  modal{{$image->id}}.style.display = "block";
  modalImg{{$image->id}}.src = this.src;
  captionText{{$image->id}}.innerHTML = this.alt;
}

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function() { 
  modal{{$image->id}}.style.display = "none";
}
@endforeach
@endforeach
</script>
@endsection