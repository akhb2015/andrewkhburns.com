<?php

add_action('acf/init', function() {

	// REGISTER BLOCK TYPE

	if (function_exists('acf_register_block_type')) {
		acf_register_block_type([
			'title' => 'Profiles',
			'name' => 'profiles',
			'supports' => ['align' => false],
			'render_template' => 'blocks/profiles/profiles.php',
			'enqueue_assets' => function() {
				wp_enqueue_style('block-profiles', get_template_directory_uri().'/blocks/profiles/profiles.css', null, null);
			}
		]);
	}



	// ADD ACF FIELDS

	acf_add_local_field_group([
		'key' => 'group_profiles',
		'title' => 'Block: Profiles',
		'fields' => [[
			'key' => 'field_profiles_display',
			'label' => 'Display',
			'name' => 'display',
			'type' => 'accordion',
			'open' => 1,
			'multi_expand' => 1,
		], [
			'key' => 'field_profiles_profiles',
			'label' => 'Profiles',
			'name' => 'profiles',
			'type' => 'repeater',
			'layout' => 'row',
			'min' => 1,
			'button_label' => 'Add Profile',
			'sub_fields' => [[
				'key' => 'field_profiles_profiles_image',
				'label' => 'Image',
				'name' => 'image',
				'type' => 'image',
				'return_format' => 'id',
			], [
				'key' => 'field_profiles_profiles_name',
				'label' => 'Name',
				'name' => 'name',
				'type' => 'text',
			], [
				'key' => 'field_profiles_profiles_education',
				'label' => 'Education',
				'name' => 'education',
				'type' => 'text',
			], [
				'key' => 'field_profiles_profiles_role',
				'label' => 'Role',
				'name' => 'role',
				'type' => 'text',
			], [
				'key' => 'field_profiles_profiles_biography',
				'label' => 'Biography',
				'name' => 'biography',
				'type' => 'wysiwyg',
			], [
				'key' => 'field_profiles_profiles_linkedin',
				'label' => 'Linkedin',
				'name' => 'linkedin',
				'type' => 'url',
			]],
		], [
			'key' => 'field_profiles_options',
			'label' => 'Options',
			'name' => 'options',
			'type' => 'accordion',
			'multi_expand' => 1,
		], [
			'key' => 'field_profiles_style',
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
			'value' => 'acf/profiles',
		]]],
		'acfml_field_group_mode' => 'advanced',
	]);
});
