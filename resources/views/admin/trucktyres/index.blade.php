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
                       <th>Lượt xem</th>
                       <th>Quản lý Sai</th>
                       <th></th>
                       <th></th>
                    </thead>
                    <tbody>
                      @foreach ($tyres as $key => $tyre)
                      <tr>
                        <td class="text-sm font-weight-normal">{{$tyre->name}}</td>
                        <td class="text-sm font-weight-normal">@if(isset($tyre->drive)) {{$tyre->drive->name}} @endif</td>
                        <td class="text-sm font-weight-normal">{{$tyre->structure->name ?? ''}}</td>
                        <td class="text-sm font-weight-normal">
                          @if($tyre->install_position_image != null)
                          <img src="{{asset($tyre->install_position_image)}}" width="200">
                          @endif
                        </td>
                        <td>{{$tyre->views}}</td>
                        <td><a href="{{url('admin/lop-xe-tai-import/'.$tyre->id)}}" class="mx-1" data-bs-toggle="tooltip" data-bs-original-title="Import sai">
                            Chi tiết Sai
                          </a>
                        </td>
                        <td><a href="{{url('admin/lop-xe-tai-sua/'.$tyre->id)}}" class="mx-1" data-bs-toggle="tooltip" data-bs-original-title="Sửa">
                            <i class="fas fa-edit" aria-hidden="true"></i>
                          </a>
                          <a href="{{url('admin/lop-xe-tai-an/'.$tyre->id)}}" class="mx-1" data-bs-toggle="tooltip" data-bs-original-title="@if($tyre->status == 'public') Ẩn sản phẩm @else Hiển thị sản phẩm @endif">
                            @if($tyre->status == 'public') Ẩn @else Hiển thị @endif
                          </a>
                        </td>
                        <td>
                          <span id='xoa{{$tyre->id}}' onclick="xoa({{$tyre->id}})"><i class="fas fa-trash" aria-hidden="true"></i></span>
                          <span id='xacnhan{{$tyre->id}}' style='display: none;'>
                          <a href="{{url('admin/lop-xe-tai-xoa/'.$tyre->id)}}" class="mx-1" data-bs-toggle="tooltip" data-bs-original-title="Xóa">
                            Xác nhận xóa sản phẩm
                          </a>
                          </span>
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
@push('js')
  <script src="{{asset('assets/js/jquery-3.6.3.min.js')}}"></script>
<script>
function xoa(id) {
  
  $("#xoa"+id).hide();
  $("#xacnhan"+id).show();
}
</script>
 @if (count($tyres) > 5)
        @include('datatables')
    @endif
  @endpush
</x-layout>