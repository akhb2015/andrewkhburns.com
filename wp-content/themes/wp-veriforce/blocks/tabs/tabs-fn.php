<?php

add_action('acf/init', function() {

	// REGISTER BLOCK TYPE

	if (function_exists('acf_register_block_type')) {
		acf_register_block_type([
			'title' => 'Tabs',
			'name' => 'tabs',
			'supports' => ['align' => false],
			'render_template' => 'blocks/tabs/tabs.php',
			'enqueue_assets' => function() {
				wp_enqueue_style('block-tabs', get_template_directory_uri().'/blocks/tabs/tabs.css', null, null);
				wp_enqueue_script('block-tabs', get_template_directory_uri().'/blocks/tabs/tabs.js', ['jquery'], null, true);
			}
		]);
	}



	// ADD ACF FIELDS

	acf_add_local_field_group([
		'key' => 'group_tabs',
		'title' => 'Block: Tabs',
		'fields' => [[
			'key' => 'field_tabs_display',
			'label' => 'Display',
			'name' => 'display',
			'type' => 'accordion',
			'open' => 1,
			'multi_expand' => 1,
		], [
			'key' => 'field_tabs_tabs',
			'label' => 'Tabs',
			'name' => 'tabs',
			'type' => 'repeater',
			'layout' => 'block',
			'min' => 1,
			'button_label' => 'Add Tab',
			'sub_fields' => [[
				'key' => 'field_tabs_tabs_heading',
				'label' => 'Nav Heading',
				'name' => 'heading',
				'type' => 'text',
				'wrapper' => ['width' => '100'],
			], [
				'key' => 'field_tabs_tabs_content',
				'label' => 'Content',
				'name' => 'content',
				'type' => 'wysiwyg',
				'wrapper' => ['width' => '80', 'class' => 'td-short'],
				'conditional_logic' => [[[
					'field' => 'field_tabs_style',
					'operator' => '!=',
					'value' => 'style2',
				]]],
			], [
				'key' => 'field_tabs_tabs_image',
				'label' => 'Image',
				'name' => 'image',
				'type' => 'image',
				'return_format' => 'id',
				'wrapper' => ['width' => '20'],
				'conditional_logic' => [[[
					'field' => 'field_tabs_style',
					'operator' => '!=',
					'value' => 'style2',
				]]],
			], [
				'key' => 'field_tabs_tabs_callouts',
				'label' => 'Callouts',
				'name' => 'callouts',
				'type' => 'repeater',
				'layout' => 'block',
				'min' => 1,
				'button_label' => 'Add Callout',
				'sub_fields' => [[
					'key' => 'field_tabs_tabs_callouts_icon',
					'label' => 'Icon',
					'name' => 'icon',
					'type' => 'image',
					'return_format' => 'id',
					'wrapper' => ['width' => '20'],
				], [
					'key' => 'field_tabs_tabs_callouts_content',
					'label' => 'Content',
					'name' => 'content',
					'type' => 'wysiwyg',
					'wrapper' => ['width' => '80', 'class' => 'td-short'],
				]],
				'conditional_logic' => [[[
					'field' => 'field_tabs_style',
					'operator' => '==',
					'value' => 'style2',
				]]],
			]],
		], [
			'key' => 'field_tabs_options',
			'label' => 'Options',
			'name' => 'options',
			'type' => 'accordion',
			'multi_expand' => 1,
		], [
			'key' => 'field_tabs_style',
			'label' => 'Style',
			'name' => 'style',
			'type' => 'select',
			'choices' => [
				'style2' => 'Style2',
			],
			'allow_null' => 1,
			'wpml_cf_preferences' => 0,
		]],
		'location' => [[[
			'param' => 'block',
			'operator' => '==',
			'value' => 'acf/tabs',
		]]],
		'acfml_field_group_mode' => 'advanced',
	]);
});
