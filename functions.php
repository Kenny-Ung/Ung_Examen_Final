<?php

add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles', 'extraire_evenement' );

function my_theme_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
}

function extraire_evenement($query) {
    if ($query->is_category('evenement')) {
      $query->set( 'posts_per_page', -1 );
      $query->set( 'orderby', 'title' );
      $query->set( 'order', 'asc' );
    }
}
?>