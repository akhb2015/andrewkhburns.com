<?php

add_action('acf/init', function() {

	// REGISTER BLOCK TYPE

	if (function_exists('acf_register_block_type')) {
		acf_register_block_type([
			'title' => 'Post',
			'name' => 'post',
			'supports' => ['align' => false],
			'render_template' => 'blocks/post/post.php',
			'enqueue_assets' => function() {
				wp_enqueue_style('block-post', get_template_directory_uri().'/blocks/post/post.css', null, null);
			}
		]);
	}



	// ADD ACF FIELDS

	acf_add_local_field_group([
		'key' => 'group_post',
		'title' => 'Block: Post',
		'fields' => [[
			'key' => 'field_post_display',
			'label' => 'Display',
			'name' => 'display',
			'type' => 'accordion',
			'open' => 1,
			'multi_expand' => 1,
		], [
			'key' => 'field_post_content',
			'label' => 'Content',
			'name' => 'content',
			'type' => 'wysiwyg',
		], [
			'key' => 'field_post_options',
			'label' => 'Options',
			'name' => 'options',
			'type' => 'accordion',
			'multi_expand' => 1,
		], [
			'key' => 'field_post_style',
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
			'value' => 'acf/post',
		]]],
		'acfml_field_group_mode' => 'advanced',
	]);
});
