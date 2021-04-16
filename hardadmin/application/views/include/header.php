<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd"> 
<html lang="en" class="nav-no-js">
	<head>
	<!-- Global site tag (gtag.js) - Google Analytics --> <script async src="https://www.googletagmanager.com/gtag/js?id=G-QX0PRLNPJG"></script> 
	<script> window.dataLayer = window.dataLayer || []; function gtag(){dataLayer.push(arguments);} gtag('js', new Date()); gtag('config', 'G-QX0PRLNPJG'); </script>
	<meta content="text/html; charset=utf-8" http-equiv="content-type">
	<title>Wayinfotech Solutions</title>
	<meta charset="utf-8">
	<meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
	<meta content="width=device-width, initial-scale=1" name="viewport">
	<meta name="description" content="">
	<meta property="og:title" content="Wayinfotech Solutions">
	<meta property="og:description" content="Wayinfotech Solutions is one of the Best Website Designing & App Development company based in Delhi,Noida & NCR. We develop websites in secure programming languages, majorly includes PHP and .Net . All our designed websites ar quite appealing and gracious that consist the high user interaction strength. We are offering website designing services in India, Australia and US as well.">
	<meta property="og:image" content="<?php echo base_url(); ?>common/img/wayinfo-icon.png">
	<meta property="og:url" content="https://www.wayinfotechsolutions.com/">
	<meta name="twitter:card" content="summary_large_image">
	<link rel="icon" href="<?php echo base_url(); ?>common/img/wayinfo-icon.png" type="image/png" sizes="16x16">
	<!--==============Fonts==============-->
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;0,800;1,400&display=swap" rel="stylesheet">
	<!--==============Material Icons CSS==============-->
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<!-- ==============Bootstrap==============-->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
	<!--==============Owl Carousal==============-->
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
	<!--==============Custom CSS==============-->
	<link href="<?php echo base_url(); ?>common/css/custom.css" rel="stylesheet">
	</head>
	<body class="homepage">
	<!-- ====================================
	============= Header ====================
	==================================== -->
	<!-- Fixed Items ====================================================================== -->
	<div class="fixed-contact-btn">
		<button class="f-c-btn-block" type="button" data-bs-toggle="modal" data-bs-target="#talk-modal">
			<div class="img-box">
				<img src="<?php echo base_url(); ?>common/img/f-btn-icon.svg" alt="">
			</div>
			<span>Talk To Us</span>
		</button>
	</div>
	<!-- End Fixed Items =================================================================== -->
		<!-- Desktop Menu ===================================================================== -->
	<?php if($this->uri->segment(3))
		{	?>	
	<nav class="navbar desk-navbar product-inner-page" id="deskNavbar">
		<div class="container">
			<div class="nav-container">
				<div class="desk-brand-container">
					<a href="<?php echo base_url(); ?>" class="brand-container img-box">
						<img src="<?php echo base_url(); ?>common/img/brand.png" alt="Wayinfotech Solutions">
					</a>
				</div>
				<div class="desk-nav-menu-container">
					<ul>
						
						<li class="has-submenu">
							<a href="<?php echo base_url(); ?>products">Products</a>
							<ul class="submenu">
							<?php
							$cat_data=getcatname('category_details','id,category_name');
								  foreach ($cat_data as $key => $value) {
									$sss=str_replace(' ', '', @$value->category_name);
									$ss=str_replace('&', '', @$sss);
									$cat_id = $value->id;
								?>
								<li onclick="getBrandID(<?php echo $value->id;?>)">
								   <a href="<?php echo base_url(); ?>products/<?php echo $cat_id; ?>" class="ui-design-menu">
									<?php echo @$value->category_name;?>
								   </a>
								</li>
								  <?php } ?>
							
							 </ul>
						</li>
						<li><a href="<?php echo base_url(); ?>software">Software</a></li>
						<li><a href="<?php echo base_url(); ?>aboutUs">About US</a></li>
						<li><a href="<?php echo base_url(); ?>contactUs">Contact Us</a></li>
					</ul>
				</div>
			</div>
		</div>
	</nav> 
	<?php } else {?>
	<nav class="navbar desk-navbar" id="deskNavbar">
		<div class="container">
			<div class="nav-container">
				<div class="desk-brand-container">
					<a href="<?php echo base_url(); ?>" class="brand-container img-box">
						<img src="<?php echo base_url(); ?>common/img/brand.png" alt="Wayinfotech Solutions">
					</a>
				</div>
				<div class="desk-nav-menu-container">
					<ul>
						
						<li class="has-submenu">
							<a href="<?php echo base_url(); ?>products">Products</a>
							<ul class="submenu">
							<?php
							$cat_data=getcatname('category_details','id,category_name');
								  foreach ($cat_data as $key => $value) {
									$sss=str_replace(' ', '', @$value->category_name);
									$ss=str_replace('&', '', @$sss);
									$cat_id = $value->id;
								?>
								<li onclick="getBrandID(<?php echo $value->id;?>)">
								   <a href="<?php echo base_url(); ?>products/<?php echo $cat_id; ?>" class="ui-design-menu">
									<?php echo @$value->category_name;?>
								   </a>
								</li>
								  <?php } ?>
							
							 </ul>
						</li>
						<li><a href="<?php echo base_url(); ?>software">Software</a></li>
						<li><a href="<?php echo base_url(); ?>aboutUs">About US</a></li>
						<li><a href="<?php echo base_url(); ?>contactUs">Contact Us</a></li>
					</ul>
				</div>
			</div>
		</div>
	</nav> 
	<?php } ?>
	<!-- End Desktop Menu ================================================================= -->
	<!-- Mobile Menu ====================================================================== -->
	
	<!-- Mobile Menu Level 2 (Products) -->
	<div id="MobMenuProducts" class="mob-side-menu">
		<div class="mobe-side-menu-container">
			<div class="close-mob-menus" onclick="closeMobMenu();closeMobMenuProducts()"></div>
			<div class="mob-side-menu-block">
				<div class="mob-side-menu-box">
					<div class="mob--menu-header">
						<button class="mob-menu-back-btn" onclick="closeMobMenuProducts()"><span class="material-icons"> keyboard_backspace </span>Back</button>
						<button onclick="closeMobMenu();closeMobMenuProducts()" class="mob-menu-close-btn">X</button>
					</div>
					<ul class="m-s-m-list">
					<?php
					$cat_data=getcatname('category_details','id,category_name');
					  foreach ($cat_data as $key => $value) {
						$sss=str_replace(' ', '', @$value->category_name);
						$ss=str_replace('&', '', @$sss);
					?>
						<li>
							<a href="<?php echo base_url(); ?>Pages/products/<?php echo $value->id;?>"><?php echo @$value->category_name;?></a>
						</li>
					<?php } ?>	
					
					</ul>
					
				</div>
			</div>
		</div>
	  </div>

	<!-- Mobile Menu Level 1 -->
	<div id="MobMenu" class="mob-side-menu">
		<div class="mobe-side-menu-container">
			<div class="close-mob-menus" onclick="closeMobMenu()"></div>
			<div class="mob-side-menu-block">
				<div class="mob-side-menu-box">
					<div class="mob--menu-header">
						<h1>Menu</h1>
						<button onclick="closeMobMenu()" class="mob-menu-close-btn">X</button>
					</div>
					<ul class="m-s-m-list">
						<li>
							<a href="<?php echo base_url(); ?>products">Products<button class="mob-submenu-icon" onclick="openMobMenuProducts()"></button></a>
						</li>
						<li>
						<a href="<?php echo base_url(); ?>software">Software</a>
						</li>
						<li>
							<a href="<?php echo base_url(); ?>aboutUs">About Us</a>
						</li>
						<li>
						<a href="<?php echo base_url(); ?>contactUs">Contact Us</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	  </div>

	<!-- Main Mobile Menu -->
	<nav class="mob-navbar product-inner-page" id="mobNavbar">
		<div class="container">
			<div class="nav-container">
				<div class="desk-brand-container">
					<a href="<?php echo base_url(); ?>" class="brand-container img-box">
						<img src="<?php echo base_url(); ?>common/img/brand.png" alt="Wayinfotech Solutions">
					</a>
				</div>
				<div class="mob-menu-btn">
					<button onclick="openMobMenu()"><span class="material-icons">bar_chart</span></button> 
				</div>
			</div>
		</div>
	</nav>
	<!-- Mobile Menu End ================================================================= -->

	<!-- =================== End of Header =========================== -->
	<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>-->
	<script src="<?php echo base_url(); ?>common/js/jquery3.5.1.min.js"></script>
<script>

 function get_cat_id_data(cat_id){
	         $.ajax({
				 url:"<?php echo base_url();?>"+'Pages/ajaxProduct',
                type:"post",
				data:{cat_id:cat_id},
				success:function(res){
                   $("#product_res").html(res);
                   
                }
        });
 }
 
 </script>