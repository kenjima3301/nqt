@extends ('client.layouts.master')
@section('title', 'NQT - Chi tiết sản phẩm')
@section('content')
<link rel="stylesheet" href="{{asset('client/assets/css/lightslider.min.css')}}">
<div class="container mt-4">
	<div class="row ">
         <!-- Left Navbar -->
        <div class="col-lg-3 col-md-4 col-sm-12 bg-white">
      <form method="POST" action="{{url('tim-lop-xe-filter')}}" enctype="multipart/form-data">
      @csrf
      @php
          $tim_kiem = $contents->filter(function($item) {
                                  return $item->key == 'tim_kiem';
                              })->first();
          @endphp
      <h4 class="text-center mt-4">{{$tim_kiem->name_show()}}</h4>
        <div class="row">
          <div class="col-lg-12">
            @php
          $tim_kiem_loai_xe = $contents->filter(function($item) {
                                  return $item->key == 'tim_kiem_loai_xe';
                              })->first();
          @endphp
            <label>{{$tim_kiem_loai_xe->name_show()}}</label>
            <select class="js-select2" name="model">
              @foreach($models as $model)
              <option value="{{$model->id}}">{{$model->name}}</option>
              @endforeach
            </select>
          </div>
          
          <div class="col-lg-12">
            @php
          $tim_kiem_hang = $contents->filter(function($item) {
                                  return $item->key == 'tim_kiem_hang';
                              })->first();
          @endphp
            <label>{{$tim_kiem_hang->name_show()}}</label>
            <select class="js-select2" name="brand">
              @foreach($brands as $brand)
              <option value="{{$brand->id}}">{{$brand->name}}</option>
              @endforeach
            </select>
          </div>

          <div class="col-lg-12">
            @php
          $tim_kiem_size = $contents->filter(function($item) {
                                  return $item->key == 'tim_kiem_size';
                              })->first();
          @endphp
            <label>{{$tim_kiem_size->name_show()}}</label>
            <select class="js-select2" name="size">
              @foreach($sizes as $size)
              <option value="{{$size->size}}">{{$size->size}}</option>
              @endforeach
            </select>
          </div>
          <div class="col-lg-12 align-items-center mb-3">
          <button class="btn btn-success text-center btn-sm btn-block">{{$tim_kiem->name_show()}}</button>
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
        <div class="col-lg-9 col-md-8 col-sm-12" style="background: #fff;">
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
                <div class="col-lg-6 pt-3" style="background: #fff;">
                    <!-- Product name -->
                    <h3 class="card-title mt-3">{{$tyre->brand->name}} {{$tyre->name}}</h3>
                    <p class="card-text">@if(isset($tyre->drive)) {{$tyre->drive->name}} @endif</p>
                    <!-- Product description -->
                    @php 
                    $features = preg_split("/\r\n|\n|\r/", $tyre->tyre_features);
                    @endphp 
                    @foreach($features as $feature)
                      <p><i class="fa-solid fa-circle fa-2xs" style="color:#35A25B;"></i> {{$feature}}</p>
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
                </div>
            </div>
            
            <div class="row" style="background: #ffffff;">
                
                    <table class=" table-responsive text-center">
                      <thead>
                        @php
          $san_pham_tiet_table = $contents->filter(function($item) {
                                  return $item->key == 'san_pham_tiet_table';
                              })->first();
          $table = preg_split("/\r\n|\n|\r/", $san_pham_tiet_table->content_show());
          @endphp
                            <tr>
                              <th rowspan="3" width="3%">{{$table[0]}}</th>
                                <th rowspan="3">{{$table[1]}}</th>
                                <th rowspan="3">{{$table[2]}}</th>
                                <th rowspan="3">{{$table[3]}}</th>
                                <th rowspan="3">{{$table[4]}}</th>
                                <th rowspan="3">{{$table[5]}}</th>
                                <th rowspan="3">{{$table[6]}}</th>
                                <th rowspan="3">{{$table[7]}}</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            
                              @foreach($tyre_sizes as $size)
                              <tr class="@if(isset($size->madeins[0]) && count($size->madeins) == 2){{'bothflag'}}@elseif(isset($size->madeins[0]) && $size->madeins[0]->country->name == 'Thailand'){{'thai'}}@elseif(isset($size->madeins[0]) && $size->madeins[0]->country->name == 'China'){{'china'}}@endif" @if(isset($sizedetail) && $size->id == $sizedetail->id) style="background:#35A25B" @endif>
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
                                  @php
                                  $them_gio_hang = $contents->filter(function($item) {
                                                          return $item->key == 'them_gio_hang';
                                                      })->first();
                                  @endphp
                                  <td><a href="{{ url('client/them-gio-hang/'.$size->id)}}" class="btn btn-success">{{$them_gio_hang->name_show()}}</a>
                                  </td>

                                  </tr>
                              @endforeach
                            
                        </tbody>
                    </table>
                    <div class="col-lg-3">
                        <p><img src="{{asset('client/assets/img/china.jpg') }}" width="15px" alt=""> China</p>
                    </div>
                    <div class="col-lg-3">
                        <p><img src="{{asset('country/flag/1681452454.png') }}" width="15px" alt=""> ThaiLand</p>
                    </div>
                
            </div>
          <style>
            .ratings {
  list-style-type: none;
  margin: 0;
  padding: 0;
  width: 100%;
  direction: rtl;
  text-align: left;
}

