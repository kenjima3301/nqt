<x-layout bodyClass="g-sidenav-show  bg-gray-200">
  <x-navbars.sidebar activePage='dai-ly'></x-navbars.sidebar>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <x-navbars.navs.auth titlePage="Sửa đại lý"></x-navbars.navs.auth>
    @if($dealer->user_id == NULL)
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12 col-lg-8 m-auto">
          <div class="card">
            <div class="card-header">
              <h5 class="mb-0">Tạo tài khoản cho đại lý</h5>
            </div>
            @if ($message = Session::get('successaccount'))
            <div class="alert alert-success alert-block">
              {{$message}}
            </div>
            @endif
            <div class="card-body">
              <form role="form" method="POST" action="{{ url('admin/register-dealer') }}">
                        {{ csrf_field() }}
                        <input type="hidden" name="dealer_id" value="{{$dealer->id}}">
                   <div class=" col-12 col-md-8 pl-4">
                    <label for="form2Example11">Nhập tên đầy đủ </label>
                    <input id="name" type="text" class="form-control border border-2 p-2" name="name" value="{{ old('name') }}" required autofocus>
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                  </div>
                  <div class="form-group col-12 col-md-8">
                    <label class="form-label" for="form2Example11">Nhập email  </label>
                    <input id="email" type="text" class="form-control border border-2 p-2" name="email" value="{{ old('email') }}" required autofocus>
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                  </div>
                  <div class="form-group col-12 col-md-8">
                    <label class="form-label" for="form2Example11">Nhập số điện thoại</label>
                    <input id="phone" type="text" class="form-control border border-2 p-2" name="phone" value="{{ old('phone') }}" required autofocus>
                                @if ($errors->has('phone'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                  </div>

                  <div class="form-group col-12 col-md-8">
                    <label class="form-label" for="form2Example22">Nhập mật khẩu</label>
                    <input id="password" type="text" class="form-control border border-2 p-2" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                    
                  </div>

                  <div class="text-center pt-1 pb-1">
                    <button class="btn btn-block fa-lg gradient-custom-2 mb-3 text-white" style="background-color: #35A25B" type="submit">
                      Tạo tài khoản đại lý</button>
                  </div>
                  
                </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    @else 
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12 col-lg-8 m-auto">
          <div class="card">
            <div class="card-header">
              <h5 class="mb-0">Tạo tài khoản cho đại lý</h5>
            </div>

    <div class="card-body mx-3 mx-md-4 mt-n6">

<div class="row">
<div class="row mt-3">

<div class="col-12 col-md-6 col-xl-4 mt-md-0 mt-4 position-relative">
<div class="card card-plain h-100">
<div class="card-header pb-0 p-3">
<div class="row">
<div class="col-md-8 d-flex align-items-center">
<h6 class="mb-0">Thông tin tài khoản đạil lý</h6>
</div>
<div class="col-md-4 text-end">
<a href="javascript:;">
<i class="fas fa-user-edit text-secondary text-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="" aria-hidden="true" data-bs-original-title="Edit Profile" aria-label="Edit Profile"></i><span class="sr-only">Edit Profile</span>
</a>
</div>
</div>
</div>
<div class="card-body p-3">
<hr class="horizontal gray-light my-4">
<ul class="list-group">
<li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">Full Name:</strong> {{$dealeraccount->name}}</li>
<li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Mobile:</strong> {{$dealeraccount->phone}}</li>
<li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Email:</strong> {{$dealeraccount->email}}</li>
</ul>
</div>
</div>
<hr class="vertical dark">
</div>

</div>

</div>
</div>
            </div>
      </div>
    </div>
    @endif
    
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12 col-lg-8 m-auto">
          <div class="card">
            <div class="card-header">
              <h5 class="mb-0">Sửa đại lý</h5>
            </div>
            @if ($message = Session::get('success'))
            <div class="alert alert-success alert-block">
              {{$message}}
            </div>
            @endif
            <div class="card-body">
              <form method="POST" action="{{url('admin/dai-ly-edit')}}" class="d-flex flex-column align-items-center" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="dealer_id" value="{{$dealer->id}}">
                <div class="form-group col-12 col-md-8">
                  <label for="exampleInputname">Tên</label>
                  <input type="name" name="name" value="{{ $dealer->name}}" class="form-control border border-2 p-2" id="exampleInputname" placeholder="Tên đại lý" value="" onfocus="focused(this)" onfocusout="defocused(this)">
                </div>
                <div class="row col-12 col-md-8">
                 <div class="form-group col-6">
                      <label for="exampleInputname">Khu vực</label>
                      <select class="form-control" name="area" id="area">
                        <option @if($dealer->area == "Miền Bắc") selected @endif value="Miền Bắc">Miền Bắc</option>
                              <option @if($dealer->area == "Miền Trung") selected @endif value="Miền Trung">Miền Trung</option>
                              <option @if($dealer->area == "Miền Nam") selected @endif value="Miền Nam">Miền Nam</option>
                      </select>
                    </div>
                <div class="form-group col-6">
                      <label for="exampleInputname">Tỉnh</label>
                      <select class="form-control" name="province" id="province">
                            @foreach ($provinces as $province)
                              <option @if($dealer->province == $province->name) selected @endif value="{{$province->name}}">{{$province->name}}</option>
                              @endforeach
                      </select>
                    </div>
                  </div>
                <div class="form-group col-12 col-md-8">
                  <label for="exampleInputname">Địa chỉ:</label>
                  <input type="text" name="address" value="{{$dealer->address}}" class="controls form-control border border-2 p-2" id="address123" placeholder="Địa chỉ" value="" onfocus="focused(this)" onfocusout="defocused(this)">
                </div>
                <br/>
                <div class="form-group col-12 col-md-8">
                  <label for="exampleInputname">Di chuyển đến địa chỉ chính xác trên bản đồ</label>
                  <div id="mapCanvas"></div>
                  <input type="hidden" name="lat" id="lat" value="{{$dealer->lat}}">
                  <input type="hidden" name="lng" id="lng" value="{{$dealer->lng}}">
                </div>
                <br/>
                <div class="form-group col-12 col-md-8">
                  <label for="exampleInputname">Email</label>
                  <input type="name" name="email" value="{{$dealer->email}}" class="form-control border border-2 p-2" id="exampleInputname" placeholder="Email" value="" onfocus="focused(this)" onfocusout="defocused(this)">
                </div>
                <div class="form-group col-12 col-md-8">
                  <label for="exampleInputname">Phone</label>
                  <input type="name" name="phone" value="{{$dealer->phone}}" class="form-control border border-2 p-2" id="exampleInputname" placeholder="Phone" value="" onfocus="focused(this)" onfocusout="defocused(this)">
                </div>
                <br/>
                <div class="form-group col-md-8">
                  <label for="exampleInputname">Ảnh đại lý</label>
                   <img src="{{asset($dealer->image)}}" alt="Mike Anamendolla" class="mx-auto d-block img-fluid mw-20">
                   
                   <label for="exampleInputname">Thay Ảnh đại lý</label>
                  <div class="input-group hdtuto control-group lst increment" >
                        <div class="list-input-hidden-upload">
                          <input type="file" name="image" id="file_upload" class="myfrm form-control hidden">
                        </div>
                      </div>
                </div>
                @if($errors->any())
                <div class="text-danger">
                 Hãy nhập đầy đủ thông tin các trường bên trên
                </div>
                @endif
                <button type="submit" class="btn bg-gradient-primary mt-3">Lưu</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
  <style>
  #mapCanvas {
    width: 630px;
    height: 300px;
    float: left;
  }
  #infoPanel {
    float: left;
    margin-left: 10px;
  }
  #infoPanel div {
    margin-bottom: 5px;
  }
  </style>
   @push('js')
   <script src="http://maps.google.com/maps/api/js?key=AIzaSyAprYDo7S9Lokb_iNROoE-Q_q6nrp8xmVs&callback=initMap" async defer></script>
