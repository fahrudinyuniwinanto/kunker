<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Ta extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Users_model');
        $this->load->library('form_validation');
        is_logged();
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));

        if ($q <> '') {
            $config['base_url'] = base_url() . 'ta/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'ta/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'ta/index.html';
            $config['first_url'] = base_url() . 'ta/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Users_model->total_rows_ta($q);
        $users = $this->Users_model->get_limit_data_ta($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'users_data' => $users,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'content' => 'backend/ta/users_list',
        );
        $this->load->view(layout(), $data);
    }

    public function lookup()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        $idhtml = $this->input->get('idhtml');

        if ($q <> '') {
            $config['base_url'] = base_url() . 'ta/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'ta/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'ta/index.html';
            $config['first_url'] = base_url() . 'ta/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Users_model->total_rows_ta($q);
        $users = $this->Users_model->get_limit_data_ta($config['per_page'], $start, $q);


        $data = array(
            'users_data' => $users,
            'idhtml' => $idhtml,
            'q' => $q,
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'content' => 'backend/ta/users_lookup',
        );
        ob_start();
        $this->load->view($data['content'], $data);
        return ob_get_contents();
        ob_end_clean();
    }

    public function read($id)
    {
        $row = $this->Users_model->get_by_id($id);
        if ($row) {
            $data = array(
                'id_user' => $row->id_user,
                'fullname' => $row->fullname,
                'id_anggota_fraksi' => $this->db->get_where('users', ['id_user' => $row->id_parent])->row()->fullname,
                'id_fraksi' => $this->db->get_where('fraksi', ['id_fraksi' => $row->id_fraksi])->row()->nama_fraksi,
                'username' => $row->username,
                'password' => $row->password,
                'email' => $row->email,
                'id_group' => $row->group_name,
                'nm_group' => $row->id_group,
                'foto' => $row->foto,
                'telp' => $row->telp,
                'note' => $row->note,
                'created_by' => $row->created_by,
                'updated_by' => $row->updated_by,
                'created_at' => $row->created_at,
                'updated_at' => $row->updated_at,
                'note_1' => $row->note_1,
                'content' => 'backend/ta/users_read',
            );
            $this->load->view(
                layout(),
                $data
            );
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('ta'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Tambah',
            'action' => site_url('Ta/create_action'),
            'id_user' => set_value('id_user'),
            'id_anggota_fraksi' => set_value('id_anggota_fraksi'),
            'fullname' => set_value('fullname'),
            'username' => set_value('username'),
            'password' => set_value('password'),
            'email' => set_value('email'),
            'id_group' => set_value('id_group'),
            'nm_group' => set_value('nm_group'),
            'nm_id_group' => set_value('nm_id_group'),
            'foto' => set_value('foto'),
            'telp' => set_value('telp'),
            'note' => set_value('note'),
            'created_by' => set_value('created_by'),
            'updated_by' => set_value('updated_by'),
            'created_at' => set_value('created_at'),
            'updated_at' => set_value('updated_at'),
            'note_1' => set_value('note_1'),
            'content' => 'backend/ta/users_form',
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
                'fullname' => $this->input->post('fullname', TRUE),
                'id_parent' => $this->input->post('id_anggota_fraksi', TRUE),
                'id_fraksi' => $this->db->get_where('users', ['id_user' => $this->input->post('id_anggota_fraksi', TRUE)])->row()->id_fraksi,
                'id_group' => 0,
                'created_by' => $this->session->userdata('id_user'),
                'created_at' => date("Y-m-d H:i:s"),
            );

            $this->Users_model->insert($data);
            $this->session->set_flashdata('message', 'Data Tenaga Ahli Berhasil Disimpan');
            redirect(site_url('ta'));
        }
    }

    public function update($id)
    {
        $row = $this->Users_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Edit',
                'action' => site_url('ta/update_action'),
                'id_user' => set_value('id_user', $row->id_user),
                'fullname' => set_value('fullname', $row->fullname),
                'username' => set_value('username', $row->username),
                'password' => set_value('password', $row->password),
                'id_anggota_fraksi' => set_value('id_anggota_fraksi', $row->id_parent),
                'email' => set_value('email', $row->email),
                'id_group' => set_value('id_group', $row->id_group),
                'nm_group' => set_value('nm_group', $row->group_name),
                'nm_id_group' => set_value('id_group_nm', $row->group_name),
                'foto' => set_value('foto', $row->foto),
                'telp' => set_value('telp', $row->telp),
                'note' => set_value('note', $row->note),
                'created_by' => set_value('created_by', $row->created_by),
                'updated_by' => set_value('updated_by', $row->updated_by),
                'created_at' => set_value('created_at', $row->created_at),
                'updated_at' => set_value('updated_at', $row->updated_at),
                'content' => 'backend/ta/users_form',
            );
            $this->load->view(layout(), $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('ta'));
        }
    }

    public function update_action()
    {
        $this->_rules();
        $row = $this->Users_model->get_by_id($this->input->post('id_user', TRUE));
        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_user', TRUE));
        } else {
            $data = array(
                'fullname' => $this->input->post('fullname', TRUE),
                'id_parent' => $this->input->post('id_anggota_fraksi', TRUE),
                'id_fraksi' => $this->db->get_where('users', ['id_user' => $this->input->post('id_anggota_fraksi', TRUE)])->row()->id_fraksi,
                'id_group' => 0,
                'updated_by' => $this->session->userdata('id_user'),
                'updated_at' => date("Y-m-d H:i:s"),
            );

            $this->Users_model->update($this->input->post('id_user', TRUE), $data);
            $this->session->set_flashdata('message', 'Data Tenaga Ahli Berhasil Diedit');
            redirect(site_url('ta'));
        }
    }


    public function delete($id)
    {
        $row = $this->Users_model->get_by_id($id);

        if ($row) {
            $this->Users_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('ta'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('ta'));
        }
    }


    public function _rules()
    {
        $this->form_validation->set_rules('fullname', 'fullname', 'trim|required');
        $this->form_validation->set_rules('id_anggota_fraksi', 'id anggota fraksi', 'trim|required');
        $this->form_validation->set_rules('id_parent', 'id parent', 'trim');
        $this->form_validation->set_rules('id_fraksi', 'id fraksi', 'trim');

        $this->form_validation->set_rules('id_user', 'id_user', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
}