.star {
  position: relative;
  line-height: 30px;
  display: inline-block;
  transition: color 0.2s ease;
  color: #ebebeb;
}

.star:before {
  content: '\2605';
  width: 30px;
  height: 30px;
  font-size: 30px;
}

.star:hover,
.star.selected,
.star:hover ~ .star,
.star.selected ~ .star{
  transition: color 0.8s ease;
  color: orange;
}
.checked {
  color: orange;
}
          </style>
          @if(auth()->check() && Auth::user()->hasRole('client'))
          @php
          $viet_danh_gia_san_pham = $contents->filter(function($item) {
                                  return $item->key == 'viet_danh_gia_san_pham';
                              })->first();
          @endphp
              <div class="row ml-1">
                <h5 class="text-color" style="padding: 10px;color: #000;">{{$viet_danh_gia_san_pham->name_show()}}</h5>
                <ul class="ratings">
                  <li class="star" data-id="5"></li>
                  <li class="star" data-id="4"></li>
                  <li class="star" data-id="3"></li>
                  <li class="star" data-id="2"></li>
                  <li class="star" data-id="1"></li>
                </ul>
                <form method="POST" action="{{url('client/danh-gia-add')}}" class="d-flex flex-column align-items-center" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="vote" id="vote">
                <input type="hidden" name="tyre_id" value="{{$tyre->id}}">
                <textarea name="comment" rows="4" cols="100"></textarea>
                @if($errors->any())
                <div class="text-danger">
                  @php
                  $viet_danh_gia_san_pham_canh_bao = $contents->filter(function($item) {
                                  return $item->key == 'viet_danh_gia_san_pham_canh_bao';
                              })->first();
                  @endphp
                 {{$viet_danh_gia_san_pham_canh_bao->name_show()}}
                </div>
                @endif
                 @php
                  $viet_danh_gia_san_pham_button = $contents->filter(function($item) {
                                  return $item->key == 'viet_danh_gia_san_pham_button';
                              })->first();
                  @endphp
          
                <button type="submit" class="btn bg-gradient-primary mt-3">{{$viet_danh_gia_san_pham_button->name_show()}}</button>
                </form>
              </div>
          @endif
          @if(count($tyre->reviews) > 0)
          @php
          $danh_gia_cua_khach_hang = $contents->filter(function($item) {
                                  return $item->key == 'danh_gia_cua_khach_hang';
                              })->first();
          @endphp
          <!--<h5 class="text-color" style="color: #000;">{{$danh_gia_cua_khach_hang->name_show()}}</h5>-->
          <table class="table data-table table-striped mt-4">
            <thead>
              <tr>
                <th>{{$danh_gia_cua_khach_hang->name_show()}}</th>
              </tr>
          </thead>
             <tbody>
            @foreach($tyre->reviews as $review)
            <tr>
              <td>
             <div class="row p-2 ml-1">
                  <ul class="ratings">
                    <li class="fa fa-star w3-large @if($review->vote >= 5 ) checked @endif"></li>
                    <li class="fa fa-star w3-large @if($review->vote >= 4 ) checked @endif"></li>
                    <li class="fa fa-star w3-large @if($review->vote >= 3 ) checked @endif"></li>
                    <li class="fa fa-star w3-large @if($review->vote >= 2 ) checked @endif"></li>
                    <li class="fa fa-star w3-large @if($review->vote >= 1 ) checked @endif"></li>
                  </ul>
                  <p>{{$review->comment}}</p>
                </div>
              </td>
          </tr>
            @endforeach
          </tbody>
          </table>
          @endif
            @if(count($relatedtypres)> 0)
            @php
          $san_pham_cung_loai = $contents->filter(function($item) {
                                  return $item->key == 'san_pham_cung_loai';
                              })->first();
          @endphp
            <h5 class="text-color mt-3 " style="padding: 10px;color: #000;">{{$san_pham_cung_loai->name_show()}}</h5>
            @endif
            <div class="row mt-3">
              @foreach ($relatedtypres as $relatedtypre)
                <div class="col-lg-4">
                  <div class="card booking-card v-2 mt-2 rounded-bottom">
      <div class="bg-image hover-overlay ripple ripple-surface ripple-surface-light bg-white" data-mdb-ripple-color="light">
        <a href="{{url('lop-xe-tai/'.$relatedtypre->id)}}">
        <img class="card-img-top" id="lop-image" src="{{asset($relatedtypre->images[0]->image)}}" alt="{{$relatedtypre->name}}" style="max-height:291px;">
        </a>
      </div>
      <div class="card-body" style="padding-bottom: 0"  style="padding: 0.25rem; min-height: 85px;">
        <h4 class="card-title m-0" id="ten-lop" @if($relatedtypre->brand->id == 1) style="color: #e69c2f;" @elseif($relatedtypre->brand->id == 3) style="color: #000;" @endif>{{$relatedtypre->brand->name}} {{$relatedtypre->name}}</h4>

        <span class="card-text">@if(isset($relatedtypre->drive)){{$relatedtypre->drive->name}} @endif</span>
        <span class="card-text">{{$relatedtypre->model->name}}</span>
        <span class="card-text">{{$relatedtypre->structure->name ?? ''}}</span>
        <!--<hr class="my-4">-->
        <p style="float: right;margin: 0;">{{number_format($relatedtypre->price, 0, '', ',')}}đ / Lốp</p>

      </div>
    </div>
                </div>
              @endforeach
            </div>

        </div>
    </div>
