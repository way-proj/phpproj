  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script type="text/javascript">
         $.noConflict()
          jQuery(document).ready(function() {
          jQuery("#state_onchange_div").hide();
          jQuery("#city_onchange_div").hide();
      });
      </script>
 <script type="text/javascript">
  function get_state_id(val){
     $("#state_onchange_div").show();
     $("#load_state_div").hide();
     $.ajax({
          url:"<?php echo base_url();?>"+'User/get_state_id',
          type:'POST',
          data:{country_id:val},
          success:function(result){
            $("#state_id").html(result);
            
          }
      })
  } 
function get_city_id(val){
     
     $("#city_onchange_div").show();
     $("#load_city_div").hide();

     $.ajax({
          url:"<?php echo base_url();?>"+'User/get_city_id',
          type:'POST',
          data:{state_id:val},
          success:function(result){
            $("#city_id").html(result);
          }
      })
  } 
 </script>
 <section class="profile-sec">
        <div class="container">
            <div class="profile-block">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="profile-side-block">
                            <div class="profile-side-header">
                             
                                <div class="profile-img-box">
                                    <!--<img src="<?php echo base_url();?>assets/img/male-avatar.svg" />-->
                                     <?php  if($user_data->photo){?>
                                    <img src="<?php echo base_url();?>profile_image/<?php echo $user_data->photo; ?>" alt="Customer" id="profileImage">
                                    <?php }else{?>
                                    <img src="<?php echo base_url();?>assets/img/male-avatar.svg" />
                                    	<?php }?>
                                    
                                </div>
                                
                                     <div class="profile-title-box">
                                    <span>Hello!</span>
                                    <h5><?php echo $_SESSION['first_name']." ".$_SESSION['last_name']; ?></h5>
                                    <a href="<?php echo base_url('User/logout')?>">Log Out</a>
                                </div>

                            </div>
                            <nav class="profile-navigation">
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    <a class="nav-item nav-link active" id="nav-profile-information-tab" data-toggle="tab" href="#nav-profile-information" role="tab" aria-controls="nav-home" aria-selected="true">Personal Information</a>
                                    <a class="nav-item nav-link" id="nav-my-orders-tab" data-toggle="tab" href="#nav-my-orders" role="tab" aria-controls="nav-profile" aria-selected="false">My Orders</a>
                                    <a class="nav-item nav-link" id="nav-address-tab" data-toggle="tab" href="#nav-address" role="tab" aria-controls="nav-contact" aria-selected="false">Manage Addresses</a>
                                    <a class="nav-item nav-link" id="nav-cards-tab" data-toggle="tab" href="#nav-cards" role="tab" aria-controls="nav-contact" aria-selected="false">Manage Cards</a>
                                    <a class="nav-item nav-link" id="nav-wishlist-tab" data-toggle="tab" href="#nav-wishlist" role="tab" aria-controls="nav-contact" aria-selected="false">My Wishlist</a>
                                </div>
                            </nav>
                        </div>

                    </div>
                    <div class="col-sm-8">
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-profile-information" role="tabpanel" aria-labelledby="nav-home-tab">
                                <div class="profile-tab-content-block">
                                    <h4>Profile Information</h4>
                                    <div id="update_msg_success"></div>    
                                    <form class="profile-form" method="post" action="<?php echo base_url(); ?>User/updateCustomer">
                                         <input type="hidden" name="user_id" value="<?php echo $user_data->customer_id; ?>">
                                        <div class="row">
										<span id="msg"></span>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="first-name">First Name</label>
                                                    <input type="text" class="form-control" id="first-name" name="first_name" aria-describedby="emailHelp" placeholder="Enter email" value="<?php echo $user_data->first_name; ?>">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="last-name">Last Name</label>
                                                    <input type="text" class="form-control" id="last-name" name="last_name" aria-describedby="emailHelp" placeholder="Last Name" value="<?php echo $user_data->last_name; ?>" >
                                                </div>                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="phone-number">Phone Number</label>
                                                    <input type="text" class="form-control" id="phone-number" name="phone" aria-describedby="emailHelp" placeholder="Enter phone" value="<?php echo $user_data->phone; ?>">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="email">Email Address</label>
                                                    <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" placeholder="Enter email" value="<?php echo $user_data->email; ?>">
                                                </div>
                                            </div>
											
											
																		
									<div class="col-sm-12">
									<div class="form-group checkbox-block">
									<div class="form-check">
									<!--<input class="form-check-input" type="radio" name="GenderRadios" id="maleradio" value="male"<?php if($user_data->gender=='male'){ echo "checked"; }?>">-->
									<input name="GenderRadios" class="form-check-input" type="radio" id="maleradio" value="male" <?php echo ($user_data->gender== 'male') ?  "checked" : "" ;  ?>/> 
									<label class="form-check-label" for="maleradio">
									Male
									</label>
									</div>
									<div class="form-check">
									<!--<input class="form-check-input" type="radio" name="GenderRadios" id="femaleradio" value="female"<?php if($user_data->gender=='female'){ echo "checked"; }?>">-->
									<input name="GenderRadios" class="form-check-input" type="radio" id="femaleradio" value="female" <?php echo ($user_data->gender== 'female') ?  "checked" : "" ;  ?>/> 
									<label class="form-check-label" for="femaleradio">
									Female
									</label>
									</div>
									</div>
									</div>											
                                           <!-- <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label class="control-label">Country</label>
                                                    <select name="country_id" class="form-control border-form-control">
                                                        <option value="">Select Country</option>
                                                        <option value="1">Afghanistan</option>

                                                        <option value="2">Albania</option>

                                                        <option value="3">Algeria</option>

                                                        <option value="4">American Samoa</option>

                                                        <option value="5">Andorra</option>

                                                        <option value="6">Angola</option>

                                                        <option value="7">Anguilla</option>

                                                        <option value="8">Antarctica</option>

                                                        <option value="9">Antigua And Barbuda</option>

                                                        <option value="10">Argentina</option>

                                                        <option value="11">Armenia</option>

                                                        <option value="12">Aruba</option>

                                                        <option value="13">Australia</option>

                                                        <option value="14">Austria</option>

                                                        <option value="15">Azerbaijan</option>

                                                        <option value="16">Bahamas The</option>

                                                        <option value="17">Bahrain</option>

                                                        <option value="18">Bangladesh</option>

                                                        <option value="19">Barbados</option>

                                                        <option value="20">Belarus</option>

                                                        <option value="21">Belgium</option>

                                                        <option value="22">Belize</option>

                                                        <option value="23">Benin</option>

                                                        <option value="24">Bermuda</option>

                                                        <option value="25">Bhutan</option>

                                                        <option value="26">Bolivia</option>

                                                        <option value="27">Bosnia and Herzegovina</option>

                                                        <option value="28">Botswana</option>

                                                        <option value="29">Bouvet Island</option>

                                                        <option value="30">Brazil</option>

                                                        <option value="31">British Indian Ocean Territory</option>

                                                        <option value="32">Brunei</option>

                                                        <option value="33">Bulgaria</option>

                                                        <option value="34">Burkina Faso</option>

                                                        <option value="35">Burundi</option>

                                                        <option value="36">Cambodia</option>

                                                        <option value="37">Cameroon</option>

                                                        <option value="38">Canada</option>

                                                        <option value="39">Cape Verde</option>

                                                        <option value="40">Cayman Islands</option>

                                                        <option value="41">Central African Republic</option>

                                                        <option value="42">Chad</option>

                                                        <option value="43">Chile</option>

                                                        <option value="44">China</option>

                                                        <option value="45">Christmas Island</option>

                                                        <option value="46">Cocos (Keeling) Islands</option>

                                                        <option value="47">Colombia</option>

                                                        <option value="48">Comoros</option>

                                                        <option value="49">Congo</option>

                                                        <option value="50">Congo The Democratic Republic Of The</option>

                                                        <option value="51">Cook Islands</option>

                                                        <option value="52">Costa Rica</option>

                                                        <option value="53">Cote D'Ivoire (Ivory Coast)</option>

                                                        <option value="54">Croatia (Hrvatska)</option>

                                                        <option value="55">Cuba</option>

                                                        <option value="56">Cyprus</option>

                                                        <option value="57">Czech Republic</option>

                                                        <option value="58">Denmark</option>

                                                        <option value="59">Djibouti</option>

                                                        <option value="60">Dominica</option>

                                                        <option value="61">Dominican Republic</option>

                                                        <option value="62">East Timor</option>

                                                        <option value="63">Ecuador</option>

                                                        <option value="64">Egypt</option>

                                                        <option value="65">El Salvador</option>

                                                        <option value="66">Equatorial Guinea</option>

                                                        <option value="67">Eritrea</option>

                                                        <option value="68">Estonia</option>

                                                        <option value="69">Ethiopia</option>

                                                        <option value="70">External Territories of Australia</option>

                                                        <option value="71">Falkland Islands</option>

                                                        <option value="72">Faroe Islands</option>

                                                        <option value="73">Fiji Islands</option>

                                                        <option value="74">Finland</option>

                                                        <option value="75">France</option>

                                                        <option value="76">French Guiana</option>

                                                        <option value="77">French Polynesia</option>

                                                        <option value="78">French Southern Territories</option>

                                                        <option value="79">Gabon</option>

                                                        <option value="80">Gambia The</option>

                                                        <option value="81">Georgia</option>

                                                        <option value="82">Germany</option>

                                                        <option value="83">Ghana</option>

                                                        <option value="84">Gibraltar</option>

                                                        <option value="85">Greece</option>

                                                        <option value="86">Greenland</option>

                                                        <option value="87">Grenada</option>

                                                        <option value="88">Guadeloupe</option>

                                                        <option value="89">Guam</option>

                                                        <option value="90">Guatemala</option>

                                                        <option value="91">Guernsey and Alderney</option>

                                                        <option value="92">Guinea</option>

                                                        <option value="93">Guinea-Bissau</option>

                                                        <option value="94">Guyana</option>

                                                        <option value="95">Haiti</option>

                                                        <option value="96">Heard and McDonald Islands</option>

                                                        <option value="97">Honduras</option>

                                                        <option value="98">Hong Kong S.A.R.</option>

                                                        <option value="99">Hungary</option>

                                                        <option value="100">Iceland</option>

                                                        <option value="101" selected="selected">India</option>

                                                        <option value="102">Indonesia</option>

                                                        <option value="103">Iran</option>

                                                        <option value="104">Iraq</option>

                                                        <option value="105">Ireland</option>

                                                        <option value="106">Israel</option>

                                                        <option value="107">Italy</option>

                                                        <option value="108">Jamaica</option>

                                                        <option value="109">Japan</option>

                                                        <option value="110">Jersey</option>

                                                        <option value="111">Jordan</option>

                                                        <option value="112">Kazakhstan</option>

                                                        <option value="113">Kenya</option>

                                                        <option value="114">Kiribati</option>

                                                        <option value="115">Korea North</option>

                                                        <option value="116">Korea South</option>

                                                        <option value="117">Kuwait</option>

                                                        <option value="118">Kyrgyzstan</option>

                                                        <option value="119">Laos</option>

                                                        <option value="120">Latvia</option>

                                                        <option value="121">Lebanon</option>

                                                        <option value="122">Lesotho</option>

                                                        <option value="123">Liberia</option>

                                                        <option value="124">Libya</option>

                                                        <option value="125">Liechtenstein</option>

                                                        <option value="126">Lithuania</option>

                                                        <option value="127">Luxembourg</option>

                                                        <option value="128">Macau S.A.R.</option>

                                                        <option value="129">Macedonia</option>

                                                        <option value="130">Madagascar</option>

                                                        <option value="131">Malawi</option>

                                                        <option value="132">Malaysia</option>

                                                        <option value="133">Maldives</option>

                                                        <option value="134">Mali</option>

                                                        <option value="135">Malta</option>

                                                        <option value="136">Man (Isle of)</option>

                                                        <option value="137">Marshall Islands</option>

                                                        <option value="138">Martinique</option>

                                                        <option value="139">Mauritania</option>

                                                        <option value="140">Mauritius</option>

                                                        <option value="141">Mayotte</option>

                                                        <option value="142">Mexico</option>

                                                        <option value="143">Micronesia</option>

                                                        <option value="144">Moldova</option>

                                                        <option value="145">Monaco</option>

                                                        <option value="146">Mongolia</option>

                                                        <option value="147">Montserrat</option>

                                                        <option value="148">Morocco</option>

                                                        <option value="149">Mozambique</option>

                                                        <option value="150">Myanmar</option>

                                                        <option value="151">Namibia</option>

                                                        <option value="152">Nauru</option>

                                                        <option value="153">Nepal</option>

                                                        <option value="154">Netherlands Antilles</option>

                                                        <option value="155">Netherlands The</option>

                                                        <option value="156">New Caledonia</option>

                                                        <option value="157">New Zealand</option>

                                                        <option value="158">Nicaragua</option>

                                                        <option value="159">Niger</option>

                                                        <option value="160">Nigeria</option>

                                                        <option value="161">Niue</option>

                                                        <option value="162">Norfolk Island</option>

                                                        <option value="163">Northern Mariana Islands</option>

                                                        <option value="164">Norway</option>

                                                        <option value="165">Oman</option>

                                                        <option value="166">Pakistan</option>

                                                        <option value="167">Palau</option>

                                                        <option value="168">Palestinian Territory Occupied</option>

                                                        <option value="169">Panama</option>

                                                        <option value="170">Papua new Guinea</option>

                                                        <option value="171">Paraguay</option>

                                                        <option value="172">Peru</option>

                                                        <option value="173">Philippines</option>

                                                        <option value="174">Pitcairn Island</option>

                                                        <option value="175">Poland</option>

                                                        <option value="176">Portugal</option>

                                                        <option value="177">Puerto Rico</option>

                                                        <option value="178">Qatar</option>

                                                        <option value="179">Reunion</option>

                                                        <option value="180">Romania</option>

                                                        <option value="181">Russia</option>

                                                        <option value="182">Rwanda</option>

                                                        <option value="183">Saint Helena</option>

                                                        <option value="184">Saint Kitts And Nevis</option>

                                                        <option value="185">Saint Lucia</option>

                                                        <option value="186">Saint Pierre and Miquelon</option>

                                                        <option value="187">Saint Vincent And The Grenadines</option>

                                                        <option value="188">Samoa</option>

                                                        <option value="189">San Marino</option>

                                                        <option value="190">Sao Tome and Principe</option>

                                                        <option value="191">Saudi Arabia</option>

                                                        <option value="192">Senegal</option>

                                                        <option value="193">Serbia</option>

                                                        <option value="194">Seychelles</option>

                                                        <option value="195">Sierra Leone</option>

                                                        <option value="196">Singapore</option>

                                                        <option value="197">Slovakia</option>

                                                        <option value="198">Slovenia</option>

                                                        <option value="199">Smaller Territories of the UK</option>

                                                        <option value="200">Solomon Islands</option>

                                                        <option value="201">Somalia</option>

                                                        <option value="202">South Africa</option>

                                                        <option value="203">South Georgia</option>

                                                        <option value="204">South Sudan</option>

                                                        <option value="205">Spain</option>

                                                        <option value="206">Sri Lanka</option>

                                                        <option value="207">Sudan</option>

                                                        <option value="208">Suriname</option>

                                                        <option value="209">Svalbard And Jan Mayen Islands</option>

                                                        <option value="210">Swaziland</option>

                                                        <option value="211">Sweden</option>

                                                        <option value="212">Switzerland</option>

                                                        <option value="213">Syria</option>

                                                        <option value="214">Taiwan</option>

                                                        <option value="215">Tajikistan</option>

                                                        <option value="216">Tanzania</option>

                                                        <option value="217">Thailand</option>

                                                        <option value="218">Togo</option>

                                                        <option value="219">Tokelau</option>

                                                        <option value="220">Tonga</option>

                                                        <option value="221">Trinidad And Tobago</option>

                                                        <option value="222">Tunisia</option>

                                                        <option value="223">Turkey</option>

                                                        <option value="224">Turkmenistan</option>

                                                        <option value="225">Turks And Caicos Islands</option>

                                                        <option value="226">Tuvalu</option>

                                                        <option value="227">Uganda</option>

                                                        <option value="228">Ukraine</option>

                                                        <option value="229">United Arab Emirates</option>

                                                        <option value="230">United Kingdom</option>

                                                        <option value="231">United States</option>

                                                        <option value="232">United States Minor Outlying Islands</option>

                                                        <option value="233">Uruguay</option>

                                                        <option value="234">Uzbekistan</option>

                                                        <option value="235">Vanuatu</option>

                                                        <option value="236">Vatican City State (Holy See)</option>

                                                        <option value="237">Venezuela</option>

                                                        <option value="238">Vietnam</option>

                                                        <option value="239">Virgin Islands (British)</option>

                                                        <option value="240">Virgin Islands (US)</option>

                                                        <option value="241">Wallis And Futuna Islands</option>

                                                        <option value="242">Western Sahara</option>

                                                        <option value="243">Yemen</option>

                                                        <option value="244">Yugoslavia</option>

                                                        <option value="245">Zambia</option>

                                                        <option value="246">Zimbabwe</option>

                                                    </select>
                                                </div>
                                            </div>-->

                                            <!--<div class="col-sm-6">
                                                <div class="form-group">
                                                    <label class="control-label">State <span class="required">*</span></label>
                                                    <select name="state_id" class="form-control border-form-control">
                                                        <option value="">Select state</option>
                                                        <option value="1">Andaman and Nicobar Islands</option>

                                                        <option value="2">Andhra Pradesh</option>

                                                        <option value="3">Arunachal Pradesh</option>

                                                        <option value="4">Assam</option>

                                                        <option value="5">Bihar</option>

                                                        <option value="6">Chandigarh</option>

                                                        <option value="7">Chhattisgarh</option>

                                                        <option value="8">Dadra and Nagar Haveli</option>

                                                        <option value="9">Daman and Diu</option>

                                                        <option value="10" selected="selected">Delhi-NCR</option>

                                                        <option value="11">Goa</option>

                                                        <option value="12">Gujarat</option>

                                                        <option value="13">Haryana</option>

                                                        <option value="14">Himachal Pradesh</option>

                                                        <option value="15">Jammu and Kashmir</option>

                                                        <option value="16">Jharkhand</option>

                                                        <option value="17">Karnataka</option>

                                                        <option value="18">Kenmore</option>

                                                        <option value="19">Kerala</option>

                                                        <option value="20">Lakshadweep</option>

                                                        <option value="21">Madhya Pradesh</option>

                                                        <option value="22">Maharashtra</option>

                                                        <option value="23">Manipur</option>

                                                        <option value="24">Meghalaya</option>

                                                        <option value="25">Mizoram</option>

                                                        <option value="26">Nagaland</option>

                                                        <option value="27">Narora</option>

                                                        <option value="28">Natwar</option>

                                                        <option value="29">Odisha</option>

                                                        <option value="30">Paschim Medinipur</option>

                                                        <option value="31">Pondicherry</option>

                                                        <option value="32">Punjab</option>

                                                        <option value="33">Rajasthan</option>

                                                        <option value="34">Sikkim</option>

                                                        <option value="35">Tamil Nadu</option>

                                                        <option value="36">Telangana</option>

                                                        <option value="37">Tripura</option>

                                                        <option value="38">TEST</option>

                                                        <option value="39">Uttar Pradesh</option>

                                                        <option value="41">West Bengal</option>

                                                        <option value="42">UP-2</option>

                                                    </select>
                                                </div>
                                            </div>-->
                                            <!--<div class="col-sm-6">
                                                <div class="form-group">
                                                    <label class="control-label">City <span class="required">*</span></label>
                                                    <select name="city_id" class="form-control border-form-control">
                                                        <option value="">Select city</option>
                                                        <option value="10" selected="selected">Faridabad</option>

                                                        <option value="11">Palwal</option>

                                                        <option value="12">Hathin</option>

                                                        <option value="13">Hassanpur</option>

                                                        <option value="14">Gurgaon</option>

                                                        <option value="15">Sohna</option>

                                                        <option value="16">Ferozepur Jhirka</option>

                                                        <option value="17">Dharuhera</option>

                                                        <option value="18">Nuh</option>

                                                        <option value="19">Narnaul</option>

                                                        <option value="20">Bhiwani</option>

                                                        <option value="21">Kanina</option>

                                                        <option value="22">Loharu</option>

                                                        <option value="23">Rewari</option>

                                                        <option value="24">Charkhi Dadri</option>

                                                        <option value="25">Bawal</option>

                                                        <option value="26">Pataudi</option>

                                                        <option value="27">Rohtak</option>

                                                        <option value="28">Jhajjar</option>

                                                        <option value="29">Kalanaur</option>

                                                        <option value="30">Beri</option>

                                                        <option value="31">Gohana</option>

                                                        <option value="32">Sonepat</option>

                                                        <option value="33">Bahadurgarh</option>

                                                        <option value="34">Hissar</option>

                                                        <option value="35">Bawani Khera</option>

                                                        <option value="36">Hansi</option>

                                                        <option value="37">Narnaund</option>

                                                        <option value="38">Tosham</option>

                                                        <option value="39">Fatehbad</option>

                                                        <option value="40">Fatehabad</option>

                                                        <option value="41">Sirsa</option>

                                                        <option value="42">Rania</option>

                                                        <option value="43">Ladwa</option>

                                                        <option value="44">Ellenabad</option>

                                                        <option value="45">Mandi Dabwali</option>

                                                        <option value="46">Safidon</option>

                                                        <option value="47">Jakhal Mandi</option>

                                                        <option value="48">Barwala</option>

                                                        <option value="49">Julana</option>

                                                        <option value="50">Jind</option>

                                                        <option value="51">Uchana</option>

                                                        <option value="52">Narwana</option>

                                                        <option value="53">Tohana</option>

                                                        <option value="54">Kaithal</option>

                                                        <option value="55">Ganaur</option>

                                                        <option value="56">Karnal</option>

                                                        <option value="57">Kurukshetra</option>

                                                        <option value="58">Pundri</option>

                                                        <option value="59">Assandh</option>

                                                        <option value="60">Panipat</option>

                                                        <option value="61">Samalkha</option>

                                                        <option value="62">Gharaunda</option>

                                                        <option value="63">Nilokheri</option>

                                                        <option value="64">Pehowa</option>

                                                        <option value="65">Radaur</option>

                                                        <option value="66">Ambala</option>

                                                        <option value="67">Mustafabad</option>

                                                        <option value="68">Kalka</option>

                                                        <option value="69">Panchkula</option>

                                                        <option value="70">Pinjore</option>

                                                        <option value="71">Naraingarh</option>

                                                        <option value="72">Raipur Rani</option>

                                                        <option value="73">Yamunanagar</option>

                                                        <option value="74">Jagadhri</option>

                                                        <option value="75">Bilaspur</option>

                                                        <option value="76">Chhachhrauli</option>

                                                        <option value="77">Rupnagar</option>

                                                        <option value="78">Morinda</option>

                                                        <option value="79">Kurali</option>

                                                        <option value="80">Anandpur Sahib</option>

                                                        <option value="81">Nangal</option>

                                                        <option value="82">Kharar</option>

                                                        <option value="83">Patiala</option>

                                                        <option value="84">Rajpura</option>

                                                        <option value="85">Fatehgarh Sahib</option>

                                                        <option value="86">Ghanaur</option>

                                                        <option value="87">Ludhiana</option>

                                                        <option value="88">Raikot</option>

                                                        <option value="89">Samrala</option>

                                                        <option value="90">Machhiwara</option>

                                                        <option value="91">Kapurthala</option>

                                                        <option value="92">Jandiala</option>

                                                        <option value="93">Nakodar</option>

                                                        <option value="94">Payal</option>

                                                        <option value="95">Ferozepur</option>

                                                        <option value="96">Moga</option>

                                                        <option value="97">Badhni Kalan</option>

                                                        <option value="98">Dharamkot</option>

                                                        <option value="99">Makhu</option>

                                                        <option value="100">Zira</option>

                                                        <option value="101">Talwandi Bhai</option>

                                                        <option value="102">Amritsar</option>

                                                        <option value="103">Ajnala</option>

                                                        <option value="104">Bhikhiwind</option>

                                                        <option value="105">Patti</option>

                                                        <option value="106">Khem Karan</option>

                                                        <option value="107">Batala</option>

                                                        <option value="108">Gurdaspur</option>

                                                        <option value="109">Kalanaur</option>

                                                        <option value="110">Dhariwal</option>

                                                        <option value="111">Sri Hargobindpur</option>

                                                        <option value="112">Qadian</option>

                                                        <option value="113">Dina Nagar</option>

                                                        <option value="114">Majitha</option>

                                                        <option value="115">Fatehgarh Churian</option>

                                                        <option value="116">Dera Baba Nanak</option>

                                                        <option value="117">Jalandhar</option>

                                                        <option value="118">Hoshiarpur</option>

                                                        <option value="119">Hariana</option>

                                                        <option value="120">Mukerian</option>

                                                        <option value="121">Hajipur</option>

                                                        <option value="122">Alawalpur</option>

                                                        <option value="123">Banga</option>

                                                        <option value="124">Phagwara</option>

                                                        <option value="125">Goraya</option>

                                                        <option value="126">Phillaur</option>

                                                        <option value="127">Nawanshahr</option>

                                                        <option value="128">Rahon</option>

                                                        <option value="129">Begowal</option>

                                                        <option value="130">Nabha</option>

                                                        <option value="131">Sultanpur Lodhi</option>

                                                        <option value="132">Shahkot</option>

                                                        <option value="133">Kartarpur</option>

                                                        <option value="134">Dhilwan</option>

                                                        <option value="135">Pathankot</option>

                                                        <option value="136">Sujanpur</option>

                                                        <option value="137">Mahilpur</option>

                                                        <option value="138">Samana</option>

                                                        <option value="139">Ghagga</option>

                                                        <option value="140">Sanaur</option>

                                                        <option value="141">Amloh</option>

                                                        <option value="142">Sangrur</option>

                                                        <option value="143">Ahmedgarh</option>

                                                        <option value="144">Malerkotla</option>

                                                        <option value="145">Dhuri</option>

                                                        <option value="146">Bhawanigarh</option>

                                                        <option value="147">Sunam</option>

                                                        <option value="148">Cheema</option>

                                                        <option value="149">Lehragaga</option>

                                                        <option value="150">Akalgarh</option>

                                                        <option value="151">Dirba</option>

                                                        <option value="152">Barnala</option>

                                                        <option value="153">Bhadaur</option>

                                                        <option value="154">Dhanaula</option>

                                                        <option value="155">Longowal</option>

                                                        <option value="156">Bhatinda</option>

                                                        <option value="157">Rampura Phul</option>

                                                        <option value="158">Jaitu</option>

                                                        <option value="159">Faridkot</option>

                                                        <option value="160">Raman</option>

                                                        <option value="161">Sangat</option>

                                                        <option value="162">Budhlada</option>

                                                        <option value="163">Bhikhi</option>

                                                        <option value="164">Mansa</option>

                                                        <option value="165">Sardulgarh</option>

                                                        <option value="166">Maur</option>

                                                        <option value="167">Jalalabad</option>

                                                        <option value="168">Bariwala</option>

                                                        <option value="169">Muktsar</option>

                                                        <option value="170">Gidderbaha</option>

                                                        <option value="171">Malout</option>

                                                        <option value="172">Abohar</option>

                                                        <option value="173">Chandigarh</option>

                                                        <option value="174">Shimla</option>

                                                        <option value="175">Jutogh</option>

                                                        <option value="176">Theog</option>

                                                        <option value="177">Jubbal</option>

                                                        <option value="178">Rohru</option>

                                                        <option value="179">Narkanda</option>

                                                        <option value="180">Jammu</option>

                                                        <option value="181">Ghaziabad</option>

                                                        <option value="182">Ramnagar</option>

                                                        <option value="183">Loni</option>

                                                        <option value="184">Modinagar</option>

                                                        <option value="185">Mohiuddinpur</option>

                                                        <option value="186">Muradnagar</option>

                                                        <option value="187">Gautam Buddha Nagar</option>

                                                        <option value="188">Noida</option>

                                                        <option value="189">Aligarh</option>

                                                        <option value="190">Pilkhana</option>

                                                        <option value="191">Gonda</option>

                                                        <option value="192">Iglas</option>

                                                        <option value="193">Kauriaganj</option>

                                                        <option value="194">Khair</option>

                                                        <option value="195">Atrauli</option>

                                                        <option value="196">Bulandshahar</option>

                                                        <option value="197">Anupshahr</option>

                                                        <option value="198">Dibai</option>

                                                        <option value="199">Shikarpur</option>

                                                        <option value="200">Pahasu</option>

                                                        <option value="201">Bahjoi</option>

                                                        <option value="202">Bilari</option>

                                                        <option value="203">Chandausi</option>

                                                        <option value="204">Moradabad</option>

                                                        <option value="205">Kundarki</option>

                                                        <option value="206">Narauli</option>

                                                        <option value="207">Khurja</option>

                                                        <option value="208">Jewar</option>

                                                        <option value="209">Jahangirpur</option>

                                                        <option value="210">Dankaur</option>

                                                        <option value="211">Sikandrabad</option>

                                                        <option value="212">Mathura</option>

                                                        <option value="213">Kanth</option>

                                                        <option value="214">Hasayan</option>

                                                        <option value="215">Mursan</option>

                                                        <option value="216">Jasrana</option>

                                                        <option value="217">Firozabad</option>

                                                        <option value="218">Farukhabad</option>

                                                        <option value="219">Amanpur</option>

                                                        <option value="220">Nawabganj</option>

                                                        <option value="221">Kanpur</option>

                                                        <option value="222">Armapur Estate</option>

                                                        <option value="223">Akbarpur</option>

                                                        <option value="224">Pukhrayan</option>

                                                        <option value="225">Amraudha</option>

                                                        <option value="226">Bithoor</option>

                                                        <option value="227">Ghatampur</option>

                                                        <option value="228">Rura</option>

                                                        <option value="229">Rasulabad</option>

                                                        <option value="230">Jhinjhak</option>

                                                        <option value="231">Fatehgarh</option>

                                                        <option value="232">Gursahaiganj</option>

                                                        <option value="233">Faizabad</option>

                                                        <option value="234">Kamalganj</option>

                                                        <option value="235">Kannauj</option>

                                                        <option value="236">Saurikh</option>

                                                        <option value="237">Sikanderpur</option>

                                                        <option value="238">Talgram</option>

                                                        <option value="239">Unnao</option>

                                                        <option value="240">Maurawan</option>

                                                        <option value="241">Purwa</option>

                                                        <option value="242">Mohan</option>

                                                        <option value="243">Gangaghat</option>

                                                        <option value="244">Allahabad</option>

                                                        <option value="245">Katra</option>

                                                        <option value="246">Rajapur</option>

                                                        <option value="247">Ranipur</option>

                                                        <option value="248">Bharatganj</option>

                                                        <option value="249">Shankargarh</option>

                                                        <option value="250">Sikandra</option>

                                                        <option value="251">Bharwari</option>

                                                        <option value="252">Chail</option>

                                                        <option value="253">Karari</option>

                                                        <option value="254">Phulpur</option>

                                                        <option value="255">Fatehpur</option>

                                                        <option value="256">Ghazipur</option>

                                                        <option value="257">Bindki</option>

                                                        <option value="258">Khaga</option>

                                                        <option value="259">Harduaganj</option>

                                                        <option value="260">Varanasi</option>

                                                        <option value="261">Baragaon</option>

                                                        <option value="262">Gangapur</option>

                                                        <option value="263">Gopiganj</option>

                                                        <option value="264">Khamaria</option>

                                                        <option value="265">Suriyawan</option>

                                                        <option value="266">Nai Bazar</option>

                                                        <option value="267">Mirzapur</option>

                                                        <option value="268">Baraut</option>

                                                        <option value="269">Handia</option>

                                                        <option value="270">Jhusi</option>

                                                        <option value="271">Chitrakoot</option>

                                                        <option value="272">Ayodhya</option>

                                                        <option value="273">Deoria</option>

                                                        <option value="274">Shahganj</option>

                                                        <option value="275">Bikapur</option>

                                                        <option value="276">Banki</option>

                                                        <option value="277">Barabanki</option>

                                                        <option value="278">Satrikh</option>

                                                        <option value="279">Dewa</option>

                                                        <option value="280">Zaidpur</option>

                                                        <option value="281">Lucknow</option>

                                                        <option value="282">Wazirganj</option>

                                                        <option value="283">Malihabad</option>

                                                        <option value="284">Amethi</option>

                                                        <option value="285">Haidergarh</option>

                                                        <option value="286">Nagram</option>

                                                        <option value="287">Rae Bareli</option>

                                                        <option value="288">Raibareilly</option>

                                                        <option value="289">Salon</option>

                                                        <option value="290">Dalmau</option>

                                                        <option value="291">Lalganj</option>

                                                        <option value="292">Bachhrawan</option>

                                                        <option value="293">Jais</option>

                                                        <option value="294">Bhagwant Nagar</option>

                                                        <option value="295">Obra</option>

                                                        <option value="296">Ahraura</option>

                                                        <option value="297">Chunar</option>

                                                        <option value="298">Chakia</option>

                                                        <option value="299">Bisauli</option>

                                                        <option value="300">Zamania</option>

                                                        <option value="301">Rampur</option>

                                                        <option value="302">Mohammadabad</option>

                                                        <option value="303">Talbehat</option>

                                                        <option value="304">Hardoi</option>

                                                        <option value="305">Pali</option>

                                                        <option value="306">Shahabad</option>

                                                        <option value="307">Sandila</option>

                                                        <option value="308">Bilgram</option>

                                                        <option value="309">Madhoganj</option>

                                                        <option value="310">Mallawan</option>

                                                        <option value="311">Beniganj</option>

                                                        <option value="312">Gausganj</option>

                                                        <option value="313">Sandi</option>

                                                        <option value="314">Gopamau</option>

                                                        <option value="315">Pihani</option>

                                                        <option value="316">Bangarmau</option>

                                                        <option value="317">Safipur</option>

                                                        <option value="318">Bareilly</option>

                                                        <option value="319">Baheri</option>

                                                        <option value="320">Aonla</option>

                                                        <option value="321">Aliganj</option>

                                                        <option value="322">Faridpur</option>

                                                        <option value="323">Mirganj</option>

                                                        <option value="324">Shahi</option>

                                                        <option value="325">Milak</option>

                                                        <option value="326">Amroha</option>

                                                        <option value="327">Gajraula</option>

                                                        <option value="328">Ujhari</option>

                                                        <option value="329">Sirsi</option>

                                                        <option value="330">Sambhal</option>

                                                        <option value="331">Thakurdwara</option>

                                                        <option value="332">Bilaspur</option>

                                                        <option value="333">Suar</option>

                                                        <option value="334">Tanda</option>

                                                        <option value="335">Hapur</option>

                                                        <option value="336">Babugarh</option>

                                                        <option value="337">Meerut</option>

                                                        <option value="338">Pilkhuwa</option>

                                                        <option value="339">Aurangabad</option>

                                                        <option value="340">Bugrasi</option>

                                                        <option value="341">Khanpur</option>

                                                        <option value="342">Saidpur</option>

                                                        <option value="343">Saharanpur</option>

                                                        <option value="344">Ambehta</option>

                                                        <option value="345">Gangoh</option>

                                                        <option value="346">Nakur</option>

                                                        <option value="347">Nanauta</option>

                                                        <option value="348">Deoband</option>

                                                        <option value="349">Ailum</option>

                                                        <option value="350">Jalalabad</option>

                                                        <option value="351">Jhinjhana</option>

                                                        <option value="352">Kairana</option>

                                                        <option value="353">Muzaffarnagar</option>

                                                        <option value="354">Shamli</option>

                                                        <option value="355">Thana Bhawan</option>

                                                        <option value="356">Un</option>

                                                        <option value="357">Mawana</option>

                                                        <option value="358">Hastinapur</option>

                                                        <option value="359">Aminagar Sarai</option>

                                                        <option value="360">Chhaprauli</option>

                                                        <option value="361">Khatauli</option>

                                                        <option value="362">Budhana</option>

                                                        <option value="363">Shahpur</option>

                                                        <option value="364">Sisauli</option>

                                                        <option value="365">Sitapur</option>

                                                        <option value="366">Khairabad</option>

                                                        <option value="367">Laharpur</option>

                                                        <option value="368">Maholi</option>

                                                        <option value="369">Biswan</option>

                                                        <option value="370">Jahangirabad</option>

                                                        <option value="371">Pilibhit</option>

                                                        <option value="372">Puranpur</option>

                                                        <option value="373">Sultanpur</option>

                                                        <option value="374">Bilsanda</option>

                                                        <option value="375">Barkhera</option>

                                                        <option value="376">Basti</option>

                                                        <option value="377">Harraiya</option>

                                                        <option value="378">Bansi</option>

                                                        <option value="379">Hariharpur</option>

                                                        <option value="380">Maghar</option>

                                                        <option value="381">Khalilabad</option>

                                                        <option value="382">Tetri Bazar</option>

                                                        <option value="383">Sahjanwa</option>

                                                        <option value="384">Kushinagar</option>

                                                        <option value="385">Bahadurganj</option>

                                                        <option value="386">Sadat</option>

                                                        <option value="387">Amila</option>

                                                        <option value="388">Ghosi</option>

                                                        <option value="389">Kopaganj</option>

                                                        <option value="390">Ballia</option>

                                                        <option value="391">Bajna</option>

                                                        <option value="392">Raya</option>

                                                        <option value="393">Baldeo</option>

                                                        <option value="394">Gokul</option>

                                                        <option value="395">Mahaban</option>

                                                        <option value="396">Barsana</option>

                                                        <option value="397">Radhakund</option>

                                                        <option value="398">Agra</option>

                                                        <option value="399">Dayalbagh</option>

                                                        <option value="400">Bah</option>

                                                        <option value="401">Fatehpur Sikri</option>

                                                        <option value="402">Fatehabad</option>

                                                        <option value="403">Pinahat</option>

                                                        <option value="404">Tundla</option>

                                                        <option value="405">Lalitpur</option>

                                                        <option value="406">Alwar</option>

                                                        <option value="407">Khairthal</option>

                                                        <option value="408">Kishangarh</option>

                                                        <option value="409">Tijara</option>

                                                        <option value="410">Baran</option>

                                                        <option value="411">Jaipur</option>

                                                        <option value="412">Bagru</option>

                                                        <option value="413">Viratnagar</option>

                                                        <option value="414">Kotputli</option>

                                                        <option value="415">Dausa</option>

                                                        <option value="416">Bandikui</option>

                                                        <option value="417">Jobner</option>

                                                        <option value="418">Lalsot</option>

                                                        <option value="419">Didwana</option>

                                                        <option value="420">Kishangarh Renwal</option>

                                                        <option value="421">Nagaur</option>

                                                        <option value="422">Chomu</option>

                                                        <option value="423">Chaksu</option>

                                                        <option value="424">Tonk</option>

                                                        <option value="425">Uniara</option>

                                                        <option value="426">Malpura</option>

                                                        <option value="427">Deoli</option>

                                                        <option value="428">Ajmer</option>

                                                        <option value="429">Bhilwara</option>

                                                        <option value="430">Pushkar</option>

                                                        <option value="431">Sarwar</option>

                                                        <option value="432">Kekri</option>

                                                        <option value="433">Jahazpur</option>

                                                        <option value="434">Nasirabad</option>

                                                        <option value="435">Beawar</option>

                                                        <option value="436">Rajsamand</option>

                                                        <option value="437">Pali</option>

                                                        <option value="438">Rani</option>

                                                        <option value="439">Bali</option>

                                                        <option value="440">Sadri</option>

                                                        <option value="441">Sumerpur</option>

                                                        <option value="442">Jalore</option>

                                                        <option value="443">Sirohi</option>

                                                        <option value="444">Pindwara</option>

                                                        <option value="445">Udaipur</option>

                                                        <option value="446">Sheoganj</option>

                                                        <option value="447">Gulabpura</option>

                                                        <option value="448">Asind</option>

                                                        <option value="449">Shahpura</option>

                                                        <option value="450">Mandalgarh</option>

                                                        <option value="451">Chechat</option>

                                                        <option value="452">Bari Sadri</option>

                                                        <option value="453">Salumbar</option>

                                                        <option value="454">Nathdwara</option>

                                                        <option value="455">Bhinder</option>

                                                        <option value="456">Dhariawad</option>

                                                        <option value="457">Dungarpur</option>

                                                        <option value="458">Sagwara</option>

                                                        <option value="459">Galiakot</option>

                                                        <option value="460">Kherli</option>

                                                        <option value="461">Mahwa</option>

                                                        <option value="462">Swaimadhopur</option>

                                                        <option value="463">Phalodi</option>

                                                        <option value="464">Mahu Kalan</option>

                                                        <option value="465">Sikar</option>

                                                        <option value="466">Hindaun</option>

                                                        <option value="467">Karanpur</option>

                                                        <option value="468">Bundi</option>

                                                        <option value="469">Keshoraipatan</option>

                                                        <option value="470">Lakheri</option>

                                                        <option value="471">Kota</option>

                                                        <option value="472">Chhabra</option>

                                                        <option value="473">Sangod</option>

                                                        <option value="474">Jhalawar</option>

                                                        <option value="475">Bakani</option>

                                                        <option value="476">Aklera</option>

                                                        <option value="477">Pirawa</option>

                                                        <option value="478">Manohar Thana</option>

                                                        <option value="479">Bhawani Mandi</option>

                                                        <option value="480">Ramganj Mandi</option>

                                                        <option value="481">Suket</option>

                                                        <option value="482">Banswara</option>

                                                        <option value="483">Kushalgarh</option>

                                                        <option value="484">Dholpur</option>

                                                        <option value="485">Rajakhera</option>

                                                        <option value="486">Churu</option>

                                                        <option value="487">Ratannagar</option>

                                                        <option value="488">Ratangarh</option>

                                                        <option value="489">Jhunjhunu</option>

                                                        <option value="490">Bissau</option>

                                                        <option value="491">Taranagar</option>

                                                        <option value="492">Sardarshahar</option>

                                                        <option value="493">Bidasar</option>

                                                        <option value="494">Chhapar</option>

                                                        <option value="495">Sujangarh</option>

                                                        <option value="496">Rajaldesar</option>

                                                        <option value="497">Losal</option>

                                                        <option value="498">Khandela</option>

                                                        <option value="499">Sri Madhopur</option>

                                                        <option value="500">Chirawa</option>

                                                        <option value="501">Surajgarh</option>

                                                        <option value="502">Pilani</option>

                                                        <option value="503">Nawalgarh</option>

                                                        <option value="504">Udaipurwati</option>

                                                        <option value="505">Khetri</option>

                                                        <option value="506">Mandawa</option>

                                                        <option value="507">Mukandgarh</option>

                                                        <option value="508">Bikaner</option>

                                                        <option value="509">Nokha</option>

                                                        <option value="510">Ganganagar</option>

                                                        <option value="511">Gajsinghpur</option>

                                                        <option value="512">Padampur</option>

                                                        <option value="513">Raisinghnagar</option>

                                                        <option value="514">Sadulshahar</option>

                                                        <option value="515">Hanumangarh</option>

                                                        <option value="516">Nohar</option>

                                                        <option value="517">Anupgarh</option>

                                                        <option value="518">Pilibanga</option>

                                                        <option value="519">Suratgarh</option>

                                                        <option value="520">Kuchera</option>

                                                        <option value="521">Makrana</option>

                                                        <option value="522">Merta City</option>

                                                        <option value="523">Parbatsar</option>

                                                        <option value="524">Jodhpur</option>

                                                        <option value="525">Bilara</option>

                                                        <option value="526">Sanchore</option>

                                                        <option value="527">Barmer</option>

                                                        <option value="528">Balotra</option>

                                                        <option value="529">Jaisalmer</option>

                                                        <option value="530">Pokaran</option>

                                                        <option value="531">Pauri Garwhal</option>

                                                        <option value="532">Jhansi</option>

                                                        <option value="533">Garautha</option>

                                                        <option value="534">Mauranipur</option>

                                                        <option value="535">Jhnsi</option>

                                                        <option value="536">Maruanipur</option>

                                                        <option value="537">Moth</option>

                                                        <option value="538">Konch</option>

                                                        <option value="539">Nepanagar</option>

                                                        <option value="540">Harsud</option>

                                                        <option value="541">Khandwa</option>

                                                        <option value="542">Pandhana</option>

                                                        <option value="543">Burhanpur</option>

                                                        <option value="544">Khaknar</option>

                                                        <option value="545">Naya Harsud</option>

                                                        <option value="546">Kasarawad</option>

                                                        <option value="547">Kasrawad</option>

                                                        <option value="548">Khargone</option>

                                                        <option value="549">Barwaha</option>

                                                        <option value="550">Bhikangaon</option>

                                                        <option value="551">Dhar</option>

                                                        <option value="552">Maheshwar</option>

                                                        <option value="553">Maheashwar</option>

                                                        <option value="554">Jhirniya</option>

                                                        <option value="555">Jhiranya</option>

                                                        <option value="556">Jhirnia</option>

                                                        <option value="557">Segaon</option>

                                                        <option value="558">Bhagwanpura</option>

                                                        <option value="559">Bhagawanpura</option>

                                                        <option value="560">Rajpur</option>

                                                        <option value="561">Barwani</option>

                                                        <option value="562">Niwali</option>

                                                        <option value="563">Thikari</option>

                                                        <option value="564">Anjad</option>

                                                        <option value="565">Katni</option>

                                                        <option value="566">Sendhwa</option>

                                                        <option value="567">Pansemal</option>

                                                        <option value="568">Sendhawa</option>

                                                        <option value="569">Indore</option>

                                                        <option value="570">Depalpur</option>

                                                        <option value="571">Mhow</option>

                                                        <option value="572">Sanwer</option>

                                                        <option value="573">Dhjar</option>

                                                        <option value="574">Sardarpur</option>

                                                        <option value="575">Kukshai</option>

                                                        <option value="576">Kukshi</option>

                                                        <option value="577">Manawar</option>

                                                        <option value="578">Dharampuri</option>

                                                        <option value="579">Badnawar</option>

                                                        <option value="580">Dewas</option>

                                                        <option value="581">Bagli</option>

                                                        <option value="582">Sonkutch</option>

                                                        <option value="583">Kannod</option>

                                                        <option value="584">Khategaon</option>

                                                        <option value="585">Ujjain</option>

                                                        <option value="586">Ghatiya</option>

                                                        <option value="587">Badnagar</option>

                                                        <option value="588">Nagda</option>

                                                        <option value="589">Khacharod</option>

                                                        <option value="590">Bhatpachlana</option>

                                                        <option value="591">Piploda Baghla</option>

                                                        <option value="592">Polai Kalan</option>

                                                        <option value="593">Mahidpur</option>

                                                        <option value="594">Jharda</option>

                                                        <option value="595">Tajpur</option>

                                                        <option value="596">Tarana</option>

                                                        <option value="597">Runija</option>

                                                        <option value="598">Bajna</option>

                                                        <option value="599">Ratlam</option>

                                                        <option value="600">Sailana</option>

                                                        <option value="601">Alot</option>

                                                        <option value="602">Alote</option>

                                                        <option value="603">Piploda</option>

                                                        <option value="604">Jaora</option>

                                                        <option value="605">Jhabua</option>

                                                        <option value="606">Meghnagar</option>

                                                        <option value="607">Petlawad</option>

                                                        <option value="608">Thandla</option>

                                                        <option value="609">Petlawada</option>

                                                        <option value="610">Bhavra</option>

                                                        <option value="611">Alirajpur</option>

                                                        <option value="612">Ranapur</option>

                                                        <option value="613">Mandsaur</option>

                                                        <option value="614">Manasa</option>

                                                        <option value="615">Jawad</option>

                                                        <option value="616">Mandasur</option>

                                                        <option value="617">Neemuch</option>

                                                        <option value="618">Malhargarh</option>

                                                        <option value="619">Sitamau</option>

                                                        <option value="620">Malahargarh</option>

                                                        <option value="621">Bhanpura</option>

                                                        <option value="622">Garoth</option>

                                                        <option value="623">Suwasara Mandi</option>

                                                        <option value="624">Betul</option>

                                                        <option value="625">Bhainsdehi</option>

                                                        <option value="626">Bahinsdehi</option>

                                                        <option value="627">Amal</option>

                                                        <option value="628">Shahpur</option>

                                                        <option value="629">Shahpura</option>

                                                        <option value="630">Amla</option>

                                                        <option value="631">Multai</option>

                                                        <option value="632">Mulati</option>

                                                        <option value="633">Parasia</option>

                                                        <option value="634">Babai</option>

                                                        <option value="635">Hoshangabad</option>

                                                        <option value="636">Timarni</option>

                                                        <option value="637">Itarsi</option>

                                                        <option value="638">Seoni Malwa</option>

                                                        <option value="639">Harda</option>

                                                        <option value="640">Khirkiya</option>

                                                        <option value="641">Khirkiyan</option>

                                                        <option value="642">Sohagpur</option>

                                                        <option value="643">Piparia</option>

                                                        <option value="644">Pipariya</option>

                                                        <option value="645">Bankhedi</option>

                                                        <option value="646">Gadarwara</option>

                                                        <option value="647">Huzur</option>

                                                        <option value="648">Bhopal</option>

                                                        <option value="649">Vidisha</option>

                                                        <option value="650">Nateran</option>

                                                        <option value="651">Lateri</option>

                                                        <option value="652">Gyaraspur</option>

                                                        <option value="653">Basoda</option>

                                                        <option value="654">Kurwai</option>

                                                        <option value="655">Sironj</option>

                                                        <option value="656">Bina</option>

                                                        <option value="657">Gairatganj</option>

                                                        <option value="658">Goharganj</option>

                                                        <option value="659">Raisen</option>

                                                        <option value="660">Baraily</option>

                                                        <option value="661">Udaipura</option>

                                                        <option value="662">Silwani</option>

                                                        <option value="663">Begamganj</option>

                                                        <option value="664">Shajapur</option>

                                                        <option value="665">Berchha</option>

                                                        <option value="666">Shujalpur</option>

                                                        <option value="667">Sundersi</option>

                                                        <option value="668">Awantipur Barodiya</option>

                                                        <option value="669">Kalisindh</option>

                                                        <option value="670">Akodia</option>

                                                        <option value="671">Moman Badodiya</option>

                                                        <option value="672">Barodia Kumaria</option>

                                                        <option value="673">Salsalai</option>

                                                        <option value="674">Agar</option>

                                                        <option value="675">Kanad</option>

                                                        <option value="676">Kalapipal</option>

                                                        <option value="677">Jamner</option>

                                                        <option value="678">Khokra Kalan</option>

                                                        <option value="679">Agar Malwa</option>

                                                        <option value="680">Nalkheda</option>

                                                        <option value="681">Susner</option>

                                                        <option value="682">Soyat Kalan</option>

                                                        <option value="683">Barode</option>

                                                        <option value="684">Rajgarh</option>

                                                        <option value="685">Rajgarh(Bia)</option>

                                                        <option value="686">Kurawar</option>

                                                        <option value="687">Narsinghgarh</option>

                                                        <option value="688">Sarangpur</option>

                                                        <option value="689">Biaora</option>

                                                        <option value="690">Raigarh</option>

                                                        <option value="691">Suthalia</option>

                                                        <option value="692">Talen</option>

                                                        <option value="693">Khilchipur</option>

                                                        <option value="694">Pachore</option>

                                                        <option value="695">Boda</option>

                                                        <option value="696">Khujner</option>

                                                        <option value="697">Chhapiheda</option>

                                                        <option value="698">Zeerapur</option>

                                                        <option value="699">Jirapur</option>

                                                        <option value="700">Machalpur</option>

                                                        <option value="701">Ashta</option>

                                                        <option value="702">Sehore</option>

                                                        <option value="703">Bilkisganj</option>

                                                        <option value="704">Ichhawar</option>

                                                        <option value="705">Kotri</option>

                                                        <option value="706">Ichawar</option>

                                                        <option value="707">Metwada</option>

                                                        <option value="708">Siddikganj</option>

                                                        <option value="709">Jawar</option>

                                                        <option value="710">Nasrullagaj</option>

                                                        <option value="711">Nasrullaganj</option>

                                                        <option value="712">Budhni</option>

                                                        <option value="713">Budni</option>

                                                        <option value="714">Doraha</option>

                                                        <option value="715">Rehti</option>

                                                        <option value="716">Baktara</option>

                                                        <option value="717">Shahganj</option>

                                                        <option value="718">Shyampur</option>

                                                        <option value="719">Ahmedpur</option>

                                                        <option value="720">Sagar</option>

                                                        <option value="721">Banda</option>

                                                        <option value="722">Khurai</option>

                                                        <option value="723">Rahatgarh</option>

                                                        <option value="724">Kesli</option>

                                                        <option value="725">Deori</option>

                                                        <option value="726">Rehli</option>

                                                        <option value="727">Garhakota</option>

                                                        <option value="728">Damoh</option>

                                                        <option value="729">Patera</option>

                                                        <option value="730">Patharia</option>

                                                        <option value="731">Batiyagarh</option>

                                                        <option value="732">Jabera</option>

                                                        <option value="733">Pathariya</option>

                                                        <option value="734">Hatta</option>

                                                        <option value="735">Chhatarpur</option>

                                                        <option value="736">Nowgong</option>

                                                        <option value="737">Malehara</option>

                                                        <option value="738">Malehra</option>

                                                        <option value="739">Laundi</option>

                                                        <option value="740">Bad Malahara</option>

                                                        <option value="741">Badamalahara</option>

                                                        <option value="742">Badamalahra</option>

                                                        <option value="743">Malahara</option>

                                                        <option value="744">Bijawar</option>

                                                        <option value="745">Gaurihar</option>

                                                        <option value="746">Laund</option>

                                                        <option value="747">Rajanagar</option>

                                                        <option value="748">Rajnagar</option>

                                                        <option value="749">Tikamgarh</option>

                                                        <option value="750">Jatara</option>

                                                        <option value="751">Baldeogarh</option>

                                                        <option value="752">Pawai</option>

                                                        <option value="753">Khargapur</option>

                                                        <option value="754">Palera</option>

                                                        <option value="755">Pelara</option>

                                                        <option value="756">Niwari</option>

                                                        <option value="757">Orchha</option>

                                                        <option value="758">Tikamgar</option>

                                                        <option value="759">Prithvipur</option>

                                                        <option value="760">Guna</option>

                                                        <option value="761">Aroun</option>

                                                        <option value="762">Bamori</option>

                                                        <option value="763">Raghogarh</option>

                                                        <option value="764">Chacauda</option>

                                                        <option value="765">Chachoda</option>

                                                        <option value="766">Chachauda</option>

                                                        <option value="767">Kumbhraj</option>

                                                        <option value="768">Maksudangarh</option>

                                                        <option value="769">Ashoknagar</option>

                                                        <option value="770">Ashok Nagar</option>

                                                        <option value="771">Esagarh</option>

                                                        <option value="772">Mungaoli</option>

                                                        <option value="773">Chanderi</option>

                                                        <option value="774">Shivpuri</option>

                                                        <option value="775">Khaniadhana</option>

                                                        <option value="776">Karera</option>

                                                        <option value="777">Pichhore</option>

                                                        <option value="778">Kolaras</option>

                                                        <option value="779">Pohri</option>

                                                        <option value="780">Narwar</option>

                                                        <option value="781">Gird</option>

                                                        <option value="782">Gwalior</option>

                                                        <option value="783">Morar</option>

                                                        <option value="784">Dabra</option>

                                                        <option value="785">Gwalor</option>

                                                        <option value="786">Bhitarwar</option>

                                                        <option value="787">Bhandair</option>

                                                        <option value="788">Bhander</option>

                                                        <option value="789">Datia</option>

                                                        <option value="790">Seondha</option>

                                                        <option value="791">Indergah</option>

                                                        <option value="792">Indergarh</option>

                                                        <option value="793">Joura</option>

                                                        <option value="794">Morena</option>

                                                        <option value="795">Ambah</option>

                                                        <option value="796">Porsa</option>

                                                        <option value="797">Dimni</option>

                                                        <option value="798">Kailaras</option>

                                                        <option value="799">Kealras</option>

                                                        <option value="800">Kelaras</option>

                                                        <option value="801">Sabalgarh</option>

                                                        <option value="802">Bijaipur</option>

                                                        <option value="803">Bijaypur</option>

                                                        <option value="804">Vijaypur</option>

                                                        <option value="805">Sheopur</option>

                                                        <option value="806">Karahal</option>

                                                        <option value="807">Bhind</option>

                                                        <option value="808">Ater</option>

                                                        <option value="809">Attair</option>

                                                        <option value="810">Gohad</option>

                                                        <option value="811">Mehgoun</option>

                                                        <option value="812">Mehgaon</option>

                                                        <option value="813">Raun</option>

                                                        <option value="814">Ron</option>

                                                        <option value="815">Mihona</option>

                                                        <option value="816">Lahar</option>

                                                        <option value="817">Barhi</option>

                                                        <option value="818">Chhindwar</option>

                                                        <option value="819">Chhindwara</option>

                                                        <option value="820">Chhindwra</option>

                                                        <option value="821">Sausar</option>

                                                        <option value="822">Bichhua</option>

                                                        <option value="823">Chaurai</option>

                                                        <option value="824">Chourai</option>

                                                        <option value="825">Chouai</option>

                                                        <option value="826">Chourak</option>

                                                        <option value="827">Amarawara</option>

                                                        <option value="828">Amarwara</option>

                                                        <option value="829">Harrai</option>

                                                        <option value="830">Pandhurna</option>

                                                        <option value="831">Paraisa</option>

                                                        <option value="832">Chandametta</option>

                                                        <option value="833">Junnardeo</option>

                                                        <option value="834">Jamai</option>

                                                        <option value="835">Junnareo</option>

                                                        <option value="836">Tamia</option>

                                                        <option value="837">Seoni</option>

                                                        <option value="838">Barghat</option>

                                                        <option value="839">Bharghat</option>

                                                        <option value="840">Korai</option>

                                                        <option value="841">Lakhanadon</option>

                                                        <option value="842">Ghansore</option>

                                                        <option value="843">Lakhnadon</option>

                                                        <option value="844">Keolari</option>

                                                        <option value="845">Ghansire</option>

                                                        <option value="846">Balaghat</option>

                                                        <option value="847">Laburra</option>

                                                        <option value="848">Baihar</option>

                                                        <option value="849">Kiranpur</option>

                                                        <option value="850">Kirnapur</option>

                                                        <option value="851">Lanji</option>

                                                        <option value="852">Khairlanji</option>

                                                        <option value="853">Lalbarra</option>

                                                        <option value="854">Lalburra</option>

                                                        <option value="855">Waraseoni</option>

                                                        <option value="856">Katangi</option>

                                                        <option value="857">Tirodi</option>

                                                        <option value="858">Mandla</option>

                                                        <option value="859">Niwas</option>

                                                        <option value="860">Nainpur</option>

                                                        <option value="861">Sahpura Niwas</option>

                                                        <option value="862">Sahpuraniwas</option>

                                                        <option value="863">Shahpura Niwas</option>

                                                        <option value="864">Bhua Bichhiya</option>

                                                        <option value="865">Bhuabichhiya</option>

                                                        <option value="866">Dindori</option>

                                                        <option value="867">Bhuabichhia</option>

                                                        <option value="868">Bhubichhiya</option>

                                                        <option value="869">Bhua Bichhia</option>

                                                        <option value="870">Jabalpur</option>

                                                        <option value="871">Bhedaghat</option>

                                                        <option value="872">Patan</option>

                                                        <option value="873">Kundam</option>

                                                        <option value="874">Jsbslpur</option>

                                                        <option value="875">Sihora</option>

                                                        <option value="876">Sihora.</option>

                                                        <option value="877">Bahoriband</option>

                                                        <option value="878">Bahoriaband</option>

                                                        <option value="879">Sihira</option>

                                                        <option value="880">Murwara</option>

                                                        <option value="881">Vijayaragahvgarh</option>

                                                        <option value="882">Vijayaraghavgarh</option>

                                                        <option value="883">Vijayaraghvgarh</option>

                                                        <option value="884">Vijayarghavgarh</option>

                                                        <option value="885">Vijayragahvgarh</option>

                                                        <option value="886">Kanti</option>

                                                        <option value="887">Ijayaraghavgarh.</option>

                                                        <option value="888">Vijaragahvgarh</option>

                                                        <option value="889">Vijayraghavgarh</option>

                                                        <option value="890">Rithi</option>

                                                        <option value="891">Anuppur</option>

                                                        <option value="892">Beohari</option>

                                                        <option value="893">Shagpur</option>

                                                        <option value="894">Shahdol</option>

                                                        <option value="895">B. Pali</option>

                                                        <option value="896">B.Pali</option>

                                                        <option value="897">Jaithari</option>

                                                        <option value="898">Pushparajgarh</option>

                                                        <option value="899">Kotma</option>

                                                        <option value="900">Jaitpur</option>

                                                        <option value="901">Jaisinghnagar</option>

                                                        <option value="902">Birsinghpur Pali</option>

                                                        <option value="903">Bandhogarh</option>

                                                        <option value="904">Umaria</option>

                                                        <option value="905">Burhar</option>

                                                        <option value="906">Churhat</option>

                                                        <option value="907">V</option>

                                                        <option value="908">Maihar</option>

                                                        <option value="909">Raghurajnagar</option>

                                                        <option value="910">Satna</option>

                                                        <option value="911">Rampur Baghelan</option>

                                                        <option value="912">Rampur-Baghelan</option>

                                                        <option value="913">Raghuraj Nagar</option>

                                                        <option value="914">Nagod</option>

                                                        <option value="915">Mauganj</option>

                                                        <option value="916">Unchehara</option>

                                                        <option value="917">Amarpatan</option>

                                                        <option value="918">Ramnagar</option>

                                                        <option value="919">Rewa</option>

                                                        <option value="920">Sirmour</option>

                                                        <option value="921">Raipur - Karchuliyan</option>

                                                        <option value="922">Teonthar</option>

                                                        <option value="923">Gurh</option>

                                                        <option value="924">Hanumana</option>

                                                        <option value="925">Gopad Vanas</option>

                                                        <option value="926">Gopadbanas</option>

                                                        <option value="927">Gopadvanas</option>

                                                        <option value="928">Majauli</option>

                                                        <option value="929">Sihawal</option>

                                                        <option value="930">Sidhi</option>

                                                        <option value="931">Rampur Naikin</option>

                                                        <option value="932">Deosar</option>

                                                        <option value="933">Devsar</option>

                                                        <option value="934">Chitrangi</option>

                                                        <option value="935">Singrauli</option>

                                                        <option value="936">Singrauli Colliery</option>

                                                        <option value="937">Kareli</option>

                                                        <option value="938">Narsimhapur</option>

                                                        <option value="939">Narsinghpur</option>

                                                        <option value="940">Narsinghpur Ho</option>

                                                        <option value="941">Gotegaon</option>

                                                        <option value="942">Tendukheda</option>

                                                        <option value="943">Saikheda</option>

                                                        <option value="944">Narasinghpur</option>

                                                        <option value="945">Panna</option>

                                                        <option value="946">Gunnor</option>

                                                        <option value="947">Ajaigarh</option>

                                                        <option value="948">Ajaygarh</option>

                                                        <option value="949">Devendra</option>

                                                        <option value="950">Devendra Nagar</option>

                                                        <option value="951">Raipura</option>

                                                        <option value="952">Rajkot</option>

                                                        <option value="953">Lodhika</option>

                                                        <option value="954">Kotda Sangani</option>

                                                        <option value="955">Kotda Sanghani</option>

                                                        <option value="956">Jasdan</option>

                                                        <option value="957">Kotda Saangani</option>

                                                        <option value="958">Sardhar</option>

                                                        <option value="959">Kotda</option>

                                                        <option value="960">Sayla</option>

                                                        <option value="961">Gondal</option>

                                                        <option value="962">Kalavad</option>

                                                        <option value="963">Dhrol</option>

                                                        <option value="964">Paddhari</option>

                                                        <option value="965">Dhoraji</option>

                                                        <option value="966">Jetpur</option>

                                                        <option value="967">Jamkandorna</option>

                                                        <option value="968">Upleta</option>

                                                        <option value="969">Jamjodhpur</option>

                                                        <option value="970">Manavadar</option>

                                                        <option value="971">Kutiyana</option>

                                                        <option value="972">Bhanvad</option>

                                                        <option value="973">Jamnagar</option>

                                                        <option value="974">Okhamandal</option>

                                                        <option value="975">Porbandar</option>

                                                        <option value="976">Ranavav</option>

                                                        <option value="977">Junagadh</option>

                                                        <option value="978">Porbaandar</option>

                                                        <option value="979">Jodiya</option>

                                                        <option value="980">Khambhalia</option>

                                                        <option value="981">Jodia</option>

                                                        <option value="982">Lalpur</option>

                                                        <option value="983">Kahbhalia</option>

                                                        <option value="984">Kalyanpur</option>

                                                        <option value="985">Jamkalyanpur</option>

                                                        <option value="986">Bhesan</option>

                                                        <option value="987">Talala</option>

                                                        <option value="988">Keshod</option>

                                                        <option value="989">Vanthali(S)</option>

                                                        <option value="990">Mangrol</option>

                                                        <option value="991">Malia</option>

                                                        <option value="992">Malia Hatina</option>

                                                        <option value="993">Patan-Veraval</option>

                                                        <option value="994">Mendarda</option>

                                                        <option value="995">Sutrapada</option>

                                                        <option value="996">Una</option>

                                                        <option value="997">Vanthli</option>

                                                        <option value="998">Kodinar</option>

                                                        <option value="999">Amreli</option>

                                                        <option value="1000">Jafrabad</option>

                                                        <option value="1001">Wadhwancity</option>

                                                        <option value="1002">Wadhwanicity</option>

                                                        <option value="1003">Wadhwan</option>

                                                        <option value="1004">Surendranagar</option>

                                                        <option value="1005">Lakhtar</option>

                                                        <option value="1006">Lkhtar</option>

                                                        <option value="1007">Dhrangadhra</option>

                                                        <option value="1008">Dhrangsadhra</option>

                                                        <option value="1009">Dshrangadhra</option>

                                                        <option value="1010">Halvad</option>

                                                        <option value="1011">Navsari</option>

                                                        <option value="1012">Limbdi</option>

                                                        <option value="1013">Limndi</option>

                                                        <option value="1014">Surendra Nagar</option>

                                                        <option value="1015">Dhandhuka</option>

                                                        <option value="1016">Limbdiq</option>

                                                        <option value="1017">Muli</option>

                                                        <option value="1018">Chotila</option>

                                                        <option value="1019">Ahmedabad</option>

                                                        <option value="1020">Wankaner</option>

                                                        <option value="1021">Maliya Miyana</option>

                                                        <option value="1022">Morvi</option>

                                                        <option value="1023">Morbi</option>

                                                        <option value="1024">Taankaraa</option>

                                                        <option value="1025">Tankara</option>

                                                        <option value="1026">Dahisara</option>

                                                        <option value="1027">Malia(M)</option>

                                                        <option value="1028">Maliya</option>

                                                        <option value="1029">Bhavnagar</option>

                                                        <option value="1030">Gogha</option>

                                                        <option value="1031">Talaja</option>

                                                        <option value="1032">Mahuva</option>

                                                        <option value="1033">Sihor</option>

                                                        <option value="1034">Damnagar</option>

                                                        <option value="1035">Palitana</option>

                                                        <option value="1036">Umrala</option>

                                                        <option value="1037">Gariyadhar</option>

                                                        <option value="1038">Patan</option>

                                                        <option value="1039">Vallabhiopur</option>

                                                        <option value="1040">Vallabhipur</option>

                                                        <option value="1041">Vallbhiopur</option>

                                                        <option value="1042">Vallbhipur</option>

                                                        <option value="1043">Gadhada Sn</option>

                                                        <option value="1044">Lathi</option>

                                                        <option value="1045">Vadia</option>

                                                        <option value="1046">Jesar</option>

                                                        <option value="1047">Savar Kundla</option>

                                                        <option value="1048">Savarkundla</option>

                                                        <option value="1049">Rajula</option>

                                                        <option value="1050">Chalala</option>

                                                        <option value="1051">Botad</option>

                                                        <option value="1052">Gadhada</option>

                                                        <option value="1053">Babra</option>

                                                        <option value="1054">Bagasara</option>

                                                        <option value="1055">Visavadar</option>

                                                        <option value="1056">Kunkvav-Vadia</option>

                                                        <option value="1057">Bagsra</option>

                                                        <option value="1058">Kunkavav Vadia</option>

                                                        <option value="1059">Liliya</option>

                                                        <option value="1060">Khambha</option>

                                                        <option value="1061">Dhari</option>

                                                        <option value="1062">Bhuj</option>

                                                        <option value="1063">Nakhatrana</option>

                                                        <option value="1064">Anjar</option>

                                                        <option value="1065">Bhachau</option>

                                                        <option value="1066">Abdasa</option>

                                                        <option value="1067">Rahpar</option>

                                                        <option value="1068">Rapar</option>

                                                        <option value="1069">Gandhidham</option>

                                                        <option value="1070">Mundra</option>

                                                        <option value="1071">K. Mandvi</option>

                                                        <option value="1072">Mandvi</option>

                                                        <option value="1073">Mandavi</option>

                                                        <option value="1074">Kachchh</option>

                                                        <option value="1075">Lakhpat</option>

                                                        <option value="1076">Lakhapat</option>

                                                        <option value="1077">Kachch</option>

                                                        <option value="1078">Ahmadabad City</option>

                                                        <option value="1079">City Taluka</option>

                                                        <option value="1080">Daskroi</option>

                                                        <option value="1081">Sanand</option>

                                                        <option value="1082">Gandhinagar</option>

                                                        <option value="1083">Gandhi Nagar</option>

                                                        <option value="1084">Sannad</option>

                                                        <option value="1085">Viramgam</option>

                                                        <option value="1086">Kadi</option>

                                                        <option value="1087">Kalol</option>

                                                        <option value="1088">Detroj Rampura</option>

                                                        <option value="1089">Detroj- Rampura</option>

                                                        <option value="1090">Detroj-Rampura</option>

                                                        <option value="1091">Mandal</option>

                                                        <option value="1092">Patdi</option>

                                                        <option value="1093">Detrioj-Rampura</option>

                                                        <option value="1094">Dascroi</option>

                                                        <option value="1095">Bavla</option>

                                                        <option value="1096">Dholka</option>

                                                        <option value="1097">Ranpur</option>

                                                        <option value="1098">Barwala</option>

                                                        <option value="1099">Dehgam</option>

                                                        <option value="1100">Dasroi</option>

                                                        <option value="1101">Ahmedabad City</option>

                                                        <option value="1102">Mahesana</option>

                                                        <option value="1103">Boriavi</option>

                                                        <option value="1104">Mansa</option>

                                                        <option value="1105">Dasada</option>

                                                        <option value="1106">Dasda</option>

                                                        <option value="1107">Dasdaa</option>

                                                        <option value="1108">Vijapur</option>

                                                        <option value="1109">Satlasana</option>

                                                        <option value="1110">Visnagar</option>

                                                        <option value="1111">Himatnagar</option>

                                                        <option value="1112">Himatnagar.</option>

                                                        <option value="1113">Idar</option>

                                                        <option value="1114">Himatanagar</option>

                                                        <option value="1115">Prantij</option>

                                                        <option value="1116">Talod</option>

                                                        <option value="1117">Khedbrahma</option>

                                                        <option value="1118">Vadali</option>

                                                        <option value="1119">Bhiloda</option>

                                                        <option value="1120">Vijaynagar</option>

                                                        <option value="1121">Modasa</option>

                                                        <option value="1122">Meghraj</option>

                                                        <option value="1123">Bayad</option>

                                                        <option value="1124">Dhansura</option>

                                                        <option value="1125">Malpur</option>

                                                        <option value="1126">Sabarkantha</option>

                                                        <option value="1127">Vijaynagar.</option>

                                                        <option value="1128">Becharaji</option>

                                                        <option value="1129">Kheralu</option>

                                                        <option value="1130">Unjha</option>

                                                        <option value="1131">Sidhpur</option>

                                                        <option value="1132">Vadnagar</option>

                                                        <option value="1133">Chanasma</option>

                                                        <option value="1134">Harij</option>

                                                        <option value="1135">Sami</option>

                                                        <option value="1136">Santalpur</option>

                                                        <option value="1137">Dabhoi</option>

                                                        <option value="1138">Satalasana</option>

                                                        <option value="1139">Vadnabar</option>

                                                        <option value="1140">Amirgadh</option>

                                                        <option value="1141">Banaskantha</option>

                                                        <option value="1142">Palanpur</option>

                                                        <option value="1143">Vadgam</option>

                                                        <option value="1144">Danta</option>

                                                        <option value="1145">Shri Amirgadh</option>

                                                        <option value="1146">Shriamirgadh</option>

                                                        <option value="1147">Vadagam</option>

                                                        <option value="1148">Dhanera</option>

                                                        <option value="1149">Tharad</option>

                                                        <option value="1150">Bhabhar</option>

                                                        <option value="1151">Deodar</option>

                                                        <option value="1152">Radhanpur</option>

                                                        <option value="1153">Santalpurp</option>

                                                        <option value="1154">Dantiwada</option>

                                                        <option value="1155">Disa</option>

                                                        <option value="1156">Deesa</option>

                                                        <option value="1157">Kankraj</option>

                                                        <option value="1158">Kankrej</option>

                                                        <option value="1159">Vav</option>

                                                        <option value="1160">Nadiad</option>

                                                        <option value="1161">Naidiad</option>

                                                        <option value="1162">Mahemdavad</option>

                                                        <option value="1163">Mehmedabad</option>

                                                        <option value="1164">Umreth</option>

                                                        <option value="1165">Kheda</option>

                                                        <option value="1166">Mahemdabad</option>

                                                        <option value="1167">Sojitra</option>

                                                        <option value="1168">Matar</option>

                                                        <option value="1169">Mahudha</option>

                                                        <option value="1170">Anand</option>

                                                        <option value="1171">Kathlal</option>

                                                        <option value="1172">Petlad</option>

                                                        <option value="1173">Kapadwanj</option>

                                                        <option value="1174">Tarapur</option>

                                                        <option value="1175">Kapadvanj</option>

                                                        <option value="1176">Borsad</option>

                                                        <option value="1177">Perlad</option>

                                                        <option value="1178">Khambhat</option>

                                                        <option value="1179">Tarapura=</option>

                                                        <option value="1180">Unreth</option>

                                                        <option value="1181">Thasra</option>

                                                        <option value="1182">Birpur</option>

                                                        <option value="1183">Thsra</option>

                                                        <option value="1184">Balasinor</option>

                                                        <option value="1185">Virpur</option>

                                                        <option value="1186">Lunawada</option>

                                                        <option value="1187">Panchmahals</option>

                                                        <option value="1188">Anklav</option>

                                                        <option value="1189">Godhra</option>

                                                        <option value="1190">Savli</option>

                                                        <option value="1191">Godhara</option>

                                                        <option value="1192">Shehera</option>

                                                        <option value="1193">Santrampur</option>

                                                        <option value="1194">Morwa (Hadaf)</option>

                                                        <option value="1195">Morva Hadaf</option>

                                                        <option value="1196">Devgadbaria</option>

                                                        <option value="1197">Devgadh Baria</option>

                                                        <option value="1198">Limkheda</option>

                                                        <option value="1199">Dhanpur</option>

                                                        <option value="1200">Dohad</option>

                                                        <option value="1201">Dahod</option>

                                                        <option value="1202">Garbada</option>

                                                        <option value="1203">Panchamahals</option>

                                                        <option value="1204">Jhalod</option>

                                                        <option value="1205">Fatepura</option>

                                                        <option value="1206">Jahlod</option>

                                                        <option value="1207">Likheda</option>

                                                        <option value="1208">Khanpur</option>

                                                        <option value="1209">Kadana</option>

                                                        <option value="1210">Santrampura</option>

                                                        <option value="1211">Ghoghamba</option>

                                                        <option value="1212">Ghoghmba</option>

                                                        <option value="1213">Halol</option>

                                                        <option value="1214">Holol</option>

                                                        <option value="1215">Jambughoda</option>

                                                        <option value="1216">Vadodara</option>

                                                        <option value="1217">Sinor</option>

                                                        <option value="1218">Narmada</option>

                                                        <option value="1219">Tilakwada</option>

                                                        <option value="1220">Naswadi</option>

                                                        <option value="1221">Sankheda</option>

                                                        <option value="1222">Bodeli</option>

                                                        <option value="1223">Pavijetpur</option>

                                                        <option value="1224">Nasvadi</option>

                                                        <option value="1225">Chhotaudepur</option>

                                                        <option value="1226">Pavijetpura</option>

                                                        <option value="1227">Chhota Udepur</option>

                                                        <option value="1228">Chhota-Udepur</option>

                                                        <option value="1229">Ch.Udepur</option>

                                                        <option value="1230">Kawant</option>

                                                        <option value="1231">Karjan</option>

                                                        <option value="1232">Padra</option>

                                                        <option value="1233">Rajpipla</option>

                                                        <option value="1234">Vaghodia</option>

                                                        <option value="1235">Vaghoida</option>

                                                        <option value="1236">Vaghodida</option>

                                                        <option value="1237">Anklesvar</option>

                                                        <option value="1238">Jambusar</option>

                                                        <option value="1239">Nandod</option>

                                                        <option value="1240">Bharuch</option>

                                                        <option value="1241">Bahruch</option>

                                                        <option value="1242">Amod</option>

                                                        <option value="1243">Hansot</option>

                                                        <option value="1244">Vagra</option>

                                                        <option value="1245">Jhagadia</option>

                                                        <option value="1246">Dediapada</option>

                                                        <option value="1247">Jambsuar</option>

                                                        <option value="1248">Ankleshwar</option>

                                                        <option value="1249">Andada</option>

                                                        <option value="1250">Sagbara</option>

                                                        <option value="1251">Surat</option>

                                                        <option value="1252">Rajpipala</option>

                                                        <option value="1253">Valia</option>

                                                        <option value="1254">Nadod</option>

                                                        <option value="1255">Chorasi</option>

                                                        <option value="1256">Chorayasi</option>

                                                        <option value="1257">Olpad</option>

                                                        <option value="1258">Sayan</option>

                                                        <option value="1259">Kamrej</option>

                                                        <option value="1260">Makrej</option>

                                                        <option value="1261">Surat City</option>

                                                        <option value="1262">Udhna</option>

                                                        <option value="1263">Sachin</option>

                                                        <option value="1264">Lajpore</option>

                                                        <option value="1265">Valod</option>

                                                        <option value="1266">Bardoli</option>

                                                        <option value="1267">Choryasi</option>

                                                        <option value="1268">Palsana</option>

                                                        <option value="1269">Songadh</option>

                                                        <option value="1270">Vyara</option>

                                                        <option value="1271">Fort Songadh</option>

                                                        <option value="1272">Nijhar</option>

                                                        <option value="1273">Nizar</option>

                                                        <option value="1274">Uchchhal</option>

                                                        <option value="1275">Velachha</option>

                                                        <option value="1276">Umarpada</option>

                                                        <option value="1277">Vankal</option>

                                                        <option value="1278">Zankhvav</option>

                                                        <option value="1279">Variav</option>

                                                        <option value="1280">Ahwa</option>

                                                        <option value="1281">Dang</option>

                                                        <option value="1282">Dangs</option>

                                                        <option value="1283">The Dangs</option>

                                                        <option value="1284">Valsad</option>

                                                        <option value="1285">Dharampur</option>

                                                        <option value="1286">Hanuman Bhagda</option>

                                                        <option value="1287">Chikhli</option>

                                                        <option value="1288">Bansda</option>

                                                        <option value="1289">Vansda</option>

                                                        <option value="1290">Kaprada</option>

                                                        <option value="1291">Umargam</option>

                                                        <option value="1292">Umbergaon</option>

                                                        <option value="1293">Gandevi</option>

                                                        <option value="1294">Pardi</option>

                                                        <option value="1295">Umargarm</option>

                                                        <option value="1296">Dadra &amp; Nagar Haveli</option>

                                                        <option value="1297">Dungri</option>

                                                        <option value="1298">Jalalpore</option>

                                                        <option value="1299">Jalalporre</option>

                                                        <option value="1300">Mumbai</option>

                                                        <option value="1301">Bandra</option>

                                                        <option value="1302">Jogeshwari East</option>

                                                        <option value="1303">Goregaon</option>

                                                        <option value="1304">Goregaon East</option>

                                                        <option value="1305">Malad West</option>

                                                        <option value="1306">Borivali East</option>

                                                        <option value="1307">Borivlai East</option>

                                                        <option value="1308">Kandivali West</option>

                                                        <option value="1309">Kandivlai West</option>

                                                        <option value="1310">Dahisar East</option>

                                                        <option value="1311">Dahisar West</option>

                                                        <option value="1312">Borivali West</option>

                                                        <option value="1313">Malad East</option>

                                                        <option value="1314">Kandivali East</option>

                                                        <option value="1315">Jogeshwari West</option>

                                                        <option value="1316">Goregaon West</option>

                                                        <option value="1317">Thane</option>

                                                        <option value="1318">Navi Mumbai</option>

                                                        <option value="1319">Rabale</option>

                                                        <option value="1320">Uran</option>

                                                        <option value="1321">Digha</option>

                                                        <option value="1322">Bhayander</option>

                                                        <option value="1323">Mokhada</option>

                                                        <option value="1324">Palghar</option>

                                                        <option value="1325">Dahanu</option>

                                                        <option value="1326">Mira Road</option>

                                                        <option value="1327">Vasai</option>

                                                        <option value="1328">Bassein</option>

                                                        <option value="1329">Bhiwandi</option>

                                                        <option value="1330">Vada</option>

                                                        <option value="1331">Gokhivare</option>

                                                        <option value="1332">Vikramgad</option>

                                                        <option value="1333">Talasari</option>

                                                        <option value="1334">Jawhar</option>

                                                        <option value="1335">Mhasla</option>

                                                        <option value="1336">Mahad</option>

                                                        <option value="1337">Mangaon</option>

                                                        <option value="1338">Raigad</option>

                                                        <option value="1339">Roha</option>

                                                        <option value="1340">Pen</option>

                                                        <option value="1341">Alibag</option>

                                                        <option value="1342">Murud</option>

                                                        <option value="1343">Shrivardhan</option>

                                                        <option value="1344">Shriwardhan</option>

                                                        <option value="1345">Tala</option>

                                                        <option value="1346">Poladpur</option>

                                                        <option value="1347">Nandgaon</option>

                                                        <option value="1348">Karjat</option>

                                                        <option value="1349">Panvel</option>

                                                        <option value="1350">Khalapur</option>

                                                        <option value="1351">Khopoli</option>

                                                        <option value="1352">Sudhagad</option>

                                                        <option value="1353">Kamothe</option>

                                                        <option value="1354">Kalamboli</option>

                                                        <option value="1355">Maval</option>

                                                        <option value="1356">Mawal</option>

                                                        <option value="1357">Pune</option>

                                                        <option value="1358">Khed</option>

                                                        <option value="1359">Junnar</option>

                                                        <option value="1360">Ambegaon</option>

                                                        <option value="1361">Shirur</option>

                                                        <option value="1362">Mulshi</option>

                                                        <option value="1363">Pune City</option>

                                                        <option value="1364">Haveli</option>

                                                        <option value="1365">Mulashi</option>

                                                        <option value="1366">Baramati</option>

                                                        <option value="1367">Purandar</option>

                                                        <option value="1368">Velhe</option>

                                                        <option value="1369">Daund</option>

                                                        <option value="1370">Bhor</option>

                                                        <option value="1371">Purandhar</option>

                                                        <option value="1372">Khandala</option>

                                                        <option value="1373">Shiurur</option>

                                                        <option value="1374">Shirwal S.O</option>

                                                        <option value="1375">Kanandala Bawada</option>

                                                        <option value="1376">Kandala Bawada</option>

                                                        <option value="1377">Khandala Bawada</option>

                                                        <option value="1378">Khandala Bawada.</option>

                                                        <option value="1379">Khandalabavada</option>

                                                        <option value="1380">Khandalabawada</option>

                                                        <option value="1381">Wai</option>

                                                        <option value="1382">Jawali</option>

                                                        <option value="1383">Mahabaleshwar</option>

                                                        <option value="1384">Mahabaleshawar</option>

                                                        <option value="1385">Mahabaleshwr</option>

                                                        <option value="1386">Solapur North</option>

                                                        <option value="1387">N.Solapur</option>

                                                        <option value="1388">North Solapur</option>

                                                        <option value="1389">Solapur South</option>

                                                        <option value="1390">Nort Solapur</option>

                                                        <option value="1391">Solapur</option>

                                                        <option value="1392">Madha</option>

                                                        <option value="1393">Malshiras</option>

                                                        <option value="1394">Pandharpur</option>

                                                        <option value="1395">Indapur</option>

                                                        <option value="1396">Malsiras</option>

                                                        <option value="1397">Malshira</option>

                                                        <option value="1398">Malsras</option>

                                                        <option value="1399">Sholapur</option>

                                                        <option value="1400">Ahmednagar</option>

                                                        <option value="1401">Jamkhed</option>

                                                        <option value="1402">Karmala</option>

                                                        <option value="1403">Karmalaa</option>

                                                        <option value="1404">Patoda</option>

                                                        <option value="1405">Mahda</option>

                                                        <option value="1406">Mhol</option>

                                                        <option value="1407">Mohol</option>

                                                        <option value="1408">South Solapur</option>

                                                        <option value="1409">Akkaikot</option>

                                                        <option value="1410">Akkalkot</option>

                                                        <option value="1411">Barshi</option>

                                                        <option value="1412">S.Solapur</option>

                                                        <option value="1413">Bid</option>

                                                        <option value="1414">Shirur (Kasar)</option>

                                                        <option value="1415">Shirur K</option>

                                                        <option value="1416">Pamdharpur</option>

                                                        <option value="1417">Mangalvedha</option>

                                                        <option value="1418">Mangalvedhe</option>

                                                        <option value="1419">Sangola</option>

                                                        <option value="1420">Sngola</option>

                                                        <option value="1421">Sangole</option>

                                                        <option value="1422">Snagola</option>

                                                        <option value="1423">Sangli</option>

                                                        <option value="1424">Mangalwedha</option>

                                                        <option value="1425">Osmanabad</option>

                                                        <option value="1426">Paranda</option>

                                                        <option value="1427">Vashi</option>

                                                        <option value="1428">Washi</option>

                                                        <option value="1429">Bhoom</option>

                                                        <option value="1430">Kallam</option>

                                                        <option value="1431">Latur</option>

                                                        <option value="1432">Kalamb</option>

                                                        <option value="1433">Ahmadpur</option>

                                                        <option value="1434">Chakur</option>

                                                        <option value="1435">Ahmedpur</option>

                                                        <option value="1436">Ahmedpuer</option>

                                                        <option value="1437">Ausa</option>

                                                        <option value="1438">Shirur-Anantpal</option>

                                                        <option value="1439">Udgir</option>

                                                        <option value="1440">Deoni</option>

                                                        <option value="1441">Nilanga</option>

                                                        <option value="1442">Renapur</option>

                                                        <option value="1443">Jalkot</option>

                                                        <option value="1444">Shirur Anantpal</option>

                                                        <option value="1445">Tuljapur</option>

                                                        <option value="1446">Umarga</option>

                                                        <option value="1447">Omerga</option>

                                                        <option value="1448">Lohara</option>

                                                        <option value="1449">Shrigonda</option>

                                                        <option value="1450">Rahuri</option>

                                                        <option value="1451">Rahata</option>

                                                        <option value="1452">Kopargaon</option>

                                                        <option value="1453">Shrirampur</option>

                                                        <option value="1454">Sangamner</option>

                                                        <option value="1455">Pathardi</option>

                                                        <option value="1456">Parner</option>

                                                        <option value="1457">Newasa</option>

                                                        <option value="1458">Ashti</option>

                                                        <option value="1459">Beed</option>

                                                        <option value="1460">Shirur K.</option>

                                                        <option value="1461">Shevgaon</option>

                                                        <option value="1462">Satara</option>

                                                        <option value="1463">Koregaon</option>

                                                        <option value="1464">Karad</option>

                                                        <option value="1465">Patan</option>

                                                        <option value="1466">Satara.Satara</option>

                                                        <option value="1467">Kahatav</option>

                                                        <option value="1468">Man (Dahiwadi)</option>

                                                        <option value="1469">Shahuwadi</option>

                                                        <option value="1470">Khatav</option>

                                                        <option value="1471">Karad.</option>

                                                        <option value="1472">Ratnagiri</option>

                                                        <option value="1473">Mandangad</option>

                                                        <option value="1474">Dapoli</option>

                                                        <option value="1475">Atpadi</option>

                                                        <option value="1476">Valva</option>

                                                        <option value="1477">Walva</option>

                                                        <option value="1478">Kadegaon</option>

                                                        <option value="1479">Palus</option>

                                                        <option value="1480">Kahanapur</option>

                                                        <option value="1481">Khanapur</option>

                                                        <option value="1482">Khnapur</option>

                                                        <option value="1483">Kahanpur</option>

                                                        <option value="1484">Shirala</option>

                                                        <option value="1485">Shiala</option>

                                                        <option value="1486">Satara Koregaon</option>

                                                        <option value="1487">Man</option>

                                                        <option value="1488">Man(Dahivadi)</option>

                                                        <option value="1489">Jawoli</option>

                                                        <option value="1490">Patan.</option>

                                                        <option value="1491">Phaltan</option>

                                                        <option value="1492">Kahandala Bawada</option>

                                                        <option value="1493">Kahandala Bawda</option>

                                                        <option value="1494">Phalatan</option>

                                                        <option value="1495">Aurangabad</option>

                                                        <option value="1496">Chiplun</option>

                                                        <option value="1497">Sangmeshwar</option>

                                                        <option value="1498">Snagmeshwar</option>

                                                        <option value="1499">Sanmeshwar</option>

                                                        <option value="1500">Guhagar</option>

                                                        <option value="1501">Khed (Rtg)</option>

                                                        <option value="1502">Lanja</option>

                                                        <option value="1503">Rajapur</option>

                                                        <option value="1504">Javali</option>

                                                        <option value="1505">Karveer</option>

                                                        <option value="1506">Karveern</option>

                                                        <option value="1507">Karvir</option>

                                                        <option value="1508">Radhanagari</option>

                                                        <option value="1509">Hatkanangle</option>

                                                        <option value="1510">Hatkanangale</option>

                                                        <option value="1511">Shirol</option>

                                                        <option value="1512">Hatkanagale</option>

                                                        <option value="1513">Panhala</option>

                                                        <option value="1514">Kolhapur</option>

                                                        <option value="1515">Gaganbavada</option>

                                                        <option value="1516">Kagal</option>

                                                        <option value="1517">Bhudargad</option>

                                                        <option value="1518">Ajara</option>

                                                        <option value="1519">Ajra</option>

                                                        <option value="1520">Gadhinglaj</option>

                                                        <option value="1521">Miraj</option>

                                                        <option value="1522">Tasgaon</option>

                                                        <option value="1523">Jat</option>

                                                        <option value="1524">Jath</option>

                                                        <option value="1525">Kavathe Mahankal</option>

                                                        <option value="1526">Kavthe Mahankal</option>

                                                        <option value="1527">K Mahankal</option>

                                                        <option value="1528">K Mhankal</option>

                                                        <option value="1529">K. Mahankal</option>

                                                        <option value="1530">Chandgad</option>

                                                        <option value="1531">Sawantwadi</option>

                                                        <option value="1532">Sawanwtadi</option>

                                                        <option value="1533">Dodamarg</option>

                                                        <option value="1534">Vengurla</option>

                                                        <option value="1535">Kudal</option>

                                                        <option value="1536">Sindhudurgkudal</option>

                                                        <option value="1537">Oras</option>

                                                        <option value="1538">Malvan</option>

                                                        <option value="1539">Devgad</option>

                                                        <option value="1540">Kankavli</option>

                                                        <option value="1541">Malwan</option>

                                                        <option value="1542">Malvsn</option>

                                                        <option value="1543">Sindhudurg</option>

                                                        <option value="1544">Kanakvli</option>

                                                        <option value="1545">Kankal I</option>

                                                        <option value="1546">Kankalvi</option>

                                                        <option value="1547">Kankavi</option>

                                                        <option value="1548">Vaibhavwadi</option>

                                                        <option value="1549">Kalyan</option>

                                                        <option value="1550">Ulhasnagar</option>

                                                        <option value="1551">Ambarnath</option>

                                                        <option value="1552">Wada</option>

                                                        <option value="1553">Wade</option>

                                                        <option value="1554">Murbad</option>

                                                        <option value="1555">Shahapur</option>

                                                        <option value="1556">Badlapur</option>

                                                        <option value="1557">Nasik</option>

                                                        <option value="1558">Dindori</option>

                                                        <option value="1559">Niphad</option>

                                                        <option value="1560">Surgana</option>

                                                        <option value="1561">Peint</option>

                                                        <option value="1562">Sinnar</option>

                                                        <option value="1563">Trimabakeshwar</option>

                                                        <option value="1564">Peth</option>

                                                        <option value="1565">Chandwad</option>

                                                        <option value="1566">Kalwan</option>

                                                        <option value="1567">Igatpuri</option>

                                                        <option value="1568">Akole</option>

                                                        <option value="1569">Deola</option>

                                                        <option value="1570">Malegaon</option>

                                                        <option value="1571">Yeola</option>

                                                        <option value="1572">Satana</option>

                                                        <option value="1573">Jalgaon</option>

                                                        <option value="1574">Vaijapur</option>

                                                        <option value="1575">Gangapur</option>

                                                        <option value="1576">Dhule</option>

                                                        <option value="1577">Chalisgaon</option>

                                                        <option value="1578">Bhadgaon</option>

                                                        <option value="1579">Pachora</option>

                                                        <option value="1580">Chalisgoan</option>

                                                        <option value="1581">Jalgoan</option>

                                                        <option value="1582">Sakri</option>

                                                        <option value="1583">Shindkheda</option>

                                                        <option value="1584">Dharangaon</option>

                                                        <option value="1585">Dharagaon</option>

                                                        <option value="1586">Erandol</option>

                                                        <option value="1587">Parola</option>

                                                        <option value="1588">Bhusawal</option>

                                                        <option value="1589">Yawal</option>

                                                        <option value="1590">Chopda</option>

                                                        <option value="1591">Muktainagar</option>

                                                        <option value="1592">Bodwad</option>

                                                        <option value="1593">Raver</option>

                                                        <option value="1594">Muktai Nagar</option>

                                                        <option value="1595">Amalner</option>

                                                        <option value="1596">Shirpur</option>

                                                        <option value="1597">Shahada</option>

                                                        <option value="1598">Nandurbar</option>

                                                        <option value="1599">Taloda</option>

                                                        <option value="1600">Dhadgaon</option>

                                                        <option value="1601">Akkalkuwa</option>

                                                        <option value="1602">Navapur</option>

                                                        <option value="1603">Phulumbri</option>

                                                        <option value="1604">Khuldabad</option>

                                                        <option value="1605">Kannad</option>

                                                        <option value="1606">Paithan</option>

                                                        <option value="1607">Ambad</option>

                                                        <option value="1608">Phulambri</option>

                                                        <option value="1609">Sillod</option>

                                                        <option value="1610">Bhokardan</option>

                                                        <option value="1611">Bholardan</option>

                                                        <option value="1612">Bhorkardan</option>

                                                        <option value="1613">Valijapur</option>

                                                        <option value="1614">Soegaon</option>

                                                        <option value="1615">Kaij</option>

                                                        <option value="1616">Dharur</option>

                                                        <option value="1617">K Dharur</option>

                                                        <option value="1618">Kille Dahrur</option>

                                                        <option value="1619">Kille Dharur</option>

                                                        <option value="1620">Wadwani</option>

                                                        <option value="1621">Georai</option>

                                                        <option value="1622">Gevrai</option>

                                                        <option value="1623">Majalgaon</option>

                                                        <option value="1624">Majalgoan</option>

                                                        <option value="1625">Manjlegaon</option>

                                                        <option value="1626">Majalgaon S.O.</option>

                                                        <option value="1627">Badnapur</option>

                                                        <option value="1628">Badnapura</option>

                                                        <option value="1629">Jalna</option>

                                                        <option value="1630">Jaffrabad</option>

                                                        <option value="1631">Ghansawangi</option>

                                                        <option value="1632">Ghanwangi</option>

                                                        <option value="1633">Parbhani</option>

                                                        <option value="1634">Purna</option>

                                                        <option value="1635">Basmath</option>

                                                        <option value="1636">Mantha</option>

                                                        <option value="1637">Partur</option>

                                                        <option value="1638">Sailu</option>

                                                        <option value="1639">Manwath</option>

                                                        <option value="1640">Pathri</option>

                                                        <option value="1641">Jintur</option>

                                                        <option value="1642">Aundha Nagnath</option>

                                                        <option value="1643">Basmathnagar</option>

                                                        <option value="1644">Hingoli</option>

                                                        <option value="1645">Gangakhed</option>

                                                        <option value="1646">Parli</option>

                                                        <option value="1647">Parli Vaij.</option>

                                                        <option value="1648">Parli Vaijinath</option>

                                                        <option value="1649">Parlivaij</option>

                                                        <option value="1650">Sonpeth</option>

                                                        <option value="1651">Ambajgoai</option>

                                                        <option value="1652">Ambajogai</option>

                                                        <option value="1653">Ambejogai</option>

                                                        <option value="1654">Parli Vai.J</option>

                                                        <option value="1655">Palam</option>

                                                        <option value="1656">Sengaon</option>

                                                        <option value="1657">Bhokar</option>

                                                        <option value="1658">Nanded</option>

                                                        <option value="1659">Loha</option>

                                                        <option value="1660">Naigaon</option>

                                                        <option value="1661">Himayatnagar</option>

                                                        <option value="1662">Kalamnuri</option>

                                                        <option value="1663">Ardhapur</option>

                                                        <option value="1664">Biloi</option>

                                                        <option value="1665">Biloli</option>

                                                        <option value="1666">Hadgaon</option>

                                                        <option value="1667">Kandahr</option>

                                                        <option value="1668">Kandhar</option>

                                                        <option value="1669">Mukhed</option>

                                                        <option value="1670">Degloor</option>

                                                        <option value="1671">Mahore</option>

                                                        <option value="1672">Kandhr</option>

                                                        <option value="1673">Mudkhed</option>

                                                        <option value="1674">Bvhokar</option>

                                                        <option value="1675">Kinwat</option>

                                                        <option value="1676">Umari</option>

                                                        <option value="1677">Dharmabad</option>

                                                        <option value="1678">Kiwat</option>

                                                        <option value="1679">Nagpur</option>

                                                        <option value="1680">Nagpur (Urban)</option>

                                                        <option value="1681">Hingna</option>

                                                        <option value="1682">Kamthi</option>

                                                        <option value="1683">Kamptee</option>

                                                        <option value="1684">Saoner</option>

                                                        <option value="1685">Savner</option>

                                                        <option value="1686">Parsioni</option>

                                                        <option value="1687">Katol</option>

                                                        <option value="1688">Mauda</option>

                                                        <option value="1689">Mouda</option>

                                                        <option value="1690">Parseoni</option>

                                                        <option value="1691">Ramtek</option>

                                                        <option value="1692">Kalameshwar</option>

                                                        <option value="1693">Nagpur (Rural)</option>

                                                        <option value="1694">Bhiwapur</option>

                                                        <option value="1695">Kuhi</option>

                                                        <option value="1696">Umred</option>

                                                        <option value="1697">Umrer</option>

                                                        <option value="1698">Chandrapur</option>

                                                        <option value="1699">Nabhid</option>

                                                        <option value="1700">Nagbhid</option>

                                                        <option value="1701">Bramhapuri</option>

                                                        <option value="1702">Nagbhir</option>

                                                        <option value="1703">Desaiganj</option>

                                                        <option value="1704">Armori</option>

                                                        <option value="1705">Korchi</option>

                                                        <option value="1706">Kurkheda</option>

                                                        <option value="1707">Mul</option>

                                                        <option value="1708">Saoli</option>

                                                        <option value="1709">Sindewahi</option>

                                                        <option value="1710">Nagbhri</option>

                                                        <option value="1711">Narbhir</option>

                                                        <option value="1712">Gondpipri</option>

                                                        <option value="1713">Narkhed</option>

                                                        <option value="1714">Narkher</option>

                                                        <option value="1715">Mansar</option>

                                                        <option value="1716">Kalmeshwar</option>

                                                        <option value="1717">Nagpur Rural</option>

                                                        <option value="1718">Gondia</option>

                                                        <option value="1719">Gondiya</option>

                                                        <option value="1720">Bhandara</option>

                                                        <option value="1721">Arjuni Morgaon</option>

                                                        <option value="1722">Sakoli</option>

                                                        <option value="1723">Lakhandur</option>

                                                        <option value="1724">Lakhani</option>

                                                        <option value="1725">Lakhni</option>

                                                        <option value="1726">Sadak Arjuni</option>

                                                        <option value="1727">Sadak-Arjuni</option>

                                                        <option value="1728">Deori</option>

                                                        <option value="1729">Amgaon</option>

                                                        <option value="1730">Amgoan</option>

                                                        <option value="1731">Pauni</option>

                                                        <option value="1732">Mohadi</option>

                                                        <option value="1733">Bhandarra</option>

                                                        <option value="1734">Tumsar</option>

                                                        <option value="1735">Tirora</option>

                                                        <option value="1736">Salekasa</option>

                                                        <option value="1737">Seloo</option>

                                                        <option value="1738">Wardha</option>

                                                        <option value="1739">Deoli</option>

                                                        <option value="1740">Samudrapur</option>

                                                        <option value="1741">Samudraupr</option>

                                                        <option value="1742">Arvi</option>

                                                        <option value="1743">Karanja</option>

                                                        <option value="1744">Hinganghat</option>

                                                        <option value="1745">Hinganghjat</option>

                                                        <option value="1746">Dhamangaon Railway</option>

                                                        <option value="1747">Chandrapur Ho</option>

                                                        <option value="1748">Bhadrawati</option>

                                                        <option value="1749">Sironcha</option>

                                                        <option value="1750">Ballarpur</option>

                                                        <option value="1751">Chamorshi</option>

                                                        <option value="1752">Chamroshid</option>

                                                        <option value="1753">Gadchiroli</option>

                                                        <option value="1754">Sawali</option>

                                                        <option value="1755">Dhanora</option>

                                                        <option value="1756">Gondipipri</option>

                                                        <option value="1757">Aheri</option>

                                                        <option value="1758">Etapalli</option>

                                                        <option value="1759">Ettapalli</option>

                                                        <option value="1760">Chamorhsi</option>

                                                        <option value="1761">Mulchera</option>

                                                        <option value="1762">Bhamragadh</option>

                                                        <option value="1763">Chimur</option>

                                                        <option value="1764">Chimur Bo</option>

                                                        <option value="1765">Rajura</option>

                                                        <option value="1766">Warora</option>

                                                        <option value="1767">Chandur</option>

                                                        <option value="1768">Jiwati</option>

                                                        <option value="1769">Korpana</option>

                                                        <option value="1770">Korphana</option>

                                                        <option value="1771">Pombhurna</option>

                                                        <option value="1772">Buldana</option>

                                                        <option value="1773">Budlana</option>

                                                        <option value="1774">Buldhana</option>

                                                        <option value="1775">Chikhli</option>

                                                        <option value="1776">Malkapur</option>

                                                        <option value="1777">Motala</option>

                                                        <option value="1778">Sangrampur</option>

                                                        <option value="1779">Nandura</option>

                                                        <option value="1780">Deulgaon Raja</option>

                                                        <option value="1781">Dulgaon Raja</option>

                                                        <option value="1782">Lonar</option>

                                                        <option value="1783">Mehkar</option>

                                                        <option value="1784">Sindkhed Raja</option>

                                                        <option value="1785">Deulgaon Mahi</option>

                                                        <option value="1786">Loanr</option>

                                                        <option value="1787">Sinkhed Raja</option>

                                                        <option value="1788">Jalgaon (Jamod)</option>

                                                        <option value="1789">Khamgaon</option>

                                                        <option value="1790">Khamgoan</option>

                                                        <option value="1791">Nanadura</option>

                                                        <option value="1792">Shegaon</option>

                                                        <option value="1793">Akola</option>

                                                        <option value="1794">Washim</option>

                                                        <option value="1795">Akot</option>

                                                        <option value="1796">Telhara</option>

                                                        <option value="1797">Murtijapur</option>

                                                        <option value="1798">Balapur</option>

                                                        <option value="1799">Shegan</option>

                                                        <option value="1800">Sonala</option>

                                                        <option value="1801">Chikhali</option>

                                                        <option value="1802">Kahmgaon</option>

                                                        <option value="1803">Barshitakli</option>

                                                        <option value="1804">Mangrulpir</option>

                                                        <option value="1805">Amaravati</option>

                                                        <option value="1806">Amravati</option>

                                                        <option value="1807">Dharni</option>

                                                        <option value="1808">Chandur Bazar</option>

                                                        <option value="1809">Morshi</option>

                                                        <option value="1810">Anjangaon</option>

                                                        <option value="1811">Daryapu</option>

                                                        <option value="1812">Daryapur</option>

                                                        <option value="1813">Bhatkuli</option>

                                                        <option value="1814">Nandgaon Khandeshwar</option>

                                                        <option value="1815">Chandur Rly</option>

                                                        <option value="1816">Dhamangaon</option>

                                                        <option value="1817">Dhamangaon R.S.</option>

                                                        <option value="1818">Dhamangaon Rly</option>

                                                        <option value="1819">Achalpur City</option>

                                                        <option value="1820">Paratwada</option>

                                                        <option value="1821">Chikhaldara</option>

                                                        <option value="1822">Teosa</option>

                                                        <option value="1823">Tiosa</option>

                                                        <option value="1824">Chandur Railway</option>

                                                        <option value="1825">Chandur Raiway</option>

                                                        <option value="1826">Chandur Rly.</option>

                                                        <option value="1827">Warud</option>

                                                        <option value="1828">Yavatmal</option>

                                                        <option value="1829">Babhulgaon</option>

                                                        <option value="1830">Yeotamal</option>

                                                        <option value="1831">Ner Parsopant</option>

                                                        <option value="1832">Ner Persopant</option>

                                                        <option value="1833">Nr Persopant</option>

                                                        <option value="1834">Arni</option>

                                                        <option value="1835">Darwha</option>

                                                        <option value="1836">Ghatanji</option>

                                                        <option value="1837">Digras</option>

                                                        <option value="1838">Mahagaon</option>

                                                        <option value="1839">Pusad</option>

                                                        <option value="1840">Umarkhed</option>

                                                        <option value="1841">Umerkhed</option>

                                                        <option value="1842">Nerparsopant</option>

                                                        <option value="1843">Kalapur</option>

                                                        <option value="1844">Kelapur</option>

                                                        <option value="1845">Zari Jamni</option>

                                                        <option value="1846">Maregaon</option>

                                                        <option value="1847">Wani</option>

                                                        <option value="1848">Jhari Jamni</option>

                                                        <option value="1849">Ralegaon</option>

                                                        <option value="1850">Ralegoan</option>

                                                        <option value="1851">Rlegaon</option>

                                                        <option value="1852">North Goa</option>

                                                        <option value="1853">Tiswaddi</option>

                                                        <option value="1854">Tiswadi</option>

                                                        <option value="1855">Bardez</option>

                                                        <option value="1856">Ponda</option>

                                                        <option value="1857">Sattari</option>

                                                        <option value="1858">Sanquelim</option>

                                                        <option value="1859">Panaji</option>

                                                        <option value="1860">Queula</option>

                                                        <option value="1861">Quepem</option>

                                                        <option value="1862">Sanguem</option>

                                                        <option value="1863">Bicholim</option>

                                                        <option value="1864">Pernem</option>

                                                        <option value="1865">Salcete</option>

                                                        <option value="1866">Salcette</option>

                                                        <option value="1867">Margao</option>

                                                        <option value="1868">Canacona</option>

                                                        <option value="1869">Cancona</option>

                                                        <option value="1870">Sangaum</option>

                                                        <option value="1871">Curchorem</option>

                                                        <option value="1872">Marmugao</option>

                                                        <option value="1873">Mormugao</option>

                                                        <option value="1874">Salcate</option>

                                                        <option value="1875">Salsate</option>

                                                        <option value="1876">South Goa</option>

                                                        <option value="1877">Durg</option>

                                                        <option value="1878">Dhamdha</option>

                                                        <option value="1879">Patan</option>

                                                        <option value="1880">Patah</option>

                                                        <option value="1881">Gunderdehi</option>

                                                        <option value="1882">Balod</option>

                                                        <option value="1883">Sanjaribalod</option>

                                                        <option value="1884">Gurur</option>

                                                        <option value="1885">Dondi</option>

                                                        <option value="1886">Dondi Awari</option>

                                                        <option value="1887">Manpur</option>

                                                        <option value="1888">Berla</option>

                                                        <option value="1889">Bemetara</option>

                                                        <option value="1890">Kawardha</option>

                                                        <option value="1891">Nawgarh</option>

                                                        <option value="1892">Saja</option>

                                                        <option value="1893">Nandghat</option>

                                                        <option value="1894">Dongargaon</option>

                                                        <option value="1895">Khairagarh</option>

                                                        <option value="1896">Rajnandgaon</option>

                                                        <option value="1897">Dongargarh</option>

                                                        <option value="1898">Chhuria</option>

                                                        <option value="1899">Pandaria</option>

                                                        <option value="1900">Ambagarh Chowki</option>

                                                        <option value="1901">Mohla</option>

                                                        <option value="1902">Ambagarh</option>

                                                        <option value="1903">Dondi Lohara</option>

                                                        <option value="1904">Khairagarh Raj</option>

                                                        <option value="1905">Chhuikhadan</option>

                                                        <option value="1906">Gandai Pandaria</option>

                                                        <option value="1907">Raipur</option>

                                                        <option value="1908">Mana Camp</option>

                                                        <option value="1909">Dharsiwa</option>

                                                        <option value="1910">Mandir Hasod</option>

                                                        <option value="1911">Bindranawagarh</option>

                                                        <option value="1912">Chhura</option>

                                                        <option value="1913">Panduka</option>

                                                        <option value="1914">Basna</option>

                                                        <option value="1915">Mahasamund</option>

                                                        <option value="1916">Sankra</option>

                                                        <option value="1917">Simga</option>

                                                        <option value="1918">Manddar Cement Factory</option>

                                                        <option value="1919">Hathband</option>

                                                        <option value="1920">Neora</option>

                                                        <option value="1921">Baikunth</option>

                                                        <option value="1922">Bhatapara</option>

                                                        <option value="1923">Hirmi</option>

                                                        <option value="1924">Grasim Vihar Rawan</option>

                                                        <option value="1925">Birgaon</option>

                                                        <option value="1926">Bhatgaon</option>

                                                        <option value="1927">Bilaigarh</option>

                                                        <option value="1928">Arang</option>

                                                        <option value="1929">Kharora</option>

                                                        <option value="1930">Tilda</option>

                                                        <option value="1931">Pallari</option>

                                                        <option value="1932">Watgan</option>

                                                        <option value="1933">Baloda Bazar</option>

                                                        <option value="1934">Rawan</option>

                                                        <option value="1935">Kasdol</option>

                                                        <option value="1936">Katgi</option>

                                                        <option value="1937">Bagbahra</option>

                                                        <option value="1938">Lawan</option>

                                                        <option value="1939">Pithora</option>

                                                        <option value="1940">Jagdishpur</option>

                                                        <option value="1941">Saraipali</option>

                                                        <option value="1942">Sarsiwa</option>

                                                        <option value="1943">Abhanpur</option>

                                                        <option value="1944">Kurud</option>

                                                        <option value="1945">Dhamtari</option>

                                                        <option value="1946">Rudri</option>

                                                        <option value="1947">Nagri</option>

                                                        <option value="1948">Rajim</option>

                                                        <option value="1949">Phingeshwar</option>

                                                        <option value="1950">Gariaband</option>

                                                        <option value="1951">Deobhog</option>

                                                        <option value="1952">Bastar</option>

                                                        <option value="1953">Jagdalpur</option>

                                                        <option value="1954">Konta</option>

                                                        <option value="1955">Kondagaon</option>

                                                        <option value="1956">Keshkal</option>

                                                        <option value="1957">Kanker</option>

                                                        <option value="1958">Narharpur</option>

                                                        <option value="1959">Charama</option>

                                                        <option value="1960">Dantewada</option>

                                                        <option value="1961">Bijapur</option>

                                                        <option value="1962">Bhopalpatnam</option>

                                                        <option value="1963">Bhairamgarh</option>

                                                        <option value="1964">Bhanupratappur</option>

                                                        <option value="1965">Narayanpur</option>

                                                        <option value="1966">Antagarh</option>

                                                        <option value="1967">Pakhanjore</option>

                                                        <option value="1968">Bilaspur</option>

                                                        <option value="1969">Akaltara</option>

                                                        <option value="1970">Seepat</option>

                                                        <option value="1971">Koni</option>

                                                        <option value="1972">Ganiyari</option>

                                                        <option value="1973">Takhatpur</option>

                                                        <option value="1974">Kargi Road</option>

                                                        <option value="1975">Lormi</option>

                                                        <option value="1976">Belgahana</option>

                                                        <option value="1977">Belgahna</option>

                                                        <option value="1978">Pendra Road</option>

                                                        <option value="1979">Marwahi</option>

                                                        <option value="1980">Pendra</option>

                                                        <option value="1981">Bilha</option>

                                                        <option value="1982">Chakarbhata Camp</option>

                                                        <option value="1983">Hirri Mines</option>

                                                        <option value="1984">Mungeli</option>

                                                        <option value="1985">Patharia</option>

                                                        <option value="1986">Ratanpur</option>

                                                        <option value="1987">Katghora</option>

                                                        <option value="1988">Hardibazar</option>

                                                        <option value="1989">Korba</option>

                                                        <option value="1990">Bankimongra</option>

                                                        <option value="1991">Machadoli</option>

                                                        <option value="1992">Pali</option>

                                                        <option value="1993">Jamnipali</option>

                                                        <option value="1994">Kusmunda</option>

                                                        <option value="1995">Jairamnagar</option>

                                                        <option value="1996">Masturi</option>

                                                        <option value="1997">Dabhra</option>

                                                        <option value="1998">Janjgir</option>

                                                        <option value="1999">Nariyara</option>

                                                        <option value="2000">Pamgarh</option>

                                                        <option value="2001">Kharod</option>

                                                        <option value="2002">Seorinarayan</option>

                                                        <option value="2003">Janjgir-Champa</option>

                                                        <option value="2004">Baloda</option>

                                                        <option value="2005">Champa</option>

                                                        <option value="2006">Bamhni Bazar</option>

                                                        <option value="2007">Birra</option>

                                                        <option value="2008">Gopalnagar</option>

                                                        <option value="2009">Bhaisma</option>

                                                        <option value="2010">Manikpur</option>

                                                        <option value="2011">Rajgamar</option>

                                                        <option value="2012">Balconagar</option>

                                                        <option value="2013">Chamba</option>

                                                        <option value="2014">Baradwar</option>

                                                        <option value="2015">Sakti</option>

                                                        <option value="2016">Jaijaipur</option>

                                                        <option value="2017">Malkharoda</option>

                                                        <option value="2018">Chandrapur</option>

                                                        <option value="2019">Adbhar</option>

                                                        <option value="2020">Raigarh</option>

                                                        <option value="2021">Tamnar</option>

                                                        <option value="2022">Gharghoda</option>

                                                        <option value="2023">Dharmajaigarh</option>

                                                        <option value="2024">Udaipur (Dharamjaigarh)</option>

                                                        <option value="2025">Jashpur</option>

                                                        <option value="2026">Pathalgaon</option>

                                                        <option value="2027">Jashpurnagar</option>

                                                        <option value="2028">Bagicha</option>

                                                        <option value="2029">Kunkuri</option>

                                                        <option value="2030">Sarangarh</option>

                                                        <option value="2031">Saria</option>

                                                        <option value="2032">Kharsia</option>

                                                        <option value="2033">Ambikapur</option>

                                                        <option value="2034">Rajpur</option>

                                                        <option value="2035">Surguja</option>

                                                        <option value="2036">Sitapur</option>

                                                        <option value="2037">Lakhanpur</option>

                                                        <option value="2038">Pratappur</option>

                                                        <option value="2039">Kusmi</option>

                                                        <option value="2040">Surajpur</option>

                                                        <option value="2041">Baikunthapur</option>

                                                        <option value="2042">Koriya</option>

                                                        <option value="2043">Manendragarh</option>

                                                        <option value="2044">Chirimiri</option>

                                                        <option value="2045">Janakpur</option>

                                                        <option value="2046">Hyderabad</option>

                                                        <option value="2047">Nampally</option>

                                                        <option value="2048">Charminar</option>

                                                        <option value="2049">Secunderabad</option>

                                                        <option value="2050">Himayathnagar</option>

                                                        <option value="2051">Khairatabad</option>

                                                        <option value="2052">Bandlaguda</option>

                                                        <option value="2053">Saroornagar</option>

                                                        <option value="2054">Asifnagar</option>

                                                        <option value="2055">Golconda</option>

                                                        <option value="2056">Rajendranagar</option>

                                                        <option value="2057">Tirumalagiri</option>

                                                        <option value="2058">Malkagiri Manda</option>

                                                        <option value="2059">Amberpet</option>

                                                        <option value="2060">Rangareddy</option>

                                                        <option value="2061">Ameerpet</option>

                                                        <option value="2062">Balanagar</option>

                                                        <option value="2063">Serilingampally</option>

                                                        <option value="2064">Musheerabad</option>

                                                        <option value="2065">Saidabad</option>

                                                        <option value="2066">Seri Lingampally</option>

                                                        <option value="2067">Shaikpet</option>

                                                        <option value="2068">Uppal</option>

                                                        <option value="2069">Hyd</option>

                                                        <option value="2070">Bahadurpura</option>

                                                        <option value="2071">Hayathnagar</option>

                                                        <option value="2072">Moinabad</option>

                                                        <option value="2073">Rajendra Nagar</option>

                                                        <option value="2074">Shankarpally</option>

                                                        <option value="2075">Shameerpet</option>

                                                        <option value="2076">Shamirpet</option>

                                                        <option value="2077">Ghatkesar</option>

                                                        <option value="2078">Hyderabad City</option>

                                                        <option value="2079">Qutubullapur</option>

                                                        <option value="2080">Quthbullapur Mandal</option>

                                                        <option value="2081">Shamirpet Mandal</option>

                                                        <option value="2082">Ranga Reddy</option>

                                                        <option value="2083">Vikarabad</option>

                                                        <option value="2084">R</option>

                                                        <option value="2085">Nawabpet</option>

                                                        <option value="2086">Tandur</option>

                                                        <option value="2087">Rr.</option>

                                                        <option value="2088">Agnoor</option>

                                                        <option value="2089">Shamshabad</option>

                                                        <option value="2090">Medchal</option>

                                                        <option value="2091">Shabad</option>

                                                        <option value="2092">Hyderabad South East</option>

                                                        <option value="2093">Ibrahimpatnam</option>

                                                        <option value="2094">Maheswaram</option>

                                                        <option value="2095">Ainapur</option>

                                                        <option value="2096">Sangareddy</option>

                                                        <option value="2097">Ramachandrapuram</option>

                                                        <option value="2098">Medak</option>

                                                        <option value="2099">Siddipet</option>

                                                        <option value="2100">Dubbak</option>

                                                        <option value="2101">Zaheerabad</option>

                                                        <option value="2102">Zahirabad</option>

                                                        <option value="2103">Alladurg</option>

                                                        <option value="2104">Jogipet</option>

                                                        <option value="2105">Shankarampet (A)</option>

                                                        <option value="2106">Andole</option>

                                                        <option value="2107">Gujvail</option>

                                                        <option value="2108">Narayankhed</option>

                                                        <option value="2109">Sadasivpet</option>

                                                        <option value="2110">Patancheru</option>

                                                        <option value="2111">Papannapet</option>

                                                        <option value="2112">Narsapur</option>

                                                        <option value="2113">R.C.Puram</option>

                                                        <option value="2114">Nizamabad</option>

                                                        <option value="2115">Bhiknoor</option>

                                                        <option value="2116">Kamareddy</option>

                                                        <option value="2117">Lingampet</option>

                                                        <option value="2118">Machareddy</option>

                                                        <option value="2119">Palwancha</option>

                                                        <option value="2120">Yellareddy</option>

                                                        <option value="2121">Armoor</option>

                                                        <option value="2122">Dichpalle</option>

                                                        <option value="2123">Dharpalle</option>

                                                        <option value="2124">Bodhan</option>

                                                        <option value="2125">Banswada</option>

                                                        <option value="2126">Bichkunda</option>

                                                        <option value="2127">Varni</option>

                                                        <option value="2128">Yedpalle</option>

                                                        <option value="2129">Armur</option>

                                                        <option value="2130">Bardipur</option>

                                                        <option value="2131">Bheemgal</option>

                                                        <option value="2132">Madnoor</option>

                                                        <option value="2133">Adilabad</option>

                                                        <option value="2134">Bela</option>

                                                        <option value="2135">Mudhole</option>

                                                        <option value="2136">Bhainsa</option>

                                                        <option value="2137">Kubeer</option>

                                                        <option value="2138">Lokeswaram</option>

                                                        <option value="2139">Nirmal</option>

                                                        <option value="2140">Chennoor</option>

                                                        <option value="2141">Chennur</option>

                                                        <option value="2142">Kaddam (Peddur)</option>

                                                        <option value="2143">Khanapur</option>

                                                        <option value="2144">Luxettipet</option>

                                                        <option value="2145">Mancherial</option>

                                                        <option value="2146">Mandamarri</option>

                                                        <option value="2147">Bellampalle</option>

                                                        <option value="2148">Asifabad</option>

                                                        <option value="2149">Sirpur (T)</option>

                                                        <option value="2150">Kerameri</option>

                                                        <option value="2151">Bejjur</option>

                                                        <option value="2152">Kagaznagar</option>

                                                        <option value="2153">Sirpur(T)</option>

                                                        <option value="2154">Tiryani</option>

                                                        <option value="2155">Boath</option>

                                                        <option value="2156">Bazarhathnoor</option>

                                                        <option value="2157">Utnoor</option>

                                                        <option value="2158">Jainad</option>

                                                        <option value="2159">Narnoor</option>

                                                        <option value="2160">Sirpur</option>

                                                        <option value="2161">Tamsi</option>

                                                        <option value="2162">Jainoor</option>

                                                        <option value="2163">Neradigonda</option>

                                                        <option value="2164">Karimnagar</option>

                                                        <option value="2165">Peddapalli</option>

                                                        <option value="2166">Huzurabad</option>

                                                        <option value="2167">Jammikunta</option>

                                                        <option value="2168">Srirampur</option>

                                                        <option value="2169">Peddapalle</option>

                                                        <option value="2170">Manthani</option>

                                                        <option value="2171">Sultanabad</option>

                                                        <option value="2172">Ramagundam</option>

                                                        <option value="2173">Kamanpur</option>

                                                        <option value="2174">Konaraopet</option>

                                                        <option value="2175">Sircilla</option>

                                                        <option value="2176">Sirsilla</option>

                                                        <option value="2177">Yellareddipet</option>

                                                        <option value="2178">Boenpalli</option>

                                                        <option value="2179">Vemulawada</option>

                                                        <option value="2180">Kishandaspet</option>

                                                        <option value="2181">Mustabad</option>

                                                        <option value="2182">Yellareddypet</option>

                                                        <option value="2183">Gambhiraopet</option>

                                                        <option value="2184">Kathalapur</option>

                                                        <option value="2185">Medpalli</option>

                                                        <option value="2186">Chandurthi</option>

                                                        <option value="2187">Chendurthi</option>

                                                        <option value="2188">Nizamabad Division</option>

                                                        <option value="2189">Koratal</option>

                                                        <option value="2190">Metpalle</option>

                                                        <option value="2191">Metpalli</option>

                                                        <option value="2192">Koratla</option>

                                                        <option value="2193">Jagtial</option>

                                                        <option value="2194">Mallapur</option>

                                                        <option value="2195">Ellanthakunta</option>

                                                        <option value="2196">Ellanthkunta</option>

                                                        <option value="2197">Chendurthy</option>

                                                        <option value="2198">Bandankal</option>

                                                        <option value="2199">Choppadandi</option>

                                                        <option value="2200">Jullapalli</option>

                                                        <option value="2201">Pegadapalli</option>

                                                        <option value="2202">Dharmaram</option>

                                                        <option value="2203">Dharmapuri</option>

                                                        <option value="2204">Gangadhara</option>

                                                        <option value="2205">Ramadugu</option>

                                                        <option value="2206">Mallial</option>

                                                        <option value="2207">Medapalli</option>

                                                        <option value="2208">Sarangapur</option>

                                                        <option value="2209">Raikal</option>

                                                        <option value="2210">Husnabad</option>

                                                        <option value="2211">Chigurumamidi</option>

                                                        <option value="2212">Hunsabad</option>

                                                        <option value="2213">Koheda</option>

                                                        <option value="2214">Manakondur</option>

                                                        <option value="2215">Thimmapur</option>

                                                        <option value="2216">Shankarapatnam</option>

                                                        <option value="2217">Bheemadevarpalle</option>

                                                        <option value="2218">Saidapur</option>

                                                        <option value="2219">Bejjanki</option>

                                                        <option value="2220">Kodimial</option>

                                                        <option value="2221">Veenavanka</option>

                                                        <option value="2222">Kataram</option>

                                                        <option value="2223">Boenpali</option>

                                                        <option value="2224">Julapalle</option>

                                                        <option value="2225">Velgatur</option>

                                                        <option value="2226">Gollapalli</option>

                                                        <option value="2227">Jangaon</option>

                                                        <option value="2228">East Godavari</option>

                                                        <option value="2229">Hanamkonda</option>

                                                        <option value="2230">Warangal</option>

                                                        <option value="2231">Dharmasagar</option>

                                                        <option value="2232">Zaffargaddh</option>

                                                        <option value="2233">Sangam</option>

                                                        <option value="2234">Wardhannapet</option>

                                                        <option value="2235">Atmakur</option>

                                                        <option value="2236">Atmakur Mandall</option>

                                                        <option value="2237">Geesugonda Mandal</option>

                                                        <option value="2238">Geesungonda Mandal</option>

                                                        <option value="2239">Hanamkonda Mandal</option>

                                                        <option value="2240">Hasanparthy</option>

                                                        <option value="2241">Hasnparthy</option>

                                                        <option value="2242">Mahabubabad</option>

                                                        <option value="2243">Mah'Bad</option>

                                                        <option value="2244">Neerada</option>

                                                        <option value="2245">Kuravi</option>

                                                        <option value="2246">Kesamudram</option>

                                                        <option value="2247">Nekkonda</option>

                                                        <option value="2248">Narsampet</option>

                                                        <option value="2249">Gudur</option>

                                                        <option value="2250">Kothaguda</option>

                                                        <option value="2251">Ghanpur Station</option>

                                                        <option value="2252">Ghanpur Stn</option>

                                                        <option value="2253">Zafargadah</option>

                                                        <option value="2254">Zafargaddah</option>

                                                        <option value="2255">Zafargadh</option>

                                                        <option value="2256">Ghanpur (Station)</option>

                                                        <option value="2257">Narmitta</option>

                                                        <option value="2258">Turrrur</option>

                                                        <option value="2259">Turrur</option>

                                                        <option value="2260">Parkal</option>

                                                        <option value="2261">Eturnagaram</option>

                                                        <option value="2262">Eturunagaram</option>

                                                        <option value="2263">Venkatapur</option>

                                                        <option value="2264">Lingala Ghanpur</option>

                                                        <option value="2265">Narmetta</option>

                                                        <option value="2266">Bhupalapalli</option>

                                                        <option value="2267">Ghanpur (Mulug)</option>

                                                        <option value="2268">Ghanpur(Mulug)</option>

                                                        <option value="2269">Chelpur</option>

                                                        <option value="2270">Chityal</option>

                                                        <option value="2271">Regonda</option>

                                                        <option value="2272">Bachannapet</option>

                                                        <option value="2273">Mangapet</option>

                                                        <option value="2274">Lingal Ghanpur</option>

                                                        <option value="2275">Lingalaghanpur</option>

                                                        <option value="2276">Buchannapet</option>

                                                        <option value="2277">China Raman Cherla</option>

                                                        <option value="2278">Kodakandla</option>

                                                        <option value="2279">Kodakondla</option>

                                                        <option value="2280">Palakurthy</option>

                                                        <option value="2281">Cherial</option>

                                                        <option value="2282">Chiryal</option>

                                                        <option value="2283">Maddur</option>

                                                        <option value="2284">Raghunathapalli</option>

                                                        <option value="2285">Raghunathpalle</option>

                                                        <option value="2286">Raghunathpalli</option>

                                                        <option value="2287">Raghunathplli</option>

                                                        <option value="2288">Devaruppala</option>

                                                        <option value="2289">Devaruppula</option>

                                                        <option value="2290">Devaruppal</option>

                                                        <option value="2291">Sangem</option>

                                                        <option value="2292">Raiparthy</option>

                                                        <option value="2293">Zaffargadh</option>

                                                        <option value="2294">Raiparhty</option>

                                                        <option value="2295">Maripeda</option>

                                                        <option value="2296">Zaffargadgh</option>

                                                        <option value="2297">Narsimhulapet</option>

                                                        <option value="2298">Kadakandla</option>

                                                        <option value="2299">Kodakandal</option>

                                                        <option value="2300">Shayampet</option>

                                                        <option value="2301">Narasimulapet</option>

                                                        <option value="2302">Narsimulapet</option>

                                                        <option value="2303">Geesugonda</option>

                                                        <option value="2304">Ggesugonda</option>

                                                        <option value="2305">Samgem</option>

                                                        <option value="2306">Geegugonda</option>

                                                        <option value="2307">Chennaraopet</option>

                                                        <option value="2308">Duggondi</option>

                                                        <option value="2309">Chennraopet</option>

                                                        <option value="2310">Mulug</option>

                                                        <option value="2311">Govindaraopet</option>

                                                        <option value="2312">Mogullapalle</option>

                                                        <option value="2313">Tadvai</option>

                                                        <option value="2314">Ghanpur(M)</option>

                                                        <option value="2315">Bhupalpalle</option>

                                                        <option value="2316">Nallabelli</option>

                                                        <option value="2317">Nallbelli</option>

                                                        <option value="2318">Mogullapalli</option>

                                                        <option value="2319">Parvathagiri</option>

                                                        <option value="2320">Parwathagiri</option>

                                                        <option value="2321">Mogullapally</option>

                                                        <option value="2322">Nallikaddr</option>

                                                        <option value="2323">Nallikaddur</option>

                                                        <option value="2324">Redlawada</option>

                                                        <option value="2325">Hasanaparthy</option>

                                                        <option value="2326">Dornakal</option>

                                                        <option value="2327">So</option>

                                                        <option value="2328">Khammam</option>

                                                        <option value="2329">Khammam (Urban)</option>

                                                        <option value="2330">Aswapuram</option>

                                                        <option value="2331">Kothagudem</option>

                                                        <option value="2332">Vkhani</option>

                                                        <option value="2333">Bhadrachalam</option>

                                                        <option value="2334">Mothugudem</option>

                                                        <option value="2335">Burgamapahad</option>

                                                        <option value="2336">Burgampahad</option>

                                                        <option value="2337">Burghampahad</option>

                                                        <option value="2338">Paloncha</option>

                                                        <option value="2339">Manugur</option>

                                                        <option value="2340">Manuguru</option>

                                                        <option value="2341">Manugurq</option>

                                                        <option value="2342">Rudrampur</option>

                                                        <option value="2343">Sujathanagar</option>

                                                        <option value="2344">Sujathanagarq</option>

                                                        <option value="2345">Kunavaram</option>

                                                        <option value="2346">Karepalli</option>

                                                        <option value="2347">Yelladu</option>

                                                        <option value="2348">Yellandu</option>

                                                        <option value="2349">Yellandu Colls</option>

                                                        <option value="2350">Sarapaka</option>

                                                        <option value="2351">Chintur</option>

                                                        <option value="2352">Nellipaka</option>

                                                        <option value="2353">Donkarayi</option>

                                                        <option value="2354">Charal</option>

                                                        <option value="2355">Charla</option>

                                                        <option value="2356">Gdpeta</option>

                                                        <option value="2357">V.R.Puram</option>

                                                        <option value="2358">Vr Puram</option>

                                                        <option value="2359">Vrpuram</option>

                                                        <option value="2360">Venkatapuram</option>

                                                        <option value="2361">Vennkatapuram</option>

                                                        <option value="2362">Dummagudem</option>

                                                        <option value="2363">Gouthampur</option>

                                                        <option value="2364">S.N.Puram</option>

                                                        <option value="2365">Satyanarayanapuram</option>

                                                        <option value="2366">Snpuram</option>

                                                        <option value="2367">Palair</option>

                                                        <option value="2368">Gokinepalli</option>

                                                        <option value="2369">Kusumanchi</option>

                                                        <option value="2370">Nkpalli</option>

                                                        <option value="2371">Nkpally</option>

                                                        <option value="2372">Subled</option>

                                                        <option value="2373">T. Palem</option>

                                                        <option value="2374">T.Palem</option>

                                                        <option value="2375">Vemsur</option>

                                                        <option value="2376">Wyra</option>

                                                        <option value="2377">Julurpahad</option>

                                                        <option value="2378">Julurupad</option>

                                                        <option value="2379">Julurupadu</option>

                                                        <option value="2380">Tallada</option>

                                                        <option value="2381">Enkoor</option>

                                                        <option value="2382">Ch.Madharam</option>

                                                        <option value="2383">Cheruvumadharam</option>

                                                        <option value="2384">Cheruvumadhram</option>

                                                        <option value="2385">Tallampahad</option>

                                                        <option value="2386">Komminepalli</option>

                                                        <option value="2387">Pindipole</option>

                                                        <option value="2388">Pindipolu</option>

                                                        <option value="2389">Yerrupalem</option>

                                                        <option value="2390">B.N.Pahad</option>

                                                        <option value="2391">Bnpahad</option>

                                                        <option value="2392">Madhira</option>

                                                        <option value="2393">Bommakal</option>

                                                        <option value="2394">Bonakal</option>

                                                        <option value="2395">Bonnakal</option>

                                                        <option value="2396">Chintakani</option>

                                                        <option value="2397">Kallur</option>

                                                        <option value="2398">Garla</option>

                                                        <option value="2399">Bayyaram</option>

                                                        <option value="2400">Aswaraopet</option>

                                                        <option value="2401">Aswaraopeta</option>

                                                        <option value="2402">Awaraopet</option>

                                                        <option value="2403">Penuballi</option>

                                                        <option value="2404">Sathupalle</option>

                                                        <option value="2405">Sathupalli</option>

                                                        <option value="2406">Siripuram</option>

                                                        <option value="2407">Tanikella</option>

                                                        <option value="2408">Dammapeta</option>

                                                        <option value="2409">P R Gudem</option>

                                                        <option value="2410">P.R.Gudem</option>

                                                        <option value="2411">Vvpalem</option>

                                                        <option value="2412">Nalgonda</option>

                                                        <option value="2413">Alair</option>

                                                        <option value="2414">Bhongir</option>

                                                        <option value="2415">Bb</option>

                                                        <option value="2416">Cc</option>

                                                        <option value="2417">Cxc</option>

                                                        <option value="2418">Valigonda</option>

                                                        <option value="2419">Nalgodna</option>

                                                        <option value="2420">Ramannapeta So</option>

                                                        <option value="2421">Yadagarigutta</option>

                                                        <option value="2422">Yadagirigutta</option>

                                                        <option value="2423">Bhongiri</option>

                                                        <option value="2424">Nalgnda</option>

                                                        <option value="2425">Bibinagar</option>

                                                        <option value="2426">Nalgolnda</option>

                                                        <option value="2427">Huzurnagar</option>

                                                        <option value="2428">Anumula</option>

                                                        <option value="2429">Kodad</option>

                                                        <option value="2430">Suryapet</option>

                                                        <option value="2431">Miryalaguda</option>

                                                        <option value="2432">Miryalguda</option>

                                                        <option value="2433">Miryalgudda</option>

                                                        <option value="2434">Nakrekal</option>

                                                        <option value="2435">Suryap[Et</option>

                                                        <option value="2436">Thungathurthi</option>

                                                        <option value="2437">Thungathurthy</option>

                                                        <option value="2438">Tirumalgiri</option>

                                                        <option value="2439">Suryapet Ho</option>

                                                        <option value="2440">Pedda Adiserla Palle</option>

                                                        <option value="2441">Munugode</option>

                                                        <option value="2442">Nalognda</option>

                                                        <option value="2443">Marriguda</option>

                                                        <option value="2444">Devarakonda</option>

                                                        <option value="2445">Choutuppal</option>

                                                        <option value="2446">Narayanapur</option>

                                                        <option value="2447">Chandur</option>

                                                        <option value="2448">Peddavoora</option>

                                                        <option value="2449">Mothkur</option>

                                                        <option value="2450">Pochampalle</option>

                                                        <option value="2451">Nalgoda</option>

                                                        <option value="2452">Vv</option>

                                                        <option value="2453">Mahabubnagar</option>

                                                        <option value="2454">Mahabubnagar H.O</option>

                                                        <option value="2455">Mahbubnagar</option>

                                                        <option value="2456">Mahboobnagar</option>

                                                        <option value="2457">Kodair</option>

                                                        <option value="2458">Kollapur</option>

                                                        <option value="2459">Peddakothapally</option>

                                                        <option value="2460">Peddamandadi</option>

                                                        <option value="2461">Wanaparthy</option>

                                                        <option value="2462">Kothakota</option>

                                                        <option value="2463">Pebbair</option>

                                                        <option value="2464">Veepangandla</option>

                                                        <option value="2465">Pangal</option>

                                                        <option value="2466">Cckunta</option>

                                                        <option value="2467">Dharur</option>

                                                        <option value="2468">Gadwal</option>

                                                        <option value="2469">Mahabub Nagar</option>

                                                        <option value="2470">Amrabad</option>

                                                        <option value="2471">Farooqnagar</option>

                                                        <option value="2472">Keshampet</option>

                                                        <option value="2473">Bijnapally</option>

                                                        <option value="2474">Gopalpet</option>

                                                        <option value="2475">Pedda Mandadi</option>

                                                        <option value="2476">Kondurgu</option>

                                                        <option value="2477">Nagarkurnool</option>

                                                        <option value="2478">Tadoor</option>

                                                        <option value="2479">Thadoor</option>

                                                        <option value="2480">Narayanpet</option>

                                                        <option value="2481">Palem</option>

                                                        <option value="2482">Shadnagar</option>

                                                        <option value="2483">Shahabad</option>

                                                        <option value="2484">Kothur</option>

                                                        <option value="2485">Devarkadra</option>

                                                        <option value="2486">Jadcherla</option>

                                                        <option value="2487">Stn. Jadcherla</option>

                                                        <option value="2488">Thimmajipet</option>

                                                        <option value="2489">Kalwakurthy</option>

                                                        <option value="2490">Midjil</option>

                                                        <option value="2491">Talakondapally</option>

                                                        <option value="2492">Veldanda</option>

                                                        <option value="2493">Amangal</option>

                                                        <option value="2494">Amnagal</option>

                                                        <option value="2495">Madgul</option>

                                                        <option value="2496">Kalwakurhy</option>

                                                        <option value="2497">Vangoor</option>

                                                        <option value="2498">Kodangal</option>

                                                        <option value="2499">Gundmal</option>

                                                        <option value="2500">Kandukur</option>

                                                        <option value="2501">Achampet</option>

                                                        <option value="2502">Balmoor</option>

                                                        <option value="2503">Uppanunthala</option>

                                                        <option value="2504">Uppununthala</option>

                                                        <option value="2505">Thelkapally</option>

                                                        <option value="2506">Uppunuthala</option>

                                                        <option value="2507">Lingal</option>

                                                        <option value="2508">Lingala</option>

                                                        <option value="2509">Bhootpur</option>

                                                        <option value="2510">Boothpur</option>

                                                        <option value="2511">Farooqnqgar</option>

                                                        <option value="2512">Anantapur</option>

                                                        <option value="2513">C.K. Palli</option>

                                                        <option value="2514">C.K.Palli</option>

                                                        <option value="2515">Chennekothapalle</option>

                                                        <option value="2516">Ramagiri</option>

                                                        <option value="2517">Kothacheruvu</option>

                                                        <option value="2518">Penukonda</option>

                                                        <option value="2519">Puttaparthi</option>

                                                        <option value="2520">Somandepalle</option>

                                                        <option value="2521">Somandepalli</option>

                                                        <option value="2522">Roddam</option>

                                                        <option value="2523">Puttaparthy</option>

                                                        <option value="2524">Bukkapatnam</option>

                                                        <option value="2525">C.K.. Palli</option>

                                                        <option value="2526">Mudigubba</option>

                                                        <option value="2527">Dharmavaram</option>

                                                        <option value="2528">Bathalapalle</option>

                                                        <option value="2529">Hindupur</option>

                                                        <option value="2530">Lepakshi</option>

                                                        <option value="2531">Parigi</option>

                                                        <option value="2532">Gorantla</option>

                                                        <option value="2533">Gudibanda</option>

                                                        <option value="2534">Rolla</option>

                                                        <option value="2535">Amarapuram</option>

                                                        <option value="2536">Madakasira</option>

                                                        <option value="2537">Agali</option>

                                                        <option value="2538">Chilamathur</option>

                                                        <option value="2539">Gooty</option>

                                                        <option value="2540">Pamidi</option>

                                                        <option value="2541">Pedda Vadagur</option>

                                                        <option value="2542">Peddavadugur</option>

                                                        <option value="2543">Peddapappur</option>

                                                        <option value="2544">Yadiki</option>

                                                        <option value="2545">Peddapappuru</option>

                                                        <option value="2546">Putluru</option>

                                                        <option value="2547">Tadipatri</option>

                                                        <option value="2548">Tadpatri</option>

                                                        <option value="2549">Putlur</option>

                                                        <option value="2550">Bukkaraya Samudram</option>

                                                        <option value="2551">Narpala</option>

                                                        <option value="2552">Singanamala</option>

                                                        <option value="2553">Ammalladinne</option>

                                                        <option value="2554">Yellanur</option>

                                                        <option value="2555">Muddanur</option>

                                                        <option value="2556">Kadiri</option>

                                                        <option value="2557">Nallamada</option>

                                                        <option value="2558">Gandlapenta</option>

                                                        <option value="2559">N.P. Kunta</option>

                                                        <option value="2560">O.D. Cheruvu</option>

                                                        <option value="2561">Obuladevaracheruvu</option>

                                                        <option value="2562">Talupula</option>

                                                        <option value="2563">Nallacheruvu</option>

                                                        <option value="2564">Amadagur</option>

                                                        <option value="2565">Amadaguru</option>

                                                        <option value="2566">Obuladevacheruvu</option>

                                                        <option value="2567">Tanakal</option>

                                                        <option value="2568">Tanakallu</option>

                                                        <option value="2569">Garladinne</option>

                                                        <option value="2570">Kambadur</option>

                                                        <option value="2571">Kambaduru</option>

                                                        <option value="2572">Kanaganapalle</option>

                                                        <option value="2573">Kanaganapalli</option>

                                                        <option value="2574">Ramgiri</option>

                                                        <option value="2575">Bathalapalli</option>

                                                        <option value="2576">Tadimarri</option>

                                                        <option value="2577">Raptadu</option>

                                                        <option value="2578">B K Samudram</option>

                                                        <option value="2579">Bukkarayasamudram</option>

                                                        <option value="2580">Bukkrayasamudram</option>

                                                        <option value="2581">Kudair</option>

                                                        <option value="2582">Kuderu</option>

                                                        <option value="2583">Rapthadu</option>

                                                        <option value="2584">Garladinna</option>

                                                        <option value="2585">Beluguppa</option>

                                                        <option value="2586">Kanekal</option>

                                                        <option value="2587">Uravakonda</option>

                                                        <option value="2588">Kalayandurg</option>

                                                        <option value="2589">Kalyandurg</option>

                                                        <option value="2590">Brahma Samudram</option>

                                                        <option value="2591">Brahmasamudram</option>

                                                        <option value="2592">Brhama Samudram</option>

                                                        <option value="2593">Settur</option>

                                                        <option value="2594">Kundurpi</option>

                                                        <option value="2595">Shetturu</option>

                                                        <option value="2596">Shettur</option>

                                                        <option value="2597">Guntakal</option>

                                                        <option value="2598">Bommanahal</option>

                                                        <option value="2599">Vajrakarur</option>

                                                        <option value="2600">Vidapanakal</option>

                                                        <option value="2601">Gummagatta</option>

                                                        <option value="2602">D.Hirehal</option>

                                                        <option value="2603">Herial</option>

                                                        <option value="2604">Rayadurg</option>

                                                        <option value="2605">Vipanakal</option>

                                                        <option value="2606">Cuddapah</option>

                                                        <option value="2607">Sidhout</option>

                                                        <option value="2608">Chinthakommadinne</option>

                                                        <option value="2609">Kodur</option>

                                                        <option value="2610">Chitvel</option>

                                                        <option value="2611">Obulavaripalle</option>

                                                        <option value="2612">Badvel</option>

                                                        <option value="2613">Pullampeta</option>

                                                        <option value="2614">Penagalur</option>

                                                        <option value="2615">Peddarachapalli</option>

                                                        <option value="2616">Rajampet</option>

                                                        <option value="2617">Rayachoti</option>

                                                        <option value="2618">T Sundupalle</option>

                                                        <option value="2619">Nandalur</option>

                                                        <option value="2620">Vontimitta</option>

                                                        <option value="2621">Mydekur</option>

                                                        <option value="2622">Proddatur</option>

                                                        <option value="2623">S.Mydukur</option>

                                                        <option value="2624">Duvvur</option>

                                                        <option value="2625">B.Kodur</option>

                                                        <option value="2626">Kalasapadu</option>

                                                        <option value="2627">Porumamilla</option>

                                                        <option value="2628">Khajipet</option>

                                                        <option value="2629">Chinnamandem</option>

                                                        <option value="2630">Sambepalle</option>

                                                        <option value="2631">Pendlimarri</option>

                                                        <option value="2632">Sri Avadhutha Kasinayana</option>

                                                        <option value="2633">Nandimandalam</option>

                                                        <option value="2634">Gopavaram</option>

                                                        <option value="2635">Lakkireddipalle</option>

                                                        <option value="2636">Chakrayapet</option>

                                                        <option value="2637">Galiveedu</option>

                                                        <option value="2638">Veeraballe</option>

                                                        <option value="2639">Ramapuram</option>

                                                        <option value="2640">Rayachoty</option>

                                                        <option value="2641">Kamalapuram</option>

                                                        <option value="2642">Vallur</option>

                                                        <option value="2643">Yerraguntla</option>

                                                        <option value="2644">Veerapunayanipalle</option>

                                                        <option value="2645">Veerapunayunipalle</option>

                                                        <option value="2646">Verrapanayanipalle</option>

                                                        <option value="2647">Pulivendla</option>

                                                        <option value="2648">Vaimpalle</option>

                                                        <option value="2649">Vempalle</option>

                                                        <option value="2650">Chapad</option>

                                                        <option value="2651">Payasampalle</option>

                                                        <option value="2652">Yearraguntla</option>

                                                        <option value="2653">Vemula</option>

                                                        <option value="2654">Vaimapalle</option>

                                                        <option value="2655">Rajupalam</option>

                                                        <option value="2656">Rajupalem</option>

                                                        <option value="2657">Thondur</option>

                                                        <option value="2658">Tondur</option>

                                                        <option value="2659">Jammalamadugu</option>

                                                        <option value="2660">Jammalamdugu</option>

                                                        <option value="2661">Peddamudium</option>

                                                        <option value="2662">Mylavaram</option>

                                                        <option value="2663">Jammalmadugu</option>

                                                        <option value="2664">Kondapuram</option>

                                                        <option value="2665">Pulivedla</option>

                                                        <option value="2666">Simhadripuram</option>

                                                        <option value="2667">Lavanur</option>

                                                        <option value="2668">Yellanoor</option>

                                                        <option value="2669">Tallaproddatur</option>

                                                        <option value="2670">Balapanur</option>

                                                        <option value="2671">Atlur</option>

                                                        <option value="2672">Brahmamgarimattam</option>

                                                        <option value="2673">Kurnool</option>

                                                        <option value="2674">Chittoor</option>

                                                        <option value="2675">Chandragiri</option>

                                                        <option value="2676">Pakala</option>

                                                        <option value="2677">Pulicherla</option>

                                                        <option value="2678">Madanapalle</option>

                                                        <option value="2679">Puthalapattu</option>

                                                        <option value="2680">Puthalpattu</option>

                                                        <option value="2681">Gangadhara Nellore</option>

                                                        <option value="2682">Penumuru</option>

                                                        <option value="2683">Murakambattu</option>

                                                        <option value="2684">Yadamarri</option>

                                                        <option value="2685">Arugonda</option>

                                                        <option value="2686">Bangarupalem</option>

                                                        <option value="2687">Thavanampalle</option>

                                                        <option value="2688">Iral</option>

                                                        <option value="2689">Irala</option>

                                                        <option value="2690">Kanipakam</option>

                                                        <option value="2691">Gudipala</option>

                                                        <option value="2692">Damalacheruvu</option>

                                                        <option value="2693">Srirangarajapuram</option>

                                                        <option value="2694">Rompicherla</option>

                                                        <option value="2695">Chinnagottigallu</option>

                                                        <option value="2696">Chinnagottigallu Mandal</option>

                                                        <option value="2697">Bhakarapet</option>

                                                        <option value="2698">Yerravaripalem</option>

                                                        <option value="2699">G.K.Palle</option>

                                                        <option value="2700">Kalikiri</option>

                                                        <option value="2701">Kambhamvaripalle</option>

                                                        <option value="2702">Pileru</option>

                                                        <option value="2703">Piler</option>

                                                        <option value="2704">Vayalpad</option>

                                                        <option value="2705">Kalakada</option>

                                                        <option value="2706">Madanpalle</option>

                                                        <option value="2707">Punganur</option>

                                                        <option value="2708">Chowdepalle</option>

                                                        <option value="2709">Valmikipuram</option>

                                                        <option value="2710">Gurramkonda</option>

                                                        <option value="2711">B.Kothakota</option>

                                                        <option value="2712">Mulakalacheruvu</option>

                                                        <option value="2713">Palamaner</option>

                                                        <option value="2714">Ramakuppam</option>

                                                        <option value="2715">Peddapanjani</option>

                                                        <option value="2716">Ramasamudram</option>

                                                        <option value="2717">Palasamudram</option>

                                                        <option value="2718">Santhipuram</option>

                                                        <option value="2719">Venkatagirikota</option>

                                                        <option value="2720">Kuppam</option>

                                                        <option value="2721">Tirupati (Urban)</option>

                                                        <option value="2722">Tirupati (Rural)</option>

                                                        <option value="2723">Tirupati Rural</option>

                                                        <option value="2724">Renigunta</option>

                                                        <option value="2725">Yerpedu</option>

                                                        <option value="2726">Akkurthi</option>

                                                        <option value="2727">Varadaiahpalem</option>

                                                        <option value="2728">Srikalahasti</option>

                                                        <option value="2729">Vadamalapeta</option>

                                                        <option value="2730">Vadamalpet</option>

                                                        <option value="2731">Vedurukuppam</option>

                                                        <option value="2732">Venkata Krishna Puram</option>

                                                        <option value="2733">Puttur</option>

                                                        <option value="2734">Narayanavanam</option>

                                                        <option value="2735">Karvetinagar</option>

                                                        <option value="2736">Pannur</option>

                                                        <option value="2737">Vijayapuram</option>

                                                        <option value="2738">Nindra</option>

                                                        <option value="2739">Pichatur</option>

                                                        <option value="2740">Pissatur</option>

                                                        <option value="2741">Satyavedu</option>

                                                        <option value="2742">Nagari</option>

                                                        <option value="2743">Vengalrajukuppam</option>

                                                        <option value="2744">Thondamanadu</option>

                                                        <option value="2745">Buchinaidu Kandriga</option>

                                                        <option value="2746">K.V.B.Puram</option>

                                                        <option value="2747">Srisailam</option>

                                                        <option value="2748">Banaganapalle</option>

                                                        <option value="2749">Panyam</option>

                                                        <option value="2750">Koilakuntla</option>

                                                        <option value="2751">Koilkuntla</option>

                                                        <option value="2752">Owk</option>

                                                        <option value="2753">Banaganapalli</option>

                                                        <option value="2754">Banaganpallie</option>

                                                        <option value="2755">Kolimigundla</option>

                                                        <option value="2756">Dornipadu</option>

                                                        <option value="2757">Sanjamala</option>

                                                        <option value="2758">Gundupapala</option>

                                                        <option value="2759">Bethamcherla</option>

                                                        <option value="2760">Veldurthi</option>

                                                        <option value="2761">Devanakonda</option>

                                                        <option value="2762">Peapally</option>

                                                        <option value="2763">Tuggali</option>

                                                        <option value="2764">Dhone</option>

                                                        <option value="2765">Krishnagiri</option>

                                                        <option value="2766">Adoni</option>

                                                        <option value="2767">Mantralayam</option>

                                                        <option value="2768">Pattikonda</option>

                                                        <option value="2769">Gonegandla</option>

                                                        <option value="2770">Yemmiganur</option>

                                                        <option value="2771">Maddikera (East)</option>

                                                        <option value="2772">Pagidyala</option>

                                                        <option value="2773">Jupadu Bungalow</option>

                                                        <option value="2774">Nandikotkur</option>

                                                        <option value="2775">Pamulapadu</option>

                                                        <option value="2776">C.Belagal</option>

                                                        <option value="2777">Nandavaram</option>

                                                        <option value="2778">Kodumur</option>

                                                        <option value="2779">Nandyal</option>

                                                        <option value="2780">Allagadda</option>

                                                        <option value="2781">Gadivemula</option>

                                                        <option value="2782">Sirvel</option>

                                                        <option value="2783">Bandi Atmakur</option>

                                                        <option value="2784">Velgode</option>

                                                        <option value="2785">Allgadda</option>

                                                        <option value="2786">Gospadu</option>

                                                        <option value="2787">Mahanandi</option>

                                                        <option value="2788">Nandyal .</option>

                                                        <option value="2789">Krishna</option>

                                                        <option value="2790">Vijayawada (Urban)</option>

                                                        <option value="2791">Vijayawada (Rural)</option>

                                                        <option value="2792">Bandar</option>

                                                        <option value="2793">Machilipatnam</option>

                                                        <option value="2794">Machillipatnam</option>

                                                        <option value="2795">Gannavaram</option>

                                                        <option value="2796">Vijayawada</option>

                                                        <option value="2797">Bapulapadu</option>

                                                        <option value="2798">Nuzvid</option>

                                                        <option value="2799">Nandivada</option>

                                                        <option value="2800">Telaprolu</option>

                                                        <option value="2801">Veeravalli</option>

                                                        <option value="2802">Billanapalli</option>

                                                        <option value="2803">Nagayalanka</option>

                                                        <option value="2804">Avanigadda</option>

                                                        <option value="2805">Mopidevi</option>

                                                        <option value="2806">Challapalli</option>

                                                        <option value="2807">Ghantasala</option>

                                                        <option value="2808">Penamaluru Mandal</option>

                                                        <option value="2809">Poranki</option>

                                                        <option value="2810">Movva</option>

                                                        <option value="2811">Pedaparupudi</option>

                                                        <option value="2812">Guduru</option>

                                                        <option value="2813">Kankipadu</option>

                                                        <option value="2814">Vuyyuru</option>

                                                        <option value="2815">Pamarru</option>

                                                        <option value="2816">Thotlavalluru</option>

                                                        <option value="2817">Katuru</option>

                                                        <option value="2818">Veerullapadu</option>

                                                        <option value="2819">Jaggayyapeta</option>

                                                        <option value="2820">Chadarlapadu</option>

                                                        <option value="2821">Chandaralpadu</option>

                                                        <option value="2822">Chandarlapadu</option>

                                                        <option value="2823">Nandigama</option>

                                                        <option value="2824">Penuganchiprolu</option>

                                                        <option value="2825">Nuz Id</option>

                                                        <option value="2826">Musunuru</option>

                                                        <option value="2827">Agiripalle</option>

                                                        <option value="2828">Aukiripalli</option>

                                                        <option value="2829">Vja</option>

                                                        <option value="2830">Chatrai</option>

                                                        <option value="2831">Vissannapet</option>

                                                        <option value="2832">Reddigudem</option>

                                                        <option value="2833">A.Konduru</option>

                                                        <option value="2834">Kondapalli</option>

                                                        <option value="2835">Tiruvuru</option>

                                                        <option value="2836">Akunuru</option>

                                                        <option value="2837">Kakulapadu</option>

                                                        <option value="2838">Vunguturu</option>

                                                        <option value="2839">Vuyyur</option>

                                                        <option value="2840">Gudivada</option>

                                                        <option value="2841">Mudinepalli</option>

                                                        <option value="2842">Bantumilli</option>

                                                        <option value="2843">Krithivennu</option>

                                                        <option value="2844">Kruthivennu</option>

                                                        <option value="2845">Gudlavalleru</option>

                                                        <option value="2846">Mandavalli</option>

                                                        <option value="2847">Koduru</option>

                                                        <option value="2848">Mudinepalle</option>

                                                        <option value="2849">Gudlavallru</option>

                                                        <option value="2850">Kaikalur</option>

                                                        <option value="2851">Kalidindi</option>

                                                        <option value="2852">Kalidinid</option>

                                                        <option value="2853">Vizianagaram</option>

                                                        <option value="2854">Mudinepelli</option>

                                                        <option value="2855">Pedana</option>

                                                        <option value="2856">Bantumalli</option>

                                                        <option value="2857">Penugolanu</option>

                                                        <option value="2858">Vatsavai</option>

                                                        <option value="2859">Gampalagudem</option>

                                                        <option value="2860">Gamplagudem</option>

                                                        <option value="2861">Gamplaguedem</option>

                                                        <option value="2862">Jaggaiahpet</option>

                                                        <option value="2863">Guntur</option>

                                                        <option value="2864">Medikonduru</option>

                                                        <option value="2865">Lemalle</option>

                                                        <option value="2866">Ponnekallu</option>

                                                        <option value="2867">Prathipadu</option>

                                                        <option value="2868">Amaravathi</option>

                                                        <option value="2869">Bapatla</option>

                                                        <option value="2870">Karlapalem</option>

                                                        <option value="2871">Kakumanu</option>

                                                        <option value="2872">Cheruuvu</option>

                                                        <option value="2873">Cheruvu</option>

                                                        <option value="2874">Ponnur</option>

                                                        <option value="2875">Ponnuru</option>

                                                        <option value="2876">Tenali</option>

                                                        <option value="2877">Angalakudur</option>

                                                        <option value="2878">Chebrole</option>

                                                        <option value="2879">Sangamjagarlamudi</option>

                                                        <option value="2880">Edlapadu</option>

                                                        <option value="2881">Edlapdu</option>

                                                        <option value="2882">Nadendla</option>

                                                        <option value="2883">Pedanandipadu</option>

                                                        <option value="2884">Tadikonda</option>

                                                        <option value="2885">Mangalagiri Ho</option>

                                                        <option value="2886">Tulluru</option>

                                                        <option value="2887">Bhattiprolu</option>

                                                        <option value="2888">Bhattiprole</option>

                                                        <option value="2889">Vellaturu</option>

                                                        <option value="2890">Dhulipudi</option>

                                                        <option value="2891">Nagaram</option>

                                                        <option value="2892">Cherukupalli</option>

                                                        <option value="2893">Kanagala</option>

                                                        <option value="2894">Vemuru</option>

                                                        <option value="2895">Kuchinapudi</option>

                                                        <option value="2896">Chodayapalem</option>

                                                        <option value="2897">Repalle</option>

                                                        <option value="2898">Anantavaram</option>

                                                        <option value="2899">K.C.Works</option>

                                                        <option value="2900">Pedavadlapudi</option>

                                                        <option value="2901">Nutakki</option>

                                                        <option value="2902">Kollipara</option>

                                                        <option value="2903">Pedapalem</option>

                                                        <option value="2904">Nandivelugu</option>

                                                        <option value="2905">Kolakaluru</option>

                                                        <option value="2906">Duggirala</option>

                                                        <option value="2907">Emani</option>

                                                        <option value="2908">Cherukupalle</option>

                                                        <option value="2909">Appikatla</option>

                                                        <option value="2910">Chandole</option>

                                                        <option value="2911">Turumella</option>

                                                        <option value="2912">Amartaluru</option>

                                                        <option value="2913">Kuchipudi</option>

                                                        <option value="2914">Nizampatnam</option>

                                                        <option value="2915">Machavaram</option>

                                                        <option value="2916">Patsalatadiparru</option>

                                                        <option value="2917">Stuvartpuram</option>

                                                        <option value="2918">Tsunduru</option>

                                                        <option value="2919">Kolluru</option>

                                                        <option value="2920">Intur</option>

                                                        <option value="2921">Inturu</option>

                                                        <option value="2922">Pedakurapadu</option>

                                                        <option value="2923">Pedakurpadu</option>

                                                        <option value="2924">Sattenapalle</option>

                                                        <option value="2925">Muppalla</option>

                                                        <option value="2926">Muppalla(Sa)</option>

                                                        <option value="2927">Muppalla(Sap)</option>

                                                        <option value="2928">Sttenapalle</option>

                                                        <option value="2929">Atchampet</option>

                                                        <option value="2930">Krosuru</option>

                                                        <option value="2931">Bellamkonda</option>

                                                        <option value="2932">Narasaraopet</option>

                                                        <option value="2933">Bollapalle</option>

                                                        <option value="2934">Piduguralla</option>

                                                        <option value="2935">Pidugurlalla</option>

                                                        <option value="2936">Dachepalle</option>

                                                        <option value="2937">Gurazalla</option>

                                                        <option value="2938">Gurzalla</option>

                                                        <option value="2939">Rentachintala</option>

                                                        <option value="2940">Macherla</option>

                                                        <option value="2941">Tadepalle</option>

                                                        <option value="2942">Mangalagiri</option>

                                                        <option value="2943">Namburu</option>

                                                        <option value="2944">Pedakakani</option>

                                                        <option value="2945">Phirangipuram</option>

                                                        <option value="2946">Narassaraopet</option>

                                                        <option value="2947">Chilakaluripet</option>

                                                        <option value="2948">Durgi</option>

                                                        <option value="2949">Veldurthy</option>

                                                        <option value="2950">Karempudi</option>

                                                        <option value="2951">Nekarikallu</option>

                                                        <option value="2952">Savalyapuram</option>

                                                        <option value="2953">Vinukonda</option>

                                                        <option value="2954">Ipuru</option>

                                                        <option value="2955">Nuzendla</option>

                                                        <option value="2956">Ongole</option>

                                                        <option value="2957">Kanigiri</option>

                                                        <option value="2958">Voletivaripalem</option>

                                                        <option value="2959">Chirala</option>

                                                        <option value="2960">Chiral</option>

                                                        <option value="2961">Parchur</option>

                                                        <option value="2962">Prakasam</option>

                                                        <option value="2963">Kotha Patnam</option>

                                                        <option value="2964">Vetapalem</option>

                                                        <option value="2965">Addanki</option>

                                                        <option value="2966">Podili</option>

                                                        <option value="2967">Tangutur</option>

                                                        <option value="2968">Kurichedu</option>

                                                        <option value="2969">Donakonda</option>

                                                        <option value="2970">Markapur</option>

                                                        <option value="2971">Markapur Ho</option>

                                                        <option value="2972">Peda Araveedu</option>

                                                        <option value="2973">Markpur</option>

                                                        <option value="2974">Tripuranthakam</option>

                                                        <option value="2975">Yerragondapalem</option>

                                                        <option value="2976">Pullalacheruvu</option>

                                                        <option value="2977">Dornala</option>

                                                        <option value="2978">Tarlupadu</option>

                                                        <option value="2979">Cumbum</option>

                                                        <option value="2980">Bestawaripeta</option>

                                                        <option value="2981">Ardhaveedu</option>

                                                        <option value="2982">Giddalur</option>

                                                        <option value="2983">Racherla</option>

                                                        <option value="2984">Komarolu</option>

                                                        <option value="2985">Nellore</option>

                                                        <option value="2986">Doravarisatram</option>

                                                        <option value="2987">Sullurpeta</option>

                                                        <option value="2988">Tada</option>

                                                        <option value="2989">Naidupet</option>

                                                        <option value="2990">Naidupeta</option>

                                                        <option value="2991">Chittamur</option>

                                                        <option value="2992">Chittamuru</option>

                                                        <option value="2993">Pellakur</option>

                                                        <option value="2994">Venkatagiri</option>

                                                        <option value="2995">Dakkili</option>

                                                        <option value="2996">Kovur</option>

                                                        <option value="2997">Kovur Mandalam</option>

                                                        <option value="2998">Bitragunta</option>

                                                        <option value="2999">Damavaram</option>

                                                        <option value="3000">Kavali</option>

                                                        <option value="3001">Anemadugu</option>

                                                        <option value="3002">Chakalakonda</option>

                                                        <option value="3003">Duthalur</option>

                                                        <option value="3004">Jaladanki</option>

                                                        <option value="3005">Kaligiri</option>

                                                        <option value="3006">Siddanakonduru</option>

                                                        <option value="3007">Udayagiri</option>

                                                        <option value="3008">Varikuntapadu</option>

                                                        <option value="3009">Vinjamoor</option>

                                                        <option value="3010">Vinjamur</option>

                                                        <option value="3011">Nandipadu</option>

                                                        <option value="3012">Gumparlapadu</option>

                                                        <option value="3013">Gandipalem</option>

                                                        <option value="3014">Dagadarthi</option>

                                                        <option value="3015">Atmakur(Nl)</option>

                                                        <option value="3016">S.S.Project</option>

                                                        <option value="3017">Ss Project</option>

                                                        <option value="3018">Ananatasagaram</option>

                                                        <option value="3019">Anantasagaram</option>

                                                        <option value="3020">Revur</option>

                                                        <option value="3021">A.S.Peta</option>

                                                        <option value="3022">Anumasamudrampeta Mandal</option>

                                                        <option value="3023">Buchireddipalem Mandalam</option>

                                                        <option value="3024">Buchireddypalem</option>

                                                        <option value="3025">Buchireddypalem Mandalam</option>

                                                        <option value="3026">Karatampadu</option>

                                                        <option value="3027">Podalakur</option>

                                                        <option value="3028">Virur</option>

                                                        <option value="3029">Seetaramapuram</option>

                                                        <option value="3030">Seetharamapuram</option>

                                                        <option value="3031">Tp Gudur</option>

                                                        <option value="3032">Marripadu</option>

                                                        <option value="3033">Indukurpeta Mandalam</option>

                                                        <option value="3034">Mypadu</option>

                                                        <option value="3035">Indukurpeta</option>

                                                        <option value="3036">Allur</option>

                                                        <option value="3037">Allur Mandalam</option>

                                                        <option value="3038">Kodavalur</option>

                                                        <option value="3039">Kodavaluru</option>

                                                        <option value="3040">Kodavaluru Mandalam</option>

                                                        <option value="3041">Gandavaram</option>

                                                        <option value="3042">Kodavalur Mandalam</option>

                                                        <option value="3043">Vidavalur</option>

                                                        <option value="3044">Venkatachala Satram</option>

                                                        <option value="3045">Venkatachalam</option>

                                                        <option value="3046">Survepalli</option>

                                                        <option value="3047">Chejerla</option>

                                                        <option value="3048">Kaluvoya</option>

                                                        <option value="3049">Muthukur</option>

                                                        <option value="3050">Muthukur Mandalam</option>

                                                        <option value="3051">Brahmadevam</option>

                                                        <option value="3052">Northrajupalem Mandalam</option>

                                                        <option value="3053">Nr Palem</option>

                                                        <option value="3054">Vojili</option>

                                                        <option value="3055">Balayapalli</option>

                                                        <option value="3056">Manubolu</option>

                                                        <option value="3057">Sydapuram</option>

                                                        <option value="3058">Rapur</option>

                                                        <option value="3059">Kota</option>

                                                        <option value="3060">Chillakur</option>

                                                        <option value="3061">Vakadu</option>

                                                        <option value="3062">Visakhapatnam</option>

                                                        <option value="3063">Visakhapatnam (Urban)</option>

                                                        <option value="3064">Pedagantyada</option>

                                                        <option value="3065">Vishakhapatnam</option>

                                                        <option value="3066">Visakhapatnam Rural</option>

                                                        <option value="3067">Pendurthi</option>

                                                        <option value="3068">Visakhapatnam (Rural)</option>

                                                        <option value="3069">Anandapuram</option>

                                                        <option value="3070">Gajuwaka</option>

                                                        <option value="3071">Anakapalle</option>

                                                        <option value="3072">Paravada</option>

                                                        <option value="3073">Chodavaram</option>

                                                        <option value="3074">Paderu</option>

                                                        <option value="3075">Ananthagiri</option>

                                                        <option value="3076">Cheedikada</option>

                                                        <option value="3077">Atchutapuram</option>

                                                        <option value="3078">Yellamanchili</option>

                                                        <option value="3079">Golugonda</option>

                                                        <option value="3080">Narsipatnam</option>

                                                        <option value="3081">Chintapalle</option>

                                                        <option value="3082">Nathavaram</option>

                                                        <option value="3083">Araku</option>

                                                        <option value="3084">Araku Valley</option>

                                                        <option value="3085">Bheemunipatnam</option>

                                                        <option value="3086">Visakhapatnam.</option>

                                                        <option value="3087">Viskhapatnam</option>

                                                        <option value="3088">Srikakulam</option>

                                                        <option value="3089">Etcherla</option>

                                                        <option value="3090">Etcherla Mandal</option>

                                                        <option value="3091">Regidi Amadalavalasa</option>

                                                        <option value="3092">Regidi Mandal</option>

                                                        <option value="3093">Vangara Mandal</option>

                                                        <option value="3094">Therlam Mandal</option>

                                                        <option value="3095">Santhakaviti Mandal</option>

                                                        <option value="3096">Rajam</option>

                                                        <option value="3097">Rajam Mandal</option>

                                                        <option value="3098">Sigadam Mandal</option>

                                                        <option value="3099">Merakamudidam</option>

                                                        <option value="3100">Merakamudidam Mandal</option>

                                                        <option value="3101">Ganguvada Sigadam Mandal</option>

                                                        <option value="3102">G.Sigadam Mandal</option>

                                                        <option value="3103">Laveru Mandal</option>

                                                        <option value="3104">Ponduru</option>

                                                        <option value="3105">Ponduru Mandal</option>

                                                        <option value="3106">Amadalavalasa</option>

                                                        <option value="3107">Amadalavalasa Manal</option>

                                                        <option value="3108">Amadalavalasa Mandal</option>

                                                        <option value="3109">Burja Mandal</option>

                                                        <option value="3110">Srikakulam Mandal</option>

                                                        <option value="3111">Sarubujjili</option>

                                                        <option value="3112">Sarubujjili Mandal</option>

                                                        <option value="3113">Jalumuru</option>

                                                        <option value="3114">Kotabommali Mandal</option>

                                                        <option value="3115">Kotabommalimandal</option>

                                                        <option value="3116">Santabommali Mandal</option>

                                                        <option value="3117">Santhabommali Mandal</option>

                                                        <option value="3118">Tekkali</option>

                                                        <option value="3119">Nandigam Mandal</option>

                                                        <option value="3120">Saravakota Mandal</option>

                                                        <option value="3121">Tekkali Mandal</option>

                                                        <option value="3122">Santhabommali</option>

                                                        <option value="3123">Vajrapukotturu Mandal</option>

                                                        <option value="3124">Pathapatnam</option>

                                                        <option value="3125">Pathapatnam Mandal</option>

                                                        <option value="3126">Hiramandalam Mandal</option>

                                                        <option value="3127">Meliaputti Mandal</option>

                                                        <option value="3128">Vajrapukothuru</option>

                                                        <option value="3129">Palasa Mandal</option>

                                                        <option value="3130">Meliaputti</option>

                                                        <option value="3131">Palasa</option>

                                                        <option value="3132">Mandasa</option>

                                                        <option value="3133">Mandasa Mandal</option>

                                                        <option value="3134">Sompeta Mandal</option>

                                                        <option value="3135">Kanchili Mandal</option>

                                                        <option value="3136">Kaviti Mandal</option>

                                                        <option value="3137">Ichchapuram</option>

                                                        <option value="3138">Ichchapuram Mandal</option>

                                                        <option value="3139">Kaviti</option>

                                                        <option value="3140">Gara Mandal</option>

                                                        <option value="3141">Laveru</option>

                                                        <option value="3142">Gara</option>

                                                        <option value="3143">Ranastalam</option>

                                                        <option value="3144">Ranasthalam Mandal</option>

                                                        <option value="3145">Cheepurupalle</option>

                                                        <option value="3146">Narasannapeta</option>

                                                        <option value="3147">Narasannapeta Mandal</option>

                                                        <option value="3148">Polaki Mandal</option>

                                                        <option value="3149">Jalumuru Mandal</option>

                                                        <option value="3150">Saravakota Mdl</option>

                                                        <option value="3151">Palakonda</option>

                                                        <option value="3152">R. Amadalavalasa</option>

                                                        <option value="3153">R.Amadalavalasa</option>

                                                        <option value="3154">Seethampeta</option>

                                                        <option value="3155">Burja</option>

                                                        <option value="3156">Bhamani Mandal</option>

                                                        <option value="3157">Bhamini</option>

                                                        <option value="3158">Bhamini Mandal</option>

                                                        <option value="3159">Kotturu</option>

                                                        <option value="3160">Kotturu Mandal</option>

                                                        <option value="3161">Seethampeta Mandal</option>

                                                        <option value="3162">Lakshminarsupeta</option>

                                                        <option value="3163">Hiramandalam</option>

                                                        <option value="3164">Veeraghattam</option>

                                                        <option value="3165">Vangara</option>

                                                        <option value="3166">Kotabommali</option>

                                                        <option value="3167">Ajjada</option>

                                                        <option value="3168">Kakinada</option>

                                                        <option value="3169">Kakinada (Urban)</option>

                                                        <option value="3170">Kakinada Rural</option>

                                                        <option value="3171">Pedapudi</option>

                                                        <option value="3172">Karapa</option>

                                                        <option value="3173">Rajahmundry</option>

                                                        <option value="3174">Rajahmundry (Urban)</option>

                                                        <option value="3175">Rajahmundry Rural</option>

                                                        <option value="3176">Korukonda</option>

                                                        <option value="3177">Rajanagaram</option>

                                                        <option value="3178">Sithanagaram</option>

                                                        <option value="3179">Rajaahmundry Rural</option>

                                                        <option value="3180">Kadiyam</option>

                                                        <option value="3181">Alamuru</option>

                                                        <option value="3182">Amalapuram</option>

                                                        <option value="3183">Allavaram</option>

                                                        <option value="3184">Allavaram Mandal</option>

                                                        <option value="3185">Ainavilli</option>

                                                        <option value="3186">Ainavilli Mandal</option>

                                                        <option value="3187">Katrenikona</option>

                                                        <option value="3188">Katrenikona Mandal</option>

                                                        <option value="3189">Amalapuram Mandal</option>

                                                        <option value="3190">Uppalaguptam</option>

                                                        <option value="3191">Ambajipeta</option>

                                                        <option value="3192">P.Gannavaram</option>

                                                        <option value="3193">P.Gannavaram Mandal</option>

                                                        <option value="3194">Mummidivaram</option>

                                                        <option value="3195">Mummidivaram Mandal</option>

                                                        <option value="3196">I.Polavaram</option>

                                                        <option value="3197">I.Polavaram Mandal</option>

                                                        <option value="3198">Ambajipeta Mandal</option>

                                                        <option value="3199">Uppalaguptam Mandal</option>

                                                        <option value="3200">Uppalaguptan Mandal</option>

                                                        <option value="3201">Kothapeta Taluk</option>

                                                        <option value="3202">Kothapeta</option>

                                                        <option value="3203">Kothapeta Mandal</option>

                                                        <option value="3204">Mandapeta</option>

                                                        <option value="3205">Atreyapuram</option>

                                                        <option value="3206">Atreyapuram Mandal</option>

                                                        <option value="3207">Ravulapalem</option>

                                                        <option value="3208">Atreypauram</option>

                                                        <option value="3209">Ravulapalem Mandal</option>

                                                        <option value="3210">D.Gannavaram Mandal</option>

                                                        <option value="3211">Amabajipeta</option>

                                                        <option value="3212">Razole</option>

                                                        <option value="3213">Malikipuram</option>

                                                        <option value="3214">Razole Mandal</option>

                                                        <option value="3215">Mamidikuduru</option>

                                                        <option value="3216">Mamidikuduru Mandal</option>

                                                        <option value="3217">Sakhinetipalli</option>

                                                        <option value="3218">Sakhinetipalli Mandal</option>

                                                        <option value="3219">Malikipuram Mandal</option>

                                                        <option value="3220">Bikkavolu</option>

                                                        <option value="3221">Rayavaram</option>

                                                        <option value="3222">Anaparthy</option>

                                                        <option value="3223">Kajuluru</option>

                                                        <option value="3224">Pamaru</option>

                                                        <option value="3225">Gangavaram</option>

                                                        <option value="3226">Rampachodavaram</option>

                                                        <option value="3227">Gokavaram</option>

                                                        <option value="3228">Devipatnam</option>

                                                        <option value="3229">Maredumilli</option>

                                                        <option value="3230">Rajavommangi</option>

                                                        <option value="3231">Rangampeta</option>

                                                        <option value="3232">Sithanagram</option>

                                                        <option value="3233">Ragampeta</option>

                                                        <option value="3234">Gandepalli</option>

                                                        <option value="3235">Kapileswarapuram</option>

                                                        <option value="3236">Tuni</option>

                                                        <option value="3237">Sankhavaram</option>

                                                        <option value="3238">Kotananduru</option>

                                                        <option value="3239">Thondangi</option>

                                                        <option value="3240">West Godavari</option>

                                                        <option value="3241">Addateegala</option>

                                                        <option value="3242">Addathigala</option>

                                                        <option value="3243">Addatigala</option>

                                                        <option value="3244">Kothapalli</option>

                                                        <option value="3245">Yeleswaram</option>

                                                        <option value="3246">Kirlampudi</option>

                                                        <option value="3247">Pithapuram</option>

                                                        <option value="3248">Samalkot</option>

                                                        <option value="3249">Jaggampeta</option>

                                                        <option value="3250">Peddapuram</option>

                                                        <option value="3251">Samalkota</option>

                                                        <option value="3252">Gollaprolu</option>

                                                        <option value="3253">Tallarevu</option>

                                                        <option value="3254">Thallarevu</option>

                                                        <option value="3255">Pondicherry</option>

                                                        <option value="3256">Y .Ramavaram</option>

                                                        <option value="3257">Y Ramavaram</option>

                                                        <option value="3258">Amalapuram.</option>

                                                        <option value="3259">Eluru</option>

                                                        <option value="3260">S.V. Peta</option>

                                                        <option value="3261">S.V.Peta</option>

                                                        <option value="3262">Chataparru</option>

                                                        <option value="3263">Tadepalligudem</option>

                                                        <option value="3264">Tadepalligudem Mandalam</option>

                                                        <option value="3265">Tadepalligudem Mandaolam</option>

                                                        <option value="3266">Nallajerla</option>

                                                        <option value="3267">Nallajerla Mandal</option>

                                                        <option value="3268">Nallajerla Mandalam</option>

                                                        <option value="3269">Nallajarla Mandalam</option>

                                                        <option value="3270">Nallajarlamandalam</option>

                                                        <option value="3271">Nallajerlamandalam</option>

                                                        <option value="3272">Bhimavaram</option>

                                                        <option value="3273">Penumantra (Mdl)</option>

                                                        <option value="3274">Atchanta (Mdl)</option>

                                                        <option value="3275">Attili (Mdl)</option>

                                                        <option value="3276">Manchili (Mdl)</option>

                                                        <option value="3277">Minavilluru(Mdl)</option>

                                                        <option value="3278">Moyyeru(Mdl)</option>

                                                        <option value="3279">Pentapadu Mandalam</option>

                                                        <option value="3280">Pentapadu Mandall</option>

                                                        <option value="3281">Tanuku Mandalam</option>

                                                        <option value="3282">Tanuku Mandal</option>

                                                        <option value="3283">Pentapadu Mandal</option>

                                                        <option value="3284">Vunguturu Mandalam</option>

                                                        <option value="3285">Pentapadu</option>

                                                        <option value="3286">Pentapadumandalam</option>

                                                        <option value="3287">Nallajarla Mandal</option>

                                                        <option value="3288">Ganapavaram Mandal</option>

                                                        <option value="3289">Ganapavaram Mandalam</option>

                                                        <option value="3290">Palakoderu Mandalam</option>

                                                        <option value="3291">Undi Mandalam</option>

                                                        <option value="3292">Nidamarrumandalam</option>

                                                        <option value="3293">Nidamarry Mandal</option>

                                                        <option value="3294">Ganapavaramm Andalam</option>

                                                        <option value="3295">Ganapavaramandalam</option>

                                                        <option value="3296">Ganapavarammandal</option>

                                                        <option value="3297">Ganapavarammandalam</option>

                                                        <option value="3298">Undi (Mdl)</option>

                                                        <option value="3299">Bhimavaram (Mdl)</option>

                                                        <option value="3300">Kalla (Mdl)</option>

                                                        <option value="3301">Bhimavaram(Mdl)</option>

                                                        <option value="3302">Palakoderu (Mdl)</option>

                                                        <option value="3303">Tanuku</option>

                                                        <option value="3304">Tanuku (Mdl)</option>

                                                        <option value="3305">Vundrajavaram (Mdl)</option>

                                                        <option value="3306">Iragavaram (Mdl)</option>

                                                        <option value="3307">Velpur (Mdl)</option>

                                                        <option value="3308">Iragavaram(Mdl)</option>

                                                        <option value="3309">U.Varam(Mdl)</option>

                                                        <option value="3310">Akividu (Mdl)</option>

                                                        <option value="3311">Viravasaram(Mdl)</option>

                                                        <option value="3312">Palakoderu(Mdl)</option>

                                                        <option value="3313">Viravasaram (Mdl)</option>

                                                        <option value="3314">Palacole</option>

                                                        <option value="3315">Palakol (Mdl)</option>

                                                        <option value="3316">Palakol(Mdl)</option>

                                                        <option value="3317">Ellamanchili (Mdl)</option>

                                                        <option value="3318">Poduru (Mdl)</option>

                                                        <option value="3319">Narasapuram</option>

                                                        <option value="3320">Narsapur (Mdl)</option>

                                                        <option value="3321">Mogalturu(Mdl)</option>

                                                        <option value="3322">Nidadavole</option>

                                                        <option value="3323">Nidadavolemandalam</option>

                                                        <option value="3324">Kovvuru Mandalam</option>

                                                        <option value="3325">Nidadavole Mandalam</option>

                                                        <option value="3326">Chagallu Mandalam</option>

                                                        <option value="3327">Devarapalli Mandalam</option>

                                                        <option value="3328">Nidadavole Mandal</option>

                                                        <option value="3329">Wgdt</option>

                                                        <option value="3330">Kannapuram</option>

                                                        <option value="3331">Koyyalagudem</option>

                                                        <option value="3332">Devarapalli Mandal</option>

                                                        <option value="3333">Deverapalli</option>

                                                        <option value="3334">Deverapalli Mandalam</option>

                                                        <option value="3335">Devipatnam Mandalam</option>

                                                        <option value="3336">Devipatnammandalam</option>

                                                        <option value="3337">Buttayagudem</option>

                                                        <option value="3338">Polavaram</option>

                                                        <option value="3339">Polavaram Mandalam</option>

                                                        <option value="3340">Polavarammandal</option>

                                                        <option value="3341">Polavarammandalam</option>

                                                        <option value="3342">Gopalapuram Mandal</option>

                                                        <option value="3343">Gopalapuram Mandalam</option>

                                                        <option value="3344">Buttayagudem Mandalam</option>

                                                        <option value="3345">Polavaram Mandal</option>

                                                        <option value="3346">Penugonda (Mdl)</option>

                                                        <option value="3347">Peravali (Mdl)</option>

                                                        <option value="3348">Peravali Mandalam</option>

                                                        <option value="3349">Undrajavaram Mandalam</option>

                                                        <option value="3350">Undrajavaram Mandalam.</option>

                                                        <option value="3351">Peravali</option>

                                                        <option value="3352">Poduru(Mdl)</option>

                                                        <option value="3353">Tallapudi Mandal</option>

                                                        <option value="3354">Tallapudi Mandalam</option>

                                                        <option value="3355">Chagallu Mandal</option>

                                                        <option value="3356">Chagally Mandalam</option>

                                                        <option value="3357">Kovvur</option>

                                                        <option value="3358">Kovvur Mandalam</option>

                                                        <option value="3359">Dommeru</option>

                                                        <option value="3360">Pulla</option>

                                                        <option value="3361">Kaikaram</option>

                                                        <option value="3362">Bhimadole</option>

                                                        <option value="3363">D.Tirumala</option>

                                                        <option value="3364">Dwarakatirumala</option>

                                                        <option value="3365">Gundugolanu</option>

                                                        <option value="3366">Denduluru</option>

                                                        <option value="3367">Padapadu</option>

                                                        <option value="3368">Pedapadu</option>

                                                        <option value="3369">Kovvali</option>

                                                        <option value="3370">J.R.Gudem</option>

                                                        <option value="3371">J.R.Gudem Bo</option>

                                                        <option value="3372">Jangareddigudem</option>

                                                        <option value="3373">K.Kota</option>

                                                        <option value="3374">Kamavarapukota</option>

                                                        <option value="3375">Gopannapalem</option>

                                                        <option value="3376">Lakkavaram</option>

                                                        <option value="3377">Tadikalapudi</option>

                                                        <option value="3378">Jeelugumilli</option>

                                                        <option value="3379">Chintalapudi</option>

                                                        <option value="3380">Pragadavaram</option>

                                                        <option value="3381">Dharmajigudem</option>

                                                        <option value="3382">T.Narasapuram</option>

                                                        <option value="3383">Vijaayrai</option>

                                                        <option value="3384">Vijayarai</option>

                                                        <option value="3385">Bondapalli</option>

                                                        <option value="3386">Denkada</option>

                                                        <option value="3387">Nellimarla</option>

                                                        <option value="3388">Apspqrs</option>

                                                        <option value="3389">B.Tallavalasa</option>

                                                        <option value="3390">Garividi</option>

                                                        <option value="3391">Gurla</option>

                                                        <option value="3392">Meraka Mudidam</option>

                                                        <option value="3393">Badangi</option>

                                                        <option value="3394">Therlam</option>

                                                        <option value="3395">Sigadam</option>

                                                        <option value="3396">Chipurupalle</option>

                                                        <option value="3397">Anathagiri</option>

                                                        <option value="3398">S Kota</option>

                                                        <option value="3399">Vepada</option>

                                                        <option value="3400">Srungavarapukota</option>

                                                        <option value="3401">Bonangi</option>

                                                        <option value="3402">Gantyada</option>

                                                        <option value="3403">S.Kota.</option>

                                                        <option value="3404">L Kota</option>

                                                        <option value="3405">Kothavalasa</option>

                                                        <option value="3406">Pusapatirega</option>

                                                        <option value="3407">Konada</option>

                                                        <option value="3408">Jami</option>

                                                        <option value="3409">Mentada</option>

                                                        <option value="3410">Bhogapuram</option>

                                                        <option value="3411">Ramathirtam</option>

                                                        <option value="3412">Kotagandredu</option>

                                                        <option value="3413">Pedamajjipalem</option>

                                                        <option value="3414">Alamanada</option>

                                                        <option value="3415">Alamanda</option>

                                                        <option value="3416">Alamanda Rs</option>

                                                        <option value="3417">Gajapathinagaram</option>

                                                        <option value="3418">Gajapathinagram</option>

                                                        <option value="3419">Moida</option>

                                                        <option value="3420">Garugubilli</option>

                                                        <option value="3421">Parvatipuram</option>

                                                        <option value="3422">Parvathipuram</option>

                                                        <option value="3423">Komarada</option>

                                                        <option value="3424">Gummalakshmipuram</option>

                                                        <option value="3425">Kurupam</option>

                                                        <option value="3426">Jiyyammavalasa</option>

                                                        <option value="3427">Makkuva</option>

                                                        <option value="3428">Seethanagaram</option>

                                                        <option value="3429">Balijipeta</option>

                                                        <option value="3430">Salur</option>

                                                        <option value="3431">Bobbili</option>

                                                        <option value="3432">Dattirajeru</option>

                                                        <option value="3433">Dattirajeru Bo</option>

                                                        <option value="3434">Ramabhadrapuram</option>

                                                        <option value="3435">Datti Rajeru</option>

                                                        <option value="3436">Pachipenta</option>

                                                        <option value="3437">Pedamanapuram</option>

                                                        <option value="3438">Challapeta</option>

                                                        <option value="3439">Jiyyammavalsa</option>

                                                        <option value="3440">Bangalore</option>

                                                        <option value="3441">Bangalore North</option>

                                                        <option value="3442">Bangalore South</option>

                                                        <option value="3443">Banglore</option>

                                                        <option value="3444">Hosakote</option>

                                                        <option value="3445">Anekal</option>

                                                        <option value="3446">Magadi</option>

                                                        <option value="3447">Pavagada</option>

                                                        <option value="3448">Dod Ballapur</option>

                                                        <option value="3449">Dodballapura</option>

                                                        <option value="3450">Doddaballapura</option>

                                                        <option value="3451">Dodbalapura</option>

                                                        <option value="3452">Gauribidanur</option>

                                                        <option value="3453">Bagepalli</option>

                                                        <option value="3454">Kolar</option>

                                                        <option value="3455">Chik Ballapur</option>

                                                        <option value="3456">Gudibanda</option>

                                                        <option value="3457">Chickballapur</option>

                                                        <option value="3458">Gaurobidanur</option>

                                                        <option value="3459">Gauribidanure</option>

                                                        <option value="3460">Gauribidnur</option>

                                                        <option value="3461">Venkatapura</option>

                                                        <option value="3462">Guribidanur</option>

                                                        <option value="3463">Sidlaghatta</option>

                                                        <option value="3464">Sidlghatta</option>

                                                        <option value="3465">Channapatna</option>

                                                        <option value="3466">Ramanagar</option>

                                                        <option value="3467">Ramanagara</option>

                                                        <option value="3468">Ramangara</option>

                                                        <option value="3469">Devanahalli</option>

                                                        <option value="3470">Devanhalli</option>

                                                        <option value="3471">Nelamangala</option>

                                                        <option value="3472">Kanakapura</option>

                                                        <option value="3473">Hoskote</option>

                                                        <option value="3474">Dharwad</option>

                                                        <option value="3475">Nelamagala</option>

                                                        <option value="3476">Kanakapaura</option>

                                                        <option value="3477">Ramangaram</option>

                                                        <option value="3478">Bangaloresouth</option>

                                                        <option value="3479">Bg South</option>

                                                        <option value="3480">Bgsouth</option>

                                                        <option value="3481">Nla &amp; Bgsouth</option>

                                                        <option value="3482">Banglorenorth</option>

                                                        <option value="3483">Bg North</option>

                                                        <option value="3484">Bgnorth</option>

                                                        <option value="3485">Ramanagaram</option>

                                                        <option value="3486">Doddaballpura</option>

                                                        <option value="3487">Doddabllapur</option>

                                                        <option value="3488">Bangarapet</option>

                                                        <option value="3489">Bangarpet</option>

                                                        <option value="3490">Bangarpet Tq</option>

                                                        <option value="3491">Bngarpet</option>

                                                        <option value="3492">Chintamani</option>

                                                        <option value="3493">Srinivasapura</option>

                                                        <option value="3494">Srinivaspur</option>

                                                        <option value="3495">Srinivsapur</option>

                                                        <option value="3496">Mulbagal</option>

                                                        <option value="3497">Malur</option>

                                                        <option value="3498">Chintamanij</option>

                                                        <option value="3499">Malavalli</option>

                                                        <option value="3500">Mysore</option>

                                                        <option value="3501">H D Kote</option>

                                                        <option value="3502">Kollegal</option>

                                                        <option value="3503">T Narasipura</option>

                                                        <option value="3504">Periyapatna</option>

                                                        <option value="3505">Hunsur</option>

                                                        <option value="3506">Piriyapatna</option>

                                                        <option value="3507">Gundlupet</option>

                                                        <option value="3508">Chamarajanagara</option>

                                                        <option value="3509">Nanjangud</option>

                                                        <option value="3510">T Naraipura</option>

                                                        <option value="3511">Gundluper</option>

                                                        <option value="3512">Heggadadevankote</option>

                                                        <option value="3513">Arkalgud</option>

                                                        <option value="3514">Arsikere</option>

                                                        <option value="3515">Chamarajanagar</option>

                                                        <option value="3516">Aland</option>

                                                        <option value="3517">Tirumakudal Narsipur</option>

                                                        <option value="3518">Sorab</option>

                                                        <option value="3519">Alur</option>

                                                        <option value="3520">Bilgi</option>

                                                        <option value="3521">Madikeri</option>

                                                        <option value="3522">Virajpet</option>

                                                        <option value="3523">Kodagu</option>

                                                        <option value="3524">Koduru</option>

                                                        <option value="3525">Somvarpet</option>

                                                        <option value="3526">Somwarpet</option>

                                                        <option value="3527">Somarpet</option>

                                                        <option value="3528">Krishnarajpet</option>

                                                        <option value="3529">Mandya</option>

                                                        <option value="3530">Mangalore</option>

                                                        <option value="3531">Maddur</option>

                                                        <option value="3532">Shrirangapattana</option>

                                                        <option value="3533">Srirangapatna</option>

                                                        <option value="3534">Nagamangala</option>

                                                        <option value="3535">K.R.Pete</option>

                                                        <option value="3536">Pandavapura</option>

                                                        <option value="3537">K.E.Pete</option>

                                                        <option value="3538">Yelandur</option>

                                                        <option value="3539">Gubbi</option>

                                                        <option value="3540">Belur</option>

                                                        <option value="3541">Devadurga</option>

                                                        <option value="3542">Channarayapatna</option>

                                                        <option value="3543">Davanagere</option>

                                                        <option value="3544">K R Nagar</option>

                                                        <option value="3545">Hebbalu</option>

                                                        <option value="3546">Kannur</option>

                                                        <option value="3547">Sriranagapatna</option>

                                                        <option value="3548">Challakere</option>

                                                        <option value="3549">Tumkur</option>

                                                        <option value="3550">Kunigal</option>

                                                        <option value="3551">Madhugiri</option>

                                                        <option value="3552">Sira</option>

                                                        <option value="3553">Tiptur</option>

                                                        <option value="3554">C.N.Halli</option>

                                                        <option value="3555">C.N.Hally</option>

                                                        <option value="3556">Koratagere</option>

                                                        <option value="3557">Korategere</option>

                                                        <option value="3558">Hiriyur</option>

                                                        <option value="3559">Chitradurga</option>

                                                        <option value="3560">Shikarpur</option>

                                                        <option value="3561">Turuvekere</option>

                                                        <option value="3562">Chikkanayakanahlli</option>

                                                        <option value="3563">Chiknayakanhalli</option>

                                                        <option value="3564">C.N. Halli</option>

                                                        <option value="3565">Tiptir</option>

                                                        <option value="3566">C N Halli</option>

                                                        <option value="3567">Arskiere</option>

                                                        <option value="3568">Channarayapatana</option>

                                                        <option value="3569">Channarayaptna</option>

                                                        <option value="3570">Hosadurga</option>

                                                        <option value="3571">Hassan</option>

                                                        <option value="3572">Channrayapatna</option>

                                                        <option value="3573">Arsiekre</option>

                                                        <option value="3574">Arsikre</option>

                                                        <option value="3575">Sakleshpur</option>

                                                        <option value="3576">Saklehspur</option>

                                                        <option value="3577">Arakalagud</option>

                                                        <option value="3578">Kadur</option>

                                                        <option value="3579">Channaryapatna</option>

                                                        <option value="3580">Sakleshpura</option>

                                                        <option value="3581">Arkalagud</option>

                                                        <option value="3582">Arkalud</option>

                                                        <option value="3583">Skaleshpur</option>

                                                        <option value="3584">Holenarasipur</option>

                                                        <option value="3585">Holenarasipura</option>

                                                        <option value="3586">Holenarsipur</option>

                                                        <option value="3587">Hole Narsipur</option>

                                                        <option value="3588">Holeanarasipur</option>

                                                        <option value="3589">Holeanrasipur</option>

                                                        <option value="3590">Hagaribommanahalli</option>

                                                        <option value="3591">Karkal</option>

                                                        <option value="3592">Karkala</option>

                                                        <option value="3593">Udupi</option>

                                                        <option value="3594">Belthangady</option>

                                                        <option value="3595">Kushtagi</option>

                                                        <option value="3596">Bantval</option>

                                                        <option value="3597">Bantwal</option>

                                                        <option value="3598">Ullal</option>

                                                        <option value="3599">Pudu</option>

                                                        <option value="3600">Thumbe</option>

                                                        <option value="3601">Puttur</option>

                                                        <option value="3602">Sullia</option>

                                                        <option value="3603">Sulya</option>

                                                        <option value="3604">Beltangadi</option>

                                                        <option value="3605">Belthagady</option>

                                                        <option value="3606">Puttur(Dk)</option>

                                                        <option value="3607">Adyar</option>

                                                        <option value="3608">Kundapura</option>

                                                        <option value="3609">Kundpaura</option>

                                                        <option value="3610">Navunda</option>

                                                        <option value="3611">Davangere</option>

                                                        <option value="3612">Chikmagalur</option>

                                                        <option value="3613">Koppa</option>

                                                        <option value="3614">Narasimharajapura</option>

                                                        <option value="3615">Mudigere</option>

                                                        <option value="3616">Bhadravati</option>

                                                        <option value="3617">Shimoga</option>

                                                        <option value="3618">Tarikere</option>

                                                        <option value="3619">Chikamaglur</option>

                                                        <option value="3620">Sringeri</option>

                                                        <option value="3621">Mudigee</option>

                                                        <option value="3622">Srineri</option>

                                                        <option value="3623">Honnali</option>

                                                        <option value="3624">Tirthahalli</option>

                                                        <option value="3625">Afzalpur</option>

                                                        <option value="3626">Channagiri</option>

                                                        <option value="3627">Sagar</option>

                                                        <option value="3628">Thirthahalli</option>

                                                        <option value="3629">Bhadravathi</option>

                                                        <option value="3630">Shimogai</option>

                                                        <option value="3631">Tarikee</option>

                                                        <option value="3632">Bhadravaathi</option>

                                                        <option value="3633">Bhadravathii</option>

                                                        <option value="3634">Hosanagara</option>

                                                        <option value="3635">Soraba</option>

                                                        <option value="3636">Hosanagar</option>

                                                        <option value="3637">Shikaripura</option>

                                                        <option value="3638">Thrithahalli</option>

                                                        <option value="3639">Jagalur</option>

                                                        <option value="3640">Hodadurga</option>

                                                        <option value="3641">Harihara</option>

                                                        <option value="3642">Harihra</option>

                                                        <option value="3643">Holalkere</option>

                                                        <option value="3644">Hoadurga</option>

                                                        <option value="3645">Molakalmuru</option>

                                                        <option value="3646">Davanangere</option>

                                                        <option value="3647">Harihar</option>

                                                        <option value="3648">Badami</option>

                                                        <option value="3649">Aurad</option>

                                                        <option value="3650">Hasadurga</option>

                                                        <option value="3651">Hariahra</option>

                                                        <option value="3652">Dharwar</option>

                                                        <option value="3653">Hubli</option>

                                                        <option value="3654">Kundgol</option>

                                                        <option value="3655">Navalgund</option>

                                                        <option value="3656">Kalgahtagi</option>

                                                        <option value="3657">Kalghatgi</option>

                                                        <option value="3658">Hangal</option>

                                                        <option value="3659">Byadgi</option>

                                                        <option value="3660">Haveri</option>

                                                        <option value="3661">Hirekerur</option>

                                                        <option value="3662">Hirekrur</option>

                                                        <option value="3663">Ranebennur</option>

                                                        <option value="3664">Ranibennur</option>

                                                        <option value="3665">Kungol</option>

                                                        <option value="3666">Gadag</option>

                                                        <option value="3667">Savanur</option>

                                                        <option value="3668">Hirekeruru</option>

                                                        <option value="3669">Supa</option>

                                                        <option value="3670">Shiggaon</option>

                                                        <option value="3671">Joida</option>

                                                        <option value="3672">Indi</option>

                                                        <option value="3673">Naregal</option>

                                                        <option value="3674">Jevargi</option>

                                                        <option value="3675">Bhatkal</option>

                                                        <option value="3676">Kalaghatgi</option>

                                                        <option value="3677">Kalgahtgi</option>

                                                        <option value="3678">Kalghatagi</option>

                                                        <option value="3679">Ranebennur`</option>

                                                        <option value="3680">Navalagund</option>

                                                        <option value="3681">Shiggoan</option>

                                                        <option value="3682">Chitapur</option>

                                                        <option value="3683">Belgaum</option>

                                                        <option value="3684">Karwar</option>

                                                        <option value="3685">Ankola</option>

                                                        <option value="3686">Sirsi</option>

                                                        <option value="3687">Kumta</option>

                                                        <option value="3688">Siddapur</option>

                                                        <option value="3689">Honavar</option>

                                                        <option value="3690">Haliyal</option>

                                                        <option value="3691">Yellapur</option>

                                                        <option value="3692">Mundgod</option>

                                                        <option value="3693">Yellpur</option>

                                                        <option value="3694">Sidddapur</option>

                                                        <option value="3695">Yellpaur</option>

                                                        <option value="3696">Ron</option>

                                                        <option value="3697">Mudargo</option>

                                                        <option value="3698">Mundargi</option>

                                                        <option value="3699">Shirahatti</option>

                                                        <option value="3700">Shiratti</option>

                                                        <option value="3701">Shirhatti</option>

                                                        <option value="3702">Shirahaati</option>

                                                        <option value="3703">Shorapur</option>

                                                        <option value="3704">Nargund</option>

                                                        <option value="3705">Harapanahalli</option>

                                                        <option value="3706">Bellary</option>

                                                        <option value="3707">Sandur</option>

                                                        <option value="3708">Siruguppa</option>

                                                        <option value="3709">Haralpanahalli</option>

                                                        <option value="3710">Kudligi</option>

                                                        <option value="3711">Hospet</option>

                                                        <option value="3712">Kudlgi</option>

                                                        <option value="3713">Harapanahallli</option>

                                                        <option value="3714">Hb Halli</option>

                                                        <option value="3715">Huvinahadagali</option>

                                                        <option value="3716">Hadagalli</option>

                                                        <option value="3717">Huvinhadagali</option>

                                                        <option value="3718">Huvinagadagali</option>

                                                        <option value="3719">H B Halli</option>

                                                        <option value="3720">Hospet Ho</option>

                                                        <option value="3721">Koppal</option>

                                                        <option value="3722">Gangavathi</option>

                                                        <option value="3723">Gangavati</option>

                                                        <option value="3724">Gangawati</option>

                                                        <option value="3725">Gangvathi</option>

                                                        <option value="3726">Gamgavati</option>

                                                        <option value="3727">Gamgavatjhi</option>

                                                        <option value="3728">Gangavthi</option>

                                                        <option value="3729">Yelburga</option>

                                                        <option value="3730">Yelbulrga</option>

                                                        <option value="3731">Ganagavati</option>

                                                        <option value="3732">Yelbuarga</option>

                                                        <option value="3733">Yelbura</option>

                                                        <option value="3734">Kioppal</option>

                                                        <option value="3735">Yelbarga</option>

                                                        <option value="3736">Raichur</option>

                                                        <option value="3737">Mudhol</option>

                                                        <option value="3738">Gangavahi</option>

                                                        <option value="3739">Kushtagui</option>

                                                        <option value="3740">Kustagi</option>

                                                        <option value="3741">Kukshtagi</option>

                                                        <option value="3742">Kukshtgai</option>

                                                        <option value="3743">Kustgai</option>

                                                        <option value="3744">Kusthagi</option>

                                                        <option value="3745">Kusthgati</option>

                                                        <option value="3746">Kukstagai</option>

                                                        <option value="3747">Kukstagi</option>

                                                        <option value="3748">Kushatagi</option>

                                                        <option value="3749">Kustagai</option>

                                                        <option value="3750">Kustagao</option>

                                                        <option value="3751">Gamgavathi</option>

                                                        <option value="3752">Deodurga</option>

                                                        <option value="3753">Lingasugur</option>

                                                        <option value="3754">Lingsugur</option>

                                                        <option value="3755">Manvi</option>

                                                        <option value="3756">Sindhanur</option>

                                                        <option value="3757">Sindhnur</option>

                                                        <option value="3758">Gulbarga</option>

                                                        <option value="3759">Yadgir</option>

                                                        <option value="3760">Yadgiri</option>

                                                        <option value="3761">Yadgri</option>

                                                        <option value="3762">Sedam</option>

                                                        <option value="3763">Chittapur</option>

                                                        <option value="3764">Afjalpur</option>

                                                        <option value="3765">Jewargi</option>

                                                        <option value="3766">Jewargio</option>

                                                        <option value="3767">Shorpaur</option>

                                                        <option value="3768">Shahapur</option>

                                                        <option value="3769">Shahpur</option>

                                                        <option value="3770">Bidar</option>

                                                        <option value="3771">Homnabad</option>

                                                        <option value="3772">Humnabad</option>

                                                        <option value="3773">Bagalkot</option>

                                                        <option value="3774">Basavakalyan</option>

                                                        <option value="3775">Afjlpur</option>

                                                        <option value="3776">Asfjalpur</option>

                                                        <option value="3777">Chincholi</option>

                                                        <option value="3778">Auad (B)</option>

                                                        <option value="3779">Aurad (B)</option>

                                                        <option value="3780">Aurad(B)</option>

                                                        <option value="3781">Bhalki</option>

                                                        <option value="3782">Auarad (B)</option>

                                                        <option value="3783">Bijapur</option>

                                                        <option value="3784">B.Bagewadi</option>

                                                        <option value="3785">Jamkhandi</option>

                                                        <option value="3786">Sindgi</option>

                                                        <option value="3787">Muddebihal</option>

                                                        <option value="3788">Jamakhandi</option>

                                                        <option value="3789">Singi</option>

                                                        <option value="3790">Basavana Bagevadi</option>

                                                        <option value="3791">Chikodi</option>

                                                        <option value="3792">B..Bagewadi</option>

                                                        <option value="3793">B Bagewadi</option>

                                                        <option value="3794">Hungund</option>

                                                        <option value="3795">Hungund Taluk</option>

                                                        <option value="3796">Jamkandi</option>

                                                        <option value="3797">Jqamkhandi</option>

                                                        <option value="3798">Gokak</option>

                                                        <option value="3799">Bailhongal</option>

                                                        <option value="3800">Sampgaon</option>

                                                        <option value="3801">Saundatti</option>

                                                        <option value="3802">Khanapur</option>

                                                        <option value="3803">Hukeri</option>

                                                        <option value="3804">Ramdurg</option>

                                                        <option value="3805">Bailhogal</option>

                                                        <option value="3806">Londa</option>

                                                        <option value="3807">Parasgad</option>

                                                        <option value="3808">Athani</option>

                                                        <option value="3809">Athni</option>

                                                        <option value="3810">Raibag</option>

                                                        <option value="3811">Kerur</option>

                                                        <option value="3812">Raybag</option>

                                                        <option value="3813">Pondicherry</option>

                                                        <option value="3814">Chennai</option>

                                                        <option value="3815">Chennai City North</option>

                                                        <option value="3816">Tondiarpet Fort St George</option>

                                                        <option value="3817">Tondiarpet Fort St Goerge</option>

                                                        <option value="3818">Perambur Purasawalkam</option>

                                                        <option value="3819">Egmore Nungambakka</option>

                                                        <option value="3820">Egmore Nungambakkam</option>

                                                        <option value="3821">Chennai City Corporation</option>

                                                        <option value="3822">Saidapet</option>

                                                        <option value="3823">Sriperumbudur</option>

                                                        <option value="3824">Ambattur</option>

                                                        <option value="3825">Tambaram</option>

                                                        <option value="3826">Egmore Nungambakkm</option>

                                                        <option value="3827">Mylapore - Triplicane</option>

                                                        <option value="3828">Chinglepet</option>

                                                        <option value="3829">Vellore</option>

                                                        <option value="3830">Ponneri</option>

                                                        <option value="3831">Poonamallee</option>

                                                        <option value="3832">Poonamalee</option>

                                                        <option value="3833">Gummidipoondi</option>

                                                        <option value="3834">Avadi</option>

                                                        <option value="3835">Viluppuram</option>

                                                        <option value="3836">Perambur Purawalkam</option>

                                                        <option value="3837">Chennai City South</option>

                                                        <option value="3838">Maduravoyal</option>

                                                        <option value="3839">Chennai Corporation</option>

                                                        <option value="3840">Tiruvallur</option>

                                                        <option value="3841">Mambalam</option>

                                                        <option value="3842">Kancheepuram</option>

                                                        <option value="3843">Chennai City</option>

                                                        <option value="3844">Chengalpattu</option>

                                                        <option value="3845">Sholinganallur</option>

                                                        <option value="3846">Tiruporur</option>

                                                        <option value="3847">Kanchipuram</option>

                                                        <option value="3848">Uttukottai</option>

                                                        <option value="3849">Gummidipundi</option>

                                                        <option value="3850">Gummidipundii</option>

                                                        <option value="3851">Gummidpundi</option>

                                                        <option value="3852">Thiruvallur</option>

                                                        <option value="3853">Tiurvallur</option>

                                                        <option value="3854">Uthukkottai</option>

                                                        <option value="3855">Palavakkam</option>

                                                        <option value="3856">Mangadu</option>

                                                        <option value="3857">Porur</option>

                                                        <option value="3858">Tirukalikundram</option>

                                                        <option value="3859">Tirukalukundram</option>

                                                        <option value="3860">Tiruklalikundram</option>

                                                        <option value="3861">Chingleput</option>

                                                        <option value="3862">Tirukalilkundram</option>

                                                        <option value="3863">Uthiramerur</option>

                                                        <option value="3864">Uttiramerur</option>

                                                        <option value="3865">Maduranthakam</option>

                                                        <option value="3866">Utiramerur</option>

                                                        <option value="3867">Chengalpattu Taluk</option>

                                                        <option value="3868">Sembakkam</option>

                                                        <option value="3869">Tirulkalikundram</option>

                                                        <option value="3870">Tirukalikundram`</option>

                                                        <option value="3871">Chingelpet</option>

                                                        <option value="3872">Madurantakam</option>

                                                        <option value="3873">Chengalplattu</option>

                                                        <option value="3874">Chengallpattu</option>

                                                        <option value="3875">Chengalpatatu</option>

                                                        <option value="3876">Sriperubudur Taluk</option>

                                                        <option value="3877">Cheyur</option>

                                                        <option value="3878">Cheyyur</option>

                                                        <option value="3879">Tindivanam</option>

                                                        <option value="3880">Vanur</option>

                                                        <option value="3881">Gingee</option>

                                                        <option value="3882">Tindivaman</option>

                                                        <option value="3883">Velur</option>

                                                        <option value="3884">Tindvanam</option>

                                                        <option value="3885">Karur</option>

                                                        <option value="3886">Tiruvannamalai</option>

                                                        <option value="3887">Vandavasi</option>

                                                        <option value="3888">Cuddalore</option>

                                                        <option value="3889">Desur</option>

                                                        <option value="3890">Kilpennathur</option>

                                                        <option value="3891">Villupuram</option>

                                                        <option value="3892">Pondichery</option>

                                                        <option value="3893">Kottakuppam</option>

                                                        <option value="3894">Nettapakkam Commune Panchayat</option>

                                                        <option value="3895">Villianur Commune Panchayat</option>

                                                        <option value="3896">Villupurm</option>

                                                        <option value="3897">Vikravandi</option>

                                                        <option value="3898">Tirukkoyilur</option>

                                                        <option value="3899">Sankarapuram</option>

                                                        <option value="3900">Ariyur</option>

                                                        <option value="3901">Arakandanallur</option>

                                                        <option value="3902">Manalurpet</option>

                                                        <option value="3903">Vriddhachalam</option>

                                                        <option value="3904">Kadambur</option>

                                                        <option value="3905">Virudhachalam</option>

                                                        <option value="3906">Ulundurpet</option>

                                                        <option value="3907">Ulundurpettai</option>

                                                        <option value="3908">Tittagudi</option>

                                                        <option value="3909">Tittakudi</option>

                                                        <option value="3910">Pennadam</option>

                                                        <option value="3911">Chinnasalem</option>

                                                        <option value="3912">Kallakurichi</option>

                                                        <option value="3913">Kallakkurichi</option>

                                                        <option value="3914">Sankapuram</option>

                                                        <option value="3915">Nallur</option>

                                                        <option value="3916">Chengam</option>

                                                        <option value="3917">Mangalam</option>

                                                        <option value="3918">Vettavalam</option>

                                                        <option value="3919">Polur</option>

                                                        <option value="3920">Kalambur</option>

                                                        <option value="3921">Panruti</option>

                                                        <option value="3922">Nellikuppam</option>

                                                        <option value="3923">Neyveli</option>

                                                        <option value="3924">Chidambaram</option>

                                                        <option value="3925">Kattumannarkoil</option>

                                                        <option value="3926">Lalpet</option>

                                                        <option value="3927">Chidabamram</option>

                                                        <option value="3928">Parangipettai</option>

                                                        <option value="3929">Bhuvanagiri</option>

                                                        <option value="3930">Kattmannarkoil</option>

                                                        <option value="3931">Kattumanarkoil</option>

                                                        <option value="3932">Kattumannarkioil</option>

                                                        <option value="3933">Kattummannarkoil</option>

                                                        <option value="3934">Srimushnam</option>

                                                        <option value="3935">Alapakkam</option>

                                                        <option value="3936">Jayamkondacholapuram</option>

                                                        <option value="3937">Udayarpalayam</option>

                                                        <option value="3938">Mayiladuthurai</option>

                                                        <option value="3939">Thanjavur</option>

                                                        <option value="3940">Sirkali</option>

                                                        <option value="3941">Tharangambadi</option>

                                                        <option value="3942">Sirkali Tk</option>

                                                        <option value="3943">Nagapattinam</option>

                                                        <option value="3944">Mayiaduthurai</option>

                                                        <option value="3945">Tirupanandal</option>

                                                        <option value="3946">Tarangambadi</option>

                                                        <option value="3947">Tharangampadi</option>

                                                        <option value="3948">Nannilam</option>

                                                        <option value="3949">Kodavasal</option>

                                                        <option value="3950">Karaikal</option>

                                                        <option value="3951">Thirunallar Commune Panchayat</option>

                                                        <option value="3952">Nedungadu Commune Panchayat</option>

                                                        <option value="3953">Neravy Commune Panchayat</option>

                                                        <option value="3954">Thirumalairayan Pattinam Commu</option>

                                                        <option value="3955">Kottucherry Commune Panchayat</option>

                                                        <option value="3956">Kumbakonam</option>

                                                        <option value="3957">Kuttalam</option>

                                                        <option value="3958">Tiruvidamarudur</option>

                                                        <option value="3959">Thiruvidaimarudur</option>

                                                        <option value="3960">Thiruvarur</option>

                                                        <option value="3961">Tiruvarur</option>

                                                        <option value="3962">Mannarkudi</option>

                                                        <option value="3963">Needamangalam</option>

                                                        <option value="3964">Kilvelur</option>

                                                        <option value="3965">Thirukkuvalai</option>

                                                        <option value="3966">Tirukkuvalai</option>

                                                        <option value="3967">Tiruturaipundi</option>

                                                        <option value="3968">Tiruturipundi</option>

                                                        <option value="3969">Tirukuvalai</option>

                                                        <option value="3970">Mannargudi</option>

                                                        <option value="3971">Thiruthuraipoondi</option>

                                                        <option value="3972">Nidamangalam</option>

                                                        <option value="3973">Tiurkuvalai</option>

                                                        <option value="3974">Manali</option>

                                                        <option value="3975">Vedaraniam</option>

                                                        <option value="3976">Vedaranyam</option>

                                                        <option value="3977">Papanasam</option>

                                                        <option value="3978">Valangaiman</option>

                                                        <option value="3979">Tiruppanandal</option>

                                                        <option value="3980">Tiruvidaimarudur</option>

                                                        <option value="3981">Kodavasla</option>

                                                        <option value="3982">Valangaman</option>

                                                        <option value="3983">Ariyalur</option>

                                                        <option value="3984">Thiruvaiyaru</option>

                                                        <option value="3985">Gandarvakkottai</option>

                                                        <option value="3986">Gandarvakotai</option>

                                                        <option value="3987">Gandarvakottai</option>

                                                        <option value="3988">Koradacherry</option>

                                                        <option value="3989">Pattukottai</option>

                                                        <option value="3990">Orattanad</option>

                                                        <option value="3991">Peraiyur</option>

                                                        <option value="3992">Coimbatore</option>

                                                        <option value="3993">Pattukkottai</option>

                                                        <option value="3994">Peravurani</option>

                                                        <option value="3995">Peravurni</option>

                                                        <option value="3996">Patukottai</option>

                                                        <option value="3997">Orathanadu</option>

                                                        <option value="3998">Arantangi</option>

                                                        <option value="3999">Aranthangi</option>

                                                        <option value="4000">Aratangi</option>

                                                        <option value="4001">Manamelkudi</option>

                                                        <option value="4002">Avadaiyarkoil</option>

                                                        <option value="4003">Avudayarkoil</option>

                                                        <option value="4004">Alangudi</option>

                                                        <option value="4005">Aranangi</option>

                                                        <option value="4006">Vedarniam</option>

                                                        <option value="4007">Tiruchirappalli</option>

                                                        <option value="4008">Srirangam</option>

                                                        <option value="4009">Thuraiyur</option>

                                                        <option value="4010">Turaiyur</option>

                                                        <option value="4011">Musiri</option>

                                                        <option value="4012">Manachanalloor</option>

                                                        <option value="4013">Manachanallur</option>

                                                        <option value="4014">Thottiam</option>

                                                        <option value="4015">Perambalur</option>

                                                        <option value="4016">Veppanthattai</option>

                                                        <option value="4017">Kunnam</option>

                                                        <option value="4018">Lalgudi</option>

                                                        <option value="4019">Trichy</option>

                                                        <option value="4020">Thottiyam</option>

                                                        <option value="4021">Kulithalai</option>

                                                        <option value="4022">Kulittalai</option>

                                                        <option value="4023">Manaparai</option>

                                                        <option value="4024">Manapparai</option>

                                                        <option value="4025">Illupur</option>

                                                        <option value="4026">Thirumayam</option>

                                                        <option value="4027">Tiruppathur</option>

                                                        <option value="4028">Illuppur</option>

                                                        <option value="4029">Iluppur</option>

                                                        <option value="4030">Kulathur</option>

                                                        <option value="4031">Sendurai</option>

                                                        <option value="4032">Tiruchirapalli</option>

                                                        <option value="4033">Jayamkondcholapuram</option>

                                                        <option value="4034">Jayamkondocholapuram</option>

                                                        <option value="4035">Pudukkottai</option>

                                                        <option value="4036">Pudukkottai--</option>

                                                        <option value="4037">Pudukottai</option>

                                                        <option value="4038">Annavasal</option>

                                                        <option value="4039">Tirumayam</option>

                                                        <option value="4040">Tirumayaaam</option>

                                                        <option value="4041">Nerkuppai</option>

                                                        <option value="4042">Tirumayaam</option>

                                                        <option value="4043">Sivaganga</option>

                                                        <option value="4044">Kanadukathan</option>

                                                        <option value="4045">Kandanur</option>

                                                        <option value="4046">Kottaiyur</option>

                                                        <option value="4047">Pallathur</option>

                                                        <option value="4048">Kamudhi</option>

                                                        <option value="4049">Kamuthi</option>

                                                        <option value="4050">Kadaladi</option>

                                                        <option value="4051">Tiruvadanai</option>

                                                        <option value="4052">Devakottai</option>

                                                        <option value="4053">Ramanathapuram</option>

                                                        <option value="4054">Rameswaram</option>

                                                        <option value="4055">Paramakudi</option>

                                                        <option value="4056">Nattarasankottai</option>

                                                        <option value="4057">Kamudi</option>

                                                        <option value="4058">Mudukulathur</option>

                                                        <option value="4059">Dindigul</option>

                                                        <option value="4060">Vedasandur</option>

                                                        <option value="4061">Kodaikanal</option>

                                                        <option value="4062">Nilakkottai</option>

                                                        <option value="4063">Nilakottai</option>

                                                        <option value="4064">Vadipatti</option>

                                                        <option value="4065">Sevugampatti</option>

                                                        <option value="4066">Pallapatti</option>

                                                        <option value="4067">Natham</option>

                                                        <option value="4068">Madurai</option>

                                                        <option value="4069">Singampuneri</option>

                                                        <option value="4070">Palani</option>

                                                        <option value="4071">Erode</option>

                                                        <option value="4072">Oddanchatram</option>

                                                        <option value="4073">Madurai South</option>

                                                        <option value="4074">Madurai North</option>

                                                        <option value="4075">Tirumangalam</option>

                                                        <option value="4076">Melur</option>

                                                        <option value="4077">Periyakulam</option>

                                                        <option value="4078">Thirumangalam</option>

                                                        <option value="4079">Paravai</option>

                                                        <option value="4080">Andipatti</option>

                                                        <option value="4081">Aundipatti</option>

                                                        <option value="4082">Bodinayakanur</option>

                                                        <option value="4083">Usilampatti</option>

                                                        <option value="4084">Theni</option>

                                                        <option value="4085">Uthamapalayam</option>

                                                        <option value="4086">Tirumangalam Taluk</option>

                                                        <option value="4087">Virudhunagar</option>

                                                        <option value="4088">Vriudhunagar</option>

                                                        <option value="4089">Aruppukkottai</option>

                                                        <option value="4090">Aruppukottai</option>

                                                        <option value="4091">Rajapalayam</option>

                                                        <option value="4092">Sattur</option>

                                                        <option value="4093">Srivilliputtur</option>

                                                        <option value="4094">Sivakasi</option>

                                                        <option value="4095">Kariapatti</option>

                                                        <option value="4096">Srivilliputhur</option>

                                                        <option value="4097">Tiruchuli</option>

                                                        <option value="4098">Ettayapuram</option>

                                                        <option value="4099">Chinnamanur</option>

                                                        <option value="4100">Highways</option>

                                                        <option value="4101">Kamayagoundanpatti</option>

                                                        <option value="4102">Kombai</option>

                                                        <option value="4103">Pannaipuram</option>

                                                        <option value="4104">Kovilpatti</option>

                                                        <option value="4105">Pudupatti</option>

                                                        <option value="4106">Narasingapuram</option>

                                                        <option value="4107">Devadanapatti</option>

                                                        <option value="4108">Tirunelveli</option>

                                                        <option value="4109">Palayamkottai</option>

                                                        <option value="4110">Palayankottai</option>

                                                        <option value="4111">Nanguneri</option>

                                                        <option value="4112">Radhapuram</option>

                                                        <option value="4113">Ambasamudram</option>

                                                        <option value="4114">Nenguneri</option>

                                                        <option value="4115">Thoothukkudi</option>

                                                        <option value="4116">Tirunelvel;I</option>

                                                        <option value="4117">Alangulam</option>

                                                        <option value="4118">Mettur</option>

                                                        <option value="4119">Sankarankovil</option>

                                                        <option value="4120">Sankarankoil</option>

                                                        <option value="4121">Tenkasi</option>

                                                        <option value="4122">Kalugumalai</option>

                                                        <option value="4123">Sivagiri</option>

                                                        <option value="4124">Sivigiri</option>

                                                        <option value="4125">Sengottai</option>

                                                        <option value="4126">Shenkottai</option>

                                                        <option value="4127">Virakeralampudur</option>

                                                        <option value="4128">Virakerlamapudur</option>

                                                        <option value="4129">Veerapandi</option>

                                                        <option value="4130">Vilathikulam</option>

                                                        <option value="4131">Tuticorin</option>

                                                        <option value="4132">Srivaikuntam</option>

                                                        <option value="4133">Tiruchendur</option>

                                                        <option value="4134">Otapidaram</option>

                                                        <option value="4135">Ottapidaram</option>

                                                        <option value="4136">Kanam</option>

                                                        <option value="4137">Pallipattu</option>

                                                        <option value="4138">Ottapidaam</option>

                                                        <option value="4139">Satankulam</option>

                                                        <option value="4140">Rivaikuntam</option>

                                                        <option value="4141">Sathankulam</option>

                                                        <option value="4142">Vilathikulam (Kol)</option>

                                                        <option value="4143">Vilathikulam ( Kol)</option>

                                                        <option value="4144">Agastheeswaram</option>

                                                        <option value="4145">Kanyakumari</option>

                                                        <option value="4146">Vilavancode</option>

                                                        <option value="4147">Kalkulam</option>

                                                        <option value="4148">Thovala</option>

                                                        <option value="4149">Kanniyakumari</option>

                                                        <option value="4150">Killiyur</option>

                                                        <option value="4151">Thovalai</option>

                                                        <option value="4152">Agasteeswaram</option>

                                                        <option value="4153">Kulasekarapuram</option>

                                                        <option value="4154">Karaikudi</option>

                                                        <option value="4155">Karaikudi-Sakkottai Block</option>

                                                        <option value="4156">Karaikudi -Sakkottai Block</option>

                                                        <option value="4157">Karaikudi--Sakkottai Block</option>

                                                        <option value="4158">Karaikkudi</option>

                                                        <option value="4159">Karaikudi-Sakkottaiblock</option>

                                                        <option value="4160">Tiruppattur</option>

                                                        <option value="4161">Tirupattur</option>

                                                        <option value="4162">Tirupathur</option>

                                                        <option value="4163">Karaikudi-Kallal Block</option>

                                                        <option value="4164">Tiruppattur- Kallal Block</option>

                                                        <option value="4165">Karaikudi -Kallal Block</option>

                                                        <option value="4166">Karaikudi-Kallalblock</option>

                                                        <option value="4167">Tiruppattur-</option>

                                                        <option value="4168">Tiruppattur-Singampunari Block</option>

                                                        <option value="4169">Tiruppattur-Singampunariblock</option>

                                                        <option value="4170">Tiruppattur -Singsmpunariblock</option>

                                                        <option value="4171">Tiruppattur-Singamounariblock</option>

                                                        <option value="4172">Singampunari Block</option>

                                                        <option value="4173">Tirppattur-Singamounari Block</option>

                                                        <option value="4174">Manamadurai</option>

                                                        <option value="4175">Ilayangudi</option>

                                                        <option value="4176">Panapakkam</option>

                                                        <option value="4177">Tirutani</option>

                                                        <option value="4178">Tiruttani</option>

                                                        <option value="4179">Pallipat</option>

                                                        <option value="4180">Trutani</option>

                                                        <option value="4181">Sriperubudur</option>

                                                        <option value="4182">Dusi</option>

                                                        <option value="4183">Thorapadi</option>

                                                        <option value="4184">Katpadi</option>

                                                        <option value="4185">Shenbakkam</option>

                                                        <option value="4186">Pennathur</option>

                                                        <option value="4187">Konavattam</option>

                                                        <option value="4188">Vadugapatti</option>

                                                        <option value="4189">Kannamangalam</option>

                                                        <option value="4190">Ammoor</option>

                                                        <option value="4191">Kalavai</option>

                                                        <option value="4192">Timiri</option>

                                                        <option value="4193">Walajapet</option>

                                                        <option value="4194">Vilapakkam</option>

                                                        <option value="4195">Chennasamudram</option>

                                                        <option value="4196">Dharmapuri</option>

                                                        <option value="4197">Krishnagiri</option>

                                                        <option value="4198">Hosur</option>

                                                        <option value="4199">Kambainallur</option>

                                                        <option value="4200">Kadathur</option>

                                                        <option value="4201">Alangayam</option>

                                                        <option value="4202">Vaniyambadi</option>

                                                        <option value="4203">Ambur</option>

                                                        <option value="4204">Pallikonda</option>

                                                        <option value="4205">Thuthipattu</option>

                                                        <option value="4206">Salem</option>

                                                        <option value="4207">Kannankurichi</option>

                                                        <option value="4208">Kondalampatti</option>

                                                        <option value="4209">Attur</option>

                                                        <option value="4210">Gangavalli</option>

                                                        <option value="4211">Thammampatti</option>

                                                        <option value="4212">Kolathur</option>

                                                        <option value="4213">Mecheri</option>

                                                        <option value="4214">Nangavalli</option>

                                                        <option value="4215">Omalur</option>

                                                        <option value="4216">Tharamangalam</option>

                                                        <option value="4217">Harur</option>

                                                        <option value="4218">Marandahalli</option>

                                                        <option value="4219">Pennagaram</option>

                                                        <option value="4220">Pappireddipatti</option>

                                                        <option value="4221">Mohanur</option>

                                                        <option value="4222">Konganapuram</option>

                                                        <option value="4223">Poolampatti</option>

                                                        <option value="4224">Padaiveedu</option>

                                                        <option value="4225">Kalappanaickenpatti</option>

                                                        <option value="4226">Namakkal</option>

                                                        <option value="4227">Rasipuram</option>

                                                        <option value="4228">Attayampatti</option>

                                                        <option value="4229">Mallasamudram</option>

                                                        <option value="4230">Kaniyur</option>

                                                        <option value="4231">Komaralingam</option>

                                                        <option value="4232">Avanashi</option>

                                                        <option value="4233">Palladam</option>

                                                        <option value="4234">Aravakurichi</option>

                                                        <option value="4235">Krishnarayapuram</option>

                                                        <option value="4236">Kirishnarayapuram</option>

                                                        <option value="4237">Kuniyamuthur</option>

                                                        <option value="4238">Kurudampalayam</option>

                                                        <option value="4239">Othakalmandapam</option>

                                                        <option value="4240">Kalapatti</option>

                                                        <option value="4241">Irugur</option>

                                                        <option value="4242">Karamadai</option>

                                                        <option value="4243">Madukkarai</option>

                                                        <option value="4244">Vellalur</option>

                                                        <option value="4245">Chettipalayam</option>

                                                        <option value="4246">Kannampalayam</option>

                                                        <option value="4247">Pollachi</option>

                                                        <option value="4248">Kinathukadavu</option>

                                                        <option value="4249">Kovilpalayam</option>

                                                        <option value="4250">Madathukulam</option>

                                                        <option value="4251">Samathur</option>

                                                        <option value="4252">Valparai</option>

                                                        <option value="4253">Vettaikaranpudur</option>

                                                        <option value="4254">Kannur</option>

                                                        <option value="4255">Cannanore (Kannur)</option>

                                                        <option value="4256">Thalassery</option>

                                                        <option value="4257">Thalasery</option>

                                                        <option value="4258">Taliparamba</option>

                                                        <option value="4259">Cannanore</option>

                                                        <option value="4260">Taliaparamba</option>

                                                        <option value="4261">Hosdurg</option>

                                                        <option value="4262">Mananthavady</option>

                                                        <option value="4263">Vythiri</option>

                                                        <option value="4264">Manantahvady</option>

                                                        <option value="4265">Thalasseery</option>

                                                        <option value="4266">Sulthanbathery</option>

                                                        <option value="4267">Wayanad</option>

                                                        <option value="4268">Kasaragod</option>

                                                        <option value="4269">Kasargode</option>

                                                        <option value="4270">Kozhikode</option>

                                                        <option value="4271">Calicut</option>

                                                        <option value="4272">Olavanna</option>

                                                        <option value="4273">Vadakara</option>

                                                        <option value="4274">Vythiti</option>

                                                        <option value="4275">Quilandy</option>

                                                        <option value="4276">Koyilandi</option>

                                                        <option value="4277">Tirurangadi</option>

                                                        <option value="4278">Koyilani</option>

                                                        <option value="4279">Sulthan Batheri</option>

                                                        <option value="4280">Sulthan Bathery</option>

                                                        <option value="4281">Ernad</option>

                                                        <option value="4282">Eranad</option>

                                                        <option value="4283">Malapuram</option>

                                                        <option value="4284">Tirur</option>

                                                        <option value="4285">Manjeri</option>

                                                        <option value="4286">Nilambur</option>

                                                        <option value="4287">#N/A</option>

                                                        <option value="4288">Perintalmanna</option>

                                                        <option value="4289">Perinthalmanna</option>

                                                        <option value="4290">Palakkad</option>

                                                        <option value="4291">Thrissur</option>

                                                        <option value="4292">Chittur</option>

                                                        <option value="4293">Alatur</option>

                                                        <option value="4294">Alathur</option>

                                                        <option value="4295">Mannarkad</option>

                                                        <option value="4296">Mannarkkad</option>

                                                        <option value="4297">Ottapalam</option>

                                                        <option value="4298">Mannarkad Q</option>

                                                        <option value="4299">Ottappalam</option>

                                                        <option value="4300">Thalapilly</option>

                                                        <option value="4301">Talappilly</option>

                                                        <option value="4302">Ottpalam</option>

                                                        <option value="4303">Ottapalam.</option>

                                                        <option value="4304">Chavakkad</option>

                                                        <option value="4305">Ponani</option>

                                                        <option value="4306">Ponnani</option>

                                                        <option value="4307">Trichur</option>

                                                        <option value="4308">Mukundapuram</option>

                                                        <option value="4309">Mukundapuram Taluk</option>

                                                        <option value="4310">Kodungallur</option>

                                                        <option value="4311">Irinjalakuda</option>

                                                        <option value="4312">Paravur</option>

                                                        <option value="4313">Mi\Ukundapuram</option>

                                                        <option value="4314">Kochi</option>

                                                        <option value="4315">Ernakulam</option>

                                                        <option value="4316">Kanayannur</option>

                                                        <option value="4317">Kunnathunad</option>

                                                        <option value="4318">Kunnathunadu</option>

                                                        <option value="4319">Muvattupuzha</option>

                                                        <option value="4320">Aluva</option>

                                                        <option value="4321">Parur</option>

                                                        <option value="4322">Iduki</option>

                                                        <option value="4323">Peermade</option>

                                                        <option value="4324">Peerumade</option>

                                                        <option value="4325">Udumbanchola</option>

                                                        <option value="4326">Ranni</option>

                                                        <option value="4327">Idukki</option>

                                                        <option value="4328">Devikulam</option>

                                                        <option value="4329">Thodupuzha</option>

                                                        <option value="4330">Kottayam</option>

                                                        <option value="4331">Perumbaikad</option>

                                                        <option value="4332">Changanacherry</option>

                                                        <option value="4333">Changanassery</option>

                                                        <option value="4334">Kuttanad</option>

                                                        <option value="4335">Kuttanadu</option>

                                                        <option value="4336">Meenachil</option>

                                                        <option value="4337">Vaikom</option>

                                                        <option value="4338">Voikom</option>

                                                        <option value="4339">Kanjirapally</option>

                                                        <option value="4340">Kanjirappally</option>

                                                        <option value="4341">Mallappally</option>

                                                        <option value="4342">Kothamangalam</option>

                                                        <option value="4343">Ambalapuzha</option>

                                                        <option value="4344">Ambalapuha</option>

                                                        <option value="4345">Ambalappuzha</option>

                                                        <option value="4346">Ambalapuzh A</option>

                                                        <option value="4347">Alappuzha</option>

                                                        <option value="4348">Cherthala</option>

                                                        <option value="4349">Cherthla</option>

                                                        <option value="4350">Mararikulam</option>

                                                        <option value="4351">Thiruvalla</option>

                                                        <option value="4352">Tiruvalla</option>

                                                        <option value="4353">Chengannur</option>

                                                        <option value="4354">Pathanamthitta</option>

                                                        <option value="4355">Kozhenchery</option>

                                                        <option value="4356">Adoor</option>

                                                        <option value="4357">Adur</option>

                                                        <option value="4358">Kozhencherry</option>

                                                        <option value="4359">Mavelikkara</option>

                                                        <option value="4360">Mavelikara</option>

                                                        <option value="4361">Kozhencherri</option>

                                                        <option value="4362">Ranny</option>

                                                        <option value="4363">Pathanapuram</option>

                                                        <option value="4364">Kollam</option>

                                                        <option value="4365">Karthikappally</option>

                                                        <option value="4366">Karunagappaly</option>

                                                        <option value="4367">Karunagapally</option>

                                                        <option value="4368">Karunagappally</option>

                                                        <option value="4369">Kunnathur</option>

                                                        <option value="4370">Kottarakkara</option>

                                                        <option value="4371">Kottarakara</option>

                                                        <option value="4372">Kolllam</option>

                                                        <option value="4373">Adichanallur</option>

                                                        <option value="4374">Thiruvananthapuram</option>

                                                        <option value="4375">Trivandrum</option>

                                                        <option value="4376">Nedumangad</option>

                                                        <option value="4377">Trivendrum</option>

                                                        <option value="4378">Neyyattinkara</option>

                                                        <option value="4379">Chirayinkeezhu</option>

                                                        <option value="4380">Chirayinkeezh</option>

                                                        <option value="4381">Chirayinkil</option>

                                                        <option value="4382">Tiruvanathapuram</option>

                                                        <option value="4383">NA</option>

                                                        <option value="4384">Kolkata</option>

                                                        <option value="4385">Amherst Street</option>

                                                        <option value="4386">Parsibagan</option>

                                                        <option value="4387">Beleghata</option>

                                                        <option value="4388">Narkeldanga</option>

                                                        <option value="4389">Sankaritola</option>

                                                        <option value="4390">Sealdah</option>

                                                        <option value="4391">Taltala</option>

                                                        <option value="4392">Circus Avenue</option>

                                                        <option value="4393">Park Circus</option>

                                                        <option value="4394">Bediadanga</option>

                                                        <option value="4395">Picnic Garden</option>

                                                        <option value="4396">Tiljala</option>

                                                        <option value="4397">Topsia</option>

                                                        <option value="4398">A. C Lane</option>

                                                        <option value="4399">24 Pgs North</option>

                                                        <option value="4400">Patipukur</option>

                                                        <option value="4401">Sreebhumi</option>

                                                        <option value="4402">Barrackpore</option>

                                                        <option value="4403">North 24 Paraganas</option>

                                                        <option value="4404">Kankurgachi</option>

                                                        <option value="4405">Phulbagan</option>

                                                        <option value="4406">Dum Dum Park</option>

                                                        <option value="4407">Jessore Road</option>

                                                        <option value="4408">North 24 Pgs</option>

                                                        <option value="4409">Belgharia</option>

                                                        <option value="4410">North 24 Parganas</option>

                                                        <option value="4411">D B Nagar</option>

                                                        <option value="4412">D B Nagr</option>

                                                        <option value="4413">Sakltlake</option>

                                                        <option value="4414">Saltlake</option>

                                                        <option value="4415">Budge Budge - I</option>

                                                        <option value="4416">South 24 Parganas</option>

                                                        <option value="4417">Saltklake</option>

                                                        <option value="4418">Vip Nagar</option>

                                                        <option value="4419">Bishnupur - I</option>

                                                        <option value="4420">Dhapa</option>

                                                        <option value="4421">Barrackpur - I</option>

                                                        <option value="4422">Titagarh]</option>

                                                        <option value="4423">N.C.Pukur</option>

                                                        <option value="4424">Barasat - I</option>

                                                        <option value="4425">Kadambagachi</option>

                                                        <option value="4426">Kamdevpur</option>

                                                        <option value="4427">Khilkapur</option>

                                                        <option value="4428">Mirhati</option>

                                                        <option value="4429">Noapara</option>

                                                        <option value="4430">Noapara Madhavpur</option>

                                                        <option value="4431">Bodai</option>

                                                        <option value="4432">Jagannathpur</option>

                                                        <option value="4433">Malikapur</option>

                                                        <option value="4434">Bhagyamantapur</option>

                                                        <option value="4435">Kirtipur`</option>

                                                        <option value="4436">Madanpur Krishnapur</option>

                                                        <option value="4437">Mudiahat</option>

                                                        <option value="4438">Barasat - Ii</option>

                                                        <option value="4439">Barrackpur - Ii</option>

                                                        <option value="4440">Habra - I</option>

                                                        <option value="4441">Ganti</option>

                                                        <option value="4442">Akandakeshari</option>

                                                        <option value="4443">Bagu</option>

                                                        <option value="4444">Bishnupur</option>

                                                        <option value="4445">Hatisala</option>

                                                        <option value="4446">Kadampukur</option>

                                                        <option value="4447">Kamduni</option>

                                                        <option value="4448">Kashinathpur</option>

                                                        <option value="4449">Machibhanga</option>

                                                        <option value="4450">Matiaghata</option>

                                                        <option value="4451">Patharghata</option>

                                                        <option value="4452">Pithapukuria</option>

                                                        <option value="4453">Rajarhat</option>

                                                        <option value="4454">Rohanda</option>

                                                        <option value="4455">Satbhaya</option>

                                                        <option value="4456">Shyamnagar</option>

                                                        <option value="4457">Sikharpur</option>

                                                        <option value="4458">Bhangar - Ii</option>

                                                        <option value="4459">Urttar Kashipur</option>

                                                        <option value="4460">Budge Budge</option>

                                                        <option value="4461">Budge Budge - Ii</option>

                                                        <option value="4462">Gosaba</option>

                                                        <option value="4463">Thakurpukur Mahestola</option>

                                                        <option value="4464">Baruipur</option>

                                                        <option value="4465">Sonarpur</option>

                                                        <option value="4466">Amdanga</option>

                                                        <option value="4467">New Town</option>

                                                        <option value="4468">Deshbandhunagar</option>

                                                        <option value="4469">Bally Jagachha</option>

                                                        <option value="4470">Domjur</option>

                                                        <option value="4471">Sankrail</option>

                                                        <option value="4472">Uluberia - I</option>

                                                        <option value="4473">Uluberia - Ii</option>

                                                        <option value="4474">Howrah</option>

                                                        <option value="4475">Panchla</option>

                                                        <option value="4476">Amta - Ii</option>

                                                        <option value="4477">Jagatballavpur</option>

                                                        <option value="4478">Chinsurah</option>

                                                        <option value="4479">Chinsurah - Magra</option>

                                                        <option value="4480">Hooghly</option>

                                                        <option value="4481">Addconagar</option>

                                                        <option value="4482">Goghat - Ii</option>

                                                        <option value="4483">Goghat-Ii</option>

                                                        <option value="4484">Bandel</option>

                                                        <option value="4485">Chandanagar</option>

                                                        <option value="4486">Chandannagar</option>

                                                        <option value="4487">Singur</option>

                                                        <option value="4488">Boinchi</option>

                                                        <option value="4489">Pandua</option>

                                                        <option value="4490">Ilsobamandal</option>

                                                        <option value="4491">Ilsobamandali</option>

                                                        <option value="4492">Ilsomandalai</option>

                                                        <option value="4493">Itachuna</option>

                                                        <option value="4494">Magra</option>

                                                        <option value="4495">Polba - Dadpur</option>

                                                        <option value="4496">PURULIYA</option>

                                                        <option value="4497">Serampur Uttarpara</option>

                                                        <option value="4498">Serampore</option>

                                                        <option value="4499">Bhandarhati</option>

                                                        <option value="4500">Bhanderhati</option>

                                                        <option value="4501">Dhaniakhali</option>

                                                        <option value="4502">Gurap</option>

                                                        <option value="4503">Chanditala - Ii</option>

                                                        <option value="4504">Puinan</option>

                                                        <option value="4505">Khanpur</option>

                                                        <option value="4506">Arambagh</option>

                                                        <option value="4507">Tarakeswar</option>

                                                        <option value="4508">Dasghara</option>

                                                        <option value="4509">Haripal</option>

                                                        <option value="4510">Jangipara</option>

                                                        <option value="4511">Khanakul 1B</option>

                                                        <option value="4512">Khanakul 2B</option>

                                                        <option value="4513">Khanakul I.B</option>

                                                        <option value="4514">Khanakul-1B</option>

                                                        <option value="4515">Khanakul-2B</option>

                                                        <option value="4516">Burdwan</option>

                                                        <option value="4517">Pursurah</option>

                                                        <option value="4518">Arambag</option>

                                                        <option value="4519">Khanakul-I</option>

                                                        <option value="4520">Raina</option>

                                                        <option value="4521">Pursura</option>

                                                        <option value="4522">Pursurah.</option>

                                                        <option value="4523">Khanakul2B</option>

                                                        <option value="4524">KRISHNAGAR</option>

                                                        <option value="4525">Balagarh</option>

                                                        <option value="4526">Bansberia</option>

                                                        <option value="4527">Guptipara</option>

                                                        <option value="4528">Nayasarai</option>

                                                        <option value="4529">Khamargachi</option>

                                                        <option value="4530">Goghat-I</option>

                                                        <option value="4531">Goghat-1</option>

                                                        <option value="4532">Goghat - I</option>

                                                        <option value="4533">Chanditala - I</option>

                                                        <option value="4534">Chandangar</option>

                                                        <option value="4535">Burdwan - I</option>

                                                        <option value="4536">Galsi - I</option>

                                                        <option value="4537">Bhatar</option>

                                                        <option value="4538">Kalna</option>

                                                        <option value="4539">Katwa</option>

                                                        <option value="4540">Ketugram - I</option>

                                                        <option value="4541">Ketugram - Ii</option>

                                                        <option value="4542">Mangolkote</option>

                                                        <option value="4543">Burdwan - Ii</option>

                                                        <option value="4544">Memari</option>

                                                        <option value="4545">Raina - I</option>

                                                        <option value="4546">Bhater</option>

                                                        <option value="4547">Ausgram - I</option>

                                                        <option value="4548">Gushkara</option>

                                                        <option value="4549">Guskara</option>

                                                        <option value="4550">Burdwan Sadar</option>

                                                        <option value="4551">Kalna - I</option>

                                                        <option value="4552">Katwa - I</option>

                                                        <option value="4553">Khandaghosh</option>

                                                        <option value="4554">Bhatart</option>

                                                        <option value="4555">Manteswar</option>

                                                        <option value="4556">Ausgram - Ii</option>

                                                        <option value="4557">Memari - I</option>

                                                        <option value="4558">Kanksa</option>

                                                        <option value="4559">Bardhaman</option>

                                                        <option value="4560">Memari - Ii</option>

                                                        <option value="4561">Durgapur Mc</option>

                                                        <option value="4562">Durgapur Municipal Corporation</option>

                                                        <option value="4563">Faridpur Durgapur</option>

                                                        <option value="4564">Asansol</option>

                                                        <option value="4565">Duragpur Mc</option>

                                                        <option value="4566">Barabani</option>

                                                        <option value="4567">Jamuria</option>

                                                        <option value="4568">Baraboni</option>

                                                        <option value="4569">Andal</option>

                                                        <option value="4570">Raniganj</option>

                                                        <option value="4571">Pandabeswar</option>

                                                        <option value="4572">Raniganj Mc</option>

                                                        <option value="4573">Kulti Mc</option>

                                                        <option value="4574">Asansol Mc</option>

                                                        <option value="4575">Salanpur</option>

                                                        <option value="4576">Jamuriahat</option>

                                                        <option value="4577">Pandaveshwar</option>

                                                        <option value="4578">Pandaveshwr</option>

                                                        <option value="4579">Raniganj Municipality</option>

                                                        <option value="4580">Laudoha</option>

                                                        <option value="4581">Jamalpur</option>

                                                        <option value="4582">Purbasthali - I</option>

                                                        <option value="4583">Kalna - Ii</option>

                                                        <option value="4584">Raina - Ii</option>

                                                        <option value="4585">Purbasthali - Ii</option>

                                                        <option value="4586">Burddwan</option>

                                                        <option value="4587">Galsi - Ii</option>

                                                        <option value="4588">Katwa - Ii</option>

                                                        <option value="4589">Midnapore</option>

                                                        <option value="4590">Binpur-I</option>

                                                        <option value="4591">Garhbeta-I</option>

                                                        <option value="4592">Garhbeta-Ii</option>

                                                        <option value="4593">MEDINIPUR </option>

                                                        <option value="4594">Ballichak</option>

                                                        <option value="4595">Debra</option>

                                                        <option value="4596">Kharagpur</option>

                                                        <option value="4597">Pingla</option>

                                                        <option value="4598">Baligeria</option>

                                                        <option value="4599">Banisole</option>

                                                        <option value="4600">Banskuthi</option>

                                                        <option value="4601">Baranegui</option>

                                                        <option value="4602">Chandabila</option>

                                                        <option value="4603">Chilkipada</option>

                                                        <option value="4604">Dhumsai</option>

                                                        <option value="4605">Dokra</option>

                                                        <option value="4606">Dolgram</option>

                                                        <option value="4607">Kuldiha</option>

                                                        <option value="4608">Morchi</option>

                                                        <option value="4609">Nagripada</option>

                                                        <option value="4610">Paika</option>

                                                        <option value="4611">Satpautia</option>

                                                        <option value="4612">Keshpur</option>

                                                        <option value="4613">Garhbeta-Iii</option>

                                                        <option value="4614">Salbani</option>

                                                        <option value="4615">Salboni</option>

                                                        <option value="4616">Panskura</option>

                                                        <option value="4617">Panskura-Ii</option>

                                                        <option value="4618">Daspur</option>

                                                        <option value="4619">Panskura-I</option>

                                                        <option value="4620">Amda</option>

                                                        <option value="4621">Baghasti</option>

                                                        <option value="4622">Benadiha</option>

                                                        <option value="4623">Bhasra</option>

                                                        <option value="4624">Borah</option>

                                                        <option value="4625">Chakla</option>

                                                        <option value="4626">Gaganeswar</option>

                                                        <option value="4627">Ganasarisa</option>

                                                        <option value="4628">Jamsole</option>

                                                        <option value="4629">June Belda</option>

                                                        <option value="4630">Keshiary</option>

                                                        <option value="4631">Kuishgeria</option>

                                                        <option value="4632">Kukai</option>

                                                        <option value="4633">Lengamara</option>

                                                        <option value="4634">Markanda</option>

                                                        <option value="4635">Nachhipur</option>

                                                        <option value="4636">Rautarapur</option>

                                                        <option value="4637">Santrapur</option>

                                                        <option value="4638">Singaijamuna</option>

                                                        <option value="4639">Sukharole</option>

                                                        <option value="4640">Uttar Dumurkhola</option>

                                                        <option value="4641">Panskura Ii</option>

                                                        <option value="4642">Sahid Matangini</option>

                                                        <option value="4643">Barida</option>

                                                        <option value="4644">Bakrachak</option>

                                                        <option value="4645">Binandapur</option>

                                                        <option value="4646">Chhorda</option>

                                                        <option value="4647">Chunpara</option>

                                                        <option value="4648">D.S.Boni</option>

                                                        <option value="4649">Keshiapada</option>

                                                        <option value="4650">Kultikri</option>

                                                        <option value="4651">Laudaha</option>

                                                        <option value="4652">Pathra</option>

                                                        <option value="4653">Ranbonia</option>

                                                        <option value="4654">T.Mahisamunda</option>

                                                        <option value="4655">Sahidmatangini</option>

                                                        <option value="4656">Panakura</option>

                                                        <option value="4657">Sabang</option>

                                                        <option value="4658">Andhari</option>

                                                        <option value="4659">Andhari Maubhandar</option>

                                                        <option value="4660">Bachhurkhoyar</option>

                                                        <option value="4661">Baharadari</option>

                                                        <option value="4662">Bonpura</option>

                                                        <option value="4663">Narda</option>

                                                        <option value="4664">Rohini</option>

                                                        <option value="4665">Narayangarh</option>

                                                        <option value="4666">Kharagpur-I</option>

                                                        <option value="4667">Daspur-I</option>

                                                        <option value="4668">Daspur-Ii</option>

                                                        <option value="4669">Ghatal</option>

                                                        <option value="4670">Kharagpur-Ii</option>

                                                        <option value="4671">Tamluk-I</option>

                                                        <option value="4672">Garhbeta</option>

                                                        <option value="4673">Garheta</option>

                                                        <option value="4674">Jharia</option>

                                                        <option value="4675">Kalmapukhuria</option>

                                                        <option value="4676">Kharikamathani</option>

                                                        <option value="4677">Nayagram</option>

                                                        <option value="4678">Nekrasole</option>

                                                        <option value="4679">Tufuria Kalmapur</option>

                                                        <option value="4680">Tamluk</option>

                                                        <option value="4681">Chandrakona-I</option>

                                                        <option value="4682">Chandrakona-Ii</option>

                                                        <option value="4683">Hgatal</option>

                                                        <option value="4684">Ajodhyapur</option>

                                                        <option value="4685">Bahitrakunda</option>

                                                        <option value="4686">Baksispur</option>

                                                        <option value="4687">Contai</option>

                                                        <option value="4688">Damodarpur</option>

                                                        <option value="4689">Darua</option>

                                                        <option value="4690">Daudpur</option>

                                                        <option value="4691">Dhangaon</option>

                                                        <option value="4692">Durmuth</option>

                                                        <option value="4693">Fuleswar</option>

                                                        <option value="4694">Kantai</option>

                                                        <option value="4695">Mahisagote</option>

                                                        <option value="4696">Namal</option>

                                                        <option value="4697">Nayaput</option>

                                                        <option value="4698">Pailachhanpur</option>

                                                        <option value="4699">R.P.Barh</option>

                                                        <option value="4700">Sabajput</option>

                                                        <option value="4701">Srirampur</option>

                                                        <option value="4702">Tengunia</option>

                                                        <option value="4703">Alangiri</option>

                                                        <option value="4704">Baitabazar</option>

                                                        <option value="4705">Jerthan</option>

                                                        <option value="4706">Astichak</option>

                                                        <option value="4707">Atbati</option>

                                                        <option value="4708">Balageria</option>

                                                        <option value="4709">Balighai</option>

                                                        <option value="4710">Bathuary</option>

                                                        <option value="4711">Bhatda</option>

                                                        <option value="4712">Bidurpur</option>

                                                        <option value="4713">Hatbaincha</option>

                                                        <option value="4714">Jamualachimpur</option>

                                                        <option value="4715">Kajli</option>

                                                        <option value="4716">Keutgeria</option>

                                                        <option value="4717">Khejurda</option>

                                                        <option value="4718">Naskarpur</option>

                                                        <option value="4719">Pirijkhanbarh</option>

                                                        <option value="4720">Urdhabpur</option>

                                                        <option value="4721">Uttar-Tajpur</option>

                                                        <option value="4722">Balisai</option>

                                                        <option value="4723">Bodhra</option>

                                                        <option value="4724">Dakhinbadalpur</option>

                                                        <option value="4725">Deuli</option>

                                                        <option value="4726">Gopalchak</option>

                                                        <option value="4727">Karanji</option>

                                                        <option value="4728">Narandia</option>

                                                        <option value="4729">Narkuli</option>

                                                        <option value="4730">Satilapur</option>

                                                        <option value="4731">Shyampur</option>

                                                        <option value="4732">Akanda</option>

                                                        <option value="4733">Bakhrabad</option>

                                                        <option value="4734">Belda</option>

                                                        <option value="4735">Chakmahima</option>

                                                        <option value="4736">Chotta-Chatla</option>

                                                        <option value="4737">Dhalbelun</option>

                                                        <option value="4738">Dhangarpara</option>

                                                        <option value="4739">Gaita</option>

                                                        <option value="4740">Kanpur</option>

                                                        <option value="4741">Kashipur</option>

                                                        <option value="4742">Khalina</option>

                                                        <option value="4743">Lalnagar</option>

                                                        <option value="4744">Phandar</option>

                                                        <option value="4745">Reripur</option>

                                                        <option value="4746">Saljora</option>

                                                        <option value="4747">Tarua</option>

                                                        <option value="4748">Thakurchak</option>

                                                        <option value="4749">Uparjagatpur</option>

                                                        <option value="4750">Bhupatinagar</option>

                                                        <option value="4751">Mugberia</option>

                                                        <option value="4752">Purbaradhapur</option>

                                                        <option value="4753">Udbadal</option>

                                                        <option value="4754">Basuli Bazar</option>

                                                        <option value="4755">Bayenda</option>

                                                        <option value="4756">Bhaghadari</option>

                                                        <option value="4757">Dumandari</option>

                                                        <option value="4758">Angua</option>

                                                        <option value="4759">Banjhatia</option>

                                                        <option value="4760">Belmula</option>

                                                        <option value="4761">Chaulia</option>

                                                        <option value="4762">Dantan</option>

                                                        <option value="4763">Gazipur</option>

                                                        <option value="4764">Jamirapalgarh</option>

                                                        <option value="4765">Kakrajit</option>

                                                        <option value="4766">Kotepada</option>

                                                        <option value="4767">Lalitapur</option>

                                                        <option value="4768">Murabani</option>

                                                        <option value="4769">Paragana</option>

                                                        <option value="4770">Saorapin</option>

                                                        <option value="4771">Sarrang</option>

                                                        <option value="4772">Sonakonia</option>

                                                        <option value="4773">Uttar Ranibarh</option>

                                                        <option value="4774">Amtalia</option>

                                                        <option value="4775">Aurai</option>

                                                        <option value="4776">Bhawanichak</option>

                                                        <option value="4777">Deulbarh</option>

                                                        <option value="4778">Ghoraghata</option>

                                                        <option value="4779">Jamua Sankarpur</option>

                                                        <option value="4780">Kulanjara</option>

                                                        <option value="4781">Namaldiha</option>

                                                        <option value="4782">Sarada</option>

                                                        <option value="4783">Uttar Amtalia</option>

                                                        <option value="4784">Digha</option>

                                                        <option value="4785">Paya-Medinipur</option>

                                                        <option value="4786">Saripur</option>

                                                        <option value="4787">Baranihary</option>

                                                        <option value="4788">Barida Bazar</option>

                                                        <option value="4789">Bartana</option>

                                                        <option value="4790">Benachakri</option>

                                                        <option value="4791">Chhatri</option>

                                                        <option value="4792">Egra</option>

                                                        <option value="4793">Erenda</option>

                                                        <option value="4794">Kaithore</option>

                                                        <option value="4795">Khar</option>

                                                        <option value="4796">Kharuigarh</option>

                                                        <option value="4797">Rasan</option>

                                                        <option value="4798">Susunia</option>

                                                        <option value="4799">Ajoya</option>

                                                        <option value="4800">Bansgora Bazar</option>

                                                        <option value="4801">Barabari South</option>

                                                        <option value="4802">Chingurdania</option>

                                                        <option value="4803">D.Kalamdan</option>

                                                        <option value="4804">Dekhali</option>

                                                        <option value="4805">Haria</option>

                                                        <option value="4806">Jukhia Bazar</option>

                                                        <option value="4807">Krishnanagar Contai</option>

                                                        <option value="4808">Lakhi</option>

                                                        <option value="4809">Mohati</option>

                                                        <option value="4810">Subdi</option>

                                                        <option value="4811">Thakurnagar</option>

                                                        <option value="4812">Tikashi</option>

                                                        <option value="4813">Uttar Kalamdan</option>

                                                        <option value="4814">Baratala</option>

                                                        <option value="4815">Boga</option>

                                                        <option value="4816">Gopichak</option>

                                                        <option value="4817">Janka</option>

                                                        <option value="4818">Kartikkhali</option>

                                                        <option value="4819">Kasaria</option>

                                                        <option value="4820">Katka Debichak</option>

                                                        <option value="4821">Keunchia</option>

                                                        <option value="4822">Khejuri</option>

                                                        <option value="4823">Kunjapur</option>

                                                        <option value="4824">Lakshmanchak</option>

                                                        <option value="4825">Medakhali</option>

                                                        <option value="4826">Nijkasba</option>

                                                        <option value="4827">Pankhai</option>

                                                        <option value="4828">Ramchak</option>

                                                        <option value="4829">Satkhanda Sahebnagar</option>

                                                        <option value="4830">Sillyaberia</option>

                                                        <option value="4831">Baharganj</option>

                                                        <option value="4832">Chaudachulli</option>

                                                        <option value="4833">Deulpota Keshabchak</option>

                                                        <option value="4834">Haludbari</option>

                                                        <option value="4835">Jahanabad</option>

                                                        <option value="4836">Kalagachia</option>

                                                        <option value="4837">Kamarda Bazar</option>

                                                        <option value="4838">Serkhanchak</option>

                                                        <option value="4839">Takapura</option>

                                                        <option value="4840">Battala</option>

                                                        <option value="4841">Haipur</option>

                                                        <option value="4842">Khalisabhanga</option>

                                                        <option value="4843">Maitana</option>

                                                        <option value="4844">Majna</option>

                                                        <option value="4845">Mandarpur</option>

                                                        <option value="4846">Sisusadan</option>

                                                        <option value="4847">Tagaria</option>

                                                        <option value="4848">Barmakhal</option>

                                                        <option value="4849">Dhankrabanka</option>

                                                        <option value="4850">Maisali</option>

                                                        <option value="4851">Manglamaro</option>

                                                        <option value="4852">Panchuria</option>

                                                        <option value="4853">Saridaspur</option>

                                                        <option value="4854">Tagharia</option>

                                                        <option value="4855">Chhoto Srikrishnapur</option>

                                                        <option value="4856">Koria</option>

                                                        <option value="4857">Jenkapur</option>

                                                        <option value="4858">Menkapur</option>

                                                        <option value="4859">Salikotha</option>

                                                        <option value="4860">Talda Ratanchak</option>

                                                        <option value="4861">Amarda</option>

                                                        <option value="4862">Begunia</option>

                                                        <option value="4863">Mohanpur</option>

                                                        <option value="4864">Paroi</option>

                                                        <option value="4865">Rajnagar</option>

                                                        <option value="4866">Siyalsai</option>

                                                        <option value="4867">Tanua</option>

                                                        <option value="4868">East Midnapore</option>

                                                        <option value="4869">Bahurupa</option>

                                                        <option value="4870">Barakalankai</option>

                                                        <option value="4871">Bhadrakali</option>

                                                        <option value="4872">Birbira</option>

                                                        <option value="4873">Dibarpanda</option>

                                                        <option value="4874">Fulgeria</option>

                                                        <option value="4875">Handlarajgarh</option>

                                                        <option value="4876">Jhanjianankar</option>

                                                        <option value="4877">Kanthalia</option>

                                                        <option value="4878">Khurshi</option>

                                                        <option value="4879">Konarpur</option>

                                                        <option value="4880">Kotaigarh</option>

                                                        <option value="4881">Lohabaranchak</option>

                                                        <option value="4882">Makrampurbazar</option>

                                                        <option value="4883">Nankarmaguria</option>

                                                        <option value="4884">Rampura</option>

                                                        <option value="4885">Saluka</option>

                                                        <option value="4886">Sansadgopinathpur</option>

                                                        <option value="4887">Tentuliabhumjan</option>

                                                        <option value="4888">Chandanpur</option>

                                                        <option value="4889">Ghatua Purusottampur</option>

                                                        <option value="4890">Panchetgarh</option>

                                                        <option value="4891">Alamchak Belda</option>

                                                        <option value="4892">Amarpur</option>

                                                        <option value="4893">Argora</option>

                                                        <option value="4894">Ayma Barbaria</option>

                                                        <option value="4895">Bulakipur</option>

                                                        <option value="4896">Gokulpur</option>

                                                        <option value="4897">Kanakpur</option>

                                                        <option value="4898">Kekai</option>

                                                        <option value="4899">Makrampur</option>

                                                        <option value="4900">Naipur</option>

                                                        <option value="4901">North Biswanathpur</option>

                                                        <option value="4902">Patashpur</option>

                                                        <option value="4903">Satbahini</option>

                                                        <option value="4904">Ballyagobindapur</option>

                                                        <option value="4905">Chakbhabani</option>

                                                        <option value="4906">Pania</option>

                                                        <option value="4907">Pratapdighi</option>

                                                        <option value="4908">Alankarpur</option>

                                                        <option value="4909">Gobra</option>

                                                        <option value="4910">Haldia Patna</option>

                                                        <option value="4911">Hirapur</option>

                                                        <option value="4912">Jhawgeria</option>

                                                        <option value="4913">Mandar</option>

                                                        <option value="4914">Ramnagar</option>

                                                        <option value="4915">Baikunthapur</option>

                                                        <option value="4916">Bankiput</option>

                                                        <option value="4917">Basantia</option>

                                                        <option value="4918">Benichak</option>

                                                        <option value="4919">Chapatala</option>

                                                        <option value="4920">Dariapur</option>

                                                        <option value="4921">Dholmari</option>

                                                        <option value="4922">Safiabad</option>

                                                        <option value="4923">Uttarharaschak</option>

                                                        <option value="4924">Barabatia</option>

                                                        <option value="4925">Uttar Asda</option>

                                                        <option value="4926">Bandhuchak</option>

                                                        <option value="4927">Brahamankhalisa</option>

                                                        <option value="4928">Garh Haripur</option>

                                                        <option value="4929">Jahalda</option>

                                                        <option value="4930">Keut Khalisa</option>

                                                        <option value="4931">Lalat</option>

                                                        <option value="4932">Mustafapur</option>

                                                        <option value="4933">Renjura</option>

                                                        <option value="4934">Analberia</option>

                                                        <option value="4935">Basudebberia</option>

                                                        <option value="4936">Dakhin Sandalpur</option>

                                                        <option value="4937">Dhanghara</option>

                                                        <option value="4938">Dighadari</option>

                                                        <option value="4939">Gangadharchak</option>

                                                        <option value="4940">Ichabari</option>

                                                        <option value="4941">Kanaidighi</option>

                                                        <option value="4942">Kayemgeria</option>

                                                        <option value="4943">Kumirda</option>

                                                        <option value="4944">Nachinda</option>

                                                        <option value="4945">Panichiary</option>

                                                        <option value="4946">Paushi</option>

                                                        <option value="4947">Sarpai</option>

                                                        <option value="4948">Asda</option>

                                                        <option value="4949">Babla</option>

                                                        <option value="4950">Ekarukhi</option>

                                                        <option value="4951">Garh Radhanagar</option>

                                                        <option value="4952">Khakurda</option>

                                                        <option value="4953">Kushbasan</option>

                                                        <option value="4954">Laudangri</option>

                                                        <option value="4955">Mirzapur Belda</option>

                                                        <option value="4956">Porolda</option>

                                                        <option value="4957">Purunda</option>

                                                        <option value="4958">Sabra</option>

                                                        <option value="4959">Sauri</option>

                                                        <option value="4960">Turka Kashba</option>

                                                        <option value="4961">Turkagarh</option>

                                                        <option value="4962">Aswathapur</option>

                                                        <option value="4963">Bolkhusda</option>

                                                        <option value="4964">Chandanpurhat</option>

                                                        <option value="4965">Jasteghori</option>

                                                        <option value="4966">Kandagram</option>

                                                        <option value="4967">Mirgoda</option>

                                                        <option value="4968">Ranisai</option>

                                                        <option value="4969">Sadihat</option>

                                                        <option value="4970">Sadikpur</option>

                                                        <option value="4971">Sagareswar</option>

                                                        <option value="4972">Sahara</option>

                                                        <option value="4973">Kalyanpur Tentulmuri</option>

                                                        <option value="4974">Kasbagola</option>

                                                        <option value="4975">Panchrol</option>

                                                        <option value="4976">Telami</option>

                                                        <option value="4977">Barada Bazar</option>

                                                        <option value="4978">Chatla</option>

                                                        <option value="4979">Chirulia</option>

                                                        <option value="4980">Chorpalia</option>

                                                        <option value="4981">Dubda</option>

                                                        <option value="4982">Garia</option>

                                                        <option value="4983">Juki</option>

                                                        <option value="4984">Jumki</option>

                                                        <option value="4985">Khurutia</option>

                                                        <option value="4986">Kultikri Aranga</option>

                                                        <option value="4987">Negua</option>

                                                        <option value="4988">Paniparul</option>

                                                        <option value="4989">Shipur</option>

                                                        <option value="4990">Banamalichatta</option>

                                                        <option value="4991">Daisai</option>

                                                        <option value="4992">Karaldanimakbarh</option>

                                                        <option value="4993">Marisda</option>

                                                        <option value="4994">Barabantalia</option>

                                                        <option value="4995">Deshdattabarh</option>

                                                        <option value="4996">Jhawa</option>

                                                        <option value="4997">Junput</option>

                                                        <option value="4998">Paschim Bamunia</option>

                                                        <option value="4999">Bakurpada</option>

                                                        <option value="5000">Deulinekurseni</option>

                                                        <option value="5001">Garh-Monoharpur</option>

                                                        <option value="5002">Kashimpur</option>

                                                        <option value="5003">Keshrambha</option>

                                                        <option value="5004">Khatnagar</option>

                                                        <option value="5005">Kutki</option>

                                                        <option value="5006">Maljamuna</option>

                                                        <option value="5007">Nekurseni</option>

                                                        <option value="5008">Palsandapur</option>

                                                        <option value="5009">Tararui</option>

                                                        <option value="5010">Uchudiha</option>

                                                        <option value="5011">Basudebpur</option>

                                                        <option value="5012">Bhajachauli</option>

                                                        <option value="5013">Biswanathpur</option>

                                                        <option value="5014">Dhandalibarh</option>

                                                        <option value="5015">Junboni</option>

                                                        <option value="5016">Khagda</option>

                                                        <option value="5017">Mahespur</option>

                                                        <option value="5018">Murisai</option>

                                                        <option value="5019">Paschim Manikpur</option>

                                                        <option value="5020">Satmile</option>

                                                        <option value="5021">Uttar Badalpur</option>

                                                        <option value="5022">Depal</option>

                                                        <option value="5023">Manikabasan</option>

                                                        <option value="5024">Paldhui</option>

                                                        <option value="5025">Purba Madhabpur</option>

                                                        <option value="5026">Uttar Gobindapur</option>

                                                        <option value="5027">Uttar Kanpur</option>

                                                        <option value="5028">Alukaranbarh</option>

                                                        <option value="5029">Amarshi</option>

                                                        <option value="5030">Barhat</option>

                                                        <option value="5031">Hatgopalpur</option>

                                                        <option value="5032">Katranka</option>

                                                        <option value="5033">Madanmohanpur</option>

                                                        <option value="5034">Saulabheri</option>

                                                        <option value="5035">Selmabad</option>

                                                        <option value="5036">Bhuniajibarh</option>

                                                        <option value="5037">Chaulkhola</option>

                                                        <option value="5038">Dakshin Kalyanpur</option>

                                                        <option value="5039">Dakshin Kalynpur</option>

                                                        <option value="5040">Islampur</option>

                                                        <option value="5041">Kalindi</option>

                                                        <option value="5042">Kalindi Teghari</option>

                                                        <option value="5043">Pichabani</option>

                                                        <option value="5044">Argoal</option>

                                                        <option value="5045">Arjunnagar</option>

                                                        <option value="5046">Bamanbarh</option>

                                                        <option value="5047">Baraudaypur</option>

                                                        <option value="5048">Brajaballavepur</option>

                                                        <option value="5049">Itaberia</option>

                                                        <option value="5050">Jabda</option>

                                                        <option value="5051">Kalsi</option>

                                                        <option value="5052">Lalua</option>

                                                        <option value="5053">Manikjore</option>

                                                        <option value="5054">Mathura</option>

                                                        <option value="5055">Sukhakhola</option>

                                                        <option value="5056">Akpura</option>

                                                        <option value="5057">Anikola</option>

                                                        <option value="5058">Barangi</option>

                                                        <option value="5059">Borai</option>

                                                        <option value="5060">Chak Islampur</option>

                                                        <option value="5061">Dhuipada</option>

                                                        <option value="5062">Dobaria</option>

                                                        <option value="5063">Gomunda</option>

                                                        <option value="5064">Kumarda</option>

                                                        <option value="5065">Matibaruan</option>

                                                        <option value="5066">Nilda</option>

                                                        <option value="5067">Remu</option>

                                                        <option value="5068">Sautia</option>

                                                        <option value="5069">Bankibheri</option>

                                                        <option value="5070">Bhimeswaribazar</option>

                                                        <option value="5071">Bibhisanpur</option>

                                                        <option value="5072">Noonhanda</option>

                                                        <option value="5073">Palpara</option>

                                                        <option value="5074">Panchahari</option>

                                                        <option value="5075">Totanala</option>

                                                        <option value="5076">Ururi</option>

                                                        <option value="5077">Adasimla</option>

                                                        <option value="5078">Barachara</option>

                                                        <option value="5079">Bonai</option>

                                                        <option value="5080">Chandkuri-Batikati</option>

                                                        <option value="5081">Chhatorekole</option>

                                                        <option value="5082">Dasagram</option>

                                                        <option value="5083">Duria</option>

                                                        <option value="5084">Kalasbarh</option>

                                                        <option value="5085">Kolanda</option>

                                                        <option value="5086">Rautara</option>

                                                        <option value="5087">Sarta</option>

                                                        <option value="5088">Binpur-Ii</option>

                                                        <option value="5089">Jhargram</option>

                                                        <option value="5090">Jamboni</option>

                                                        <option value="5091">Gopiballavpur-I</option>

                                                        <option value="5092">Gopiballavpur-Ii</option>

                                                        <option value="5093">Bhagawanpur</option>

                                                        <option value="5094">Bhagwanpur</option>

                                                        <option value="5095">Haldia Municipality</option>

                                                        <option value="5096">Haldiamunicipality</option>

                                                        <option value="5097">Sutahata</option>

                                                        <option value="5098">Mahisadal</option>

                                                        <option value="5099">Nandigram</option>

                                                        <option value="5100">Reapara</option>

                                                        <option value="5101">Bhagawanpur-Ii</option>

                                                        <option value="5102">Kajlagarh</option>

                                                        <option value="5103">Tamkluk-I</option>

                                                        <option value="5104">Nandakumar</option>

                                                        <option value="5105">Moiyna</option>

                                                        <option value="5106">Moyna</option>

                                                        <option value="5107">Nandigram-I</option>

                                                        <option value="5108">Bhagwarpur</option>

                                                        <option value="5109">Bhawanpur</option>

                                                        <option value="5110">Chandipur</option>

                                                        <option value="5111">Nandigram-Iii</option>

                                                        <option value="5112">Khukurdaha</option>

                                                        <option value="5113">Arankiarana</option>

                                                        <option value="5114">Haldia</option>

                                                        <option value="5115">Nandigram-Ii</option>

                                                        <option value="5116">Nandigram Ii</option>

                                                        <option value="5117">GOPINATHPUR</option>

                                                        <option value="5118">Bankura - I</option>

                                                        <option value="5119">Bankura</option>

                                                        <option value="5120">Sonamukhi</option>

                                                        <option value="5121">Hirbandh</option>

                                                        <option value="5122">Indpur</option>

                                                        <option value="5123">Khatra</option>

                                                        <option value="5124">Taldangra</option>

                                                        <option value="5125">Joypur</option>

                                                        <option value="5126">Vishnupur</option>

                                                        <option value="5127">Chhatna</option>

                                                        <option value="5128">Saltora</option>

                                                        <option value="5129">G.Ghati</option>

                                                        <option value="5130">Gangajalghati</option>

                                                        <option value="5131">Raipur</option>

                                                        <option value="5132">Sarenga</option>

                                                        <option value="5133">Ranibandh</option>

                                                        <option value="5134">Onda</option>

                                                        <option value="5135">Jaypur</option>

                                                        <option value="5136">Kotalpur</option>

                                                        <option value="5137">Kotulpur</option>

                                                        <option value="5138">Barjora</option>

                                                        <option value="5139">Mejia</option>

                                                        <option value="5140">Mejhia</option>

                                                        <option value="5141">Ranibundh</option>

                                                        <option value="5142">Simlapal</option>

                                                        <option value="5143">Bankura - Ii</option>

                                                        <option value="5144">Bishnpur</option>

                                                        <option value="5145">Borjora</option>

                                                        <option value="5146">Indas</option>

                                                        <option value="5147">Indus</option>

                                                        <option value="5148">Patrasayer</option>

                                                        <option value="5149">Puncha</option>

                                                        <option value="5150">Purulia</option>

                                                        <option value="5151">Purulia - I</option>

                                                        <option value="5152">Chharrah</option>

                                                        <option value="5153">Adra</option>

                                                        <option value="5154">Kalapathar</option>

                                                        <option value="5155">Neturia</option>

                                                        <option value="5156">Raghunathpur</option>

                                                        <option value="5157">Santuri</option>

                                                        <option value="5158">Anara</option>

                                                        <option value="5159">Anara Rs</option>

                                                        <option value="5160">Para</option>

                                                        <option value="5161">Purulia - Ii</option>

                                                        <option value="5162">Barabazar</option>

                                                        <option value="5163">Barabhum</option>

                                                        <option value="5164">Balakdih</option>

                                                        <option value="5165">Kenda</option>

                                                        <option value="5166">Manbazar</option>

                                                        <option value="5167">Manbazar - I</option>

                                                        <option value="5168">Bundwan</option>

                                                        <option value="5169">Hura</option>

                                                        <option value="5170">Manbazar - Ii</option>

                                                        <option value="5171">Manbazar Ii</option>

                                                        <option value="5172">Raghuathpur</option>

                                                        <option value="5173">Raghunath Pur I</option>

                                                        <option value="5174">Ramkanali</option>

                                                        <option value="5175">Baghmundi</option>

                                                        <option value="5176">Bagmudni</option>

                                                        <option value="5177">Bagmundi</option>

                                                        <option value="5178">Balarampur</option>

                                                        <option value="5179">Raghunathpur - Ii</option>

                                                        <option value="5180">Santaldih</option>

                                                        <option value="5181">Hutmura</option>

                                                        <option value="5182">Purulia Ii</option>

                                                        <option value="5183">Manguria</option>

                                                        <option value="5184">Baghmudni</option>

                                                        <option value="5185">Arsha</option>

                                                        <option value="5186">Sirkabad</option>

                                                        <option value="5187">Murardih</option>

                                                        <option value="5188">Manihara</option>

                                                        <option value="5189">Garjaipur</option>

                                                        <option value="5190">Jaipur</option>

                                                        <option value="5191">Jhalda I</option>

                                                        <option value="5192">Jhalda Ii</option>

                                                        <option value="5193">Jhalda</option>

                                                        <option value="5194">Bagmundih</option>

                                                        <option value="5195">Tulin</option>

                                                        <option value="5196">Jhalda - Ii</option>

                                                        <option value="5197">Jiudaru</option>

                                                        <option value="5198">Kotshila</option>

                                                        <option value="5199">Birbhum</option>

                                                        <option value="5200">Suri - I</option>

                                                        <option value="5201">Suri - Ii</option>

                                                        <option value="5202">Dubrajpur</option>

                                                        <option value="5203">Sainthia</option>

                                                        <option value="5204">Bolpur Sriniketan</option>

                                                        <option value="5205">Nanoor</option>

                                                        <option value="5206">Murarai - I</option>

                                                        <option value="5207">Rampurhat - I</option>

                                                        <option value="5208">Mayureswar - I</option>

                                                        <option value="5209">Nalhati - I</option>

                                                        <option value="5210">Labpur</option>

                                                        <option value="5211">Englishbazar</option>

                                                        <option value="5212">Gajol</option>

                                                        <option value="5213">Koilabad</option>

                                                        <option value="5214">Kumarganj</option>

                                                        <option value="5215">Old Malda</option>

                                                        <option value="5216">Pukuria</option>

                                                        <option value="5217">Ratua</option>

                                                        <option value="5218">Ratua Ii</option>

                                                        <option value="5219">ENGLISH BAZAR</option>

                                                        <option value="5220">Gouramari</option>

                                                        <option value="5221">Habibpir</option>

                                                        <option value="5222">Habibpur (Srirampur Anchal)</option>

                                                        <option value="5223">Mabarakpur</option>

                                                        <option value="5224">Srirampur (Habibpur)</option>

                                                        <option value="5225">Aktail</option>

                                                        <option value="5226">Bulbulchandi</option>

                                                        <option value="5227">Habibpur</option>

                                                        <option value="5228">Kanturka</option>

                                                        <option value="5229">Chanchal</option>

                                                        <option value="5230">Hatinda</option>

                                                        <option value="5231">Alal</option>

                                                        <option value="5232">Deotala</option>

                                                        <option value="5233">Gajol.</option>

                                                        <option value="5234">Habibpur (Arajimistrabati)</option>

                                                        <option value="5235">Hardamnagar</option>

                                                        <option value="5236">Harishchandrapur</option>

                                                        <option value="5237">Harishchandrapur -Ii</option>

                                                        <option value="5238">Malior</option>

                                                        <option value="5239">Mariary</option>

                                                        <option value="5240">Miahat</option>

                                                        <option value="5241">Pipla Kashimpur</option>

                                                        <option value="5242">Talbangrua</option>

                                                        <option value="5243">Talgachhi</option>

                                                        <option value="5244">Talgram</option>

                                                        <option value="5245">Talsur</option>

                                                        <option value="5246">Khanpur Hubaspur 165</option>

                                                        <option value="5247">Baishnabnagar</option>

                                                        <option value="5248">Kaliachak</option>

                                                        <option value="5249">Lakshipur</option>

                                                        <option value="5250">Bamangola</option>

                                                        <option value="5251">Bamongola</option>

                                                        <option value="5252">Dalla</option>

                                                        <option value="5253">Dighalbar</option>

                                                        <option value="5254">Habibpuir</option>

                                                        <option value="5255">Patul</option>

                                                        <option value="5256">Amarsinghi</option>

                                                        <option value="5257">Andhirampara</option>

                                                        <option value="5258">Chorolmoni</option>

                                                        <option value="5259">Damaipur</option>

                                                        <option value="5260">Gangadevi</option>

                                                        <option value="5261">Goripur</option>

                                                        <option value="5262">Sripur</option>

                                                        <option value="5263">Kushida</option>

                                                        <option value="5264">Paro</option>

                                                        <option value="5265">Tulsihatta</option>

                                                        <option value="5266">Sahajalalpur</option>

                                                        <option value="5267">Kharba</option>

                                                        <option value="5268">Chariantatapur</option>

                                                        <option value="5269">Kaliacahak</option>

                                                        <option value="5270">Kaliachak-1</option>

                                                        <option value="5271">Kaliachak-I</option>

                                                        <option value="5272">Mozampur</option>

                                                        <option value="5273">North Jadupur</option>

                                                        <option value="5274">Silampur</option>

                                                        <option value="5275">Silampur-Ii</option>

                                                        <option value="5276">Chowki Mirdadpur</option>

                                                        <option value="5277">Manikchak</option>

                                                        <option value="5278">Pashchim Narayanpur</option>

                                                        <option value="5279">Manikchjak</option>

                                                        <option value="5280">Ratua -I</option>

                                                        <option value="5281">Ratua-I</option>

                                                        <option value="5282">Baro Sujapur</option>

                                                        <option value="5283">Kaliachak Ii</option>

                                                        <option value="5284">Kaliachak-Ii</option>

                                                        <option value="5285">Mothabari</option>

                                                        <option value="5286">Panchanandapur</option>

                                                        <option value="5287">Uttar Lakshmipur</option>

                                                        <option value="5288">Kaliachak-Iii</option>

                                                        <option value="5289">Krishnapur</option>

                                                        <option value="5290">Ratua-Ii</option>

                                                        <option value="5291">Akandaberia</option>

                                                        <option value="5292">Kadamtala</option>

                                                        <option value="5293">Balurghat</option>

                                                        <option value="5294">Itahar</option>

                                                        <option value="5295">Banshihari</option>

                                                        <option value="5296">Bansihari</option>

                                                        <option value="5297">Kushmundi</option>

                                                        <option value="5298">Raiganj</option>

                                                        <option value="5299">Gazole</option>

                                                        <option value="5300">Gangarampur</option>

                                                        <option value="5301">Harirampur</option>

                                                        <option value="5302">Hili</option>

                                                        <option value="5303">Hilli</option>

                                                        <option value="5304">Tapan</option>

                                                        <option value="5305">Kaliaganj</option>

                                                        <option value="5306">Kaliganj</option>

                                                        <option value="5307">Kaliyaganj</option>

                                                        <option value="5308">Hemtabad</option>

                                                        <option value="5309">West Dinajpur</option>

                                                        <option value="5310">Kushmandi</option>

                                                        <option value="5311">Balurgthat</option>

                                                        <option value="5312">Kumargunj</option>

                                                        <option value="5313">Dalkhola</option>

                                                        <option value="5314">Goalpokhar - Ii</option>

                                                        <option value="5315">Karandighi</option>

                                                        <option value="5316">Chopra</option>

                                                        <option value="5317">Ilsmapur</option>

                                                        <option value="5318">Goalpokhar - I</option>

                                                        <option value="5319">Goalpukher</option>

                                                        <option value="5320">Siliguri</option>

                                                        <option value="5321">Rajganj</option>

                                                        <option value="5322">Kalimpong -I</option>

                                                        <option value="5323">Kurseong</option>

                                                        <option value="5324">Naxalbari</option>

                                                        <option value="5325">Matigara</option>

                                                        <option value="5326">Darjeeling</option>

                                                        <option value="5327">Phansidewa</option>

                                                        <option value="5328">Darjeeling Pulbazar</option>

                                                        <option value="5329">Jorebunglow Sukiapokhri</option>

                                                        <option value="5330">Kalimpong - Ii</option>

                                                        <option value="5331">Rangli Rangliot</option>

                                                        <option value="5332">Kalimpong</option>

                                                        <option value="5333">Mirik</option>

                                                        <option value="5334">Darjiling</option>

                                                        <option value="5335">Kharibari</option>

                                                        <option value="5336">Mal</option>

                                                        <option value="5337">Gorubathan</option>

                                                        <option value="5338">Jalpaiguri</option>

                                                        <option value="5339">Jalpaiguri Sadar</option>

                                                        <option value="5340">Haldibari</option>

                                                        <option value="5341">Dhupguri</option>

                                                        <option value="5342">Nagrakata</option>

                                                        <option value="5343">Falakata</option>

                                                        <option value="5344">Madarihat</option>

                                                        <option value="5345">Matelli</option>

                                                        <option value="5346">Matteli</option>

                                                        <option value="5347">Alipurduar</option>

                                                        <option value="5348">Dhupguri Sadar</option>

                                                        <option value="5349">Mathabhanga - Ii</option>

                                                        <option value="5350">Mathabhanga</option>

                                                        <option value="5351">Alipurduar - I</option>

                                                        <option value="5352">Kalchini</option>

                                                        <option value="5353">Dinhata - I</option>

                                                        <option value="5354">Maynaguri</option>

                                                        <option value="5355">Madari Hat</option>

                                                        <option value="5356">Mekhliganj</option>

                                                        <option value="5357">Kumargram</option>

                                                        <option value="5358">Garubathan I</option>

                                                        <option value="5359">Mekliganj</option>

                                                        <option value="5360">Mekhliganjs.O.</option>

                                                        <option value="5361">Cooch Behar - I</option>

                                                        <option value="5362">Koch Bihar</option>

                                                        <option value="5363">Tufanganj</option>

                                                        <option value="5364">Tufanganj - Ii</option>

                                                        <option value="5365">Cooch Behar</option>

                                                        <option value="5366">Cooch Behar - Ii</option>

                                                        <option value="5367">Dinhata</option>

                                                        <option value="5368">Dinhata - Ii</option>

                                                        <option value="5369">Mathabhanga - I</option>

                                                        <option value="5370">Tufanganj - I</option>

                                                        <option value="5371">Sitalkuchi</option>

                                                        <option value="5372">Sitai</option>

                                                        <option value="5373">Mathabhanga`</option>

                                                        <option value="5374">Alipurduar - Ii</option>

                                                        <option value="5375">Krishnagar - I</option>

                                                        <option value="5376">Krishnanagar Municipality</option>

                                                        <option value="5377">Dogachhi</option>

                                                        <option value="5378">Hanskhali</option>

                                                        <option value="5379">Krishnagar I</option>

                                                        <option value="5380">Krishnanagar I</option>

                                                        <option value="5381">Chapra</option>

                                                        <option value="5382">Krishnagar-I</option>

                                                        <option value="5383">Tehatta</option>

                                                        <option value="5384">Tehatta I</option>

                                                        <option value="5385">Nadia</option>

                                                        <option value="5386">Ranaghat-I</option>

                                                        <option value="5387">Santipur</option>

                                                        <option value="5388">Karimpur I</option>

                                                        <option value="5389">Nakashipara</option>

                                                        <option value="5390">Dhubulia</option>

                                                        <option value="5391">Krishnagar - Ii</option>

                                                        <option value="5392">Krishnanagar Ii</option>

                                                        <option value="5393">Bethuadahari</option>

                                                        <option value="5394">Debagram</option>

                                                        <option value="5395">Ranaghat - I</option>

                                                        <option value="5396">Kalligang</option>

                                                        <option value="5397">Krishnangar Ii</option>

                                                        <option value="5398">Karimpur Ii</option>

                                                        <option value="5399">Tehatta Ii</option>

                                                        <option value="5400">Nowda</option>

                                                        <option value="5401">Nowda (Murshidabad)</option>

                                                        <option value="5402">Palashipara</option>

                                                        <option value="5403">Plashipara</option>

                                                        <option value="5404">Shikarpur Bdo I</option>

                                                        <option value="5405">Krishnanagar-I</option>

                                                        <option value="5406">Tehatta - I</option>

                                                        <option value="5407">Karimpur Ii (Mohisbatan)</option>

                                                        <option value="5408">Nazrpur</option>

                                                        <option value="5409">Krishnaganj</option>

                                                        <option value="5410">BERHAMPORE</option>

                                                        <option value="5411">Ranaghat-I/Ii</option>

                                                        <option value="5412">Ranagaht-Ii</option>

                                                        <option value="5413">Ranaghat - Ii</option>

                                                        <option value="5414">Ranaghat-Ii</option>

                                                        <option value="5415">Haringhata</option>

                                                        <option value="5416">Chakdah</option>

                                                        <option value="5417">Chakdaha</option>

                                                        <option value="5418">Haringhat</option>

                                                        <option value="5419">Ranaghat</option>

                                                        <option value="5420">Nabadwip</option>

                                                        <option value="5421">Nabadwip Municipality</option>

                                                        <option value="5422">Sreemayapur</option>

                                                        <option value="5423">Krishnagar-Ii</option>

                                                        <option value="5424">Purbasthali I</option>

                                                        <option value="5425">Hanskhlai</option>

                                                        <option value="5426">Murshidabad</option>

                                                        <option value="5427">Murshidabad Jiaganj</option>

                                                        <option value="5428">Nabagram</option>

                                                        <option value="5429">Suti - Ii</option>

                                                        <option value="5430">Domkal</option>

                                                        <option value="5431">Nawda</option>

                                                        <option value="5432">Sagardighi</option>

                                                        <option value="5433">DEBIPUR</option>

                                                        <option value="5434">Burwan</option>

                                                        <option value="5435">Beldanga - I</option>

                                                        <option value="5436">Bhagawangola - I</option>

                                                        <option value="5437">Bhagawangola - Ii</option>

                                                        <option value="5438">Kandi</option>

                                                        <option value="5439">Suti - I</option>

                                                        <option value="5440">Bharatpur - I</option>

                                                        <option value="5441">Khargram</option>

                                                        <option value="5442">Lalgola</option>

                                                        <option value="5443">Beldanga - Ii</option>

                                                        <option value="5444">Hariharpara</option>

                                                        <option value="5445">Raghunathganj - I</option>

                                                        <option value="5446">GOALJAN</option>

                                                        <option value="5447">Farakka</option>

                                                        <option value="5448">Samserganj</option>

                                                        <option value="5449">Raghunathganj - Ii</option>

                                                        <option value="5450">Jalangi</option>

                                                        <option value="5451">GHORSALA</option>

                                                        <option value="5452">Palsanda</option>

                                                        <option value="5453">Raninagar - I</option>

                                                        <option value="5454">Raninagar - Ii</option>

                                                        <option value="5455">Bharatpur - Ii</option>

                                                        <option value="5456">Behrampore</option>

                                                        <option value="5457">Palta</option>

                                                        <option value="5458">Bhatpara</option>

                                                        <option value="5459">Jagatdal</option>

                                                        <option value="5460">Kankinara</option>

                                                        <option value="5461">Athpur</option>

                                                        <option value="5462">Fingapara</option>

                                                        <option value="5463">Garulia</option>

                                                        <option value="5464">Halishahar</option>

                                                        <option value="5465">Ichapur</option>

                                                        <option value="5466">Kanchrapara</option>

                                                        <option value="5467">Gorifa</option>

                                                        <option value="5468">Adhata</option>

                                                        <option value="5469">Hishabi</option>

                                                        <option value="5470">Sadhanpur Uludanga</option>

                                                        <option value="5471">Habra - Ii</option>

                                                        <option value="5472">Iswarigacha</option>

                                                        <option value="5473">Sabdalpur</option>

                                                        <option value="5474">Bagdah</option>

                                                        <option value="5475">Baksha</option>

                                                        <option value="5476">Boyra</option>

                                                        <option value="5477">Chandpur</option>

                                                        <option value="5478">Hatkurulia</option>

                                                        <option value="5479">Malidah</option>

                                                        <option value="5480">Mambhagina</option>

                                                        <option value="5481">Mashyampur</option>

                                                        <option value="5482">Jeoldanga</option>

                                                        <option value="5483">Bira</option>

                                                        <option value="5484">Joypul</option>

                                                        <option value="5485">Laxmipul</option>

                                                        <option value="5486">Rowtara</option>

                                                        <option value="5487">Sethpur</option>

                                                        <option value="5488">Talsa</option>

                                                        <option value="5489">Angrail</option>

                                                        <option value="5490">Balisha Chowmatha</option>

                                                        <option value="5491">Bangaon</option>

                                                        <option value="5492">Boaldah</option>

                                                        <option value="5493">Bongaon</option>

                                                        <option value="5494">Dharampukuria</option>

                                                        <option value="5495">Dogachia</option>

                                                        <option value="5496">Ghatbour</option>

                                                        <option value="5497">Kalupur</option>

                                                        <option value="5498">Nakpul</option>

                                                        <option value="5499">Panchita</option>

                                                        <option value="5500">Paschim Malikberia</option>

                                                        <option value="5501">Purantan Bongaon</option>

                                                        <option value="5502">Baikara</option>

                                                        <option value="5503">Ballavpur</option>

                                                        <option value="5504">Chandpara</option>

                                                        <option value="5505">Chekati</option>

                                                        <option value="5506">Duma</option>

                                                        <option value="5507">Gaighata</option>

                                                        <option value="5508">Goalbathan</option>

                                                        <option value="5509">Jhawdanga</option>

                                                        <option value="5510">Jhikra</option>

                                                        <option value="5511">Kahankia</option>

                                                        <option value="5512">Kaipukuria</option>

                                                        <option value="5513">Kharua Rajapur</option>

                                                        <option value="5514">Monmohanpur</option>

                                                        <option value="5515">Sasadanga</option>

                                                        <option value="5516">Tetulbaria</option>

                                                        <option value="5517">Barghorai</option>

                                                        <option value="5518">Charghat</option>

                                                        <option value="5519">Chatra</option>

                                                        <option value="5520">Deara</option>

                                                        <option value="5521">Kachdaha</option>

                                                        <option value="5522">Kapileswarpur</option>

                                                        <option value="5523">Ramchandrapur Khaspur</option>

                                                        <option value="5524">Salua</option>

                                                        <option value="5525">Adhikashimpur</option>

                                                        <option value="5526">Bamangachi</option>

                                                        <option value="5527">Amandikandi</option>

                                                        <option value="5528">Colony Simulia</option>

                                                        <option value="5529">Dharampur</option>

                                                        <option value="5530">Ghonza</option>

                                                        <option value="5531">Jaleswar</option>

                                                        <option value="5532">Natagram</option>

                                                        <option value="5533">Rampur Bhatpara</option>

                                                        <option value="5534">Ambikapur</option>

                                                        <option value="5535">Amdobe</option>

                                                        <option value="5536">Asharu</option>

                                                        <option value="5537">Bagangram</option>

                                                        <option value="5538">Bagda</option>

                                                        <option value="5539">Baliadanga</option>

                                                        <option value="5540">Beara</option>

                                                        <option value="5541">Bharatpur</option>

                                                        <option value="5542">Ganrapota</option>

                                                        <option value="5543">Ghatpatila</option>

                                                        <option value="5544">Gobrapur</option>

                                                        <option value="5545">Gotri</option>

                                                        <option value="5546">Jagadishpur</option>

                                                        <option value="5547">Karanga</option>

                                                        <option value="5548">Koniara</option>

                                                        <option value="5549">Krishnachandapur</option>

                                                        <option value="5550">Panchpota</option>

                                                        <option value="5551">Pathsimulia</option>

                                                        <option value="5552">Ranihati</option>

                                                        <option value="5553">Sundarpur</option>

                                                        <option value="5554">Tangra</option>

                                                        <option value="5555">Gobardanga</option>

                                                        <option value="5556">Nakpul Kuchlia</option>

                                                        <option value="5557">Bairampur</option>

                                                        <option value="5558">Barrackpore Sripalli</option>

                                                        <option value="5559">Gopalnagar</option>

                                                        <option value="5560">Madiahat</option>

                                                        <option value="5561">Satberi</option>

                                                        <option value="5562">Simulia</option>

                                                        <option value="5563">Bergoom</option>

                                                        <option value="5564">Fultala</option>

                                                        <option value="5565">Janaphul</option>

                                                        <option value="5566">Putia</option>

                                                        <option value="5567">Baneswarpur</option>

                                                        <option value="5568">Berabari</option>

                                                        <option value="5569">Bhawanipur</option>

                                                        <option value="5570">H Colony</option>

                                                        <option value="5571">Kulia</option>

                                                        <option value="5572">Kumarkhola</option>

                                                        <option value="5573">Nataberia</option>

                                                        <option value="5574">Kumra</option>

                                                        <option value="5575">Sonakenia</option>

                                                        <option value="5576">Samudrapur</option>

                                                        <option value="5577">Sendanga</option>

                                                        <option value="5578">Amudia</option>

                                                        <option value="5579">Balti</option>

                                                        <option value="5580">East Bishnupur</option>

                                                        <option value="5581">Gobindapur</option>

                                                        <option value="5582">Hakimpur</option>

                                                        <option value="5583">Nityananda Kati</option>

                                                        <option value="5584">Purandarpur</option>

                                                        <option value="5585">Saguna</option>

                                                        <option value="5586">Sakdah Jadapur</option>

                                                        <option value="5587">Sutia</option>

                                                        <option value="5588">Swarupnagar</option>

                                                        <option value="5589">Banglani</option>

                                                        <option value="5590">Bithari</option>

                                                        <option value="5591">Duttapara</option>

                                                        <option value="5592">Kantabagan</option>

                                                        <option value="5593">Sanrapul</option>

                                                        <option value="5594">Chikanpara</option>

                                                        <option value="5595">Ramchandra Pur</option>

                                                        <option value="5596">Ghoshpur</option>

                                                        <option value="5597">Rajballapur</option>

                                                        <option value="5598">Simulpur</option>

                                                        <option value="5599">Uludanga</option>

                                                        <option value="5600">Bhanderkhola</option>

                                                        <option value="5601">Chowberia</option>

                                                        <option value="5602">Dighari</option>

                                                        <option value="5603">Hingli</option>

                                                        <option value="5604">Naahata</option>

                                                        <option value="5605">Ramshankarpur</option>

                                                        <option value="5606">Satashi</option>

                                                        <option value="5607">Taranipur</option>

                                                        <option value="5608">Basirhat</option>

                                                        <option value="5609">Mominpur</option>

                                                        <option value="5610">Rajendrapur</option>

                                                        <option value="5611">Basirhat - I</option>

                                                        <option value="5612">Itinda</option>

                                                        <option value="5613">Merudandi</option>

                                                        <option value="5614">Panitar</option>

                                                        <option value="5615">Sibhati</option>

                                                        <option value="5616">Eojnagar</option>

                                                        <option value="5617">Gokna</option>

                                                        <option value="5618">Jadurhati</option>

                                                        <option value="5619">Kachua Swarupnagar</option>

                                                        <option value="5620">Bohara</option>

                                                        <option value="5621">Chhoto Jagulia</option>

                                                        <option value="5622">Naksha</option>

                                                        <option value="5623">Nimdaria</option>

                                                        <option value="5624">Sindrani</option>

                                                        <option value="5625">Thoara</option>

                                                        <option value="5626">Barast</option>

                                                        <option value="5627">Basanti</option>

                                                        <option value="5628">Sandeshkhali - Ii</option>

                                                        <option value="5629">Canning - I</option>

                                                        <option value="5630">Canning - Ii</option>

                                                        <option value="5631">Kultali</option>

                                                        <option value="5632">Champahati</option>

                                                        <option value="5633">Diamond Harbour - I</option>

                                                        <option value="5634">Kulpi</option>

                                                        <option value="5635">Magrahat - I</option>

                                                        <option value="5636">Mandirbazar</option>

                                                        <option value="5637">Mathurapur - I</option>

                                                        <option value="5638">Jaynagar - I</option>

                                                        <option value="5639">Jaynagar - Ii</option>

                                                        <option value="5640">Namkhana</option>

                                                        <option value="5641">Kakdwip</option>

                                                        <option value="5642">Patharpratima</option>

                                                        <option value="5643">Mathurapur - Ii</option>

                                                        <option value="5644">Magrahat - Ii</option>

                                                        <option value="5645">Sagar</option>

                                                        <option value="5646">Canning</option>

                                                        <option value="5647">Diamond Harbour - Ii</option>

                                                        <option value="5648">Bakrahat</option>

                                                        <option value="5649">Bishnupur - Ii</option>

                                                        <option value="5650">Baduria</option>

                                                        <option value="5651">Bena</option>

                                                        <option value="5652">Buruj</option>

                                                        <option value="5653">Jasaikati</option>

                                                        <option value="5654">Naya Basti</option>

                                                        <option value="5655">Simulia Durgapur</option>

                                                        <option value="5656">Taragunia</option>

                                                        <option value="5657">Chaigharia</option>

                                                        <option value="5658">Khalitpur</option>

                                                        <option value="5659">Petrapole</option>

                                                        <option value="5660">Minakhan</option>

                                                        <option value="5661">Dandirhat</option>

                                                        <option value="5662">Dhaltita</option>

                                                        <option value="5663">Karnolkora</option>

                                                        <option value="5664">Biramnagar</option>

                                                        <option value="5665">Gotra</option>

                                                        <option value="5666">Kathur</option>

                                                        <option value="5667">Makhalgacha</option>

                                                        <option value="5668">Paikparahat</option>

                                                        <option value="5669">Pifa</option>

                                                        <option value="5670">Sangrampur</option>

                                                        <option value="5671">Zirakpur</option>

                                                        <option value="5672">Baidyapur</option>

                                                        <option value="5673">Belpur</option>

                                                        <option value="5674">Bhasila</option>

                                                        <option value="5675">Deganga</option>

                                                        <option value="5676">Gobardhanpur</option>

                                                        <option value="5677">Kaliani</option>

                                                        <option value="5678">Maslishpur</option>

                                                        <option value="5679">Phazilpur</option>

                                                        <option value="5680">Ramnathpur</option>

                                                        <option value="5681">Sashan</option>

                                                        <option value="5682">Sohaikumarpur</option>

                                                        <option value="5683">Chjandpur</option>

                                                        <option value="5684">Chorashi</option>

                                                        <option value="5685">Debalaya</option>

                                                        <option value="5686">Gobila</option>

                                                        <option value="5687">Kachua</option>

                                                        <option value="5688">Secondranagar</option>

                                                        <option value="5689">Adampur</option>

                                                        <option value="5690">Ajijnagar</option>

                                                        <option value="5691">Atpukur</option>

                                                        <option value="5692">Bamanpukur</option>

                                                        <option value="5693">Chowhata</option>

                                                        <option value="5694">Dhutradaha</option>

                                                        <option value="5695">Haroa</option>

                                                        <option value="5696">Joygram</option>

                                                        <option value="5697">Khalisadi</option>

                                                        <option value="5698">Kharupala</option>

                                                        <option value="5699">Khasbalanda</option>

                                                        <option value="5700">Kumarzole</option>

                                                        <option value="5701">Malancha</option>

                                                        <option value="5702">Raikhan</option>

                                                        <option value="5703">Uchildah</option>

                                                        <option value="5704">Barunhat</option>

                                                        <option value="5705">Bhurkunda</option>

                                                        <option value="5706">Chakpatli</option>

                                                        <option value="5707">Ghoni</option>

                                                        <option value="5708">Ghosalbati</option>

                                                        <option value="5709">Hasnabad</option>

                                                        <option value="5710">Ichapurabad</option>

                                                        <option value="5711">Rameswarpur</option>

                                                        <option value="5712">Simulia Kalibari</option>

                                                        <option value="5713">Sulkaniabad</option>

                                                        <option value="5714">Aturia</option>

                                                        <option value="5715">Bajitpur</option>

                                                        <option value="5716">Barabankra</option>

                                                        <option value="5717">Bhaduria</option>

                                                        <option value="5718">Gandharbapur</option>

                                                        <option value="5719">Goaldaha</option>

                                                        <option value="5720">Kaijuri</option>

                                                        <option value="5721">Katiahat</option>

                                                        <option value="5722">Paschim Palta</option>

                                                        <option value="5723">Punra</option>

                                                        <option value="5724">Safirabad</option>

                                                        <option value="5725">Sayestanagar</option>

                                                        <option value="5726">Basirhat - Ii</option>

                                                        <option value="5727">Kholapota</option>

                                                        <option value="5728">Srinagar</option>

                                                        <option value="5729">Zafarpur</option>

                                                        <option value="5730">Bagundi</option>

                                                        <option value="5731">Paschim Madhyampur</option>

                                                        <option value="5732">Soladanga</option>

                                                        <option value="5733">Takipur</option>

                                                        <option value="5734">Akimamudpur</option>

                                                        <option value="5735">Amberia</option>

                                                        <option value="5736">Bakra Dabar</option>

                                                        <option value="5737">Bankra</option>

                                                        <option value="5738">Banshtala</option>

                                                        <option value="5739">Bishpur</option>

                                                        <option value="5740">Dharamberia</option>

                                                        <option value="5741">Hingalganj</option>

                                                        <option value="5742">Kothabari</option>

                                                        <option value="5743">Purba Khejurberia</option>

                                                        <option value="5744">Rupmari</option>

                                                        <option value="5745">Sandelerbill</option>

                                                        <option value="5746">Begumpur</option>

                                                        <option value="5747">Dhanyakuria</option>

                                                        <option value="5748">Matia</option>

                                                        <option value="5749">Nehalpur</option>

                                                        <option value="5750">Atghara</option>

                                                        <option value="5751">Jangalpur</option>

                                                        <option value="5752">Kamdevkati</option>

                                                        <option value="5753">Mandra</option>

                                                        <option value="5754">Parpatna</option>

                                                        <option value="5755">Bhanderkhali</option>

                                                        <option value="5756">Charalkhali</option>

                                                        <option value="5757">Choto Sahebkhali</option>

                                                        <option value="5758">Dulduli Mathbari</option>

                                                        <option value="5759">Hatgachha</option>

                                                        <option value="5760">Hemnagar</option>

                                                        <option value="5761">Jogeshganj</option>

                                                        <option value="5762">Kalitala</option>

                                                        <option value="5763">Labukhali</option>

                                                        <option value="5764">Madhavkathi</option>

                                                        <option value="5765">Malekangumti</option>

                                                        <option value="5766">Manikkathi</option>

                                                        <option value="5767">Parghumti</option>

                                                        <option value="5768">Pathghoria</option>

                                                        <option value="5769">Rampur</option>

                                                        <option value="5770">Sahebkhali</option>

                                                        <option value="5771">Samsernagar</option>

                                                        <option value="5772">Sandeshkhali - I</option>

                                                        <option value="5773">Sridharkati</option>

                                                        <option value="5774">24 Parganas</option>

                                                        <option value="5775">Akratola</option>

                                                        <option value="5776">Bamanibad</option>

                                                        <option value="5777">Bermajur</option>

                                                        <option value="5778">Boyermari</option>

                                                        <option value="5779">Choto Sehara</option>

                                                        <option value="5780">Dheknamari</option>

                                                        <option value="5781">Ghatihara</option>

                                                        <option value="5782">Ghoshpara</option>

                                                        <option value="5783">Jhopkhali</option>

                                                        <option value="5784">Kalinagar</option>

                                                        <option value="5785">Kanmari</option>

                                                        <option value="5786">Kharihatabad</option>

                                                        <option value="5787">Mathbariabad</option>

                                                        <option value="5788">Nalkora</option>

                                                        <option value="5789">Nazat</option>

                                                        <option value="5790">Nityaberia</option>

                                                        <option value="5791">Purba Sankardaha</option>

                                                        <option value="5792">Amta</option>

                                                        <option value="5793">Bhabanipur</option>

                                                        <option value="5794">Chaita</option>

                                                        <option value="5795">Ghona</option>

                                                        <option value="5796">Gopalpur</option>

                                                        <option value="5797">Sodarpur-Behala</option>

                                                        <option value="5798">Atapur</option>

                                                        <option value="5799">Bhangatushkhali</option>

                                                        <option value="5800">Bowthakurani</option>

                                                        <option value="5801">Dhuchnikhali</option>

                                                        <option value="5802">Durgamandop</option>

                                                        <option value="5803">Dwarikjungle</option>

                                                        <option value="5804">Joygopalpur</option>

                                                        <option value="5805">Khulna</option>

                                                        <option value="5806">Korakati</option>

                                                        <option value="5807">Sandeshkhali</option>

                                                        <option value="5808">Sitalia</option>

                                                        <option value="5809">Sukdwani</option>

                                                        <option value="5810">Tushkhali</option>

                                                        <option value="5811">Amodpur</option>

                                                        <option value="5812">Bhebia</option>

                                                        <option value="5813">Chaital</option>

                                                        <option value="5814">Chimta Kachari</option>

                                                        <option value="5815">Garakupi</option>

                                                        <option value="5816">Kharampur</option>

                                                        <option value="5817">Kuliadanga</option>

                                                        <option value="5818">Malikagherai</option>

                                                        <option value="5819">Murarisah</option>

                                                        <option value="5820">Nimichi</option>

                                                        <option value="5821">Nurpur</option>

                                                        <option value="5822">Bhangar - I</option>

                                                        <option value="5823">Falta</option>

                                                        <option value="5824">Santoshpur</option>

                                                        <option value="5825">Belta</option>

                                                        <option value="5826">Durgapur</option>

                                                        <option value="5827">Palla</option>

                                                        <option value="5828">Sonekpur</option>

                                                        <option value="5829">Rajibpur</option>

                                                        <option value="5830">Guma</option>

                                                        <option value="5831">Prithiba</option>

                                                        <option value="5832">Akaipur</option>

                                                        <option value="5833">Gadpukuria</option>

                                                        <option value="5834">Goribpur</option>

                                                        <option value="5835">Panchberia</option>

                                                        <option value="5836">Beraberi</option>

                                                        <option value="5837">Masunda</option>

                                                        <option value="5838">Srikrishnapur</option>

                                                        <option value="5839">Suria</option>

                                                        <option value="5840">Bhubaneswar</option>

                                                        <option value="5841">Lingaraj</option>

                                                        <option value="5842">Saheednagar</option>

                                                        <option value="5843">Balianta</option>

                                                        <option value="5844">Puri</option>

                                                        <option value="5845">Brahmagiri</option>

                                                        <option value="5846">Krushnaprasad</option>

                                                        <option value="5847">Satyabadi</option>

                                                        <option value="5848">Satyabai</option>

                                                        <option value="5849">Khurda</option>

                                                        <option value="5850">Banpur</option>

                                                        <option value="5851">Pipli</option>

                                                        <option value="5852">Tangi</option>

                                                        <option value="5853">Ranpur</option>

                                                        <option value="5854">Kordha</option>

                                                        <option value="5855">Chilika</option>

                                                        <option value="5856">Krishnaprasad</option>

                                                        <option value="5857">Krushnaprsad</option>

                                                        <option value="5858">Begunia</option>

                                                        <option value="5859">Panikoii</option>

                                                        <option value="5860">Sakhigopal</option>

                                                        <option value="5861">Jatni</option>

                                                        <option value="5862">Pipili</option>

                                                        <option value="5863">Kanas</option>

                                                        <option value="5864">Nayagarh</option>

                                                        <option value="5865">Bhapur</option>

                                                        <option value="5866">Bolagarh</option>

                                                        <option value="5867">Odagaon</option>

                                                        <option value="5868">Khandapara</option>

                                                        <option value="5869">Khandaparagarh</option>

                                                        <option value="5870">Daspalla</option>

                                                        <option value="5871">Ranapur</option>

                                                        <option value="5872">Khandapra</option>

                                                        <option value="5873">Balugaon</option>

                                                        <option value="5874">Nimapada</option>

                                                        <option value="5875">Nimapara</option>

                                                        <option value="5876">Gop</option>

                                                        <option value="5877">Kakatpur</option>

                                                        <option value="5878">Kakatpur]</option>

                                                        <option value="5879">Konark</option>

                                                        <option value="5880">Niampara</option>

                                                        <option value="5881">Niali</option>

                                                        <option value="5882">Cuttack Sadar</option>

                                                        <option value="5883">Cuttack</option>

                                                        <option value="5884">Gobindpur</option>

                                                        <option value="5885">Balipatna</option>

                                                        <option value="5886">Barang</option>

                                                        <option value="5887">Banki</option>

                                                        <option value="5888">Chandaka</option>

                                                        <option value="5889">Choudwar</option>

                                                        <option value="5890">Jagatpur</option>

                                                        <option value="5891">Tangi Choudwar</option>

                                                        <option value="5892">Darpan</option>

                                                        <option value="5893">Badachana</option>

                                                        <option value="5894">Athagarh</option>

                                                        <option value="5895">Athagad</option>

                                                        <option value="5896">Tigiria</option>

                                                        <option value="5897">Badamba</option>

                                                        <option value="5898">Baramba</option>

                                                        <option value="5899">Narasinghpur</option>

                                                        <option value="5900">Anugul</option>

                                                        <option value="5901">Narsinghpur</option>

                                                        <option value="5902">Biridi</option>

                                                        <option value="5903">Jagatsinghapur</option>

                                                        <option value="5904">Jagatsinghpur</option>

                                                        <option value="5905">Kujang</option>

                                                        <option value="5906">Raghunathpur</option>

                                                        <option value="5907">Tirtol</option>

                                                        <option value="5908">Balikuda</option>

                                                        <option value="5909">Naugaon</option>

                                                        <option value="5910">Naugaonhat</option>

                                                        <option value="5911">Ersama</option>

                                                        <option value="5912">Paradip</option>

                                                        <option value="5913">Kishannagar</option>

                                                        <option value="5914">Kishorenagar</option>

                                                        <option value="5915">Salipur</option>

                                                        <option value="5916">Marsaghai</option>

                                                        <option value="5917">Patkura</option>

                                                        <option value="5918">Tirol</option>

                                                        <option value="5919">Kujanga</option>

                                                        <option value="5920">Salepur</option>

                                                        <option value="5921">Kendrapara</option>

                                                        <option value="5922">Darpanigarh</option>

                                                        <option value="5923">Marasaghai</option>

                                                        <option value="5924">Jajpur</option>

                                                        <option value="5925">Pattamundai</option>

                                                        <option value="5926">Aul</option>

                                                        <option value="5927">Rajkanika</option>

                                                        <option value="5928">Rajnagar</option>

                                                        <option value="5929">Padmapur</option>

                                                        <option value="5930">Mahanga</option>

                                                        <option value="5931">Dharmasala</option>

                                                        <option value="5932">Binjharpur</option>

                                                        <option value="5933">Jajapur</option>

                                                        <option value="5934">Jajpur Road</option>

                                                        <option value="5935">Jajpur Raod</option>

                                                        <option value="5936">Keonjhar</option>

                                                        <option value="5937">Jajpur Road.</option>

                                                        <option value="5938">Bimjharpur</option>

                                                        <option value="5939">Balasore</option>

                                                        <option value="5940">Baleshwar Sadar</option>

                                                        <option value="5941">Baleshwar</option>

                                                        <option value="5942">Nilgiri</option>

                                                        <option value="5943">Remuna</option>

                                                        <option value="5944">Nilagiri</option>

                                                        <option value="5945">Niligiri</option>

                                                        <option value="5946">Basta</option>

                                                        <option value="5947">Baliapal</option>

                                                        <option value="5948">Singla</option>

                                                        <option value="5949">Rupsa</option>

                                                        <option value="5950">Jaleswar</option>

                                                        <option value="5951">Raibania</option>

                                                        <option value="5952">Bhograi</option>

                                                        <option value="5953">Soro</option>

                                                        <option value="5954">Similia</option>

                                                        <option value="5955">Khaira</option>

                                                        <option value="5956">Simulia</option>

                                                        <option value="5957">Bhadrak Rural</option>

                                                        <option value="5958">Bhadrak</option>

                                                        <option value="5959">Bant</option>

                                                        <option value="5960">Bhandari Pokhari</option>

                                                        <option value="5961">Dhamnagar</option>

                                                        <option value="5962">Agarpada</option>

                                                        <option value="5963">Dhusuri</option>

                                                        <option value="5964">Dhamanagar</option>

                                                        <option value="5965">Hatadihi</option>

                                                        <option value="5966">Basudevpur</option>

                                                        <option value="5967">Basudebpur</option>

                                                        <option value="5968">Tihidi</option>

                                                        <option value="5969">Chandabali</option>

                                                        <option value="5970">Chandbali</option>

                                                        <option value="5971">Basduevpur</option>

                                                        <option value="5972">Baripada</option>

                                                        <option value="5973">Baripara</option>

                                                        <option value="5974">R.G. Pur</option>

                                                        <option value="5975">R.G.Pur</option>

                                                        <option value="5976">Rasgovindpur</option>

                                                        <option value="5977">Barsahi</option>

                                                        <option value="5978">Barsashi</option>

                                                        <option value="5979">Betnoti</option>

                                                        <option value="5980">Udala</option>

                                                        <option value="5981">Rg Pur</option>

                                                        <option value="5982">Barasahi</option>

                                                        <option value="5983">Rairangpur</option>

                                                        <option value="5984">Karanjia</option>

                                                        <option value="5985">Bahalda</option>

                                                        <option value="5986">Mayurbhanj</option>

                                                        <option value="5987">Khunta</option>

                                                        <option value="5988">Kendujhar Town</option>

                                                        <option value="5989">Anandapur</option>

                                                        <option value="5990">Ghatagaon</option>

                                                        <option value="5991">Patna</option>

                                                        <option value="5992">Telkoi</option>

                                                        <option value="5993">Jajapur Road</option>

                                                        <option value="5994">Anadapur</option>

                                                        <option value="5995">Gahtagaon</option>

                                                        <option value="5996">Champua</option>

                                                        <option value="5997">Barbil</option>

                                                        <option value="5998">Baril</option>

                                                        <option value="5999">Andnapur</option>

                                                        <option value="6000">Banspal</option>

                                                        <option value="6001">Dhenkanal</option>

                                                        <option value="6002">Dhenkanal Sadar</option>

                                                        <option value="6003">Gandia</option>

                                                        <option value="6004">Bhuban</option>

                                                        <option value="6005">Kamakhyanagar</option>

                                                        <option value="6006">Kamakshyanagar</option>

                                                        <option value="6007">Hindol</option>

                                                        <option value="6008">Motunga</option>

                                                        <option value="6009">Parajang</option>

                                                        <option value="6010">Rasol</option>

                                                        <option value="6011">Tumusingha</option>

                                                        <option value="6012">Talcher</option>

                                                        <option value="6013">Banarpal</option>

                                                        <option value="6014">Khamar</option>

                                                        <option value="6015">Rengali Damsite</option>

                                                        <option value="6016">Samal Barrage</option>

                                                        <option value="6017">Talcher Sadar</option>

                                                        <option value="6018">Kaniha</option>

                                                        <option value="6019">Colliery</option>

                                                        <option value="6020">Chhendipada</option>

                                                        <option value="6021">Pallahara</option>

                                                        <option value="6022">Balimi</option>

                                                        <option value="6023">Angul</option>

                                                        <option value="6024">Athamallik</option>

                                                        <option value="6025">Athmallik</option>

                                                        <option value="6026">Thakurgarh</option>

                                                        <option value="6027">Berhampur</option>

                                                        <option value="6028">Brahmapur Sadar</option>

                                                        <option value="6029">Chhatrapur</option>

                                                        <option value="6030">Gopalpur</option>

                                                        <option value="6031">Purushottampur</option>

                                                        <option value="6032">Purusottampur</option>

                                                        <option value="6033">Chikiti</option>

                                                        <option value="6034">Jarada</option>

                                                        <option value="6035">Digapahandi</option>

                                                        <option value="6036">Berhampurf</option>

                                                        <option value="6037">Girisola</option>

                                                        <option value="6038">Golanthara</option>

                                                        <option value="6039">Aska</option>

                                                        <option value="6040">Garabandha</option>

                                                        <option value="6041">Parlakhemundi</option>

                                                        <option value="6042">Mohana</option>

                                                        <option value="6043">R.Udayagiri</option>

                                                        <option value="6044">R.Udaygiri</option>

                                                        <option value="6045">Kashinagara</option>

                                                        <option value="6046">Chatrapur</option>

                                                        <option value="6047">Rambha</option>

                                                        <option value="6048">Khalikote</option>

                                                        <option value="6049">Khallikote</option>

                                                        <option value="6050">Kkhallikote</option>

                                                        <option value="6051">Kodala</option>

                                                        <option value="6052">Bomakei</option>

                                                        <option value="6053">Bissmagiri</option>

                                                        <option value="6054">Hinjili</option>

                                                        <option value="6055">Hinjli</option>

                                                        <option value="6056">Kabisuryanagar</option>

                                                        <option value="6057">Asika</option>

                                                        <option value="6058">Surada</option>

                                                        <option value="6059">Bhanjanagar</option>

                                                        <option value="6060">Buguda</option>

                                                        <option value="6061">Paralakhemundi</option>

                                                        <option value="6062">Paralkhemundi</option>

                                                        <option value="6063">Serango</option>

                                                        <option value="6064">Rayagada</option>

                                                        <option value="6065">Adva</option>

                                                        <option value="6066">Phulbani</option>

                                                        <option value="6067">Tikabali</option>

                                                        <option value="6068">Phirigia</option>

                                                        <option value="6069">Phiringia</option>

                                                        <option value="6070">Phirngia</option>

                                                        <option value="6071">Khajuripada</option>

                                                        <option value="6072">Khajuriapada</option>

                                                        <option value="6073">Khajuripda</option>

                                                        <option value="6074">Purunakatak</option>

                                                        <option value="6075">Boudh</option>

                                                        <option value="6076">Boudhraj</option>

                                                        <option value="6077">Bounsuni</option>

                                                        <option value="6078">Bousuni</option>

                                                        <option value="6079">Manamunda</option>

                                                        <option value="6080">Kantamal</option>

                                                        <option value="6081">Ghantapada</option>

                                                        <option value="6082">Sankarakhole</option>

                                                        <option value="6083">Harabhanga</option>

                                                        <option value="6084">Harabhnaga</option>

                                                        <option value="6085">Harabhuin</option>

                                                        <option value="6086">Bamunigaon</option>

                                                        <option value="6087">Kalinga</option>

                                                        <option value="6088">Jhadrajing</option>

                                                        <option value="6089">Biranarasinghpur</option>

                                                        <option value="6090">Birasinghpur</option>

                                                        <option value="6091">Sarsara</option>

                                                        <option value="6092">Linepada</option>

                                                        <option value="6093">Chakapad</option>

                                                        <option value="6094">Gumagarh</option>

                                                        <option value="6095">Baghiabahal</option>

                                                        <option value="6096">G Udayagiri</option>

                                                        <option value="6097">G.Udayagiri</option>

                                                        <option value="6098">Raikai</option>

                                                        <option value="6099">Raikia</option>

                                                        <option value="6100">Nuagaon</option>

                                                        <option value="6101">Baliguda</option>

                                                        <option value="6102">Balliguda</option>

                                                        <option value="6103">Daringbadi</option>

                                                        <option value="6104">Kothagarh</option>

                                                        <option value="6105">Sarangada</option>

                                                        <option value="6106">Tumudibandha</option>

                                                        <option value="6107">Kurtamgarh</option>

                                                        <option value="6108">Barakhama</option>

                                                        <option value="6109">Paburia</option>

                                                        <option value="6110">Sunabeda</option>

                                                        <option value="6111">Damanjodi</option>

                                                        <option value="6112">Koraput</option>

                                                        <option value="6113">Jeypore(K)</option>

                                                        <option value="6114">Jeypur</option>

                                                        <option value="6115">Kundura</option>

                                                        <option value="6116">Boipariguda</option>

                                                        <option value="6117">Narayanpatna</option>

                                                        <option value="6118">Nandapur</option>

                                                        <option value="6119">Narayanpatana</option>

                                                        <option value="6120">Dasamantapur</option>

                                                        <option value="6121">Similiguda</option>

                                                        <option value="6122">Pottangi</option>

                                                        <option value="6123">Padua</option>

                                                        <option value="6124">Machhkund</option>

                                                        <option value="6125">Machkund</option>

                                                        <option value="6126">Machh Kund</option>

                                                        <option value="6127">Orkel</option>

                                                        <option value="6128">Malkangiri</option>

                                                        <option value="6129">Mathili</option>

                                                        <option value="6130">Kalimela</option>

                                                        <option value="6131">Motu</option>

                                                        <option value="6132">Nabarangpur</option>

                                                        <option value="6133">Paparahandi</option>

                                                        <option value="6134">Chitrakonda</option>

                                                        <option value="6135">Boriguma</option>

                                                        <option value="6136">Jeypore</option>

                                                        <option value="6137">Nabarangapur</option>

                                                        <option value="6138">Borigumma</option>

                                                        <option value="6139">Kotpad</option>

                                                        <option value="6140">Bhairabsingipur</option>

                                                        <option value="6141">Birigumma</option>

                                                        <option value="6142">Dabugan</option>

                                                        <option value="6143">Nabarangour</option>

                                                        <option value="6144">Kalyanasingpur</option>

                                                        <option value="6145">Kodinga</option>

                                                        <option value="6146">Gunupur</option>

                                                        <option value="6147">Nabarngpur</option>

                                                        <option value="6148">Tentulikhunti</option>

                                                        <option value="6149">Umarkote</option>

                                                        <option value="6150">Nabarangpu</option>

                                                        <option value="6151">Umerkote</option>

                                                        <option value="6152">Raighar</option>

                                                        <option value="6153">Kodinda</option>

                                                        <option value="6154">Jharigan</option>

                                                        <option value="6155">Khatiguda</option>

                                                        <option value="6156">Rayagada(K)</option>

                                                        <option value="6157">Lakshmipur</option>

                                                        <option value="6158">Laxmipur</option>

                                                        <option value="6159">Kashipur</option>

                                                        <option value="6160">K.Singhpur</option>

                                                        <option value="6161">Bishamakatak</option>

                                                        <option value="6162">Bissamcuttack</option>

                                                        <option value="6163">Ambadala</option>

                                                        <option value="6164">Muniguda</option>

                                                        <option value="6165">Gudari</option>

                                                        <option value="6166">Dharamgarh</option>

                                                        <option value="6167">Kesinga</option>

                                                        <option value="6168">Sadar</option>

                                                        <option value="6169">Bhawanipatana</option>

                                                        <option value="6170">Bhawanipatna</option>

                                                        <option value="6171">Junagarh</option>

                                                        <option value="6172">Narla</option>

                                                        <option value="6173">Golamunda</option>

                                                        <option value="6174">Jaipatna</option>

                                                        <option value="6175">Kalampur</option>

                                                        <option value="6176">Junagrh</option>

                                                        <option value="6177">Dhramgarh</option>

                                                        <option value="6178">Klampur</option>

                                                        <option value="6179">Jaipatana</option>

                                                        <option value="6180">Lanjigarh</option>

                                                        <option value="6181">Jaipatn A</option>

                                                        <option value="6182">Thuamulrampur</option>

                                                        <option value="6183">Dharmagarh</option>

                                                        <option value="6184">Karlamunda</option>

                                                        <option value="6185">Madanpur Rampur</option>

                                                        <option value="6186">Bhawaniaptna</option>

                                                        <option value="6187">Th. Rampur</option>

                                                        <option value="6188">Th.Rampur</option>

                                                        <option value="6189">M.Rampur</option>

                                                        <option value="6190">M.Ramour</option>

                                                        <option value="6191">Madanpurrampur</option>

                                                        <option value="6192">Jonk</option>

                                                        <option value="6193">Khariar Road</option>

                                                        <option value="6194">Nuapada</option>

                                                        <option value="6195">Nuapara</option>

                                                        <option value="6196">Komna</option>

                                                        <option value="6197">Khariar</option>

                                                        <option value="6198">Sinapali</option>

                                                        <option value="6199">Sinapalli</option>

                                                        <option value="6200">Sinhapalli</option>

                                                        <option value="6201">Bodeb</option>

                                                        <option value="6202">Boden</option>

                                                        <option value="6203">Duajhar</option>

                                                        <option value="6204">Khatriar</option>

                                                        <option value="6205">Balangir</option>

                                                        <option value="6206">Tusra</option>

                                                        <option value="6207">Tarbha</option>

                                                        <option value="6208">Tarha</option>

                                                        <option value="6209">Sonepur</option>

                                                        <option value="6210">Birmaharajpur</option>

                                                        <option value="6211">Brmaharajpur</option>

                                                        <option value="6212">Ullunda</option>

                                                        <option value="6213">Binka</option>

                                                        <option value="6214">S.Rampur</option>

                                                        <option value="6215">Loisingha</option>

                                                        <option value="6216">Losingha</option>

                                                        <option value="6217">S Rampur</option>

                                                        <option value="6218">Patnagarh</option>

                                                        <option value="6219">Titilagarh</option>

                                                        <option value="6220">Patngarh</option>

                                                        <option value="6221">Kantabanji</option>

                                                        <option value="6222">Sindhekela</option>

                                                        <option value="6223">Khaprakhol</option>

                                                        <option value="6224">Tusura</option>

                                                        <option value="6225">B.M.Pur</option>

                                                        <option value="6226">Sonapur</option>

                                                        <option value="6227">Sambalpur</option>

                                                        <option value="6228">Dhanupali</option>

                                                        <option value="6229">Maneswar</option>

                                                        <option value="6230">Dhankauda</option>

                                                        <option value="6231">Hirakud</option>

                                                        <option value="6232">Burla</option>

                                                        <option value="6233">Attabira</option>

                                                        <option value="6234">Bargarh</option>

                                                        <option value="6235">Barapali</option>

                                                        <option value="6236">Bargarh Sadar</option>

                                                        <option value="6237">Barpali</option>

                                                        <option value="6238">Bhatli</option>

                                                        <option value="6239">Ambabhana</option>

                                                        <option value="6240">Bijepur</option>

                                                        <option value="6241">Bheden</option>

                                                        <option value="6242">Sohela</option>

                                                        <option value="6243">Sohella</option>

                                                        <option value="6244">Ambabhona</option>

                                                        <option value="6245">Gaisilet</option>

                                                        <option value="6246">Melchhamunda</option>

                                                        <option value="6247">Rajborasambar</option>

                                                        <option value="6248">Rajborasamber</option>

                                                        <option value="6249">Paikmal</option>

                                                        <option value="6250">Paikamal</option>

                                                        <option value="6251">Jharbandh</option>

                                                        <option value="6252">Jharsuguda</option>

                                                        <option value="6253">Dhama</option>

                                                        <option value="6254">Jujomura</option>

                                                        <option value="6255">Jujumura</option>

                                                        <option value="6256">Rairakhol</option>

                                                        <option value="6257">Kisinda</option>

                                                        <option value="6258">Naktideul</option>

                                                        <option value="6259">Reamal</option>

                                                        <option value="6260">Jamankira</option>

                                                        <option value="6261">Kochinda</option>

                                                        <option value="6262">Barkote</option>

                                                        <option value="6263">Debagarh</option>

                                                        <option value="6264">Deogarh</option>

                                                        <option value="6265">Tileibani</option>

                                                        <option value="6266">Kundheigola</option>

                                                        <option value="6267">Barkot</option>

                                                        <option value="6268">Rengali</option>

                                                        <option value="6269">Sasan</option>

                                                        <option value="6270">Jharsuguda Sadar</option>

                                                        <option value="6271">Laikera</option>

                                                        <option value="6272">Jhasuguda Sadar</option>

                                                        <option value="6273">Jhrasuguda Sadar</option>

                                                        <option value="6274">Brajarajnagar</option>

                                                        <option value="6275">Lakhanpur</option>

                                                        <option value="6276">Lakhanpur Ho</option>

                                                        <option value="6277">Katarbaga</option>

                                                        <option value="6278">Kolabira</option>

                                                        <option value="6279">Belpahar</option>

                                                        <option value="6280">Kirmira</option>

                                                        <option value="6281">Bamra</option>

                                                        <option value="6282">Govindpur</option>

                                                        <option value="6283">Kuchinda</option>

                                                        <option value="6284">Mahulpalli</option>

                                                        <option value="6285">Banaharapali</option>

                                                        <option value="6286">Lakhanpur Bo</option>

                                                        <option value="6287">Raurkela (M)</option>

                                                        <option value="6288">Rourkela Steel City</option>

                                                        <option value="6289">Lathikata</option>

                                                        <option value="6290">Raghunathapali</option>

                                                        <option value="6291">Raurkela Industrial Township (</option>

                                                        <option value="6292">Raurkela Industrial Township (</option>

                                                        <option value="6293">Raurkela Industrial Township (</option>

                                                        <option value="6294">Raurkela Industrial Township (</option>

                                                        <option value="6295">Rourkela</option>

                                                        <option value="6296">Raurkela Industrial Township (</option>

                                                        <option value="6297">Raurkela Industrial Township (</option>

                                                        <option value="6298">Bisra</option>

                                                        <option value="6299">Koida</option>

                                                        <option value="6300">Brahmani Tarang</option>

                                                        <option value="6301">Tangarapali</option>

                                                        <option value="6302">Sundargarh</option>

                                                        <option value="6303">Sundargarh Town</option>

                                                        <option value="6304">Subdega</option>

                                                        <option value="6305">Tangarpali</option>

                                                        <option value="6306">Lephripara</option>

                                                        <option value="6307">Hemgir</option>

                                                        <option value="6308">Hemgri</option>

                                                        <option value="6309">Balisankara</option>

                                                        <option value="6310">Talasara</option>

                                                        <option value="6311">Balisanakara</option>

                                                        <option value="6312">Baragaon</option>

                                                        <option value="6313">Bargaon</option>

                                                        <option value="6314">Rajagangapur</option>

                                                        <option value="6315">Rajgangpur</option>

                                                        <option value="6316">Kutra</option>

                                                        <option value="6317">Bhasma</option>

                                                        <option value="6318">Kinjirkela</option>

                                                        <option value="6319">Tangarpai</option>

                                                        <option value="6320">Tangarpur</option>

                                                        <option value="6321">Kuta</option>

                                                        <option value="6322">Bondamunda</option>

                                                        <option value="6323">Biramitrapur</option>

                                                        <option value="6324">Kuarmunda</option>

                                                        <option value="6325">Hatibari</option>

                                                        <option value="6326">Kamarposh Balang</option>

                                                        <option value="6327">Bisra Block</option>

                                                        <option value="6328">Nuagaon Block</option>

                                                        <option value="6329">Gurundia</option>

                                                        <option value="6330">Banei</option>

                                                        <option value="6331">Bonaigarh</option>

                                                        <option value="6332">Koira</option>

                                                        <option value="6333">Lahunipara</option>

                                                        <option value="6334">Mahulpada</option>

                                                        <option value="6335">Phulwari</option>

                                                        <option value="6336">Patna Sadar</option>

                                                        <option value="6337">Sampatchak</option>

                                                        <option value="6338">Dinapur-Cum-Khagaul</option>

                                                        <option value="6339">Danapur</option>

                                                        <option value="6340">Patna</option>

                                                        <option value="6341">Paliganj</option>

                                                        <option value="6342">Dulhin Bazar</option>

                                                        <option value="6343">Bihta</option>

                                                        <option value="6344">Bikram</option>

                                                        <option value="6345">Maner</option>

                                                        <option value="6346">Naubatpur</option>

                                                        <option value="6347">Ekangersarai</option>

                                                        <option value="6348">Parwalpur</option>

                                                        <option value="6349">Nalanda</option>

                                                        <option value="6350">Ekangarsarai</option>

                                                        <option value="6351">Hilsa</option>

                                                        <option value="6352">Islampur</option>

                                                        <option value="6353">Ishlampur</option>

                                                        <option value="6354">Hulashganj</option>

                                                        <option value="6355">Daniyawan</option>

                                                        <option value="6356">Karaipersurai</option>

                                                        <option value="6357">Nagarnausa</option>

                                                        <option value="6358">Telhara</option>

                                                        <option value="6359">Chandi</option>

                                                        <option value="6360">Tharthari</option>

                                                        <option value="6361">Khagual</option>

                                                        <option value="6362">Buxar</option>

                                                        <option value="6363">Duraon</option>

                                                        <option value="6364">Chakki</option>

                                                        <option value="6365">Barhampur</option>

                                                        <option value="6366">Dumraon</option>

                                                        <option value="6367">Rajpur</option>

                                                        <option value="6368">Chausa</option>

                                                        <option value="6369">Simri</option>

                                                        <option value="6370">Itarhi</option>

                                                        <option value="6371">Kesath</option>

                                                        <option value="6372">Nawanagar</option>

                                                        <option value="6373">Mohania</option>

                                                        <option value="6374">Nuaon</option>

                                                        <option value="6375">Ramgarh</option>

                                                        <option value="6376">Behea</option>

                                                        <option value="6377">Jagdishpur</option>

                                                        <option value="6378">Bhojpur</option>

                                                        <option value="6379">Arrah</option>

                                                        <option value="6380">Jagdishpur Jagdishpur</option>

                                                        <option value="6381">Piru</option>

                                                        <option value="6382">Koilwar</option>

                                                        <option value="6383">Sandesh</option>

                                                        <option value="6384">Shahpur</option>

                                                        <option value="6385">Agiaon</option>

                                                        <option value="6386">Garhani</option>

                                                        <option value="6387">Piro</option>

                                                        <option value="6388">Tarari</option>

                                                        <option value="6389">Udwant Nagar</option>

                                                        <option value="6390">Dawath</option>

                                                        <option value="6391">Bikramganj</option>

                                                        <option value="6392">Sanjhauli</option>

                                                        <option value="6393">Dinara</option>

                                                        <option value="6394">Karakat</option>

                                                        <option value="6395">Sasaram</option>

                                                        <option value="6396">Nokha</option>

                                                        <option value="6397">Garh Nokha</option>

                                                        <option value="6398">Chainpur</option>

                                                        <option value="6399">Dehri</option>

                                                        <option value="6400">Dehri On Sone</option>

                                                        <option value="6401">Surajpura</option>

                                                        <option value="6402">Barhara</option>

                                                        <option value="6403">Bihar</option>

                                                        <option value="6404">Biharsharif</option>

                                                        <option value="6405">Asthawan</option>

                                                        <option value="6406">Asthama</option>

                                                        <option value="6407">Belchi Sharif</option>

                                                        <option value="6408">Bind</option>

                                                        <option value="6409">Rahui</option>

                                                        <option value="6410">Biharsarif</option>

                                                        <option value="6411">Warisaliganj</option>

                                                        <option value="6412">Nawada</option>

                                                        <option value="6413">Giriak</option>

                                                        <option value="6414">Belchi</option>

                                                        <option value="6415">Bakhtiarpur</option>

                                                        <option value="6416">Harnaut</option>

                                                        <option value="6417">Silao</option>

                                                        <option value="6418">Noorsaran</option>

                                                        <option value="6419">Ben</option>

                                                        <option value="6420">Noorsarai</option>

                                                        <option value="6421">Nursarai</option>

                                                        <option value="6422">Nusarai</option>

                                                        <option value="6423">Rajgir</option>

                                                        <option value="6424">Bathani</option>

                                                        <option value="6425">Sohsarai</option>

                                                        <option value="6426">Fatwah</option>

                                                        <option value="6427">Patna City</option>

                                                        <option value="6428">Dhanarua</option>

                                                        <option value="6429">Khusrupur</option>

                                                        <option value="6430">Athmalgola</option>

                                                        <option value="6431">Barh</option>

                                                        <option value="6432">Bakhtiarpurj</option>

                                                        <option value="6433">Bah</option>

                                                        <option value="6434">Pandarak</option>

                                                        <option value="6435">Bihar Sharif</option>

                                                        <option value="6436">Mokama</option>

                                                        <option value="6437">Ghoshwari</option>

                                                        <option value="6438">Ghoswari</option>

                                                        <option value="6439">Pandaak</option>

                                                        <option value="6440">Arwal</option>

                                                        <option value="6441">Kaler</option>

                                                        <option value="6442">Belaganj</option>

                                                        <option value="6443">Makhdumpur</option>

                                                        <option value="6444">Town Block Gaya</option>

                                                        <option value="6445">Gaya</option>

                                                        <option value="6446">Jehanabad</option>

                                                        <option value="6447">Ghoshi</option>

                                                        <option value="6448">Hulasganj</option>

                                                        <option value="6449">Kako</option>

                                                        <option value="6450">Karpi</option>

                                                        <option value="6451">Banshisurajpura</option>

                                                        <option value="6452">Banshi Surajpura</option>

                                                        <option value="6453">Kurtha</option>

                                                        <option value="6454">Banshi Surajpur</option>

                                                        <option value="6455">Sakurabad</option>

                                                        <option value="6456">Ratnifaridpur</option>

                                                        <option value="6457">Tekari</option>

                                                        <option value="6458">Masaurhi</option>

                                                        <option value="6459">Punpun</option>

                                                        <option value="6460">Pakribarawan</option>

                                                        <option value="6461">Akbarpur</option>

                                                        <option value="6462">Nawadha</option>

                                                        <option value="6463">Hisua</option>

                                                        <option value="6464">Roh</option>

                                                        <option value="6465">Kawakol</option>

                                                        <option value="6466">Kashi Chak</option>

                                                        <option value="6467">Gobindpur</option>

                                                        <option value="6468">Narhat</option>

                                                        <option value="6469">Meskaur</option>

                                                        <option value="6470">Nardiganj</option>

                                                        <option value="6471">Rajauli</option>

                                                        <option value="6472">Sirdala</option>

                                                        <option value="6473">Pakribrawana</option>

                                                        <option value="6474">Atri</option>

                                                        <option value="6475">Sheopursarai</option>

                                                        <option value="6476">Barbigha</option>

                                                        <option value="6477">Shekhopur</option>

                                                        <option value="6478">Sarmera</option>

                                                        <option value="6479">Shekhopur Sarai</option>

                                                        <option value="6480">Ashtawan</option>

                                                        <option value="6481">Shekhopursarai</option>

                                                        <option value="6482">Ghat Kushambha</option>

                                                        <option value="6483">Sheikhpura</option>

                                                        <option value="6484">Sermera</option>

                                                        <option value="6485">Shekhosarai</option>

                                                        <option value="6486">Shekhpur Sarai</option>

                                                        <option value="6487">Shekhopura Sarai</option>

                                                        <option value="6488">Ashthwan</option>

                                                        <option value="6489">Srmera</option>

                                                        <option value="6490">Ariyari</option>

                                                        <option value="6491">Aiary</option>

                                                        <option value="6492">Hathiyawan</option>

                                                        <option value="6493">Mehus</option>

                                                        <option value="6494">Samho</option>

                                                        <option value="6495">Shamho</option>

                                                        <option value="6496">Surajgarha</option>

                                                        <option value="6497">Surajgaraha</option>

                                                        <option value="6498">Ramgarh Chowk</option>

                                                        <option value="6499">Ghatkeshambha</option>

                                                        <option value="6500">Ghatkusumbha</option>

                                                        <option value="6501">Ghat Koshamba</option>

                                                        <option value="6502">Lakhisarai</option>

                                                        <option value="6503">Halsi</option>

                                                        <option value="6504">Munger</option>

                                                        <option value="6505">Jamalpur</option>

                                                        <option value="6506">Dharhara</option>

                                                        <option value="6507">Khagaria</option>

                                                        <option value="6508">Bariarpur</option>

                                                        <option value="6509">Sultanganj</option>

                                                        <option value="6510">Haweli Kharagpur</option>

                                                        <option value="6511">Sadar Munger</option>

                                                        <option value="6512">Dahrhara</option>

                                                        <option value="6513">Tetia</option>

                                                        <option value="6514">Tetiabambar</option>

                                                        <option value="6515">Hawelikhragpur</option>

                                                        <option value="6516">H Kharagpur</option>

                                                        <option value="6517">Tetiya Bambar</option>

                                                        <option value="6518">Hawelikharagpur</option>

                                                        <option value="6519">Tarapur</option>

                                                        <option value="6520">Tetia Bambar</option>

                                                        <option value="6521">Sangrampur</option>

                                                        <option value="6522">Islamnagar</option>

                                                        <option value="6523">Aliganj</option>

                                                        <option value="6524">Islam Nagar</option>

                                                        <option value="6525">Barhiya</option>

                                                        <option value="6526">Piparia</option>

                                                        <option value="6527">Mokamah</option>

                                                        <option value="6528">Chakai</option>

                                                        <option value="6529">Chakai So</option>

                                                        <option value="6530">Chewara</option>

                                                        <option value="6531">Sheikhpur</option>

                                                        <option value="6532">Khaira</option>

                                                        <option value="6533">Khira</option>

                                                        <option value="6534">Jamui</option>

                                                        <option value="6535">Gidhaur</option>

                                                        <option value="6536">Barhat</option>

                                                        <option value="6537">Jhajha</option>

                                                        <option value="6538">Khiara</option>

                                                        <option value="6539">Sono</option>

                                                        <option value="6540">Chandan</option>

                                                        <option value="6541">Jhajah</option>

                                                        <option value="6542">Bandhu Bagicha</option>

                                                        <option value="6543">Bannu Bagicha</option>

                                                        <option value="6544">Chanan (Bannu Bagicha)</option>

                                                        <option value="6545">Chanan(Bannu Bagicha)</option>

                                                        <option value="6546">Monghyr</option>

                                                        <option value="6547">Ramgarh Chowkq</option>

                                                        <option value="6548">Bannubagicha (Chanan)</option>

                                                        <option value="6549">Pipariya</option>

                                                        <option value="6550">Pipaia</option>

                                                        <option value="6551">Laxmipur</option>

                                                        <option value="6552">Barahat</option>

                                                        <option value="6553">Sonoi</option>

                                                        <option value="6554">Sikandra</option>

                                                        <option value="6555">Khaira Bo</option>

                                                        <option value="6556">Bhagalpur</option>

                                                        <option value="6557">Nathnagar</option>

                                                        <option value="6558">Nathnager</option>

                                                        <option value="6559">Colgong</option>

                                                        <option value="6560">Amarpur</option>

                                                        <option value="6561">Banka</option>

                                                        <option value="6562">Bausi</option>

                                                        <option value="6563">Katoria</option>

                                                        <option value="6564">Bounsi</option>

                                                        <option value="6565">Rajaun</option>

                                                        <option value="6566">Dhuraiya</option>

                                                        <option value="6567">Goradih</option>

                                                        <option value="6568">Chanan</option>

                                                        <option value="6569">Rajoun</option>

                                                        <option value="6570">Sahkund</option>

                                                        <option value="6571">Shahkund</option>

                                                        <option value="6572">Barahiya</option>

                                                        <option value="6573">Asarganj</option>

                                                        <option value="6574">Shambhuganj</option>

                                                        <option value="6575">Belhar</option>

                                                        <option value="6576">Kahalgoan</option>

                                                        <option value="6577">Kahalgaon</option>

                                                        <option value="6578">Bihariganj</option>

                                                        <option value="6579">Sonhaula</option>

                                                        <option value="6580">Sanhoula</option>

                                                        <option value="6581">Dharia</option>

                                                        <option value="6582">Pripainti</option>

                                                        <option value="6583">Pirpainti</option>

                                                        <option value="6584">Fullidumar</option>

                                                        <option value="6585">Phulidumar</option>

                                                        <option value="6586">Fulldumar</option>

                                                        <option value="6587">Sabour</option>

                                                        <option value="6588">Kharagpur</option>

                                                        <option value="6589">Narayanpur</option>

                                                        <option value="6590">Bhabua</option>

                                                        <option value="6591">Rohtas</option>

                                                        <option value="6592">Adhaura</option>

                                                        <option value="6593">Bhagwanpur</option>

                                                        <option value="6594">Chand</option>

                                                        <option value="6595">Bhabuaa</option>

                                                        <option value="6596">Chenari</option>

                                                        <option value="6597">Sheosagar</option>

                                                        <option value="6598">Rampur</option>

                                                        <option value="6599">Durgawati</option>

                                                        <option value="6600">Kargahar</option>

                                                        <option value="6601">Kudra</option>

                                                        <option value="6602">Koura</option>

                                                        <option value="6603">Kochas</option>

                                                        <option value="6604">Akorhi</option>

                                                        <option value="6605">Akorhi Gola</option>

                                                        <option value="6606">Akorhi Bazar</option>

                                                        <option value="6607">Tilouthu</option>

                                                        <option value="6608">Nasriganj</option>

                                                        <option value="6609">Manpur</option>

                                                        <option value="6610">Bodhgaya</option>

                                                        <option value="6611">Aurangabad</option>

                                                        <option value="6612">Madanpur</option>

                                                        <option value="6613">Amba</option>

                                                        <option value="6614">Barun</option>

                                                        <option value="6615">Daudnagar</option>

                                                        <option value="6616">Daunagar</option>

                                                        <option value="6617">Goh</option>

                                                        <option value="6618">Haspura</option>

                                                        <option value="6619">Rafiganj</option>

                                                        <option value="6620">Konch</option>

                                                        <option value="6621">Guraru</option>

                                                        <option value="6622">G.Mills</option>

                                                        <option value="6623">Jamhor</option>

                                                        <option value="6624">Rafigang</option>

                                                        <option value="6625">Kutumba</option>

                                                        <option value="6626">Obra</option>

                                                        <option value="6627">Barachatti</option>

                                                        <option value="6628">Barahcatti</option>

                                                        <option value="6629">Barahchatti</option>

                                                        <option value="6630">Brachatti</option>

                                                        <option value="6631">Deo</option>

                                                        <option value="6632">Gurua</option>

                                                        <option value="6633">Imamganj</option>

                                                        <option value="6634">Imamgnaj</option>

                                                        <option value="6635">Ko0Nch</option>

                                                        <option value="6636">Paraiya</option>

                                                        <option value="6637">Raniganj</option>

                                                        <option value="6638">Shergahati</option>

                                                        <option value="6639">Sherghati</option>

                                                        <option value="6640">Shergahti</option>

                                                        <option value="6641">Bankey Bazar</option>

                                                        <option value="6642">Bankey Bajar</option>

                                                        <option value="6643">Amas</option>

                                                        <option value="6644">Dobhi</option>

                                                        <option value="6645">Fatehpur Block</option>

                                                        <option value="6646">Fatehpur</option>

                                                        <option value="6647">Mohanpur</option>

                                                        <option value="6648">Khizirsarai</option>

                                                        <option value="6649">Khijersarai</option>

                                                        <option value="6650">Bodh Gaya</option>

                                                        <option value="6651">Tikari</option>

                                                        <option value="6652">Guruwa</option>

                                                        <option value="6653">Nabinagar</option>

                                                        <option value="6654">Nabi Nagar</option>

                                                        <option value="6655">Chapra</option>

                                                        <option value="6656">Dariapur</option>

                                                        <option value="6657">Sonepur</option>

                                                        <option value="6658">Dighwara</option>

                                                        <option value="6659">Saran</option>

                                                        <option value="6660">Manjhi</option>

                                                        <option value="6661">Garkha</option>

                                                        <option value="6662">Siwan</option>

                                                        <option value="6663">Ekma</option>

                                                        <option value="6664">Jalalpur</option>

                                                        <option value="6665">Lahladpur</option>

                                                        <option value="6666">Siswan</option>

                                                        <option value="6667">Revelganj</option>

                                                        <option value="6668">Parsa</option>

                                                        <option value="6669">Pachrukhi</option>

                                                        <option value="6670">Andar</option>

                                                        <option value="6671">Maharajganj</option>

                                                        <option value="6672">Mairwa</option>

                                                        <option value="6673">Siwn</option>

                                                        <option value="6674">Ziradei</option>

                                                        <option value="6675">Hasanpura</option>

                                                        <option value="6676">Amnour</option>

                                                        <option value="6677">Marhaura</option>

                                                        <option value="6678">Taraiya</option>

                                                        <option value="6679">Baniapur</option>

                                                        <option value="6680">Daraundha</option>

                                                        <option value="6681">Gopalganj</option>

                                                        <option value="6682">Bhagwanpur Hat</option>

                                                        <option value="6683">Panapur</option>

                                                        <option value="6684">Ishupur</option>

                                                        <option value="6685">Nagra</option>

                                                        <option value="6686">Lakri Nabiganj</option>

                                                        <option value="6687">Mashrakh</option>

                                                        <option value="6688">Guthani</option>

                                                        <option value="6689">Hathua</option>

                                                        <option value="6690">Gopalgan J</option>

                                                        <option value="6691">Gopal;Ganj</option>

                                                        <option value="6692">Maker</option>

                                                        <option value="6693">Mushahari</option>

                                                        <option value="6694">Muzaffarpur</option>

                                                        <option value="6695">Mushahri</option>

                                                        <option value="6696">Bochaha</option>

                                                        <option value="6697">Saraiya</option>

                                                        <option value="6698">Sakra</option>

                                                        <option value="6699">Sakara</option>

                                                        <option value="6700">Paroo</option>

                                                        <option value="6701">Kurhani</option>

                                                        <option value="6702">Kanti</option>

                                                        <option value="6703">Patepur</option>

                                                        <option value="6704">Motipur</option>

                                                        <option value="6705">Bandra</option>

                                                        <option value="6706">Minapur</option>

                                                        <option value="6707">Maniari</option>

                                                        <option value="6708">Muraul</option>

                                                        <option value="6709">Sahebganj</option>

                                                        <option value="6710">Marwan</option>

                                                        <option value="6711">Dumra</option>

                                                        <option value="6712">Riga</option>

                                                        <option value="6713">Bathnaha</option>

                                                        <option value="6714">Runisaidpur</option>

                                                        <option value="6715">Runnisaidpur</option>

                                                        <option value="6716">R.Saidpur</option>

                                                        <option value="6717">Aurai</option>

                                                        <option value="6718">Bairgania</option>

                                                        <option value="6719">Sitamarhi</option>

                                                        <option value="6720">Bajpatti</option>

                                                        <option value="6721">Majorganj</option>

                                                        <option value="6722">M. Ganj</option>

                                                        <option value="6723">Belsand</option>

                                                        <option value="6724">Sonbarsa</option>

                                                        <option value="6725">Sonbersa</option>

                                                        <option value="6726">Bokhra</option>

                                                        <option value="6727">Bokhara</option>

                                                        <option value="6728">Choraut</option>

                                                        <option value="6729">Pupri</option>

                                                        <option value="6730">Pupari</option>

                                                        <option value="6731">Katra</option>

                                                        <option value="6732">R. Saidpur</option>

                                                        <option value="6733">Parihar</option>

                                                        <option value="6734">Parsauni</option>

                                                        <option value="6735">Nanpur</option>

                                                        <option value="6736">Sheohar</option>

                                                        <option value="6737">Sursand</option>

                                                        <option value="6738">Piprahi</option>

                                                        <option value="6739">Purnahiya</option>

                                                        <option value="6740">Piprarhi</option>

                                                        <option value="6741">Hajipur</option>

                                                        <option value="6742">Raghopur</option>

                                                        <option value="6743">Bidupur</option>

                                                        <option value="6744">P. Belsar</option>

                                                        <option value="6745">P.Belsar</option>

                                                        <option value="6746">Belsar</option>

                                                        <option value="6747">Paedhi Belsar</option>

                                                        <option value="6748">Vaishali</option>

                                                        <option value="6749">Chehra Kalan</option>

                                                        <option value="6750">Bhaghwanpur</option>

                                                        <option value="6751">Rajapakar</option>

                                                        <option value="6752">Jhandaha</option>

                                                        <option value="6753">Goraul</option>

                                                        <option value="6754">Lalgang</option>

                                                        <option value="6755">Lalganj</option>

                                                        <option value="6756">Paterhi Belsar</option>

                                                        <option value="6757">Goroul</option>

                                                        <option value="6758">Kurhanni</option>

                                                        <option value="6759">Chehrakala</option>

                                                        <option value="6760">Mahuwa</option>

                                                        <option value="6761">Mahua</option>

                                                        <option value="6762">Mahnar</option>

                                                        <option value="6763">Patori</option>

                                                        <option value="6764">Desari</option>

                                                        <option value="6765">Sahdei Buzurg</option>

                                                        <option value="6766">Sahdei Bujurg</option>

                                                        <option value="6767">Jandaha</option>

                                                        <option value="6768">Jhanda</option>

                                                        <option value="6769">S Buzurg</option>

                                                        <option value="6770">Sahdai Buzurg</option>

                                                        <option value="6771">Bettiah</option>

                                                        <option value="6772">Bagaha-1</option>

                                                        <option value="6773">West Champaran</option>

                                                        <option value="6774">Motihari</option>

                                                        <option value="6775">Raxaul</option>

                                                        <option value="6776">Chauradano</option>

                                                        <option value="6777">Chaurdano</option>

                                                        <option value="6778">Bankatwa</option>

                                                        <option value="6779">Adapur</option>

                                                        <option value="6780">Ghorasahan</option>

                                                        <option value="6781">Dhaka</option>

                                                        <option value="6782">Sikarahana</option>

                                                        <option value="6783">Areraj</option>

                                                        <option value="6784">Chiraia</option>

                                                        <option value="6785">Motihari H.O.</option>

                                                        <option value="6786">Tetaria</option>

                                                        <option value="6787">Chakia</option>

                                                        <option value="6788">Chakia(Pipra)</option>

                                                        <option value="6789">East Champaran</option>

                                                        <option value="6790">P.Dayal</option>

                                                        <option value="6791">Kalyanpur</option>

                                                        <option value="6792">Pakri Dayal</option>

                                                        <option value="6793">Sikrahana</option>

                                                        <option value="6794">Paharpur</option>

                                                        <option value="6795">Madhuban</option>

                                                        <option value="6796">Harsidhi</option>

                                                        <option value="6797">Kotwa</option>

                                                        <option value="6798">Kesaria</option>

                                                        <option value="6799">Mehsi</option>

                                                        <option value="6800">Pakari Dayal</option>

                                                        <option value="6801">Piprakothi</option>

                                                        <option value="6802">Phenhara</option>

                                                        <option value="6803">Ramgarhwa</option>

                                                        <option value="6804">Klyanpur</option>

                                                        <option value="6805">Banjaria</option>

                                                        <option value="6806">Turkaulia</option>

                                                        <option value="6807">Bettiah H.O.</option>

                                                        <option value="6808">Sugauli</option>

                                                        <option value="6809">Patahi</option>

                                                        <option value="6810">Darbhanga</option>

                                                        <option value="6811">Hanumannagar</option>

                                                        <option value="6812">Benipatti</option>

                                                        <option value="6813">Jale</option>

                                                        <option value="6814">Benipur</option>

                                                        <option value="6815">Benipur]</option>

                                                        <option value="6816">Samastipur</option>

                                                        <option value="6817">Darbhnaga</option>

                                                        <option value="6818">Laukahi</option>

                                                        <option value="6819">Phulparas</option>

                                                        <option value="6820">Laukaha</option>

                                                        <option value="6821">Jhanjharpur</option>

                                                        <option value="6822">Jhanjhapur</option>

                                                        <option value="6823">Madhubani</option>

                                                        <option value="6824">Singhwara</option>

                                                        <option value="6825">Beniipur]</option>

                                                        <option value="6826">Biraul</option>

                                                        <option value="6827">Sadar Madhubani</option>

                                                        <option value="6828">Rajnagar</option>

                                                        <option value="6829">Babubarhi</option>

                                                        <option value="6830">Basopatti</option>

                                                        <option value="6831">Jaynagar</option>

                                                        <option value="6832">Jainagar</option>

                                                        <option value="6833">Ladania</option>

                                                        <option value="6834">Khajauli</option>

                                                        <option value="6835">Kaluahi</option>

                                                        <option value="6836">Harlakhi</option>

                                                        <option value="6837">Pandaul</option>

                                                        <option value="6838">Madhubnai</option>

                                                        <option value="6839">Andhratharhi</option>

                                                        <option value="6840">Beniptti</option>

                                                        <option value="6841">Ghoghardiha</option>

                                                        <option value="6842">Madhepur</option>

                                                        <option value="6843">Nirmali</option>

                                                        <option value="6844">Phulaparas</option>

                                                        <option value="6845">Supaul</option>

                                                        <option value="6846">Basantpur</option>

                                                        <option value="6847">Marauna</option>

                                                        <option value="6848">Chhatapur</option>

                                                        <option value="6849">Pusa</option>

                                                        <option value="6850">Dalsinghsarai</option>

                                                        <option value="6851">Bibhutpur</option>

                                                        <option value="6852">Mohiuddinagar</option>

                                                        <option value="6853">Begusarai</option>

                                                        <option value="6854">Hasanpur</option>

                                                        <option value="6855">Rosera</option>

                                                        <option value="6856">Teghra</option>

                                                        <option value="6857">Barauni</option>

                                                        <option value="6858">Begusarai H.O</option>

                                                        <option value="6859">Balia</option>

                                                        <option value="6860">Mansi</option>

                                                        <option value="6861">Udakishanganj</option>

                                                        <option value="6862">Uda Kishanganj</option>

                                                        <option value="6863">Udakisanganj</option>

                                                        <option value="6864">Saharsa</option>

                                                        <option value="6865">Saraigarh</option>

                                                        <option value="6866">Saraigarh Bhaptiyahi</option>

                                                        <option value="6867">Simri Bakhtiarpur</option>

                                                        <option value="6868">Simri Bakhtiapur</option>

                                                        <option value="6869">Patarghat</option>

                                                        <option value="6870">Pataghat</option>

                                                        <option value="6871">Gamharia</option>

                                                        <option value="6872">Gamaharia</option>

                                                        <option value="6873">Pipra</option>

                                                        <option value="6874">Gamahria</option>

                                                        <option value="6875">Pipra Bazar</option>

                                                        <option value="6876">Kumarkhan</option>

                                                        <option value="6877">Kumarkhand</option>

                                                        <option value="6878">Madhepura</option>

                                                        <option value="6879">Madhepura Mdg</option>

                                                        <option value="6880">Gwalapara</option>

                                                        <option value="6881">Puraini</option>

                                                        <option value="6882">Chousa</option>

                                                        <option value="6883">Sour Bazar</option>

                                                        <option value="6884">Murliganj</option>

                                                        <option value="6885">Nauhatta</option>

                                                        <option value="6886">Satar Kataiya</option>

                                                        <option value="6887">Sattar</option>

                                                        <option value="6888">Pratapganj</option>

                                                        <option value="6889">Salkhua</option>

                                                        <option value="6890">Banma</option>

                                                        <option value="6891">Singheshwar</option>

                                                        <option value="6892">Singheshwar\</option>

                                                        <option value="6893">Singheswar</option>

                                                        <option value="6894">Sonbersa Raj</option>

                                                        <option value="6895">Sbraj</option>

                                                        <option value="6896">Shankarpur</option>

                                                        <option value="6897">Chhata Pur</option>

                                                        <option value="6898">Kishanpur</option>

                                                        <option value="6899">Triveniganj</option>

                                                        <option value="6900">Tribeniganj</option>

                                                        <option value="6901">Triveniganj\</option>

                                                        <option value="6902">Beldaur</option>

                                                        <option value="6903">Kahara</option>

                                                        <option value="6904">Kahra</option>

                                                        <option value="6905">Sour Bazar \</option>

                                                        <option value="6906">Chattapur</option>

                                                        <option value="6907">Ragahopur</option>

                                                        <option value="6908">Mahishi</option>

                                                        <option value="6909">S.B.Raj</option>

                                                        <option value="6910">Piprabazar</option>

                                                        <option value="6911">Alamnagar</option>

                                                        <option value="6912">Sanagar</option>

                                                        <option value="6913">S.A.Nagar</option>

                                                        <option value="6914">Shah Alam Nagar</option>

                                                        <option value="6915">Kishanganj</option>

                                                        <option value="6916">Udakishunganj</option>

                                                        <option value="6917">Saur Bazar</option>

                                                        <option value="6918">Bihpur</option>

                                                        <option value="6919">Bhipur</option>

                                                        <option value="6920">Kharik</option>

                                                        <option value="6921">Kharik Bazar</option>

                                                        <option value="6922">Kharikbazar</option>

                                                        <option value="6923">Parbatta</option>

                                                        <option value="6924">Gopalpur</option>

                                                        <option value="6925">Rangra Chowk</option>

                                                        <option value="6926">Rupauli</option>

                                                        <option value="6927">Kursela</option>

                                                        <option value="6928">Naugachia</option>

                                                        <option value="6929">Naugachhia</option>

                                                        <option value="6930">Ismailpur</option>

                                                        <option value="6931">Purnia</option>

                                                        <option value="6932">Katihar</option>

                                                        <option value="6933">Purnea</option>

                                                        <option value="6934">Bamankhi</option>

                                                        <option value="6935">Araria</option>

                                                        <option value="6936">Araria Rs</option>

                                                        <option value="6937">Araraia</option>

                                                        <option value="6938">Baisi</option>

                                                        <option value="6939">Arraia</option>

                                                        <option value="6940">Araira</option>

                                                        <option value="6941">Birpur</option>

                                                        <option value="6942">Chatapur</option>

                                                        <option value="6943">Kishaganj</option>

                                                        <option value="6944">Kishagnaj</option>

                                                        <option value="6945">Kishanaganj</option>

                                                        <option value="6946">Kaihar</option>

                                                        <option value="6947">Kishanagnj</option>

                                                        <option value="6948">Kishangnj</option>

                                                        <option value="6949">Kishanganhj</option>

                                                        <option value="6950">Kishangaj</option>

                                                        <option value="6951">Boarijor</option>

                                                        <option value="6952">Meharma</option>

                                                        <option value="6953">Borio</option>

                                                        <option value="6954">Mandro</option>

                                                        <option value="6955">Boarijore</option>

                                                        <option value="6956">Dumka</option>

                                                        <option value="6957">Poriyahat</option>

                                                        <option value="6958">Ramgarah</option>

                                                        <option value="6959">Ramgarh</option>

                                                        <option value="6960">Poraiyahat</option>

                                                        <option value="6961">Kathikund</option>

                                                        <option value="6962">Gopikandar</option>

                                                        <option value="6963">Kathikiund</option>

                                                        <option value="6964">Jama</option>

                                                        <option value="6965">Masalia</option>

                                                        <option value="6966">Amrapara</option>

                                                        <option value="6967">Mahesapur</option>

                                                        <option value="6968">Maheshpur</option>

                                                        <option value="6969">Deoghar</option>

                                                        <option value="6970">Mohanpur</option>

                                                        <option value="6971">Debipur</option>

                                                        <option value="6972">Jarmundi</option>

                                                        <option value="6973">Sikaripara</option>

                                                        <option value="6974">Masaliya</option>

                                                        <option value="6975">Jarmudi</option>

                                                        <option value="6976">Godda</option>

                                                        <option value="6977">Pathargama</option>

                                                        <option value="6978">Pahargama</option>

                                                        <option value="6979">Pakur</option>

                                                        <option value="6980">Doghar</option>

                                                        <option value="6981">Sarwan</option>

                                                        <option value="6982">Raneshwar</option>

                                                        <option value="6983">Raneswar</option>

                                                        <option value="6984">Sariyahat</option>

                                                        <option value="6985">Saraiyahat</option>

                                                        <option value="6986">Saraiyhat</option>

                                                        <option value="6987">Palojori</option>

                                                        <option value="6988">Mahagama</option>

                                                        <option value="6989">Pathergama</option>

                                                        <option value="6990">Gouraijore</option>

                                                        <option value="6991">Raniswar</option>

                                                        <option value="6992">Sarath</option>

                                                        <option value="6993">Sarayahat</option>

                                                        <option value="6994">Sarayaha</option>

                                                        <option value="6995">Devipur</option>

                                                        <option value="6996">Dibipur</option>

                                                        <option value="6997">Debuipur</option>

                                                        <option value="6998">Rohni</option>

                                                        <option value="6999">Sunderpahari</option>

                                                        <option value="7000">Mahagam</option>

                                                        <option value="7001">Mahagama.</option>

                                                        <option value="7002">Mahgama</option>

                                                        <option value="7003">Sunder Pahari</option>

                                                        <option value="7004">Bokaro</option>

                                                        <option value="7005">Sundar Pahari</option>

                                                        <option value="7006">Sundarpahari</option>

                                                        <option value="7007">Sunadar Pahari</option>

                                                        <option value="7008">Rmagarh</option>

                                                        <option value="7009">Kundahit</option>

                                                        <option value="7010">Kundahir</option>

                                                        <option value="7011">Kundhahit</option>

                                                        <option value="7012">Giridih</option>

                                                        <option value="7013">Bengabad</option>

                                                        <option value="7014">Bengabd</option>

                                                        <option value="7015">Ganwan</option>

                                                        <option value="7016">Deori</option>

                                                        <option value="7017">Jamua</option>

                                                        <option value="7018">Beniadih</option>

                                                        <option value="7019">Jmua</option>

                                                        <option value="7020">Tisri</option>

                                                        <option value="7021">Jamuagiridih</option>

                                                        <option value="7022">Jamtara</option>

                                                        <option value="7023">Nala</option>

                                                        <option value="7024">Narayanpur</option>

                                                        <option value="7025">Sarth</option>

                                                        <option value="7026">Bnarayanpur</option>

                                                        <option value="7027">Narayapur</option>

                                                        <option value="7028">Madhupur</option>

                                                        <option value="7029">Satath</option>

                                                        <option value="7030">Karon</option>

                                                        <option value="7031">Koron</option>

                                                        <option value="7032">Rajmahal</option>

                                                        <option value="7033">Taljhari</option>

                                                        <option value="7034">Pathna</option>

                                                        <option value="7035">Barharwa</option>

                                                        <option value="7036">Udhua</option>

                                                        <option value="7037">Uedhwa</option>

                                                        <option value="7038">Uedhua</option>

                                                        <option value="7039">Littipara</option>

                                                        <option value="7040">Barhait</option>

                                                        <option value="7041">Sahibganj</option>

                                                        <option value="7042">Barhit</option>

                                                        <option value="7043">Pakuria</option>

                                                        <option value="7044">Shikaripara</option>

                                                        <option value="7045">Shikripara</option>

                                                        <option value="7046">Litipara</option>

                                                        <option value="7047">Hiranpur</option>

                                                        <option value="7048">Maheshpru</option>

                                                        <option value="7049">Pakaur</option>

                                                        <option value="7050">Udhwa</option>

                                                        <option value="7051">Rahmahal</option>

                                                        <option value="7052">Gopikander</option>

                                                        <option value="7053">Daltonganj</option>

                                                        <option value="7054">Palamau</option>

                                                        <option value="7055">Patan</option>

                                                        <option value="7056">Rehala</option>

                                                        <option value="7057">Chainpur</option>

                                                        <option value="7058">Chinpur</option>

                                                        <option value="7059">Barwadih</option>

                                                        <option value="7060">Garhwa</option>

                                                        <option value="7061">Balumath</option>

                                                        <option value="7062">Chhatarpur</option>

                                                        <option value="7063">Chhatarpru</option>

                                                        <option value="7064">Chhtarpur</option>

                                                        <option value="7065">Chhatapru</option>

                                                        <option value="7066">Japla</option>

                                                        <option value="7067">Lesliganj</option>

                                                        <option value="7068">Leshliganj</option>

                                                        <option value="7069">Mahuwadand</option>

                                                        <option value="7070">Mahuwdand</option>

                                                        <option value="7071">Lapla</option>

                                                        <option value="7072">Nagar Utari</option>

                                                        <option value="7073">Panki</option>

                                                        <option value="7074">Bisrampur</option>

                                                        <option value="7075">Bishrampur</option>

                                                        <option value="7076">Ranka Raj</option>

                                                        <option value="7077">Satbarwa</option>

                                                        <option value="7078">Meral</option>

                                                        <option value="7079">Bhawanathpur</option>

                                                        <option value="7080">Harihar Ganj</option>

                                                        <option value="7081">Hariharganj</option>

                                                        <option value="7082">Daltoganj</option>

                                                        <option value="7083">Chitarpur</option>

                                                        <option value="7084">Gola</option>

                                                        <option value="7085">Bermo</option>

                                                        <option value="7086">Simaria</option>

                                                        <option value="7087">Dumri</option>

                                                        <option value="7088">Pirtand</option>

                                                        <option value="7089">Jainagar</option>

                                                        <option value="7090">Koderma</option>

                                                        <option value="7091">Hazaribagh</option>

                                                        <option value="7092">Katkamsandi</option>

                                                        <option value="7093">Sadar</option>

                                                        <option value="7094">Churchu</option>

                                                        <option value="7095">Ichak</option>

                                                        <option value="7096">Hazaribag</option>

                                                        <option value="7097">Barkagaon</option>

                                                        <option value="7098">Bishungarh</option>

                                                        <option value="7099">Bishnugarh</option>

                                                        <option value="7100">Mandu</option>

                                                        <option value="7101">Konardam</option>

                                                        <option value="7102">Sdar</option>

                                                        <option value="7103">Markach</option>

                                                        <option value="7104">Markacho</option>

                                                        <option value="7105">Katakamsandi</option>

                                                        <option value="7106">Bagodar</option>

                                                        <option value="7107">Tandwa</option>

                                                        <option value="7108">Barkatha</option>

                                                        <option value="7109">Barkhatha</option>

                                                        <option value="7110">Birni</option>

                                                        <option value="7111">Chauparan</option>

                                                        <option value="7112">Chatra</option>

                                                        <option value="7113">Hunterganj</option>

                                                        <option value="7114">Karma</option>

                                                        <option value="7115">Jori</option>

                                                        <option value="7116">Pratappur</option>

                                                        <option value="7117">Patratu</option>

                                                        <option value="7118">Barhi</option>

                                                        <option value="7119">Chouparan</option>

                                                        <option value="7120">Kodarma</option>

                                                        <option value="7121">Itkhori</option>

                                                        <option value="7122">Gidhaur</option>

                                                        <option value="7123">Chandwara</option>

                                                        <option value="7124">Padma</option>

                                                        <option value="7125">Dhanwar</option>

                                                        <option value="7126">Dhanwatr</option>

                                                        <option value="7127">Djanwar</option>

                                                        <option value="7128">Ddhanwan</option>

                                                        <option value="7129">Dhanbad</option>

                                                        <option value="7130">Chas</option>

                                                        <option value="7131">Kasmar</option>

                                                        <option value="7132">Tisra</option>

                                                        <option value="7133">Mugma</option>

                                                        <option value="7134">Gomia</option>

                                                        <option value="7135">Peterbar</option>

                                                        <option value="7136">Ramgarh Cantt</option>

                                                        <option value="7137">Tenughat</option>

                                                        <option value="7138">Nawadih</option>

                                                        <option value="7139">Bachra</option>

                                                        <option value="7140">Malumath</option>

                                                        <option value="7141">Chandwa</option>

                                                        <option value="7142">Latehar</option>

                                                        <option value="7143">Mander</option>

                                                        <option value="7144">Bundu</option>

                                                        <option value="7145">Burmu</option>

                                                        <option value="7146">Dakra</option>

                                                        <option value="7147">Jamshedpur</option>

                                                        <option value="7148">Sakchi</option>

                                                        <option value="7149">Mango</option>

                                                        <option value="7150">Bistupur Bazar</option>

                                                        <option value="7151">Bistupur Gate</option>

                                                        <option value="7152">Rajnagar</option>

                                                        <option value="7153">Singhbhum</option>

                                                        <option value="7154">Dhalbhum</option>

                                                        <option value="7155">Dhalbhum, Jamshedpur</option>

                                                        <option value="7156">Golmuri</option>

                                                        <option value="7157">Indranagar</option>

                                                        <option value="7158">Dhalbhum Jamshedpur</option>

                                                        <option value="7159">Kadma</option>

                                                        <option value="7160">Jugsalai</option>

                                                        <option value="7161">Burma Mines</option>

                                                        <option value="7162">Agrico</option>

                                                        <option value="7163">East Singhbhum</option>

                                                        <option value="7164">Gobindpur</option>

                                                        <option value="7165">Rahargora</option>

                                                        <option value="7166">Baridih Colony</option>

                                                        <option value="7167">Mango Notified Area</option>

                                                        <option value="7168">Baharagora</option>

                                                        <option value="7169">Ghatshila</option>

                                                        <option value="7170">Ghatsila</option>

                                                        <option value="7171">Jadugoda</option>

                                                        <option value="7172">Moubhandar</option>

                                                        <option value="7173">Dumaria</option>

                                                        <option value="7174">Mosabani</option>

                                                        <option value="7175">Patamda</option>

                                                        <option value="7176">R.C.Project</option>

                                                        <option value="7177">Sundarnagar</option>

                                                        <option value="7178">Tatanagar</option>

                                                        <option value="7179">Gamharia</option>

                                                        <option value="7180">Seraikella Kharsawan</option>

                                                        <option value="7181">A.I .Area</option>

                                                        <option value="7182">Azadnagar</option>

                                                        <option value="7183">Chakulia</option>

                                                        <option value="7184">Dhalbhumgarh</option>

                                                        <option value="7185">Mahulia</option>

                                                        <option value="7186">Chandil</option>

                                                        <option value="7187">Seraikella Kharsawanq</option>

                                                        <option value="7188">Kandra</option>

                                                        <option value="7189">Tiruldih</option>

                                                        <option value="7190">Chowka</option>

                                                        <option value="7191">Seraikalla Kharsawan</option>

                                                        <option value="7192">Amda</option>

                                                        <option value="7193">West Singhbhum</option>

                                                        <option value="7194">Chakradharpur</option>

                                                        <option value="7195">Chakdradharpur</option>

                                                        <option value="7196">Goilkera</option>

                                                        <option value="7197">Manoharpur</option>

                                                        <option value="7198">Jagannathpur</option>

                                                        <option value="7199">Sonua</option>

                                                        <option value="7200">Chakrdharpur</option>

                                                        <option value="7201">Seraikela</option>

                                                        <option value="7202">Chiria</option>

                                                        <option value="7203">Chaibasa</option>

                                                        <option value="7204">Jagganathpur</option>

                                                        <option value="7205">Danguaposi</option>

                                                        <option value="7206">Gua</option>

                                                        <option value="7207">Hatgamaria</option>

                                                        <option value="7208">Jhinkpani</option>

                                                        <option value="7209">Kharsawangarh</option>

                                                        <option value="7210">Seraikera</option>

                                                        <option value="7211">Seraikella</option>

                                                        <option value="7212">Noamundi</option>

                                                        <option value="7213">Sini</option>

                                                        <option value="7214">Barajamda</option>

                                                        <option value="7215">Kiriburu</option>

                                                        <option value="7216">Megahatuburu</option>

                                                        <option value="7217">Ranchi</option>

                                                        <option value="7218">Kanke</option>

                                                        <option value="7219">Namkum</option>

                                                        <option value="7220">Silli</option>

                                                        <option value="7221">Angara</option>

                                                        <option value="7222">Bano</option>

                                                        <option value="7223">Bero</option>

                                                        <option value="7224">Bharno</option>

                                                        <option value="7225">Gumla</option>

                                                        <option value="7226">Mandar</option>

                                                        <option value="7227">Karra</option>

                                                        <option value="7228">Khunti</option>

                                                        <option value="7229">Kolibira</option>

                                                        <option value="7230">Kolibera</option>

                                                        <option value="7231">Kolebira</option>

                                                        <option value="7232">Kurdeg</option>

                                                        <option value="7233">Simdega</option>

                                                        <option value="7234">Kuru</option>

                                                        <option value="7235">Chanho</option>

                                                        <option value="7236">Bandgaon</option>

                                                        <option value="7237">Murhu</option>

                                                        <option value="7238">Lohardaga</option>

                                                        <option value="7239">Ormanjhi</option>

                                                        <option value="7240">Ormanhji</option>

                                                        <option value="7241">Ormanchi</option>

                                                        <option value="7242">Palkot</option>

                                                        <option value="7243">Ratu</option>

                                                        <option value="7244">Tamar</option>

                                                        <option value="7245">Thethaitangar</option>

                                                        <option value="7246">Bolba</option>

                                                        <option value="7247">Torpa</option>

                                                        <option value="7248">Kamdara</option>

                                                        <option value="7249">Rania</option>

                                                        <option value="7250">Basia</option>

                                                        <option value="7251">Nodih</option>

                                                        <option value="7252">Noadih</option>

                                                        <option value="7253">Bishunpur</option>

                                                        <option value="7254">Nawagarh</option>

                                                        <option value="7255">Gomla</option>

                                                        <option value="7256">Nwagarh</option>

                                                        <option value="7257">Toto</option>

                                                        <option value="7258">Lapung</option>

                                                        <option value="7259">Itki</option>

                                                        <option value="7260">Ohardaga</option>

                                                        <option value="7261">Bhandra</option>

                                                        <option value="7262">Lohardags</option>

                                                        <option value="7263">Sisai</option>

                                                        <option value="7264">Bhandara</option>

                                                        <option value="7265">Gorakpur</option>

                                                        <option value="7266">West Vinod Nagar</option>

                                                        <option value="7268">Faridabad</option>

                                                        <option value="7274">Central Delhi</option>

                                                        <option value="7275">New Delhi</option>

                                                        <option value="7276">South Delhi</option>

                                                        <option value="7277">North Delhi</option>

                                                        <option value="7278">North West Delhi</option>

                                                        <option value="7279">South West Delhi</option>

                                                        <option value="7280">West Delhi</option>

                                                        <option value="7281">East Delhi</option>

                                                        <option value="7282">North East Delhi</option>

                                                        <option value="7283">Gurgaon</option>

                                                        <option value="7284">Faridabad</option>

                                                        <option value="7285">Ghaziabad</option>

                                                        <option value="7286">Noida</option>

                                                        <option value="7287">Agra</option>

                                                        <option value="7288">Aligarh</option>

                                                        <option value="7289">Bulandshahar</option>

                                                        <option value="7290">Dehradun</option>

                                                        <option value="7291">Firozabad</option>

                                                        <option value="7292">Haldwani</option>

                                                        <option value="7293">Hardwar</option>

                                                        <option value="7294">Mathura</option>

                                                        <option value="7295">Meerut</option>

                                                        <option value="7296">Moradabad</option>

                                                        <option value="7297">Muzaffarnagar</option>

                                                        <option value="7298">Rampur</option>

                                                        <option value="7299">Saharanpur</option>

                                                        <option value="7300">Allahabad</option>

                                                        <option value="7301">Ballia</option>

                                                        <option value="7302">Barabanki</option>

                                                        <option value="7303">Bareilly</option>

                                                        <option value="7304">Basti</option>

                                                        <option value="7305">Chitrakoot</option>

                                                        <option value="7306">Faizabad</option>

                                                        <option value="7307">Farukhabad</option>

                                                        <option value="7308">Fatehpur</option>

                                                        <option value="7309">Ghazipur</option>

                                                        <option value="7310">Hardoi</option>

                                                        <option value="7311">Kanpur</option>

                                                        <option value="7312">Khalilabad</option>

                                                        <option value="7313">Kushinagar</option>

                                                        <option value="7314">Lalitpur</option>

                                                        <option value="7315">Lucknow</option>

                                                        <option value="7316">Mirzapur</option>

                                                        <option value="7317">Pilibhit</option>

                                                        <option value="7318">Raibareilly</option>

                                                        <option value="7319">Sitapur</option>

                                                        <option value="7320">Unnao</option>

                                                        <option value="7321">Varanasi</option>

                                                        <option value="7322">Sonbhadra</option>

                                                        <option value="7323">Chandigarh</option>

                                                        <option value="7324">6</option>

                                                        <option value="7325">Panchkula</option>

                                                        <option value="7326">Ropar</option>

                                                        <option value="7327">Rupnagar</option>

                                                        <option value="7328">Mohali</option>

                                                        <option value="7329">Patiala</option>

                                                        <option value="7330">Sangrur</option>

                                                        <option value="7331">Barnala</option>

                                                        <option value="7332">Bathinda</option>

                                                        <option value="7333">Shimla</option>

                                                        <option value="7334">Solan</option>

                                                        <option value="7335">Kullu</option>

                                                        <option value="7336">Kinnaur</option>

                                                        <option value="7337">Lahul &amp; Spiti</option>

                                                        <option value="7338">Sirmaur</option>

                                                        <option value="7339">Bilaspur (HP)</option>

                                                        <option value="7340">Una</option>

                                                        <option value="7341">Hamirpur(HP)</option>

                                                        <option value="7342">Mandi</option>

                                                        <option value="7343">Kangra</option>

                                                        <option value="7344">Chamba</option>

                                                        <option value="7345">Jaunpur</option>

                                                        <option value="7346">Shahjahanpur</option>

                                                        <option value="7347">Gorakhpur</option>

                                                        <option value="7348">Mahrajganj</option>

                                                        <option value="7349">Hyderabad</option>

                                                        <option value="7351">visakhapatnum</option>

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="last-name">ZIP Code</label>
                                                    <input type="text" class="form-control" id="last-name" aria-describedby="emailHelp" placeholder="Enter email">
                                                </div>
                                            </div>-->
														
								
											
										
											
                                            <div class="col-12">
                                                <!-- <button type="submit" class="base-btn">Submit</button> -->
                                                <input type="submit" id="submit" name="submit" value="Update" class="base-btn">
                                            </div>
                                        </div>
                                    </form>

                                </div>
                            </div>
                            <div class="tab-pane fade" id="nav-my-orders" role="tabpanel" aria-labelledby="nav-profile-tab">
                                <div class="profile-tab-content-block">
                                    <h4>My Orders</h4>

                                    <div class="my-orders-block">
                                        <div class="order-card">
                                            <div class="order-card-img-box">
                                                <img src="./img/cofee.png" />
                                            </div>
                                            <div class="order-details-box">
                                                <span class="order-d-number">5465431564</span>
                                                <div class="order-date">20 March 2020</div>
                                                <div class="order-d-name">Coffee (Cappuccino)</div>
                                            </div>
                                            <div class="order-action">
                                                <a href="#" class="base-btn">Track</a>
                                            </div>
                                        </div>
                                        <div class="order-card">
                                            <div class="order-card-img-box">
                                                <img src="./img/cofee.png" />
                                            </div>
                                            <div class="order-details-box">
                                                <span class="order-d-number">5465431564</span>
                                                <div class="order-date">20 March 2020</div>
                                                <div class="order-d-name">Coffee (Cappuccino)</div>
                                            </div>
                                            <div class="order-action">
                                                <a href="#" class="base-btn">Track</a>
                                            </div>
                                        </div>
                                        <div class="order-card">
                                            <div class="order-card-img-box">
                                                <img src="./img/cofee.png" />
                                            </div>
                                            <div class="order-details-box">
                                                <span class="order-d-number">5465431564</span>
                                                <div class="order-date">20 March 2020</div>
                                                <div class="order-d-name">Coffee (Cappuccino)</div>
                                            </div>
                                            <div class="order-action">
                                                <a href="#" class="base-btn">Track</a>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="tab-pane fade" id="nav-address" role="tabpanel" aria-labelledby="nav-profile-tab">
                                <div class="profile-tab-content-block">
                                    <h4>My Addresses</h4>

                                    <button type="button" class="base-btn" data-toggle="modal" data-target="#addNewAddress" style="margin-bottom: 15px;">
                                        Add New Address
                                    </button>

                                    <!-- Add New Address Modal -->
                                    <div class="modal fade" id="addNewAddress" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Add New Card</h5>
                                                    <button type="button" class="close btn-secondary" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form class="profile-form">
                                                        <div class="row">
                                                            <div class="col-sm-6">
                                                                <div class="form-group">
                                                                    <label for="first-name">First Name</label>
                                                                    <input type="text" class="form-control" id="first-name" aria-describedby="emailHelp" placeholder="Enter email">
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <div class="form-group">
                                                                    <label for="first-name">Last Name</label>
                                                                    <input type="text" class="form-control" id="Last-name" aria-describedby="emailHelp" placeholder="Enter email">
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <div class="form-group">
                                                                    <label for="first-name">Pincode*</label>
                                                                    <input type="text" class="form-control" id="Last-name" aria-describedby="emailHelp" placeholder="Enter email">
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <div class="form-group">
                                                                    <label for="first-name">State</label>
                                                                    <input type="text" class="form-control" id="Last-name" aria-describedby="emailHelp" placeholder="Enter email">
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <div class="form-group">
                                                                    <label for="first-name">City</label>
                                                                    <input type="text" class="form-control" id="Last-name" aria-describedby="emailHelp" placeholder="Enter email">
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12">
                                                                <div class="form-group">
                                                                    <label for="first-name">House No., Building Name*</label>
                                                                    <textarea class="form-control"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12">
                                                                <div class="form-group">
                                                                    <label for="first-name">Road name, Area, Colony*</label>
                                                                    <textarea class="form-control"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12">
                                                                <div class="form-group add-type-box">
                                                                    <label for="first-name">Type of Address</label>
                                                                    <div class="type-add-check-block">
                                                                        <div class="form-check">
                                                                            <input class="form-check-input" type="radio" name="addtype" id="" value="home" checked>
                                                                            <label class="form-check-label" for="homeaddtype">
                                                                                Home
                                                                            </label>
                                                                        </div>
                                                                        <div class="form-check">
                                                                            <input class="form-check-input" type="radio" name="addtype" id="" value="work">
                                                                            <label class="form-check-label" for="workaddtype">
                                                                                Work
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                                    <button type="button" class="base-btn">Submit</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Edit Address Modal -->
                                    <div class="modal fade" id="editAddress" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Add New Address</h5>
                                                    <button type="button" class="close btn-secondary" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form class="profile-form">
                                                        <div class="row">
                                                            <div class="col-sm-6">
                                                                <div class="form-group">
                                                                    <label for="first-name">First Name</label>
                                                                    <input type="text" class="form-control" id="first-name" aria-describedby="emailHelp" placeholder="Enter email">
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <div class="form-group">
                                                                    <label for="first-name">Last Name</label>
                                                                    <input type="text" class="form-control" id="Last-name" aria-describedby="emailHelp" placeholder="Enter email">
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <div class="form-group">
                                                                    <label for="first-name">Pincode*</label>
                                                                    <input type="text" class="form-control" id="Last-name" aria-describedby="emailHelp" placeholder="Enter email">
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <div class="form-group">
                                                                    <label for="first-name">State</label>
                                                                    <input type="text" class="form-control" id="Last-name" aria-describedby="emailHelp" placeholder="Enter email">
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <div class="form-group">
                                                                    <label for="first-name">City</label>
                                                                    <input type="text" class="form-control" id="Last-name" aria-describedby="emailHelp" placeholder="Enter email">
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12">
                                                                <div class="form-group">
                                                                    <label for="first-name">House No., Building Name*</label>
                                                                    <textarea class="form-control"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12">
                                                                <div class="form-group">
                                                                    <label for="first-name">Road name, Area, Colony*</label>
                                                                    <textarea class="form-control"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12">
                                                                <div class="form-group add-type-box">
                                                                    <label for="first-name">Type of Address</label>
                                                                    <div class="type-add-check-block">
                                                                        <div class="form-check">
                                                                            <input class="form-check-input" type="radio" name="addtype" id="" value="home" checked>
                                                                            <label class="form-check-label" for="homeaddtype">
                                                                                Home
                                                                            </label>
                                                                        </div>
                                                                        <div class="form-check">
                                                                            <input class="form-check-input" type="radio" name="addtype" id="" value="work">
                                                                            <label class="form-check-label" for="workaddtype">
                                                                                Work
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                    <button type="button" class="base-btn">Submit</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="manage-address-block">
                                        <div class="order-card m-add-card">
                                            <div class="m-add-details-box">
                                                <h4>John Doe</h4>
                                                <div>
                                                    1221, 12th floor ,Ithum Tower B,
                                                    Noida Sector 62, Near N Electronic city Metro, Ithum Tower, Noida, Uttar Pradesh - 201301
                                                </div>
                                                <span>1234 567 890</span>
                                            </div>
                                            <div class="m-add-action-box">

                                                <div class="dropdown show">
                                                    <a class="m-add-actions-btn dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                                    </a>

                                                    <div class="dropdown-menu m-add-actions" aria-labelledby="dropdownMenuLink">
                                                        <a class="dropdown-item" href="#">
                                                            <button type="button" data-toggle="modal" data-target="#editAddress">
                                                                Edit
                                                            </button>
                                                        </a>
                                                        <a class="dropdown-item" href="#">Delete</a>
                                                    </div>
                                                </div>

                                            </div>

                                        </div>
                                        <div class="order-card m-add-card">
                                            <div class="m-add-details-box">
                                                <h4>John Doe</h4>
                                                <div>
                                                    1221, 12th floor ,Ithum Tower B,
                                                    Noida Sector 62, Near N Electronic city Metro, Ithum Tower, Noida, Uttar Pradesh - 201301
                                                </div>
                                                <span>1234 567 890</span>
                                            </div>
                                            <div class="m-add-action-box">

                                                <div class="dropdown show">
                                                    <a class="m-add-actions-btn dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                                    </a>

                                                    <div class="dropdown-menu m-add-actions" aria-labelledby="dropdownMenuLink">
                                                        <a class="dropdown-item" href="#">
                                                            <button type="button" data-toggle="modal" data-target="#editAddress">
                                                                Edit
                                                            </button>
                                                        </a>
                                                        <a class="dropdown-item" href="#">Delete</a>
                                                    </div>
                                                </div>

                                            </div>

                                        </div>
                                        <div class="order-card m-add-card">
                                            <div class="m-add-details-box">
                                                <h4>John Doe</h4>
                                                <div>
                                                    1221, 12th floor ,Ithum Tower B,
                                                    Noida Sector 62, Near N Electronic city Metro, Ithum Tower, Noida, Uttar Pradesh - 201301
                                                </div>
                                                <span>1234 567 890</span>
                                            </div>
                                            <div class="m-add-action-box">

                                                <div class="dropdown show">
                                                    <a class="m-add-actions-btn dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                                    </a>

                                                    <div class="dropdown-menu m-add-actions" aria-labelledby="dropdownMenuLink">
                                                        <a class="dropdown-item" href="#">
                                                            <button type="button" data-toggle="modal" data-target="#editAddress">
                                                                Edit
                                                            </button>
                                                        </a>
                                                        <a class="dropdown-item" href="#">Delete</a>
                                                    </div>
                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="nav-cards" role="tabpanel" aria-labelledby="nav-profile-tab">
                                <div class="profile-tab-content-block">
                                    <h4>Saved Card</h4>

                                    <button type="button" class="base-btn" data-toggle="modal" data-target="#addNewCard" style="margin-bottom: 15px;">
                                        Add New Card
                                    </button>

                                    <!-- Add New Card Modal -->
                                    <div class="modal fade" id="addNewCard" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Add New Card</h5>
                                                    <button type="button" class="close btn-secondary" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form class="profile-form">
                                                        <div class="row">
                                                            <div class="col-12 col-sm-6">
                                                                <div class="form-group">
                                                                    <input type="text" class="form-control" aria-describedby="enter-card-number" placeholder="Enter Card Number">
                                                                </div>
                                                            </div>
                                                            <div class="col-12 col-sm-6">
                                                                <div class="form-group new-card-validity">
                                                                    <label>Valid Through</label>
                                                                    <input type="text" class="form-control" aria-describedby="new-add-name" placeholder="MM">
                                                                    <input type="text" class="form-control" aria-describedby="new-add-name" placeholder="YY">
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="form-group">
                                                                    <input type="text" class="form-control" aria-describedby="new-add-name" placeholder="Name on Card">
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <span style="display: block; margin-bottom: 15px;">*Your card details would be securely saved for faster payments. Your CVV will not be stored</span>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                                    <button type="button" class="base-btn">Submit</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Edit Card Modal -->
                                    <div class="modal fade" id="editCard" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Add New Address</h5>
                                                    <button type="button" class="close btn-secondary" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form class="profile-form">
                                                        <div class="row">
                                                            <div class="col-12 col-sm-6">
                                                                <div class="form-group">
                                                                    <input type="text" class="form-control" aria-describedby="enter-card-number" placeholder="Enter Card Number">
                                                                </div>
                                                            </div>
                                                            <div class="col-12 col-sm-6">
                                                                <div class="form-group new-card-validity">
                                                                    <label>Valid Through</label>
                                                                    <input type="text" class="form-control" aria-describedby="new-add-name" placeholder="MM">
                                                                    <input type="text" class="form-control" aria-describedby="new-add-name" placeholder="YY">
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="form-group">
                                                                    <input type="text" class="form-control" aria-describedby="new-add-name" placeholder="Name on Card">
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <span style="display: block; margin-bottom: 15px;">*Your card details would be securely saved for faster payments. Your CVV will not be stored</span>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                                    <button type="button" class="base-btn">Submit</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="manage-address-block">
                                        <div class="order-card m-add-card m-cards">
                                            <div class="m-add-details-box">
                                                <div class="saved-card-details">
                                                    <h4>Axis Bank Neon Card</h4>
                                                    <div class="saved-cards-info">
                                                        <div class="saved-cards-img-box">
                                                            <img src="http://test.wspl.co/LuGyiMin/img/credit-cards/mastercard.png" alt="Mastercard">
                                                        </div>
                                                        <span>52** **** **** 6235</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="m-add-action-box">

                                                <div class="dropdown show">
                                                    <a class="m-add-actions-btn dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                                    </a>

                                                    <div class="dropdown-menu m-add-actions" aria-labelledby="dropdownMenuLink">
                                                        <a class="dropdown-item" href="#">
                                                            <button type="button" data-toggle="modal" data-target="#editCard">
                                                                Edit
                                                            </button>
                                                        </a>
                                                        <a class="dropdown-item" href="#">Delete</a>
                                                    </div>
                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="nav-wishlist" role="tabpanel" aria-labelledby="nav-contact-tab">
                                <div class="profile-tab-content-block">
                                    <h4>My Wishlist</h4>

                                    <div class="wishlist-block">
                                        <div class="row no-gutters">
                                            <div class="col-md-6">
                                                <div class="product">
                                                    <a href="#">
                                                        <div class="product-header">
                                                            <span class="badge badge-success">50% OFF</span>
                                                            <img alt="" src="img/item/1.jpg" class="img-fluid">
                                                            <span class="veg text-success mdi mdi-circle"></span>
                                                        </div>
                                                        <div class="product-body">
                                                            <h5>Product Title Here</h5>
                                                            <h6><strong><span class="mdi mdi-approval"></span> Available in</strong> - 500 gm</h6>
                                                        </div>
                                                        <div class="product-footer">
                                                            <button class="btn btn-secondary btn-sm float-right" type="button"><i class="mdi mdi-cart-outline"></i> Add To Cart</button>
                                                            <p class="offer-price mb-0">$450.99 <i class="mdi mdi-tag-outline"></i><br><span class="regular-price">$800.99</span></p>
                                                        </div>
                                                    </a>
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
        </div>
    </section>
    
   <!-- =========================== End of Profile  =============================== -->
