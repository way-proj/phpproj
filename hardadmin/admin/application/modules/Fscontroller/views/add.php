              <div class="content-wrapper">
                <div class="container-fluid">
                <h2>Add Footer Link</h2>
                
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li><a class="active" href="<?php echo base_url()?>Service/service_list">brand</a></li>
                        
                    <div class="pull-right">
                    <a href="<?php echo base_url();?>/Service/service_list" data-toggle="tooltip" title="" class="btn btn-default" data-original-title="Cancel"><i class="fa fa-reply"></i></a></div>
                </ol>
                
                </div>
                
                <!-- Main content -->
                <section class="content">
                <div class="row">
              
                       
             <div class="col-md-12">

                  <?php
                //print_r($_SESSION);
                  if(@$_SESSION['error_msg']){?>
                    <div class="alert alert-danger alert-dismissible"><i class="fa fa-exclamation-circle"></i> <?php echo $_SESSION['error_msg'];
                      unset($_SESSION['error_msg']);
                    ?>
        <button type="button" class="close" data-dismiss="alert">×</button>
      </div>
		<?php }?>
                 
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
	
        <div style="display: none" id="glob_msg" class="alert alert-block alert-error">
             <a class="close" data-dismiss="alert" href="#">X</a>
             <div class="text-center"> 
                <h4 class="alert-heading">Error!</h4>
                <?php //echo $this->session->flashdata('error'); ?>
             </div>
        </div>
              <!-- Custom Tabs -->
              <div class="nav-tabs-custom">
               
                <div class="tab-content">
                <div class="tab-pane active" id="tab_1">
                  <div class="panel panel-default">
                <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-pencil"></i> Add Service</h3>
                 </div>
                <div class="panel-body">
             
<!-- Right labels -->
<form id="category" role="form" class="form-horizontal" action="#" autocomplete="off" method="post" onsubmit="return false;">
    <div class="panel panel-default">
        <div class="panel-heading"><h6 class="panel-title"><i class="icon-paragraph-right2"></i>Add Category Link</h6> <i class="error">[* Fields are mandatory]</i></div>
        <div class="panel-body">
        	<div class="form-group">
	            <label class="col-sm-2 control-label text-right"><span class="error"></span></label>
	            <div class="col-sm-10">
	             <table class="table table-bordered">
	             	<input type="hidden" id="c" value="<?php if(count($catrows)>0){ echo count($catrows); }else{ echo "1";}?>">
	             	<thead>
	             		<tr>
	             			<th width="25%">Link</th>
	             			<th width="55%">Value</th>
	             			<th width='5%'></th>
	             		</tr>
	             	</thead>
	             	<tbody id="atb">
	             		<?php if(count($catrows)>0){ $i=1; foreach($catrows as $key=>$val){ ?>
	             		<tr id="a<?php echo $i;?>">
	             			<td><input type="text" name="cat[]" class="form-control" value="<?php echo $val['cat_name']; ?>"></td>
	             			<td><input type="text" name="val[]" class="form-control"  value="<?php echo $val['cat_link']; ?>"></td>
	             			<td><?php if($i>1){ ?><button class='btn btn-xs btn-danger' type='button' onclick='delFrow(<?php echo $i;?>)'><i class='icon-remove'></i></button><?php } ?></td>
	             		</tr>
	             		<?php $i++; } }else{ ?>
	             		<tr id="a1">
	             			<td><input type="text" name="cat[]" class="form-control" placeholder="TV & Video"></td>
	             			<td><input type="text" name="val[]" class="form-control" placeholder="wayinfotechsolutions.com/tv-video/xfjei29fdyy"></td>
	             			<td></td>
	             		</tr>
	             		<?php } ?>
	             	</tbody>
	             	<tfoot>
	             		<tr>
	             			<td colspan="3" align="right">
	             				<button type="button" id="addinfo">Add more</button>
	             			</td>
	             		</tr>
	             	</tfoot>  
	              </table>
	            </div>
	        </div>
	                   
            <div class="form-actions text-left">
            	<input type="submit" id="submit2" name="submit" value="Update" class="btn btn-xs btn-success">
            </div>
            
            <div class="form-actions text-left" id="msg2"></div>
	    </div>
	</div>
</form>
<!-- /right labels -->


