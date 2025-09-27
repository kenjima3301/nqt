<x-layout bodyClass="g-sidenav-show  bg-gray-200">
  <x-navbars.sidebar activePage='lop-xe-tai'></x-navbars.sidebar>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <x-navbars.navs.auth titlePage="Quản lý"></x-navbars.navs.auth>
    <div class="container-fluid py-4">
      <div class="row mt-4">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h5 class="mb-0">Lốp xe tải ({{count($tyres)}})</h5>
            </div>
            <div class="col-12 text-end">
              <button type="button" class="btn btn-outline-secondary mb-0 me-2" id="toggleColumnsBtn">
                <i class="fas fa-columns"></i> Hiển thị cột
              </button>
              <button type="button" class="btn btn-outline-danger mb-0 me-2" id="bulkDeleteBtn" style="display: none;">
                <i class="fas fa-trash"></i> Xóa đã chọn
              </button>
              <a class="btn bg-gradient-primary mb-0 me-4" href="{{url('admin/lop-xe-tai-add')}}"><i class="material-icons text-sm">add</i>&nbsp;&nbsp;Thêm Lốp xe tải</a>
            </div>
            <div class="table-responsive">
              <div class="dataTable-wrapper dataTable-loading no-footer sortable searchable fixed-height fixed-columns">
                <div class="dataTable-container"><table class="table table-flush dataTable-table" id="datatable-basic">
                    <thead class="thead-light">
                      <tr>
                        <th style="width: 50px;">
                          <input type="checkbox" id="selectAll" class="form-check-input">
                        </th>
                        <th>Ảnh</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 sortable" style="width: 20%;">
                          <a href="#" class="dataTable-sorter" data-sort="name">
                            <i class="fas fa-sort me-1"></i>Tên
                          </a>
                        </th>
                        <th class="hidden-column">Kiểu đường lái</th>
                        <th class="hidden-column">Cấu trúc lốp</th>
                        <th class="hidden-column">Kiểu xe và vị trí lắp đặt</th>
                        <th class="text-center">Lượt xem</th>
                        <th class="text-center">Trạng thái</th>
                        <th class="text-center">Quản lý Size</th>
                        <th class="text-center" style="width: 180px;">Thao tác</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($tyres as $key => $tyre)
                      <tr>
                        <td class="text-center">
                          <input type="checkbox" class="form-check-input tyre-checkbox" value="{{$tyre->id}}">
                        </td>
                        <td class="text-sm font-weight-normal">
                          @php 
                            $thumb = $tyre->thumbnail_image ? asset($tyre->thumbnail_image) : 
                                    (isset($tyre->images[0]) ? asset($tyre->images[0]->image) : asset('assets/images/noimage.png')); 
                          @endphp
                          <img src="{{$thumb}}" alt="{{$tyre->name}}" width="80" height="80" style="object-fit:cover;border-radius:6px;">
                        </td>
                        <td class="text-sm font-weight-normal" data-sort="{{$tyre->name}}">{{$tyre->name}}</td>
                        <td class="text-sm font-weight-normal hidden-column">@if(isset($tyre->drive)) {{$tyre->drive->name}} @endif</td>
                        <td class="text-sm font-weight-normal hidden-column">{{$tyre->structure->name ?? ''}}</td>
                        <td class="text-sm font-weight-normal hidden-column">
                          @if($tyre->install_position_image != null)
                          <img src="{{asset($tyre->install_position_image)}}" width="200" style="border-radius:6px;">
                          @endif
                        </td>
                        <td class="text-center">{{$tyre->views}}</td>
                        <td class="text-sm font-weight-normal text-center">
                          @if($tyre->status == 'public')
                            <span class="badge bg-success text-center">Hiển thị</span>
                          @else
                            <span class="badge bg-secondary text-center">Đã ẩn</span>
                          @endif
                        </td>
                        <td class="text-center"><a href="{{url('admin/lop-xe-tai-import/'.$tyre->id)}}" class="mx-1" data-bs-toggle="tooltip" data-bs-original-title="Import sai">
                            Chi tiết Size
                          </a>
                        </td>
                        <td class="text-center">
                          <a href="{{url('admin/lop-xe-tai-sua/'.$tyre->id)}}" class="btn btn-sm btn-outline-primary edit-btn mx-1" data-bs-toggle="tooltip" data-bs-original-title="Sửa">
                            <i class="fas fa-edit me-1"></i>Sửa
                          </a>
                          <a href="{{url('admin/lop-xe-tai-an/'.$tyre->id)}}" class="btn btn-sm btn-outline-warning mx-1" data-bs-toggle="tooltip" data-bs-original-title="@if($tyre->status == 'public') Ẩn sản phẩm @else Hiển thị sản phẩm @endif">
                            @if($tyre->status == 'public') Ẩn @else Hiển thị @endif
                          </a>
                          <button type="button" class="btn btn-sm btn-outline-danger mx-1" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal" data-delete-url="{{url('admin/lop-xe-tai-xoa/'.$tyre->id)}}">
                            <i class="fas fa-trash me-1" aria-hidden="true"></i>Xóa
                          </button>
                        </td>
                      </tr>
                      @endforeach
                      
                    </tbody>
                  </table></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
  
  <style>
    .hidden-column {
      display: none !important;
    }
    
    .sortable {
      cursor: pointer;
      user-select: none;
      transition: background-color 0.2s ease;
    }
    
    .sortable:hover {
      background-color: rgba(0,0,0,0.05);
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
    
    .dataTable-sorter {
      text-decoration: none;
      color: inherit;
      display: flex;
      align-items: center;
    }
    
    .dataTable-sorter:hover {
      text-decoration: none;
      color: #35A25B;
    }
    
    .dataTable-sorter i {
      margin-right: 5px;
    }
    
    #toggleColumnsBtn {
      transition: all 0.3s ease;
    }
    
    #toggleColumnsBtn:hover {
      transform: translateY(-1px);
    }
    
    .table th {
      border-top: none;
      font-weight: 600;
    }
    
    .table td {
      vertical-align: middle;
    }
    
    .badge {
      font-size: 0.75em;
    }
    
    /* Đảm bảo các button có cùng chiều rộng */
    .btn-sm {
      min-width: 80px;
      text-align: center;
    }
    
    /* Cải thiện giao diện cột tên */
    .table td:nth-child(3) {
      max-width: 200px;
      overflow: hidden;
      text-overflow: ellipsis;
      white-space: nowrap;
    }
    
    /* Cải thiện giao diện button actions */
    .table td:last-child {
      white-space: nowrap;
    }
    
    /* Checkbox styling */
    .form-check-input {
      width: 20px;
      height: 20px;
      cursor: pointer;
      border: 2px solid #6c757d;
      background-color: #ffffff;
      box-shadow: 0 1px 3px rgba(0,0,0,0.1);
      transition: all 0.2s ease;
    }
    
    .form-check-input:hover {
      border-color: #35A25B;
      box-shadow: 0 2px 6px rgba(53, 162, 91, 0.2);
    }
    
    .form-check-input:checked {
      background-color: #35A25B;
      border-color: #35A25B;
      box-shadow: 0 2px 6px rgba(53, 162, 91, 0.3);
    }
    
    .form-check-input:focus {
      border-color: #35A25B;
      box-shadow: 0 0 0 0.2rem rgba(53, 162, 91, 0.25);
    }
    
    /* Bulk delete button styling */
    #bulkDeleteBtn {
      transition: all 0.3s ease;
    }
    
    #bulkDeleteBtn:hover {
      transform: translateY(-1px);
      box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    }
    
    /* Table row hover effect for selected items */
    .table tbody tr:hover {
      background-color: rgba(53, 162, 91, 0.05);
    }
    
    .table tbody tr.selected {
      background-color: rgba(53, 162, 91, 0.1);
    }
  </style>
  
