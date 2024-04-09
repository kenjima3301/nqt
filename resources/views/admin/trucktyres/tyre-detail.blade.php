<x-layout bodyClass="g-sidenav-show  bg-gray-200">
  <x-navbars.sidebar activePage='staff/trazano'></x-navbars.sidebar>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <x-navbars.navs.auth titlePage="Import Sai"></x-navbars.navs.auth>
    <div class="container-fluid py-4">
      <div class="row mt-4">
        <div class="col-lg-7">
          <div class="card bg-gradient-white">
            <div class="row pl-1">
              
              <h4 class="col-{{10 - count($tyre->images)}} opacity-9 text-start text-dark pl-1">{{$tyre->name}}</h4>
            </div>
            <div class="card-body px-5 z-index-1 bg-cover overflow-hidden pb-2">
              <div class="row">
                <div class="col-12 text-center">
                  <div class="row">
                    <div class="col-lg-6 col-12">
                      <h4 class="text-dark opacity-9">Benefits and Features
                      </h4>
                      <hr class="horizontal light mt-1 mb-3">
                      <div class="col-12">
                        @foreach (json_decode($tyre->tyre_features, true) as $feature)
                        <p>{{$feature}}</p>
                        @endforeach
                      </div>
                    </div>

                    <div class="col-lg-6 col-12">
                      <div>
                        <h6 class="mb-0 text-dark">{{$tyre->drive->name}}</h6>
                        <h6 class="mb-0 text-dark">{{$tyre->tyre_structure}}</h6>
                      </div>
                      <hr class="horizontal light mt-1 mb-3">
                      <div class="d-flex justify-content-center">
                        <div>
                          <h6 class="mb-0"><img src="{{asset($tyre->install_position_image)}}" width="300"></h6>
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
            <div class="col-lg-12 col-md-12 col-12 mt-2">
              
              <div class="card">
                
                @if (\Session::has('success'))
                <div class="alert alert-success">
                    <ul>
                        <li>{!! \Session::get('success') !!}</li>
                    </ul>
                </div>
              @endif
                <div class="card-body p-3 pt-2">
                  <!--<h6>Tồn kho hiện tại:{{$tyre->quantity}}</h6>-->
<!--                  <form method="POST" action="{{url('staff/xuat-lop-xe-tai')}}" class="d-flex flex-column align-items-center" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group col-12 col-md-2">
                      <input type="hidden" name="tyre_id" value="{{$tyre->id}}">
                      <input type="number" name="quantity" value="1" class="form-control  border border-2 p-2">
                    <button type="submit" class="btn bg-gradient-primary mt-3">Xuất hàng</button>
                    </div>
                  </form>-->
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
      <div class="container-fluid py-4">
      <div class='row col-12'>
        @if (\Session::has('successdimention'))
                <div class="alert alert-success">
                    <ul>
                        <li>{!! \Session::get('successdimention') !!}</li>
                    </ul>
                </div>
              @endif
        <div class="card">
          
  <div class="table-responsive">
    <table class="table" style='font-weight:200; line-height:0.85'>
      <thead>
        <tr>
          <th class="text-xxs p-0 pt-1 text-center" width="5%">Country</th>
          <th class="text-xxs p-0 text-center">QUY CÁCH</th>
          <th class="text-xxs p-0 text-center">LỚP BỐ</th>
          <th class="text-xxs p-0 text-center">CHỈ SỐ TẢI TRỌNG VÀ TỐC ĐỘ</th>
          <th class="text-xxs p-0 text-center">SỐ LƯỢNG</th>
          <th class="text-xxs p-0 text-center">ĐƠN GIÁ</th>
        </tr>
      </thead>
      <tbody>
        @foreach($tyre->dimentions as $dimention)
      <form action="{{url('staff/cap-nhat-gia-so-luong-cho-lop')}}" method="POST">
        @csrf
        <input type="hidden" name="dimention_id" value="{{$dimention->id}}">
        <tr>
          <td class='p-0'>
            @foreach ($dimention->madeins as $country) 
            @if(count($dimention->madeins) ==1 && $country->country->name == 'Thailand')
              &nbsp;&nbsp;
            @endif
            <img src="{{asset($country->country->flag)}}" width='10'>
            @endforeach
          </td>
          <td class=" text-center text-sm p-0"> {{$dimention->size}} </td>
          <td class=" text-center text-sm p-0"> {{$dimention->ply}} </td>
          <td class=" text-center text-sm p-0"> {{$dimention->sevice_index}} </td>
          <td class=" text-center text-sm p-0"> <input type="number" name="total" value="{{$dimention->total}}"> </td>
          
          <td class=" text-center text-sm p-0"> <input type="number" name="price" value="{{$dimention->price}}"> </td>
          <td><input type="submit" value="Cập nhật"></td>
        </tr>
      </form>
        @endforeach
       
      </tbody>
    </table>
  </div>
</div>
      </div>
    </div>
  </main>
</x-layout>
