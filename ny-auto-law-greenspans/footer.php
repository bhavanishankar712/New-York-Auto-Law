<?php
$footer_logo = carbon_get_theme_option('footer_logo');

$ftr_menu_hdg = carbon_get_theme_option('ftr_menu_hdg');

$ftr_contact_hdg = carbon_get_theme_option('ftr_contact_hdg');

$ftr_cont_address_icon = carbon_get_theme_option('ftr_cont_address_icon');
$ftr_cont_address_text = carbon_get_theme_option('ftr_cont_address_text');
$ftr_cont_address_link = carbon_get_theme_option('ftr_cont_address_link');

$ftr_cont_call_icon = carbon_get_theme_option('ftr_cont_call_icon');
$ftr_cont_call_text = carbon_get_theme_option('ftr_cont_call_text');
$ftr_cont_call_link = carbon_get_theme_option('ftr_cont_call_link');
$ftr_cont_call_consu_txt = carbon_get_theme_option('ftr_cont_call_consu_txt');

$ftr_cont_serv_img = carbon_get_theme_option('ftr_cont_serv_img');
$ftr_cont_serv_text = carbon_get_theme_option('ftr_cont_serv_text');
$ftr_cont_serv_subtxt = carbon_get_theme_option('ftr_cont_serv_subtxt');

$ftr_social_hdg = carbon_get_theme_option('ftr_social_hdg');
$footer_social_icons = carbon_get_theme_option('footer_social_icons');

$ftr_no_fee_text = carbon_get_theme_option('ftr_no_fee_text');
$ftr_disclaimer_text = carbon_get_theme_option('ftr_disclaimer_text');

?>


<footer id="site-footer" class="footer-sec" role="contentinfo">
	<div class="container">

		<div class="ftr-list">

			<div class="footer-left">

				<?php if (!empty($footer_logo)): ?>
					<div class="footer-logo-img">
						<a href="<?php echo esc_url(home_url('/')); ?>">
							<img src="<?php echo esc_url($footer_logo); ?>" alt="<?php bloginfo('name'); ?>" width="309"
								height="107">
						</a>
					</div>
				<?php endif; ?>

			</div>

			<div class="footer-right">

				<div class="ftr-menu-blk">

					<?php if (!empty($ftr_menu_hdg)): ?>
						<div class="ftr-menu-hdg ftr-item-hdg">
							<?php echo wp_kses_post($ftr_menu_hdg); ?>
						</div>
					<?php endif; ?>

					<div class="footer-menu">

						<?php
						wp_nav_menu(
							array(
								'container_id' => 'footer-menu',
								'container_class' => '',
								'menu_class' => '',
								'theme_location' => 'footer-menu',
								'li_class' => '',
								'fallback_cb' => false,
							)
						);
						?>

					</div>

				</div>

				<div class="ftr-contact-blk">

					<?php if (!empty($ftr_contact_hdg)): ?>
						<div class="ftr-contact-hdg ftr-item-hdg">
							<?php echo wp_kses_post($ftr_contact_hdg); ?>
						</div>
					<?php endif; ?>

					<div class="ftr-contact-list">

						<div class="ftr-contact-add-blk ftr-cont-item">
							<div class="ftr-cont-cnt">
								<?php if (!empty($ftr_cont_address_text)): ?>
									<a href="<?php echo $ftr_cont_address_link; ?>" target="_blank">
										<?php if (!empty($ftr_cont_address_icon)): ?>
											<img src="<?php echo esc_url($ftr_cont_address_icon); ?>" alt="Location Icon"
												width="32" height="32">
										<?php endif; ?>
										<?php echo $ftr_cont_address_text; ?>
									</a>
								<?php endif; ?>
							</div>
						</div>

						<div class="ftr-contact-call-blk ftr-cont-item">
							<div class="ftr-cont-cnt">
								<?php if (!empty($ftr_cont_call_text)): ?>
									<a href="tel:+1<?php echo preg_replace('/[^0-9+]/', '', $ftr_cont_call_text); ?>">
										<?php if (!empty($ftr_cont_call_icon)): ?>
											<img src="<?php echo esc_url($ftr_cont_call_icon); ?>" alt="Call Icon" width="32"
												height="32">
										<?php endif; ?>
										<?php echo $ftr_cont_call_text; ?>
									</a>
								<?php endif; ?>
								<?php if (!empty($ftr_cont_call_consu_txt)): ?>
									<div class="ftr-call-consul-txt">
										<?php echo wp_kses_post($ftr_cont_call_consu_txt); ?>
									</div>
								<?php endif; ?>
							</div>
						</div>

						<div class="ftr-contact-serv-blk ftr-cont-item">
							<div class="ftr-cont-cnt">
								<?php if (!empty($ftr_cont_serv_img)): ?>
									<div class="ftr-service-img">
										<img src="<?php echo esc_url($ftr_cont_serv_img); ?>" alt="Globe Icon" width="32"
											height="32">
									</div>
								<?php endif; ?>
								<?php if (!empty($ftr_cont_serv_text)): ?>
									<div class="ftr-service-text">
										<?php echo $ftr_cont_serv_text; ?>
									</div>
								<?php endif; ?>
								<?php if (!empty($ftr_cont_serv_subtxt)): ?>
									<div class="ftr-service-subtxt">
										<p><?php echo $ftr_cont_serv_subtxt; ?></p>
									</div>
								<?php endif; ?>
							</div>
						</div>

					</div>

				</div>

				<div class="ftr-social-blk">

					<?php if (!empty($ftr_social_hdg)): ?>
						<div class="ftr-soc-hdg ftr-item-hdg">
							<?php echo wp_kses_post($ftr_social_hdg); ?>
						</div>
					<?php endif; ?>

					<?php if (!empty($footer_social_icons)): ?>

						<div class="ftr-soc-icons">

							<?php foreach ($footer_social_icons as $social): ?>

								<?php if (!empty($social['social_link']) && !empty($social['social_icon'])): ?>
									<a href="<?php echo esc_url($social['social_link']); ?>" target="_blank" rel="noopener">
										<img src="<?php echo esc_url($social['social_icon']); ?>"
											alt="<?php echo esc_attr($social['social_icon_alt']); ?>" width="20" height="20">
									</a>
								<?php endif; ?>

							<?php endforeach; ?>

						</div>

					<?php endif; ?>

				</div>

			</div>

		</div>

		<?php if (!empty($ftr_no_fee_text)): ?>
			<div class="footer-no-fee-cnt">
				<?php echo apply_filters('the_content', $ftr_no_fee_text); ?>
			</div>
		<?php endif; ?>

		<div class="copy-rights">

			<div class="cpy-left">
				<?php if (!empty($ftr_disclaimer_text)): ?>
					<?php echo apply_filters('the_content', $ftr_disclaimer_text); ?>
				<?php endif; ?>
			</div>

			<div class="cpy-rht">
				<p>&copy; <?php echo date_i18n('Y'); ?> <span
						class="primary"><?php echo get_bloginfo('name'); ?></span>. All rights reserved.</p>

				<div class="juris-blk">Website designed by: <a href="https://jurisdigital.com/" target="_blank"
						rel="noopener noreferrer">Juris Digital.</a> </div>
			</div>
		</div>

	</div>
