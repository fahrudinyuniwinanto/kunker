<?php

function assets($file=''){
  return base_url('assets/'.$file);
}

function is_logged()
{
    $ci = &get_instance();
    if ($ci->session->userdata('logged') != true) {
        redirect('Frontend', 'refresh');
    }
}

//fungsi izin aktif menu
function is_allow($acs)
{
    $ci      = &get_instance();
    $lvl     = $_SESSION['level'];
    $isallow = $ci->db->query(
        "SELECT * FROM user_access as aa inner join master_access as bb 
        on aa.kd_access=bb.id 
        WHERE bb.nm_access='$acs' and aa.id_group='$lvl'"
    )->row();

    if ($isallow != []) {
        if ($isallow->is_allow == 1) {
            return true;
        } else {
            return false;
        }
    } else {
        return false;
    }
}

function allow($arr)
{
    $ci      = &get_instance();
    $level = $ci->session->userdata('level');

    if (in_array($level, $arr)) {
        return true;
    } else {
        return false;
    }
}

function get_data_kategori($for_modul)
{

    $ci                   = &get_instance();
    $data_kateg = $ci->db
        ->where('for_modul', $for_modul)
        ->get('kategori')->result_array();
    $ref_kategori = array();
    $ref_kategori = array("" => "Pilih...");
    foreach ($data_kateg as $v) {
        $ref_kategori[$v['id_kat']] = $v['cat_name'];
    }
    return $ref_kategori;
}

function get_combo($tbl, $id, $nm, $add_opt = [])
{

    $ci = &get_instance();
    $data = $ci->db->get($tbl)->result_array();
    $res = [];
    $res = $add_opt;
    foreach ($data as $v) {
        $res[$v[$id]] = $v[$nm];
    }
    return $res;
}

function get_by_id_kategori($id)
{

    $ci                   = &get_instance();
    $data_kateg = $ci->db
        ->where('id_kat', $id)
        ->get('kategori')->row();
    $data_kateg->cat_name;
    return $data_kateg->cat_name;
}

function get_kecamatan()
{

    $ci                   = &get_instance();
    $data_kateg = $ci->db
        ->get('das_kecamatan')->result_array();
    $ref_kategori = array();
    $ref_kategori = array("" => ">> Pilih");
    foreach ($data_kateg as $v) {
        $ref_kategori[$v['kode_kecamatan']] = $v['nama_kecamatan'];
    }
    return $ref_kategori;
}

function get_desa()
{

    $ci                   = &get_instance();
    $data_kateg = $ci->db
        ->get('das_desa')->result_array();
    $ref_kategori = array();
    $ref_kategori = array("" => ">> Pilih");
    foreach ($data_kateg as $v) {
        $ref_kategori[$v['id_desa']] = $v['nama_desa'];
    }
    return $ref_kategori;
}

function get_variable()
{

    $ci                   = &get_instance();
    $data_kateg = $ci->db
        ->get('das_variable_statistik')->result_array();
    $ref_kategori = array();
    $ref_kategori = array("" => ">> Pilih");
    foreach ($data_kateg as $v) {
        $ref_kategori[$v['kode']] = $v['nama_kategori'];
    }
    return $ref_kategori;
}

function data_app($id = 'APP_NAME')
{
    $ci            = &get_instance();
    $data_instansi = $ci->db->query("SELECT conf_val FROM sy_config WHERE conf_name='$id'")->row();

    if ($data_instansi != []) {
        return $data_instansi->conf_val;
    } else {
        return "";
    }
}

//fungsi layout untuk dipanggil di setiap controller
function layout($l = 'back')
{
    if ($l == 'front') {
        return "layout_frontend";
    } else {
        return "layout_backend";
    }
}


//fungsi cek session akses
function cek_session_akses($link, $id)
{
    $ci      = &get_instance();
    $session = $ci->db->query("SELECT * FROM modul,users_modul WHERE modul.id_modul=users_modul.id_modul AND users_modul.id_session='$id' AND modul.link='$link'")->num_rows();
    if ($session == '0' and $ci->session->userdata('level') != 'admin') {
        redirect(base_url() . 'administrator/home');
    }
}

//fungsi mendapatkan data user
function get_data_users()
{
    $ci = &get_instance();
    $ci->db->select('*')
        ->where_in('level', array('2', '3'))
        ->where('isactive', 1);
    $data_users_disposisi = $ci->db->get('users')->result_array();
    $users_disposisi      = array();
    foreach ($data_users_disposisi as $v) {
        $users_disposisi[$v['id_user']] = $v['fullname'];
    }
    return $users_disposisi;
}

//fungsi menampilkan jumlah wor pada suatu table
function get_numrows($tbl)
{
    $ci = &get_instance();
    $ci->db->select('*');
    $total_row = $ci->db->get($tbl)->num_rows();
    return $total_row;
}


//fungsi mengaktifkan menu
function activate_menu($controller, $by = 'c')
{
    //c=controller, f=method/function
    // Getting CI class instance.
    $CI = get_instance();
    // Getting router class to active.
    if ($by == 'c') {
        $class = $CI->router->fetch_class();
    } elseif ($by == 'f') {
        $class = $CI->router->fetch_method();
    }
    return ($class == $controller) ? 'active' : '';
}

//fungsi format rupiah
function format_rupiah($number)
{

    return number_format($number);
}

//fungsi format rupiah rp
function format_rupiah_rp($number)
{

    return 'Rp. ' . number_format($number);
}
function formatBytes($size, $precision = 2)
{
    $base     = log($size, 1024);
    $suffixes = array('', 'K', 'M', 'G', 'T');

    return round(pow(1024, $base - floor($base)), $precision) . ' ' . $suffixes[floor($base)];
}

