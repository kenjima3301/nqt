<x-layout bodyClass="g-sidenav-show  bg-gray-200">
  <x-navbars.sidebar activePage='kieu-duong-lai'></x-navbars.sidebar>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <x-navbars.navs.auth titlePage="Quản lý kiểu đường lái"></x-navbars.navs.auth>
    <div class="container-fluid py-4">
      <div class="row mt-4">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h5 class="mb-0">Kiểu đường lái</h5>
            </div>
            <div class="col-12 text-end">
              <a class="btn bg-gradient-primary mb-0 me-4" href="{{url('admin/kieu-duong-lai-add')}}"><i class="material-icons text-sm">add</i>&nbsp;&nbsp;Thêm kiểu đường lái</a>
            </div>
            <div class="table-responsive">
              <div class="dataTable-wrapper dataTable-loading no-footer sortable searchable fixed-height fixed-columns">
                <div class="dataTable-container"><table class="table table-flush dataTable-table" id="datatable-basic">
                    <thead class="thead-light">
                      <tr>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" data-sortable="" style="width: 11.4645%;"><a href="#" class="dataTable-sorter">
                            Tên</a></th>
                       <th>Mô tả</th>
                    </thead>
                    <tbody>
                      @foreach($drives as $drive)
                      <tr>
                        <td class="text-sm font-weight-normal">{{$drive->name}}</td>
                        <td class="text-sm font-weight-normal">{{$drive->description}}</td>

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
