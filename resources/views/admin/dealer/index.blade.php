<x-layout bodyClass="g-sidenav-show  bg-gray-200">
  <x-navbars.sidebar activePage='dai-ly'></x-navbars.sidebar>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <x-navbars.navs.auth titlePage="Quản lý đại lý"></x-navbars.navs.auth>
    <div class="container-fluid py-4">
      <div class="row mt-4">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h5 class="mb-0">Đại lý</h5>
            </div>
            <div class="col-12 text-end">
              <a class="btn bg-gradient-primary mb-0 me-4" href="{{url('admin/dai-ly-add')}}"><i class="material-icons text-sm">add</i>&nbsp;&nbsp;Thêm Đại lý</a>
            </div>
            <div class="table-responsive">
              <div class="dataTable-wrapper dataTable-loading no-footer sortable searchable fixed-height fixed-columns">
                <div class="dataTable-container"><table class="table table-flush dataTable-table" id="datatable-basic">
                    <thead class="thead-light">
                      <tr>
                         <th>Ảnh</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" data-sortable="" style="width: 11.4645%;">
                              Tên
                            </th>
                            <th>Địa chỉ</th>
                            <th>Email</th>
                            <th>Phone</th>
                    </thead>
                    <tbody>
                      @foreach($dealers as $dealer)
                      <tr>
                        <td class="text-sm font-weight-normal"><img src="{{asset($dealer->image)}}" width="50"></td>
                        <td class="text-sm font-weight-normal">{{$dealer->name}}</td>
                        <td class="text-sm font-weight-normal">{{$dealer->address}} - {{$dealer->province}}</td>
                        <td class="text-sm font-weight-normal">{{$dealer->email}}</td>
                        <td class="text-sm font-weight-normal">{{$dealer->phone}}</td>
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
