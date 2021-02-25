<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->helper('url');
        $this->load->helper('string');
        $this->load->library('session_lib');
<<<<<<< HEAD
        $this->load->library('authentication');
=======
>>>>>>> e2d40a59919f96660da7aa7f439cf679458af65b
    }

	public function ajax_login_proc() {
        $this->load->model('login_model');

<<<<<<< HEAD
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
=======
        $username = $this->input->post('user');
        $password = hash('sha256', $this->input->post('password'));

        $login = $this->login_model->get_login($username, $password);
        if ($login->num_rows() == 1) {
            $array    = $login->row_array();
            $data['token']          = random_string('alnum', 32);
            $data['username']       = $array['username'];
            $data['type']           = $array['type'];
            $insert = $this->login_model->insert_token($data);

            if ($insert) {
                $this->session_lib->store_session($data);

                $result['status']   = true;
                $result['text']     = 'รหัสผู้ใช้เข้าสู่ระบบสำเร็จ';
            } else {
                $result['status']   = false;
                $result['text']     = 'รหัสผู้ใช้เข้าสู่ระบบไม่ได้';
            }            

        } else {
            $result['status']   = false;
            $result['text']     = 'รหัสผู้ใช้ไม่ถูกต้อง';
        }
        
        echo json_encode($result);

        // echo json_encode($data);
		// $this->load->view('foundation_view/admin_header_view');
		// $this->load->view('main_view/main_index');
		// $this->load->view('foundation_view/admin_footer_view');
    }
    
    public function ajax_get_logout() {
        $this->load->model('login_model');

        $token  = $this->session->userdata('token');
        $logout = $this->login_model->get_logout($token);

        if ($logout) {
            $this->session->sess_destroy();

>>>>>>> e2d40a59919f96660da7aa7f439cf679458af65b
            $result['status']   = true;
        } else {
            $result['status']   = false;
            $result['text']     = 'ออกจากระบบไม่ได้';
        }

        echo json_encode($result);
        
    }
}
