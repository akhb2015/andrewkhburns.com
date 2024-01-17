<?php

add_action('acf/init', function() {

	// REGISTER BLOCK TYPE

	if (function_exists('acf_register_block_type')) {
		acf_register_block_type([
			'title' => 'Events',
			'name' => 'events',
			'supports' => ['align' => false],
			'render_template' => 'blocks/events/events.php',
			'enqueue_assets' => function() {
				wp_enqueue_style('block-events', get_template_directory_uri().'/blocks/events/events.css', null, null);
				wp_enqueue_script('block-events', get_template_directory_uri().'/blocks/events/events.js', ['jquery'], null, true);
			}
		]);
	}



	// ADD ACF FIELDS

	acf_add_local_field_group([
		'key' => 'group_events',
		'title' => 'Block: Events',
		'fields' => [[
			'key' => 'field_events_display',
			'label' => 'Display',
			'name' => 'display',
			'type' => 'accordion',
			'open' => 1,
			'multi_expand' => 1,
		], [
			'key' => 'field_events_manual',
			'label' => 'Manually Select Events',
			'name' => 'manual',
			'type' => 'true_false',
			'ui' => 1,
		], [
			'key' => 'field_events_posts',
			'label' => 'Posts',
			'name' => 'posts',
			'type' => 'post_object',
			'post_type' => ['event', 'training'],
			'allow_null' => 1,
			'multiple' => 1,
			'return_format' => 'id',
			'conditional_logic' => [[[
				'field' => 'field_events_manual',
				'operator' => '==',
				'value' => '1',
			]]],
		], [
			'key' => 'field_events_query',
			'label' => 'Query',
			'name' => 'query',
			'type' => 'group',
			'conditional_logic' => [[[
				'field' => 'field_events_manual',
				'operator' => '!=',
				'value' => '1',
			]]],
			'sub_fields' => [[
				'key' => 'field_events_manual_post_type',
				'label' => 'Post Type',
				'name' => 'post_type',
				'type' => 'select',
				'choices' => [
					'event' => 'Events',
					'training' => 'Training',
				],
				'allow_null' => 1,
				'wrapper' => ['width' => '20'],
				'wpml_cf_preferences' => 0,
			], [
				'key' => 'field_events_manual_event_type',
				'label' => 'Type',
				'name' => 'event_type',
				'type' => 'taxonomy',
				'taxonomy' => 'event_type',
				'field_type' => 'select',
				'allow_null' => 1,
				'add_term' => 0,
				'return_format' => 'object',
				'wrapper' => ['width' => '20'],
				'conditional_logic' => [[[
					'field' => 'field_events_manual_post_type',
					'operator' => '==',
					'value' => 'event',
				]]],
			], [
				'key' => 'field_events_manual_event_location',
				'label' => 'Location',
				'name' => 'location',
				'type' => 'taxonomy',
				'taxonomy' => 'event_location',
				'field_type' => 'select',
				'allow_null' => 1,
				'add_term' => 0,
				'return_format' => 'object',
				'wrapper' => ['width' => '20'],
				'conditional_logic' => [[[
					'field' => 'field_events_manual_post_type',
					'operator' => '==',
					'value' => 'event',
				]]],
			], [
				'key' => 'field_events_manual_training_type',
				'label' => 'Type',
				'name' => 'training_type',
				'type' => 'taxonomy',
				'taxonomy' => 'training_type',
				'field_type' => 'select',
				'allow_null' => 1,
				'add_term' => 0,
				'return_format' => 'object',
				'wrapper' => ['width' => '20'],
				'conditional_logic' => [[[
					'field' => 'field_events_manual_post_type',
					'operator' => '==',
					'value' => 'training',
				]]],
			], [
				'key' => 'field_events_manual_training_location',
				'label' => 'Location',
				'name' => 'training_type',
				'type' => 'taxonomy',
				'taxonomy' => 'training_type',
				'field_type' => 'select',
				'allow_null' => 1,
				'add_term' => 0,
				'return_format' => 'object',
				'wrapper' => ['width' => '20'],
				'conditional_logic' => [[[
					'field' => 'field_events_manual_post_type',
					'operator' => '==',
					'value' => 'training',
				]]],
			], [
				'key' => 'field_events_manual_search',
				'label' => 'Search',
				'name' => 'search',
				'type' => 'text',
			]],
			'wpml_cf_preferences' => 0,
		], [
			'key' => 'field_events_options',
			'label' => 'Options',
			'name' => 'options',
			'type' => 'accordion',
			'multi_expand' => 1,
		], [
			'key' => 'field_events_style',
			'label' => 'Style',
			'name' => 'style',
			'type' => 'select',
			'choices' => [
				'placeholder' => 'Placeholder',
			],
			'allow_null' => 1,
			'wpml_cf_preferences' => 0,
		], [
			'key' => 'field_events_primary',
			'name' => 'primary_events_block',
			'type' => 'true_false',
			'message' => 'Primary',
		], [
			'key' => 'field_events_alm',
			'name' => 'alm',
			'type' => 'true_false',
			'message' => 'Ajax Load More',
			'conditional_logic' => [[[
				'field' => 'field_events_primary',
				'operator' => '==',
				'value' => 1,
			]]],
		], [
			'key' => 'field_events_display_filter',
			'name' => 'display_filter',
			'type' => 'true_false',
			'message' => 'Display Filter',
			'conditional_logic' => [[[
				'field' => 'field_events_primary',
				'operator' => '==',
				'value' => 1,
			]]],
		], [
			'key' => 'field_events_num_posts',
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
				'field' => 'field_events_primary',
				'operator' => '!=',
				'value' => 1,
			]]],
			'wpml_cf_preferences' => 0,
		]],
		'location' => [[[
			'param' => 'block',
			'operator' => '==',
			'value' => 'acf/events',
		]]],
		'acfml_field_group_mode' => 'advanced',
	]);
});



// ONLY ALLOW ONE PRIMARY EVENTS BLOCK PER PAGE

add_filter('wp_insert_post_data', function($post) {
	$find = '\"primary_events_block\":\"1\"';
	$replace = '\"primary_events_block\":\"0\"';
	$content = $post['post_content'];

	$before = strstr($content, $find, true);
	if ($before) {
		$after = substr($content, strlen($before) + strlen($find));
		$after = str_replace($find, $replace, $after);
		$post['post_content'] = $before . $find . $after;
	}

	return $post;
});
