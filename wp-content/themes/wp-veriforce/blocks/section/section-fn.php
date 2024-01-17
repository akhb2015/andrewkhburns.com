<?php

add_action('acf/init', function() {

	// REGISTER BLOCK TYPE

	if (function_exists('acf_register_block_type')) {
		acf_register_block_type([
			'title' => 'Section',
			'name' => 'section',
			'mode' => 'preview',
			'supports' => ['align' => false, 'mode' => false, 'jsx' => true],
			'render_template' => 'blocks/section/section.php',
		]);
	}



	// ADD ACF FIELDS

	acf_add_local_field_group([
		'key' => 'group_section',
		'title' => 'Block: Section',
		'fields' => [[
			'key' => 'field_section_style',
			'label' => 'Style',
			'name' => 'style',
			'type' => 'select',
			'choices' => [
				'framed' => 'Framed',
				'overlapped' => 'Overlapped',
			],
			'allow_null' => 1,
			'wpml_cf_preferences' => 0,
		], [
			'key' => 'field_section_bg_color',
			'label' => 'Background Color',
			'name' => 'bg_color',
			'type' => 'select',
			'choices' => [
				'light-blue' => 'Light Blue',
				'dark-blue' => 'Dark Blue',
				'testimonial-blue' => 'Testimonial Blue',
			],
			'allow_null' => 1,
			'wpml_cf_preferences' => 0,
		], [
			'key' => 'field_section_inner_bg_color',
			'label' => 'Inner Background Color',
			'name' => 'inner_bg_color',
			'type' => 'select',
			'choices' => [
				'light-blue' => 'Light Blue',
				'dark-blue' => 'Dark Blue',
			],
			'allow_null' => 1,
			'conditional_logic' => [[[
				'field' => 'field_section_style',
				'operator' => '==',
				'value' => 'framed',
			]]],
			'wpml_cf_preferences' => 0,
		], [
			'key' => 'field_section_bg_left_deco',
			'label' => 'Left Background Deco',
			'name' => 'bg_left_deco',
			'type' => 'select',
			'choices' => [
				'top' => 'Top',
				'center' => 'Center',
				'bottom' => 'Bottom',
			],
			'allow_null' => 1,
			'wpml_cf_preferences' => 0,
		], [
			'key' => 'field_section_bg_right_deco',
			'label' => 'Right Background Deco',
			'name' => 'bg_right_deco',
			'type' => 'select',
			'choices' => [
				'top' => 'Top',
				'center' => 'Center',
				'bottom' => 'Bottom',
			],
			'allow_null' => 1,
			'wpml_cf_preferences' => 0,
		], [
			'key' => 'field_section_notoppadding',
			'name' => 'notoppadding',
			'type' => 'true_false',
			'message' => 'No Top Padding',
		], [
			'key' => 'field_section_nobottompadding',
			'name' => 'nobottompadding',
			'type' => 'true_false',
			'message' => 'No Bottom Padding',
		], [
			'key' => 'field_section_alternateid',
			'label' => 'Alternate ID',
			'name' => 'alternateid',
			'type' => 'text',
		]],
		'location' => [[[
			'param' => 'block',
			'operator' => '==',
			'value' => 'acf/section',
		]]],
		'acfml_field_group_mode' => 'advanced',
	]);
});
