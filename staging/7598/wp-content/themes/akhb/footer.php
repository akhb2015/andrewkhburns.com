<?php
/**
 * The template for displaying the footer
 *
 * @author      Andy Burns
 * @copyright   2021
 */

?>

<a href="#" class="scroll-top"><i class="fas fa-arrow-circle-up" title="Back to top"></i></a>
	<footer id="site-footer">
		<div id="footer-wrapper" class="bg-dark text-light-subtitle">
			<div class="container-fluid">
				<div class="footer-bottom py-1">
					<div class="row py-3">
						<div class="col-md-5 col-lg-6">
							<p class="mb-0">&copy; <?php echo date( 'Y' ); ?> <a href="<?php echo home_url(); ?>">AKHB</a></p>
						</div>

						<div class="col-md-7 col-lg-6 text-md-right">
							<p class="mb-0"><a href="<?php echo esc_url( home_url( 'company/' ) ); ?>">About</a> &bull; <a href="<?php echo esc_url( home_url( 'company/privacy/' ) ); ?>">Privacy Policy</a> &bull; <a href="<?php echo esc_url( home_url( 'company/terms/' ) ); ?>">Terms of Use</a></p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</footer>

	<div id="google_translate_element"></div>

	<?php wp_footer(); ?>

</body>
</html>