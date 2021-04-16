<script type="text/javascript">
 function add_to_cart_save(cnt){
          //alert("hi...");
         var p_ids=$("#p_id_"+cnt).val();
         var v_id=$("#save_v_id_"+cnt).val();
         //alert(v_id);
         var p_id=p_ids+'_'+v_id;
         var p_qty=$("#p_qty_"+cnt).val();
         var p_name=$("#p_name_"+cnt).val();
         var p_price=$("#p_price_"+cnt).val();
         var mrp_price=$("#mrp_price_"+cnt).val();
         var p_image=$("#p_image_"+cnt).val();
         var p_weight=$("#p_weight_"+cnt).val();
         var gst_per=$("#gst_per_"+cnt).val();
         var gst_type=$("#gst_type_"+cnt).val();
         var discount=$("#p_price_"+cnt).val();
         var product_amu=$("#product_amu_"+cnt).val();
          var hsn_code=$("#hsn_code_"+cnt).val();
            var margin_price=$("#margin_price_"+cnt).val();
         $.ajax({
          url:"<?php echo base_url();?>"+'Cart/add',
          type:'POST',
          data:{p_id:p_id,p_qty:p_qty,p_name:p_name,p_price:p_price,p_image:p_image,p_weight:p_weight,mrp_price:mrp_price,gst_type:gst_type,discount:discount,product_amu:product_amu,hsn_code:hsn_code,margin_price:margin_price},
          success:function(result){
              $("#add_cart_save_detail_"+cnt).css("display", "none");
              $("#remove_cart_save_"+cnt).css("display", "block");
              $(".a-c-qty-drop_save_"+cnt).css("display", "flex");
              $(".a-c-qty-drop_save_"+cnt).html(result);
              $itemcnt=get_item_count();
            }
         })
     } 
   function  get_item_count(){
          $.ajax({
          url:"<?php echo base_url();?>"+'Cart/get_item_count',
          type:'POST',
          data:{},
          success:function(result){
             $(".cart-value").html(result);
             }
         })

      }  
  function remove_to_cart_save(cnt){
    var p_id=$("#p_id_"+cnt).val();
     $.ajax({
          url:"<?php echo base_url();?>"+'Cart/remove_to_cart',
          type:'POST',
          data:{p_id:p_id},
          success:function(result){
             //$("#add_cart").displ
             $(".cart-value").html(result);
             $("#text_success").html('('+result+')');
             $("#add_cart_save_detail_"+cnt).css("display", "inline-block");
             $("#remove_cart_save_detail_"+cnt).css("display", "none");

            }
        })
  }
  function add_to_cart_related(cnt){
          //alert("hi...");
         var p_ids=$("#p_id_"+cnt).val();
         var v_id=$("#related_v_id_"+cnt).val();
         var p_id=p_ids+'_'+v_id;
         var p_qty=$("#p_qty_"+cnt).val();
         var p_name=$("#p_name_"+cnt).val();
         var p_price=$("#p_price_"+cnt).val();
         var mrp_price=$("#mrp_price_"+cnt).val();
         var p_image=$("#p_image_"+cnt).val();
         var p_weight=$("#p_weight_"+cnt).val();
         var gst_per=$("#gst_per_"+cnt).val();
         var gst_type=$("#gst_type_"+cnt).val();
         var discount=$("#p_price_"+cnt).val();
         var product_amu=$("#product_amu_"+cnt).val();
          var hsn_code=$("#hsn_code_"+cnt).val();
            var margin_price=$("#margin_price_"+cnt).val();
         $.ajax({
          url:"<?php echo base_url();?>"+'Cart/add',
          type:'POST',
          data:{p_id:p_id,p_qty:p_qty,p_name:p_name,p_price:p_price,p_image:p_image,p_weight:p_weight,mrp_price:mrp_price,gst_type:gst_type,discount:discount,product_amu:product_amu,hsn_code:hsn_code,margin_price:margin_price},
          success:function(result){
              $("#add_cart_save_"+cnt).css("display", "none");
              $("#remove_cart_save_"+cnt).css("display", "block");
              $(".a-c-qty-drop_save_"+cnt).css("display", "flex");
              $(".a-c-qty-drop_save_"+cnt).html(result);
            }
         })
     }
  function remove_to_cart_related(cnt){
    var p_id=$("#p_id_"+cnt).val();
    //alert(p_id);
     $.ajax({
          url:"<?php echo base_url();?>"+'Cart/remove_to_cart',
          type:'POST',
          data:{p_id:p_id},
          success:function(result){
             //$("#add_cart").displ
             $(".cart-value").html(result);
             $("#text_success").html('('+result+')');
             $("#add_cart_related_"+cnt).css("display", "inline-block");
             $("#remove_cart_related_"+cnt).css("display", "none");

            }
        })
  }
 function get_variant(pid,vid){
          $.ajax({
                url:"<?php echo base_url();?>"+'Pages/get_variant',
                type:"post",
                data:{pid:pid,vid:vid},
                success:function(res){
                  //alert(res);
                   $("#details_data_"+pid).html(res);
                }
            });
    }
  function savers_get_variant(pid,vid){
       $.ajax({
                
                url:"<?php echo base_url();?>"+'Pages/savers_get_variant',
                type:"post",
                data:{pid:pid,vid:vid},
                success:function(res){
                   $("#savers_res_data_"+pid).html(res);
                }
        });
    }      
 </script>
	<section class="product-inner-bc-section">
		<div class="container">
			<div class="page-bredcrumb-box">
				<ul>
					<li><a href="index.html">Home</a></li>
					<li><a href="<?php echo base_url(); ?>">Products</a></li>
					<!--<li><a href="<?php echo base_url(); ?>">Barcode Printers</a></li>-->
					<li><a href="<?php echo base_url(); ?>">Product Details</a></li>
					<li><a href="<?php echo base_url(); ?>"><?php echo $row['0']['product_name']; ?></a></li>
				</ul>
			</div>
		</div>
	</section>

	<section class="product-ov-section">
		<div class="container">
			<div class="row">
				<div class="col-sm-6 col-md-5 col-lg-4">
					<div class="product-image-block">
						<div class="img-box">
							<img src="<?php echo site_url(); ?>admin/upload/product_images/<?php echo $row['0']['image']; ?>" alt="<?php echo $row['0']['product_name']; ?>">
						</div>
					</div>
				</div>
				<div class="col-sm-6 col-md-7 col-lg-8">
					<div class="prod-ov-block">
						<h1><?php echo $row['0']['product_name']; ?></h1>
						<div>
							<!--<span class="modelnm"><?php echo $row['0']['model']; ?></span>-->
							<!--<div class="dwn-btn">
								<button>
									<span class="material-icons">get_app</span>
									Download Brochure
								</button>
							</div>-->
						</div>
						<div class="product-ov-table">
							<h3>Overview</h3>
							<table>
								<tr>
									<td><?php echo @$long_desc[0]->text1; ?></td>
									<td><?php echo @$long_desc[0]->text2; ?></td>
								</tr>
								<tr>
									<td><?php echo @$long_desc[0]->text3; ?></td>
									<td><?php echo @$long_desc[0]->text4; ?></td>
								</tr>
								<tr>
									<td><?php echo @$long_desc[0]->text5; ?></td>
									<td><?php echo @$long_desc[0]->text6; ?></td>
								</tr>
								<tr>
									<td><?php echo @$long_desc[0]->text7; ?></td>
									<td><?php echo @$long_desc[0]->text8; ?></td>
								</tr>
								<tr>
									<td><?php echo @$long_desc[0]->text9; ?></td>
									<td><?php echo @$long_desc[0]->text10; ?></td>
								</tr>
								
							</table>
						</div>
						<button class="g-l-p-btn" type="button" data-bs-toggle="modal" data-bs-target="#talk-modal">
							<div class="img-box">
								<img src="<?php echo base_url(); ?>common/img/f-btn-icon.svg" alt="">
							</div>
							<span>Get Latest Price</span>
						</button>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="product-tabs-section">
		<div class="container">
			<ul class="nav product-tabs" id="productTab" role="tablist">
				<li class="nav-item" role="presentation">
				  <button class="prod-tab-btn active" id="aa" data-bs-toggle="tab" data-bs-target="#aaaaa" type="button" role="tab" aria-controls="aaaaa" aria-selected="true">Description</button>
				</li>
			<li class="nav-item" role="presentation">
				  <button class="prod-tab-btn" id="aaa" data-bs-toggle="tab" data-bs-target="#aaaaaa" type="button" role="tab" aria-controls="aaaaaa" aria-selected="false">Specifications</button>
				</li>
				<!--	<li class="nav-item" role="presentation">
				  <button class="prod-tab-btn" id="aaaa" data-bs-toggle="tab" data-bs-target="#aaaaaaa" type="button" role="tab" aria-controls="aaaaaaa" aria-selected="false">Supplies</button>
				</li>
				<li class="nav-item" role="presentation">
				  <button class="prod-tab-btn" id="aaaaab" data-bs-toggle="tab" data-bs-target="#aaaaaaaa" type="button" role="tab" aria-controls="aaaaaaaa" aria-selected="false">FAQs</button>
				</li>-->
			  </ul>
			  <div class="tab-content product-tab-content" id="productTabContent">
				<div class="tab-pane fade show active" id="aaaaa" role="tabpanel" aria-labelledby="11-tab">
					<p>
					<?php echo $row['0']['description']; ?>
					</p>
				</div>
					<div class="tab-pane fade" id="aaaaaa" role="tabpanel" aria-labelledby="12-tab">
					<div class="specifications-tab-block">
						<?php echo @$row['0']['specifications']; ?>
					</div>
				</div>
				
				
				<!--<div class="tab-pane fade" id="aaaaaaa" role="tabpanel" aria-labelledby="13-tab">
					<div class="supply-tab-block">
						<div class="row">
							<div class="col-sm-6 col-md-4">
								<a href="javaScript:void(0)" class="supply-block">
									<div>
									<div class="img-box">
										<img src="<?php echo base_url(); ?>common/img/ribbons.png" alt="Ribbons">
									</div>
									<h3>Thermal Ribbons</h3>
									<p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Aliquid, ex ducimus. Doloribus, quisquam? Maxime esse unde ipsum amet odit iure, pariatur animi porro voluptatibus recusandae nesciunt, quo, rem doloremque quaerat?</p>
									</div>
								</a>
							</div>
							<div class="col-sm-6 col-md-4">
								<a href="javaScript:void(0)" class="supply-block">
									<div>
									<div class="img-box">
										<img src="https://printronixautoid.com/wp-content/uploads/2018/03/Cleaning-Supplie-Group-300x200.png" alt="Ribbons">
									</div>
									<h3>Cleaning Supplies</h3>
									<p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Aliquid, ex ducimus. Doloribus, quisquam? Maxime esse unde ipsum amet odit iure, pariatur animi porro voluptatibus recusandae nesciunt, quo, rem doloremque quaerat?</p>
									</div>
								</a>
							</div>
							<div class="col-sm-6 col-md-4">
								<a href="javaScript:void(0)" class="supply-block">
									<div>
									<div class="img-box">
										<img src="https://printronixautoid.com/wp-content/uploads/2018/03/Cleaning-Supplie-Group-300x200.png" alt="Ribbons">
									</div>
									<h3>Cleaning Supplies</h3>
									<p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Aliquid, ex ducimus. Doloribus, quisquam? Maxime esse unde ipsum amet odit iure, pariatur animi porro voluptatibus recusandae nesciunt, quo, rem doloremque quaerat?</p>
									</div>
								</a>
							</div>
						</div>
					</div>
				</div>-->
				<!--<div class="tab-pane fade" id="aaaaaaaa" role="tabpanel" aria-labelledby="12-tab">
					<div class="FAQ-tab-block">
						<div class="accordion" id="accordionExample">
							<div class="accordion-item">
							  <h2 class="accordion-header" id="headingOne">
								<button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
								   What Is The Average Cost For A Website?
								</button>
							  </h2>
							  <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
								<div class="accordion-body">
								  <strong> One of the most important questions people ask when it comes to building a website is . How much does it cost to build a good website?
										The truth is, the cost of building a good website Depending on your needs entirely on your budget and goals.
										There is no doubt in saying that website development is the most important and essential task for every entrepreneur.
										We believe that in today's fastest-growing world, website designing has become a most required task. Website is not only presents your business on the online platform but also helps to increase your business to reach goals .</strong>
								</div>
							  </div>
							</div>
							<div class="accordion-item">
							  <h2 class="accordion-header" id="headingTwo">
								<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
								   How Long Does It Take To Create A Website?
								</button>
							  </h2>
							  <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
								<div class="accordion-body">
								  <strong>It's depend upon requirement of website , Generally for simple design it will take arround 2 to 3 days.</strong>
								</div>
							  </div>
							</div>
							<div class="accordion-item">
							  <h2 class="accordion-header" id="headingThree">
								<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
									What Kind Of Technology Do You Support? 
								</button>
							  </h2>
							  <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
								<div class="accordion-body">
								  <strong>For design you can use latest technology which includes HTML5, bootstrap , Ajax support.</strong>
								</div>
							  </div>
							</div>
							<div class="accordion-item">
							  <h2 class="accordion-header" id="headingThree">
								<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
									 Can I See My Website While It's In Progress?  
								</button>
							  </h2>
							  <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
								<div class="accordion-body">
								  <strong>Yes , before live website you can see all design task locally or any demo server which will not be public.</strong>
								</div>
							  </div>
							</div>
							<div class="accordion-item">
							  <h2 class="accordion-header" id="headingThree">
								<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
									 Do you create website in CMS?  
								</button>
							  </h2>
							  <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
								<div class="accordion-body">
								  <strong>Yes we have all CMS like Wordpress website</strong>
								</div>
							  </div>
							</div>
						  </div>
					</div>
				</div>-->
			  </div>
		</div>
	</section>

	<section class="products-slider-section">
		<div class="container">
			<h2>Similar Products</h2>
			<div class="owl-carousel owl-theme pop-prod-owl">
			<?php 
			//print_r($rows);die;
			
			foreach($rows as $key=>$value){?>
				<div class="item pop-prod-item">
					<div class="prod-item-box">
						<div class="prod-action">
							<button type="button" data-bs-toggle="modal" data-bs-target="#talk-modal">
								<img src="<?php echo base_url(); ?>common/img/f-btn-icon.svg" alt="">
							</button>
						</div>
						<div class="img-box">
							<img src="<?php echo site_url(); ?>admin/upload/product_images/<?php echo $value['image'];?>" alt="">
						</div>
						<h1><?php echo $value['product_name'];?></h1>
						<span class="modelnm"><?php echo $value['model'];?></span>
						<a href="<?php echo site_url(); ?>Pages/getProductDetails/<?php echo $value['id'];?>" class="link-btn"> Know More </a>
					</div>
				</div>
			<?php }  ?>
						

		</div>
	</section>
	
