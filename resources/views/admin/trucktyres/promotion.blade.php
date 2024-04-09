<x-layout bodyClass="g-sidenav-show  bg-gray-200">
  <x-navbars.sidebar activePage='promotion'></x-navbars.sidebar>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <x-navbars.navs.auth titlePage="Quản lý"></x-navbars.navs.auth>
    <div class="container-fluid py-4">
      <div class="row mt-4">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h5 class="mb-0">Lốp xe tải ({{count($promotions)}})</h5>
                <div class="row">
                  <select class="col-3" id="tyre_id" name="tyre_id">
                    <option value="">Chọn sản phẩm vào chương trình khuyến mãi</option>
                    @foreach($tyre_codes as $code)
                    <option value="{{$code->id}}"> {{$code->name}}</option>
                    @endforeach
                  </select>
                  <div class="col-md-3">
                <span type="submit" class="btn bg-gradient-primary" id="search">Tìm</span>
                  </div>
                </div>
            </div>
            <div class="table-responsive">
              <div class="dataTable-wrapper dataTable-loading no-footer sortable searchable fixed-height fixed-columns">
                <div class="dataTable-container"><table class="table table-flush dataTable-table" id="datatable-basic">
                    <thead class="thead-light">
                      <tr>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" data-sortable="" style="width: 11.4645%;"><a href="#" class="dataTable-sorter">
                            Tên</a>
                            </th>
                       
                       <th>QUY CÁCH</th>
                       <th>Gía</th>
                       <th>Gía Khuyễn mãi</th>
                       <th></th>
                      <tr>
                    </thead>
                    <tbody>
                      @foreach ($promotions as $key => $promotion)
                      <tr>
                        <td class="text-sm font-weight-normal">
                          {{$promotion->tyre->name}}</td>
                        <td class="text-sm font-weight-normal">{{$promotion->dimention->size}}</td>
                        <td class="text-sm font-weight-normal">{{$promotion->dimention->price}}</td>
                        <td class="text-sm font-weight-normal">
                          {{$promotion->promotion_price}}
                        </td>
                        <td><a href="{{url('admin/lop-xe-tai-promotion-tyre-xoa/'.$promotion->id)}}">Xóa khuyễn mãi</a></td>
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
  <script type="text/javascript">
$(document).ready(function () {
  $("#search").click(function () {
    var id = $('#tyre_id').find(":selected").val();
    location.href = 'lop-xe-tai-promotion-tyre/'+id;

  });
});
  </script>
  @endpush
</x-layout>
