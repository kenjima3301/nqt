<x-layout bodyClass="g-sidenav-show  bg-gray-200">
  <x-navbars.dealersidebar activePage='bang-quan-tri'></x-navbars.dealersidebar>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <x-navbars.navs.auth titlePage="Bảng quản trị"></x-navbars.navs.auth>
    <div class="container-fluid py-4">
      <div class="row mt-4">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h5 class="mb-0">Số lượng xuất kho trong kỳ (ngày)</h5>
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
                @php
                  $total = 0;
                @endphp
            @foreach ($output as $tyre)
                @php
                  $total = $total + $tyre->quantity;
                @endphp
                @if($loop->last)
                <tr>
                  <td>
                    <div class="d-flex px-2 py-1">
                      <div class="d-flex flex-column justify-content-center">
                        <h6 class="mb-0 text-xs">{{$tyre->tyre->name}}</h6>
                        <p class="text-xs text-secondary mb-0">{{$tyre->tyre->brand->name}}
                        - {{$tyre->tyre->drive->name}}</p>
                      </div>
                    </div>
                  </td>
                  <td class="align-middle text-center text-sm">
                    <span class="badge badge-sm badge-success">{{$tyre->tyre->quantity + $total}}</span>
                  </td>
                  <td class="align-middle text-center text-sm">
                    <span class="badge badge-sm badge-danger">{{$total}}</span>
                  </td>
                  <td class="align-middle text-center text-sm">
                    <span class="badge badge-sm badge-warning">{{$tyre->tyre->quantity}}</span>
                  </td>
                </tr>
                @endif
            @endforeach
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
