<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends MX_Controller {
		function __construct(){
		parent::__construct();
		$this->load->model('Shopping_model');
		$this->load->model('../../Common/Crud_model');
		$this->load->helper('crypto_helper');
		$this->load->library('session');
		$this->load->helper(array('form', 'url','new'));
		$this->load->library('form_validation');
		$this->load->library('cart');
	    }
		public function blog_page(){
          $data['subview']="blog";
          $this->load->view('layout/default',$data);
		} 
		
		public function signup(){

          $data['subview']="sign-up";
          $this->load->view('layout/default',$data);
		}
		
		public function signin(){

          $data['subview']="sign-in";
          $this->load->view('layout/default',$data);
		}  

		public function aboutUs()
        {
        $data['subview']="about-us";
        $this->load->view('layout/default', $data);
        }
	
	    public function privacyPolicy()
        {
        $data['subview']="privacy-policy";
        $this->load->view('layout/default', $data);
        }
	
	    public function portfolio()
        {
		$data['rows'] = $this->Shopping_model->portfolio_list();
	    $data['subview']="portfolio";
		$this->load->view('layout/default', $data);
        }
        
		public function getPorfolioDetails($id){
			$id=$this->uri->segment(2);	
			$data['row'] = $this->Shopping_model->getSignleRow('tbl_portfolio',array('id'=>$id));
			$data['subview']="portfoliodetail";
			$this->load->view('layout/default', $data);
			}
			
		public function software()
        {
		$data['srows'] = $this->Shopping_model->softwareData();	
        $data['subview']="software";
        $this->load->view('layout/default', $data);
        }
        
		public function getSoftwareDetails($id){
			$id=$this->uri->segment(2);	
			$data['sdetail'] = $this->Shopping_model->getSignleRow('tbl_software',array('id'=>$id));
			$data['slong_desc'] = $this->Shopping_model->get_softlong_desc($id);
			$data['srows'] = $this->Shopping_model->softwareData();
			$data['subview']="software-details";
			$this->load->view('layout/default', $data);
			}
			
	    public function appdevelopment()
        {
		$data = $formData = array(); 
         // If contact request is submitted
        if($this->input->post('querySubmit')){
                
            // Get the form data
            $formData = $this->input->post();
            // Form field validation rules
            $this->form_validation->set_rules('name', 'Name', 'required');
            $this->form_validation->set_rules('app_email', 'Email', 'required|valid_email');
            $this->form_validation->set_rules('services', 'Services', 'required');
            $this->form_validation->set_rules('description', 'Description', 'required');
            
            // Validate submitted form data
            if(@$this->form_validation->run() == true){
               
                // Define email data
                $getClientIP= (!empty($_SERVER['REMOTE_ADDR']))?$_SERVER['REMOTE_ADDR'] :((!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) ? $_SERVER['HTTP_X_FORWARDED_FOR']: @getenv('REMOTE_ADDR'));
	    	    if(isset($_SERVER['HTTP_CLIENT_IP']))
	            $getClientIP=$_SERVER['HTTP_CLIENT_IP'];
	            
                $emailData = array(
                   'name' => $this->input->post('name', true),
                   'form_type'=>'App Development',
                   'ip_address' => $getClientIP,
                   'email' => $this->input->post('app_email', true),
                   'services' => $this->input->post('services', true),
                   'message' => $this->input->post('description', true),
                   'created_date	' => date('Y-m-d H:i:s')
                );
                
                // Send an email to the site admin
               $insert_id=$this->Shopping_model->save_contact_data($emailData);
              
                 if($insert_id){
                   $send = $this->sendtoMail($emailData);
                }    
            }
        }
        
            // Pass POST data to view
        $data['postData'] = $formData;  	
			
        $data['subview']="appdevelopment";
        $this->load->view('layout/default', $data);
        }
		
		private function sendtoMail($emailData){
        // Load the email library
            $this->load->library('email');
        
            // Mail config
            //$to = 'projects@wayinfotechsolutions.com';
            $to = 'sales@wayinfotechsolutions.com,amrit@wayinfotechsolutions.com,digital@wayinfotechsolutions.com,ba@@wayinfotechsolutions.com';
            $from = 'Wayinfotech Solutions';
            $fromName = 'Wayinfotech Solutions';
            $mailSubject = 'Contact Request Submitted by '.$emailData['name'];
            
            // Mail content
            $mailContent = '
                <h2>Thank you for getting in touch! We appreciate you contacting us Wayinfotech Solutions. One of our team member will get back in touch with you soon! Have a great day!</h2>
                <p><b>Name: </b>'.@$emailData['name'].'</p>
                <p><b>Email: </b>'.@$emailData['email'].'</p>
                <p><b>Services: </b>'.@$emailData['services'].'</p>
                <p><b>description: </b>'.@$emailData['message'].'</p>
                 ';
                
            $config['mailtype'] = 'html';
            $this->email->initialize($config);
            $this->email->to($to);
            $this->email->from($from, $fromName);
            $this->email->subject($mailSubject);
            $this->email->message($mailContent);
            
            // Send email & return status
            //return $this->email->send()?true:false;
            
            if ($this->email->send() )
                {
                 redirect(base_url().'thank-you');
                exit;
                }
        }
        		
        public function contactUs()
        {
		$data['title'] = "Contact Us";
				
        $data['subview']="contact-us";
        $this->load->view('layout/default', $data);
        }
		
		public function save_contact()
		{
		
		 $data = $formData = array();    
         // If contact request is submitted
        if($this->input->post('contactSubmit')){
            
            // Get the form data
            $formData = $this->input->post();
            
            // Form field validation rules
            $this->form_validation->set_rules('name', 'Name', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
            $this->form_validation->set_rules('mobile', 'Contat Number', 'required');
            $this->form_validation->set_rules('details', 'details', 'required');
            $this->form_validation->set_rules('country', 'country name', 'required');
			$this->form_validation->set_rules('countryCode', 'country name', 'required');
                   
            // Validate submitted form data
            if(@$this->form_validation->run() == true){
                
                $getClientIP= (!empty($_SERVER['REMOTE_ADDR']))?$_SERVER['REMOTE_ADDR'] :((!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) ? $_SERVER['HTTP_X_FORWARDED_FOR']: @getenv('REMOTE_ADDR'));
	    	    if(isset($_SERVER['HTTP_CLIENT_IP']))
	            $getClientIP=$_SERVER['HTTP_CLIENT_IP'];	
	                
                // Define email data
                $mailData = array(
                   'name' => $this->input->post('name', true),
                   'email' => $this->input->post('email', true),
                   'phone' => $this->input->post('mobile', true),
                   'form_type' => "Contact Us form",
                   'ip_address' => $getClientIP,
                   'message' => $this->input->post('details', true),
			       'countryname' => $this->input->post('country', true),
                   'created_date	' => date('Y-m-d H:i:s')
                );
            
                
            // Send an email to the site admin
            $insert_id=$this->Shopping_model->save_contact_data($mailData);
              
             if($insert_id){
                $send = $this->sendtoMail($mailData);
                } 
                
                // Check email sending status
            }
        }
            // Pass POST data to view
            $data['postData'] = $formData;  
            $data['subview']="contact-us";
            $this->load->view('layout/default', $data);    
        }
		
    	private function sendEmail($mailData){
        // Load the email library
            $this->load->library('email');
           // Mail config
           // $to = 'projects@wayinfotechsolutions.com';
            $to = 'sales@wayinfotechsolutions.com,amrit@wayinfotechsolutions.com,digital@wayinfotechsolutions.com';
            $from = 'Wayinfotech Solutions';
            $fromName = 'Wayinfotech Solutions';
            $mailSubject = 'Contact Request Submitted by '.$mailData['name'];
            
            // Mail content
            $mailContent = '
                <h2>Thank you for getting in touch! We appreciate you contacting us Wayinfotech Solutions. One of our team member will get back in touch with you soon! Have a great day!</h2>
                <p><b>Name: </b>'.$mailData['name'].'</p>
                <p><b>Email: </b>'.$mailData['email'].'</p>
                <p><b>Phone: </b>'.$mailData['phone'].'</p>
                <p><b>Country: </b>'.$mailData['countryname'].'</p>
                <p><b>Message: </b>'.$mailData['message'].'</p>
            ';
                
            $config['mailtype'] = 'html';
            $this->email->initialize($config);
            $this->email->to($to);
            $this->email->from($from, $fromName);
            $this->email->subject($mailSubject);
            $this->email->message($mailContent);
            
            // Send email & return status
            //return $this->email->send()?true:false;
            
            if ($this->email->send() )
                {
                 redirect(base_url().'thank-you');
                exit;
                }
        }
	   	public function thankyou()
    	{
    	  $data['subview']="thank-you";
          $this->load->view('layout/default', $data);
    	}
		
		public function faq()
          {
          $data['category_data']=$this->Crud_model->getDirectQueryCommonData('SELECT id,category_name,image_url  FROM `category_details` ORDER BY `id` ASC');
          $data['subview']="faq";
          $this->load->view('layout/default', $data);
          }
    
	    public function products()
        {
			$cat_id=$this->uri->segment(2);
			if($cat_id)
			{
			$data['productData']=$this->Shopping_model->product_cat_data($cat_id);
			}
			$data['rows'] = $this->Shopping_model->productData();
			$data['rows_by_industry'] = $this->Shopping_model->product_by_industry();

			$data['indtype']=$this->Shopping_model->industrytype();
			
			$data['subview']="products";
			$this->load->view('layout/default', $data);
        }
 
		
	 function arrayHasOnlyInts($array){
            $test = implode('',$array);
            return is_numeric($test);
           }		
		public function ajaxProduct(){
		  $catbrand=@$_POST['catdata'];
			
		   if(is_array($catbrand) && !empty($catbrand)){
            $flag= $this->arrayHasOnlyInts($catbrand);
			}
			if(@$flag){
			$productData=$this->Shopping_model->product_cat_data($catbrand);
//print_r($productData);die;			
			}else{
				
				
				$intarr=array();
				$nonintarr=array();
				
			foreach($catbrand as $value) {
				
				if(is_numeric($value)){
				array_push($intarr, $value);
				}else{
				$datae= explode('b_',$value);
				
				array_push($nonintarr, $datae[1]);
				}	
				
				
			}
			
			 if(is_array($intarr)  && is_array($nonintarr)){
                 $intarr_cat=$intarr;
                 $nonintarr_brand=$nonintarr;
                 
				if($intarr_cat && $nonintarr_brand){
	               $productData=$this->Shopping_model->product_cat_brand_data($intarr_cat,$nonintarr_brand);
				}else{
				
				   $nonintarr_brand=$nonintarr;
					$productData=$this->Shopping_model->productbyBrand($nonintarr_brand);
				}

			} 
			 


				
		}	
		   
		   
         //print_r($productData);die;
       foreach ($productData as $value) {
            ?>
			<div class=" prod-item-box product-box education"> 
				<div class="img-box">
				<img src="<?php echo site_url(); ?>admin/upload/product_images/<?php echo $value->image;?>" alt="Product">
				</div>
				<div class="prod-mob-wrp">
				<h1><?php echo $value->product_name;?> <?php echo $value->model;?></h1>
				
				<table>
		      <tr>
				<td>Price</td>
				<td><?php echo @$value->price_mrp;?></td>
			 </tr>
			    <tr>
					<td><?php echo $value->text1;?></td>
					<td><?php echo $value->text2;?></td>
				</tr>
				<tr>
					<td><?php echo $value->text3;?></td>
					<td><?php echo $value->text4;?></td>
				</tr>
		
		</table>
				<!--<a href="<?php echo site_url(); ?>Pages/getProductDetails/<?php echo $value->id;?>" class="link-btn">Know More</a>-->
			<a href="<?php echo site_url(); ?>admin/upload/brochure/<?php echo $value->brochure_file;?>" class="link-btn" target="_blank">Download Brochure</a>
				<div class="prod-action">
					<button class="img-box" type="button" data-bs-toggle="modal" data-bs-target="#talk-modal">
						<img src="<?php echo base_url(); ?>common/img/f-btn-icon.svg" alt="">
					</button>
				</div>
				<input type="hidden" name="cid" id="cid" value="<?php echo $this->uri->segment(2);?>">
			</div>
			</div>
			<?php } }
		
		public function filter_product()
		{
		$bid=$_POST['bid'];
		$prodData=$this->Shopping_model->productbyBrand($bid);
		  if(!empty($prodData) && is_array($prodData)){		
				foreach ($prodData as $value) {
            ?>
            
		<div class=" prod-item-box product-box education"> 
			<div class="img-box">
				<img src="<?php echo site_url(); ?>admin/upload/product_images/<?php echo $value['image'];?>" alt="Product">
			</div>
			<div class="prod-mob-wrp">
				<h1><?php echo $value['model'];?></h1>
					<table>
					<tr>
						<td>Print Resolution</td>
						<td>203 dpi/8 dots per mm</td>
					</tr>
					<tr>
						<td>Brand Name:</td>
						<td><?php echo $value['industrytype_title'];?></td>
					</tr>
				</table>
				<a href="<?php echo site_url(); ?>Pages/getProductDetails/<?php echo $value['id'];?>" class="link-btn">Know More</a>
				<div class="prod-action">
					<button class="img-box" type="button" data-bs-toggle="modal" data-bs-target="#talk-modal">
						<img src="<?php echo base_url(); ?>common/img/f-btn-icon.svg" alt="">
					</button>
				</div>
			</div>
		</div>
			
		<?php } }
	
		}		
		
		public function getProductDetails($id){
				$id=$this->uri->segment(3);	
				//$data['row'] = $this->Shopping_model->getSignleRow('tbl_products',array('id'=>$id));
				$data['row'] = $this->Shopping_model->getCatProductData($id);
				$data['rows'] = $this->Shopping_model->productData();
				$data['long_desc'] = $this->Shopping_model->get_long_desc($id);
				$data['subview']="product-details";
				$this->load->view('layout/default', $data);
				}
	 	    
     
}	