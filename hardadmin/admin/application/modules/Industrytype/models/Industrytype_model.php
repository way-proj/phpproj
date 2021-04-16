<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Industrytype_model extends CI_Model{
	
  
        
        public function industrytype(){
              $this->db->select("*");
              $this->db->from("tbl_industrytype");
              $this->db->order_by("id","desc");
              $query=$this->db->get();
              $res=$query->result();
              return $res;
            
            }

	    function single_industrytype($id){
          $this->db->select("*");
          $this->db->from("tbl_industrytype");
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
  
	//Delete method
	public function deletes($table, $field, $delete_id) {
        $this->db->trans_start();
        $this->db->delete($table, array($field => $delete_id));
        $this->db->trans_complete();
        return ($this->db->trans_status() === FALSE) ? FALSE : TRUE;
    }       


	public function save_industrytype($post_data){
      
		     //print_r($insert_data);
         $this->db->insert('tbl_industrytype',$insert_data); 
        
       
       return $insert_id;
		
		
    }	

}