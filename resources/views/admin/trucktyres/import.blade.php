<x-layout bodyClass="g-sidenav-show  bg-gray-200">
  <x-navbars.sidebar activePage='lop-xe-tai'></x-navbars.sidebar>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <x-navbars.navs.auth titlePage="Import Sai"></x-navbars.navs.auth>
    <div class="container-fluid py-4">
      <div class="row mt-4">
        <div class="col-lg-7">
          <div class="card bg-gradient-white">
            <h4 class="col-4 opacity-9 text-start text-dark">{{$tyre->name}}</h4>
            <div class="card-body px-5 z-index-1 bg-cover overflow-hidden pb-2">
              <div class="row">
                <div class="col-12 text-center">
                  <div class="row">
                    <div class="col-lg-6 col-12">
                      <h4 class="text-dark opacity-9">Benefits and Features
                      </h4>
                      <hr class="horizontal light mt-1 mb-3">
                      <div class="col-12">
                        @php 
                        $features = preg_split("/\r\n|\n|\r/", $tyre->tyre_features);
                        @endphp 
                        @foreach($features as $feature)
                        <p>{{$feature}}</p>
                        @endforeach
                      </div>
                    </div>

                    <div class="col-lg-6 col-12">
                      <div>
                        <h6 class="mb-0 text-dark">@if(isset($tyre->drive)){{$tyre->drive->name}} @endif</h6>
                        <h6 class="mb-0 text-dark">{{$tyre->structure->name ?? ''}}</h6>
                      </div>
                      <hr class="horizontal light mt-1 mb-3">
                      <div class="d-flex justify-content-center">
                        <div>
                          @if($tyre->install_position_image != null)
                          <h6 class="mb-0"><img src="{{asset($tyre->install_position_image)}}" width="300"></h6>
                          @endif
                        </div>
                      </div>
                      <div class="d-flex justify-content-center">
                        <div>
                          @foreach ($tyre->images as $image)
                          <img style="max-width: 300px;" src="{{asset($image->image)}}" alt="car image">
                          @endforeach
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-5">
          <div class="row">
            <div class="col-12">
              <div class="card bg-gradient-primary mb-4 mt-4 mt-lg-0">
                <div class="card-body p-3">
                  <div class="row">
                    <div class="col-4 my-auto">
                      <div class="numbers">
                        <p class="text-white text-sm mb-0 text-capitalize font-weight-bold opacity-7">
                          Import sai</p>

                      </div>
                    </div>
                    <div class="col-8 text-end">
                      <a class="btn bg-gradient-dark mb-2 me-4" href="{{url('admin/lop-xe-tai-import-download')}}"><i class="fa fa-download" aria-hidden="true"></i>
                    Tải mẫu import</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-12 col-md-12 col-12 mt-2">
              <div class="card">
                <div class="card-body p-3 pt-2">
                  <form method="POST" action="{{url('admin/lop-xe-tai-import/'.$tyre->id)}}" class="d-flex flex-column align-items-center" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group col-12 col-md-6">
                      <label for="exampleInputname">Import size </label>
                      <input type="file" name="importfile" class="form-control">
                    </div>
                    <button type="submit" class="btn bg-gradient-primary mt-3">Import</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
      <div class="container-fluid py-4">
      <div class='row col-12'>
        <div class="card">
  <div class="table-responsive text-nowrap">
    <table class="table" style='font-weight:200; line-height:0.85'>
      <thead>
        <tr>
          <th class="text-xxs text-center" width="2%">Nước sản xuất</th>
          <th class="text-xxs text-center"  width="2%">Quy cách</th>
          <th class="text-xxs text-center">Lớp bố</th>
          <th class="text-xxs text-center">Chỉ số tải trọng và tốc độ</th>
          <th class="text-xxs text-center">Đơn vị</th>
          <th class="text-xxs text-center">Kiểu gai</th>
          <th class="text-xxs text-center">Lượt xem</th>
          <th class="text-xxs text-center">Số lượng</th>
          <th class="text-xxs text-center">Đơn giá</th>
          <th class="text-xxs text-center"></th>
        </tr>
      </thead>
      <tbody>
        @foreach($tyre_dimentions as $dimention)
        <tr>
          <td class='p-0'>
            @foreach ($dimention->madeins as $country) 
            @if(count($dimention->madeins) ==1 && $country->country->name == 'Thailand')
              &nbsp;&nbsp;
            @endif
            <img src="{{asset($country->country->flag)}}" width='10'>
            @endforeach
          </td>
          <td class=" text-center text-sm"><a href="{{url('admin/quy-cach-chi-tiet/'.$dimention->id)}}"> {{$dimention->size}} </a></td>
          <td class=" text-center text-sm"> {{$dimention->ply}} </td>
          <td class=" text-center text-sm"> {{$dimention->sevice_index}} </td>
          <td class=" text-center text-sm"> {{$dimention->unit}} </td>
          
          <td class=" text-center text-sm"> {{$dimention->tread_type}} </td>
          <td class=" text-center text-sm"> {{$dimention->views}} </td>
          <td class=" text-center text-sm"> {{$dimention->total}} </td>
          <td class=" text-center text-sm"> {{$dimention->price}} </td>
          <td><a class="btn mb-2 me-4 conten-right" href="{{url('admin/xoa-sai-trong-ma-gai/'.$dimention->id)}}">Xóa</a></td>
        </tr>
        @endforeach
       <form action="{{url('admin/lop-xe-tai-quy-cach-add-new')}}" method="POST">
        @csrf
        <input type="hidden" name="tyre_id" value="{{$tyre->id}}">
        <tr>
          <td>
            <select name="country_id[]" id="select_country_id" class="form-control select last_valid_selection" multiple="multiple" >
              @foreach ($countries as $country)
              <option value="{{$country->id}}"> {{$country->name}}</option>
              @endforeach
            </select>
          </td>
          <td><input type="text" name="size" value="" size="10"></td>
          <td > <input type="text" name="ply" value="" size="10"> </td>
          <td> <input type="text" name="sevice_index" value="" size="10"></td>
          <td> <input type="text" name="unit" value="" size="10"> </td>
          <td>  <input type="text" name="tread_type" value="" size="10"> </td>
          <td>  <input type="number" name="total" value="" style="width: 100px;"> </td>
          <td >  <input type="text" name="price" value="" size="10"> </td>
          <td><input type="submit" value="Thêm quy cách"></td>
        </tr>
      </form>
      </tbody>
    </table>
  </div>
</div>
<!--        
      </div>
        <a class="btn mb-2 me-4 conten-right" href="{{url('admin/xoa-sai-trong-ma-gai/'.$tyre->id)}}">
                    Xóa toàn bộ Sai</a>
    </div>-->
  </main>
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">

  @push('js')
  <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $('#select_country_id').selectpicker();
    });
</script>
@endpush
</x-layout>
