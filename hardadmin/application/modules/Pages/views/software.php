<section class="products-hero-section service-hero-section" style="background-image: url(<?php echo site_url(); ?>common/img/hardware-vs-software.webp)">
		<div class="container">
			<div class="h-h-content-box">
				<div class="h-h-c-b-box">
					<div class="inner-page-head-box">
						<h1>Softwares</h1>
						<div class="page-bredcrumb-box">
							<ul>
								<li><a href="<?php echo base_url(); ?>">Home</a></li>
								<li><a href="<?php echo base_url(); ?>software">Softwares</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="service-info-section">
		<div class="container">

			<h1 class="service-inner-big-heading show-on-scroll scroll-animate is-visible">Giving Smartness
				<br>to your Business<b>.</b></h1>

			<p class="show-on-scroll scroll-animate is-visible">WAYINFOTECH SOLUTIONS team provides a suite of services connecting devices, applications, people and processes. Our expertise will help transform your business through effective implementation of technologies, platforms and architecture.</p>

			<a href="#" class="glow-btn show-on-scroll scroll-animate is-visible">Get A Quote</a>
		</div>
	</section>
<section class="products-slider-section">
		<div class="container">
			<h2>Popular Softwares</h2>
			<div class="owl-carousel owl-theme pop-prod-owl">
			<?php 
			//print_r($rows);die;
			foreach($srows as $key=>$value){?>
				<div class="item pop-prod-item">
					<div class="prod-item-box">
						<div class="prod-action">
							<button type="button" data-bs-toggle="modal" data-bs-target="#talk-modal">
								<img src="<?php echo base_url(); ?>common/img/f-btn-icon.svg" alt="">
							</button>
						</div>
						<div class="img-box">
							<img src="<?php echo site_url(); ?>admin/upload/software_image/<?php echo $value['software_image'];?>" alt="">
						</div>
						<h1><?php echo $value['software_title'];?></h1>
						<!--<span class="modelnm"><?php echo $value['model'];?></span>-->
						<a href="<?php echo site_url(); ?>software-details/<?php echo $value['id'];?>" class="link-btn"> Know More </a>
					</div>
				</div>
				<?php } ?>
			</div>
		</div>
	</section>

	<section class="all-products-section">
		<div class="container">
			<div class="mobile-filters">
				<button class="m-f-menu" onclick="openProductsFilters()"><span class="material-icons">filter_alt</span> Filters</button>
				<div id="FilterMenu" class="mob-side-menu">
					<div class="mobe-side-menu-container">
						<div class="close-mob-menus" onclick="closeProductsFilters()"></div>
						<div class="mob-side-menu-block">
							<div class="mob-side-menu-box">
								<div class="mob--menu-header">
									<h1>Filters</h1>
									<button onclick="closeProductsFilters()" class="mob-menu-close-btn">X</button>
								</div>
						<div class="filter-body">
							<div class="filter-block">
								<h5>Industry Type</h5>
								<ul class="tags-list">
									<li>
										<a href="#" class="tag">
										<div class="img-box">
										  <img src="<?php echo base_url(); ?>common/img/key-points/5.svg" alt="">
										</div>
										<span>Education</span>
										</a>
									</li>
									<li>
										<a href="#" class="tag">
										<div class="img-box">
										<img src="<?php echo base_url(); ?>common/img/key-points/5.svg" alt="">
										</div>
										<span>Education</span>
										</a>
									</li>
									<li>
										<a href="#" class="tag">
										<div class="img-box">
										<img src="<?php echo base_url(); ?>common/img/key-points/5.svg" alt="">
										</div>
										<span>Education</span>
										</a>
									</li>
								</ul>
							</div>
							<div class="filter-block">
								<h5>Category</h5>
								<ul class="category-list">
								<?php
								$cat_data=getcatname('category_details','id,category_name');
								  foreach ($cat_data as $key => $value) {
									$sss=str_replace(' ', '', @$value->category_name);
									$ss=str_replace('&', '', @$sss);
								?>
									<li>
										<button>
											<?php echo $value->category_name;?>
										</button>
									</li>
									<?php } ?>
								</ul>
							</div>
						</div>
							</div>
						</div>
					</div>
				  </div>
			</div>

			<div class="row">
				<div class="col-md-12">
					<div class="products-info-header">
						<div class="results-count">
							Showing 4 products out of 72
						</div>
						<div class="dropdown sort-dropdown">
							<a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
								<span class="material-icons">sort</span> Sort By</a>
							<ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
							  <li><a class="dropdown-item" href="#">By Name</a></li>
							  <li><a class="dropdown-item" href="#">Recently Added</a></li>
							  <li><a class="dropdown-item" href="#">Popularity</a></li>
							</ul>
						  </div>
					</div>
				<div class="products-body">
						<div class="product-block software-product-block">
						<?php foreach($srows as $key=>$value){?>
							<div class=" prod-item-box product-box education"> 
								<div class="img-box">
									<img src="<?php echo site_url(); ?>admin/upload/software_image/<?php echo $value['software_image'];?>" alt="">
								</div>
								<h1><?php echo $value['software_title'];?></h1>
								<a href="<?php echo site_url(); ?>software-details/<?php echo $value['id'];?>" class="link-btn"> Know More </a>
								<div class="prod-action">
									<button class="img-box" type="button" data-bs-toggle="modal" data-bs-target="#talk-modal">
										<img src="<?php echo base_url(); ?>common/img/f-btn-icon.svg" alt="">
									</button>
								</div>
							</div>
							<?php } ?>
							
					</div>
				</div>
			</div>
		</div>
	</section>