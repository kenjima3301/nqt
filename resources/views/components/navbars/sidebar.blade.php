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
        <a class="nav-link text-white {{ $activePage == 'lop-xe-tai' ? ' active bg-gradient-dark' : '' }}  "
           href="{{url('admin/lop-xe-tai')}}">
          <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="fa fa-truck" aria-hidden="true"></i>
          </div>
          <span class="nav-link-text ms-1">Lốp xe tải</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white {{ $activePage == 'promotion' ? ' active bg-gradient-dark' : '' }}  "
           href="{{url('admin/promotion')}}">
          <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="fa fa-truck" aria-hidden="true"></i>
          </div>
          <span class="nav-link-text ms-1">Chương trình khuyến mại</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white {{ $activePage == 'dai-ly' ? ' active bg-gradient-dark' : '' }}  "
           href="{{url('admin/dai-ly')}}">
          <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="fa fa-store" aria-hidden="true"></i>
          </div>
          <span class="nav-link-text ms-1">Đại lý</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white {{ $activePage == 'bai-viet' ? ' active bg-gradient-dark' : '' }}  "
           href="{{url('admin/bai-viet')}}">
          <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="fa fa-blog"></i>
          </div>
          <span class="nav-link-text ms-1">Bài viết</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white {{ $activePage == 'quan-ly-khac' ? ' active bg-gradient-dark' : '' }}  "
           href="{{url('admin/quan-ly-khac')}}">
          <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="fa fa-tasks" aria-hidden="true"></i>
          </div>
          <span class="nav-link-text ms-1">Quản lý khác</span>
        </a>
      </li>
    </ul>
  </div>
</aside>
