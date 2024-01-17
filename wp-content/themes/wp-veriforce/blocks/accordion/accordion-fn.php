<?php

add_action('acf/init', function() {

	// REGISTER BLOCK TYPE

	if (function_exists('acf_register_block_type')) {
		acf_register_block_type([
			'title' => 'Accordion',
			'name' => 'accordion',
			'supports' => ['align' => false],
			'render_template' => 'blocks/accordion/accordion.php',
			'enqueue_assets' => function() {
				wp_enqueue_style('block-accordion', get_template_directory_uri().'/blocks/accordion/accordion.css', null, null);
				wp_enqueue_script('block-accordion', get_template_directory_uri().'/blocks/accordion/accordion.js', ['jquery'], null, true);
			}
		]);
	}



	// ADD ACF FIELDS

	acf_add_local_field_group([
		'key' => 'group_accordion',
		'title' => 'Block: Accordion',
		'fields' => [[
			'key' => 'field_accordion_display',
			'label' => 'Display',
			'name' => 'display',
			'type' => 'accordion',
			'open' => 1,
			'multi_expand' => 1,
		], [
			'key' => 'field_accordion_rows',
			'label' => 'Rows',
			'name' => 'rows',
			'type' => 'repeater',
			'layout' => 'row',
			'min' => 1,
			'button_label' => 'Add Row',
			'sub_fields' => [[
				'key' => 'field_accordion_rows_heading',
				'label' => 'Heading',
				'name' => 'heading',
				'type' => 'text',
			], [
				'key' => 'field_accordion_rows_content',
				'label' => 'Content',
				'name' => 'content',
				'type' => 'wysiwyg',
				'wrapper' => ['class' => 'td-short'],
			], [
				'key' => 'field_accordion_rows_image',
				'label' => 'Image',
				'name' => 'image',
				'type' => 'image',
				'return_format' => 'id',
				'conditional_logic' => [[[
					'field' => 'field_accordion_style',
					'operator' => '==',
					'value' => 'image',
				]]],
			]],
		], [
			'key' => 'field_accordion_options',
			'label' => 'Options',
			'name' => 'options',
			'type' => 'accordion',
			'multi_expand' => 1,
		], [
			'key' => 'field_accordion_style',
			'label' => 'Style',
			'name' => 'style',
			'type' => 'select',
			'choices' => [
				'image' => 'With Image',
			],
			'allow_null' => 1,
			'wpml_cf_preferences' => 0,
		], [
			'key' => 'field_accordion_singular',
			'label' => 'Only One Active Block',
			'name' => 'singular',
			'type' => 'true_false',
			'ui' => 1,
			'conditional_logic' => [[[
				'field' => 'field_accordion_style',
				'operator' => '!=',
				'value' => 'image',
			]]],
		]],
		'location' => [[[
			'param' => 'block',
			'operator' => '==',
			'value' => 'acf/accordion',
		]]],
		'acfml_field_group_mode' => 'advanced',
	]);
});
