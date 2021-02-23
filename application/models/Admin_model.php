<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_model extends CI_Model
{

    var $mysql, $oracle;

    public function __construct()
    {
        $this->mysql  = $this->load->database('mysql', true);
        $this->oracle = $this->load->database('person1', true);
    }


    public function list_rooms()
    {
        $query = $this->mysql->get('ecl2_room');

        return $query;
    }

    public function check_dup_room($array)
    {
        $this->mysql->where('room_name', $array['room_name']);
        $query = $this->mysql->get('ecl2_room');

        return $query;
    }

    public function check_room_before_update($array)
    {
        $this->mysql->where('room_name', $array['room_name']);
        $this->mysql->where('row_id <>', $array['row_id']);
        $query = $this->mysql->get('ecl2_room');
        // echo $this->mysql->last_query();
        return $query;
    }

    public function insert_room($array)
    {
        $field['room_name']     = $array['room_name'];
        $field['address']       = $array['address'];
        $field['time_create']   = date("Y-m-d H:i:s");
        $field['user']          = "{$this->session->username}#{$this->input->ip_address()}";

        $query = $this->mysql->insert('ecl2_room', $field);

        return $query;
    }
    public function update_room($array)
    {
        $field['room_name']     = $array['room_name'];
        $field['address']       = $array['address'];
        $field['time_update']   = date("Y-m-d H:i:s");
        $field['user']          = "{$this->session->username}#{$this->input->ip_address()}";

        $this->mysql->where('row_id', $array['row_id']);
        $query = $this->mysql->update('ecl2_room', $field);

        return $query;
    }

    public function check_room_in_round($row_id)
    {
        $this->mysql->where('room_id', $row_id);
        $query = $this->mysql->get('ecl2_round');

        return $query;
    }

    public function delete_room($row_id)
    {
        $this->mysql->where('row_id', $row_id);
        $query = $this->mysql->delete('ecl2_room');

        return $query;
    }

    public function get_register_data_by_round($idp, $roundID)
    {
        $sql = "select a.idp, a.seat_number, a.name, a.unit_name, a.round_id,
            a.row_id,
            b.date_test, b.time_test,
            c.room_name
            from ecl2_register a
            inner join ecl2_round b
                on a.round_id = b.row_id
                and b.row_id = ?
            inner join ecl2_room c
                on b.room_id = c.row_id
            where a.idp = ?";
        $query = $this->mysql->query($sql, array($roundID, $idp));
        return $query;
    }

    public function update_checkin($rowID, $status, $updater)
    {        
        $this->mysql->set('checked', $status);
        $this->mysql->set('user', "{$updater}#{$this->input->ip_address()}");
        $this->mysql->set('time_update', date("Y-m-d H:i:s"));
        $this->mysql->where('row_id', $rowID);
        $query = $this->mysql->update('ecl2_register');
        return $query;
    }

    public function tester_total()
    {
        $sql = "select a.round_id,
            (
                select count(*)
                from ecl2_register
                where round_id = a.round_id
            ) as total_seat,
            count(*) total_tester, 
            (
                select count(*)
                from ecl2_register
                where round_id = a.round_id
                and checked like 'y'
            ) as total_checkin,
            b.date_test, b.time_test,
            c.room_name 
        from ecl2_register a
        inner join ecl2_round b 
            on a.round_id = b.row_id 
        inner join ecl2_room c 
            on b.room_id = c.row_id 
        where a.idp is not null
        group by a.round_id
        order by b.row_id desc
        ";

        $query = $this->mysql->query($sql);
        return $query;
    }
    
}
