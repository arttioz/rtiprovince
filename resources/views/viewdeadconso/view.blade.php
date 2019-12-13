@extends('layouts.app')
@section('content')
 <section class="page-header row">
  <h1> {{ $pageTitle }} <small> {{ $pageNote }} </small></h1>
  <ol class="breadcrumb">
   <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
   <li  class="active"> {{ $pageTitle }} </li>
  </ol>
 </section>

 <div class="page-content row">
  <div class="page-content-wrapper no-margin">

   <div class="sbox">
    <div class="sbox-title">
     <h1> {{ $pageTitle }} <small> {{ $pageNote }} </small></h1>
    </div>
    <div class="sbox-content">
     <fieldset>
      <legend> ข้อมูลผู้เสียชีวิต </legend>
      <div class="form-group  " >
       <label for="Prefix" style="text-align: right" class=" control-label col-md-4 text-left"> คำนำหน้าชื่อ <span class="asterix"> * </span></label>
       <div class="col-md-6">
        <input readonly type='text' name='Prefix' id='Prefix' value='{{ $row['Fname'] }}'  class='form-control input-sm'/>
       </div>
      </div>

      <div class="form-group  " >
       <label for="Fname" style="text-align: right" class=" control-label col-md-4 text-left"> ชื่อจริง <span class="asterix"> * </span></label>
       <div class="col-md-6">
        <input readonly type='text' name='Fname' id='Fname' value='{{ $row['Fname'] }}' class='form-control input-sm'/>
       </div>
      </div>
      <div class="form-group  " >
       <label for="Lname" style="text-align: right" class=" control-label col-md-4 text-left"> นามสกุล <span class="asterix"> * </span></label>
       <div class="col-md-6">
        <input readonly type='text' name='Lname' id='Lname' value='{{ $row['Lname'] }}' class='form-control input-sm'/>
       </div>
      </div>
      <div class="form-group  " >
       <label for="DrvSocNO" style="text-align: right" class=" control-label col-md-4 text-left"> เลขบัตรประชาชน <span class="asterix"> * </span></label>
       <div class="col-md-6">
        <input readonly type='text' name='DrvSocNO' id='DrvSocNO' value='{{ $row['DrvSocNO'] }}' class='form-control input-sm'/>
       </div>
      </div>
      <div class="form-group  " >
       <label for="Age" style="text-align: right" class=" control-label col-md-4 text-left"> อายุ <span class="asterix"> * </span></label>
       <div class="col-md-6">
        <input readonly type='text' name='Age' id='Age' value='{{ $row['Age'] }}' class='form-control input-sm'/>
       </div>
      </div>
      <div class="form-group  " >
       <label for="Sex" style="text-align: right" class=" control-label col-md-4 text-left"> เพศ <span class="asterix"> * </span></label>
       <div class="col-md-6">
        <input readonly type='text' name='Sex' id='Sex' value='{{ $row['Sex'] }}' class='form-control input-sm'/>
       </div>
      </div>
      <div class="form-group  " >
       <label for="BirthDate" style="text-align: right" class=" control-label col-md-4 text-left"> วันเกิด <span class="asterix"> * </span></label>
       <div class="col-md-6">
        <input readonly type='text' name='BirthDate' id='BirthDate' value='{{ $row['BirthDate'] }}' class='form-control input-sm'/>
       </div>
      </div>
      <div class="form-group  " >
       <label for="DeadDate" style="text-align: right" class=" control-label col-md-4 text-left"> วันที่เสียชีวิต <span class="asterix"> * </span></label>
       <div class="col-md-6">
        <input readonly type='text' name='DeadDate' id='DeadDate' value='{{ $row['DeadDate'] }}' class='form-control input-sm'/>
       </div>
      </div>
      <div class="form-group  " >
       <label for="NCAUSE" style="text-align: right" class=" control-label col-md-4 text-left"> ICD10 การตาย <span class="asterix"> * </span></label>
       <div class="col-md-6">
        <input readonly type='text' name='NCAUSE' id='NCAUSE' value='{{ $row['NCAUSE'] }}' class='form-control input-sm'/>
       </div>
      </div>
      <div class="form-group  " >
       <label for="Vehicle" style="text-align: right" class=" control-label col-md-4 text-left"> พาหนะ <span class="asterix"> * </span></label>
       <div class="col-md-6">
        <input  type='text' name='Vehicle' id='Vehicle' value='{{ $row['Vehicle'] }}' class='form-control input-sm'/>
       </div>
      </div>
      <div class="form-group  " >
       <label for="road_type" style="text-align: right" class=" control-label col-md-4 text-left"> ลักษณะถนน <span class="asterix"> * </span></label>
       <div class="col-md-6">
        <input readonly type='text' name='road_type' id='road_type' value='{{ $row['road_type'] }}' class='form-control input-sm'/>
       </div>
      </div>
      <div class="form-group  " >
       <label for="road_department" style="text-align: right" class=" control-label col-md-4 text-left"> หน่วยงานที่รับผิดชอบถนน <span class="asterix"> * </span></label>
       <div class="col-md-6">
        <input readonly type='text' name='road_department' id='road_department' value='{{ $row['road_department'] }}' class='form-control input-sm'/>
       </div>
      </div>
      <div class="form-group  " >
       <label for="risk" style="text-align: right" class=" control-label col-md-4 text-left"> พฤติกรรมเสี่ยง <span class="asterix"> * </span></label>
       <div class="col-md-6">
        <input readonly type='text' name='risk' id='risk' value='{{ $row['risk'] }}' class='form-control input-sm'/>
       </div>
      </div>
      <div class="form-group  " >
       <label for="DeathProv" style="text-align: right" class=" control-label col-md-4 text-left"> จังหวัดที่ตาย <span class="asterix"> * </span></label>
       <div class="col-md-6">
        <input readonly type='text' name='DeathProv' id='DeathProv' value='{{ $row['DeathProv'] }}' class='form-control input-sm'/>
       </div>
      </div>

      <div class="form-group" style="height: 50vh" >
       <label for="AccLatlong" style="text-align: right" class=" control-label col-md-4 text-left"> แผนที่เกิดเหตุ </label>
       <div class="col-md-6">
        <input readonly id="pac-input" class="controls" style="margin-top: 20px; width: 300px; height: 30px" type="text" placeholder="ค้นหา">
       </div>
       <div id="map" style=" height: 100%; width: 100%; margin-bottom: 10px" class="col-md-6"></div>
      </div>

      <div class="form-group  " >
       <label for="AccProv" style="text-align: right" class=" control-label col-md-4 text-left"> จังหวัดที่เกิดเหตุ <span class="asterix"> * </span></label>
       <div class="col-md-6">
        <input readonly type='text' name='AccProv' id='AccProv' value='{{ $row['AccProv'] }}' class='form-control input-sm'/>
       </div>
      </div>
      <div class="form-group  " >
       <label for="AccDist" style="text-align: right" class=" control-label col-md-4 text-left"> อำเภอที่เกิดเหตุ <span class="asterix"> * </span></label>
       <div class="col-md-6">
        <input readonly type='text' name='AccDist' id='AccDist' value='{{ $row['AccDist'] }}' class='form-control input-sm'/>
       </div>
      </div>
      <div class="form-group  " >
       <label for="AccSubDist" style="text-align: right" class=" control-label col-md-4 text-left"> ตำบลที่เกิดเหตุ <span class="asterix"> * </span></label>
       <div class="col-md-6">
        <input readonly type='text' name='AccSubDist' id='AccSubDist' value='{{ $row['AccSubDist'] }}' class='form-control input-sm'/>
       </div>
      </div>
      <div class="form-group  " >
       <label for="AccLatlong" style="text-align: right" class=" control-label col-md-4 text-left"> Latitude ที่เกิดเหตุ <span class="asterix"> * </span></label>
       <div class="col-md-6">
        <input readonly type='text' name='AccLatlong' id='AccLatlong' value='{{ $row['Prefix'] }}' class='form-control input-sm'/>
       </div>
      </div>
      <div class="form-group  " >
       <label for="Acclong" style="text-align: right" class=" control-label col-md-4 text-left"> Longitude ที่เกิดเหตุ <span class="asterix"> * </span></label>
       <div class="col-md-6">
        <input  type='text' name='Acclong' id='Acclong' value='{{ $row['Acclong'] }}' class='form-control input-sm'/>
       </div>
      </div>
      <div class="form-group  " >
       <label for="REMARK" style="text-align: right" class=" control-label col-md-4 text-left"> REMARK <span class="asterix"> * </span></label>
       <div class="col-md-6">
        <input readonly type='text' name='REMARK' id='REMARK' value='{{ $row['REMARK'] }}' class='form-control input-sm'/>
       </div>
      </div>

      @foreach($rti_provinces as $rti_province)
       {{-- Input --}}
       @if($rti_province->rti_fields->type_filed->name === 'input')
        <div class="form-group  "  >
         <label style="text-align: right" for="AccLatlong" class=" control-label col-md-4 text-left">
          {{$rti_province->rti_fields->name_th}} <span class="asterix"> * </span>
         </label>
         <div class="col-md-6">
          <input
                  readonly
                  type='{{$rti_province->inputtypefield->name}}'
                  name="{{$rti_province->rti_fields->name}}"
                  id='{{$rti_province->rti_fields->id}}'
                  @if($rti_fields === '')
                  value=''
                  @elseif(isset($rti_fields[0][$rti_province->rti_fields->name]))
                  @if($rti_fields === '' && $rti_fields[0][$rti_province->rti_fields->name] === '')
                  value=""
                  @else
                  value="{{$rti_fields[0][$rti_province->rti_fields->name]}}"
                  @endif
                  @endif
                  class='form-control input-sm ' />
         </div>
         <div class="col-md-2">

         </div>
        </div>
       @endif


       {{--Select--}}
       @if($rti_province->rti_fields->type_filed->name === 'select')
        <div class="form-group  "  >
         <label for="AccLatlong" class=" control-label col-md-4 text-left">
          {{$rti_province->rti_fields->name_th}} <span class="asterix"> * </span>
         </label>
         <div class="col-md-6">
          <select name="{{$rti_province->rti_fields->name}}">
           <option>
            test
           </option>
          </select>
         </div>
        </div>
       @endif
      @endforeach

     </fieldset>
    </div>
   </div>
  </div>
 </div>
 <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDSb5GVMgYcYMDBRvzHZb_CAsa-zL9t5pg&callback=initMap&libraries=places"
         async defer></script>

 <script type="text/javascript">
          var lat = '{{$row['AccLatlong']}}'
          var long = '{{$row['Acclong']}}'
  var map;
  var marker = false;
  function initMap() {

   if (lat == ''){
    lat = 15.8700
   }else{
    lat = parseFloat(lat)
   }

   if (long == ''){
    long = 100.9925
   }else{
    long = parseFloat(long)
   }

   if(lat == 15.8700){
    if (navigator.geolocation) {
     navigator.geolocation.getCurrentPosition(showPosition , errorHandler, { enableHighAccuracy: false});
    }
   }

   console.log(lat)
   console.log(long)
   var zoom = 8
   if(lat == 15.8700){
    zoom = 6
   }

   map = new google.maps.Map(document.getElementById('map'), {
    center: {lat: lat, lng: long },
    zoom: zoom
   });


   if(lat != 0.0){
    marker = new google.maps.Marker({
     position: {lat: lat, lng: long },
     map: map,
     draggable: true //make it draggable
    });
   }


   google.maps.event.addListener(map, 'click', function(event) {
    //Get the location that the user clicked.
    var clickedLocation = event.latLng;
    //If the marker hasn't been added.
    console.log(clickedLocation)

    lat = clickedLocation.lat()
    long = clickedLocation.lng()

    setMarkerLocation()
    //Get the marker's location.
    markerLocation();
   });

   var input = document.getElementById('pac-input');
   var searchBox = new google.maps.places.SearchBox(input);
   map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

   // Bias the SearchBox results towards current map's viewport.
   map.addListener('bounds_changed', function() {
    searchBox.setBounds(map.getBounds());
   });

   searchBox.addListener('places_changed', function() {
    var places = searchBox.getPlaces();

    if (places.length == 0) {
     return;
    }

    // For each place, get the icon, name and location.
    var bounds = new google.maps.LatLngBounds();
    places.forEach(function(place) {

     console.log(place)
     lat = place.geometry.location.lat()
     long = place.geometry.location.lng()

     setMarkerLocation()

     if (!place.geometry) {
      console.log("Returned place contains no geometry");
      return;
     }

     if (place.geometry.viewport) {
      // Only geocodes have viewport.
      bounds.union(place.geometry.viewport);
     } else {
      bounds.extend(place.geometry.location);
     }

     return;
    });
    map.fitBounds(bounds);
   });
  }


  function setMarkerLocation(){

   var location = {lat: lat, lng: long }
   if(marker === false){
    //Create the marker.
    marker = new google.maps.Marker({
     position: location,
     map: map,
     draggable: true //make it draggable
    });
    //Listen for drag events!
    google.maps.event.addListener(marker, 'dragend', function(event){
     markerLocation();
    });
   } else{
    //Marker has already been added, so just change its location.
    marker.setPosition(location);
   }
   map.panTo(location);
   map.setZoom(17);

   geocodeLatLng(lat,long)

  }

  function showPosition(position) {

   if (lat == 15.8700){
    lat = position.coords.latitude;
    long = position.coords.longitude;
    setMarkerLocation();
   }

  }

  function errorHandler(positionError) {
   console.log(positionError);
  }

  function markerLocation(){
   //Get location.
   var currentLocation = marker.getPosition();
   //Add lat and lng values to a field that we can save.
   document.getElementById('AccLatlong').value = currentLocation.lat(); //latitude
   document.getElementById('Acclong').value = currentLocation.lng(); //longitude
  }

  function geocodeLatLng(lat, lng) {
   var geocoder = new google.maps.Geocoder;
   var latlng = {lat: parseFloat(lat), lng: parseFloat(lng)};
   geocoder.geocode({'location': latlng}, function (results, status) {
    if (status === 'OK') {
     console.log(results)
     if (results[0]) {

      var street = "";
      var city = "";
      var district = "";
      var province = "";
      var country = "";
      var zipcode = "";
      for (var i = 0; i < results.length; i++) {

       console.log(results[i]);

       if (results[i].types.includes("sublocality_level_2")  ||
               results[i].types.includes("locality")
               && district == ""
       )  {
        console.log("type")
        console.log(results[i].types)

        city = results[i].address_components[0].long_name;
        district = results[i].address_components[1].long_name;
        if (results[i].address_components.length > 2)
         province = results[i].address_components[2].long_name;
       }
       if (results[i].types[0] === "postal_code" && zipcode == "") {
        zipcode = results[i].address_components[0].long_name;

       }
       if (results[i].types[0] === "country") {
        country = results[i].address_components[0].long_name;
       }
       if (results[i].types[0] === "route" && street == "") {

        for (var j = 0; j < 4; j++) {
         if (j == 0) {
          street = results[i].address_components[j].long_name;
         } else {
          street += ", " + results[i].address_components[j].long_name;
         }
        }

       }
       if (results[i].types[0] === "street_address") {
        for (var j = 0; j < 4; j++) {
         if (j == 0) {
          street = results[i].address_components[j].long_name;
         } else {
          street += ", " + results[i].address_components[j].long_name;
         }
        }

       }
      }
      if (zipcode == "") {
       if (typeof results[0].address_components[8] !== 'undefined') {
        zipcode = results[0].address_components[8].long_name;
       }
      }
      if (country == "") {
       if (typeof results[0].address_components[7] !== 'undefined') {
        country = results[0].address_components[7].long_name;
       }
      }
      if (province == "") {
       if (typeof results[0].address_components[6] !== 'undefined') {
        province = results[0].address_components[6].long_name;
       }
      }

      if (district == "") {
       if (typeof results[0].address_components[5] !== 'undefined') {
        district = results[0].address_components[5].long_name;
       }
      }

      if (city == "") {
       if (typeof results[0].address_components[6] !== 'undefined') {
        city = results[0].address_components[6].long_name;
       }
      }


      var address = {
       "street": street,
       "subdistrict": city,
       "district": district,
       "province": province,
       "country": country,
       "zipcode": zipcode,
      };
      console.log(address);


      document.getElementById('AccDist').value = address.district;
      document.getElementById('AccSubDist').value = address.subdistrict;


      $(".select_prov").filter(function() {
       //may want to use $.trim in here
       return $(this).html() == address.province;
      }).prop('selected', true);


     } else {
      window.alert('No results found');
     }
    } else {
     window.alert('Geocoder failed due to: ' + status);
    }
   });
  }
 </script>
@stop
