<x-layout bodyClass="g-sidenav-show  bg-gray-200">
  <x-navbars.dealersidebar activePage='xuat-hang-tu-NQT'></x-navbars.dealersidebar>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <x-navbars.navs.auth titlePage="Nhập hàng từ Ngọc Quyết Thắng"></x-navbars.navs.auth>
    <div class="container-fluid py-4">
      <div class="row mt-4">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h5 class="mb-0">Nhập hàng từ Ngọc Quyết Thắng</h5>
            </div>
              <!--</div>-->
            <div class="table-responsive">
              <div class="dataTable-wrapper dataTable-loading no-footer sortable searchable fixed-height fixed-columns">
                <div class="dataTable-container"><table class="table table-flush dataTable-table" id="datatable-basic">
                    <thead class="thead-light">
                      <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" data-sortable="" style="width: 11.4645%;"><a href="#" class="dataTable-sorter">
                            Mã đơn hàng</a></th>
                       <th>Note</th>
                       <th>File</th>
                       <th>Ngày</th>
                       <th>Đã nhận hàng</th>
                    </thead>
                    <tbody>
                      @foreach ($outputs as $output)
                                <tr>
                                  <td>
                                    <div class="d-flex px-2 py-1">
                                      <div class="d-flex flex-column justify-content-center">
                                        <h6 class="mb-0 text-xs"><a href="{{url('dealer/xuat-hang-chi-tiet/'.$output->id)}}">{{$output->output_code}}</a></h6>
                                      </div>
                                    </div>
                                  </td>
                                  <td class="align-middle text-sm">{{$output->note}}
                                  </td>
                                  <td class="align-middle text-sm">
                                    @if($output->file != NULL)
                                    <a href="{{url('dealer/downloadoutput/'.$output->id)}}"><span class="badge badge-sm badge-success">Tải file</span></a>
                                    @endif
                                  </td>
                                  <td class="align-middle text-sm">
                                    <span class="badge badge-sm badge-success">{{$output->created_at->format('d-m-Y')}}</span>
                                  </td>
                                  <td><a href="{{url('dealer/da-nhan-hang-tu-nqt/'.$output->id)}}"><span class="badge badge-sm badge-danger">Xác nhận</span></a></td>
                                </tr>
                        @endforeach
                      
                    </tbody>
                  </table></div>
              </div>
            </div>
          </div>
        </div>
      </div>
      
      <div class="row mt-4">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h5 class="mb-0">Đơn đã nhập từ Ngọc Quyết Thắng</h5>
            </div>
              <!--</div>-->
            <div class="table-responsive">
              <div class="dataTable-wrapper dataTable-loading no-footer sortable searchable fixed-height fixed-columns">
                <div class="dataTable-container"><table class="table table-flush dataTable-table" id="datatable-basic">
                    <thead class="thead-light">
                      <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" data-sortable="" style="width: 11.4645%;"><a href="#" class="dataTable-sorter">
                            Mã đơn hàng</a></th>
                       <th>Note</th>
                       <th>File</th>
                       <th>Ngày</th>
                       <th>Đã nhận hàng</th>
                    </thead>
                    <tbody>
                      @foreach ($outputeds as $output)
                                <tr>
                                  <td>
                                    <div class="d-flex px-2 py-1">
                                      <div class="d-flex flex-column justify-content-center">
                                        <h6 class="mb-0 text-xs"><a href="{{url('dealer/xuat-hang-chi-tiet/'.$output->id)}}">{{$output->output_code}}</a></h6>
                                      </div>
                                    </div>
                                  </td>
                                  <td class="align-middle text-sm">{{$output->note}}
                                  </td>
                                  <td class="align-middle text-sm">
                                    @if($output->file != NULL)
                                    <a href="{{url('dealer/downloadoutput/'.$output->id)}}"><span class="badge badge-sm badge-success">Tải file</span></a>
                                    @endif
                                  </td>
                                  <td class="align-middle text-sm">
                                    <span class="badge badge-sm badge-success">{{$output->created_at->format('d-m-Y')}}</span>
                                  </td>
                                  <td><span class="badge badge-sm badge-success">ĐÃ NHẬN HÀNG</span></td>
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
