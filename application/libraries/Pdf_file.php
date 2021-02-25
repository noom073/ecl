<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pdf_file
{
    var $CI;

    public function __construct()
    {
        $this->CI = &get_instance();
        $this->CI->load->library('encryption');
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

    public function generate_pdf($obj)
    {
        // $this->load->library('pdf');
        $this->CI->load->model('main_model');

        $y      = substr($obj->date_test, 0, 4) + 543;
        $m      = $this->CI->main_model->thai_month(substr($obj->date_test, 5, 2));
        $d      = substr($obj->date_test, 8);
        $data['date']   = "$d $m $y";
        $data['obj']    = $obj;

        $this->CI->load->view('pdf_form/register_form', $data);
    }
}
