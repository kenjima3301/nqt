<x-layout bodyClass="g-sidenav-show  bg-gray-200">
  <x-navbars.sidebar activePage='dai-ly'></x-navbars.sidebar>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <x-navbars.navs.auth titlePage="Thêm đại lý"></x-navbars.navs.auth>
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12 col-lg-8 m-auto">
          <div class="card">
            <div class="card-header">
              <h5 class="mb-0">Thêm đại lý</h5>
            </div>
            @if ($message = Session::get('success'))
            <div class="alert alert-success alert-block">
              {{$message}}
            </div>
            @endif
            <div class="col-12 text-end">
              <a class="btn bg-gradient-primary mb-0 me-4" href="{{url('admin/dai-ly')}}">Quay lại danh sách đại lý</a>
            </div>
            <div class="card-body">
              <form method="POST" action="{{url('admin/dai-ly-add')}}" class="d-flex flex-column align-items-center" enctype="multipart/form-data">
                @csrf
                <div class="form-group col-12 col-md-8">
                  <label for="exampleInputname">Tên</label>
                  <input type="name" name="name" value="{{ $errors->first('name')}}" class="form-control border border-2 p-2" id="exampleInputname" placeholder="Tên đại lý" value="" onfocus="focused(this)" onfocusout="defocused(this)">
                </div>
                <div class="row col-12 col-md-8">
                 <div class="form-group col-6">
                      <label for="exampleInputname">Khu vực</label>
                      <select class="form-control" name="area" id="area">
                              <option value="Miền Bắc">Miền Bắc</option>
                              <option value="Miền Trung">Miền Trung</option>
                              <option value="Miền Nam">Miền Nam</option>
                      </select>
                    </div>
                <div class="form-group col-6">
                      <label for="exampleInputname">Tỉnh</label>
                      <select class="form-control" name="province" id="province">
                            @foreach ($provinces as $province)
                              <option value="{{$province->name}}">{{$province->name}}</option>
                              @endforeach
                      </select>
                    </div>
                  </div>
                <div class="form-group col-12 col-md-8">
                  <label for="exampleInputname">Địa chỉ:</label>
                  <input type="text" name="address" value="{{ $errors->first('name')}}" class="controls form-control border border-2 p-2" id="address123" placeholder="Địa chỉ" value="" onfocus="focused(this)" onfocusout="defocused(this)">
                </div>
                <br/>
                <div class="form-group col-12 col-md-8">
                  <label for="exampleInputname">Di chuyển đến địa chỉ chính xác trên bản đồ</label>
                  <div id="mapCanvas"></div>
                  <input type="hidden" name="lat" id="lat">
                  <input type="hidden" name="lng" id="lng">
                </div>
                <br/>
                <div class="form-group col-12 col-md-8">
                  <label for="exampleInputname">Email</label>
                  <input type="name" name="email" value="{{ $errors->first('name')}}" class="form-control border border-2 p-2" id="exampleInputname" placeholder="Email" value="" onfocus="focused(this)" onfocusout="defocused(this)">
                </div>
                <div class="form-group col-12 col-md-8">
                  <label for="exampleInputname">Phone</label>
                  <input type="name" name="phone" value="{{ $errors->first('name')}}" class="form-control border border-2 p-2" id="exampleInputname" placeholder="Phone" value="" onfocus="focused(this)" onfocusout="defocused(this)">
                </div>
                <br/>
                <div class="form-group col-md-8">
                  <label for="exampleInputname">Ảnh đại lý</label>
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
   <script src="http://maps.google.com/maps/api/js?key=AIzaSyAprYDo7S9Lokb_iNROoE-Q_q6nrp8xmVs&v=3.5&amp;sensor=false"></script>
<script type="text/javascript">
var geocoder;
var map;

var geocoder = new google.maps.Geocoder();

function initialize(lat, lng) {
  var latLng = new google.maps.LatLng(lat, lng);
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
google.maps.event.addDomListener(window, 'load', initialize(21.0227384, 105.8163641));
</script>
  @endpush
</x-layout>
