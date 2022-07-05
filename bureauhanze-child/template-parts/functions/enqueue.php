<?php

// Register and enqueue scripts and styles
function woocommerce_theme_stylesheets() {
    wp_register_style( 'style',  get_stylesheet_directory_uri() .'/assets/css/style.min.css', array(), null, 'all' );
    wp_enqueue_style( 'style' );
    
    wp_enqueue_script( 'script-footer', get_template_directory_uri() . '/assets/js/footer.min.js', array(), '1.0.0', true );
    wp_enqueue_script( 'script', get_template_directory_uri() . '/assets/js/script.min.js', array(), '1.0.0', false );

    // wp_enqueue_script( 'script-jquery-dep', get_template_directory_uri() . '/assets/js/jquerydep.min.js', array( 'jquery' ), '', true );
    wp_enqueue_script( 'script-footer-boilershop', get_stylesheet_directory_uri() . '/assets/js/footer.min.js', array(), '1.0.0', true );
    wp_enqueue_script( 'script', get_stylesheet_directory_uri() . '/assets/js/script.min.js', array(), '1.0.0', false );
}
add_action( 'wp_enqueue_scripts', 'woocommerce_theme_stylesheets', 999999 );
