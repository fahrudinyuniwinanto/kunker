<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<title><?= data_app() ?></title>
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
	<!-- Favicon -->
	<link rel="icon" href="<?= base_url() ?>assets/img/dpr.png">

	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
	<link href="<?= base_url() ?>assets/css/corporate/vendor.min.css" rel="stylesheet" />
	<link href="<?= base_url() ?>assets/css/corporate/app.min.css" rel="stylesheet" />

</head>

<body>

	<div id="page-loader" class="fade show">
		<span class="spinner"></span>
	</div>


	<div id="page-container">

		<div class="header header-float">
			<div class="container d-flex">
				<div class="header-logo">
					<a href="<?= base_url() ?>" class="logo-link">

						<img alt="image" src="<?= base_url() ?>assets/img/dpr.png" style="width: 40px;" />&nbsp&nbsp<b><?= data_app('APP_NAME') ?></b> <small><?= date('Y') ?></small>
					</a>
				</div>
				<div class="header-nav">
					<div class="container">
						<div class="header-nav-item">
							<a href="about.html" class="header-nav-link">Home</a>
						</div>
						<div class="header-nav-item">
							<a href="products.html" class="header-nav-link">Rekap Permohonan</a>
						</div>
						<div class="header-nav-item">
							<a href="careers.html" class="header-nav-link">Tentang Kami</a>
						</div>
						<div class="header-nav-item">
							<a href="contact_us.html" class="header-nav-link">Kontak</a>
						</div>
					</div>
				</div>
				<div class="header-btn">
					<a href="<?= base_url('Frontend/login') ?>" class="btn btn-primary fw-bold rounded-pill">Login </a>
				</div>
				<button class="header-mobile-nav-toggler" type="button" data-toggle="header-mobile-nav">
					<span class="header-mobile-nav-toggler-icon"></span>
				</button>
			</div>
		</div>


		<div class="section section-hero">

			<div class="section-bg with-cover" style="background-image: url(<?= base_url() ?>assets/img/corporate/img-1.jpg);"></div>
			<div class="section-bg bg-gray-800-transparent-5"></div>


			<div class="container position-relative">

				<div class="section-hero-content">

					<div class="row">

						<div class="col-lg-8 col-lg-10">

							<h1 class="hero-title mb-3 mt-5 pt-md-5">
								<?= data_app('APP_LONG_NAME') ?>
							</h1>
							<div class="fs-18px text-white-transparent-8">

								<?= data_app('APP_NAME') ?>
							</div>


							<a href="#" class="hero-btn fw-bold mb-n5">
								<?= data_app('APP_INSTANSI') ?>
							</a><br />
							<a href="#" class="hero-btn fw-bold mb-n5">
								<?= data_app('OPD_ADDR') ?>
							</a>
						</div>

					</div>

				</div>

			</div>

		</div>


		<div class="section">

			<div class="container">

				<div class="pt-lg-5 pb-lg-3 text-center">
					<div class="display-6 fw-bolder mb-3 d-flex align-items-center justify-content-center">
						Our missions
					</div>
					<p class="fs-18px mb-5">We build technologies that help people create their own applications, <span class="d-none d-lg-inline"><br /></span>speed up development speed, save times and grow their businesses.</p>
					<div class="mb-2 fw-bold text-gray-500">built on top of</div>
					<div class="text-gray-500 text-center mb-5">
						<i class="fab fa-bootstrap fa-2x fa-fw"></i>
						<i class="fab fa-node-js fa-2x  fa-fw"></i>
						<i class="fab fa-vuejs fa-2x  fa-fw"></i>
						<i class="fab fa-angular fa-2x  fa-fw"></i>
						<i class="fab fa-react fa-2x  fa-fw"></i>
					</div>
				</div>


				<h4 class="section-subtitle">Top Stories</h4>


				<div class="row gx-lg-5">

					<div class="col-lg-4">

						<div class="news">
							<div class="news-media">
								<div class="news-media-img" style="background-image: url(<?= base_url() ?>assets/img/corporate/img-2.jpg);"></div>
							</div>
							<div class="news-content">
								<div class="news-label"><span class="">Web Development</span></div>
								<h2 class="news-title">Accelerate development without extra added costs</h2>
								<p class="news-date">December 9, 2021</p>
							</div>
						</div>


						<div class="news">
							<div class="news-media">
								<div class="news-media-img" style="background-image: url(<?= base_url() ?>assets/img/corporate/img-3.jpg);"></div>
							</div>
							<div class="news-content">
								<div class="news-label"><span class="bg-indigo-200 text-indigo-800">Native Apps</span></div>
								<h2 class="news-title">Multiple frontend framework fit your needs</h2>
								<p class="news-date">December 10, 2021</p>
							</div>
						</div>

					</div>


					<div class="col-lg-8">

						<div class="news">
							<div class="news-media">
								<div class="news-media-img news-media-img-lg" style="background-image: url(<?= base_url() ?>assets/img/corporate/img-4.jpg);"></div>
							</div>
							<div class="news-content">
								<div class="news-label"><span class="bg-primary-200 text-primary-800">SEO Ranking</span></div>
								<h2 class="news-title">Boost your web traffic with smart routing and seo optimised html code.</h2>
								<p class="news-date">December 20, 2021</p>
							</div>
						</div>

					</div>

				</div>

			</div>

		</div>


		<div class="section bg-light">

			<div class="container">

				<div class="row align-items-center">

					<div class="col-lg-6 pe-lg-4 mb-5 mb-lg-0">
						<div class="section-subtitle">Our Platform</div>
						<div class="section-title">Stunning cross-platform template</div>
						<div class="section-desc">
							Our suite of developer-friendly products and services help you build, secure, and deliver enterprise-grade apps in less time — for any platform.
						</div>
						<a href="#" class="section-btn"><i class="fa fa-arrow-right"></i> Learn More</a>
					</div>


					<div class="col-lg-6 ps-lg-4">
						<div class="section-media">
							<img src="<?= base_url() ?>assets/img/corporate/img-5.jpg" alt="" class="mw-100" />
						</div>
					</div>

				</div>

			</div>

		</div>

		<div class="footer">
			<div class="container">
				<div class="row gx-5">
					<div class="col-lg-3 mb-4 mb-lg-0">
						<div class="footer-logo">
							<span class="footer-logo-text">ColorAdmin <small>CORPORATE</small></span>
						</div>
						<p class="footer-desc">
							Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin in orci felis. Phasellus id urna nunc. Nulla sed nibh at libero tincidunt scelerisque sed porttitor lectus.
						</p>
						<h4 class="footer-title">Follow Us</h4>
						<div class="footer-media-list">
							<a href="#" class="me-1"><i class="fab fa-lg fa-facebook fa-fw"></i></a>
							<a href="#" class="me-2"><i class="fab fa-lg fa-instagram fa-fw"></i></a>
							<a href="#" class="me-2"><i class="fab fa-lg fa-twitter fa-fw"></i></a>
							<a href="#" class="me-2"><i class="fab fa-lg fa-youtube fa-fw"></i></a>
							<a href="#" class="me-2"><i class="fab fa-lg fa-linkedin fa-fw"></i></a>
						</div>
					</div>
					<div class="col-lg-3 mb-4 mb-lg-0">
						<h4 class="footer-title">Company</h4>
						<ul class="footer-link-list">
							<li><a href="#">Newsroom</a></li>
							<li><a href="#">Company Info</a></li>
							<li><a href="#">Careers</a></li>
							<li><a href="#">For Investors</a></li>
							<li><a href="#">Brand Resources</a></li>
						</ul>
						<hr class="my-4 text-gray-600" />
						<h4 class="footer-title">Policies</h4>
						<ul class="footer-link-list">
							<li><a href="#">Community Standards</a></li>
							<li><a href="#">Data Policy</a></li>
							<li><a href="#">Cookie Policy</a></li>
							<li><a href="#">Terms of Service</a></li>
						</ul>
					</div>
					<div class="col-lg-3 mb-4 mb-lg-0">
						<h4 class="footer-title">Our Store</h4>
						<ul class="footer-link-list">
							<li><a href="#">Shop Online</a></li>
							<li><a href="#">Store App</a></li>
							<li><a href="#">Recycling Programme</a></li>
							<li><a href="#">Order Status</a></li>
							<li><a href="#">Shopping Help</a></li>
						</ul>
					</div>
					<div class="col-lg-3 mb-4 mb-lg-0">
						<h4 class="footer-title">Help Center</h4>
						<ul class="footer-link-list">
							<li><a href="#">Contact Form</a></li>
							<li><a href="#">Live Chat Support</a></li>
							<li><a href="#">Portal Help Center</a></li>
						</ul>
					</div>
				</div>
				<div class="footer-copyright">
					<div class="row">
						<div class="col-lg-6 text-center text-lg-start mb-3 mb-lg-0">
							<div class="footer-copyright-text">&copy; <?= date('Y') . ' ' . data_app('LEFT_FOOTER') ?></div>
						</div>
						<div class="col-lg-6 text-center text-lg-end">
							<!-- <span class="dropdown me-4">
								<a href="#" class="footer-copyright-link dropdown-toggle" data-bs-toggle="dropdown">United States (English)</a>
								<ul class="dropdown-menu">
									<li><a href="#" class="dropdown-item">United States (English)</a></li>
									<li><a href="#" class="dropdown-item">China (简体中文)</a></li>
									<li><a href="#" class="dropdown-item">Brazil (Português)</a></li>
									<li><a href="#" class="dropdown-item">Germany (Deutsch)</a></li>
									<li><a href="#" class="dropdown-item">France (Français)</a></li>
									<li><a href="#" class="dropdown-item">Japan (日本語)</a></li>
									<li><a href="#" class="dropdown-item">Korea (한국어)</a></li>
									<li><a href="#" class="dropdown-item">Latin America (Español)</a></li>
									<li><a href="#" class="dropdown-item">Spain (Español)</a></li>
								</ul>
							</span> -->
							<!-- <a href="#" class="footer-copyright-link">Sitemap</a> -->
						</div>
					</div>
				</div>
			</div>
		</div>

	</div>


	<script src="<?= base_url() ?>assets/js/corporate/vendor.min.js" type="c6d7af6df102fb05e4839bbe-text/javascript"></script>
	<script src="<?= base_url() ?>assets/js/corporate/app.min.js" type="c6d7af6df102fb05e4839bbe-text/javascript"></script>
	<script type="c6d7af6df102fb05e4839bbe-text/javascript">
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
	<script src="https://ajax.cloudflare.com/cdn-cgi/scripts/7d0fa10a/cloudflare-static/rocket-loader.min.js" data-cf-settings="c6d7af6df102fb05e4839bbe-|49" defer=""></script>
	<script defer src="https://static.cloudflareinsights.com/beacon.min.js" data-cf-beacon='{"rayId":"66b21f7c2ffe370a","version":"2021.6.0","r":1,"token":"4db8c6ef997743fda032d4f73cfeff63","si":10}'></script>
</body>

</html>