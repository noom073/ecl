<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Main_model extends CI_Model
{

    var $mysql, $oracle;

    public function __construct($var = null)
    {
        $this->mysql  = $this->load->database('mysql', true);
        $this->oracle = $this->load->database('person1', true);
    }

    public function check_avaiable_round()
    {
        // $query = $this->oracle->query('select * from tab');
        $this->mysql->where('active', 'y');
        $query = $this->mysql->get('ecl2_round');

        return $query;
    }

    public function check_member($idp)
    {
        $this->oracle->select('a.BIOG_NAME, a.BIOG_IDP, a.BIOG_UNIT, BIOG_UNITNAME, 
            b.REG_USERNAME');
        $this->oracle->join('RTARFMAIL.REGISTER_TAB b', "a.BIOG_IDP = b.REG_CID", "left");
        $this->oracle->where('a.BIOG_IDP', $idp);
        $query = $this->oracle->get('PER_BIOG_VIEW a');

        return $query;
    }

    public function check_registered($idp, $round)
    {
        $this->mysql->select('a.idp, a.seat_number, a.name, a.unit_name, a.round_id,
            a.row_id,
            b.date_test, b.time_test,
            c.room_name');
        $this->mysql->join('ecl2_round b', "a.round_id = b.row_id
            and b.round = '{$round}' ");
        $this->mysql->join('ecl2_room c', "b.room_id = c.row_id");
        $this->mysql->where('idp', $idp);
        $query = $this->mysql->get('ecl2_register a');
        // echo $this->mysql->last_query();

        return $query;
    }

    public function list_round_can_register($round)
    {
        $sql = "SELECT a.row_id, a.date_test, a.time_test, a.room_id, a.active, a.round, a.total_seat, 
            b.room_name, 
            (
                select count(*)
                from ecl2_register c
                where c.round_id = a.row_id 
            ) as total
            FROM ecl2_round a 
            LEFT JOIN ecl2_room b 
                ON a.room_id = b.row_id 
            WHERE a.active = 'y' 
            AND a.round = ? 
            and (
                select count(*)
                from ecl2_register c
                where c.round_id = a.row_id 
            ) < a.total_seat
            GROUP BY a.row_id";
        $query = $this->mysql->query($sql, array($round));

        return $query;
    }

    public function regester_member($array)
    {
        $round_id = $array['round_id'];
        $maxSeat = $this->check_max_seat($round_id)->row()->total_seat;

        $maxCycle = false;
        $cycleCheck = 0;
        do {
            $cycleCheck++;
            $seat_number = rand(1, $maxSeat);
            $numRow = $this->check_dup_seat($seat_number, $round_id)->num_rows();
            $isDuplicate = $numRow == 1 ? true : false;
            if ($cycleCheck > 1000) {
                $maxCycle = true;
                break;
            };
        } while ($isDuplicate === true && $maxCycle === false);
        if ($maxCycle) {
            $query['status'] = false;
            $query['text'] = 'Register request time out';
        } else {
            $chk_second = $this->check_dup_seat($seat_number, $round_id)->num_rows();
            $isNotFull = $this->check_register_room_full($array['round_id']);
            if ($chk_second == 0 && $isNotFull) { // check dubplicate and not full second
                $field['round']                 = $array['round'];
                $field['round_id']              = $array['round_id'];
                $field['idp']                   = $array['idp'];
                $field['name']                  = $array['name'];
                $field['email']                 = $array['email'];
                $field['tel_number']            = $array['tel_number'];
                $field['unit_code']             = $array['unit_code'];
                $field['unit_name']             = $array['unit_name'];
                $field['seat_number']           = $seat_number;
                $field['confirm']               = 'n';
                $field['active']                = 'y';
                $field['time_user_register']    = "{$this->input->ip_address()}#" . date("Y-m-d H:i:s");
                $query['status']        = $this->mysql->insert('ecl2_register', $field);
                $query['seat_number']   = $seat_number;
                $query['round_id']      = $round_id;
            } else {
                $query['status'] = false;
                $query['text'] = 'Registered';
            }
        }
        return $query;
    }

    public function check_register_room_full($round_id)
    {
        $sql = "SELECT count(*) AS amount
        FROM ecl2_register
        WHERE round_id = ?";
        $query = $this->mysql->query($sql, array($round_id));

        $currentAmount = $query->row()->amount;
        $totalAmount = $this->check_max_seat($round_id)->row()->total_seat;
        $result = $currentAmount < $totalAmount ? true : false;
        return $result;
    }

    public function check_dup_seat($seat, $round_id)
    {
        $this->mysql->where('seat_number', $seat);
        $this->mysql->where('round_id', $round_id);
        $this->mysql->where('active', 'y');
        $this->mysql->where("idp is not null");
        $query = $this->mysql->get('ecl2_register');

        return $query;
    }

    public function check_max_seat($round_id)
    {
        $this->mysql->select('total_seat');
        $this->mysql->where('row_id', $round_id);
        $query = $this->mysql->get('ecl2_round');

        return $query;
    }

    public function get_seat_detail_registered($seat, $round_id)
    {
        $this->mysql->select('a.name, a.unit_name, a.seat_number, a.idp,
            b.round, b.date_test, b.time_test,
            c.room_name');
        $this->mysql->join('ecl2_round b', 'a.round_id = b.row_id');
        $this->mysql->join('ecl2_room c', 'b.room_id = c.row_id');
        $this->mysql->where('a.seat_number', $seat);
        $this->mysql->where('a.round_id', $round_id);
        $this->mysql->where("(a.idp is not null or a.idp not like '')");
        $query = $this->mysql->get('ecl2_register a');

        return $query;
    }

    public function get_email($idp)
    {
        $this->oracle->select('REG_CID, REG_FULLNAME, REG_USERNAME');
        $this->oracle->where('REG_CID', $idp);
        $query = $this->oracle->get('RTARFMAIL.REGISTER_TAB');

        return $query;
    }

    public function thai_month($mm)
    {
        $month['01'] = "??????????????????";
        $month['02'] = "??????????????????????????????";
        $month['03'] = "??????????????????";
        $month['04'] = "??????????????????";
        $month['05'] = "?????????????????????";
        $month['06'] = "????????????????????????";
        $month['07'] = "?????????????????????";
        $month['08'] = "?????????????????????";
        $month['09'] = "?????????????????????";
        $month['10'] = "??????????????????";
        $month['11'] = "???????????????????????????";
        $month['12'] = "?????????????????????";

        return $month[$mm];
    }

    public function confirm_key($array)
    {
        $field['confirm_key']   = $array['key'];
        $field['round_id']      = $array['round_id'];
        $field['seat_number']   = $array['seat_number'];
        $field['time_create']   = date("Y-m-d H:i:s");
        $query = $this->mysql->insert('ecl2_confirm_key', $field);

        return $query;
    }

    public function check_confirm_key($key)
    {
        $this->mysql->where('confirm_key', $key);
        $query = $this->mysql->get('ecl2_confirm_key');

        return $query;
    }

    public function set_confirm($round_id, $seat_number)
    {
        $field['confirm']   = 'y';
        $this->mysql->where('round_id', $round_id);
        $this->mysql->where('seat_number', $seat_number);
        $query = $this->mysql->update('ecl2_register', $field);

        return $query;
    }

    public function get_round_test()
    {
        $this->mysql->select('distinct(round) as round');
        // $this->mysql->where('active', 'y');
        $this->mysql->order_by('round', 'desc');
        $query = $this->mysql->get('ecl2_round');

        return $query;
    }

    public function check_score($idp)
    {
        $md         = date("m-d");
        $currYear   = date("Y") . "-" . $md;
        $agoYear    = date("Y") - 2 . "-" . $md;

        $this->mysql->select('a.name, a.unit_name, a.score_test
            ,b.round, b.date_test, b.time_test
            ,c.room_name');
        $this->mysql->join('ecl2_round b', 'a.round_id = b.row_id');
        $this->mysql->join('ecl2_room c', 'b.room_id = c.row_id');
        $this->mysql->where('a.idp', $idp);
        $this->mysql->where('a.score_test is not null');
        $this->mysql->where('a.score_test is not null');
        $this->mysql->where("b.date_test >= '$agoYear'");
        $this->mysql->where("b.date_test <= '$currYear'");
        $this->mysql->order_by('b.date_test desc, b.time_test desc');
        $query = $this->mysql->get('ecl2_register a');

        return $query;
    }

    public function cancel_registered($row_id)
    {
        $this->mysql->where('row_id', $row_id);
        $query = $this->mysql->delete('ecl2_register');

        return $query;
    }

    public function get_register_detail($id)
    {
        $this->mysql->select('a.idp, a.name, a.unit_name, a.seat_number, a.checked,
            b.date_test, b.time_test, b.round,
            c.room_name');
        $this->mysql->join('ecl2_round b', 'a.round_id = b.row_id', 'left');
        $this->mysql->join('ecl2_room c', 'b.room_id = c.row_id', 'left');
        $this->mysql->where('a.row_id', $id);
        $query = $this->mysql->get('ecl2_register a');
        // echo $this->mysql->last_query();

        return $query;
    }

    public function check_opened_round()
    {
        $this->mysql->where('active', 'y');
        $query = $this->mysql->get('ecl2_round');
        return $query;
    }

    public function get_rounds_by_round($round)
    {
        $sql = "SELECT a.row_id, a.round, a.date_test, a.time_test,
            b.address, b.room_name 
            FROM ecl2_round a
            INNER JOIN ecl2_room b
                ON a.room_id = b.row_id 
            WHERE round =  ?
            order by a.date_test, a.time_test ";
        $query = $this->mysql->query($sql, array($round));
        return $query;
    }

    public function convert_data_to_thai($date)
    {
        $mixDate = explode('-', $date);
        $d = $mixDate[2];
        $m = $this->thai_month($mixDate[1]);
        $y = $mixDate[0]+543;
        return "{$d} {$m} {$y}";        
    }

    public function check_score_extend($idp)
    {        
        $sql = "select exam_name, adate, user_fname, ascore, full_score 
            from ecl2_external_score
            where user_pid = ?
            order by adate desc";
        return $this->mysql->query($sql, array($idp));
    }
}
