<x-layout bodyClass="g-sidenav-show  bg-gray-200">
  <x-navbars.sidebar activePage='quan-ly-khac'></x-navbars.sidebar>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <x-navbars.navs.auth titlePage="Quản lý khác"></x-navbars.navs.auth>
    <div class="container-fluid py-4">
      
      <!-- Search and Filter Section -->
      <div class="row mb-4">
        <div class="col-12">
          <div class="card">
            <div class="card-body">
              <div class="row align-items-center">
                <div class="col-md-6">
                  <h5 class="mb-0">Tổng quan hệ thống</h5>
                  <p class="text-sm text-muted mb-0">Quản lý các thành phần cơ bản của hệ thống</p>
                </div>
                <div class="col-md-6">
                  <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-search"></i></span>
                    <input type="text" class="form-control" id="searchInput" placeholder="Tìm kiếm...">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-lg-12 position-relative z-index-2">
          
          <!-- Statistics Cards Row -->
          <div class="row mb-4">
            <div class="col-lg-3 col-md-6 col-sm-12 mb-3">
              <div class="card h-100">
                <div class="card-header p-3">
                  <div class="d-flex justify-content-between align-items-center">
                    <div>
                      <p class="text-sm mb-0 text-capitalize">Loại xe</p>
                      <h4 class="mb-0">{{count($models)}}</h4>
                    </div>
                  </div>
                </div>
                <hr class="dark horizontal my-0">
                <div class="card-footer p-3">
                  <a href="{{url('admin/loai-xe-add')}}" class="btn btn-sm btn-primary mb-2 w-100">
                    <i class="fas fa-plus me-1"></i>Thêm loại xe
                  </a>
                  <div class="scrollable-list" style="max-height: 200px; overflow-y: auto;">
                    @foreach ($models as $model)
                    <div class="d-flex justify-content-between align-items-center mb-1 p-2 rounded" style="background-color: #f8f9fa;">
                      <small class="text-truncate me-2">{{$model->name}} - {{$model->name_en}}</small>
                      <a href="{{url('admin/loai-xe-edit/'.$model->id)}}" class="btn btn-sm btn-outline-primary edit-btn" title="Chỉnh sửa">
                        <i class="fas fa-edit me-1"></i>Sửa
                      </a>
                    </div>
                    @endforeach
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 mb-3">
              <div class="card h-100">
                <div class="card-header p-3">
                  <div class="d-flex justify-content-between align-items-center">
                    <div>
                      <p class="text-sm mb-0 text-capitalize">Nước sản xuất</p>
                      <h4 class="mb-0">{{count($madeins)}}</h4>
                    </div>
                  </div>
                </div>
                <hr class="dark horizontal my-0">
                <div class="card-footer p-3">
                  <a href="{{url('admin/nuoc-san-xuat-add')}}" class="btn btn-sm btn-success mb-2 w-100">
                    <i class="fas fa-plus me-1"></i>Thêm Nước SX
                  </a>
                  <div class="scrollable-list" style="max-height: 200px; overflow-y: auto;">
                    @foreach ($madeins as $madein)
                    <div class="d-flex justify-content-between align-items-center mb-1 p-2 rounded" style="background-color: #f8f9fa;">
                      <div class="d-flex align-items-center">
                        <img src="{{asset($madein->flag)}}" width="16" height="12" class="me-2 rounded">
                        <small class="text-truncate">{{$madein->name}} - {{$madein->name_en}}</small>
                      </div>
                      <a href="{{url('admin/nuoc-san-xuat-edit/'.$madein->id)}}" class="btn btn-sm btn-outline-success edit-btn" title="Chỉnh sửa">
                        <i class="fas fa-edit me-1"></i>Sửa
                      </a>
                    </div>
                    @endforeach
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 mb-3">
              <div class="card h-100">
                <div class="card-header p-3">
                  <div class="d-flex justify-content-between align-items-center">
                    <div>
                      <p class="text-sm mb-0 text-capitalize">Hãng sản xuất</p>
                      <h4 class="mb-0">{{count($brands)}}</h4>
                    </div>
                  </div>
                </div>
                <hr class="horizontal my-0 dark">
                <div class="card-footer p-3">
                  <a href="{{url('admin/hang-san-xuat-add')}}" class="btn btn-sm btn-info mb-2 w-100">
                    <i class="fas fa-plus me-1"></i>Thêm Hãng SX
                  </a>
                  <div class="scrollable-list" style="max-height: 200px; overflow-y: auto;">
                    @foreach ($brands as $brand)
                    <div class="d-flex justify-content-between align-items-center mb-1 p-2 rounded" style="background-color: #f8f9fa;">
                      <div class="d-flex align-items-center">
                        <img src="{{asset($brand->image)}}" height="16" class="me-2 rounded">
                        <small class="text-truncate">{{$brand->name}} - {{$brand->name_en}}</small>
                      </div>
                      <a href="{{url('admin/hang-san-xuat-edit/'.$brand->id)}}" class="btn btn-sm btn-outline-info edit-btn" title="Chỉnh sửa">
                        <i class="fas fa-edit me-1"></i>Sửa
                      </a>
                    </div>
                    @endforeach
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 mb-3">
              <div class="card h-100">
                <div class="card-header p-3">
                  <div class="d-flex justify-content-between align-items-center">
                    <div>
                      <p class="text-sm mb-0 text-capitalize">Kiểu đường lái</p>
                      <h4 class="mb-0">{{count($drives)}}</h4>
                    </div>
                  </div>
                </div>
                <hr class="horizontal my-0 dark">
                <div class="card-footer p-3">
                  <a href="{{url('admin/kieu-duong-lai-add')}}" class="btn btn-sm btn-warning mb-2 w-100">
                    <i class="fas fa-plus me-1"></i>Thêm Kiểu đường lái
                  </a>
                  <div class="scrollable-list" style="max-height: 200px; overflow-y: auto;">
                    @foreach ($drives as $drive)
                    <div class="d-flex justify-content-between align-items-center mb-1 p-2 rounded" style="background-color: #f8f9fa;">
                      <small class="text-truncate me-2">{{$drive->name}} - {{$drive->name_en}}</small>
                      <a href="{{url('admin/kieu-duong-lai-edit/'.$drive->id)}}" class="btn btn-sm btn-outline-warning edit-btn" title="Chỉnh sửa">
                        <i class="fas fa-edit me-1"></i>Sửa
                      </a>
                    </div>
                    @endforeach
                  </div>
                </div>
              </div>
            </div>
            
            <div class="col-lg-3 col-md-6 col-sm-12 mb-3">
              <div class="card h-100">
                <div class="card-header p-3">
                  <div class="d-flex justify-content-between align-items-center">
                    <div>
                      <p class="text-sm mb-0 text-capitalize">Cấu trúc lốp</p>
                      <h4 class="mb-0">{{count($typestructures)}}</h4>
                    </div>
                  </div>
                </div>
                <hr class="horizontal my-0 dark">
                <div class="card-footer p-3">
                  <a href="{{url('admin/cau-truc-lop-add')}}" class="btn btn-sm btn-secondary mb-2 w-100">
                    <i class="fas fa-plus me-1"></i>Thêm Cấu trúc lốp
                  </a>
                  <div class="scrollable-list" style="max-height: 200px; overflow-y: auto;">
                    @foreach ($typestructures as $typestructure)
                    <div class="d-flex justify-content-between align-items-center mb-1 p-2 rounded" style="background-color: #f8f9fa;">
                      <small class="text-truncate me-2">{{$typestructure->name}} - {{$typestructure->name_en}}</small>
                      <a href="{{url('admin/cau-truc-lop-edit/'.$typestructure->id)}}" class="btn btn-sm btn-outline-secondary edit-btn" title="Chỉnh sửa">
                        <i class="fas fa-edit me-1"></i>Sửa
                      </a>
                    </div>
                    @endforeach
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Data Tables Row -->
          <div class="row mt-4">
            <div class="col-lg-6 mb-4">
              <div class="card h-100">
                <div class="card-header pb-0">
                  <div class="d-flex justify-content-between align-items-center">
                    <h6 class="mb-0">Danh mục bài viết</h6>
                    <a href="{{url('admin/danh-muc-add')}}" class="btn btn-sm btn-primary">
                      <i class="fas fa-plus me-1"></i>Thêm danh mục
                    </a>
                  </div>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                  <div class="table-responsive p-0">
                    <table class="table align-items-center mb-0">
                      <thead>
                        <tr>
                          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tên</th>
                          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Tiếng anh</th>
                          <th class="text-secondary opacity-7"></th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($types as $type)
                        <tr>
                          <td>
                            <div class="d-flex px-2 py-1">
                              <div class="d-flex flex-column justify-content-center">
                                <h6 class="mb-0 text-sm">{{$type->name}}</h6>
                              </div>
                            </div>
                          </td>
                          <td>
                            <p class="text-xs font-weight-bold mb-0">{{$type->name_en}}</p>
                          </td>
                          <td class="align-middle">
                            <a href="{{url('admin/danh-muc-edit/'.$type->id)}}" class="btn btn-sm btn-outline-primary edit-btn" title="Chỉnh sửa">
                              <i class="fas fa-edit me-1"></i>Sửa
                            </a>
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            
            <div class="col-lg-6 mb-4">
              <div class="card h-100">
                <div class="card-header pb-0">
                  <div class="d-flex justify-content-between align-items-center">
                    <h6 class="mb-0">Nội dung hệ thống</h6>
                    <a href="{{url('admin/sectioncontent')}}" class="btn btn-sm btn-info">
                      <i class="fas fa-cog me-1"></i>Quản lý nội dung
                    </a>
                  </div>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                  <div class="table-responsive p-0">
                    <table class="table align-items-center mb-0">
                      <thead>
                        <tr>
                          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Key</th>
                          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Tên</th>
                          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Tiếng anh</th>
                          <th class="text-secondary opacity-7"></th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($contents as $content)
                        <tr>
                          <td>
                            <div class="d-flex px-2 py-1">
                              <div class="d-flex flex-column justify-content-center">
                                <h6 class="mb-0 text-sm">{{$content->key}}</h6>
                              </div>
                            </div>
                          </td>
                          <td>
                            <p class="text-xs font-weight-bold mb-0">{{$content->name}}</p>
                          </td>
                          <td>
                            <p class="text-xs font-weight-bold mb-0">{{$content->name_en}}</p>
                          </td>
                          <td class="align-middle">
                            <a href="{{url('admin/sectioncontent-edit/'.$content->id)}}" class="btn btn-sm btn-outline-info edit-btn" title="Chỉnh sửa">
                              <i class="fas fa-edit me-1"></i>Sửa
                            </a>
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
          <!-- Menu Management Row -->
          <div class="row mt-4">
            <div class="col-12">
              <div class="card">
                <div class="card-header pb-0">
                  <div class="d-flex justify-content-between align-items-center">
                    <h6 class="mb-0">Quản lý Menu</h6>
                    <a href="{{url('admin/menu-add')}}" class="btn btn-sm btn-success">
                      <i class="fas fa-plus me-1"></i>Thêm Menu
                    </a>
                  </div>
                </div>
                <div class="card-body">
                  <div class="row">
                    @foreach ($menus as $menu)
                      @if($menu->parent_id == '')
                      <div class="col-lg-4 col-md-6 mb-3">
                        <div class="card border">
                          <div class="card-body p-3">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                              <h6 class="mb-0 text-primary">{{$menu->name}}</h6>
                              <a href="{{url('admin/menu-edit/'.$menu->id)}}" class="btn btn-sm btn-outline-primary edit-btn" title="Chỉnh sửa">
                                <i class="fas fa-edit me-1"></i>Sửa
                              </a>
                            </div>
                            <small class="text-muted">{{$menu->name_en}}</small>
                            
                            @php $hasSubmenus = false; @endphp
                            @foreach($menus as $submenu) 
                              @if($submenu->parent_id == $menu->id)
                                @php $hasSubmenus = true; @endphp
                                @break
                              @endif
                            @endforeach
                            
                            @if($hasSubmenus)
                            <div class="mt-2">
                              <small class="text-secondary">Submenu:</small>
                              @foreach($menus as $submenu) 
                                @if($submenu->parent_id == $menu->id)
                                <div class="d-flex justify-content-between align-items-center mt-1 p-2 rounded" style="background-color: #f8f9fa;">
                                  <small>{{$submenu->name}} - {{$submenu->name_en}}</small>
                                  <a href="{{url('admin/menu-edit/'.$submenu->id)}}" class="btn btn-xs btn-outline-secondary edit-btn" title="Chỉnh sửa">
                                    <i class="fas fa-edit me-1"></i>Sửa
                                  </a>
                                </div>
                                @endif
                              @endforeach
                            </div>
                            @endif
                          </div>
                        </div>
                      </div>
                      @endif
                    @endforeach
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
</x-layout>

