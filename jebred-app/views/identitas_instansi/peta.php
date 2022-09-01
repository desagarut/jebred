<?php  if(!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
<script src="https://cdn.jsdelivr.net/gh/somanchiu/Keyless-Google-Maps-API@v5.7/mapsJavaScriptAPI.js" async defer></script>

<script>

var PetaDesa
var kantorDesa
var batasWilayah

function initMap() {
    <?php if (!empty($wil_ini['lat']) && !empty($wil_ini['lng'])): ?>
        var center = {
            lat: <?=$wil_ini['lat']?>,
            lng: <?=$wil_ini['lng']?>
        }
    <?php else: ?>
        var center = {
            lat: -7.2027243,
            lng: 107.8866452,
        }
    <?php endif; ?>

    var zoom = 14
    //Jika posisi kantor desa belum ada, maka posisi peta akan menampilkan seluruh Indonesia
    PetaDesa = new google.maps.Map(document.getElementById("peta_wilayah_desa"), { center, zoom:<?=$wil_ini['zoom']?>, mapTypeId:google.maps.MapTypeId.<?=$wil_ini['map_tipe']?> });

    kantorDesa = new google.maps.Marker({
        position: center,
        map: PetaDesa,
        title: 'Kantor <?php echo ucwords($this->setting->sebutan_desa)." "?><?php echo ucwords($desa['nama_desa'])?>'.true,
		icon: '<?= logo_web($main['logo']); ?>',
    });
	
    <?php if (!empty($wil_ini['path'])): ?>
	let polygon_desa = <?= $wil_ini['path']; ?>;
	
	polygon_desa[0].map((arr, i) => {
		polygon_desa[i] = { lat: arr[0], lng: arr[1] }
	})
	
	//Style polygon batas wilayah desa
	var batasWilayah = new google.maps.Polygon({
		paths: polygon_desa,
		strokeColor: '<?=$wil_ini['warna_garis']?>',
		strokeOpacity: 1,
		strokeWeight: 3,
		fillColor: '<?=$wil_ini['warna']?>',
		fillOpacity: 0.25
	});

	batasWilayah.setMap(PetaDesa)
    <?php endif; ?>
}

</script>


<div class="card">
    <div class="card-body">
        <div id="peta_wilayah_desa" class="set-map" style="height:400px;"></div>
    </div>
</div>