</div>
<style>
  #DataTables_Table_0_length {
    display: none;
  }
  
  #DataTables_Table_0_paginate {
    float: right;
  }
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
  $(function (){
  var star = '.star',
      selected = '.selected';
  
  $(star).on('click', function(){
    $(selected).each(function(){
      $(this).removeClass('selected');
    });
    $(this).addClass('selected');
    var value = $(this).attr("data-id");
    $('#vote').val(value);
  });
 
});
</script>
<script src="{{asset('client/assets/js/jquery360.js')}}"></script>
<script src="https://sachinchoolur.github.io/lightslider/src/js/lightslider.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
//        window.prettyPrint && prettyPrint()
        $('#lightSlider').lightSlider({
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
        prevHtml: '<div class="lg-prev lg-icon"><i class="fa fa-chevron-left"></i></div>',
        nextHtml: '<div class="lg-prev lg-icon"><i class="fa fa-chevron-right"></i></div>',
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
        onBeforeStart: function (el) {
          
        },
        onSliderLoad: function (el) {
           
        },
        onBeforeSlide: function (el) {
          if ( $( ".lSAction" ).length ) {   
             
           }else {
              location.reload();
           }
        },
        onAfterSlide: function (el) {
          
        },
        onBeforeNextSlide: function (el) {},
        onBeforePrevSlide: function (el) {}     
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

<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $('.data-table').dataTable({
            "paging": true,
            "pageLength": 10,
            "searching": false,
            "ordering": false,
            "info": false,
            "autoWidth": false,
        });
    });
</script>

@endsection