<?php

add_action('acf/init', function() {

	// REGISTER BLOCK TYPE

	if (function_exists('acf_register_block_type')) {
		acf_register_block_type([
			'title' => 'Stats',
			'name' => 'stats',
			'supports' => ['align' => false],
			'render_template' => 'blocks/stats/stats.php',
			'enqueue_assets' => function() {
				wp_enqueue_style('block-stats', get_template_directory_uri().'/blocks/stats/stats.css', null, null);
			}
		]);
	}



	// ADD ACF FIELDS

	acf_add_local_field_group([
		'key' => 'group_stats',
		'title' => 'Block: Stats',
		'fields' => [[
			'key' => 'field_stats_display',
			'label' => 'Display',
			'name' => 'display',
			'type' => 'accordion',
			'open' => 1,
			'multi_expand' => 1,
		], [
			'key' => 'field_stats_stats_heading',
			'label' => 'Heading',
			'name' => 'heading',
			'type' => 'wysiwyg',
			'wrapper' => ['class' => 'td-short'],
		], [
			'key' => 'field_stats_stats',
			'label' => 'Stats',
			'name' => 'stats',
			'type' => 'repeater',
			'min' => 1,
			'button_label' => 'Add Column',
			'sub_fields' => [[
				'key' => 'field_stats_stats_stat',
				'label' => 'Stat',
				'name' => 'stat',
				'type' => 'wysiwyg',
				'wrapper' => ['class' => 'td-short'],
			]],
		], [
			'key' => 'field_stats_stats_button',
			'label' => 'Button',
			'name' => 'button',
			'type' => 'link',
		], [
			'key' => 'field_stats_options',
			'label' => 'Options',
			'name' => 'options',
			'type' => 'accordion',
			'multi_expand' => 1,
		], [
			'key' => 'field_stats_num_cols',
			'label' => 'Number of Columns',
			'name' => 'num_cols',
			'type' => 'select',
			'choices' => [
				2 => '2',
				3 => '3',
			],
			'allow_null' => 1,
			'default_value' => 3,
			'wpml_cf_preferences' => 0,
		]],
		'location' => [[[
			'param' => 'block',
			'operator' => '==',
			'value' => 'acf/stats',
		]]],
		'acfml_field_group_mode' => 'advanced',
	]);
});
