<?php

add_action('acf/init', function() {

	// REGISTER BLOCK TYPE

	if (function_exists('acf_register_block_type')) {
		acf_register_block_type([
			'title' => 'Content',
			'name' => 'content',
			'supports' => ['align' => false],
			'render_template' => 'blocks/content/content.php',
			'enqueue_assets' => function() {
				wp_enqueue_style('block-content', get_template_directory_uri().'/blocks/content/content.css', null, null);
			}
		]);
	}



	// ADD ACF FIELDS

	acf_add_local_field_group([
		'key' => 'group_content',
		'title' => 'Block: Content',
		'fields' => [[
			'key' => 'field_content_display',
			'label' => 'Display',
			'name' => 'display',
			'type' => 'accordion',
			'open' => 1,
			'multi_expand' => 1,
		], [
			'key' => 'field_content_content',
			'label' => 'Content',
			'name' => 'content',
			'type' => 'wysiwyg',
		], [
			'key' => 'field_content_options',
			'label' => 'Options',
			'name' => 'options',
			'type' => 'accordion',
			'multi_expand' => 1,
		], [
			'key' => 'field_content_style',
			'label' => 'Style',
			'name' => 'style',
			'type' => 'select',
			'choices' => [
				'heading' => 'Heading',
			],
			'allow_null' => 1,
			'wpml_cf_preferences' => 0,
		], [
			'key' => 'field_content_width',
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
		], [
			'key' => 'field_content_centered',
			'name' => 'centered',
			'type' => 'true_false',
			'message' => 'Centered',
		]],
		'location' => [[[
			'param' => 'block',
			'operator' => '==',
			'value' => 'acf/content',
		]]],
		'acfml_field_group_mode' => 'advanced',
	]);
});
