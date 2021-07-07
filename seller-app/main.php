<?php
session_start();
include('../config/db.php');
// query ambil data kategori 
$qKategori = $link -> query("SELECT * FROM tbl_kategori;");

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, minimal-ui">
<title>Sifo Pajak Sei Sikambing - Seller Page</title>
<link rel="stylesheet" href="<?=$base_url; ?>ladun/vendor/swiper/swiper.min.css">
<link rel="stylesheet" href="<?=$base_url; ?>ladun/css/style.css">
<link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet"> 
<link rel="stylesheet" href="https://demo.getstisla.com/assets/modules/izitoast/css/iziToast.min.css">
</head>
<body>
	
<!-- Overlay panel -->
<div class="body-overlay"></div>
<!-- Left panel -->
<div id="panel-left"></div>
<!-- Right panel -->
<div id="panel-right"></div>

<div class="page page--main" data-page="shop">
	
	<!-- HEADER -->
	<header class="header header--page header--fixed">	
		<div class="header__inner">	
			<div class="header__icon header__icon--menu"></div>
			<div class="header__logo header__logo--text"><a href="javascript:void(0)">Sifo Pajak<strong> Sei Sikambing</strong></a><br/>Halaman Penjual</div>	
			<div class="header__icon header__icon--cart"></div>
        </div>
	</header>
	
	
	<!-- PAGE CONTENT -->
	<div class="page__content page__content--with-header page__content--with-bottom-nav" id="divUtama">
	    
		  
	</div>

</div>
<!-- PAGE END -->

<!-- Bottom navigation -->
<div id="bottom-toolbar" class="bottom-toolbar"></div>

<!-- Social Icons Popup -->
<div id="popup-social"></div>
 
<!-- Alert --> 
<div id="popup-alert"></div>  

<!-- Notifications --> 
<div id="popup-notifications"></div>  
<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script src="<?=$base_url; ?>ladun/vendor/jquery/jquery-3.5.1.min.js"></script>
<script src="<?=$base_url; ?>ladun/vendor/jquery/jquery.validate.min.js" ></script>
<script src="<?=$base_url; ?>ladun/vendor/swiper/swiper.min.js"></script>
<script src="<?=$base_url; ?>ladun/js/swiper-init.js"></script>
<script src="<?=$base_url; ?>ladun/js/jquery.custom.js"></script>
<script>
	const server = "<?=$base_url; ?>";
</script>
<script src="<?=$base_url; ?>ladun/js/seller.js"></script>
</body>
</html>