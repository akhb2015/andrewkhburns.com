<?php

add_action('acf/init', function() {

	// REGISTER BLOCK TYPE

	if (function_exists('acf_register_block_type')) {
		acf_register_block_type([
			'title' => 'Home PFA',
			'name' => 'homepfa',
			'supports' => ['align' => false],
			'render_template' => 'blocks/homepfa/homepfa.php',
			'enqueue_assets' => function() {
				wp_enqueue_style('block-homepfa', get_template_directory_uri().'/blocks/homepfa/homepfa.css', null, null);
				wp_enqueue_script('block-homepfa', get_template_directory_uri().'/blocks/homepfa/homepfa.js', ['jquery'], null, true);
			}
		]);
	}



	// ADD ACF FIELDS

	acf_add_local_field_group([
		'key' => 'group_homepfa',
		'title' => 'Block: Home PFA',
		'fields' => [[
			'key' => 'field_homepfa_display',
			'label' => 'Display',
			'name' => 'display',
			'type' => 'accordion',
			'open' => 1,
			'multi_expand' => 1,
		], [
			'key' => 'field_homepfa_content',
			'label' => 'Content',
			'name' => 'content',
			'type' => 'wysiwyg',
			'wrapper' => ['class' => 'td-short'],
		], [
			'key' => 'field_homepfa_images',
			'label' => 'Images',
			'name' => 'images',
			'type' => 'gallery',
			'return_format' => 'id',
		]],
		'location' => [[[
			'param' => 'block',
			'operator' => '==',
			'value' => 'acf/homepfa',
		]]],
		'acfml_field_group_mode' => 'advanced',
	]);
});
