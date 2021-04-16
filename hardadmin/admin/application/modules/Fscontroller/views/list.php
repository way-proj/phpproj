
	<!-- Page content -->
	 <div class="page-content">
		<!-- Page header -->
		<div class="page-header">
			<div class="page-title">
				<h3>Banner List<small></small></h3>
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

<div class="panel panel-default">
	<div class="panel-heading"><h6 class="panel-title"><i class="icon-table"></i> Banner List</h6></div>
    <div class="datatable">
     <form id="offdayform">
        <table class="table">
            <thead>
                <tr>
                    <th>S. No.</th>
                    <th>Heading</th>
                    <th>Subheading</th>
                    <th>URL</th>
                    <th>Banner Image</th>
                    <th>Position</th>
                    <th>Added Date</th>
                    <th>Modify Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            <?php $i=1; foreach($rows as $key=>$value){ ?>
                <tr id="id_<?php echo $value['id']; ?>">
                    <td><?php echo $i; ?></td>
                    <td><?php echo $value['heading']; ?></td>
                    <td width="20%"><?php echo $value['subheading']; ?></td>
                    <td><?php echo $value['url']; ?></td>
                    <td><a href="<?php echo base_url().$value['dpath'];?>" target="_blank"><img width="200" src="<?php echo base_url().$value['dpath'];?>"/></a></td>
                    <td><?php echo $value['position'];?></td>
                    <td><?php echo date('d-m-Y H:i:s',strtotime($value['create_dt_tm'])); ?></td>
                    <td><?php if($value['modify_dt_tm']!=NULL){ echo date('d-m-Y',strtotime($value['modify_dt_tm']));} ?></td>
                    <td width="12%">
                    <a href="<?php echo site_url('edit-banner/'.$value['id']);?>" class="btn btn-xs btn-icon btn-default" title="Edit"><i class="icon-pencil3"> </i></a>
                    
                    <a onclick="javascript:return confirm('Are you sure to remove it.')" href="<?php echo site_url('remove-banner/'.$value['id']);?>" class="btn btn-xs btn-icon btn-default" title="Remove"><i class="icon-remove2"> </i></a>
                    </td>
                </tr>
            <?php $i++; } ?>    
            </tbody>
         </table>
        </form>
    </div>
					             
</div>	
				    	