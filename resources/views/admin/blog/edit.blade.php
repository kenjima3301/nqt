<x-layout bodyClass="g-sidenav-show  bg-gray-200">
  <x-navbars.sidebar activePage='bai-viet'></x-navbars.sidebar>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <x-navbars.navs.auth titlePage="Sửa  bài viết"></x-navbars.navs.auth>
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12 col-lg-10 m-auto">
          <div class="card">
            <div class="card-header">
              <h5 class="mb-0">Sửa bài viết</h5>
            </div>
            @if ($message = Session::get('success'))
            <div class="alert alert-success alert-block">
              {{$message}}
            </div>
            @endif
            <div class="card-body">
              <form method="POST" action="{{url('admin/bai-viet-edit/'.$post->id)}}" class="d-flex flex-column align-items-center" enctype="multipart/form-data">
                @csrf
                <div class="form-group col-12 col-md-9">
                      <label for="exampleInputname">Chọn mục bài viết</label>
                      <select class="form-control" name="type" id="type">
                        @foreach($types as $type)
                        <option value="{{$type->id}}" @if($type->id == $post->type->id) selected @endif>{{$type->name}}</option>
                        @endforeach
                      </select>
                    </div>
                <div class="form-group col-12 col-md-9">
                  <label for="exampleInputname">Tiêu đề</label>
                  <input type="name" name="title" class="form-control border border-2 p-2" id="exampleInputname" value="{{$post->title}}" onfocus="focused(this)" onfocusout="defocused(this)">
                </div>
                <div class="form-group col-12 col-md-9">
                  <label for="exampleInputname">Tiêu đề tiếng anh</label>
                  <input type="name" name="title_en" value="{{$post->title_en}}" class="form-control border border-2 p-2" id="exampleInputname" placeholder="Tiêu đề tiếng anh" value="" onfocus="focused(this)" onfocusout="defocused(this)">
                </div>
                <div class="form-group col-12 col-md-9">
                  <label for="exampleInputname">Nội dung</label>
                  <textarea id="content" name="content" rows="5" class="form-control border border-2 p-2">{!! $post->content !!}</textarea>
                  </div>
                <div class="form-group col-12 col-md-9">
                  <label for="exampleInputname">Nội dung tiếng anh</label>
                  <textarea id="contenten" name="content_en" rows="5" class="form-control border border-2 p-2">{!! $post->content_en !!}</textarea>
                  </div>


                @if($errors->any())
                <div class="text-danger">
                 Hãy nhập đầy đủ thông tin các trường bên trên
                </div>
                @endif
                <button type="submit" class="btn bg-gradient-primary mt-3">Đăng</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
<script src="{{asset('assets/js/jquery-3.6.3.min.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#content').summernote({
              tabsize: 2,
                height: 300,
                toolbar: [
                  ['style', ['style']],
                  ['font', ['bold', 'underline', 'clear']],
                  ['fontname', ['fontname']],
                  ['color', ['color']],
                  ['para', ['ul', 'ol', 'paragraph']],
                  ['table', ['table']],
                  ['insert', ['link', 'picture', 'video']],
                  ['view', ['codeview', 'help']],
                ]
            });
            $('#content').summernote('fontName', 'Arial');
            $('#contenten').summernote({
              tabsize: 2,
                height: 300,
                toolbar: [
                  ['style', ['style']],
                  ['font', ['bold', 'underline', 'clear']],
                  ['fontname', ['fontname']],
                  ['color', ['color']],
                  ['para', ['ul', 'ol', 'paragraph']],
                  ['table', ['table']],
                  ['insert', ['link', 'picture', 'video']],
                  ['view', ['codeview', 'help']],
                ]
            });
            $('#contenten').summernote('fontName', 'Arial');
        });
    </script>
</x-layout>
