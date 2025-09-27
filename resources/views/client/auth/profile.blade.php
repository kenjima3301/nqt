@extends ('client.layouts.master')
@section('title', 'Công ty Cổ phần Ngọc Quyết Thắng | Nhà nhập khẩu các loại lốp xe uy tín và chất lượng')
@section('content')
<div class="container mt-4">

    <div class="row">
      <!-- 3-column summary -->
        <div class="col-lg-3">
            <div class="card mb-4 mt-4">
                <div class="card-body">
                  <h5 class="card-title"><a href="{{url('client/profile')}}">Thông tin người dùng</a></h5>
                  <h5 class="card-title"><a href="{{url('client/don-hang')}}">Đơn hàng</a></h5>
                </div>
            </div>
        </div>
        <!-- 9-column checkout form -->
        <div class="col-lg-9 mt-4">
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="card-title bold">Thông tin</h5>
                    <form action="{{url('client/updateprofile')}}" method="POST">
                      @csrf
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
                    <div class="col-md-12 text-center">
                      <input type="submit" value="Cập nhật hồ sơ" class="btn btn-success">
                    </div>
                    </form>
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
