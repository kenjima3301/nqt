@extends ('client.layouts.master')
@section('title', 'NQT - Thanh toán')
@section('content')
<div class="container mt-4">

    <div class="row">
        <!-- 9-column checkout form -->
        
        <div class="col-lg-7 mt-4">
          <form method="POST" action="{{url('client/xac-nhan-don-hang')}}">
            @csrf
            <input type="hidden" name="order_id" value="{{$order->id}}">
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="card-title bold">Thông tin người mua hàng <p class="sub-title mt">Nhập đầy đủ thông tin người mua hàng</p></h5>
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
                                <option value="{{$id}}" @if(isset($user->profile) && $user->profile->city == $id) selected @endif>{{ $item['name']}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label" for="loginPassword">Quận / Huyện</label>
                            <select name="district" class="form-control" id="quan-huyen" onchange="getSubData(this,'xa-phuong')" required>
                            @if($district != '')
                                <option value=""> -- Lựa Chọn -- </option>
                                @foreach($district as $id => $item)
                                <option value="{{$id}}" @if(isset($user->profile) && $user->profile->district == $id) selected @endif>{{ $item['name']}}</option>
                                @endforeach
                              @endif
                            </select>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label" for="loginPassword">Phường / Xã</label>
                            <select name="commune" class="form-control" id="xa-phuong" required>
                              
                              @if($commune != '')
                                <option value=""> -- Lựa Chọn -- </option>
                                @foreach($commune as $id => $item)
                                <option value="{{$id}}" @if(isset($user->profile) && $user->profile->commune == $id) selected @endif>{{ $item['name']}}</option>
                                @endforeach
                              @endif
                            </select>
                        </div>
                    </div>

                    <div class="row form-outline mb-2">
                        <div class="col-md-12">
                            <label class="form-label" for="loginName">Địa chỉ</label>
                            <input type="text" name="address" id="loginName" class="form-control @error('name') is-invalid input-error @enderror" value="{{$user->profile->address ?? ''}}" required/>
                            @error('name')
                            <span class="alert-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        
                    </div>
                    <div class="row form-outline mb-2">
                        <div class="col-md-12">
                            <label class="form-label" for="loginName">Ghi chú:</label>
                            <textarea class="form-control" name="note" rows="4"/></textarea>
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
                    <h5 class="card-title bold">Thông tin thánh toán <p class="sub-title">Chọn phương thức thanh toán!</p></h5>

                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="payment" id="flexRadioDefault1" value="Thanh toán khi nhận hàng" checked>
                        <label class="form-check-label" for="flexRadioDefault1">
                           Thanh toán khi nhận hàng
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="payment" value="Chuyển khoản" id="flexRadioDefault2" >
                        <label class="form-check-label" for="flexRadioDefault2">
                            Chuyển khoản
                        </label>
                    </div>

                    
                </div>
            </div>
            <div class="card mb-4"><input type="submit" class="btn btn-success" value="Đặt hàng"></div>
          </form>
        </div>
        
        <!-- 3-column summary -->
        <div class="col-lg-5">
            <div class="card mb-4 mt-4">
                <div class="card-body">
                    <h5 class="card-title">Thông tin sản phẩm <p class="sub-title">Có tổng: {{count($order->tyres)}} sản phẩm</p></h5>
                    @php 
                      $total = 0;
                      @endphp
                    @foreach ($order->tyres as $tyre)
                    <div class="row mt-4">
                      <div class="col-lg-2">
                            {{$tyre->dimention->tyre->name}}
                        </div>
                        <div class="col-lg-4">
                            {{$tyre->dimention->size}}
                        </div>
                        <div class="col-lg-1">
                            <h5 class="text-center">{{$tyre->quantity}}</h5>
                        </div>
                      <div class="col-lg-5">
                            <h5 class="text-center">{{intval($tyre->dimention->price) * intval($tyre->quantity)}} đ</h5>
                            @php 
                            $total = $total + (intval($tyre->dimention->price) * intval($tyre->quantity));
                            @endphp
                        </div>
                    </div>
                     @endforeach
                    <table class="table text-center table-borderless border-top mt-4">
                        <tbody>
                        <tr>
                            <td>Tổng</td>
                            <td>{{$total}} đ</td>
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
                            <h5>{{$total}} đ</h5>
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