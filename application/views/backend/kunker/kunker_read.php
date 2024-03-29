<ol class="breadcrumb hidden-print float-xl-end">
    <li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
    <li class="breadcrumb-item active">Invoice</li>
</ol>
<!-- END breadcrumb -->
<!-- BEGIN page-header -->
<h1 class="page-header hidden-print">Permohonan SPPD <small>Tentang <?php echo $perihal_surat; ?></small></h1>
<!-- END page-header -->
<!-- BEGIN invoice -->
<div class="invoice">
    <!-- BEGIN invoice-company -->
    <div class="invoice-company">
        <span class="float-end hidden-print">
            <a href="<?= base_url() ?>kunker" class="btn btn-sm btn-white mb-10px"><i class="fa fa-arrow-circle-left t-plus-1 text-danger fa-fw fa-lg"></i>Kembali</a>
            <?php //if ($status_disposisi == 2 and $this->session->userdata('level') == 3) { ?>
            <?php if (($status_disposisi == 2 and $this->session->userdata('level') == 3) || ($this->session->userdata('level') == 2)) { ?>
                <a href="<?= base_url() ?>kunker/update/<?= $id_kunker ?>" class="btn btn-sm btn-white mb-10px"><i class="fa fa-edit t-plus-1 text-warning fa-fw fa-lg"></i>Ubah</a>
            <?php } ?>
            <?php if ($status_disposisi == 1) { ?>
                <a href="<?= base_url() ?>kunker/disposisi/<?= $id_kunker ?>" target="_blank" class="btn btn-sm btn-white mb-10px"><i class="fa fa-print t-plus-1 fa-fw text-danger fa-lg"></i> Cetak Disposisi</a>
            <?php } ?>
            <a target="_blank" href="<?= base_url() ?>assets/dok_permohonan/<?= @$file_surat ?>" class="btn btn-sm btn-white mb-10px"><i class="fa fa-file-pdf t-plus-1 text-danger fa-fw fa-lg"></i> Lihat Surat <i>(<?= @$file_surat ?>)</i></a>
        </span>
        &nbsp;Status: <?= $status_disposisi == 1 ? '<span class="text-success"><i class="fa fa-check-square"></i> Diverifikasi</span>' : ($status_disposisi == 2 ? '<span class="text-danger"><i class="fa fa-times"></i> Dikembalikan</span> ['.@$alasan_tolak.']' : ($status_disposisi == 0 ? '<span class="text-warning"><i class="fa fa-clock"></i> Menunggu Verifikasi</span>' : '')) ?>
    </div>
    <!-- END invoice-company -->
    <!-- BEGIN invoice-header -->
    <div class="invoice-header">
        <div class="invoice-from">
            <small>Pemohon</small>
            <address class="mt-5px mb-5px">
                <strong class="text-dark"><?= $nama_fraksi ?></strong><br />
                <strong><?= @$this->db->get_where('users', ['no_anggota' => $id_anggota_fraksi])->row()->fullname ?> [A-<?=$id_anggota_fraksi?>]</strong><br>
                Jenis: <?= $nama_kunker ?><br />
                <label class="badge bg-green">Kunjungan Ke-<?= $kunjungan_ke ?></label><br />
            </address>
        </div>
        <div class="invoice-to">
            <small>Perihal</small>
            <address class="mt-5px mb-5px">
                <strong class="text-dark"><?= @$perihal_surat ?></strong><br />
                Nomor Surat: <?= @$nomor_surat ?><br />
                Tanggal Surat: <?= @$tanggal_surat ?><br />

            </address>
        </div>
        <div class="invoice-date">
            <small>Tujuan</small>
            <div class="date text-dark mt-5px"><?= @$nama_daerah_tujuan ?></div>
            <div class="invoice-detail">
                Berangkat Pada: <?= $tgl_berangkat ?><br />
                Kembali Pada: <?= $tgl_kembali ?><br />
                Jumlah Hari: <?= $jumlah_hari ?> hari<br />
            </div>
        </div>
    </div>
    <?php $jumlah_hari_min1 = $jumlah_hari - 1; ?>
    <!-- END invoice-header -->
    <!-- BEGIN invoice-content -->
    <div class="invoice-content">
        <!-- BEGIN table-responsive -->
        <div class="table-responsive">
            <table class="table table-invoice">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th class="text-center" width="40%">NAMA</th>
                        <th class="text-center" width="30%">KONTAK</th>
                        <th class="text-end" width="20%">EMAIL</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($ta = $this->db->get_where('users', "id_user IN (SELECT id_ta from kunker_ta where id_kunker='$id_kunker' )")->result() as $k => $v) : ?>
                        <tr>
                            <td><?= $k + 1 ?></td>
                            <td>
                                <span class="text-dark"><?= @$v->fullname ?></span></td>
                            <td class="text-center"><?= @$v->telp ?></td>
                            <td class="text-end"><?= @$v->email ?></td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
        <!-- END table-responsive -->
        <!-- BEGIN invoice-price -->
        <div class="invoice-price">
            <div class="invoice-price-left">
                <div class="invoice-price-row">
                    <div class="sub-price">
                        <small>BERANGKAT</small>
                        <span class="text-dark"><?= @date_format(date_create($tgl_berangkat), 'd-m-Y') ?></span>
                    </div>
                    <div class="sub-price">
                        s/d
                    </div>
                    <div class="sub-price">
                        <small>PULANG</small>
                        <span class="text-dark"><?= @date_format(date_create($tgl_kembali), 'd-m-Y') ?></span>
                    </div>
                    <div class="sub-price">
                        <small>TOTAL</small>
                        <span class="text-dark"><?=$jumlah_hari ?> hari</span>
                    </div>
                </div>
            </div>
            <div class="invoice-price-right">
                <small>TOTAL</small> <span class="fw-bold"><?= @count($ta) ?> Tenaga Ahli</span>
            </div>
        </div>
        <!-- END invoice-price -->
    </div>
    <!-- END invoice-content -->
    <!-- BEGIN invoice-note -->
    <div class="invoice-note">
        <div class="row">
            <div class="col-md-8">
                * Maksimal kunjungan <strong><?= $maksimal_kunjungan ?> kali</strong> dalam setahun<br />
                * Maksimal <strong><?= $jumlah_hari ?> hari</strong> dalam sekali kunjungan
            </div>
        </div>
    </div>
    <!-- END invoice-note -->
    <!-- BEGIN invoice-footer -->
    <!-- <div class="invoice-footer">

    </div> -->
    <!-- END invoice-footer -->
