<?php 
include('config/db.php');
// query ambil data kategori 
$qKategori = $link -> query("SELECT * FROM tbl_kategori;");

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, minimal-ui">
<title>Sifo Pajak Sei Sikambing</title>
<link rel="stylesheet" href="ladun/vendor/swiper/swiper.min.css">
<link rel="stylesheet" href="ladun/css/style.css">
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
	<div class="page__content page__content--with-header page__content--with-bottom-nav">
	        <h2 class="featured__title pb-10">Produk apa yang ingin kamu cari?</h2>
                <div class="search__form">
			<form>
				<input type="text" class="search__input" id="" name="" value="" placeholder="CARI PRODUK" />
				<input type="submit" class="search__submit" value="Send" />
			</form>		
		</div>
			
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
                $kd_kategori = $fKategori['kd_kategori'];
                $nama_kategori = $fKategori['nama_kategori']; 
                ?>
				<div class="swiper-slide slider-thumbs__slide slider-thumbs__slide--3h">
					<div class="slider-thumbs__image slider-thumbs__image--round-corners"><a href="javascript:void(0);"><img src="ladun/assets/images/food/burgers.jpg" alt="" title=""/></a></div>
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
    		<div class="page__title-bar">
			<h3>Produk dengan diskon spesial</h3>
			
			<div class="page__title-right">
				<div class="swiper-button-prev slider-thumbs__prev"></div>
				<div class="swiper-button-next slider-thumbs__next"></div>
			</div>
		</div>
		
		<!-- SLIDER THUMBS -->
		<div class="swiper-container slider-thumbs slider-init mb-20" data-paginationtype="progressbar" data-spacebetweenitems="10" data-itemsperview="auto">
			<div class="swiper-wrapper">
				<div class="swiper-slide slider-thumbs__slide slider-thumbs__slide--1h">
					<div class="slider-thumbs__image slider-thumbs__image--round-corners">
					<a href="shop-details.html"><img src="ladun/assets/images/food/salad2.jpg" alt="" title=""/></a>
						<div class="slider-thumbs__top-right-info">
							<div class="slider-thumbs__price">$15</div>
						</div>
						<div class="slider-thumbs__bottom-right-info">
							<div class="slider-thumbs__addtocart addtocart"><a href="#"><img src="ladun/assets/images/icons/black/cart.svg" alt="" title=""/></a></div>
						</div>
					</div>
					<div class="slider-thumbs__caption caption">
						<div class="caption__content">
							<h2 class="caption__title">Mixed Salad</h2>
							<a class="caption__category" href="category.html">SALADS</a>
						</div>
					</div>
				</div> 
				<div class="swiper-slide slider-thumbs__slide slider-thumbs__slide--1h">
					<div class="slider-thumbs__image slider-thumbs__image--round-corners">
					<a href="shop-details.html"><img src="ladun/assets/images/food/pizza2.jpg" alt="" title=""/></a>
						 <div class="slider-thumbs__badge"><span>-10%</span></div>
						<div class="slider-thumbs__top-right-info">
							<div class="slider-thumbs__price">$12 <span>15</span></div>
						</div>
						<div class="slider-thumbs__bottom-right-info">
							<div class="slider-thumbs__addtocart addtocart"><a href="#"><img src="ladun/assets/images/icons/black/cart.svg" alt="" title=""/></a></div>
						</div>
					</div>
					<div class="slider-thumbs__caption caption">
						<div class="caption__content">
							<h2 class="caption__title">Pizza Margerita</h2>
							<a class="caption__category" href="category.html">PIZZA</a>
						</div>
					</div>
				</div> 
				<div class="swiper-slide slider-thumbs__slide slider-thumbs__slide--1h">
					<div class="slider-thumbs__image slider-thumbs__image--round-corners">
					<a href="shop-details.html"><img src="ladun/assets/images/food/chicken.jpg" alt="" title=""/></a>
						<div class="slider-thumbs__top-right-info">
							<div class="slider-thumbs__price">$12</div>
						</div>
						<div class="slider-thumbs__bottom-right-info">
							<div class="slider-thumbs__addtocart addtocart"><a href="#"><img src="ladun/assets/images/icons/black/cart.svg" alt="" title=""/></a></div>
						</div>
					</div>
					<div class="slider-thumbs__caption caption">
						<div class="caption__content">
							<h2 class="caption__title">Fried Chicken</h2>
							<a class="caption__category" href="category.html">STEAKS</a>
						</div>
					</div>
				</div> 
				<div class="swiper-slide slider-thumbs__slide slider-thumbs__slide--1h">
					<div class="slider-thumbs__image slider-thumbs__image--round-corners">
					<a href="shop-details.html"><img src="ladun/assets/images/food/burgers.jpg" alt="" title=""/></a>
						<div class="slider-thumbs__top-right-info">
							<div class="slider-thumbs__price">$10</div>
						</div>
						<div class="slider-thumbs__bottom-right-info">
							<div class="slider-thumbs__addtocart addtocart"><a href="#"><img src="ladun/assets/images/icons/black/cart.svg" alt="" title=""/></a></div>
						</div>
					</div>
					<div class="slider-thumbs__caption caption">
						<div class="caption__content">
							<h2 class="caption__title">Beef Burger</h2>
							<a class="caption__category" href="category.html">BURGERS</a>
						</div>
					</div>
				</div> 
				<div class="swiper-slide slider-thumbs__slide slider-thumbs__slide--1h">
					<div class="slider-thumbs__image slider-thumbs__image--round-corners">
					<a href="shop-details.html"><img src="ladun/assets/images/food/sushi.jpg" alt="" title=""/></a>
						<div class="slider-thumbs__top-right-info">
							<div class="slider-thumbs__price">$24</div>
						</div>
						<div class="slider-thumbs__bottom-right-info">
							<div class="slider-thumbs__addtocart addtocart"><a href="#"><img src="ladun/assets/images/icons/black/cart.svg" alt="" title=""/></a></div>
						</div>
					</div>
					<div class="slider-thumbs__caption caption">
						<div class="caption__content">
							<h2 class="caption__title">Sushi Plate</h2>
							<a class="caption__category" href="category.html">SUSHI</a>
						</div>
					</div>
				</div> 
			</div>
			<div class="swiper-pagination slider-thumbs__pagination"></div>
	
		</div>
		
    		<div class="page__title-bar">
			<h3>Hot Today</h3>
			
			<div class="page__title-right">
				<div class="swiper-button-prev slider-thumbs__prev"></div>
				<div class="swiper-button-next slider-thumbs__next"></div>
			</div>
		</div>
		
		<!-- SLIDER THUMBS -->
		<div class="swiper-container slider-thumbs slider-init mb-20" data-paginationtype="progressbar" data-spacebetweenitems="10" data-itemsperview="auto">
			<div class="swiper-wrapper">
				<div class="swiper-slide slider-thumbs__slide slider-thumbs__slide--1h">
					<div class="slider-thumbs__image slider-thumbs__image--round-corners">
					<a href="shop-details.html"><img src="ladun/assets/images/food/kebab.jpg" alt="" title=""/></a>
						<div class="slider-thumbs__top-right-info">
							<div class="slider-thumbs__price">$11</div>
						</div>
						<div class="slider-thumbs__bottom-right-info">
							<div class="slider-thumbs__addtocart addtocart"><a href="#"><img src="ladun/assets/images/icons/black/cart.svg" alt="" title=""/></a></div>
						</div>
					</div>
					<div class="slider-thumbs__caption caption">
						<div class="caption__content">
							<h2 class="caption__title">Mixed Kebab</h2>
							<a class="caption__category" href="category.html">MEAT</a>
						</div>
					</div>
				</div> 
				<div class="swiper-slide slider-thumbs__slide slider-thumbs__slide--1h">
					<div class="slider-thumbs__image slider-thumbs__image--round-corners">
					<a href="shop-details.html"><img src="ladun/assets/images/food/steak.jpg" alt="" title=""/></a>
						<div class="slider-thumbs__top-right-info">
							<div class="slider-thumbs__price">$17</div>
						</div>
						<div class="slider-thumbs__bottom-right-info">
							<div class="slider-thumbs__addtocart addtocart"><a href="#"><img src="ladun/assets/images/icons/black/cart.svg" alt="" title=""/></a></div>
						</div>
					</div>
					<div class="slider-thumbs__caption caption">
						<div class="caption__content">
							<h2 class="caption__title">Beef Steak</h2>
							<a class="caption__category" href="category.html">STEAK</a>
						</div>
					</div>
				</div> 
				<div class="swiper-slide slider-thumbs__slide slider-thumbs__slide--1h">
					<div class="slider-thumbs__image slider-thumbs__image--round-corners">
					<a href="shop-details.html"><img src="ladun/assets/images/food/tortillas.jpg" alt="" title=""/></a>
						<div class="slider-thumbs__top-right-info">
							<div class="slider-thumbs__price">$8</div>
						</div>
						<div class="slider-thumbs__bottom-right-info">
							<div class="slider-thumbs__addtocart addtocart"><a href="#"><img src="ladun/assets/images/icons/black/cart.svg" alt="" title=""/></a></div>
						</div>
					</div>
					<div class="slider-thumbs__caption caption">
						<div class="caption__content">
							<h2 class="caption__title">Mexican Tortillas</h2>
							<a class="caption__category" href="category.html">MEXICAN</a>
						</div>
					</div>
				</div> 
				<div class="swiper-slide slider-thumbs__slide slider-thumbs__slide--1h">
					<div class="slider-thumbs__image slider-thumbs__image--round-corners">
					<a href="shop-details.html"><img src="ladun/assets/images/food/salads.jpg" alt="" title=""/></a>
						<div class="slider-thumbs__top-right-info">
							<div class="slider-thumbs__price">$10</div>
						</div>
						<div class="slider-thumbs__bottom-right-info">
							<div class="slider-thumbs__addtocart addtocart"><a href="#"><img src="ladun/assets/images/icons/black/cart.svg" alt="" title=""/></a></div>
						</div>
					</div>
					<div class="slider-thumbs__caption caption">
						<div class="caption__content">
							<h2 class="caption__title">Mixed Salad</h2>
							<a class="caption__category" href="category.html">SALADS</a>
						</div>
					</div>
				</div> 
				<div class="swiper-slide slider-thumbs__slide slider-thumbs__slide--1h">
					<div class="slider-thumbs__image slider-thumbs__image--round-corners">
					<a href="shop-details.html"><img src="ladun/assets/images/food/soup.jpg" alt="" title=""/></a>
						<div class="slider-thumbs__top-right-info">
							<div class="slider-thumbs__price">$9</div>
						</div>
						<div class="slider-thumbs__bottom-right-info">
							<div class="slider-thumbs__addtocart addtocart"><a href="#"><img src="ladun/assets/images/icons/black/cart.svg" alt="" title=""/></a></div>
						</div>
					</div>
					<div class="slider-thumbs__caption caption">
						<div class="caption__content">
							<h2 class="caption__title">House Soup</h2>
							<a class="caption__category" href="category.html">SOUPS</a>
						</div>
					</div>
				</div> 
			</div>
			<div class="swiper-pagination slider-thumbs__pagination"></div>
	
		</div>
    		<div class="page__title-bar">
			<h3>Special Prices</h3>
			
			<div class="page__title-right">
				<div class="swiper-button-prev slider-thumbs__prev"></div>
				<div class="swiper-button-next slider-thumbs__next"></div>
			</div>
		</div>
		
		<!-- SLIDER THUMBS -->
		<div class="swiper-container slider-thumbs slider-init mb-20" data-paginationtype="progressbar" data-spacebetweenitems="10" data-itemsperview="auto">
			<div class="swiper-wrapper">
				<div class="swiper-slide slider-thumbs__slide slider-thumbs__slide--1h">
					<div class="slider-thumbs__image slider-thumbs__image--round-corners">
					<a href="shop-details.html"><img src="ladun/assets/images/food/chicken.jpg" alt="" title=""/></a>
						<div class="slider-thumbs__badge"><span>-20%</span></div>
						<div class="slider-thumbs__top-right-info">
							<div class="slider-thumbs__price">$12 <span>17</span></div>
						</div>
						<div class="slider-thumbs__bottom-right-info">
							<div class="slider-thumbs__addtocart addtocart"><a href="#"><img src="ladun/assets/images/icons/black/cart.svg" alt="" title=""/></a></div>
						</div>
					</div>
					<div class="slider-thumbs__caption caption">
						<div class="caption__content">
							<h2 class="caption__title">Fried Chicken</h2>
							<a class="caption__category" href="category.html">STEAKS</a>
						</div>
					</div>
				</div> 
				<div class="swiper-slide slider-thumbs__slide slider-thumbs__slide--1h">
					<div class="slider-thumbs__image slider-thumbs__image--round-corners">
					<a href="shop-details.html"><img src="ladun/assets/images/food/burgers.jpg" alt="" title=""/></a>
						<div class="slider-thumbs__badge"><span>-20%</span></div>
						<div class="slider-thumbs__top-right-info">
							<div class="slider-thumbs__price">$10 <span>12</span></div>
						</div>
						<div class="slider-thumbs__bottom-right-info">
							<div class="slider-thumbs__addtocart addtocart"><a href="#"><img src="ladun/assets/images/icons/black/cart.svg" alt="" title=""/></a></div>
						</div>
					</div>
					<div class="slider-thumbs__caption caption">
						<div class="caption__content">
							<h2 class="caption__title">Beef Burger</h2>
							<a class="caption__category" href="category.html">BURGERS</a>
						</div>
					</div>
				</div> 
				<div class="swiper-slide slider-thumbs__slide slider-thumbs__slide--1h">
					<div class="slider-thumbs__image slider-thumbs__image--round-corners">
					<a href="shop-details.html"><img src="ladun/assets/images/food/sushi.jpg" alt="" title=""/></a>
						<div class="slider-thumbs__badge"><span>-15%</span></div>
						<div class="slider-thumbs__top-right-info">
							<div class="slider-thumbs__price">$18 <span>24</span></div>
						</div>
						<div class="slider-thumbs__bottom-right-info">
							<div class="slider-thumbs__addtocart addtocart"><a href="#"><img src="ladun/assets/images/icons/black/cart.svg" alt="" title=""/></a></div>
						</div>
					</div>
					<div class="slider-thumbs__caption caption">
						<div class="caption__content">
							<h2 class="caption__title">Sushi Plate</h2>
							<a class="caption__category" href="category.html">SUSHI</a>
						</div>
					</div>
				</div>
				<div class="swiper-slide slider-thumbs__slide slider-thumbs__slide--1h">
					<div class="slider-thumbs__image slider-thumbs__image--round-corners">
					<a href="shop-details.html"><img src="ladun/assets/images/food/salad2.jpg" alt="" title=""/></a>
					        <div class="slider-thumbs__badge"><span>-8%</span></div>
						<div class="slider-thumbs__top-right-info">
							<div class="slider-thumbs__price">$9 <span>11</span></div>
						</div>
						<div class="slider-thumbs__bottom-right-info">
							<div class="slider-thumbs__addtocart addtocart"><a href="#"><img src="ladun/assets/images/icons/black/cart.svg" alt="" title=""/></a></div>
						</div>
					</div>
					<div class="slider-thumbs__caption caption">
						<div class="caption__content">
							<h2 class="caption__title">Mixed Salad</h2>
							<a class="caption__category" href="category.html">SALADS</a>
						</div>
					</div>
				</div> 
				<div class="swiper-slide slider-thumbs__slide slider-thumbs__slide--1h">
					<div class="slider-thumbs__image slider-thumbs__image--round-corners">
					<a href="shop-details.html"><img src="ladun/assets/images/food/pizza2.jpg" alt="" title=""/></a>
						 <div class="slider-thumbs__badge"><span>-10%</span></div>
						<div class="slider-thumbs__top-right-info">
							<div class="slider-thumbs__price">$12 <span>15</span></div>
						</div>
						<div class="slider-thumbs__bottom-right-info">
							<div class="slider-thumbs__addtocart addtocart"><a href="#"><img src="ladun/assets/images/icons/black/cart.svg" alt="" title=""/></a></div>
						</div>
					</div>
					<div class="slider-thumbs__caption caption">
						<div class="caption__content">
							<h2 class="caption__title">Pizza Margerita</h2>
							<a class="caption__category" href="category.html">PIZZA</a>
						</div>
					</div>
				</div> 
 
			</div>
			<div class="swiper-pagination slider-thumbs__pagination"></div>
	
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

<script src="ladun/vendor/jquery/jquery-3.5.1.min.js"></script>
<script src="ladun/vendor/jquery/jquery.validate.min.js" ></script>
<script src="ladun/vendor/swiper/swiper.min.js"></script>
<script src="ladun/js/swiper-init.js"></script>
<script src="ladun/js/jquery.custom.js"></script>
</body>
</html>