<?php

add_action('acf/init', function(){

	// REGISTER BLOCK TYPE

	if(function_exists('acf_register_block_type')){
		acf_register_block_type([
			'title' => 'Case Study',
			'name' => 'casestudy',
			'supports' => ['align' => false],
			'render_template' => 'blocks/casestudy/casestudy.php',
			'enqueue_style' => get_template_directory_uri().'/blocks/casestudy/casestudy.css',
		]);
	}



	// ADD ACF FIELDS

	acf_add_local_field_group([
		'key' => 'group_casestudy',
		'title' => 'Block: Case Study',
		'fields' => [[
			'key' => 'field_casestudy_display',
			'label' => 'Display',
			'name' => 'display',
			'type' => 'accordion',
			'open' => 1,
			'multi_expand' => 1,
		], [
			'key' => 'field_casestudy_post',
			'label' => 'Case Study',
			'name' => 'post',
			'type' => 'post_object',
			'post_type' => ['resource'],
			'taxonomy' => ['resource_type:case-study'],
			'allow_null' => 1,
			'return_format' => 'id',
		], [
			'key' => 'field_casestudy_title',
			'label' => 'Alternative Title',
			'name' => 'title',
			'type' => 'text',
		], [
			'key' => 'field_casestudy_image',
			'label' => 'Alternative Image',
			'name' => 'image',
			'type' => 'image',
			'return_format' => 'id',
		], [
			'key' => 'field_casestudy_options',
			'label' => 'Options',
			'name' => 'options',
			'type' => 'accordion',
			'multi_expand' => 1,
		], [
			'key' => 'field_casestudy_style',
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
			'value' => 'acf/casestudy',
		]]],
		'acfml_field_group_mode' => 'advanced',
	]);
});