<!-- Right labels -->
<form id="social" role="form" class="form-horizontal" action="#" autocomplete="off" method="post" onsubmit="return false;">
    <div class="panel panel-default">
        <div class="panel-heading"><h6 class="panel-title"><i class="icon-paragraph-right2"></i>Add Social Link</h6> <i class="error">[* Fields are mandatory]</i></div>
        <div class="panel-body">
        	<div class="form-group">
	            <label class="col-sm-2 control-label text-right"><span class="error"></span></label>
	            <div class="col-sm-10">
	             <table class="table table-bordered">
	             	<input type="hidden" id="s" value="<?php if(count($socialrows)>0){ echo count($socialrows); }else{ echo "1";}?>">
	             	<thead>
	             		<tr>
	             			<th width="25%">Link</th>
	             			<th width="55%">Value</th>
	             			<th width='5%'></th>
	             		</tr>
	             	</thead>
	             	<tbody id="satb">
	             		<?php if(count($socialrows)>0){ $i=1; foreach($socialrows as $key=>$val){ ?>
	             		<tr id="sa<?php echo $i;?>">
	             			<td><input type="text" name="scat[]" class="form-control" value="<?php echo $val['cat_name'];?>"></td>
	             			<td><input type="text" name="sval[]" class="form-control" value="<?php echo $val['cat_link'];?>"></td>
	             			<td><?php if($i>1){ ?><button class='btn btn-xs btn-danger' type='button' onclick='delsFrow(<?php echo $i; ?>)'><i class='icon-remove'></i></button><?php }?></td>	
	             		</tr>
	             		<?php $i++; } }else{ ?>
	             		<tr id="sa1">
	             			<td><input type="text" name="scat[]" class="form-control" placeholder="Facebook"></td>
	             			<td><input type="text" name="sval[]" class="form-control" placeholder=" https://www.facebook.com/wayinfotechsolutions/"></td>
	             			<td></td>	
	             		</tr>
	             		<?php } ?>
	             	</tbody>
	             	<tfoot>
	             		<tr>
	             			<td colspan="3" align="right">
	             				<button type="button" id="saddinfo">Add more</button>
	             			</td>
	             		</tr>
	             	</tfoot>  
	              </table>
	            </div>
	        </div>
	                   
            <div class="form-actions text-left">
            	<input type="submit" id="submit4" name="submit" value="Update" class="btn btn-xs btn-success">
            </div>
            
            <div class="form-actions text-left" id="msg4"></div>
	    </div>
	</div>
</form>
<!-- /right labels -->

</div>
</div>  


              <script>
                    var loadFile = function(event) {
                      var reader = new FileReader();
                      reader.onload = function(){
                        var output = document.getElementById('output');
                        output.src = reader.result;
                      };
                      reader.readAsDataURL(event.target.files[0]);
                    };
          </script>
       <script>
                    var loadFile = function(event) {
                      var reader = new FileReader();
                      reader.onload = function(){
                        var output = document.getElementById('output');
                        output.src = reader.result;
                      };
                      reader.readAsDataURL(event.target.files[0]);
                    };
          </script>
       
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
		
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

	
		
<script>
$("#addinfo").on('click',(function(e){
var c = (parseInt($("#c").val())+1);
var x = "<tr id='a"+c+"'><td><input type='text' name='cat[]' class='form-control'></td><td><input type='text' name='val[]' class='form-control'></td><td><button class='btn btn-xs btn-danger' type='button' onclick='delFrow("+c+")'><i class='icon-remove'></i></button></td></tr>";
$("#atb").append(x);
$("#c").val(c);									   
}));

function delFrow(id){
$('#a'+id).remove();
}

$("#haddinfo").on('click',(function(e){
var h = (parseInt($("#h").val())+1);
var hx = "<tr id='ha"+h+"'><td><input type='text' name='hcat[]' class='form-control'></td><td><input type='text' name='hval[]' class='form-control'></td><td><button class='btn btn-xs btn-danger' type='button' onclick='delhFrow("+h+")'><i class='icon-remove'></i></button></td></tr>";
$("#hatb").append(hx);
$("#h").val(h);									   
}));

function delhFrow(id){
$('#ha'+id).remove();
}

$("#saddinfo").on('click',(function(e){
var s = (parseInt($("#s").val())+1);
var sx = "<tr id='sa"+s+"'><td><input type='text' name='scat[]' class='form-control'></td><td><input type='text' name='sval[]' class='form-control'></td><td><button class='btn btn-xs btn-danger' type='button' onclick='delsFrow("+s+")'><i class='icon-remove'></i></button></td></tr>";
$("#satb").append(sx);
$("#s").val(s);									   
}));

function delsFrow(id){
$('#sa'+id).remove();
}

