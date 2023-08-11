<x-layout bodyClass="g-sidenav-show  bg-gray-200">
  <x-navbars.staffsidebar activePage='don-hang-online'></x-navbars.staffsidebar>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <x-navbars.navs.auth titlePage="Đơn hàng online"></x-navbars.navs.auth>
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
                <select class="dataTable-selector" id="select_status">
                  <option href="{{url('staff/don-hang-online')}}" @selected($status[$activepage] == 'dat')>Đơn mới</option>
                  <option href="{{url('staff/don-hang-online-dang-giao')}}" @selected($status[$activepage] == 'xuat')>Đơn đang giao</option>
                  <option href="{{url('staff/don-hang-online-hoan-thanh')}}" @selected($status[$activepage] == 'giao')>Đơn hoàn thành</option>
                  <option href="{{url('staff/don-hang-online-huy')}}" @selected($status[$activepage] == 'huy')>Đơn hủy</option>
                </select>
            </div>
            <div class="card-body p-3 position-relative">
              <div class="row">
                <div class="col-12 text-start">
                  <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Mã đơn hàng</th>
                        <th scope="col">Tên</th>
                        <th scope="col">Phone</th>
                        <th>Địa chỉ</th>
                        <th>Số sản phẩm</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($orders as $order)
                      <tr>
                        <td>{{$loop->index + 1}}</td>
                        <th><a href="{{url('staff/chi-tiet-don-online/'.$order->id)}}">{{$order->order_code}}</a></th>
                        <td>{{$order->name}}</td>
                        <td>{{$order->phone}}</td>
                        <td>{{$order->address}}</td>
                        <td>{{count($order->tyres)}}</td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            
          </div>
           
        </div>
      </div>
    </div>
  </main>
 @push('js')
 <script src="{{asset('assets/js/jquery-3.6.3.min.js')}}"></script>
  <script type="text/javascript">
    $(document).ready(function() {
      $("#select_status").change(function () {
          href = $(this).find('option:selected').attr("href");
          window.location.href = href;
        });
    });
  </script>
   @endpush
</x-layout>

