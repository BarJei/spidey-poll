<?php

class Charts extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function make_chart(){
        $this->load->view("v_charts");
    }

} 