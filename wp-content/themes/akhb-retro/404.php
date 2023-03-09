<?php

get_header();

?>

	<main id="primary" class="site-main">

		<section class="error-404 not-found">
			<header class="page-header">
				<h1 class="page-title"><?php esc_html_e( 'Oopsy Daisy! That page can&rsquo;t be found.', 'akhb-retro' ); ?></h1>
			</header><!-- .page-header -->

			<div class="page-content">
				<p><?php esc_html_e( 'It looks like nothing was found at this location.', 'akhb-retro' ); ?></p>
				<br><br>

					<?php
					//get_search_form();

					//the_widget( 'WP_Widget_Recent_Posts' );
					?>
					<!--
					<div class="widget widget_categories">
						<h2 class="widget-title"><?php esc_html_e( 'Most Used Categories', 'akhb-retro' ); ?></h2>
						<ul>
							<?php
							/*
							wp_list_categories(
								array(
									'orderby'    => 'count',
									'order'      => 'DESC',
									'show_count' => 1,
									'title_li'   => '',
									'number'     => 10,
								)
							);
							*/
							?>
						</ul>
					</div>-->

					<!-- .widget -->

			</div><!-- .page-content -->
		</section><!-- .error-404 -->

	</main><!-- #main -->

<?php
get_footer();
