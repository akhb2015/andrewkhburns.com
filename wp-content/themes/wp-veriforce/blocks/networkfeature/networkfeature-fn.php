<?php

add_action('acf/init', function() {

	// REGISTER BLOCK TYPE

	if (function_exists('acf_register_block_type')) {
		acf_register_block_type([
			'title' => 'Network Feature',
			'name' => 'networkfeature',
			'supports' => ['align' => false],
			'render_template' => 'blocks/networkfeature/networkfeature.php',
			'enqueue_assets' => function() {
				wp_enqueue_style('block-networkfeature', get_template_directory_uri().'/blocks/networkfeature/networkfeature.css', null, null);
			}
		]);
	}



	// ADD ACF FIELDS

	acf_add_local_field_group([
		'key' => 'group_networkfeature',
		'title' => 'Block: Network Feature',
		'fields' => [[
			'key' => 'field_networkfeature_display',
			'label' => 'Display',
			'name' => 'display',
			'type' => 'accordion',
			'open' => 1,
			'multi_expand' => 1,
		], [
			'key' => 'field_networkfeature_content',
			'label' => 'Content',
			'name' => 'networkfeature_content_content',
			'type' => 'wysiwyg',
			'wrapper' => ['width' => '80'],
		], [
			'key' => 'field_networkfeature_image',
			'label' => 'Image',
			'name' => 'image',
			'type' => 'image',
			'return_format' => 'id',
			'wrapper' => ['width' => '20'],
		], [
			'key' => 'field_networkfeature_options',
			'label' => 'Options',
			'name' => 'options',
			'type' => 'accordion',
			'multi_expand' => 1,
		], [
			'key' => 'field_networkfeature_reverse',
			'label' => 'Reverse Direction',
			'name' => 'reverse',
			'type' => 'true_false',
			'ui' => 1,
		]],
		'location' => [[[
			'param' => 'block',
			'operator' => '==',
			'value' => 'acf/networkfeature',
		]]],
		'acfml_field_group_mode' => 'advanced',
	]);
});
