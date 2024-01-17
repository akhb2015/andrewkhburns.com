<?php

add_action('acf/init', function() {

	// REGISTER BLOCK TYPE

	if (function_exists('acf_register_block_type')) {
		acf_register_block_type([
			'title' => 'PFA',
			'name' => 'pfa',
			'supports' => ['align' => false],
			'render_template' => 'blocks/pfa/pfa.php',
			'enqueue_assets' => function() {
				wp_enqueue_style('block-pfa', get_template_directory_uri().'/blocks/pfa/pfa.css', null, null);
			}
		]);
	}



	// ADD ACF FIELDS

	acf_add_local_field_group([
		'key' => 'group_pfa',
		'title' => 'Block: PFA',
		'fields' => [[
			'key' => 'field_pfa_display',
			'label' => 'Display',
			'name' => 'display',
			'type' => 'accordion',
			'open' => 1,
			'multi_expand' => 1,
		], [
			'key' => 'field_pfa_content',
			'label' => 'Content',
			'name' => 'content',
			'type' => 'wysiwyg',
			'wrapper' => ['width' => '80', 'class' => 'td-short'],
		], [
			'key' => 'field_pfa_image',
			'label' => 'Image',
			'name' => 'image',
			'type' => 'image',
			'return_format' => 'id',
			'wrapper' => ['width' => '20'],
		]],
		'location' => [[[
			'param' => 'block',
			'operator' => '==',
			'value' => 'acf/pfa',
		]]],
		'acfml_field_group_mode' => 'advanced',
	]);
});
