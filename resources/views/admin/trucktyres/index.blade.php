<x-layout bodyClass="g-sidenav-show  bg-gray-200">
  <x-navbars.sidebar activePage='lop-xe-tai'></x-navbars.sidebar>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <x-navbars.navs.auth titlePage="Quản lý"></x-navbars.navs.auth>
    <div class="container-fluid py-4">
      <div class="row mt-4">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h5 class="mb-0">Lốp xe tải ({{count($tyres)}})</h5>
            </div>
            <div class="col-12 text-end">
              <a class="btn bg-gradient-primary mb-0 me-4" href="{{url('admin/lop-xe-tai-add')}}"><i class="material-icons text-sm">add</i>&nbsp;&nbsp;Thêm Lốp xe tải</a>
            </div>
            <div class="table-responsive">
              <div class="dataTable-wrapper dataTable-loading no-footer sortable searchable fixed-height fixed-columns">
                <div class="dataTable-container"><table class="table table-flush dataTable-table" id="datatable-basic">
                    <thead class="thead-light">
                      <tr>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" data-sortable="" style="width: 11.4645%;"><a href="#" class="dataTable-sorter">
                            Tên</a></th>
                       <th>Kiểu đường lái</th>
                       <th>Cấu trúc lốp</th>
                       <th>Kiểu xe và vị trí lắp đặt</th>
                       <th>Import Sai</th>
                       <th></th>
                    </thead>
                    <tbody>
                      @foreach ($tyres as $key => $tyre)
                      <tr>
                        <td class="text-sm font-weight-normal"><a href="{{url('admin/lop-xe-tai-chi-tiet/'.$tyre->id)}}">{{$tyre->name}}</a></td>
                        <td class="text-sm font-weight-normal">@if(isset($tyre->drive)) {{$tyre->drive->name}} @endif</td>
                        <td class="text-sm font-weight-normal">{{$tyre->tyre_structure}}</td>
                        <td class="text-sm font-weight-normal">
                          @if($tyre->install_position_image != null)
                          <img src="{{asset($tyre->install_position_image)}}" width="200">
                          @endif
                        </td>
                        <td><a href="{{url('admin/lop-xe-tai-import/'.$tyre->id)}}" class="mx-1" data-bs-toggle="tooltip" data-bs-original-title="Import sai">
                            <i class="fas fa-file-import" aria-hidden="true"></i>
                          </a>
                        </td>
                        <td><a href="{{url('admin/lop-xe-tai-sua/'.$tyre->id)}}" class="mx-1" data-bs-toggle="tooltip" data-bs-original-title="Sửa">
                            <i class="fas fa-edit" aria-hidden="true"></i>
                          </a>
                          <a href="{{url('admin/lop-xe-tai-xoa/'.$tyre->id)}}" class="mx-1" data-bs-toggle="tooltip" data-bs-original-title="Xóa">
                            <i class="fas fa-trash" aria-hidden="true"></i>
                          </a>
                        </td>
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
  </main>
</x-layout>
