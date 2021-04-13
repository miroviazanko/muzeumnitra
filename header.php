<!DOCTYPE html>
<html <?php language_attributes() ?>>

<head>
	<meta charset="<?php bloginfo('charset') ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link href="<?php echo get_template_directory_uri(); ?>/images/PM-favicon.png" rel="shortcut icon" type="image/vnd.microsoft.icon">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Syne:wght@400;700&display=swap" rel="stylesheet">

	<?php wp_head(); ?>

</head>

<body>
	<header>
		<div class="container position-relative">
			<div class="row g-0">
				<div class="col-12 col-xl-1">
					<div class="logo-wrap d-flex justify-content-center justify-content-xl-start">
						<a href="<?php echo home_url(); ?>">
							<img src="<?php echo get_template_directory_uri(); ?>/images/logo-inline.svg" width="100" height="73" alt="<?php _e('Ponitrianske múzeum v Nitre', 'mnsk') ?>">
						</a>
					</div><!-- / .logo-wrap -->
				</div>

				<div class="d-xl-none hamburger-wrap">
					<a class="ps-1 nav-toggler js-nav-toggler" id="navToggler" href="javascript:void(0);">
						<svg width="30" height="30" viewBox="0 0 30 20" fill="none" xmlns="http://www.w3.org/2000/svg">
							<line class="l1" y1="0.5" x2="30" y2="0.5"></line>
							<line class="l2" y1="19.5" x2="30" y2="19.5"></line>
							<line class="l3" y1="10.5" x2="30" y2="10.5"></line>
						</svg>

						<span class="d-block mt-1">MENU</span>
					</a>
				</div>

				<div class="col-xl-10 d-none d-xl-flex align-items-end" id="topNav">
					<div class="mobnav-wrap">
						<div class="mainnav-wrap d-xl-flex justify-content-xl-center">
							<nav>
								<?php
								wp_nav_menu(
									array(
										'theme_location' => 'top-menu',
										'menu_class' => 'top-nav',
										'menu_id' => '2',
										'container' => '',
									)
								);
								?>
								<?php
								$mnsk_languages = apply_filters('wpml_active_languages', null, 'orderby=id&order=desc');

								if (count($mnsk_languages) < 2) {
								?>
									<a class="lang" href=""></a>
								<?php
								} else {
									if (!empty($mnsk_languages)) {
										foreach ($mnsk_languages as $l) {
											if (!$l['active']) {
												$translate_to_en = $l['native_name'] === 'English' ? 'English version' : 'Slovenská verzia';
												$link_to_en = $l['url'];
											}
										}
									} ?>
									<a class="lang d-block mt-3 fs-3 text-muted d-xl-none" href="<?php echo $link_to_en ?>"><?php echo $translate_to_en ?></a>
								<?php } ?>

							</nav>
						</div>

						<div class="subnav-wrap">
							<a class="submenu-back js-submenu-back" href="javascript:void(0);">
								<img src="<?php echo get_template_directory_uri(); ?>/images/arr-white-left-short.svg" width="11" height="20" alt="<?php _e('tlačidlo späť', 'mnsk') ?>">
								<small class="d-block mt-2"><?php _e('späť', 'mnsk') ?></small>
							</a>

							<ul></ul>
						</div>
					</div><!-- / .mobnav-wrap -->
				</div>



				<div class="d-none d-xl-flex col-xl-1">
					<div class="hside-wrap">
						<div class="fschanger-wrap">
							<a id="smallerFontSize" href="javascript:void(0);"><small>aA</small></a>
							<a id="biggerFontSize" href="javascript:void(0);"><strong>aA</strong></a>
						</div><!-- / .fschanger-wrap -->

						<?php
						$mnsk_languages = apply_filters('wpml_active_languages', null, 'orderby=id&order=desc');

						if (count($mnsk_languages) < 2) {
						?>
							<div class="langs-wrap">
								<a class="lang" href=""></a>
							</div><!-- / .langs-wrap -->
						<?php
						} else {
							if (!empty($mnsk_languages)) {

								foreach ($mnsk_languages as $l) {
									if (!$l['active']) {
										$translate_to_en = $l['native_name'] === 'English' ? 'English version' : 'Slovenská verzia';
										$link_to_en = $l['url'];
									}
								}
							} ?>
							<div class="langs-wrap">
								<a class="lang" href="<?php echo $link_to_en ?>"><?php echo $translate_to_en ?></a>
							</div><!-- / .langs-wrap -->
						<?php } ?>


					</div><!-- / .hside-wrap -->
				</div>
			</div><!-- / .row -->
		</div><!-- / .container -->
	</header>
