<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Jenis_kunjungan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Jenis_kunjungan_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));

        if ($q <> '') {
            $config['base_url'] = base_url() . 'jenis_kunjungan/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'jenis_kunjungan/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'jenis_kunjungan/index.html';
            $config['first_url'] = base_url() . 'jenis_kunjungan/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Jenis_kunjungan_model->total_rows($q);
        $jenis_kunjungan = $this->Jenis_kunjungan_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'jenis_kunjungan_data' => $jenis_kunjungan,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'content' => 'backend/jenis_kunjungan/jenis_kunjungan_list',
        );
        $this->load->view(layout(), $data);
    }

    public function lookup()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        $idhtml = $this->input->get('idhtml');

        if ($q <> '') {
            $config['base_url'] = base_url() . 'jenis_kunjungan/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'jenis_kunjungan/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'jenis_kunjungan/index.html';
            $config['first_url'] = base_url() . 'jenis_kunjungan/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Jenis_kunjungan_model->total_rows($q);
        $jenis_kunjungan = $this->Jenis_kunjungan_model->get_limit_data($config['per_page'], $start, $q);


        $data = array(
            'jenis_kunjungan_data' => $jenis_kunjungan,
            'idhtml' => $idhtml,
            'q' => $q,
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'content' => 'backend/jenis_kunjungan/jenis_kunjungan_lookup',
        );
        ob_start();
        $this->load->view($data['content'], $data);
        return ob_get_contents();
        ob_end_clean();
    }

    public function read($id)
    {

        $row = $this->Jenis_kunjungan_model->get_by_id($id);
        if ($row) {
            $data = array(
                'id_jenis_kunjungan' => $row->id_jenis_kunjungan,
                'nama_kunker' => $row->nama_kunker,
                'maksimal_kunjungan' => $row->maksimal_kunjungan,
                'jumlah_hari' => $row->jumlah_hari, 'content' => 'backend/jenis_kunjungan/jenis_kunjungan_read',
            );
            $this->load->view(
                layout(),
                $data
            );
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('jenis_kunjungan'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Tambah',
            'action' => site_url('jenis_kunjungan/create_action'),
            'id_jenis_kunjungan' => set_value('id_jenis_kunjungan'),
            'nama_kunker' => set_value('nama_kunker'),
            'maksimal_kunjungan' => set_value('maksimal_kunjungan'),
            'jumlah_hari' => set_value('jumlah_hari'),
            'content' => 'backend/jenis_kunjungan/jenis_kunjungan_form',
        );
        $this->load->view(layout(), $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'nama_kunker' => $this->input->post('nama_kunker', TRUE),
                'maksimal_kunjungan' => $this->input->post('maksimal_kunjungan', TRUE),
                'jumlah_hari' => $this->input->post('jumlah_hari', TRUE),
            );

            $this->Jenis_kunjungan_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('jenis_kunjungan'));
        }
    }

    public function update($id)
    {
        $row = $this->Jenis_kunjungan_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Edit',
                'action' => site_url('jenis_kunjungan/update_action'),
                'id_jenis_kunjungan' => set_value('id_jenis_kunjungan', $row->id_jenis_kunjungan),
                'nama_kunker' => set_value('nama_kunker', $row->nama_kunker),
                'maksimal_kunjungan' => set_value('maksimal_kunjungan', $row->maksimal_kunjungan),
                'jumlah_hari' => set_value('jumlah_hari', $row->jumlah_hari),
                'content' => 'backend/jenis_kunjungan/jenis_kunjungan_form',
            );
            $this->load->view(layout(), $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('jenis_kunjungan'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_jenis_kunjungan', TRUE));
        } else {
            $data = array(
                'nama_kunker' => $this->input->post('nama_kunker', TRUE),
                'maksimal_kunjungan' => $this->input->post('maksimal_kunjungan', TRUE),
                'jumlah_hari' => $this->input->post('jumlah_hari', TRUE),
            );

            $this->Jenis_kunjungan_model->update($this->input->post('id_jenis_kunjungan', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('jenis_kunjungan'));
        }
    }

    public function delete($id)
    {
        $row = $this->Jenis_kunjungan_model->get_by_id($id);

        if ($row) {
            $this->Jenis_kunjungan_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('jenis_kunjungan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('jenis_kunjungan'));
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('nama_kunker', 'nama kunker', 'trim|required');
        $this->form_validation->set_rules('maksimal_kunjungan', 'maksimal kunjungan', 'trim|required');
        $this->form_validation->set_rules('jumlah_hari', 'jumlah hari', 'trim|required');

        $this->form_validation->set_rules('id_jenis_kunjungan', 'id_jenis_kunjungan', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "jenis_kunjungan.xls";
        $judul = "jenis_kunjungan";
        $tablehead = 0;
        $tablebody = 1;
        $nourut = 1;
        //penulisan header
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header("Content-Disposition: attachment;filename=" . $namaFile . "");
        header("Content-Transfer-Encoding: binary ");

        xlsBOF();

        $kolomhead = 0;
        xlsWriteLabel($tablehead, $kolomhead++, "No");
        xlsWriteLabel($tablehead, $kolomhead++, "Nama Kunker");
        xlsWriteLabel($tablehead, $kolomhead++, "Maksimal Kunjungan");
        xlsWriteLabel($tablehead, $kolomhead++, "Jumlah Hari");

        foreach ($this->Jenis_kunjungan_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
            xlsWriteLabel($tablebody, $kolombody++, $data->nama_kunker);
            xlsWriteNumber($tablebody, $kolombody++, $data->maksimal_kunjungan);
            xlsWriteNumber($tablebody, $kolombody++, $data->jumlah_hari);

            $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }
}
