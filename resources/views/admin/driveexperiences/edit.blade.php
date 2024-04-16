<x-layout bodyClass="g-sidenav-show  bg-gray-200">
  <x-navbars.sidebar activePage='kieu-duong-lai'></x-navbars.sidebar>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <x-navbars.navs.auth titlePage="Thêm kiểu đường lái"></x-navbars.navs.auth>
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12 col-lg-8 m-auto">
          <div class="card">
            <div class="card-header">
              <h5 class="mb-0">Thêm kiểu đường lái</h5>
            </div>
            @if ($message = Session::get('success'))
            <div class="alert alert-success alert-block">
              {{$message}}
            </div>
            @endif
            <div class="col-12 text-end">
              <a class="btn bg-gradient-primary mb-0 me-4" href="{{url('admin/quan-ly-khac')}}">Quay lại danh sách kiểu đường lái</a>
            </div>
            <div class="card-body">
              <form method="POST" action="{{url('admin/kieu-duong-lai-edit')}}" class="d-flex flex-column align-items-center" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="drive_id" value="{{$drive->id}}">
                <div class="form-group col-12 col-md-8">
                  <label for="exampleInputname">Tên</label>
                  <input type="name" name="name" value="{{$drive->name}}" class="form-control border border-2 p-2" id="exampleInputname" placeholder="Tên kiểu đường lái" value="" onfocus="focused(this)" onfocusout="defocused(this)">
                </div>
                
                <div class="form-group col-12 col-md-8">
                  <label for="exampleInputname">Tên tiếng anh</label>
                  <input type="name" name="name_en" value="{{$drive->name_en}}" class="form-control border border-2 p-2" id="exampleInputname" placeholder="Tên kiểu đường lái" value="" onfocus="focused(this)" onfocusout="defocused(this)">
                </div>
                
                <div class="form-group col-12 col-md-8">
                  <label for="exampleInputname">Mô tả</label>
                  <textarea name="description" rows="5" class="form-control border border-2 p-2">{{$drive->description}}</textarea>
                  </div>
                
                <div class="form-group col-12 col-md-8">
                  <label for="exampleInputname">Mô tả  tiếng anh</label>
                  <textarea name="description_en" rows="5" class="form-control border border-2 p-2">{{$drive->description_en}}</textarea>
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
  @push('js')
  <script src="{{asset('assets/js/jquery-3.6.3.min.js')}}"></script>
  <script type="text/javascript">
  function addmorefeature(){
  $('#addmorefeature').append('<div class="form-group col-md-8">' +
                      '<label for="exampleInputname">Đặc trưng sản phẩm</label>' +
                      '<input type="name" name="features[]" class="form-control border border-2 p-2" id="exampleInputname" placeholder="Mô tả" value="" onfocus="focused(this)" onfocusout="defocused(this)">' +
                      '</div>' + 
                      '<div class="form-group col-md-3">' +
                      '<label for="exampleInputname">Ảnh</label>' +
                      '<div class="input-group hdtuto control-group lst increment" >' +
                            '<div class="list-input-hidden-upload">' +
                              '<input type="file" name="images[]" id="file_upload" class="myfrm form-control hidden">' +
                            '</div>' +
                          '</div>' +
                    '</div>');
  }
  </script>
  @endpush
</x-layout>
