<?php

class Poll_model extends CI_Model{

    public function create_poll($name){
        $this->db->insert(TBL_TITLE, $name);
    }

    public function get_poll_id($title){
        $result = $this->db->select()
        ->from(TBL_TITLE)
        ->where("title", $title)
        ->get();

        return $result->row();
    }

    public function get_poll($title_id){
        $result = $this->db->select()
        ->from(TBL_TITLE)
        ->where("title_id", $title_id)
        ->get();

        return $result->result();
    }

    public function get_query_id($query){
        $result = $this->db->select()
        ->from(TBL_TANONG)
        ->where("query", $query)
        ->get();

        return $result->row();
    }

    public function add_question($query){
        $this->db->insert(TBL_TANONG, $query);
    }

    public function add_options($opt){
        $this->db->insert_batch(TBL_SAGOT, $opt);
    }

    public function show_open_polls(){
        $polldata = $this->db->select()
        ->from(TBL_TITLE)
        ->order_by("date_created","ASC")
        ->where("status", "open")
        ->get();
        return $polldata->result();
    }

    public function show_polls(){
        $polldata = $this->db->select()
        ->from(TBL_TITLE)
        ->order_by("date_created", "ASC")
        ->get();

        return $polldata->result();
    }

    public function get_polls(){
        $polldata = $this->db->select()
        ->from(TBL_TITLE)
        ->order_by("date_created", "ASC")
        ->get();

        return $polldata->row();
    }

    public function get_options($question){

        $opt = $this->db->select()
        ->where("FK_query_id", $question)
        ->from(TBL_SAGOT)
        ->get();

        return $opt->result();
    }

    public function get_all_questions($id){

        $res = $this->db->select()
        ->where("FK_title_id", $id)
        ->from(TBL_TANONG)
        ->get();

        return $res->result();
    }

    public function get_csv_questions($id){

        $res = $this->db->select('*')
        ->where("FK_title_id", $id)
        ->from(TBL_TANONG)
        ->get();

        return $res->row();
    }

    public function get_question($poll_id, $query_id){
        $query = "SELECT * FROM tbl_tanong a, tbl_sagot b WHERE a.query_id = b.FK_query_id AND a.FK_title_id = ".$poll_id." AND a.query_id = ".$query_id;
        $result = $this->db->query($query);
        return $result->result();
    }

    public function vote_next($vote){
        $votes = $this->db->select("vote_count")
        ->from(TBL_SAGOT)
        ->where("label" , $vote["option"])
        ->get();

        $res = $votes->result();
        $row = $res[0];
        $vote_count = $row->vote_count;
        $vote_count += 1;
        $query = "UPDATE tbl_sagot SET vote_count = " . $vote_count . " WHERE label = '" . $vote["option"] . "'";
        $this->db->query($query);

        $votes = $this->db->select("FK_query_id")
        ->from(TBL_SAGOT)
        ->where("label",$vote["option"])
        ->get();

        $res = $votes->result();
        $row = $res[0];
        $query_id = $row->FK_query_id;
        $query_id += 1;
        return $query_id;
    }

    public function do_vote($vote, $poll_id){

        $arr_vote = array(
            "FK_opt_id"=>$vote["option"],
            "FK_title_id"=>$poll_id
            );
        $this->db->insert(TBL_VOTES, $arr_vote);

        $votes = $this->db->select("FK_query_id")
        ->from(TBL_SAGOT)
        ->where("opt_id",$vote["option"])
        ->get();

        $res = $votes->result();
        $row = $res[0];
        $query_id = $row->FK_query_id;
        $query_id += 1;
        return $query_id;
    }

    public function count_vote($opt_id){
        $this->db->where("FK_opt_id", $opt_id);
        $this->db->from(TBL_VOTES);
        return $this->db->count_all_results();
    }

    public function get_poll_data($id){
        $query = $this->db->select("opt_id, label , a.query_id, vote_count, query")
        ->from("tbl_sagot b")
        ->join("tbl_tanong a","a.query_id = b.FK_query_id","inner")
        ->where("a.query_id",$id)
        ->get();
        return $query->result();

    }

} 