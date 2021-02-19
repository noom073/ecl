<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_check_user extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session_lib');
        $this->load->library('secure_lib');
        $tokenStatus = $this->session_lib->check_ecl_token();
        if(!$tokenStatus) redirect('main/index');
    }

    public function index()
    {
        $this->load->model('main_model');
        $round = $this->main_model->get_round_test()->row();
        $data['roundsTest'] = $this->main_model->get_rounds_by_round($round->round)->result();
        // var_dump($data['roundsTest']);
        $data['title'] = 'RTES';
        $this->load->view('foundation_view/admin_header_view', $data);
        $this->load->view('admin_check_user_view/index', $data);
        $this->load->view('foundation_view/admin_footer_view');
    }

    public function ajax_get_register_data_by_round()
    {
        $this->load->model('admin_model');
        $idp = $this->input->post('idp', true);
        $roundID = $this->input->post('roundID', true);
        $data = $this->admin_model->get_register_data_by_round($idp, $roundID)->row();               
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($data));
    }

    public function check_tester_qrcode()
    {
        $query = $this->input->get('query', true);
        $queryString = base64_decode($query);
        parse_str($queryString, $data);
        $idp = $data['idp'];
        $round = $data['round'];

        $url = site_url('main/ajax_check_member_register');
        $curlAD = curl_init();
        curl_setopt($curlAD, CURLOPT_URL, $url);
        curl_setopt($curlAD, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curlAD, CURLOPT_POST, true);
        curl_setopt($curlAD, CURLOPT_POSTFIELDS, "idp={$idp}&round={$round}");
        curl_setopt($curlAD, CURLOPT_CAINFO, FCPATH . "assets/ca/cacert.pem");
        $output     = curl_exec($curlAD);
        $curlErr    = curl_error($curlAD);
        if ($curlErr) {
            $curlData['status']  = false;
            $curlData['errno']   = curl_errno($curlAD);
            $curlData['error']   = curl_error($curlAD);
        } else {
            $curlData['status']     = true;
            $curlData['http_code']  = curl_getinfo($curlAD, CURLINFO_HTTP_CODE);
            $curlData['response']   = $output;
        }
        curl_close($curlAD);
        $data = json_decode($curlData['response']);
        var_dump($data);
    }
}
