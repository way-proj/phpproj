<?php
ob_start();
defined('BASEPATH') OR exit('No direct script access allowed');

class Software extends MX_Controller {

  function __construct(){
    parent::__construct();
    
     
    $this->load->library('session');
    $this->load->helper(array('form', 'url','new'));
    $this->load->model('../../Common/Crud_model');
    $this->load->model('Software_model');
    $this->load->library('form_validation');

  }
	  public function index(){
		

	  }
	   
	public function save_software_data(){
			if($_POST){
		$software_title=$this->input->post("software_title");
		// $slug=$this->get_url_title($title);
		$software_id=$this->input->post("software_id");
		
		
		$this->load->library('upload');
		$uploadStatus="";
		$file_upload_name="";
			if(isset($_FILES['software_image']) && $_FILES['software_image']['name'] != '')
				{
				    $config=array();
				    $config['upload_path'] = getcwd().'/upload/software_image/';
					$config['allowed_types'] = 'jpg|png|jpeg|gif|webp';
          
					$this->upload->initialize($config);	
				
					if($this->upload->do_upload('software_image'))
					{
						$upload_data = $this->upload->data();
						$file_upload_name = $upload_data['file_name'];
			
					}else{
						$uploadStatus = $this->upload->display_errors('<br /><span class="error">', '</span>');
          
            $this->form_validation->set_rules('software_image', 'software image','required',array('required'=>$uploadStatus));
          
			}
				}
				elseif($this->input->post('old_image') != '')
				{
					$file_upload_name = $this->input->post('old_image');
				}
				
			//software logo	
			/* $file_upload_name1="";
			if(isset($_FILES['software_logo']) && $_FILES['software_logo']['name'] != '')
				{
				$config=array();
				$config['upload_path'] = getcwd().'/upload/software_image/';
				$config['allowed_types'] = 'jpg|png|jpeg|gif|webp';
          		$this->upload->initialize($config);	
				
					if($this->upload->do_upload('software_logo'))
					{
						$upload_data = $this->upload->data();
						$file_upload_name1 = $upload_data['file_name'];
			
					}else{
						$uploadStatus = $this->upload->display_errors('<br /><span class="error">', '</span>');
          
					$this->form_validation->set_rules('software_logo', 'software logo','required',array('required'=>$uploadStatus));
          
						}
					}
					elseif($this->input->post('old_logo') != '')
					{
						$file_upload_name1 = $this->input->post('old_logo');
					}
				 */
			//software logo		
       
			if(!empty($software_id)){
		 
			$update_data=array(
			 'software_title'=>$software_title,
			 'software_image'=>$file_upload_name,
			// 'software_logo'=>$file_upload_name1,
			// 'parent_id'=>$parent_id,
			 'software_desc'=>$this->input->post("description"),
			 'url'=>$this->input->post("url"),
			 'status'=>$this->input->post("status"),
			 'meta_title'=> $this->input->post("meta_title"),
			 'meta_description'=>$this->input->post("meta_description"),
			 'meta_keyword'=> $this->input->post("meta_keyword"),
			 'status'=> $this->input->post("status"),
			 'created_at'=>date('Y-m-d H:i:s')
			 ); 
			$this->db->where('id',$software_id);
			$this->db->update('tbl_software',$update_data);
			
			$this->Software_model->update_sofware_long_data($_POST,$software_id);
    
			}else{
			$insert_data=array(
			 'software_title'=>$software_title,
			 'software_image'=>$file_upload_name,
			 //'software_logo'=>$file_upload_name1,
			// 'parent_id'=>$parent_id,
			 'software_desc'=>$this->input->post("description"),
			 'url'=>$this->input->post("url"),
			 'status'=>$this->input->post("status"),
			 'meta_title'=> $this->input->post("meta_title"),
			 'meta_description'=>$this->input->post("meta_description"),
			 'meta_keyword'=> $this->input->post("meta_keyword"),
			 'status'=> $this->input->post("status"),
			 'created_at'=>date('Y-m-d H:i:s')
			 ); 
			$insert_id =$this->db->insert('tbl_software',$insert_data);
			$this->Software_model->save_software($_POST);
 			}
			redirect(base_url().'Software/manage_softwares');
		}
	}

	
	public function manage_softwares(){
		
	  $data['manage_softwares']=$this->Software_model->software_list();
	  $data['subview']="manage_softwares";
	  $this->load->view('layout/default',$data);
	}

	public function add_manage_softwares(){
		 $sid=$this->uri->segment(3);
		   if($sid){
			 $data['single_software_data']=$this->Software_model->single_software_list($sid);
			$data['long_desc_data']=$this->Software_model->Get_long_desc($sid);
		  }
		   
		  // if($software_id){
				//$data['long_desc_data']=$this->Software_model->Get_long_desc($sid);
         // }
		   $data['subview']="add-software";
		   $this->load->view('layout/default',$data); 
	}

	public function do_upload(){
		if($_FILES['file']['name']){
		$file_name =time().'_'.$_FILES['file']['name'];  
		$_FILES['userfile']['name']=time().'_'.$_FILES['file']['name'];
		$_FILES['userfile']['type']= $_FILES['file']['type'];
        $_FILES['userfile']['tmp_name']= $_FILES['file']['tmp_name'];
        $_FILES['userfile']['error']= $_FILES['file']['error'];
        $_FILES['userfile']['size']= $_FILES['file']['size'];
		$path=$this->config->item('base_Url').'/upload/portfolio_image/';
		$config1['upload_path']=$path;
		$config1['allowed_types']='jpg|png|gif';
		$config1['min_hieght']='10';
		$config1['min_width']='10';
		$this->load->library('upload',$config1);
		$this->upload->initialize($config1);
		$this->upload->do_upload('userfile');
		return $file_name;
		}
    
	} 


