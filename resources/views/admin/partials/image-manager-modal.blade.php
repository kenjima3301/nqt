<!-- Image Manager Modal -->
<div class="modal fade" id="imageManagerModal" tabindex="-1" aria-labelledby="imageManagerModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="imageManagerModalLabel">
                    <i class="fas fa-images"></i> Quản lý ảnh từ máy chủ
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Upload Section -->
                <div class="row mb-4">
                    <div class="col-md-8">
                        <div class="upload-section">
                            <label class="form-label">Upload ảnh mới:</label>
                            <div class="upload-area border border-2 border-dashed rounded p-4 text-center" id="uploadArea">
                                <i class="fas fa-cloud-upload-alt fa-3x text-muted mb-3"></i>
                                <p class="mb-2">Kéo thả ảnh vào đây hoặc click để chọn</p>
                                <p class="text-muted small">Hỗ trợ: JPG, PNG, GIF, WebP (tối đa 2MB mỗi ảnh)</p>
                                <input type="file" id="imageUpload" multiple accept="image/*" style="display: none;">
                                <button type="button" class="btn btn-outline-primary" onclick="document.getElementById('imageUpload').click()">
                                    <i class="fas fa-plus"></i> Chọn ảnh
                                </button>
                            </div>
                            <div id="uploadProgress" class="mt-3" style="display: none;">
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" style="width: 0%"></div>
                                </div>
                                <small class="text-muted">Đang upload...</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="search-section">
                            <label class="form-label">Tìm kiếm ảnh:</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="searchImages" placeholder="Nhập tên ảnh...">
                                <button class="btn btn-outline-secondary" type="button" id="searchBtn">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Image Grid -->
                <div class="image-grid-section">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h6 class="mb-0">Ảnh có sẵn (<span id="totalImages">0</span>)</h6>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="selectAllImages">
                            <label class="form-check-label" for="selectAllImages">
                                Chọn tất cả
                            </label>
                        </div>
                    </div>
                    
                    <div id="imageGrid" class="row g-3">
                        <!-- Images will be loaded here -->
                    </div>
                    
                    <!-- Pagination -->
                    <nav aria-label="Image pagination" class="mt-4">
                        <ul class="pagination justify-content-center" id="imagePagination">
                            <!-- Pagination will be generated here -->
                        </ul>
                    </nav>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                <button type="button" class="btn btn-danger" id="deleteSelectedImages" style="display: none;">
                    <i class="fas fa-trash"></i> Xóa ảnh đã chọn
                </button>
                <button type="button" class="btn btn-primary" id="selectImagesBtn">
                    <i class="fas fa-check"></i> Chọn ảnh (<span id="selectedCount">0</span>)
                </button>
            </div>
        </div>
    </div>
</div>

<style>
.image-card {
    position: relative;
    border: 2px solid transparent;
    border-radius: 8px;
    overflow: hidden;
    transition: all 0.3s ease;
    cursor: pointer;
}

.image-card:hover {
    border-color: #35A25B;
    transform: translateY(-2px);
    box-shadow: 0 4px 8px rgba(0,0,0,0.1);
}

.image-card.selected {
    border-color: #35A25B;
    background-color: rgba(53, 162, 91, 0.1);
}

.image-card img {
    width: 100%;
    height: 150px;
    object-fit: cover;
}

.image-card .image-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(0,0,0,0.7);
    color: white;
    display: flex;
    align-items: center;
    justify-content: center;
    opacity: 0;
    transition: opacity 0.3s ease;
}

.image-card:hover .image-overlay {
    opacity: 1;
}

.image-card .image-info {
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    background: rgba(0,0,0,0.8);
    color: white;
    padding: 8px;
    font-size: 0.8em;
}

.image-card .select-checkbox {
    position: absolute;
    top: 8px;
    right: 8px;
    z-index: 10;
}

.upload-area {
    transition: all 0.3s ease;
}

.upload-area:hover {
    border-color: #35A25B !important;
    background-color: rgba(53, 162, 91, 0.05);
}

.upload-area.dragover {
    border-color: #35A25B !important;
    background-color: rgba(53, 162, 91, 0.1);
}
</style>

<script>
let selectedImages = [];
let currentPage = 1;
let totalPages = 1;

