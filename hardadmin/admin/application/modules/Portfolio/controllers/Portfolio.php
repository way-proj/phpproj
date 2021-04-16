<?php
ob_start();
defined('BASEPATH') OR exit('No direct script access allowed');

class Portfolio extends MX_Controller {

  function __construct(){
    parent::__construct();
    
     
    $this->load->library('session');
    $this->load->helper(array('form', 'url','new'));
    $this->load->model('../../Common/Crud_model');
    $this->load->model('Portfolio_model');
    $this->load->library('form_validation');

  }
	  public function index(){
		

	  }
	   
	public function save_portfolio_data(){

    $portfolio_title=$this->input->post("portfolio_title");
   // $slug=$this->get_url_title($title);
	$portfolio_id=$this->input->post("portfolio_id");
    $parent_id=$this->input->post("parent_id");
    
		$this->load->library('upload');
		$uploadStatus="";
		$file_upload_name="";
			if(isset($_FILES['portfolio_image']) && $_FILES['portfolio_image']['name'] != '')
				{
				    $config=array();
				    $config['upload_path'] = getcwd().'/upload/portfolio_image/';
					$config['allowed_types'] = 'jpg|png|jpeg|gif|webp';
          
					$this->upload->initialize($config);	
				
					if($this->upload->do_upload('portfolio_image'))
					{
						$upload_data = $this->upload->data();
						$file_upload_name = $upload_data['file_name'];
			
					}else{
						$uploadStatus = $this->upload->display_errors('<br /><span class="error">', '</span>');
          
            $this->form_validation->set_rules('portfolio_image', 'portfolio image','required',array('required'=>$uploadStatus));
          
			}
				}
				elseif($this->input->post('old_image') != '')
				{
					$file_upload_name = $this->input->post('old_image');
				}
				
			//porfolio logo	
			$file_upload_name1="";
			if(isset($_FILES['portfolio_logo']) && $_FILES['portfolio_logo']['name'] != '')
				{
				    $config=array();
				    $config['upload_path'] = getcwd().'/upload/portfolio_image/';
				$config['allowed_types'] = 'jpg|png|jpeg|gif|webp';
          
					$this->upload->initialize($config);	
				
					if($this->upload->do_upload('portfolio_logo'))
					{
						$upload_data = $this->upload->data();
						$file_upload_name1 = $upload_data['file_name'];
			
					}else{
						$uploadStatus = $this->upload->display_errors('<br /><span class="error">', '</span>');
          
					$this->form_validation->set_rules('portfolio_logo', 'portfolio logo','required',array('required'=>$uploadStatus));
          
						}
					}
					elseif($this->input->post('old_logo') != '')
					{
						$file_upload_name1 = $this->input->post('old_logo');
					}
				
			//porfolio logo		
       
			if(!empty($portfolio_id)){
		 
			$update_data=array(
			 'portfolio_title'=>$portfolio_title,
			 'portfolio_image'=>$file_upload_name,
			 'portfolio_logo'=>$file_upload_name1,
			 'parent_id'=>$parent_id,
			 'portfolio_desc'=>$this->input->post("description"),
			 'url'=>$this->input->post("url"),
			 'status'=>$this->input->post("status"),
			 'meta_title'=> $this->input->post("meta_title"),
			 'meta_description'=>$this->input->post("meta_description"),
			 'meta_keyword'=> $this->input->post("meta_keyword"),
			 'status'=> $this->input->post("status"),
			 'created_at'=>date('Y-m-d H:i:s')
			 ); 
			$this->db->where('id',$portfolio_id);
			$this->db->update('tbl_portfolio',$update_data);
    
			}else{
			$insert_data=array(
			 'portfolio_title'=>$portfolio_title,
			 'portfolio_image'=>$file_upload_name,
			 'portfolio_logo'=>$file_upload_name1,
			 'parent_id'=>$parent_id,
			 'portfolio_desc'=>$this->input->post("description"),
			 'url'=>$this->input->post("url"),
			 'status'=>$this->input->post("status"),
			 'meta_title'=> $this->input->post("meta_title"),
			 'meta_description'=>$this->input->post("meta_description"),
			 'meta_keyword'=> $this->input->post("meta_keyword"),
			 'status'=> $this->input->post("status"),
			 'created_at'=>date('Y-m-d H:i:s')
			 ); 
       $this->db->insert('tbl_portfolio',$insert_data);
 
     }
     //redirect(base_url().'Portfolio/manage_portfolios?parent_id='.$parent_id);
     redirect(base_url().'Portfolio/manage_portfolios');
 
	}

	
	public function manage_portfolios(){
		
	  $data['manage_portfolios']=$this->Portfolio_model->portfolio_list();
	  $data['subview']="manage_portfolios";
	  $this->load->view('layout/default',$data);
	}

	public function add_manage_portfolios(){
		$pid=$this->uri->segment(3);
		   if($pid){
			 $data['single_portfolio_data']=$this->Portfolio_model->single_portfolio_list($pid);
			 //print_r($data['single_portfolio_data']);die;
		   }
		   $data['subview']="add-portfolio";
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
				$this->db->delete('tbl_portfolio');
		 
				echo json_encode(['success'=>"Record Deleted successfully."]);
			}

}
