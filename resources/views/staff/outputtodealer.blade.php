<x-layout bodyClass="g-sidenav-show  bg-gray-200">
  <x-navbars.staffsidebar activePage='xuat-hang-dai-ly'></x-navbars.staffsidebar>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <x-navbars.navs.auth titlePage="Xuất hàng cho đại lý"></x-navbars.navs.auth>
    <div class="container-fluid py-4">
      <div class="row mt-4">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h5 class="mb-0">Xuất hàng cho đại lý - Chọn đại lý</h5>
            </div>
            <div class="row">
               @foreach($dealers as $dealer)
              <div class="col-lg-2 col-sm-6 mb-2">
                <a href="{{url('staff/xuat-hang-dai-ly/'.$dealer->id)}}">
              <div class="card h-100">
              <div class="card-body">
              <div class="d-flex mb-4">
              <p class="mb-0"><img src="{{asset($dealer->image)}}" alt="Mike Anamendolla" class="mx-auto d-block img-fluid mw-20"></p>
              </div>
              </svg>
              <p class="mt-4 mb-0 font-weight-bold">{{ $dealer->name}}</p>
              <span class="text-xs">{{$dealer->address}}</span>
              <span class="text-xs">{{$dealer->email}}</span>
              <span class="text-xs">{{$dealer->phone}}</span>
              </div>
              </div>
                </a>
              </div>
                @endforeach

              </div>
          </div>
        </div>
      </div>
    </div>
  </main>
</x-layout>

