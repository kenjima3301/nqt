<x-layout bodyClass="g-sidenav-show  bg-gray-200">
  <x-navbars.sidebar activePage='quan-ly-danh-gia'></x-navbars.sidebar>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <x-navbars.navs.auth titlePage="Quản lý đánh giá"></x-navbars.navs.auth>
    <div class="container-fluid py-4">
      <div class="row mt-4">
        <div class="col-12">
          <div class="card">
            <div class="col-12 text-end">
            </div>
            @foreach($reviews as $review)
            
              <div class="row p-2 ml-1" @if ($loop->even) style="background-color:#f6f8fa;" @endif>
                  <ul class="ratings">
                    <li class="fa fa-star w3-large @if($review->vote >= 5 ) checked @endif"></li>
                    <li class="fa fa-star w3-large @if($review->vote >= 4 ) checked @endif"></li>
                    <li class="fa fa-star w3-large @if($review->vote >= 3 ) checked @endif"></li>
                    <li class="fa fa-star w3-large @if($review->vote >= 2 ) checked @endif"></li>
                    <li class="fa fa-star w3-large @if($review->vote >= 1 ) checked @endif"></li>
                  </ul>
                  <p>{{$review->comment}}</p>
                  <p class="text-end"><a class="btn bg-gradient-primary mb-0 me-4" href="{{url('admin/danh-gia-tan-thanh/'.$review->id)}}" >Cho phép hiển thị</a> <a class="btn bg-gradient-primary mb-0 me-4" href="{{url('admin/danh-gia-xoa/'.$review->id)}}" >Xóa</a></p>
                </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </main>
  <style>
            .ratings {
  list-style-type: none;
  margin: 0;
  padding: 0;
  width: 100%;
  direction: rtl;
  text-align: left;
}

.star {
  position: relative;
  line-height: 30px;
  display: inline-block;
  transition: color 0.2s ease;
  color: #ebebeb;
}

.star:before {
  content: '\2605';
  width: 30px;
  height: 30px;
  font-size: 30px;
}

.star:hover,
.star.selected,
.star:hover ~ .star,
.star.selected ~ .star{
  transition: color 0.8s ease;
  color: orange;
}
.checked {
  color: orange;
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
</x-layout>