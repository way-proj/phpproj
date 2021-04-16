<div class="content-wrapper">


               <div class="content-header">
                <div class="container-fluid">
                 
                <h4><strong><?php //echo getParentChildCatgeory($parent_id);?>Services</strong></h4>


                <ol class="breadcrumb">
                    <li><a href="<?php echo base_url()?>"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li><?php //echo displaystreamlink($parent_id);?>Services</li>
                        
                       <div class="pull-right"><a href="<?php echo base_url()?>Services/add_manage_services" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="Add New"><i class="fa fa-plus"></i></a> <a href="#" data-toggle="tooltip" title="" class="btn btn-default" data-original-title="Rebuild"><i class="fa fa-refresh"></i></a>
                <!--<button type="button" data-toggle="tooltip" title="" class="btn btn-danger" onclick="confirm('Are you sure?') ? $('#form-category').submit() : false;" data-original-title="Delete"><i class="fa fa-trash-o"></i></button>-->
					<button type="button" data-toggle="tooltip" title="" class="btn btn-danger delete_all"  data-original-title="Delete" data-url="<?php echo base_url();?>/Services/deleteAll"><i class="fa fa-trash-o"></i></button>
                </div>
                </ol>
                </div>
                </div>
                <?php //$this->load->view('include/alert-box'); 
                if(@$_SESSION['success']){?>
                    <div id="suc_msg" class="alert alert-success alert-dismissible"><i class="fa fa-check-circle"></i>
                    <a class="close" data-dismiss="alert" href="#">X</a>
                     <?php echo $_SESSION['success'];
                    unset($_SESSION['success']);?>
                   </div>
                <?php }?>
                
                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="box">
                                <!-- /.box-header -->
                                <div class="box-body">

                                    <table id="service_view" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                            <?php
                                            //$b=getParentChildCatgeory($parent_id);
                                            ?>
                                         
                                            <!--<th><?php //echo $b;?></th>-->
                                            <th width="50px"><input type="checkbox" id="master"></th>
											<th>Service Title</th>
											<th>Service Description</th>
											<th>Service Image</th>
											<th>Status</th>
                                            <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                         //print_r($cat_data);
                                        $i=1;
                                        
                                        foreach ($manage_services as $row) {
                                                  ?>
                                        <tr>
                                        <td><input type="checkbox" class="sub_chk" data-id="<?php echo $row->id; ?>"></td>
                                        <td><?php echo $row->service_title;?></td>
    									<td><?php echo $row->service_desc;?></td>
										
										  <td><?php 
									   if(!empty($row->image_url	)){
										   ?>
											 <img src="<?php echo base_url().'upload/service_image/'.$row->image_url	?> " width="50">
										   <?php
									   }else{
										   ?>
										
										<?php
									   }
									   ?>
									   </td>
									   							
								<td>
                                <?php

                                if($row->status==1){
                                ?>
                                <?php echo "Active"; ?>
                                <?php
                                 }else{
                                ?>
                                <?php echo "InActive"; ?>
                                <?php
                                }
                                ?>
								</td>
								
                                <td>
                              
							   <a  style="padding-left: 2em;" href="<?php echo site_url();?>Services/add_manage_services/<?php echo @$row->id;?>"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
													
							<!-- Delete section-->
							  <a  style="padding-left: 2em;" onclick="deletes('tbl_services','id','<?php echo $row->id; ?>','manage_services')"><span class="glyphicon glyphicon glyphicon-trash" aria-hidden="true"></span></a>								
                                <!-- delete section-->                 
                                            </td>
                                           </tr>
                                          <?php    }?>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.box-body -->
                            </div>
                            <!-- /.box -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </section>
                <!-- /.content -->
            </div>

         <script src="<?php echo base_url() . "assets" ?>/plugins/jQuery/jquery-2.2.3.min.js"></script>
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
         <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <!-- page script -->
        <script>
            $(function () {
                $("#category_view").DataTable({
                    "order": [[1, "desc"]]
                })
            });

         function view(id)
            {
                if (id)
                {
                    //alert("dfggf");
                    var url = "<?php echo base_url('Portfolio/view_portfolio'); ?>";
                    $.ajax({
                        url: url,
                        data: {'id': id},
                        type: "POST",
                        success: function (response)
                        {
                            $('#show_view_page').modal();
                            $('#view_page').html(response);
                        }
                    });
                }
                else
                {
                      swal ( "Oops" ,  "Page id not found!" ,  "error" );
                      return false;
                }
            }
            
          
			
			function deletes(table, field, delete_id, section)
            {
               
                    swal({
                         title: "Are you sure?",
                         text: "Do you really want to delete this record?",
                         icon: "warning",
                         buttons: true,
                         dangerMode: true,
                       })
                       .then((willDelete) => {
                         if (willDelete) {
                              swal("Your record has been deleted successfully!", {
                              icon: "success",
                           });
                          window.location.href ='<?php echo base_url();?>/Portfolio/deletes/' + table + '/' + field + '/' + delete_id + '/' + section;
                         } else {
                             return false;
                         }
                       });
                
            }
        </script>
    </body>
