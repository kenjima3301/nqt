<x-layout bodyClass="g-sidenav-show  bg-gray-200">
  <x-navbars.sidebar activePage='admin/lop-xe-tai'></x-navbars.sidebar>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <x-navbars.navs.auth titlePage="Import Sai"></x-navbars.navs.auth>
    <div class="container-fluid py-4">
      <div class="row mt-4">
        
        <div class="row bg-white">
          <div class="col-12 text-end">
          <a href="{{ url('admin/lop-xe-tai-import/'.$dimention->tyre_id)}}" class="btn btn-success">Quy lại mã Gai</a>
           </div>          
          <table class=" table-responsive text-center">
                      <thead>
                            <tr>
                              <th rowspan="3" width="3%">Nước sản xuất</th>
                                <th  rowspan="3">Quy cách</th>
                                <th  rowspan="3">Lớp bố</th>
                                <th rowspan="3">Chỉ số tải trọng và tốc độ</th>
                                <th rowspan="3">Đơn vị</th>
                                <th rowspan="3">Kiểu gai</th>
                                <th rowspan="3">Số lượng</th>
                                <th rowspan="3">Đơn giá</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                          
                              <tr class="@if(isset($dimention->madeins[0]) && count($dimention->madeins) == 2){{'bothflag'}}@elseif(isset($dimention->madeins[0]) && $dimention->madeins[0]->country->name == 'Thailand'){{'thai'}}@elseif(isset($dimention->madeins[0]) && $dimention->madeins[0]->country->name == 'China'){{'china'}}@endif">
                                <form action="{{url('admin/lop-xe-tai-quy-cach-update')}}" method="POST">  
                                  @csrf
                                  <input type='hidden' name="id" value="{{$dimention->id}}">
                                <td class="text-left">
                                  <select name="country_id">
                                    @foreach ($countries as $country)
                                    <option value="{{$country->id}}"> {{$country->name}}</option>
                                    @endforeach
                                  </select>
                                  </td>
                                  <td><input type="text" name="size" size="10" value="{{$dimention->size}}"></td>
                                  <td><input type="text" name="ply" size="10" value="{{$dimention->ply}}"></td>
                                  <td><input type="text" name="sevice_index" size="10" value="{{$dimention->sevice_index}}"></td>
                                  <td><input type="text" name="unit" size="10" value="{{$dimention->unit}}"></td>
                                  <td><input type="text" name="tread_type" size="10" value="{{$dimention->tread_type}}"></td>
                                  <td><input type="number" name="total" size="10" value="{{$dimention->total}}"></td>
                                  <td><input type="number" name="price" size="10" value="{{$dimention->price}}"></td>
                                  <td><input type="submit" value="Cập nhật">
                                  </td>
                                  </form>
                                  </tr>
                            
                        </tbody>
                    </table>
          <div class="form-group col-md-8 mt-4">
            <form method="POST" action="{{url('admin/quy-cach-chi-tiet/uploadimage')}}" class="d-flex flex-column align-items-center" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="dimention_id" value="{{$dimention->id}}">
                  <!--<label for="exampleInputname"></label>-->
                  <div class="input-group hdtuto control-group lst increment" >
                        <div class="list-input-hidden-upload">
                          <input multiple type="file" name="filenames[]" id="file_upload" class="myfrm form-control hidden">
                        </div>
                        <div class="input-group-btn"> 
                          <button class="btn btn-success btn-add-image" type="button"><i class="fldemo glyphicon glyphicon-plus"></i>+Thêm ảnh lốp</button>
                        </div>
                      </div>
                  <div class="list-images">
                      @foreach ($dimention->images as $image)
                          <div class="box-image">
                            <img src="{{asset($image->image)}}" class="picture-box">
                            <div class="wrap-btn-delete"><span data-id="{{ $image->id }}" class="btn-delete-image">x</span></div>
                            <input type="hidden" id="{{ $image->id }}" name="images_uploaded[]" value="{{ $image->id }}">
                          </div>
                          
                        @endforeach
                  </div>
                  <button type="submit" class="btn bg-gradient-primary mt-3">Lưu</button>
            </form>
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
  </script>
  @endpush
</x-layout>