$("#taddinfo").on('click',(function(e){
var t = (parseInt($("#t").val())+1);
var tx = "<tr id='ta"+t+"'><td><input type='text' name='con[]' class='form-control'></td><td><button class='btn btn-xs btn-danger' type='button' onclick='deltFrow("+t+")'><i class='icon-remove'></i></button></td></tr>";
$("#tatb").append(tx);
$("#t").val(t);									   
}));

function deltFrow(id){
$('#ta'+id).remove();
}
/* 
$("#call").on('submit',(function(e){
	$("#msg1").html('Please wait...'); 
	$("#submit1").attr("disabled",true);
	$.ajax({
		type: 'POST',
        url: base_url+'call',
        data: $("#call").serializeArray(),
        dataType: 'json',
		success:function(data, textStatus, jqXHR){ 
		   $("#msg1").html(''); 
		    $("#submit1").attr("disabled",false);
		    if(data.res==true){
			  $('#msg1').html("<span class='success'>"+data.msg+"</span>");
			}else{
			   $('#msg1').html("<span class='error'>"+data.msg+"</span>");
			}
		},
		error: function(jqXHR, textStatus, errorThrown){
			$("#submit1").attr("disabled",false);
			$("#msg1").html('Something went wrong!');      
		}
	}); 
}));

$("#category").on('submit',(function(e){
	$("#msg2").html('Please wait...'); 
	$("#submit2").attr("disabled",true);
	$.ajax({
		type: 'POST',
        url: base_url+'category',
        data: $("#category").serializeArray(),
        dataType: 'json',
		success:function(data, textStatus, jqXHR){ 
		   $("#msg2").html(''); 
		    $("#submit2").attr("disabled",false);
		    if(data.res==true){
			  $('#msg2').html("<span class='success'>"+data.msg+"</span>");
			}else{
			   $('#msg2').html("<span class='error'>"+data.msg+"</span>");
			}
		},
		error: function(jqXHR, textStatus, errorThrown){
			$("#submit2").attr("disabled",false);
			$("#msg2").html('Something went wrong!');      
		}
	});
}));

$("#help").on('submit',(function(e){
	$("#msg3").html('Please wait...'); 
	$("#submit3").attr("disabled",true);
	$.ajax({
		type: 'POST',
        url: base_url+'help',
        data: $("#help").serializeArray(),
        dataType: 'json',
		success:function(data, textStatus, jqXHR){ 
		   $("#msg3").html(''); 
		    $("#submit3").attr("disabled",false);
		    if(data.res==true){
			  $('#msg3').html("<span class='success'>"+data.msg+"</span>");
			}else{
			   $('#msg3').html("<span class='error'>"+data.msg+"</span>");
			}
		},
		error: function(jqXHR, textStatus, errorThrown){
			$("#submit3").attr("disabled",false);
			$("#msg3").html('Something went wrong!');      
		}
	});
}));
 */
$("#social").on('submit',(function(e){
	$("#msg4").html('Please wait...'); 
	$("#submit4").attr("disabled",true);
	$.ajax({
		type: 'POST',
        url: base_url+'social',
        data: $("#social").serializeArray(),
        dataType: 'json',
		success:function(data, textStatus, jqXHR){ 
		   $("#msg4").html(''); 
		    $("#submit4").attr("disabled",false);
		    if(data.res==true){
			  $('#msg4').html("<span class='success'>"+data.msg+"</span>");
			}else{
			   $('#msg4').html("<span class='error'>"+data.msg+"</span>");
			}
		},
		error: function(jqXHR, textStatus, errorThrown){
			$("#submit4").attr("disabled",false);
			$("#msg4").html('Something went wrong!');      
		}
	});
}));

$("#contact").on('submit',(function(e){
	$("#msg5").html('Please wait...'); 
	$("#submit5").attr("disabled",true);
	$.ajax({
		type: 'POST',
        url: base_url+'contact',
        data: $("#contact").serializeArray(),
        dataType: 'json',
		success:function(data, textStatus, jqXHR){ 
		   $("#msg5").html(''); 
		    $("#submit5").attr("disabled",false);
		    if(data.res==true){
			  $('#msg5').html("<span class='success'>"+data.msg+"</span>");
			}else{
			   $('#msg5').html("<span class='error'>"+data.msg+"</span>");
			}
		},
		error: function(jqXHR, textStatus, errorThrown){
			$("#submit5").attr("disabled",false);
			$("#msg5").html('Something went wrong!');      
		}
	});
}));
</script>
   			
		
 
 <script src="<?php echo base_url(); ?>assets/js/tinymce/js/tinymce/jquery.tinymce.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/tinymce/js/tinymce/tinymce.min.js"></script>
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
        <?php ?>
        
        


        
        