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

                <form class="form-horizontal" role="form" method="POST" action="{{ url('/changepass') }}">
                        {{ csrf_field() }}
                        <input type="hidden" name="id" value="{{$id}}">
                        <input type="hidden" name="tocken" value="{{$token}}">
                  <p>Đổi mật khẩu:</p>
                  
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
                      Đổi mật khẩu</button>
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
