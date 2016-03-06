<?php

class Admin extends CI_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->model("Maine_model", "maine_mod");
        $this->load->model("Contrib_model", "contrib_mod");
        $this->load->model("Poll_model", "poll_mod");
    }

    public function index(){
        $this->get_lang();
        $user = $this->session->userdata("a_user");
        $user_id["user_id"] = $this->session->a_user_id;

        $res = $this->maine_mod->search_user($user);

        if($res->num_rows() > 0){
            $arr["user"] = $this->session->a_user;

            $result = $this->maine_mod->show_users();
            $arr2["users"] = $result;

            $res2 = $this->poll_mod->show_polls();
            $arrPoll["polls"] = $res2;

            $this->load->view("av_home", array_merge($arr, $arr2, $arrPoll, $user_id));
        }
        else{
            echo "<script> alert('No User Logged In!'); </script>";
            $this->load->view("av_login");
        }
    }

    public function home(){
        $this->index();
    }

    public function logout(){
        $this->get_lang();
        $this->session->unset_userdata("a_user", "a_user_id");
        $res = $this->poll_mod->show_open_polls();
        $arrPoll["polls"] = $res;

        $this->load->view("v_home", $arrPoll);
    }

    public function reg_user(){
        $this->get_lang();
        $this->load->view("av_add_contrib");
    }

    public function add_user(){
        $this->get_lang();

        $l_name = $this->input->post("txtLastName");
        $f_name = $this->input->post("txtFirstName");
        $user = $this->input->post("txtUsername");
        $pass = $this->input->post("txtPassword");
        $email = $this->input->post("txtEmail");

        $pword = do_hash($pass, "md5");
        $data["username"] = $user;

        $user_data = array(
            "l_name" => ucwords($l_name),
            "f_name" => ucwords($f_name),
            "username" => $user,
            "encrypass" => $pword,
            "email"=>$email,
            "priv"=>"contrib"
        );

        if(strlen($pass)< 8){
            echo "<script> alert('Password should have at least 8 characters!'); </script>";
            $this->load->view("av_add_contrib");
        }
        else{
            $this->maine_mod->add_user($user_data);
            $this->load->view("av_reg_done",$data);
        }
    }

    public function view_users(){
        $this->get_lang();
        $user_id["user_id"] = $this->session->a_user_id;
        $user = $this->session->userdata("a_user");

        $res = $this->maine_mod->search_user($user);

        if($res->num_rows() > 0){
            $arr["user"] = $this->session->a_user;
            $result = $this->maine_mod->show_users();
            $arr2["users"] = $result;

            $this->load->view("av_contribs", array_merge($arr,$arr2, $user_id));
        }
        else{
            echo "<script> alert('No User Logged In!'); </script>";
            $this->load->view("av_login");
        }
    }

    public function delete_view($id){
        $this->get_lang();
        $res = $this->maine_mod->get_user_id($id);
        $del["user_data"] = $res;
        $this->load->view("av_confirm_del",$del);
    }

    public function delete_user($user){
        $this->db->where("user_id",$user)
            ->delete(TBL_USR);
        echo "<script> alert('Account successfully deleted.'); </script>";
        $this->view_users();
    }

    public function edit_user($id){
        $this->get_lang();

        $data = $this->maine_mod->get_user_id($id);
        $user_data["data"] = $data;

        $this->load->view("av_edit_contrib", $user_data);
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

        $this->load->view("av_save_done", $last_name);
    }

    public function change_pass($id){
        $this->get_lang();

        $data = $this->maine_mod->get_user_id($id);
        $user_data["data"] = $data;

        $this->load->view("av_change_pass", $user_data);
    }

    public function cp_save(){
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
            $this->view_users();
        }
    }

    public function profile_view($id){
        $this->get_lang();
        $data = $this->maine_mod->get_user_id($id);
        $user_data["data"] = $data;

        $this->load->view("av_profile", $user_data);
    }

    public function view_create(){
        $this->get_lang();
        $this->load->view("av_create_poll");
    }

    public function create_poll(){
        $user_id = $this->session->userdata("a_user_id");
        $name = $this->input->post("txtName");

        $this->session->set_userdata("poll_title", $name);
        $data["poll"] = $this->session->poll_title;

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
        $this->load->view("av_create_question", $poll);
    }

    public function add_question(){
        $question = $this->input->post("txtQuestion");
        $quest["query"] = $question;

        $poll_id = $this->session->userdata("poll_id");

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
        $this->load->view("av_add_options", $quest);
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

    public function delete_poll($id){
        $this->get_lang();
        $res = $this->poll_mod->get_poll($id);
        $arr_data["poll_data"] = $res;
        $this->load->view("av_del_poll",$arr_data);
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

    public function view_polls(){
        $this->get_lang();
        $user_id["user_id"] = $this->session->a_user_id;
        $user = $this->session->userdata("a_user");

        $res = $this->maine_mod->search_user($user);

        if($res->num_rows() > 0){
            $arr["user"] = $this->session->a_user;
            $result = $this->poll_mod->show_polls();
            $arr2["polls"] = $result;

            $this->load->view("av_polls", array_merge($arr,$arr2, $user_id));
        }
        else {
            echo "<script> alert('No User Logged In!'); </script>";
            $this->load->view("av_login");
        }
    }

    public function open_poll($id){
        $this->db->where("title_id", $id)
            ->update(TBL_TITLE, array("status"=>"open"));
        echo "<script> alert('Poll is now open for voting.'); </script>";
        $this->view_polls();
    }

    public function close_poll($id){
        $this->db->where("title_id", $id)
            ->update(TBL_TITLE, array("status"=>"closed"));
        echo "<script> alert('Poll is now closed for voting.'); </script>";
        $this->view_polls();
    }

    public function view_poll_by(){
        $this->get_lang();

        $id = $this->input->post("txtID");

        $result = $this->contrib_mod->show_polls($id);
        $arr_res["polls"] = $result;

        $this->load->view("av_polls_by", $arr_res);
    }

    public function admin_view($id){
        $this->get_lang();

        $data = $this->maine_mod->get_user_id($id);
        $user_data["data"] = $data;

        $this->load->view("av_admin", $user_data);

    }

    public function save_csv($id){

        $this->load->dbutil();
        $this->load->helper('file');
        $this->load->helper('download');

        $query_id = $this->poll_mod->get_csv_questions($id);
        $tanong = $query_id->query_id;

        $filename = "Poll-".$id.".csv";
        $delimiter = ",";
        $newline = "\r\n";

        if($tanong){
            // $query = "SELECT tbl_title.title_id,
            //         tbl_title.title,
            //         tbl_tanong.query_id,
            //         tbl_tanong.query,
            //         tbl_sagot.label,
            //         tbl_sagot.vote_count
            //         FROM tbl_title
            //         INNER JOIN tbl_tanong
            //         on tbl_title.title_id = tbl_tanong.FK_title_id
            //         and  tbl_title.title_id= ".$id."
            //         INNER JOIN tbl_sagot
            //         on tbl_tanong.query_id= tbl_sagot.FK_query_id
            //         WHERE tbl_tanong.query_id= ".$tanong;

            // $result = $this->db->query($query);
            $result = $this->maine_mod->for_csv($id);
            $csv = $this->dbutil->csv_from_result($result, $delimiter, $newline);
            force_download($filename, $csv);
        }
        else if(!$tanong){
            echo "<script> alert('No data found!'); </script>";
            $this->view_polls();
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