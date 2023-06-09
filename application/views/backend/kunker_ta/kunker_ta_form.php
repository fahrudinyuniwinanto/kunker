<ol class="breadcrumb float-xl-end">
<li class="breadcrumb-item"><a href="javascript:;"><?php if ($this->uri->segment('1')) {
                                                        echo $this->uri->segment('1');
                                                    } ?></a></li>
<li class="breadcrumb-item active"><?php if ($this->uri->segment('2')) {
                                        echo $this->uri->segment('2');
                                    } ?></li>
</ol>
<h1 class="page-header">Kunker_ta  <small></small></h1>

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
                    <h2 class="panel-title" style="margin-top:0px"><?php echo $button ?> Kunker_ta </h2>
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
            <label class="form-label" for="int">Id Kunker <?php echo form_error('id_kunker') ?></label>
            <input type="text" class="form-control" name="id_kunker" id="id_kunker" placeholder="Id Kunker" value="<?php echo $id_kunker; ?>" />
        </div>
	    <div class="mb-3">
            <label class="form-label" for="int">Id Ta <?php echo form_error('id_ta') ?></label>
            <input type="text" class="form-control" name="id_ta" id="id_ta" placeholder="Id Ta" value="<?php echo $id_ta; ?>" />
        </div>
	    <input type="hidden" name="id_kunker_ta" value="<?php echo $id_kunker_ta; ?>" /> 
	    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" >
	    <button type="submit" class="btn btn-flat btn-success"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('kunker_ta') ?>" class="btn btn-flat btn-default">Cancel</a>
	</div>
            </form>
        </div>
        </div>
        </div>