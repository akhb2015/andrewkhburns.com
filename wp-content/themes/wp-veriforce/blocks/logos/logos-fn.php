<?php

add_action('acf/init', function() {

	// REGISTER BLOCK TYPE

	if (function_exists('acf_register_block_type')) {
		acf_register_block_type([
			'title' => 'Logos',
			'name' => 'logos',
			'supports' => ['align' => false],
			'render_template' => 'blocks/logos/logos.php',
			'enqueue_assets' => function() {
				wp_enqueue_style('block-logos', get_template_directory_uri().'/blocks/logos/logos.css', null, null);
				wp_enqueue_script('block-logos', get_template_directory_uri().'/blocks/logos/logos.js', ['jquery'], null, true);
			}
		]);
	}



	// ADD ACF FIELDS

	acf_add_local_field_group([
		'key' => 'group_logos',
		'title' => 'Block: Logos',
		'fields' => [[
			'key' => 'field_logos_display',
			'label' => 'Display',
			'name' => 'display',
			'type' => 'accordion',
			'open' => 1,
			'multi_expand' => 1,
		], [
			'key' => 'field_logos_logos',
			'label' => 'Logos',
			'name' => 'logos',
			'type' => 'gallery',
			'return_format' => 'id',
		], [
			'key' => 'field_logos_options',
			'label' => 'Options',
			'name' => 'options',
			'type' => 'accordion',
			'multi_expand' => 1,
		], [
			'key' => 'field_logos_style',
			'label' => 'Style',
			'name' => 'style',
			'type' => 'select',
			'choices' => [
				'carousel' => 'Carousel',
				'marquee' => 'Marquee',
			],
			'allow_null' => 1,
			'wpml_cf_preferences' => 0,
		], [
			'key' => 'field_section_secondrow',
			'name' => 'hassecondrow',
			'type' => 'true_false',
			'message' => 'Is Second Row',
		]],
		'location' => [[[
			'param' => 'block',
			'operator' => '==',
			'value' => 'acf/logos',
		]]],
		'acfml_field_group_mode' => 'advanced',
	]);
});
