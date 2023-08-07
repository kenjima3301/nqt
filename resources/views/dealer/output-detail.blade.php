<x-layout bodyClass="g-sidenav-show  bg-gray-200">
  <x-navbars.dealersidebar activePage='xuat-hang-khach-le'></x-navbars.dealersidebar>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <x-navbars.navs.auth titlePage="Xuất hàng cho khách lẻ"></x-navbars.navs.auth>
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h5 class="mb-0">Chi tiết đơn hàng</h5>
            </div>
            <div class="card-body p-3 position-relative">
              <div class="row">
                <div class="col-7 text-start">
                  <h5 class="font-weight-bolder mb-0">
                    Mã đơn hàng: {{$output->output_code}}
                  </h5>
                  <div class="form-group col-12 col-md-10 pl-4">  
                  <label for="exampleInputname">Ngày  tạo: {{$output->created_at->format('d-m-Y')}} </label>
                    </div>
                    <div class="form-group col-12 col-md-10 pl-4">  
                  <label for="exampleInputname">Ghi chú: </label>
                    <span class=" form-control form-control-sm h-auto">{{$output->note}}</span>
                    </div>
                    
                </div>
              </div>
            </div>
            <div class="table-responsive">
              <div class="dataTable-wrapper dataTable-loading no-footer sortable searchable fixed-height fixed-columns">
                <div class="dataTable-container"><table class="table table-flush dataTable-table" id="datatable-basic">
                    <thead class="thead-light">
                      <th  style="width: 22%;"> Mã Gai</th>
                      <th>Sai</th>
                      <th>Số lượng</th>
                    </thead>
                    <tbody>
                      @foreach($output->dimentions as $dimention)
                      <tr>
                        <td>{{$dimention->dimention->tyre->name}}</td>
                        <td>{{$dimention->dimention->size}}</td>
                        <td>{{$dimention->quantity}}</td>
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

