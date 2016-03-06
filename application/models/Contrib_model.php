<?php

class Contrib_model extends CI_Model{

    public function show_polls($id){
        $polldata = $this->db->select()
            ->from(TBL_TITLE)
            ->where("FK_user_id", $id)
            ->order_by("date_created","ASC")
            ->get();
        return $polldata->result();
    }

    public function search_user($user_sess){
        $sqlQuery = $this->db->select()
            ->from(TBL_USR)
            ->where("username", $user_sess)
            ->get();
        return $sqlQuery->row();
    }

} 