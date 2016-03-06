<?php

define('TBL_USR', 'tbl_users');
define('TBL_TITLE', 'tbl_title');
define('TBL_TANONG', 'tbl_tanong');
define('TBL_SAGOT', 'tbl_sagot');
define('TBL_VOTES', 'tbl_votes');

class Maine_model extends CI_Model{

    public function auth($username, $pword){
        $sqlQuery = $this->db->select()
        ->from(TBL_USR)
        ->where("username", $username)
        ->where("encrypass=MD5('$pword')")
        ->where("priv", "admin")
        ->get();

        return $sqlQuery->row();
    }

    public function auth_contrib($username, $pword){
        $sqlQuery = $this->db->select()
        ->from(TBL_USR)
        ->where("username", $username)
        ->where("encrypass=MD5('$pword')")
        ->where("priv", "contrib")
        ->get();

        return $sqlQuery->row();
    }

    public function search_user($user_sess){
        $sqlQuery = $this->db->select()
        ->from(TBL_USR)
        ->where("username", $user_sess)
        ->get();

        return $sqlQuery;
    }

    public function get_sess($view_page){
        $user = $this->session->userdata("a_user");

        $res = $this->search_user($user);

        if($res->num_rows() > 0){
            $data["user"] = $this->session->a_user;
            $this->load->view($view_page, $data);
        }
        else{
            echo "<script> alert('No User Logged In!'); </script>";
            $this->load->view("av_login");
        }
    }

    public function add_user($user_data){
        $this->db->insert(TBL_USR, $user_data);
    }

    public function show_users(){
        $userdata = $this->db->select()
        ->from(TBL_USR)
        ->where("priv","contrib")
        ->order_by("user_id","ASC")
        ->get();
        return $userdata->result();
    }

    public function get_user_id($user_id){
        $query = $this->db->select()
        ->from(TBL_USR)
        ->where("user_id",$user_id)
        ->get();
        return $query->result();
    }

    public function update_user($id, $data){
        $this->db->where("user_id", $id)
        ->update(TBL_USR, $data);
    }

    public function for_csv($poll_id){
        $sql = "SELECT a.title_id, a.title, b.query, c.label, c.vote_count FROM tbl_title AS a , tbl_tanong AS b, tbl_sagot AS c WHERE a.title_id= b.FK_title_id AND b.query_id = c.FK_query_id AND a.title_id = $poll_id";
        $result = $this->db->query($sql);
        return $result;
    }

}
