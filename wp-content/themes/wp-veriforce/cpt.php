<?php

add_action('init', function() {

	// REGISTER TAXONOMIES

	register_taxonomy('resource_category', ['resource'], [
		'public' => true,
		'show_in_rest' => true,
		'hierarchical' => true,
		'labels' => [
			'name' => 'Categories',
			'singular_name' => 'Category',
		],
		'rewrite' => [
			'slug' => 'resource-category',
			'with_front' => false,
		],
	]);

	register_taxonomy('resource_industry', ['resource'], [
		'public' => true,
		'show_in_rest' => true,
		'hierarchical' => true,
		'labels' => [
			'name' => 'Industries',
			'singular_name' => 'Industry',
		],
		'rewrite' => [
			'slug' => 'resource-industry',
			'with_front' => false,
		],
	]);

	register_taxonomy('resource_type', ['resource'], [
		'public' => true,
		'show_in_rest' => true,
		'hierarchical' => true,
		'labels' => [
			'name' => 'Types',
			'singular_name' => 'Type',
		],
		'rewrite' => [
			'slug' => 'resource-type',
			'with_front' => false,
		],
	]);

	register_taxonomy('event_type', ['event'], [
		'public' => true,
		'show_in_rest' => true,
		'hierarchical' => true,
		'labels' => [
			'name' => 'Types',
			'singular_name' => 'Type',
		],
		'rewrite' => [
			'slug' => 'event-type',
			'with_front' => false,
		],
	]);

	register_taxonomy('event_location', ['event'], [
		'public' => false,
		'show_ui' => true,
		'show_in_rest' => true,
		'hierarchical' => true,
		'labels' => [
			'name' => 'Locations',
			'singular_name' => 'Location',
		],
	]);

	register_taxonomy('training_type', ['training'], [
		'public' => true,
		'show_in_rest' => true,
		'hierarchical' => true,
		'labels' => [
			'name' => 'Types',
			'singular_name' => 'Type',
		],
		'rewrite' => [
			'slug' => 'training-type',
			'with_front' => false,
		],
	]);

	register_taxonomy('training_location', ['training'], [
		'public' => false,
		'show_ui' => true,
		'show_in_rest' => true,
		'hierarchical' => true,
		'labels' => [
			'name' => 'Locations',
			'singular_name' => 'Location',
		],
	]);

	register_taxonomy('client_product', ['client'], [
		'public' => false,
		'show_ui' => true,
		'show_in_rest' => true,
		'hierarchical' => true,
		'labels' => [
			'name' => 'Products',
			'singular_name' => 'Product',
		],
	]);

	register_taxonomy('client_pricing', ['client'], [
		'public' => false,
		'show_ui' => true,
		'show_in_rest' => true,
		'hierarchical' => true,
		'labels' => [
			'name' => 'Pricing',
			'singular_name' => 'Pricing',
		],
	]);



	// REGISTER CUSTOM POST TYPES

	register_post_type('resource', [
		'public' => true,
		'show_in_rest' => true,
		'labels' => [
			'name' => 'Resources',
			'singular_name' => 'Resource',
		],
		'rewrite' => [
			'slug' => 'resource',
			'with_front' => false,
		],
		'supports' => [
			'title',
			'editor',
			'revisions',
			'excerpt',
			'thumbnail',
		],
		// 'template' => [[
		// 	'acf/section', [], [
		// 		['acf/content']
		// 	]
		// ]],
	]);

	register_post_type('course', [
		'public' => true,
		'show_in_rest' => true,
		'labels' => [
			'name' => 'Courses',
			'singular_name' => 'Course',
		],
		'rewrite' => [
			'slug' => 'course',
			'with_front' => false,
		],
		'supports' => [
			'title',
			'editor',
			'revisions',
			'excerpt',
			'thumbnail',
		],
		// 'template' => [[
		// 	'acf/section', [], [
		// 		['acf/content']
		// 	]
		// ]],
	]);

	register_post_type('event', [
		'public' => true,
		'show_in_rest' => true,
		'labels' => [
			'name' => 'Events',
			'singular_name' => 'Event',
		],
		'rewrite' => [
			'slug' => 'event',
			'with_front' => false,
		],
		'supports' => [
			'title',
			'editor',
			'revisions',
			'excerpt',
			'thumbnail',
		],
		// 'template' => [[
		// 	'acf/section', [], [
		// 		['acf/content']
		// 	]
		// ]],
	]);

	register_post_type('training', [
		'public' => true,
		'show_in_rest' => true,
		'labels' => [
			'name' => 'Training',
			'singular_name' => 'Training',
		],
		'rewrite' => [
			'slug' => 'training',
			'with_front' => false,
		],
		'supports' => [
			'title',
			'editor',
			'revisions',
			'excerpt',
		],
		// 'template' => [[
		// 	'acf/section', [], [
		// 		['acf/content']
		// 	]
		// ]],
	]);

	register_post_type('client', [
		'public' => false,
		'show_ui' => true,
		'show_in_rest' => true,
		'labels' => [
			'name' => 'Clients',
			'singular_name' => 'Client',
		],
		'supports' => [
			'title',
			'revisions',
		],
	]);

});

