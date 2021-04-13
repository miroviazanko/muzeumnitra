<?php echo get_template_part("template-parts/content", "instant-contact"); ?>

<div class="bg-dark overflow-hidden">
	<footer>
		<div class="container">
			<div class="row pt-2 pt-md-0">
				<div class="col-6 col-lg-3 py-2 py-lg-3 order-lg-0">
					<a href="<?php echo home_url() ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/logo-inline.svg" width="100" height="73" alt="<?php _e('Ponitrianske múzeum v Nitre', 'mnsk') ?>"></a>
				</div>

				<div class="col-6 col-lg-3 py-2 py-lg-3 order-lg-2 d-flex justify-content-end justify-content-lg-start">
					<a class="me-2 social" href="<?php the_field('facebook', 'options') ?>" target="_blank">
						<svg width="44" height="44" viewBox="0 0 44 44" fill="none" xmlns="http://www.w3.org/2000/svg" aria-labelledby="facebook-title" aria-describedby="facebook-desc">
							<title id="facebook-title"><?php _e('facebook', 'mnsk') ?></title>
							<desc id="facebook-desc"><?php _e('Ikonka odkazujúca na facebook Ponitrinakého múzea', 'mnsk') ?></desc>
							<path class="social-bg" d="M22 44C34.1503 44 44 34.1503 44 22C44 9.84974 34.1503 0 22 0C9.84974 0 0 9.84974 0 22C0 34.1503 9.84974 44 22 44Z" fill="#808080" />
							<path class="social-icn" d="M19.2 32.5999H23.4V21.9999H26.5L26.9 17.7999H23.5V16.0999C23.4 15.5999 23.8 15.1999 24.2 15.0999C24.3 15.0999 24.3 15.0999 24.4 15.0999H26.8V11.3999H23.5C19.9 11.3999 19.1 14.0999 19.1 15.7999V17.6999H17V21.9999H19.1C19.2 26.7999 19.2 32.5999 19.2 32.5999Z" fill="white" />

						</svg>
					</a>



					<a class="social" href="<?php the_field('instagram', 'options') ?>" target="_blank">
						<svg width="44" height="44" viewBox="0 0 44 44" fill="none" xmlns="http://www.w3.org/2000/svg" aria-labelledby="instagram-title" aria-describedby="instagram-desc">
							<title id="instagram-title"><?php _e('instagram', 'mnsk') ?></title>
							<desc id="instagram-desc"><?php _e('Ikonka odkazujúca na instagram Ponitrinakého múzea', 'mnsk') ?></desc>
							<path class="social-bg" d="M22 44C34.1503 44 44 34.1503 44 22C44 9.84974 34.1503 0 22 0C9.84974 0 0 9.84974 0 22C0 34.1503 9.84974 44 22 44Z" fill="#808080" />
							<path class="social-icn" d="M27.3 8.80005H16.6C12.3 8.80005 8.70001 12.3 8.70001 16.7V27.4C8.70001 31.7 12.2 35.3 16.6 35.3H27.3C31.6 35.3 35.2 31.8 35.2 27.4V16.7C35.2 12.4 31.7 8.80005 27.3 8.80005ZM32.5 27.4C32.5 30.3 30.2 32.6 27.3 32.6H16.6C13.7 32.6 11.4 30.3 11.4 27.4V16.7C11.4 13.8 13.7 11.5 16.6 11.5H27.3C30.2 11.5 32.5 13.8 32.5 16.7V27.4Z" fill="white" />
							<path class="social-icn" d="M22 15.2C18.2 15.2 15.2 18.3 15.2 22C15.2 25.7 18.3 28.8 22 28.8C25.8 28.8 28.8 25.7 28.8 22C28.8 18.3 25.7 15.2 22 15.2ZM22 26.2001C19.7 26.2001 17.8 24.3 17.8 22C17.8 19.7 19.7 17.8 22 17.8C24.3 17.8 26.2 19.7 26.2 22C26.2 24.4 24.3 26.2001 22 26.2001Z" fill="white" />
							<path class="social-icn" d="M28.8 16.9C29.6837 16.9 30.4 16.1837 30.4 15.3C30.4 14.4164 29.6837 13.7 28.8 13.7C27.9164 13.7 27.2 14.4164 27.2 15.3C27.2 16.1837 27.9164 16.9 28.8 16.9Z" fill="white" />
						</svg>
					</a>
				</div>

				<div class="col-lg-6 py-2 py-lg-3 order-lg-1">
					<?php
					$mnsk_languages = apply_filters('wpml_active_languages', null, 'orderby=id&order=desc');

					if (!empty($mnsk_languages)) {
						foreach ($mnsk_languages as $l) {
							if ($l['tag'] === 'en' && $l['active']) {
								$active_lang = 'en';
							}
							if ($l['tag'] === 'sk' && $l['active']) {
								$active_lang = 'sk';
							}
						}
					?>

						<div class="newsletter-wrap mb-2 mb-lg-0">
							<?php if ($active_lang === 'sk'): ?>
								<?php echo do_shortcode('[mc4wp_form id="686"]'); ?>
							<?php endif; ?>
						</div><!-- / .newsletter-wrap -->
					
					<?php
						}
					?>
				</div>
			</div><!-- / .row -->

			<div class="row">
				<div class="col-lg-3">
					<div class="accordion mb-3" id="footerAccordion">
						<div class="accordion-item">
							<h2 class="accordion-header" id="headingOne">
								<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
									<?php _e('Nájdete nás', 'mnsk') ?>
								</button>
							</h2>

							<div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#footerAccordion">
								<div class="accordion-body">
									<p>
										<?php the_field('adresa', 'options'); ?> <br>
										<?php the_field('psc', 'options'); ?><br>
										<?php the_field('tel_cislo', 'options'); ?><br>
										<?php the_field('email', 'options'); ?>
									</p>
								</div>
							</div>
						</div>

						<div class="accordion-item">
							<h2 class="accordion-header" id="headingTwo">
								<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
									<?php echo wp_get_nav_menu_name('footer-1a') ?>
								</button>
							</h2>

							<div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#footerAccordion">
								<div class="accordion-body">
									<div class="fnav-wrap">
										<?php
										wp_nav_menu(
											array(
												'theme_location' => 'footer-1a',
											)
										);
										?>
									</div>
								</div>
							</div>
						</div>

						<div class="accordion-item">
							<h2 class="accordion-header" id="headingThree">
								<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
									<?php echo wp_get_nav_menu_name('footer-1b') ?>
								</button>
							</h2>
							<div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#footerAccordion">
								<div class="accordion-body">
									<div class="fnav-wrap">
										<?php
										wp_nav_menu(
											array(
												'theme_location' => 'footer-1b',
											)
										);
										?>
									</div><!-- / .fnav-wrap -->
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="col-lg-3">
					<div class="accordion mb-3" id="bAcc">
						<div class="accordion-item">
							<h2 class="accordion-header" id="b1">
								<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#b1collapse" aria-expanded="false" aria-controls="b1collapse">
									<?php echo wp_get_nav_menu_name('footer-2a') ?>
								</button>
							</h2>

							<div id="b1collapse" class="accordion-collapse collapse" aria-labelledby="b1" data-bs-parent="#bAcc">
								<div class="accordion-body">
									<div class="fnav-wrap">
										<?php
										wp_nav_menu(
											array(
												'theme_location' => 'footer-2a',
											)
										);
										?>
									</div>
								</div>
							</div>
						</div>

						<div class="accordion-item">
							<h2 class="accordion-header" id="b2">
								<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#b2collapse" aria-expanded="false" aria-controls="b2collapse">
									<?php echo wp_get_nav_menu_name('footer-2b') ?>
								</button>
							</h2>

							<div id="b2collapse" class="accordion-collapse collapse" aria-labelledby="b2" data-bs-parent="#bAcc">
								<div class="accordion-body">
									<div class="fnav-wrap">
										<?php
										wp_nav_menu(
											array(
												'theme_location' => 'footer-2b',
											)
										);
										?>
									</div><!-- / .fnav-wrap -->
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="col-lg-3">
					<div class="accordion mb-3" id="cAcc">
						<div class="accordion-item">
							<h2 class="accordion-header" id="c1">
								<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#c1collapse" aria-expanded="false" aria-controls="c1collapse">
									<?php _e('Služby', 'mnsk') ?>
								</button>
							</h2>

							<div id="c1collapse" class="accordion-collapse collapse" aria-labelledby="c1" data-bs-parent="#cAcc">
								<div class="accordion-body">
									<?php dynamic_sidebar('footer-nav1') ?>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="col-lg-3">
					<div class="accordion mb-3" id="dAcc">
						<div class="accordion-item">
							<h2 class="accordion-header" id="d1">
								<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#d1collapse" aria-expanded="false" aria-controls="d1collapse">
									<?php echo wp_get_nav_menu_name('footer-4a') ?>

								</button>
							</h2>

							<div id="d1collapse" class="accordion-collapse collapse" aria-labelledby="d1" data-bs-parent="#dAcc">
								<div class="accordion-body">
									<div class="fnav-wrap">
										<?php
										wp_nav_menu(
											array(
												'theme_location' => 'footer-4a',
											)
										);
										?>
									</div>
								</div>
							</div>
						</div>

						<div class="accordion-item">
							<h2 class="accordion-header" id="d2">
								<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#d2collapse" aria-expanded="false" aria-controls="d2collapse">
									<?php _e('Projekty', 'mnsk') ?>
								</button>
							</h2>

							<div id="d2collapse" class="accordion-collapse collapse" aria-labelledby="d2" data-bs-parent="#dAcc">
								<div class="accordion-body">
									<?php dynamic_sidebar('footer-nav2') ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div><!-- / .row -->

			<div class="row">
				<div class="d-flex justify-content-center justify-content-lg-end pb-3">
					<a class="scroll-top" href="javascript:void(0);">
						<img src="<?php echo get_template_directory_uri(); ?>/images/arr-white-top.svg" width="17" height="11" alt="<?php _e('späť na vrch', 'mnsk') ?>">
					</a>
				</div>
			</div><!-- / .row -->

			<div class="row">
				<div class="border-top pt-2 pb-3 text-center">
					<small><?php echo date('Y'); ?>
						&copy; <?php _e('Ponitrianske múzeum v Nitre', 'mnsk') ?></small>
				</div>
			</div><!-- / .row -->
		</div><!-- / .container -->
	</footer>
</div><!-- / .bg-dark -->

<div class="cookies" id="cookies">
	<h2><?php the_field('cookies', 205) ?></h2>

	<p><?php the_field('oznam', 205) ?></p>

	<a href="javascript:void(0);" class="btn btn-long btn-dark" id="close-cookies--accept"><?php the_field('suhlas', 205) ?></a>

	<div class="text-center pt-1">
		<a class="text-muted" href="<?php echo home_url('/Cookies') ?>"><?php the_field('viac_informacii', 205) ?></a>
	</div>
</div>

<?php wp_footer() ?>
</body>

</html>
