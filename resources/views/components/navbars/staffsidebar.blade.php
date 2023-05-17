@props(['activePage'])

<aside
  class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-primary"
  id="sidenav-main">
  <div class="sidenav-header align-items-center text-center mt-2 mb-4">
    <img src="{{asset('assets/images/logo/NGOCQUYETTHANG_Logo.png')}}" alt="NQT logo" height="100">
  </div>
  <hr class="horizontal light mt-0 mb-2">
  <div id="sidenav-collapse-main">
    <ul class="navbar-nav">
      
      <li class="nav-item">
        <a class="nav-link text-white {{ $activePage == 'bang-quan-tri' ? ' active bg-gradient-dark' : '' }}  "
           href="{{url('staff/bang-quan-tri')}}">
          <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="fa fa-dashboard" aria-hidden="true"></i>
          </div>
          <span class="nav-link-text ms-1">Bảng quản trị</span>
        </a>
      </li>
      
    </ul>
  </div>
</aside>
