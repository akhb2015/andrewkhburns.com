<?php 

/*
Plugin Name: My WP Custom Block Patterns
Description: Adds a custom block pattern to the Gutenberg block editor.
Version: 1.0
*/

function my_custom_wp_block_patterns() {

    register_block_pattern(
        'akhb/my-custom-pattern',
        array(
            'title'       => __( 'Page Intro Blocks', 'page-intro-block' ),
            
            'description' => _x( 'Includes a cover block, two columns with headings and text, a separator and a single-column text block.', 'Block pattern description', 'page-intro-block' ),
            
            'content'     => "<!-- wp:cover -->\n<div class=\"wp-block-cover has-background-dim\"><div class=\"wp-block-cover__inner-container\"></div></div>\n<!-- /wp:cover -->\n\n<!-- wp:columns -->\n<div class=\"wp-block-columns\"><!-- wp:column -->\n<div class=\"wp-block-column\"><!-- wp:heading -->\n<h2>Heading</h2>\n<!-- /wp:heading -->\n\n<!-- wp:paragraph -->\n<p>Content Area #1</p>\n<!-- /wp:paragraph --></div>\n<!-- /wp:column -->\n\n<!-- wp:column -->\n<div class=\"wp-block-column\"><!-- wp:heading -->\n<h2>Heading</h2>\n<!-- /wp:heading -->\n\n<!-- wp:paragraph -->\n<p>Content Area #2</p>\n<!-- /wp:paragraph --></div>\n<!-- /wp:column --></div>\n<!-- /wp:columns -->\n\n<!-- wp:separator {\"className\":\"is-style-wide\"} -->\n<hr class=\"wp-block-separator is-style-wide\"/>\n<!-- /wp:separator -->\n\n<!-- wp:paragraph -->\n<p>Content Area #3</p>\n<!-- /wp:paragraph -->",
            
            'categories'  => array('header'),
        )
    );

}    
add_action( 'init', 'my_custom_wp_block_patterns' );