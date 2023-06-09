<ol class="breadcrumb float-xl-end">
    <li class="breadcrumb-item"><a href="javascript:;"><?php if ($this->uri->segment('1')) {
                                                            echo $this->uri->segment('1');
                                                        } ?></a></li>
    <li class="breadcrumb-item active"><?php if ($this->uri->segment('2')) {
                                            echo $this->uri->segment('2');
                                        } ?></li>
</ol>

<h1 class="page-header">Parameter Aplikasi <small></small></h1>
<div class="row" style="height: 100%">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h2 class="panel-title" style="margin-top:0px"><?php echo $button ?> Parameter Aplikasi </h2>
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
                        <label class="form-label" for="varchar">Nama Parameter <?php echo form_error('conf_name') ?></label>
                        <input type="text" class="form-control" name="conf_name" id="conf_name" placeholder="Conf Name" value="<?php echo $conf_name; ?>" <?php if ($this->session->userdata('level') != '1') {
                                                                                                                                                                echo 'readonly';
                                                                                                                                                            } ?> />
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="conf_val">Isi Parameter <?php echo form_error('conf_val') ?></label>
                        <textarea class="form-control" rows="3" name="conf_val" id="conf_val" placeholder="Conf Val"><?php echo $conf_val; ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="note">Keterangan <?php echo form_error('note') ?></label>
                        <textarea class="form-control" rows="3" name="note" id="note" placeholder="Note"><?php echo $note; ?></textarea>
                    </div>
                    <input type="hidden" name="id" value="<?php echo $id; ?>" />
                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                    <button type="submit" class="btn btn-success"><?php echo $button ?></button>
                    <a href="<?php echo site_url('sy_config') ?>" class="btn btn-default">Cancel</a>
                </div>
            </form>
        </div>
    </div>