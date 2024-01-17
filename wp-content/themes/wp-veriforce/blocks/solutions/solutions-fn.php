<?php

add_action('acf/init', function() {

	// REGISTER BLOCK TYPE

	if (function_exists('acf_register_block_type')) {
		acf_register_block_type([
			'title' => 'Solutions',
			'name' => 'solutions',
			'supports' => ['align' => false],
			'render_template' => 'blocks/solutions/solutions.php',
			'enqueue_assets' => function() {
				wp_enqueue_style('block-solutions', get_template_directory_uri().'/blocks/solutions/solutions.css', null, null);
			}
		]);
	}



	// ADD ACF FIELDS

	acf_add_local_field_group([
		'key' => 'group_solutions',
		'title' => 'Block: Solutions',
		'fields' => [[
			'key' => 'field_solutions_display',
			'label' => 'Display',
			'name' => 'display',
			'type' => 'accordion',
			'open' => 1,
			'multi_expand' => 1,
		], [
			'key' => 'field_solutions_solutions',
			'label' => 'Solutions',
			'name' => 'solutions',
			'type' => 'repeater',
			'min' => 1,
			'button_label' => 'Add Solution',
			'sub_fields' => [[
				'key' => 'field_solutions_solutions_image',
				'label' => 'Image',
				'name' => 'image',
				'type' => 'image',
				'return_format' => 'id',
				'wrapper' => ['width' => '40'],
			], [
				'key' => 'field_solutions_solutions_link',
				'label' => 'Link',
				'name' => 'link',
				'type' => 'link',
				'wrapper' => ['width' => '60'],
			]],
		], [
			'key' => 'field_solutions_options',
			'label' => 'Options',
			'name' => 'options',
			'type' => 'accordion',
			'multi_expand' => 1,
			'ui' => 1,
		]],
		'location' => [[[
			'param' => 'block',
			'operator' => '==',
			'value' => 'acf/solutions',
		]]],
		'acfml_field_group_mode' => 'advanced',
	]);
});
