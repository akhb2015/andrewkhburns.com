<?php

add_action('acf/init', function() {

	// REGISTER BLOCK TYPE

	if (function_exists('acf_register_block_type')) {
		acf_register_block_type([
			'title' => 'Media',
			'name' => 'media',
			'supports' => ['align' => false],
			'render_template' => 'blocks/media/media.php',
			'enqueue_assets' => function() {
				wp_enqueue_style('block-media', get_template_directory_uri().'/blocks/media/media.css', null, null);
			}
		]);
	}



	// ADD ACF FIELDS

	acf_add_local_field_group([
		'key' => 'group_media',
		'title' => 'Block: Media',
		'fields' => [[
			'key' => 'field_media_display',
			'label' => 'Display',
			'name' => 'display',
			'type' => 'accordion',
			'open' => 1,
			'multi_expand' => 1,
		], [
			'key' => 'field_media_type',
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
			'key' => 'field_media_image',
			'label' => 'Image',
			'name' => 'image',
			'type' => 'image',
			'return_format' => 'array',
			'conditional_logic' => [[[
				'field' => 'field_media_type',
				'operator' => '==',
				'value' => 'image',
			]]],
		], [
			'key' => 'field_media_oembed',
			'label' => 'oEmbed',
			'name' => 'oembed',
			'type' => 'group',
			'conditional_logic' => [[[
				'field' => 'field_media_type',
				'operator' => '==',
				'value' => 'oembed',
			]]],
			'sub_fields' => [[
				'key' => 'field_media_oembed_url',
				'label' => 'URL',
				'name' => 'url',
				'type' => 'oembed',
				'wrapper' => ['width' => '40'],
			], [
				'key' => 'field_media_oembed_image',
				'label' => 'Image',
				'name' => 'image',
				'type' => 'image',
				'return_format' => 'id',
				'wrapper' => ['width' => '20'],
			], [
				'key' => 'field_media_oembed_ratio',
				'label' => 'Aspect Ratio',
				'name' => 'ratio',
				'type' => 'text',
				'placeholder' => '16/9',
				'wrapper' => ['width' => '20'],
			], [
				'key' => 'field_media_oembed_inline',
				'label' => 'Play Inline',
				'name' => 'inline',
				'type' => 'true_false',
				'ui' => 1,
				'wrapper' => ['width' => '20'],
			]],
		], [
			'key' => 'field_media_options',
			'label' => 'Options',
			'name' => 'options',
			'type' => 'accordion',
			'multi_expand' => 1,
		], [
			'key' => 'field_media_style',
			'label' => 'Style',
			'name' => 'style',
			'type' => 'select',
			'choices' => [
				'placeholder' => 'Placeholder',
			],
			'allow_null' => 1,
			'wpml_cf_preferences' => 0,
		], [
			'key' => 'field_media_width',
			'label' => 'Width',
			'name' => 'width',
			'type' => 'select',
			'choices' => [
				'12' => '12 Columns (Full Width)',
				'10' => '10 Columns',
				'8' => '8 Columns',
				'6' => '6 Columns',
			],
			'default_value' => '10',
			'wpml_cf_preferences' => 0,
		]],
		'location' => [[[
			'param' => 'block',
			'operator' => '==',
			'value' => 'acf/media',
		]]],
		'acfml_field_group_mode' => 'advanced',
	]);
});
