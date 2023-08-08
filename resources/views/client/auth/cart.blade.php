@extends ('client.layouts.master')
@section('title', 'NQT - Giỏ hàng')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 mt-3">
        <!-- Product List -->
        <div class="card mb-3">
            <div class="card-header text-center">
               <h4>Giỏ hàng</h4>
            </div>
          @if($order)
            <div class="card-body">
               <h4>Mã đơn hàng: {{$order->order_code}} </h4>
                <table class="table">
                    <thead>
                        <tr>
                        <th scope="col text-center">#</th>
                        <th scope="col text-center">Quy cách</th>
                        <th scope="col text-center">Mẫu gai</th>
                        <th scope="col text-center">Số lớp bố</th>
                        <th scope="col text-center">Chỉ số tải trọng và tốc độ</th>
                        <th scope="col text-center">Số lượng</th>
                        <th scope="col text-center">Đơn vị</th>
                        <th scope="col text-center">Đơn giá</th>
                        <th scope="col text-center">Thành tiền</th>
                        <th scope="col text-center">Xoá</th>
                        </tr>
                    </thead>
                    <tbody>
                      @foreach($order->tyres as $tyre)
                        <tr>
                            <th scope="row">{{ $loop->index +1 }} </th>
                            <td>{{$tyre->dimention->size}}</td>
                            <td>{{$tyre->dimention->tyre->name}}</td>
                            <td>16PR</td>
                            <td>{{$tyre->dimention->sevice_index}}</td>
                            <td>
                              <div class="quantity">
                        <button class="btn minus1" onclick="decreasequantity({{$tyre->id}})">-</button>
                          <input type="number" name="{{$tyre->id}}" class="quantity" id="{{$tyre->id}}" value="{{$tyre->quantity}}" size="4" width="10%">
                        <button class="btn add1" onclick="increasequantity({{$tyre->id}})">+</button>
                      </div>
                            </td>
                            <td>Cái</td>
                            <td>100.000 đ</td>
                            <td>100.000 đ</td>
                            <td><a href="{{url('client/xoa-san-phan-gio-hang/'.$tyre->id)}}"><i class="fa-light fa-rectangle-xmark text-danger"></i></a></td>
                        </tr>
                       @endforeach
                    </tbody>
                </table>
            </div>
          @else 
          <div class="card-body">
            <h4>Chưa có sản phẩm nào trong giỏ hàng</h4>
          </div>
          @endif
        </div>

        <!-- Add more products here -->

        </div>
        <div class="col-md-8">
            <div class="col-md-3 keep-buying">
                <a href="{{url('')}}" class="btn btn-primary back-ground">Tiếp tục mua hàng</a>
            </div>
        </div>
      @if($order)
        <div class="col-md-4">
            <!-- Total Order Information -->
            <div class="card">
                <div class="card-header text-center">
                    <h4>Tổng tiền</h4>
                </div>
                <div class="card-body">
                    <!-- <p class="card-text">Tô: $0.00</p>
                    <p class="card-text">Tax: $0.00</p> -->
                    <!-- <p>Tổng: 300.000 đ</p> -->
                    <table class="table table-borderless text-center">
                        <tbody>
                            <tr>
                                <th>Tổng</th>
                                <td>300.000 đ</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <a href="{{url('client/thanh-toan')}}"><div class="card-footer text-center text-white">
                    Thanh toán
                </div></a>
            </div>
        </div>
      @endif
    </div>
</div>
@endsection
@section('script')
<script>
  $( document ).ready(function() {
    $('input[name=change_total]').change(function() {
     let newtotal = $(this).val();
     let accessory_id = $(this).attr("id");
     add_quantity_to_total(accessory_id,newtotal);
    });
  });
function increasequantity(id){
  let total = $('input[name='+id+']').val();
//  let maxtotal = {{2 ?? ''}};
//  if(total < maxtotal) {
    newtotal = parseInt(total) + 1;
    $('input[name='+id+']').val(newtotal);
    add_quantity_to_total(id, newtotal);
//  }
}

function decreasequantity(id){
  let total = $('input[name='+id+']').val();
  if(total > 1) {
    newtotal = parseInt(total) - 1;
    $('input[name='+id+']').val(newtotal);
    add_quantity_to_total(id, newtotal);
  }
}
function add_quantity_to_total(dimention_id,newtotal) {
            $.ajax({
                  url:'{{url("add_quantity_to_total")}}',
                  type:'post',
                  data:'dimention_id=' + dimention_id + '&total=' + newtotal + '&_token={{csrf_token()}}',
                  success:function(result){
                    window.location.reload();
                  }
              });
    } 
</script>
<!--<script>
    // jQuery code to handle quality increase and decrease
    $(document).ready(function() {
      const qualityValue = $("#quality-value");
      const increaseBtn = $("#increase-btn");
      const decreaseBtn = $("#decrease-btn");

      let currentQuality = parseInt(qualityValue.text());

      increaseBtn.on("click", function() {
        currentQuality++;
        updateQuality(currentQuality);
      });

      decreaseBtn.on("click", function() {
        if (currentQuality > 0) {
          currentQuality--;
          updateQuality(currentQuality);
        }
      });

      function updateQuality(value) {
        qualityValue.text(value);
      }
    });
</script>-->
@endsection