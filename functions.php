<?php

add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles', 'extraire_atelier' );

function my_theme_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
}

function extraire_atelier($query) {
    if ($query->is_category('atelier')) {
      $query->set( 'posts_per_page', -1 );
      $query->set( 'orderby', 'date' );
      $query->set( 'order', 'asc' );
    }
}
?>