@extends ('client.layouts.master')
@section('title', 'Công ty Cổ phần Ngọc Quyết Thắng | Nhà nhập khẩu các loại lốp xe uy tín và chất lượng')
@section('content')
        <!--<div class="container">-->
  <section class="h-100 gradient-form" >
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-xl-6">
        <div class="card rounded-3 text-black">
          <div class="row g-0">
            <div class="col-lg-12">
              <div class="card-body p-md-5 mx-md-4">

                <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                        {{ csrf_field() }}
                  <p>Đăng nhập:</p>

                  <div class="form-outline mb-4">
                    <label class="form-label" for="form2Example11">Nhập email/ số điện thoại</label>
                    <input id="email" type="text" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('username'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                    
                  </div>

                  <div class="form-outline mb-4">
                    <label class="form-label" for="form2Example22">Nhập mật khẩu</label>
                    <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                    
                  </div>

                  <div class="text-center pt-1 pb-1">
                    <button class="btn btn-block fa-lg gradient-custom-2 mb-3 text-white" style="background-color: #35A25B" type="submit">
                      Đăng nhập
                    </button>
                  </div>
                  
                </form>
                  <div class="text-right">
                    <a href="{{url('dang-ky-tai-khoan')}}" style="color:#35A25B">Đăng ký tài khoản</a>
                  </div>
                  <div class="text-right">
                    <a href="{{url('quen-mat-khau')}}" style="color:#35A25B">Quên mật khẩu?</a>
                  </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
