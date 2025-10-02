<x-layout bodyClass="g-sidenav-show  bg-gray-200">
  <x-navbars.sidebar activePage='lop-xe-tai'></x-navbars.sidebar>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <x-navbars.navs.auth titlePage="Import Size"></x-navbars.navs.auth>
    <div class="container-fluid py-4">
      <div class="row mt-4">
        <div class="col-lg-7">
          <div class="card bg-gradient-white">
            <h4 class="col-4 opacity-9 text-start text-dark">{{$tyre->name}}</h4>
            <div class="card-body px-5 z-index-1 bg-cover overflow-hidden pb-2">
              <div class="row">
                <div class="col-12 text-center">
                  <div class="row">
                    <div class="col-lg-6 col-12">
                      <h4 class="text-dark opacity-9">Benefits and Features
                      </h4>
                      <hr class="horizontal light mt-1 mb-3">
                      <div class="col-12">
                        @php 
                        $features = preg_split("/\r\n|\n|\r/", $tyre->tyre_features);
                        @endphp 
                        @foreach($features as $feature)
                        <p>{{$feature}}</p>
                        @endforeach
                      </div>
                    </div>

                    <div class="col-lg-6 col-12">
                      <div>
                        <h6 class="mb-0 text-dark">@if(isset($tyre->drive)){{$tyre->drive->name}} @endif</h6>
                        <h6 class="mb-0 text-dark">{{$tyre->structure->name ?? ''}}</h6>
                      </div>
                      <hr class="horizontal light mt-1 mb-3">
                      <div class="d-flex justify-content-center">
                        <div>
                          @if($tyre->install_position_image != null)
                          <h6 class="mb-0"><img src="{{asset($tyre->install_position_image)}}" width="300"></h6>
                          @endif
                        </div>
                      </div>
                      <div class="d-flex justify-content-center">
                        <div>
                          @foreach ($tyre->images as $image)
                          <img style="max-width: 300px;" src="{{asset($image->image)}}" alt="car image">
                          @endforeach
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-5">
          <div class="row">
            <div class="col-12">
              <div class="card bg-gradient-primary mb-4 mt-4 mt-lg-0">
                <div class="card-body p-4">
                  <div class="row align-items-center">
                    <div class="col-8">
                      <div class="d-flex align-items-center">
                        <div class="icon icon-shape icon-sm bg-white shadow text-center border-radius-md me-3">
                          <i class="fa fa-upload text-primary text-sm opacity-10" aria-hidden="true"></i>
                        </div>
                        <div>
                          <h6 class="text-white text-sm mb-0 font-weight-bold">Import Size</h6>
                          <p class="text-white text-xs mb-0 opacity-8">Tải lên file Excel để import quy cách lốp</p>
                        </div>
                      </div>
                    </div>
                    <div class="col-4 text-end">
                      <a class="btn bg-white text-primary btn-sm" href="{{url('admin/lop-xe-tai-import-download')}}">
                        <i class="fa fa-download me-1" aria-hidden="true"></i>
                        Tải mẫu
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-12 col-md-12 col-12 mt-2">
              <div class="card">
                <div class="card-header pb-0">
                  <h6 class="mb-0">Upload File Import</h6>
                </div>
                <div class="card-body p-4">
                  <form method="POST" action="{{url('admin/lop-xe-tai-import/'.$tyre->id)}}" enctype="multipart/form-data" id="importForm">
                    @csrf
                    <div class="mb-3">
                      <label for="importfile" class="form-label text-sm font-weight-bold">Chọn file Excel (.xlsx, .xls)</label>
                      <div class="input-group">
                        <input type="file" name="importfile" id="importfile" class="form-control" accept=".xlsx,.xls" required>
                        <label class="input-group-text" for="importfile">
                          <i class="fa fa-file-excel text-success"></i>
                        </label>
                      </div>
                      <div class="form-text">File phải có định dạng Excel với 22 cột theo mẫu</div>
                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                      <button type="submit" class="btn bg-gradient-primary btn-sm" id="importBtn">
                        <i class="fa fa-upload me-1"></i>
                        Import Size
                      </button>
                      <small class="text-muted">Tối đa 10MB</small>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
      <div class="container-fluid py-4">
      <div class='row col-12'>
        <div class="card">
          <div class="card-header pb-0">
            <div class="d-flex justify-content-between align-items-center">
              <h6 class="mb-0">Danh sách Quy cách Lốp</h6>
              <div class="d-flex align-items-center gap-2">
                <span class="badge bg-gradient-info me-2">Tổng: {{count($tyre_dimentions)}} size</span>
                <button class="btn btn-outline-primary btn-sm" onclick="toggleAddForm()">
                  <i class="fa fa-plus me-1"></i>Thêm mới
                </button>
                <button class="btn btn-outline-success btn-sm" onclick="toggleSelectImageForm()">
                  <i class="fa fa-images me-1"></i>Chọn ảnh cho size
                </button>
                <button class="btn btn-outline-info btn-sm" onclick="showImportImageForm()">
                  <i class="fa fa-upload me-1"></i>Import ảnh riêng
                </button>
              </div>
            </div>
          </div>
          <div class="card-body px-0 pt-0 pb-2">
            <div class="table-responsive p-0">
              <table class="table align-items-center mb-0">
                <thead>
                  <tr>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nước sản xuất</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Quy cách</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Lớp bố</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Chỉ số tải trọng</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Đơn vị</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Kiểu gai</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Lượt xem</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Số lượng</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Đơn giá</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Trạng thái</th>
                    <th class="text-secondary opacity-7"></th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($tyre_dimentions as $dimention)
                  <tr>
                    <td class="ps-4">
                      <div class="d-flex align-items-center">
                        @foreach ($dimention->madeins as $country) 
                        <img src="{{asset($country->country->flag)}}" width='20' class="me-1" title="{{$country->country->name}}">
                        @endforeach
                      </div>
                    </td>
                    <td class="text-sm">
                      <a href="{{url('admin/quy-cach-chi-tiet/'.$dimention->id)}}" class="text-dark font-weight-bold">
                        {{$dimention->size}}
                      </a>
                    </td>
                    <td class="text-sm text-center">{{$dimention->ply}}</td>
                    <td class="text-sm text-center">{{$dimention->sevice_index}}</td>
                    <td class="text-sm text-center">{{$dimention->unit}}</td>
                    <td class="text-sm text-center">{{$dimention->tread_type}}</td>
                    <td class="text-sm text-center">
                      <span class="badge bg-gradient-info">{{$dimention->views}}</span>
                    </td>
                    <td class="text-sm text-center">
                      <span class="badge bg-gradient-success">{{$dimention->total}}</span>
                    </td>
                    <td class="text-sm text-center">
                      <span class="text-success font-weight-bold">{{number_format((float)$dimention->price)}} VNĐ</span>
                    </td>
                    <td class="text-sm text-center">
                      <span class="badge bg-gradient-{{$dimention->status == 'public' ? 'success' : 'secondary'}}">
                        {{$dimention->status == 'public' ? 'Hiển thị' : 'Ẩn'}}
                      </span>
                    </td>
                    <td class="text-center">
                      <div class="dropdown">
                        <a href="#" class="text-secondary font-weight-bold text-xs" data-bs-toggle="dropdown">
                          <i class="fa fa-ellipsis-v"></i>
                        </a>
                        <ul class="dropdown-menu">
                          <li><a class="dropdown-item" href="{{url('admin/quy-cach-chi-tiet/'.$dimention->id)}}">
                            <i class="fa fa-eye me-2"></i>Xem chi tiết
                          </a></li>
                          <li><a class="dropdown-item" href="{{url('admin/ma-gai-an/'.$dimention->id)}}">
                            <i class="fa fa-{{$dimention->status == 'public' ? 'eye-slash' : 'eye'}} me-2"></i>
                            {{$dimention->status == 'public' ? 'Ẩn' : 'Hiển thị'}}
                          </a></li>
                        </ul>
                      </div>
                    </td>
                  </tr>
                  @endforeach
                  <!-- Form thêm mới (ẩn mặc định) -->
                  <tr id="addFormRow" style="display: none;" class="bg-light">
                    <form action="{{url('admin/lop-xe-tai-quy-cach-add-new')}}" method="POST" id="addForm">
                      @csrf
                      <input type="hidden" name="tyre_id" value="{{$tyre->id}}">
                      <td class="ps-4">
                        <select name="country_id[]" id="select_country_id" class="form-control form-control-sm" multiple="multiple" required>
                          @foreach ($countries as $country)
                          <option value="{{$country->id}}">{{$country->name}}</option>
                          @endforeach
                        </select>
                      </td>
                      <td>
                        <input type="text" name="size" class="form-control form-control-sm" placeholder="VD: 11R22.5" required>
                      </td>
                      <td>
                        <input type="text" name="ply" class="form-control form-control-sm" placeholder="VD: 16" required>
                      </td>
                      <td>
                        <input type="text" name="sevice_index" class="form-control form-control-sm" placeholder="VD: 146/143L" required>
                      </td>
                      <td>
                        <input type="text" name="unit" class="form-control form-control-sm" placeholder="VD: PC" required>
                      </td>
                      <td>
                        <input type="text" name="tread_type" class="form-control form-control-sm" placeholder="VD: RIB" required>
                      </td>
                      <td></td>
                      <td>
                        <input type="number" name="total" class="form-control form-control-sm" placeholder="0" min="0" required>
                      </td>
                      <td>
                        <input type="number" name="price" class="form-control form-control-sm" placeholder="0" min="0" step="1000" required>
                      </td>
                      <td>
                        <div class="d-flex gap-1">
                          <button type="submit" class="btn btn-success btn-sm">
                            <i class="fa fa-check"></i>
                          </button>
                          <button type="button" class="btn btn-secondary btn-sm" onclick="toggleAddForm()">
                            <i class="fa fa-times"></i>
                          </button>
                        </div>
                      </td>
                      <td></td>
                    </form>
                  </tr>
                  
                  <!-- Form chọn ảnh cho size (ẩn mặc định) -->
                  <tr id="selectImageFormRow" style="display: none;" class="bg-info bg-opacity-10">
                    <td colspan="11" class="p-4">
                      <div class="card">
                        <div class="card-header">
                          <h6 class="mb-0">
                            <i class="fa fa-images me-2"></i>Chọn ảnh cho size
                            <button type="button" class="btn btn-sm btn-outline-secondary float-end" onclick="toggleSelectImageForm()">
                              <i class="fa fa-times"></i> Đóng
                            </button>
                          </h6>
                        </div>
                        <div class="card-body">
                          <div class="row">
                            <div class="col-md-6">
                              <h6>Ảnh có sẵn của lốp xe:</h6>
                              <div class="row" id="tyreImagesList">
                                @foreach($tyre->images as $image)
                                <div class="col-md-4 mb-3">
                                  <div class="card image-select-card" data-image-id="{{$image->id}}" data-image-path="{{$image->image}}">
                                    <img src="{{asset($image->image)}}" class="card-img-top" style="height: 120px; object-fit: cover;">
                                    <div class="card-body p-2">
                                      <div class="form-check">
                                        <input class="form-check-input image-checkbox" type="checkbox" value="{{$image->id}}">
                                        <label class="form-check-label small">{{basename($image->image)}}</label>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                @endforeach
                              </div>
                            </div>
                            <div class="col-md-6">
                              <h6>Ảnh đã chọn:</h6>
                              <div id="selectedImagesPreview" class="border rounded p-3" style="min-height: 200px;">
                                <p class="text-muted text-center">Chưa có ảnh nào được chọn</p>
                              </div>
                              <div class="mt-3">
                                <select id="targetSizeSelect" class="form-select mb-2">
                                  <option value="">Chọn size để gán ảnh</option>
                                  @foreach($tyre_dimentions as $dimention)
                                  <option value="{{$dimention->id}}">{{$dimention->size}}</option>
                                  @endforeach
                                </select>
                                <button type="button" class="btn btn-primary btn-sm" onclick="assignImagesToSize()">
                                  <i class="fa fa-link me-1"></i>Gán ảnh cho size
                                </button>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </td>
                  </tr>
                  
                  <!-- Form import ảnh riêng (ẩn mặc định) -->
                  <tr id="importImageFormRow" style="display: none;" class="bg-warning bg-opacity-10">
                    <td colspan="11" class="p-4">
                      <div class="card">
                        <div class="card-header">
                          <h6 class="mb-0">
                            <i class="fa fa-upload me-2"></i>Import ảnh riêng cho size
                            <button type="button" class="btn btn-sm btn-outline-secondary float-end" onclick="toggleImportImageForm()">
                              <i class="fa fa-times"></i> Đóng
                            </button>
                          </h6>
                        </div>
                        <div class="card-body">
                          <form id="importImageForm" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                              <div class="col-md-6">
                                <div class="mb-3">
                                  <label class="form-label">Chọn size:</label>
                                  <select name="size_id" id="importSizeSelect" class="form-select" required>
                                    <option value="">Chọn size để import ảnh</option>
                                    @foreach($tyre_dimentions as $dimention)
                                    <option value="{{$dimention->id}}">{{$dimention->size}} - {{$dimention->ply}} - {{$dimention->sevice_index}}</option>
                                    @endforeach
                                  </select>
                                </div>
                                <div class="mb-3">
                                  <label class="form-label">Chọn file ảnh:</label>
                                  <input type="file" name="images[]" id="importImageFiles" class="form-control" multiple accept="image/*" required>
                                  <div class="form-text">Có thể chọn nhiều ảnh cùng lúc (JPG, PNG, GIF, WebP). Tối đa 2MB mỗi ảnh.</div>
                                </div>
                                <button type="submit" class="btn btn-primary">
                                  <i class="fa fa-upload me-1"></i>Import ảnh
                                </button>
                              </div>
                              <div class="col-md-6">
                                <h6>Preview ảnh sẽ import:</h6>
                                <div id="imagePreviewContainer" class="border rounded p-3" style="min-height: 200px;">
                                  <p class="text-muted text-center">Chọn file ảnh để xem preview</p>
                                </div>
                              </div>
                            </div>
                          </form>
                        </div>
                      </div>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">

  @push('js')
  <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <script type="text/javascript">
    $(document).ready(function() {
        $('#select_country_id').selectpicker();
        
        // File upload validation
        $('#importfile').on('change', function() {
            const file = this.files[0];
            if (file) {
                const fileSize = file.size / 1024 / 1024; // MB
                const fileType = file.type;
                
                if (fileSize > 10) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Lỗi',
                        text: 'File quá lớn! Kích thước tối đa là 10MB.'
                    });
                    this.value = '';
                    return;
                }
                
                if (!fileType.includes('sheet') && !fileType.includes('excel')) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Lỗi',
                        text: 'Vui lòng chọn file Excel (.xlsx, .xls)'
                    });
                    this.value = '';
                    return;
                }
                
                $('#importBtn').prop('disabled', false);
            }
        });
        
        // Import form submission
        $('#importForm').on('submit', function(e) {
            e.preventDefault();
            
            const formData = new FormData(this);
            const submitBtn = $('#importBtn');
            
            submitBtn.prop('disabled', true).html('<i class="fa fa-spinner fa-spin me-1"></i>Đang import...');
            
            $.ajax({
                url: $(this).attr('action'),
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Thành công',
                        text: 'Import size thành công!'
                    }).then(() => {
                        location.reload();
                    });
                },
                error: function(xhr) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Lỗi',
                        text: 'Có lỗi xảy ra khi import file!'
                    });
                },
                complete: function() {
                    submitBtn.prop('disabled', false).html('<i class="fa fa-upload me-1"></i>Import Size');
                }
            });
        });
    });
    
    function toggleAddForm() {
        const formRow = document.getElementById('addFormRow');
        if (formRow.style.display === 'none') {
            formRow.style.display = 'table-row';
            formRow.scrollIntoView({ behavior: 'smooth' });
        } else {
            formRow.style.display = 'none';
            document.getElementById('addForm').reset();
        }
    }
    
    function toggleSelectImageForm() {
        const formRow = document.getElementById('selectImageFormRow');
        if (formRow.style.display === 'none') {
            formRow.style.display = 'table-row';
            formRow.scrollIntoView({ behavior: 'smooth' });
            // Reset selections
            $('.image-checkbox').prop('checked', false);
            $('.image-select-card').removeClass('selected');
            updateSelectedImagesPreview();
        } else {
            formRow.style.display = 'none';
        }
    }
    
    function toggleImportImageForm() {
        const formRow = document.getElementById('importImageFormRow');
        if (formRow.style.display === 'none') {
            formRow.style.display = 'table-row';
            formRow.scrollIntoView({ behavior: 'smooth' });
        } else {
            formRow.style.display = 'none';
            document.getElementById('importImageForm').reset();
            document.getElementById('imagePreviewContainer').innerHTML = '<p class="text-muted text-center">Chọn file ảnh để xem preview</p>';
        }
    }
    
    function showImportImageForm() {
        // Close other forms first
        document.getElementById('addFormRow').style.display = 'none';
        document.getElementById('selectImageFormRow').style.display = 'none';
        toggleImportImageForm();
    }
    
    // Image selection functionality
    $(document).on('change', '.image-checkbox', function() {
        const card = $(this).closest('.image-select-card');
        if ($(this).is(':checked')) {
            card.addClass('selected');
        } else {
            card.removeClass('selected');
        }
        updateSelectedImagesPreview();
    });
    
    $(document).on('click', '.image-select-card', function(e) {
        if (e.target.type !== 'checkbox') {
            const checkbox = $(this).find('.image-checkbox');
            checkbox.prop('checked', !checkbox.prop('checked'));
            $(this).toggleClass('selected', checkbox.prop('checked'));
            updateSelectedImagesPreview();
        }
    });
    
    function updateSelectedImagesPreview() {
        const selectedImages = [];
        $('.image-checkbox:checked').each(function() {
            const card = $(this).closest('.image-select-card');
            selectedImages.push({
                id: $(this).val(),
                path: card.data('image-path'),
                name: card.find('label').text()
            });
        });
        
        const previewContainer = document.getElementById('selectedImagesPreview');
        if (selectedImages.length === 0) {
            previewContainer.innerHTML = '<p class="text-muted text-center">Chưa có ảnh nào được chọn</p>';
        } else {
            let html = '<div class="row">';
            selectedImages.forEach(function(image) {
                html += `
                    <div class="col-md-4 mb-2">
                        <div class="card">
                            <img src="${image.path}" class="card-img-top" style="height: 80px; object-fit: cover;">
                            <div class="card-body p-1">
                                <small class="text-truncate d-block">${image.name}</small>
                            </div>
                        </div>
                    </div>
                `;
            });
            html += '</div>';
            previewContainer.innerHTML = html;
        }
    }
    
    function assignImagesToSize() {
        const selectedImages = [];
        $('.image-checkbox:checked').each(function() {
            selectedImages.push($(this).val());
        });
        
        const targetSizeId = document.getElementById('targetSizeSelect').value;
        
        if (selectedImages.length === 0) {
            Swal.fire({
                icon: 'warning',
                title: 'Chưa chọn ảnh',
                text: 'Vui lòng chọn ít nhất một ảnh để gán cho size.'
            });
            return;
        }
        
        if (!targetSizeId) {
            Swal.fire({
                icon: 'warning',
                title: 'Chưa chọn size',
                text: 'Vui lòng chọn size để gán ảnh.'
            });
            return;
        }
        
        // Send AJAX request to assign images
        $.ajax({
            url: '{{url("admin/assign-images-to-size")}}',
            type: 'POST',
            data: {
                _token: $('meta[name="csrf-token"]').attr('content'),
                size_id: targetSizeId,
                image_ids: selectedImages
            },
            success: function(response) {
                Swal.fire({
                    icon: 'success',
                    title: 'Thành công',
                    text: 'Đã gán ảnh cho size thành công!'
                }).then(() => {
                    location.reload();
                });
            },
            error: function(xhr) {
                Swal.fire({
                    icon: 'error',
                    title: 'Lỗi',
                    text: 'Có lỗi xảy ra khi gán ảnh cho size.'
                });
            }
        });
    }
    
    // Image preview for import
    $('#importImageFiles').on('change', function() {
        const files = this.files;
        const previewContainer = document.getElementById('imagePreviewContainer');
        
        if (files.length === 0) {
            previewContainer.innerHTML = '<p class="text-muted text-center">Chọn file ảnh để xem preview</p>';
            return;
        }
        
        // Clear previous preview
        previewContainer.innerHTML = '<div class="row"><div class="col-12"><p class="text-info text-center"><i class="fa fa-spinner fa-spin me-2"></i>Đang tải preview...</p></div></div>';
        
        let processedCount = 0;
        let html = '<div class="row">';
        
        Array.from(files).forEach(function(file, index) {
            if (file.type.startsWith('image/')) {
                // Validate file size (2MB max)
                if (file.size > 2 * 1024 * 1024) {
                    html += `
                        <div class="col-md-4 mb-2">
                            <div class="card border-danger">
                                <div class="card-body p-2 text-center">
                                    <i class="fa fa-exclamation-triangle text-danger"></i>
                                    <small class="text-danger d-block">${file.name}</small>
                                    <small class="text-muted">Quá lớn (>2MB)</small>
                                </div>
                            </div>
                        </div>
                    `;
                    processedCount++;
                    if (processedCount === Array.from(files).filter(f => f.type.startsWith('image/')).length) {
                        previewContainer.innerHTML = html + '</div>';
                    }
                    return;
                }
                
                const reader = new FileReader();
                reader.onload = function(e) {
                    html += `
                        <div class="col-md-4 mb-2">
                            <div class="card">
                                <img src="${e.target.result}" class="card-img-top" style="height: 80px; object-fit: cover;">
                                <div class="card-body p-1">
                                    <small class="text-truncate d-block">${file.name}</small>
                                    <small class="text-muted">${(file.size / 1024 / 1024).toFixed(2)} MB</small>
                                </div>
                            </div>
                        </div>
                    `;
                    processedCount++;
                    
                    // Update preview when all images are processed
                    if (processedCount === Array.from(files).filter(f => f.type.startsWith('image/')).length) {
                        previewContainer.innerHTML = html + '</div>';
                    }
                };
                reader.readAsDataURL(file);
            } else {
                html += `
                    <div class="col-md-4 mb-2">
                        <div class="card border-warning">
                            <div class="card-body p-2 text-center">
                                <i class="fa fa-exclamation-triangle text-warning"></i>
                                <small class="text-warning d-block">${file.name}</small>
                                <small class="text-muted">Không phải ảnh</small>
                            </div>
                        </div>
                    </div>
                `;
                processedCount++;
                if (processedCount === Array.from(files).filter(f => f.type.startsWith('image/')).length) {
                    previewContainer.innerHTML = html + '</div>';
                }
            }
        });
    });
    
    // Import image form submission
    $('#importImageForm').on('submit', function(e) {
        e.preventDefault();
        
        const formData = new FormData(this);
        const submitBtn = $(this).find('button[type="submit"]');
        const files = document.getElementById('importImageFiles').files;
        
        // Validate files before submission
        let hasValidImages = false;
        let hasInvalidFiles = false;
        
        Array.from(files).forEach(function(file) {
            if (file.type.startsWith('image/')) {
                if (file.size <= 2 * 1024 * 1024) {
                    hasValidImages = true;
                } else {
                    hasInvalidFiles = true;
                }
            } else {
                hasInvalidFiles = true;
            }
        });
        
        if (!hasValidImages) {
            Swal.fire({
                icon: 'warning',
                title: 'Không có ảnh hợp lệ',
                text: 'Vui lòng chọn ít nhất một ảnh hợp lệ (JPG, PNG, GIF, WebP, tối đa 2MB).'
            });
            return;
        }
        
        if (hasInvalidFiles) {
            Swal.fire({
                icon: 'warning',
                title: 'Có file không hợp lệ',
                text: 'Một số file không phải ảnh hoặc quá lớn sẽ bị bỏ qua.',
                showCancelButton: true,
                confirmButtonText: 'Tiếp tục',
                cancelButtonText: 'Hủy'
            }).then((result) => {
                if (result.isConfirmed) {
                    submitForm();
                }
            });
            return;
        }
        
        submitForm();
        
        function submitForm() {
            submitBtn.prop('disabled', true).html('<i class="fa fa-spinner fa-spin me-1"></i>Đang import...');
            
            $.ajax({
                url: '{{url("admin/import-images-for-size")}}',
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Thành công',
                        text: response.message || 'Import ảnh cho size thành công!'
                    }).then(() => {
                        location.reload();
                    });
                },
                error: function(xhr) {
                    let errorMessage = 'Có lỗi xảy ra khi import ảnh.';
                    if (xhr.responseJSON && xhr.responseJSON.message) {
                        errorMessage = xhr.responseJSON.message;
                    }
                    Swal.fire({
                        icon: 'error',
                        title: 'Lỗi',
                        text: errorMessage
                    });
                },
                complete: function() {
                    submitBtn.prop('disabled', false).html('<i class="fa fa-upload me-1"></i>Import ảnh');
                }
            });
        }
    });
  </script>
  
  <style>
    /* CSS cho form chọn ảnh */
    .image-select-card {
      cursor: pointer;
      transition: all 0.3s ease;
      border: 2px solid transparent;
    }
    
    .image-select-card:hover {
      border-color: #35A25B;
      transform: translateY(-2px);
      box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    }
    
    .image-select-card.selected {
      border-color: #35A25B;
      background-color: rgba(53, 162, 91, 0.1);
    }
    
    .image-select-card .form-check {
      margin: 0;
    }
    
    .image-select-card .form-check-input {
      margin-top: 0;
    }
    
    /* CSS cho preview ảnh */
    #selectedImagesPreview .card,
    #imagePreviewContainer .card {
      border: 1px solid #dee2e6;
      transition: all 0.3s ease;
    }
    
    #selectedImagesPreview .card:hover,
    #imagePreviewContainer .card:hover {
      border-color: #35A25B;
      transform: translateY(-1px);
    }
    
    /* CSS cho các form ẩn/hiện */
    .bg-info.bg-opacity-10 {
      background-color: rgba(13, 202, 240, 0.1) !important;
    }
    
    .bg-warning.bg-opacity-10 {
      background-color: rgba(255, 193, 7, 0.1) !important;
    }
  </style>
  @endpush
</x-layout>
