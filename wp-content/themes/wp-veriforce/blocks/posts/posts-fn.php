<?php

add_action('acf/init', function() {

	// REGISTER BLOCK TYPE

	if (function_exists('acf_register_block_type')) {
		acf_register_block_type([
			'title' => 'Posts',
			'name' => 'posts',
			'supports' => ['align' => false],
			'render_template' => 'blocks/posts/posts.php',
			'enqueue_assets' => function() {
				wp_enqueue_style('block-posts', get_template_directory_uri().'/blocks/posts/posts.css', null, null);
				wp_enqueue_script('block-posts', get_template_directory_uri().'/blocks/posts/posts.js', ['jquery'], null, true);
			}
		]);
	}



	// ADD ACF FIELDS

	acf_add_local_field_group([
		'key' => 'group_posts',
		'title' => 'Block: Posts',
		'fields' => [[
			'key' => 'field_posts_display',
			'label' => 'Display',
			'name' => 'display',
			'type' => 'accordion',
			'open' => 1,
			'multi_expand' => 1,
		], [
			'key' => 'field_posts_manual',
			'label' => 'Manually Select Posts',
			'name' => 'manual',
			'type' => 'true_false',
			'ui' => 1,
		], [
			'key' => 'field_posts_posts',
			'label' => 'Posts',
			'name' => 'posts',
			'type' => 'post_object',
			'post_type' => ['post', 'resource', 'course'],
			'allow_null' => 1,
			'multiple' => 1,
			'return_format' => 'id',
			'conditional_logic' => [[[
				'field' => 'field_posts_manual',
				'operator' => '==',
				'value' => '1',
			]]],
		], [
			'key' => 'field_posts_query',
			'label' => 'Query',
			'name' => 'query',
			'type' => 'group',
			'conditional_logic' => [[[
				'field' => 'field_posts_manual',
				'operator' => '!=',
				'value' => '1',
			]]],
			'sub_fields' => [[
				'key' => 'field_posts_manual_post_type',
				'label' => 'Post Type',
				'name' => 'post_type',
				'type' => 'select',
				'choices' => [
					'post' => 'Posts',
					'resource' => 'Resources',
					'course' => 'Courses',
				],
				'allow_null' => 1,
				'wrapper' => ['width' => '20'],
				'wpml_cf_preferences' => 0,
			], [
				'key' => 'field_posts_manual_category',
				'label' => 'Category',
				'name' => 'category',
				'type' => 'taxonomy',
				'taxonomy' => 'category',
				'field_type' => 'select',
				'allow_null' => 1,
				'add_term' => 0,
				'return_format' => 'object',
				'wrapper' => ['width' => '20'],
				'conditional_logic' => [[[
					'field' => 'field_posts_manual_post_type',
					'operator' => '==',
					'value' => 'post',
				]]],
			], [
				'key' => 'field_posts_manual_tag',
				'label' => 'Tag',
				'name' => 'tag',
				'type' => 'taxonomy',
				'taxonomy' => 'post_tag',
				'field_type' => 'select',
				'allow_null' => 1,
				'add_term' => 0,
				'return_format' => 'object',
				'wrapper' => ['width' => '20'],
				'conditional_logic' => [[[
					'field' => 'field_posts_manual_post_type',
					'operator' => '==',
					'value' => 'post',
				]]],
			], [
				'key' => 'field_posts_manual_resource_category',
				'label' => 'Category',
				'name' => 'resource_category',
				'type' => 'taxonomy',
				'taxonomy' => 'resource_category',
				'field_type' => 'select',
				'allow_null' => 1,
				'add_term' => 0,
				'return_format' => 'object',
				'wrapper' => ['width' => '20'],
				'conditional_logic' => [[[
					'field' => 'field_posts_manual_post_type',
					'operator' => '==',
					'value' => 'resource',
				]]],
			], [
				'key' => 'field_posts_manual_resource_industry',
				'label' => 'Industry',
				'name' => 'resource_industry',
				'type' => 'taxonomy',
				'taxonomy' => 'resource_industry',
				'field_type' => 'select',
				'allow_null' => 1,
				'add_term' => 0,
				'return_format' => 'object',
				'wrapper' => ['width' => '20'],
				'conditional_logic' => [[[
					'field' => 'field_posts_manual_post_type',
					'operator' => '==',
					'value' => 'resource',
				]]],
			], [
				'key' => 'field_posts_manual_resource_type',
				'label' => 'Type',
				'name' => 'resource_type',
				'type' => 'taxonomy',
				'taxonomy' => 'resource_type',
				'field_type' => 'select',
				'allow_null' => 1,
				'add_term' => 0,
				'return_format' => 'object',
				'wrapper' => ['width' => '20'],
				'conditional_logic' => [[[
					'field' => 'field_posts_manual_post_type',
					'operator' => '==',
					'value' => 'resource',
				]]],
			], [
				'key' => 'field_posts_manual_search',
				'label' => 'Search',
				'name' => 'search',
				'type' => 'text',
			]],
			'wpml_cf_preferences' => 0,
		], [
			'key' => 'field_posts_options',
			'label' => 'Options',
			'name' => 'options',
			'type' => 'accordion',
			'multi_expand' => 1,
		], [
			'key' => 'field_posts_style',
			'label' => 'Style',
			'name' => 'style',
			'type' => 'select',
			'choices' => [
				'noimg' => 'No Images',
			],
			'allow_null' => 1,
			'wpml_cf_preferences' => 0,
		], [
			'key' => 'field_posts_primary',
			'name' => 'primary_posts_block',
			'type' => 'true_false',
			'message' => 'Primary',
		], [
			'key' => 'field_posts_alm',
			'name' => 'alm',
			'type' => 'true_false',
			'message' => 'Ajax Load More',
			'conditional_logic' => [[[
				'field' => 'field_posts_primary',
				'operator' => '==',
				'value' => 1,
			]]],
		], [
			'key' => 'field_posts_display_filter',
			'name' => 'display_filter',
			'type' => 'true_false',
			'message' => 'Display Filter',
			'conditional_logic' => [[[
				'field' => 'field_posts_primary',
				'operator' => '==',
				'value' => 1,
			]]],
		], [
			'key' => 'field_posts_num_posts',
			'label' => 'Number of Posts',
			'name' => 'num_posts',
			'type' => 'select',
			'choices' => [
				2 => '2',
				3 => '3',
				6 => '6',
				9 => '9',
				12 => '12',
			],
			'allow_null' => 1,
			'conditional_logic' => [[[
				'field' => 'field_posts_primary',
				'operator' => '!=',
				'value' => 1,
			]]],
			'wpml_cf_preferences' => 0,
		]],
		'location' => [[[
			'param' => 'block',
			'operator' => '==',
			'value' => 'acf/posts',
		]]],
		'acfml_field_group_mode' => 'advanced',
	]);
});



// ALLOW PAGINATION FOR ALL PAGES

add_action('init', function() {
	add_rewrite_rule('(.?.+?)/page/?([0-9]{1,})/?$', 'index.php?pagename=$matches[1]&paged=$matches[2]', 'top');
});



// ONLY ALLOW ONE PRIMARY POSTS BLOCK PER PAGE

add_filter('wp_insert_post_data', function($post) {
	$find = '\"primary_posts_block\":\"1\"';
	$replace = '\"primary_posts_block\":\"0\"';
	$content = $post['post_content'];

	$before = strstr($content, $find, true);
	if ($before) {
		$after = substr($content, strlen($before) + strlen($find));
		$after = str_replace($find, $replace, $after);
		$post['post_content'] = $before . $find . $after;
	}

	return $post;
});
