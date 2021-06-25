<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, minimal-ui">
	<title>PPDB Sumatera Utara 2021</title>
	<link rel="stylesheet" href="ladun/vendor/swiper/swiper.min.css">
	<link rel="stylesheet" href="https://demo.getstisla.com/assets/modules/izitoast/css/iziToast.min.css">
	<link rel="stylesheet" href="ladun/css/style.css">

	<link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet">
</head>

<body>

	<div class="page">
		<div class="page--login" data-page="login" id="app">

			<!-- HEADER -->
			<div class="login">
				<div class="login__content">
					<div style="text-align: center;">
						<img src="ladun/img/sumut.png" style="width: 100px;">
					</div>
					<h2 class="login__title">PPDB Sumut 2021 </h2>
					<p class="login__text">Silahkan login ke akun anda</p>
					<div class="login-form">

						<div id="divFormLogin">
							<div class="login-form__row">
								<label class="login-form__label">NISN (Nomor Induk Siswa Nasional)</label>
								<input type="text" id="txt_nisn" maxlength="10" class="login-form__input required" />
							</div>
							<div class="login-form__row">
								<label class="login-form__label">Password</label>
								<input type="password" id="txt_password" class="login-form__input required" />
							</div>
							<div style="text-align: center;display: none;" id="divStatusLogin"><label class="login-form__row" style="color: aliceblue;">Mengautentikasi ...</label></div>
							<div class="login-form__row">
								<a class="login-form__submit button button--main button--full"
									@click="masukAtc">Masuk</a>
							</div>
						</div>

						<div id="divFormDaftar" style="display: none;">
							<div class="login-form__row">
								<label class="login-form__label">NISN (Nomor Induk Siswa Nasional)</label>
								<input type="text" id="txt_nisn_reg" maxlength="10" class="login-form__input required" />
							</div>
							<div class="login-form__row">
								<label class="login-form__label">Password</label>
								<input type="password" id="txt_password_reg" class="login-form__input required email" />
							</div>
							<div id="div_status_pendaftaran" style="display: none;">
								<label class="login-form__row" style="color: aliceblue;">Melakukan registrasi ...</label>
							</div>
							<div class="login-form__row" id="div_btn_daftar">
								<a class="login-form__submit button button--main button--full" @click="daftarProsesAtc()">Daftar</a>
							</div>
						</div>

						<div class="login-form__forgot-pass" id="divCapForgotPassword"><a
								href="http://apps.ppdbsumut.web.id/reset-password/" target="new">Lupa password?</a></div>
						<div class="login-form__bottom" id="divBtnDaftar">
							<p>Belum punya akun?</p>
							<a href="javascript:void(0)" class="button button--secondary button--full"
								@click="daftarAtc">Buat Akun</a>
						</div>
						<div style="text-align: center;color: aliceblue;margin-top:20px;">
							<span>Panitia PPDB Sumatera Utara 2021</span>
						</div>
					</div>
				</div>
			</div>

		</div>
	</div>
	<!-- PAGE END -->

	<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.min.js"></script>
	<script src="ladun/vendor/jquery/jquery.validate.min.js"></script>
	<script src="ladun/vendor/swiper/swiper.min.js"></script>
	<script src="ladun/js/jquery.custom.js"></script>
	<script src="ladun/js/login.js"></script>
  <script>
    window.alert("Pastikan kamu melakukan clear cache (history) secara menyeluruh pada browser sebelum menggunakan aplikasi ini !!!");
    window.alert("Harap melakukan pendaftaran ulang meskipun sudah melakukan pendaftaran kemarin dan dianggap valid.");
  localStorage.clear();
  </script>
	<script async src="https://www.googletagmanager.com/gtag/js?id=G-ESWMZMSH88"></script>
  <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }
	
    gtag('js', new Date());

    gtag('config', 'G-ESWMZMSH88');
</script>
</body>

</html>