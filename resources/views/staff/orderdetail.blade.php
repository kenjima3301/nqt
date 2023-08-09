<x-layout bodyClass="g-sidenav-show  bg-gray-200">
  <x-navbars.staffsidebar activePage='don-hang-online'></x-navbars.staffsidebar>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <x-navbars.navs.auth titlePage="Đơn hàng online"></x-navbars.navs.auth>
<div class="container mt-4">

    <div class="row"  id='print'>
        <!-- 9-column checkout form -->
        <div class="col-lg-12 mt-4">
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="card-title bold">Đơn hàng {{$order->order_code}} 
                      <span class="btn bg-light mb-0 text-end avoid-this" id="indon" onclick="printorder()"> In đơn hàng! </span></h5>
                    <div class=" mb-4">
                    <div class="row form-outline mb-2 mt-4">
                        <div class="col-md-12">
                            <label class="form-label" for="loginName">Tên: </label>
                            {{$order->name}}
                        </div>
                        <div class="col-md-12">
                            <label class="form-label" for="loginName">Số điện thoại:</label>
                            {{$order->phone}}
                        </div>
                    </div>

                    <div class="row form-outline mb-2">
                        <div class="col-md-12">
                            <label class="form-label" for="loginName">Địa chỉ:</label>
                            {{$order->address}}
                        </div>
                        
                    </div>
                    <div class="row form-outline mb-2">
                        <div class="col-md-12">
                            <label class="form-label" for="loginName">Ghi chú:</label>
                            {{$order->note}}
                        </div>
                        
                    </div>
                  <div class="row form-outline mb-2">
                        <div class="col-md-12">
                            <label class="form-label" for="loginName">Thanh toán:</label>
                            {{$order->payment}}
                        </div>
                        
                    </div>
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
                        <th scope="col text-center">Thành tiền</th>
                        </tr>
                    </thead>
                    <tbody>
                      @php 
                      $total = 0;
                      @endphp
                      @foreach($order->tyres as $tyre)
                        <tr>
                            <th scope="row">{{ $loop->index +1 }} </th>
                            <td>{{$tyre->dimention->size}}</td>
                            <td>{{$tyre->dimention->tyre->name}}</td>
                            <td>{{$tyre->dimention->ply}}</td>
                            <td>{{$tyre->dimention->sevice_index}}</td>
                            <td>
                                {{$tyre->quantity}}
                            </td>
                            <td>{{$tyre->dimention->unit}}</td>
                            <td>{{intval($tyre->dimention->price) * intval($tyre->quantity)}} đ</td>
                            @php 
                            $total = $total + (intval($tyre->dimention->price) * intval($tyre->quantity));
                            @endphp
                        </tr>
                       @endforeach
                       <tr>
                         <th colspan="6"></th>
                            <th scope="col text-right"> Tổng: </th>
                            <th>{{$total}} đ</th>
                        </tr>
                    </tbody>
                </table>
            </div>
                </div>
            </div>

            
        </div>
    </div>
    
</div>
</main>
<style>
@media print 
{
    @page {
      size: A4; /* DIN A4 standard, Europe */
      margin: 0 10mm;
    }
    html, body {
        width: 210mm;
        /* height: 297mm; */
        height: 297mm;
        font-size: 17px;
        background: #FFF;
        overflow: visible;
    }
    body {
        padding-top: 0mm;
        visibility: hidden;
    }
    #print, #print * {
                visibility: visible;
                height: auto !important
            }

            #print {
                position: absolute;
                left: 0;
                top: 0;

            }
}
</style>
  @push('js')
  <script src="{{asset('assets/js/jquery-3.6.3.min.js')}}"></script>
  <script src="{{asset('assets/js/jQuery.print.js')}}"></script>
<script>
  function printorder(){
    $("#print").print({
      noPrintSelector : ".avoid-this",
    });
  }
</script>
 @endpush
</x-layout>
