              <?php
                $cat_array[]= @$single_pro_data->cat_id;
                $sub_cat_array[]= @$single_pro_data->sub_cat_id;
                $sub_chid_cat_array[]= @$single_pro_data->sub_cat_child_id;
               $industrytype_array[]= @$single_industrytype->industrytype;
			   //print_r($industrytype_array);die;
                
                //$attr_id=@$single_pro_data->product_attribute;
				$attr_id=@$single_pro_data->id;
				//print_r($attr_id);die;
                 
                $image=Get_Productgallery_details(@$single_pro_data->id);
                

                ?>
            <script>
					$(document).ready(function() {
					$("#onchange_div").hide();
					$("#onchange_div2").hide();
    
					});
  
			function get_cat_id(val){
				//alert(val);
				$("#load_div").hide();
				$("#load_div2").hide();
				$("#onchange_div").show();
				$.ajax({
					  url:"<?php echo base_url();?>"+'Productmaster/get_sub_cat',
					  type:'POST',
					  data:{cat_id:val},
					  success:function(result){
						$("#sub_cat_id").html(result);
						$("#sub_cat_child_id").html('');
					  }
				  })
			  }

			function get_attr_data(){
				var cat_id=$("#cat_id").val();
				$.ajax({
					  url:"<?php echo base_url();?>"+'Productmaster/get_attr_data',
					  type:'POST',
					  data:{cat_id:cat_id},
					  success:function(results){
					   $("#thead_data").html(results);
						//alert(result);
						
					  }
				  })
			  }

			function get_cat_child_id(val){
				//alert(val);
				$("#load_div").hide();
				//alert(val);
				$("#load_div2").hide();
				$("#onchange_div2").show();
				$.ajax({
					  url:"<?php echo base_url();?>"+'Productmaster/get_sub_child_cat',
					  type:'POST',
					  data:{cat_id:val},
					  success:function(result){
						$("#sub_cat_child_id").html(result);
					  }
				  })
			  }
			 function get_id(id){
			   $("#photo_"+id).val(id);
			  } 
			</script>
              <div class="content-wrapper">
                <!-- Content Header (Page header) -->
               <div class="container-fluid">
                <h2>Products</h2>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a class="active" href="<?php echo base_url()?>productmaster/addpromaster">Products</a></li>
                        
                       <div class="pull-right">
                    <button type="submit" form="form-category" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="Save"><i class="fa fa-save"></i></button>
                    <a href="<?php echo base_url();?>Productmaster/ProductList" data-toggle="tooltip" title="" class="btn btn-default" data-original-title="Cancel"><i class="fa fa-reply"></i></a></div>
                </ol>
                
                </div>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<style>
input.error {
    border-color: #f00 !important;
}

small.required {
    color:#f00;
}
</style>
<?php 
//echo'<pre>';print_r($fields_data); ?>
<div class="container" style="margin-top: 20px; width:100%;">
     <div class="panel panel-primary">
      <div class="panel-body">
            <form action="<?php echo base_url();?>/Productmaster/save_product_data" class="form-horizontal" method="post" enctype="multipart/form-data" id="validate">
              <input type="hidden" name="eid" value="<?php echo @$this->uri->segment(3);?>">
              <input type="hidden" id="attr_ids" value="<?php echo @$attr_id;?>">
    <ul class="nav nav-tabs nav-justified nav-inline">
                    <li class="active"><a href="#General" data-toggle="tab">General</a></li>
                    <li><a href="#Data" data-toggle="tab">Data</a></li>
                    <li><a href="#Links" data-toggle="tab">Links</a></li>
                    <!-- <li><a onclick="get_attr_data()" href="#Poduct-attribute" data-toggle="tab">Poduct Attribute</a></li> -->
                    <?php
                    if(@$single_pro_data->id){?>
                    <li><a href="#Poduct-attribute" data-toggle="tab">Poduct Attribute</a></li>
                  <?php }else{?>
                      <li><a onclick="get_attr_data()" href="#Poduct-attribute" data-toggle="tab">Poduct Attribute</a></li>
                  <?php }?>
                   <!--  <li><a href="#Image" data-toggle="tab">Image</a></li> -->
                </ul>
<div class="tab-content tab-validate" style="margin-top:20px;">
<div class="tab-pane active" id="General">
<div class="tab-content"> <div class="tab-pane active" id="language1">
<div class="form-group required">
<label class="col-sm-2 control-label" for="input-name1">Product Name</label>
<div class="col-sm-10">
<input type="text" name="product_name" value="<?php echo @$single_pro_data->product_name;?>" placeholder="Product Name" id="input-name1" class="form-control">
</div>
</div>

<div class="form-group">
                <label class="col-sm-2 control-label" for="input-name1">Brochure file</label>
                <div class="col-sm-10">
              
                <input type="hidden" name="old_logo" value="<?php echo @$single_pro_data->brochure_file;?>">
               <?php
				  if(!empty($single_pro_data->brochure_file)){
					  ?>
				<img src="<?php echo base_url().'upload/brochure/'.$single_pro_data->brochure_file?> " width="50">
					  <?php
				  }
               ?>
			    <input type="file" name="brochure_file"  id="brochure_file"  onchange="loadFile1(event)">
				
                </div>
                </div>
				<div class="list-group-item" style="border: 0px !important;">
                                       <div class="row">
                                           <div class="col-md-3">
                                           </div>
                                           <div class="col-md-9"> 
                                               <img width="60px" id="output1"/>
                                           </div>
                                       </div>
                                   </div>	

<div class="form-group required">
<label class="col-sm-2 control-label" for="input-name1">Model No.</label>
<div class="col-sm-10">
<input type="text" name="model" value="<?php echo @$single_pro_data->model;?>" placeholder="Model No" id="input-name1" class="form-control">
</div>
</div>
<!--<div class="form-group required">
<label class="col-sm-2 control-label" for="input-name1">Product (MOU)</label>
<div class="col-sm-10">
<select required=""  name="product_amu" id="product_amu" class="form-control valid" aria-required="true" aria-invalid="false">
                <option value="">Select MOU</option>
                                       <option value="g"<?php if(@$single_pro_data->product_amu=='g'){ echo'selected="selected"';};?>>Gram</option>
                                       <option value="kg"<?php if(@$single_pro_data->product_amu=='kg'){ echo'selected="selected"';};?>>Kg</option>
                                    </select>

</div>
</div>-->
<div class="form-group">
<label class="col-sm-2 control-label" for="input-description1">Description</label>
<div class="col-sm-10">
<textarea name="description" id="description" class="tincyeditor"><?php echo @$single_pro_data->description;?></textarea>
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label" for="input-description1">Specifications</label>
<div class="col-sm-10">
<textarea name="specifications" id="specifications" class="tincyeditor"><?php echo @$single_pro_data->specifications;?></textarea>
</div>
</div>

	<div class="form-group">
