<?php

add_action('acf/init', function() {

	// REGISTER BLOCK TYPE

	if (function_exists('acf_register_block_type')) {
		acf_register_block_type([
			'title' => 'Event',
			'name' => 'event',
			'supports' => ['align' => false],
			'render_template' => 'blocks/event/event.php',
			'enqueue_assets' => function() {
				wp_enqueue_style('block-event', get_template_directory_uri().'/blocks/event/event.css', null, null);
			}
		]);
	}



	// ADD ACF FIELDS

	acf_add_local_field_group([
		'key' => 'group_event',
		'title' => 'Block: Event',
		'fields' => [[
			'key' => 'field_event_display',
			'label' => 'Display',
			'name' => 'display',
			'type' => 'accordion',
			'open' => 1,
			'multi_expand' => 1,
		], [
			'key' => 'field_event_content',
			'label' => 'Content',
			'name' => 'content',
			'type' => 'wysiwyg',
		], [
			'key' => 'field_event_link',
			'label' => 'Link',
			'name' => 'link',
			'type' => 'link',
		], [
			'key' => 'field_event_contact_email',
			'label' => 'Contact Email',
			'name' => 'contact_email',
			'type' => 'email',
		], [
			'key' => 'field_event_options',
			'label' => 'Options',
			'name' => 'options',
			'type' => 'accordion',
			'multi_expand' => 1,
		], [
			'key' => 'field_event_style',
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
			'value' => 'acf/event',
		]]],
		'acfml_field_group_mode' => 'advanced',
	]);
});
