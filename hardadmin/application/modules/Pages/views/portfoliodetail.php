<section class="homepage-hero-section inner-section service-hero-section" style="background-image: url(<?php echo site_url(); ?>common/img/service-inner.webp)">
		<div class="container">
			<div class="h-h-content-box">
				<div class="h-h-c-b-box">
					<div class="inner-page-head-box">
						<h1>Portfolio Detail</h1>
						<div class="page-bredcrumb-box">
							<ul>
								<li><a href="<?php echo site_url(); ?>">Home</a></li>
								<li><a href="<?php echo site_url(); ?>portfolio">Portfolio</a></li>
								<li><a href="<?php echo site_url(); ?>portfolio-detail">Portfolio Detail</a></li>
								<li><a href="<?php echo site_url(); ?>"><?php echo $row['portfolio_title']; ?></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="portfolio-details-section">
		<div class="container">
			<div class="row">
				<div class="col-sm-4">
					<!--<div class="img-box portfolio-brand-img-box">
						<img src="<?php //echo site_url(); ?>common/img/portfolio/lugyimin-logo.webp" alt="">
					</div>-->
					<div class="img-box portfolio-brand-img-box">
					 <?php if($row['portfolio_image']){?>
					<img  src="<?php echo site_url();?>admin/upload/portfolio_image/<?php echo $row['portfolio_image']; ?>" alt="<?php echo $row['portfolio_title']; ?>">
					<?php }else {?>
					<img src="<?= base_url() ?>public/images/no-image.png"><?php } ?>
					</div>
				</div>
				<div class="col-sm-8">
					<div class="port-details-block">
						<?php echo $row['portfolio_desc']; ?>
						<!--<a href="<?php echo $row['url']; ?>" class="link-btn" target="_blank">Visit Website</a>-->
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="portfolio-slider-section">
		<div class="container">
			<div class="owl-carousel owl-theme portfolio-carousal">
				<div class="item">
					<div class="port-slider-item">
						<div class="img-box">
							<!--<img src="<?php echo site_url(); ?>common/img/portfolio/nextgtv/Projects-Slider_0001s_0001_1.webp" alt="">-->
						<?php if($row['portfolio_image']){?>
						<img  src="<?php echo site_url();?>admin/upload/portfolio_image/<?php echo $row['portfolio_image']; ?>" alt="<?php echo $row['portfolio_title']; ?>">
							<?php }else {?>
							<img  src="<?= base_url() ?>public/images/no-image.png">
							<?php } ?>
						</div>
					</div>
				</div>
				<!--<div class="item">
					<div class="port-slider-item">
						<div class="img-box">
							<img src="<?php echo site_url(); ?>common/img/portfolio/the-fork/Projects-Slider_0003s_0001_2.webp" alt="">
						</div>
					</div>
				</div>
				<div class="item">
					<div class="port-slider-item">
						<div class="img-box">
							<img src="<?php echo site_url(); ?>common/img/portfolio/shopmatic/Projects-Slider_0000s_0000_2.webp" alt="">
						</div>
					</div>
				</div>-->
			</div>
		</div>
	</section>
	