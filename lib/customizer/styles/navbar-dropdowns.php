<?php

/*
 * Applies the styles to the navbar dropdowns.
 */
function shoestrap_navbar_dropdown_css(){
  $advanced_builder = get_option('shoestrap_advanced_compiler');
  $header_bg_color  = get_theme_mod( 'shoestrap_header_backgroundcolor' );
  if ( $advanced_builder != 1 ) {
    $navbar_color   = get_theme_mod( 'shoestrap_navbar_color' );
  } else {
    $navbar_color   = get_theme_mod( 'strp_cb_navbar_background' );
  }
  $navbar_textcolor = get_theme_mod( 'shoestrap_navbar_textcolor' );
  
  
  // Make sure colors are properly formatted
  $header_bg_color  = '#' . str_replace( '#', '', $header_bg_color );
  $navbar_color     = '#' . str_replace( '#', '', $navbar_color );
  $navbar_textcolor = '#' . str_replace( '#', '', $navbar_textcolor );
  
  $styles = '<style>';
  $styles .= '.navbar-inner ul.dropdown-menu{';
  $styles .= 'background-color:' . $navbar_color . '!important;';
  $styles .= 'background-image: -moz-linear-gradient(top, ' . $navbar_color . ', ' . shoestrap_adjust_brightness( $navbar_color, -10 ) . ') !important;';
  $styles .= 'background-image: -webkit-gradient(linear, 0 0, 0 100%, from(' . $navbar_color . '), to(' . shoestrap_adjust_brightness( $navbar_color, -10 ) . ')) !important;';
  $styles .= 'background-image: -webkit-linear-gradient(top, ' . $navbar_color . ', ' . shoestrap_adjust_brightness( $navbar_color, -10 ) . ') !important;';
  $styles .= 'background-image: -o-linear-gradient(top, ' . $navbar_color . ', ' . shoestrap_adjust_brightness( $navbar_color, -10 ) . ') !important;';
  $styles .= 'background-image: linear-gradient(to bottom, ' . $navbar_color . ', ' . shoestrap_adjust_brightness( $navbar_color, -10 ) . ') !important;';
  $styles .= 'filter: e(%("progid:DXImageTransform.Microsoft.gradient(startColorstr="%d", endColorstr="%d", GradientType=0)",argb(' . $navbar_color . '),argb(' . shoestrap_adjust_brightness( $navbar_color, -10 ) . '))) !important;';
  $styles .= 'border: 1px solid ' . shoestrap_adjust_brightness( $navbar_color, -20 ) . ';}';
  
  $styles .= '.navbar .nav > li > .dropdown-menu::before{border-bottom: 7px solid ' . $navbar_color . ';}';
  $styles .= '.navbar .nav > li > .dropdown-menu::after{border-bottom: 6px solid ' . $navbar_color . ';}';
  
  $styles .= '.navbar-inner .dropdown-menu li > a, .navbar-inner .dropdown-menu li > a:hover, .navbar-inner .dropdown-menu li > a:focus, .navbar-inner .dropdown-submenu:hover > a{';
  if ( strlen( $navbar_textcolor ) < 6 ) {
    if ( shoestrap_get_brightness( $navbar_color ) >= 160 ) {
      $styles .= 'color: ' . shoestrap_adjust_brightness( $navbar_color, -160 ) . ';';
    } else {
      $styles .= 'color: ' . shoestrap_adjust_brightness( $navbar_color, 160 ) . ';';
    }
  } else {
    $styles .= 'color: ' . $navbar_textcolor . ';';
  }
	$styles .= '}';
	
  $styles .= '.navbar .nav li.dropdown.open > .dropdown-toggle, .navbar .nav li.dropdown.active > .dropdown-toggle, .navbar .nav li.dropdown.open.active > .dropdown-toggle{';
  if ( shoestrap_get_brightness( $navbar_color ) >= 130) {
    $styles .= 'color: ' . shoestrap_adjust_brightness( $navbar_color, -180 ) . ';';
    $styles .= 'background-color: ' . shoestrap_adjust_brightness( $navbar_color, -40 ) . ';';
  } else {
    $styles .= 'color: ' . shoestrap_adjust_brightness( $navbar_color, 180 ) . ';';
    $styles .= 'background-color: ' . shoestrap_adjust_brightness( $navbar_color, 50 ) . ';';
  }
  $styles .= 'text-shadow: 0 1px 0 ' . shoestrap_adjust_brightness( $navbar_color, -15 ) . ';}';
  $styles .= '.navbar .nav li.dropdown > .dropdown-toggle .caret, .navbar .nav li.dropdown.open > .dropdown-toggle .caret, .navbar .nav li.dropdown.active > .dropdown-toggle .caret, .navbar .nav li.dropdown.open.active > .dropdown-toggle .caret{';
  if ( shoestrap_get_brightness( $navbar_color ) >= 160) {
    $styles .= 'border-top-color: ' . shoestrap_adjust_brightness( $navbar_color, -160 ) . ';';
    $styles .= 'border-bottom-color: ' . shoestrap_adjust_brightness( $navbar_color, -160 ) . ';';
  } else {
    $styles .= 'border-top-color: ' . shoestrap_adjust_brightness( $navbar_color, 160 ) . ';';
    $styles .= 'border-bottom-color: ' . shoestrap_adjust_brightness( $navbar_color, 160 ) . ';';
  }
  $styles .= '}';
  $styles .= '.dropdown-menu .active > a, .dropdown-menu .active > a:hover{';
  if ( shoestrap_get_brightness( $navbar_color ) >= 160 ) {
    $styles .= 'background: ' . shoestrap_adjust_brightness( $navbar_color, -100 ) . ';';
    $styles .= 'color: ' . shoestrap_adjust_brightness( $navbar_color, 10 ) . ' !important;';
  } else {
    $styles .= 'background: ' . shoestrap_adjust_brightness( $navbar_color, 100 ) . ';';
    $styles .= 'color: ' . shoestrap_adjust_brightness( $navbar_color, -10 ) . ' !important;';
  }
  if ( strlen( $navbar_textcolor ) >= 6 ) {
    $styles .= 'color: ' . shoestrap_adjust_brightness( $navbar_textcolor, -10 ) . ' !important;';
  }
  $styles .= '}';
  $styles .= '.dropdown-menu li > a:hover, .dropdown-menu li > a:focus, .dropdown-submenu:hover > a{';
  if ( shoestrap_get_brightness( $navbar_color ) >= 160 ) {
    $styles .= 'background: ' . shoestrap_adjust_brightness( $navbar_color, -30 ) . ';';
  } else {
    $styles .= 'background: ' . shoestrap_adjust_brightness( $navbar_color, 30 ) . ';';
  }
  $styles .= '}';
  if ( shoestrap_get_brightness( $header_bg_color ) >= 130 ) {
    $styles .= '.dropdown-menu li > a:hover, .dropdown-menu li > a:focus, .dropdown-submenu:hover > a{color: #222;}';
  }
  $styles .= '</style>';
  
  return $styles;
}


/*
 * Set cache for 24 hours
 */
function shoestrap_navbar_dropdown_css_cache() {
  $data = get_transient( 'shoestrap_navbar_dropdown_css' );
  if ( $data === false ) {
    $data = shoestrap_navbar_dropdown_css();
    set_transient( 'shoestrap_navbar_dropdown_css', $data, 3600 * 24 );
  }
  echo $data;
}
add_action( 'wp_head', 'shoestrap_navbar_dropdown_css_cache', 199 );

/*
 * Reset cache when in customizer
 */
function shoestrap_navbar_dropdown_css_cache_reset() {
  delete_transient( 'shoestrap_navbar_dropdown_css' );
  shoestrap_navbar_dropdown_css_cache();
}
add_action( 'customize_preview_init', 'shoestrap_navbar_dropdown_css_cache_reset' );
