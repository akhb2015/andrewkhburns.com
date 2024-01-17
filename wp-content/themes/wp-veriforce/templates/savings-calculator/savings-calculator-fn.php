<?php

// ADD TEMPLATE

add_filter('theme_page_templates', function($templates) {
	$templates['templates/savings-calculator/savings-calculator.php'] = 'Cost Savings Calculator';
	return $templates;
});



// HIDE BLOCK EDITOR

add_action('admin_footer', function() {
	$id = sanitize_key($_GET['post'] ?? null);
	$template = get_post_meta($id, '_wp_page_template', true);
	if ($template == 'templates/savings-calculator/savings-calculator.php') {
		?><script>
			document.getElementById('editor').classList.add('block-editor-hidden');
		</script><?php
	}
});



// ADD ACF FIELDS

add_action('acf/init', function() {
	acf_add_local_field_group([
		'key' => 'group_cost_savings',
		'title' => 'Cost Savings Calculator',
		'fields' => [[
			// 'key' => 'field_cost_savings_content',
			// 'label' => 'Content',
			// 'name' => 'content',
			// 'type' => 'wysiwyg',
		]],
		'location' => [[[
			'param' => 'page_template',
			'operator' => '==',
			'value' => 'templates/savings-calculator/savings-calculator.php',
		]]]
	]);
});

?>
