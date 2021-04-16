<section class="products-hero-section service-hero-section">
		<div class="container">
			<div class="h-h-content-box">
				<div class="h-h-c-b-box">
					<div class="inner-page-head-box">
						<h1>Products</h1>
						<div class="page-bredcrumb-box">
							<ul>
								<li><a href="<?php echo base_url(); ?>">Home</a></li>
								<li><a href="<?php echo base_url(); ?>products">Products</a></li>
							</ul>
						</div>
					</div>
				</div>
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
								<h5>Category</h5>
						<ul class="category-list">
						<?php
						$cat_data=getcatname('category_details','id,category_name');
						foreach ($cat_data as $key => $value) {
						$sss=str_replace(' ', '', @$value->category_name);
						$ss=str_replace('&', '', @$sss);
						$cat_id = $value->id;
						?>
						<!--<li onclick="get_data_by_catID(<?php echo $value->id;?>)" id="cat">
						<input type="checkbox" name="category" id="category" value="<?php echo $value->id;?>" ><button <?php if($this->uri->segment(2)==$cat_id){echo 'class="active"';}?>>
						<?php echo $value->category_name;?>
						</button>
						</li>-->
						<li>
					<input type="checkbox" name="category" id="category" value="<?php echo $value->id;?>"/>
					<?php echo $value->category_name;?>
					</li>
						<?php } ?>
						</ul>
						</div>
						<div class="filter-block">
						<h5>Brands</h5>
						<ul class="category-list brands-list">
							<?php 
							foreach($indtype as $key=>$value){?>
							<!--<li onclick="getBrandID(<?php echo $value->id;?>)" >
							<input type="checkbox" name="brand" id="brand"  value="<?php echo $value->id;?>"><button>
							<?php echo $value->industrytype_title;?>
							</button>
							</li>-->
							<li>
							<input type="checkbox" name="brand" id="brand" value="<?php echo $value->id;?>"/>
							<?php echo $value->industrytype_title;?>
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
<div class="col-md-3 d-none d-md-block">
<div class="desk-filters">
<div class="filter-header">
<h1>Filters</h1>
</div>
<div class="filter-body">
<div class="filter-block">
	<h5>Category</h5>
	<ul class="category-list">
		<?php
			$cat_data=getcatname('category_details','id,category_name');
		    foreach ($cat_data as $key => $value) {
			$sss=str_replace(' ', '', @$value->category_name);
			$ss=str_replace('&', '', @$sss);
			$cat_id = $value->id;
		?>
		<li>
        <input type="checkbox" name="category" id="category" class="category" value="<?php echo $value->id;?>"/>
        <?php echo $value->category_name;?>
		</li>
		<?php } ?>
	</ul>
</div>
		<div class="filter-block">
			<h5>Brands</h5>
			<ul class="category-list brands-list">
				<?php 
				foreach($indtype as $key=>$value){?>
				<!--<li onclick="getBrandID(<?php echo $value->id;?>)">
					<input type="checkbox" name="brand" id="brand"  value="<?php echo $value->id;?>" ><button>
						<?php echo $value->industrytype_title;?>
					</button>
					
				</li>-->
				<li>
			<input type="checkbox" name="brand" id="brand" class="brand_id" value="b_<?php echo $value->id;?>"/>
			<?php echo $value->industrytype_title;?>
			</li>
				<?php } ?>
			</ul>
		</div>
		</div>
	</div>
</div>
<div class="col-md-9">
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
<div class="product-block" id="filter_result">
<?php 
if($this->uri->segment(2))
{
foreach($productData as $key=>$value){?>
<div class=" prod-item-box product-box education"> 
	<div class="img-box">
		<img src="<?php echo site_url(); ?>admin/upload/product_images/<?php echo $value->image;?>" alt="Product">
	</div>
	<div class="prod-mob-wrp">
		<h1><?php echo $value->product_name;?></h1>
		<table>
			<tr>
				<td>Print Resolution</td>
				<td>203 dpi/8 dots per mm</td>
			</tr>
			<tr>
				<td>Humidity:</td>
				<td>10-90 %</td>
			</tr>
		
		</table>
		<a href="<?php echo site_url(); ?>Pages/getProductDetails/<?php echo $value->id;?>" class="link-btn">Know More</a>
		<div class="prod-action">
			<button class="img-box" type="button" data-bs-toggle="modal" data-bs-target="#talk-modal">
				<img src="<?php echo base_url(); ?>common/img/f-btn-icon.svg" alt="">
			</button>
			 <input type="hidden" id="c_id_<?php echo $value->id;?>" value="<?php echo $value->id;?>">
		</div>
	</div>
</div>
							
<?php } } else { ?>
							
	<?php 
	foreach($rows as $key=>$value){?>
	<div class=" prod-item-box product-box education"> 
		<div class="img-box">
			<img src="<?php echo site_url(); ?>admin/upload/product_images/<?php echo $value['image'];?>" alt="Product">
		</div>
		<div class="prod-mob-wrp">
			<h1><?php echo $value['product_name'];?></h1>
			<table>
				<tr>
					<td>Print Resolution</td>
					<td>203 dpi/8 dots per mm</td>
				</tr>
				<tr>
					<td>Humidity:</td>
					<td>10-90 %</td>
				</tr>
			</table>
			<a href="<?php echo site_url(); ?>Pages/getProductDetails/<?php echo $value['id'];?>" class="link-btn">Know More</a>
			<div class="prod-action">
				<button class="img-box" type="button" data-bs-toggle="modal" data-bs-target="#talk-modal">
					<img src="<?php echo base_url(); ?>common/img/f-btn-icon.svg" alt="">
				</button>
			</div>
		</div>
	</div>
<?php } } ?>
		</div>
	</div>
</div>
</div>
</div>
</section>
<section class="products-slider-section">
<div class="container">
<h2>Popular Products</h2>
<div class="owl-carousel owl-theme pop-prod-owl">
	<?php 
foreach($rows_by_industry as $key=>$value){?>
	<div class="item pop-prod-item">
		<div class="prod-item-box">
			<div class="prod-action">
				<button type="button" data-bs-toggle="modal" data-bs-target="#talk-modal">
					<img src="<?php echo site_url(); ?>common/img/f-btn-icon.svg" alt="">
				</button>
			</div>
			<div class="img-box">
				<img src="<?php echo site_url(); ?>admin/upload/product_images/<?php echo $value['image'];?>" alt="Product">
			</div>
			<h1><?php echo $value['product_name'];?></h1>
			
			<a href="<?php echo site_url(); ?>Pages/getProductDetails/<?php echo $value['id'];?>" class="link-btn"> Know More </a>
		</div>
	</div>
<?php } ?>
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
	<!-- Talk Section ========================================================= -->
	<div class="modal talk-modal show" id="talk-modal" tabindex="-1" aria-labelledby="talk-modal" aria-hidden="true">
		<div class="modal-dialog">
		  <div class="modal-content">
			  <div class="talk-popup-modal">
				<button type="button" class="close-btn" data-bs-dismiss="modal" aria-label="Close">X</button>
				  <div class="row">
					<div class="col-sm-6 col-lg-8 order-sm-2">
						<div class="talk-popup-body">
							<form action="" class="t-t-u-form">
								<div class="row">
									<div class="col-md-6">
									  <div class="form-group">
										  <input type="text" placeholder="Name*">
									  </div>
								  </div>
									<div class="col-md-6">
									  <div class="form-group">
										  <div class="country-p-block">
											  <div class="c-s-select">
												<select name="countryCode" id="countryCode">
													<option data-countryCode="MN" value="95"> +95 Myanmar</option>
													<option data-countryCode="IN" value="91"> +91 India</option>
													<optgroup label="Other countries">
													<option data-countryCode="DZ" value="213"> +213 Algeria </option>
													<option data-countryCode="AD" value="376">+376 Andorra</option>
													<option data-countryCode="AO" value="244">+244 Angola</option>
													<option data-countryCode="AI" value="1264">+1264 Anguilla</option>
													<option data-countryCode="AG" value="1268">+1268 Antigua &amp; Barbuda</option>
													<option data-countryCode="AR" value="54">+54 Argentina</option>
													<option data-countryCode="AM" value="374">+374 Armenia</option>
													<option data-countryCode="AW" value="297">+297 Aruba</option>
													<option data-countryCode="AU" value="61">+61 Australia</option>
													<option data-countryCode="AT" value="43">+43 Austria</option>
													<option data-countryCode="AZ" value="994">+994 Azerbaijan</option>
													<option data-countryCode="BS" value="1242">+1242 Bahamas</option>
													<option data-countryCode="BH" value="973">+973 Bahrain</option>
													<option data-countryCode="BD" value="880">+880 Bangladesh</option>
													<option data-countryCode="BB" value="1246">+1246 Barbados</option>
													<option data-countryCode="BY" value="375">+375 Belarus</option>
													<option data-countryCode="BE" value="32">+32 Belgium</option>
													<option data-countryCode="BZ" value="501">+501 Belize</option>
													<option data-countryCode="BJ" value="229">+229 Benin</option>
													<option data-countryCode="BM" value="1441">+1441 Bermuda</option>
													<option data-countryCode="BT" value="975">+975 Bhutan</option>
													<option data-countryCode="BO" value="591">+591 Bolivia</option>
													<option data-countryCode="BA" value="387">+387 Bosnia Herzegovina</option>
													<option data-countryCode="BW" value="267">+267 Botswana</option>
													<option data-countryCode="BR" value="55">+55 Brazil</option>
													<option data-countryCode="BN" value="673">+673 Brunei</option>
													<option data-countryCode="BG" value="359">+359 Bulgaria</option>
													<option data-countryCode="BF" value="226">+226 Burkina Faso</option>
													<option data-countryCode="BI" value="257">+257 Burundi</option>
													<option data-countryCode="KH" value="855">+855 Cambodia</option>
													<option data-countryCode="CM" value="237">+237 Cameroon</option>
													<option data-countryCode="CA" value="1">+1 Canada</option>
													<option data-countryCode="CV" value="238">+238 Cape Verde Islands</option>
													<option data-countryCode="KY" value="1345">+1345 Cayman Islands</option>
													<option data-countryCode="CF" value="236">+236 Central African Republic</option>
													<option data-countryCode="CL" value="56">+56 Chile</option>
													<option data-countryCode="CN" value="86">+86 China</option>
													<option data-countryCode="CO" value="57">+57 Colombia</option>
													<option data-countryCode="KM" value="269">+269 Comoros</option>
													<option data-countryCode="CG" value="242">+242 Congo</option>
													<option data-countryCode="CK" value="682">+682 Cook Islands</option>
													<option data-countryCode="CR" value="506">+506 Costa Rica</option>
													<option data-countryCode="HR" value="385">+385 Croatia</option>
													<option data-countryCode="CU" value="53">+53 Cuba</option>
													<option data-countryCode="CY" value="90392">+90392 Cyprus North</option>
													<option data-countryCode="CY" value="357">+357 Cyprus South</option>
													<option data-countryCode="CZ" value="42">+42 Czech Republic</option>
													<option data-countryCode="DK" value="45">+45 Denmark</option>
													<option data-countryCode="DJ" value="253">+253 Djibouti</option>
													<option data-countryCode="DM" value="1809">+1809 Dominica</option>
													<option data-countryCode="DO" value="1809">+1809 Dominican Republic</option>
													<option data-countryCode="EC" value="593">+593 Ecuador</option>
													<option data-countryCode="EG" value="20">+20 Egypt</option>
													<option data-countryCode="SV" value="503">+503 El Salvador</option>
													<option data-countryCode="GQ" value="240">+240 Equatorial Guinea</option>
													<option data-countryCode="ER" value="291">+291 Eritrea</option>
													<option data-countryCode="EE" value="372">+372 Estonia</option>
													<option data-countryCode="ET" value="251">+251 Ethiopia</option>
													<option data-countryCode="FK" value="500">+500 Falkland Islands</option>
													<option data-countryCode="FO" value="298">+298 Faroe Islands</option>
													<option data-countryCode="FJ" value="679">+679 Fiji</option>
													<option data-countryCode="FI" value="358">+358 Finland</option>
													<option data-countryCode="FR" value="33">+33 France</option>
													<option data-countryCode="GF" value="594">+594 French Guiana</option>
													<option data-countryCode="PF" value="689">+689 French Polynesia</option>
													<option data-countryCode="GA" value="241">+241 Gabon</option>
													<option data-countryCode="GM" value="220">+220 Gambia</option>
													<option data-countryCode="GE" value="7880">+7880 Georgia</option>
													<option data-countryCode="DE" value="49">+49 Germany</option>
													<option data-countryCode="GH" value="233">+233 Ghana</option>
													<option data-countryCode="GI" value="350">+350 Gibraltar</option>
													<option data-countryCode="GR" value="30">+30 Greece</option>
													<option data-countryCode="GL" value="299">+299 Greenland</option>
													<option data-countryCode="GD" value="1473">+1473 Grenada</option>
													<option data-countryCode="GP" value="590">+590 Guadeloupe</option>
													<option data-countryCode="GU" value="671">+671 Guam</option>
													<option data-countryCode="GT" value="502">+502 Guatemala</option>
													<option data-countryCode="GN" value="224">+224 Guinea</option>
													<option data-countryCode="GW" value="245">+245 Guinea - Bissau</option>
													<option data-countryCode="GY" value="592">+592 Guyana</option>
													<option data-countryCode="HT" value="509">+509 Haiti</option>
													<option data-countryCode="HN" value="504">+504 Honduras</option>
													<option data-countryCode="HK" value="852">+852 Hong Kong</option>
													<option data-countryCode="HU" value="36">+36 Hungary</option>
													<option data-countryCode="IS" value="354">+354 Iceland</option>
													<option data-countryCode="IN" value="91">+91 India</option>
													<option data-countryCode="ID" value="62">+62 Indonesia</option>
													<option data-countryCode="IR" value="98">+98 Iran</option>
													<option data-countryCode="IQ" value="964">+964 Iraq</option>
													<option data-countryCode="IE" value="353">+353 Ireland</option>
													<option data-countryCode="IL" value="972">+972 Israel</option>
													<option data-countryCode="IT" value="39">+39 Italy</option>
													<option data-countryCode="JM" value="1876">+1876 Jamaica</option>
													<option data-countryCode="JP" value="81">+81 Japan</option>
													<option data-countryCode="JO" value="962">+962 Jordan</option>
													<option data-countryCode="KZ" value="7">+7 Kazakhstan</option>
													<option data-countryCode="KE" value="254">+254 Kenya</option>
													<option data-countryCode="KI" value="686">+686 Kiribati</option>
													<option data-countryCode="KP" value="850">+850 Korea North</option>
													<option data-countryCode="KR" value="82">+82 Korea South</option>
													<option data-countryCode="KW" value="965">+965 Kuwait</option>
													<option data-countryCode="KG" value="996">+996 Kyrgyzstan</option>
													<option data-countryCode="LA" value="856">+856 Laos</option>
													<option data-countryCode="LV" value="371">+371 Latvia</option>
													<option data-countryCode="LB" value="961">+961 Lebanon</option>
													<option data-countryCode="LS" value="266">+266 Lesotho</option>
													<option data-countryCode="LR" value="231">+231 Liberia</option>
													<option data-countryCode="LY" value="218">+218 Libya</option>
													<option data-countryCode="LI" value="417">+417 Liechtenstein</option>
													<option data-countryCode="LT" value="370">+370 Lithuania</option>
													<option data-countryCode="LU" value="352">+352 Luxembourg</option>
													<option data-countryCode="MO" value="853">+853 Macao</option>
													<option data-countryCode="MK" value="389">+389 Macedonia</option>
													<option data-countryCode="MG" value="261">+261 Madagascar</option>
													<option data-countryCode="MW" value="265">+265 Malawi</option>
													<option data-countryCode="MY" value="60">+60 Malaysia</option>
													<option data-countryCode="MV" value="960">+960 Maldives</option>
													<option data-countryCode="ML" value="223">+223 Mali</option>
													<option data-countryCode="MT" value="356">+356 Malta</option>
													<option data-countryCode="MH" value="692">+692 Marshall Islands</option>
													<option data-countryCode="MQ" value="596">+596 Martinique</option>
													<option data-countryCode="MR" value="222">+222 Mauritania</option>
													<option data-countryCode="YT" value="269">+269 Mayotte</option>
													<option data-countryCode="MX" value="52">+52 Mexico</option>
													<option data-countryCode="FM" value="691">+691 Micronesia</option>
													<option data-countryCode="MD" value="373">+373 Moldova</option>
													<option data-countryCode="MC" value="377">+377 Monaco</option>
													<option data-countryCode="MN" value="976">+976 Mongolia</option>
													<option data-countryCode="MS" value="1664">+1664 Montserrat</option>
													<option data-countryCode="MA" value="212">+212 Morocco</option>
													<option data-countryCode="MZ" value="258">+258 Mozambique</option>
													<option data-countryCode="MN" value="95">+95 Myanmar</option>
													<option data-countryCode="NA" value="264">+264 Namibia</option>
													<option data-countryCode="NR" value="674">+674 Nauru</option>
													<option data-countryCode="NP" value="977">+977 Nepal</option>
													<option data-countryCode="NL" value="31">+31 Netherlands</option>
													<option data-countryCode="NC" value="687">+687 New Caledonia</option>
													<option data-countryCode="NZ" value="64">+64 New Zealand</option>
													<option data-countryCode="NI" value="505">+505 Nicaragua</option>
													<option data-countryCode="NE" value="227">+227 Niger</option>
													<option data-countryCode="NG" value="234">+234 Nigeria</option>
													<option data-countryCode="NU" value="683">+683 Niue</option>
													<option data-countryCode="NF" value="672">+672 Norfolk Islands</option>
													<option data-countryCode="NP" value="670">+670 Northern Marianas</option>
													<option data-countryCode="NO" value="47">+47 Norway</option>
													<option data-countryCode="OM" value="968">+968 Oman</option>
													<option data-countryCode="PW" value="680">+680 Palau</option>
													<option data-countryCode="PA" value="507">+507 Panama</option>
													<option data-countryCode="PG" value="675">+675 Papua New Guinea</option>
													<option data-countryCode="PY" value="595">+595 Paraguay</option>
													<option data-countryCode="PE" value="51">+51 Peru</option>
													<option data-countryCode="PH" value="63">+63 Philippines</option>
													<option data-countryCode="PL" value="48">+48 Poland</option>
													<option data-countryCode="PT" value="351">+351 Portugal</option>
													<option data-countryCode="PR" value="1787">+1787 Puerto Rico</option>
													<option data-countryCode="QA" value="974">+974 Qatar</option>
													<option data-countryCode="RE" value="262">+262 Reunion</option>
													<option data-countryCode="RO" value="40">+40 Romania</option>
													<option data-countryCode="RU" value="7">+7 Russia</option>
													<option data-countryCode="RW" value="250">+250 Rwanda</option>
													<option data-countryCode="SM" value="378">+378 San Marino</option>
													<option data-countryCode="ST" value="239">+239 Sao Tome &amp; Principe</option>
													<option data-countryCode="SA" value="966">+966 Saudi Arabia</option>
													<option data-countryCode="SN" value="221">+221 Senegal</option>
													<option data-countryCode="CS" value="381">+381 Serbia</option>
													<option data-countryCode="SC" value="248">+248 Seychelles</option>
													<option data-countryCode="SL" value="232">+232 Sierra Leone</option>
													<option data-countryCode="SG" value="65">+65 Singapore</option>
													<option data-countryCode="SK" value="421">+421 Slovak Republic</option>
													<option data-countryCode="SI" value="386">+386 Slovenia</option>
													<option data-countryCode="SB" value="677">+677 Solomon Islands</option>
													<option data-countryCode="SO" value="252">+252 Somalia</option>
													<option data-countryCode="ZA" value="27">+27 South Africa</option>
													<option data-countryCode="ES" value="34">+34 Spain</option>
													<option data-countryCode="LK" value="94">+94 Sri Lanka</option>
													<option data-countryCode="SH" value="290">+290 St. Helena</option>
													<option data-countryCode="KN" value="1869">+1869 St. Kitts</option>
													<option data-countryCode="SC" value="1758">+1758 St. Lucia</option>
													<option data-countryCode="SD" value="249">+249 Sudan</option>
													<option data-countryCode="SR" value="597">+597 Suriname</option>
													<option data-countryCode="SZ" value="268">+268 Swaziland</option>
													<option data-countryCode="SE" value="46">+46 Sweden</option>
													<option data-countryCode="CH" value="41">+41 Switzerland</option>
													<option data-countryCode="SI" value="963">+963 Syria</option>
													<option data-countryCode="TW" value="886">+886 Taiwan</option>
													<option data-countryCode="TJ" value="7">+7 Tajikstan</option>
													<option data-countryCode="TH" value="66">+66 Thailand</option>
													<option data-countryCode="TG" value="228">+228 Togo</option>
													<option data-countryCode="TO" value="676">+676 Tonga</option>
													<option data-countryCode="TT" value="1868">+1868 Trinidad &amp; Tobago</option>
													<option data-countryCode="TN" value="216">+216 Tunisia</option>
													<option data-countryCode="TR" value="90">+90 Turkey</option>
													<option data-countryCode="TM" value="7">+7 Turkmenistan</option>
													<option data-countryCode="TM" value="993">+993 Turkmenistan</option>
													<option data-countryCode="TC" value="1649">+1649 Turks &amp; Caicos Islands</option>
													<option data-countryCode="TV" value="688">+688 Tuvalu</option>
													<option data-countryCode="UG" value="256">+256 Uganda</option>
													<!-- <option data-countryCode="GB" value="44">UK 4)</ (ption> -->
													<option data-countryCode="UA" value="380">+380 Ukraine</option>
													<option data-countryCode="AE" value="971">+971 United Arab Emirates</option>
													<option data-countryCode="UY" value="598">+598 Uruguay</option>
													<!-- <option data-countryCode="US" value="1">USA1)</ (ption> -->
													<option data-countryCode="UZ" value="7">+7 Uzbekistan</option>
													<option data-countryCode="VU" value="678">+678 Vanuatu</option>
													<option data-countryCode="VA" value="379">+379 Vatican City</option>
													<option data-countryCode="VE" value="58">+58 Venezuela</option>
													<option data-countryCode="VN" value="84">+84 Vietnam</option>
													<option data-countryCode="VG" value="84">+1284 Virgin Islands - British</option>
													<option data-countryCode="VI" value="84">+1340 Virgin Islands - US</option>
													<option data-countryCode="WF" value="681">+681 Wallis &amp; Futuna</option>
													<option data-countryCode="YE" value="969">+969 Yemen Nort</option>
													<option data-countryCode="YE" value="967">+967 Yemen Sout</option>
													<option data-countryCode="ZM" value="260">+260 Zambia</option>
													<option data-countryCode="ZW" value="263">+263 Zimbabwe</option>
													</optgroup>
												</select>
											  </div>
											<input type="text" placeholder="Contact Number*">
										  </div>
									  </div>
								  </div>
									<div class="col-md-6">
									  <div class="form-group">
										  <input type="text" placeholder="Email ID*">
									  </div>
								  </div>
									<div class="col-md-6">
									  <div class="form-group">
										  <input type="text" placeholder="Country Name">
									  </div>
								  </div>
									<div class="col-md-12">
									  <div class="form-group">
										  <textarea name="details" id="" cols="30" rows="4" placeholder="Query in details"></textarea>
									  </div>
								  </div>
									<div class="col-md-12">
									  <div class="form-group">
										  <button class="primary-btn">Submit</button>
									  </div>
								  </div>
								</div>
							</form>
						</div>
					</div>
					  <div class="col-sm-6 col-lg-4 order-sm-1">
						  <div class="talk-popup-body">
							  <div class="t-p-c-block">
								  <label for="">Call Us</label>
								  <div class="t-p-c-box">
									  <div class="img-box">
										  <img src="./img/f-btn-icon.svg" alt="Call">
									  </div>
									  <div class="t-p-c-multi-opt">
										<a href="tel:911206618193">+91-120-6618193</a>
										<a href="tel:911206618193">+91-120-6618193</a>
									  </div>
								  </div>
							  </div>
							  <div class="t-p-c-block">
								  <label for="">Drop Us an Email</label>
								  <div class="t-p-c-box">
									  <div class="img-box">
										  <img src="./img/services-icons/email.svg" alt="Call">
									  </div>
									  <div class="t-p-c-multi-opt">
										<a href="mailto:amrit@wayinfotechsolutions.com">amrit@wayinfotechsolutions.com</a>
										<a href="mailto:atish@wayinfotechsolutions.com">atish@wayinfotechsolutions.com</a>
									  </div>
								  </div>
							  </div>
							  <div class="t-p-c-block">
								  <label for="">Skype Us</label>
								  <div class="t-p-c-box">
									  <div class="img-box">
										  <img src="./img/skype-logo.svg" alt="Skype">
									  </div>
									  <div class="t-p-c-multi-opt">
										<a href="href=skype:amrit@wayinfotechsolutions.com?call">amrit@wayinfotechsolutions.com</a>
									  </div>
								  </div>
							  </div>
						  </div>
					  </div>
				  </div>
			  </div>
		  </div>
		</div>
	  </div>
	<section class="talk-section show-on-scroll scroll-animate">
	  <div class="bg-heading">
		<h1>Got A Query?</h1>
	  </div>
		<div class="container">
			<div class="talk-body">
				<div class="talk-text-block">
					<p>If you have a new project that you wish to discuss or would like to visit our
						agency, please provide us your details. </p>
					<p>
						We'd love to see you,
						<span>
							a cup of Darjeeling Tea &
							a chat can take you a long way.
						</span>
					</p>
				</div>
				<button type="button" class="talk-btn" data-bs-toggle="modal" data-bs-target="#talk-modal">Let's Talk!</button>
			</div>
		</div>
	</section>
	<!-- End Talk Section ===================================================== -->

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
<script>
 $(document).ready(function () {
	 $('input').on('click', function(){
	  var catg = [];
	   $('input:checked').each(function() {
		   catg.push($(this).val());
	   });
	  var cat_idsobj=Object.assign({}, catg);
	   $.ajax({
			url: "<?php echo base_url();?>" + 'Pages/ajaxProduct',
			type: 'POST',
			data: {catdata:cat_idsobj},
			success: function(result) {
			   //alert(result);
			   $("#filter_result").html(result);
			}
		})
	  });
  });
</script> 
 <script type="text/javascript">
                           $(document).ready(function (e) {
							   e.preventDefault();
                             $('.brand_id').on('click', function(){
								 
							 var catg = [];
                              $('input:checked').each(function() {
                                   catg.push($(this).val());
                               });
                              var cat_idsobj=Object.assign({}, catg);
                           //console.log(cat_idsobj);
                            $.ajax({
                                    url: "<?php echo base_url();?>" + 'Pages/ajaxProduct',
                                    type: 'POST',
                                    data: {catbrand:cat_idsobj},
                                    success: function(result) {
                                       //alert(result);
                                       $("#filter_result").html(result);
                                    }
                                })
                              });
                          });
                    </script>                 	