</html>
<!-- Start add Category-->
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">                      
    <div class="modal fade" id="show_add_page"  tabindex="-1" role="dialog" aria-labelledby="myModalLarge">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <center><h4 class="modal-title" id="myModalLarge">Add Category</h4></center>
                </div>
                <div class="modal-body" id="add_page">


                </div>                                                        
            </div>
        </div>
    </div>
</div>
<!-- End Add Category-->

<!-- Start Div Portfolio/ Category-->
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">                      
    <div class="modal fade" id="show_edit_page"  tabindex="-1" role="dialog" aria-labelledby="myModalLarge">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <center><h4 class="modal-title" id="myModalLarge">Edit Category</h4></center>
                </div>
                <div class="modal-body" id="edit_page">


                </div>                                                        
            </div>
        </div>
    </div>
</div>
<!-- Edit Div Blog Category-->

<!-- Start Div Blog Category-->
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">                      
    <div class="modal fade" id="show_view_page"  tabindex="-1" role="dialog" aria-labelledby="myModalLarge">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <center><h4  style="color:green"class="modal-title" id="myModalLarge">Portfolio Details</h4></center>
                </div>
                <div class="modal-body" id="view_page">


                </div>                                                        
            </div>
        </div>
    </div>
</div>


<script type="text/javascript">
    $(document).ready(function () {
 
        $('#master').on('click', function(e) {
         if($(this).is(':checked',true))  
         {
            $(".sub_chk").prop('checked', true);  
         } else {  
            $(".sub_chk").prop('checked',false);  
         }  
        });
 
        $('.delete_all').on('click', function(e) {
 
            var allVals = [];  
            $(".sub_chk:checked").each(function() {  
                allVals.push($(this).attr('data-id'));
            });  
 
            if(allVals.length <=0)  
            {  
                alert("Please select row.");  
            }  else {  
 
                var check = confirm("Are you sure you want to delete this row?"); 
				
                if(check == true){  
 
                    var join_selected_values = allVals.join(","); 
 
                    $.ajax({
                        url: $(this).data('url'),
                        type: 'POST',
                        data: 'ids='+join_selected_values,
                        success: function (data) {
                          console.log(data);
                          $(".sub_chk:checked").each(function() {  
                              $(this).parents("tr").remove();
                          });
                         // alert("Records Deleted successfully.");
                        },
                        error: function (data) {
                            //alert(data.responseText);
						$(".msg_del").html(data.responseText);
                        }
                    });
 
                  $.each(allVals, function( index, value ) {
                      $('table tr').filter("[data-row-id='" + value + "']").remove();
                  });
                }  
            }  
        });
    });
</script>