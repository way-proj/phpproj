	
<!-- Page content -->
<div class="page-content">
	<!-- Page header -->
	<div class="page-header">
		<div class="page-title">
			<h3>Update Banner<small></small></h3>
		</div>
		<div id="reportrange" class="range">
		</div>
	</div>
	<!-- /page header -->

	<!-- Alerts -->
	<?php if($this->session->flashdata('error')){ ?>
    <div class="alert alert-danger fade in block-inner">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <i class="icon-cancel-circle"></i> <?php echo $this->session->flashdata('error'); ?>
    </div>
    <?php }?>
    
    <?php if($this->session->flashdata('success')){ ?>
    <div class="alert alert-success fade in block-inner">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <i class="icon-checkmark-circle"></i> <?php echo $this->session->flashdata('success'); ?>
    </div>
    <?php }?>
    <!-- /alerts -->
			
<!-- Right labels -->
<form role="form" class="form-horizontal" action="<?php echo site_url('edit-banner/'.$row['id']); ?>" autocomplete="off" method="post" enctype="multipart/form-data">
    <div class="panel panel-default">
        <div class="panel-heading"><h6 class="panel-title"><i class="icon-paragraph-right2"></i>Update Banner</h6> <i class="error">[* Fields are mandatory]</i></div>
        
        <div class="panel-body">
        	<div class="form-group">
	            <label class="col-sm-2 control-label text-right">Heading<span class="error"></span>:</label>
	            <div class="col-sm-6">
	             <input class="form-control" value="<?php echo $row['heading'];?>" type="text" name="heading" id="heading" placeholder="Banner Heading" maxlength="100">
	            </div>
	        </div>
	        
	        <div class="form-group">
	            <label class="col-sm-2 control-label text-right">Subheading<span class="error"></span>:</label>
	            <div class="col-sm-6">
	             <input class="form-control" value="<?php echo $row['subheading'];?>" type="text" name="subheading" id="subheading" placeholder="Banner Subheading" maxlength="100">
	            </div>
	        </div>
	        				        
	        <div class="form-group">
	            <label class="col-sm-2 control-label text-right">URL<span class="error"></span>:</label>
	            <div class="col-sm-6">
	             <input class="form-control" value="<?php echo $row['url'];?>" type="text" name="url" id="url" placeholder="Shop Now Button Url">
	            </div>
	        </div>
	        
	        <div class="form-group">
	            <label class="col-sm-2 control-label text-right">Image<span class="error">*</span>:</label>
	            <div class="col-sm-6">
	             <input class="form-control" type="file" name="ffile" id="ffile">
				 <span class="error">File should be jpg | jpeg | png and size 2 MB only and Dimension should be 1400x600</span>
	            </div>
	            <div class="col-sm-4">
	            <a href="<?php echo base_url().$row['dpath'];?>" target="_blank"><img width="200" height="200" src="<?php echo base_url().$row['dpath'];?>"/></a>
	            </div>
	        </div>
	        
	        <div class="form-group">
	            <label class="col-sm-2 control-label text-right">Banner Position<span class="error">*</span>:</label>
	            <div class="col-sm-6">
	             <input class="form-control" value="<?php echo $row['position'];?>" type="text" name="position" id="position" placeholder="Enter Banner Position">
	            </div>
	        </div>
	     		              
            <div class="form-actions text-left">
            	<input type="submit" id="submit" name="submit" value="Update" class="btn btn-xs btn-success">   
            	<a href="<?php echo site_url('banner-list');?>" class="btn btn-xs btn-danger">Cancel</a>                         	
            </div>
            
            <div class="form-actions text-left" id="msg"></div>
	    </div>
	    
	</div>
</form>
<!-- /right labels -->
   	