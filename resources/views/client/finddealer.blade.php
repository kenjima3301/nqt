@extends ('client.layouts.master')
@section('title', 'NQT - Tìm đại lý')
@section('content')
<!--Main layout-->
<div class="container ">
  <div class="form-row" >
    <div class="form-group col-md-3 mb-0" style="background-color: white;" >
      <!-- Sidebar -->
      <div class="row">
        <div class="row col-12 m-0">
          <div class="col-6 p-0 pr-1 mt-2">
                <select id="selectarea" class="form-control">
                  <option value="{{strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', "Miền Bắc")))}}" @if($dealers[0]->area == 'Miền Bắc') selected @endif >Miền Bắc</option>
                  <option value="{{strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', "Miền Trung")))}}" @if($dealers[0]->area == 'Miền Trung') selected @endif >Miền Trung</option>
                  <option value="{{strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', "Miền Nam")))}}" @if($dealers[0]->area == 'Miền Nam') selected @endif >Miền Nam</option>
                </select>
          </div>
          <div class="col-6 p-0 mt-2">
                <select class="form-control" id='selectprovince'>
                  @foreach ($provinces as $province)
                  <option class="{{strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $province->area)))}}" class="{{$province->id}}" @if($province->province == $provincename) selected @endif value="{{url('tim-dai-ly?province=').$province->province}}">{{$province->province}}</option>
                  @endforeach
                </select>
          </div>
        </div>
        <div class="col-12" data-spy="scroll">
          <h6 class="text-center mt-1">Có {{count($dealers)}} đại lý tại {{$provincename}}</h6>
          <div class="card card-default" id="card_contacts">
        <div id="contacts" class="panel-collapse collapse show" aria-expanded="true" style="">
            <ul class="list-group pull-down scrollbar" id="contact-list">
              @foreach ($dealers as $key => $dealer)
                <li class="list-group-item {{ $key % 2 == 0 ? "bg-light" : ""}}" id="{{$key}}">
                    <div class="row w-100">
                        <div class="col-12 col-sm-6 col-md-3 px-0">
                            <img src="{{asset($dealer->image)}}" alt="Mike Anamendolla" class="mx-auto d-block img-fluid mw-20">
                        </div>
                        <div class="col-12 col-sm-6 col-md-9 text-center text-sm-left">
                            <label class="name lead">{{$dealer->name}}</label>
                            <br> 
                            <span class="fa fa-map-marker fa-fw text-muted" data-toggle="tooltip" title="" data-original-title="5842 Hillcrest Rd"></span>
                            <span class="text-muted">{{$dealer->address}}</span>
                            <br>
                            <span class="fa fa-phone fa-fw text-muted" data-toggle="tooltip" title="" data-original-title="(870) 288-4149"></span>
                            <span class="text-muted small">{{$dealer->phone}}</span>
                            <br>
                            <span class="fa fa-envelope fa-fw text-muted" data-toggle="tooltip" data-original-title="" title=""></span>
                            <span class="text-muted small text-truncate">{{$dealer->email}}</span>
                        </div>
                    </div>
                </li>
                @endforeach
              </ul>
            <!--/contacts list-->
        </div>
    </div>
        </div>
      </div>
    </div>
    <div class="form-group col-md-9">
      <br/>
      <div id="dealer-map" class="map-responsive" ></div>
    </div>
  </div>
</div>
<style>
.scrollbar {
  height:500px;
  overflow-y: scroll;
}
.map-responsive{
    overflow:hidden;
    padding-bottom:50%;
    position:relative;
    height:0;
}
.map-responsive iframe{
    left:0;
    top:0;
    height:100%;
    width:100%;
    position:absolute;
}
.gm-style-iw button:focus {
    outline: 0;
}
.gm-ui-hover-effect {
    display: none !important;
}
@media (min-width: 991.98px) {
  main {
    padding-left: 240px;
  }
}

/* Sidebar */
.sidebar {
  top: 0;
  bottom: 0;
  left: 0;
  padding: 58px 0 0; /* Height of navbar */
  box-shadow: 0 2px 5px 0 rgb(0 0 0 / 5%), 0 2px 10px 0 rgb(0 0 0 / 5%);
  z-index: 600;
}

