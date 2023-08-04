@props(['activePage'])

<aside
  class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-primary"
  id="sidenav-main">
  <div class="sidenav-header align-items-center text-center mt-2 mb-4">
    <a href="{{url('')}}">
    <img src="{{asset('assets/images/logo/NGOCQUYETTHANG_Logo.png')}}" alt="NQT logo" height="100">
    </a>
  </div>
  <hr class="horizontal light mt-0 mb-2">
  <div id="sidenav-collapse-main">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link text-white {{ $activePage == 'bang-quan-tri' ? ' active bg-gradient-dark' : '' }}  "
           href="{{url('staff/bang-quan-tri')}}">
          <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="fa fa-tire" aria-hidden="true"></i>
          </div>
          <span class="nav-link-text ms-1">Bảng quản trị</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white {{ $activePage == 'xuat-hang-dai-ly' ? ' active bg-gradient-dark' : '' }}  "
           href="{{url('staff/xuat-hang-dai-ly')}}">
          <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="fa fa-tire" aria-hidden="true"></i>
          </div>
          <span class="nav-link-text ms-1">Xuất hàng cho đại lý</span>
        </a>
      </li>
      <li class="nav-item mt-3">
        <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Danh sách hàng</h6>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white {{ $activePage == 'staff/trazano' ? ' active bg-gradient-dark' : '' }}  "
           href="{{url('staff/trazano')}}">
          <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="fa fa-tire" aria-hidden="true"></i>
          </div>
          <span class="nav-link-text ms-1">Lốp Trazano</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white {{ $activePage == 'staff/goldencrown' ? ' active bg-gradient-dark' : '' }}  "
           href="{{url('staff/goldencrown')}}">
          <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="fa fa-tire" aria-hidden="true"></i>
          </div>
          <span class="nav-link-text ms-1">Lốp Golden Crown</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white {{ $activePage == 'staff/othertyre' ? ' active bg-gradient-dark' : '' }}  "
           href="{{url('staff/othertyre')}}">
          <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="fa fa-tire" aria-hidden="true"></i>
          </div>
          <span class="nav-link-text ms-1">Lốp xe tải các nhãn hiệu khác</span>
        </a>
      </li>
    </ul>
  </div>
</aside>
