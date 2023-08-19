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

        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));

        if ($q <> '') {
            $config['base_url'] = base_url() . 'backend/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'backend/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'backend/index.html';
            $config['first_url'] = base_url() . 'backend/index.html';
        }

        $config['per_page'] = 20;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Kunker_model->total_rows($q);
        $kunker = $this->Kunker_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(

            'content' => 'backend/dashboard',
            'kunker_data' => $kunker,
            'q' => $q,
            'permohonan_masuk' => $this->db->get('kunker')->num_rows(),
            'permohonan_pending' => $this->db->get_where('kunker', ['status_disposisi' => 0, 'YEAR(created_at)' => date('Y')])->num_rows(),
            'permohonan_disetujui' => $this->db->get_where('kunker', ['status_disposisi' => 1, 'YEAR(created_at)' => date('Y')])->num_rows(),
            'permohonan_ditolak' => $this->db->get_where('kunker', ['status_disposisi' => 2, 'YEAR(created_at)' => date('Y')])->num_rows(),
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
                WHERE aa.id_fraksi='" . getSession('id_fraksi') . "' and YEAR(bb.tgl_berangkat) = '$tahun' and bb.id_jenis_kunjungan = '$jenis_kunjungan' group by bb.id_fraksi";
                $content = "backend/laporan/prin_fraksi_kunker";
                $arrLabel = [];
                $arrData = [];
                foreach ($this->db->query($q)->result() as $k => $v) {
                    $arrLabel[] = $this->db->get_where('fraksi', ['id_fraksi' => $v->id_fraksi])->row('nama_fraksi');
                    $arrData[] = $v->jml_kunjungan;
                }
                break;
            case 'anggota':
                $q = "SELECT aa.id_user, aa.id_fraksi, COUNT(aa.id_user) as jml_kunjungan
                FROM users as aa left join kunker as bb on aa.id_user=bb.id_anggota_fraksi 
                WHERE aa.id_fraksi='" . getSession('id_fraksi') . "' and aa.id_group = '3' and YEAR(bb.tgl_berangkat) = '$tahun' and bb.id_jenis_kunjungan = '$jenis_kunjungan' group by aa.id_user";
                $arrLabel = [];
                $arrData = [];
                foreach ($this->db->query($q)->result() as $k => $v) {
                    $arrLabel[] = $this->db->get_where('users', ['id_user' => $v->id_user])->row('fullname');
                    $arrData[] = $v->jml_kunjungan;
                }
                $content = "backend/laporan/prin_anggota_kunker";
                break;
            default:
                break;
        }

        $data = [
            'kunker_data' => $this->db->query($q)->result(),
            'tahun' => $tahun,
            'data_jenis_kunjungan' => $this->db->get_where('jenis_kunjungan', ['id_jenis_kunjungan' => $jenis_kunjungan])->row(),
            'arrLabel' => $arrLabel,
            'arrData' => $arrData,
            'content' => $content,
        ];
        $this->load->view("layout_print", $data);
    }
}
