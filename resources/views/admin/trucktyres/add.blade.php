<x-layout bodyClass="g-sidenav-show  bg-gray-200">
  <x-navbars.sidebar activePage='lop-xe-tai'></x-navbars.sidebar>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <x-navbars.navs.auth titlePage="Thêm lốp xe"></x-navbars.navs.auth>
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card shadow-lg border-0">
            <div class="card-header bg-gradient-primary text-white">
              <div class="d-flex align-items-center">
                <i class="fas fa-plus-circle me-3 fa-lg"></i>
                <h4 class="mb-0 fw-bold">Thêm lốp xe mới</h4>
              </div>
            </div>
            @if ($message = Session::get('success'))
            <div class="alert alert-success alert-dismissible fade show mx-4 mt-3" role="alert">
              <i class="fas fa-check-circle me-2"></i>{{$message}}
              <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
            @endif
            <div class="card-header bg-light border-bottom">
              <div class="d-flex justify-content-between align-items-center">
                <div class="d-flex align-items-center">
                  <i class="fas fa-arrow-left me-2 text-muted"></i>
                  <span class="text-muted">Quản lý lốp xe</span>
                </div>
                <a class="btn btn-outline-primary" href="{{url('admin/lop-xe-tai')}}">
                  <i class="fas fa-list me-2"></i>Quay lại danh sách
                </a>
              </div>
            </div>
            <div class="card-body p-4">
              <form method="POST" action="{{url('admin/lop-xe-tai-add')}}" enctype="multipart/form-data">
                @csrf
                
                <!-- Basic Information Section -->
                <div class="row mb-4">
                  <div class="col-12">
                    <div class="card border-0 bg-light">
                      <div class="card-header bg-white border-bottom">
                        <h5 class="mb-0 text-primary">
                          <i class="fas fa-info-circle me-2"></i>Thông tin cơ bản
                        </h5>
                      </div>
                      <div class="card-body">
                        <div class="row">
                          <div class="col-md-6 mb-3">
                            <label for="exampleInputname" class="form-label fw-semibold">
                              <i class="fas fa-barcode me-2 text-muted"></i>Mã gai
                            </label>
                            <input type="text" name="name" value="" class="form-control form-control-lg border-2" id="exampleInputname" placeholder="Nhập mã gai lốp xe" onfocus="focused(this)" onfocusout="defocused(this)">
                          </div>
                          <div class="col-md-6 mb-3">
                            <label for="price" class="form-label fw-semibold">
                              <i class="fas fa-dollar-sign me-2 text-muted"></i>Giá sản phẩm
                            </label>
                            <input type="text" name="price" value="" class="form-control form-control-lg border-2" id="price" placeholder="Nhập giá sản phẩm (VNĐ)" onfocus="focused(this)" onfocusout="defocused(this)">
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Classification Information Section -->
                <div class="row mb-4">
                  <div class="col-12">
                    <div class="card border-0 bg-light">
                      <div class="card-header bg-white border-bottom">
                        <h5 class="mb-0 text-primary">
                          <i class="fas fa-tags me-2"></i>Thông tin phân loại
                        </h5>
                      </div>
                      <div class="card-body">
                        <div class="row">
                          <div class="col-md-3 mb-3">
                            <label for="model_id" class="form-label fw-semibold">
                              <i class="fas fa-car me-2 text-muted"></i>Loại xe
                            </label>
                            <select class="form-select form-select-lg border-2" name="model_id" id="model_id">
                              <option value="">Chọn loại xe</option>
                              @foreach($models as $model)
                              <option value="{{$model->id}}">{{$model->name}}</option>
                              @endforeach 
                            </select>
                          </div>
                          <div class="col-md-3 mb-3">
                            <label for="brand_id" class="form-label fw-semibold">
                              <i class="fas fa-certificate me-2 text-muted"></i>Nhãn hiệu
                            </label>
                            <select class="form-select form-select-lg border-2" name="brand_id" id="brand_id">
                              <option value="">Chọn nhãn hiệu</option>
                              @foreach($brands as $brand)
                              <option value="{{$brand->id}}">{{$brand->name}}</option>
                              @endforeach 
                            </select>
                          </div>
                          <div class="col-md-3 mb-3">
                            <label for="drive_id" class="form-label fw-semibold">
                              <i class="fas fa-road me-2 text-muted"></i>Kiểu đường lái
                            </label>
                            <select class="form-select form-select-lg border-2" name="drive_id" id="drive_id">
                              <option value="">Chọn kiểu đường lái</option>
                              @foreach($drives as $drive)
                              <option value="{{$drive->id}}">{{$drive->name}}</option>
                              @endforeach 
                            </select>
                          </div>
                          <div class="col-md-3 mb-3">
                            <label for="tyre_structure" class="form-label fw-semibold">
                              <i class="fas fa-cogs me-2 text-muted"></i>Cấu trúc lốp
                            </label>
                            <select class="form-select form-select-lg border-2" name="tyre_structure" id="tyre_structure">
                              <option value="">Chọn cấu trúc lốp</option>
                              @foreach ($structures as $structure)
                              <option value="{{$structure->id}}">{{$structure->name}}</option>
                              @endforeach
                            </select>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Product Features Section -->
                <div class="row mb-4">
                  <div class="col-12">
                    <div class="card border-0 bg-light">
                      <div class="card-header bg-white border-bottom">
                        <h5 class="mb-0 text-primary">
                          <i class="fas fa-star me-2"></i>Đặc trưng sản phẩm
                        </h5>
                      </div>
                      <div class="card-body">
                        <div class="row">
                          <div class="col-md-6 mb-3">
                            <label for="features" class="form-label fw-semibold">
                              <i class="fas fa-language me-2 text-muted"></i>Đặc trưng (Tiếng Việt)
                            </label>
                            <textarea name="features" class="form-control border-2" rows="5" placeholder="Mô tả đặc trưng sản phẩm bằng tiếng Việt..."></textarea>
                          </div>
                          <div class="col-md-6 mb-3">
                            <label for="features_en" class="form-label fw-semibold">
                              <i class="fas fa-globe me-2 text-muted"></i>Đặc trưng (Tiếng Anh)
                            </label>
                            <textarea name="features_en" class="form-control border-2" rows="5" placeholder="Describe product features in English..."></textarea>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Installation Image Section -->
                <div class="row mb-4">
                  <div class="col-12">
                    <div class="card border-0 bg-light">
                      <div class="card-header bg-white border-bottom">
                        <h5 class="mb-0 text-primary">
                          <i class="fas fa-car-side me-2"></i>Ảnh kiểu xe và vị trí lắp đặt
                        </h5>
                      </div>
                      <div class="card-body">
                        <div class="row">
                          <div class="col-md-8">
                            <label for="install" class="form-label fw-semibold">
                              <i class="fas fa-upload me-2 text-muted"></i>Chọn ảnh
                            </label>
                            <input type="file" name="install" id="install" class="form-control form-control-lg border-2" accept="image/*">
                            <div class="form-text">Chọn ảnh hiển thị kiểu xe và vị trí lắp đặt lốp</div>
                          </div>
                          <div class="col-md-4">
                            <div class="text-center">
                              <div class="border-2 border-dashed rounded p-4 bg-light">
                                <i class="fas fa-image fa-3x text-muted mb-2"></i>
                                <p class="text-muted mb-0">Preview sẽ hiển thị ở đây</p>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Thumbnail Image Section -->
                <div class="row mb-4">
                  <div class="col-12">
                    <div class="card border-0 bg-light">
                      <div class="card-header bg-white border-bottom">
                        <h5 class="mb-0 text-primary">
                          <i class="fas fa-star me-2"></i>Ảnh lốp xe đại diện
                        </h5>
                      </div>
                      <div class="card-body">
                        <div class="row">
                          <div class="col-md-8">
                            <label for="thumbnail" class="form-label fw-semibold">
                              <i class="fas fa-image me-2 text-muted"></i>Chọn ảnh đại diện
                            </label>
                            <input type="file" name="thumbnail" id="thumbnail" class="form-control form-control-lg border-2" accept="image/*">
                            <div class="form-text">Ảnh này sẽ hiển thị ở trang chủ và danh sách quản lý</div>
                          </div>
                          <div class="col-md-4">
                            <div class="text-center">
                              <div class="border-2 border-dashed rounded p-4 bg-light" id="thumbnail-preview">
                                <i class="fas fa-image fa-3x text-muted mb-2"></i>
                                <p class="text-muted mb-0">Preview ảnh đại diện sẽ hiển thị ở đây</p>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                
                <!-- Tyre Images Section -->
                <div class="row mb-4">
                  <div class="col-12">
                    <div class="card border-0 bg-light">
                      <div class="card-header bg-white border-bottom">
                        <h5 class="mb-0 text-primary">
                          <i class="fas fa-images me-2"></i>Ảnh chi tiết lốp xe
                        </h5>
                      </div>
                      <div class="card-body">
                  <div class="card mb-3">
                    <div class="card-header">
                      <h6 class="mb-0"><i class="fas fa-image"></i> Chọn nguồn ảnh</h6>
                    </div>
                    <div class="card-body">
                      <div class="row">
                        <div class="col-md-6">
                          <div class="btn-group w-100" role="group">
                            <input type="radio" class="btn-check" name="imageSource" id="uploadNew" value="upload" checked>
                            <label class="btn btn-outline-primary" for="uploadNew">
                              <i class="fas fa-upload"></i> Upload ảnh mới
                            </label>
                            
                            <input type="radio" class="btn-check" name="imageSource" id="selectExisting" value="existing">
                            <label class="btn btn-outline-success" for="selectExisting">
                              <i class="fas fa-images"></i> Chọn từ máy chủ
                            </label>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <button type="button" class="btn btn-info w-100" data-bs-toggle="modal" data-bs-target="#imageManagerModal">
                            <i class="fas fa-cog"></i> Quản lý ảnh máy chủ
                          </button>
                        </div>
                      </div>
                      <div class="mt-2">
                        <small class="text-muted">
                          <i class="fas fa-info-circle"></i> 
                          Chọn "Upload ảnh mới" để tải ảnh từ máy tính hoặc "Chọn từ máy chủ" để sử dụng ảnh có sẵn
                        </small>
                      </div>
                    </div>
                  </div>

                  <!-- Upload Section -->
                  <div id="uploadSection">
                    <div class="card">
                      <div class="card-header">
                        <h6 class="mb-0"><i class="fas fa-cloud-upload-alt"></i> Upload ảnh mới</h6>
                      </div>
                      <div class="card-body">
                        <div class="input-group hdtuto control-group lst increment">
                          <div class="list-input-hidden-upload">
                            <input multiple accept="image/*" type="file" name="filenames[]" id="file_upload" class="myfrm form-control hidden">
                          </div>
                          <div class="input-group-btn">
                            <button class="btn btn-success btn-add-image" type="button">
                              <i class="fas fa-plus"></i> Thêm ảnh
                            </button>
                          </div>
                        </div>

                        <div id="dropzone" style="border: 2px dashed #ccc; border-radius: 6px; padding: 16px; text-align: center; margin-top: 10px;">
                          <i class="fas fa-cloud-upload-alt fa-2x text-muted mb-2"></i>
                          <p class="mb-1">Kéo & thả ảnh vào đây hoặc bấm "Thêm ảnh"</p>
                          <div style="font-size: 12px; color:#666;">Tối đa 10 ảnh, mỗi ảnh ≤ 2MB, định dạng: JPG/PNG/WebP</div>
                        </div>
                        
                        <!-- Error Messages Container -->
                        <div id="upload-errors" class="mt-2"></div>
                        
                        <!-- Minimal Image Preview Container -->
                        <div class="list-images mt-3" style="display: none;">
                          <!-- Uploaded images will be displayed here -->
                        </div>
                      </div>
                    </div>
                  </div>

                  <!-- Server Images Selection -->
                  <div id="serverImagesSection" style="display: none;">
                    <div class="card">
                      <div class="card-header">
                        <h6 class="mb-0"><i class="fas fa-server"></i> Chọn ảnh từ máy chủ</h6>
                      </div>
                      <div class="card-body">
                        <div class="alert alert-info">
                          <i class="fas fa-info-circle"></i> 
                          Chọn ảnh từ máy chủ bằng cách click vào nút "Quản lý ảnh máy chủ" ở trên.
                        </div>
                        <div id="selectedServerImages" class="selected-server-images">
                          <!-- Selected server images will be displayed here -->
                        </div>
                      </div>
                    </div>
                  </div>

                <!-- Submit Section -->
                <div class="row mb-4">
                  <div class="col-12">
                    <div class="card border-0 bg-gradient-primary text-white">
                      <div class="card-body text-center">
                        @if($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show mb-3" role="alert">
                          <i class="fas fa-exclamation-triangle me-2"></i>
                          <strong>Lỗi:</strong> Vui lòng kiểm tra lại thông tin đã nhập
                          <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                        @endif
                        <div class="d-flex justify-content-center gap-3">
                          <button type="submit" class="btn btn-light btn-lg px-5">
                            <i class="fas fa-save me-2"></i>Lưu lốp xe
                          </button>
                          <a href="{{url('admin/lop-xe-tai')}}" class="btn btn-outline-light btn-lg px-5">
                            <i class="fas fa-times me-2"></i>Hủy bỏ
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
  <style>
    /* Enhanced Form Styles */
    .card {
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        border-radius: 12px;
        transition: all 0.3s ease;
    }
    
    .card:hover {
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
        transform: translateY(-2px);
    }
    
    .form-control, .form-select {
        border-radius: 8px;
        transition: all 0.3s ease;
    }
    
    .form-control:focus, .form-select:focus {
        border-color: #35A25B;
        box-shadow: 0 0 0 0.2rem rgba(53, 162, 91, 0.25);
        transform: translateY(-1px);
    }
    
    .form-label {
        color: #495057;
        font-weight: 600;
    }
    
    .text-primary {
        color: #35A25B !important;
    }
    
    .bg-gradient-primary {
        background: linear-gradient(135deg, #35A25B 0%, #2d8a4f 100%);
    }
    
    /* Minimal Image Upload Styles */
    .list-images {
        display: flex;
        flex-wrap: wrap;
        gap: 12px;
        margin-top: 15px;
        padding: 15px;
        background: #f8f9fa;
        border-radius: 8px;
        border: 1px solid #e9ecef;
    }
    
    .hidden { display: none; }
    
    .box-image {
        width: 80px;
        height: 80px;
        position: relative;
        border: 2px solid #dee2e6;
        border-radius: 6px;
        overflow: hidden;
        transition: all 0.2s ease;
        background: white;
        box-shadow: 0 1px 3px rgba(0,0,0,0.1);
    }
    
    .box-image:hover {
        border-color: #35A25B;
        transform: translateY(-1px);
        box-shadow: 0 2px 8px rgba(53, 162, 91, 0.15);
    }
    
    .box-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    
    .wrap-btn-delete {
        position: absolute;
        top: -6px;
        right: -6px;
        z-index: 10;
    }
    
    .btn-delete-image {
        cursor: pointer;
        background: #dc3545;
        color: white;
        border: none;
        border-radius: 50%;
        width: 20px;
        height: 20px;
        font-size: 12px;
        font-weight: bold;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.2s ease;
        box-shadow: 0 1px 3px rgba(0,0,0,0.2);
    }
    
    .btn-delete-image:hover {
        background: #c82333;
        transform: scale(1.05);
    }
    
    /* Minimal Server Images Selection Styles */
    .selected-server-images {
        display: flex;
        flex-wrap: wrap;
        gap: 12px;
        margin-top: 15px;
        padding: 15px;
        background: #f8f9fa;
        border-radius: 8px;
        border: 1px solid #e9ecef;
    }
    
    .server-image-item {
        position: relative;
        border: 2px solid #35A25B;
        border-radius: 6px;
        overflow: hidden;
        width: 80px;
        height: 80px;
        transition: all 0.2s ease;
        background: white;
        box-shadow: 0 1px 3px rgba(0,0,0,0.1);
    }
    
    .server-image-item:hover {
        transform: translateY(-1px);
        box-shadow: 0 2px 8px rgba(53, 162, 91, 0.15);
    }
    
    .server-image-item img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    
    .server-image-item .remove-btn {
        position: absolute;
        top: -6px;
        right: -6px;
        background: #dc3545;
        color: white;
        border: none;
        border-radius: 50%;
        width: 20px;
        height: 20px;
        font-size: 12px;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.2s ease;
        box-shadow: 0 1px 3px rgba(0,0,0,0.2);
    }
    
    .server-image-item .remove-btn:hover {
        background: #c82333;
        transform: scale(1.05);
    }
    
    .server-image-item .image-name {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        background: rgba(0,0,0,0.7);
        color: white;
        padding: 2px 4px;
        font-size: 9px;
        text-align: center;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }
    
    .btn-check:checked + .btn {
        background-color: #35A25B;
        border-color: #35A25B;
        color: white;
        box-shadow: 0 4px 8px rgba(53, 162, 91, 0.3);
    }
    
    /* Dropzone styles */
    #dropzone {
        transition: all 0.3s ease;
        border-radius: 12px;
    }
    
    #dropzone:hover {
        border-color: #35A25B !important;
        background-color: rgba(53, 162, 91, 0.05);
        transform: translateY(-2px);
    }
    
    #dropzone.dragover {
        border-color: #35A25B !important;
        background-color: rgba(53, 162, 91, 0.1);
        transform: scale(1.02);
    }
    
    /* Button Styles */
    .btn {
        border-radius: 8px;
        font-weight: 600;
        transition: all 0.3s ease;
    }
    
    .btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(0,0,0,0.2);
    }
    
    /* Alert Styles */
    .alert {
        border-radius: 8px;
        border: none;
    }
    
    /* Responsive adjustments */
    @media (max-width: 768px) {
        .box-image, .server-image-item {
            width: 70px;
            height: 70px;
        }
        
        .list-images, .selected-server-images {
            gap: 8px;
            padding: 10px;
        }
        
        .btn-delete-image, .server-image-item .remove-btn {
            width: 18px;
            height: 18px;
            font-size: 10px;
        }
    }
  </style>
  @push('js')
