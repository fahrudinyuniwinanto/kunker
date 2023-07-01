<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Frontend extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Auth_model');
        if ($this->session->userdata('is_logged') == true) {
            redirect('Frontend', 'refresh');
        }
    }

    public function index()
    {
        $this->load->view('frontend/home');
    }
    public function login()
    {

        $data = array(
            'content' => 'frontend/login.php',
        );
        $this->load->view('layout_frontend', $data);
    }
}
