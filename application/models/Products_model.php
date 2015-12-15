<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Products_model extends CI_Model {
    
    public function __construct() {
        parent::__construct();
    }
    
    /**
     * Get all products
     * 
     * @return array
     */
    public function get_products() {
        $this->db->select('*');
        $this->db->from('products');
        $query = $this->db->get();
        return $query->result();
    }
    
    /**
     * Get single product
     * 
     * @param type $id
     */
    public function get_product_details($id) {
        $this->db->select('*');
        $this->db->from('products');
        $this->db->where('id', $id);
        
        $query = $this->db->get();
        return $query->row();
    }
    
    /**
     * Get all categories
     * 
     * @return array
     */
    public function get_categories() {
        $this->db->select('*');
        $this->db->from('categories');
        $query = $this->db->get();
        return $query->result();
    }
    
    /**
     * Get Most Popular Products
     * 
     * @return type
     */
    public function get_popular() {
        $this->db->select('P.*, COUNT(O.product_id) as total');
        $this->db->from('orders AS O');
        $this->db->join('products AS P', 'O.product_id = P.id', 'INNER');
        $this->db->group_by('O.product_id');
        $this->db->order_by('total', 'desc');
        
        $query = $this->db->get();
        return $query->result();
    }
    
    /**
     * Add Order to Database
     */
    public function add_order($order_data) {
        $insert = $this->db->insert('orders', $order_data);
        return $insert;
    }
}