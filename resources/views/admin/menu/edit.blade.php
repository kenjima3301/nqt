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
              <form method="POST" action="{{url('admin/menu-edit/'.$menu->id)}}" class="d-flex flex-column align-items-center" enctype="multipart/form-data">
                @csrf
                <input type="hidden" value="{{$menu->id}}" name="menu_id">
                <div class="form-group col-12 col-md-6">
                  <label for="exampleInputname">Tên menu</label>
                  <input type="name" name="name" value="{{$menu->name}}" class="form-control border border-2 p-2" id="exampleInputname" placeholder="Tên menu" onfocus="focused(this)" onfocusout="defocused(this)">
                </div>
                <div class="form-group col-12 col-md-6">
                  <label for="exampleInputname">Tên tiếng anh</label>
                  <input type="name" name="name_en" value="{{$menu->name_en}}" class="form-control border border-2 p-2" id="exampleInputname" placeholder="Menu name" onfocus="focused(this)" onfocusout="defocused(this)">
                </div>
                <div class="form-group col-12 col-md-6">
                  <label for="exampleInputname">Link</label>
                  <input type="text" name="link" value="{{$menu->link}}" class="form-control border border-2 p-2" id="exampleInputname" placeholder="Menu name" onfocus="focused(this)" onfocusout="defocused(this)">
                </div>
                <br/>
                <div class="form-group col-12 col-md-6">
                  <label for="exampleInputname">Menu cấp </label>
                  <select name="level">
                    <option>Chọn cấp menu</option>
                    <option value="1" @if($menu->level == 1) selected @endif>Cấp 1</option>
                    <option value="2" @if($menu->level == 2) selected @endif>Cấp 2</option>
                  </select>
                </div>
                @if(count($menus) >0)
                <br/>
                <div class="form-group col-12 col-md-6">
                  <label for="exampleInputname">Chọn menu cha</label>
                  <select name="parent_id">
                    <option value="">Chọn menu</option>
                    @foreach($menus as $me)
                     
                    <option value="{{$me->id}}" @if($menu->parent_id == $me->id) selected @endif>{{$me->name}}</option>
                      
                    @endforeach
                  </select>
                </div>
                @endif
                <div class="form-group col-12 col-md-6">
                  <label for="exampleInputname">Thứ tự hiển thị</label>
                  <input type="number" name="oder" value="{{$menu->order}}" class="form-control border border-2 p-2" id="exampleInputname" placeholder="Nhập số" onfocus="focused(this)" onfocusout="defocused(this)">
                </div>
                <br/>
                <div class="form-group col-12 col-md-6">
                  <label for="exampleInputname">Hiển thị </label>
                  <select name="status">
                    <option>Chọn Ẩn/Hiển thị</option>
                    <option value="unpublic" @if($menu->status == "unpublic") selected @endif> Ẩn</option>
                    <option value="public" @if($menu->status == "public") selected @endif>Hiển thị</option>
                  </select>
                </div>
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
