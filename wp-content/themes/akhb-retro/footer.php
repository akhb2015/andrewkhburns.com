	<footer id="colophon" class="site-footer">
		<!--<div class="footer-menu-class">
			<nav id="footer-navigation" class="footer-navigation">
				<?php
					wp_nav_menu( array( 
				    'theme_location' => 'footer', 
				    'container_class' => 'footer-menu-class' ) );
				?>
			</nav>
		</div>-->

		<div class="copyright">
			<p class="copyright"><?php echo date('Y') . ' Copyright Andy Burns'; ?></p>
		</div>
	</footer><!-- #colophon -->

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
