<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Kunker_ta extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Kunker_ta_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'kunker_ta/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'kunker_ta/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'kunker_ta/index.html';
            $config['first_url'] = base_url() . 'kunker_ta/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Kunker_ta_model->total_rows($q);
        $kunker_ta = $this->Kunker_ta_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'kunker_ta_data' => $kunker_ta,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'content' => 'backend/kunker_ta/kunker_ta_list',
        );
        $this->load->view(layout(), $data);
    }

    public function lookup()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        $idhtml = $this->input->get('idhtml');
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'kunker_ta/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'kunker_ta/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'kunker_ta/index.html';
            $config['first_url'] = base_url() . 'kunker_ta/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Kunker_ta_model->total_rows($q);
        $kunker_ta = $this->Kunker_ta_model->get_limit_data($config['per_page'], $start, $q);


        $data = array(
            'kunker_ta_data' => $kunker_ta,
            'idhtml' => $idhtml,
            'q' => $q,
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'content' => 'backend/kunker_ta/kunker_ta_lookup',
        );
        ob_start();
        $this->load->view($data['content'], $data);
        return ob_get_contents();
        ob_end_clean();
    }

    public function read($id) 
    {
        
        $row = $this->Kunker_ta_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_kunker_ta' => $row->id_kunker_ta,
		'id_kunker' => $row->id_kunker,
		'id_ta' => $row->id_ta,'content' => 'backend/kunker_ta/kunker_ta_read',
	    );
            $this->load->view(
            layout(), $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kunker_ta'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('kunker_ta/create_action'),
	    'id_kunker_ta' => set_value('id_kunker_ta'),
	    'id_kunker' => set_value('id_kunker'),
	    'id_ta' => set_value('id_ta'),
	    'content' => 'backend/kunker_ta/kunker_ta_form',
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
		'id_kunker' => $this->input->post('id_kunker',TRUE),
		'id_ta' => $this->input->post('id_ta',TRUE),
	    );

            $this->Kunker_ta_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('kunker_ta'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Kunker_ta_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('kunker_ta/update_action'),
		'id_kunker_ta' => set_value('id_kunker_ta', $row->id_kunker_ta),
		'id_kunker' => set_value('id_kunker', $row->id_kunker),
		'id_ta' => set_value('id_ta', $row->id_ta),
	    'content' => 'backend/kunker_ta/kunker_ta_form',
	    );
            $this->load->view(layout(), $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kunker_ta'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_kunker_ta', TRUE));
        } else {
            $data = array(
		'id_kunker' => $this->input->post('id_kunker',TRUE),
		'id_ta' => $this->input->post('id_ta',TRUE),
	    );

            $this->Kunker_ta_model->update($this->input->post('id_kunker_ta', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('kunker_ta'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Kunker_ta_model->get_by_id($id);

        if ($row) {
            $this->Kunker_ta_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('kunker_ta'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kunker_ta'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('id_kunker', 'id kunker', 'trim|required');
	$this->form_validation->set_rules('id_ta', 'id ta', 'trim|required');

	$this->form_validation->set_rules('id_kunker_ta', 'id_kunker_ta', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "kunker_ta.xls";
        $judul = "kunker_ta";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Id Kunker");
	xlsWriteLabel($tablehead, $kolomhead++, "Id Ta");

	foreach ($this->Kunker_ta_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_kunker);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_ta);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file Kunker_ta.php */
/* Location: ./application/controllers/Kunker_ta.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2023-06-09 13:59:29 */
/* http://harviacode.com */