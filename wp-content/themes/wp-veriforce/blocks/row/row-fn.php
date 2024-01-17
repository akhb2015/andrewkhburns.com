<?php

add_action('acf/init', function() {

	// REGISTER BLOCK TYPE

	if (function_exists('acf_register_block_type')) {
		acf_register_block_type([
			'title' => 'Row',
			'name' => 'row',
			'supports' => ['align' => false],
			'render_template' => 'blocks/row/row.php',
			'enqueue_assets' => function() {
				wp_enqueue_style('block-row', get_template_directory_uri().'/blocks/row/row.css', null, null);
			}
		]);
	}



	// ADD ACF FIELDS

	acf_add_local_field_group([
		'key' => 'group_row',
		'title' => 'Block: Row',
		'fields' => [[
			'key' => 'field_row_display',
			'label' => 'Display',
			'name' => 'display',
			'type' => 'accordion',
			'open' => 1,
			'multi_expand' => 1,
		], [
			'key' => 'field_row_content',
			'label' => 'Content',
			'name' => 'content',
			'type' => 'wysiwyg',
			'wrapper' => ['width' => '80', 'class' => 'td-short'],
		], [
			'key' => 'field_row_image',
			'label' => 'Image',
			'name' => 'image',
			'type' => 'image',
			'return_format' => 'id',
			'wrapper' => ['width' => '20'],
		], [
			'key' => 'field_row_callouts',
			'label' => 'Callouts',
			'name' => 'callouts',
			'type' => 'repeater',
			'min' => 1,
			'button_label' => 'Add Callout',
			'sub_fields' => [[
				'key' => 'field_row_callouts_icon',
				'label' => 'Icon',
				'name' => 'icon',
				'type' => 'image',
				'return_format' => 'id',
				'wrapper' => ['width' => '20'],
			], [
				'key' => 'field_row_callouts_content',
				'label' => 'Content',
				'name' => 'content',
				'type' => 'wysiwyg',
				'wrapper' => ['width' => '80', 'class' => 'td-short'],
			]],
			'conditional_logic' => [[[
				'field' => 'field_row_style',
				'operator' => '==',
				'value' => 'callouts',
			]]],
		], [
			'key' => 'field_row_oembed',
			'label' => 'oEmbed',
			'name' => 'oembed',
			'type' => 'oembed',
			'conditional_logic' => [[[
				'field' => 'field_row_media_type',
				'operator' => '==',
				'value' => 'oembed',
			]]],
		], [
			'key' => 'field_row_options',
			'label' => 'Options',
			'name' => 'options',
			'type' => 'accordion',
			'multi_expand' => 1,
		], [
			'key' => 'field_row_style',
			'label' => 'Style',
			'name' => 'style',
			'type' => 'select',
			'choices' => [
				'callouts' => 'Callouts',
			],
			'allow_null' => 1,
			'wpml_cf_preferences' => 0,
		], [
			'key' => 'field_row_left_icons',
			'label' => 'Left Icons?',
			'name' => 'left_icons',
			'type' => 'true_false',
			'ui' => 1,
			'conditional_logic' => [[[
				'field' => 'field_row_style',
				'operator' => '==',
				'value' => 'callouts',
			]]],
		], [
			'key' => 'field_row_media_type',
			'label' => 'Media Type',
			'name' => 'media_type',
			'type' => 'select',
			'choices' => [
				'image' => 'Image',
				'oembed' => 'oEmbed',
			],
			'default_value' => 'image',
			'wpml_cf_preferences' => 0,
		], [
			'key' => 'field_row_width',
			'label' => 'Media Width',
			'name' => 'media_width',
			'type' => 'select',
			'choices' => [
				'4' => '4 Columns (1/3)',
				'5' => '5 Columns',
				'6' => '6 Columns (1/2)',
				'7' => '7 Columns',
				'8' => '8 Columns (2/3)',
			],
			'default_value' => '6',
			'wpml_cf_preferences' => 0,
		], [
			'key' => 'field_row_reverse',
			'label' => 'Reverse Direction',
			'name' => 'reverse',
			'type' => 'true_false',
			'ui' => 1,
		]],
		'location' => [[[
			'param' => 'block',
			'operator' => '==',
			'value' => 'acf/row',
		]]],
		'acfml_field_group_mode' => 'advanced',
	]);
});
