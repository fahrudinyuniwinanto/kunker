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
	<link rel="icon" href="<?= base_url() ?>assets/img/dpr.png">

	<!-- START Color Admin -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
	<link href="<?= base_url() ?>assets/vendor/coloradmin/assets/css/vendor.min.css" rel="stylesheet" />
	<link href="<?= base_url() ?>assets/vendor/coloradmin/assets/css/default/app.min.css" rel="stylesheet" />
	<link href="<?= base_url() ?>assets/vendor/coloradmin/assets/plugins/jvectormap-next/jquery-jvectormap.css" rel="stylesheet" />
	<link href="<?= base_url() ?>assets/vendor/coloradmin/assets/plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.css" rel="stylesheet" />
	<link href="<?= base_url() ?>assets/vendor/coloradmin/assets/plugins/gritter/css/jquery.gritter.css" rel="stylesheet" />
	<link href="<?= base_url() ?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
	<!-- END Color Admin -->
</head>

<body class='pace-top'>

	<div id="loader" class="app-loader">
		<span class="spinner"></span>
	</div>


	<div id="app" class="app">
		<?php
		$this->load->view($content);
		?>
	</div>

	<!-- JQUERY -->
	<script src="<?= base_url() ?>assets/js/jquery-3.6.0.min.js"></script>
	<!-- SF JS -->
	<script src="<?= base_url() ?>assets/js/sf.js"></script>

	<!-- Start Color Admin JS -->

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
	<script src="<?= base_url() ?> assets/bootstrap/js/bootstrap.min.js"></script>
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