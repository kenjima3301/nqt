<x-layout bodyClass="g-sidenav-show  bg-gray-200">
  <x-navbars.sidebar activePage='quan-ly-khac'></x-navbars.sidebar>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <x-navbars.navs.auth titlePage="Quản lý khác"></x-navbars.navs.auth>
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-lg-12 position-relative z-index-2">
          <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card  mb-2">
                <div class="card-header p-3 pt-2">
                  <div class="icon icon-lg icon-shape bg-gradient-primary shadow-dark shadow text-center border-radius-xl mt-n4 position-absolute">
                    <i class="fa fa-car"></i>
                  </div>
                  <div class="text-end pt-1">
                    <p class="text-sm mb-0 text-capitalize">Loại xe</p>
                    <h4 class="mb-0">{{count($models)}}</h4>
                  </div>
                </div>
                <hr class="dark horizontal my-0">
                <div class="card-footer p-3">
                  <a href="{{url('admin/loai-xe-add')}}"> <span class="badge bg-gradient-primary ms-auto">+Thêm loại xe</span></a>
                  @foreach ($models as $model)
                  <p class="mb-0">{{$model->name}}</p>
                  @endforeach
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 mt-sm-0 mt-4">
              <div class="card  mb-2">
                <div class="card-header p-3 pt-2">
                  <div class="icon icon-lg icon-shape bg-gradient-primary shadow-primary shadow text-center border-radius-xl mt-n4 position-absolute">
                    <i class="fa fa-flag"></i>
                  </div>
                  <div class="text-end pt-1">
                    <p class="text-sm mb-0 text-capitalize">Nước sản xuất</p>
                    <h4 class="mb-0">{{count($madeins)}}</h4>
                  </div>
                </div>
                <hr class="dark horizontal my-0">
                <div class="card-footer p-3">
                  <a href="{{url('admin/nuoc-san-xuat-add')}}"> <span class="badge bg-gradient-primary ms-auto">+Thêm Nước Sản Xuất</span></a>
                  @foreach ($madeins as $madein)
                  <p class="mb-0">{{$madein->name}} <img src="{{asset($madein->flag)}}" width="20"></p>
                  @endforeach
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 mt-lg-0 mt-4">
              <div class="card  mb-2">
                <div class="card-header p-3 pt-2 bg-transparent">
                  <div class="icon icon-lg icon-shape bg-gradient-primary shadow-success text-center border-radius-xl mt-n4 position-absolute">
                    <i class="fa fa-industry"></i>
                  </div>
                  <div class="text-end pt-1">
                    <p class="text-sm mb-0 text-capitalize ">Hãng sản xuất</p>
                    <h4 class="mb-0 ">{{count($brands)}}</h4>
                  </div>
                </div>
                <hr class="horizontal my-0 dark">
                <div class="card-footer p-3">
                  <a href="{{url('admin/hang-san-xuat-add')}}"> <span class="badge bg-gradient-primary ms-auto">+Thêm Hãng Sản Xuất</span></a>
                    @foreach ($brands as $brand)
                  <p class="mb-0">{{$brand->name}} <img src="{{asset($brand->image)}}" height="20"></p>
                  @endforeach
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 mt-lg-0 mt-4">
              <div class="card ">
                <div class="card-header p-3 pt-2 bg-transparent">
                  <div class="icon icon-lg icon-shape bg-gradient-primary shadow-info text-center border-radius-xl mt-n4 position-absolute">
                    <i class="fa fa-road"></i>
                  </div>
                  <div class="text-end pt-1">
                    <p class="text-sm mb-0 text-capitalize ">Kiểu đường lái</p>
                    <h4 class="mb-0 ">{{count($drives)}}</h4>
                  </div>
                </div>
                <hr class="horizontal my-0 dark">
                <div class="card-footer p-3">
                  <a href="{{url('admin/kieu-duong-lai-add')}}"> <span class="badge bg-gradient-primary ms-auto">+Thêm Kiểu đường lái</span></a>
                 @foreach ($drives as $drive)
                  <p class="mb-0">{{$drive->name}}</p>
                  @endforeach
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
</x-layout>
