<x-layout bodyClass="g-sidenav-show  bg-gray-200">
  <x-navbars.dealersidebar activePage='staff/trazano'></x-navbars.dealersidebar>
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
                        <th>Quy cách</th>
                        <th> Mẫu gai </th>
                       <th>Lớp bố</th>
                       <th>Chỉ số tải trọng và tốc độ</th>
                       <th>Kiểu xe và vị trí lắp đặt</th>
                       <th>Đơn vị</th>
                       <th>Số lượng</th>
                    </thead>
                    <tbody>
                      @foreach ($tyres as $tyre)
                      <tr>
                        <td class="text-sm font-weight-normal">{{$tyre->dimention->size}}</td>
                        <td class="text-sm font-weight-normal">{{$tyre->dimention->tyre->name}}</td>
                        <td class="text-sm font-weight-normal">{{$tyre->dimention->ply}}</td>
                        <td class="text-sm font-weight-normal">{{$tyre->dimention->sevice_index}}</td>
                        <td class="text-sm font-weight-normal"><img src="{{asset($tyre->dimention->tyre->install_position_image)}}" width="200"></td>
                        <td class="text-sm font-weight-normal">{{$tyre->dimention->unit}}</td>
                        <td class="text-sm font-weight-normal">{{$tyre->total}}</td>
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