<script type="text/javascript">
var geocoder;
var map;

//var geocoder = new google.maps.Geocoder();

function initMap() {
   var latLng = {lat: {{$dealer->lat}}, lng: {{$dealer->lng}}};
  var map = new google.maps.Map(document.getElementById('mapCanvas'), {
    zoom: 13,
    center: latLng,
    mapTypeId: google.maps.MapTypeId.ROADMAP
  });
  var marker = new google.maps.Marker({
    position: latLng,
    title: 'Point A',
    map: map,
    draggable: true
  });

function codeAddress() {
var address = document.getElementById("address123").value;
geocoder.geocode( { 'address123': address}, function(results, status) {
  if (status == google.maps.GeocoderStatus.OK) {
    map.setCenter(results[0].geometry.location);
    var marker = new google.maps.Marker({
        map: map,
        draggable: true,
        position: results[0].geometry.location

    });
  } else {
    alert("Geocode was not successful for the following reason: " + status);
  }

});
}


function geocodePosition(pos) {
  geocoder.geocode({
    latLng: pos
  }, function(responses) {
    if (responses && responses.length > 0) {
//      updateMarkerAddress(responses[0].formatted_address);
    } else {
//      updateMarkerAddress('Cannot determine address at this location.');
    }
  });
}

function updateMarkerPosition(latLng) {
  document.getElementById('lat').value = latLng.lat();
   document.getElementById('lng').value = latLng.lng();
}




  // Update current position info.
  updateMarkerPosition(latLng);
  geocodePosition(latLng);

  // Add dragging event listeners.
  google.maps.event.addListener(marker, 'dragstart', function() {
//    updateMarkerAddress('Dragging...');
  });

  google.maps.event.addListener(marker, 'drag', function() {
//    updateMarkerStatus('Dragging...');
    updateMarkerPosition(marker.getPosition());
  });

  google.maps.event.addListener(marker, 'dragend', function() {
//    updateMarkerStatus('Drag ended');
    geocodePosition(marker.getPosition());
  });
}

// Onload handler to fire off the app.
google.maps.event.addDomListener(window, 'load', initMap());
</script>
  @endpush
</x-layout>
