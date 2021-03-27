<!DOCTYPE html>
<!--автоматичекм подставляет язык-->
<html <?php language_attributes(); ?>>
<head>
  <!--выводит информацию о сайте: кодировку, версию вп, титл, дескриптишн-->
  <meta <?php bloginfo( 'charset' ); ?>>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Universal</title>
  <?php wp_head();?>
</head>
<!--вызываем слежебные классы-->
<body <?php body_class(); ?>>
<!--можно встроить свой код, например аналитику-->
<?php wp_body_open(); ?>
<header class="header">
  <div class="container">
    <div class="header__wrapper">

    <!--ВЫВОДИМ ЛОГО-->
     <?php 
      //если лого есть, нужно его вывести
      if( has_custom_logo() ){
        // логотип есть выводим его
        the_custom_logo();
      }else {
        echo 'Universal';
      }
     ?>

    <!--ВЫВОДИМ МЕНЮ-->
      <?php
        wp_nav_menu( [
          //где наводится (function). указываем либо место theme_location либо кокретное меню menu
          'theme_location'  => 'header_menu',
          'container'       => 'nav', 
          'container_class' => 'header-nav', 
          //класс для тега ul
          'menu_class'      => 'header-menu', 
          'menu_id'         => '',
          //выводить или оставить в переменной
          'echo'            => true,
        ] );
      ?>
    <!--ВЫВОДИМ ПОИСК-->
      <?php get_search_form() ?>
      <a href="" class="header-menu-toggle">
      <span></span>
      <span></span>
      <span></span>
    </a>
    </div>
  
  </div>
</header>


