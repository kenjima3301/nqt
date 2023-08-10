<x-layout bodyClass="g-sidenav-show  bg-gray-200">
  <x-navbars.staffsidebar activePage='nhap-hang'></x-navbars.staffsidebar>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <x-navbars.navs.auth titlePage="Xác nhận nhập hàng"></x-navbars.navs.auth>
    <div class="container-fluid py-4">
      <div class="row mt-4">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h5 class="mb-0">Xác nhận nhập hàng </h5>
            </div>
            <div class="row">
              <div class="col-12 text-start">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>Hàng file import</th>
                        <th scope="col">Quy cách</th>
                        <th scope="col">Mẫu gai</th>
                        <th>Lớp bố</th>
                        <th>Chỉ số tải trọng và tốc độ</th>
                        <th scope="col">Số lượng</th>
                        <th>Giá</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($inputs as $input)
                        @if(isset($input->dimention))
                          <tr>
                            <td>{{$input->row_id}}</td>
                            <th>{{$input->dimention->size}}</th>
                            <td>{{$input->dimention->tyre->name}}</td>
                            <th>{{$input->dimention->ply}}</th>
                            <td>{{$input->dimention->sevice_index}}</td>
                            <td>{{$input->total}}</td>
                            <td>{{$input->price}}</td>
                          </tr>
                        @else
                        <tr style="background-color: red">
                            <td>{{$input->row_id}}</td>
                            <th></th>
                            <td></td>
                            <th></th>
                            <td></td>
                            <td>{{$input->total}}</td>
                            <td>{{$input->price}}</td>
                          </tr>
                        @endif
                      @endforeach
                    </tbody>
                  </table>
                </div>
            </div>
            <div class="row">
              <div class="col-12 text-start">
                <a href="{{url('staff/confirminput')}}" class="btn bg-success m-1 text-white text-end" >Xác nhận nhập hàng</a> 
              </div>
              <div class="col-12 text-start">
                <a href="{{url('staff/cancelinput')}}" class="btn bg-light m-1 text-end">Hủy nhập hàng</a>
              </div>
            </div>
            
          </div>
        </div>
      </div>
    </div>
  </main>
</x-layout>

