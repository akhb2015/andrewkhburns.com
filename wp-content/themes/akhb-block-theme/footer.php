	<footer id="colophon" class="site-footer">
		<h2>footer.php</h2>
		<div class="footer-menu-class">
			<nav id="footer-navigation" class="footer-navigation">
				<?php
					wp_nav_menu( array( 
				    'theme_location' => 'footer', 
				    'container_class' => 'footer-menu-class' ) );
				?>
			</nav>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
