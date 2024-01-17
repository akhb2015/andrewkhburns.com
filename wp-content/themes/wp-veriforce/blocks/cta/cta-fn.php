<?php

add_action('acf/init', function() {

	// REGISTER BLOCK TYPE

	if (function_exists('acf_register_block_type')) {
		acf_register_block_type([
			'title' => 'CTA',
			'name' => 'cta',
			'supports' => ['align' => false],
			'render_template' => 'blocks/cta/cta.php',
			'enqueue_assets' => function() {
				wp_enqueue_style('block-cta', get_template_directory_uri().'/blocks/cta/cta.css', null, null);
			}
		]);
	}



	// ADD ACF FIELDS

	acf_add_local_field_group([
		'key' => 'group_cta',
		'title' => 'Block: CTA',
		'fields' => [[
			'key' => 'field_cta_display',
			'label' => 'Display',
			'name' => 'display',
			'type' => 'accordion',
			'open' => 1,
			'multi_expand' => 1,
		], [
			'key' => 'field_cta_content',
			'label' => 'Content',
			'name' => 'content',
			'type' => 'wysiwyg',
			'wrapper' => ['width' => '80', 'class' => 'td-short'],
		], [
			'key' => 'field_cta_image',
			'label' => 'Image',
			'name' => 'image',
			'type' => 'image',
			'return_format' => 'id',
			'wrapper' => ['width' => '20'],
		], [
			'key' => 'field_cta_options',
			'label' => 'Options',
			'name' => 'options',
			'type' => 'accordion',
			'multi_expand' => 1,
		], [
			'key' => 'field_cta_style',
			'label' => 'Style',
			'name' => 'style',
			'type' => 'select',
			'choices' => [
				'placeholder' => 'Placeholder',
			],
			'allow_null' => 1,
			'wpml_cf_preferences' => 0,
		]],
		'location' => [[[
			'param' => 'block',
			'operator' => '==',
			'value' => 'acf/cta',
		]]],
		'acfml_field_group_mode' => 'advanced',
	]);
});
