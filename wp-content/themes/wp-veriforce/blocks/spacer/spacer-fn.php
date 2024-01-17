<?php

add_action('acf/init', function() {

	// REGISTER BLOCK TYPE

	if (function_exists('acf_register_block_type')) {
		acf_register_block_type([
			'title' => 'Spacer',
			'name' => 'spacer',
			'mode' => 'preview',
			'supports' => ['align' => false, 'mode' => false],
			'render_template' => 'blocks/spacer/spacer.php',
		]);
	}



	// ADD ACF FIELDS

	acf_add_local_field_group([
		'key' => 'group_spacer',
		'title' => 'Block: Spacer',
		'fields' => [[
			'key' => 'field_spacer_height',
			'label' => 'Height',
			'name' => 'height',
			'type' => 'select',
			'choices' => [
				'xsmall' => 'XSmall',
				'small' => 'Small',
				'medium' => 'Medium',
				'large' => 'Large',
			],
			'default_value' => 'large',
			'wpml_cf_preferences' => 0,
		]],
		'location' => [[[
			'param' => 'block',
			'operator' => '==',
			'value' => 'acf/spacer',
		]]],
		'acfml_field_group_mode' => 'advanced',
	]);
});
