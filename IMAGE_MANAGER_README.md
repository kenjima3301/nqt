# Hệ thống Quản lý Ảnh từ Máy chủ

## Tổng quan
Hệ thống này cho phép admin quản lý và chọn ảnh từ thư mục `/public/upload/product/` khi thêm lốp xe mới.

## Tính năng chính

### 1. Quản lý ảnh từ máy chủ
- **Xem danh sách ảnh**: Hiển thị tất cả ảnh trong thư mục `upload/product/`
- **Upload ảnh mới**: Thêm ảnh mới vào thư mục máy chủ
- **Tìm kiếm ảnh**: Tìm kiếm ảnh theo tên file
- **Xóa ảnh**: Xóa ảnh không cần thiết
- **Phân trang**: Hiển thị ảnh theo trang (20 ảnh/trang)

### 2. Chọn ảnh cho lốp xe
- **Chế độ Upload mới**: Upload ảnh từ máy tính (như cũ)
- **Chế độ Chọn từ máy chủ**: Chọn ảnh có sẵn từ thư mục máy chủ
- **Quản lý ảnh**: Mở modal quản lý ảnh để chọn/xóa/upload

## Cách sử dụng

### Bước 1: Truy cập trang thêm/sửa lốp xe
- Đăng nhập admin
- Vào `Admin > Lốp xe tải > Thêm lốp xe` hoặc `Admin > Lốp xe tải > Sửa lốp xe`

### Bước 2: Chọn nguồn ảnh
- **Upload mới**: Chọn radio button "Upload mới" (mặc định)
- **Chọn từ máy chủ**: Chọn radio button "Chọn từ máy chủ"

### Bước 3: Quản lý ảnh máy chủ
- Click nút "Quản lý ảnh máy chủ"
- Modal sẽ mở với các tính năng:
  - Upload ảnh mới (kéo thả hoặc click chọn)
  - Tìm kiếm ảnh theo tên
  - Chọn ảnh (checkbox)
  - Xóa ảnh đã chọn

### Bước 4: Chọn ảnh
- Chọn ảnh bằng cách click vào ảnh hoặc checkbox
- Click "Chọn ảnh" để xác nhận
- Ảnh đã chọn sẽ hiển thị trong form

### Bước 5: Lưu lốp xe
- Điền đầy đủ thông tin
- Click "Lưu" để tạo/cập nhật lốp xe

## Tính năng đặc biệt cho trang Sửa lốp xe

### Quản lý ảnh hiện có
- **Ảnh hiện tại**: Hiển thị tất cả ảnh đang được sử dụng
- **Xóa ảnh**: Click nút "x" để xóa ảnh không cần thiết
- **Giữ lại ảnh**: Ảnh không bị xóa sẽ được giữ lại

### Kết hợp nhiều nguồn ảnh
- **Ảnh hiện có**: Giữ lại những ảnh cần thiết
- **Upload mới**: Thêm ảnh mới từ máy tính
- **Chọn từ máy chủ**: Thêm ảnh từ thư mục máy chủ
- **Kết hợp**: Có thể sử dụng cả 3 nguồn ảnh cùng lúc

## Cấu trúc File

### Controller
- `ImageManagerController.php`: Xử lý logic quản lý ảnh
  - `index()`: Hiển thị danh sách ảnh với phân trang
  - `upload()`: Upload ảnh mới
  - `delete()`: Xóa ảnh
  - `search()`: Tìm kiếm ảnh

### Views
- `admin/partials/image-manager-modal.blade.php`: Modal quản lý ảnh
- `admin/trucktyres/add.blade.php`: Form thêm lốp xe (đã cập nhật)

### Routes
```php
Route::get('/image-manager', [ImageManagerController::class, 'index']);
Route::post('/image-manager/upload', [ImageManagerController::class, 'upload']);
Route::delete('/image-manager/delete', [ImageManagerController::class, 'delete']);
Route::get('/image-manager/search', [ImageManagerController::class, 'search']);
```

## API Endpoints

### GET /admin/image-manager
Lấy danh sách ảnh với phân trang
**Parameters:**
- `page` (optional): Số trang (mặc định: 1)

**Response:**
```json
{
  "images": [
    {
      "name": "image1.jpg",
      "path": "upload/product/image1.jpg",
      "url": "http://domain.com/upload/product/image1.jpg",
      "size": "1.2 MB",
      "modified": "15/01/2024 10:30"
    }
  ],
  "pagination": {
    "current_page": 1,
    "total_pages": 5,
    "per_page": 20,
    "total_images": 100
  }
}
```

### POST /admin/image-manager/upload
Upload ảnh mới
**Parameters:**
- `images[]`: Array of image files

**Response:**
```json
{
  "success": true,
  "message": "Upload thành công 3 ảnh",
  "images": [...]
}
```

### DELETE /admin/image-manager/delete
Xóa ảnh
**Parameters:**
- `filename`: Tên file ảnh

**Response:**
```json
{
  "success": true,
  "message": "Xóa ảnh thành công"
}
```

### GET /admin/image-manager/search
Tìm kiếm ảnh
**Parameters:**
- `keyword`: Từ khóa tìm kiếm

**Response:**
```json
{
  "images": [...],
  "total": 25
}
```

## Tính năng kỹ thuật

### Upload ảnh
- Hỗ trợ drag & drop
- Progress bar hiển thị tiến trình upload
- Validation: JPG, PNG, GIF, WebP, tối đa 2MB
- Tự động tạo tên file unique

### Hiển thị ảnh
- Grid layout responsive
- Lazy loading cho performance
- Hover effects và animations
- Thông tin chi tiết: tên, kích thước, ngày sửa

### Tìm kiếm
- Tìm kiếm theo tên file
- Real-time search
- Case-insensitive

### Phân trang
- Bootstrap pagination
- 20 ảnh mỗi trang
- Navigation buttons

## Lưu ý

1. **Thư mục ảnh**: Tất cả ảnh được lưu trong `/public/upload/product/`
2. **Quyền truy cập**: Chỉ admin mới có thể sử dụng tính năng này
3. **Backup**: Nên backup thư mục ảnh trước khi xóa hàng loạt
4. **Performance**: Với số lượng ảnh lớn, nên cân nhắc implement caching
5. **Security**: Validate file type và size để tránh upload file độc hại

## Troubleshooting

### Lỗi không hiển thị ảnh
- Kiểm tra quyền đọc thư mục `/public/upload/product/`
- Kiểm tra đường dẫn asset trong view

### Lỗi upload
- Kiểm tra quyền ghi thư mục
- Kiểm tra kích thước file (max 2MB)
- Kiểm tra định dạng file

### Lỗi xóa ảnh
- Kiểm tra quyền xóa file
- Kiểm tra file có đang được sử dụng không

## Cập nhật trong tương lai

1. **Thumbnail generation**: Tự động tạo thumbnail
2. **Image optimization**: Nén ảnh tự động
3. **Bulk operations**: Thao tác hàng loạt
4. **Image categories**: Phân loại ảnh
5. **Usage tracking**: Theo dõi ảnh đang được sử dụng
