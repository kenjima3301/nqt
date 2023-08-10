<x-layout bodyClass="g-sidenav-show  bg-gray-200">
  <x-navbars.staffsidebar activePage='xuat-hang-dai-ly'></x-navbars.staffsidebar>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <x-navbars.navs.auth titlePage="Xuất hàng cho đại lý"></x-navbars.navs.auth>
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h5 class="mb-0">Xuất hàng cho đại lý - {{$dealer->name}}</h5>
            </div>
            <div class="card-body p-3 position-relative bg-gradient-light">
              <div class="row">
                <div class="col-7 text-start">
                  <h5 class="font-weight-bolder mb-0">
                    Mã đơn hàng: {{$output->output_code}}
                  </h5>
                  <form action="{{url('staff/updateoutput')}}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" name="output_id" value="{{$output->id}}">
                    <div class="form-group col-12 col-md-10">  
                  <label for="exampleInputname">Ghi chú: </label>
                  <textarea style="border-block: revert;" class=" form-control form-control-sm h-auto" name="note">{{$output->note}}</textarea>
                    </div>
                    <div class="form-group col-12 col-md-10">  
                      <label for="exampleInputname">Upload file</label> 
                      @if($output->file != NULL)
                      <a class="btn bg-light mb-0 text-end" href="{{url('staff/downloadoutput/'.$output->id)}}">Tải file</a>
                      @endif
                      <input type="file" class="form-control  border-radius-lg" name="outputfile" id="exampleInputFile">
                    </div>
                    <br/>
                  <input class="btn bg-light mb-0 text-end" type="submit" value="Cập nhật thông tin đơn hàng">
                  </form>
                </div>
              </div>
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
                      @foreach($output->dimentions as $dimention)
                      <tr>
                        <td>{{$dimention->dimention->tyre->name}}</td>
                        <td>{{$dimention->dimention->size}}</td>
                        <td>{{$dimention->quantity}}</td>
                        <td><a href="{{url("staff/xoa-nhap-dai-ly/".$dimention->id)}}">Xóa</a></td>
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
                @if(count($output->dimentions) >0)
                  <div class="d-sm-flex p-2 my-4">
                    <a href="{{url('staff/xac-nhan-xuat-hang-dai-ly/'.$output->id)}}" class="btn bg-gradient-primary">Xác nhận xuất hàng</a>
                    <a href="{{url('staff/huy-xuat-hang-dai-ly/'.$output->id)}}" class="btn">Hủy xuất hàng</a>
                  </div>
                @endif
              </div>
            </div>
          </div>
           
        </div>
      </div>
    </div>
    
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h5 class="mb-0">Đơn đã xuất cho - {{$dealer->name}}</h5>
            </div>
            <div class="table-responsive">
              <div class="dataTable-wrapper dataTable-loading no-footer sortable searchable fixed-height fixed-columns">
                <div class="dataTable-container"><table class="table table-flush dataTable-table" id="datatable-basic">
                    <thead class="thead-light">
                      <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" data-sortable="" style="width: 11.4645%;"><a href="#" class="dataTable-sorter">
                            Mã đơn hàng</a></th>
                       <th>Note</th>
                       <th>File</th>
                       <th>Ngày</th>
                       <th>Đã nhận hàng</th>
                    </thead>
                    <tbody>
                      @foreach ($outputed as $ed)
                                <tr>
                                  <td>
                                    <div class="d-flex px-2 py-1">
                                      <div class="d-flex flex-column justify-content-center">
                                        <h6 class="mb-0 text-xs"><a href="{{url('staff/xuat-hang-chi-tiet/'.$ed->id)}}">{{$ed->output_code}}</a></h6>
                                      </div>
                                    </div>
                                  </td>
                                  <td class="align-middle text-sm">{{$ed->note}}
                                  </td>
                                  <td class="align-middle text-sm">
                                    @if($ed->file != NULL)
                                    <a href="{{url('staff/downloadoutput/'.$ed->id)}}"><span class="badge badge-sm badge-success">Tải file</span></a>
                                    @endif
                                  </td>
                                  <td class="align-middle text-sm">
                                    <span class="badge badge-sm badge-success">{{$ed->created_at->format('d-m-Y')}}</span>
                                  </td>
                                  <td>
                                    @if($ed->status == 'nhap')
                                    <span class="badge badge-sm badge-success">Đã nhận hàng </span>
                                    @else
                                    <a href="{{url('staff/da-nhan-hang-tu-nqt/'.$ed->id)}}"><span class="badge badge-sm badge-danger">Xác nhận</span></a></td>
                                    @endif
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
      let output_id = {{$output->id}}
      let size_id = $("#select_size").val();
      let number = $("#totalnumber").val();
      $.ajax({
                  url:'{{url("add_temp_output")}}',
                  type:'post',
                  data:'output_id=' + output_id + '&size_id=' + size_id + '&number=' + number + '&_token={{csrf_token()}}',
                  success:function(result){
                      location.reload();
                  }
              });
    }
    </script>
  @endpush
</x-layout>

