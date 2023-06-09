<div class="login login-v1">

  <div class="login-container">

    <div class="login-header">
      <div class="brand">
        <div class="d-flex align-items-center">
          <span class="logo"></span> <b>Login</b> Admin
        </div>
        <small><?= data_app('APP_NAME') ?></small>
      </div>
      <div class="icon">
        <i class="fa fa-lock"></i>
      </div>
    </div>


    <div class="login-body">

      <div class="login-content fs-13px">
        <form method="post" action="<?= base_url() ?>auth/login">
          <div class="form-floating mb-20px">
            <input type="text" class="form-control fs-13px h-45px" name="username" id="emailAddress" placeholder="Username" required autofocus />
            <label for="emailAddress" class="d-flex align-items-center py-0">Username</label>
          </div>
          <div class="form-floating mb-20px">
            <input type="password" class="form-control fs-13px h-45px" name="password" id="password" placeholder="Password" required />
            <label for="password" class="d-flex align-items-center py-0">Password</label>
          </div>
          <div class="form-floating mb-20px" data-validate="Password is required">

            <input type="text" class="form-control fs-13px h-45px" name="cpt" id="cpt" placeholder="Isi captcha dahulu" class="input100" maxlength="3" required />

            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
            <label for="text" class="d-flex align-items-center py-0">
              <?php
              $cpt = generateCode();
              echo $cpt['text'];
              ?>
            </label>
            <input type="hidden" name="rescpt" id="rescpt" value="<?= $cpt['res'] ?>" />
          </div>
          <div class="form-check mb-20px">
            <input class="form-check-input" type="checkbox" value="" id="rememberMe" />
            <label class="form-check-label" for="rememberMe">
              Remember Me
            </label>
          </div>
          <div class="login-buttons">
            <button type="submit" class="btn h-45px btn-success d-block w-100 btn-lg">Login</button>
          </div>
        </form>
      </div>

    </div>

  </div>

</div>

<?php if ($this->session->userdata('msgcaptcha') != '') { ?>
  <div class="modal show in" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Peringatan</h5>
          <a href="<?= base_url() ?>" type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </a>
        </div>
        <div class="modal-body">
          <?= $this->session->userdata('msgcaptcha') ?> <a class="alert-link" href="#"></a>
        </div>
        <div class="modal-footer">
          <a href="<?= base_url() ?>" class="btn btn-secondary" data-dismiss="modal">Coba lagi</a>
        </div>
      </div>
    </div>
  </div>
<?php } ?>