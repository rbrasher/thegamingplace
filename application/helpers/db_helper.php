<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Get Categories
 * 
 * @return type
 */
function get_categories_h() {
    $CI = get_instance();
    $categories = $CI->Products_model->get_categories();
    return $categories;
}

function get_popular_h() {
    $CI =& get_instance();
    $CI->load->model('Products_model');
    $popular_products = $CI->Products_model->get_popular();
    return $popular_products;
}