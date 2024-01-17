<?php

add_action('acf/init', function() {

	// REGISTER BLOCK TYPE

	if (function_exists('acf_register_block_type')) {
		acf_register_block_type([
			'title' => 'Columns',
			'name' => 'columns',
			'supports' => ['align' => false],
			'render_template' => 'blocks/columns/columns.php',
			'enqueue_assets' => function() {
				wp_enqueue_style('block-columns', get_template_directory_uri().'/blocks/columns/columns.css', null, null);
			}
		]);
	}



	// ADD ACF FIELDS

	acf_add_local_field_group([
		'key' => 'group_columns',
		'title' => 'Block: Columns',
		'fields' => [[
			'key' => 'field_columns_display',
			'label' => 'Display',
			'name' => 'display',
			'type' => 'accordion',
			'open' => 1,
			'multi_expand' => 1,
		], [
			'key' => 'field_columns_columns',
			'label' => 'Columns',
			'name' => 'columns',
			'type' => 'repeater',
			'min' => 1,
			'button_label' => 'Add Column',
			'sub_fields' => [[
				'key' => 'field_columns_columns_content',
				'label' => 'Content',
				'name' => 'content',
				'type' => 'wysiwyg',
				'wrapper' => ['width' => '80', 'class' => 'td-short'],
			], [
				'key' => 'field_columns_columns_icon',
				'label' => 'Icon',
				'name' => 'icon',
				'type' => 'image',
				'return_format' => 'id',
				'wrapper' => ['width' => '20'],
			]],
		], [
			'key' => 'field_columns_options',
			'label' => 'Options',
			'name' => 'options',
			'type' => 'accordion',
			'multi_expand' => 1,
		], [
			'key' => 'field_columns_style',
			'label' => 'Style',
			'name' => 'style',
			'type' => 'select',
			'choices' => [
				'left-icon' => 'Left Icon',
				'left-border' => 'Left Border'
			],
			'allow_null' => 1,
			'wpml_cf_preferences' => 0,
		], [
			'key' => 'field_columns_num_cols',
			'label' => 'Number of Columns',
			'name' => 'num_cols',
			'type' => 'select',
			'choices' => [
				2 => '2',
				3 => '3',
				4 => '4',
				5 => '5',
				6 => '6',
			],
			'allow_null' => 1,
			'wpml_cf_preferences' => 0,
		], [
			'key' => 'field_columns_centered',
			'label' => 'Centered',
			'name' => 'centered',
			'type' => 'true_false',
			'ui' => 1,
		], [
			'key' => 'field_columns_post',
			'label' => 'Post',
			'name' => 'post',
			'type' => 'true_false',
			'ui' => 1,
		]],
		'location' => [[[
			'param' => 'block',
			'operator' => '==',
			'value' => 'acf/columns',
		]]],
		'acfml_field_group_mode' => 'advanced',
	]);
});
