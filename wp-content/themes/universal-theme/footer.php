<footer class="footer">
  <div class="container">
      <div class="footer-menu-bar">
        <?php dynamic_sidebar( 'sidebar-footer' ); ?>
      </div>
      <!-- ./footer-menu-bar -->

      <div class="footer-info">
      <?php
        wp_nav_menu( [
          //где наводится (function). указываем либо место theme_location либо кокретное меню menu
          'theme_location'  => 'footer_menu',
          'container'       => 'nav', 
          'menu_class'      => 'footer-nav', 
          'menu_id'         => '',
          'echo'            => true,
        ] );
        
        $instance = array(
          'link_facebook' => 'https://fb.com',
          'link_twitter' => 'https://twitter.com',
          'link_youtube' => 'https://youtube.com',
          'link_instagram' => 'https://fb.com',
          'link_vk' => 'https://fb.com',
          'title' => ''
        );

        $args = array(
          'before_widget' => '<div class="footer-social">',
          'after_widget' => '</div>',
        );
        the_widget( 'Social_Network_Widget', $instance, $args );?>
      </div>
      <!-- /.footer-info -->

      <div class="footer-text-wrapper">
        <?php dynamic_sidebar( 'sidebar-footer-text' ); ?>
        <span class="footer-copyright"><?php echo date('Y') . ' &copy ' . get_bloginfo('name');?></span>
      </div>
      <!-- /.footer-text-wrapper -->
      
  </div>
  <!-- /.container -->
</footer>
<?php wp_footer();?>
</body>
</html>