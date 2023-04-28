@extends ('client.layouts.master')
@section('title', 'NQT - Chi tiết sản phẩm')
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
              <label class="form-check-label" for="inlineCheckbox1"><img src="{{asset('client/assets/img/thailan.jpg') }}" width="15px" alt=""> Thailand ({{$thailand}})</label>
            </div>
            
          </div>
        </div>
      </form>
        </div>

        <!-- Right Product Detail -->
        <div class="col-lg-9 col-md-8 col-sm-12">
            <div class="row mt-4">
                <div class="col-lg-6">
                    <!-- Main product image -->
                    <div class="row">
                        <img src="{{asset($tyre->images[0]->image)}}" width="400px" class="img-fluid mx-auto">
                    </div>
                    <div class="row mt-3">
                      @foreach ($tyre->images as $image)
                        <div class="col-md-3">
                            <img src="{{asset($image->image)}}" class="img-fluid">
                        </div>
                       @endforeach
                    </div>
                </div>
                <div class="col-lg-6 bg-white">
                    <!-- Product name -->
                    <h3 class="card-title mt-3">{{$tyre->name}}</h3>
                    <p class="card-text">{{$tyre->drive->name}}</p>
                    <!-- Product description -->
                    @foreach (json_decode($tyre->tyre_features, true) as $feature)
                    <p><i class="fa-solid fa-circle fa-2xs" style="color:#35A25B;"></i> {{$feature}}</p>
                    @endforeach
                    <div class="row justify-content-center">
                        <div class="col-sm-12">
                            <img src="{{asset($tyre->install_position_image)}}" class="img-fluid">
                        </div>
                        
                    </div>
                    <div class="sub-desc row mt-3">
                        <div class="col-lg-4">
                            <p>{{$tyre->model->name}}</p>
                        </div>
                        <div class="col-lg-4">
                            <p>{{$tyre->brand->name}}</p>
                        </div>
                        <div class="col-lg-4">
                            <p>{{$tyre->tyre_structure}}</p>
                        </div>
                    </div>

                    <div class="row mt">
                        <div class="col-lg-6">
                            <p>1.000.000Đ / Lốp</p>
                            <p>1.500.000</p>
                        </div>
                        <div class="col-lg-6 text-center">
                            <a href="#" class="btn btn-success">Mua hàng</a>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="row mt-3 bg-white ml-2">
                
                    <table class="table-bordered table-responsive text-center">
                        <thead>
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
                        </thead>
                        <tbody>
                            
                              @foreach($tyre_sizes as $size)
                              <tr class="@if(count($size->madeins) == 2){{'bothflag'}}@elseif($size->madeins[0]->country->name == 'Thailand'){{'thai'}}@elseif($size->madeins[0]->country->name == 'China'){{'china'}}@endif">
                                  <td class="text-left">@foreach ($size->madeins as $country) 
                                      @if(count($size->madeins) == 1 && $country->country->name == 'Thailand')
                                        &nbsp;&nbsp;
                                      @endif
                                      <img src="{{asset($country->country->flag)}}" width='10'>
                                      @endforeach
                                  </td>
                                  <td>{{$size->size}}</td>
                                  <td>{{$size->lr_pr}}</td>
                                  <td>{{$size->sevice_index}}</td>
                                  <td>{{$size->tread_depth}}</td>
                                  <td>{{$size->standard_rim}}</td>
                                  <td>{{$size->overall_diameter}}</td>
                                  <td>{{$size->section_width}}</td>
                                  <td>{{$size->single_kg}}</td>
                                  <td>{{$size->single_lbs}}</td>
                                  <td>{{$size->single_kpa}}</td>
                                  <td>{{$size->single_psi}}</td>
                                  <td>{{$size->dual_kg}}</td>
                                  <td>{{$size->dual_lbs}}</td>
                                  <td>{{$size->dual_kpa}}</td>
                                  <td>{{$size->dual_psi}}</td>
                                  </tr>
                              @endforeach
                            
                        </tbody>
                    </table>
                    <div class="col-lg-3">
                        <p><img src="{{asset('client/assets/img/china.jpg') }}" width="15px" alt=""> Made in China</p>
                    </div>
                    <div class="col-lg-3">
                        <p><img src="{{asset('client/assets/img/thailan.jpg') }}" width="15px" alt=""> Made in ThaiLand</p>
                    </div>
                
            </div>

            <h5 class="text-color mt-3 ml-2">Sản phẩm liên quan:</h5>

            <div class="row mt-3">
              @foreach ($relatedtypres as $relatedtypre)
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{$relatedtypre->name}}</h5>
                            <p class="card-text">{{$relatedtypre->drive->name}}</p>
                            <img class="card-img-top" src="{{asset($tyre->images[0]->image)}}" alt="{{$relatedtypre->name}}">
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
                                    <p>1.000.000Đ / Lốp 1.500.00Đ</p>
                                </div>
                                <div class="col-lg-6 text-center">
                                    <a href="{{url('lop-xe-tai/'.$relatedtypre->id)}}" class="btn btn-success">Chi tiết</a>
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
@endsection