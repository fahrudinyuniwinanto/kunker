    <!DOCTYPE html>
    <html lang="en">

    <html>

    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title><?= data_app() ?></title>

        <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
        <meta content="" name="description" />
        <meta content="" name="author" />

        <!-- Favicon -->
        <link rel="icon" href="<?= base_url() ?>assets/img/temanggung.png">

        <!-- START Color Admin -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
        <link href="<?= base_url() ?>assets/vendor/coloradmin/assets/css/vendor.min.css" rel="stylesheet" />
        <link href="<?= base_url() ?>assets/vendor/coloradmin/assets/css/default/app.min.css" rel="stylesheet" />
        <link href="<?= base_url() ?>assets/vendor/coloradmin/assets/plugins/jvectormap-next/jquery-jvectormap.css" rel="stylesheet" />
        <link href="<?= base_url() ?>assets/vendor/coloradmin/assets/plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.css" rel="stylesheet" />
        <link href="<?= base_url() ?>assets/vendor/coloradmin/assets/plugins/gritter/css/jquery.gritter.css" rel="stylesheet" />
        <link href="<?= base_url() ?>assets/vendor/sweetalert/css/sweetalert.css" rel="stylesheet" />
        <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->

        <script src="<?= base_url() ?>/assets/js/jquery-3.6.0.min.js"></script>
        <!-- END Color Admin -->


        <style>
            html {
                height: 100% !important;
            }

            body {
                height: 100% !important;
                padding-bottom: 30px;
            }

            .footer {
                position: fixed;
                left: 0;
                right: 0;
                bottom: 0;
            }

            .table-condensed {
                font-size: 13px;
            }
        </style>
    </head>
    <?php

    $CI = &get_instance();
    //dari helper
    lookup();
    //panggil sf_helper
    $CI->load->model('Users_model');
    $CI->load->model('User_access_model');

    ?>

    <body>


        <div id="loader" class="app-loader">
            <span class="spinner"></span>
        </div>


        <div id="app" class="app app-header-fixed app-sidebar-fixed app-content-full-height">

            <div id="header" class="app-header">

                <div class="navbar-header">
                    <a href="<?= site_url('Backend') ?>" class="navbar-brand"><span class="navbar-logo"></span> <b><?= data_app('APP_NAME') ?></b></a>
                    <button type="button" class="navbar-mobile-toggler" data-toggle="app-sidebar-mobile">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>


                <div class="navbar-nav">
                    <div class="navbar-item dropdown">
                        <a href="#" data-bs-toggle="dropdown" class="navbar-link dropdown-toggle icon">
                            <i class="fa fa-bell"></i>
                            <span class="badge">5</span>
                        </a>
                        <div class="dropdown-menu media-list dropdown-menu-end">
                            <div class="dropdown-header">NOTIFICATIONS (5)</div>
                            <a href="javascript:;" class="dropdown-item media">
                                <div class="media-left">
                                    <i class="fa fa-bug media-object bg-gray-500"></i>
                                </div>
                                <div class="media-body">
                                    <h6 class="media-heading">Server Error Reports <i class="fa fa-exclamation-circle text-danger"></i></h6>
                                    <div class="text-muted fs-10px">3 minutes ago</div>
                                </div>
                            </a>
                            <a href="javascript:;" class="dropdown-item media">
                                <div class="media-left">
                                    <img src="<?= base_url() ?>assets/vendor/coloradmin/assets/img/user/user-1.jpg" class="media-object" alt="" />
                                    <i class="fab fa-facebook-messenger text-blue media-object-icon"></i>
                                </div>
                                <div class="media-body">
                                    <h6 class="media-heading">John Smith</h6>
                                    <p>Quisque pulvinar tellus sit amet sem scelerisque tincidunt.</p>
                                    <div class="text-muted fs-10px">25 minutes ago</div>
                                </div>
                            </a>
                            <a href="javascript:;" class="dropdown-item media">
                                <div class="media-left">
                                    <img src="<?= base_url() ?>assets/vendor/coloradmin/assets/img/user/user-2.jpg" class="media-object" alt="" />
                                    <i class="fab fa-facebook-messenger text-blue media-object-icon"></i>
                                </div>
                                <div class="media-body">
                                    <h6 class="media-heading">Olivia</h6>
                                    <p>Quisque pulvinar tellus sit amet sem scelerisque tincidunt.</p>
                                    <div class="text-muted fs-10px">35 minutes ago</div>
                                </div>
                            </a>
                            <a href="javascript:;" class="dropdown-item media">
                                <div class="media-left">
                                    <i class="fa fa-plus media-object bg-gray-500"></i>
                                </div>
                                <div class="media-body">
                                    <h6 class="media-heading"> New User Registered</h6>
                                    <div class="text-muted fs-10px">1 hour ago</div>
                                </div>
                            </a>
                            <a href="javascript:;" class="dropdown-item media">
                                <div class="media-left">
                                    <i class="fa fa-envelope media-object bg-gray-500"></i>
                                    <i class="fab fa-google text-warning media-object-icon fs-14px"></i>
                                </div>
                                <div class="media-body">
                                    <h6 class="media-heading"> New Email From John</h6>
                                    <div class="text-muted fs-10px">2 hour ago</div>
                                </div>
                            </a>
                            <div class="dropdown-footer text-center">
                                <a href="javascript:;" class="text-decoration-none">View more</a>
                            </div>
                        </div>
                    </div>
                    <div class="navbar-item navbar-user dropdown">
                        <a href="#" class="navbar-link dropdown-toggle d-flex align-items-center" data-bs-toggle="dropdown">
                            <?php if ($this->session->userdata('foto') != '' && file_exists(FCPATH . "assets/foto_users/" . $this->session->userdata('foto'))) { //die('a');
                                ?>
                                <img alt="image" src="<?= base_url() ?>assets/foto_users/<?= $this->session->userdata('foto') ?>" style="width: 45px;" />
                            <?php } else { ?>
                                <img alt="image" src="<?= base_url() ?>assets/img/temanggung.png" style="width: 45px;" />
                            <?php } ?>
                            <span>
                                <span class="d-none d-md-inline"><?= $CI->Users_model->get_by_id($this->session->userdata('id_user'))->fullname ?></span>
                                <b class="caret"></b>
                            </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end me-1">
                            <a href="javascript:;" class="dropdown-item">Edit Profile</a>
                            <a href="javascript:;" class="dropdown-item"><span class="badge bg-danger float-end rounded-pill">2</span> <?= $this->session->userdata('email') ?></a>
                            <a href="javascript:;" class="dropdown-item"><?= $this->session->userdata('telp') ?></a>
                            <div class="dropdown-divider"></div>
                            <a href="<?= base_url() ?>auth/logout" class="dropdown-item">Keluar</a>
                        </div>
                    </div>
                </div>

            </div>


            <div id="sidebar" class="app-sidebar">

                <div class="app-sidebar-content" data-scrollbar="true" data-height="100%">

                    <div class="menu">
                        <div class="menu-profile">
                            <a href="javascript:;" class="menu-profile-link" data-toggle="app-sidebar-profile" data-target="#appSidebarProfileMenu">
                                <div class="menu-profile-cover with-shadow"></div>
                                <div class="menu-profile-image">
                                    <?php if ($this->session->userdata('foto') != '' && file_exists(FCPATH . "assets/foto_users/" . $this->session->userdata('foto'))) { //die('a');
                                        ?>
                                        <img alt="image" class="img-circle" src="<?= base_url() ?>assets/foto_users/<?= $this->session->userdata('foto') ?>" style="width: 45px;" />
                                    <?php } else { ?>
                                        <img alt="image" class="img-circle" src="<?= base_url() ?>assets/img/temanggung.png" style="width: 45px;" />
                                    <?php } ?>
                                </div>
                                <div class="menu-profile-info">
                                    <div class="d-flex align-items-center">
                                        <div class="flex-grow-1">
                                            <?= $CI->Users_model->get_by_id($this->session->userdata('id_user'))->fullname ?>
                                        </div>
                                        <div class="menu-caret ms-auto"></div>
                                    </div>
                                    <small><?= $this->session->userdata('email') ?></small>
                                </div>
                            </a>
                        </div>
                        <div id="appSidebarProfileMenu" class="collapse">
                            <div class="menu-item pt-5px">
                                <a href="javascript:;" class="menu-link">
                                    <div class="menu-icon"><i class="fa fa-cog"></i></div>
                                    <div class="menu-text">Settings</div>
                                </a>
                            </div>
                            <div class="menu-item">
                                <a href="javascript:;" class="menu-link">
                                    <div class="menu-icon"><i class="fa fa-pencil-alt"></i></div>
                                    <div class="menu-text"> Send Feedback</div>
                                </a>
                            </div>
                            <div class="menu-item pb-5px">
                                <a href="javascript:;" class="menu-link">
                                    <div class="menu-icon"><i class="fa fa-question-circle"></i></div>
                                    <div class="menu-text"> Helps</div>
                                </a>
                            </div>
                            <div class="menu-divider m-0"></div>
                        </div>
                        <div class="menu-header">Navigasi</div>
                        <?php
                        //MENU DARI TABEL sy_menu
                        //meng aray kan menu dari tabel sy menu yang merupakan parent menu atau nilai parent 0
                        //select menu.nama menu where id_menu
                        //coding untuk filter menu berdasar group user

                        if ($this->session->userdata('id_group') != 1) {
                            $this->db->group_by('user_access.id_menu');
                            $this->db->order_by('order_no', 'asc');
                            $this->db->join('sy_menu', 'sy_menu.id_menu=user_access.id_menu');
                            $this->db->where('sy_menu.parent', 0);
                            $this->db->where('user_access.is_allow', 1);
                            $this->db->where('user_access.id_group', $this->session->userdata('id_group'));
                            $data_menu = $this->db->get('user_access')->result();
                        } else {
                            $data_menu = $this->db->order_by("order_no", "ASC")->get_where('sy_menu', array('parent' => 0,))->result();
                        }
                        foreach ($data_menu as $kmenu0 => $vmenu0) {
                            $child = $this->db->get_where('sy_menu', array('parent' => $vmenu0->id_menu));
                            ?>

                            <div class="menu-item <?php if ($child->num_rows() > 0) {
                                                            echo 'has-sub';
                                                        } ?><?= strtolower(activate_menu($vmenu0->note)) ?>">
                                <a href="<?php if ($child->num_rows() > 0) {

                                                    echo 'javascript:;';
                                                } else {
                                                    echo base_url() . $vmenu0->url;
                                                }
                                                ?>" class="menu-link">

                                    <div class="menu-icon">
                                        <i class="fa <?= $vmenu0->icon ?>"></i>
                                    </div>

                                    <div class="menu-text"><?= $vmenu0->label ?></div>

                                    <?php if ($child->num_rows() > 0) { ?>
                                        <div class="menu-caret"></div>
                                    <?php } ?>

                                </a>

                                <?php if ($child->num_rows() > 0) { ?>
                                    <div class="menu-submenu">
                                    <?php } ?>

                                    <?php
                                        //meng aray kan menu dari tabel sy menu yang merupakan parent menu atau nilai parent sesuai id menu 
                                        if ($this->session->userdata('id_group') != 1) {
                                            $this->db->group_by('user_access.id_menu');
                                            $this->db->order_by('sy_menu.order_no', 'asc');
                                            $this->db->join('sy_menu', 'sy_menu.id_menu=user_access.id_menu');
                                            $this->db->where('sy_menu.parent', $vmenu0->id_menu);
                                            $this->db->where('user_access.is_allow', 1);
                                            $this->db->where('user_access.id_group', $this->session->userdata('id_group'));
                                            $data_submenu = $this->db->get('user_access')->result();
                                        } else {
                                            $data_submenu = $this->db->get_where('sy_menu', array('parent' => $vmenu0->id_menu))->result();
                                        }
                                        foreach ($data_submenu as $kmenu1 => $vmenu1) { ?>
                                        <div class="menu-item <?= strtolower(activate_menu($vmenu0->note)) ?>">
                                            <a href="<?= base_url() . $vmenu1->url ?>" class="menu-link">
                                                <div class="menu-text"><?= $vmenu1->label ?></div>
                                            </a>
                                        </div>
                                    <?php } ?>

                                    <?php if ($child->num_rows() > 0) { ?>
                                    </div>
                                <?php } ?>

                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>

            <div class="app-sidebar-bg"></div>
            <div class="app-sidebar-mobile-backdrop"><a href="#" data-dismiss="app-sidebar-mobile" class="stretched-link"></a></div>

            <div id="content" class="app-content d-flex flex-column p-0">
                <div class="app-content-padding flex-grow-1 overflow-hidden" data-scrollbar="true" data-height="100%">
                    <?php $this->load->view($content); ?>
                </div>
                <div id="footer" class="app-footer m-0">
                    &copy; <?= date('Y') ?> <?= data_app('LEFT_FOOTER'); ?>
                </div>
            </div>

            <div class="theme-panel">
                <a href="javascript:;" data-toggle="theme-panel-expand" class="theme-collapse-btn"><i class="fa fa-cog"></i></a>
                <div class="theme-panel-content" data-scrollbar="true" data-height="100%">
                    <h5>App Settings</h5>

                    <div class="theme-list">
                        <div class="theme-list-item"><a href="javascript:;" class="theme-list-link bg-red" data-theme="red" data-theme-file="../assets/css/default/theme/red.min.css" data-toggle="theme-selector" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-container="body" data-bs-title="Red">&nbsp;</a></div>
                        <div class="theme-list-item"><a href="javascript:;" class="theme-list-link bg-pink" data-theme="pink" data-theme-file="../assets/css/default/theme/pink.min.css" data-toggle="theme-selector" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-container="body" data-bs-title="Pink">&nbsp;</a></div>
                        <div class="theme-list-item"><a href="javascript:;" class="theme-list-link bg-orange" data-theme="orange" data-theme-file="../assets/css/default/theme/orange.min.css" data-toggle="theme-selector" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-container="body" data-bs-title="Orange">&nbsp;</a></div>
                        <div class="theme-list-item"><a href="javascript:;" class="theme-list-link bg-yellow" data-theme="yellow" data-theme-file="../assets/css/default/theme/yellow.min.css" data-toggle="theme-selector" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-container="body" data-bs-title="Yellow">&nbsp;</a></div>
                        <div class="theme-list-item"><a href="javascript:;" class="theme-list-link bg-lime" data-theme="lime" data-theme-file="../assets/css/default/theme/lime.min.css" data-toggle="theme-selector" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-container="body" data-bs-title="Lime">&nbsp;</a></div>
                        <div class="theme-list-item"><a href="javascript:;" class="theme-list-link bg-green" data-theme="green" data-theme-file="../assets/css/default/theme/green.min.css" data-toggle="theme-selector" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-container="body" data-bs-title="Green">&nbsp;</a></div>
                        <div class="theme-list-item active"><a href="javascript:;" class="theme-list-link bg-teal" data-theme="default" data-theme-file="" data-toggle="theme-selector" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-container="body" data-bs-title="Default">&nbsp;</a></div>
                        <div class="theme-list-item"><a href="javascript:;" class="theme-list-link bg-cyan" data-theme="cyan" data-theme-file="../assets/css/default/theme/cyan.min.css" data-toggle="theme-selector" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-container="body" data-bs-title="Cyan">&nbsp;</a></div>
                        <div class="theme-list-item"><a href="javascript:;" class="theme-list-link bg-blue" data-theme="blue" data-theme-file="../assets/css/default/theme/blue.min.css" data-toggle="theme-selector" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-container="body" data-bs-title="Blue">&nbsp;</a></div>
                        <div class="theme-list-item"><a href="javascript:;" class="theme-list-link bg-purple" data-theme="purple" data-theme-file="../assets/css/default/theme/purple.min.css" data-toggle="theme-selector" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-container="body" data-bs-title="Purple">&nbsp;</a></div>
                        <div class="theme-list-item"><a href="javascript:;" class="theme-list-link bg-indigo" data-theme="indigo" data-theme-file="../assets/css/default/theme/indigo.min.css" data-toggle="theme-selector" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-container="body" data-bs-title="Indigo">&nbsp;</a></div>
                        <div class="theme-list-item"><a href="javascript:;" class="theme-list-link bg-black" data-theme="black" data-theme-file="../assets/css/default/theme/black.min.css" data-toggle="theme-selector" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-container="body" data-bs-title="Black">&nbsp;</a></div>
                    </div>

                    <div class="theme-panel-divider"></div>

                    <div class="row mt-10px align-items-center">
                        <div class="col-8 control-label text-inverse fw-bold">Header Fixed</div>
                        <div class="col-4 d-flex">
                            <div class="form-check form-switch ms-auto mb-0">
                                <input type="checkbox" class="form-check-input" name="app-header-fixed" id="appHeaderFixed" value="1" checked />
                                <label class="form-check-label" for="appHeaderFixed">&nbsp;</label>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-10px align-items-center">
                        <div class="col-8 control-label text-inverse fw-bold">Header Inverse</div>
                        <div class="col-4 d-flex">
                            <div class="form-check form-switch ms-auto mb-0">
                                <input type="checkbox" class="form-check-input" name="app-header-inverse" id="appHeaderInverse" value="1" />
                                <label class="form-check-label" for="appHeaderInverse">&nbsp;</label>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-10px align-items-center">
                        <div class="col-8 control-label text-inverse fw-bold">Sidebar Fixed</div>
                        <div class="col-4 d-flex">
                            <div class="form-check form-switch ms-auto mb-0">
                                <input type="checkbox" class="form-check-input" name="app-sidebar-fixed" id="appSidebarFixed" value="1" checked />
                                <label class="form-check-label" for="appSidebarFixed">&nbsp;</label>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-10px align-items-center">
                        <div class="col-8 control-label text-inverse fw-bold">Sidebar Grid</div>
                        <div class="col-4 d-flex">
                            <div class="form-check form-switch ms-auto mb-0">
                                <input type="checkbox" class="form-check-input" name="app-sidebar-grid" id="appSidebarGrid" value="1" />
                                <label class="form-check-label" for="appSidebarGrid">&nbsp;</label>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-10px align-items-center">
                        <div class="col-md-8 control-label text-inverse fw-bold">Gradient Enabled</div>
                        <div class="col-md-4 d-flex">
                            <div class="form-check form-switch ms-auto mb-0">
                                <input type="checkbox" class="form-check-input" name="app-gradient-enabled" id="appGradientEnabled" value="1" />
                                <label class="form-check-label" for="appGradientEnabled">&nbsp;</label>
                            </div>
                        </div>
                    </div>

                    <div class="theme-panel-divider"></div>
                    <h5>Admin Design (5)</h5>

                    <div class="theme-version">
                        <div class="theme-version-item">
                            <a href="../html/index_v2.html" class="theme-version-link active">
                                <span style="background-image: url(<?= base_url() ?>assets/vendor/coloradmin/assets/img/theme//default.jpg);" class="theme-version-cover"></span>
                            </a>
                        </div>
                        <div class="theme-version-item">
                            <a href="../transparent/index_v2.html" class="theme-version-link">
                                <span style="background-image: url(<?= base_url() ?>assets/vendor/coloradmin/assets/img/theme//transparent.jpg);" class="theme-version-cover"></span>
                            </a>
                        </div>
                        <div class="theme-version-item">
                            <a href="../apple/index_v2.html" class="theme-version-link">
                                <span style="background-image: url(<?= base_url() ?>assets/vendor/coloradmin/assets/img/theme/apple.jpg);" class="theme-version-cover"></span>
                            </a>
                        </div>
                        <div class="theme-version-item">
                            <a href="../material/index_v2.html" class="theme-version-link">
                                <span style="background-image: url(<?= base_url() ?>assets/vendor/coloradmin/assets/img/theme//material.jpg);" class="theme-version-cover"></span>
                            </a>
                        </div>
                        <div class="theme-version-item">
                            <a href="../facebook/index_v2.html" class="theme-version-link">
                                <span style="background-image: url(<?= base_url() ?>assets/vendor/coloradmin/assets/img/theme//facebook.jpg);" class="theme-version-cover"></span>
                            </a>
                        </div>
                        <div class="theme-version-item">
                            <a href="../google/index_v2.html" class="theme-version-link">
                                <span style="background-image: url(<?= base_url() ?>assets/vendor/coloradmin/assets/img/theme//google.jpg);" class="theme-version-cover"></span>
                            </a>
                        </div>
                    </div>

                    <div class="theme-panel-divider"></div>
                    <h5>Language Version (7)</h5>

                    <div class="theme-version">
                        <div class="theme-version-item">
                            <a href="../html/index.html" class="theme-version-link active">
                                <span style="background-image: url(<?= base_url() ?>assets/vendor/coloradmin/assets/img/version/html.jpg);" class="theme-version-cover"></span>
                            </a>
                        </div>
                        <div class="theme-version-item">
                            <a href="../ajax/index.html" class="theme-version-link">
                                <span style="background-image: url(<?= base_url() ?>assets/vendor/coloradmin/assets/img/version/ajax.jpg);" class="theme-version-cover"></span>
                            </a>
                        </div>
                        <div class="theme-version-item">
                            <a href="../angularjs/index.html" class="theme-version-link">
                                <span style="background-image: url(<?= base_url() ?>assets/vendor/coloradmin/assets/img/version/angular1x.jpg);" class="theme-version-cover"></span>
                            </a>
                        </div>
                        <div class="theme-version-item">
                            <a href="../angularjs11/index.html" class="theme-version-link">
                                <span style="background-image: url(<?= base_url() ?>assets/vendor/coloradmin/assets/img/version/angular10x.jpg);" class="theme-version-cover"></span>
                            </a>
                        </div>
                        <div class="theme-version-item">
                            <a href="javascript:alert('Laravel Version only available in downloaded version.');" class="theme-version-link">
                                <span style="background-image: url(<?= base_url() ?>assets/vendor/coloradmin/assets/img/version/laravel.jpg);" class="theme-version-cover"></span>
                            </a>
                        </div>
                        <div class="theme-version-item">
                            <a href="../vuejs/index.html" class="theme-version-link">
                                <span style="background-image: url(<?= base_url() ?>assets/vendor/coloradmin/assets/img/version/vuejs.jpg);" class="theme-version-cover"></span>
                            </a>
                        </div>
                        <div class="theme-version-item">
                            <a href="../reactjs/index.html" class="theme-version-link">
                                <span style="background-image: url(<?= base_url() ?>assets/vendor/coloradmin/assets/img/version/reactjs.jpg);" class="theme-version-cover"></span>
                            </a>
                        </div>
                        <div class="theme-version-item">
                            <a href="javascript:alert('.NET Core 5.0 MVC Version only available in downloaded version.');" class="theme-version-link">
                                <span style="background-image: url(<?= base_url() ?>assets/vendor/coloradmin/assets/img/version/dotnet.jpg);" class="theme-version-cover"></span>
                            </a>
                        </div>
                    </div>

                    <div class="theme-panel-divider"></div>
                    <h5>Frontend Design (5)</h5>

                    <div class="theme-version">
                        <div class="theme-version-item">
                            <a href="../../frontend/one-page-parallax/index.html" target="_blank" class="theme-version-link">
                                <span style="background-image: url(<?= base_url() ?>assets/vendor/coloradmin/assets/img/theme/one-page-parallax.jpg);" class="theme-version-cover"></span>
                            </a>
                        </div>
                        <div class="theme-version-item">
                            <a href="../../frontend/e-commerce/index.html" target="_blank" class="theme-version-link">
                                <span style="background-image: url(<?= base_url() ?>assets/vendor/coloradmin/assets/img/theme/e-commerce.jpg);" class="theme-version-cover"></span>
                            </a>
                        </div>
                        <div class="theme-version-item">
                            <a href="../../frontend/blog/index.html" target="_blank" class="theme-version-link">
                                <span style="background-image: url(<?= base_url() ?>assets/vendor/coloradmin/assets/img/theme/blog.jpg);" class="theme-version-cover"></span>
                            </a>
                        </div>
                        <div class="theme-version-item">
                            <a href="../../frontend/forum/index.html" target="_blank" class="theme-version-link">
                                <span style="background-image: url(<?= base_url() ?>assets/vendor/coloradmin/assets/img/theme/forum.jpg);" class="theme-version-cover"></span>
                            </a>
                        </div>
                        <div class="theme-version-item">
                            <a href="../../frontend/corporate/index.html" target="_blank" class="theme-version-link">
                                <span style="background-image: url(<?= base_url() ?>assets/vendor/coloradmin/assets/img/theme/corporate.jpg);" class="theme-version-cover"></span>
                            </a>
                        </div>
                    </div>

                    <div class="theme-panel-divider"></div>
                    <a href="https://seantheme.com/color-admin/documentation/" class="btn btn-inverse d-block w-100 rounded-pill mb-10px" target="_blank"><b>Documentation</b></a>
                    <a href="javascript:;" class="btn btn-default d-block w-100 rounded-pill" data-toggle="reset-local-storage"><b>Reset Local Storage</b></a>
                </div>
            </div>
            <a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top" data-toggle="scroll-to-top"><i class="fa fa-angle-up"></i></a>


        </div>
        <!-- SF JS -->

        <!-- Start Color Admin JS -->
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script src="<?= base_url() ?>assets/vendor/coloradmin/assets/js/vendor.min.js" type="cd38e282cd92834f2cf5392d-text/javascript"></script>
        <script src="<?= base_url() ?>assets/vendor/coloradmin/assets/js/app.min.js" type="cd38e282cd92834f2cf5392d-text/javascript"></script>
        <script src="<?= base_url() ?>assets/vendor/coloradmin/assets/js/theme/default.min.js" type="cd38e282cd92834f2cf5392d-text/javascript"></script>
        <script src="<?= base_url() ?>assets/vendor/coloradmin/assets/plugins/gritter/js/jquery.gritter.js" type="cd38e282cd92834f2cf5392d-text/javascript"></script>
        <script src="<?= base_url() ?>assets/vendor/coloradmin/assets/plugins/flot/source/jquery.canvaswrapper.js" type="cd38e282cd92834f2cf5392d-text/javascript"></script>
        <script src="<?= base_url() ?>assets/vendor/coloradmin/assets/plugins/flot/source/jquery.colorhelpers.js" type="cd38e282cd92834f2cf5392d-text/javascript"></script>
        <script src="<?= base_url() ?>assets/vendor/coloradmin/assets/plugins/flot/source/jquery.flot.js" type="cd38e282cd92834f2cf5392d-text/javascript"></script>
        <script src="<?= base_url() ?>assets/vendor/coloradmin/assets/plugins/flot/source/jquery.flot.saturated.js" type="cd38e282cd92834f2cf5392d-text/javascript"></script>
        <script src="<?= base_url() ?>assets/vendor/coloradmin/assets/plugins/flot/source/jquery.flot.browser.js" type="cd38e282cd92834f2cf5392d-text/javascript"></script>
        <script src="<?= base_url() ?>assets/vendor/coloradmin/assets/plugins/flot/source/jquery.flot.drawSeries.js" type="cd38e282cd92834f2cf5392d-text/javascript"></script>
        <script src="<?= base_url() ?>assets/vendor/coloradmin/assets/plugins/flot/source/jquery.flot.uiConstants.js" type="cd38e282cd92834f2cf5392d-text/javascript"></script>
        <script src="<?= base_url() ?>assets/vendor/coloradmin/assets/plugins/flot/source/jquery.flot.time.js" type="cd38e282cd92834f2cf5392d-text/javascript"></script>
        <script src="<?= base_url() ?>assets/vendor/coloradmin/assets/plugins/flot/source/jquery.flot.resize.js" type="cd38e282cd92834f2cf5392d-text/javascript"></script>
        <script src="<?= base_url() ?>assets/vendor/coloradmin/assets/plugins/flot/source/jquery.flot.pie.js" type="cd38e282cd92834f2cf5392d-text/javascript"></script>
        <script src="<?= base_url() ?>assets/vendor/coloradmin/assets/plugins/flot/source/jquery.flot.crosshair.js" type="cd38e282cd92834f2cf5392d-text/javascript"></script>
        <script src="<?= base_url() ?>assets/vendor/coloradmin/assets/plugins/flot/source/jquery.flot.categories.js" type="cd38e282cd92834f2cf5392d-text/javascript"></script>
        <script src="<?= base_url() ?>assets/vendor/coloradmin/assets/plugins/flot/source/jquery.flot.navigate.js" type="cd38e282cd92834f2cf5392d-text/javascript"></script>
        <script src="<?= base_url() ?>assets/vendor/coloradmin/assets/plugins/flot/source/jquery.flot.touchNavigate.js" type="cd38e282cd92834f2cf5392d-text/javascript"></script>
        <script src="<?= base_url() ?>assets/vendor/coloradmin/assets/plugins/flot/source/jquery.flot.hover.js" type="cd38e282cd92834f2cf5392d-text/javascript"></script>
        <script src="<?= base_url() ?>assets/vendor/coloradmin/assets/plugins/flot/source/jquery.flot.touch.js" type="cd38e282cd92834f2cf5392d-text/javascript"></script>
        <script src="<?= base_url() ?>assets/vendor/coloradmin/assets/plugins/flot/source/jquery.flot.selection.js" type="cd38e282cd92834f2cf5392d-text/javascript"></script>
        <script src="<?= base_url() ?>assets/vendor/coloradmin/assets/plugins/flot/source/jquery.flot.symbol.js" type="cd38e282cd92834f2cf5392d-text/javascript"></script>
        <script src="<?= base_url() ?>assets/vendor/coloradmin/assets/plugins/flot/source/jquery.flot.legend.js" type="cd38e282cd92834f2cf5392d-text/javascript"></script>
        <script src="<?= base_url() ?>assets/vendor/coloradmin/assets/plugins/jquery-sparkline/jquery.sparkline.min.js" type="cd38e282cd92834f2cf5392d-text/javascript"></script>
        <script src="<?= base_url() ?>assets/vendor/coloradmin/assets/plugins/jvectormap-next/jquery-jvectormap.min.js" type="cd38e282cd92834f2cf5392d-text/javascript"></script>
        <script src="<?= base_url() ?>assets/vendor/coloradmin/assets/plugins/jvectormap-next/jquery-jvectormap-world-mill.js" type="cd38e282cd92834f2cf5392d-text/javascript"></script>
        <script src="<?= base_url() ?>assets/vendor/coloradmin/assets/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.js" type="cd38e282cd92834f2cf5392d-text/javascript"></script>
        <script src="<?= base_url() ?>assets/vendor/coloradmin/assets/js/demo/dashboard.js" type="cd38e282cd92834f2cf5392d-text/javascript"></script>
        <script src="<?= base_url() ?>assets/js/jquery-3.6.0.min.js"></script>
        <!-- Datepicker untuk SFJS-->
        <script src="<?= base_url() ?>assets/vendor/datepicker/js/bootstrap-datepicker.js"></script>
        <script src="<?= base_url() ?>assets/vendor/sweetalert/js/sweetalert.min.js"></script>
        <script src="<?= base_url() ?>assets/js/sf.js"></script>
        <script type="cd38e282cd92834f2cf5392d-text/javascript">
            (function(i, s, o, g, r, a, m) {
                i['GoogleAnalyticsObject'] = r;
                i[r] = i[r] || function() {
                    (i[r].q = i[r].q || []).push(arguments)
                }, i[r].l = 1 * new Date();
                a = s.createElement(o),
                    m = s.getElementsByTagName(o)[0];
                a.async = 1;
                a.src = g;
                m.parentNode.insertBefore(a, m)
            })(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');

            ga('create', 'UA-53034621-1', 'auto');
            ga('send', 'pageview');
        </script>
        <script src="https://ajax.cloudflare.com/cdn-cgi/scripts/7d0fa10a/cloudflare-static/rocket-loader.min.js" data-cf-settings="cd38e282cd92834f2cf5392d-|49" defer=""></script>
        <script defer src="https://static.cloudflareinsights.com/beacon.min.js" data-cf-beacon='{"rayId":"66b21edf3837370a","version":"2021.6.0","r":1,"token":"4db8c6ef997743fda032d4f73cfeff63","si":10}'></script>

        <!-- END Color Admin JS -->

    </body>

    </html>