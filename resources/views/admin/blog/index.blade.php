<x-layout bodyClass="g-sidenav-show  bg-gray-200">
  <x-navbars.sidebar activePage='bai-viet'></x-navbars.sidebar>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <x-navbars.navs.auth titlePage="Quản lý bài viết"></x-navbars.navs.auth>
    <div class="container-fluid py-4">
      <div class="row mt-4">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h5 class="mb-0"> Bài viết</h5>
            </div>
            <div class="col-11 text-end">
             <a href="{{url('admin/bai-viet-add')}}"><button type="button" class="btn bg-gradient-primary">+ Bài viết mới</button></a>
            </div>
            <div class="table-responsive">
              <div class="dataTable-wrapper dataTable-loading no-footer sortable searchable fixed-height fixed-columns">
                <div class="dataTable-container"><table class="table table-flush dataTable-table" id="datatable-basic">
                    <thead class="thead-light">
                      <tr>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" data-sortable="" style="width: 11.4645%;"><a href="#" class="dataTable-sorter">
                            Danh mục</a></th>
                       <th>Tiêu đề</th>
                    </thead>
                    <tbody>
                      @foreach($blogs as $blog)
                      <tr>
                        <td class="text-sm font-weight-normal">{{$blog->type->name}}</td>
                        <td class="text-sm font-weight-normal">{{$blog->title}}</td>
                        <td><a href="{{url('admin/bai-viet-edit/'.$blog->id)}}"><i class="material-icons ms-auto text-dark cursor-pointer" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Edit Card">edit</i></a></td>
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