</div>
<script>
    $(document).ready(function() {

    });

    function confirm(status) {
        // if($("#diposisi_note").html() == null) {
        // 	swal('','Catatan Disposisi tidak boleh kosong','warning');
        // }
        console.log('x');
        var msgstatus = status == '1' ? 'Terima' : (status == '2' ? 'Dikembalikan' : '');
        swal({
            title: 'Yakin ' + msgstatus + ' Permohonan SPPD?',
            text: 'Setelah verifikasi, Anda tidak dapat merubah status lagi!',
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: status == '1' ? '#3085d6' : '#ff5b57',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, ' + msgstatus + "!",
            cancelButtonText: 'Batal',
            closeOnConfirm: false
        }, function(isConfirmed) {
            if (isConfirmed) {
                $.ajax({
                    url: '<?= base_url() ?>kunker/verify_action',
                    type: 'POST',
                    data: {
                        status: status,
                        id_kunker: <?= @$id_kunker ?>,
                        diposisi_note: $("#diposisi_note").val(),
                    },
                    dataType: 'json',
                    success: function(data) {
                        swal({
                            title: data.title,
                            text: data.msg + "<br><img src='https://cdn-icons-png.flaticon.com/512/5290/5290058.png' style='width:40%'>",
                            html: true,
                            customClass: '',
                        }, function(result) {
                            console.log(result);
                            if (result) {
                                location.reload();
                            }
                        });
                    }
                })
            } else {
                swal('Dibatalkan', 'Aksi dibatalkan', 'error');
            }
        });
    }
</script>