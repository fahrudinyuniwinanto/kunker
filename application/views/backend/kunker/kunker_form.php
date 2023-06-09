<ol class="breadcrumb float-xl-end">
<li class="breadcrumb-item"><a href="javascript:;"><?php if ($this->uri->segment('1')) {
                                                        echo $this->uri->segment('1');
                                                    } ?></a></li>
<li class="breadcrumb-item active"><?php if ($this->uri->segment('2')) {
                                        echo $this->uri->segment('2');
                                    } ?></li>
</ol>
<h1 class="page-header">Kunker  <small></small></h1>

<?php if ($this->session->userdata('message') != '') { ?>
    <div class="alert alert-danger alert-dismissible fade show">
        <strong><?= $this->session->userdata('message') ?> </strong>
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
        
        <form action="<?php echo $action; ?>" method="post">
        <div class="panel-body">
	    <div class="mb-3">
            <label class="form-label" for="int">Id Jenis Kunjungan <?php echo form_error('id_jenis_kunjungan') ?></label>
            <input type="text" class="form-control" name="id_jenis_kunjungan" id="id_jenis_kunjungan" placeholder="Id Jenis Kunjungan" value="<?php echo $id_jenis_kunjungan; ?>" />
        </div>
	    <div class="mb-3">
            <label class="form-label" for="varchar">Nomor Surat <?php echo form_error('nomor_surat') ?></label>
            <input type="text" class="form-control" name="nomor_surat" id="nomor_surat" placeholder="Nomor Surat" value="<?php echo $nomor_surat; ?>" />
        </div>
	    <div class="mb-3">
            <label class="form-label" for="date">Tanggal Surat <?php echo form_error('tanggal_surat') ?></label>
            <input type="text" class="form-control" name="tanggal_surat" id="tanggal_surat" placeholder="Tanggal Surat" value="<?php echo $tanggal_surat; ?>" />
        </div>
	    <div class="mb-3">
            <label class="form-label" for="varchar">Perihal Surat <?php echo form_error('perihal_surat') ?></label>
            <input type="text" class="form-control" name="perihal_surat" id="perihal_surat" placeholder="Perihal Surat" value="<?php echo $perihal_surat; ?>" />
        </div>
	    <div class="mb-3">
            <label class="form-label" for="varchar">Lampiran Surat <?php echo form_error('lampiran_surat') ?></label>
            <input type="text" class="form-control" name="lampiran_surat" id="lampiran_surat" placeholder="Lampiran Surat" value="<?php echo $lampiran_surat; ?>" />
        </div>
	    <div class="mb-3">
            <label class="form-label" for="varchar">Tingkat Keamanan <?php echo form_error('tingkat_keamanan') ?></label>
            <input type="text" class="form-control" name="tingkat_keamanan" id="tingkat_keamanan" placeholder="Tingkat Keamanan" value="<?php echo $tingkat_keamanan; ?>" />
        </div>
	    <div class="mb-3">
            <label class="form-label" for="int">Id Fraksi <?php echo form_error('id_fraksi') ?></label>
            <input type="text" class="form-control" name="id_fraksi" id="id_fraksi" placeholder="Id Fraksi" value="<?php echo $id_fraksi; ?>" />
        </div>
	    <div class="mb-3">
            <label class="form-label" for="int">Id Anggota Fraksi <?php echo form_error('id_anggota_fraksi') ?></label>
            <input type="text" class="form-control" name="id_anggota_fraksi" id="id_anggota_fraksi" placeholder="Id Anggota Fraksi" value="<?php echo $id_anggota_fraksi; ?>" />
        </div>
	    <div class="mb-3">
            <label class="form-label" for="int">Id Kunker Ta <?php echo form_error('id_kunker_ta') ?></label>
            <input type="text" class="form-control" name="id_kunker_ta" id="id_kunker_ta" placeholder="Id Kunker Ta" value="<?php echo $id_kunker_ta; ?>" />
        </div>
	    <div class="mb-3">
            <label class="form-label" for="varchar">Nama Daerah Tujuan <?php echo form_error('nama_daerah_tujuan') ?></label>
            <input type="text" class="form-control" name="nama_daerah_tujuan" id="nama_daerah_tujuan" placeholder="Nama Daerah Tujuan" value="<?php echo $nama_daerah_tujuan; ?>" />
        </div>
	    <div class="mb-3">
            <label class="form-label" for="varchar">File Surat <?php echo form_error('file_surat') ?></label>
            <input type="text" class="form-control" name="file_surat" id="file_surat" placeholder="File Surat" value="<?php echo $file_surat; ?>" />
        </div>
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
            <label class="form-label" for="datetime">Created At <?php echo form_error('created_at') ?></label>
            <input type="text" class="form-control" name="created_at" id="created_at" placeholder="Created At" value="<?php echo $created_at; ?>" />
        </div>
	    <div class="mb-3">
            <label class="form-label" for="datetime">Disposisi At <?php echo form_error('disposisi_at') ?></label>
            <input type="text" class="form-control" name="disposisi_at" id="disposisi_at" placeholder="Disposisi At" value="<?php echo $disposisi_at; ?>" />
        </div>
	    <div class="mb-3">
            <label class="form-label" for="int">Created By <?php echo form_error('created_by') ?></label>
            <input type="text" class="form-control" name="created_by" id="created_by" placeholder="Created By" value="<?php echo $created_by; ?>" />
        </div>
	    <div class="mb-3">
            <label class="form-label" for="int">Disposisi By <?php echo form_error('disposisi_by') ?></label>
            <input type="text" class="form-control" name="disposisi_by" id="disposisi_by" placeholder="Disposisi By" value="<?php echo $disposisi_by; ?>" />
        </div>
	    <div class="mb-3">
            <label class="form-label" for="varchar">Diposisi Note <?php echo form_error('diposisi_note') ?></label>
            <input type="text" class="form-control" name="diposisi_note" id="diposisi_note" placeholder="Diposisi Note" value="<?php echo $diposisi_note; ?>" />
        </div>
	    <input type="hidden" name="id_kunker" value="<?php echo $id_kunker; ?>" /> 
	    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" >
	    <button type="submit" class="btn btn-flat btn-success"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('kunker') ?>" class="btn btn-flat btn-default">Cancel</a>
	</div>
            </form>
        </div>
        </div>
        </div>