<label class="col-sm-2 control-label" for="input-description1">Overview</label>
<div class="col-sm-10">
<table class="test">
  <tr><input type="hidden" name="attr_id[]" value="<?php echo @$value->id; ?>">  </tr>
  <tr><input type="hidden" name="lid" value="<?php echo @$long_desc_data[0]->id; ?>">  </tr>
   <td><input type="text" name="text1" value="<?php echo @$long_desc_data[0]->text1; ?>" placeholder="" id="input-name1" class="form-control"></td>
   <td><input type="text" name="text2" value="<?php echo @$long_desc_data[0]->text2; ?>" placeholder="" id="input-name1" class="form-control"></td>
   <td><input type="text" name="text3" value="<?php echo @$long_desc_data[0]->text3; ?>" placeholder="" id="input-name1" class="form-control"></td>
   <td><input type="text" name="text4" value="<?php echo @$long_desc_data[0]->text4; ?>" placeholder="" id="input-name1" class="form-control"></td>
   <td><input type="text" name="text5" value="<?php echo @$long_desc_data[0]->text5; ?>" placeholder="" id="input-name1" class="form-control"></td>
   <td><input type="text" name="text6" value="<?php echo @$long_desc_data[0]->text6; ?>" placeholder="" id="input-name1" class="form-control"></td>
   
  </tr>
 <tr>
   <td><input type="text" name="text7" value="<?php echo @$long_desc_data[0]->text7; ?>" placeholder="" id="input-name1" class="form-control"></td>
   <td><input type="text" name="text8" value="<?php echo @$long_desc_data[0]->text8; ?>" placeholder="" id="input-name1" class="form-control"></td>
   <td><input type="text" name="text9"value="<?php echo @$long_desc_data[0]->text9; ?>" placeholder="" id="input-name1" class="form-control"></td>
   <td><input type="text" name="text10"value="<?php echo @$long_desc_data[0]->text10; ?>" placeholder="" id="input-name1" class="form-control"></td>
   <td><input type="text" name="text11"value="<?php echo @$long_desc_data[0]->text11; ?>" placeholder="" id="input-name1" class="form-control"></td>
   <td><input type="text" name="text12"value="<?php echo @$long_desc_data[0]->text12; ?>" placeholder="" id="input-name1" class="form-control"></td>
   
  </tr>
 
  
</table>
<?php //} ?>
</div>
<style>
table.test {
  border-collapse: separate;
  border-spacing: 5px;
  *border-collapse: expression('separate', cellSpacing='10px');
}
</style>
</div>
<?php
if(@$fields_data[26]->status==1){?>
<div class="form-group required">
<label class="col-sm-2 control-label" for="input-meta-title1">Meta Tag Title</label>
<div class="col-sm-10">
<input type="text" name="product_title" value="<?php echo @$single_pro_data->product_title;?>" placeholder="Meta Tag Title" id="input-meta-title1" class="form-control">
</div>
</div>
<?php }?>
<?php
if(@$fields_data[25]->status==1){?>
<div class="form-group">
<label class="col-sm-2 control-label" for="input-meta-description1">Meta Tag Description</label>
<div class="col-sm-10">
<textarea name="meta_description" rows="5" placeholder="Meta Tag Description" id="input-meta-description1" class="form-control"><?php echo @$single_pro_data->meta_description;?></textarea>
</div>
</div>
<?php }?>
<?php
if(@$fields_data[24]->status==1){?>
<div class="form-group">
<label class="col-sm-2 control-label" for="input-meta-keyword1">Meta Tag Keywords</label>
<div class="col-sm-10">
<textarea name="tag_keyword" rows="5" placeholder="Meta Tag Keywords" id="input-meta-keyword1" class="form-control"><?php echo @$single_pro_data->tag_keyword;?></textarea>
</div>
</div>
<?php }?>
<?php
if(@$fields_data[23]->status==1){?>
<div class="form-group">
<label class="col-sm-2 control-label" for="input-tag1"><span data-toggle="tooltip" title="" data-original-title="Comma separated">Product Tags</span></label>
<div class="col-sm-10">
<input type="text" name="product_tag" value="<?php echo @$single_pro_data->product_tag;?>" placeholder="Product Tags" id="input-tag1" class="form-control">
</div>
</div>
<?php }?>
</div>
</div>
</div>
<div class="tab-pane" id="Data">
<div class="tab-pane" id="tab-data">
<?php
if(@$fields_data[22]->status==1){?>                    
<div class="form-group required">
<label class="col-sm-2 control-label" for="input-model">Model</label>
<div class="col-sm-10">
<input type="text" name="model" value="<?php echo @$single_pro_data->model;?>" placeholder="Model" id="input-model" class="form-control">
</div>
</div>
<?php }?>
<?php
if(@$fields_data[21]->status==1){?>
<div class="form-group">
<label class="col-sm-2 control-label" for="input-sku"><span data-toggle="tooltip" title="" data-original-title="Stock Keeping Unit">SKU</span></label>
<div class="col-sm-10">
<input type="text" name="sku" value="<?php echo @$single_pro_data->sku;?>" placeholder="SKU" id="input-sku" class="form-control">
</div>
</div>
<?php }?>
<?php
if(@$fields_data[20]->status==1){?>
<div class="form-group">
<label class="col-sm-2 control-label" for="input-upc"><span data-toggle="tooltip" title="" data-original-title="Universal Product Code">UPC</span></label>
<div class="col-sm-10">
<input type="text" name="upc" value="<?php echo @$single_pro_data->upc;?>" placeholder="UPC" id="input-upc" class="form-control">
</div>
</div>
<?php }?>
<?php
if(@$fields_data[19]->status==1){?>
<div class="form-group">
<label class="col-sm-2 control-label" for="input-ean"><span data-toggle="tooltip" title="" data-original-title="European Article Number">EAN</span></label>
<div class="col-sm-10">
<input type="text" name="ean" value="<?php echo @$single_pro_data->ean;?>" placeholder="EAN" id="input-ean" class="form-control">
</div>
</div>
<?php }?>
<?php
if(@$fields_data[18]->status==1){?>
<div class="form-group">
<label class="col-sm-2 control-label" for="input-jan"><span data-toggle="tooltip" title="" data-original-title="Japanese Article Number">JAN</span></label>
<div class="col-sm-10">
<input type="text" name="jan" value="<?php echo @$single_pro_data->jan;?>" placeholder="JAN" id="input-jan" class="form-control">
</div>
</div>
<?php }?>
<?php
if(@$fields_data[17]->status==1){?>
<div class="form-group">
<label class="col-sm-2 control-label" for="input-isbn"><span data-toggle="tooltip" title="" data-original-title="International Standard Book Number">ISBN</span></label>
<div class="col-sm-10">
<input type="text" name="isbn" value="<?php echo @$single_pro_data->isbn;?>" placeholder="ISBN" id="input-isbn" class="form-control">
</div>
</div>
<?php }?>
<?php
if(@$fields_data[16]->status==1){?>
<div class="form-group">
<label class="col-sm-2 control-label" for="input-mpn"><span data-toggle="tooltip" title="" data-original-title="Manufacturer Part Number">MPN</span></label>
<div class="col-sm-10">
<input type="text" name="mpn" value="<?php echo @$single_pro_data->mpn;?>" placeholder="MPN" id="input-mpn" class="form-control">
</div>
</div>
<?php }?>
<?php
if(@$fields_data[15]->status==1){?>
<div class="form-group">
<label class="col-sm-2 control-label" for="input-location">Location</label>
<div class="col-sm-10">
<input type="text" name="location" value="<?php echo @$single_pro_data->location;?>" placeholder="Location" id="input-location" class="form-control">
</div>
</div>
<?php }?>
<?php
if(@$fields_data[14]->status==1){?>
<div class="form-group">
<label class="col-sm-2 control-label" for="input-price">MRP</label>
<div class="col-sm-10">
<input type="text" name="mrp_price" value="<?php echo @$single_pro_data->mrp_price;?>" placeholder="MRP" id="input-price" class="form-control">
</div>
</div>
<?php }?>
<?php
if(@$fields_data[13]->status==1){?>
<div class="form-group">
<label class="col-sm-2 control-label" for="input-purchase">Purchase Price</label>
<div class="col-sm-10">
<input type="text" name="purchase_price" value="<?php echo @$single_pro_data->purchase_price;?>" placeholder="Purchase Pric" id="input-price" class="form-control">
</div>
</div>
<?php }?>
<?php
if(@$fields_data[12]->status==1){?>
<div class="form-group">
<label class="col-sm-2 control-label" for="input-price">Margin %</label>
<div class="col-sm-10">
<input type="text" name="margin_price" value="<?php echo @$single_pro_data->margin_price;?>" placeholder="Margin %" id="input-price" class="form-control">
</div>
</div>
<?php }?>
<?php
if(@$fields_data[11]->status==1){?>
<div class="form-group">
<label class="col-sm-2 control-label" for="input-price">Sale Price</label>
<div class="col-sm-10">
<input type="text" name="sale_price" value="<?php echo @$single_pro_data->sale_price;?>" placeholder="Sale Price" id="input-price" class="form-control">
</div>
</div>
<?php }?>
<?php
if(@$fields_data[10]->status==1){?>



<div class="form-group">
<div class="col-sm-12">
<div class="row">

<div class="col-sm-1">
<label class="col-sm-2 control-label" for="input-length">Status</label>
</div>

<div class="col-sm-11">
<select name="status" id="input-status" class="form-control">
<option value="Enabled" <?php if (@$single_cat_data->status == 'Enabled') echo ' selected="selected"'; ?>>Enabled</option>
<option value="Disabled" <?php if (@$single_cat_data->status == 'Disabled') echo ' selected="selected"'; ?>>Disabled</option>
</select>


</div>
</div>
</div>
</div>
<?php }?>
<?php
if(@$fields_data[9]->status==1){?>
<div class="form-group">
<label class="col-sm-2 control-label" for="input-quantity">Max quantity</label>
<div class="col-sm-10">
<input type="text" name="max_quantity" value="<?php echo @$single_pro_data->margin_price;?>" placeholder="Max Quantity" id="input-quantity" class="form-control">
</div>
</div>
<?php }?>
<?php
if(@$fields_data[8]->status==1){?>
<div class="form-group">
<label class="col-sm-2 control-label" for="input-minimum"><span data-toggle="tooltip" title="" data-original-title="Force a minimum ordered amount">Min quantity</span></label>
<div class="col-sm-10">
<input type="text" name="min_quantity" value="<?php echo @$single_pro_data->margin_price;?>" placeholder="Minimum Quantity" id="input-minimum" class="form-control">
</div>
</div>
<?php }?>
<?php
if(@$fields_data[7]->status==1){?>
<div class="form-group">
<label class="col-sm-2 control-label" for="input-subtract">Stock</label>
<div class="col-sm-10">
<select name="subtract" id="input-subtract" class="form-control">
<option value="1"<?php if (@$single_cat_data->store == '1') echo ' selected="selected"'; ?>>Yes</option>
<option value="0" <?php if (@$single_cat_data->store == '0') echo ' selected="selected"'; ?>>No</option>
</select>
</div>
</div>
<?php }?>
<?php
if(@$fields_data[6]->status==1){?>
<div class="form-group">
<label class="col-sm-2 control-label" for="input-stock-status"><span data-toggle="tooltip" title="" data-original-title="Status shown when a product is out of stock">Out Of Stock Status</span></label>
<div class="col-sm-10">
<select name="stock_status_id" id="input-stock-status" class="form-control">
<option value="6" <?php if (@$single_cat_data->stock_status_id == '6') echo ' selected="selected"'; ?>>2-3 Days</option>
<option value="7" <?php if (@$single_cat_data->stock_status_id == '7') echo ' selected="selected"'; ?>>In Stock</option>
<option value="5" <?php if (@$single_cat_data->stock_status_id == '5') echo ' selected="selected"'; ?>>Out Of Stock</option>
<option value="8" <?php if (@$single_cat_data->stock_status_id == '8') echo ' selected="selected"'; ?>>Pre-Order</option>
</select>
</div>
</div>
<?php }?>

