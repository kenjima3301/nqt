@extends ('client.layouts.master')
@section('title', 'NQT - Sản phẩm')
@section('content')
<div class="container mt-4">
	<div class="row">
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
              <option value="{{$model->id}}" @if(isset($model_selected) && $model->id == $model_selected) selected @endif>{{$model->name}}</option>
              @endforeach
            </select>
          </div>
          
          <div class="col-lg-12">
            <label>Hãng lốp</label>
            <select class="js-select2" name="brand">
              @foreach($brands as $brand)
              <option value="{{$brand->id}}" @if(isset($brand_selected) && $brand->id == $brand_selected) selected @endif>{{$brand->name}}</option>
              @endforeach
            </select>
          </div>

          <div class="col-lg-12">
            <label>Size lốp</label>
            <select class="js-select2" name="size">
              @foreach($sizes as $size)
              <option value="{{$size->size}}" @if(isset($sizeselected) && $size->size == $sizeselected) selected @endif >{{$size->size}}</option>
              @endforeach
            </select>
          </div>
          <div class="col-lg-12 align-items-center">
          <button class="btn btn-success text-center btn-sm btn-block">Tìm</button>
          </div>
        </div>
      </form>
    </div>
        <!-- Right Product List -->
		<div class="col-lg-9 col-md-8 col-sm-12">
            <div class="row mt-3">
              @foreach ($tyres as $tyre)
                <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                    <div class="card">
                        <div class="card-body">
                          <h5 class="card-title">{{$tyre->name}}</h5>
                          <p class="card-text">{{$tyre->drive->name}}</p>
                          <img class="card-img-top" src="{{asset($tyre->images[0]->image)}}" alt="{{$tyre->drive->name}}">
                          <div class="sub-desc row mt-3">
                            <div class="col-lg-3">
                              <p>{{$tyre->model->name}}</p>
                            </div>
                            <div class="col-lg-3">
                              <p>{{$tyre->brand->name}}</p>
                            </div>
                            <div class="col-lg-6">
                              <p> {{$tyre->tyre_structure}}</p>
                            </div>
                          </div>
                          <div class="row mt">
                            <div class="col-lg-6">
                              <p>{{number_format($tyre->price, 0, '', ',')}}đ / Lốp</p>
                            </div>
                            <div class="col-lg-6 text-center">
                              <a href="{{url('lop-xe-tai/'.$tyre->id)}}" class="btn btn-success">Chi tiết</a>
                            </div>
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