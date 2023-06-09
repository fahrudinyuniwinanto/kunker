<ol class="breadcrumb float-xl-end">
    <li class="breadcrumb-item"><a href="javascript:;"><?php if ($this->uri->segment('1')) {
                                                            echo $this->uri->segment('1');
                                                        } ?></a></li>
    <li class="breadcrumb-item active"><?php if ($this->uri->segment('2')) {
                                            echo $this->uri->segment('2');
                                        } ?></li>
</ol>

<h1 class="page-header">Master Access<small></small></h1>
<div class="row" style="height: 100%">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h2 class="panel-title" style="margin-top:0px"><?php echo $button ?> Master Access </h2>
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
                        <label class="form-label" for="varchar">Nm Access <?php echo form_error('nm_access') ?></label>
                        <input type="text" class="form-control" name="nm_access" id="nm_access" placeholder="Nm Access" value="<?php echo $nm_access; ?>" />
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="varchar">Pilih Menu <?php echo form_error('nm_menu') ?></label>
                        <select type="text" class="form-control" name="id_menu" id="id_menu" placeholder="Pilih Menu" value="<?php echo $id_kecamatan; ?>" />

                        <!-- <option value="<?php echo $id_menu; ?>"><?php echo $nama_menu ?></option> -->

                        <?php foreach ($menu as $row) { ?>
                            <option value="<?php echo $row->id_menu; ?>">
                                <?php echo $row->label ?>
                            </option>
                        <?php }; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="note">Note <?php echo form_error('note') ?></label>
                        <textarea class="form-control" rows="3" name="note" id="note" placeholder="Note"><?php echo $note; ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="datetime">Created At <?php echo form_error('created_at') ?></label>
                        <input type="text" class="form-control" name="created_at" id="created_at" placeholder="Created At" value="<?php echo $created_at; ?>" />
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="int">Created By <?php echo form_error('created_by') ?></label>
                        <input type="text" class="form-control" name="created_by" id="created_by" placeholder="Created By" value="<?php echo $created_by; ?>" />
                    </div>
                    <input type="hidden" name="id" value="<?php echo $id; ?>" />
                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                    <button type="submit" class="btn btn-success"><?php echo $button ?></button>
                    <a href="<?php echo site_url('master_access') ?>" class="btn btn-default">Cancel</a>
                </div>
            </form>
        </div>
    </div>