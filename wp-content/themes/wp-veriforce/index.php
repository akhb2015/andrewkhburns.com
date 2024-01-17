<?php
	get_header();
	$post = get_page_by_path(get_page_path());
?>



<?php if ($post): ?>
	<?php
		setup_postdata($post);
		the_content();
		wp_reset_postdata();
	?>
<?php else: ?>
	<section class="b-section">
		<div class="b-frame">
			<?php acf_render_block([
				'id'  => 'block_index-content',
				'name' => 'acf/content',
				'data' => [
					'style' => 'heading',
					'content' => '<h1>'.get_the_archive_title().'</h1>'.get_the_archive_description(),
				]
			]); ?>

			<div class="b-spacer" data-height="medium"></div>

			<?php
				$query_vars = [
					'post_type' => get_query_var('post_type'),
					'category' => get_query_var('category_name') ? (object)['slug' => get_query_var('category_name')] : null,
					'tag' => get_query_var('tag') ? (object)['slug' => get_query_var('tag')] : null,
					'resource_category' => get_query_var('resource_category') ? (object)['slug' => get_query_var('resource_category')] : null,
					'resource_industry' => get_query_var('resource_industry') ? (object)['slug' => get_query_var('resource_industry')] : null,
					'resource_type' => get_query_var('resource_type') ? (object)['slug' => get_query_var('resource_type')] : null,
					'event_type' => get_query_var('event_type') ? (object)['slug' => get_query_var('event_type')] : null,
					'event_location' => get_query_var('event_location') ? (object)['slug' => get_query_var('event_location')] : null,
					'training_type' => get_query_var('training_type') ? (object)['slug' => get_query_var('training_type')] : null,
					'training_location' => get_query_var('training_location') ? (object)['slug' => get_query_var('training_location')] : null,
				];

				if (!$query_vars['post_type']) {
					$query_vars['post_type'] = 'post';
					if ($query_vars['resource_category'] || $query_vars['resource_industry'] || $query_vars['resource_type'])
						$query_vars['post_type'] = 'resource';
					if ($query_vars['event_type'] || $query_vars['event_location']) $query_vars['post_type'] = 'event';
					if ($query_vars['training_type'] || $query_vars['training_location']) $query_vars['post_type'] = 'training';
				}

				if ($query_vars['post_type'] == 'event' || $query_vars['post_type'] == 'training') {
					acf_render_block([
						'id'  => 'block_index-events',
						'name' => 'acf/events',
						'data' => [
							'primary_posts_block' => true,
							'alm' => true,
							'query' => $query_vars,
						]
					]);
				} else {
					acf_render_block([
						'id'  => 'block_index-posts',
						'name' => 'acf/posts',
						'data' => [
							'primary_posts_block' => true,
							'alm' => true,
							'query' => $query_vars,
						]
					]);
				}
			?>
		</div>
	</section>
<?php endif ?>



<?php get_footer(); ?>
