<x-layout bodyClass="g-sidenav-show  bg-gray-200">
  <x-navbars.sidebar activePage='loai-xe'></x-navbars.sidebar>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <x-navbars.navs.auth titlePage="Thêm nước sản xuất"></x-navbars.navs.auth>
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12 col-lg-8 m-auto">
          <div class="card">
            <div class="card-header">
              <h5 class="mb-0">Thêm nước sản xuất</h5>
            </div>
            @if ($message = Session::get('success'))
            <div class="alert alert-success alert-block">
              {{$message}}
            </div>
            @endif
            <div class="col-12 text-end">
              <a class="btn bg-gradient-primary mb-0 me-4" href="{{url('admin/quan-ly-khac')}}">Quay lại danh sách nước sản xuất</a>
            </div>
            <div class="card-body">
              <form method="POST" action="{{url('admin/nuoc-san-xuat-add')}}" class="d-flex flex-column align-items-center" enctype="multipart/form-data">
                @csrf
                <div class="form-group col-12 col-md-6">
                  <label for="exampleInputname">Tên</label>
                  <input type="name" name="name" value="{{ $errors->first('name')}}" class="form-control border border-2 p-2" id="exampleInputname" placeholder="Tên loại xe" value="" onfocus="focused(this)" onfocusout="defocused(this)">
                </div>
                <br/>
                <div class="form-group col-md-6">
                  <label for="exampleInputname">Đăng ảnh cờ</label>
                  <div class="input-group hdtuto control-group lst increment" >
                        <div class="list-input-hidden-upload">
                          <input type="file" name="flag" id="file_upload" class="myfrm form-control hidden">
                        </div>
                      </div>
                </div>
                @if($errors->any())
                <div class="text-danger">
                 Hãy nhập đầy đủ thông tin các trường bên trên
                </div>
                @endif
                <button type="submit" class="btn bg-gradient-primary mt-3">Lưu</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
</x-layout>