</footer>

</div> <!-- end #wrapper -->

<button onclick="scrollToTop()" class="scroll-top"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
		<path
			d="M201.4 137.4c12.5-12.5 32.8-12.5 45.3 0l160 160c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L224 205.3 86.6 342.6c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3l160-160z" />
	</svg></button>
<script>
	function scrollToTop() {
		window.scroll({
			top: 0,
			left: 0,
			behavior: 'smooth'
		});
	}

	function trackScroll() {
		let scroller = document.querySelector('.scroll-top');
		if (window.pageYOffset > 50) {
			scroller.style.visibility = 'visible';
		} else {
			scroller.style.visibility = 'hidden';
		}
	}
	window.addEventListener('scroll', trackScroll);
</script>

<?php wp_footer(); ?>

<script>
	// Close main nav when mobile nav item is clicked. 

	document.addEventListener('DOMContentLoaded', function() {
		// Get all anchor links with an href attribute containing '#'
		const anchorLinks = document.querySelectorAll('a[href*="#"]');

		// Get the checkbox input with classname '.side-menu'
		const sideMenuCheckbox = document.querySelector('.side-menu');

		// Add a click event listener to each anchor link
		anchorLinks.forEach(link => {
			link.addEventListener('click', function(event) {
				// Check if the href attribute contains '#'
				if (link.href.includes('#')) {
					// Uncheck the checkbox
					sideMenuCheckbox.checked = false;
				}
			});
		});
	});
</script>

<!-- <script>
// Slick Slider Settings
jQuery(document).ready(function(){
	jQuery('.slider-class').slick({
		centerMode: true,
		centerPadding: '60px',
		dots: true,
		arrows: false,
		slidesToShow: 5,
		responsive: [
			{
			breakpoint: 1024,
			settings: {
				arrows: false,
				centerMode: true,
				centerPadding: '40px',
				slidesToShow: 3,
				dots: true
			}
			},
			{
			breakpoint: 480,
			settings: {
				arrows: false,
				centerMode: true,
				centerPadding: '40px',
				slidesToShow: 1,
				dots: true
			}
			}
		]
	});
});
</script> -->

</body>

</html>