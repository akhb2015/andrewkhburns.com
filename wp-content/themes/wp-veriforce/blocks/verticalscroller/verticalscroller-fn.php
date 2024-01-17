<?php

add_action('acf/init', function() {

	// REGISTER BLOCK TYPE

	if (function_exists('acf_register_block_type')) {
		acf_register_block_type([
			'title' => 'Vertical Scroller',
			'name' => 'verticalscroller',
			'supports' => ['align' => false],
			'render_template' => 'blocks/verticalscroller/verticalscroller.php',
			'enqueue_assets' => function() {
				wp_enqueue_style('block-verticalscroller', get_template_directory_uri().'/blocks/verticalscroller/verticalscroller.css', null, null);
				wp_enqueue_script('block-verticalscroller', get_template_directory_uri().'/blocks/verticalscroller/verticalscroller.js', ['jquery'], null, true);
			}
		]);
	}



	// ADD ACF FIELDS

	acf_add_local_field_group([
		'key' => 'group_verticalscroller',
		'title' => 'Block: Scroller',
		'fields' => [[
			'key' => 'field_verticalscroller_display',
			'label' => 'Display',
			'name' => 'display',
			'type' => 'accordion',
			'open' => 1,
			'multi_expand' => 1,
		], [
			'key' => 'field_verticalscroller_rows',
			'label' => 'Rows',
			'name' => 'rows',
			'type' => 'repeater',
			'min' => 1,
			'max' => 10,
			'button_label' => 'Add Row',
			'sub_fields' => [[
				'key' => 'field_verticalscroller_rows_content',
				'label' => 'Content',
				'name' => 'content',
				'type' => 'wysiwyg',
				'wrapper' => ['width' => '80'],
			], [
				'key' => 'field_verticalscroller_rows_image',
				'label' => 'Image',
				'name' => 'image',
				'type' => 'image',
				'return_format' => 'id',
				'wrapper' => ['width' => '20'],
			]],
		], [
			'key' => 'field_verticalscroller_options',
			'label' => 'Options',
			'name' => 'options',
			'type' => 'accordion',
			'multi_expand' => 1,
		], [
			'key' => 'field_verticalscroller_style',
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
			'value' => 'acf/verticalscroller',
		]]],
		'acfml_field_group_mode' => 'advanced',
	]);
});
