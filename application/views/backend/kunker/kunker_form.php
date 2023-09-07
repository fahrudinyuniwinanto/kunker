<ol class="breadcrumb float-xl-end">
    <li class="breadcrumb-item"><a href="javascript:;"><?php if ($this->uri->segment('1')) {
                                                            echo $this->uri->segment('1');
                                                        } ?></a></li>
    <li class="breadcrumb-item active"><?php if ($this->uri->segment('2')) {
                                            echo $this->uri->segment('2');
                                        } ?></li>
</ol>
<h1 class="page-header">Kunker <small></small></h1>

<?php if ($this->session->userdata('error_message') != '') { ?>
    <div class="alert alert-danger alert-dismissible fade show">
        <strong><?= $this->session->userdata('error_message') ?> </strong>
        <a class="alert-link" href="#"></a>
        <button type="button" class="btn-close" data-bs-dismiss="alert"></span>
    </div>
<?php } ?>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h2 class="panel-title" style="margin-top:0px"><?php echo $button ?> Kunker </h2>

                <div class="panel-heading-btn">
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-default" data-toggle="panel-expand"><i class="fa fa-expand"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-success" data-toggle="panel-reload"><i class="fa fa-redo"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-warning" data-toggle="panel-collapse"><i class="fa fa-minus"></i></a>
                    <!-- <a href="javascript:;" class="btn btn-xs btn-icon btn-danger" data-toggle="panel-remove"><i class="fa fa-times"></i></a> -->
                </div>
            </div>
            <form id="myForm" action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label class="form-label" for="int">Fraksi <?php echo form_error('id_fraksi') ?></label>
                                <?= form_dropdown('id_fraksi', get_combo_where('fraksi', 'id_fraksi', 'nama_fraksi', [], ['id_fraksi' => $this->session->userdata('id_fraksi')]), $id_fraksi, ['class' => 'form-control', 'required' => TRUE]) ?>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="int">Nomor Anggota <?php echo form_error('no_anggota') ?></label>
                                <input type="text" class="form-control" name="no_anggota" id="no_anggota" placeholder="" value="<?="A-".getSession('no_anggota') ?>" readonly />
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="int">Nama Anggota <?php echo form_error('id_anggota_fraksi') ?></label>
                                <?= form_dropdown('id_anggota_fraksi', get_combo_where('users', 'no_anggota', 'fullname', [], ['id_user' => $this->session->userdata('id_user')]), $id_anggota_fraksi, ['class' => 'form-control', 'required' => TRUE]) ?>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="int">Jenis Kunjungan <?php echo form_error('id_jenis_kunjungan') ?></label>
                                <label class="badge bg-green jenis_kunjungan" for="int"><i>Kunjungan Ke-<b><span id="kunjungan_ke2"><?=$kunjungan_ke?></span></b></i> </label>
                                <input type="hidden" class="form-control" name="kunjungan_ke" id="kunjungan_ke" placeholder="" value="<?php echo $kunjungan_ke; ?>" readonly />
                                <input type="hidden" class="form-control" name="maksimal_hari" id="maksimal_hari" placeholder="" value="" readonly />
                                <?= form_dropdown('id_jenis_kunjungan', get_combo('jenis_kunjungan', 'id_jenis_kunjungan', 'nama_kunker', ['' => "--Pilih--"]), $id_jenis_kunjungan, ['class' => 'form-control', 'id' => 'id_jenis_kunjungan', 'required' => TRUE]) ?><br />
                                <label class="badge bg-red jenis_kunjungan" for="int"><i>Sisa Kuota Kunjungan adalah <b><span id="sisa_kunjungan"></span> Kali</b></i> </label>
                            </div>
                            <div class="mb-3 jenis_kunjungan">
                                <label class="form-label" for="int"><i>Keterangan</i> </label>
                                <div class="alert alert-warning">

                                    * Maksimal kunjungan <strong><span id="maks_kunjungan"></span> kali</strong> dalam setahun<br />
                                    * Maksimal <strong> <span id="maks_hari"></span>hari</strong> dalam sekali kunjungan

                                </div>
                            </div>

                        </div>
                        <div class="col-lg-4">
                            <div class="row dapil_hari">
                                <div class="col-lg-9">
                                    <div class="mb-3">
                                        <label class="form-label" for="varchar">Daerah Pemilihan <?php echo form_error('nama_daerah_tujuan') ?></label>
                                        <input type="text" class="form-control" name="nama_daerah_tujuan" id="nama_daerah_tujuan" placeholder="Isikan Daerah Pemilihan" value="<?php echo $nama_daerah_tujuan; ?>" required />
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="mb-3">
                                        <label class="form-label" for="int">Jumlah Hari <?php echo form_error('jumlah_hari') ?></label>
                                        <input type="text" class="form-control numeric" name="jumlah_hari" id="jumlah_hari" placeholder="" value="<?php echo $jumlah_hari; ?>" readonly />
                                    </div>
                                </div>
                            </div>
                            <div class="row jenis_kunjungan">
                                <div class="col-lg-6">
                                    <div class="mb-3 ">
                                        <label class="form-label" for="varchar">Tgl. Berangkat <?php echo form_error('tgl_berangkat') ?></label>
                                        <input type="date" class="form-control" name="tgl_berangkat" id="tgl_berangkat" placeholder="" value="<?php echo $tgl_berangkat; ?>" required />
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="int">Tgl. Kembali <?php echo form_error('tgl_kembali') ?></label>
                                        <input type="date" class="form-control" name="tgl_kembali" id="tgl_kembali" placeholder="" value="<?php echo $tgl_kembali; ?>" required />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-8">
                                    <div class="mb-3">
                                        <label class="form-label" for="varchar">Nomor Surat<?php echo form_error('nomor_surat') ?></label>
                                        <input type="text" class="form-control" name="nomor_surat" id="nomor_surat" placeholder="Nomor Surat" value="<?php echo $nomor_surat; ?>" required />
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label class="form-label" for="varchar">Tingkat Keamanan <?php echo form_error('tingkat_keamanan') ?></label>
                                        <?= form_dropdown('tingkat_keamanan', ['' => "--Pilih--", 'Biasa' => "Biasa", 'Segera' => "Segera"], $tingkat_keamanan, ['class' => 'form-control', 'required' => TRUE]) ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-8">
                                    <div class="mb-3">
                                        <label class="form-label" for="date">Tanggal Surat<?php echo form_error('tanggal_surat') ?></label>
                                        <input type="date" class="form-control" name="tanggal_surat" id="tanggal_surat" placeholder="Tanggal Surat" value="<?php echo $tanggal_surat; ?>" required />
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label class="form-label" for="varchar">Lampiran<?php echo form_error('lampiran_surat') ?></label>
                                        <input type="text" class="form-control" name="lampiran_surat" id="lampiran_surat" placeholder="Cth: 3 berkas" value="<?php echo $lampiran_surat; ?>" required />
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="varchar">Perihal<?php echo form_error('perihal_surat') ?></label>
                                <textarea type="text" class="form-control" name="perihal_surat" id="perihal_surat" placeholder="Perihal Surat" required><?php echo $perihal_surat; ?></textarea>
                            </div>
                            <!-- <div class="mb-3">
                                <label class="form-label" for="int">Id Kunker Ta <?php echo form_error('id_kunker_ta') ?></label>
                                <input type="text" class="form-control" name="id_kunker_ta" id="id_kunker_ta" placeholder="Id Kunker Ta" value="<?php echo $id_kunker_ta; ?>" />
                            </div> -->
                            <div class="mb-3">
                                <label class="form-label" for="varchar">File Surat Permohonan&nbsp <?php echo form_error('file_surat') ?></label><?php if ($file_surat) {
                                                                                                                                                        echo '<i>' . $file_surat . '</i>';
                                                                                                                                                    } ?>
                                <input type="file" class="form-control" name="file_surat" id="file_surat" placeholder="File Surat" value="<?php echo $file_surat; ?>" accept="application/pdf" />
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="table-responsive" id="tabel-TAA">
                                <!--<table class="table table-bordered table-hover table-condensed" style="margin-bottom: 10px">
                                    <thead class="thead-light">
                                        <tr>
                                            <!-- <th class="text-center">No</th> --
                                            <th class="text-center">Nama Tenaga Ahli Anggota (TAA)</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="dynamic-fields">
                                    </tbody>
                                </table>-->
                                <table class="table table-bordered table-hover table-condensed" style="margin-bottom: 10px">
                                    <thead class="thead-light">
                                        <tr>
                                            <th class="text-center">No</th>
                                            <th class="text-center">Nama Tenaga Ahli Anggota (TAA)</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $start = 1;
                                        foreach ($data_ta as $k => $v) { ?>
                                            <tr>
                                                <td><?= $start++ ?></td>
                                                <td><?= $v->fullname ?></td>
                                                <td class="text-center">
                                                    <input type="checkbox" name="id_ta[]" id="cek-<?= $v->id_user ?>" value="<?= $v->id_user ?>" <?php if ($this->db->get_where('kunker_ta', ['id_ta' => $v->id_user, 'id_kunker' => $id_kunker])->num_rows() > 0) {
                                                                                                                                                            echo 'checked';
                                                                                                                                                        } else {
                                                                                                                                                            echo '';
                                                                                                                                                        } ?> />
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                                <i>Centang jika diikutkan.</i>
                                <!-- <button class="btn btn-warning" id="add-field" onclick="event.preventDefault()">Tambah Anggota</button> -->
                            </div>
                        </div>

                        <!-- <div class="col-lg-4">
                            <div class="mb-3">
                                <label class="form-label" for="varchar">File Nodin <?php echo form_error('file_nodin') ?></label>
                                <input type="text" class="form-control" name="file_nodin" id="file_nodin" placeholder="File Nodin" value="<?php echo $file_nodin; ?>" />
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="varchar">Pemberi Disposisi <?php echo form_error('pemberi_disposisi') ?></label>
                                <input type="text" class="form-control" name="pemberi_disposisi" id="pemberi_disposisi" placeholder="Pemberi Disposisi" value="<?php echo $pemberi_disposisi; ?>" />
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="varchar">Isi Disposisi <?php echo form_error('isi_disposisi') ?></label>
                                <input type="text" class="form-control" name="isi_disposisi" id="isi_disposisi" placeholder="Isi Disposisi" value="<?php echo $isi_disposisi; ?>" />
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="varchar">Tujuan Disposisi <?php echo form_error('tujuan_disposisi') ?></label>
                                <input type="text" class="form-control" name="tujuan_disposisi" id="tujuan_disposisi" placeholder="Tujuan Disposisi" value="<?php echo $tujuan_disposisi; ?>" />
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="int">Status Disposisi <?php echo form_error('status_disposisi') ?></label>
                                <input type="text" class="form-control" name="status_disposisi" id="status_disposisi" placeholder="Status Disposisi" value="<?php echo $status_disposisi; ?>" />
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="varchar">Diposisi Note <?php echo form_error('diposisi_note') ?></label>
                                <input type="text" class="form-control" name="diposisi_note" id="diposisi_note" placeholder="Diposisi Note" value="<?php echo $diposisi_note; ?>" />
                            </div>
                        </div> -->
                    </div>
                </div>

                <div class="panel-footer">
                    <input type="hidden" name="id_kunker" value="<?php echo $id_kunker; ?>" />
                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                    <button type="submit" class="btn btn-flat btn-success"><?php echo $button ?></button>
                    <a href="<?php echo site_url('kunker') ?>" class="btn btn-flat btn-default">Cancel</a>
                </div>


            </form>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        <?php if ($this->uri->segment(2) == 'update') { ?>
            // $("#id_jenis_kunjungan").val('');
            $(".jenis_kunjungan").show();
            $(".dapil_hari").show();

        <?php } ?>

        <?php if ($this->uri->segment(2) == 'create') { ?>
            $("#id_jenis_kunjungan").val('');
            $(".jenis_kunjungan").hide();
            $(".dapil_hari").hide();
            $("#nama_daerah_tujuan").attr('readonly', true);
            $("#tgl_berangkat").attr('readonly', true);
            $("#tgl_kembali").attr('readonly', true);
        <?php } ?>
        var j = 0;

        $('form').submit(function(e) {
            e.preventDefault();
            swal({
                title: 'Yakin mengajukan Permohonan ini ?',
                text: 'Setelah diajukan, Anda tidak dapat merubah data ajuan !',
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya',
                cancelButtonText: 'Batal',
                closeOnConfirm: false
            }, function(isConfirmed) {
                if (isConfirmed) {
                    $('form').submit();
                    swal({
                        title: "Permohonan Berhasil Diajukan",
                        text: "<br><img src='https://cdn-icons-png.flaticon.com/512/5290/5290058.png' style='width:40%'>",
                        html: true,
                        customClass: '',
                    }, function(result) {
                        console.log(result);
                        if (result) {
                            location.reload();
                        }
                    });
                } else {
                    swal('Dibatalkan', 'Aksi dibatalkan', 'error');
                }
            });

            // swal('Apakah Anda sudah yakin ?', 'Pastikan data sudah benar!. Data tidak dapat diubah setelah Anda ajukan.', 'warning');

        });

        // Menambahkan field baru
        $('#add-field').click(function() {

            var field = "<tr id='row[]'><td><select class='form-control' name='id_ta[]' id='id_ta" + j + "' required><option value=''>--Pilih--</option></select></td><td class='text-center' width='50px'><button class='btn btn-sm btn-danger remove-field'><i class='fa fa-trash '></i> </button></td></tr>";
            $('#dynamic-fields').append(field);
            getComboTa(j);
            j++;
        });

        // Menghapus field
        $('#dynamic-fields').on('click', '.remove-field', function() {
            $(this).parent().parent().remove();
        });

        //get_maks_hari();
        //console.log(maksimal_hari);
        get_data_kunjungan()
        jumlah_hari();
    });

    //hitung tanggal otomatis dan validas maks hari kunjungan
    function jumlah_hari() {
        //hitung tanggal otomatis
        $('#tgl_berangkat, #tgl_kembali').change(function() {
            var id_jenis_kunjungan = $('#id_jenis_kunjungan').val();
            var tgl_berangkat = new Date($('#tgl_berangkat').val());
            var maksimal_hari = $("#maksimal_hari").val();
            var initialDate = tgl_berangkat.toISOString().split('T')[0];
            var updatedDate = new Date(initialDate);
            updatedDate.setDate(updatedDate.getDate() + parseInt(maksimal_hari) - 1);
            var updatedDateString = updatedDate.toISOString().split('T')[0];
            var day = tgl_berangkat.getDay();
            if (id_jenis_kunjungan == 1) {
                //jika senin
                if (day == 1) {
                    swal('Gagal', 'Tanggal Kunjungan Daerah Pilihan harus pada Hari Jumat/Sabtu/Minggu.', 'error');
                    $("#tgl_berangkat").val("");
                    $("#tgl_kembali").val("");
                    $("#jumlah_hari").val("");
                }
                //jika selasa
                if (day == 2) {

                    swal('Gagal', 'Tanggal Kunjungan Daerah Pilihan harus pada Hari Jumat/Sabtu/Minggu.', 'error');
                    $("#tgl_berangkat").val("");
                    $("#tgl_kembali").val("");
                    $("#jumlah_hari").val("");
                }
                //jika rabu
                if (day == 3) {

                    swal('Gagal', 'Tanggal Kunjungan Daerah Pilihan harus pada Hari Jumat/Sabtu/Minggu.', 'error');
                    $("#tgl_berangkat").val("");
                    $("#tgl_kembali").val("");
                    $("#jumlah_hari").val("");
                }
                //jika kamis
                if (day == 4) {

                    swal('Gagal', 'Tanggal Kunjungan Daerah Pilihan harus pada Hari Jumat/Sabtu/Minggu.', 'error');
                    $("#tgl_berangkat").val("");
                    $("#tgl_kembali").val("");
                    $("#jumlah_hari").val("");
                }
            }

            //tambah attr pada tanggal kembali (min=tgl_berangkat)
            $('#tgl_kembali').attr('min', initialDate);
            $('#tgl_kembali').attr('max', updatedDateString);
            $("#tgl_kembali").removeAttr('readonly');
            //$("#tgl_kembali").val('');

            var tgl_kembali = new Date($('#tgl_kembali').val());

            var selisihHari = Math.floor((tgl_kembali - tgl_berangkat) / (1000 * 60 * 60 * 24)) + 1;

            $('#jumlah_hari').val(selisihHari);
        });
    };

    function get_maks_hari() {
        $('#id_jenis_kunjungan').change(function() {
            var id_jen_kunjungan = $('#id_jenis_kunjungan').val();
            $.ajax({
                url: "<?php echo site_url('kunker/get_maks_hari'); ?>",
                dataType: 'json',
                type: 'GET',
                data: {
                    id_jenis_kunjungan: id_jen_kunjungan
                },
                success: function(res) {
                    return res.jumlah_hari;
                }
            });
        });
    }

    function get_data_kunjungan() {
        $('#id_jenis_kunjungan').change(function() {
            var id_jen_kunjungan = $('#id_jenis_kunjungan').val();
            $("#nama_daerah_tujuan").val('');
            $("#jumlah_hari").val('');
            $("#tgl_berangkat").val('');
            $("#tgl_kembali").val('');
            $.ajax({
                url: "<?php echo site_url('kunker/get_data_kunjungan'); ?>",
                dataType: 'json',
                type: 'GET',
                data: {
                    id_jenis_kunjungan: id_jen_kunjungan
                },
                success: function(res) {
                    if (res.jenis_kunjungan.maksimal_kunjungan - (res.jumlah_kunjungan) <= 0) {

                        swal('Kuota Kunjungan Sudah Habis', 'Silahkan Pilih Jenis Kunjungan Lainnya', 'error');
                    } else {
                        $("#kunjungan_ke").val(res.jumlah_kunjungan + 1);
                        $("#kunjungan_ke2").text(res.jumlah_kunjungan + 1);
                        $("#sisa_kunjungan").text(res.jenis_kunjungan.maksimal_kunjungan - (res.jumlah_kunjungan));
                        $("#maks_kunjungan").text(res.jenis_kunjungan.maksimal_kunjungan);
                        $("#maks_hari").text(res.jenis_kunjungan.jumlah_hari);
                        $("#maksimal_hari").val(res.jenis_kunjungan.jumlah_hari);
                        $(".jenis_kunjungan").show();
                        if (res.jenis_kunjungan.id_jenis_kunjungan != 6) {
                            $(".dapil_hari").show();
                            $("#tabel-TAA").show();
                        } else {
                            $("#tabel-TAA").hide();
                            $(".dapil_hari").hide();
                            $(".jenis_kunjungan").hide();
                            $("#nama_daerah_tujuan").removeAttr('required');
                            $("#tgl_berangkat").removeAttr('required');
                            $("#tgl_kembali").removeAttr('required');
                        }

                        $("#nama_daerah_tujuan").removeAttr('readonly');
                        $("#tgl_berangkat").removeAttr('readonly');
                    }
                }
            });
        });
    }

    function getComboTa(j) {

        $.ajax({
            url: "<?php echo site_url('kunker/getArrTa'); ?>",
            dataType: 'json',
            type: 'GET',
            data: {
                id_ta: "<?= $this->session->userdata('id_user') ?>"
            },
            success: function(res) {
                $.each(res, function(i, v) {
                    $("#id_ta" + j).append("<option value='" + v.id_user + "'>" + v.fullname + "</option>");
                });
            }
        })
    }
</script>