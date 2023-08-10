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
              <select class="col-2" id="filtercode">
                <option value="">Lọc theo mẫu gai</option>
                @foreach($tyre_codes as $code)
                <option value="{{$code->id}}"> {{$code->name}}</option>
                @endforeach
              </select>
            </div>
            
              <!--</div>-->
            <div class="table-responsive">
              <div class="dataTable-wrapper dataTable-loading no-footer sortable searchable fixed-height fixed-columns">
                <div class="dataTable-container"><table class="table table-flush dataTable-table" id="datatable-basic">
                    <thead class="thead-light">
                      <tr>
                        <th>Quy cách</th>
                       <th>Tên</th>
                       <th>Lớp bố</th>
                       <th>Chỉ số tải trọng và tốc độ</th>
                       <th>Kiểu xe và vị trí lắp đặt</th>
                       <th>Số lượng</th>
                       <th>Đơn giá</th>
                    </thead>
                    <tbody>
                      @foreach ($tyres as $tyre)
                      <tr class="{{$tyre->tyre->id}} allcode">
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
  @push('js')
  <script src="{{asset('assets/js/jquery-3.6.3.min.js')}}"></script>
  <link href="{{asset('assets/css/select2.min.css')}}" rel="stylesheet" />
  <script src="{{asset('assets/js/select2.min.js')}}"></script>
  <script>
        $(document).ready(function(){
          $("#filtercode").select2();
          $('#filtercode').change(function(){
              let code = $(this).val();
              $('.allcode').hide();
              $('.'+code).show();
          });
        });
        </script>
  @endpush
</x-layout>
