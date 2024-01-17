<?php

add_action('acf/init', function() {

	// REGISTER BLOCK TYPE

	if (function_exists('acf_register_block_type')) {
		acf_register_block_type([
			'title' => 'Gallery',
			'name' => 'gallery',
			'supports' => ['align' => false],
			'render_template' => 'blocks/gallery/gallery.php',
			'enqueue_assets' => function() {
				wp_enqueue_style('block-gallery', get_template_directory_uri().'/blocks/gallery/gallery.css', null, null);
			}
		]);
	}



	// ADD ACF FIELDS

	acf_add_local_field_group([
		'key' => 'group_gallery',
		'title' => 'Block: Gallery',
		'fields' => [[
			'key' => 'field_gallery_display',
			'label' => 'Display',
			'name' => 'display',
			'type' => 'accordion',
			'open' => 1,
			'multi_expand' => 1,
		], [
			'key' => 'field_gallery_images',
			'label' => 'Images',
			'name' => 'images',
			'type' => 'gallery',
			'return_format' => 'id',
		], [
			'key' => 'field_gallery_options',
			'label' => 'Options',
			'name' => 'options',
			'type' => 'accordion',
			'multi_expand' => 1,
		], [
			'key' => 'field_gallery_style',
			'label' => 'Style',
			'name' => 'style',
			'type' => 'select',
			'choices' => [
				'carousel' => 'Carousel',
			],
			'allow_null' => 1,
			'wpml_cf_preferences' => 0,
		], [
			'key' => 'field_gallery_num_cols',
			'label' => 'Number of Columns',
			'name' => 'num_cols',
			'type' => 'select',
			'choices' => [
				2 => '2',
				3 => '3',
				4 => '4',
			],
			'allow_null' => 1,
			'wpml_cf_preferences' => 0,
		]],
		'location' => [[[
			'param' => 'block',
			'operator' => '==',
			'value' => 'acf/gallery',
		]]],
		'acfml_field_group_mode' => 'advanced',
	]);
});
