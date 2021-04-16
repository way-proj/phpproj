<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Shopping_model extends CI_Model{
	

       /*  public function product_cat_data($cid){
         $this->db->select("tbl_products.*,tbl_product_attribute.id as attr_id,product_attribute_image.image,,tbl_industrytype.industrytype_title");
         $this->db->from("tbl_products");
         $this->db->join("tbl_product_attribute",'tbl_product_attribute.product_id=tbl_products.id');
         
		 $this->db->join('product_attribute_image', 'product_attribute_image.attr_id=tbl_product_attribute.id', 'left');
		 
		 $this->db->join('tbl_industrytype', 'tbl_industrytype.id=tbl_products.industrytype', 'left');
		 
		 $this->db->group_by("tbl_product_attribute.product_id","asc");
         //$this->db->where('cat_id',$cid);
		 $this->db->where_in('cat_id',$cid);
		 
         $query=$this->db->get();
         $res=$query->result();
         return $res;
          }
          */
          //Changes on 15-4-2021
          public function product_cat_data($cid){
         $this->db->select("tbl_products.*,tbl_product_attribute.id as attr_id,tbl_product_attribute.price_mrp,product_attribute_image.image,tbl_industrytype.industrytype_title,product_long_desc.*");
         $this->db->from("tbl_products");
         $this->db->join("tbl_product_attribute",'tbl_product_attribute.product_id=tbl_products.id');
         
		 $this->db->join('product_attribute_image', 'product_attribute_image.attr_id=tbl_product_attribute.id', 'left');
		 
		 $this->db->join('tbl_industrytype', 'tbl_industrytype.id=tbl_products.industrytype', 'left');
		 
		 $this->db->join('product_long_desc', 'product_long_desc.pid=tbl_products.id', 'left');
		 
		 
		 $this->db->group_by("tbl_product_attribute.product_id","asc");
         //$this->db->where('cat_id',$cid);
		 $this->db->where_in('cat_id',$cid);
		 
         $query=$this->db->get();
		 //echo $this->db->last_query(); die;
         $res=$query->result();
         return $res;
          }
        public function product_cat_brand_data($cid,$brand){
        $this->db->select("tbl_products.*,tbl_product_attribute.id as attr_id,product_attribute_image.image,tbl_industrytype.industrytype_title");
		$this->db->from("tbl_products");
		$this->db->join("tbl_product_attribute",'tbl_product_attribute.product_id=tbl_products.id');

		$this->db->join('product_attribute_image', 'product_attribute_image.attr_id=tbl_product_attribute.id', 'left');
		$this->db->join('tbl_industrytype', 'tbl_industrytype.id=tbl_products.industrytype', 'left');

		$this->db->group_by("tbl_product_attribute.product_id","asc");
		$this->db->where_in('tbl_products.cat_id',$cid);
		$this->db->where_in('tbl_products.industrytype',$brand);
		 
         $query=$this->db->get();
		 
         $res=$query->result();
         return $res;
          }
        public function product_scat_data($scid){
            $this->db->select("tbl_products.*,tbl_product_attribute.id as attr_id");
            $this->db->from("tbl_products");
            $this->db->join("tbl_product_attribute",'tbl_product_attribute.product_id=tbl_products.id');
            $this->db->group_by("tbl_product_attribute.product_id","asc");
            $this->db->where('sub_cat_id',$scid);
            $query=$this->db->get();
            $res=$query->result();
            return $res;
               }  
        public function product_list($pid){
            $this->db->select("*");
            $this->db->from("tbl_products");
            $this->db->where('id',$pid);
            $query=$this->db->get();
            $res=$query->result();
            return $res;
             }
        function productData(){
		$this->db->select('*');
		$this->db->from('tbl_products AS p'); 
		$this->db->join('tbl_product_attribute pa', 'pa.product_id=p.id', 'left');
		$this->db->join('product_attribute_image pi', 'pi.attr_id=pa.id', 'left');
		$this->db->join('product_long_desc pld', 'pld.pid=p.id', 'left');
		$this->db->join('tbl_industrytype', 'tbl_industrytype.id=p.industrytype', 'left');
		$query = $this->db->get(); 
		//echo $this->db->last_query(); die;
		if($query->num_rows() != 0)
		{
			return $query->result_array();
		}
		else
		{
			return false;
		}

   }     
      
   
        public function single_product_list($pid){
         $this->db->select("*");
         $this->db->where('id',$pid);
         $this->db->from("tbl_products");
         $query=$this->db->get();
         $res=$query->result();
         return $res;
            }
         public function save_query_data(){
            $name=$_POST['name'];
            $email=$_POST['email'];
            $mobile=$_POST['mob'];
            $desc=$_POST['desc'];
            $query_type=$_POST['query_type'];
            
            $date=date('Y-m-d h:i:s');
            $insert_data=array('name'=>$name,'email'=>$email,'mobile'=>$mobile,'comment'=>$desc,'created_date'=>$date,'query_type'=>$query_type);
            $msg=$this->db->insert('coporate_query_details',$insert_data);  
            
                $to = "info@aamku.com";
                $subject = "Contact details";
        
        $message = "
        <html>
        
        <body>
        <table style='border-collapse:'>
          <tbody>
            <tr>
            <td style='background: #1da1f2; color: white; padding: 6px; border: 1px solid #ccc; text-align: left; font-size: 14px;'>Name</td>
              <td style='padding: 6px; border: 1px solid #ccc; text-align: left; font-size: 14px;'>".$name."</td>
              </tr>
              <tr>
              <td style='background: #1da1f2; color: white; padding: 6px; border: 1px solid #ccc; text-align: left; font-size: 14px;'>Email</td>
              <td style='padding: 6px; border: 1px solid #ccc; text-align: left; font-size: 14px;'>".$email."</td>
              </tr>
              <tr>
              <td style='background: #1da1f2; color: white; padding: 6px; border: 1px solid #ccc; text-align: left; font-size: 14px;'>Mobile</td>
              <td style='padding: 6px; border: 1px solid #ccc; text-align: left; font-size: 14px;'>".$mobile."</td>
            </tr>
            <tr>
            <td style='background: #1da1f2; color: white; padding: 6px; border: 1px solid #ccc; text-align: left; font-size: 14px;'>Message</td>
            <td style='padding: 6px; border: 1px solid #ccc; text-align: left; font-size: 14px;'>".$desc."</td>
            </tr>
            <tr>
              <td style='background: #1da1f2; color: white; padding: 6px; border: 1px solid #ccc; text-align: left; font-size: 14px;'>Query Type</td>
              <td style='padding: 6px; border: 1px solid #ccc; text-align: left; font-size: 14px;'>".$query_type."</td>
            </tr>
          </tbody>
        </table>
        </body>
        </html>
        ";

        // Always set content-type when sending HTML email
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        
        // More headers
        $headers .= 'From: <webmaster@example.com>' . "\r\n";
        //$headers .= 'Cc: myboss@example.com' . "\r\n";
        
        mail($to,$subject,$message,$headers);
            
        } 

        public function save_contact_data($insert_data){
            $msg=$this->db->insert('tbl_contact',$insert_data); 
            $insert_id = $this->db->insert_id();
              return $insert_id;
            } 
            
        public function profile_data_update($POST,$profile_pic){
  
          if($profile_pic!=''){
            $date=date('Y-m-d h:i:s');
            $update_data=array('first_name'=>$POST['first_name'],'email'=>$POST['email'],'phone'=>$POST['mobile_no'],'last_name'=>$POST['last_name'],'created_date'=>$date,'photo'=>$profile_pic);
            $this->db->where('customer_id',$POST['cust_id']);
            $msg=$this->db->update('tbl_customers',$update_data); 
            return $msg;
            }else{
            $date=date('Y-m-d h:i:s');
            $update_data=array('first_name'=>$POST['first_name'],'email'=>$POST['email'],'phone'=>$POST['mobile_no'],'last_name'=>$POST['last_name'],'created_date'=>$date);
            $this->db->where('customer_id',$POST['cust_id']);
            $msg=$this->db->update('tbl_customers',$update_data); 
            return $msg;
        
            }    

         } 

 
    public function get_serach_result($keyword){

       $this->db->select("tbl_products.*,product_photo_details.p_id,product_photo_details.photo");
       $this->db->where('tbl_products.status','1');
       $this->db->from("tbl_products");
       $this->db->join('product_photo_details','product_photo_details.p_id=tbl_products.id');
       $this->db->group_by('product_photo_details.p_id');
       $this->db->order_by('product_photo_details.id','asc');
       $this->db->like('tbl_products.product_name', $keyword);
       $query=$this->db->get();
          $res=$query->result();
     
      return $res;
      

    } 
        //Contact save

        public function insert_contact($contactData)
           {
           $this->db->insert('tbl_contact', $contactData);
           return $this->db->insert_id();
          }

        //portfolio
        public function portfolio_list(){
            $this->db->select("*");
            $this->db->from("tbl_portfolio");
            $this->db->order_by("id","desc");
            $this->db->limit(0,5);
            $query=$this->db->get();
            $res=$query->result();
            return $res;
        
           }
   
       public function getSignleRow($table,$whereAssoc){
    	   $this->db->where($whereAssoc);
    	   $query = $this->db->get($table);
    	   return $query->row_array();
    	}
    	
    //portfolio
   


function get_product_gallery_details($p_id){
         $this->db->select("product_attribute_image.image,tbl_product_attribute.price_mrp,tbl_product_attribute.sp_price,tbl_product_attribute.margin_price,tbl_product_attribute.qty,tbl_product_attribute.weight");
         $this->db->from("tbl_product_attribute");
         $this->db->join("product_attribute_image","tbl_product_attribute.id=product_attribute_image.attr_id");
         $this->db->where('tbl_product_attribute.product_id',$p_id);
        $this->db->group_by("product_attribute_image.attr_id","asc");
         $query=$this->db->get();
        //echo $this->db->last_query();die;
         $res=$query->result();
         return $res;

   }
   
   function get_attribute_details($p_id){
         $this->db->select("*");
         $this->db->from("tbl_product_attribute");
         $this->db->where('product_id',$p_id);
         $query=$this->db->get();
         //echo $this->db->last_query();
         $res=$query->result();
         return $res;
        }
		
		
	function Get_attribute_image_details($attr_id){
         $this->db->select("*");
         $this->db->from("product_attribute_image");
         $this->db->where('attr_id',$attr_id);
         $query=$this->db->get();
         //echo $this->db->last_query();
         $res=$query->result();
         return $res;
        }		

	function softwareData(){
            $this->db->select("*");
            $this->db->from("tbl_software");
           // $this->db->where('id',$pid);
            $query=$this->db->get();
            if($query->num_rows() != 0)
		{
			return $query->result_array();
		}
		else
		{
			return false;
		}
             }
             
             
    
function getCatProductData($pid){
       //	$CI = &get_instance(); 
		$this->db->select('*');
		$this->db->from('tbl_products AS p'); 
		$this->db->join('tbl_product_attribute pa', 'pa.product_id=p.id', 'left');
		$this->db->join('product_attribute_image pi', 'pi.attr_id=pa.id', 'left');
		//$this->db->where('cat_id',$cid);
		$this->db->where('p.id',$pid);
		$query = $this->db->get(); 
		
		//echo $this->db->last_query(); die;
		if($query->num_rows() != 0)
		{
			return $query->result_array();
		}
		else
		{
			return false;
		}

		}  
         
             
    function get_long_desc($pid){
         $this->db->select("*");
         $this->db->from("product_long_desc");
         $this->db->where('pid',$pid);
         $query=$this->db->get();
         //echo $this->db->last_query();
         $res=$query->result();
         return $res;
        }          
        
    function industrytype(){
		$this->db->select("*");
		$this->db->from("tbl_industrytype");
		$this->db->order_by("id","asc");
		$query=$this->db->get();
		$res=$query->result();
		return $res;
        }
        
    public function product_by_industry(){
		$this->db->select("tbl_products.*,tbl_product_attribute.id as attr_id,product_attribute_image.image,tbl_industrytype.industrytype_title");
		$this->db->from("tbl_products");
		$this->db->join("tbl_product_attribute",'tbl_product_attribute.product_id=tbl_products.id');

		$this->db->join('product_attribute_image', 'product_attribute_image.attr_id=tbl_product_attribute.id', 'left');
		$this->db->join('tbl_industrytype', 'tbl_industrytype.id=tbl_products.industrytype', 'left');

		$this->db->group_by("tbl_product_attribute.product_id","asc");
		//$this->db->where('cat_id',$cid);
		$query=$this->db->get();
		//echo $this->db->last_query(); die;
		//$res=$query->result();
		//return $res;
		if($query->num_rows() != 0)
			{
				return $query->result_array();
			}
			else
			{
				return false;
			}
          }
		  
		public function product_cat_industry($cid=NULL,$type=NULL){
		$this->db->select("tbl_products.*,tbl_product_attribute.id as attr_id,product_attribute_image.image,tbl_industrytype.industrytype_title");
		$this->db->from("tbl_products");
		$this->db->join("tbl_product_attribute",'tbl_product_attribute.product_id=tbl_products.id');

		$this->db->join('product_attribute_image', 'product_attribute_image.attr_id=tbl_product_attribute.id', 'left');
		$this->db->join('tbl_industrytype', 'tbl_industrytype.id=tbl_products.industrytype', 'left');

		$this->db->group_by("tbl_product_attribute.product_id","asc");
		$this->db->where('cat_id',$cid);
		$this->db->where('industrytype',$type);
		$query=$this->db->get();
		//$res=$query->result();
		//return $res;
		if($query->num_rows() != 0)
			{
				return $query->result_array();
			}
			else
			{
				return false;
			}
          } 
          
     function get_softlong_desc($pid){
		$this->db->select("*");
		$this->db->from("software_long_desc");
		$this->db->where('software_id',$pid);
		$query=$this->db->get();
		//echo $this->db->last_query();
		$res=$query->result();
		return $res;
        } 
		
	public function productbyBrand($brand){
        $this->db->select("tbl_products.*,tbl_product_attribute.id as attr_id,tbl_product_attribute.price_mrp,product_attribute_image.image,tbl_industrytype.industrytype_title,product_long_desc.*");
		$this->db->from("tbl_products");
		$this->db->join("tbl_product_attribute",'tbl_product_attribute.product_id=tbl_products.id');

		$this->db->join('product_attribute_image', 'product_attribute_image.attr_id=tbl_product_attribute.id', 'left');
		$this->db->join('tbl_industrytype', 'tbl_industrytype.id=tbl_products.industrytype', 'left');
	$this->db->join('product_long_desc', 'product_long_desc.pid=tbl_products.id', 'left');	
		$this->db->group_by("tbl_product_attribute.product_id","asc");
		//$this->db->where_in('tbl_products.cat_id',$cid);
		$this->db->where_in('tbl_products.industrytype',$brand);
		 
         $query=$this->db->get();
		 //echo $this->db->last_query(); die;
         $res=$query->result();
         return $res;
          }	

}