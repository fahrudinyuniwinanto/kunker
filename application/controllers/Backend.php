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
    }

    public function index()
    {

        $data = array(

            'content' => 'backend/dashboard',
        );


        $this->load->view(layout(), $data);
    }
}
