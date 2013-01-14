<div id="footer-wrapper" class="container-fluid">
  <footer id="content-info" class="container" role="contentinfo">
    <div class="row-fluid">
      <div class="span4"><?php dynamic_sidebar('sidebar-footer-left'); ?></div>
      <div class="span4"><?php dynamic_sidebar('sidebar-footer-center'); ?></div>
      <div class="span4"><?php dynamic_sidebar('sidebar-footer-right'); ?></div>
    </div>
    <p><?php if ( get_theme_mod( 'shoestrap_footer_text' ) ) { echo get_theme_mod( 'shoestrap_footer_text' ); } else { echo '&copy; ' . date('Y'); ?> <?php bloginfo('name'); } ?></p>
  </footer>
</div>

<?php wp_footer(); ?>
