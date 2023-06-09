<ol class="breadcrumb float-xl-end">
<li class="breadcrumb-item"><a href="javascript:;"><?php if ($this->uri->segment('1')) {
                                                        echo $this->uri->segment('1');
                                                    } ?></a></li>
<li class="breadcrumb-item active"><?php if ($this->uri->segment('2')) {
                                        echo $this->uri->segment('2');
                                    } ?></li>
</ol>
<h1 class="page-header">Jenis Kunjungan  <small></small></h1>

<?php if ($this->session->userdata('message') != '') { ?>
    <div class="alert alert-danger alert-dismissible fade show">
        <strong><?= $this->session->userdata('message') ?> </strong>
        <a class="alert-link" href="#"></a>
        <button type="button" class="btn-close" data-bs-dismiss="alert"></span>
    </div>
    <?php } ?>

    <div class="row">
        <div class="col-lg-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2 class="panel-title" style="margin-top:0px"><?php echo $button ?> Jenis Kunjungan </h2>
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
            <label class="form-label" for="varchar">Nama Jenis Kunjungan <?php echo form_error('nama_jenis_kunjungan') ?></label>
            <input type="text" class="form-control text-uppercase" maxlength="50" name="nama_kunker" id="nama_kunker" placeholder="Nama kunker" value="<?php echo $nama_kunker; ?>" />
        </div>
	    <div class="mb-3">
            <label class="form-label" for="int">Maksimal Kunjungan <?php echo form_error('maksimal_kunjungan') ?></label>
            <div class="input-group">
                <input type="text" class="form-control numeric" maxlength="2" name="maksimal_kunjungan" id="maksimal_kunjungan" placeholder="Maksimal Kunjungan" value="<?php echo $maksimal_kunjungan; ?>" />
                <span class="btn btn-info">pertahun</span>
            </div>
        </div>
	    <div class="mb-3">
            <label class="form-label" for="int">Jumlah Hari <?php echo form_error('jumlah_hari') ?></label>
            <div class="input-group">
                <input type="text" class="form-control numeric" maxlength="2" name="jumlah_hari" id="jumlah_hari" placeholder="Jumlah Hari" value="<?php echo $jumlah_hari; ?>" />
                <span class="btn btn-info">perkunjungan</span>
        </div>
        </div>
	    <input type="hidden" name="id_jenis_kunjungan" value="<?php echo $id_jenis_kunjungan; ?>" /> 
	    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" >
	    <button type="submit" class="btn btn-flat btn-success"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('jenis_kunjungan') ?>" class="btn btn-flat btn-default">Cancel</a>
	</div>
            </form>
        </div>
        </div>
        </div>