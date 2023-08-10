<x-layout bodyClass="g-sidenav-show  bg-gray-200">
  <x-navbars.dealersidebar activePage='bang-quan-tri'></x-navbars.dealersidebar>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <x-navbars.navs.auth titlePage="Xuất kho trong kỳ"></x-navbars.navs.auth>
    <div class="container-fluid py-4">
      <div class="row mt-4">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h5 class="mb-0">Số lượng xuất kho trong kỳ (ngày)</h5>
            </div>
            @if (\Session::has('message1'))
                <div class="alert alert-danger">
                        <span>{!! \Session::get('message1') !!}</span>
                </div>
              @endif
             <div class="d-sm-flex p-2 my-4">
              <form method="POST" action="{{url('dealer/findoutputbycode')}}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                  <div class="col-md-6">
                <input type="name" name="code" value="{{ $errors->first('name')}}" class="form-control border border-1 p-2" placeholder="Nhập mã đơn hàng" value="" onfocus="focused(this)" onfocusout="defocused(this)">
                  </div>
                  <div class="col-md-3">
                <button type="submit" class="btn bg-gradient-primary">Tìm</button>
                  </div>
                </div>
              </form>
            </div>
            <div class="table-responsive">
    <table class="table align-items-center mb-0">
      <thead>
        <tr>
          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Mã gai</th>
          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tồn kho đầu kỳ</th>
          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Xuất kho trong kỳ</th>
          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tồn kho cuối kỳ</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($outputs as $output)
                <tr>
                  <td>
                    <div class="d-flex px-2 py-1">
                      <div class="d-flex flex-column justify-content-center">
                        <h6 class="mb-0 text-xs">{{$output->dimention->tyre->name}}</h6>
                        <p class="text-xs text-secondary mb-0">{{$output->dimention->tyre->brand->name}}
                        - {{$output->dimention->tyre->drive->name}}</p>
                      </div>
                    </div>
                  </td>
                  <td class="align-middle text-center text-sm">
                    <span class="badge badge-sm badge-success">{{$output->dimention->tyre->quantity + $output->quantity}}</span>
                  </td>
                  <td class="align-middle text-center text-sm">
                    <span class="badge badge-sm badge-danger">{{$output->quantity}}</span>
                  </td>
                  <td class="align-middle text-center text-sm">
                    <span class="badge badge-sm badge-warning">{{$output->dimention->tyre->quantity}}</span>
                  </td>
                </tr>
        @endforeach
         </tbody>
    </table>
  </div>
          </div>
        </div>
      </div>
    </div>
  </main>
</x-layout>
