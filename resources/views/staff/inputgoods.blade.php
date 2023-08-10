<x-layout bodyClass="g-sidenav-show  bg-gray-200">
  <x-navbars.staffsidebar activePage='staff/nhap-hang'></x-navbars.staffsidebar>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <x-navbars.navs.auth titlePage="Nhập hàng"></x-navbars.navs.auth>
    <div class="container-fluid py-4">
      <div class="row mt-4">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h5 class="mb-0">Nhập hàng <a class="btn mb-2 me-4 text-end" href="{{url('staff/input-goods-download')}}"><i class="fa fa-download" aria-hidden="true"></i>
                    Tải mẫu import</a></h5>
            </div>
            <div class="col-lg-12 col-md-12 col-12 mt-2">
              <div class="card">
                <div class="card-body p-3 pt-2">
                  <form method="POST" action="{{url('staff/nhap-hang-import')}}" class="d-flex flex-column align-items-center" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group col-12 col-md-6">
                      <label for="exampleInputname">Import size </label>
                      <input type="file" name="importfile" class="form-control">
                    </div>
                    <button type="submit" class="btn bg-gradient-primary mt-3">Nhập hàng</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
</x-layout>

