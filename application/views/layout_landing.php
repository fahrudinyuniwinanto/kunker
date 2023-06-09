<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= data_app() ?></title>

    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />

    <!-- Favicon -->
    <link rel="icon" href="<?= base_url() ?>assets/img/temanggung.png">


    <!-- Color Admin Frontend -->

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <link href="<?= base_url() ?>assets/vendor/coloradmin/assets/frontend/assets/css/one-page-parallax/vendor.min.css" rel="stylesheet" />
    <link href="<?= base_url() ?>assets/vendor/coloradmin/assets/frontend/assets/css/one-page-parallax/app.min.css" rel="stylesheet" />

    <!-- END Color Admin -->
</head>


<body data-bs-spy='scroll' data-bs-target='#header' data-bs-offset='51'>

    <div id="page-container" class="fade">

        <div id="header" class="header navbar navbar-transparent navbar-fixed-top navbar-expand-lg">

            <div class="container">

                <a href="index.html" class="navbar-brand">
                    <img src="<?= base_url() ?>assets/img/temanggung.png" style ="width: 10%; height: 60px;"/>
                    <span class="brand-text">
                        <span class="text-primary">   <?= data_app() ?></span>
                    </span>
                </a>


                <button type="button" class="navbar-toggle collapsed" data-bs-toggle="collapse" data-bs-target="#header-navbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>


                <div class="collapse navbar-collapse" id="header-navbar">
                    <ul class="nav navbar-nav navbar-end">
                        
                        <li class="nav-item"><a class="nav-link active" href="#about" data-click="scroll-to-target">HOME</a></li>
                        <li class="nav-item"><a class="nav-link" href="#team" data-click="scroll-to-target">LAYANAN KAMI</a></li>
                        <li class="nav-item"><a class="nav-link" href="#footer" data-click="scroll-to-target">TENTANG KAMI</a></li>
                        
                    </ul>
                </div>

            </div>

        </div>

        <?php
        $this->load->view($content);
        ?>
    </div>
    <!-- JQUERY -->
    <script src="<?= base_url() ?>assets/js/jquery-3.6.0.min.js"></script>
    <!-- Datepicker untuk SFJS-->
    <script src="<?= base_url() ?>assets/vendor/datepicker/js/bootstrap-datepicker.js"></script>
    <!-- SF JS -->
    <script src="<?= base_url() ?>assets/js/sf.js"></script>

    <!-- Frontend Color Admin -->
    <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="<?= base_url() ?>assets/vendor/coloradmin/assets/frontend/assets/js/one-page-parallax/vendor.min.js" type="7469cdbbe67135cc43a939a7-text/javascript"></script>
    <script src="<?= base_url() ?>assets/vendor/coloradmin/assets/frontend/assets//js/one-page-parallax/app.min.js" type="7469cdbbe67135cc43a939a7-text/javascript"></script>
    <script type="7469cdbbe67135cc43a939a7-text/javascript">
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
    <script src="https://ajax.cloudflare.com/cdn-cgi/scripts/7d0fa10a/cloudflare-static/rocket-loader.min.js" data-cf-settings="7469cdbbe67135cc43a939a7-|49" defer=""></script>
    <script defer src="https://static.cloudflareinsights.com/beacon.min.js" data-cf-beacon='{"rayId":"66b21f75ad21370a","version":"2021.6.0","r":1,"token":"4db8c6ef997743fda032d4f73cfeff63","si":10}'></script>

    <!-- END Color Admin JS -->

</body>

</html>