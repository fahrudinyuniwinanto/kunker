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
            'start' => 0
        );

        $this->load->view(layout(), $data);
    }

    public function lap_kunker()
    {
        $data = [
            'content' => 'backend/laporan/lap_kunker',
            'kunker_data' => $this->db->get_where('kunker', [])->result(),
        ];

        $this->load->view(layout(), $data);
    }

    public function prin_kunker(){
        $mulai = $this->input->post('tanggal_mulai',TRUE);
        $selesai = $this->input->post('tanggal_selesai',TRUE);
        $data=[
            'kunker_data' => $this->db->query("SELECT id_fraksi, COUNT(*) as jml_kunjungan
            FROM kunker WHERE tgl_berangkat BETWEEN '$mulai' AND '$selesai' group by id_fraksi")->result(),
            'mulai' => date_format(date_create($mulai), "d-m-Y"),
            'selesai' => date_format(date_create($selesai), "d-m-Y"),
        ];

        $this->load->view("backend/laporan/prin_kunker", $data);
    }
}