<?php
if(@$fields_data[5]->status==1){?>
<div class="form-group">
<label class="col-sm-2 control-label" for="input-length">Dimensions (L x W x H)</label>
<div class="col-sm-10">
<div class="row">
<div class="col-sm-2">
<input type="text" name="length" value="<?php echo @$single_pro_data->length;?>" placeholder="Length" id="input-length" class="form-control">
</div>
<div class="col-sm-2">
<input type="text" name="width" value="<?php echo @$single_pro_data->width;?>" placeholder="Width" id="input-width" class="form-control">
</div>
<div class="col-sm-2">
<input type="text" name="height" value="<?php echo @$single_pro_data->height;?>" placeholder="Height" id="input-height" class="form-control">
</div>

<div class="col-sm-3">
<label class="col-sm-12 control-label" for="input-length">Length class</label>
</div>
<div class="col-sm-3">
<select name="weight_class_id" id="input-weight-class" class="form-control">
<option value="1" selected="selected">Meter</option>
<option value="2" <?php if (@$single_cat_data->stock_status_id == '2') echo ' selected="selected"'; ?>>Millimeter</option>
<option value="5" <?php if (@$single_cat_data->stock_status_id == '5') echo ' selected="selected"'; ?>>Centimeter</option>

</select>
</div>


</div>
</div>
</div>
<?php }?>
<?php
if(@$fields_data[4]->status==1){?>

<div class="form-group">
<label class="col-sm-2 control-label" for="input-length">Weight</label>
<div class="col-sm-10">
<div class="row">
<div class="col-sm-4">
<input type="text" name="weight" value="<?php //echo @$single_pro_data->purchase_price;?>" placeholder="Weight" id="input-price" class="form-control">
</div>
<div class="col-sm-3">
<label class="col-sm-12 control-label" for="input-length">Weight Class</label>
</div>

<div class="col-sm-5">
<select name="weight_class_id" id="input-weight-class" class="form-control">
<option value="1" selected="selected">Kilogram</option>
<option value="2" <?php if (@$single_cat_data->stock_status_id == '2') echo ' selected="selected"'; ?>>Gram</option>
<option value="5" <?php if (@$single_cat_data->stock_status_id == '5') echo ' selected="selected"'; ?>>Pound </option>
<option value="6" <?php if (@$single_cat_data->stock_status_id == '6') echo ' selected="selected"'; ?>>Ounce</option>
</select>


</div>
</div>
</div>
</div>
<?php }?>




<!-- 
<div class="form-group">
<label class="col-sm-2 control-label" for="input-status">Product Status</label>
<div class="col-sm-4">
<select name="status" id="input-status" class="form-control">
<option value="Enabled" <?php if (@$single_cat_data->status == 'Enabled') echo ' selected="selected"'; ?>>Enabled</option>
<option value="Disabled" <?php if (@$single_cat_data->status == 'Disabled') echo ' selected="selected"'; ?>>Disabled</option>
</select>
</div>
</div> -->
<?php
if(@$fields_data[3]->status==1){?>
<div class="form-group">
<label class="col-sm-2 control-label" for="input-sort-order">Sort Order</label>
<div class="col-sm-10">
<input type="text" name="sort_order" value="<?php echo @$single_pro_data->sort_order;?>" placeholder="Sort Order" id="input-sort-order" class="form-control">
</div>
</div>
<?php }?>
</div>
</div>
<div class="tab-pane" id="Links">

