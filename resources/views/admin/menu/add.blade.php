<x-layout bodyClass="g-sidenav-show  bg-gray-200">
  <x-navbars.sidebar activePage='hang-san-xuat'></x-navbars.sidebar>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <x-navbars.navs.auth titlePage="Thêm ảnh nền"></x-navbars.navs.auth>
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12 col-lg-8 m-auto">
          <div class="card">
            <div class="card-header">
              <h5 class="mb-0">Thêm ảnh nền</h5>
            </div>
            @if ($message = Session::get('success'))
            <div class="alert alert-success alert-block">
              {{$message}}
            </div>
            @endif
            <div class="col-12 text-end">
              <a class="btn bg-gradient-primary mb-0 me-4" href="{{url('admin/quan-ly-khac')}}">Quay lại</a>
            </div>
            <div class="card-body">
              <form method="POST" action="{{url('admin/menu-add')}}" class="d-flex flex-column align-items-center" enctype="multipart/form-data">
                @csrf
                <div class="form-group col-12 col-md-6">
                  <label for="exampleInputname">Tên menu</label>
                  <input type="name" name="name" value="" class="form-control border border-2 p-2" id="exampleInputname" placeholder="Tên menu" onfocus="focused(this)" onfocusout="defocused(this)">
                </div>
                <div class="form-group col-12 col-md-6">
                  <label for="exampleInputname">Tên tiếng anh</label>
                  <input type="name" name="name_en" value="" class="form-control border border-2 p-2" id="exampleInputname" placeholder="Menu name" onfocus="focused(this)" onfocusout="defocused(this)">
                </div>
                <div class="form-group col-12 col-md-6">
                  <label for="exampleInputname">Link</label>
                  <input type="text" name="link" value="" class="form-control border border-2 p-2" id="exampleInputname" placeholder="Menu name" onfocus="focused(this)" onfocusout="defocused(this)">
                </div>
                @if(count($menus) >0)
                <br/>
                <div class="form-group col-12 col-md-6">
                  <label for="exampleInputname">Chọn menu cha</label>
                  <select name="parent_id">
                    <option value="">Chọn menu</option>
                    @foreach($menus as $menu)
                      
                      <option value="{{$menu->id}}">{{$menu->name}}</option>
                      
                    @endforeach
                  </select>
                </div>
                @endif
                <br/>
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
