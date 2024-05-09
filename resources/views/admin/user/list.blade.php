<x-layout bodyClass="g-sidenav-show  bg-gray-200">
  <x-navbars.sidebar activePage='quan-ly-nguoi-dung'></x-navbars.sidebar>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <x-navbars.navs.auth titlePage="Quản lý người dùng"></x-navbars.navs.auth>
    <div class="container-fluid py-4">
      <div class="row mt-4">
        <div class="col-12">
          <div class="card">
            <div class="col-12 text-end">
              <a class="btn bg-gradient-primary mb-0 me-4" href="{{url('admin/nguoi-dung-add')}}"><i class="material-icons text-sm">add</i>&nbsp;&nbsp;Thêm người dùng</a>
            </div>
            <div class="table-responsive">
              <div class="dataTable-wrapper dataTable-loading no-footer sortable searchable fixed-height fixed-columns">
                <div class="dataTable-container"><table class="table table-flush dataTable-table" id="datatable-basic">
                    <thead class="thead-light">
                      <tr>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" data-sortable="" style="width: 11.4645%;"><a href="#" class="dataTable-sorter">
                            Tên</a></th>
                       <th>Email</th>
                       <th>Phone</th>
                       <th>Vai trò</th>
                       <th></th>
                    </thead>
                    <tbody>
                      @foreach ($users as $key => $user)
                      <tr>
                        <td class="text-sm font-weight-normal">{{$user->name}}</td>
                        <td class="text-sm font-weight-normal">{{$user->email}}</td>
                        <td class="text-sm font-weight-normal">{{$user->phone}}</td>
                        <td class="text-sm font-weight-normal">{{$user->roles[0]->description}}</td>
                        <td>
                          <span id='xoa{{$user->id}}' onclick="xoa({{$user->id}})"><i class="fas fa-trash" aria-hidden="true"></i></span>
                          <span id='xacnhan{{$user->id}}' style='display: none;'>
                          <a href="{{url('admin/nguoi-dung-delete/'.$user->id)}}" class="mx-1" data-bs-toggle="tooltip" data-bs-original-title="Xóa">
                            Xác nhận xóa người dùng
                          </a>
                          </span>
                        </td>
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
<script>
function xoa(id) {
  
  $("#xoa"+id).hide();
  $("#xacnhan"+id).show();
}
</script>
 @if (count($users) > 5)
        @include('datatables')
    @endif
  @endpush
</x-layout>