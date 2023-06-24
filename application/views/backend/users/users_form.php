<ol class="breadcrumb float-xl-end">
    <li class="breadcrumb-item"><a href="javascript:;"><?php if ($this->uri->segment('1')) {
                                                            echo $this->uri->segment('1');
                                                        } ?></a></li>
    <li class="breadcrumb-item active"><?php if ($this->uri->segment('2')) {
                                            echo $this->uri->segment('2');
                                        } ?></li>
</ol>

<h1 class="page-header">Users <small></small></h1>
<div class="row" style="height: 100%">
    <div class="col-lg-4">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h2 class="panel-title" style="margin-top:0px"><?php echo $button ?> Users </h2>
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
                        <label for="varchar" class="form-label">Nama <?php echo form_error('fullname') ?></label>
                        <input type="text" class="form-control" name="fullname" id="fullname" placeholder="Fullname" value="<?php echo $fullname; ?>" />
                    </div>
                    <div class="mb-3">
                        <label for="varchar" class="form-label">Username <?php echo form_error('username') ?></label>
                        <input type="text" class="form-control" name="username" id="username" placeholder="Username" value="<?php echo $username; ?>" />
                    </div>
                    <div class="mb-3">
                        <label for="varchar" class="form-label">Email <?php echo form_error('email') ?></label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="Email" value="<?php echo $email; ?>" />
                    </div>
                    <div class="mb-3">
                        <label for="int" class="form-label">Level Akses<?php echo form_error('id_group') ?></label>
                        <?= form_dropdown('id_group', get_combo_where('user_group', 'id', 'group_name', ['' => "--Pilih--"], ['id !=' => '1']), $id_group, ['class' => 'form-control']) ?>

                        <!-- <div class="input-group">
                            <input type="hidden" name="id_group" id="id_group" value="<?php echo $id_group; ?>" />
                            <input type="text" class="form-control" name="nm_id_group" id="nm_id_group" placeholder="User Group" value="<?php echo $nm_id_group; ?>" readonly />

                            <?php if (allow([1])) { ?>

                                <button class="btn btn-success" type="button" onclick="lookup('<?= base_url() ?>User_group/lookup','id_group');" style="cursor: pointer;">Cari</button>

                            <?php } ?>
                        </div> -->
                    </div>
                    <div class="mb-3">
                        <label for="note" class="form-label">Note <?php echo form_error('note') ?></label>
                        <textarea class="form-control" rows="3" name="note" id="note" placeholder="Note"><?php echo $note; ?></textarea>
                    </div>
                    <input type="hidden" name="id_user" value="<?php echo $id_user; ?>" />
                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                    <button type="submit" class="btn btn-success"><?php echo $button ?></button>
                    <a href="<?php echo site_url('users') ?>" class="btn btn-default">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
</body>

</html>