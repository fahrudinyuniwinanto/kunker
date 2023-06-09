<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Fraksi extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Fraksi_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'fraksi/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'fraksi/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'fraksi/index.html';
            $config['first_url'] = base_url() . 'fraksi/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Fraksi_model->total_rows($q);
        $fraksi = $this->Fraksi_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'fraksi_data' => $fraksi,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'content' => 'backend/fraksi/fraksi_list',
        );
        $this->load->view(layout(), $data);
    }

    public function lookup()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        $idhtml = $this->input->get('idhtml');
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'fraksi/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'fraksi/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'fraksi/index.html';
            $config['first_url'] = base_url() . 'fraksi/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Fraksi_model->total_rows($q);
        $fraksi = $this->Fraksi_model->get_limit_data($config['per_page'], $start, $q);


        $data = array(
            'fraksi_data' => $fraksi,
            'idhtml' => $idhtml,
            'q' => $q,
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'content' => 'backend/fraksi/fraksi_lookup',
        );
        ob_start();
        $this->load->view($data['content'], $data);
        return ob_get_contents();
        ob_end_clean();
    }

    public function read($id) 
    {
        
        $row = $this->Fraksi_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_fraksi' => $row->id_fraksi,
		'nama_fraksi' => $row->nama_fraksi,'content' => 'backend/fraksi/fraksi_read',
	    );
            $this->load->view(
            layout(), $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('fraksi'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('fraksi/create_action'),
	    'id_fraksi' => set_value('id_fraksi'),
	    'nama_fraksi' => set_value('nama_fraksi'),
	    'content' => 'backend/fraksi/fraksi_form',
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
		'nama_fraksi' => $this->input->post('nama_fraksi',TRUE),
	    );

            $this->Fraksi_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('fraksi'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Fraksi_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('fraksi/update_action'),
		'id_fraksi' => set_value('id_fraksi', $row->id_fraksi),
		'nama_fraksi' => set_value('nama_fraksi', $row->nama_fraksi),
	    'content' => 'backend/fraksi/fraksi_form',
	    );
            $this->load->view(layout(), $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('fraksi'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_fraksi', TRUE));
        } else {
            $data = array(
		'nama_fraksi' => $this->input->post('nama_fraksi',TRUE),
	    );

            $this->Fraksi_model->update($this->input->post('id_fraksi', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('fraksi'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Fraksi_model->get_by_id($id);

        if ($row) {
            $this->Fraksi_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('fraksi'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('fraksi'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nama_fraksi', 'nama fraksi', 'trim|required');

	$this->form_validation->set_rules('id_fraksi', 'id_fraksi', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "fraksi.xls";
        $judul = "fraksi";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Nama Fraksi");

	foreach ($this->Fraksi_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_fraksi);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file Fraksi.php */
/* Location: ./application/controllers/Fraksi.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2023-06-09 13:59:09 */
/* http://harviacode.com */