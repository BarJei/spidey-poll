<?php

class Maine extends CI_Controller
{

    public function __construct(){
        parent::__construct();
        //$lang = $this->session->langlang;
        //$this->config->set_item("language", $lang);
        $this->load->model("Maine_model", "maine_mod");
        $this->load->model("Poll_model", "poll_mod");
    }

    public function index(){
        $this->get_lang();
        $result = $this->poll_mod->show_open_polls();
        $arr["polls"] = $result;
        
        $this->load->view("v_home", $arr);
    }

    public function home(){
        $this->index();
    }

    public function contact_us(){
        $this->get_lang();
        $this->load->view("v_contact");
    }

    public function about_us(){
        $this->get_lang();
        $this->load->view("v_about");
    }

    public function a_login(){
        $this->get_lang();
        
        $arrRules = array(
            array(
                "field" => "txtUsername",
                "label" => "username",
                "rules" => "required"
            ),
            array(
                "field" => "txtPassword",
                "label" => "password",
                "rules" => "required"
            )
        );

        $this->form_validation->set_rules($arrRules);

        if ($this->form_validation->run() == FALSE) {
            $this->load->view("av_login");
        } else {
            $user = $this->input->post("txtUsername");
            $pword = $this->input->post("txtPassword");

            $res = $this->maine_mod->auth($user, $pword);

            if (count($res) > 0) {
                $this->session->set_userdata("a_user", $user);
                $this->session->set_userdata("a_user_id", $res->user_id);
                $data["user"] = $this->session->a_user;
                redirect('Admin/home');
            } else {
                echo "<script> alert('No User Account Found!'); </script>";
                $this->load->view("av_login");
            }
        }
    }

    public function c_login(){
        $this->get_lang();
        $data["user"] = $this->session->c_user;

        $user = $this->input->post("txtUser");
        $pword = $this->input->post("txtPass");

        $res = $this->maine_mod->auth_contrib($user, $pword);

        if (count($res) > 0) {
            $this->session->set_userdata("c_user", $user);
            $this->session->set_userdata("c_user_id", $res->user_id);
//                $this->load->view("av_home", $data);
            redirect('Contrib/home');
        } else {
//            redirect("Maine/home");
            $bae_url = base_url();
            echo "<script> alert('No User Account Found!'); window.location.href='$bae_url'; </script>";
//            $this->index();
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


