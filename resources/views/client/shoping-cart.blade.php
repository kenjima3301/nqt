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
            <div class="card-body">
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
                        <tr>
                            <th scope="row">1</th>
                            <td>11R22.5</td>
                            <td>AS668</td>
                            <td>16PR</td>
                            <td>148/145L</td>
                            <td>
                                <input type="number" name="3" class="quantity" id="3" value="2" size="4" width="10%">
                            </td>
                            <td>Cái</td>
                            <td>100.000 đ</td>
                            <td>100.000 đ</td>
                            <td><a href=""><i class="fa-light fa-rectangle-xmark text-danger"></i></a></td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>11R22.5</td>
                            <td>AS668</td>
                            <td>16PR</td>
                            <td>148/145L</td>
                            <td>
                                <input type="number" name="3" class="quantity" id="3" value="2" size="4" width="10%">
                            </td>
                            <td>Cái</td>
                            <td>100.000 đ</td>
                            <td>100.000 đ</td>
                            <td><a><i class="fa-light fa-rectangle-xmark text-danger"></i></a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Add more products here -->

        </div>
        <div class="col-md-8">
            <div class="col-md-3 keep-buying">
                <a href="" class="btn btn-primary back-ground">Tiếp tục mua hàng</a>
            </div>
        </div>
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
                <div class="card-footer text-center">
                    <a href="">Thanh toán</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script>
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
</script>
@endsection