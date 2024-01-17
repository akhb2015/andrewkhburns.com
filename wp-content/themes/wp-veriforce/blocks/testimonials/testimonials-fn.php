<?php

add_action('acf/init', function() {

	// REGISTER BLOCK TYPE

	if (function_exists('acf_register_block_type')) {
		acf_register_block_type([
			'title' => 'Testimonials',
			'name' => 'testimonials',
			'supports' => ['align' => false],
			'render_template' => 'blocks/testimonials/testimonials.php',
			'enqueue_assets' => function() {
				wp_enqueue_style('block-testimonials', get_template_directory_uri().'/blocks/testimonials/testimonials.css', null, null);
			}
		]);
	}



	// ADD ACF FIELDS

	acf_add_local_field_group([
		'key' => 'group_testimonials',
		'title' => 'Block: Testimonials',
		'fields' => [[
			'key' => 'field_testimonials_display',
			'label' => 'Display',
			'name' => 'display',
			'type' => 'accordion',
			'open' => 1,
			'multi_expand' => 1,
		], [
			'key' => 'field_testimonials_testimonials',
			'label' => 'Testimonials',
			'name' => 'testimonials',
			'type' => 'repeater',
			'min' => 1,
			'button_label' => 'Add Testimonial',
			'layout' => 'block',
			'sub_fields' => [[
				'key' => 'field_testimonials_testimonials_image',
				'label' => 'Image',
				'name' => 'image',
				'type' => 'image',
				'return_format' => 'id',
				'wrapper' => ['width' => '40'],
			], [
				'key' => 'field_testimonials_testimonials_content',
				'label' => 'Content',
				'name' => 'content',
				'type' => 'textarea',
				'wrapper' => ['width' => '60'],
			], [
				'key' => 'field_testimonials_testimonials_name',
				'label' => 'Name',
				'name' => 'name',
				'type' => 'text',
				'wrapper' => ['width' => '33'],
			], [
				'key' => 'field_testimonials_testimonials_role',
				'label' => 'Role',
				'name' => 'role',
				'type' => 'text',
				'wrapper' => ['width' => '33'],
			], [
				'key' => 'field_testimonials_testimonials_company',
				'label' => 'Company',
				'name' => 'company',
				'type' => 'text',
				'wrapper' => ['width' => '33'],
			]],
		], [
			'key' => 'field_testimonials_options',
			'label' => 'Options',
			'name' => 'options',
			'type' => 'accordion',
			'multi_expand' => 1,
		], [
			'key' => 'field_testimonials_style',
			'label' => 'Style',
			'name' => 'style',
			'type' => 'select',
			'choices' => [
				'carousel' => 'Carousel',
			],
			'allow_null' => 1,
			'wpml_cf_preferences' => 0,
		]],
		'location' => [[[
			'param' => 'block',
			'operator' => '==',
			'value' => 'acf/testimonials',
		]]],
		'acfml_field_group_mode' => 'advanced',
	]);
});
