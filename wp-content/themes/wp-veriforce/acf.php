<?php

add_action('acf/init', function() {

	// SET BLOCK TEMPLATES

	if (function_exists('acf_register_block_type')) {
		$post = get_post_type_object('post');
		$post->template = [[
			'acf/section', [], [
				['acf/post', ['data' => [
					'content' => 'Add post content.',
				]]],
			]
		]];

		$page = get_post_type_object('page');
		$page->template = [['acf/section']];
	}



	// ADD MENU FIELDS

	acf_add_local_field_group([
		'key' => 'group_menu_item',
		'title' => 'Menu Item Options',
		'fields' => [[
			'key' => 'field_menu_item_image',
			'label' => 'Image',
			'name' => 'image',
			'type' => 'image',
			'return_format' => 'id'
		]],
		'location' => [[[
			'param' => 'nav_menu_item',
			'operator' => '==',
			'value' => 'location/primary',
		]]],
	]);



	// ADD POST FIELDS

	acf_add_local_field_group([
		'key' => 'group_default_post',
		'title' => 'Default Post Options',
		'fields' => [[
			'key' => 'field_default_post_url',
			'label' => 'Redirect to URL',
			'name' => 'url',
			'type' => 'url',
		], [
			'key' => 'field_default_post_hide_defaut_blocks',
			'message' => 'Hide Default Post Blocks',
			'name' => 'hide_default_blocks',
			'type' => 'true_false',
			'ui' => 1,
			'wrapper' => ['width' => '50'],
		], [
			'key' => 'field_default_post_hide_featured_image',
			'message' => 'Hide Featured Image',
			'name' => 'hide_featured_image',
			'type' => 'true_false',
			'ui' => 1,
			'wrapper' => ['width' => '50'],
		]],
		'location' => [[[
			'param' => 'post_type',
			'operator' => '==',
			'value' => 'post',
		]]],
	]);



	// ADD RESOURCE FIELDS

	acf_add_local_field_group([
		'key' => 'group_resource_post',
		'title' => 'Resource Post Options',
		'fields' => [[
			'key' => 'field_resource_post_url',
			'label' => 'Redirect to URL',
			'name' => 'url',
			'type' => 'url',
		], [
			'key' => 'field_resource_post_hide_defaut_blocks',
			'message' => 'Hide Default Resource Blocks',
			'name' => 'hide_default_blocks',
			'type' => 'true_false',
			'ui' => 1,
			'wrapper' => ['width' => '50'],
		], [
			'key' => 'field_resource_post_hide_featured_image',
			'message' => 'Hide Featured Image',
			'name' => 'hide_featured_image',
			'type' => 'true_false',
			'ui' => 1,
			'wrapper' => ['width' => '50'],
		]],
		'location' => [[[
			'param' => 'post_type',
			'operator' => '==',
			'value' => 'resource',
		]]],
	]);



	// ADD EVENT FIELDS

	acf_add_local_field_group([
		'key' => 'group_event_post',
		'title' => 'Event Post Options',
		'fields' => [[
			'key' => 'field_event_post_start_date',
			'label' => 'Start Date',
			'name' => 'start_date',
			'type' => 'date_time_picker',
			'required' => 1,
			'wrapper' => ['width' => '20'],
		], [
			'key' => 'field_event_post_end_date',
			'label' => 'End Date',
			'name' => 'end_date',
			'type' => 'date_time_picker',
			'wrapper' => ['width' => '20'],
		], [
			'key' => 'field_event_post_registration_deadline',
			'label' => 'Registration Deadline',
			'name' => 'registration_deadline',
			'type' => 'date_time_picker',
			'wrapper' => ['width' => '20'],
		], [
			'key' => 'field_event_post_timezone',
			'label' => 'Timezone',
			'name' => 'timezone',
			'type' => 'text',
			'wrapper' => ['width' => '20'],
		], [
			'key' => 'field_event_post_persist',
			'label' => 'Do not auto delete',
			'name' => 'persist',
			'type' => 'true_false',
			'wrapper' => ['width' => '20'],
		]],
		'location' => [[[
			'param' => 'post_type',
			'operator' => '==',
			'value' => 'event',
		]]],
	]);



	// ADD TRAINING FIELDS

	acf_add_local_field_group([
		'key' => 'group_training_post',
		'title' => 'Training Post Options',
		'fields' => [[
			'key' => 'field_training_post_start_date',
			'label' => 'Start Date',
			'name' => 'start_date',
			'type' => 'date_time_picker',
			'required' => 1,
			'wrapper' => ['width' => '20'],
		], [
			'key' => 'field_training_post_end_date',
			'label' => 'End Date',
			'name' => 'end_date',
			'type' => 'date_time_picker',
			'wrapper' => ['width' => '20'],
		], [
			'key' => 'field_training_post_registration_deadline',
			'label' => 'Registration Deadline',
			'name' => 'registration_deadline',
			'type' => 'date_time_picker',
			'wrapper' => ['width' => '20'],
		], [
			'key' => 'field_training_post_timezone',
			'label' => 'Timezone',
			'name' => 'timezone',
			'type' => 'text',
			'wrapper' => ['width' => '20'],
		], [
			'key' => 'field_event_post_persist',
			'label' => 'Do not auto delete',
			'name' => 'persist',
			'type' => 'true_false',
			'wrapper' => ['width' => '20'],
		]],
		'location' => [[[
			'param' => 'post_type',
			'operator' => '==',
			'value' => 'training',
		]]],
	]);



	// ADD THEME OPTIONS PAGE

	if (function_exists('acf_add_options_page')) {
		acf_add_options_page([
			'page_title' => 'Theme Options',
			'redirect' => false,
		]);
	}



	// ADD THEME OPTIONS FIELDS

	acf_add_local_field_group([
		'key' => 'group_theme',
		'title' => 'Options',
		'fields' => [[
			'key' => 'field_theme_misc_labels',
			'label' => 'Misc Labels',
			'name' => 'misc_labels',
			'type' => 'group',
			'sub_fields' => [[
				'key' => 'field_theme_misc_labels_skip',
				'label' => 'Skip',
				'name' => 'skip',
				'type' => 'text',
			], [
				'key' => 'field_theme_misc_labels_back',
				'label' => 'Back',
				'name' => 'back',
				'type' => 'text',
			], [
				'key' => 'field_theme_misc_labels_featured_resource',
				'label' => 'Featured Resource',
				'name' => 'featured_resource',
				'type' => 'text',
			], [
				'key' => 'field_theme_misc_labels_featured_news',
				'label' => 'Featured News',
				'name' => 'featured_news',
				'type' => 'text',
			], [
				'key' => 'field_theme_misc_labels_featured_case_study',
				'label' => 'Featured Case Study',
				'name' => 'featured_case_study',
				'type' => 'text',
			], [
				'key' => 'field_theme_misc_labels_login',
				'label' => 'Login',
				'name' => 'login',
				'type' => 'text',
			], [
				'key' => 'field_theme_misc_labels_read',
				'label' => 'Read',
				'name' => 'read',
				'type' => 'text',
			], [
				'key' => 'field_theme_misc_labels_learn',
				'label' => 'Learn',
				'name' => 'learn',
				'type' => 'text',
			], [
				'key' => 'field_theme_misc_labels_bio',
				'label' => 'Bio',
				'name' => 'bio',
				'type' => 'text',
			], [
				'key' => 'field_theme_misc_labels_category',
				'label' => 'Category',
				'name' => 'category',
				'type' => 'text',
			], [
				'key' => 'field_theme_misc_labels_all_categories',
				'label' => 'All Categories',
				'name' => 'all_categories',
				'type' => 'text',
			], [
				'key' => 'field_theme_misc_labels_industry',
				'label' => 'Industry',
				'name' => 'industry',
				'type' => 'text',
			], [
				'key' => 'field_theme_misc_labels_all_industries',
				'label' => 'All industries',
				'name' => 'all_industries',
				'type' => 'text',
			], [
				'key' => 'field_theme_misc_labels_type',
				'label' => 'Type',
				'name' => 'type',
				'type' => 'text',
			], [
				'key' => 'field_theme_misc_labels_all_types',
				'label' => 'All types',
				'name' => 'all_types',
				'type' => 'text',
			], [
				'key' => 'field_theme_misc_labels_location',
				'label' => 'Location',
				'name' => 'location',
				'type' => 'text',
			], [
				'key' => 'field_theme_misc_labels_all_locations',
				'label' => 'All locations',
				'name' => 'all_locations',
				'type' => 'text',
			], [
				'key' => 'field_theme_misc_labels_search',
				'label' => 'Search',
				'name' => 'search',
				'type' => 'text',
			], [
				'key' => 'field_theme_misc_labels_none',
				'label' => 'None',
				'name' => 'none',
				'type' => 'text',
			], [
				'key' => 'field_theme_misc_labels_load',
				'label' => 'Load',
				'name' => 'load',
				'type' => 'text',
			], [
				'key' => 'field_theme_misc_labels_loading',
				'label' => 'Loading',
				'name' => 'loading',
				'type' => 'text',
			], [
				'key' => 'field_theme_misc_footer_logos',
				'label' => 'Footer Logos',
				'name' => 'footer_logos',
				'type' => 'gallery',
				'return_format' => 'id',
			]],
		]],
		'location' => [[[
			'param' => 'options_page',
			'operator' => '==',
			'value' => 'acf-options-theme-options',
		]]],
		'acfml_field_group_mode' => 'translation',
	]);



	// ADD PAGE FIELDS

	// acf_add_local_field_group([
	// 	'key' => 'group_page',
	// 	'title' => 'Page Options',
	// 	'fields' => [[
	// 		'key' => 'field_page_compact_footer',
	// 		'name' => 'compact_footer',
	// 		'type' => 'true_false',
	// 		'message' => 'Compact Footer',
	// 	]],
	// 	'location' => [[[
	// 		'param' => 'page_type',
	// 		'operator' => '==',
	// 		'value' => 'front_page',
	// 	]], [[
	// 		'param' => 'page_type',
	// 		'operator' => '!=',
	// 		'value' => 'front_page',
	// 	]]],
	// 	'position' => 'side',
	// ]);
});
