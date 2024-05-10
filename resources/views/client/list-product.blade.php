@extends ('client.layouts.master')
@section('title', 'NQT - Sản phẩm')
@section('content')
<div class="container mt-4">
	<div class="row">
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
              <option value="{{$model->id}}" @if(isset($model_selected) && $model->id == $model_selected) selected @endif>{{$model->name}}</option>
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
              <option value="{{$brand->id}}" @if(isset($brand_selected) && $brand->id == $brand_selected) selected @endif>{{$brand->name}}</option>
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
              <option value="{{$size->size}}" @if(isset($sizeselected) && $size->size == $sizeselected) selected @endif >{{$size->size}}</option>
              @endforeach
            </select>
          </div>
          <div class="col-lg-12 align-items-center">
          <button class="btn btn-success text-center btn-sm btn-block">{{$tim_kiem->name_show()}}</button>
          </div>
        </div>
      </form>
    </div>
        <!-- Right Product List -->
		<div class="col-lg-9 col-md-8 col-sm-12">
            <div class="row mt-3">
              @foreach ($tyres as $tyre)
                <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                    <div class="card booking-card v-2 mt-2 rounded-bottom">
                    <div class="bg-image hover-overlay ripple ripple-surface ripple-surface-light bg-white" data-mdb-ripple-color="light">
                      <a href="{{url('lop-xe-tai/'.$tyre->id)}}">
                      <img class="card-img-top" id="lop-image" src="{{asset($tyre->images[0]->image)}}" alt="{{$tyre->name}}" style="max-height:291px;">
                      </a>
                    </div>
                    <div class="card-body"  style="padding: 0.25rem; min-height: 85px;">
                      <h4 class="card-title m-0" id="ten-lop" @if($tyre->brand->id == 1) style="color: #e69c2f;" @elseif($tyre->brand->id == 3) style="color: #000;" @endif>{{$tyre->brand->name}} {{$tyre->name}}</h4>

                      <span class="card-text">@if(isset($tyre->drive)){{$tyre->drive->name}} @endif</span>
                      <span class="card-text">{{$tyre->model->name}}</span>
                      <span class="card-text">{{$tyre->structure->name ?? ''}}</span>
                      <!--<hr class="my-4">-->
                      <p style="float: right; margin: 0;">{{number_format($tyre->price, 0, '', ',')}}đ / Lốp</p>

                    </div>
                  </div>
                </div>
               @endforeach
            </div>
        </div>
    </div>
</div>
<style>
  #selecttyre {
    width: 100%;
  }
</style>
@endsection
@section('script')
<script>
  $(document).ready(function() {
    $(".js-select2").select2();
  
  });
</script>
<script>
  $(document).ready(function(){
    $(".parent").click(function(){
      $(this).find(".arrow").toggleClass("fa-light fa-caret-down fa-light fa-caret-up");
    });
  });
</script>
@endsection