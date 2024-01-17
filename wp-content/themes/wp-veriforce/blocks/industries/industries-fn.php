<?php

add_action('acf/init', function() {

	// REGISTER BLOCK TYPE

	if (function_exists('acf_register_block_type')) {
		acf_register_block_type([
			'title' => 'Industries',
			'name' => 'industries',
			'supports' => ['align' => false],
			'render_template' => 'blocks/industries/industries.php',
			'enqueue_assets' => function() {
				wp_enqueue_style('block-industries', get_template_directory_uri().'/blocks/industries/industries.css', null, null);
			}
		]);
	}



	// ADD ACF FIELDS

	acf_add_local_field_group([
		'key' => 'group_industries',
		'title' => 'Block: Industries',
		'fields' => [[
			'key' => 'field_industries_display',
			'label' => 'Display',
			'name' => 'display',
			'type' => 'accordion',
			'open' => 1,
			'multi_expand' => 1,
		], [
			'key' => 'field_industries_industries',
			'label' => 'Industries',
			'name' => 'industries',
			'type' => 'repeater',
			'min' => 1,
			'button_label' => 'Add Industry',
			'sub_fields' => [[
				'key' => 'field_industries_industries_content',
				'label' => 'Content',
				'name' => 'content',
				'type' => 'wysiwyg',
				'wrapper' => ['width' => '60', 'class' => 'td-short'],
			], [
				'key' => 'field_industries_industries_icon',
				'label' => 'Icon',
				'name' => 'icon',
				'type' => 'image',
				'return_format' => 'id',
				'wrapper' => ['width' => '20'],
			], [
				'key' => 'field_industries_industries_link',
				'label' => 'Link',
				'name' => 'link',
				'type' => 'link',
				'wrapper' => ['width' => '20'],
			]],
		], [
			'key' => 'field_industries_options',
			'label' => 'Options',
			'name' => 'options',
			'type' => 'accordion',
			'multi_expand' => 1,
			'ui' => 1,
		]],
		'location' => [[[
			'param' => 'block',
			'operator' => '==',
			'value' => 'acf/industries',
		]]],
		'acfml_field_group_mode' => 'advanced',
	]);
});
