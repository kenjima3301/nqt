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
           href="{{url('dealer/bang-quan-tri')}}">
          <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="fa fa-tire" aria-hidden="true"></i>
          </div>
          <span class="nav-link-text ms-1">Xuất kho trong kỳ</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white {{ $activePage == 'xuat-hang-tu-NQT' ? ' active bg-gradient-dark' : '' }}  "
           href="{{url('dealer/xuat-hang-tu-NQT')}}">
          <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="fa fa-tire" aria-hidden="true"></i>
          </div>
          <span class="nav-link-text ms-1">Nhập hàng từ NQT</span>
        </a>
      </li>
      
      <li class="nav-item">
        <a class="nav-link text-white {{ $activePage == 'dealer/kho-hang' ? ' active bg-gradient-dark' : '' }}  "
           href="{{url('dealer/kho-hang')}}">
          <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="fa fa-tire" aria-hidden="true"></i>
          </div>
          <span class="nav-link-text ms-1">Thống kê kho hàng</span>
        </a>
      </li>
      
      <li class="nav-item">
        <a class="nav-link text-white {{ $activePage == 'dealer/xuat-hang-cho-khach' ? ' active bg-gradient-dark' : '' }}  "
           href="{{url('dealer/xuat-hang-cho-khach')}}">
          <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="fa fa-tire" aria-hidden="true"></i>
          </div>
          <span class="nav-link-text ms-1">Xuất hàng cho khách</span>
        </a>
      </li>
     
    </ul>
  </div>
</aside>
