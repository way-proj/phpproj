<!--==============JS==============-->
<!-- JavaScript Bundle with Popper -->
<!--<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
<!--==============Owl Carousal JS==============-->
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>-->

<script src="<?php echo base_url(); ?>common/js/owl.carousel.min.js"></script>

<!--==============Custom JS==============-->
<script src="<?php echo base_url(); ?>common/js/custom.js"></script>
<section class="footer-section">
		<div class="container">
			<div class="row">
				<div class="col-sm-5 show-on-scroll scroll-animate">
					<div class="f-brand-container">
						<div class="img-box">
							<img src="<?php echo base_url(); ?>common/img/brand.png" alt="Wayinfotech Solutions">
						</div>
						<p><span>Wayinfotech Solutions</span>is a company that provides a comprehensive IT solution for your business.</p>
					</div>
				</div>
				<div class="col-sm-7 show-on-scroll scroll-animate">
					<div class="row">
						<div class="col-6 col-sm-8 show-on-scroll scroll-animate">
							<div class="f-menu-container">
								<a href="<?php echo base_url(); ?>products"><h2>Products</h2></a>
								<ul class="f-menu-list">
						    	    <?php
    						    	$cat_data=getcatname('category_details','id,category_name');
    							    foreach ($cat_data as $key => $value) {
    								$sss=str_replace(' ', '', $value->category_name);
    								$ss=str_replace('&', '', $sss);
								    ?> 
									<li>
									<a href="<?php echo base_url(); ?>Pages/products/<?php echo $value->id;?>">
											<?php echo $value->category_name;?>
										</a>
									</li>
								<?php } ?>	
								</ul>
							</div>
						</div>
						<div class="col-12 col-sm-4 show-on-scroll scroll-animate">
							<div class="f-menu-container">
								<a href="javascipt:void(0);"><h2>Connect</h2></a>
								<ul class="f-menu-list f-con-list">
									<li>
										<a href="https://www.linkedin.com/company/wayinfotech-solutions/" target="_blank">
											Linked In
										</a>
									</li>
									<li>
									<a href="https://www.facebook.com/wayinfotechsolutions/" target="_blank">
											Facebook
										</a>
									</li>
									<li>
									<a href="https://twitter.com/WayinfotechS" target="_blank">
											Twitter
										</a>
									</li>
									<li>
									<a href="https://www.instagram.com/wayinfotechsolution/" target="_blank">
											Instagram
										</a>
									</li>
									<li>
									<a href="https://www.youtube.com/channel/UCNqPG5nq1CKaEBHmjAtZ8tg" target="_blank">
											Youtube
										</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-9 order-sm-2 show-on-scroll scroll-animate">
					<div class="f-menu-container">
						<ul class="f-menu-list f-menu-inline-list">
							<li>
								<a href="<?php echo base_url(); ?>">
									Blog                                        
								</a>
							</li>
							<li>
								<a href="<?php echo base_url(); ?>">
									Press
								</a>
							</li>
							<li>
								<a href="<?php echo base_url(); ?>">
									Gallery
								</a>
							</li>
							<li>
								<a href="<?php echo base_url(); ?>">
									Careers
								</a>
							</li>
							<li>
								<a href="<?php echo base_url(); ?>">
									Sitemap
								</a>
							</li>
						</ul>
					</div>
				</div>
				<div class="col-sm-3 order-sm-1 show-on-scroll scroll-animate">
					<div class="f-copy-container">
						© 2020 – Wayinfotech Solutions <span>All Rights Reserved</span> 
					</div>
				</div>
			</div>
		</div>
	</section>
