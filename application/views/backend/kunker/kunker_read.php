<ol class="breadcrumb float-xl-end">
<li class="breadcrumb-item"><a href="javascript:;"><?php if ($this->uri->segment('1')) {
                                                        echo $this->uri->segment('1');
                                                    } ?></a></li>
<li class="breadcrumb-item active"><?php if ($this->uri->segment('2')) {
                                        echo $this->uri->segment('2');
                                    } ?></li>
</ol>
<h1 class="page-header">Kunker  <small></small></h1>

<div class="row">
    <div class="col-lg-12">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h2 class="panel-title" style="margin-top:0px">Kunker Read</h2>
            <div class="panel-heading-btn">
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-default" data-toggle="panel-expand"><i class="fa fa-expand"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-success" data-toggle="panel-reload"><i class="fa fa-redo"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-warning" data-toggle="panel-collapse"><i class="fa fa-minus"></i></a>
                    <!-- <a href="javascript:;" class="btn btn-xs btn-icon btn-danger" data-toggle="panel-remove"><i class="fa fa-times"></i></a> -->
                </div>
        </div>
        <div class="panel-body">
        <div class="table-responsive">
        <table class="table">
	    <tr><td>Id Jenis Kunjungan</td><td><?php echo $id_jenis_kunjungan; ?></td></tr>
	    <tr><td>Nomor Surat</td><td><?php echo $nomor_surat; ?></td></tr>
	    <tr><td>Tanggal Surat</td><td><?php echo $tanggal_surat; ?></td></tr>
	    <tr><td>Perihal Surat</td><td><?php echo $perihal_surat; ?></td></tr>
	    <tr><td>Lampiran Surat</td><td><?php echo $lampiran_surat; ?></td></tr>
	    <tr><td>Tingkat Keamanan</td><td><?php echo $tingkat_keamanan; ?></td></tr>
	    <tr><td>Id Fraksi</td><td><?php echo $id_fraksi; ?></td></tr>
	    <tr><td>Id Anggota Fraksi</td><td><?php echo $id_anggota_fraksi; ?></td></tr>
	    <tr><td>Id Kunker Ta</td><td><?php echo $id_kunker_ta; ?></td></tr>
	    <tr><td>Nama Daerah Tujuan</td><td><?php echo $nama_daerah_tujuan; ?></td></tr>
	    <tr><td>File Surat</td><td><?php echo $file_surat; ?></td></tr>
	    <tr><td>File Nodin</td><td><?php echo $file_nodin; ?></td></tr>
	    <tr><td>Pemberi Disposisi</td><td><?php echo $pemberi_disposisi; ?></td></tr>
	    <tr><td>Isi Disposisi</td><td><?php echo $isi_disposisi; ?></td></tr>
	    <tr><td>Tujuan Disposisi</td><td><?php echo $tujuan_disposisi; ?></td></tr>
	    <tr><td>Status Disposisi</td><td><?php echo $status_disposisi; ?></td></tr>
	    <tr><td>Created At</td><td><?php echo $created_at; ?></td></tr>
	    <tr><td>Disposisi At</td><td><?php echo $disposisi_at; ?></td></tr>
	    <tr><td>Created By</td><td><?php echo $created_by; ?></td></tr>
	    <tr><td>Disposisi By</td><td><?php echo $disposisi_by; ?></td></tr>
	    <tr><td>Diposisi Note</td><td><?php echo $diposisi_note; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('kunker') ?>" class="btn btn-flat btn-default">Cancel</a></td></tr>
	</table>
             </div>
            </div>
        </div>
    </div>
    </div>