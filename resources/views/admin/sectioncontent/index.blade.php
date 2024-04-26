<x-layout bodyClass="g-sidenav-show  bg-gray-200">
  <x-navbars.sidebar activePage='quan-ly-khac'></x-navbars.sidebar>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <x-navbars.navs.auth titlePage="Quản lý Nội dung"></x-navbars.navs.auth>
    <div class="container-fluid py-4">
      <div class="row mt-4">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h5 class="mb-0">Nội dung</h5>
            </div>
            <div class="col-12 text-end">
              <a class="btn bg-gradient-primary mb-0 me-4" href="{{url('admin/sectioncontent-add')}}"><i class="material-icons text-sm">add</i>&nbsp;&nbsp;Thêm Nội dung</a>
            </div>
            <div class="table-responsive">
              <div class="dataTable-wrapper dataTable-loading no-footer sortable searchable fixed-height fixed-columns">
                <div class="dataTable-container"><table class="table table-flush dataTable-table" id="datatable-basic">
                    <thead class="thead-light">
                      <tr>
                        <th>Key</th>
                            <th>Tên</th>
                            <th>Tiếng anh</th>
                    </thead>
                    <tbody>
                      @foreach($contents as $key => $content)
                      <tr>
                      <td class="text-sm font-weight-normal">{{$content->key}}</td>
                        <td class="text-sm font-weight-normal">{{$content->name}}</td>
                   
                        <td class="text-sm font-weight-normal">{{$content->name_en}}</td>
                        <td><a href="{{url('admin/sectioncontent-edit/'.$content->id)}}"> <i class="fas fa-edit" aria-hidden="true"></i></a></td>
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