@push('js')
  <script src="{{asset('assets/js/jquery-3.6.3.min.js')}}"></script>
<script>
function xoa(id) {
  
  $("#xoa"+id).hide();
  $("#xacnhan"+id).show();
}
</script>
 @if (count($tyres) > 5)
        @include('datatables')
    @endif
  @endpush
  
  @push('js')
  <script src="{{asset('assets/js/jquery-3.6.3.min.js')}}"></script>
  <script>
  function xoa(id) {
    $("#xoa"+id).hide();
    $("#xacnhan"+id).show();
  }
  
  $('#confirmDeleteModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget)
    var url = button.data('delete-url')
    $(this).find('#confirmDeleteBtn').attr('href', url)
  })
  
  // Toggle columns functionality
  let columnsVisible = false;
  
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
  
  // Custom sorting functionality
  let currentSort = 'asc';
  
  $('.dataTable-sorter').on('click', function(e) {
    e.preventDefault();
    
    const $this = $(this);
    const $header = $this.closest('th');
    const $table = $('#datatable-basic');
    const $tbody = $table.find('tbody');
    const $rows = $tbody.find('tr').toArray();
    
    // Remove existing sort classes
    $('.sortable').removeClass('sort-asc sort-desc');
    
    // Toggle sort direction
    if (currentSort === 'asc') {
      currentSort = 'desc';
      $header.addClass('sort-desc');
    } else {
      currentSort = 'asc';
      $header.addClass('sort-asc');
    }
    
    // Sort rows by name
    $rows.sort(function(a, b) {
      const nameA = $(a).find('td[data-sort]').attr('data-sort').toLowerCase();
      const nameB = $(b).find('td[data-sort]').attr('data-sort').toLowerCase();
      
      if (currentSort === 'asc') {
        return nameA.localeCompare(nameB, 'vi');
      } else {
        return nameB.localeCompare(nameA, 'vi');
      }
    });
    
    // Re-append sorted rows
    $tbody.empty().append($rows);
  });
  
  // Fix DataTables reinitialization error
  $(document).ready(function() {
    if ($.fn.DataTable.isDataTable('#datatable-basic')) {
      $('#datatable-basic').DataTable().destroy();
    }
    @if (count($tyres) > 5)
      $('#datatable-basic').DataTable({
        "pageLength": 10,
        "language": {
          "url": "//cdn.datatables.net/plug-ins/1.10.25/i18n/Vietnamese.json"
        },
        "columnDefs": [
          { "orderable": false, "targets": [0, 1, 7, 8, 9] } // Disable sorting for checkbox, image, status, manage, actions columns
        ]
      });
    @endif
  });

  // Bulk selection functionality
  $('#selectAll').on('change', function() {
    $('.tyre-checkbox').prop('checked', this.checked);
    updateBulkDeleteButton();
    updateRowSelection();
  });

  $('.tyre-checkbox').on('change', function() {
    updateBulkDeleteButton();
    updateSelectAllCheckbox();
    updateRowSelection();
  });

  function updateRowSelection() {
    $('.tyre-checkbox').each(function() {
      const $row = $(this).closest('tr');
      if ($(this).is(':checked')) {
        $row.addClass('selected');
      } else {
        $row.removeClass('selected');
      }
    });
  }

  function updateBulkDeleteButton() {
    const selectedCount = $('.tyre-checkbox:checked').length;
    if (selectedCount > 0) {
      $('#bulkDeleteBtn').show().text(`Xóa đã chọn (${selectedCount})`);
    } else {
      $('#bulkDeleteBtn').hide();
    }
  }

  function updateSelectAllCheckbox() {
    const totalCheckboxes = $('.tyre-checkbox').length;
    const checkedCheckboxes = $('.tyre-checkbox:checked').length;
    
    if (checkedCheckboxes === 0) {
      $('#selectAll').prop('indeterminate', false).prop('checked', false);
    } else if (checkedCheckboxes === totalCheckboxes) {
      $('#selectAll').prop('indeterminate', false).prop('checked', true);
    } else {
      $('#selectAll').prop('indeterminate', true);
    }
  }

  // Bulk delete functionality
  $('#bulkDeleteBtn').on('click', function() {
    const selectedIds = $('.tyre-checkbox:checked').map(function() {
      return $(this).val();
    }).get();

    if (selectedIds.length === 0) {
      alert('Vui lòng chọn ít nhất một lốp xe để xóa.');
      return;
    }

    if (confirm(`Bạn có chắc muốn xóa ${selectedIds.length} lốp xe đã chọn? Thao tác không thể hoàn tác.`)) {
      // Show loading state
      $(this).prop('disabled', true).html('<i class="fas fa-spinner fa-spin"></i> Đang xóa...');
      
      // Delete each tyre one by one
      let completed = 0;
      const total = selectedIds.length;
      
      selectedIds.forEach(function(id, index) {
        setTimeout(function() {
          $.ajax({
            url: `/admin/lop-xe-tai-xoa/${id}`,
            type: 'GET',
            success: function(response) {
              completed++;
              if (completed === total) {
                // All deletions completed, reload page
                location.reload();
              }
            },
            error: function(xhr, status, error) {
              console.error(`Error deleting tyre ${id}:`, error);
              completed++;
              if (completed === total) {
                // Even if some failed, reload to show current state
                location.reload();
              }
            }
          });
        }, index * 100); // Small delay between requests to avoid overwhelming server
      });
    }
  });
  </script>
  @endpush
  
  <!-- Confirm Delete Modal -->
  <div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="confirmDeleteLabel">Xác nhận xóa</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          Bạn có chắc muốn xóa lốp xe này? Thao tác không thể hoàn tác.
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
          <a id="confirmDeleteBtn" href="#" class="btn btn-danger">Xác nhận xóa</a>
        </div>
      </div>
    </div>
  </div>
</x-layout>

@push('js')
<style>
</style>
@endpush