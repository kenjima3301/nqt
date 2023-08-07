<x-layout bodyClass="g-sidenav-show  bg-gray-200">
  <x-navbars.staffsidebar activePage='xuat-hang-dai-ly'></x-navbars.staffsidebar>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <x-navbars.navs.auth titlePage="Xuất hàng cho đại lý"></x-navbars.navs.auth>
    <div class="container-fluid py-4">
      <div class="row mt-4">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h5 class="mb-0">Xuất hàng cho đại lý - {{$dealer->name}}</h5>
            </div>
            <div class="table-responsive">
              <div class="dataTable-wrapper dataTable-loading no-footer sortable searchable fixed-height fixed-columns">
                <div class="dataTable-container"><table class="table table-flush dataTable-table" id="datatable-basic">
                    <thead class="thead-light">
                      <th  style="width: 22%;"> Mã Gai</th>
                      <th>Sai</th>
                      <th>Số lượng</th>
                    </thead>
                    <tbody>
                      @foreach($outputs as $output)
                      <tr>
                        <td>{{$output->dimention->tyre->name}}</td>
                        <td>{{$output->dimention->size}}</td>
                        <td>{{$output->quantity}}</td>
                        <td><a href="{{url("staff/xoa-nhap-dai-ly/".$output->id)}}">Xóa</a></td>
                      </tr>
                      @endforeach
                      <tr>
                        <td>
                          <select name="tyre_id" id="tyre_id">
                            <option>--Chọn mã gai--</option>
                            @foreach ($tyres as $key => $tyre)
                            <option value="{{$tyre->id}}">{{$tyre->name}}</option>
                            @endforeach
                          </select>
                        </td>
                        <td id="size_list">
                          
                        </td>
                        <td id="total" style="display: none"><input type="number" name="total" id="totalnumber"></td>
                        <td id="action" style="display: none; "><input type="button" id="add" value="Thêm sai lốp" style="background-color: #4CAF50; color:white;border: none" onclick="addmoreoutputtyre()"></td>
                      </tr>
                      
                    </tbody>
                  </table></div>
                @if(count($outputs)  >0)
                  <div class="d-sm-flex p-2 my-4">
                    <a href="{{url('staff/xac-nhan-xuat-hang-dai-ly/'.$dealer->id)}}" class="btn bg-gradient-primary">Xác nhận xuất hàng</a>
                    <a href="{{url('staff/huy-xuat-hang-dai-ly/'.$dealer->id)}}" class="btn">Hủy xuất hàng</a>
                  </div>
                @endif
              </div>
            </div>
          </div>
           
        </div>
      </div>
    </div>
  </main>
  @push('js')
  <script src="{{asset('assets/js/jquery-3.6.3.min.js')}}"></script>
  <link href="{{asset('assets/css/select2.min.css')}}" rel="stylesheet" />
  <script src="{{asset('assets/js/select2.min.js')}}"></script>
  <script>
        $(document).ready(function(){
          $('#tyre_id').select2();
          $('#tyre_id').change(function(){
              let tyre_id = $(this).val();
              get_size_list_by_tyre(tyre_id);
          });
    });
    function get_size_list_by_tyre(tyre_id) {
            $.ajax({
                  url:'{{url("get_get_size_list_by_tyre_id")}}',
                  type:'post',
                  data:'tyre_id=' + tyre_id + '&_token={{csrf_token()}}',
                  success:function(result){
                      $('#size_list').html(result);
                      $("#select_size").select2();
                      $('#total').show();
                      $('#action').show();
                      $('#select_size').change(function(){
                        let size_id = $(this).val();
                      });
                  }
              });
    } 
    
    function addmoreoutputtyre(){
      let dealer_id = {{$dealer->id}};
      let size_id = $("#select_size").val();
      let number = $("#totalnumber").val();
      $.ajax({
                  url:'{{url("add_temp_output")}}',
                  type:'post',
                  data:'dealer_id=' + dealer_id + '&size_id=' + size_id + '&number=' + number + '&_token={{csrf_token()}}',
                  success:function(result){
                      location.reload();
                  }
              });
    }
    </script>
  @endpush
</x-layout>

