<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Portfolio_model extends CI_Model{
	
   function save_cat_data($insert_data){
         $res=$this->db->insert('category_details',$insert_data);
         return $res;
      }
    function save_brand_data($insert_data){
         $res=$this->db->insert('brand_details',$insert_data);
         return $res;
     }
     function save_slider_data($insert_data){
         $res=$this->db->insert('top_home_silider',$insert_data);
         return $res;
     }

     public function inactive_user($table, $field, $delete_id) {
        if($field=='Active'){
          $status='Inactive';
        }else{
          $status='Active';
        }
        $update_data=array(
                'status'=>$status
        );
         $this->db->where('id',$delete_id);
         $res=$this->db->update('users',$update_data);
        //echo $this->db->last_query();
         return $res;
    }  


      function edit_category($id)
  {
    $this->db->select('*');
    $this->db->where('id',$id);
     $query=$this->db->get('category_details');
       if($query->num_rows() ==''){
        return '';
        }else{
        return $query->result();
        
      }
  }


 


function single_user_list($u_id){
         $this->db->select("*");
         $this->db->from("users");
         $this->db->where('id',$u_id);
         $query=$this->db->get();
         //echo $this->db->last_query();
         $res=$query->row();
         return $res;
        }
function get_brand_data(){
         $this->db->select("*");
         $this->db->from("brand_details");
         $this->db->order_by("id","desc");
         //$this->db->where('status','1');
         $query=$this->db->get();
         $res=$query->result();

         //echo $this->db->last_query();die;
         return $res;

   } 
 public function get_all_shopping_orders(){
       $this->db->select("*");
       $this->db->from("tbl_checkout");
       $this->db->order_by('tbl_checkout.checkout_id','desc');
       $query=$this->db->get();
       $res=$query->result();
       return $res;

   }  
  public function get_product_details($cart_id){
       $this->db->select("tbl_cart_product.winprice,tbl_cart_product.win_image,tbl_cart_product.custom_image,tbl_cart_product.page_number,tbl_cart_product.p_image,tbl_cart_product.p_type,tbl_cart_product.product_price as p_price,tbl_cart_product.quantity as product_qty,tbl_products.*,category_details.*");
       $this->db->where('product_cart_id',$cart_id);
       $this->db->from("tbl_cart_product");
       $this->db->join('tbl_products','tbl_products.id=tbl_cart_product.product_id');
       $this->db->join('category_details','category_details.id=tbl_products.cat_id');
       //echo $this->db->last_query();die;
       $query=$this->db->get();
       $res=$query->result();
       return $res;

   }  
function get_product(){
         $this->db->select("*");
         $this->db->from("tbl_products");
         $this->db->order_by("id","asc");
        // $this->db->where('pdt_id',$cat_id);
         $query=$this->db->get();
       
         return $res=$query->result();

}
   function get_product_gallery_details($cat_id){
      $this->db->select("product_gallery.image");
         $this->db->from("product_gallery");
         $this->db->order_by("id","asc");
         $this->db->where('pdt_id',$cat_id);
         $query=$this->db->get();
        //echo $this->db->last_query();
         $res=$query->result();
         return $res;

   }
   function get_product_gallery_details2($cat_id){
      $this->db->select("product_gallery.image");
         $this->db->from("product_gallery");
         $this->db->order_by("id","desc");
         $this->db->where('pdt_id',$cat_id);
         $query=$this->db->get();
         //echo $this->db->last_query();
         $res=$query->row();
         return $res;

   }
   
     function save_attribute_data($insert_data){
         $res=$this->db->insert('attribute_details',$insert_data);
         return $res;
     }
     function save_attribute_group_data($insert_data){
         $res=$this->db->insert('attribute_allocation',$insert_data);
         return $res;
     } 
    function save_sub_cat_data($insert_data){
         $res=$this->db->insert('sub_category_details',$insert_data);
        // echo $this->db->last_query();
         //$res=$query->row();
         return $res;

    }
    function save_sub_child_cat_data($insert_data){
         $res=$this->db->insert('sub_child_category_details',$insert_data);
        // echo $this->db->last_query();
         //$res=$query->row();
         return $res;

    } 	  


      function save_service_data($insert_data){
         $res=$this->db->insert('tbl_services',$insert_data);
        // echo $this->db->last_query();
         //$res=$query->row();
         return $res;

    }   
    function product_list(){
         $this->db->select("*");
         $this->db->from("tbl_products");
         $this->db->order_by("id","desc");
         //$this->db->where('status','1');
         $query=$this->db->get();
         $res=$query->result();
         return $res;

   } 

   public function get_attr_list($product_id){

    $this->db->select("*");
    $this->db->from("tbl_item_master_attribute");
    $this->db->where("product_id",$product_id);
    $query=$this->db->get();
    $res=$query->result();
      return $res;
        
   }
   public function save_product($insert_data,$upload_file){
        $this->db->insert('tbl_products',$insert_data);
        
        $insert_id=$this->db->insert_id();
        if(!empty($upload_file)){
        $cnt=count($upload_file);
        for($i=0;$i<$cnt;$i++){
          $up_file=$upload_file[$i];
          $date=date('Y-m-d h:i:s');
          $insert_data=array('pdt_id'=>$insert_id,'image'=>$up_file);
          $this->db->insert('product_gallery',$insert_data); 
         

         }
        }
       return $insert_id;
    }
   public function update_product_file($insert_data,$eid,$upload_file,$hidden_val){
        $this->db->where('id',$eid);
        $res=$this->db->update('tbl_products',$insert_data);
        //echo $this->db->last_query();
        //die;
        $this->db->delete('product_gallery', array('pdt_id' => $eid));
        // print_r($upload_file);
        if(!empty($upload_file)){
         $cnt=count($upload_file);
        for($i=0;$i<$cnt;$i++){
          $up_file=$upload_file[$i];
          $hyhen_check=explode('_',$up_file);
          //print_r($hyhen_check);
          if($hyhen_check[1]){
               $up_file=$upload_file[$i];
            }else{
               $up_file=$hidden_val[$i];
            }
          $date=date('Y-m-d h:i:s');
          //echo $up_file;
          $insert_data=array('image'=>$up_file,'pdt_id'=>$eid);
         //echo'<pre>'; print_r($insert_data);
          //$this->db->where('pdt_id',$eid);
         $msg=$this->db->insert('product_gallery',$insert_data); 
         //echo $this->db->last_query();
          
        }
       return $msg;
       }
    }

    function update_product($update_data,$id){
         $this->db->where('id',$id);
         $res=$this->db->update('tbl_products',$update_data);
        //echo $this->db->last_query();
         return $res;
     }   
   function cat_list(){
         $this->db->select("*");
         $this->db->from("category_details");
         $this->db->order_by("id","desc");
         //$this->db->where('status','1');
         $query=$this->db->get();
         $res=$query->result();
         return $res;

   } 
   function brand_list(){
         $this->db->select("*");
         $this->db->from("brand_details");
         $this->db->order_by("id","desc");
         $query=$this->db->get();
         $res=$query->result();
         return $res;

   }

      public function cms_list(){
        $this->db->select("*");
        $this->db->from("tbl_cms");
        $this->db->order_by("id","desc");
        $query=$this->db->get();
        
        $res=$query->result();
        return $res;
      }
      public function email_list(){
        $this->db->select("*");
        $this->db->from("email_message");
        $this->db->order_by("id","desc");
        $query=$this->db->get();
        
        $res=$query->result();
        return $res;
      } 
      public function contact_list(){
        $this->db->select("*");
        $this->db->from("tbl_contact");
        $this->db->order_by("id","desc");
        $query=$this->db->get();
        
        $res=$query->result();
        return $res;
      }  
        public function charity_list(){
          $this->db->select("*");
          $this->db->from("tbl_charity");
          $this->db->order_by("id","desc");
          $query=$this->db->get();
          $res=$query->result();
          return $res;
        
        }
        public function news_list(){
          $this->db->select("*");
          $this->db->from("news_latter");
          $this->db->group_by('news_latter.email');
          $this->db->order_by("id","desc");
          $query=$this->db->get();
          $res=$query->result();
          return $res;
        
        }
        public function bin_win_product_list(){
          $this->db->select("*");
          $this->db->from("tbl_bin_win_product");
        
          $this->db->order_by("id","desc");
          $query=$this->db->get();
          $res=$query->result();
          return $res;
        
        }
        public function portfolio_list(){
              $this->db->select("*");
              $this->db->from("tbl_portfolio");
              if(isset($_GET['parent_id']) && !empty($_GET['parent_id'])){
                $this->db->where('parent_id',$_GET['parent_id']);
              }else{
                $this->db->where('parent_id',0);
              }
              $this->db->order_by("id","desc");
              $query=$this->db->get();
              $res=$query->result();
              return $res;
            
            }

	public function deletes1($table, $field, $delete_id) {
        $this->db->trans_start();
        $this->db->delete($table, array($field => $delete_id));
        $this->db->trans_complete();
        return ($this->db->trans_status() === FALSE) ? FALSE : TRUE;
    }  

 
         function single_portfolio_list($id){
          $this->db->select("*");
          $this->db->from("tbl_portfolio");
          $this->db->where('id',$id);
          $query=$this->db->get();
		  //echo $this->db->last_query();
          $res=$query->row();
          return $res;
         }
        
    
		function get_duplicate($tab,$col,$value){
         $this->db->select("*");
         $this->db->from("$tab");
         $this->db->where($col,$value);
         $query=$this->db->get();
         //echo $this->db->last_query();
         $res=$query->num_rows();
         return $res;
        }


  
   /*   public function delete_data($table, $field, $delete_id) {
        $this->db->trans_start();
        $this->db->delete($table, array($field => $delete_id));
        $this->db->trans_complete();
        return ($this->db->trans_status() === FALSE) ? FALSE : TRUE;
    }   */
	
	//Delete method
	public function deletes($table, $field, $delete_id) {
        $this->db->trans_start();
        $this->db->delete($table, array($field => $delete_id));
        $this->db->trans_complete();
        return ($this->db->trans_status() === FALSE) ? FALSE : TRUE;
    }       


}