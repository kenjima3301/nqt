@extends ('client.layouts.master')
@section('title', 'NQT - Thanh toán')
@section('content')
<div class="container mt-4">

    <div class="row">
        <!-- 9-column checkout form -->
        <div class="col-lg-8 mt-4">
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="card-title bold">Thông tin người mua hàng <p class="sub-title mt">Please enter your billing info</p></h5>
                    <div class="row form-outline mb-2 mt-4">
                        <div class="col-md-6">
                            <label class="form-label" for="loginName">Họ và Tên</label>
                            <input type="text" name="name" id="loginName" class="form-control @error('name') is-invalid input-error @enderror" value="{{$user->name ?? ''}}" required/>
                            @error('name')
                            <span class="alert-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="loginName">Số điện thoại</label>
                            <input type="text" name="phone" id="loginName" class="form-control @error('phone') is-invalid input-error @enderror" value="{{$user->phone ?? ''}}" required/>
                            @error('phone')
                            <span class="alert-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row form-outline mb-2 mt">
                        <div class="col-md-4">
                            <label class="form-label" for="loginPassword">Tỉnh / Thành Phố</label>
                            <select class="form-control @error('city') is-invalid input-error @enderror" name="city" id="tinh_tp" onchange="getSubData(this,'quan-huyen')" required>
                                <option value=""> -- Lựa Chọn -- </option>
                                @foreach($tinh as $id => $item)
                                <option value="{{$id}}">{{ $item['name']}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label" for="loginPassword">Quận / Huyện</label>
                            <select name="district" class="form-control" id="quan-huyen" onchange="getSubData(this,'xa-phuong')" required>
                            </select>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label" for="loginPassword">Phường / Xã</label>
                            <select name="commune" class="form-control" id="xa-phuong" required>
                            </select>
                        </div>
                    </div>

                    <div class="row form-outline mb-2">
                        <div class="col-md-12">
                            <label class="form-label" for="loginName">Địa chỉ</label>
                            <input type="text" name="name" id="loginName" class="form-control @error('name') is-invalid input-error @enderror" value="{{$user->name ?? ''}}" required/>
                            @error('name')
                            <span class="alert-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        
                    </div>
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="card-title bold">Thông tin thánh toán <p class="sub-title">We are getting to the end. Just few clicks and your rental is ready!</p></h5>

                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                        <label class="form-check-label" for="flexRadioDefault1">
                           Thanh toán khi nhận hàng
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                        <label class="form-check-label" for="flexRadioDefault2">
                            Chuyển khoản
                        </label>
                    </div>

                    <a href="#" class="btn btn-success mt-4">Đặt hàng</a>

                    <img src="" alt="">
                </div>
            </div>
        </div>

        <!-- 3-column summary -->
        <div class="col-lg-4">
            <div class="card mb-4 mt-4">
                <div class="card-body">
                    <h5 class="card-title">Thông tin sản phẩm <p class="sub-title">Prices may change depending on the length of the rental and the price of your rental car.</p></h5>
                    <div class="row mt-4">
                        <div class="col-lg-6">
                            <img src="{{ asset('client/assets/img/car1.png')}}" alt="" class="img-fluid">
                        </div>
                        <div class="col-lg-6">
                            <h5 class="text-center">Lốp xe</h5>
                        </div>
                    </div>

                    <table class="table text-center table-borderless border-top mt-4">
                        <tbody>
                        <tr>
                            <td>Tổng</td>
                            <td>100,000 đ</td>
                        </tr>
                        <tr>
                            <td>Thuế</td>
                            <td>0 đ</td>
                        </tr>
                        </tbody>
                    </table>

                    <div class="row form-outline mb-2">
                        <div class="col-md-12">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Nhập mã giảm giá" aria-label="Recipient's username" aria-describedby="basic-addon2">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary" type="button">Áp dụng</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mt">
                        <div class="col-lg-8">
                            <h5>Tổng <br> <p class="sub-title">Giá chưa bao gồm phí vận chuyển</p></h5>
                        </div>
                        <div class="col-lg-4 text-center">
                            <h5>100.000đ</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</div>
@endsection
@section('script')
<script>
    function getSubData(elem,folder_name){
      if (jQuery.type(elem ) === "object"){
          option_selected = jQuery(elem).val(); 
      }else{
        option_selected = elem;
      }
        jQuery.ajax({
                url: '{{ route("user.get_subdata")}}',
                type: 'POST',
                data: {
                    "_token": "{{ csrf_token() }}",
                    'folder_name' : folder_name,
                    'id' : option_selected
                },
                success: function (response) {

                    //jQuery('#'+folder_name).show()
                    // jQuery('.nice-select country_to_state country_select').style.display = "none"
                    if(folder_name == 'quan-huyen') {
                        jQuery('#xa-phuong').html('');
                        jQuery('#quan-huyen').html('');
                        jQuery('#xa-phuong').niceSelect('update');
                        jQuery('#quan-huyen').niceSelect('update');

                    }

                    jQuery('#'+folder_name).html(response)
                    jQuery('#'+folder_name).niceSelect('update');
                }
            });
    }
</script>
@endsection