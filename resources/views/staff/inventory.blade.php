<x-layout bodyClass="g-sidenav-show  bg-gray-200">
  <x-navbars.staffsidebar activePage='staff/trazano'></x-navbars.staffsidebar>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <x-navbars.navs.auth titlePage="Trazano"></x-navbars.navs.auth>
    <div class="container-fluid py-4">
      <div class="row mt-4">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h5 class="mb-0">Lốp xe Trazano</h5>
            </div>
            
              <!--</div>-->
            <div class="table-responsive">
              <div class="dataTable-wrapper dataTable-loading no-footer sortable searchable fixed-height fixed-columns">
                <div class="dataTable-container"><table class="table table-flush dataTable-table" id="datatable-basic">
                    <thead class="thead-light">
                      <tr>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" data-sortable="" style="width: 11.4645%;"><a href="#" class="dataTable-sorter">
                            Tên</a></th>
                       <th>Quy cách</th>
                       <th>Lớp bố</th>
                       <th>Chỉ số tải trọng và tốc độ</th>
                       <th>Kiểu xe và vị trí lắp đặt</th>
                       <th>Số lượng</th>
                       <th>Đơn giá</th>
                    </thead>
                    <tbody>
                      @foreach ($tyres as $tyre)
                      <tr>
                        <td class="text-sm font-weight-normal">{{$tyre->size}}</td>
                        <td class="text-sm font-weight-normal">{{$tyre->tyre->name}}</td>
                        <td class="text-sm font-weight-normal">{{$tyre->ply}}</td>
                        <td class="text-sm font-weight-normal">{{$tyre->sevice_index}}</td>
                        <td class="text-sm font-weight-normal">
                          @if($tyre->tyre->install_position_image != null)
                          <img src="{{asset($tyre->tyre->install_position_image)}}" width="200">
                          @endif
                        </td>
                        <td class="text-sm font-weight-normal">{{$tyre->total}}</td>
                        <td class="text-sm font-weight-normal">{{$tyre->price}}</td>
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
