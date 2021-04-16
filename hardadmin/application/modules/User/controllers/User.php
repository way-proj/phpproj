<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends MX_Controller {
    function __construct(){
    parent::__construct();
    
    $this->load->model('User_model');
    $this->load->library('session');
    $this->load->model('../../Common/Crud_model');
    $this->load->helper(array('form', 'url','new'));
    //Header('Access-Control-Allow-Origin: *'); //for allow any domain, insecure
    //Header('Access-Control-Allow-Headers: *'); //for allow any headers, insecure
    //Header('Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE'); //method allowed
    
    }
 
  public function dochangepassword()
    {
         $data['category_data']=$this->Crud_model->getDirectQueryCommonData('SELECT id,category_name,image_url  FROM `category_details` ORDER BY `id` ASC');
            if($this->session->userdata('userid')){
            $user_id=$this->session->userdata('userid');
            }
            $oldpass    =   md5($this->input->post('old_pass'));
            $newpass    =   $this->input->post('new_pass');
            $renewpass  =   $this->input->post('conf_pass');
            $do_match = $this->User_model->check_user_exist($user_id,$oldpass);
            if($do_match>0){
              if($newpass == $renewpass)
                {
                  $postdata = array(
                              'password' =>md5($newpass)
                             );
                    $this->User_model->update_password($user_id,$postdata);
                    $this->session->set_flashdata('msg','Your Password has changed successfully');
                     redirect('User/changepassword');

                }else{
                 $this->session->set_flashdata('msg' , 'Sorry Your New Password or Re-new Password not match');
                    redirect('ChangePassword/index');
                  }  

            }else{

              $this->session->set_flashdata('msg' , 'Sorry your old password does not match');
                redirect('User/changepassword');
            }


     }
public function forget_save_password(){
        //print_r($_POST);die;
         $active_code=$this->input->post('key');
         $user_id=$this->input->post('user_id');
         $newpass=$this->input->post('new_pass');
         $res= $this->User_model->check_user_email_activecode_exist($user_id,$active_code);
         if($res->active_code){
             $postdata = array(
                              'password' =>md5($newpass),
                              'active_code'=>''
                             );
                    $this->User_model->update_password($user_id,$postdata);
                    $this->session->set_flashdata('msg','Your Password has been changed successfully');
                     redirect(base_url().'User/regenrate_pass');
             
         }else{
            $this->session->set_flashdata('msg','Your password recovery link expire');
            redirect(base_url().'User/regenrate_pass'); 
         }
    
    
}     

public function forget_pass(){
          $data['category_data']=$this->Crud_model->getDirectQueryCommonData('SELECT id,category_name,image_url  FROM `category_details` ORDER BY `id` ASC');
          $data['subview']="forget-password";
          $this->load->view('layout/default',$data); 

}
public function regenrate_pass(){

          //$data['category_data']=$this->Crud_model->getDirectQueryCommonData('SELECT id,category_name,image_url  FROM `category_details` ORDER BY `id` ASC');
          $data['subview']="forget-change-password";
          $this->load->view('layout/default',$data); 

}
public function send_mail(){
  $data['category_data']=$this->Crud_model->getDirectQueryCommonData('SELECT id,category_name,image_url  FROM `category_details` ORDER BY `id` ASC');
  
      if($_POST['email']){
            $email  =   $this->input->post('email');
            $res= $this->User_model->check_user_email_exist($email);
            //echo $res->customer_id;
      
     if($res->customer_id){
        $active_code=md5(uniqid(rand(5, 15), true));
        $link = 'http://stage.wayinfotechsolutions.co/grocery/User/regenrate_pass/'.$res->customer_id.'/'.$active_code;
        $fetch=$this->db->query("UPDATE `tbl_customers` SET `active_code` = '$active_code' 
        WHERE `email`='$email' ");
        $message = 'Password Recovery Link :'.$link;  
        
    $to='projects@wayinfotechsolutions.com'; 
    $subject="Password Recovery Link";
      $headers = "MIME-Version: 1.0" . "\r\n";
      $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

      // More headers
      $headers .= 'From: <Grocery@example.com>' . "\r\n";
       $mail= mail($to,$subject,$message,$headers);
      if($mail){
            echo '<span style="color:green">Please check your inbox we have send password recovery link</span>';
      }else{
          
        echo '<span style="color:red">Sorry mail send issue!</span>';
         }
      

         }        
          
   }
}
   public function signin(){
        
          $data['subview']="sign-in";
          $this->load->view('layout/default',$data);

     } 
   public function profile()
        {
       
        if(@$_SESSION['userid']){
            $user_id=$_SESSION['userid'];
            $data['user_data']=$this->User_model->get_customer_data($user_id);
           }
          $data['country_data']=$this->User_model->get_country_data();
          $data['state_data']=$this->User_model->get_state_data(); 
          $data['city_data']=$this->User_model->get_city_data();   
          $data['subview']="profile";
          $this->load->view('layout/default', $data);
          } 
    public function get_state_id()
         {
         $country_id=$_POST['country_id'];
         $this->db->select('*');
         $this->db->from('tbl_states');
         $this->db->where('country_id',$country_id);
         $query=$this->db->get();
         $res=$query->result();
        // print_r($res);
         $html='';
         $html .='<option value="">--select state--</option>';
         foreach ($res as $value) {
          $html.='<option value="'.$value->id.'">'.$value->name.'</option>';
          }
          echo $html;
        }  
      public function get_city_id()
        {
         $state_id=$_POST['state_id'];
         $this->db->select('*');
         $this->db->from('tbl_cities');
         $this->db->where('id',$state_id);
         $query=$this->db->get();
         $res=$query->result();
        // print_r($res);
         $html='';
         $html .='<option value="">--select city--</option>';
         foreach ($res as $value) {
          $html.='<option value="'.$value->id.'">'.$value->name.'</option>';
         }
        echo $html;
     }   
  public function signup(){
          $data['category_data']=$this->Crud_model->getDirectQueryCommonData('SELECT id,category_name,image_url  FROM `category_details` ORDER BY `id` ASC');
          $data['subview']="signup";
          $this->load->view('layout/default',$data);

     }     
   public function user_profile(){
     $data['category_data']=$this->Crud_model->getDirectQueryCommonData('SELECT id,category_name,image_url  FROM `category_details` ORDER BY `id` ASC');
           if(@$_SESSION['userid']){
            $user_id=$_SESSION['userid'];
            $data['user_data']=$this->User_model->get_customer_data($user_id);
           }
          $data['subview']="user-profile";
          $this->load->view('layout/default',$data);
       }  
    public function logout_sess(){
         $this->session->sess_destroy();
         redirect(base_url());

   }
public function user_edit(){
     $data['category_data']=$this->Crud_model->getDirectQueryCommonData('SELECT id,category_name,image_url  FROM `category_details` ORDER BY `id` ASC');
    if(@$_SESSION['userid']){
            $user_id=$_SESSION['userid'];
            $data['user_data']=$this->User_model->get_customer_data($user_id);
           }
       $data['subview']="edit-profile";
       $this->load->view('layout/default',$data);
  } 
  public function mycredit(){
     $data['category_data']=$this->Crud_model->getDirectQueryCommonData('SELECT id,category_name,image_url  FROM `category_details` ORDER BY `id` ASC');
       $data['subview']="mycredit";
       $this->load->view('layout/default',$data);

  }
  public function order_history(){
    if(@$_SESSION['userid']){
       $user_id=$_SESSION['userid'];
       $data['checkout_data']=$this->User_model->get_all_shopping_orders($user_id);
       $data['user_data']=$this->User_model->get_customer_data($user_id);
        }
       $data['subview']="order-history";
       $this->load->view('layout2/default',$data);

  }
  public function track_order(){

    $cart_id=$this->uri->segment(3);
    $data['order_data']=$this->User_model->get_checkout($cart_id);
    

     // }
      $data['subview']="track-order";
      $this->load->view('layout/default',$data);
 }
public function wish_history(){
    if(@$_SESSION['userid']){
         $user_id=$_SESSION['userid'];
         $data['checkout_data']=$this->User_model->get_all_wish_orders($user_id);
         $data['user_data']=$this->User_model->get_customer_data($user_id);
         }
       $data['subview']="wish-history";
       $this->load->view('layout/default',$data);

  }
public function wish_product_view(){
   $data['category_data']=$this->Crud_model->getDirectQueryCommonData('SELECT id,category_name,image_url  FROM `category_details` ORDER BY `id` ASC');
       if($this->uri->segment(3)){
            $pid=$this->uri->segment(3);
         $data['checkout_data']=$this->User_model->get_wish_orders($pid);
         }
       $data['subview']="product-wish-details";
       $this->load->view('layout/default',$data);

  }

  public function order_product_view(){
     if(@$_SESSION['userid']){
           $data['user_data']=$this->User_model->get_customer_data(@$_SESSION['userid']);
         }
          $cart_id=$this->uri->segment(3);
          $data['product_details']=$this->User_model->get_product_details($cart_id);
          $data['subview']="product-order-details";
      $this->load->view('layout/default',$data);

  }
  public function invite(){
       $data['subview']="invite";
       $this->load->view('layout/default',$data);

  }
  public function changepassword(){
     $data['category_data']=$this->Crud_model->getDirectQueryCommonData('SELECT id,category_name,image_url  FROM `category_details` ORDER BY `id` ASC');
       $data['subview']="changepassword";
       $this->load->view('layout/default',$data);

  }
public function edit_user_save(){
               if(@$_SESSION['userid']){
               $user_id=$_SESSION['userid'];
                }
               $first_name=$this->input->post('first_name');
               $last_name=$this->input->post('last_name');
               $email=$this->input->post('email');
               $phone=$this->input->post('phone');
              
               $country_id=$this->input->post('country_id');
               $state_id=$this->input->post('state_id');
               $city_id=$this->input->post('city_id');
               $billing_zip=$this->input->post('zip_code');

               $created_date=date('Y-m-d H:i:s');
               $insert_data=array(
                    'first_name'=>$first_name,
                    'last_name'=>$last_name,
                    'last_name'=>$last_name,
                    'billing_country'=>$country_id,
                    'billing_state'=>$state_id,
                    'billing_city'=>$city_id,
                    'billing_zip'=>$billing_zip,
                    'phone'=>$phone,
                    'email'=>$email,
                    'created_date'=>$created_date
                   );
              //print_r($insert_data);die;
              $res=$this->User_model->update_customer_data($insert_data,$user_id);
              if((!empty($_FILES['update_photo']['name'][0]))){
                  $file_name=$this->update_do_upload();

                  $file_data=array(
                        'photo'=>$file_name[0]
                  );
                 $res=$this->User_model->update_photo_data($file_data,$user_id);  
              }
              //redirect(base_url().'User/user_profile');
              redirect(base_url().'User/profile');
           }
        public function update_do_upload(){
            $file_data=array();
            $file_name='';
           if(!empty($_FILES['update_photo']['name'])){
            $count=count($_FILES['update_photo']['name']);
            //print_r($_FILES);die;
            for($i=0;$i<$count;$i++){
            $file_name =time().'_'.$_FILES['update_photo']['name'][$i];  
            array_push($file_data,$file_name);
            $_FILES['userfile']['name']=time().'_'.$_FILES['update_photo']['name'][$i];
            $_FILES['userfile']['type']= $_FILES['update_photo']['type'][$i];
                $_FILES['userfile']['tmp_name']= $_FILES['update_photo']['tmp_name'][$i];
                $_FILES['userfile']['error']= $_FILES['update_photo']['error'][$i];
                $_FILES['userfile']['size']= $_FILES['update_photo']['size'][$i];
           $path=$this->config->item('base_Url').'admin/upload/profile/';
        
            $config1['upload_path']=$path;
            $config1['allowed_types']='jpg|png|gif';
            $config1['min_hieght']='10';
            $config1['min_width']='10';
            $this->load->library('upload',$config1);
            $this->upload->initialize($config1);
            $this->upload->do_upload('userfile');
            }
            return $file_data;
            }
          }
        /*public function save_newslatter(){
           
          $email=$this->input->post('email');
          $created_date=date('Y-m-d H:i:s');
          $insert_data=array(
                            'email'=>$email,
                             'created_date'=>$created_date
                           );
                      // print_r($insert_data);die;
                      $this->User_model->save_news_data($insert_data);
                      echo 1;
        }     */      
            public function Signup_user_front(){
        
            //print_r($_POST);die;
        
                  $first_name=$this->input->post('first_name');
                  //$last_name=$this->input->post('last_name');
                  $email=$this->input->post('email');
                  $phone=$this->input->post('phone');
                  // $dob=$this->input->post('dob-day').'-'.$this->input->post('dob-month').'-'.$this->input->post('dob-year');
                  $check_reg_user = $this->User_model->check_reg_user($email,$phone);
                  //print_r($check_reg_user);die;
                  if(@$check_reg_user->customer_id!=''){
                     if(@$check_reg_user->email==$email){
                    //$this->session->set_flashdata('alredy_reg_error','Already registered email id!');
                     //unset($_SESSION['reg_msg']);
                    // redirect(base_url().'User/signup');
                      $res_array=array('email_error'=>'Already registered email id!');
                       echo json_encode($res_array);
                      }else{
                        //$this->session->set_flashdata('alredy_reg_error','Already registered mobile no!');
                     //unset($_SESSION['reg_msg']);
                    // redirect(base_url().'User/signup');
                         //$res_array['alredy_reg_mobile_error']='Already registered mobile number!';
                         $res_array=array('mobile_error'=>'Already registered mobile number!');
                         echo json_encode($res_array);
                      }
                  }else{
                  $pass=$this->input->post('password'); 
                  $password= md5($this->input->post('password'));
                  $created_date=date('Y-m-d H:i:s');
                  $insert_data=array(
                        'first_name'=>$first_name,
                        'last_name'=>'',
                        'email'=>$email,
                        'password'=>$password,
                        'phone'=>$phone,
                        'created_date'=>$created_date
                      );
                  // print_r($insert_data);die;
                  $this->User_model->save_customer_data($insert_data);
       
                  
         //     $message = '<table><tr><td>You have successfully register</td></tr><tr><td>Name</td><td>'.$$first_name.' '.$last_name.'</td><tr><td>Email</td><td>'.$email.'</td><tr><td>Mobile</td>'.$phone.'<td></tr></table>';  
            
         //  $to=$email; 
         //  $subject="Password Recovery Link";
         //  $headers = "MIME-Version: 1.0" . "\r\n";
         //  $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    
         //  // More headers
         //  $headers .= 'From: <Jamairaja@example.com>' . "\r\n";
         // // $headers .= 'Cc: yash@mematdigi.com' . "\r\n";
         //  //$headers .= 'Cc: dinesh@mematdigi.com' . "\r\n";
    
         //  $headers .= 'Cc: omprakash.php@wayinfotechsolutions.com' . "\r\n";
    
         // $mail= mail($to,$subject,$message,$headers);
    
                 //$this->session->set_flashdata('reg_msg','You are successfully register.');
                  //unset($_SESSION['login_error_db_exist']);
                  //unset($_SESSION['alredy_reg_error']);
                  //redirect(base_url().'User/signup');
                  $res_array=array('reg_msg_success'=>'You are successfully register.');
                  echo json_encode($res_array);
                  //redirect(base_url());
                 }
    
            }     
            
        public function front_login(){
           $data['subview']="front_login";
           $this->load->view('layout/default',$data);
    
         } 
             public function login_front_check(){
                   $this->load->library('session');
                    $email = $this->input->post('email');
                    $password =$this->input->post('password');
                    $check_reg_user = $this->User_model->check_reg_user_by_email($email);
                    //print_r($check_reg_user);die;
                    if(@$check_reg_user->email!=''){
                    $result = $this->User_model->login($email,$password);

                    if($result -> num_rows() > 0)
                      { 

                        foreach ($result->result() as $row)
                         { 
                            $this->session->userid = $row->customer_id;
                            //$this->session->admin = $row->is_Admin;
                             $this->session->email =  $row->email;
                             $this->session->user_name =  $row->first_name;
                             //$this->session->set_flashdata('login_succ_show','Successfully login');
                             // unset($_SESSION['login_error_show']);
                             $login_array=array('login_success'=>'Successfully login');
                             echo json_encode($login_array);
                             // redirect(base_url());
                          }
                     }
                    else
                     {
                        //echo"3"; die;
                      
                        //$this->session->set_flashdata('login_error_show','Email and Password is Wrong!!');
                           //unset($_SESSION['login_succ_show']);
                       
                           //redirect(base_url().'User/Signin');
                        $login_array=array('login_error_show'=>'Email and Password is Wrong!!');
                        echo json_encode($login_array);
                       }

                    }else{

                    //$this->session->set_flashdata('login_error_db_exist','Your email id does not exist please register now!');
                    //unset($_SESSION['login_error_show']);
                    //unset($_SESSION['login_succ_show']);
                   

                    //redirect(base_url().'User/Signin');
                      $login_array=array('login_error_db_exist'=>'Your email id does not exist!');
                        echo json_encode($login_array);

                   }

               
            }   
            
            
        public function updateCustomer(){

            $user_id=$this->input->post('user_id');
	        if($user_id){
			
        	$update_data=array(
        	 'first_name'=>$this->input->post('first_name'),
	         'last_name'=>$this->input->post('last_name'),
	         'email'=>$this->input->post('email'),
	         'phone'=>$this->input->post('phone'),
	         'gender'=>$this->input->post('GenderRadios'),
	 
    	 );
      // print_r($update_data);die;  
          $result=  $data['user_data']=$this->User_model->update_customer_data($update_data,$user_id);
		   
		   if($result){
				
				// redirect(base_url().'User/profile',$arr); 
				$res_array=array('update_msg_success'=>'User updated successfully.');
              echo json_encode($res_array);
				
				
			}else{
				 //redirect(base_url().'User/profile',$arr); 
				 $update_array=array('update_error_db_exist'=>'User not updated!');
                        echo json_encode($update_array);
			}
			
           }
		 
		}
	

     
        public function user_contact(){
            
           
      //  $method = $_SERVER['REQUEST_METHOD'];
    
            $first_name=$this->input->post('first_name');
            $email=$this->input->post('email');
            $phone=$this->input->post('phone');
            $countryCode = $this->input->post('countryCode');
            //$countryname=$this->input->post('countryname');
		   // $textmessage=$this->input->post('textmessage');
		    $form_type='TalkToUs';
             if($first_name!=''&& $email!='' && $phone!=''&& $countryCode!=''){
              $created_date=date('Y-m-d H:i:s');
              
               $getClientIP= (!empty($_SERVER['REMOTE_ADDR']))?$_SERVER['REMOTE_ADDR'] :((!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) ? $_SERVER['HTTP_X_FORWARDED_FOR']: @getenv('REMOTE_ADDR'));
	    	    if(isset($_SERVER['HTTP_CLIENT_IP']))
	            $getClientIP=$_SERVER['HTTP_CLIENT_IP'];
	            
              $insert_data=array(
                    'name'=>$first_name,
                    'email'=>$email,
					'phone'=>$phone,
					'form_type'=>$form_type,
					'ip_address' => $getClientIP,
                    'countryCode'=>$countryCode,
                    //'countryname'=>$countryname,
                   // 'message'=>$textmessage,
                    'created_date'=>$created_date
                  );
              //print_r($insert_data);die;
			  $insert_id=$this->User_model->save_contact_data($insert_data);
			  if($insert_id){
               $message 	='<table cellspacing="0" cellpadding="0" border="0"> 
                              <tr><td colspan="3">Your request has been submitted successfully</td></tr>   
                               <tr><td colspan="3">&nbsp;</td></tr>   
								<tr>
   		   						<td colspan="3">Query Requested on '.date('Y-m-d h:i:s').':</td>
								</tr>
								<tr><td colspan="3">&nbsp;</td></tr>
								<tr>
								<td valign="top" style="width:120px;">Name</td>
								<td valign="top"style="width:20px;">:</td>
								<td>'.stripslashes($first_name).'</td>
								</tr>
								<tr><td colspan="3">&nbsp;</td></tr>
			  				    <tr>
								 <td valign="top">Email</td>
								 <td valign="top">:</td>
								 <td>'.stripslashes($email).'</td>
								 </tr>
								 <tr><td colspan="3">&nbsp;</td></tr>
			  				    <tr>
								 <tr>
								 <td valign="top">Phone</td>
								 <td valign="top">:</td>
								 <td>'."+".''.$countryCode.' '.stripslashes($phone).'</td>
								</tr>';
            	/*	if($countryname != ''){
            			$message 	.= 	'<tr><td colspan="3" >&nbsp;</td></tr>
            							 <tr>
            							<td valign="top">Country</td>
            							<td valign="top">:</td>
            							<td>'.$countryname.'</td>
            							</tr>';
            		                    }									
									
            		if($textmessage != ''){	
            			$message 	.= 	'<tr><td colspan="3">&nbsp;</td></tr>
            							<tr>
            							<td valign="top">Message</td>
            							<td valign="top">:</td>
            							<td>'.nl2br(stripslashes($textmessage)).'</td>
            							</tr>';
            		}	
            		*/
            	    $message 	.= '</table>';
		
       $to="sales@wayinfotechsolutions.com,amrit@wayinfotechsolutions.com,digital@wayinfotechsolutions.com,ba@wayinfotechsolutions.com"; 
     //$to="projects@wayinfotechsolutions.com"; 
        $subject="Query form";
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

     //  // More headers
       $headers .= 'Cc: projects@wayinfotechsolutions.com' . "\r\n";

         $mail= mail($to,$subject,$message,$headers);

              $res_array=array('msg_success'=>'Your request has been submitted successfully.');
              echo json_encode($res_array);
              //redirect(base_url());
			 } 
		   } 
        }   


   
	   public function save_newsletter(){
            $email=$this->input->post('email');
	        $created_date=date('Y-m-d H:i:s');
	        $insert_data=array(
					'email'=>$email,
			        'created_date'=>$created_date
				   );
				 
				$this->User_model->save_news_data($insert_data);
        	    $insert = $this->db->insert_id();
        	     if($insert){
    	        $message 	='<table cellspacing="0" cellpadding="0" border="0"> 
                        <tr><td colspan="3">Thank you for choosing us. Our team will contact you soon.</td></tr>   
                        <tr><td colspan="3">&nbsp;</td></tr>   
						<tr>
   		   				<td colspan="3">Dated on '.date('Y-m-d h:i:s').':</td>
						</tr>
						<tr><td colspan="3">&nbsp;</td></tr>  
					    <tr>
						<td valign="top">Email</td>
						<td valign="top">:</td>
						<td>'.stripslashes($email).'</td>
						 </tr>';
		        $message.= '</table>';
		
            $to="sales@wayinfotechsolutions.com,amrit@wayinfotechsolutions.com,digital@wayinfotechsolutions.com,ba@wayinfotechsolutions.com"; 
           // $to="projects@wayinfotechsolutions.com"; 
            $subject="subcribe";
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            $headers .= 'Cc: projects@wayinfotechsolutions.com' . "\r\n";
       
     //  // More headers
            $mail= mail($to,$subject,$message,$headers);

              $res_array=array('newsmsg_success'=>'Your request has been submitted successfully.');
              echo json_encode($res_array);
              //redirect(base_url());
             }
	   }
	     



	

 
} 