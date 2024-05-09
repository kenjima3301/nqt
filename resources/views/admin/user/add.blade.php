<x-layout bodyClass="g-sidenav-show  bg-gray-200">
  <x-navbars.sidebar activePage='quan-ly-nguoi-dung'></x-navbars.sidebar>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <x-navbars.navs.auth titlePage="Thêm người dùng"></x-navbars.navs.auth>
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12 col-lg-8 m-auto">
          <div class="card">
            <div class="card-header">
              <h5 class="mb-0">Thêm người dùng</h5>
            </div>
            @if ($message = Session::get('success'))
            <div class="alert alert-success alert-block">
              {{$message}}
            </div>
            @endif
            <div class="col-12 text-end">
              <a class="btn bg-gradient-primary mb-0 me-4" href="{{url('admin/quan-ly-nguoi-dung')}}">Quay lại </a>
            </div>
            <div class="card-body">
              <form method="POST" action="{{url('admin/nguoi-dung-add')}}" class="d-flex flex-column align-items-center" enctype="multipart/form-data">
                @csrf
                <div class="form-group col-12 col-md-6">
                  <label for="exampleInputname">Tên</label>
                  <input type="name" name="name" class="form-control border border-2 p-2" id="exampleInputname" placeholder="Tên" value="" onfocus="focused(this)" onfocusout="defocused(this)">
                </div>
                <br/>
                <div class="form-group col-12 col-md-6">
                  <label for="exampleInputname">Email</label>
                  <input type="name" name="email" class="form-control border border-2 p-2" id="exampleInputname" placeholder="Email" value="" onfocus="focused(this)" onfocusout="defocused(this)">
                </div>
                <br/>
                <div class="form-group col-12 col-md-6">
                  <label for="exampleInputname">Phone</label>
                  <input type="name" name="phone" class="form-control border border-2 p-2" id="exampleInputname" placeholder="Phone" value="" onfocus="focused(this)" onfocusout="defocused(this)">
                </div>
                <br/>
                <div class="form-group col-12 col-md-6">
                  <label for="exampleInputname">Password</label>
                  <input type="name" name="password" class="form-control border border-2 p-2" id="exampleInputname" placeholder="Password" value="" onfocus="focused(this)" onfocusout="defocused(this)">
                </div>
                <br/>
                <div class="form-group col-12 col-md-6">
                <label for="exampleInputname">Chọn kiểu người dùng hiển thị</label>
                  <select name="role">
                    @foreach($roles as $role)
                      <option value="{{$role->id}}" @if($role->id==3) selected @endif>{{$role->description}}</option>
                    @endforeach
                  </select>
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