//fungsi lookup untuk menampilkan modal lookup
function lookup()
{ ?>
    <div class="modal" id="lookup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog  modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">
                            &times;
                        </span>
                    </button>
                </div>
                <div class="modal-body">
                    <h1><i class="fa fa-refresh"></i></h1>
                </div>
            </div>
        </div>
    </div>
<?php }

//fungsi nama hari
function nama_hari($day)
{
    $dayList = array(
        'Sun' => 'Minggu',
        'Mon' => 'Senin',
        'Tue' => 'Selasa',
        'Wed' => 'Rabu',
        'Thu' => 'Kamis',
        'Fri' => 'Jumat',
        'Sat' => 'Sabtu'
    );

    return $dayList[$day];
}

//fungsi nama bulan
function nama_bulan($month)
{
    $monthList = array(
        '1' => 'Januari',
        '2' => 'Februari',
        '3' => 'Maret',
        '4' => 'April',
        '5' => 'Mei',
        '6' => 'Juni',
        '7' => 'Juli',
        '8' => 'Agustus',
        '9' => 'September',
        '10' => 'Oktober',
        '11' => 'November',
        '12' => 'Desember',
    );

    return $monthList[$month];
}

//fungsi tanggal format indonesia
function tanggal_indo($tanggal)
{
    $bulan = array(
        1 =>   'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
    );
    $pecahkan = explode('-', $tanggal);

    // variabel pecahkan 0 = tahun
    // variabel pecahkan 1 = bulan
    // variabel pecahkan 2 = tanggal

    echo $pecahkan[2] . ' ' . $bulan[(int) $pecahkan[1]] . ' ' . $pecahkan[0];
}

//fungsi generator kode
function GenerateCode()
{
    $possible = '123456789';
    $operator = '+x-';
    $admin    = array('Edy S', 'Bima N', 'Zaki C');
    $a = substr($possible, mt_rand(0, strlen($possible) - 1), 1);
    $b = substr($possible, mt_rand(0, strlen($possible) - 1), 1);
    $opr = substr($operator, mt_rand(0, strlen($operator) - 1), 1);
    if ($opr == '+') {
        $res = $a + $b;
    } else if ($opr == 'x') {
        $res = $a * $b;
    } else {
        $res = $a - $b;
    }
    $code['adm']  = $admin[mt_rand(0, strlen($operator) - 1)];
    $code['res']  = $res;
    $code['text'] = $a . ' ' . $opr . ' ' . $b . ' =';
    return $code;
}

//fungsi untuk mendapatkan kode otomatis dengan parameter nama table, Kolom kode dan tanggal dibuat (create at)
function get_kode($table, $code_field, $create_at)
{

    $ci = &get_instance();
    date_default_timezone_set('Asia/Jakarta');
    $date = date('Y-m-d');
    $q = $ci->db->query("SELECT MAX(RIGHT($code_field,4)) AS kd_max FROM $table WHERE DATE($create_at)=CURDATE()");
    $kd = "";
    if ($q->num_rows() > 0) {
        foreach ($q->result() as $k) {
            $tmp = ((int) $k->kd_max) + 1;
            $kd = sprintf("%04s", $tmp);
        }
    } else {
        $kd = "0001";
    }
    $inisial = "P";
    date_default_timezone_set('Asia/Jakarta');
    return $inisial . date('ymd') . $kd;
}

//fungsi untuk set data join untuk join table dinamis
function set_data_join($table_join, $column_join)
{
    return array(
        'table_join' => $table_join,
        'column_join' => $column_join,
    );
}

//fungsi backup Database
function backupDB()
{

    // Try this, You can change format zip to gz if you like :)
    $CI = get_instance();
    $CI->load->dbutil();

    $prefs = array(
        'format'      => 'zip',
        'filename'    => 'my_db_backup.sql'
    );


    $backup = &$CI->dbutil->backup($prefs);

    $db_name = data_app() . date("Y-m-d-H-i-s") . '.zip';
    $save = base_url() . 'assets/db/' . $db_name;

    $CI->load->helper('file');
    write_file($save, $backup);


    $CI->load->helper('download');
    force_download($db_name, $backup);
}

// pastikan untuk menggunakan sf_upload, di controller._rules field jangan di required
function sf_upload($nama_gambar, $lokasi_gambar, $tipe_gambar, $ukuran_gambar, $name_file_form)
{
    $CI                         = &get_instance();
    $nmfile                     = $nama_gambar . "_" . time();
    $config['upload_path']      = './' . $lokasi_gambar;
    //tambahi skrip disini is_dir exist
    $config['allowed_types']    = $tipe_gambar;
    $config['max_size']         = $ukuran_gambar;
    $config['file_name']        = $nmfile;
    $CI->load->library('upload', $config);
    $CI->upload->do_upload($name_file_form);
    //die($CI->upload->display_errors());
    $result1                    = $CI->upload->data();
    $result                     = ['gambar' => $result1];
    $dfile                      = $result['gambar']['file_name'];

    return $dfile;
}

function curl_get($url)
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $output = curl_exec($ch);
    if ($output === false) {
        echo "Error Number:" . curl_errno($ch) . "<br>";
        echo "Error String:" . curl_error($ch);
    }
    curl_close($ch);
    return $output;
}

function wfDebug($arr = [])
{
    echo "<pre>";
    print_r($arr);
    die();
}

function wfLastQuery($q = '')
{
    $ci = &get_instance();
    echo "<pre>";
    die($ci->db->last_query());
}


function base64url_encode($data)
{
    return rtrim(strtr(base64_encode($data), '+/', '-_'), '=');
}

function base64url_decode($data)
{
    return base64_decode(str_pad(strtr($data, '-_', '+/'), strlen($data) % 4, '=', STR_PAD_RIGHT));
}
