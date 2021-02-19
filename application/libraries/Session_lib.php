<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Session_lib
{
    var $CI;

    public function __construct()
    {
        $this->CI = &get_instance();
        $this->CI->load->helper('cookie');
        $this->CI->load->library('session');
    }

    public function makeSecure($text, $type)
    {
        if ($type == 'enc') {
            $find = array('+', '=', '/');
            $replace = array('.', '-', '~');

            $encrypted  = $this->CI->encryption->encrypt($text);
            $result  = str_replace($find, $replace, $encrypted);
        } else if ($type == 'dec') {
            $find = array('.', '-', '~');
            $replace = array('+', '=', '/');

            $decrypted  = str_replace($find, $replace, $text);
            $result     = $this->CI->encryption->decrypt($decrypted);
        } else $result = 'fail';

        return $result;
    }

    // public function store_session($array) {
    //     $this->CI->session->set_userdata('token', $array['token']);
    //     $this->CI->session->set_userdata('username', $array['username']);
    //     $this->CI->session->set_userdata('type_user', $array['type']);

    //     return true;
    // }

    // public function check_session_age()
    // {
    //     $this->CI->load->model('auth_model');

    //     $data = $this->CI->auth_model->get_ecl_token('token');
    //     $selectToken = $this->CI->login_model->check_token($token)->row();
    //     if ((time() - strtotime($selectToken->time_create)) > (60 * 60)) {
    //         redirect('main/index');
    //         $result = false;
    //     } else {
    //         $result = true;
    //     }

    //     return $result;
    // }

    public function get_ecl_token()
    {
        $token = get_cookie('ecl-token', true);
        return $token;
    }

    public function check_ecl_token()
    {
        $this->CI->load->model('auth_model');
        $eclToken = $this->get_ecl_token();
        $result = $this->CI->auth_model->get_ecl_token_from_db($eclToken);
        if ($result->num_rows()) {
            $status =  true;
        } else {
            $status =  true;
        }
        return $status;
    }

    public function clear_all_cookies()
    {
        delete_cookie('ecl-token');
        delete_cookie('rtarf-token');
    }
}
