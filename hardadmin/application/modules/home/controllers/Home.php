<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MX_Controller {
         function __construct(){
			parent::__construct();
			$this->load->model('Home_model');
			$this->load->library('session');
            $this->load->model('../../Common/Crud_model');
			$this->load->helper(array('form', 'url','new'));

		   }

        public function index()
	       { 
			$data['home_category'] = $this->Home_model->GetHomeCategory();
			$data['random_product'] = $this->Home_model->random_product_by_industry();
		    $data['subview']="home_page";
		    $this->load->view('layout/default', $data);
	       }

   

}
