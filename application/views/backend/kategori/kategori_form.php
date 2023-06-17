<ol class="breadcrumb float-xl-end">
<li class="breadcrumb-item"><a href="javascript:;"><?php if ($this->uri->segment('1')) {
                                                        echo $this->uri->segment('1');
                                                    } ?></a></li>
<li class="breadcrumb-item active"><?php if ($this->uri->segment('2')) {
                                        echo $this->uri->segment('2');
                                    } ?></li>
</ol>
<h1 class="page-header">Kategori  <small></small></h1>

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
                    <h2 class="panel-title" style="margin-top:0px"><?php echo $button ?> Kategori </h2>
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
            <label class="form-label" for="varchar">Cat Name <?php echo form_error('cat_name') ?></label>
            <input type="text" class="form-control" name="cat_name" id="cat_name" placeholder="Cat Name" value="<?php echo $cat_name; ?>" />
        </div>
	    <div class="mb-3">
            <label class="form-label" for="note">Note <?php echo form_error('note') ?></label>
            <textarea class="form-control" rows="3" name="note" id="note" placeholder="Note"><?php echo $note; ?></textarea>
        </div>
	    <div class="mb-3">
            <label class="form-label" for="varchar">For Modul <?php echo form_error('for_modul') ?></label>
            <input type="text" class="form-control" name="for_modul" id="for_modul" placeholder="For Modul" value="<?php echo $for_modul; ?>" />
        </div>
	    <input type="hidden" name="id_kat" value="<?php echo $id_kat; ?>" /> 
	    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" >
	    <button type="submit" class="btn btn-flat btn-success"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('kategori') ?>" class="btn btn-flat btn-default">Cancel</a>
	</div>
            </form>
        </div>
        </div>
        </div>