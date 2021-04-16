<section class="homepage-hero-section index-section">
		<div class="container">
			<div class="h-h-content-box">
				<div class="h-h-c-b-box">
					<div class="hhc-header">
						<div>
							<h6>
								Giving Smartness<br>
								to your Business <span class="h-red-dot">.</span>
							</h6>
						</div>
					</div>
				</div>
			</div>
			<a class="hard-t-btn" href="#" type="button" data-bs-toggle="modal" data-bs-target="#talk-modal">Let's Talk</a>
			<div class="h-h-btn-block">
				<div class="h-h-btn-c-box">
				</div>
			</div>
		</div>
	</section>

	<section class="awards-section">
		<div class="container-lg">
			<div class="row">
				<div class="col-sm-3">
					<div class="awards-img-box img-box">
						<img src="<?php echo base_url(); ?>common/img/awards.webp" alt="Awards">
					</div>
				</div>
				<div class="col-sm-9">
					<ul class="awards-box">
						<li>
						<div class="awards-block">
							<div class="img-box">
							<img src="<?php echo base_url(); ?>common/img/awards/newland-certification.png" alt="">
							</div>
								
						</div>
						<div class="awards-block">
							<div class="img-box">
							<img src="<?php echo base_url(); ?>common/img/awards/godex.webp" alt="">
							</div>
						</div>
						
					</li>
						
					<li>
						<div class="awards-block">
					    	<div class="img-box">
							<img src="<?php echo base_url(); ?>common/img/awards/zebra-tech.png" alt="">
							</div>
						</div>
						<div class="awards-block">
						    <div class="img-box">
					    	<img src="<?php echo base_url(); ?>common/img/awards/honeywell.webp" alt="">
							</div>
						</div>	
							
					</li>
					<li>
						<div class="awards-block">
							<div class="img-box">
							<img src="<?php echo base_url(); ?>common/img/awards/tsc.png" alt="">
					    	</div>
						</div>
						<div class="awards-block">
							<div class="img-box">
						    	<img src="<?php echo base_url(); ?>common/img/awards/datamax.webp" alt="">
							</div>
						</div>	
						
						</li>
						
					</ul>
				</div>
			</div>
		</div>
	</section>

	<section class="key-points-section">
		<div class="bg-element img-box">
			<img src="<?php echo base_url(); ?>common/img/ket-points-bg.png" alt="Key Points BG">
		</div>
		<div class="container">
			<div class="row">
				<div class="col-6 col-sm-6 col-md-4 show-on-scroll scroll-animate">
					<div class="k-p-container">
						<div class="img-box">
							<img src="<?php echo base_url(); ?>common/img/key-points/1.svg" alt="">
						</div>
						<div class="k-p-details-container">
							<h1>10+ Thousand</h1>
							<span>Users<br>Engagement</span>
						</div>
					</div>
				</div>
				<div class="col-6 col-sm-6 col-md-4 show-on-scroll scroll-animate">
					<div class="k-p-container">
						<div class="img-box">
							<img src="<?php echo base_url(); ?>common/img/key-points/2.svg" alt="">
						</div>
						<div class="k-p-details-container">
							<h1>Products Delivered</h1>
							<span>1 LAKHS+ Products<br>Delivered</span>
						</div>
					</div>
				</div>
				<div class="col-6 col-sm-6 col-md-4 show-on-scroll scroll-animate">
					<div class="k-p-container">
						<div class="img-box">
							<img src="<?php echo base_url(); ?>common/img/key-points/3.svg" alt="">
						</div>
						<div class="k-p-details-container">
							<h1>Software Delivered</h1>
							<span>1000+ Software<br>Delivered</span>
						</div>
					</div>
				</div>
				<div class="col-6 col-sm-6 col-md-4 show-on-scroll scroll-animate">
					<div class="k-p-container">
						<div class="img-box">
							<img src="<?php echo base_url(); ?>common/img/key-points/4.svg" alt="">
						</div>
						<div class="k-p-details-container">
							<h1>15+ Years</h1>
							<span>15+ Years of<br>Experience</span>
						</div>
					</div>
				</div>
				<div class="col-6 col-sm-6 col-md-4 show-on-scroll scroll-animate">
					<div class="k-p-container">
						<div class="img-box">
							<img src="<?php echo base_url(); ?>common/img/key-points/5.svg" alt="">
						</div>
						<div class="k-p-details-container">
							<h1>Genuine</h1>
							<span>Products<br>Delivery</span>
						</div>
					</div>
				</div>
				<div class="col-6 col-sm-6 col-md-4 show-on-scroll scroll-animate">
					<div class="k-p-container">
						<div class="img-box">
							<img src="<?php echo base_url(); ?>common/img/key-points/6.svg" alt="">
						</div>
						<div class="k-p-details-container">
							<h1>Software Support</h1>
							<span>24*7 Support <br>Availability</span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="portfolio-section">
		<div class="bg-element img-box">
			<img src="<?php echo base_url(); ?>common/img/portfolio-bg.png" alt="Portfolio BG">
		</div>
		<div class="container">
			<div class="port-header">
				<h2>Innovative ideas for<br>Innovative Future</h2>
				<span>We have a wide range of products that will improvise your bussiness
					productivity.</span>
				<a href="<?php echo base_url(); ?>products" class="primary-btn">View All Products</a>
			</div>
		</div>
		
		<div class="port-body">
			<div class="prod-slider">
				<div class="owl-carousel owl-theme prod-owl">
					<div class="item prod-slid-item">
						<div class="prod-slid-box">
							<div class="container">
								<?php  if(!empty($random_product)){
								foreach($random_product as $key=>$value){?>
								<div class="row">
									<div class="col-sm-6 col-lg-4 order-sm-2">
										<div class="img-box">
											<img src="<?php echo site_url(); ?>admin/upload/product_images/<?php echo $value['image'];?>" alt="">
										</div>
									</div>
									<div class="col-sm-6 col-lg-8 order-sm-1">
										<div class="prod-slid-details-block">
											<h1><?php echo $value['product_name'];?></h1>
										<ul class="tags-list">
											<li>
												<a href="#" class="tag">
													<div class="img-box">
														<img src="<?php echo base_url(); ?>common/img/key-points/5.svg" alt="">
													</div>
													<span><?php echo $value['industrytype_title'];?></span>
												</a>
											</li>
										</ul>
											<a href="<?php echo site_url(); ?>Pages/getProductDetails/<?php echo $value['id'];?>" class="link-btn">Know More</a>
										</div>
									</div>
								</div>
								<?php } } ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="gallery-section">
		<div class="gallery-slider">
			<div class="owl-carousel owl-theme gallery-owl">
				<div class="item gall-slid-item"><div class="img-box"><img src="<?php echo base_url(); ?>common/img/gallery-img.webp" alt="Gallery"></div></div>
				<div class="item gall-slid-item"><div class="img-box"><img src="<?php echo base_url(); ?>common/img/gallery-img.webp" alt="Gallery"></div></div>
				<div class="item gall-slid-item"><div class="img-box"><img src="<?php echo base_url(); ?>common/img/gallery-img.webp" alt="Gallery"></div></div>
			</div>
		</div>
		<div class="gallery-info">
			<ul>
				<li class="show-on-scroll scroll-animate"><h2>Skilled Techies</h2><span>In House</span></li>
				<li class="show-on-scroll scroll-animate"><h2>Definite process</h2><span>Extraordinary Results</span></li>
				<li class="show-on-scroll scroll-animate"><h2>Unmatched transparency</h2><span>Offering Total Visibility</span></li>
			</ul>
		</div>
	</section>

	<section class="services-section">
		<div class="container">
			<div class="port-header services-header">
				<h2>We deliver end-to-end Bussiness Solutions</h2>
				<span>Over the last fifteen years, Wayinfotech Solutions has developed the experience, processes and folks needed to expeditiously manage Technology Assets for firms across India.Creative, quality and user friendly Products & software solutions.</span>
			</div>
			<div class="services-body">
				<div class="row">
					<div class="col-sm-4 show-on-scroll scroll-animate">
						<div class="service-block">
							<div class="service-front">
								<img src="<?php echo base_url(); ?>common/img/services/card-printer.webp" alt="Card printer" class="service-img" >
								<div class="service-head">
									<h1>Card Printer</h1>
								</div>
							</div>
							<div class="service-back">
								<div class="s-b-block">
									<h1>Card Printer</h1>
									<p>A card printer is an electronic desktop printer with single card feeders which print and personalize plastic cards. We at way infotech solutions provide you the best quality card printers</p>
									<a href="<?php echo base_url()?>Pages/products/2" class="link-btn">Learn more</a>
								</div>
							</div>
						</div>
					</div>
					<div class="col-sm-8 show-on-scroll scroll-animate">
						<div class="service-block">
							<div class="service-front">
								<img src="<?php echo base_url(); ?>common/img/services/barcode-printer.webp" alt="Barcode Printer" class="service-img">
								<div class="service-head">
									<h1>Barcode Printer</h1>
								</div>
							</div>
							<div class="service-back">
								<div class="s-b-block">
									<h1>Barcode Printer</h1>
									<p>We at wayinfotech solutions provides you the best range of desktop barcode printers, black desktop printers, barcode printers with effective & timely delivery.</p>
									<a href="<?php echo base_url()?>Pages/products/1" class="link-btn">Learn more</a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-8">
						<div class="row">
							<div class="col-sm-6 show-on-scroll scroll-animate">
							<div class="service-block">
								<div class="service-front">
									<img src="<?php echo base_url(); ?>common/img/services/barcode-labels.webp" alt="Barcode Labels" class="service-img">
									<div class="service-head">
										<h1>Barcode Labels</h1>
									</div>
								</div>
								<div class="service-back">
									<div class="s-b-block">
										<h1>Barcode Labels</h1>
										<p>Pioneers in the industry, we offer colour barcode labels, direct thermal barcode labels, computers barcode labels, thermal barcode label, printer roll label and receipt printer from India.</p>
										<a href="<?php echo base_url()?>Pages/products/3" class="link-btn">Learn more</a>
									</div>
								</div>
							</div>
							</div>
							<div class="col-sm-6 show-on-scroll scroll-animate">
							<div class="service-block">
								<div class="service-front">
									<img src="<?php echo base_url(); ?>common/img/services/ribbons.webp" alt="Ribbons" class="service-img">
									<div class="service-head">
										<h1>Barcode Ribbons</h1>
									</div>
								</div>
								<div class="service-back">
									<div class="s-b-block">
										<h1>Barcode Ribbons</h1>
										<p>We at way infotech provides you the best quality ribbon material with low melting point ,high contrast and with high pigment density</p>
										<a href="<?php echo base_url()?>Pages/products/4" class="link-btn">Learn more</a>
									</div>
								</div>
							</div>
							</div>
							<div class="col-sm-6 show-on-scroll scroll-animate">
							<div class="service-block">
								<div class="service-front">
									<img src="<?php echo base_url(); ?>common/img/services/cash-drawer.webp" alt="Cash Drawer" class="service-img">
									<div class="service-head">
										<h1>Cash Drawer</h1>
									</div>
								</div>
								<div class="service-back">
									<div class="s-b-block">
										<h1>Cash Drawer</h1>
										<p>A cash drawer allows storage of checks, cash, coins, stamps, and other valuable items, providing crucial security and organization for your point of sale, POS, system.</p>
										<a href="<?php echo base_url()?>Pages/products/6" class="link-btn">Learn more</a>
									</div>
								</div>
							</div>
							</div>
							<div class="col-sm-6 show-on-scroll scroll-animate">
							<div class="service-block">
								<div class="service-front">
									<img src="<?php echo base_url(); ?>common/img/services/cash-register.webp" alt="Cash Register" class="service-img">
									<div class="service-head">
										<h1>Cash Register</h1>
									</div>
								</div>
								<div class="service-back">
									<div class="s-b-block">
										<h1>Cash Register</h1>
										<p>A modern cash register is usually attached to a printer that can print out receipts for record-keeping purposes.</p>
										<a href="#" class="link-btn">Learn more</a>
									</div>
								</div>
							</div>
							</div>
						</div>
					</div>
					<div class="col-sm-4 show-on-scroll scroll-animate">
						<div class="service-block e-com-service">
							<div class="service-front">
								<img src="<?php echo base_url(); ?>common/img/services/pos-machine.webp" alt="POS Machine" class="service-img">
								<div class="service-head">
									<h1>POS Machine</h1>
								</div>
							</div>
							<div class="service-back">
								<div class="s-b-block">
									<h1>POS Machine</h1>
									<p>A POS machine is the most advanced payment accepting machine. It accepts all kinds of credit and debit card payments and issues receipts along with maintaining transactions.</p>
									<a href="<?php echo base_url()?>Pages/products/5" class="link-btn">Learn more</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		
		</div>
	</section>

	<section class="stats-section">
		<div class="container">
			<div class="port-header stats-header">
				<h2>One spirit, one team, one win</h2>
				<span>An individual cannot perform all tasks on his own. He needs the support as well as the guidance of others to be excellent in whatever he does. Complex goals can easily be accomplished if individuals work together as a team.</span>
			</div>
			<div class="stats-body">
				<div class="s-block">
					<div class="stats-block-lvl stats-block-lvl-1">
						<div class="stats-box show-on-scroll scroll-animate">
							<h1>1000+</h1>
							<p>Products Delivered</p>
						</div>
					</div>
					<div class="stats-block-lvl stats-block-lvl-2">
						<div class="stats-box show-on-scroll scroll-animate">
							<h1>50+</h1>
							<p>Sales Executives under a Roof</p>
						</div>
						<div class="stats-box show-on-scroll scroll-animate">
							<h1>1000+</h1>
							<p>Satisfied Clients with big smile</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="clients-section">
		<div class="client-bg img-box">
			<img src="<?php echo base_url(); ?>common/img/client-phone-bg.png" alt="Clients">
		</div>
		<div class="container">
			<div class="port-header clients-header">
				<h2>Teamwork makes us win</h2>
				<span>The customer's perception is your reality.</span>
			</div>
			<div class="clients-body">
				<div class="row">
					<div class="col-sm-6 col-md-auto show-on-scroll scroll-animate">
						<ul class="cl-list">
							<li><div class="img-box"><img src="<?php echo base_url(); ?>common/img/clients/K-9-Club.webp" alt="Client"></div></li>
							<li><div class="img-box"><img src="<?php echo base_url(); ?>common/img/clients/kynhor.webp" alt="Client"></div></li>
							<li><div class="img-box"><img src="<?php echo base_url(); ?>common/img/clients/Agarwal Marketing.webp" alt="Client"></div></li>
						</ul>
					</div>
					<div class="col-sm-6 col-md-auto show-on-scroll scroll-animate">
						<ul class="cl-list">
							<li><div class="img-box"><img src="<?php echo base_url(); ?>common/img/clients/lugyimin-logo.webp" alt="Client"></div></li>
							<li><div class="img-box"><img src="<?php echo base_url(); ?>common/img/clients/logo1.webp" alt="Client"></div></li>
							<li><div class="img-box"><img src="<?php echo base_url(); ?>common/img/clients/logo2.webp" alt="Client"></div></li>
						</ul>
					</div>
					<div class="col-sm-6 col-md-auto show-on-scroll scroll-animate">
						<ul class="cl-list">
							<li><div class="img-box"><img src="<?php echo base_url(); ?>common/img/clients/logo3.webp" alt="Client"></div></li>
							<li><div class="img-box"><img src="<?php echo base_url(); ?>common/img/clients/logo5.webp" alt="Client"></div></li>
							<li><div class="img-box"><img src="<?php echo base_url(); ?>common/img/clients/logo6.webp" alt="Client"></div></li>
						</ul>
					</div>
					<div class="col-sm-6 col-md-auto show-on-scroll scroll-animate">
						<ul class="cl-list">
							<li><div class="img-box"><img src="<?php echo base_url(); ?>common/img/clients/logo8.webp" alt="Client"></div></li>
							<li><div class="img-box"><img src="<?php echo base_url(); ?>common/img/clients/logo9.webp" alt="Client"></div></li>
							<li><div class="img-box"><img src="<?php echo base_url(); ?>common/img/clients/logo10.webp" alt="Client"></div></li>
						</ul>
					</div>
					<div class="col-sm-6 col-md-auto show-on-scroll scroll-animate">
						<ul class="cl-list">
							<li><img src="<?php echo base_url(); ?>common/img/clients/logo11.webp" alt="Client"></li>
							<li><img src="<?php echo base_url(); ?>common/img/clients/logo12.webp" alt="Client"></li>
							<li><img src="<?php echo base_url(); ?>common/img/clients/logo13.webp" alt="Client"></li>
						</ul>
					</div>
					<div class="col-sm-6 col-md-auto show-on-scroll scroll-animate">
						<ul class="cl-list">
							<li><div class="img-box"></div><img src="<?php echo base_url(); ?>common/img/clients/logo14.webp" alt="Client"></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="location-add-section">
		<div class="container">
			<div class="l-ad-body">
				<ul class="nav l-ad-tabs" id="myTab" role="tablist">
					<li  role="presentation show-on-scroll scroll-animate">
					  <a id="Delhi-tab" data-bs-toggle="tab" href="#Delhi" role="tab" aria-controls="home" aria-selected="true">
						  <div class="l-ad-block">
							  <h1>Delhi</h1>
							  <p>137/ 13, Upper Ground Floor, A2 Block, West Sant Nagar, Burari, Delhi, 110084</p>
						  </div>
					  </a>
					</li>
					<li role="presentation show-on-scroll scroll-animate">
					  <a class="active" id="Noida-tab" data-bs-toggle="tab" href="#Noida" role="tab" aria-controls="home" aria-selected="true">
						  <div class="l-ad-block">
							  <h1>Noida</h1>
							  <p>1221, 12th Floor, Tower-B, The Ithum, Plot No: A 40, Sector 62 Road, Block B, Industrial Area, Sector 62, Noida, Uttar Pradesh 201301</p>
						  </div>
					  </a>
					</li>
				  </ul>
			</div>
		</div>
		<div class="l-ad-maps-body show-on-scroll scroll-animate">
			<div class="tab-content l-ad-content" id="l-ad-tabContent">
				<div class="tab-pane fade" id="Delhi" role="tabpanel" aria-labelledby="delhi-tab">
					<div class="l-ad-map-block">
						<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3498.299299145029!2d77.19449851456218!3d28.740479585938996!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390cfe2a06c1b55b%3A0x619cdca54c513ce0!2sWayinfotech%20Solutions%2C%20New%20Delhi!5e0!3m2!1sen!2sin!4v1612507833148!5m2!1sen!2sin" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
					</div>
				</div>
				<div class="tab-pane fade show active" id="Noida" role="tabpanel" aria-labelledby="noida-tab">
					<div class="l-ad-map-block">
						<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3502.113350696656!2d77.37004541455948!3d28.626364691112013!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390ce50616a12f2f%3A0x6858a842a1c23d3a!2sWAYINFOTECH%20SOLUTIONS!5e0!3m2!1sen!2sin!4v1612507718130!5m2!1sen!2sin" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
					</div>
				</div>
			  </div>
		</div>
	</section>
