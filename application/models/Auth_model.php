<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth_model extends CI_Model
{
    var $mysql;

    public function __construct()
    {
        $this->mysql = $this->load->database('mysql', true);
    }

    // public function get_user_type($userID)
    // {
    //     $sql = "SELECT B.TYPE_ID, B.TYPE_NAME 
    //         FROM PIMIS_USER_PRIVILEGES A
    //         INNER JOIN PIMIS_USER_TYPE B 
    //             ON A.TYPE_ID = B.TYPE_ID 
    //         WHERE A.USER_ID = ?
    //         AND A.STATUS = 'y' 
    //         ORDER BY B.ORDER_NUMBER";
    //     $query = $this->oracle->query($sql, array($userID));
    //     return $query;
    // }

    public function get_user($rtarfMail)
    {
        $sql = "select *
            from ecl2_mail_user
            where email = ?";
        $query = $this->mysql->query($sql, array($rtarfMail));
        return $query;
    }

    public function check_duplicate_token($token)
    {
        $sql = "select *
            from ecl2_token
            where token = ?
            and active = 'y'";
        $query = $this->mysql->query($sql, $token);
        return $query;
    }

    public function insert_token($token, $email)
    {
        $this->mysql->set('token', $token);
        $this->mysql->set('username', $email);
        $this->mysql->set('active', 'y');
        $this->mysql->set('time_create', date("Y-m-d H:i:s"));
        $query = $this->mysql->insert('ecl2_token');
        return $query;
    }

    public function disable_token($token)
    {
        $this->oracle->set('active', 'n');
        $this->oracle->set('time_update', date("Y-m-d H:i:s"));
        $this->oracle->where('token', $token);
        $query = $this->oracle->update('ecl2_token');
        return $query;
    }

    public function get_ecl_token_from_db($token)
    {
        $this->mysql->where('token', $token);
        $this->mysql->where('active', 'y');
        $query = $this->mysql->get('ecl2_token');
        return $query;
    }

    public function logout_all_token($eclToken) {
        $data['time_update']    = date("Y-m-d H:i:s");
        $data['active']         = 'n';
        $this->mysql->where('token', $eclToken);
        $query = $this->mysql->update('ecl2_token', $data);
        return $query;
    }

    // public function get_user_id($token)
    // {
    //     $this->oracle->select('USER_ID');
    //     $this->oracle->where('TOKEN', $token);
    //     $this->oracle->where('ACTIVE', 'y');
    //     $query = $this->oracle->get('PIMIS_TOKEN_DATA');
    //     return $query;
    // }

    // public function get_email($userID)
    // {
    //     $this->oracle->select('EMAIL');
    //     $this->oracle->where('USER_ID', $userID);
    //     $this->oracle->where('STATUS', 'y');
    //     $query = $this->oracle->get('PIMIS_USER');
    //     return $query;
    // }

    // public function get_user_by_id($userID)
    // {
    //     $sql = "SELECT *
    //         FROM PIMIS_USER 
    //         WHERE USER_ID = ?";
    //     $query = $this->oracle->query($sql, array($userID))->row_array();
    //     return "{$query['TITLE']} {$query['FIRSTNAME']}  {$query['LASTNAME']}";
    // }
}
