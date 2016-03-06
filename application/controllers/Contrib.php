<?php

class Contrib extends CI_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->model("Maine_model", "maine_mod");
        $this->load->model("Contrib_model", "contrib_mod");
        $this->load->model("Poll_model", "poll_mod");
    }

    public function index(){
        $this->get_lang();
        $user_id["user_id"] = $this->session->c_user_id;
        $userID = $this->session->c_user_id;
        $user = $this->session->userdata("c_user");

        $res = $this->contrib_mod->search_user($user);

        if(count($res) > 0){
            $data["user"] = $this->session->c_user;
            $this->session->set_userdata("c_user_id", $res->user_id);


            $result = $this->contrib_mod->show_polls($userID);

            $arr_poll["polls"] = $result;
            $this->load->view("cv_home", array_merge($data, $user_id, $arr_poll));
        }
        else{
            $base_url = base_url();
            echo "<script> alert('No User Logged In!'); window.location.href='$base_url'; </script>";
        }
    }

    public function home(){
        $this->index();
    }

    public function logout(){
        $this->get_lang();
        $this->session->unset_userdata("c_user", "c_user_id");
        $res = $this->poll_mod->show_open_polls();
        $arrPoll["polls"] = $res;

        $this->load->view("v_home", $arrPoll);
    }

    public function profile_view($id){
        $this->get_lang();
        $arr_id["user_id"] = $this->session->c_user_id;

        $data = $this->maine_mod->get_user_id($id);
        $arr_data["user_data"] = $data;

        $this->load->view("cv_profile", array_merge($arr_data, $arr_id));
    }

    public function view_create(){
        $this->get_lang();
        $this->load->view("cv_create_poll");
    }

    public function create_poll(){
        $this->get_lang();
        $data["poll"] = $this->session->poll_title;
        $user_id = $this->session->userdata("c_user_id");

        $name = $this->input->post("txtName");
        $this->session->set_userdata("poll_title", $name);

        $poll_data = array(
            "title"=>$name,
            "status"=>"closed",
            "FK_user_id"=>$user_id
        );

        $this->poll_mod->create_poll($poll_data);

        $res = $this->poll_mod->get_poll_id($name);

        if(count($res) > 0){
            $this->session->set_userdata("poll_id", $res->title_id);
            $this->view_add_question($name);
        }

    }

    public function view_add_question($poll){
        $this->get_lang();
        $this->load->view("cv_create_question", $poll);
    }

    public function add_question(){
        $this->get_lang();
        $poll_id = $this->session->userdata("poll_id");

        $question = $this->input->post("txtQuestion");
        $quest["query"] = $question;

        $query_data = array(
            "query"=>$question,
            "FK_title_id"=>$poll_id
        );

        $this->poll_mod->add_question($query_data);

        $res = $this->poll_mod->get_query_id($question);

        if(count($res) > 0){
            $this->session->set_userdata("query_id", $res->query_id);
            $this->view_add_options($quest);
        }

    }

    public function view_add_options($quest){
        $this->get_lang();
        $this->load->view("cv_add_options", $quest);
    }

    public function finish_poll(){

        $query_id = $this->session->userdata("query_id");
        $poll_id = $this->session->userdata("poll_id");

        $opt1 = $this->input->post("txtOption");
        $opt2 = $this->input->post("txtOption2");
        $opt3 = $this->input->post("txtOption3");
        $opt4 = $this->input->post("txtOption4");

        $opt_data = array(
            array(
                "label" => $opt1,
                "vote_count"=>"0",
                "FK_query_id" => $query_id,
                "FK_title_id" => $poll_id
            ),
            array(
                "label" => $opt2,
                "vote_count"=>"0",
                "FK_query_id" => $query_id,
                "FK_title_id" => $poll_id
            ),
            array(
                "label" => $opt3,
                "vote_count"=>"0",
                "FK_query_id" => $query_id,
                "FK_title_id" => $poll_id
            ),
            array(
                "label" => $opt4,
                "vote_count"=>"0",
                "FK_query_id" => $query_id,
                "FK_title_id" => $poll_id
            ),
        );

        $this->poll_mod->add_options($opt_data);
        $this->view_add_question($poll_id);
    }

    public function view_polls(){
        $this->get_lang();
        $user_id["user_id"] = $this->session->c_user_id;
        $userID = $this->session->c_user_id;
        $user = $this->session->userdata("c_user");

        $res = $this->maine_mod->search_user($user);

        if($res->num_rows() > 0){
            $arr["user"] = $this->session->c_user;
            $result = $this->contrib_mod->show_polls($userID);
            $arr2["polls"] = $result;

            $this->load->view("cv_polls", array_merge($arr, $arr2, $user_id));
        }
        else {
            echo "<script> alert('No User Logged In!'); </script>";
            $this->load->view("av_login");
        }
    }

    public function delete_poll($id){
        $this->get_lang();
        $res = $this->poll_mod->get_poll($id);
        $arr_data["poll_data"] = $res;
        $this->load->view("cv_del_poll",$arr_data);
    }

    public function delete_poll_na($id){
        $this->db->where("title_id", $id)
            ->delete(TBL_TITLE);

        $this->db->where("FK_title_id", $id)
            ->delete(TBL_TANONG);

        $this->db->where("FK_title_id", $id)
            ->delete(TBL_SAGOT);

        $this->db->where("FK_title_id", $id)
            ->delete(TBL_VOTES);
        echo "<script> alert('Poll data successfully deleted.'); </script>";
        $this->view_polls();
    }

    public function edit_profile($id){
        $this->get_lang();
        
        $data = $this->maine_mod->get_user_id($id);
        $user_data["data"] = $data;

        $this->load->view("cv_edit_profile", $user_data);
    }

    public function edit_save(){
        $this->get_lang();
        
        $_id = $this->input->post("txtID");
        $lName = $this->input->post("txtLastName");
        $fName = $this->input->post("txtFirstName");
        $email = $this->input->post("txtEmail");

        $data = array(
            "l_name" => $lName,
            "f_name" => $fName,
            "email"=> $email
        );

        $last_name["l_name"] = $lName;
        $last_name["f_name"] = $fName;

        $this->maine_mod->update_user($_id, $data);

        $this->load->view("cv_save_done", $last_name);
    }

    public function change_pass($id){
        $this->get_lang();
        
        $data = $this->maine_mod->get_user_id($id);
        $user_data["data"] = $data;

        $this->load->view("cv_change_pass", $user_data);
    }

    public function cp_save(){
        $this->get_lang();
        
        $_id = $this->input->post("txtID");
        $newpass = $this->input->post("txtPass");

        $pword = do_hash($newpass, "md5");

        $data = array(
            "encrypass"=>$pword
        );

        if(strlen($newpass)< 8){
            echo "<script> alert('Password should have at least 8 characters!'); </script>";
            $this->change_pass($_id);
        }
        else {
            $this->maine_mod->update_user($_id, $data);
            echo "<script> alert('Changes Successfully Saved.'); </script>";
            $this->profile_view($_id);
        }
    }
    
    public function fil(){
        $this->session->set_userdata("langlang","filipino");
        $this->index();
    }

    public function eng(){
        $this->session->set_userdata("langlang","english");
        $this->index();
    }
    
    public function get_lang(){
        $langlang = $this->session->langlang;
        $this->lang->load('papoll', $langlang);
    }
}