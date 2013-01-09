<?php

/*
 * This class creates a custom textarea control to be used in the "advanced" settings of the theme.
 * This will allow users to add their custom css & sripts right from the customizer
 */
if ( class_exists( 'WP_Customize_Control' ) ) {
  class Shoestrap_Customize_Textarea_Control extends WP_Customize_Control {
    public $type = 'textarea';
    
    public function render_content() { ?>
      <label>
        <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
        <textarea rows="5" style="width:100%;" <?php $this->link(); ?>><?php echo esc_textarea( $this->value() ); ?></textarea>
      </label>
    <?php }
  }
}

/*
 * Create the controls in the customizer.
 */
function shoestrap_register_controls( $wp_customize ){
  // Remove the default "background" control
  $wp_customize->remove_control( 'background_color' );
  
  // Determine if the user is using the advanced builder or not
  $advanced_builder = get_option('shoestrap_advanced_compiler');
  // Turn off the advanced builder on multisite
  if ( is_multisite() && !is_super_admin() ) {
    $advanced_builder == '';
  }
  
  /*
   * Color Controls
   */
  $color_controls   = array();
  
  // Display the following controls only when user is NOT using the advanced controls
  if ( $advanced_builder != 1 ) {
    // Navbar background color
    $color_controls[] = array( 'setting' => 'shoestrap_navbar_color',           'label' => 'Navbar Color',                    'section' => 'shoestrap_primary_navbar',  'priority' => 5 );
    // Links Color
    $color_controls[] = array( 'setting' => 'shoestrap_link_color',             'label' => 'Links Color',                     'section' => 'colors',            'priority' => 3 );
    // Buttons Color
    $color_controls[] = array( 'setting' => 'shoestrap_buttons_color',          'label' => 'Buttons Color',                   'section' => 'colors',            'priority' => 4 );
  	// Text Color
  	$color_controls[] = array( 'setting' => 'shoestrap_text_color',							'label' => 'Text Color',       							  'section' => 'colors',  					'priority' => 2 );
  
	}
  // Navbar text color
  $color_controls[] = array( 'setting' => 'shoestrap_navbar_textcolor',       'label' => 'Navbar Text Color',               'section' => 'colors',            'priority' => 40 );
  // Background Color
  $color_controls[] = array( 'setting' => 'shoestrap_background_color',       'label' => 'Background Color',                'section' => 'colors',            'priority' => 1 );
  // Header Background
  $color_controls[] = array( 'setting' => 'shoestrap_header_backgroundcolor', 'label' => 'Header Region Background Color',  'section' => 'shoestrap_header',  'priority' => 3 );
  // Header textcolor
  $color_controls[] = array( 'setting' => 'shoestrap_header_textcolor',       'label' => 'Header Region Text Color',        'section' => 'shoestrap_header',  'priority' => 4 );
  // Call to Action Button Color (Hero Region)
  $color_controls[] = array( 'setting' => 'shoestrap_hero_cta_color',         'label' => 'Call To Action Button Color',     'section' => 'shoestrap_hero',    'priority' => 5 );
  // Hero Region Background Color
  $color_controls[] = array( 'setting' => 'shoestrap_hero_background_color',  'label' => 'Hero Region Background Color',    'section' => 'shoestrap_hero',    'priority' => 7 );
  // Hero Region Text Color
  $color_controls[] = array( 'setting' => 'shoestrap_hero_textcolor',         'label' => 'Hero Region Text Color',          'section' => 'shoestrap_hero',    'priority' => 8 );
  // Footer Background Color
  $color_controls[] = array( 'setting' => 'shoestrap_footer_background_color','label' => 'Footer Background Color',         'section' => 'shoestrap_footer',  'priority' => 1 );
  
  /*
   * Image Controls
   */
  $image_controls = array();
  // Logo Image
  $image_controls[] = array( 'setting' => 'shoestrap_logo',           'label' => 'Logo Image', 'section' => 'shoestrap_logo',  'priority' => 2 );
  // Hero Region Background Image
  $image_controls[] = array( 'setting' => 'shoestrap_hero_background','label' => 'Hero Background Image',   'section' => 'shoestrap_hero',  'priority' => 6 );
  
  /*
   * Checkbox Controls
   */
  $checkbox_controls = array();
  // Display Navbar on top
  $checkbox_controls[] = array( 'setting' => 'shoestrap_navbar_top',          'label' => 'Display NavBar on the top of the page', 'section' => 'shoestrap_primary_navbar',  'priority' => 1 );
  // Display Navbar Branding
  $checkbox_controls[] = array( 'setting' => 'shoestrap_navbar_branding',     'label' => 'Display Branding (Sitename or Logo)',   'section' => 'shoestrap_primary_navbar',  'priority' => 2 );
  // Display NavBar Logo
  $checkbox_controls[] = array( 'setting' => 'shoestrap_navbar_logo',         'label' => 'Use Logo (if available) for branding',  'section' => 'shoestrap_primary_navbar',  'priority' => 3 );
  // Show/Hide the login link
  $checkbox_controls[] = array( 'setting' => 'shoestrap_header_loginlink',    'label' => 'Show Login/Logout Link',                'section' => 'shoestrap_primary_navbar',  'priority' => 5 );
  // Display NavBar Social links
  $checkbox_controls[] = array( 'setting' => 'shoestrap_navbar_social',       'label' => 'Display Social Links in the Navbar',    'section' => 'shoestrap_primary_navbar',  'priority' => 6 );
  // Display Primary NavBar Searchbox
  $checkbox_controls[] = array( 'setting' => 'shoestrap_p_navbar_searchbox',  'label' => 'Display Search',                        'section' => 'shoestrap_primary_navbar',  'priority' => 7 );

  // Display Secondary Navbar
  $checkbox_controls[] = array( 'setting' => 'shoestrap_navbar_secondary',    'label' => 'Display Secondary NavBar',              'section' => 'shoestrap_secondary_navbar','priority' => 1 );
  // Show/Hide the login link on the secondary navbar
  $checkbox_controls[] = array( 'setting' => 'shoestrap_navbar2_loginlink',   'label' => 'Show Login/Logout Link',                'section' => 'shoestrap_secondary_navbar','priority' => 5 );
  // Display NavBar Social links on the secondary navbar
  $checkbox_controls[] = array( 'setting' => 'shoestrap_navbar2_social',      'label' => 'Display Social Links in the Navbar',    'section' => 'shoestrap_secondary_navbar','priority' => 6 );

  // Extra header on/off
  $checkbox_controls[] = array( 'setting' => 'shoestrap_extra_branding',      'label' => 'Display Extra Header',                  'section' => 'shoestrap_header',      'priority' => 1 );
  // Display Social Links on the Header
  $checkbox_controls[] = array( 'setting' => 'shoestrap_header_social',       'label' => 'Display Social Links',                  'section' => 'shoestrap_header',      'priority' => 5 );
  
  // Flat buttons on/off
  $checkbox_controls[] = array( 'setting' => 'shoestrap_flat_buttons',        'label' => 'Flat Buttons (no gradients)',           'section' => 'shoestrap_advanced',       'priority' => 9 );

  /*
   * Dropdown (Select) Controls
   */
  $select_controls = array();
  // Responsive or fixed-width layout
  $select_controls[] = array( 'setting' => 'shoestrap_responsive',              'label' => 'Responsive / Fixed-width',        'section' => 'shoestrap_layout',      'priority' => 1, 'choises' => array( '1' => __( 'Responsive', 'shoestrap' ), '0' => __( 'Fixed-Width', 'shoestrap' ) ) );
  // Layout (sidebars and main area arrangement)
  $select_controls[] = array( 'setting' => 'shoestrap_layout',                  'label' => 'Layout',                          'section' => 'shoestrap_layout',      'priority' => 2, 'choises' => array( 'm' => __( 'Main only', 'shoestrap' ), 'mp' => __( 'Main-Primary', 'shoestrap' ), 'pm' => __( 'Primary-Main', 'shoestrap' ), 'ms' => __( 'Main-Secondary', 'shoestrap' ), 'sm' => __( 'Secondary-Main', 'shoestrap' ), 'mps' => __( 'Main-Primary-Secondary', 'shoestrap' ), 'msp' => __( 'Main-Secondary-Primary', 'shoestrap' ), 'pms' => __( 'Primary-Main-Secondary', 'shoestrap' ), 'psm' => __( 'Primary-Secondary-Main', 'shoestrap' ), 'smp' => __( 'Secondary-Main-Primary', 'shoestrap' ), 'spm' => __( 'Secondary-Primary-Main', 'shoestrap' ) ) );
  // Main sidebar width (based on a 12-column bootstrap layout)
  $select_controls[] = array( 'setting' => 'shoestrap_aside_width',             'label' => 'Primary Sidebar Width',           'section' => 'shoestrap_layout',      'priority' => 3, 'choises' => array( '2' => '2/12', '3' => '3/12', '4' => '4/12', '5' => '5/12', '6' => '6/12' ) );
  // Secondary sidebar width (based on a 12-column bootstrap layout)
  $select_controls[] = array( 'setting' => 'shoestrap_secondary_width',         'label' => 'Secondary Sidebar Width',         'section' => 'shoestrap_layout',      'priority' => 5, 'choises' => array( '2' => '2/12', '3' => '3/12', '4' => '4/12' ) );
  // Show/Hide sidebars on the homepage
  $select_controls[] = array( 'setting' => 'shoestrap_sidebar_on_front',        'label' => 'Show sidebars on the Home Page',  'section' => 'shoestrap_layout',      'priority' => 6, 'choises' => array( 'show' => __( 'Show', 'shoestrap' ), 'hide' => __( 'Hide', 'shoestrap' ) ) );
  // Assign Webfonts weight
  $select_controls[] = array( 'setting' => 'shoestrap_webfonts_weight',         'label' => 'Webfont weight:',              	  'section' => 'shoestrap_typography',  'priority' => 2, 'choises' => array( '200' => __( '200', 'shoestrap' ), '300' => __( '300', 'shoestrap' ), '400' => __( '400', 'shoestrap' ), '600' => __( '600', 'shoestrap' ), '700' => __( '700', 'shoestrap' ), '800' => __( '800', 'shoestrap' ), '900' => __( '900', 'shoestrap' ) ) );
  // Assign Webfonts character set
  $select_controls[] = array( 'setting' => 'shoestrap_webfonts_character_set',  'label' => 'Webfont character set:',       	  'section' => 'shoestrap_typography',  'priority' => 3, 'choises' => array( 'cyrillic' => __( 'Cyrillic', 'shoestrap' ), 'cyrillic-ext' => __( 'Cyrillic Extended', 'shoestrap' ), 'greek' => __( 'Greek', 'shoestrap' ), 'greek-ext' => __( 'Greek Extended', 'shoestrap' ), 'latin' => __( 'Latin', 'shoestrap' ), 'latin-ext' => __( 'Latin Extended', 'shoestrap' ), 'vietnamese' => __( 'Vietnamese', 'shoestrap' ) ) ); 
  // Assign Webfonts to specific page elements
  $select_controls[] = array( 'setting' => 'shoestrap_webfonts_assign',         'label' => 'Apply Webfont to:',               'section' => 'shoestrap_typography',  'priority' => 4, 'choises' => array( 'sitename' => __( 'Site Name', 'shoestrap' ), 'headers' => __( 'Headers', 'shoestrap' ), 'all' => __( 'Everywhere', 'shoestrap' ) ) );
  // Visibility of the hero region (frontpage only or site-wide)
  $select_controls[] = array( 'setting' => 'shoestrap_hero_visibility',         'label' => 'Hero Region Visibility',          'section' => 'shoestrap_hero',        'priority' => 9, 'choises' => array( 'front' => __( 'Frontpage', 'shoestrap' ), 'site' => __( 'Site-Wide', 'shoestrap' ) ) );
  // Socation of share element on single posts/pages/custom-post-types
  $select_controls[] = array( 'setting' => 'shoestrap_single_social_position',  'label' => 'Location of social shares',       'section' => 'shoestrap_social',      'priority' => 10,'choises' => array( 'top' => __( 'Top', 'shoestrap' ), 'bottom' => __( 'Bottom', 'shoestrap' ), 'both' => __( 'Both', 'shoestrap' ), 'none' => __( 'None', 'shoestrap' ) ) );
  
  // Text Controls
  $text_controls = array();
  // Google Webfonts (text, name of the webfont)
  $text_controls[]  = array( 'setting' => 'shoestrap_google_webfonts',  	'label' => 'Google Webfont Name',         'section' => 'shoestrap_typography',  'priority' => 1 );
  // Title of the Hero Region
  $text_controls[]  = array( 'setting' => 'shoestrap_hero_title',       	'label' => 'Title',                       'section' => 'shoestrap_hero',        'priority' => 1 );
  // Content of the Hero Region
  $text_controls[]  = array( 'setting' => 'shoestrap_hero_content',     	'label' => 'Content',                     'section' => 'shoestrap_hero',        'priority' => 2 );
  // Text (label) of the Call To Action Button on the Hero Region
  $text_controls[]  = array( 'setting' => 'shoestrap_hero_cta_text',    	'label' => 'Call To Action Button Text',  'section' => 'shoestrap_hero',        'priority' => 3 );
  // Link of the Call To Action Button on the Hero Region
  $text_controls[]  = array( 'setting' => 'shoestrap_hero_cta_link',    	'label' => 'Call To Action Button Link',  'section' => 'shoestrap_hero',        'priority' => 4 );
  // Link of the site's facebook page
  $text_controls[]  = array( 'setting' => 'shoestrap_facebook_link',    	'label' => 'Facebook Page Link',          'section' => 'shoestrap_social',      'priority' => 1 );
  // Link or username of the site's twitter profile
  $text_controls[]  = array( 'setting' => 'shoestrap_twitter_link',     	'label' => 'Twitter URL or @username',    'section' => 'shoestrap_social',      'priority' => 2 );
  // Google Plus Link
  $text_controls[]  = array( 'setting' => 'shoestrap_google_plus_link', 	'label' => 'Google+ Profile Link',        'section' => 'shoestrap_social',      'priority' => 3 );
  // Pinterest Link
  $text_controls[]  = array( 'setting' => 'shoestrap_pinterest_link',   	'label' => 'Pinterest Profile Link',      'section' => 'shoestrap_social',      'priority' => 4 );
  // Footer Text
  $text_controls[]  = array( 'setting' => 'shoestrap_footer_text',			'label' => 'Footer Alternative Text',     'section' => 'shoestrap_footer',      'priority' => 2 );
  
  foreach( $color_controls as $control ){
    $wp_customize->add_control( new WP_Customize_Color_Control(
      $wp_customize,
      $control['setting'],
      array(
        'label'     => __( $control['label'], 'shoestrap' ),
        'section'   => $control['section'],
        'settings'  => $control['setting'],
        'priority'  => $control['priority'],
      )
    ));
  }

  foreach ( $image_controls as $control ) {
    $wp_customize->add_control( new WP_Customize_Image_Control(
      $wp_customize,
      $control['setting'],
      array(
        'label'     => __( $control['label'], 'shoestrap' ),
        'section'   => $control['section'],
        'settings'  => $control['setting'],
        'priority'  => $control['priority']
      )
    ));
  }
  
  foreach ( $checkbox_controls as $control ) {
    $wp_customize->add_control( $control['setting'], array(
      'label'       => __( $control['label'], 'shoestrap' ),
      'section'     => $control['section'],
      'settings'    => $control['setting'],
      'type'        => 'checkbox',
      'priority'    => $control['priority'],
    ));
  }
  
  foreach ( $select_controls as $control ) {
    $wp_customize->add_control( $control['setting'], array(
      'label'       => __( $control['label'], 'shoestrap' ),
      'section'     => $control['section'],
      'settings'    => $control['setting'],
      'type'        => 'select',
      'priority'    => $control['priority'],
      'choices'     => $control['choises']
    ));
  }

  foreach ( $text_controls as $control) {
    $wp_customize->add_control( $control['setting'], array(
      'label'       => __( $control['label'], 'shoestrap' ),
      'section'     => $control['section'],
      'settings'    => $control['setting'],
      'type'        => 'text',
      'priority'    => $control['priority']
    ));
  }

/*
 * ADVANCED
 * 
 * The advanced section allow users to enter their own css and/or scripts
 * and place them either in the head or the footer of the page.
 * These are textarea controls that we created in the beginning of this file.
 * 
 * CAUTION:
 * Using this can be potentially dangerous for your site.
 * Any content you enter here will be echoed with minimal checks 
 * so you should be careful of your code.
 * 
 * To add css rules you must write <style>....your styles here...</style>
 * To add a script you should write <script>....your styles here...</script>
 * 
 */
 
  // Header scripts (css/js)
  $wp_customize->add_control( new Shoestrap_Customize_Textarea_Control( $wp_customize, 'shoestrap_advanced_head', array(
    'label'       => 'Header Scripts (CSS/JS)',
    'section'     => 'shoestrap_advanced',
    'settings'    => 'shoestrap_advanced_head',
    'priority'    => 1,
  )));

  // Footer scripts (css/js)
  $wp_customize->add_control( new Shoestrap_Customize_Textarea_Control( $wp_customize, 'shoestrap_advanced_footer', array(
    'label'       => 'Footer Scripts (CSS/JS)',
    'section'     => 'shoestrap_advanced',
    'settings'    => 'shoestrap_advanced_footer',
    'priority'    => 2,
  )));

  /*
   * The below lines are simply for better live previewing results.
   */
  $wp_customize -> get_setting( 'blogname' )                -> transport = 'postMessage';
  $wp_customize -> get_setting( 'shoestrap_hero_title' )    -> transport = 'postMessage';
  $wp_customize -> get_setting( 'shoestrap_hero_content' )  -> transport = 'postMessage';
  $wp_customize -> get_setting( 'shoestrap_hero_cta_text' ) -> transport = 'postMessage';
  $wp_customize -> get_setting( 'shoestrap_hero_cta_text' ) -> transport = 'postMessage';
  $wp_customize -> get_setting( 'background_color' )        -> transport = 'postMessage';
}
add_action( 'customize_register', 'shoestrap_register_controls' );
