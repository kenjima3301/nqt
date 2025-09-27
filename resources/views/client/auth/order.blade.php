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
                    <h5 class="card-title bold">Đơn hàng</h5>
                    <table class="table table-border">
                      <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Mã đơn hàng</th>
                        <th scope="col">Ghi chú</th>
                        <th scope="col">Ngày đặt hàng</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach($orders as $order)
                            <tr>
                              <th>{{$loop->index +1}}</th>
                              <th><a href="{{url('client/don-hang-chi-tiet/'.$order->id)}}">{{$order->order_code}}</a></th>
                                <td>{{$order->note}}</td>
                                <td>{{$order->created_at->format('d-m-Y')}}</td>
                            </tr>
                    
                    @endforeach
                    </tbody>
                    </table>
                </div>
            </div>

            
        </div>
    </div>
    
</div>
@endsection