</body>
</html>

	<!-- Talk Section ========================================================= -->
	<div class="modal talk-modal" id="talk-modal" tabindex="-1" aria-labelledby="talk-modal" aria-hidden="true">
		<div class="modal-dialog">
		  <div class="modal-content">
			  <div class="talk-popup-modal">
				<button type="button" class="close-btn" data-bs-dismiss="modal" aria-label="Close">X</button>
				  <div class="row">
					  <div class="col-sm-6 col-lg-4">
						  <div class="talk-popup-body">
							  <div class="t-p-c-block">
								  <label for="">Call Us</label>
								  <div class="t-p-c-box">
									  <div class="img-box">
										  <img src="<?php echo base_url()?>common/img/f-btn-icon.svg" alt="Call">
									  </div>
									  <div class="t-p-c-multi-opt">
										<a href="tel:911206618193">+91-120-6618193</a>
									  </div>
								  </div>
							  </div>
							  <div class="t-p-c-block">
								  <label for="">Drop Us an Email</label>
								  <div class="t-p-c-box">
									  <div class="img-box">
										  <img src="<?php echo base_url()?>common/img/services-icons/email.svg" alt="Call">
									  </div>
									  <div class="t-p-c-multi-opt">
										<a href="mailto:amrit@wayinfotechsolutions.com">amrit@wayinfotechsolutions.com</a>
										<a href="mailto:atish@wayinfotechsolutions.com">atish@wayinfotechsolutions.com</a>
									  </div>
								  </div>
							  </div>
						  </div>
					  </div>
					  <div class="col-sm-6 col-lg-8">
					      
						  <div class="talk-popup-body">
						  <div id="msg_success"></div>
							   <form id="contactUs" name="contactUs" method="post" class="t-t-u-form" autocomplete="off">
								     <div class="row">
									  <div class="col-md-12">
										<div class="form-group">
											
											<input  placeholder="Name" type="text" onchange="get_contact_info()"   name="first_name" id="first_name" >

											<div id="error_firstname"></div>
										</div>
									    </div>
									    
									  <div class="col-md-6">
									  <div class="form-group">
										  <div class="country-p-block">
											  <div class="c-s-select">
												<select name="countryCode" id="countryCode">
													<option countryCode="IN" value="91"> +91 India</option>
													<option countryCode="AE" value="971">+971 United Arab Emirates</option>
													<optgroup label="Other countries">
													<option countryCode="DZ" value="213"> +213 Algeria </option>
													<option countryCode="AD" value="376">+376 Andorra</option>
													<option countryCode="AO" value="244">+244 Angola</option>
													<option countryCode="AI" value="1264">+1264 Anguilla</option>
													<option countryCode="AG" value="1268">+1268 Antigua &amp; Barbuda</option>
													<option countryCode="AR" value="54">+54 Argentina</option>
													<option countryCode="AM" value="374">+374 Armenia</option>
													<option countryCode="AW" value="297">+297 Aruba</option>
													<option countryCode="AU" value="61">+61 Australia</option>
													<option countryCode="AT" value="43">+43 Austria</option>
													<option countryCode="AZ" value="994">+994 Azerbaijan</option>
													<option countryCode="BS" value="1242">+1242 Bahamas</option>
													<option countryCode="BH" value="973">+973 Bahrain</option>
													<option countryCode="BD" value="880">+880 Bangladesh</option>
													<option countryCode="BB" value="1246">+1246 Barbados</option>
													<option countryCode="BY" value="375">+375 Belarus</option>
													<option countryCode="BE" value="32">+32 Belgium</option>
													<option countryCode="BZ" value="501">+501 Belize</option>
													<option countryCode="BJ" value="229">+229 Benin</option>
													<option countryCode="BM" value="1441">+1441 Bermuda</option>
													<option countryCode="BT" value="975">+975 Bhutan</option>
													<option countryCode="BO" value="591">+591 Bolivia</option>
													<option countryCode="BA" value="387">+387 Bosnia Herzegovina</option>
													<option countryCode="BW" value="267">+267 Botswana</option>
													<option countryCode="BR" value="55">+55 Brazil</option>
													<option countryCode="BN" value="673">+673 Brunei</option>
													<option countryCode="BG" value="359">+359 Bulgaria</option>
													<option countryCode="BF" value="226">+226 Burkina Faso</option>
													<option countryCode="BI" value="257">+257 Burundi</option>
													<option countryCode="KH" value="855">+855 Cambodia</option>
													<option countryCode="CM" value="237">+237 Cameroon</option>
													<option countryCode="CA" value="1">+1 Canada</option>
													<option countryCode="CV" value="238">+238 Cape Verde Islands</option>
													<option countryCode="KY" value="1345">+1345 Cayman Islands</option>
													<option countryCode="CF" value="236">+236 Central African Republic</option>
													<option countryCode="CL" value="56">+56 Chile</option>
													<option countryCode="CN" value="86">+86 China</option>
													<option countryCode="CO" value="57">+57 Colombia</option>
													<option countryCode="KM" value="269">+269 Comoros</option>
													<option countryCode="CG" value="242">+242 Congo</option>
													<option countryCode="CK" value="682">+682 Cook Islands</option>
													<option countryCode="CR" value="506">+506 Costa Rica</option>
													<option countryCode="HR" value="385">+385 Croatia</option>
													<option countryCode="CU" value="53">+53 Cuba</option>
													<option countryCode="CY" value="90392">+90392 Cyprus North</option>
													<option countryCode="CY" value="357">+357 Cyprus South</option>
													<option countryCode="CZ" value="42">+42 Czech Republic</option>
													<option countryCode="DK" value="45">+45 Denmark</option>
													<option countryCode="DJ" value="253">+253 Djibouti</option>
													<option countryCode="DM" value="1809">+1809 Dominica</option>
													<option countryCode="DO" value="1809">+1809 Dominican Republic</option>
													<option countryCode="EC" value="593">+593 Ecuador</option>
													<option countryCode="EG" value="20">+20 Egypt</option>
													<option countryCode="SV" value="503">+503 El Salvador</option>
													<option countryCode="GQ" value="240">+240 Equatorial Guinea</option>
													<option countryCode="ER" value="291">+291 Eritrea</option>
													<option countryCode="EE" value="372">+372 Estonia</option>
													<option countryCode="ET" value="251">+251 Ethiopia</option>
													<option countryCode="FK" value="500">+500 Falkland Islands</option>
													<option countryCode="FO" value="298">+298 Faroe Islands</option>
													<option countryCode="FJ" value="679">+679 Fiji</option>
													<option countryCode="FI" value="358">+358 Finland</option>
													<option countryCode="FR" value="33">+33 France</option>
													<option countryCode="GF" value="594">+594 French Guiana</option>
													<option countryCode="PF" value="689">+689 French Polynesia</option>
													<option countryCode="GA" value="241">+241 Gabon</option>
													<option countryCode="GM" value="220">+220 Gambia</option>
													<option countryCode="GE" value="7880">+7880 Georgia</option>
													<option countryCode="DE" value="49">+49 Germany</option>
													<option countryCode="GH" value="233">+233 Ghana</option>
													<option countryCode="GI" value="350">+350 Gibraltar</option>
													<option countryCode="GR" value="30">+30 Greece</option>
													<option countryCode="GL" value="299">+299 Greenland</option>
													<option countryCode="GD" value="1473">+1473 Grenada</option>
													<option countryCode="GP" value="590">+590 Guadeloupe</option>
													<option countryCode="GU" value="671">+671 Guam</option>
													<option countryCode="GT" value="502">+502 Guatemala</option>
													<option countryCode="GN" value="224">+224 Guinea</option>
													<option countryCode="GW" value="245">+245 Guinea - Bissau</option>
													<option countryCode="GY" value="592">+592 Guyana</option>
													<option countryCode="HT" value="509">+509 Haiti</option>
													<option countryCode="HN" value="504">+504 Honduras</option>
													<option countryCode="HK" value="852">+852 Hong Kong</option>
													<option countryCode="HU" value="36">+36 Hungary</option>
													<option countryCode="IS" value="354">+354 Iceland</option>
													<option countryCode="IN" value="91">+91 India</option>
													<option countryCode="ID" value="62">+62 Indonesia</option>
													<option countryCode="IR" value="98">+98 Iran</option>
													<option countryCode="IQ" value="964">+964 Iraq</option>
													<option countryCode="IE" value="353">+353 Ireland</option>
													<option countryCode="IL" value="972">+972 Israel</option>
													<option countryCode="IT" value="39">+39 Italy</option>
													<option countryCode="JM" value="1876">+1876 Jamaica</option>
													<option countryCode="JP" value="81">+81 Japan</option>
													<option countryCode="JO" value="962">+962 Jordan</option>
													<option countryCode="KZ" value="7">+7 Kazakhstan</option>
													<option countryCode="KE" value="254">+254 Kenya</option>
													<option countryCode="KI" value="686">+686 Kiribati</option>
													<option countryCode="KP" value="850">+850 Korea North</option>
													<option countryCode="KR" value="82">+82 Korea South</option>
													<option countryCode="KW" value="965">+965 Kuwait</option>
													<option countryCode="KG" value="996">+996 Kyrgyzstan</option>
													<option countryCode="LA" value="856">+856 Laos</option>
													<option countryCode="LV" value="371">+371 Latvia</option>
													<option countryCode="LB" value="961">+961 Lebanon</option>
													<option countryCode="LS" value="266">+266 Lesotho</option>
													<option countryCode="LR" value="231">+231 Liberia</option>
													<option countryCode="LY" value="218">+218 Libya</option>
													<option countryCode="LI" value="417">+417 Liechtenstein</option>
													<option countryCode="LT" value="370">+370 Lithuania</option>
													<option countryCode="LU" value="352">+352 Luxembourg</option>
													<option countryCode="MO" value="853">+853 Macao</option>
													<option countryCode="MK" value="389">+389 Macedonia</option>
													<option countryCode="MG" value="261">+261 Madagascar</option>
													<option countryCode="MW" value="265">+265 Malawi</option>
													<option countryCode="MY" value="60">+60 Malaysia</option>
													<option countryCode="MV" value="960">+960 Maldives</option>
													<option countryCode="ML" value="223">+223 Mali</option>
													<option countryCode="MT" value="356">+356 Malta</option>
													<option countryCode="MH" value="692">+692 Marshall Islands</option>
													<option countryCode="MQ" value="596">+596 Martinique</option>
													<option countryCode="MR" value="222">+222 Mauritania</option>
													<option countryCode="YT" value="269">+269 Mayotte</option>
													<option countryCode="MX" value="52">+52 Mexico</option>
													<option countryCode="FM" value="691">+691 Micronesia</option>
													<option countryCode="MD" value="373">+373 Moldova</option>
													<option countryCode="MC" value="377">+377 Monaco</option>
													<option countryCode="MN" value="976">+976 Mongolia</option>
													<option countryCode="MS" value="1664">+1664 Montserrat</option>
													<option countryCode="MA" value="212">+212 Morocco</option>
													<option countryCode="MZ" value="258">+258 Mozambique</option>
													<option countryCode="MN" value="95">+95 Myanmar</option>
													<option countryCode="NA" value="264">+264 Namibia</option>
													<option countryCode="NR" value="674">+674 Nauru</option>
													<option countryCode="NP" value="977">+977 Nepal</option>
													<option countryCode="NL" value="31">+31 Netherlands</option>
													<option countryCode="NC" value="687">+687 New Caledonia</option>
													<option countryCode="NZ" value="64">+64 New Zealand</option>
													<option countryCode="NI" value="505">+505 Nicaragua</option>
													<option countryCode="NE" value="227">+227 Niger</option>
													<option countryCode="NG" value="234">+234 Nigeria</option>
													<option countryCode="NU" value="683">+683 Niue</option>
													<option countryCode="NF" value="672">+672 Norfolk Islands</option>
													<option countryCode="NP" value="670">+670 Northern Marianas</option>
													<option countryCode="NO" value="47">+47 Norway</option>
													<option countryCode="OM" value="968">+968 Oman</option>
													<option countryCode="PW" value="680">+680 Palau</option>
													<option countryCode="PA" value="507">+507 Panama</option>
													<option countryCode="PG" value="675">+675 Papua New Guinea</option>
													<option countryCode="PY" value="595">+595 Paraguay</option>
													<option countryCode="PE" value="51">+51 Peru</option>
													<option countryCode="PH" value="63">+63 Philippines</option>
													<option countryCode="PL" value="48">+48 Poland</option>
													<option countryCode="PT" value="351">+351 Portugal</option>
													<option countryCode="PR" value="1787">+1787 Puerto Rico</option>
													<option countryCode="QA" value="974">+974 Qatar</option>
													<option countryCode="RE" value="262">+262 Reunion</option>
													<option countryCode="RO" value="40">+40 Romania</option>
													<option countryCode="RU" value="7">+7 Russia</option>
													<option countryCode="RW" value="250">+250 Rwanda</option>
													<option countryCode="SM" value="378">+378 San Marino</option>
													<option countryCode="ST" value="239">+239 Sao Tome &amp; Principe</option>
													<option countryCode="SA" value="966">+966 Saudi Arabia</option>
													<option countryCode="SN" value="221">+221 Senegal</option>
													<option countryCode="CS" value="381">+381 Serbia</option>
													<option countryCode="SC" value="248">+248 Seychelles</option>
													<option countryCode="SL" value="232">+232 Sierra Leone</option>
													<option countryCode="SG" value="65">+65 Singapore</option>
													<option countryCode="SK" value="421">+421 Slovak Republic</option>
													<option countryCode="SI" value="386">+386 Slovenia</option>
													<option countryCode="SB" value="677">+677 Solomon Islands</option>
													<option countryCode="SO" value="252">+252 Somalia</option>
													<option countryCode="ZA" value="27">+27 South Africa</option>
													<option countryCode="ES" value="34">+34 Spain</option>
													<option countryCode="LK" value="94">+94 Sri Lanka</option>
													<option countryCode="SH" value="290">+290 St. Helena</option>
													<option countryCode="KN" value="1869">+1869 St. Kitts</option>
													<option countryCode="SC" value="1758">+1758 St. Lucia</option>
													<option countryCode="SD" value="249">+249 Sudan</option>
													<option countryCode="SR" value="597">+597 Suriname</option>
													<option countryCode="SZ" value="268">+268 Swaziland</option>
													<option countryCode="SE" value="46">+46 Sweden</option>
													<option countryCode="CH" value="41">+41 Switzerland</option>
													<option countryCode="SI" value="963">+963 Syria</option>
													<option countryCode="TW" value="886">+886 Taiwan</option>
													<option countryCode="TJ" value="7">+7 Tajikstan</option>
													<option countryCode="TH" value="66">+66 Thailand</option>
													<option countryCode="TG" value="228">+228 Togo</option>
													<option countryCode="TO" value="676">+676 Tonga</option>
													<option countryCode="TT" value="1868">+1868 Trinidad &amp; Tobago</option>
													<option countryCode="TN" value="216">+216 Tunisia</option>
													<option countryCode="TR" value="90">+90 Turkey</option>
													<option countryCode="TM" value="7">+7 Turkmenistan</option>
													<option countryCode="TM" value="993">+993 Turkmenistan</option>
													<option countryCode="TC" value="1649">+1649 Turks &amp; Caicos Islands</option>
													<option countryCode="TV" value="688">+688 Tuvalu</option>
													<option countryCode="UG" value="256">+256 Uganda</option>
													<!-- <option countryCode="GB" value="44">UK 4)</ (ption> -->
													<option countryCode="UA" value="380">+380 Ukraine</option>
												    <option countryCode="MN" value="95"> +95 Myanmar</option>
													<option countryCode="UY" value="598">+598 Uruguay</option>
													<!-- <option countryCode="US" value="1">USA1)</ (ption> -->
													<option countryCode="UZ" value="7">+7 Uzbekistan</option>
													<option countryCode="VU" value="678">+678 Vanuatu</option>
													<option countryCode="VA" value="379">+379 Vatican City</option>
													<option countryCode="VE" value="58">+58 Venezuela</option>
													<option countryCode="VN" value="84">+84 Vietnam</option>
													<option countryCode="VG" value="84">+1284 Virgin Islands - British</option>
													<option countryCode="VI" value="84">+1340 Virgin Islands - US</option>
													<option countryCode="WF" value="681">+681 Wallis &amp; Futuna</option>
													<option countryCode="YE" value="969">+969 Yemen Nort</option>
													<option countryCode="YE" value="967">+967 Yemen Sout</option>
													<option countryCode="ZM" value="260">+260 Zambia</option>
													<option countryCode="ZW" value="263">+263 Zimbabwe</option>
													</optgroup>
												</select>
											  </div>
											<input  onkeypress='return event.charCode >= 48 && event.charCode <= 57'  placeholder="Contact Number" type="text" pattern="^\d{10}$" maxlength="10" onchange="get_contact_info()" name="phone" id="phone" >
							        	
										  </div>
										  <div id="error_phone"></div>
									  </div>
								  </div>
									  <div class="col-md-6">
										<div class="form-group">
										<input type="text" onchange="get_contact_info()" placeholder="Email ID"  name="email" id="email">
							            <div id="error_email"></div>
										</div>
									    </div>
									  <div class="col-md-12">
										<div class="form-group">
											<a onclick="get_contact_info('submit');" class="primary-btn contact-sub" type="button" type="button">Submit</a>
										</div>
									</div>
								  </div>
							  </form>
						  </div>
					  </div>
				  </div>
			  </div>
		  </div>
		</div>
	  </div>

    <script>
    function get_contact_info(submit=''){
                          
                              var name=$("#first_name").val();
                              var phone=$("#phone").val();
                              var email=$("#email").val();
							 // var countryname=$("#countryname").val();
							//  var textmessage=$("#textmessage").val();
							  var countryCode =  $( "#countryCode option:selected" ).val();
                                if(name==''){
                                $("#error_firstname").html('<span style="color:red">Please enter name </span>');
                               }else{
                                 $("#error_firstname").html('');
                                 var nflag=1;
                               }
                               if(phone==''){
                                $("#error_phone").html('<span style="color:red">Please Contact Number </span>');
                                 
                               }else{
                                 $("#error_phone").html('');
                                   var pflag=1;
                               }
                               if(email==''){
                                $("#error_email").html('<span style="color:red">Please enter email </span>');
                                }else{
                                 $("#error_email").html('');
                                 var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
                                  if(regex.test(email)){
                                      $("#error_email").html('');
                                      var eflag=1;
                                  }else{
                                    $("#error_email").html('<span style="color:red">Please enter valid email </span>');
                                     
                                  }
                               }
                              /*  if(countryname==''){
                                $("#error_countryname").html('<span style="color:red">Please enter country name </span>');
                                
                               }else{
                                 $("#error_countryname").html('');
                                   var cflag=1;
                                 }
							   if(textmessage==''){
                                $("#error_textmessage").html('<span style="color:red">Please enter details </span>');
                                
                               }else{
                                 $("#error_textmessage").html('');
                                   var mflag=1;
                                 }   */
                           //if(nflag==1 && eflag==1 && pflag==1 && cflag==1  && mflag==1 && submit=='submit'){
							   if(nflag==1 && eflag==1 && pflag==1 && submit=='submit'){
                                   $.ajax({
									  // alert('te');
                                          url:"<?php echo base_url();?>User/user_contact",
                                          type:"post",
                                          //data:{first_name:name,phone:phone,email:email,countryname:countryname,textmessage:textmessage,countryCode:countryCode},
										  data:{first_name:name,phone:phone,email:email,countryCode:countryCode},
                                             success:function(res){
                                             var objJSON = JSON.parse(res);
                                             if(objJSON.email_error){
                                                $("#error_email").html('<span style="color:red">'+objJSON.email_error+'</span>');
                                             }
                                             if(objJSON.mobile_error){
                                                $("#error_phone").html('<span style="color:red">'+objJSON.mobile_error+'</span>');
                                             }
                                             if(objJSON.msg_success){
                                               $("#talk-modal").fadeOut();
                                               $("#msg_success").html('<span style="color:green">'+objJSON.msg_success+'</span>');
                                               $("#first_name").val('');
                                               $("#phone").val('');
                                               $("#email").val('');
                                              // $("#countryname").val('');
											   //$("#message").val('');
											   $("#countryCode").val('');
                                                
                                             }
                                             
                                             if(res)
                                                 {
                                                    window.location.href = "<?php echo base_url();?>thank-you";
                                                 }
                                       
                                        }
                                     })
                              } 
                   }
	</script>
	<script>
	var baseUrl = "<?php echo base_url(); ?>";
	</script>
</body>
</html>



