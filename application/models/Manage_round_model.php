<?php
<<<<<<< HEAD
defined('BASEPATH') or exit('No direct script access allowed');

class Manage_round_model extends CI_Model
{

    var $mysql, $oracle;

    public function __construct()
    {
=======
defined('BASEPATH') OR exit('No direct script access allowed');

class Manage_round_model extends CI_Model {

    var $mysql, $oracle;

    public function __construct(Type $var = null) {
>>>>>>> e2d40a59919f96660da7aa7f439cf679458af65b
        $this->mysql  = $this->load->database('mysql', true);
        $this->oracle = $this->load->database('person1', true);
    }

<<<<<<< HEAD
    public function list_rounds()
    {
        $query = $this->mysql->query("SELECT a.row_id, a.round, a.date_test, a.time_test, a.time_create, 
            a.time_update, a.active, a.total_seat as total,
            (
            select count(*)
            from ecl2_register c
            where c.active = 'y'
            and c.round_id = a.row_id 
            and c.idp is not null
            ) as member,
            b.room_name
            FROM ecl2_round a 
            LEFT JOIN ecl2_room b 
                ON a.room_id = b.row_id 
            group by a.row_id
            ORDER BY a.date_test DESC, a.time_test DESC");
        // echo $this->mysql->last_query();
        return $query;
    }

    public function check_dup_round($array)
    {
        $this->mysql->where('round', $array['round']);
        $this->mysql->where('room_id', $array['room_id']);
        $this->mysql->where('date_test', $array['date']);
        $this->mysql->where('time_test', $array['time']);

        $query = $this->mysql->get('ecl2_round');
=======
    public function list_rounds() {
        $this->mysql->select('a.row_id, a.round, a.date_test, a.time_test, max(a.time_create) as time_create, 
            max(a.time_update) as time_update, a.active,
            case 
                when c.row_id is not null then count(*)
                else 0
            end as total,            
            (select count(*) 
            from ecl2_register 
            where round_id = a.row_id 
            and (idp is not null and idp not like "")) as member,
            b.room_name');
        $this->mysql->join('ecl2_room b', 'a.room_id = b.row_id', 'left');
        $this->mysql->join('ecl2_register c', 'a.row_id = c.round_id and c.active = "y"', 'left');
        $this->mysql->group_by('a.row_id');
        $this->mysql->order_by('a.date_test DESC, a.time_test DESC');
        $query = $this->mysql->get('ecl2_round a');
        // echo $this->mysql->last_query();
>>>>>>> e2d40a59919f96660da7aa7f439cf679458af65b

        return $query;
    }

<<<<<<< HEAD
    public function check_dup_round_before_update($array)
    {
        $this->mysql->not_like('row_id', $array['round_id']);
=======
    public function check_dup_round($array) {
>>>>>>> e2d40a59919f96660da7aa7f439cf679458af65b
        $this->mysql->where('round', $array['round']);
        $this->mysql->where('room_id', $array['room_id']);
        $this->mysql->where('date_test', $array['date']);
        $this->mysql->where('time_test', $array['time']);

        $query = $this->mysql->get('ecl2_round');

        return $query;
    }

<<<<<<< HEAD
    public function insert_round($array)
    {
        $field['round']         = $array['round'];
        $field['room_id']       = $array['room_id'];
        $field['date_test']     = $array['date'];
        $field['time_test']     = $array['time'];
        $field['active']        = 'y';
        $field['total_seat']    = $array['amountSeat'];
        $field['time_create']   = date("Y-m-d H:i:s");
        $field['user']          = "{$this->session->username}#{$this->input->ip_address()}";
        $query['round'] = $this->mysql->insert('ecl2_round', $field);
=======
    public function insert_round($array) {
        $this->mysql->trans_begin();

        $field['round']         = $array['round']; 
        $field['room_id']       = $array['room_id']; 
        $field['date_test']     = $array['date']; 
        $field['time_test']     = $array['time']; 
        $field['active']        = 'y'; 
        $field['time_create']   = date("Y-m-d H:i:s");
        $field['user']          = "{$this->session->username}#{$this->input->ip_address()}";

        $amountSeats = $array['amountSeat'];  

        $query['round'] = $this->mysql->insert('ecl2_round', $field);
        $insert_id = $this->mysql->insert_id();

        for ($i=0; $i < $amountSeats; $i++) { 
            $registerField['seat_number']   = $i+1;
            $registerField['confirm']       = 'n';
            $registerField['round_id']      = $insert_id;
            $registerField['round']         = $field['round'];
            $registerField['active']        = 'y';
            $registerField['time_create']   = date("Y-m-d H:i:s");
            $registerField['user']          = "{$this->session->username}#{$this->input->ip_address()}";

            $query['register'] = $this->mysql->insert('ecl2_register', $registerField);
        }

>>>>>>> e2d40a59919f96660da7aa7f439cf679458af65b
        if ($this->mysql->trans_status() === FALSE) {
            $this->mysql->trans_rollback();
            $result = false;
        } else {
            $this->mysql->trans_commit();
            $result = true;
        }
<<<<<<< HEAD
        return $result;

        // $this->mysql->trans_begin();
        // $field['round']         = $array['round']; 
        // $field['room_id']       = $array['room_id']; 
        // $field['date_test']     = $array['date']; 
        // $field['time_test']     = $array['time']; 
        // $field['active']        = 'y'; 
        // $field['time_create']   = date("Y-m-d H:i:s");
        // $field['user']          = "{$this->session->username}#{$this->input->ip_address()}";
        // $amountSeats = $array['amountSeat'];  
        // $query['round'] = $this->mysql->insert('ecl2_round', $field);
        // $insert_id = $this->mysql->insert_id();
        // for ($i=0; $i < $amountSeats; $i++) { 
        //     $registerField['seat_number']   = $i+1;
        //     $registerField['confirm']       = 'n';
        //     $registerField['round_id']      = $insert_id;
        //     $registerField['round']         = $field['round'];
        //     $registerField['active']        = 'y';
        //     $registerField['time_create']   = date("Y-m-d H:i:s");
        //     $registerField['user']          = "{$this->session->username}#{$this->input->ip_address()}";

        //     $query['register'] = $this->mysql->insert('ecl2_register', $registerField);
        // }
        // if ($this->mysql->trans_status() === FALSE) {
        //     $this->mysql->trans_rollback();
        //     $result = false;
        // } else {
        //     $this->mysql->trans_commit();
        //     $result = true;
        // }
        // return $result;
    }

    public function list_room()
    {
=======

        return $result;
    }

    public function list_room() {
>>>>>>> e2d40a59919f96660da7aa7f439cf679458af65b
        $this->mysql->select('row_id, room_name');
        $query = $this->mysql->get('ecl2_room');

        return $query;
    }

<<<<<<< HEAD
    public function update_round($array)
    {
        $field['date_test']     = $array['date'];
        $field['time_test']     = "{$array['hour']}:{$array['minute']}:00";
        $field['room_id']       = $array['room'];
        $field['round']         = $array['round'];
        $field['total_seat']    = $array['totalSeat'];
        $field['time_update']   = date("Y-m-d H:i:s");
        $field['user']          = "{$this->session->username}#{$this->input->ip_address()}";

        $chkData['round_id'] = $array['round_id'];
        $chkData['round']   = $field['round'];
        $chkData['room_id'] = $field['room_id'];
        $chkData['date']    = $field['date_test'];
        $chkData['time']    = $field['time_test'];
        $checkDuplicatRound = $this->check_dup_round_before_update($chkData)->num_rows();
        if ($checkDuplicatRound == 0) {
            $this->mysql->where('row_id', $array['round_id']);
            $query = $this->mysql->update('ecl2_round', $field);
            return $query;
        } else {
            return false;
        }
    }

    public function get_registered_data($id)
    {
=======
    public function update_round($array) {
        $field['date_test']     = $array['date'];
        $field['time_test']     = "{$array['hour']}:{$array['minute']}";
        $field['room_id']       = $array['room'];
        $field['round']         = $array['round'];
        $field['time_update']   = date("Y-m-d H:i:s");
        $field['user']          = "{$this->session->username}#{$this->input->ip_address()}";

        $this->mysql->where('row_id', $array['round_id']);
        $query = $this->mysql->update('ecl2_round', $field);

        return $query;
    }

    public function get_registered_data($id) {
>>>>>>> e2d40a59919f96660da7aa7f439cf679458af65b
        $this->mysql->select('a.row_id, a.idp, a.name, a.unit_name, a.tel_number, a.seat_number, a.confirm, 
            a.active, a.time_user_register,
            b.date_test, b.time_test, b.round,
            c.room_name, c.address');
        $this->mysql->join('ecl2_round b', 'a.round_id = b.row_id', 'left');
        $this->mysql->join('ecl2_room c', 'b.room_id = c.row_id', 'left');
<<<<<<< HEAD
        $this->mysql->where('a.round_id', $id);
=======
        $this->mysql->where('a.round_id', $id );
>>>>>>> e2d40a59919f96660da7aa7f439cf679458af65b
        $query = $this->mysql->get('ecl2_register a');
        // echo $this->mysql->last_query();

        return $query;
    }

<<<<<<< HEAD
    public function disable_seat($row_id)
    {

=======
    public function disable_seat($row_id) {
        
>>>>>>> e2d40a59919f96660da7aa7f439cf679458af65b
        $field['active']        = 'n';
        $field['time_update']   = date("Y-m-d H:i:s");
        $field['user']          = "{$this->session->username}#{$this->input->ip_address()}";

        $this->mysql->where('row_id', $row_id);
        $query = $this->mysql->update('ecl2_register', $field);
        // echo $this->mysql->last_query();

        return $query;
    }

<<<<<<< HEAD
    public function enable_seat($row_id)
    {

=======
    public function enable_seat($row_id) {
        
>>>>>>> e2d40a59919f96660da7aa7f439cf679458af65b
        $field['active']        = 'y';
        $field['time_update']   = date("Y-m-d H:i:s");
        $field['user']          = "{$this->session->username}#{$this->input->ip_address()}";

        $this->mysql->where('row_id', $row_id);
        $query = $this->mysql->update('ecl2_register', $field);
        // echo $this->mysql->last_query();

        return $query;
    }

<<<<<<< HEAD
    public function clear_seat($row_id)
    {

=======
    public function clear_seat($row_id) {
        
>>>>>>> e2d40a59919f96660da7aa7f439cf679458af65b
        $field['idp']           = null;
        $field['name']          = null;
        $field['email']         = null;
        $field['tel_number']    = null;
        $field['unit_code']     = null;
        $field['unit_name']     = null;
        $field['time_update']   = date("Y-m-d H:i:s");
        $field['user']          = "{$this->session->username}#{$this->input->ip_address()}";

        $this->mysql->where('row_id', $row_id);
<<<<<<< HEAD
        $query = $this->mysql->update('ecl2_register', $field);
=======
        $query = $this->mysql->update('ecl2_register', $field);        
>>>>>>> e2d40a59919f96660da7aa7f439cf679458af65b

        return $query;
    }

<<<<<<< HEAD
    public function disable_round($row_id)
    {

=======
    public function disable_round($row_id) {
       
>>>>>>> e2d40a59919f96660da7aa7f439cf679458af65b
        $field['active']        = 'n';
        $field['time_update']   = date("Y-m-d H:i:s");
        $field['user']          = "{$this->session->username}#{$this->input->ip_address()}";

        $this->mysql->where('row_id', $row_id);
<<<<<<< HEAD
        $query = $this->mysql->update('ecl2_round', $field);
=======
        $query = $this->mysql->update('ecl2_round', $field);        
>>>>>>> e2d40a59919f96660da7aa7f439cf679458af65b

        return $query;
    }

<<<<<<< HEAD
    public function enable_round($row_id)
    {

=======
    public function enable_round($row_id) {
       
>>>>>>> e2d40a59919f96660da7aa7f439cf679458af65b
        $field['active']        = 'y';
        $field['time_update']   = date("Y-m-d H:i:s");
        $field['user']          = "{$this->session->username}#{$this->input->ip_address()}";

        $this->mysql->where('row_id', $row_id);
<<<<<<< HEAD
        $query = $this->mysql->update('ecl2_round', $field);
=======
        $query = $this->mysql->update('ecl2_round', $field);        
>>>>>>> e2d40a59919f96660da7aa7f439cf679458af65b

        return $query;
    }

<<<<<<< HEAD
    public function get_register_detail($id)
    {
=======
    public function get_register_detail($id) {
>>>>>>> e2d40a59919f96660da7aa7f439cf679458af65b
        $this->mysql->select('a.idp, a.name, a.unit_name, a.seat_number,
            b.date_test, b.time_test, b.round,
            c.room_name');
        $this->mysql->join('ecl2_round b', 'a.round_id = b.row_id', 'left');
<<<<<<< HEAD
        $this->mysql->join('ecl2_room c', 'b.room_id = c.row_id', 'left');
=======
        $this->mysql->join('ecl2_room c', 'b.room_id = c.row_id', 'left');            
>>>>>>> e2d40a59919f96660da7aa7f439cf679458af65b
        $this->mysql->where('a.row_id', $id);
        $query = $this->mysql->get('ecl2_register a');
        // echo $this->mysql->last_query();

        return $query;
    }

<<<<<<< HEAD
    public function check_round_in_register($row_id)
    {
=======
    public function check_round_in_register($row_id) {
>>>>>>> e2d40a59919f96660da7aa7f439cf679458af65b
        $this->mysql->where("(idp is not null and idp not like '')");
        $this->mysql->where('round_id', $row_id);
        $query = $this->mysql->get('ecl2_register');
        // echo $this->mysql->last_query();

        return $query;
    }

<<<<<<< HEAD
    public function delete_round($row_id)
    {
        $this->mysql->trans_begin();
        $register_field['round_id'] = $row_id;
        $this->mysql->delete('ecl2_register', $register_field);

        $round_field['row_id'] = $row_id;
        $this->mysql->delete('ecl2_round', $round_field);
=======
    public function delete_round($row_id) {
        $this->mysql->trans_begin();
            $register_field['round_id'] = $row_id;
            $this->mysql->delete('ecl2_register', $register_field);

            $round_field['row_id'] = $row_id;
            $this->mysql->delete('ecl2_round', $round_field);
>>>>>>> e2d40a59919f96660da7aa7f439cf679458af65b

        if ($this->mysql->trans_status() === FALSE) {
            $this->mysql->trans_rollback();
            $result = false;
        } else {
            $this->mysql->trans_commit();
            $result = true;
        }


        return $result;
    }
<<<<<<< HEAD
}
=======

}
>>>>>>> e2d40a59919f96660da7aa7f439cf679458af65b
