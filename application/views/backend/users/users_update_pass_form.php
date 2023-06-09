<ol class="breadcrumb float-xl-end">
    <li class="breadcrumb-item"><a href="javascript:;"><?php if ($this->uri->segment('1')) {
                                                            echo $this->uri->segment('1');
                                                        } ?></a></li>
    <li class="breadcrumb-item active"><?php if ($this->uri->segment('2')) {
                                            echo $this->uri->segment('2');
                                        } ?></li>
</ol>


<h1 class="page-header">Users <small></small></h1>
<?php if ($this->session->userdata('message') != '') { ?>
    <div class="alert alert-success alert-dismissible fade show">
        <strong><?= $this->session->userdata('message') ?> </strong>
        <a class="alert-link" href="#"></a>
        <button type="button" class="btn-close" data-bs-dismiss="alert"></span>
    </div>
<?php } ?>
<div class="row" style="height: 100%">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h2 style="margin-top:0px" class="panel-title"><?php echo $button ?> Users </h2>
                <div class="panel-heading-btn">
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-default" data-toggle="panel-expand"><i class="fa fa-expand"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-success" data-toggle="panel-reload"><i class="fa fa-redo"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-warning" data-toggle="panel-collapse"><i class="fa fa-minus"></i></a>
                    <!-- <a href="javascript:;" class="btn btn-xs btn-icon btn-danger" data-toggle="panel-remove"><i class="fa fa-times"></i></a> -->
                </div>
                <?php if ($this->session->userdata('message') != '') { ?>
                    <div class="alert alert-danger alert-dismissable">
                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                        <?= $this->session->userdata('message') ?> <a class="alert-link" href="#"></a>
                    </div>
                <?php } ?>
            </div>

            <form action="<?php echo $action; ?>" method="post">
                <div class="panel-body">
                    <div class="mb-3">
                        <label for="varchar" class="form-label">Old Password
                        </label>
                        <input type="password" class="form-control" autocomplete="off" id="old_pass" name="old_password" id="password" placeholder="Old Password" value="" required />

                    </div>
                    <div class="form-check mb-3">
                        <input type="checkbox" class="form-check-input" onclick="showOldPass()">
                        <label class="form-check-label" for="nf_checkbox_css_1">Show Password</label>
                    </div>
                    <div class="mb-3">
                        <label for="varchar" class="form-label">New Password
                        </label>
                        <input type="password" class="form-control" autocomplete="off" id="new_pass" name="new_password" id="password" placeholder="New Password" value="" required />

                    </div>
                    <div class="form-check mb-3">
                        <input type="checkbox" class="form-check-input" onclick="showNewPass()">
                        <label class="form-check-label" for="nf_checkbox_css_1">Show Password</label>
                    </div>
                    <div class="mb-3">
                        <label for="varchar" class="form-label">Confirm New Password
                        </label>
                        <input type="password" class="form-control" autocomplete="off" id="confirm_pass" name="confirm_password" id="password" placeholder="Confirm Password" value="" required />
                    </div>
                    <div class="form-check mb-3">
                        <input type="checkbox" class="form-check-input" onclick="showConfirmPass()">
                        <label class="form-check-label" for="nf_checkbox_css_1">Show Password</label>
                    </div>
                    <input type="hidden" name="id_user" value="<?php echo $id_user; ?>" />
                    <button type="submit" class="btn btn-success"><?php echo $button ?></button>
                    <a href="<?php echo site_url('users') ?>" class="btn btn-default">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
<script>
    function showOldPass() {
        var x = document.getElementById("old_pass");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }

    function showNewPass() {
        var x = document.getElementById("new_pass");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }

    function showConfirmPass() {
        var x = document.getElementById("confirm_pass");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }
</script>

</html>