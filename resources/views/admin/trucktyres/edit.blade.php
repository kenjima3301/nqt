<x-layout bodyClass="g-sidenav-show  bg-gray-200">
  <x-navbars.sidebar activePage='lop-xe-tai'></x-navbars.sidebar>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <x-navbars.navs.auth titlePage="Sửa lốp xe"></x-navbars.navs.auth>
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card shadow-lg border-0">
            <div class="card-header bg-gradient-primary text-white">
              <div class="d-flex align-items-center">
                <i class="fas fa-edit me-3 fa-lg"></i>
                <h4 class="mb-0 fw-bold">Chỉnh sửa lốp xe</h4>
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
              <form method="POST" action="{{url('admin/lop-xe-tai-sua-post')}}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="tyre_id" value="{{$tyre->id}}">
                
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
                            <input type="text" name="name" value="{{$tyre->name}}" class="form-control form-control-lg border-2" id="exampleInputname" placeholder="Nhập mã gai lốp xe" onfocus="focused(this)" onfocusout="defocused(this)">
                          </div>
                          <div class="col-md-6 mb-3">
                            <label for="price" class="form-label fw-semibold">
                              <i class="fas fa-dollar-sign me-2 text-muted"></i>Giá sản phẩm
                            </label>
                            <input type="text" name="price" value="{{$tyre->price}}" class="form-control form-control-lg border-2" id="price" placeholder="Nhập giá sản phẩm (VNĐ)" onfocus="focused(this)" onfocusout="defocused(this)">
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
                              <option @if($tyre->model_id == $model->id) selected @endif value="{{$model->id}}">{{$model->name}}</option>
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
                              <option @if($tyre->brand_id == $brand->id) selected @endif value="{{$brand->id}}">{{$brand->name}}</option>
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
                              <option @if($tyre->driveexperience_id == $drive->id) selected @endif value="{{$drive->id}}">{{$drive->name}}</option>
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
                              <option @if($tyre->tyre_structure == $structure->id) selected @endif value="{{$structure->id}}">{{$structure->name}}</option>
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
                            <textarea name="features" class="form-control border-2" rows="5" placeholder="Mô tả đặc trưng sản phẩm bằng tiếng Việt...">{{$tyre->tyre_features}}</textarea>
                          </div>
                          <div class="col-md-6 mb-3">
                            <label for="features_en" class="form-label fw-semibold">
                              <i class="fas fa-globe me-2 text-muted"></i>Đặc trưng (Tiếng Anh)
                            </label>
                            <textarea name="features_en" class="form-control border-2" rows="5" placeholder="Describe product features in English...">{{$tyre->tyre_features_en}}</textarea>
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
                          <div class="col-md-8 mb-3">
                            <label for="thumbnail" class="form-label fw-semibold">
                              <i class="fas fa-upload me-2 text-muted"></i>Thay đổi ảnh đại diện
                            </label>
                            <input type="file" name="thumbnail" id="thumbnail" class="form-control form-control-lg border-2" accept="image/*">
                            <div class="form-text">Chọn ảnh mới để thay thế ảnh đại diện hiện tại</div>
                          </div>
                          <div class="col-md-4">
                            <div class="text-center">
                              @if($tyre->thumbnail_image != null)
                                <div class="border-2 border-success rounded p-2 bg-light">
                                  <img src="{{asset($tyre->thumbnail_image)}}" class="img-fluid rounded" style="max-height: 200px;">
                                  <p class="text-success mt-2 mb-0"><i class="fas fa-check-circle me-1"></i>Ảnh đại diện hiện tại</p>
                                </div>
                              @else
                                <div class="border-2 border-dashed rounded p-4 bg-light">
                                  <i class="fas fa-image fa-3x text-muted mb-2"></i>
                                  <p class="text-muted mb-0">Chưa có ảnh đại diện</p>
                                </div>
                              @endif
                            </div>
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
                          <div class="col-md-8 mb-3">
                            <label for="install" class="form-label fw-semibold">
                              <i class="fas fa-upload me-2 text-muted"></i>Thay đổi ảnh
                            </label>
                            <input type="file" name="install" id="install" class="form-control form-control-lg border-2" accept="image/*">
                            <div class="form-text">Chọn ảnh mới để thay thế ảnh hiện tại</div>
                          </div>
                          <div class="col-md-4">
                            <div class="text-center">
                              @if($tyre->install_position_image != null)
                                <div class="border-2 border-success rounded p-2 bg-light">
                                  <img src="{{asset($tyre->install_position_image)}}" class="img-fluid rounded" style="max-height: 200px;">
                                  <p class="text-success mt-2 mb-0"><i class="fas fa-check-circle me-1"></i>Ảnh hiện tại</p>
                                </div>
                              @else
                                <div class="border-2 border-dashed rounded p-4 bg-light">
                                  <i class="fas fa-image fa-3x text-muted mb-2"></i>
                                  <p class="text-muted mb-0">Chưa có ảnh</p>
                                </div>
                              @endif
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
                          <i class="fas fa-images me-2"></i>Ảnh lốp xe
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

                  <!-- Existing Images -->
                  <div class="existing-images-section mt-3">
                    <div class="card">
                      <div class="card-header">
                        <h6 class="mb-0"><i class="fas fa-images"></i> Ảnh hiện tại</h6>
                      </div>
                      <div class="card-body">
                        <div class="list-images">
                          @foreach ($tyre->images as $image)
                            <div class="box-image">
                              <img src="{{asset($image->image)}}" class="picture-box" alt="tyre image">
                              <div class="wrap-btn-delete"><span data-id="{{ $image->id }}" class="btn-delete-image">x</span></div>
                              <input type="hidden" id="{{ $image->id }}" name="images_uploaded[]" value="{{ $image->id }}">
                            </div>
                          @endforeach
                        </div>
                        @if($tyre->images->count() == 0)
                          <div class="text-center text-muted py-3">
                            <i class="fas fa-image fa-2x mb-2"></i>
                            <p>Chưa có ảnh nào</p>
                          </div>
                        @endif
                      </div>
                    </div>
                  </div>
                  
                        <div id="upload-errors" class="text-danger mt-2" style="display:none;"></div>
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
                            <i class="fas fa-save me-2"></i>Cập nhật lốp xe
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
    
    /* Image Upload Styles */
    .list-images {
        display: flex;
        flex-wrap: wrap;
        gap: 15px;
        margin-top: 20px;
    }
    
    .hidden { display: none; }
    
    .box-image {
        width: 120px;
        height: 120px;
        position: relative;
        border: 3px solid #e9ecef;
        border-radius: 12px;
        overflow: hidden;
        transition: all 0.3s ease;
        background: white;
    }
    
    .box-image:hover {
        border-color: #35A25B;
        transform: translateY(-3px);
        box-shadow: 0 8px 25px rgba(53, 162, 91, 0.2);
    }
    
    .box-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    
    .wrap-btn-delete {
        position: absolute;
        top: -8px;
        right: -8px;
        z-index: 10;
    }
    
    .btn-delete-image {
        cursor: pointer;
        background: #dc3545;
        color: white;
        border: none;
        border-radius: 50%;
        width: 24px;
        height: 24px;
        font-size: 14px;
        font-weight: bold;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.3s ease;
        box-shadow: 0 2px 4px rgba(0,0,0,0.2);
    }
    
    .btn-delete-image:hover {
        background: #c82333;
        transform: scale(1.1);
    }
    
    /* Server Images Selection Styles */
    .selected-server-images {
        display: flex;
        flex-wrap: wrap;
        gap: 15px;
        margin-top: 20px;
    }
    
    .server-image-item {
        position: relative;
        border: 3px solid #35A25B;
        border-radius: 12px;
        overflow: hidden;
        width: 120px;
        height: 120px;
        transition: all 0.3s ease;
        background: white;
    }
    
    .server-image-item:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 25px rgba(53, 162, 91, 0.2);
    }
    
    .server-image-item img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    
    .server-image-item .remove-btn {
        position: absolute;
        top: -8px;
        right: -8px;
        background: #dc3545;
        color: white;
        border: none;
        border-radius: 50%;
        width: 24px;
        height: 24px;
        font-size: 14px;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.3s ease;
        box-shadow: 0 2px 4px rgba(0,0,0,0.2);
    }
    
    .server-image-item .remove-btn:hover {
        background: #c82333;
        transform: scale(1.1);
    }
    
    .server-image-item .image-name {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        background: rgba(0,0,0,0.8);
        color: white;
        padding: 4px 8px;
        font-size: 11px;
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
            width: 100px;
            height: 100px;
        }
        
        .list-images, .selected-server-images {
            gap: 10px;
        }
    }
  </style>
  
  <!-- Include Image Manager Modal -->
  @include('admin.partials.image-manager-modal')
  
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

  function addPreviewAndCloneInput(file) {
    let today = new Date();
    let time = today.getTime() + Math.floor(Math.random()*1000);
    let box = $('<div class="box-image"></div>');
    box.append('<img src="' + URL.createObjectURL(file) + '" alt="' + (file.name||'') + '" class="picture-box">');
    box.append('<div class="wrap-btn-delete"><span data-id="' + time + '" class="btn-delete-image">x</span></div>');
    $(".list-images").append(box);

    let $last = $('.list-input-hidden-upload input[type=file]').last();
    $last.removeAttr('id').attr('id', time);
    $('.list-input-hidden-upload').append('<input multiple accept="image/*" type="file" name="filenames[]" id="file_upload" class="myfrm form-control hidden">');
  }

  function currentFilesCount() {
    return $('.list-input-hidden-upload input[type=file]').length - 1;
  }

  function handleFiles(files, $sourceInput) {
    let total = currentFilesCount();
    for (let i = 0; i < files.length; i++) {
      const f = files[i];
      if (!VALID_TYPES.includes(f.type)) { showError('Định dạng không hợp lệ: ' + (f.name||'')); continue; }
      if (f.size > MAX_SIZE_MB * 1024 * 1024) { showError('Ảnh quá lớn (> ' + MAX_SIZE_MB + 'MB): ' + (f.name||'')); continue; }
      if (total >= MAX_FILES) { showError('Vượt quá số lượng tối đa ' + MAX_FILES + ' ảnh.'); break; }

      if ($sourceInput && $sourceInput[0].files.length === 0) {
        const dt = new DataTransfer(); dt.items.add(f); $sourceInput[0].files = dt.files;
      } else {
        const $newInput = $('<input multiple accept="image/*" type="file" name="filenames[]" class="myfrm form-control hidden">');
        const dt = new DataTransfer(); dt.items.add(f); $newInput[0].files = dt.files;
        $('.list-input-hidden-upload').append($newInput);
      }
      addPreviewAndCloneInput(f);
      total++;
    }
  }

  $(".btn-add-image").on('click', function () { 
    $('#file_upload').trigger('click'); 
  });
  $('.list-input-hidden-upload').on('change', '#file_upload', function (e) { handleFiles(e.target.files, $(this)); });

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
    
    // Check if this is an existing image (has numeric ID) or new upload (has timestamp ID)
    if (isNaN(id)) {
      // New upload - remove input and preview
      $('#' + id).remove();
      $(this).parents('.box-image').remove();
    } else {
      // Existing image - delete via AJAX
      const $boxImage = $(this).parents('.box-image');
      const $hiddenInput = $boxImage.find('input[type="hidden"]');
      
      // Show loading state
      $(this).html('<i class="fas fa-spinner fa-spin"></i>');
      $(this).prop('disabled', true);
      
      // Make AJAX request to delete image
      $.ajax({
        url: `/admin/lop-xe-tai-xoa-anh/${id}`,
        method: 'DELETE',
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(response) {
          if (response.success) {
            // Remove from images_uploaded array
            $hiddenInput.remove();
            
            // Hide the image with animation
            $boxImage.fadeOut(300, function() {
              $(this).remove();
            });
            
            showError(response.message, 'success');
          } else {
            showError(response.message);
            // Restore button state
            $(this).html('x');
            $(this).prop('disabled', false);
          }
        }.bind(this),
        error: function(xhr) {
          showError('Lỗi khi xóa ảnh. Vui lòng thử lại.');
          // Restore button state
          $(this).html('x');
          $(this).prop('disabled', false);
        }.bind(this)
      });
    }
  });

  $('button[data-href]').on("click", function() { document.location = $(this).data('href'); });
  
  // Image source toggle functionality
  $('input[name="imageSource"]').on('change', function() {
    const source = $(this).val();
    if (source === 'upload') {
      $('#uploadSection').show();
      $('#serverImagesSection').hide();
    } else {
      $('#uploadSection').hide();
      $('#serverImagesSection').show();
    }
  });
  
  // Function to add selected server images to form
  window.addImagesToTyreForm = function(imageNames) {
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
            <i class="fas fa-times"></i>
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
    // Count remaining existing images (not marked for deletion)
    const remainingExistingImages = $('.list-images .box-image').length;
    const hasNewUploads = $('input[name="filenames[]"]').length > 1; // > 1 because there's always one empty input
    const hasServerImages = selectedServerImages.length > 0;
    
    // Validate that at least one image source is selected
    if (remainingExistingImages === 0 && !hasNewUploads && !hasServerImages) {
      e.preventDefault();
      showError('Vui lòng chọn ít nhất một ảnh hoặc giữ lại ảnh hiện có.');
      return false;
    }
    
    // Show loading state
    const $submitBtn = $(this).find('button[type="submit"]');
    const originalText = $submitBtn.html();
    $submitBtn.prop('disabled', true).html('<i class="fas fa-spinner fa-spin me-2"></i>Đang cập nhật...');
    
    // Add hidden inputs for deleted images
    if (window.deletedImageIds && window.deletedImageIds.length > 0) {
      window.deletedImageIds.forEach(function(imageId) {
        const hiddenInput = $(`<input type="hidden" name="deleted_images[]" value="${imageId}">`);
        $(this).append(hiddenInput);
      }.bind(this));
    }
    
    // Clear existing file inputs if using server images
    if ($('input[name="imageSource"]:checked').val() === 'existing') {
      $('input[name="filenames[]"]').remove();
      
      // Add hidden inputs for server images
      selectedServerImages.forEach(function(imageName) {
        const hiddenInput = $(`<input type="hidden" name="server_images[]" value="${imageName}">`);
        $(this).append(hiddenInput);
      }.bind(this));
    }
  });
});

function addmorefeature(){
  $('#addmorefeature').append('<input type="name" name="features[]" value="" class="form-control border border-2 p-2" id="exampleInputname" placeholder="Mô tả" onfocus="focused(this)" onfocusout="defocused(this)">');
}

  </script>
  @endpush
</x-layout>
