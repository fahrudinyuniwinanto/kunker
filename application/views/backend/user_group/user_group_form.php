<ol class="breadcrumb float-xl-end">
    <li class="breadcrumb-item"><a href="javascript:;"><?php if ($this->uri->segment('1')) {
                                                            echo $this->uri->segment('1');
                                                        } ?></a></li>
    <li class="breadcrumb-item active"><?php if ($this->uri->segment('2')) {
                                            echo $this->uri->segment('2');
                                        } ?></li>
</ol>

<h1 class="page-header">Users Group<small></small></h1>
<div class="row" style="height: 100%">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h2 class="panel-title" style="margin-top:0px"><?php echo $button ?> Users Group</h2>
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
                        <label class="form-label" for="varchar">Group Name <?php echo form_error('group_name') ?></label>
                        <input type="text" class="form-control" name="group_name" id="group_name" placeholder="Group Name" value="<?php echo $group_name; ?>" />
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="note">Note <?php echo form_error('note') ?></label>
                        <textarea class="form-control" rows="3" name="note" id="note" placeholder="Note"><?php echo $note; ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="int">Created By <?php echo form_error('created_by') ?></label>
                        <input type="text" class="form-control" name="created_by" id="created_by" placeholder="Created By" value="<?php echo $created_by; ?>" readonly />
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="datetime">Created At <?php echo form_error('created_at') ?></label>
                        <input type="text" class="form-control" name="created_at" id="created_at" placeholder="Created At" value="<?php echo $created_at; ?>" readonly />
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="int">Updated By <?php echo form_error('updated_by') ?></label>
                        <input type="text" class="form-control" name="updated_by" id="updated_by" placeholder="Updated By" value="<?php echo $updated_by; ?>" readonly />
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="datetime">Updated At <?php echo form_error('updated_at') ?></label>
                        <input type="text" class="form-control" name="updated_at" id="updated_at" placeholder="Updated At" value="<?php echo $updated_at; ?>" readonly />
                    </div>
                    <input type="hidden" name="id" value="<?php echo $id; ?>" />
                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                    <button type="submit" class="btn btn-success"><?php echo $button ?></button>
                    <a href="<?php echo site_url('user_group') ?>" class="btn btn-default">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>