<?php  if(!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<script src="https://cdn.jsdelivr.net/gh/somanchiu/Keyless-Google-Maps-API@v5.7/mapsJavaScriptAPI.js" async defer></script>

<script>
<?php if (!empty($wil_ini['lat'] && !empty($wil_ini['lng']))): ?>
	var center = { lat: <?= $wil_ini['lat'].", lng: ".$wil_ini['lng']; ?> };
<?php else: ?>
	var center = { lat: <?=$desa['lat'].", lng: ".$desa['lng']?> };
<?php endif; ?>

function initMap() {
	var myLatlng = new google.maps.LatLng(center.lat, center.lng);
	var mapOptions = { zoom: 17, center, mapTypeId:google.maps.MapTypeId.HYBRID }
	var map = new google.maps.Map(document.getElementById("map"), mapOptions);

	// Place a draggable marker on the map
	var marker = new google.maps.Marker({
			position: myLatlng,
			map: map,
			draggable: false,
			title: "Kantor <?=ucwords($this->setting->sebutan_kecamatan).' '.$kecamatan['nama_kecamatan']?>"
	});

	marker.addListener('dragend', (e) => {
		document.getElementById('lat').value = e.latLng.lat();
		document.getElementById('lng').value = e.latLng.lng();
	})
}
</script>
<style>
  #map
  {
	z-index: 1;
    width: 100%;
    height: 400px;
    border: 1px solid #000;
  }
</style>

<div class="col-sm-12">
	<div id="map"></div>
</div>
