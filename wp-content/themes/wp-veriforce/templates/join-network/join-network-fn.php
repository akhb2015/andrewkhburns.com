<?php

// ADD TEMPLATE

add_filter('theme_page_templates', function($templates) {
	$templates['templates/join-network/join-network.php'] = 'Join our Network';
	return $templates;
});



// ENQUEUE STYLES & SCRIPTS

add_action('wp_enqueue_scripts', function() {
	if (is_page_template('templates/join-network/join-network.php')) {
		wp_enqueue_style('template-join-network', get_template_directory_uri().'/templates/join-network/join-network.css', null, null);
		wp_enqueue_script('template-join-network', get_template_directory_uri().'/templates/join-network/join-network.js', ['jquery'], null, true);
        wp_enqueue_style('select2', get_template_directory_uri().'/templates/join-network/select2/select2.min.css', null, null);
        wp_enqueue_script('select2', get_template_directory_uri().'/templates/join-network/select2/select2.min.js', ['jquery'], null, true);
	}
});



// HIDE BLOCK EDITOR

add_action('admin_footer', function() {
	$id = sanitize_key($_GET['post'] ?? null);
	$template = get_post_meta($id, '_wp_page_template', true);
	if ($template == 'templates/join-network/join-network.php') {
		?><script>
			document.getElementById('editor').classList.add('block-editor-hidden');
		</script><?php
	}
});



// ADD ACF FIELDS

add_action('acf/init', function() {
	acf_add_local_field_group([
		'key' => 'group_join_network',
		'title' => 'Join our Network',
		'fields' => [[
			'key' => 'field_join_network_content',
			'label' => 'Heading',
			'name' => 'heading',
			'type' => 'wysiwyg',
			'wrapper' => ['class' => 'td-short'],
		], [
			'key' => 'field_join_network_hiring_client',
			'label' => 'Hiring Client',
			'name' => 'hiring_client',
			'type' => 'group',
			'sub_fields' => [[
				'key' => 'field_join_network_hiring_client_heading',
				'label' => 'Heading',
				'name' => 'heading',
				'type' => 'wysiwyg',
				'wrapper' => ['class' => 'td-short'],
			], [
				'key' => 'field_join_network_hiring_client_foot',
				'label' => 'Foot',
				'name' => 'foot',
				'type' => 'text',
			], [
				'key' => 'field_join_network_hiring_client_placeholder',
				'label' => 'Placeholder',
				'name' => 'placeholder',
				'type' => 'text',
				'wrapper' => ['width' => '50'],
			], [
				'key' => 'field_join_network_hiring_client_label',
				'label' => 'Toggle Label',
				'name' => 'label',
				'type' => 'text',
				'wrapper' => ['width' => '50'],
			]],
		], [
			'key' => 'field_join_network_product',
			'label' => 'Product',
			'name' => 'product',
			'type' => 'group',
			'sub_fields' => [[
				'key' => 'field_join_network_product_heading',
				'label' => 'Heading',
				'name' => 'heading',
				'type' => 'wysiwyg',
				'wrapper' => ['class' => 'td-short'],
			], [
				'key' => 'field_join_network_product_options',
				'label' => 'Options',
				'name' => 'options',
				'type' => 'repeater',
				'min' => 1,
				'button_label' => 'Add Option',
				'sub_fields' => [[
					'key' => 'field_join_network_product_options_url',
					'label' => 'Url',
					'name' => 'url',
					'type' => 'url',
				], [
					'key' => 'field_join_network_product_options_text',
					'label' => 'Text',
					'name' => 'text',
					'type' => 'text',
				]],
			], [
				'key' => 'field_join_network_product_foot',
				'label' => 'Foot',
				'name' => 'foot',
				'type' => 'text',
			], [
				'key' => 'field_join_network_product_label',
				'label' => 'Field Label',
				'name' => 'label',
				'type' => 'text',
				'wrapper' => ['width' => '25'],
			], [
				'key' => 'field_join_network_product_toggle',
				'label' => 'Toggle Label',
				'name' => 'toggle_label',
				'type' => 'text',
				'wrapper' => ['width' => '25'],
			], [
				'key' => 'field_join_network_product_continue',
				'label' => 'Continue Label',
				'name' => 'continue_label',
				'type' => 'text',
				'wrapper' => ['width' => '25'],
			], [
				'key' => 'field_join_network_product_error',
				'label' => 'Error Label',
				'name' => 'error_label',
				'type' => 'text',
				'wrapper' => ['width' => '25'],
			]],
		]],
		'location' => [[[
			'param' => 'page_template',
			'operator' => '==',
			'value' => 'templates/join-network/join-network.php',
		]]],
		'acfml_field_group_mode' => 'translation',
	]);
});

?>
