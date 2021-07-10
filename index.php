<?php
session_start();
include('config/db.php');
// query ambil data kategori 
$qKategori = $link -> query("SELECT * FROM tbl_kategori;");
// query produk terbaru 
$qProdukTerbaru = $link -> query("SELECT * FROM tbl_produk ORDER BY id DESC LIMIT 0, 10 ;");
// query produk dengan diskon 
$qProdukDiskon = $link -> query("SELECT * FROM tbl_produk WHERE status_diskon='y' ORDER BY id DESC LIMIT 0, 10");
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, minimal-ui">
<title>Sifo Pajak Sei Sikambing</title>
<link rel="stylesheet" href="<?=$base_url; ?>ladun/vendor/swiper/swiper.min.css">
<link rel="stylesheet" href="<?=$base_url; ?>ladun/css/style.css">
<link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet"> 
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
			<div class="header__logo header__logo--text"><a href="javascript:void(0)">Sifo Pajak<strong> Sei Sikambing</strong></a></div>	
			<div class="header__icon header__icon--cart"></div>
        </div>
	</header>
	
	
	<!-- PAGE CONTENT -->
	<div class="page__content page__content--with-header page__content--with-bottom-nav" id="divKontenBody">
	    <h3 class="featured__title pb-10">Selamat datang di aplikasi pajak sei sikambing, kamu dapat menemukan produk produk sehari hari disini.</h3>
        <br/>
		<div class="page__title-bar">
			<h3>Kategori Produk</h3>
			
			<div class="page__title-right">
				<div class="swiper-button-prev slider-thumbs__prev"></div>
				<div class="swiper-button-next slider-thumbs__next"></div>
			</div>
		</div>
		
		<!-- SLIDER THUMBS 3h -->
		<div class="swiper-container slider-thumbs slider-init mb-20" data-paginationtype="progressbar" data-spacebetweenitems="10" data-itemsperview="auto">
			<div class="swiper-wrapper">
                <?php while($fKategori = $qKategori -> fetch_assoc()){ ?> 
                <?php
                $kd_kategori = $fKategori['kd'];
                $nama_kategori = $fKategori['nama']; 
                ?>
				<div class="swiper-slide slider-thumbs__slide slider-thumbs__slide--3h divKategori" id="<?=$kd_kategori; ?>">
					<div class="slider-thumbs__image slider-thumbs__image--round-corners">
                        <a href="javascript:void(0);"><img src="ladun/img/kategori/<?=$kd_kategori; ?>.jpg" alt="" title=""/></a>
                    </div>
					<div class="slider-thumbs__caption caption">
						<div class="caption__content">
							<h2 class="caption__title caption__title--smaller"><?=$nama_kategori; ?></h2>
						</div>
					</div>
				</div> 
				<?php } ?>
			</div>
			<div class="swiper-pagination slider-thumbs__pagination"></div>
	
		</div>
		<div id="divKonten">
    		<div class="page__title-bar">
			<h3>Produk terbaru</h3>
			
			<div class="page__title-right">
				<div class="swiper-button-prev slider-thumbs__prev"></div>
				<div class="swiper-button-next slider-thumbs__next"></div>
			</div>
		</div>
		
		<!-- SLIDER THUMBS -->
		<div class="swiper-container slider-thumbs slider-init mb-20" data-paginationtype="progressbar" data-spacebetweenitems="10" data-itemsperview="auto">
			<div class="swiper-wrapper">
				<?php while($fProd = $qProdukTerbaru -> fetch_assoc()){ ?> 
				<?php
				$idBahan = $fProd['kd_bahan'];
				$kdProduk = $fProd['kd'];
				$username_penjual = $fProd['username_penjual'];
				// cari data bahan 
				$qBahan = $link -> query("SELECT * FROM tbl_bahan WHERE id='$idBahan' LIMIT 0,1;");
				$fBahan = $qBahan -> fetch_assoc();
				$satuan = $fBahan['satuan'];
				$namaBahan = $fBahan['nama'];
				// cari data penjual 
				$qPenjual = $link -> query("SELECT * FROM tbl_profil_seller WHERE username='$username_penjual' LIMIT 0,1;");
				$fSeller = $qPenjual -> fetch_assoc();
				$nama_toko = $fSeller['nama_toko'];
				?> 
				<div class="swiper-slide slider-thumbs__slide slider-thumbs__slide--1h divProdukCap"  id="<?=$kdProduk; ?>">
					<div class="slider-thumbs__image slider-thumbs__image--round-corners">
					<a href="javascript:void(0)"><img src="<?= $base_url; ?>api/file_upload/produk/<?=$fProd['kd'];?>.jpg" alt="" title=""/></a>
						<div class="slider-thumbs__top-right-info">
							<div class="slider-thumbs__price">Rp. <?=number_format($fProd['harga']); ?></div>
						</div>
						<div class="slider-thumbs__bottom-right-info">
							<div class="slider-thumbs__addtocart addtocart"><a href="#"><img src="ladun/assets/images/icons/black/cart.svg" alt="" title=""/></a></div>
						</div>
					</div>
					<div class="slider-thumbs__caption caption">
						<div class="caption__content">
							<h2 class="caption__title"><?=$fProd['nama']; ?></h2><br/><h4><?=$nama_toko; ?></h4>
							<a class="caption__category" href="#!"><?=$namaBahan; ?></a>
						</div>
					</div>
				</div> 
				<?php } ?>
			</div>
			<div class="swiper-pagination slider-thumbs__pagination"></div>
			<div class="buttons buttons--centered mb-20">
				<a href="javascript:void(0)" onclick="semuaProdukTerbaruAtc()" class="button button--main">Semua produk terbaru</a>
			</div>
		</div>
		
    		<div class="page__title-bar">
			<h3>Produk dengan diskon</h3>
			
			<div class="page__title-right">
				<div class="swiper-button-prev slider-thumbs__prev"></div>
				<div class="swiper-button-next slider-thumbs__next"></div>
			</div>
		</div>
		
		<!-- SLIDER THUMBS -->
		<div class="swiper-container slider-thumbs slider-init mb-20" data-paginationtype="progressbar" data-spacebetweenitems="10" data-itemsperview="auto">
			<div class="swiper-wrapper">

			<?php while($fProd = $qProdukDiskon -> fetch_assoc()){ ?> 
				<?php
				$idBahan = $fProd['kd_bahan'];
				$kdProduk = $fProd['kd'];
				$username_penjual = $fProd['username_penjual'];
				// cari data bahan 
				$qBahan = $link -> query("SELECT * FROM tbl_bahan WHERE id='$idBahan' LIMIT 0,1;");
				$fBahan = $qBahan -> fetch_assoc();
				$satuan = $fBahan['satuan'];
				$namaBahan = $fBahan['nama'];
				// cari data penjual 
				$qPenjual = $link -> query("SELECT * FROM tbl_profil_seller WHERE username='$username_penjual' LIMIT 0,1;");
				$fSeller = $qPenjual -> fetch_assoc();
				$nama_toko = $fSeller['nama_toko'];
				?> 
				<div class="swiper-slide slider-thumbs__slide slider-thumbs__slide--1h divProdukCap"   id="<?=$kdProduk; ?>">
					<div class="slider-thumbs__image slider-thumbs__image--round-corners">
					<a href="javascript:void(0)"><img src="<?= $base_url; ?>api/file_upload/produk/<?=$fProd['kd'];?>.jpg" alt="" title=""/></a>
						<div class="slider-thumbs__top-right-info">
							<div class="slider-thumbs__price">Rp. <?=number_format($fProd['harga']); ?></div>
						</div>
						<div class="slider-thumbs__bottom-right-info">
							<div class="slider-thumbs__addtocart addtocart"><a href="#"><img src="ladun/assets/images/icons/black/cart.svg" alt="" title=""/></a></div>
						</div>
					</div>
					<div class="slider-thumbs__caption caption">
						<div class="caption__content">
							<h2 class="caption__title"><?=$fProd['nama']; ?></h2><br/><h4><?=$nama_toko; ?></h4>
							<a class="caption__category" href="#!"><?=$namaBahan; ?></a>
						</div>
					</div>
				</div> 
				<?php } ?>
				
			</div>
			<div class="swiper-pagination slider-thumbs__pagination"></div>
			<div class="buttons buttons--centered mb-20">
				<a href="javascript:void(0)" class="button button--main">Semua produk diskon</a>
			</div>
		</div>
    		
		</div>
		</div>
		</div>
		<div class="buttons buttons--centered mb-20">
			<a href="#" class="button button--main open-panel" data-panel="right">BROWSE CATEGORIES</a> 
		</div>
		  
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
<script src="<?=$base_url; ?>ladun/vendor/jquery/jquery-3.5.1.min.js"></script>
<script src="<?=$base_url; ?>ladun/vendor/jquery/jquery.validate.min.js" ></script>
<script src="<?=$base_url; ?>ladun/vendor/swiper/swiper.min.js"></script>
<script src="<?=$base_url; ?>ladun/js/swiper-init.js"></script>
<script src="<?=$base_url; ?>ladun/js/jquery.custom.js"></script>
<script>
	const server = "<?=$base_url; ?>";
</script>
<script src="<?=$base_url; ?>ladun/js/home.js"></script>

</body>
</html>