<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Score_model extends CI_Model
{

    var $mysql, $mysql_ext, $oracle;

    public function __construct()
    {
        $this->mysql  = $this->load->database('mysql', true);
        $this->mysql_ext  = $this->load->database('mysql_ext', true);
        $this->oracle = $this->load->database('person1', true);
    }

    public function get_person_detail($idp)
    {
        $this->oracle->select('BIOG_NAME, BIOG_ID, BIOG_IDP,BIOG_UNITNAME');
        $this->oracle->where('BIOG_IDP', $idp);
        $query = $this->oracle->get('PER_BIOG_VIEW');

        return $query;
    }

    public function check_in_registered($idp, $round)
    {
        $this->mysql->where('idp', $idp);
        $this->mysql->where('round', $round);
        $query = $this->mysql->get('ecl2_register');

        return $query;
    }

    public function insert_score($idp, $round, $score)
    {
        $username = $this->session_lib->get_username_by_token();
        $field['score_test']    = $score;
        $field['time_update']   = date("Y-m-d H:i:s");
        $field['user']          = "{$username}#{$this->input->ip_address()}";

        $this->mysql->where('idp', $idp);
        $this->mysql->where('round', $round);
        $query = $this->mysql->update('ecl2_register', $field);

        return $query;
    }

    public function get_local_external_lastID()
    {
        $this->mysql->select_max('id');
        $query = $this->mysql->get('ecl2_external_score');
        return $query;
    }

    public function get_local_external_last_data($lastID)
    {
        $sql = "select * 
            from ecl2_external_score 
            where id = ?";
        $query = $this->mysql->query($sql, array($lastID));
        return $query;
    }

    public function get_external_score($lastID)
    {
        $sql = "select * 
            from view_result 
            where id > ?";
        $query = $this->mysql_ext->query($sql, array($lastID));
        return $query;
    }

    public function insert_external_scores($scoreList)
    {
        $result = array('success' => array(), 'failure' => array());
        $counting = 0;
        $maxCycle = 50;
        foreach ($scoreList as $person) {
            $isDuplicate = $this->is_external_score_dubplicate($person['id']);
            if ($isDuplicate == false) {
                $insert = $this->insert_external_score_per_person($person);
                if ($insert) {
                    $detail['person'] = $person;
                    $detail['status'] = true;
                    $detail['text'] = 'บันทึกสำเร็จ';
                    array_push($result['success'], $detail);
                } else {
                    $detail['person'] = $person;
                    $detail['status'] = false;
                    $detail['text'] = 'บันทึกไม่สำเร็จ';
                    array_push($result['failure'], $detail);
                }
            } else {
                $detail['person'] = $person;
                $detail['status'] = false;
                $detail['test'] = 'ID รายการซ้ำ';
                array_push($result['failure'], $detail);
            }
            $counting++;
            if ($counting >= $maxCycle) break;
        }
        return $result;
    }

    private function insert_external_score_per_person($person)
    {
        $username = $this->session_lib->get_username_by_token();
        $this->mysql->set('id', $person['id']);
        $this->mysql->set('exam_id', $person['exam_id']);
        $this->mysql->set('job_id', $person['job_id']);
        $this->mysql->set('exam_name', $person['exam_name']);
        $this->mysql->set('job_name', $person['job_name']);
        $this->mysql->set('adate', $person['adate']);
        $this->mysql->set('user_fname', $person['user_fname']);
        $this->mysql->set('user_pid', $person['user_pid']);
        $this->mysql->set('ascore', $person['ascore']);
        $this->mysql->set('full_score', $person['full_score']);
        $this->mysql->set('user_update', "{$username}#{$this->input->ip_address()}");
        $query = $this->mysql->insert('ecl2_external_score');
        return $query;
    }

    private function is_external_score_dubplicate($id)
    {
        $sql = "select *
            from ecl2_external_score
            where id = ?";
        $query = $this->mysql->query($sql, array($id));
        $isDuplicate = ($query->num_rows() == 0) ? false : true;
        return $isDuplicate;
    }
}