		public function do_upload_1(){
		  if($_FILES['file_1']['name']){
		  $file_name =time().'_'.$_FILES['file_1']['name'];  
			$_FILES['userfile']['name']=time().'_'.$_FILES['file_1']['name'];
			$_FILES['userfile']['type']= $_FILES['file_1']['type'];
			$_FILES['userfile']['tmp_name']= $_FILES['file_1']['tmp_name'];
			$_FILES['userfile']['error']= $_FILES['file_1']['error'];
			$_FILES['userfile']['size']= $_FILES['file_1']['size'];
			$path=$this->config->item('base_Url').'/upload/portfolio_image/';
			$config1['upload_path']=$path;
			$config1['allowed_types']='jpg|png|gif';
			$config1['min_hieght']='10';
			$config1['min_width']='10';
			$this->load->library('upload',$config1);
			$this->upload->initialize($config1);
			$this->upload->do_upload('userfile');
			return $file_name;
			}
			
		  }


		public function do_upload_image(){
		if($_FILES['update_photo_image']['name']){
		$file_name =time().'_'.$_FILES['update_photo_image']['name'];  
		$_FILES['userfile']['name']=time().'_'.$_FILES['update_photo_image']['name'];
		$_FILES['userfile']['type']= $_FILES['update_photo_image']['type'];
			$_FILES['userfile']['tmp_name']= $_FILES['update_photo_image']['tmp_name'];
			$_FILES['userfile']['error']= $_FILES['update_photo_image']['error'];
			$_FILES['userfile']['size']= $_FILES['update_photo_image']['size'];
		$path=$this->config->item('base_Url').'/upload/portfolio_image/';
		$config1['upload_path']=$path;
		$config1['allowed_types']='jpg|png|gif';
		$config1['min_hieght']='10';
		$config1['min_width']='10';
		$this->load->library('upload',$config1);
		$this->upload->initialize($config1);
		$this->upload->do_upload('userfile');
		return $file_name;
		}
		
	  }
    public function get_url_title($title_url)
		{	
		$final='';
		$title_url=html_entity_decode($title_url);
		$title_url=trim($title_url);
		$title_url=strtolower($title_url);
				
		$title_url = str_replace(" ", "_", $title_url);
		$title_url = str_replace("/", "-", $title_url);
				
		$strlen_title = strlen($title_url);
				
			for($i=0;$i<$strlen_title;$i++)
				{
				$data = substr($title_url,$i,1);
				
				if(preg_match ("/^([a-z]||[A-Z]||[0-9]||[\-\s]||[\_\s])+$/", $data ))
				{		
					$final.=$data ;
				}
			}
				$final = preg_replace( "{[ \t]+}", ' ', $final );
				$final = preg_replace('/\s\s+/', ' ', $final);
				$final = trim($final);
				$final = str_replace(" ", "-", $final);
				$final = preg_replace('/\-\-+/', '-', $final);
					//$message = preg_replace('/\s\s+/', ' ', $message);
					
				$final = $this->trim_text($final,10);
					
				//$output = str_replace(" ", "-", $total);
			return  $final;			
	  }
  
		public function trim_text($text, $count)
			{
				$trimed='';
				$ar_string = explode("-", $text);
				if(sizeof($ar_string) < $count)
				{
					$count=sizeof($ar_string);
				}
				for($wordCounter=0; $wordCounter < $count ; $wordCounter++ )
				{ 
					$trimed .= $ar_string[$wordCounter];
					if ( $wordCounter < $count-1 )
						{$trimed .= "-"; }
				}
				return $trimed;
			}
		  
		public function cat_update_do_upload(){
			
			$file_name =time().'_'.$_FILES['update_photo']['name']; 
			$_FILES['userfile']['name']=time().'_'.$_FILES['update_photo']['name'];
			$_FILES['userfile']['type']= $_FILES['update_photo']['type'];
				$_FILES['userfile']['tmp_name']= $_FILES['update_photo']['tmp_name'];
				$_FILES['userfile']['error']= $_FILES['update_photo']['error'];
				$_FILES['userfile']['size']= $_FILES['update_photo']['size'];
			$path=$this->config->item('base_Url').'upload/cat_images/';
			$config1['upload_path']=$path;
			$config1['allowed_types']='jpg|png|gif';
			$config1['min_hieght']='10';
			$config1['min_width']='10';
			$this->load->library('upload',$config1);
			$this->upload->initialize($config1);
			$this->upload->do_upload('userfile');
			return $file_name;
			}
 
		public function deletes($table, $field, $delete_id, $section){
			$section = @str_replace('_', '  ', $section);
			$result = $this->Portfolio_model->deletes($table, $field, $delete_id);
			if ($result):
				$_SESSION['success']='Record has been successfully deleted.';
			else:
				$_SESSION['success']='Error in delete record. Please try again.';
			endif;
			redirect($_SERVER["HTTP_REFERER"]);
		}   
		
		public function deleteAll()
			{
				$ids = $this->input->post('ids');
		 
				$this->db->where_in('id', explode(",", $ids));
				$this->db->delete('tbl_software');
		 
				echo json_encode(['success'=>"Record Deleted successfully."]);
			}

}
