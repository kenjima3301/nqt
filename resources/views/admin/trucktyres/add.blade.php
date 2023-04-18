<x-layout bodyClass="g-sidenav-show  bg-gray-200">
  <x-navbars.sidebar activePage='lop-xe-tai'></x-navbars.sidebar>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <x-navbars.navs.auth titlePage="Thêm lốp xe"></x-navbars.navs.auth>
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12 col-lg-8 m-auto">
          <div class="card">
            <div class="card-header">
              <h5 class="mb-0">Thêm lốp xe</h5>
            </div>
            @if ($message = Session::get('success'))
            <div class="alert alert-success alert-block">
              {{$message}}
            </div>
            @endif
            <div class="col-12 text-end">
              <a class="btn bg-gradient-primary mb-0 me-4" href="{{url('admin/lop-xe-tai')}}">Quay lại danh sách lốp xe</a>
            </div>
            <div class="card-body">
              <form method="POST" action="{{url('admin/lop-xe-tai-add')}}" class="d-flex flex-column align-items-center" enctype="multipart/form-data">
                @csrf
                <div class="form-group col-12 col-md-8">
                  <label for="exampleInputname">Mã gai</label>
                  <input type="name" name="name" value="{{ $errors->first('name')}}" class="form-control border border-2 p-2" id="exampleInputname" placeholder="Mã gai" value="" onfocus="focused(this)" onfocusout="defocused(this)">
                </div>
                <div class="row col-12 col-md-8">
                <div class="form-group col-md-3">
                            <label for="exampleInputname">Chọn loại xe</label>
                            <select class="form-control" name="model_id" id="model_id">
                              @foreach($models as $model)
                              <option value="{{$model->id}}">{{$model->name}}</option>
                              @endforeach 
                            </select>
                          </div>
                <div class="form-group col-12 col-md-3">
                            <label for="exampleInputname">Chọn nhà sản xuất</label>
                            <select class="form-control" name="brand_id" id="brand_id">
                              @foreach($brands as $brand)
                              <option value="{{$brand->id}}">{{$brand->name}}</option>
                              @endforeach 
                            </select>
                          </div>
                <div class="form-group col-12 col-md-3">
                            <label for="exampleInputname">Chọn kiểu đường lái</label>
                            <select class="form-control" name="drive_id" id="drive_id">
                              @foreach($drives as $drive)
                              <option value="{{$drive->id}}">{{$drive->name}}</option>
                              @endforeach 
                            </select>
                          </div>
                </div>
                <div class="form-group col-12 col-md-8">
                      <label for="exampleInputname">Cấu trúc lốp</label>
                      <select class="form-control" name="tyre_structure" id="tyre_structure">
                              <option value="STEER/TRAILER">STEER/TRAILER</option>
                              <option value="DRIVE">DRIVE</option>
                              <option value="TRAILER">TRAILER</option>
                            </select>
                    </div>
                <div class="form-group col-12 col-md-8">
                      <label for="exampleInputname">Đặc trưng sản phẩm</label>
                      <div class="row">
                      <div class="col-8">
                        <input type="name" name="features[]" value="{{ $errors->first('name')}}" class="form-control border border-2 p-2" id="exampleInputname" placeholder="Mô tả" value="" onfocus="focused(this)" onfocusout="defocused(this)">
                      </div>
                      <div class="col-4">
                      <button class="btn btn-outline-secondary mb-3 mb-md-0 ms-auto" type="button" name="button" onclick="addmorefeature()">Thêm đặc trưng</button>
                      </div>
                        <div class="col-8">
                      <div id="addmorefeature"></div>
                        </div>
                      </div>
                </div>
                <br/>
                <div class="form-group col-md-8">
                  <label for="exampleInputname">Đăng ảnh kiểu xe và vị trí lắp đặt</label>
                  <div class="input-group hdtuto control-group lst increment" >
                        <div class="list-input-hidden-upload">
                          <input type="file" name="install" id="" class="myfrm form-control">
                        </div>
                      </div>
                </div>
                <br/>
                <div class="form-group col-md-8">
                  <label for="exampleInputname">Đăng ảnh lốp</label>
                  <div class="input-group hdtuto control-group lst increment" >
                        <div class="list-input-hidden-upload">
                          <input multiple type="file" name="filenames[]" id="file_upload" class="myfrm form-control hidden">
                        </div>
                        <div class="input-group-btn"> 
                          <button class="btn btn-success btn-add-image" type="button"><i class="fldemo glyphicon glyphicon-plus"></i>+Add image</button>
                        </div>
                      </div>
                  <div class="list-images"></div>
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
  <style>
    .list-images {
        width: 50%;
        margin-top: 20px;
        display: inline-block;
    }
    .hidden { display: none; }
    .box-image {
        width: 100px;
        height: 108px;
        position: relative;
        float: left;
        margin-left: 5px;
    }
    .box-image img {
        width: 100px;
        height: 100px;
    }
    .wrap-btn-delete {
        position: absolute;
        top: -8px;
        right: 0;
        height: 2px;
        font-size: 20px;
        font-weight: bold;
        color: red;
    }
    .btn-delete-image {
        cursor: pointer;
    }
    .table {
        width: 15%;
    }
  </style>
  @push('js')
  <script src="{{asset('assets/js/jquery-3.6.3.min.js')}}"></script>
  <script type="text/javascript">
$(document).ready(function () {
  $(".btn-add-image").click(function () {
    $('#file_upload').trigger('click');
  });
  
  $('button[data-href]').on("click", function() {
            document.location = $(this).data('href');
        });
        
  $('.list-input-hidden-upload').on('change', '#file_upload', function (event) {
    $.each( event.target.files, function( key, value ) {
      let today = new Date();
      let time = today.getTime();
      let image = event.target.files[key];
      let file_name = event.target.files[key].name;
      let box_image = $('<div class="box-image"></div>');
      box_image.append('<img src="' + URL.createObjectURL(image) + '" class="picture-box">');
      box_image.append('<div class="wrap-btn-delete"><span data-id=' + time + ' class="btn-delete-image">x</span></div>');
      $(".list-images").append(box_image);

      $(this).removeAttr('id');
      $(this).attr('id', time);
      let input_type_file = '<input type="file" name="filenames[]" id="file_upload" class="myfrm form-control hidden">';
      $('.list-input-hidden-upload').append(input_type_file);
    });
  });

  $(".list-images").on('click', '.btn-delete-image', function () {
    let id = $(this).data('id');
    $('#' + id).remove();
    $(this).parents('.box-image').remove();
  });
});

function addmorefeature(){
  $('#addmorefeature').append('<input type="name" name="features[]" value="" class="form-control border border-2 p-2" id="exampleInputname" placeholder="Mô tả" onfocus="focused(this)" onfocusout="defocused(this)">');
}
  </script>
  @endpush
</x-layout>
