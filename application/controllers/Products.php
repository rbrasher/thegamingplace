<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function index() {
        $data['products'] = $this->Products_model->get_products();
        
        $this->load->view('header', $data);
        $this->load->view('main');
        $this->load->view('footer');
    }
    
    public function details($id) {
        //get product details
        $data['product'] = $this->Products_model->get_product_details($id);
        
        $this->load->view('header', $data);
        $this->load->view('product');
        $this->load->view('footer');
    }
    
    public function category($id) {
        
    }
}
