<?php
defined('BASEPATH') OR exit('No direct script access allowed');

 class Fscontroller extends MX_Controller {
	
	function __construct(){
        parent::__construct(); 
		$this->load->model('Fscontroller_model'); 
    }	
	
	public function index(){
		//$data['callrow'] = $this->Fscontroller_model->getSignleRow('fp_callus',array('id'=>'1'));
		
		$data['catrows'] = $this->Fscontroller_model->getRows('tbl_category_link',array('type'=>'category'));
		
		//$data['helprows'] = $this->Fscontroller_model->getRows('fp_category_link',array('type'=>'help'));
		
		$data['socialrows'] = $this->Fscontroller_model->getRows('tbl_category_link',array('type'=>'social'));
		
		//$data['contactrows'] = $this->Fscontroller_model->getRows('fp_category_link',array('type'=>'contact'));
		
		$data['subview']="add";
        $this->load->view('layout/default',$data);
	}
	
	/* public function setcall(){
		extract($_POST);
		if($submit=='Update' || empty($call1) || empty($call2) || empty($call3)){
			$arr = array('res'=>false,'msg'=>'Please provide call numbers.');
			echo json_encode($arr); exit;
			
		}else{
			$dataArr = array('call1'=>$call1,'call2'=>$call2,'call3'=>$call3,'create_by'=>$this->session->userdata('user')['id'],'create_dt_tm'=>date('Y-m-d H:i:s'));
			$this->db->where('id','1');
			$this->db->update('fp_callus',$dataArr);
			
			$arr = array('res'=>true,'msg'=>'Calls number has been updated.');
			echo json_encode($arr); exit;
		}	
		
	} */
	
	public function setcategory(){
		extract($_POST);
		if($submit=='Update' || empty($cat) || empty($val)){
			$arr = array('res'=>false,'msg'=>'Please provide category details');
			echo json_encode($arr); exit;
			
		}else{
			$this->Fscontroller_model->deleteRows('tbl_category_link',array('type'=>'category'));
			for($i=0;$i<count($cat);$i++){
				if(!empty($cat[$i]) && !empty($val[$i])){
					$dataArr = array('cat_name'=>$cat[$i],'cat_link'=>$val[$i],'type'=>'category','create_by'=>$this->session->userdata('user')['id'],'create_dt_tm'=>date('Y-m-d H:i:s'));
					$this->db->insert('tbl_category_link',$dataArr);
				}
			}
			$arr = array('res'=>true,'msg'=>'Category link has been updated.');
			echo json_encode($arr); exit;
		}	
		
	}
	
	public function sethelp(){
		extract($_POST);
		if($submit=='Update' || empty($hcat) || empty($hval)){
			$arr = array('res'=>false,'msg'=>'Please provide help link');
			echo json_encode($arr); exit;
			
		}else{
			$this->Fscontroller_model->deleteRows('tbl_category_link',array('type'=>'help'));
			for($i=0;$i<count($hcat);$i++){
				if(!empty($hcat[$i]) && !empty($hval[$i])){
					$dataArr = array('cat_name'=>$hcat[$i],'cat_link'=>$hval[$i],'type'=>'help','create_by'=>$this->session->userdata('user')['id'],'create_dt_tm'=>date('Y-m-d H:i:s'));
					$this->db->insert('tbl_category_link',$dataArr);
				}
			}
			$arr = array('res'=>true,'msg'=>'Help link has been updated.');
			echo json_encode($arr); exit;
		}	
		
	}
	
	
	public function setsocial(){
		extract($_POST); 
		if($submit=='Update' || empty($scat) || empty($sval)){
			$arr = array('res'=>false,'msg'=>'Please provide social link');
			echo json_encode($arr); exit;
			
		}else{
			$this->Fscontroller_model->deleteRows('tbl_category_link',array('type'=>'social'));
			for($i=0;$i<count($scat);$i++){
				if(!empty($scat[$i]) && !empty($sval[$i])){
					$dataArr = array('cat_name'=>$scat[$i],'cat_link'=>$sval[$i],'type'=>'social','create_by'=>$this->session->userdata('user')['id'],'create_dt_tm'=>date('Y-m-d H:i:s'));
					$this->db->insert('tbl_category_link',$dataArr);
				}
			}
			$arr = array('res'=>true,'msg'=>'Social link has been updated.');
			echo json_encode($arr); exit;
		}	
		
	}
	
	public function setcontact(){
		extract($_POST);
		if($submit=='Update' || empty($con)){
			$arr = array('res'=>false,'msg'=>'Please provide social link');
			echo json_encode($arr); exit;
			
		}else{
			$this->Fscontroller_model->deleteRows('tbl_category_link',array('type'=>'contact'));
			for($i=0;$i<count($con);$i++){
				if(!empty($con[$i])){
					$dataArr = array('cat_name'=>$con[$i],'type'=>'contact','create_by'=>$this->session->userdata('user')['id'],'create_dt_tm'=>date('Y-m-d H:i:s'));
					$this->db->insert('tbl_category_link',$dataArr);
				}
			}
			$arr = array('res'=>true,'msg'=>'Contact details has been updated.');
			echo json_encode($arr); exit;
		}	
		
	}
			
}

