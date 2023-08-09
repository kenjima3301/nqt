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
              <form method="POST" action="{{url('admin/lop-xe-tai-sua-post')}}" class="d-flex flex-column align-items-center" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="tyre_id" value="{{$tyre->id}}">
                <div class="form-group col-12 col-md-8">
                  <label for="exampleInputname">Mã gai</label>
                  <input type="name" name="name" value="{{$tyre->name}}" class="form-control border border-2 p-2" id="exampleInputname" placeholder="Mã gai" value="" onfocus="focused(this)" onfocusout="defocused(this)">
                </div>
                <div class="row col-12 col-md-8">
                <div class="form-group col-md-3">
                            <label for="exampleInputname">Loại xe</label>
                            <select class="form-control" name="model_id" id="model_id">
                              <option value="">Chọn loại xe</option>
                              @foreach($models as $model)
                              <option @if($tyre->model_id == $model->id) selected @endif value="{{$model->id}}">{{$model->name}}</option>
                              @endforeach 
                            </select>
                          </div>
                <div class="form-group col-12 col-md-3">
                            <label for="exampleInputname">Nhà sản xuất</label>
                            <select class="form-control" name="brand_id" id="brand_id">
                              <option value="">Chọn nhà sản xuất</option>
                              @foreach($brands as $brand)
                              <option @if($tyre->brand_id == $brand->id) selected @endif value="{{$brand->id}}">{{$brand->name}}</option>
                              @endforeach 
                            </select>
                          </div>
                <div class="form-group col-12 col-md-3">
                            <label for="exampleInputname">Kiểu đường lái</label>
                            <select class="form-control" name="drive_id" id="drive_id">
                              <option value="">Chọn kiểu đường lái</option>
                              @foreach($drives as $drive)
                              <option @if($tyre->driveexperience_id == $drive->id) selected @endif value="{{$drive->id}}">{{$drive->name}}</option>
                              @endforeach 
                            </select>
                          </div>
                </div>
                <div class="form-group col-12 col-md-8">
                      <label for="exampleInputname">Cấu trúc lốp</label>
                      <select class="form-control" name="tyre_structure" id="tyre_structure">
                              <option value="">Chọn cấu trúc lốp</option>
                              <option @if($tyre->tyre_structure == 'STEER/TRAILER') selected @endif value="STEER/TRAILER">STEER/TRAILER</option>
                              <option @if($tyre->tyre_structure == 'DRIVE') selected @endif value="DRIVE">DRIVE</option>
                              <option @if($tyre->tyre_structure == 'TRAILER') selected @endif value="TRAILER">TRAILER</option>
                            </select>
                    </div>
                <div class="form-group col-12 col-md-8">
                      <label for="exampleInputname">Đặc trưng sản phẩm</label>
                      <div class="row">
                      <div class="col-8">
                        @foreach (json_decode($tyre->tyre_features, true) as $feature)
                          <input type="name" name="features[]" value="{{ $feature}}" class="form-control border border-2 p-2" id="exampleInputname" placeholder="Mô tả" value="" onfocus="focused(this)" onfocusout="defocused(this)">
                        
                        @endforeach
                        </div>
                      <div class="col-4">
                      <button class="btn btn-outline-secondary mb-3 mb-md-0 ms-auto" type="button" name="button" onclick="addmorefeature()">Thêm đặc trưng</button>
                      </div>
                        <div class="col-8">
                      <div id="addmorefeature"></div>
                        </div>
                      </div>
                </div>
                 <div class="form-group col-12 col-md-8">
                  <label for="exampleInputname">Giá sản phẩm</label>
                  <input type="name" name="price" value="{{ $errors->first('price')}}" class="form-control border border-2 p-2" id="exampleInputname" placeholder="Đơn giá đồng" value="" onfocus="focused(this)" onfocusout="defocused(this)">
                </div>
                <br/>
                <div class="form-group col-md-8">
                      @if($tyre->install_position_image != null)
                        <div class="col-sm-12">
                            <img src="{{asset($tyre->install_position_image)}}" class="img-fluid">
                        </div>
                        @endif
                        <br/>
                  <label for="exampleInputname">Thay ảnh kiểu xe và vị trí lắp đặt</label>
                  <div class="input-group hdtuto control-group lst increment" >
                        <div class="list-input-hidden-upload">
                          <input type="file" name="install" id="" class="myfrm form-control">
                        </div>
                  </div>
                </div>
                <br/>
                <div class="form-group col-md-8">
                  <label for="exampleInputname">Thêm ảnh lốp</label>
                  <div class="input-group hdtuto control-group lst increment" >
                        <div class="list-input-hidden-upload">
                          <input multiple type="file" name="filenames[]" id="file_upload" class="myfrm form-control hidden">
                        </div>
                        <div class="input-group-btn"> 
                          <button class="btn btn-success btn-add-image" type="button"><i class="fldemo glyphicon glyphicon-plus"></i>+Add image</button>
                        </div>
                      </div>
                  <div class="list-images">
                      @foreach ($tyre->images as $image)
                          <div class="box-image">
                            <img src="{{asset($image->image)}}" class="picture-box">
                            <div class="wrap-btn-delete"><span data-id="{{ $image->id }}" class="btn-delete-image">x</span></div>
                            <input type="hidden" id="{{ $image->id }}" name="images_uploaded[]" value="{{ $image->id }}">
                          </div>
                          
                        @endforeach
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