<?php
if(@$fields_data[2]->status==1){?>
<div class="form-group">
<label class="col-sm-2 control-label" for="input-category"><span data-toggle="tooltip" title="" data-original-title="(Autocomplete)">Brand</span></label>
<div class="col-sm-10">
<select name="brand_id" id="brand_id" class="form-control">
<option value="<?php echo @$single_pro_data->sub_child_category_name;?>">Select brand data</option> 
<?php
 if(!empty(@$brand_data)){
 foreach (@$brand_data as $value) {?>
<option value="<?php echo @$value->id;?>" <?php if(@in_array($value->id,@$brand_array)){ echo 'selected="selected"';}?>><?php echo @$value->brand_name;?></option>
<?php } }?>

</select>
</div>
</div>
<?php }?>
 <div class="form-group">
                <label class="col-sm-2 control-label" for="input-subtract">Category<span style="color:red">*</span></label>
                <div class="col-sm-10">
                <!--<select required=""  onchange="get_cat_id(this.value)" name="cat_id" id="cat_id" class="form-control">-->
                <select required=""  name="cat_id" id="cat_id" class="form-control">
                <!--<option value="<?php echo @$single_pro_data->sub_child_category_name;?>">Select Category</option>-->
                <option value="">Select Category</option>
                   <?php 

                   foreach ($cat_data as $value) {?>
                    <option value="<?php echo $value->id;?>"<?php if(in_array($value->id,$cat_array)){ echo 'selected="selected"';}?> ><?php echo @$value->category_name;?></option>
                   <?php } ?>
                 </select>

                </div>
                </div>

                <!--<div class="form-group" id="load_div">
                <label class="col-sm-2 control-label" for="input-subtract">Sub Category</label>
                <div class="col-sm-10">
                <select  onchange="get_cat_child_id(this.value)" name="subcat_id" id="subcat_id" class="form-control">
                <option value="">Select Sub Category</option>
                   <?php 
                  foreach ($sub_cat_data as $value) {?>
                    <option value="<?php echo $value->id;?>"<?php if(in_array($value->id,$sub_cat_array)){ echo 'selected="selected"';}?> ><?php echo @$value->sub_category_name;?></option>
                   <?php } ?>
                 </select>
                </div>
                </div>-->
                
                <!--<div class="form-group" id="load_div2">
                <label class="col-sm-2 control-label" for="input-subtract">Sub Child Category</label>
                <div class="col-sm-10">
                <select  name="sub_cat_child_id" id="sub_cat_child_ids" class="form-control">
                <option value="">Select Sub Child Category</option>
                   <?php 
                  foreach ($sub_child_cat_data as $value) {?>
                    <option value="<?php echo $value->id;?>"<?php if(in_array($value->id,$sub_chid_cat_array)){ echo 'selected="selected"';}?> ><?php echo @$value->sub_child_category_name;?></option>
                   <?php } ?>
                 </select>
                </div>
                </div>-->
                
               <!--<div class="form-group" id="onchange_div">
                <label class="col-sm-2 control-label" for="input-subtract">Sub Category</label>
                <div class="col-sm-10">
                <select  id="sub_cat_id" onchange="get_cat_child_id(this.value)" name="subcat_id" id="input-store" class="form-control">
                 </select>
                </div>
                </div>-->
                
               <!--<div class="form-group" id="onchange_div2">
                <label class="col-sm-2 control-label" for="input-subtract">Sub Child Category</label>
                <div class="col-sm-10">
                <select  id="sub_cat_child_id" name="sub_cat_child_id"  class="form-control">
                 </select>
                </div>
                </div>--> 
                
                <div class="form-group">
                <label class="col-sm-2 control-label" for="input-subtract">Brand<span style="color:red">*</span></label>
                <div class="col-sm-10">
                <select required=""  name="industry_type" id="industry_type" class="form-control">
                <option value="Select Brand">Select Brand</option>
                   <?php 

                   foreach ($industrytype as $value) {?>
                    <!--<option value="<?php echo $value->id;?>" ><?php echo @$value->industrytype_title;?></option>-->
                     <option value="<?php echo $value->id;?>"<?php if(in_array($value->id,$industrytype_array)){ echo 'selected="selected"';}?> ><?php echo $value->industrytype_title;?></option>
                    
                   <?php } ?>
                 </select>

                </div>
				</div>
                
            <!--<div class="form-group">
                <label class="col-sm-2 control-label" for="input-subtract">Select Store</label>
                <div class="col-sm-10">
                <select name="store" id="input-status" class="form-control">
                  <option value="">--Select store--</option>
                 <option value="Jamai Raja" selected="selected">Fruite</option>
                 
              </select>
                </div>
                </div>--> 
        </div>
							<?php
                               if(@$single_pro_data->id){
                                                  $result_attr=Get_attribute_details(@$single_pro_data->id);
                                                $j=1; 
                                                $str='';
                                                $ar=array();
                                                //print_r($result_attr);
                                                foreach ($result_attr as $att_val) {
                                                   //$str .=$i.',';
                                                  array_push($ar, $j);
                                                   $j++;} }
                                                  ?>
							<div class="tab-pane" id="Poduct-attribute">
							<div class="table-responsive">
							<div id ="thead_data">
							<table id="category_view" class="table table-bordered table-striped">
                                        <thead>
                                        </thead>
                                        <tbody>
                                          <tr><td>
                                            <!--<a style="width:30px; float: left" onclick="set_tr_edit()" href="#" class=" icon-plus icon-2x margin-top-8">Add(+)</a>-->
                                          <table class="table table-bordered table-striped">
                              <thead style="background-color: antiquewhite;border: 1px solid;">
                                
                                <tr>
                                          <!--   <th>Sr.no</th> -->
                                         <?php
                                          @$result_attr=Get_attribute_details(@$single_pro_data->id);
                                          foreach ($result_attr as $att_val) {

                                              $color=$att_val->color;
                                              $size=$att_val->size;
                                              $storage=$att_val->storage;
                                              $memory=$att_val->memory;
                                              $style=$att_val->style;
                                              $style_extra1=$att_val->style_extra1;
                                              $style_extra2=$att_val->style_extra2;
                                              $style_extra3=$att_val->style_extra3;
                                              $stock=$att_val->stock;
                                              $qty=$att_val->qty;
                                              $price=$att_val->price_mrp;
                                              $weight=$att_val->weight;
											  }
                                           
                                          ?>
                                            <th>Barcode</th>
                                            <th>Itemcode</th>
                                            <?php if(@$color!==NULL){?>
                                             <th >Color</th>
                                            <?php }?>
                                            <?php if(@$size!==NULL){?>
                                             <th >Size</th>
                                            <?php }?>
                                            <?php if(@$storage!==NULL){?>
                                             <th >Storage</th>
                                            <?php }?>
                                            <?php if(@$memory!==NULL){?>
                                             <th >Memory</th>
                                            <?php }?>
                                           <?php if(@$style!==NULL){?>
                                             <th >Style</th>
                                            <?php }?>

                                            <?php if(@$style_extra1!==NULL){?>
                                             <th >Extra1</th>
                                            <?php }?>
                                            <?php if(@$style_extra2!==NULL){?>
                                             <th >Extra2</th>
                                            <?php }?>
                                            <?php if(@$style_extra3!==NULL){?>
                                            <th>Extra3</th>
                                            <?php }?>
                                             <?php if(@$stock!==NULL){?>
                                            <th>Stock</th>
                                            <?php }?>
                                             <?php if(@$qty!==NULL){?>
                                            <th>Qty</th>
                                            <?php }?>
                                          <?php if(@$price!==NULL){?>
                                            <th>Price</th>
                                            <?php }?>
                                            <?php if(@$weight!==NULL){?>
                                            <th>Weight</th>
                                            <?php }?>
                                             <th>Attribute Images</th>

                                           </tr>
                                           <?php if(@$single_pro_data->id==''){?>
                                         <?php }?>
                                              </thead>
                                              <tbody id="AudioWrapperedit5">
                                                <?php
                                                if(@$single_pro_data->id){
                                                  $result_attr=Get_attribute_details(@$single_pro_data->id);
                                                $i=0; 
                                                $str='';
                                                //print_r($result_attr);
                                                foreach ($result_attr as $att_val) {
                                                   $str .=$i.',';
                                                   
                                                  ?>
                              <tr>
                               <input type="hidden" name="attr_id[]" value="<?php echo @$att_val->id; ?>">    
                              <td>
                              <input  readonly value="<?php echo @$att_val->barcode; ?>"   type="text" name="barcode[]"><br><span id="dup_error_0"></span></td>
                               <td><input readonly value="<?php echo @$att_val->itemcode; ?>" style="width: 100px;" type="text" name="itemcode[]"></td>
                              <?php if(@$color!==NULL){?> 
                              <td><input value="<?php echo @$att_val->color; ?>"style="width: 70px;" type="text" name="color[]"></td>
                               <?php }?>
                               <?php if(@$size!==NULL){?>
                               <td><input value="<?php echo @$att_val->size; ?>"style="width: 70px" type="text" name="size[]"></td>
                               <?php }?>
                               
                               <?php if(@$storage!==NULL){?>
                               <td><input value="<?php echo @$att_val->storage; ?>"style="width: 70px" type="text" name="storage[]"></td>
                               <?php }?>
                               <?php if(@$memory!==NULL){?>
                               <td><input value="<?php echo @$att_val->memory; ?>"style="width: 70px" type="text" name="memory[]"></td>
                               <?php }?>
                                <?php if(@$style!==NULL){?>
                               <td><input value="<?php echo @$att_val->style; ?>"style="width: 70px" type="text" name="style[]"></td>
                                <?php }?>
                                <?php if(@$style_extra1!==NULL){?>
                               <td>
                                 <input value="<?php echo @$att_val->style_extra1; ?>"style="width:80px" placeholder=""  type="text" name="style_extra1[]">
                                </td> <?php }?>
                                <?php if(@$style_extra2!==NULL){?>
                                                    <td><input value="<?php echo @$att_val->style_extra2; ?>"style="width:80px" placeholder="" type="text" name="style_extra2[]">
                                                   </td>
                                                   <?php }?>
                                                    <?php if(@$style_extra3!==NULL){?>
                                                   <td>
                                                    <input value="<?php echo @$att_val->style_extra3; ?>"style="width:80px" placeholder="" type="text" name="style_extra3[]">
                                                   </td>  
                                         <?php }?>
                                <?php if(@$stock!==NULL){?> 
                               <td><input value="<?php echo @$att_val->stock; ?>"style="width: 70px" type="text" name="stock[]"></td><?php }?>
                               <?php if(@$qty!==NULL){?>
                               <td><input value="<?php echo @$att_val->qty; ?>"style="width: 70px" type="text" name="qty[]"></td><?php }?>
                               <?php if(@$price!==NULL){?>
                               <td>
                                                   <table>
                                                    <tr>
                                                    <td><input value="<?php echo @$att_val->price_mrp; ?>" onclick="get_margin(<?php echo @$i;?>)" onkeyup="get_margin(<?php echo @$i;?>)" style="width:80px" placeholder="MRP"  type="text" id="mrp_price_<?php echo @$i;?>" name="price_<?php echo @$i;?>[]"></td>
                                                    <td>
                                                     <input onkeyup="get_margin(<?php echo @$i;?>)" value="<?php echo @$att_val->sp_price; ?>" id="margin_price_<?php echo @$i;?>"  style="width:80px" placeholder="Margin%" type="text" name="price_<?php echo @$i;?>[]">
                                                     </td>
                                                   <td> <input value="<?php echo @$att_val->margin_price; ?>"  style="width:80px" placeholder="SP" type="text" id="sp_price_<?php echo @$i;?>" name="price_<?php echo @$i;?>[]"></td> 
                                 </tr>
                                 </table>
                               </td>
                            <?php }?>
                             <?php if(@$weight!==NULL){?>
                               <td><input value="<?php echo @$att_val->weight; ?>"style="width: 70px" type="text" name="weight[]"></td>
                               <?php }?>
                              <td>
                                  <table>
                                         <tr>
                                                <?php
                                                 $result_attr_image=Get_attribute_image_details(@$att_val->id);
                                                 foreach ($result_attr_image as  $val_img) {
                                                  ?>
                                                <td><img style="width:20px;" src="<?php echo base_url();?>upload/product_images/<?php echo @$val_img->image;?>"></td>     
                                                <td>
                                                <input value="<?php echo @$att_val->barcode; ?>"id="audio4"  class="boxdd" onchange="loadFile1(event)"   type="file" name="photo_<?php echo @$i;?>[]" placeholder="">
                                                <input type="hidden" name="imageid_<?php echo @$i;?>[]" value="<?php echo @$val_img->id;?>">
                                               </td>

                                                <?php }?>
                                              </tr>
                                             </table>

                                             </td>
                                               
                            </td>
                            <td> 
                             <a style="float:right;color:red" href="javascript:void(0)" onclick="remove_variant(<?php echo @$att_val->id; ?>,<?php echo $this->uri->segment(3); ?>)" class="removeclassAudio4 icon-minus dett_n alerts-color">X</a>
                           </td>
                      </tr>
                  <?php $i++;}}?>
                                      
                  </tbody>
                  </table>
                </td></tr>
               </tbody>
              </table>
 </div>
