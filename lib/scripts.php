<?php
/**
 * Scripts and stylesheets
 */

function shoestrap_scripts() {
  $shoestrap_responsive = get_theme_mod( 'shoestrap_responsive' );

  wp_enqueue_script('jquery');

  wp_enqueue_style('shoestrap_app', get_template_directory_uri() . '/assets/css/app.css', false, null);
  if ( $shoestrap_responsive != '0' ) {
    wp_enqueue_style('shoestrap_app_responsive', get_template_directory_uri() . '/assets/css/responsive.css', false, null);
  }
  wp_enqueue_style('elusive_iconfont', get_template_directory_uri() . '/assets/fonts/css/elusive-webfont.css', false, null);

  // Load style.css from child theme
  if (is_child_theme()) {
    wp_enqueue_style('shoestrap_child', get_stylesheet_uri(), false, null);
  }

  if (is_single() && comments_open() && get_option('thread_comments')) {
    wp_enqueue_script('comment-reply');
  }

  wp_enqueue_script('shoestrap_bootstrap', get_template_directory_uri() . '/assets/js/vendor/bootstrap.min.js', false, null, false);
  wp_enqueue_script('shoestrap_main', get_template_directory_uri() . '/assets/js/main.js', false, null, false);
  wp_enqueue_script('shoestrap_bootstrap');
  wp_enqueue_script('shoestrap_main');
}
add_action('wp_enqueue_scripts', 'shoestrap_scripts', 100);

function shoestrap_remove_script_version( $src ){
  $parts = explode( '?', $src );
  return $parts[0];
}
add_filter( 'script_loader_src', 'shoestrap_remove_script_version', 15, 1 );
add_filter( 'style_loader_src', 'shoestrap_remove_script_version', 15, 1 );
