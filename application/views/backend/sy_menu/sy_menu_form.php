<ol class="breadcrumb float-xl-end">
    <li class="breadcrumb-item"><a href="javascript:;"><?php if ($this->uri->segment('1')) {
                                                            echo $this->uri->segment('1');
                                                        } ?></a></li>
    <li class="breadcrumb-item active"><?php if ($this->uri->segment('2')) {
                                            echo $this->uri->segment('2');
                                        } ?></li>
</ol>

<h1 class="page-header">Menu Config <small></small></h1>
<div class="row" style="height: 100%">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h2 class="panel-title" style="margin-top:0px"><?php echo $button ?> Menu Config </h2>
                <div class="panel-heading-btn">
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-default" data-toggle="panel-expand"><i class="fa fa-expand"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-success" data-toggle="panel-reload"><i class="fa fa-redo"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-warning" data-toggle="panel-collapse"><i class="fa fa-minus"></i></a>
                    <!-- <a href="javascript:;" class="btn btn-xs btn-icon btn-danger" data-toggle="panel-remove"><i class="fa fa-times"></i></a> -->
                </div>
            </div>
            <form action="<?php echo $action; ?>" method="post">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label" for="varchar">Label <?php echo form_error('label') ?></label>
                                <input type="text" class="form-control" name="label" id="label" placeholder="Label" value="<?php echo $label; ?>" />
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="int">Redirect <?php echo form_error('redirect') ?></label>
                                <?= form_dropdown('redirect', array("0" => "Tidak (Url isi nama controller)", "1" => "Ya (Url diisi misal www.google.com)"), $redirect, array('class' => "form-control")) ?>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="varchar">Url <?php echo form_error('url') ?></label>
                                <input type="text" class="form-control" name="url" id="url" placeholder="Controller name atau redirect url" value="<?php echo $url; ?>" />
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="varchar">Icon <?php echo form_error('icon') ?></label>
                                <input type="text" class="form-control" name="icon" id="icon" placeholder="Contoh: fa-gear" value="<?php echo $icon; ?>" />
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="varchar">Note <?php echo form_error('note') ?></label>
                                <input type="text" class="form-control" name="note" id="note" placeholder="Note" value="<?php echo $note; ?>" />
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="int">Order No <?php echo form_error('order_no') ?></label>
                                <input type="text" class="form-control numeric" name="order_no" id="order_no" placeholder="Order No" value="<?php echo $order_no; ?>" />
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label" for="int">Parent <?php echo form_error('parent') ?></label>
                                <?php $data_menu_lists = $this->db->get_where("sy_menu", array('parent' => 0))->result();
                                // $data_menu_list = array();
                                $data_menu_list = array("" => ">> Pilih", 0 => ">> Sebagai Parent Menu");
                                foreach ($data_menu_lists as $klist => $vlist) {
                                    $data_menu_list[$vlist->id_menu] = "&nbsp;&nbsp; >>" . $vlist->label;
                                }
                                ?>
                                <?= form_dropdown('parent', $data_menu_list, $parent, array('class' => 'form-select data-bs-live-search="true"')) ?>
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="varchar">Created By <?php echo form_error('created_by') ?></label>
                                <input type="text" class="form-control" name="created_by" id="created_by" placeholder="Created By" value="<?php echo $created_by; ?>" readonly />
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="datetime">Created At <?php echo form_error('created_at') ?></label>
                                <input type="text" class="form-control" name="created_at" id="created_at" placeholder="Created At" value="<?php echo $created_at; ?>" readonly />
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="varchar">Updated By <?php echo form_error('updated_by') ?></label>
                                <input type="text" class="form-control" name="updated_by" id="updated_by" placeholder="Updated By" value="<?php echo $updated_by; ?>" readonly />
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="datetime">Updated At <?php echo form_error('updated_at') ?></label>
                                <input type="text" class="form-control" name="updated_at" id="updated_at" placeholder="Updated At" value="<?php echo $updated_at; ?>" readonly />
                            </div>
                            <input type="hidden" name="id_menu" value="<?php echo $id_menu; ?>" />
                            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                            <button type="submit" class="btn btn-success"><?php echo $button ?></button>
                            <a href="<?php echo site_url('sy_menu') ?>" class="btn btn-default">Cancel</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        </body>

        </html>