</div>

<div class="form-group">
               <!--  <label class="col-sm-2 control-label" for="input-subtract">Select Attribute</label> -->
                <div class="col-sm-10">
                <ul class="checkbox-grid" id="attr_data">
                
    
                </ul>
                </div>
                </div>
</div>      

 
</td>
</tr>
</tbody>
</table>
</div>    
<?php if($this->uri->segment(3)){?> 
<div class="form-group col-md-2 pull-right">
                    <button type="submit" id="submit" class="btn btn-success btn-block">Update</button>
                </div>

<?php } else{?>
        <div class="form-group col-md-2 pull-right">
                    <button type="submit" id="submit" class="btn btn-success btn-block">Save</button>
                </div>
              <?php }?>
            </form>
        </div>
    </div>

</div>
<script type="text/javascript">

function remove_variant(attr_id,pid){
    
    if(attr_id!=''){
       var attid=attr_id;
       $.ajax({
            url:"<?php echo base_url();?>"+'Productmaster/delete_variant',
            type:"POST",
            data:{attid:attid},
            success:function(res){
                  
                 window.location.href="<?php echo base_url();?>"+'Productmaster/addpromaster/'+pid;
            }


       })

    }
 
}

function gen_item_code(cnt){
       var item_code=Math.floor(100000 + Math.random() * 900000);
       $("#itemcode_"+cnt).val(item_code); 

}
function check_duplicate(cnt,barcode){
        var bcode=barcode;
        var item_code=Math.floor(100000 + Math.random() * 900000);
 // alert(item_code);
      // $("#itemcode_"+cnt).val(item_code);

       $("#dup_error_"+cnt).html('');
        $.ajax({
          url:"<?php echo base_url();?>"+'Productmaster/chek_duplicate',
          type:'POST',
          data:{bar_code:bcode},
          success:function(result){
             //alert(result);
             if(result>=1){
              $("#dup_error_"+cnt).html('<p style="color:red">Barcode duplicate! </p>');
             }

            if(result==0){
               $("#dup_error_"+cnt).html('');
             }
             if(result=='bk'){
               $("#dup_error_"+cnt).html('');
             }
          }
      })
   var inps = document.getElementsByName('barcode[]');
          for (var i = 0; i <inps.length; i++) {
               var inp=inps[i];
               var inp2=inps[i+1];
              if(inp.value!='' && inp2.value!=''){   
              if(inp.value==inp2.value){
                //alert("Barcode duplicate");
                $("#dup_error_"+i).html('<p style="color:red">Barcode duplicate');
                return false;
                } 
                else{
                  $("#dup_error_"+i).html('');
                }
              }
              //alert("pname["+i+"].value="+inp.value);
          }


       
     }
 function check_item_duplicate1(cnt,itemcode){
  var item_code=Math.floor(100000 + Math.random() * 900000);
 // alert(item_code);
  $("#itemcode_"+cnt).val(item_code);



 }

 function check_item_duplicate_old(cnt,itemcode){
       

       var itemcode=itemcode;
       $("#item_dup_error_"+cnt).html('');
        $.ajax({
          url:"<?php echo base_url();?>"+'Productmaster/chek_item_duplicate',
          type:'POST',
          data:{itemcode:itemcode},
          success:function(result){
             //alert(result);
             if(result>=1){
              $("#item_dup_error_"+cnt).html('<p style="color:red">Item code duplicate! </p>');
             }

            if(result==0){
               $("#item_dup_error_"+cnt).html('');
             }
             if(result=='bk'){
               $("#item_dup_error_"+cnt).html('');
             }
          }
      })
      var inps = document.getElementsByName('itemcode[]');
          for (var i = 0; i <inps.length; i++) {
              var inp=inps[i];
               var inp2=inps[i+1];
              if(inp.value){   
              if(inp.value==inp2.value){
                //alert("Barcode duplicate");
                $("#item_dup_error_"+i).html('<p style="color:red">Item code duplicate');
                return false;
                } 
                else{
                  $("#item_dup_error_"+i).html('');
                }
              }
              //alert("pname["+i+"].value="+inp.value);
          }

       
     }
  function get_margin(cnt){
      //alert(cnt);
     var mrp=$("#mrp_price_"+cnt).val();
     var margin_price=$("#margin_price_"+cnt).val();
     if(margin_price && mrp){
     // alert("gkhgk");
       // var profit=sp-mrp;
        var marginp= mrp*margin_price;
        var sp_val=marginp/100;
        var sp_price=mrp-sp_val;
       // alert(sp_price);
       var margin_per_sp=sp_price.toFixed();
        //alert(margin_per_sp);
       $("#sp_price_"+cnt).val(margin_per_sp);
      }else{
         $("#sp_price_"+cnt).val('');
      }
     //alert();
  }