@push('js')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('searchInput');
    const cards = document.querySelectorAll('.card');
    
    // Search functionality
    searchInput.addEventListener('input', function() {
        const searchTerm = this.value.toLowerCase();
        
        cards.forEach(card => {
            const cardText = card.textContent.toLowerCase();
            if (cardText.includes(searchTerm)) {
                card.style.display = 'block';
                card.style.opacity = '1';
            } else {
                card.style.opacity = '0.3';
            }
        });
    });
    
    // Smooth scroll for scrollable lists
    const scrollableLists = document.querySelectorAll('.scrollable-list');
    scrollableLists.forEach(list => {
        if (list.scrollHeight > list.clientHeight) {
            list.style.borderRight = '1px solid #e9ecef';
        }
    });
    
    // Add hover effects to cards
    cards.forEach(card => {
        card.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-2px)';
            this.style.transition = 'all 0.3s ease';
        });
        
        card.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0)';
        });
    });
    
    // Initialize tooltips
    const tooltips = document.querySelectorAll('[data-bs-toggle="tooltip"]');
    tooltips.forEach(tooltip => {
        new bootstrap.Tooltip(tooltip);
    });
});
</script>

<style>
.scrollable-list::-webkit-scrollbar {
    width: 4px;
}

.scrollable-list::-webkit-scrollbar-track {
    background: #f1f1f1;
    border-radius: 2px;
}

.scrollable-list::-webkit-scrollbar-thumb {
    background: #c1c1c1;
    border-radius: 2px;
}

.scrollable-list::-webkit-scrollbar-thumb:hover {
    background: #a8a8a8;
}

.card {
    transition: all 0.3s ease;
}

.card:hover {
    box-shadow: 0 8px 25px rgba(0,0,0,0.15) !important;
}

.btn-xs {
    padding: 0.25rem 0.4rem;
    font-size: 0.75rem;
}


@media (max-width: 768px) {
    .col-lg-3 {
        flex: 0 0 50%;
        max-width: 50%;
    }
}

@media (max-width: 576px) {
    .col-lg-3 {
        flex: 0 0 100%;
        max-width: 100%;
    }
}
</style>
@endpush
