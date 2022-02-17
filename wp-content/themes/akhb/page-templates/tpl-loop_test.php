<?php

/** Loop Test
 *
 *
 * Template Name: Loop Test
 *
 *
 * @author      Andy Burns <akhb1968@yahoo.com>
 * @copyright   2021 Andy Burns
 * @link        https://www.andrewkhburns.com/loop-test/
 *
 */

get_header();

?>

<main class="site-main">

	<?php

		if ( have_posts() ) : 
			while ( have_posts() ) : the_post();
	?>

		    	<h2><?php the_field('page_header'); ?></h2>
		        <?php the_content(); ?>

    <?php
			endwhile;

		else :  _e( 'Sorry, no posts matched your criteria.', 'akhb' );
		endif;

	?>

	<section id="top">
		<p>Here's a nice pink section</p>
	</section>

</main>

<?php

get_footer();