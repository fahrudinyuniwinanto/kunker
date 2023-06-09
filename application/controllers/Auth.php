<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Auth extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Auth_model');
        if ($this->session->userdata('is_logged') == true) {
            redirect('Backend', 'refresh');
        }
    }
    public function index($error = NULL)
    {
        redirect(base_url(), 'refresh');
    }

    public function login()
    {
        // $this->db->query("SET GLOBAL sql_mode=(SELECT REPLACE(@@sql_mode,'ONLY_FULL_GROUP_BY',''))");
        //CAPTCHA================================//
        $cpt    = $this->input->post("cpt", TRUE);
        $rescpt = $this->input->post("rescpt", TRUE);
        $username = $this->input->post('username');
        $password = md5($this->input->post('password'));

        if ($cpt != $rescpt) {
            $this->session->set_flashdata('msgcaptcha', '<i class="fa fa-warning"></i> Captcha belum tepat, silakan ulangi lagi');
            redirect(site_url(''));
        }
        //ENDOFCAPTCHA=========================//


        //sebut nama tabel yg akan dicek login
        $data_tbl = array('users');

        //array of record dari tabel user 
        //index 0 value users                
        foreach ($data_tbl as $key => $vtbl) {

            //cek login multi table
            $login = $this->Auth_model->login_multitable($username, $password, $vtbl);

            //jika num_rows login sama dengan satu
            if ($login == 1) {

                // die($value."=".$login);
                // ambil detail data (arraykan)
                $row =  $this->Auth_model->data_login_multitable($username, $password, $vtbl);

                switch ($vtbl) {

                        //sesuai id di tabel user_group
                    case 'users':
                        $grup = $row->id_group;
                        break;
                }

                // die($grup."dfdf");
                // daftarkan session
                $data = array(
                    'logged'        => TRUE,
                    'id_user'       => $row->id_user,
                    'id_group'      => $row->id_group,
                    'id_desa'       => $row->id_desa,
                    'username'      => $row->username,
                    'fullname'      => $row->fullname,
                    'telp'          => $row->telp,
                    'email'         => $row->email,
                    'foto'          => $row->foto,
                    'level'         => $grup,
                );

                //masukkan data user ke session
                $this->session->set_userdata($data);



                //            redirect ke halaman sukses
                redirect(site_url('backend'));
            }
        }
        //            tampilkan pesan error
        $error = 'username / password salah';
        $this->index($error);
    }

    function logout()
    {
        //        destroy session
        $this->session->sess_destroy();

        //        redirect ke halaman login
        redirect(site_url('auth'));
    }
}
