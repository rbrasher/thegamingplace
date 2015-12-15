<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function register() {
        //Validation Rules
        $this->form_validation->set_rules('first_name', 'First Name', 'trim|required');
        $this->form_validation->set_rules('last_name', 'Last Name', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[4]|max_length[16]');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]|max_length[50]');
        $this->form_validation->set_rules('password2', 'Confirm Password', 'trim|required|matches[password]');
        
        if($this->form_validation->run() == FALSE) {
            //Show view
            $this->load->view('header');
            $this->load->view('register');
            $this->load->view('footer');
        } else {
            if($this->User_model->register()) {
                $this->session->set_flashdata('registered', 'Registration Successful.');
                redirect('products');
            }
        }
    }
    
    public function login() {
        $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[4]|max_length[16]');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]|max_length[50]');
        
        $username = $this->input->post('username');
        $password = md5($this->input->post('password'));
        
        $user_id = $this->User_model->login($username, $password);
        
        //Validate User
        if($user_id) {
            //Create array of user data
            $data = array(
                'user_id' => $user_id,
                'username' => $username,
                'logged_in' => true
            );
            
            //set session data
            $this->session->set_userdata($data);
            
            //set message
            $this->session->set_flashdata('pass_login', 'You are logged in.');
            redirect('products');
        } else {
            //Set error
            $this->session->set_flashdata('fail_login', 'Invalid Login Credentials');
            redirect('products');
        }
    }
    
    public function logout() {
        //Unset user data
        $this->session->unset_userdata('logged_in');
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('user_id');
        $this->session->sess_destroy();
        
        redirect('products');
    }
}