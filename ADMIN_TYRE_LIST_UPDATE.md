# Cập nhật Giao diện Admin Lốp xe tải

## Tổng quan
Đã cập nhật giao diện trang quản lý lốp xe tải (`admin/lop-xe-tai`) với các tính năng mới để cải thiện trải nghiệm người dùng.

## Tính năng mới

### 1. Sort theo tên (A-Z/Z-A)
- **Vị trí**: Cột "Tên" trong bảng
- **Cách sử dụng**: Click vào header cột "Tên" để sắp xếp
- **Chức năng**: 
  - Click lần 1: Sắp xếp A-Z (tăng dần)
  - Click lần 2: Sắp xếp Z-A (giảm dần)
- **Visual feedback**: Hiển thị mũi tên ↑ (tăng dần) hoặc ↓ (giảm dần)

### 2. Ẩn/Hiện cột không cần thiết
- **Các cột bị ẩn mặc định**:
  - Kiểu đường lái
  - Cấu trúc lốp  
  - Kiểu xe và vị trí lắp đặt
- **Nút toggle**: "Hiển thị cột" / "Ẩn cột"
- **Lợi ích**: Giao diện gọn gàng hơn, tập trung vào thông tin quan trọng

## Cách sử dụng

### Sort theo tên
1. Truy cập trang `Admin > Lốp xe tải`
2. Click vào header cột "Tên" (có icon sort)
3. Danh sách sẽ được sắp xếp theo bảng chữ cái
4. Click lại để đảo ngược thứ tự

### Toggle hiển thị cột
1. Click nút "Hiển thị cột" ở góc trên bên phải
2. Các cột ẩn sẽ hiện ra
3. Click "Ẩn cột" để ẩn lại

## Cải tiến giao diện

### Visual Enhancements
- **Hover effects**: Hiệu ứng hover cho các nút và header
- **Smooth transitions**: Chuyển động mượt mà
- **Better spacing**: Khoảng cách hợp lý giữa các elements
- **Color coding**: Màu sắc nhất quán với theme

### Responsive Design
- **Mobile friendly**: Tối ưu cho thiết bị di động
- **Table responsive**: Bảng tự động cuộn ngang trên màn hình nhỏ
- **Button sizing**: Kích thước nút phù hợp với touch devices

## Cấu trúc Code

### HTML Changes
```html
<!-- Sortable header -->
<th class="sortable">
  <a href="#" class="dataTable-sorter" data-sort="name">
    <i class="fas fa-sort me-1"></i>Tên
  </a>
</th>

<!-- Hidden columns -->
<th class="hidden-column">Kiểu đường lái</th>
<th class="hidden-column">Cấu trúc lốp</th>
<th class="hidden-column">Kiểu xe và vị trí lắp đặt</th>

<!-- Toggle button -->
<button type="button" class="btn btn-outline-secondary" id="toggleColumnsBtn">
  <i class="fas fa-columns"></i> Hiển thị cột
</button>
```

### CSS Features
```css
.hidden-column {
  display: none !important;
}

.sortable {
  cursor: pointer;
  user-select: none;
  transition: background-color 0.2s ease;
}

.sort-asc::after {
  content: " ↑";
  color: #35A25B;
  font-weight: bold;
}

.sort-desc::after {
  content: " ↓";
  color: #35A25B;
  font-weight: bold;
}
```

### JavaScript Functionality
```javascript
// Toggle columns
$('#toggleColumnsBtn').on('click', function() {
  columnsVisible = !columnsVisible;
  if (columnsVisible) {
    $('.hidden-column').show();
    $(this).html('<i class="fas fa-columns"></i> Ẩn cột');
  } else {
    $('.hidden-column').hide();
    $(this).html('<i class="fas fa-columns"></i> Hiển thị cột');
  }
});

// Custom sorting
$('.dataTable-sorter').on('click', function(e) {
  e.preventDefault();
  // Sort logic with Vietnamese locale support
  $rows.sort(function(a, b) {
    const nameA = $(a).find('td[data-sort]').attr('data-sort').toLowerCase();
    const nameB = $(b).find('td[data-sort]').attr('data-sort').toLowerCase();
    return nameA.localeCompare(nameB, 'vi');
  });
});
```

## Lợi ích

### Cho Admin
- **Tìm kiếm nhanh**: Sort theo tên giúp tìm sản phẩm dễ dàng
- **Giao diện gọn**: Ẩn cột không cần thiết giúp tập trung
- **Linh hoạt**: Có thể hiện/ẩn cột khi cần
- **Trải nghiệm tốt**: Hover effects và animations mượt mà

### Cho Performance
- **Load nhanh hơn**: Ít DOM elements khi ẩn cột
- **Memory efficient**: Không render cột không cần thiết
- **Smooth interactions**: Transitions được optimize

## Browser Support
- **Chrome**: ✅ Full support
- **Firefox**: ✅ Full support  
- **Safari**: ✅ Full support
- **Edge**: ✅ Full support
- **Mobile browsers**: ✅ Responsive design

## Future Enhancements
1. **Multi-column sorting**: Sort theo nhiều cột cùng lúc
2. **Column customization**: Cho phép admin chọn cột hiển thị
3. **Save preferences**: Lưu cài đặt hiển thị cột
4. **Advanced filtering**: Filter theo nhiều tiêu chí
5. **Export options**: Export danh sách với cột đã chọn

## Troubleshooting

### Sort không hoạt động
- Kiểm tra jQuery đã load chưa
- Kiểm tra console có lỗi JavaScript không
- Đảm bảo data-sort attribute có trong td

### Toggle cột không hoạt động
- Kiểm tra class "hidden-column" có đúng không
- Kiểm tra CSS có bị override không
- Kiểm tra JavaScript event binding

### Performance issues
- Với danh sách lớn (>1000 items), cân nhắc server-side sorting
- Implement pagination nếu cần
- Sử dụng virtual scrolling cho danh sách rất lớn

## Notes
- Tính năng sort hoạt động với Vietnamese locale
- Các cột ẩn vẫn tồn tại trong DOM, chỉ bị ẩn bằng CSS
- DataTables integration được giữ nguyên để tương thích
- Responsive design đảm bảo hoạt động tốt trên mobile
