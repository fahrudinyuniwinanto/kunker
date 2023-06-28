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

    public function prin_kunker()
    {
        $jenis_laporan = $this->input->post('jenis_laporan', TRUE);
        $jenis_kunjungan = $this->input->post('jenis_kunjungan', TRUE);
        $tahun = $this->input->post('tahun', TRUE);
        $q = "";
        $content = "";
        switch ($jenis_laporan) {
            case 'fraksi':
                $q = "SELECT aa.id_fraksi, COUNT(bb.id_fraksi) as jml_kunjungan
                FROM fraksi as aa left join kunker as bb on aa.id_fraksi=bb.id_fraksi 
                WHERE YEAR(bb.tgl_berangkat) = '$tahun' and bb.id_jenis_kunjungan = '$jenis_kunjungan' group by bb.id_fraksi";
                $content = "backend/laporan/prin_fraksi_kunker";
                break;
                case 'anggota':
                    $q = "SELECT aa.id_user, aa.id_fraksi, COUNT(aa.id_user) as jml_kunjungan
                FROM users as aa left join kunker as bb on aa.id_user=bb.id_anggota_fraksi 
                WHERE aa.id_group = '3' and YEAR(bb.tgl_berangkat) = '$tahun' and bb.id_jenis_kunjungan = '$jenis_kunjungan' group by aa.id_user";
                $content = "backend/laporan/prin_anggota_kunker";
                break;
            default:
                break;
        }
        $data = [
            'kunker_data' => $this->db->query($q)->result(),
            'tahun' => $tahun,
            'jenis_kunjungan' => $jenis_kunjungan,
        ];
        $this->load->view($content, $data);
    }
}
