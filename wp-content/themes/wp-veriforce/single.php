<?php
	get_header();
	the_post();
	$hide_default_blocks = get_field('hide_default_blocks');
?>



<?php if (has_blocks()): ?>
	<?php the_content(); ?>
<?php else: ?>
	<section class="b-section">
		<div class="b-frame">
			<?php
				if (get_query_var('post_type') == 'event' || get_query_var('post_type') == 'training') {
					acf_render_block([
						'id'  => 'block_single-event',
						'name' => 'acf/event',
						'data' => [
							'content' => apply_filters('the_content', get_the_content()),
						]
					]);
				} else {
					acf_render_block([
						'id'  => 'block_single-post',
						'name' => 'acf/post',
						'data' => [
							'content' => apply_filters('the_content', get_the_content()),
						]
					]);
				}
			?>
		</div>
	</section>
<?php endif ?>



<?php if (!$hide_default_blocks) {
	$default_blocks = match (get_post_type()) {
		'post' => get_post(apply_filters('wpml_object_id', 4530, 'post', true)),
		'resource' => get_post(apply_filters('wpml_object_id', 4501, 'resource', true)),
		default => null,
	};

	if ($default_blocks) {
		echo apply_filters('the_content', $default_blocks->post_content);
	}
} ?>



<?php get_footer(); ?>
