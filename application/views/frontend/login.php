<div class="login login-with-news-feed">

    <div class="news-feed">
        <div class="news-image" style="background-image: url(<?= base_url() . '/assets/img/dprri_gedung.jpg'; ?>)"></div>
        <div class="news-caption">
            <h4 class="caption-title"><b><?= data_app('APP_NAME') ?></b> </h4>
            <p>
                <?= data_app('APP_LONG_NAME') ?><br />
                <?= data_app('APP_INSTANSI') ?><br />
                <!-- <?= data_app('OPD_ADDR') ?>&nbsp&nbsp<?= data_app('APP_TELP') ?> -->

            </p>
        </div>
    </div>


    <div class="login-container">

        <div class="login-header mb-30px">
            <div class="brand">
                <div class="d-flex align-items-center">
                    <img alt="image" src="<?= base_url() ?>assets/img/dpr.png" style="width: 40px;" />
                    <b><?= data_app('APP_NAME') ?></b>
                </div>
                <small><?= data_app('APP_LONG_NAME') ?></small>
            </div>
            <div class="icon">
                <i class="fa fa-sign-in-alt"></i>
            </div>
        </div>


        <div class="login-content">
            <form action="<?= base_url() ?>auth/login" method="POST" class="fs-13px">
                <div class="form-floating mb-15px">
                    <input type="text" class="form-control h-45px fs-13px" placeholder="Email Address" id="emailAddress" name="username" required autofocus />
                    <label for="emailAddress" class="d-flex align-items-center fs-13px text-gray-600">Username</label>
                </div>
                <div class="form-floating mb-15px">
                    <input type="password" class="form-control h-45px fs-13px" placeholder="Password" id="password" name="password" required />
                    <label for="password" class="d-flex align-items-center fs-13px text-gray-600">Password</label>
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
                <div class="form-check mb-30px">
                    <input class="form-check-input" type="checkbox" value="1" id="rememberMe" />
                    <label class="form-check-label" for="rememberMe">
                        Remember Me
                    </label>
                </div>
                <div class="mb-15px">
                    <button type="submit" class="btn btn-warning d-block h-45px w-100 btn-lg fs-14px">Login</button>
                </div>
                <div class="mb-40px pb-40px text-inverse">
                </div>
                <hr class="bg-gray-600 opacity-2" />
                <div class="text-gray-600 text-center text-gray-500-darker mb-0">
                    &copy; <?= data_app('LEFT_FOOTER') ?>&nbsp@<?= date('Y') ?>
                </div>
            </form>
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