$(document).ready(function() {
    // Load images on modal open
    $('#imageManagerModal').on('shown.bs.modal', function() {
        loadImages();
    });

    // Upload functionality
    $('#imageUpload').on('change', function(e) {
        uploadImages(e.target.files);
    });

    // Drag and drop
    $('#uploadArea').on('dragover', function(e) {
        e.preventDefault();
        $(this).addClass('dragover');
    }).on('dragleave', function(e) {
        e.preventDefault();
        $(this).removeClass('dragover');
    }).on('drop', function(e) {
        e.preventDefault();
        $(this).removeClass('dragover');
        uploadImages(e.originalEvent.dataTransfer.files);
    });

    // Search functionality
    $('#searchBtn').on('click', function() {
        searchImages();
    });

    $('#searchImages').on('keypress', function(e) {
        if (e.which === 13) {
            searchImages();
        }
    });

    // Select all functionality
    $('#selectAllImages').on('change', function() {
        if ($(this).is(':checked')) {
            $('.image-card').addClass('selected');
            $('.image-checkbox').prop('checked', true);
            selectedImages = [];
            $('.image-checkbox:checked').each(function() {
                selectedImages.push($(this).val());
            });
        } else {
            $('.image-card').removeClass('selected');
            $('.image-checkbox').prop('checked', false);
            selectedImages = [];
        }
        updateSelectedCount();
    });

    // Select images functionality
    $('#selectImagesBtn').on('click', function() {
        if (selectedImages.length > 0) {
            // Add selected images to the main form
            addSelectedImagesToForm();
            $('#imageManagerModal').modal('hide');
        }
    });

    // Delete selected images
    $('#deleteSelectedImages').on('click', function() {
        if (selectedImages.length > 0 && confirm('Bạn có chắc chắn muốn xóa ' + selectedImages.length + ' ảnh đã chọn?')) {
            deleteSelectedImages();
        }
    });
});

function loadImages(page = 1) {
    $.get('{{ route("admin.image-manager") }}', { page: page })
        .done(function(response) {
            displayImages(response.images);
            updatePagination(response.pagination);
            currentPage = page;
        })
        .fail(function() {
            showAlert('Lỗi khi tải ảnh', 'error');
        });
}

function searchImages() {
    const keyword = $('#searchImages').val();
    $.get('{{ route("admin.image-manager.search") }}', { keyword: keyword })
        .done(function(response) {
            displayImages(response.images);
            $('#totalImages').text(response.total);
            $('#imagePagination').empty(); // Hide pagination for search results
        })
        .fail(function() {
            showAlert('Lỗi khi tìm kiếm ảnh', 'error');
        });
}

function displayImages(images) {
    const grid = $('#imageGrid');
    grid.empty();
    
    if (images.length === 0) {
        grid.html('<div class="col-12 text-center text-muted py-5"><i class="fas fa-images fa-3x mb-3"></i><p>Không có ảnh nào</p></div>');
        return;
    }

    images.forEach(function(image) {
        const imageCard = $(`
            <div class="col-md-3 col-sm-4 col-6">
                <div class="image-card" data-image="${image.name}">
                    <input type="checkbox" class="image-checkbox select-checkbox" value="${image.name}">
                    <img src="${image.url}" alt="${image.name}" loading="lazy">
                    <div class="image-overlay">
                        <i class="fas fa-eye fa-2x"></i>
                    </div>
                    <div class="image-info">
                        <div class="d-flex justify-content-between">
                            <span>${image.size}</span>
                            <span>${image.modified}</span>
                        </div>
                        <div class="text-truncate" title="${image.name}">${image.name}</div>
                    </div>
                </div>
            </div>
        `);
        
        grid.append(imageCard);
    });

    // Add click handlers for image selection
    $('.image-card').on('click', function(e) {
        if (e.target.type !== 'checkbox') {
            const checkbox = $(this).find('.image-checkbox');
            checkbox.prop('checked', !checkbox.prop('checked'));
            $(this).toggleClass('selected', checkbox.prop('checked'));
            
            if (checkbox.prop('checked')) {
                if (!selectedImages.includes(checkbox.val())) {
                    selectedImages.push(checkbox.val());
                }
            } else {
                selectedImages = selectedImages.filter(img => img !== checkbox.val());
            }
            updateSelectedCount();
        }
    });

    $('.image-checkbox').on('change', function() {
        const card = $(this).closest('.image-card');
        card.toggleClass('selected', $(this).prop('checked'));
        
        if ($(this).prop('checked')) {
            if (!selectedImages.includes($(this).val())) {
                selectedImages.push($(this).val());
            }
        } else {
            selectedImages = selectedImages.filter(img => img !== $(this).val());
        }
        updateSelectedCount();
    });

    $('#totalImages').text(images.length);
}

