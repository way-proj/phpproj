	<section class="homepage-hero-section service-hero-section inner-section service-inner-section" style="background-image: url(<?php echo site_url(); ?>common/img/service-inner.webp)">
		<div class="container">
			<div class="h-h-content-box">
				<div class="h-h-c-b-box">
					<div class="inner-page-head-box">
						<h1>Portfolio</h1>
						<div class="page-bredcrumb-box">
							<ul>
								<li><a href="<?php echo base_url(); ?>">Home</a></li>
								<li><a href="<?php echo base_url(); ?>portfolio">Portfolio</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="portfolio-section">
		<div class="container">
			<div class="port-tab-links-block">
				<ul class="nav port-tabs" id="port-tabs" role="tablist">
					<li role="presentation">
					  <a id="port-all-tab" data-bs-toggle="tab" href="#port-all" role="tab" aria-controls="port-all" aria-selected="false" class="">
						  <div class="port-link-block">
							All&nbsp;&nbsp;
						  </div>
					  </a>
					</li>
					<li role="presentation">
					  <a class="active" id="port-ecommerce-tab" data-bs-toggle="tab" href="#port-ecommerce" role="tab" aria-controls="home" aria-selected="true">
						<div class="port-link-block">
						<!--	E-Commerce-->
						Mobile&nbsp;&nbsp;Apps&nbsp;&nbsp;|&nbsp;&nbsp;E-Commerce&nbsp;Website
						  </div>
					  </a>
					</li>
				  </ul>
			</div>

			<div class="port-tab-content-block">
				<div class="tab-content" id="port-tabContent">
					<div class="tab-pane fade" id="port-all" role="tabpanel" aria-labelledby="port-all">
						<div class="port-tab-content-box">
							<div class="row">
							<?php if(!empty($rows)){ foreach($rows as $key=>$val){ ?>
								<div class="col-12 col-sm-6 col-lg-3">
									<a class="portfolio-block" href="<?php echo base_url(); ?>portfolio-detail/<?php echo $val->id?>">
										<div class="portfolio-front">
											<div class="img-box img-cover-box">
												<img src="<?php echo site_url();?>admin/upload/portfolio_image/<?php echo $val->portfolio_image; ?>" alt="Portfolio">
											</div>
										</div>
										<!--<div class="portfolio-back">
											<h2>Apple</h2>
											<div class="port-tag">
												<ul>
													<li>E-Commerce</li>
												</ul>
											</div>
										</div>-->
										<div class="portfolio-back">
											<h2><?php echo $val->portfolio_title; ?></h2>
											<!--<div class="port-tag">
												<ul>
													<li>E-Commerce</li>
												</ul>
											</div>-->
										</div>
									</a>
								</div>
								<?php }} ?>	
														
							</div>
						</div>
					</div>
					<div class="tab-pane fade active show" id="port-ecommerce" role="tabpanel" aria-labelledby="port-ecommerce">
						<div class="port-tab-content-box">
							<div class="row">
							<?php if(!empty($rows)){ foreach($rows as $key=>$val){ ?>
								<div class="col-12 col-sm-6 col-lg-3">
									<!--<a class="portfolio-block" href="<?php echo base_url(); ?>/Pages/portfoliodetail">-->
									<a class="portfolio-block" href="<?php echo base_url(); ?>portfolio-detail/<?php echo $val->id?>">
										<div class="portfolio-front">
											<div class="img-box img-cover-box">
												<img src="<?php echo site_url();?>admin/upload/portfolio_image/<?php echo $val->portfolio_image; ?>" alt="Portfolio">
											</div>
										</div>
										<div class="portfolio-back">
											<h2><?php echo $val->portfolio_title; ?></h2>
											<!--<div class="port-tag">
												<ul>
													<li>E-Commerce</li>
												</ul>
											</div>-->
										</div>
									</a>
								</div>
								<?php }} ?>	
								
							</div>
						</div>
					</div>
				  </div>
			</div>
		</div>
	</section>