<script src="{{asset('assets/js/jquery-3.6.3.min.js')}}"></script>
<script type="text/javascript">
$(function () {
  const MAX_FILES = 10;
  const MAX_SIZE_MB = 2;
  const VALID_TYPES = ['image/jpeg','image/png','image/webp'];
  
  // Server images array to store selected images from server
  let selectedServerImages = [];

  function showError(msg, type = 'error') {
    const alertClass = type === 'success' ? 'alert-success' : 'alert-danger';
    const icon = type === 'success' ? 'fas fa-check-circle' : 'fas fa-exclamation-circle';
    
    const alert = $(`
      <div class="alert ${alertClass} alert-dismissible fade show" role="alert">
        <i class="${icon}"></i> ${msg}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
      </div>
    `);
    
    // Remove existing alerts
    $('.alert').remove();
    
    // Add new alert
    $('#upload-errors').html(alert);
    
    setTimeout(() => alert.alert('close'), 3500);
  }

  function addPreviewOnly(file, $inputElement) {
    let today = new Date();
    let time = today.getTime() + Math.floor(Math.random()*1000);
    let box = $('<div class="box-image"></div>');
    box.append('<img src="' + URL.createObjectURL(file) + '" alt="' + (file.name||'') + '" class="picture-box">');
    box.append('<div class="wrap-btn-delete"><span data-id="' + time + '" class="btn-delete-image">×</span></div>');
    $(".list-images").append(box);
    
    // Show the preview container when first image is added
    if ($(".list-images .box-image").length === 1) {
      $(".list-images").show();
    }

    // gán id duy nhất cho input này để có thể xóa theo preview
    $inputElement.removeAttr('id').attr('id', time);
  }

  function addPreviewAndCloneInput(file) {
    let today = new Date();
    let time = today.getTime() + Math.floor(Math.random()*1000);
    let box = $('<div class="box-image"></div>');
    box.append('<img src="' + URL.createObjectURL(file) + '" alt="' + (file.name||'') + '" class="picture-box">');
    box.append('<div class="wrap-btn-delete"><span data-id="' + time + '" class="btn-delete-image">×</span></div>');
    $(".list-images").append(box);
    
    // Show the preview container when first image is added
    if ($(".list-images .box-image").length === 1) {
      $(".list-images").show();
    }

    // gán id duy nhất cho input này để có thể xóa theo preview
    let $last = $('.list-input-hidden-upload input[type=file]').last();
    $last.removeAttr('id').attr('id', time);

    // tạo input mới cho lần chọn tiếp theo
    $('.list-input-hidden-upload').append('<input multiple accept="image/*" type="file" name="filenames[]" id="file_upload" class="myfrm form-control hidden">');
  }

  function currentFilesCount() {
    // Đếm số input có file (không tính input trống)
    return $('.list-input-hidden-upload input[type=file]').filter(function() {
      return this.files.length > 0;
    }).length;
  }

  function handleFiles(files, $sourceInput) {
    // Check if tyre code is entered
    const tyreCode = $('input[name="name"]').val().trim();
    if (!tyreCode) {
      showError('Vui lòng nhập mã gai trước khi thêm ảnh!');
      return;
    }
    
    let total = currentFilesCount();
    for (let i = 0; i < files.length; i++) {
      const f = files[i];
      if (!VALID_TYPES.includes(f.type)) {
        showError('Định dạng không hợp lệ: ' + (f.name||''));
        continue;
      }
      if (f.size > MAX_SIZE_MB * 1024 * 1024) {
        showError('Ảnh quá lớn (> ' + MAX_SIZE_MB + 'MB): ' + (f.name||''));
        continue;
      }
      if (total >= MAX_FILES) {
        showError('Vượt quá số lượng tối đa ' + MAX_FILES + ' ảnh.');
        break;
      }
      
      // Gắn file vào input file nguồn (nếu input này trống)
      if ($sourceInput && $sourceInput[0].files.length === 0) {
        // Tạo DataTransfer để gán 1 file vào input
        const dt = new DataTransfer();
        dt.items.add(f);
        $sourceInput[0].files = dt.files;
        // Chỉ tạo preview, không tạo input mới
        addPreviewOnly(f, $sourceInput);
      } else {
        // Tạo một input mới và gán file
        const $newInput = $('<input multiple accept="image/*" type="file" name="filenames[]" class="myfrm form-control hidden">');
        const dt = new DataTransfer();
        dt.items.add(f);
        $newInput[0].files = dt.files;
        $('.list-input-hidden-upload').append($newInput);
        // Tạo preview và gán ID cho input này
        addPreviewOnly(f, $newInput);
      }
      total++;
    }
    
    // Đảm bảo luôn có một input trống để sẵn sàng cho lần upload tiếp theo
    ensureEmptyInput();
  }
  
  function ensureEmptyInput() {
    // Kiểm tra xem có input trống nào không
    const emptyInputs = $('.list-input-hidden-upload input[type=file]').filter(function() {
      return this.files.length === 0 && $(this).attr('id') === 'file_upload';
    });
    
    // Nếu không có input trống, tạo một cái mới
    if (emptyInputs.length === 0) {
      $('.list-input-hidden-upload').append('<input multiple accept="image/*" type="file" name="filenames[]" id="file_upload" class="myfrm form-control hidden">');
    }
  }

  // Nút thêm ảnh
  $(".btn-add-image").on('click', function () {
    $('#file_upload').trigger('click');
  });

  // Chọn file qua dialog
  $('.list-input-hidden-upload').on('change', '#file_upload', function (e) {
    handleFiles(e.target.files, $(this));
  });

  // Kéo-thả
  const $drop = $('#dropzone');
  $drop.on('dragover', function (e) { 
    e.preventDefault(); 
    e.stopPropagation(); 
    $(this).addClass('dragover');
  })
  .on('dragleave', function (e) { 
    e.preventDefault(); 
    e.stopPropagation(); 
    $(this).removeClass('dragover');
  })
  .on('drop', function (e) { 
    e.preventDefault(); 
    e.stopPropagation(); 
    $(this).removeClass('dragover');
    const files = e.originalEvent.dataTransfer.files;
    handleFiles(files, null);
  });

  // Xóa preview + input tương ứng
  $(".list-images").on('click', '.btn-delete-image', function () {
    let id = $(this).data('id');
    $('#' + id).remove();
    $(this).parents('.box-image').remove();
    
    // Hide preview container if no images left
    if ($(".list-images .box-image").length === 0) {
      $(".list-images").hide();
    }
  });

  // Chuyển trang theo data-href nếu có dùng
  $('button[data-href]').on("click", function() {
    document.location = $(this).data('href');
  });
  
  // Thumbnail image preview
  $('#thumbnail').on('change', function(e) {
    const file = e.target.files[0];
    if (file) {
      const reader = new FileReader();
      reader.onload = function(e) {
        $('#thumbnail-preview').html(`
          <img src="${e.target.result}" class="img-fluid rounded" style="max-height: 200px; max-width: 100%;">
          <p class="text-success mt-2 mb-0"><i class="fas fa-check-circle me-1"></i>Ảnh đại diện đã chọn</p>
        `);
      };
      reader.readAsDataURL(file);
    }
  });
  
  // Image source toggle functionality
  $('input[name="imageSource"]').on('change', function() {
    const source = $(this).val();
    if (source === 'upload') {
      $('#uploadSection').show();
      $('#serverImagesSection').hide();
      // Clear any existing server image inputs when switching to upload
      $('input[name="server_images[]"]').remove();
    } else {
      $('#uploadSection').hide();
      $('#serverImagesSection').show();
      // Clear any existing server image inputs to prevent duplicates
      $('input[name="server_images[]"]').remove();
    }
  });
  
  // Function to add selected server images to form
  window.addImagesToTyreForm = function(imageNames) {
    // Check if tyre code is entered
    const tyreCode = $('input[name="name"]').val().trim();
    if (!tyreCode) {
      showError('Vui lòng nhập mã gai trước khi chọn ảnh từ máy chủ!');
      return;
    }
    
    selectedServerImages = imageNames;
    displaySelectedServerImages();
    
    // Show success message
    if (imageNames.length > 0) {
      showError(`Đã chọn ${imageNames.length} ảnh từ máy chủ thành công!`, 'success');
    }
  };
  
  // Function to display selected server images
  function displaySelectedServerImages() {
    const container = $('#selectedServerImages');
    container.empty();
    
    if (selectedServerImages.length === 0) {
      container.html(`
        <div class="text-center text-muted py-3">
          <i class="fas fa-images fa-2x mb-2"></i>
          <p>Chưa có ảnh nào được chọn từ máy chủ</p>
          <small>Click vào nút "Quản lý ảnh máy chủ" để chọn ảnh</small>
        </div>
      `);
      return;
    }
    
    selectedServerImages.forEach(function(imageName) {
      const imageItem = $(`
        <div class="server-image-item">
          <img src="/upload/product/${imageName}" alt="${imageName}" loading="lazy">
          <button type="button" class="remove-btn" onclick="removeServerImage('${imageName}')" title="Xóa ảnh này">
            ×
          </button>
          <div class="image-name">${imageName}</div>
        </div>
      `);
      container.append(imageItem);
    });
  }
  
  // Function to remove server image
  window.removeServerImage = function(imageName) {
    selectedServerImages = selectedServerImages.filter(img => img !== imageName);
    displaySelectedServerImages();
  };
  
  // Override form submission to include server images
  $('form').on('submit', function(e) {
    const imageSource = $('input[name="imageSource"]:checked').val();
    
    // Clear any existing hidden server image inputs to prevent duplicates
    $('input[name="server_images[]"]').remove();
    
    // Validate based on selected image source
    if (imageSource === 'upload') {
      const hasNewUploads = currentFilesCount() > 0; // Sử dụng hàm đếm file chính xác
      if (!hasNewUploads) {
        e.preventDefault();
        showError('Vui lòng chọn ít nhất một ảnh để upload.');
        return false;
      }
    } else if (imageSource === 'existing') {
      const hasServerImages = selectedServerImages.length > 0;
      if (!hasServerImages) {
        e.preventDefault();
        showError('Vui lòng chọn ít nhất một ảnh từ máy chủ.');
        return false;
      }
      
      // Clear file inputs and add server images
      $('input[name="filenames[]"]').remove();
      
      // Add hidden inputs for server images
      selectedServerImages.forEach(function(imageName) {
        const hiddenInput = $(`<input type="hidden" name="server_images[]" value="${imageName}">`);
        $(this).append(hiddenInput);
      }.bind(this));
    }
  });
});
</script>

<!-- Include Image Manager Modal -->
@include('admin.partials.image-manager-modal')

@endpush  
</x-layout>
