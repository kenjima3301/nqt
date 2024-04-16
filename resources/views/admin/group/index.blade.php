<x-layout bodyClass="g-sidenav-show  bg-gray-200">
  <x-navbars.sidebar activePage='quan-ly-khac'></x-navbars.sidebar>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <x-navbars.navs.auth titlePage="Quản lý khác"></x-navbars.navs.auth>
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-lg-12 position-relative z-index-2">
          <div class="row">
            <div class="col-lg-2 col-md-6 col-sm-6">
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
                  <p class="mb-0">{{$model->name}} - {{$model->name_en}} <a href="{{url('admin/loai-xe-edit/'.$model->id)}}"> <i class="fas fa-edit" aria-hidden="true"></i></a></p>
                  @endforeach
                </div>
              </div>
            </div>
            <div class="col-lg-2 col-md-6 col-sm-6 mt-sm-0 mt-4">
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
                  <p class="mb-0"> <img src="{{asset($madein->flag)}}" width="20"> {{$madein->name}}  - {{$madein->name_en}} <a href="{{url('admin/nuoc-san-xuat-edit/'.$madein->id)}}"> <i class="fas fa-edit" aria-hidden="true"></i></a></p>
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
                  <p class="mb-0"> <img src="{{asset($brand->image)}}" height="20"> {{$brand->name}} - {{$brand->name_en}}<a href="{{url('admin/hang-san-xuat-edit/'.$brand->id)}}"> <i class="fas fa-edit" aria-hidden="true"></i></a></p>
                  @endforeach
                </div>
              </div>
            </div>
            <div class="col-lg-2 col-md-6 col-sm-6 mt-lg-0 mt-4">
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
                  <p class="mb-0">{{$drive->name}}  - {{$drive->name_en}} <a href="{{url('admin/kieu-duong-lai-edit/'.$drive->id)}}"> <i class="fas fa-edit" aria-hidden="true"></i></a></p>
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
                    <p class="text-sm mb-0 text-capitalize ">Cấu trúc lốp</p>
                    <h4 class="mb-0 ">{{count($typestructures)}}</h4>
                  </div>
                </div>
                <hr class="horizontal my-0 dark">
                <div class="card-footer p-3">
                  <a href="{{url('admin/cau-truc-lop-add')}}"> <span class="badge bg-gradient-primary ms-auto">+Thêm Cấu trúc lốp</span></a>
                 @foreach ($typestructures as $typestructure)
                  <p class="mb-0">{{$typestructure->name}}  - {{$typestructure->name_en}} <a href="{{url('admin/cau-truc-lop-edit/'.$typestructure->id)}}"> <i class="fas fa-edit" aria-hidden="true"></i></a></p>
                  @endforeach
                </div>
              </div>
            </div>
          </div>
          <div class="row mt-4">
            
            
            <div class="col-lg-6 col-md-12 col-sm-6 mt-lg-0 mt-4">
              <div class="card ">
                <div class="card-header p-3 pt-2 bg-transparent">
                  <div class="">
                    <a href="{{url('admin/danh-muc-add')}}"> <span class="badge bg-gradient-primary ms-auto">+Thêm danh mục bài viết</span></a>
                  </div>
                </div>
                <hr class="horizontal my-0 dark">
                <div class="card-body p-3 grid-container" style="display: inline-flex;">
                  <div class="table-responsive">
              <div class="dataTable-wrapper dataTable-loading no-footer sortable searchable fixed-height fixed-columns">
                <div class="dataTable-container"><table class="table table-flush dataTable-table" id="datatable-basic">
                    <thead class="thead-light">
                      <tr>
                            <th>Tên</th>
                            <th>Tiếng anh</th>
                            <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($types as $key => $type)
                      <tr>
                      
                        <td class="text-sm font-weight-normal">{{$type->name}}</td>
                   
                        <td class="text-sm font-weight-normal">{{$type->name_en}}</td>
                        <td><a href="{{url('admin/danh-muc-edit/'.$type->id)}}"> <i class="fas fa-edit" aria-hidden="true"></i></a></td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table></div>
              </div>
            </div>
                </div>
              </div>
            </div>
            
            <div class="col-lg-6 col-md-12 col-sm-6 mt-lg-0 mt-4">
              <div class="card ">
                <div class="card-header p-3 pt-2 bg-transparent">
                  <div class="">
                    <a href="{{url('admin/sectioncontent')}}"> <span class="badge bg-gradient-primary ms-auto">Nội dung</span></a>
                  </div>
                </div>
                <hr class="horizontal my-0 dark">
                <div class="card-body p-3 grid-container" style="display: inline-flex;">
                  <div class="table-responsive">
              <div class="dataTable-wrapper dataTable-loading no-footer sortable searchable fixed-height fixed-columns">
                <div class="dataTable-container"><table class="table table-flush dataTable-table" id="datatable-basic">
                    <thead class="thead-light">
                      <tr>
                            <th>Tên</th>
                            <th>Tiếng anh</th>
                            <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($contents as $key => $content)
                      <tr>
                      
                        <td class="text-sm font-weight-normal">{{$content->name}}</td>
                   
                        <td class="text-sm font-weight-normal">{{$content->name_en}}</td>
                        <td><a href="{{url('admin/sectioncontent-edit/'.$content->id)}}"> <i class="fas fa-edit" aria-hidden="true"></i></a></td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table></div>
              </div>
            </div>
                </div>
              </div>
            </div>
            
            
          </div>
          <div class="row mt-4">
            
            <div class="col-lg-6 col-md-12 col-sm-6 mt-lg-0 mt-4">
              <div class="card ">
                <div class="card-header p-3 pt-2 bg-transparent">
                  <div class="">
                    <a href="{{url('admin/menu-add')}}"> <span class="badge bg-gradient-primary ms-auto">+Thêm Menu</span></a>
                  </div>
                </div>
                <hr class="horizontal my-0 dark">
                <div class="card-body p-3 grid-container" style="display: inline-flex;">
                  <div class="card-footer p-3">
                 @foreach ($menus as $menu)
                    @if($menu->parent_id == '')
                    <p class="mb-0">{{$menu->name}} - {{$menu->name_en}} <a href="{{url('admin/menu-edit/'.$menu->id)}}"> <i class="fas fa-edit" aria-hidden="true"></i></a></p>
                      <div class="card-footer p-3">
                        @foreach($menus as $submenu) 
                            @if($submenu->parent_id == $menu->id)
                                   <p class="mb-0">{{$submenu->name}} - {{$submenu->name_en}} <a href="{{url('admin/menu-edit/'.$submenu->id)}}"> <i class="fas fa-edit" aria-hidden="true"></i></a></p>
                            @endif
                        @endforeach
                        </div>
                    @endif
                  @endforeach
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
</x-layout>
