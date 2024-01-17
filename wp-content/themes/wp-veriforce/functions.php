<?php

// SETUP

add_action('after_setup_theme', function() {
	add_theme_support('title-tag');
	add_theme_support('post-thumbnails');
	add_theme_support('html5', [
		'script',
		'style',
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	]);

	add_theme_support('editor-styles');
	add_editor_style(get_stylesheet_uri());
	add_editor_style(get_template_directory_uri().'/blocks/section/section.css');

	update_option('medium_size_w', 640);
	update_option('medium_size_h', 0);

	update_option('medium_large_size_w', 960);
	update_option('medium_large_size_h', 0);

	update_option('large_size_w', 1280);
	update_option('large_size_h', 0);

	update_option('extra_large_size_w', 1920);
	update_option('extra_large_size_h', 0);

	add_image_size('small', 320);
	add_image_size('huge', 1600);

	remove_image_size('1536x1536');
	remove_image_size('2048x2048');

	register_nav_menus(['primary' => 'Primary']);
	register_nav_menus(['footer' => 'Footer']);

	$GLOBALS['excluded_posts'] = [];
});



// ENQUEUE STYLES & SCRIPTS

add_action('wp_enqueue_scripts', function() {
	//wp_dequeue_style('wp-block-library');
	wp_dequeue_style('classic-theme-styles');
	wp_deregister_script('jquery');

	wp_enqueue_script('jquery', '/wp-includes/js/jquery/jquery.min.js', null, null, true);
	wp_enqueue_script('script', get_template_directory_uri().'/script.js', ['jquery'], null, true);

	wp_enqueue_style('style', get_stylesheet_uri(), null, null);
	wp_enqueue_style('fonts', get_template_directory_uri().'/assets/fonts/fonts.css', null, null);
	wp_enqueue_style('footer', get_template_directory_uri().'/assets/styles/footer.css', null, null);
	wp_enqueue_style('header', get_template_directory_uri().'/assets/styles/header.css', null, null);

	wp_enqueue_style('section', get_template_directory_uri().'/blocks/section/section.css', null, null);

	wp_enqueue_script('flickity', get_template_directory_uri().'/assets/flickity/flickity.pkgd.min.js', null, null, true);
	wp_enqueue_script('flickity-fade', get_template_directory_uri().'/assets/flickity/flickity-fade.js', null, null, true);
	wp_enqueue_style('flickity', get_template_directory_uri().'/assets/flickity/flickity.css', null, null);

	// wp_enqueue_script('gravity-forms', get_template_directory_uri().'/assets/gravity-forms/gravity-forms.js', null, null, true);
	wp_enqueue_style('gravity-forms', get_template_directory_uri().'/assets/gravity-forms/gravity-forms.css', null, null);

	wp_enqueue_style('vf-styles', get_template_directory_uri().'/assets/styles/vf-style.css', null, null);
});

add_action('admin_enqueue_scripts', function($hook) {
	if ($hook == 'post.php' || $hook == 'post-new.php') {
		wp_enqueue_style('td-admin', get_template_directory_uri().'/assets/styles/admin.css');
	}
});



// FUNCTION FILES

require 'acf.php';
require 'cpt.php';

foreach (scandir(get_template_directory().'/templates') as $name) {
	if (substr($name, 0, 1) != '.') {
		require get_template_directory().'/templates/'.$name.'/'.$name.'-fn.php';
	}
}

foreach (scandir(get_template_directory().'/blocks') as $name) {
	if (substr($name, 0, 1) != '.') {
		require get_template_directory().'/blocks/'.$name.'/'.$name.'-fn.php';
	}
}



// REST API - REQUIRE AUTHENTICATION

add_filter('rest_authentication_errors', function($result) {
	if ($result === true || is_wp_error($result)) {
		return $result;
	}

	if (!is_user_logged_in()) {
		return new WP_Error(
			'rest_not_logged_in',
			__( 'You are not currently logged in.'),
			array('status' => 401)
		);
	}

	return $result;
});



// CLEANUP

