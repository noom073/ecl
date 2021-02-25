<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->helper('url');
        $this->load->helper('string');
        $this->load->library('session_lib');
        $this->load->library('authentication');
    }

	public function ajax_login_proc() {
        $this->load->model('login_model');

        $username = $this->input->post('user', true);
        $password = $this->input->post('password', true);
        $loginResult = $this->authentication->process_login($username, $password);   
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($loginResult));     
    }
    
    public function ajax_get_logout() {
        $this->load->model('auth_model');
        $token  = $this->session_lib->get_ecl_token();
        $logout = $this->auth_model->logout_all_token($token);
        if ($logout) {
            $this->session_lib->clear_all_cookies();
            $result['status']   = true;
        } else {
            $result['status']   = false;
            $result['text']     = 'ออกจากระบบไม่ได้';
        }

        echo json_encode($result);
        
    }
}
