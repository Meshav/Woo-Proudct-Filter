<?php

function plus_css() {
    /* register the stylesheet */
    wp_register_style( 'the_css', plugins_url('css/style.css', __FILE__ ) );
    /* enqueue the stylesheet */
    wp_enqueue_style( 'the_css' );
}

add_action( 'wp_enqueue_scripts','plus_css' );