add_filter('emoji_svg_url', '__return_false');
add_action('after_setup_theme', function() {
	remove_action('rest_api_init', 'wp_oembed_register_route');
	remove_action('template_redirect', 'rest_output_link_header', 11, 0);
	remove_action('wp_head', 'adjacent_posts_rel_link', 10);
	remove_action('wp_head', 'adjacent_posts_rel_link_wp_head');
	remove_action('wp_head', 'feed_links', 2);
	remove_action('wp_head', 'feed_links_extra', 3);
	remove_action('wp_head', 'index_rel_link');
	remove_action('wp_head', 'parent_post_rel_link', 10);
	remove_action('wp_head', 'print_emoji_detection_script', 7);
	remove_action('wp_head', 'rel_canonical');
	remove_action('wp_head', 'rest_output_link_wp_head', 10);
	remove_action('wp_head', 'rsd_link');
	remove_action('wp_head', 'start_post_rel_link', 10);
	remove_action('wp_head', 'wlwmanifest_link');
	remove_action('wp_head', 'wp_generator');
	remove_action('wp_head', 'wp_oembed_add_discovery_links');
	remove_action('wp_head', 'wp_oembed_add_host_js');
	remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);
	remove_action('wp_print_styles', 'print_emoji_styles');
	remove_action('wp_enqueue_scripts', 'wp_enqueue_global_styles');
	remove_action('wp_footer', 'wp_enqueue_global_styles', 1);
	//remove_theme_support('core-block-patterns');
});



// ALLOW SVGS

add_filter('upload_mimes', function($mimes) {
	$mimes['svg'] = 'image/svg+xml';
	return $mimes;
});



// MOVE ADMIN BAR TO BOTTOM

add_action('wp_head', function() {
	if (is_user_logged_in()) {
		echo '<style>
			html[lang] {margin-top: 0 !important; margin-bottom: 32px !important;}
			#wpadminbar {top: auto !important; bottom: 0;}
			#wpadminbar .ab-sub-wrapper {bottom: 32px;}
			@media screen and (max-width: 782px) {
				html[lang] {margin-bottom: 0 !important;}
				#wpadminbar {display: none !important;}
			}
		</style>';
	}
});



// SET PUBLIC STATUS

update_option('blog_public', strpos(site_url(), '.tillerstaging.com') || strpos(site_url(), '.cloudwaysapps.com') ? '0' : '1');



// CUSTOM EXCERPT

add_filter('excerpt_length', function() { return 20; });
add_filter('excerpt_more', function() { return '...'; });



// ALM LEADING SLASH

add_filter('alm_seo_leading_slash', '__return_true');



// REMOVE COMMENTS

add_action('admin_menu', function() {
	remove_menu_page('edit-comments.php');
});

add_action('admin_init', function() {
	if (is_admin_bar_showing()) {
		remove_action('admin_bar_menu', 'wp_admin_bar_comments_menu', 60);
	}

	foreach (get_post_types() as $post_type) {
		if (post_type_supports($post_type, 'comments')) {
			remove_post_type_support($post_type, 'comments');
			remove_post_type_support($post_type, 'trackbacks');
		}
	}

	remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal');
});



// CUSTOM FUNCTIONS

function is_child($page_ids = []) {
	global $post;
	if (is_int($page_ids)) {
		$page_ids = [$page_ids];
	}
	foreach ($page_ids as $page_id) {
		if (is_page() && ($post->post_parent == $page_id)) return true;
	}
	return false;
}

function build_nav_tree($elements, $parentId = 0) {
	$branch = array();
	foreach ($elements as $element) {
		if ($element->menu_item_parent == $parentId) {
			$children = build_nav_tree($elements, $element->ID);
			if ($children) $element->children = $children;
			$branch[$element->ID] = $element;
			unset($element);
		}
	}
	return $branch;
}

function build_term_tree($elements, $parentId = 0) {
	$branch = array();
	foreach ($elements as $element) {
		if ($element->parent == $parentId) {
			$children = build_term_tree($elements, $element->term_id);
			if ($children) $element->children = $children;
			$branch[$element->term_id] = $element;
			unset($element);
		}
	}
	return $branch;
}

function get_acf_blocks() {
	foreach (scandir(get_template_directory().'/blocks') as $name) {
		if (substr($name, 0, 1) != '.') {
			$block_names[] = $name;
		}
	}
	$blocks = array_map(function($name) {
		return 'acf/'.$name;
	}, $block_names);
	return $blocks;
}

