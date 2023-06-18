<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Backend extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_logged();
        $this->load->model('Users_model');
        $this->load->model('Sy_menu_model');
        $this->load->model('Kunker_model');

        $this->db->query("SET GLOBAL sql_mode=(SELECT REPLACE(@@sql_mode,'ONLY_FULL_GROUP_BY',''))");
    }

    public function index()
    {

        $data = array(

            'content' => 'backend/dashboard',
            'kunker_data' => $this->Kunker_model->get_limit_data(20, 0, ""),
            'start'=>0
        );

        $this->load->view(layout(), $data);
    }
}
