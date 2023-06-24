<ol class="breadcrumb float-xl-end">
    <li class="breadcrumb-item"><a href="javascript:;"><?php if ($this->uri->segment('1')) {
                                                            echo $this->uri->segment('1');
                                                        } ?></a></li>
    <li class="breadcrumb-item active"><?php if ($this->uri->segment('2')) {
                                            echo $this->uri->segment('2');
                                        } ?></li>
</ol>
<h1 class="page-header">Laporan Kunjungan Kerja <small></small></h1>

<?php if ($this->session->userdata('error_message') != '') { ?>
    <div class="alert alert-danger alert-dismissible fade show">
        <strong><?= $this->session->userdata('error_message') ?> </strong>
        <a class="alert-link" href="#"></a>
        <button type="button" class="btn-close" data-bs-dismiss="alert"></span>
    </div>
<?php } ?>

<div class="row">
    <div class="col-lg-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h2 class="panel-title" style="margin-top:0px">Pilih Rentang Tanggal Laporan </h2>

                <div class="panel-heading-btn">
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-default" data-toggle="panel-expand"><i class="fa fa-expand"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-success" data-toggle="panel-reload"><i class="fa fa-redo"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-warning" data-toggle="panel-collapse"><i class="fa fa-minus"></i></a>
                    <!-- <a href="javascript:;" class="btn btn-xs btn-icon btn-danger" data-toggle="panel-remove"><i class="fa fa-times"></i></a> -->
                </div>
            </div>
            <form action="<?=base_url()?>backend/prin_kunker" method="post" enctype="multipart/form-data">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="mb-3">
                                <label class="form-label" for="int">Tanggal Mulai <?php echo form_error('tanggal_mulai') ?></label>
                                <input type="text" class="form-control date" name="tanggal_mulai" id="tanggal_mulai" placeholder="Tanggal Mulai" value="<?php echo date('Y-m-')."01" ?>" />
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="int">Tanggal Selesai <?php echo form_error('tanggal_selesai') ?></label>
                                <input type="text" class="form-control date" name="tanggal_selesai" id="tanggal_selesai" placeholder="Tanggal Selesai" value="<?php echo date('Y-m-d') ?>" />
                            </div>
                            <div class="mb-3">
                            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                    <button type="submit" class="btn btn-flat btn-success">Tampilkan</button>
                    
                    <a href="<?php echo site_url('kunker') ?>" class="btn btn-flat btn-default">Cancel</a>
                            </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>