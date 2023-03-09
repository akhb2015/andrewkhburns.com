<?php

    function akhb_register_blocks() {

        $blocks = array(
            ['name' => 'buy-box'],
            ['name' => 'hero-block'],
            ['name' => 'custom-form', 'options' => [
                'render_callback' => 'akhb_form_render_cb' //for server-side rendering of blocks
            ]],
            ['name' => 'login-gate', 'options' => [
                'render_callback' => 'akhb_login_gate_cb' //for server-side rendering of blocks
            ]]
        );

        foreach( $blocks as $block ) {
           register_block_type( AKHB_BLOCK_PLUGIN_DIR . 'build/blocks/' . $block['name'], isset( $block['options'] ) ? $block['options'] : [] );
        }
    }