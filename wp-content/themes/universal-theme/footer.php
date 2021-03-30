<footer class="footer">
  <div class="container">
      <div class="footer-form-wrapper">
        <h3 class="footer-form-title">Подпишитесь на нашу рассылку</h3>
        <form action="https://app.getresponse.com/add_subscriber.html" accept-charset="utf-8" method="post" class="footer-form">
          <!-- Поле Email (обязательно) -->
          <input required type="text" name="email" placeholder="Введите email" class="input footer-form-input">
          <!-- Токен списка -->
          <!-- Получить API ID на: https://app.getresponse.com/campaign_list.html -->
          <input type="hidden" name="campaign_token" value="BH9Qp" />
          <!--Страница благодарности--->
          <input type="hidden" name="thankyou_url" value="<?php echo home_url('thankyou')?>"/>
          <!-- Добавить подписчика в цикл на определенный день (по желанию) -->
          <input type="hidden" name="start_day" value="0" />
          <!-- Кнопка подписаться -->
          <button type="submit">Подписаться</button>
        </form>
      </div>
      <!-- /.footer-form -->
      <div class="footer-menu-bar">
        <?php dynamic_sidebar( 'sidebar-footer' ); ?>
      </div>
      <!-- ./footer-menu-bar -->

      <div class="footer-info">
        
    <!--ВЫВОДИМ ЛОГО-->
    <?php 
      //если лого есть, нужно его вывести
      if( has_custom_logo() ){
        // логотип есть выводим его
        echo '<div class="logo">' . get_custom_logo() . '</div>';
      }else {
        echo '<span class="logo-name">' . get_bloginfo('name') . '</span></div>';
      }
     ?>
     
      <?php
        wp_nav_menu( [
          //где наводится (function). указываем либо место theme_location либо кокретное меню menu
          'theme_location'  => 'footer_menu',
          'container'       => 'nav', 
          'container_class' => 'footer-nav-wrapper', 
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