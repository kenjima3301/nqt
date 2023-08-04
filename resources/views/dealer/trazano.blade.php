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
            @if (\Session::has('success'))
                <div class="alert alert-danger">
                        <span>{!! \Session::get('success') !!}</span>
                </div>
              @endif
            <div class="d-sm-flex bg-gray-100 border-radius-lg p-2 my-4">
              
              <form method="POST" action="{{url('dealer/trazano')}}" enctype="multipart/form-data">
                @csrf
                <input type="name" name="name" value="{{ $errors->first('name')}}" class="form-control border border-2 p-2" placeholder="Tìm theo mã gai" value="" onfocus="focused(this)" onfocusout="defocused(this)">
                <button type="submit" class="btn bg-gradient-primary">Tìm</button>
              </form>
            </div>
              <!--</div>-->
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
                       <th>Số lượng</th>
                    </thead>
                    <tbody>
                      @foreach ($trazanotyres as $key => $tyre)
                      <tr>
                        <td class="text-sm font-weight-normal">{{$tyre->name}}</td>
                        <td class="text-sm font-weight-normal">{{$tyre->drive->name}}</td>
                        <td class="text-sm font-weight-normal">{{$tyre->tyre_structure}}</td>
                        <td class="text-sm font-weight-normal"><img src="{{asset($tyre->install_position_image)}}" width="200"></td>
                        <td class="text-sm font-weight-normal">{{$tyre->quantity}}</td>
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
