<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_model extends CI_Model{
	
	function home_top_silider_data(){
         $this->db->select("*");
         $this->db->from("home_top_silider");
         $this->db->order_by('id','desc');
         $query=$this->db->get();
         $res=$query->result();
         return $res;
	   } 
	 
 function product_list(){
         $this->db->select("*");
         $this->db->from("tbl_products");
         $this->db->order_by("id","desc");
         //$this->db->where('status','1');
         $this->db->limit(0,5);
         $query=$this->db->get();
         $res=$query->result();
         return $res;

   }
function product_list2(){
         $this->db->select("*");
         $this->db->from("tbl_products");
         //$this->db->order_by("id","desc");
         //$this->db->where('status','1');
         $this->db->limit(6,4);
         $query=$this->db->get();
         $res=$query->result();
         return $res;

   }
   function single_product_list($pid){
         $this->db->select("*");
         $this->db->where('id',$pid);
         $this->db->from("tbl_products");
         $query=$this->db->get();
         $res=$query->result();
         return $res;

   }
   function get_product_gallery_details($p_id){
         $this->db->select("tbl_product_attribute.id,product_attribute_image.image,tbl_product_attribute.price_mrp,tbl_product_attribute.sp_price,tbl_product_attribute.margin_price,tbl_product_attribute.qty,tbl_product_attribute.weight");
         $this->db->from("tbl_product_attribute");
         $this->db->join("product_attribute_image","tbl_product_attribute.id=product_attribute_image.attr_id");
         $this->db->where('tbl_product_attribute.product_id',$p_id);
         $this->db->group_by("product_attribute_image.attr_id","asc");
         $query=$this->db->get();
         //echo $this->db->last_query();
         $res=$query->result();
         return $res;

   }
 function get_product_gallery_details_attr($p_id,$attr_id){
         $this->db->select("tbl_product_attribute.id,product_attribute_image.image,tbl_product_attribute.price_mrp,tbl_product_attribute.sp_price,tbl_product_attribute.margin_price,tbl_product_attribute.qty,tbl_product_attribute.weight");
         $this->db->from("tbl_product_attribute");
         $this->db->join("product_attribute_image","tbl_product_attribute.id=product_attribute_image.attr_id");
         $this->db->where('tbl_product_attribute.product_id',$p_id);
          $this->db->where('product_attribute_image.attr_id',$attr_id);
         $this->db->group_by("product_attribute_image.attr_id","asc");
         $query=$this->db->get();
         //echo $this->db->last_query();
         $res=$query->result();
         return $res;

   }
   
   
   function home_content_data(){
        $this->db->select("*");
        $this->db->from("tbl_cms");
		$this->db->where('slug',"home");
        //$this->db->order_by('id','desc');
        $query=$this->db->get();
      
		$res=$query->result();
        return $res;
	   } 
	   
	public function GetHomeCategory(){
         $this->db->select("*");
         $this->db->from("tbl_products");
         //$this->db->order_by("id","desc");
        // $this->db->order_by("created_date", "asc");
         $this->db->where('status','1');
         $this->db->limit("6");
         $query=$this->db->get();
         $res=$query->result();
         return $res;

   }    
   

public function random_product_by_industry(){
		$this->db->select("tbl_products.*,tbl_product_attribute.id as attr_id,product_attribute_image.image,tbl_industrytype.industrytype_title");
		$this->db->from("tbl_products");
		$this->db->join("tbl_product_attribute",'tbl_product_attribute.product_id=tbl_products.id');

		$this->db->join('product_attribute_image', 'product_attribute_image.attr_id=tbl_product_attribute.id', 'left');
		$this->db->join('tbl_industrytype', 'tbl_industrytype.id=tbl_products.industrytype', 'left');

		$this->db->group_by("tbl_product_attribute.product_id","asc");
		$this->db->order_by('rand()');
		$this->db->limit(1);
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


}