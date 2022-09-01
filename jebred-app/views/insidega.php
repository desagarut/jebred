<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<title> <?= $this->setting->website_title ?>
	</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/dist/css/adminlte.min.css">
  
  	<?php if (is_file("desa/css/insidega.css")) : ?>
		<link type='text/css' href="<?= base_url() ?>desa/css/insidega.css" rel='Stylesheet' />
	<?php endif; ?>
	<?php if (is_file(LOKASI_LOGO_DESA . "favicon.ico")) : ?>
		<link rel="shortcut icon" href="<?= base_url() ?><?= LOKASI_LOGO_DESA ?>favicon.ico" />
	<?php else : ?>
		<link rel="shortcut icon" href="<?= base_url() ?>favicon.ico" />
	<?php endif; ?>

	<script src="<?= base_url() ?>assets/bootstrap/js/jquery.min.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/js/jquery.validate.min.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/js/validasi.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/js/localization/messages_id.js"></script>
	<?php require __DIR__ . '/head_tags.php' ?>
</head>

<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
    <a href="<?= site_url('first'); ?>"><img src="<?= logo_web($header['logo']); ?>" alt="<?= $header['nama_kecamatan'] ?>" class="img-responsive" style="max-width: 80px; max-height: 80px" /></a>
  </div>

  <div class="card">
    <div class="card-body register-card-body">
      <p class="login-box-msg"><?= $this->setting->website_title ?></p>

        <form id="validasi" class="login-form" action="<?= site_url('insidega/auth') ?>" method="post">
            <?php if ($this->session->insidega_wait == 1) : ?>
                <div class="error login-footer-top">
                    <p id="countdown" style="color:red; text-transform:uppercase"></p>
                </div>
            <?php else : ?>
                <div class="form-group">
                    <input name="username" type="text" placeholder="Nama pengguna" <?php jecho($this->session->insidega_wait, 1, "disabled") ?> value="" class="form-username form-control required">
                </div>
                <div class="form-group">
                    <input name="password" id="password" type="password" placeholder="Kata sandi" <?php jecho($this->session->insidega_wait, 1, "disabled") ?> value="" class="form-username form-control required">
                </div>
                <div class="form-group">
                    <input type="checkbox" id="checkbox" class="form-checkbox"> Tampilkan kata sandi
                </div>
                <hr />
                <button type="submit" class="social-auth-links text-center btn btn-block btn-primary">MASUK</button>
                <?php if ($this->session->insidega == -1 && $this->session->insidega_try < 4) : ?>
                    <div class="error">
                        <p style="color:red; text-transform:uppercase">Login Gagal.<br />Nama pengguna atau kata sandi yang Anda masukkan salah!<br />
                            <?php if ($this->session->insidega_try) : ?>
                                Kesempatan mencoba <?= ($this->session->insidega_try - 1); ?> kali lagi.</p>
                    <?php endif; ?>
                    </div>
                <?php elseif ($this->session->insidega == -2) : ?>
                    <div class="error">
                        Redaksi belum boleh masuk, Sistem belum memiliki sambungan internet!
                    </div>
                <?php endif; ?>
            <?php endif; ?>
        </form>
    </div>
  </div>
</div>

<script src="<?= base_url() ?>assets/plugins/jquery/jquery.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url() ?>assets/dist/js/adminlte.min.js"></script>

</body>

</html>
<script>
	function start_countdown() {
		var times = eval(<?= json_encode($this->session->insidega_timeout) ?>) - eval(<?= json_encode(time()) ?>);
		var menit = Math.floor(times / 60);
		var detik = times % 60;
		timer = setInterval(function() {
			detik--;
			if (detik <= 0 && menit >= 1) {
				detik = 60;
				menit--;
			}
			if (menit <= 0 && detik <= 0) {
				clearInterval(timer);
				location.reload();
			} else {
				document.getElementById("countdown").innerHTML = "<b>Gagal 3 kali silakan coba kembali dalam " + menit + " MENIT " + detik + " DETIK </b>";
			}
		}, 1000)
	}

	$('document').ready(function() {
		var pass = $("#password");
		$('#checkbox').click(function() {
			if (pass.attr('type') === "password") {
				pass.attr('type', 'text');
			} else {
				pass.attr('type', 'password')
			}
		});

		if ($('#countdown').length) {
			start_countdown();
		}
	});
</script>