function image($args = null) {
	$defaults = [
		'id' => null,
		'size' => 'large',
		'ratio' => null,
		'fit' => 'cover',
		'loading' => 'lazy',
	];

	$args = wp_parse_args($args, $defaults);
	$img = wp_get_attachment_image_src($args['id'], $args['size']) ?: [null, 1, 1];
	$src = $img[0];
	$alt = get_post_meta($args['id'], '_wp_attachment_image_alt', true);
	$loading = $args['loading'];
	$offset = get_field('offset', $args['id']);

	if (map_image_size($args['size']) > 2 && !empty(wp_get_attachment_image_src($args['id'], 'small')[0])) {
		$poverty_src = wp_get_attachment_image_src($args['id'], 'small')[0];
	} else {
		$poverty_src = null;
	}

	if (map_image_size($args['size']) > 4 && !empty(wp_get_attachment_image_src($args['id'], 'medium_large')[0])) {
		$mobile_src = wp_get_attachment_image_src($args['id'], 'medium_large')[0];
	} else {
		$mobile_src = null;
	}

	if ($src) {
		$ratio_styles = $args['ratio'] ? "aspect-ratio:{$args['ratio']}; object-fit:{$args['fit']};" : null;
		$offset_styles = $offset && !$args['ratio'] ? "margin:{$offset};" : null;

		$html = "<picture class='b-img' style='{$offset_styles}'>";
			if (file_exists(wp_get_original_image_path($args['id']).'.webp')) {
				if ($poverty_src) $html .= "<source type='image/webp' srcset='{$poverty_src}.webp' media='(max-width: 480px) and (max-resolution:1.99dppx)'>";
				if ($mobile_src) $html .= "<source type='image/webp' srcset='{$mobile_src}.webp' media='(max-width: 960px)'>";
				$html .= "<source type='image/webp' srcset='{$src}.webp'>";
			} else {
				if ($poverty_src) $html .= "<source srcset='{$poverty_src}' media='(max-width: 480px) and (max-resolution:1.99dppx)'>";
				if ($mobile_src) $html .= "<source srcset='{$mobile_src}' media='(max-width: 960px)'>";
			}

			$html .= "<img src='{$src}' width='{$img[1]}' height='{$img[2]}' loading='{$loading}' alt='{$alt}' style='{$ratio_styles}'>";
		$html .= "</picture>";

	} else {
		$style = $args['ratio'] ? "style='aspect-ratio:{$args['ratio']};'" : "style='aspect-ratio:1/1;'";
		$html = "<div class='b-img-fallback' {$style}></div>";
	}

	return $html;
}

function map_image_size($size) {
	if (is_numeric($size)) {
		$string = match($size){
			1 => 'thumbnail',
			2 => 'small',
			3 => 'medium',
			4 => 'medium_large',
			5 => 'large',
			6 => 'huge',
			9 => 'full',
			default => 'full',
		};
		return $string;
	}

	if (is_string($size)) {
		$number = match($size){
			'thumbnail' => 1,
			'small' => 2,
			'medium' => 3,
			'medium_large' => 4,
			'large' => 5,
			'huge' => 6,
			'full' => 7,
			default => 9,
		};
		return $number;
	}

	return false;
}

function get_page_path($uri = null) {
	if (!$uri) $uri = $_SERVER['REQUEST_URI'];
	$uri_path = parse_url($uri, PHP_URL_PATH);
	$position = strpos($uri_path , '/page');
	$path = $position ? substr($uri_path, 0, $position).'/' : $uri_path;
	return $path;
}

function get_theme_option($field = null, $subfield = null) {
	if (!$field) return false;
	$option = get_field($field, 'option');
	if ($subfield) $option = $option[$subfield];
	return $option;
}



// ALLOWED BLOCK TYPES

/*add_filter('allowed_block_types_all', function() {
	$blocks = get_acf_blocks();
	return $blocks;
});*/



// CLEAN UP PASTED TEXT

