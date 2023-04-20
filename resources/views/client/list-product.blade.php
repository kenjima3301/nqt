@extends ('client.layouts.master')
@section('title', 'NQT - Sản phẩm')
@section('content')
<div class="container mt-4">
	<div class="row">
    <!-- Left Navbar -->
    <div class="col-lg-3 col-md-4 col-sm-12 bg-white">
      <form>
      <h4 class="text-center mt-4">Tìm Lốp</h4>
      <ul class="list-group mt-3">
        <li class="parent list-group-item" data-toggle="collapse" data-target="#subitem1">Loại xe <i class="arrow float-right fa-light fa-caret-down"></i></li>
        <div id="subitem1" class="collapse">
          <ul class="list-group">
            @foreach($models as $model)
            <li class="list-group-item">{{$model->name}}</li>
            @endforeach
          </ul>
        </div>
        <li class="parent list-group-item" data-toggle="collapse" data-target="#subitem2">Hãng lốp <i class="arrow float-right fa-light fa-caret-down"></i></li>
        <div id="subitem2" class="collapse">
          <ul class="list-group">
            @foreach($brands as $brand)
            <li class="list-group-item">{{$brand->name}}</li>
            @endforeach
          </ul>
        </div>
<!--        <li class="parent list-group-item" data-toggle="collapse" data-target="#subitem3">Mã gai <i class="arrow float-right fa-light fa-caret-down"></i></li>
        <div id="subitem3" class="collapse">
          <select class="list-group" id="selecttyre">
            @foreach($tyres as $tyre)
            <option class="list-group-item">{{$tyre->name}}</option>
            @endforeach
          </select>
        </div>-->
        <li class="parent list-group-item" data-toggle="collapse" data-target="#subitem4">Size <i class="arrow float-right fa-light fa-caret-down"></i></li>
        <div id="subitem4" class="collapse">
          <select class="list-group" id="selecttyresize">
            @foreach($sizes as $size)
            <option class="list-group-item">{{$size->size}}</option>
            @endforeach
          </select>
        </div>
      </ul>
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
                          <p class="card-text">LONGHAUL</p>
                          <img class="card-img-top" src="{{asset('client/assets/img/car.png') }}" alt="Product 1">
                          <div class="sub-desc row mt-3">
                            <div class="col-lg-4">
                              <p>Xe tải</p>
                            </div>
                            <div class="col-lg-4">
                              <p><i class="fa-solid fa-user-group"></i> Trazano</p>
                            </div>
                            <div class="col-lg-4">
                              <p> Steer/Trailler</p>
                            </div>
                          </div>
                          <div class="row mt">
                            <div class="col-lg-6">
                              <p>1.000.000Đ / Lốp 1.500.00Đ</p>
                            </div>
                            <div class="col-lg-6 text-center">
                              <a href="#" class="btn btn-success">Chi tiết</a>
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
<link href="{{asset('assets/css/select2.min.css')}}" rel="stylesheet" />
<script src="{{asset('assets/js/select2.min.js')}}"></script>
<script>
  $(document).ready(function(){
    $(".parent").click(function(){
      $(this).find(".arrow").toggleClass("fa-light fa-caret-down fa-light fa-caret-up");
    });
    $('#selecttyre').select2();
    $('#selecttyresize').select2();
  });
</script>
@endsection