function updatePagination(pagination) {
    const paginationContainer = $('#imagePagination');
    paginationContainer.empty();
    
    if (pagination.total_pages <= 1) return;

    // Previous button
    if (pagination.current_page > 1) {
        paginationContainer.append(`
            <li class="page-item">
                <a class="page-link" href="#" onclick="loadImages(${pagination.current_page - 1})">Trước</a>
            </li>
        `);
    }

    // Page numbers
    for (let i = 1; i <= pagination.total_pages; i++) {
        const isActive = i === pagination.current_page;
        paginationContainer.append(`
            <li class="page-item ${isActive ? 'active' : ''}">
                <a class="page-link" href="#" onclick="loadImages(${i})">${i}</a>
            </li>
        `);
    }

    // Next button
    if (pagination.current_page < pagination.total_pages) {
        paginationContainer.append(`
            <li class="page-item">
                <a class="page-link" href="#" onclick="loadImages(${pagination.current_page + 1})">Sau</a>
            </li>
        `);
    }
}

function uploadImages(files) {
    if (files.length === 0) return;

    const formData = new FormData();
    Array.from(files).forEach(file => {
        formData.append('images[]', file);
    });

    $('#uploadProgress').show();
    $('#uploadProgress .progress-bar').css('width', '0%');

    $.ajax({
        url: '{{ route("admin.image-manager.upload") }}',
        type: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        xhr: function() {
            const xhr = new window.XMLHttpRequest();
            xhr.upload.addEventListener("progress", function(evt) {
                if (evt.lengthComputable) {
                    const percentComplete = evt.loaded / evt.total * 100;
                    $('#uploadProgress .progress-bar').css('width', percentComplete + '%');
                }
            }, false);
            return xhr;
        },
        success: function(response) {
            $('#uploadProgress').hide();
            showAlert(response.message, 'success');
            loadImages(currentPage); // Reload current page
            $('#imageUpload').val(''); // Clear input
        },
        error: function(xhr) {
            $('#uploadProgress').hide();
            const errors = xhr.responseJSON?.errors || {};
            let errorMessage = 'Lỗi khi upload ảnh';
            if (Object.keys(errors).length > 0) {
                errorMessage = Object.values(errors).flat().join(', ');
            }
            showAlert(errorMessage, 'error');
        }
    });
}

function deleteSelectedImages() {
    const promises = selectedImages.map(imageName => {
        return $.ajax({
            url: '{{ route("admin.image-manager.delete") }}',
            type: 'DELETE',
            data: { filename: imageName },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    });

    Promise.all(promises)
        .then(() => {
            showAlert('Xóa ảnh thành công', 'success');
            selectedImages = [];
            updateSelectedCount();
            loadImages(currentPage);
        })
        .catch(() => {
            showAlert('Lỗi khi xóa ảnh', 'error');
        });
}

function updateSelectedCount() {
    const count = selectedImages.length;
    $('#selectedCount').text(count);
    $('#deleteSelectedImages').toggle(count > 0);
    $('#selectAllImages').prop('checked', count > 0 && count === $('.image-checkbox').length);
}

function addSelectedImagesToForm() {
    // This function will be called from the main form
    // It should add the selected images to the tyre form
    if (typeof window.addImagesToTyreForm === 'function') {
        window.addImagesToTyreForm(selectedImages);
    }
}

function showAlert(message, type) {
    const alertClass = type === 'success' ? 'alert-success' : 'alert-danger';
    const alert = $(`
        <div class="alert ${alertClass} alert-dismissible fade show" role="alert">
            ${message}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    `);
    
    $('#imageManagerModal .modal-body').prepend(alert);
    
    setTimeout(() => {
        alert.alert('close');
    }, 3000);
}
</script>
