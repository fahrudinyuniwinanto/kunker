<ol class="breadcrumb float-xl-end">
    <li class="breadcrumb-item"><a href="javascript:;"><?php if ($this->uri->segment('1')) {
                                                            echo $this->uri->segment('1');
                                                        } ?></a></li>
    <li class="breadcrumb-item active"><?php if ($this->uri->segment('2')) {
                                            echo $this->uri->segment('2');
                                        } ?></li>
</ol>

<h1 class="page-header">Tenaga Ahli <small></small></h1>
<div class="row" style="height: 100%">
    <div class="col-lg-4">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h2 class="panel-title" style="margin-top:0px"><?php echo $button ?> Tenaga Ahli </h2>
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
                        <label for="varchar" class="form-label">NIK <?php echo form_error('nik') ?></label>
                        <input type="text" class="form-control" name="nik" id="nik" placeholder="NIK" value="<?php echo $nik; ?>" required />
                    </div>
                    <div class="mb-3">
                        <label for="varchar" class="form-label">Nama Tenaga Ahli (TA) <?php echo form_error('fullname') ?></label>
                        <input type="text" class="form-control" name="fullname" id="fullname" placeholder="Nama" value="<?php echo $fullname; ?>" required />
                    </div>
                    <div class="mb-3">
                        <label for="int" class="form-label">Nama Anggota<?php echo form_error('id_anggota_fraksi') ?></label>
                        <?= form_dropdown('id_anggota_fraksi', get_combo_where('users', 'id_user', 'fullname', ['' => "--Pilih--"], ['id_group' => '3', 'status' => '1']), $id_anggota_fraksi, ['class' => 'form-control', 'required' => TRUE]) ?>
                    </div>
                    <div class="mb-3">
                        <label for="int" class="form-label">Status<?php echo form_error('status') ?></label>
                        <?= form_dropdown('status', ['' => "--Pilih--", "1" => "AKTIF", "0" => "NON AKTIF"], $status, ['class' => 'form-control', 'required' => TRUE]) ?>
                    </div>
                    <input type="hidden" name="id_user" value="<?php echo $id_user; ?>" />
                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                    <button type="submit" class="btn btn-success"><?php echo $button ?></button>
                    <a href="<?php echo site_url('ta') ?>" class="btn btn-default">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
</body>

</html>