</script>
            <script>
                    var loadFile1 = function(event) {
                      var reader = new FileReader();
                      reader.onload = function(){
                        var output1 = document.getElementById('output11');

                        output.src = reader.result;
                        
                      };
                      reader.readAsDataURL(event.target.files[0]);
                    };
                    var loadFile2 = function(event) {
                      var reader = new FileReader();
                      reader.onload = function(){
                        var output = document.getElementById('output2');
                        output.src = reader.result;
                        alert(reader.result);
                      };
                      reader.readAsDataURL(event.target.files[0]);
                    };
                    var loadFile3 = function(event) {
                      var reader = new FileReader();
                      reader.onload = function(){
                        var output = document.getElementById('output3');
                        output.src = reader.result;
                      };
                      reader.readAsDataURL(event.target.files[0]);
                    };
                    var loadFile4 = function(event) {
                      var reader = new FileReader();
                      reader.onload = function(){
                        var output = document.getElementById('output4');
                        output.src = reader.result;
                      };
                      reader.readAsDataURL(event.target.files[0]);
                    };
                    var loadFile5 = function(event) {
                      var reader = new FileReader();
                      reader.onload = function(){
                        var output = document.getElementById('output5');
                        output.src = reader.result;
                      };
                      reader.readAsDataURL(event.target.files[0]);
                    };

          </script>
        <script src="<?php echo base_url(); ?>assets/js/tinymce/js/tinymce/jquery.tinymce.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/tinymce/js/tinymce/tinymce.min.js"></script>
        <script type="text/javascript">
        $(document).ready(function(){
            tinyMCE.triggerSave();
            tinymce.init({
                selector: '.tincyeditor',
                height: 150,
                menubar: false,
                plugins: [
                  'advlist autolink lists link image charmap print preview anchor textcolor',
                  'searchreplace visualblocks code fullscreen',
                  'insertdatetime media table paste code help wordcount'
                ],
                toolbar1: "bold italic underline | alignleft aligncenter alignright alignjustify | styleselect | fontselect | fontsizeselect",
                toolbar2: "cut copy | bullist numlist | outdent indent blockquote | undo redo | link unlink anchor image media code | insertdatetime | table ",
                content_css: [
                  '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
                  '//www.tiny.cloud/css/codepen.min.css'
                ]
          });
        });
        </script>
        <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.15.1/jquery.validate.min.js"></script>
<script>
$(function() {
     $('#validate').validate({
       ignore: [],
        errorPlacement: function() {},
       submitHandler: function (form) {
       $('#submit').attr('disabled','disabled');
        form.submit();

       },
        invalidHandler: function() {
            setTimeout(function() {
                $('.nav-tabs a small.required').remove();
                var validatePane = $('.tab-content.tab-validate .tab-pane:has(input.error)').each(function() {
                    var id = $(this).attr('id');
                    $('.nav-tabs').find('a[href^="#' + id + '"]').append(' <small class="required">***</small>');
                });
                var validatePane = $('.tab-content.tab-validate .tab-pane:has(select.error)').each(function() {
                    var id = $(this).attr('id');
                    $('.nav-tabs').find('a[href^="#' + id + '"]').append(' <small class="required">***</small>');
                });
            });            
        },
        rules: {
            product_name: 'required',
            email: {
                required: true,
                email: true
            },  

   brand_name: 'required',
            //sku: 'required',
            //upc: 'required',
            //ean: 'required',
            //jan: 'required',
            //isbn: 'required',
            //mpn: 'required',
            //location: 'required',
            //mrp_price: 'required',
            //purchase_price: 'required',
           // sale_price: 'required',
            //margin_price: 'required',
            //tax_class_id: 'required',
            //stock_status_id: 'required',
            
            //length: 'required',
            //width: 'required',
            //height: 'required',
            //length_class_id: 'required',
           // weight: 'required',
           // weight_class_id: 'required',
            //status: 'required',
            //product_tag: 'required',
            //photo: 'required',
            //sort_order: 'required',
           // store: 'required',
           // related_product: 'required',
           // product_attribute: 'required',
        }
    });
    
});
</script>

<!-- Bootstrap 3.3.6 -->
        <script src="<?php echo base_url() . "assets" ?>/bootstrap/js/bootstrap.min.js"></script>
        <!-- DataTables -->
        <script src="<?php echo base_url() . "assets" ?>/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="<?php echo base_url() . "assets" ?>/plugins/datatables/dataTables.bootstrap.min.js"></script>
        <!-- SlimScroll -->
        <script src="<?php echo base_url() . "assets" ?>/plugins/slimScroll/jquery.slimscroll.min.js"></script>
        <!-- FastClick -->
        <script src="<?php echo base_url() . "assets" ?>/plugins/fastclick/fastclick.js"></script>
        <!-- AdminLTE App -->
        <script src="<?php echo base_url() . "assets" ?>/dist/js/app.min.js"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="<?php echo base_url() . "assets" ?>/dist/js/demo.js"></script>
        <?php ?>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</div>
 <script type="text/javascript">
