<?php

class Poll extends CI_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->model("Maine_model", "maine_mod");
        $this->load->model("Poll_model", "poll_mod");
    }

    public function index(){
        $this->view_polls();
    }

    public function view_polls(){
        $this->get_lang();
        
        $result = $this->poll_mod->show_open_polls();
        $arr_poll["polls"] = $result;

        $this->load->view("v_polls", $arr_poll);
    }

    public function get_questions($id){
        $this->get_lang();
        
        $this->session->set_userdata("active_poll", $id);
        $result = $this->poll_mod->get_all_questions($id);
        $title = $this->poll_mod->get_poll($id);

        $arr_title["poll_data"] = $title;

        $queries["data"] = $result;
        $this->load->view('v_answer_poll', array_merge($queries, $arr_title));
    }

    public function answer_poll($query_id){
        $this->get_lang();
        $poll_id = $this->session->active_poll;

        $title = $this->poll_mod->get_poll($poll_id);
        $arr_title["poll_data"] = $title;


        $res = $this->poll_mod->get_question($poll_id, $query_id);
        $query_data["query"] = $res;
        $this->load->view('v_poll_start', array_merge($query_data, $arr_title));
    }

    public function poll_vote(){
        $this->get_lang();
        $poll_id = $this->session->active_poll;

        $title = $this->poll_mod->get_poll($poll_id);
        $arr_title["poll_data"] = $title;

        $results = $this->input->post();
        $next_query = $this->poll_mod->vote_next($results);
        $query_id = $next_query;
        $res = $this->poll_mod->get_question($poll_id, $query_id);
        $query_data["query"] = $res;
        $this->load->view('v_poll_start', array_merge($query_data, $arr_title));
    }
    
    public function get_lang(){
        $langlang = $this->session->langlang;
        $this->lang->load('papoll', $langlang);
    }

    public function get_tally($id){
        $this->get_lang();
        $result = $this->poll_mod->get_poll_data($id);

        $arr_data["poll_data"] = $result;

        $this->load->view('v_charts', $arr_data);

    }




} 