add_filter('tiny_mce_before_init', function($in) {
	$in['paste_preprocess'] = "function(plugin, args) {
		var whitelist = 'p,a,b,strong,i,em,h1,h2,h3,h4,h5,h6,ul,ol,li,br';
		var stripped = jQuery('<div>' + args.content + '</div>');
		var els = stripped.find('*').not(whitelist);

		for (var i = els.length - 1; i >= 0; i--) {
			var e = els[i];
			jQuery(e).replaceWith(e.innerHTML);
		}

		stripped.find('*').removeAttr('id').removeAttr('class').removeAttr('style');
		html = stripped.html();

		html = html.replace(/(data-.+?=\".*?\")|(data-.+?='.*?')|(data-[a-zA-Z0-9-]+)/g, '');
		html = html.replace(/(aria-.+?=\".*?\")|(aria-.+?='.*?')|(aria-[a-zA-Z0-9-]+)/g, '');

		args.content = html;
	}";
	return $in;
});



// DISABLE BLOCK EDITOR FULLSCREEN

add_action('enqueue_block_editor_assets', function() {
	$script = "window.onload = function() {
		const isFullscreenMode = wp.data.select('core/edit-post').isFeatureActive('fullscreenMode');
		if (isFullscreenMode) {
			wp.data.dispatch('core/edit-post').toggleFeature('fullscreenMode');
		}
	}";
	wp_add_inline_script('wp-blocks', $script);
});



// ADD BUTTON STYLE TO WYSIWYG

add_filter('mce_buttons_2', function($buttons) {
	array_unshift($buttons, 'styleselect');
	return $buttons;
});

add_filter('tiny_mce_before_init', function($init_array) {
	$style_formats = [
		['title' => 'Primary Button', 'selector' => 'a', 'classes' => 'b-button'],
		['title' => 'Primary Button with Arrow', 'selector' => 'a', 'classes' => 'b-button alt-arrow'],
		['title' => 'Secondary Button', 'selector' => 'a', 'classes' => 'b-button alt-outline'],
		['title' => 'Secondary Button with Arrow', 'selector' => 'a', 'classes' => 'b-button alt-outline alt-arrow'],
		['title' => 'Text Button', 'selector' => 'a', 'classes' => 'b-button alt-text'],
		['title' => 'Text Button with Arrow', 'selector' => 'a', 'classes' => 'b-button alt-text alt-arrow'],
		['title' => 'Text Button with Arrow Underlined', 'selector' => 'a', 'classes' => 'b-button alt-text alt-arrow alt-underlined'],
		['title' => 'Secondary Text Button', 'selector' => 'a', 'classes' => 'b-button alt-text alt-blue'],
		['title' => 'Secondary Text Button with Arrow', 'selector' => 'a', 'classes' => 'b-button alt-text alt-blue alt-arrow'],
		['title' => 'Eyebrow', 'selector' => 'h1', 'classes' => 'b-eyebrow'],
		['title' => 'Inline Checklist', 'selector' => 'ul', 'classes' => 'b-inline-checklist'],
	];

	$init_array['style_formats'] = json_encode($style_formats);
	return $init_array;
});



// REMOVE NOINDEX POSTS FROM FRONTEND QUERIES

add_action('pre_get_posts', function($query) {
	if (!is_admin() && !is_singular()) {
		$meta_query = isset($query->meta_query) ? (array)$query->meta_query : [];
		$meta_query['noindex'] = [
			'key' => '_yoast_wpseo_meta-robots-noindex',
			'value' => 1,
			'compare' => 'NOT EXISTS',
		];

		$query->set('meta_query', $meta_query);
	}
});



// EVENT ADMIN COLUMNS

add_filter ('manage_event_posts_columns', function($columns){
	return array_merge($columns, [
		'start_date' => __('Start Date'),
	]);
});

add_action('manage_event_posts_custom_column', function($column, $post_id){
	if ($column == 'start_date') {
		$date = get_post_meta($post_id, 'start_date', true);
		$formatted_date = date("Y/m/d", strtotime($date)) . (!str_contains($date, '00:00:00') ? ' at ' . date("g:i a", strtotime($date)) : null);
		echo $formatted_date;
	}
}, 10, 2);

add_filter('manage_edit-event_sortable_columns', function($columns){
	$columns['start_date'] = 'start_date';
	return $columns;
});



// TRAINING ADMIN COLUMNS

add_filter ('manage_training_posts_columns', function($columns){
	return array_merge($columns, [
		'start_date' => __('Start Date'),
	]);
});

add_action('manage_training_posts_custom_column', function($column, $post_id){
	if ($column == 'start_date') {
		$date = get_post_meta($post_id, 'start_date', true);
		$formatted_date = date("Y/m/d", strtotime($date)) . (!str_contains($date, '00:00:00') ? ' at ' . date("g:i a", strtotime($date)) : null);
		echo $formatted_date;
	}
}, 10, 2);

add_filter('manage_edit-training_sortable_columns', function($columns){
	$columns['start_date'] = 'start_date';
	return $columns;
});



// SORT ADMIN COLUMNS BY START DATE

add_action('pre_get_posts', function($query){
	if (!is_admin() || !$query->is_main_query()) {
		return;
	}

	if ('start_date' === $query->get('orderby')) {
		$query->set( 'orderby', 'meta_value' );
		$query->set( 'meta_key', 'start_date' );
	}
});



// DELETE OLD EVENTS/TRAINING POSTS

if (function_exists('wp_next_scheduled') && function_exists('wp_schedule_event')) {
	if (!wp_next_scheduled('custom_scheduled_delete')) wp_schedule_event(time(), 'daily', 'custom_scheduled_delete');
}

add_action('custom_scheduled_delete', function(){
	$posts = get_posts([
		'post_type' => ['events', 'training'],
		'posts_per_page' => '-1',
		'meta_query' => [[
			'key' => 'start_date',
			'compare' => '<',
			'value' => date('Y-m-d', strtotime("-1 year")),
			'type' => 'DATE',
		]]
	]);

	foreach ($posts as $post) {
		$persist = get_post_meta($post->ID, 'persist', true) ?? 0;
		$start_date = new DateTime(get_post_meta($post->ID, 'start_date', true));
		$comparison_date = new DateTime('now');
		$comparison_date->modify('-1 year');

		if (!$persist && $start_date < $comparison_date) {
			wp_delete_post($post->ID);
		}
	}
});



// BLOG REDIRECT + URL REDIRECT

add_filter('post_link', function($post_link, $post){
	if (get_field('url', $post->ID)) {
		return get_field('url', $post->ID);
	}

	if (get_post_type($post) == 'resource' && has_term('blog', 'resource_type', $post)) {
		return str_replace('/resource/', '/blog/', $post_link);
	}

	return $post_link;
}, 2, 2);

add_filter('post_type_link', function($post_link, $post){
	if (get_field('url', $post->ID)) {
		return get_field('url', $post->ID);
	}

	if (get_post_type($post) == 'resource' && has_term('blog', 'resource_type', $post)) {
		return str_replace('/resource/', '/blog/', $post_link);
	}

	return $post_link;
}, 2, 2);

add_action('init', function(){
	add_rewrite_rule('^blog/([^/]+)/?$', 'index.php?resource=$matches[1]', 'top');
}, 10);



// DYNAMICALLY POPULATE CLIENTS FIELD

add_filter('gform_pre_render_9', 'populate_clients');
add_filter('gform_pre_validation_9', 'populate_clients');
add_filter('gform_pre_submission_filter_9', 'populate_clients');
// add_filter('gform_admin_pre_render_9', 'populate_clients');

function populate_clients($form) {
	$clients = get_posts(['post_type' => 'client', 'posts_per_page' => -1, 'orderby' => 'name', 'order' => 'ASC']);
	$page_id = apply_filters('wpml_object_id', 3750, 'page', true);
	$placeholder = get_field('hiring_client', $page_id) ? get_field('hiring_client', $page_id)['placeholder'] : null;

	foreach ($form['fields'] as $field) {
		if ($field->id == 1) {
			$field->placeholder = $placeholder;
			$field->choices = array_map(fn($v) => ['text' => $v->post_title, 'value' => $v->post_title], $clients);
		}
	}

	return $form;
}


/**
 * Add a sensible starter set of security headers
 */
// add_action( 'init', function() {
// 	$headers = [
// 		'Content-Security-Policy' => 'upgrade-insecure-requests',
// 		'Permissions-Policy' => 'geolocation=(self)',
// 		'Referrer-Policy' => 'no-referrer-when-downgrade',
// 		'X-Content-Type-Options' => 'nosniff',
// 		'X-Frame-Options' => 'sameorigin',
// 		'X-XSS-Protection' => '1; mode=block',
// 		'Strict-Transport-Security' => 'max-age=31536000; includeSubDomains'
// 	];
// 	foreach ($headers as $header => $value) {
// 		header(sprintf(
// 			'%s: %s',
// 			$header,
// 			$value
// 		));
// 	}
// });

/**
 * Gently prevent user enumeration by redirecting likely author crawl requests.
 *
 * Any request with author query string will be sent to the homepage.
 * 301 header not included to avoid accidentally impacting SEO with errant user query strings.
 *
 */
add_action('parse_request', function($wp) {
	$isAuthorEnumeration = (
		!isset($wp->query_vars['rest_route']) &&
		!!preg_match('/author=([0-9]*)/i', $_SERVER['QUERY_STRING'])
	);
	$isRestApiAuthorEnumeration = (
		!!isset($wp->query_vars['rest_route']) &&
		(!!preg_match('/wp-json\/v2\/users\/?/i', $wp->request) || !!preg_match('/wp-json\/wp\/v2\/users\/?/i', $wp->request))
	);
	if (!is_admin() && !is_user_logged_in() && ($isAuthorEnumeration || $isRestApiAuthorEnumeration)) {
		header(sprintf('Location: %s', get_home_url()));
		exit;
	}
}, 9);