$(document).ready(function () {
   var MaxInputsAudio = 15; //maximum input boxes allowed

    var InputsWrapper = $("#AudioWrapper4 input"); //Input boxes wrapper ID

    var AddButton = "#AddMoreAudio4"; //Add button ID

    var x = InputsWrapper.length; //initlal text box count

    var FieldCount = 1; //to keep track of text box added

     var cntt=2;

    $(AddButton).click(function (e) //on add input button click
     {

        e.preventDefault();

        InputsWrapper = $("#AudioWrapper4 input");

        x = InputsWrapper.length;

        console.log(x + '  ' + MaxInputsAudio);

        if (x < MaxInputsAudio) //max input box allowed
         {

            FieldCount++; //text box added increment
            
            //add input box

            $(InputsWrapper).parents('#AudioWrapper4').append('<div class="AudioRemove4"><input id="audio4" onchange="loadFile'+cntt+'(event)" class="boxdd" type="file" name="photo[]"/><div style="float:right"><a href="#" class="removeclassAudio4 icon-minus dett_n alerts-color">delete</a></div><div class="col-md-9"><img width="30%" style="float:right" id="output'+cntt+'"/></div>');

            x++; //text box increment
           cntt++;
        }

        return false;

    });



    $("body").on("click", ".removeclassAudio4", function (e) { //user click on remove text
            
       console.log(x);

        if (x > 1) {

            $(this).parents('.AudioRemove4').remove(); //remove text box
            cntt--
            x--; //decrement textbox

        }

        return false;

    })



});
$(document).ready(function () {

   var MaxInputsAudio = 80; //maximum input boxes allowed

    var InputsWrapper = $("#AudioWrapper5 input"); //Input boxes wrapper ID

    var AddButton = "#AddMoreAudio5"; //Add button ID

    var x = InputsWrapper.length; //initlal text box count

    var FieldCount = 1; //to keep track of text box added

     var cnt=1;

    $(AddButton).click(function (e) //on add input button click
     {
        e.preventDefault();
        
        InputsWrapper = $("#AudioWrapper5 input");

        x = InputsWrapper.length;
      
        console.log(x + '  ' + MaxInputsAudio);

        if (x < MaxInputsAudio) //max input box allowed
           {
            // $.ajax({
            //         url:"",
            //         type:"POST",
            //         data:{cat_id:5},

            // })
            FieldCount++; //text box added increment
            //add input box
           $(InputsWrapper).parents('#AudioWrapper5').append('<tr class="AudioRemove4"><td><input style="width: 100%" type="text" onclick="check_duplicate('+cnt+',this.value)" onkeyup="check_duplicate('+cnt+',this.value)" name="barcode[]"><br><span id="dup_error_'+cnt+'"></span></td> <td><input style="width: 100%" type="text" onclick="check_item_duplicate('+cnt+',this.value)" onkeyup="check_item_duplicate('+cnt+',this.value)" name="itemcode[]"><span id="item_dup_error_'+cnt+'"></span></td><td><input style="width: 100%" type="text" name="color[]"></td><td><input style="width: 100%" type="text" name="size[]"></td><td><input style="width: 100%" type="text" name="storage[]"></td><td><input style="width: 100%" type="text" name="memory[]"></td><td><input style="width: 100%" type="text" name="style[]"></td><td><input style="width:100%" placeholder="" type="text" name="style_extra1[]"></td><td><input style="width:80px" placeholder="" type="text" name="style_extra2[]"></td><td><input style="width:100%" placeholder="" type="text" name="style_extra3[]"></td><td><input style="width: 100%" type="text" name="stock[]"></td><td><input style="width: 100%" type="text" name="qty[]"></td><td><table><tbody><tr><td><input style="width:100px" placeholder="MRP" id="mrp_price_'+cnt+'" type="text" onclick="get_margin(0)" onkeyup="get_margin('+cnt+')" name="price_'+cnt+'[]"></td><td><input id="sp_price_'+cnt+'" onclick="get_margin('+cnt+')" onkeyup="get_margin('+cnt+')" style="width:80px" placeholder="SP" type="text" name="price_'+cnt+'[]"></td><td><input id="margin_price_'+cnt+'" style="width:100%" placeholder="Margin%" type="text" name="price_'+cnt+'[]"></td></tr></tbody></table></td><td><table><tr><td><input id="audio4"  class="boxdd" onchange="loadFile1(event)" type="file" name="photo_'+cnt+'[]" placeholder=""></td><td><input id="audio4"  class="boxdd" onchange="loadFile1(event)" type="file" name="photo_'+cnt+'[]" placeholder=""></td><td><input id="audio4"  class="boxdd" onchange="loadFile1(event)" type="file" name="photo_'+cnt+'[]" placeholder=""></td><td><input id="audio4"  class="boxdd" onchange="loadFile1(event)" type="file" name="photo_'+cnt+'[]" placeholder=""></td></tr></table><a style="float:right;color:red" href="#" class="removeclassAudio4 icon-minus dett_n alerts-color">X</a></td></tr><br>');

            x++; //text box increment
           cnt++;
        }

        return false;

    });



    $("body").on("click", ".removeclassAudio4", function (e) { //user click on remove text
            
       console.log(x);

        if (x > 1) {

            $(this).parents('.AudioRemove4').remove(); //remove text box
            cnt--;
            x--; //decrement textbox

        }

        return false;

    })



});
</script>
<style type="text/css">
  .table-bordered>tbody>tr>td, .table-bordered>tbody>tr>th, .table-bordered>tfoot>tr>td, .table-bordered>tfoot>tr>th, .table-bordered>thead>tr>td, .table-bordered>thead>tr>th{
        border: 2px solid #ddd;
            padding: 0px!important;
            text-align: center;
            color: #337ab7!important;
  }
 select.error{
  border-color:#f00 !important;
 }  
</style>