@media (max-width: 991.98px) {
  .sidebar {
    width: 100%;
  }
}
.sidebar .active {
  border-radius: 5px;
  box-shadow: 0 2px 5px 0 rgb(0 0 0 / 16%), 0 2px 10px 0 rgb(0 0 0 / 12%);
}

.sidebar-sticky {
  position: relative;
  top: 0;
  bottom: 0;
  height: calc(100vh - 48px);
  padding-top: 0.5rem;
  overflow-x: hidden;
  overflow-y: auto; /* Scrollable contents if viewport is shorter than content. */
}

.list-group-item{
  border: 1px solid #35A25B;
  color: #35A25B;
}
</style>
<script src="{{asset('assets/js/jquery-3.6.3.min.js')}}"></script>
<script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAprYDo7S9Lokb_iNROoE-Q_q6nrp8xmVs&callback=initMap&v=weekly"
      defer
    ></script>
<script>
  var markers = new Array();
  var map;  
  const locations = new Array();
  <?php foreach ($dealers as $dealer) { ?>
      var value = ["<h6 id='firstHeading' style='color:#E24648'><img src='' height='30px'>{{$dealer->name}}</h6><div id='bodyContent'><p><b>Địa chỉ:{{$dealer->address}}</b></p></div>", {{$dealer->lat}}, {{$dealer->lng}}];
      locations.push(value);
  <?php }?>
// Setup the different icons and shadows
const svgMarker = {
    path: "M-1.547 12l6.563-6.609-1.406-1.406-5.156 5.203-2.063-2.109-1.406 1.406zM0 0q2.906 0 4.945 2.039t2.039 4.945q0 1.453-0.727 3.328t-1.758 3.516-2.039 3.070-1.711 2.273l-0.75 0.797q-0.281-0.328-0.75-0.867t-1.688-2.156-2.133-3.141-1.664-3.445-0.75-3.375q0-2.906 2.039-4.945t4.945-2.039z",
    fillColor: "#35A25B",
    fillOpacity: 1,
    strokeWeight: 0,
    rotation: 0,
    scale: 2
  };

function initMap() {
  const uluru = { lat: {{$dealers[0]->lat}}, lng:  {{$dealers[0]->lng}} };
    map = new google.maps.Map(document.getElementById('dealer-map'), {
        zoom: 12,
        center: uluru,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    });


    var infowindow = new google.maps.InfoWindow({
        maxWidth: 160
    });

    var iconCounter = 0;

    // Add the markers and infowindows to the map
    for (var i = 0; i < locations.length; i++) {
        var marker = new google.maps.Marker({
            position: new google.maps.LatLng(locations[i][1], locations[i][2]),
            map: map,
            icon: svgMarker
        });

        markers.push(marker);

        google.maps.event.addListener(marker, 'mouseover', (function (marker, i) {

            return function () {
                infowindow.setContent(locations[i][0]);
                infowindow.open(map, marker);
                //map.setZoom(9);
                //map.setCenter(marker.getPosition());	
            }
        })(marker, i));

        google.maps.event.addListener(marker, 'click', (function (marker, i) {

            return function () {
                infowindow.setContent(locations[i][0]);
                infowindow.open(map, marker);
                map.setZoom(11);
                map.setCenter(marker.getPosition());
            }
        })(marker, i));


        iconCounter++;

    }
//    autoCenter();
}
window.initMap = initMap;
function triggerClick(i) {
    google.maps.event.trigger(markers[i], 'click');
    //map.getBounds();	
}




function autoCenter() {
    //  Create a new viewpoint bound
    var bounds = new google.maps.LatLngBounds();
    //  Go through each...
    for (var i = 0; i < markers.length; i++) {
        bounds.extend(markers[i].position);
    }
    //  Fit these bounds to the map
    map.fitBounds(bounds);
}

</script>
<script>
    $('#selectprovince').bind('change', function () { // bind change event to select
        var url = $(this).val(); // get selected value
        if (url != '') { // require a URL
            window.location = url; // redirect
        }
        return false;
    });
    $('#selectarea').bind('change', function () { // bind change event to select
        var value = $(this).val(); // get selected value
        $("#selectprovince").children().hide();
         $("#selectprovince ."+value).show();
    });
    $("#contact-list").on("mouseover", "li", function () {
        var id = $(this).attr('id');
        triggerClick(id);
    });
</script>
@endsection