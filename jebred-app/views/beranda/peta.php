<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<script src="https://cdn.jsdelivr.net/gh/somanchiu/Keyless-Google-Maps-API@v5.7/mapsJavaScriptAPI.js" async defer></script>

<script>
    var map
    var kantorDesa

    function initMap() {
        <?php if (!empty($desa['lat']) && !empty($desa['lng'])) : ?>
            var center = {
                lat: <?= $desa['lat'] ?>,
                lng: <?= $desa['lng'] ?>
            }
        <?php else : ?>
            var center = {
                lat: -7.34298008144879,
                lng: 107.217667252986,
            }
        <?php endif; ?>

        var zoom = 13
        //Jika posisi kantor desa belum ada, maka posisi peta akan menampilkan seluruh Indonesia
        map = new google.maps.Map(document.getElementById("peta-desa"), {
            center,
            zoom: 11,
            mapTypeId: google.maps.MapTypeId.<?= $desa['map_tipe'] ?>
        });

        kantorDesa = new google.maps.Marker({
            position: center,
            map: map,
            title: 'Kantor <?php echo ucwords($this->setting->sebutan_desa) . " " ?><?php echo ucwords($desa['nama_desa']) ?>',
            animation: google.maps.Animation.BOUNCE
        });

        <?php if (!empty($desa['path'])) : ?>
            let polygon_desa = <?= $desa['path']; ?>;

            polygon_desa[0].map((arr, i) => {
                polygon_desa[i] = {
                    lat: arr[0],
                    lng: arr[1]
                }
            })

            //Style polygon
            var batasWilayah = new google.maps.Polygon({
                paths: polygon_desa,
                strokeColor: '<?= $desa['warna_garis'] ?>',
                strokeOpacity: 1,
                strokeWeight: 3,
                fillColor: '<?= $desa['warna'] ?>',
                fillOpacity: 0.25
            });

            batasWilayah.setMap(map)
        <?php endif; ?>
    }
</script>

<!-- widget Peta Wilayah Desa -->

<div class="col-md-8">
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">Peta Wilayah Kerja <?= ucwords($this->setting->sebutan_kecamatan) ?></h3>
            <div class="card-tools"> <span class="badge badge-danger">Peta Desa</span>
                <button type="button" class="btn btn-tool" data-card-widget="collapse"> <i class="fas fa-minus"></i> </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove"> <i class="fas fa-times"></i> </button>
            </div>
        </div>
        <div class="card-body">
            <div id="peta-desa" class="set-map" style="height: 240px"></div>
        </div>
    </div>
</div>