<script type="text/javascript">
  var cntt=0;
 function set_tr(){
     
     //e.preventDefault();
         var catid=$("#cat_id").val();
         //alert(cat_id);
        
        //console.log(cntt);
        InputsWrapper = $("#AudioWrapper5 input");
        //alert("sdfdf");
        x = InputsWrapper.length;
         
        //console.log(x + '  ' + MaxInputsAudio);

        //if (x < MaxInputsAudio) //max input box allowed
          // {
          $.ajax({
            url:"<?php echo base_url();?>"+'Productmaster/get_attr_by_javascript',
            type:'POST',
            data:{cat_id:catid},
            success:function(results){
            var json_obj = JSON.parse(results);
            var len = json_obj.length;
           //$("#add_more").append(results);
            //alert(json_obj);
            var html='<tr class="AudioRemove4">';

            for(var i=0; i<len; i++){
                var attribute_names = json_obj[i].attribute_name;
                var attribute_name = attribute_names.toLowerCase();
                if(attribute_name=='price'){
                   html +='<td><table><tbody><tr><td><input style="width:80px" placeholder="MRP" id="mrp_price_'+cntt+'" type="text" onclick="get_margin('+cntt+')" onkeyup="get_margin('+cntt+')" name="price_'+cntt+'[]"></td><td><input onkeyup="get_margin('+cntt+')"  id="margin_price_'+cntt+'" style="width:80px" placeholder="Margin%" type="text" name="price_'+cntt+'[]"></td><td><input id="sp_price_'+cntt+'" style="width:80px" placeholder="SP" type="text" name="price_'+cntt+'[]"></td></tr></tbody></table></td>';
                   }
                 if(attribute_name=='image'){
                   html +='<td><table><tr><td><input id="audio4"  class="boxdd" onchange="loadFile1(event)"   type="file" name="photo_'+cntt+'[]" placeholder=""></td><td><input id="audio4"  class="boxdd" onchange="loadFile1(event)"   type="file" name="photo_'+cntt+'[]" placeholder=""></td><td><input id="audio4"  class="boxdd" onchange="loadFile1(event)"   type="file" name="photo_'+cntt+'[]" placeholder=""><td></td><td><input id="audio4"  class="boxdd" onchange="loadFile1(event)"   type="file" name="photo_'+cntt+'[]" placeholder=""></td></tr></table></td>';
                       }
                   if(attribute_name!='image' && attribute_name!='price'){
                      if(attribute_name=='barcode'){
                   html +='<td><input style="width:140px;" type="text" onclick="check_duplicate('+cntt+',this.value)" onkeyup="check_duplicate('+cntt+',this.value)" onfocusout="gen_item_code('+cntt+')" name="'+attribute_name+'[]"><br><span id="dup_error_'+cntt+'"></span></td>';
                      }
                    if(attribute_name=='itemcode'){
                   html +='<td><input style="width:100px;" type="text" onclick="check_item_duplicate('+cntt+',this.value)" onkeyup="check_item_duplicate('+cntt+',this.value)" readonly id="itemcode_'+cntt+'" name="'+attribute_name+'[]"><br><span id="item_dup_error_'+cntt+'"></span></td>';
                      }
                    if(attribute_name!='itemcode' && attribute_name!='barcode'){ 
                     html +='<td><input  style="width:100px;"type="text" name="'+attribute_name+'[]"><br><span id="item_dup_error_'+cntt+'"></span></td>'; 
                       }
                    }
                 
               }
            html +='<td><a style="float:right;color:red" href="#" class="removeclassAudio4 icon-minus dett_n alerts-color">X</a></td></tr>';
            $(InputsWrapper).parents('#AudioWrapper5').append(html);
           // alert(html);
            
            }
         
            })
           // FieldCount++; //text box added increment
            //add input box
           cntt++;

            //x++; //text box increment
          // 

            return false;
        }
 $("body").on("click", ".removeclassAudio4", function (e) { //user click on remove text
            
       console.log(x);

        // if (x > 1) {

            $(this).parents('.AudioRemove4').remove(); //remove text box
            cntt--;
            //x--; //decrement textbox

        // }

        return false;

    })
    
</script>
<script type="text/javascript">
  //var cntt=0;
 function set_tr_edit(cntts){
    // alert(cntt);
     //e.preventDefault();
         var catid=$("#cat_id").val();
         //alert(cat_id);
        
        //console.log(cntt);
        InputsWrapper = $("#AudioWrapperedit5 input");
        //alert("sdfdf");
        x = InputsWrapper.length;
         
        //console.log(x + '  ' + MaxInputsAudio);

        //if (x < MaxInputsAudio) //max input box allowed
          // {
          $.ajax({
            url:"<?php echo base_url();?>"+'Productmaster/get_attr_by_javascript',
            type:'POST',
            data:{cat_id:catid},
            success:function(results){
            var json_obj = JSON.parse(results);
            var len = json_obj.length;
           //$("#add_more").append(results);
            //alert(json_obj);
            var html='<tr class="AudioRemove4">';

            for(var i=0; i<len; i++){
                var attribute_names = json_obj[i].attribute_name;
                var attribute_name = attribute_names.toLowerCase();
                if(attribute_name=='price'){
                   html +='<td><table><tbody><tr><td><input style="width:80px" placeholder="MRP" id="mrp_price_'+cntts+'" type="text" onclick="get_margin('+cntts+')" onkeyup="get_margin('+cntts+')" name="edit_price[]"></td><td><input onkeyup="get_margin('+cntts+')"  id="margin_price_'+cntts+'" style="width:80px" placeholder="Margin%" type="text" name="edit_price[]"></td><td><input id="sp_price_'+cntts+'" style="width:80px" placeholder="SP" type="text" name="edit_price[]"></td></tr></tbody></table></td>';
                   }
                 if(attribute_name=='image'){
                   html +='<td><table><tr><td><input id="audio4"  class="boxdd" onchange="loadFile1(event)"   type="file" style="margin-left: 20px;" name="photo_'+cntts+'[]" placeholder=""></td><td><input id="audio4" style="margin-left: 20px;"  class="boxdd" onchange="loadFile1(event)"   type="file" name="photo_'+cntts+'[]" placeholder=""></td><td><input id="audio4"  class="boxdd" onchange="loadFile1(event)"  style="margin-left: 20px;"  type="file" name="photo_'+cntts+'[]" placeholder=""><td></td><td><input id="audio4"  style="margin-left: 20px;" class="boxdd" onchange="loadFile1(event)"   type="file" name="photo_'+cntts+'[]" placeholder=""></td></tr></table></td>';
                       }
                   if(attribute_name!='image' && attribute_name!='price'){
                      if(attribute_name=='barcode'){
                   html +='<td><input type="hidden" name="insertbarcode[]" value="'+cntts+'"><input type="text" onclick="check_duplicate('+cntts+',this.value)" onfocusout="gen_item_code('+cntts+')" onkeyup="check_duplicate('+cntts+',this.value)" name="edit_'+attribute_name+'[]"><br><span id="dup_error_'+cntts+'"></span></td>';
                      }
                    if(attribute_name=='itemcode'){
                    html +='<td><input style="width:100px;" type="text" onclick="check_item_duplicate('+cntts+',this.value)" onkeyup="check_item_duplicate('+cntts+',this.value)" readonly id="itemcode_'+cntts+'" name="edit_'+attribute_name+'[]"><br><span id="item_dup_error_'+cntts+'"></span></td>';
                      }

                    if(attribute_name=='weight'){
                     html +='<td><input  style="width:70px;"type="text" name="edit_'+attribute_name+'[]"></td>'; 
                      }
                    if(attribute_name!='itemcode' && attribute_name!='barcode'&& attribute_name!='weight'){ 
                     html +='<td><input  style="width:70px;"type="text" name="'+attribute_name+'[]"><br><span id="item_dup_error_'+cntts+'"></span></td>'; 
                       }
                    }
                 
               }
            html +='<td><a style="float:right;color:red" href="#" class="removeclassAudio4 icon-minus dett_n alerts-color">X</a></td></tr>';
            $(InputsWrapper).parents('#AudioWrapperedit5').append(html);
           // alert(html);
            
            }
         
            })
           // FieldCount++; //text box added increment
            //add input box
           cntt++;

            //x++; //text box increment
          // 

            return false;
        }
 $("body").on("click", ".removeclassAudio4", function (e) { //user click on remove text
            
       console.log(x);

        // if (x > 1) {

            $(this).parents('.AudioRemove4').remove(); //remove text box
            cntt--;
            //x--; //decrement textbox

        // }

        return false;

    })
    
</script>
<style type="text/css">
  .table-bordered>tbody>tr>td, .table-bordered>tbody>tr>th, .table-bordered>tfoot>tr>td, .table-bordered>tfoot>tr>th, .table-bordered>thead>tr>td, .table-bordered>thead>tr>th{
        border: 2px solid #ddd;
            padding: 0px!important;
            text-align: center;
            color: #337ab7!important;
  }
 select.error{
  border-color:#f00 !important;
 }  
</style>

                <script>
                    var loadFile1 = function(event) {
                      var reader = new FileReader();
                      reader.onload = function(){
                        var output = document.getElementById('output1');
                        output.src = reader.result;
                      };
                      reader.readAsDataURL(event.target.files[0]);
                    };
              </script>