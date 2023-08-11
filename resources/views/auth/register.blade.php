@extends ('client.layouts.master')
@section('title', 'NQT - Trang chủ')
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
                @if (\Session::has('message'))
                  <div class="alert alert-info">
                          <span>{!! \Session::get('message') !!}</span>
                  </div>
                  @endif
                <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                        {{ csrf_field() }}
                  <p>Đăng ký:</p>
                   <div class="form-outline mb-4">
                    <label class="form-label" for="form2Example11">Nhập tên đầy đủ </label>
                    <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('username'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                    
                  </div>
                  <div class="form-outline mb-4">
                    <label class="form-label" for="form2Example11">Nhập email  </label>
                    <span style="font-size: 11px">(Email được dùng để kích hoạt tài khoản trươc khi đăng nhập)</span>
                    <input id="email" type="text" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('username'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                    
                  </div>
                  <div class="form-outline mb-4">
                    <label class="form-label" for="form2Example11">Nhập số điện thoại</label>
                    <input id="phone" type="text" class="form-control" name="phone" value="{{ old('phone') }}" required autofocus>

                                @if ($errors->has('username'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
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
                  <div class="form-outline mb-4">
                    <label class="form-label" for="form2Example22">Xác nhận lại mật khẩu</label>
                    <input id="password_confirm" type="password" class="form-control" name="password_confirm" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirm') }}</strong>
                                    </span>
                                @endif
                    
                  </div>

                  <div class="text-center pt-1 pb-1">
                    <button class="btn btn-block fa-lg gradient-custom-2 mb-3 text-white" style="background-color: #35A25B" type="submit">
                      Đăng ký</button>
                  </div>
                  
                </form>
                  <div class="text-right">
                    <a href="{{url('login')}}" style="color:#35A25B">Đăng nhập</a>
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
