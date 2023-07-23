<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Frontend extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Auth_model');
        $this->load->model('Kunker_model');
        if ($this->session->userdata('is_logged') == true) {
            redirect('Frontend', 'refresh');
        }
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));

        if ($q <> '') {
            $config['base_url'] = base_url() . 'kunker/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'kunker/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'kunker/index.html';
            $config['first_url'] = base_url() . 'kunker/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Kunker_model->total_rows($q);
        $kunker = $this->Kunker_model->get_limit_data($config['per_page'], $start, $q);

        $data = array(
            'kunker_data' => $kunker,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'content' => 'backend/kunker/kunker_list',
        );

        $this->load->view('frontend/home', $data);
    }
    public function login()
    {

        $data = array(
            'content' => 'frontend/login.php',
        );
        $this->load->view('layout_frontend', $data);
    }
}
